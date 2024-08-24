<?php
include 'conexion.php';
include 'metodos.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $canton_id = $_POST['canton_id'];

    eliminarRegistro('cantones', 'CantonID', $canton_id);

    $conn->close();
}
?>
