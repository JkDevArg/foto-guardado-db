<?php

$imgCodificada = file_get_contents("php://input");
if(strlen($imgCodificada) <= 0) exit("No se recibió ninguna imagen");


$imgCodificadaClean = str_replace("data:image/png;base64,", "", urldecode($imgCodificada));
$imgCodificada = base64_decode($imgCodificadaClean);

include_once "db.php";
$sentencia = $conn->prepare("INSERT INTO fotos(foto) VALUES(?)");
$sentencia->execute([$imgCodificadaClean]);
$id = $conn->lastInsertId();

exit($id);
?>
