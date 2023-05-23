<?php
    include "conexion.php";

    if(isset($_POST["inscribir"])) {
        $cedula = $_POST["cedula"];
        $id_evento = $_POST["id_evento"];

        // Verificar si la cédula existe en la tabla registro
        $consulta_cedula = "SELECT * FROM registro WHERE cedula = '$cedula'";
        $resultado_cedula = $conn->query($consulta_cedula);
    
        if ($resultado_cedula->num_rows > 0) {
            // La cédula existe en la tabla registro, realizar la inscripción
            $registro_evento = "INSERT INTO inscripcion (id_evento, cedula) VALUES ('$id_evento', '$cedula');";
            if ($conn->query($registro_evento)) {
                echo '<script>alert("Ha sido inscrito correctamente");</script>';
            } else {
                echo '<script>alert("Error al inscribirse en el evento: ' . mysqli_error($conn) . '");</script>';
            }
        } else {
            echo '<script>alert("La cédula proporcionada no se encuentra registrada");</script>';
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
    <title>Inscripcion a evento</title>
</head>
<body>
    <form action="" method="post" class="inscripcion">
        <label for="cedula">INGRESE LA CEDULA:</label>
        <input type="text" name="cedula" id="cedula" placeholder="1000000000">
        <label for="eventos">EVENTO A INSCRIBIR:</label>
            <select name="id_evento" id="eventos">
                <?php 
                    while ($row = $resultado_eventos->fetch_assoc()) {
                        $id_evento = $row['id_evento'];
                        $nombre_evento = $row['nombre'];
                        echo '<option value="' . $id_evento . '">' . $nombre_evento . '</option>';
                    }
                ?>
            </select>
            <div class="botones-contenedor">
                <input type="submit" value="INSCRIBIR", name= "inscribir", class="btn btn-primary" />
                <a href="index.php"  rel="noopener noreferrer"><input type="button" value="INICIO" class="btn btn-primary"/></a>
            </div>  
    </form>
</body>
</html>

