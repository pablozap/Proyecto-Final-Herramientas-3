<?php
    // $recibido = $_POST['eventos'];
    // echo "El elemento recibido es: " . $recibido;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css"/>
    <title>Inicio</title>
</head>
<body class="inicio">
    <form action="index.php" method="post" >
        <div class="cedula-contenedor">
            <label for="cedula">INGRESE CEDULA:</label>
            <input type="text" id="cedula" required/>
            <label for="eventos">EVENTOS A LOS QUE ESTÁ INSCRITO:</label>
            <select name="eventos" id="eventos">
                <?php 
                //Asi es como se imprimiria el resultado de la consulta al select, ya queda es que usted coloque las variables que necesite para que en vez de ser option, sean los eventos, y ya
                echo '<option value="Opcion1"> Option </option>';
                echo '<option value="Opcion2"> Option2 </option>';
                ?>
            </select>
        </div>
        <div class="botones-contenedor">
            <input type="submit" value="ENTRADA" name="entrada" class="btn btn-primary">
            <input type="submit" value="SALIDA" name="salida" class="btn btn-primary">
            <button class="btn btn-primary"><a href="metricas.html" target="_blank" rel="noopener noreferrer">VER METRICAS</a></button>
        </div>
        <div class="link-registro-contenedor">
            <p>¿Aun no te has registrado?</p>
            <button class="btn btn-primary"><a href="registro.html" target="_blank" rel="noopener noreferrer">REGISTRATE</a></button>
            <a href="evento.html">evento</a>
            <a href="inscripcion.php">inscripcion</a>
        </div>
    </form>
</body>
</html>