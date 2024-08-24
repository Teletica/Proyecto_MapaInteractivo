<?php
include 'conexion.php';
include 'metodos.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];

    $datos = array(
        'Nombre' => $nombre
    );

    agregarRegistro('provincias', $datos);  

    $conn->close();
}
?>
