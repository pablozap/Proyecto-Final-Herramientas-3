<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_asistencia";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn) {
  echo "la conexión se realizo correctamente";
}else {
    die("Conexión fallida: " . mysqli_connect_error());
}

?>