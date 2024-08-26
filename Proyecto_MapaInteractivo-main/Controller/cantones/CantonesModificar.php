<?php
include '../conexion.php';
include '../metodos.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $canton_id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $provincia_id = $_POST['provincia_id'];
    $img = $_POST['imagen'];
    $descripcion = $_POST['descripcion'];

    $datos = array(
        'Nombre' => $nombre,
        'ProvinicaID' => $provincia_id,
        'Img' => $img,
        'Descripcion' => $descripcion
    );

    modificarRegistro('cantones', $datos, 'CantonID', $canton_id);

    $conn->close();
    echo '<meta http-equiv="refresh" content="0;url=' . $_SERVER['HTTP_REFERER'] . '">';

}
?>
