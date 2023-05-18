<?php
     include "conexion.php";
    if(isset ($_POST["registrar"])){
        $cedula = $_POST["cedula"];
        $evento = $_POST["evento"];
        $nombre  = $_POST["nombre"];
        $apellidos  = $_POST["apellidos"];
        $email = $_POST["email"];
        $celular = $_POST["celular"];

        $registro_evento = " INSERT INTO registro (cedula, evento, nombre, apellidos, email, celular) VALUES ('$cedula', '$evento', '$nombre', '$apellidos', '$email', '$celular');";
        if ($conn->query($registro_evento)) {
            echo "Ha sido registrado en el evento exitosamente";
          } else {
            echo "Error al registrarse en el evento: " . mysqli_error($conn);
          }
       
    } 

?>