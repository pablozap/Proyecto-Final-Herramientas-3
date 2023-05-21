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
    <form action="" method="post">
        <label for="usuario">INGRESE EL USUARIO:</label>
        <input type="text" name="user" id="usuario" placeholder="Anonymous">
        <label for="eventos">EVENTO A INSCRIBIR:</label>
            <select name="eventos" id="eventos">
                <?php 
                //Asi es como se imprimiria el resultado de la consulta al select, ya queda es que usted coloque las variables que necesite para que en vez de ser option, sean los eventos, y ya
                echo '<option value="Opcion1"> Option </option>';
                echo '<option value="Opcion2"> Option2 </option>';
                ?>
            </select>
            <input type="submit" value="INSCRIBIR" class="btn btn-primary" />
    </form>
    <button class="btn btn-primary"><a href="index.php" target="_blank" rel="noopener noreferrer">Inicio</a></button>
</body>
</html>