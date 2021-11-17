<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/formulario.css">
    <title>Formulario de problemas</title>


</head>

<body>
    <section class="form-register">
        <h4>
            <center>Formulario de problema</center>
        </h4>

        <form class="controls" name="select" id="select" method="get">
            Seleccione problema
            <select class="seleccion">
                <option disabled selected="">opciones a escojer</option>
                <option class="op">Virus informatico</option>
                <option class="op">Computadora lenta</option>
                <option class="op">Error </option>
                <option class="op">Armado de PC</option>
                <option class="op">Sale humo</option>
            </select>
        </form>
        <br>

        <form method="get" target="_blank">
            <imput class="controls" type="Color" name="colorField" value="#FFDD00" >
                <input class="controls" type="date" name="dataField" value="2021-02-25"> <br> <br>
                <input class="controls" type="time" name="limitetiempo" list="listalimitestiempo" value="2021-11-05TL2:00" step="-10">
        </form>
        <datalist id="listalimitestiempo">

            <option value="06:00" disabled>
            <option value="07:00">
            <option value="08:00">
            <option value="09:00">
            <option value="10:00">
            <option value="11:00">
            <option value="12:00">
            <option value="13:00">
            <option value="14:00">
            <option value="15:00">
            <option value="16:00">

        </datalist>

        <br><br>

        <div>
            <p>Estoy de acuerdo con <a href="#">Terminos y condiciones</a></p>
            <a href="#" class="flecha izq"></a>
            <a href="#" class="flecha right"></a>
        </div>

    </section>

</body>

</html>