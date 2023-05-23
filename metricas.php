<?php
    include "conexion.php";

    $consulta_eventos = "SELECT id_evento, nombre FROM evento";
    $resultado_eventos = $conn->query($consulta_eventos);

    if (isset($_POST["visualizar"])) {
        $id_evento_seleccionado = $_POST["id_evento"];

        // Realizar consulta para contar la asistencia total
        $consulta_asistencia = "SELECT COUNT(*) AS total_asistencia FROM inscripcion WHERE id_evento = $id_evento_seleccionado AND hora_ingreso IS NOT NULL AND hora_salida IS NOT NULL";
        $total_asistencia_result = $conn->query($consulta_asistencia);
        $total_asistencia_row = $total_asistencia_result->fetch_assoc();
        $total_asistencia = $total_asistencia_row['total_asistencia'];

        // Realizar consulta para calcular el tiempo promedio de permanencia
        $consulta_inscripciones = "SELECT hora_ingreso, hora_salida FROM inscripcion WHERE id_evento = $id_evento_seleccionado";
        $resultado_inscripciones = $conn->query($consulta_inscripciones);

        $tiempo_total_permanencia = 0;
        $contador_filas = 0;

        while ($row = $resultado_inscripciones->fetch_assoc()) {
            $hora_ingreso = $row['hora_ingreso'];
            $hora_salida = $row['hora_salida'];

            $diferencia = strtotime($hora_salida) - strtotime($hora_ingreso);
            $tiempo_total_permanencia += $diferencia;
            $contador_filas++;
        }

        $tiempo_promedio_permanencia = $contador_filas > 0 ? $tiempo_total_permanencia / $contador_filas / 3600 : 0;
        $tiempo_promedio_permanencia = number_format($tiempo_promedio_permanencia, 2);
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
    <title>Metricas</title>
</head>
<body class="metricas">
<form action="metricas.php" method="post" class="metricas-contenedor">
    <div class="metricas-eventos">
        <label for="evento">SELECCIONE EL EVENTO A VISUALIZAR:</label>
        <select name="id_evento" id="eventos" required>
            <?php 
                while ($row = $resultado_eventos->fetch_assoc()) {
                    $id_evento = $row['id_evento'];
                    $nombre_evento = $row['nombre'];
                    $selected = isset($_POST["id_evento"]) && $_POST["id_evento"] == $id_evento ? "selected" : "";
                    echo '<option value="' . $id_evento . '" ' . $selected . '>' . $nombre_evento . '</option>';
                }   
            ?>
        </select>
        <input type="submit" value="VISUALIZAR" name= "visualizar" class="btn btn-primary" />
    </div>
    <div class="metricas-grafica">
        <img src="./style/check.png" alt="check-image" class="metricas-imagen"/>
        <img src="./style/time.png" alt="time-image" class="metricas-imagen"/>
        <div class="metricas-informacion">
            <?php
                if (isset($total_asistencia)) {
                    echo '<center><p class="metricas-texto">La asistencia total fue de '.$total_asistencia.' personas</p></center>';
                }
            ?>
            <?php
                if (isset($tiempo_promedio_permanencia)) {
                    echo '<center><p class="metricas-texto">El tiempo promedio de permanencia fue de '. $tiempo_promedio_permanencia.' horas </p></center>';
                }
            ?>
        </div>
    </div> 
    <a href="index.php"  rel="noopener noreferrer"><input type="button" value="INICIO" class="btn btn-primary"/></a>
</body>
</html>