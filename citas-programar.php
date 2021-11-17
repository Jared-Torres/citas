<?php require 'partials/header.php' ?>
<?php
if ($user == null) {
    header("Location: index.php");
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


            <form action="citas-programar.php" method="post">
                <div class="container shadow-sm p-3 mb-3 bg-body rounded bloque1 row">
                    <div class="col-md-6 mb-5">
                        <label class="form-label datos fw-bold rounded informacion fw-bold">Hola <?= $user['nombre']; ?> <?= $user['paterno']; ?> </label>
                        <label class="form-label datos  rounded informacion">Ingrese los campos solicitados para sus citas</label>
                    </div>
                    <div class="col-md-6">
                    </div>

                    <div class="col-md-12 mb-5">
                        <label class="form-label datos fw-bold">Servicios : </label><br>
                        <?php

                        include("funciones/funciones.php");
                        $op;

                        $sql = "select * from cita";
                        $result = db_query($sql);
                        $contador = 0;
                        $vector = array();
                        while ($row = mysqli_fetch_object($result)) {
                        ?>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="op[]" value="<?php echo $row->nombre ?>">
                                <label class="form-check-label"><?php echo $row->nombre ?></label>
                            </div>
                        <?php
                        $vector[$contador] = $row->idcita;
                        $contador = $contador+1;
                        }
                        ?>
                        <?php
                        $vector = $_POST['op'];
                        for ($i = 0; $i < count($vector); $i++) {
                        ?>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label"><?php print $vector[$i] ?></label>
                            </div>
                        <?php
                        }
                        ?>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label datos fw-bold">Fecha de Nacimiento : </label>
                        <input type="date" class="form-control" id="fechanac" placeholder="Fecha de nacimiento..." name="fechanac" value=<?= $user['fechanac']; ?>>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label datos fw-bold">Usuario : </label>
                        <input type="text" class="form-control" id="user" placeholder="Nombre..." name="user" value=<?= $user['user']; ?>>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label datos fw-bold">Correo Electronico : </label>
                        <input type="email" class="form-control" id="correo" placeholder="E-mail..." name="correo" value=<?= $user['correo']; ?>>
                    </div>

                    <div class="col-md-6 mb-4 mt-5">
                        <label class="form-label datos fw-bold">Tel Movil : </label>
                        <input type="text" class="form-control" id="tel" placeholder="Telefono..." name="tel" value=<?= $user['tel']; ?>>
                    </div>
                    <br>

                    <div class="container position-relative mt-3">
                        <button class="btn btn-outline-success boton1" type="submit" name="send">guardar</button>
                        <a href="principal.php" class="btn btn-outline-danger boton1">Cancelar</a>
                    </div>


                </div>
            </form>

        </div>
    </div>


</div>
</div>
<?php require 'partials/footer.php' ?>