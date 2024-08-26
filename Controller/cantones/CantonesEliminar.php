<?php
include '../conexion.php';
include '../metodos.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $canton_id = $_POST['id'];

    eliminarRegistro('cantones', 'CantonID', $canton_id);

    $conn->close();
    echo '<meta http-equiv="refresh" content="0;url=' . $_SERVER['HTTP_REFERER'] . '">';

}
?>
