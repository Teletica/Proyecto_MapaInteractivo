<?php
include 'conexion.php';
include 'metodos.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $canton_id = $_POST['canton_id'];
    $tipo = $_POST['tipo'];

    $datos = array(
        'Nombre' => $nombre,
        'Descripcion' => $descripcion,
        'CantonID' => $canton_id,
        'Tipo' => $tipo
    );

    modificarRegistro('atracciones', $datos, 'id', $id);

    $conn->close();
    echo '<meta http-equiv="refresh" content="0;url=' . $_SERVER['HTTP_REFERER'] . '">';
}
?>
