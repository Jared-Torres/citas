<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/formulario.css">
    <title>Formulario registro</title>
</head>
<body>
    <section class="form-register">
        <h4><center>Formulario de problema</center></h4>

            <input class="controls" type="text" name="id" id="id" placeholder="Ingrese su ID">
            <br><br>
            <form class="controls" name="problema" id="problema" >
                Seleccione problema
                <select class="seleccion">
                    <option disabled selected="">opciones a escojer</option>
                    <option class="op">Virus informatico</option>
                    <option class="op">Computadora lenta</option>
                    <option class="op">Exceso de porno</option>
                    <option class="op">Error </option>
                    <option class="op">Armado de PC</option>
                    <option class="op">Sale humo</option>
                </select>
            </form>
            <br><br>

            <input class="controls" type="datetime" name="day" id="day" placeholder="Ingrese el dia que quiere">
            <br><br>

            <form class="controls" name="hora" id="hora" >
                Seleccione hora deseada
                <select class="seleccion">
                    <option disabled selected="">opciones a escojer</option>
                    <option class="op">8 AM</option>
                    <option class="op">9 AM</option>
                    <option class="op">10 AM</option>
                    <option class="op">11 AM</option>
                    <option class="op">12 AM</option>
                    <option class="op">13 PM</option>
                    <option class="op">14 PM</option>
                    <option class="op">15 PM</option>
                    <option class="op">16 PM</option>
                </select>
            </form>
            <br><br>

            <form class="controls" name="mes" id="mes" >
                Seleccione mes deseado
                <select class="seleccion">
                    <option disabled selected="">opciones a escojer</option>
                    <option class="op">Enero</option>
                    <option class="op">Febrero</option>
                    <option class="op">Marzo</option>
                    <option class="op">Abril</option>
                    <option class="op">Mayo</option>
                    <option class="op">Junio</option>
                    <option class="op">Julio</option>
                    <option class="op">Agosto</option>
                    <option class="op">Septiembre</option>
                    <option class="op">Octubre</option>
                    <option class="op">Noviembre</option>
                    <option class="op">Diciembre</option>
                </select>
            </form>
            <br><br>

        <p>Estoy de acuerdo con <a href="#">Terminos y condiciones</a></p>
        <div>
            <a href="#" class="flecha izq"></a>
            <a href="#" class="flecha right"></a>
        </div>
        

    </section>

    </div>
</body>
</html>