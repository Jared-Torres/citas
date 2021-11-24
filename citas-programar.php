<?php require 'partials/header.php' ?>
<?php
if ($user == null) {
    header("Location: index.php");
}
$message = null;
$idcita = null;
include("funciones/funciones.php");

if (!empty($_POST['dia']) && !empty($_POST['hora'])) {

    $sql = "INSERT INTO orden ( idcliente, idcita, dia, hora, estado) VALUES (:idcliente, :idcita, :dia, :hora, :estado)";

    $stmt = $conn->prepare($sql);

    $idcit = $_GET['idcita'];
    $stmt->bindParam(':idcliente', $user['idcliente']);
    $stmt->bindParam(':idcita', $idcit);
    $stmt->bindParam(':dia', $_POST['dia']);
    $stmt->bindParam(':hora', $_POST['hora']);
    $est = "pendiente";
    $stmt->bindParam(':estado', $est);

    if ($stmt->execute()) {
        $message = 'Cita agendada';
    } else {
        $message = 'Error al agendar cita';
    }
}


?>

<div class="container row">
    <?php require 'partials/navegacion.php' ?>
    <div class="col-lg-9">

        <div class="container shadow p-3 mb-5 bg-body rounded">
            <div class="fondo1 p-3 text-white rounded ">
                <h2 class="fw-bold">Cita nueva</h2>
            </div>
            <hr>
            <?php
            if ($message == null) {

            ?>

                <div class="container shadow-sm p-3 mb-3 bg-body rounded bloque1 row">
                    <div class="col-md-6 mb-5">
                        <label class="form-label datos fw-bold rounded informacion fw-bold">Hola <?= $user['nombre']; ?> <?= $user['paterno']; ?> </label>
                        <label class="form-label datos  rounded informacion">Ingrese los campos solicitados para sus citas</label>
                    </div>
                    <div class="col-md-6" style="display: inline-block;">
                        <?php
                        if (isset($_GET['idcita'])) {
                            $idcita = $_GET['idcita'];
                        }

                        if (isset($_POST['op']) || $idcita != null) { ?>
                            <div>
                                <li>
                                    <a class="" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <label class="shadow-sm p-3 mb-5 bg-body rounded fw-bold">Fechas no disponibles <i class="fas fa-angle-down"></i> </label>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <?php

                                        $di2 = getdate();
                                        $sql2 = "select * from orden where dia > '" . $di2['year'] . "-" . $di2['mon'] . "-" . $di2['mday'] . "' order by dia asc, hora asc";
                                        $disponibilidad = db_query2($sql2);
                                        while ($row2 = mysqli_fetch_object($disponibilidad)) { ?>

                                            <div class="col-md-6 dropdown-item">
                                                <div class="shadow-sm p-3 mb-5 bg-body rounded text-muted informacion"><?php echo $row2->dia; ?> <?php echo $row2->hora; ?></div>
                                            </div>

                                        <?php } ?>
                                    </ul>
                                </li>
                                </ul>
                            </div>

                            <br>
                        <?php } ?>
                    </div>

                    <div class="col-md-12 mb-5">

                        <?php
                        if (isset($_GET['idcita'])) {
                            $idcita = $_GET['idcita'];
                        }
                        if (isset($_POST['op']) || $idcita != null) {

                            $bander = true;
                            $contadorL = 0;

                            if (isset($_POST['op'])) {
                                $vector = $_REQUEST['op'];
                                $idcit = $vector[0];
                            } else {
                                $vector = $idcita;
                                $idcit = $vector;
                            }



                            $sql = "select * from cita WHERE idcita =" . $idcit . "";
                            $result2 = db_query($sql);
                            $row = mysqli_fetch_object($result2);
                            $nume = $row->idcita;

                            $i = 0;
                        ?>
                            <div>
                                <form name="miformulario" action="citas-programar.php?idcita=<?php print $nume; ?>" method="post">
                                    <div class="form-check form-check-inline" style="display: none">
                                        <input class="form-check-input" type="radio" name="op[]" value="<?php echo $row->idcita ?>" checked required disabled>
                                        <label class="form-check-label"><?php echo $row->servicio ?></label>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label datos fw-bold">Servicio de: <?php echo $row->servicio; ?> </label>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Ingrese el dia y la hora para agendar su cita </label>
                                    </div><br>


                                    <?php if (isset($_GET['idcita'])) {
                                        $diaelejido = $_REQUEST['dia'];
                                        $idcita = $_GET['idcita']; ?>
                                        <div class="col-md-6">
                                            <?php $di = getdate(); ?>
                                            <input id="fechita" onchange="cargar()" type="date" required class="form-control" name="dia" min="<?php print $di['year']; ?>-<?php print $di['mon']; ?>-<?php print $di['mday'] + 1; ?>" value="<?php print $diaelejido ?>">
                                        </div>
                                    <?php } else { ?>

                                        <div class="col-md-6">
                                            <?php $di = getdate(); ?>
                                            <input id="fechita" onchange="cargar()"  type="date" required class="form-control" name="dia" min="<?php print $di['year']; ?>-<?php print $di['mon']; ?>-<?php print $di['mday'] + 1; ?>">
                                        </div>
                                    <?php } ?>

                                    <?php if (isset($_GET['idcita'])) {
                                        $horas = array(
                                            0 => "08:00:00",
                                            1 => "09:00:00",
                                            2 => "10:00:00",
                                            3 => "11:00:00",
                                            4 => "12:00:00",
                                            5 => "13:00:00",
                                            6 => "14:00:00",
                                            7 => "15:00:00",
                                            8 => "16:00:00",
                                            9 => "17:00:00",
                                            10 => "18:00:00",
                                        );
                                        $idcita = $_GET['idcita'];
                                        $sql3 = "select * from orden where dia ='" . $diaelejido . "'";
                                        $result3 = db_query($sql3);
                                        $i = 0;

                                        $horasno;
                                        $j = 0;
                                        while ($row3 = mysqli_fetch_object($result3)) {
                                            $horasno[$j] = $row3->hora;
                                            $j++;
                                        };
                                        $horasno[$j] = "00:00:00";



                                        while ($i < count($horas)) {
                                    ?>
                                            <div class="col-md-6">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="hora" value="<?php print $horas[$i]; ?>" <?php for ($z = 0; $z < count($horasno); $z++) {
                                                                                                                                                                if ($horasno[$z] == $horas[$i]) {
                                                                                                                                                                    print "disabled";
                                                                                                                                                                    break;
                                                                                                                                                                }
                                                                                                                                                            }  ?>>
                                                    <label class="form-check-label"><?php print $horas[$i];  ?></label>
                                                </div>
                                            </div><br>
                                    <?php $i++;
                                        }
                                    } ?>

                                    <button class="btn btn-outline-success" type="submit" name="send">Seleccionar fecha</button>
                                    <a href="citas-programar.php" class="btn btn-outline-danger">Regresar</a>

                                </form>
                            </div>
                        <?php

                        } else {
                        ?>
                            <label class="form-label datos fw-bold">Seleccione un servicio </label><br>
                            <?php


                            $op;

                            $sql = "select * from cita";
                            $result = db_query($sql);
                            $contador = 0;
                            while ($row = mysqli_fetch_object($result)) {
                            ?>
                                <form action="citas-programar.php" method="post">
                                    <div class="form-check" style="background-color: lightblue; border-radius: 5px; padding: 5%;">

                                        <input class="form-check-input" type="radio" name="op[]" value="<?php echo $row->idcita ?>">
                                        <label class="form-check-label">Servicio: <b><?php echo $row->servicio ?></label></b><br>
                                        <label class="form-check-label">Costo: <?php echo $row->costo ?></label><br>
                                        <label class="form-check-label">Horas de servicio: <?php echo $row->horas ?></label><br>
                                        <label class="form-check-label">Descripcion: <?php echo $row->descrip ?></label><br>
                                    </div><br>
                                <?php
                                $contador = $contador + 1;
                            }
                                ?>
                                <div class="container position-relative mt-3">
                                    <button class="btn btn-outline-success boton1" type="submit" name="send">Enviar</button>
                                </div>
                                </form>
                            <?php
                        }
                            ?>

                        <?php } else {
                        ?>
                            <div style="text-align:center; border-radius: 5px;">
                                <p style="font-weight:bold;"> <?= $message ?></p>
                            </div>
                            <div style="text-align: center;">
                                <a class="btn btn-outline-primary" href="citas-programar.php">Agendar otra cita</a>
                                <a class="btn btn-outline-success" href="citas.php">Ver citas agendadas</a>
                            </div>

                        <?php } ?>
                    </div>
                </div>


        </div>
    </div>


</div>
</div>
<script>
    function cargar(){
                // Una vez cargada la página, el formulario se enviara automáticamente.
		document.forms["miformulario"].submit();
    }
</script>
<?php require 'partials/footer.php' ?>