<?php
include 'conexion.php';
include 'metodos.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $restaurante_id = $_POST['restaurante_id'];

    eliminarRegistro('restaurantes', 'RestauranteID', $restaurante_id);

    $conn->close();
}
?>
