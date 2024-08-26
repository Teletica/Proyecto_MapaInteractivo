<?php
include '../conexion.php';
include '../metodos.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $restaurante_id = $_POST['id'];

    eliminarRegistro('restaurantes', 'RestauranteID', $restaurante_id);
    echo '<meta http-equiv="refresh" content="0;url=' . $_SERVER['HTTP_REFERER'] . '">';

    $conn->close();
}
?>
