<?php
    include "conexion.php";
    if (isset($_POST["registrar"])) {
        $cedula = $_POST["cedula"];
        $nombre  = $_POST["nombre"];
        $apellidos  = $_POST["apellidos"];
        $email = $_POST["email"];
        $celular = $_POST["celular"];

        $registro_usuario = "INSERT INTO registro (cedula, nombre, apellidos, email, celular) VALUES ('$cedula', '$nombre', '$apellidos', '$email', '$celular');";
        if ($conn->query($registro_usuario)) {
            echo '<script>alert("El usuario ha sido registrado exitosamente");</script>';
        } else {
            echo '<script>alert("Error al registrar el usuario");</script>';
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style/style.css"/>
    <title>Registro</title>
</head>
<body >
    <form action="registro.php" method="post" class="registro">
        <div class="registro-contenedor">
            <label for="cedula">INGRESE SU CEDULA:</label>
            <input type="text" name="cedula" id="cedula" placeholder="1000000000" required/>
        </div>
        <div class="registro-contenedor">
            <label for="nombre">INGRESE SU NOMBRE:</label>
            <input type="text" name="nombre" id="nombre" placeholder="STIVEN" required/>
        </div>
        <div class="registro-contenedor">
            <label for="apellidos">INGRESE SUS APELLIDOS:</label>
            <input type="text" name="apellidos" id="apellidos" placeholder="ZAPATA NUÑEZ" required/>
        </div>
        <div class="registro-contenedor">
            <label for="email">INGRESE SU EMAIL:</label>
            <input type="email" name="email" id="email" placeholder="DIRECCION@MAIL.COM" required/>
        </div>
        <div class="registro-contenedor">
            <label for="celular">INGRESE SU CELULAR:</label>
            <input type="number" name="celular" id="celular" placeholder="3001234567" required/>
        </div>
        <input type="submit" value="REGISTRAR" name="registrar" class="btn btn-primary" style="width: 8%;"/>
        <a href="index.php" rel="noopener noreferrer"><input type="button" value="INICIO" class="btn btn-primary"></a>
    </form>
    
</body>
</html>