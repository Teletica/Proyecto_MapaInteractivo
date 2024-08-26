<?php
include '../conexion.php';
include '../metodos.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $canton_id = $_POST['canton'];
    $tipo = $_POST['tipo'];

    $datos = array(
        'Nombre' => $nombre,
        'Descripcion' => $descripcion,
        'CantonID' => $canton_id,
        'Tipo' => $tipo
    );

    agregarRegistro('restaurantes', $datos);  
    echo '<meta http-equiv="refresh" content="0;url=' . $_SERVER['HTTP_REFERER'] . '">';

    $conn->close();
}
?>
