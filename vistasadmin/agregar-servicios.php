<?php require '../partials/headeradmin.php' ?>
<?php
if ($admin == null) {
    header("Location: index.php");
}

if (!empty($_POST['servicio'])) {

    $mysql = "INSERT INTO cita (servicio,costo,horas,descrip) VALUES (:servicio,:costo,:horas,:descrip)";

    $agregard = $conn->prepare($mysql);

    $agregard->bindParam(':servicio', $_POST['servicio']);
    $agregard->bindParam(':costo', $_POST['costo']);
    $agregard->bindParam(':horas', $_POST['horas']);
    $agregard->bindParam(':descrip', $_POST['descrip']);

    if ($agregard->execute()) {
        $message = 'Servicio agregado';
    } else {
        $message = 'Error al agregar servicio';
    }
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



                <?php if (!empty($message)) : ?>
                    <p> <?= $message ?></p>
                <?php else : ?>
                    <form class="row g-3" action="agregar-servicios.php" method="post">
                        <div class="col-md-6 mb-4">
                            <label for="validationDefault01" class="form-label fw-bold">Nombre del servicio: </label>
                            <input type="text" class="form-control text-muted"  placeholder="Servicio..." name="servicio" required>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="validationDefault02" class="form-label fw-bold">Costo:</label>
                            <input type="text" class="form-control text-muted"  placeholder="Costo..." name="costo" required>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="validationDefault02" class="form-label fw-bold">Horas del trabajo:</label>
                            <input type="text" class="form-control text-muted" placeholder="Horas..." name="horas" required>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label for="validationDefault02" class="form-label fw-bold">Descripcion:</label>
                            <textarea class="form-control" aria-label="With textarea" name="descrip" required placeholder="Describa el servicio"></textarea>
                        </div>
                        
                        <div class="col-12">
                            <button class="btn btn-outline-primary" type="submit">Agregar</button>
                        </div>
                    </form>
                <?php endif; ?>
            </div>

        </div>

    </div>
</div>
</div>


<?php require '../partials/footeradmin.php' ?>


