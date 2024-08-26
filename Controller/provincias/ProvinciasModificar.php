<?php
include '../conexion.php';
include '../metodos.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $provincia_id = $_POST['id'];
    $nombre = $_POST['nombre'];

    $datos = array(
        'Nombre' => $nombre
    );

    modificarRegistro('provincias', $datos, 'ProvinciaID', $provincia_id);
    echo '<meta http-equiv="refresh" content="0;url=' . $_SERVER['HTTP_REFERER'] . '">';

    $conn->close();
}
?>
