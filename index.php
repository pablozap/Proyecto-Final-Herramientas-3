<?php
    include "conexion.php";
    if (isset($_POST['entrada'])) {

        $cedula = $_POST['cedula'];
        $id_evento = $_POST['id_evento'];

        date_default_timezone_set('America/Bogota');

        $hora_ingreso = date('Y-m-d H:i:s');

        // Realizar la actualización en la base de datos
        $actualizar_hora_ingreso = "UPDATE inscripcion SET hora_ingreso = '$hora_ingreso' WHERE cedula = $cedula AND id_evento = $id_evento";

        if ($conn->query($actualizar_hora_ingreso) === TRUE) {
            echo '<script>alert("La hora de entrada ha sido registrada correctamente");</script>';
        } else {
            echo '<script>alert("Error al registrar la hora de entrada");</script>';
        }
    } 
    if (isset($_POST['salida'])) {

        $cedula = $_POST['cedula'];
        $id_evento = $_POST['id_evento'];

        // Verificar si la hora de ingreso está registrada
        $consulta_hora_ingreso = "SELECT hora_ingreso FROM inscripcion WHERE cedula = $cedula AND id_evento = $id_evento AND hora_ingreso IS NOT NULL ";
        $resultado_hora_ingreso = $conn->query($consulta_hora_ingreso);

        if ($resultado_hora_ingreso->num_rows > 0) {

            date_default_timezone_set('America/Bogota');

    
            $hora_salida = date('Y-m-d H:i:s');

            // Realizar la actualización en la base de datos
            $actualizar_hora_salida = "UPDATE inscripcion SET hora_salida = '$hora_salida' WHERE cedula = $cedula AND id_evento = $id_evento";

            if ($conn->query($actualizar_hora_salida) === TRUE) {
                echo '<script>alert("La hora de salida ha sido registrada correctamente.");</script>';
            } else {
                echo '<script>alert("Error al registrar la hora de salida");</script>';
            }
        } else {
            echo '<script>alert("No se puede registrar la hora de salida. La hora de ingreso no está registrada.");</script>';
        }
    }
    $consulta_eventos = "SELECT id_evento, nombre FROM evento";
    $resultado_eventos = $conn->query($consulta_eventos);
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
                <input type="text" id="cedula" name="cedula" required/>
                <label for="eventos">EVENTOS A LOS QUE ESTÁ INSCRITO:</label>
                <select name="id_evento" id="eventos" required>
                    <?php 
                        while ($row = $resultado_eventos->fetch_assoc()) {
                            $id_evento = $row['id_evento'];
                            $nombre_evento = $row['nombre'];
                            echo '<option value="' . $id_evento . '">' . $nombre_evento . '</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="botones-contenedor">
                <input type="submit" value="ENTRADA" name="entrada" class="btn btn-primary">
                <input type="submit" value="SALIDA" name="salida" class="btn btn-primary">
            </div>
            <a href="metricas.php" rel="noopener noreferrer"><input type="button" value="VER METRICAS" class="btn btn-primary"></a>
            <div class="link-registro-contenedor">
                <p>¿Necesitas registrar algo?</p>
                <a href="registro.php" rel="noopener noreferrer"><input type="button" value="USUARIO" class="btn btn-primary"></a>
                <a href="evento.php"><input type="button" value="EVENTO" class="btn btn-primary"></a>
                <a href="inscripcion.php"><input type="button" value="INSCRIPCION" class="btn btn-primary"></a>
            </div>
        </form>
    </body>
</html>