<?php
include 'conexion.php';
include 'metodos.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $provincia_id = $_POST['provincia_id'];

    eliminarRegistro('provincias', 'ProvinciaID', $provincia_id);

    $conn->close();
}
?>
