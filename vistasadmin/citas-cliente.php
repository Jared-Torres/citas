<?php require '../partials/headeradmin.php' ?>
<?php
$cit = null;
$est = "pendiente";

if (isset($_SESSION['admin_id'])) {
    $records2 = $conn->prepare("SELECT *  FROM orden");
    $records2->execute();
    $results2 = $records2->fetch(PDO::FETCH_ASSOC);

    if (is_array($results2)) {
        if (count($results2) > 0) {
            $cit = $results2;
        }
    }
}
if ($admin == null) {
    header("Location: index.php");
}
include("../funciones/funciones.php");
?>

<div class="container row">
    <?php require '../partials/navegacionadmin.php' ?>

    <div class="col-lg-9">

        <div class="container shadow p-3 mb-5 bg-body rounded">
            <div class="fondo1 p-3 text-white rounded ">
                <h2 class="fw-bold">Citas de los clientes</h2>
            </div>
            <hr>
            <div class="container shadow-sm p-3 mb-3 bg-body rounded bloque1">
                <form action="citas-cliente.php" method="POST">
                    <label class="form-label datos fw-bold"> Filtrar citas </label>
                    <select name="filtro">
                        <option> </option>
                        <option value="pendiente">Pendientes</option>
                        <option value="completado">Completados</option>
                        <option value="cancelado">Cancelados</option>
                        <option value="todo">Todos</option>
                    </select>
                    <button class="btn btn-outline-primary " type="submit" name="send">Filtrar</button>
                </form>
                <?php if (!empty($cit)) : ?>
                    <?php if (isset($_POST['filtro'])) {
                        $filtro = $_REQUEST['filtro'];
                        if ($filtro == 'todo') {
                            $sql2 = "select * from orden o inner join cita c inner join cliente cl on o.idcita = c.idcita and o.idcliente = cl.idcliente";
                        } else {
                            $sql2 = "select * from orden o inner join cita c inner join cliente cl on o.idcita = c.idcita and o.idcliente = cl.idcliente and o.estado = '" . $filtro . "'";
                        }

                        $result2 = db_query($sql2);
                        $contador = 1;
                    ?>
                        <label class="form-label datos fw-bold">Mostrando citas "<?php echo $filtro ?>s" </label>
                        <?php
                        while ($row2 = mysqli_fetch_object($result2)) {
                        ?>
                            <div class="container shadow-sm p-3 mb-3 bg-body rounded bloque1 ">
                                <div class="col-md-6">
                                    <label class="form-label datos fw-bold">Cita <?php echo $contador ?> : </label>
                                    <div class="shadow-sm p-3 mb-5 bg-body rounded text-muted informacion ">
                                        Cliente: <?php echo $row2->nombre ?> <?php echo $row2->segundonombre ?> <?php echo $row2->paterno ?> <?php echo $row2->materno ?><br>
                                        Servicio: <?php echo $row2->servicio ?><br>
                                        Costo: &#36; <?php echo $row2->costo ?><br>
                                        Descripcion: <?php echo $row2->descrip ?><br>
                                        Duracion en horas del servicio: <?php echo $row2->horas ?><br>
                                        Fecha de cita: <?php echo $row2->dia ?> <?php echo $row2->hora ?><br>
                                        Estado: <?php echo $row2->estado ?><br>
                                    </div>
                                </div>

                                <div class="position-relative">
                                    <a href="../funciones/completo.php?idorden=<?php echo $row2->idorden; ?>" class="btn btn-outline-primary bottom-0 end-0">Marcar como completado</a>
                                    <a href="../funciones/pendiente.php?idorden=<?php echo $row2->idorden; ?>" class="btn btn-outline-success bottom-0 end-0"> Marcar como pendiente</a>
                                    <a href="../funciones/cancelado.php?idorden=<?php echo $row2->idorden; ?>" class="btn btn-outline-primary bottom-0 end-0"> Marcar como cancelado</a>
                                    <a class="btn btn-danger" href="../funciones/borrar.php?idorden=<?php echo $row2->idorden; ?>"><i class="fa fa-trash-o fa-lg bottom-0 end-0" aria-hidden="true"></i></a>

                                </div>
                            </div>
                        <?php
                            $contador++;
                        }
                    } else { ?>
                        <?php

                        $sql = "select * from orden o inner join cita c inner join cliente cl on o.idcita = c.idcita and o.idcliente = cl.idcliente";
                        $result = db_query($sql);
                        $contador = 1;
                        while ($row = mysqli_fetch_object($result)) {
                        ?>

                            <div class="container shadow-sm p-3 mb-3 bg-body rounded bloque1">
                                <div class="">
                                    <label class="form-label datos fw-bold">Cita <?php echo $contador ?> : </label>
                                    <div class="shadow-sm p-3 mb-5 bg-body rounded text-muted informacion ">
                                        Cliente: <?php echo $row->nombre ?> <?php echo $row->segundonombre ?> <?php echo $row->paterno ?> <?php echo $row->materno ?><br>
                                        Servicio: <?php echo $row->servicio ?><br>
                                        Costo: &#36; <?php echo $row->costo ?><br>
                                        Descripcion: <?php echo $row->descrip ?><br>
                                        Duracion en horas del servicio: <?php echo $row->horas ?><br>
                                        Fecha de cita: <?php echo $row->dia ?> <?php echo $row->hora ?><br>
                                        Estado: <?php echo $row->estado ?><br>
                                    </div>
                                </div>

                                <div class="position-relative">
                                    <a href="../funciones/completo.php?idorden=<?php echo $row->idorden; ?>" class="btn btn-outline-primary bottom-0 end-0">Marcar como completado</a>
                                    <a href="../funciones/pendiente.php?idorden=<?php echo $row->idorden; ?>" class="btn btn-outline-success bottom-0 end-0"> Marcar como pendiente</a>
                                    <a href="../funciones/cancelado.php?idorden=<?php echo $row->idorden; ?>" class="btn btn-outline-primary bottom-0 end-0"> Marcar como cancelado</a>
                                    <a class="btn btn-danger" href="../funciones/borrar.php?idorden=<?php echo $row->idorden; ?>"><i class="fa fa-trash-o fa-lg bottom-0 end-0" aria-hidden="true"></i></a>

                                </div>
                            </div>


                        <?php $contador += 1;
                        } ?>
                    <?php } ?>
                <?php else : ?>
                    <div style="border: gray 2px solid;">
                        <b>No tiene citas agendadas</b>
                    </div>
                <?php endif; ?>

            </div>
        </div>


    </div>
</div>
</div>


<?php require '../partials/footeradmin.php' ?>