<?php
include 'conexion.php';
include 'metodos.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $provincia_id = $_POST['provincia_id'];
    $nombre = $_POST['nombre'];

    $datos = array(
        'Nombre' => $nombre
    );

    modificarRegistro('provincias', $datos, 'ProvinciaID', $provincia_id);

    $conn->close();
}
?>
