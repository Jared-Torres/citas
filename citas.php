<?php require 'partials/header.php' ?>
<?php
$cit = null;
$est = "pendiente";

if (isset($_SESSION['user_id'])) {
    $records2 = $conn->prepare("SELECT *  FROM orden WHERE idcliente = :id AND estado = 'pendiente'");
    $records2->bindParam(':id', $user['idcliente']);
    $records2->execute();
    $results2 = $records2->fetch(PDO::FETCH_ASSOC);

    if (is_array($results2)) {
        if (count($results2) > 0) {
            $cit = $results2;
        }
    }
}
if ($user == null) {
    header("Location: index.php");
}
?>

<div class="container row">
    <?php require 'partials/navegacion.php' ?>
    <div class="col-lg-9">

        <div class="container shadow p-3 mb-5 bg-body rounded">
            <div class="fondo1 p-3 text-white rounded ">
                <h2 class="fw-bold">Citas agendadas</h2>
            </div>
            <hr>
            <?php if (!empty($cit)) : ?>

                <?php
                include("funciones/funciones.php");
                ?>
                <?php
                $estado = 'pendiente';
               
                $sql = "select * from orden o inner join cita c on o.idcita = c.idcita and o.estado = 'pendiente' and o.idcliente =" . $user['idcliente'] .  "";
                $result = db_query($sql);
                $contador = 1;
                while ($row = mysqli_fetch_object($result)) {
                ?>

                    <div class="container shadow-sm p-3 mb-3 bg-body rounded bloque1 row">
                        <div class="col-md-6">
                            <label class="form-label datos fw-bold">Cita <?php echo $contador ?> : </label>
                            <div class="shadow-sm p-3 mb-5 bg-body rounded text-muted informacion ">
                                Servicio: <?php echo $row->servicio?><br>
                                Costo: &#36; <?php echo $row->costo?><br>
                                Duracion en horas del servicio: <?php echo $row->horas?><br>
                                Fecha de cita: <?php echo $row->dia?> <?php echo $row->hora?><br>
                                Estado: <?php echo $row->estado?><br>
                            </div>
                        </div>

                    </div>


                <?php $contador += 1;
                } ?>
            <?php else : ?>
                <div style="border: gray 2px solid; margin: 30px;">
                    <b>No tiene citas agendadas</b>
                    <a href="citas-programar.php">Agendar cita</a>
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>
</div>
<?php require 'partials/footer.php' ?>