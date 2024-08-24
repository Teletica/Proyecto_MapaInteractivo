<?php

$server = "localhost";
$user = "root";
$pass = "03062005";
$db = "Proyecto_MapaInteractivo";

// Crear la conexión
$conn = new mysqli($server, $user, $pass, $db);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


?>

