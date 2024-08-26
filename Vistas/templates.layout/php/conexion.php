<?php

$server = "localhost";
$user = "root";
<<<<<<< Updated upstream
$pass = "";
$db = "proyecto_mapainteractivo";
=======
<<<<<<< HEAD
$pass = "Seb.Kob30!";
$db = "Proyecto_MapaInteractivo";
=======
$pass = "";
$db = "proyecto_mapainteractivo";
>>>>>>> 1502f6c1958bcebbbff8deafd17afc9bc70e1d3e
>>>>>>> Stashed changes

// Crear la conexión
$conn = new mysqli($server, $user, $pass, $db);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


?>


