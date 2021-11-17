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
    header("Location: vistas/vistalogin.php");
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
                
                $sql = "select * from orden where estado='pendiente' AND idcliente =" . $user['idcliente'] .  "";
                $result = db_query($sql);
                $contador = 1;
                while ($row = mysqli_fetch_object($result)) {
                ?>

                    <div class="container shadow-sm p-3 mb-3 bg-body rounded bloque1 row">
                        <div class="col-md-6">
                            <label class="form-label datos fw-bold">Dirección <?php echo $contador ?> : </label>
                            <div class="shadow-sm p-3 mb-5 bg-body rounded text-muted informacion ">
                                Estado: <u><?php echo $row->estado; ?></u><br>
                                Municipio: <u><?php echo $row->municipio; ?></u><br>
                                Colonia: <u><?php echo $row->colonia; ?></u><br>
                                Calle: <u><?php echo $row->calle; ?></u><br>
                                Numero exterior: <u><?php echo $row->numexterior; ?></u><br>
                                Numero interior: <u><?php echo $row->numinterior; ?></u><br>
                                Lote: <u><?php echo $row->lote; ?></u><br>
                                Manzana: <u><?php echo $row->manzana; ?></u><br>
                                Edificio: <u><?php echo $row->edificio; ?></u><br>
                                Numero de piso: <u><?php echo $row->numpiso; ?></u><br>
                                CP: <u><?php echo $row->cp; ?></u><br>
                            </div>
                            <div class="position-relative">
                                <a class="btn btn-danger" href="direcciones/borrar.php?iddireccion=<?php echo $row->iddireccion; ?>"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></a>
                                <a href="perfil_direcciones_editar.php?iddireccion=<?php echo $row->iddireccion; ?>" class="btn btn-outline-primary bottom-0 end-0 boton1">Editar</a>
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






    <div class="container">
        <div class="principal">
            <div class="row">
                <div class="col-1">
                </div>
                <div class="col-10">
                    <h2>Ejemplo basico de un formulario</h2>
                    <form action="procesar.php" method="post">
                        <h5>***** Text Box ****</h5>
                        <div>
                            <div class="mb-3 mt-3">
                                <label class="form-label">Email Address</label>
                                <input class="form-control" type="email" name="mail" placeholder="email@dom.com">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input class="form-control" type="password" name="pass" placeholder="Password">
                            </div>
                            <div class="mb-3 mt-3">
                                <input class="form-control" type="hidden" name="oculto" value="Dato oculto">
                            </div>
                        </div>
                        <br>
                        <hr>
                        <hr>
                        <h5>***** checkBox's ****</h5>
                        <div>
                            <!--
							<div>
								<input type="checkbox" name="genero" value="Mujer" checked>Mujer</input>
								<input type="checkbox" name="genero" value="Hombre" >Hombre</input>
							</div>
							-->
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="genero" value="Mujer" checked>
                                <label class="form-check-label">Mujer</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="genero" value="Hombre">
                                <label class="form-check-label">Hombre</label>
                            </div>
                            <hr>
                            <p class="text-primary"><strong>Seleccione sus Lenguajes de Programacion Favoritos</strong></p>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="lp[]" value="C++">
                                <label class="form-check-label">C++</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="lp[]" value="C#">
                                <label class="form-check-label">C#</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="lp[]" value="Java">
                                <label class="form-check-label">Java</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="lp[]" value="HTML">
                                <label class="form-check-label">HTML</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="lp[]" value="PHP">
                                <label class="form-check-label">PHP</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="lp[]" value="JavaScript">
                                <label class="form-check-label">JavaScript</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="lp[]" value="Python">
                                <label class="form-check-label">Python</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="lp[]" value="Visual.Net">
                                <label class="form-check-label">Visual.Net</label>
                            </div>
                            <hr>
                            <p class="text-primary"><strong>Construccion Dinamica de CheckBox's</strong></p>
                            <?php
                            $vector = array("Opcion 1", "Opcion 2", "Opcion 3", "Opcion 4");
                            for ($i = 0; $i < count($vector); $i++) {
                            ?>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="op[]" value="<?php print("$vector[$i]"); ?>">
                                    <label class="form-check-label"><?php print("$vector[$i]"); ?></label>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <hr>
                        <hr>
                        <h5>***** Radio Buttons ****</h5>
                        <div>
                            <!--
							<div>
								<input type="radio" name="radiob" value="uno" checked> Uno </input>
								<input type="radio" name="radiob" value="dos"> Dos </input>
							</div>
							-->
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radiob" value="uno" checked>
                                <label class="form-check-label">Uno</label>

                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radiob" value="dos">
                                <label class="form-check-label">Dos</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="radiob" value="tres">
                                <label class="form-check-label">Tres</label>
                            </div>
                            <hr>
                            <p class="text-primary"><strong>Seleccione una Moneda</strong></p>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="moneda" value="nmx" checked>
                                <label class="form-check-label">Peso Mex (NMX)</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="moneda" value="usd">
                                <label class="form-check-label">Dolar Amer (USD)</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="moneda" value="cad">
                                <label class="form-check-label">Dolar Can (CAD)</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="moneda" value="eur">
                                <label class="form-check-label">Euro (EUR)</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="moneda" value="jpy">
                                <label class="form-check-label">YEN Jap (JPY)</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="moneda" value="gbp">
                                <label class="form-check-label">Libra (GBP)</label>
                            </div>
                        </div>
                        <hr>
                        <h5>Switch (Alternativa Visual de CheckBox / Radio Button)</h5>
                        <div>
                            <p class="text-primary"><strong>Seleccionar un Servicio</strong></p>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="serv[]" value="Slimp">
                                <label class="form-check-label">Servicio de Limpieza</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="serv[]" value="Sresp">
                                <label class="form-check-label">Servicio de Respaldo</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="serv[]" value="Scdisk">
                                <label class="form-check-label">Servicio de Cambio de disco</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" name="serv[]" value="Sbat" disabled>
                                <label class="form-check-label">Servicio de Cambio de Bateria</label>
                            </div>
                            <p class="text-primary"><strong>Seleccionar un Numero</strong></p>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="radio" name="numeros" value="1" checked>
                                <label class="form-check-label">1 - Uno</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="radio" name="numeros" value="2">
                                <label class="form-check-label">2 - Dos</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="radio" name="numeros" value="3">
                                <label class="form-check-label">3 - Tres</label>
                            </div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="radio" name="numeros" value="4">
                                <label class="form-check-label">4 - Cuatro</label>
                            </div>


                        </div>

                        <button class="btn btn-primary" type="submit">Enviar</button>
                    </form>

                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>




                </div>


            </div>


        </div>
    </div>

</div>
</div>
<?php require 'partials/footer.php' ?>