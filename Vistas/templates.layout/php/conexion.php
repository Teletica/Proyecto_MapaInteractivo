<?php

$server = "localhost";
$user = "root";
$pass = "";
$db = "proyecto_mapainteractivo";

// Crear la conexión
$conn = new mysqli($server, $user, $pass, $db);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


?>

