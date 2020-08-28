<?php
include_once "db.php";
$id = $_GET["id"];
if (empty($id)) {
    exit("No existe el parámetro id en la URL");
}

$sentencia = $conn->prepare("SELECT foto FROM fotos WHERE id = ?");
$sentencia->execute([$id]);
$foto = $sentencia->fetchObject();
if (!$foto) {
    exit("No hay foto con ese ID");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foto Desde Base de Datos</title>
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>
<body>
    <div class="container text-center">
    <h1>Foto:</h1>
    <img src="data:image/png;base64,<?php echo $foto->foto; ?>">
    </div>
    <hr class="my-4">
    <div class="alert alert-primary" role="alert">
        Dev by JkDev
    </div>
</body>
</html>
