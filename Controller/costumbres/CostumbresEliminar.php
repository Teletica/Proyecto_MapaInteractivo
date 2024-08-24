<?php
include 'conexion.php';
include 'metodos.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $costumbre_id = $_POST['costumbre_id'];

    eliminarRegistro('costumbresindigenas', 'CostumbreID', $costumbre_id);

    $conn->close();
}
?>
