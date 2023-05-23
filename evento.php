<?php
    include "conexion.php";
    if(isset($_POST["registrar_evento"])) {
        $nombre_evento = $_POST["evento"];
        $direccion = $_POST["direccion"];
        $fecha = $_POST["fecha"];

        $registro_evento = "INSERT INTO evento (nombre, direccion, fecha) VALUES ('$nombre_evento', '$direccion', '$fecha')";
        if ($conn->query($registro_evento)) {
            echo '<script>alert("El evento se ha regsitrado exitosamente");</script>';
        } else {
            echo '<script>alert("Error al registrar el evento: ");</script>';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css"/>
    <title>Nuevo Evento</title>
</head>
<body>
    <form action="" method="post" class="evento-contenedor">
        <label for="evento">NOMBRE DEL EVENTO: </label>
        <input type="text" name="evento" placeholder="EJEMPLO: CONCIERTO ARTISTA" id="evento" required/>
        <label for="direccion">DIRECCION DEL EVENTO: </label>
        <input type="text" name="direccion" placeholder="EJEMPLO: AV 42 C # 99-99" id="direccion" required/>
        <label for="fecha">FECHA DEL EVENTO: </label>
        <input type="date" name="fecha" id="fecha" required/>
        <div class="botones-contenedor">
            <input type="submit" value="REGISTRAR EVENTO" name="registrar_evento" class="btn btn-primary">
            <a href="index.php" rel="noopener noreferrer"><input type="button" value="INICIO" class="btn btn-primary"/></a>
        </div>
        
    </form>
</body>
</html>