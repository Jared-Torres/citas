<?php require '../partials/headeradmin.php' ?>
<?php
$serv = null;
include("../funciones/funciones.php");
if (isset($_SESSION['admin_id'])) {
    $records2 = $conn->prepare('SELECT *  FROM cita');
    $records2->execute();
    $results2 = $records2->fetch(PDO::FETCH_ASSOC);

    if (is_array($results2)) {
        if (count($results2) > 0) {
            $serv = $results2;
        }
    }
}
if ($admin == null) {
    header("Location: index.php");
}
?>

<div class="container row">
    <?php require '../partials/navegacionadmin.php' ?>

    <div class="col-lg-9">

        <div class="container shadow p-3 mb-5 bg-body rounded">
            <div class="fondo1 p-3 text-white rounded ">
                <h2 class="fw-bold">Servicios</h2>
            </div>
            <hr>
            <div class="container shadow-sm p-3 mb-3 bg-body rounded bloque1 row">




                <?php if (!empty($serv)) : ?>

                    <?php
                    $sql = "select * from cita";
                    $result = db_query($sql);
                    $contador = 1;
                    while ($row = mysqli_fetch_object($result)) {
                    ?>

                        <div class="container shadow-sm p-3 mb-3 bg-body rounded bloque1 row">
                            <div class="col-md-6">
                                <label class="form-label datos fw-bold">Servicio <?php echo $contador ?> : </label>
                                <div class="shadow-sm p-3 mb-5 bg-body rounded text-muted informacion ">
                                    Nombre: <?php echo $row->servicio; ?><br>
                                    Costo: $<?php echo $row->costo; ?><br>
                                    Horas: <?php echo $row->horas; ?><br>
                                    Descripcion: <?php echo $row->descrip; ?><br>
                                </div>
                                <div class="position-relative">
                                    <a class="btn btn-danger" href="../funciones/borrarservicio.php?idcita=<?php echo $row->idcita; ?>"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></a>
                                    <a href="editar-servicios.php?idcita=<?php echo $row->idcita; ?>" class="btn btn-outline-primary bottom-0 end-0 boton1">Editar</a>
                                </div>
                            </div>

                        </div>


                    <?php $contador += 1;
                    } ?>

                    <a href="agregar-servicios.php">Agregar nuevo servicio</a>

                <?php else : ?>
                    <div style="border: gray 2px solid; margin: 30px;">
                        <b>No tiene servicios registrados</b>
                        <a href="agregar-servicios.php">Agregar servicio</a>
                    </div>
                <?php endif; ?>





            </div>
        </div>


    </div>
</div>
</div>


<?php require '../partials/footeradmin.php' ?>