<?php

$servername = "localhost";
$username = "root";
$password = "Seb.Kob30!";  // Asegúrate de que esta sea la contraseña correcta
$database = "Proyecto_MapaInteractivo";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
echo "Conexión exitosa";

echo "Hola";

?>
