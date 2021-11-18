<?php require 'partials/header.php' ?>
<?php
if ($user == null) {
    header("Location: index.php");
}
$message = null;

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
                    <div class="col-md-6">
                    </div>

                    <div class="col-md-12 mb-5">

                        <?php
                        if (isset($_POST['op'])) {
                            include("funciones/funciones.php");
                            $bander = true;
                            $contadorL = 0;
                            $contadorL = count($_REQUEST['op']);
                            $vector = $_REQUEST['op'];
                            $idcit = $vector[0];

                            $sql = "select * from cita WHERE idcita =" . $vector[0] . "";
                            $result2 = db_query($sql);
                            $row = mysqli_fetch_object($result2);
                            $nume = $row->idcita;

                            $i = 0;
                            while ($i < $contadorL) {
                        ?>
                                <form action="citas-programar.php?idcita=<?php print $nume; ?>" method="post">
                                    <div class="col-md-6">
                                        <label class="form-label datos fw-bold">Servicio de: <?php echo $row->nombre; ?> </label>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label">Ingrese el dia y la hora para agendar su cita </label>
                                    </div><br>

                                    <div class="col-md-6">
                                        <input type="date" class="form-control" name="dia">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="time" class="form-control" name="hora">
                                    </div><br>



                                    <button class="btn btn-outline-success" type="submit" name="send">Agendar</button>
                                    <a href="citas-programar.php" class="btn btn-outline-danger">Cancelar</a>

                                </form>

                            <?php
                                $i++;
                            }
                        } else {
                            ?>
                            <label class="form-label datos fw-bold">Seleccione un servicio </label><br>
                            <?php

                            include("funciones/funciones.php");
                            $op;

                            $sql = "select * from cita";
                            $result = db_query($sql);
                            $contador = 0;
                            while ($row = mysqli_fetch_object($result)) {
                            ?>
                                <form action="citas-programar.php" method="post">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="op[]" value="<?php echo $row->idcita ?>">
                                        <label class="form-check-label"><?php echo $row->nombre ?></label>
                                    </div>
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
    function siguiente() {

    }
</script>
<?php require 'partials/footer.php' ?>