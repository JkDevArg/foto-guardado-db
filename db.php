<?php
$pass = "";
$user = "root";
$db = "fotos";
try{
	$conn = new PDO('mysql:host=localhost;dbname=' . $db, $user, $pass);
	$conn->query("set names utf8;");
    $conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}catch(Exception $e){
	echo "Error: " . $e->getMessage();
}
