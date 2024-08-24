<?php
include 'conexion.php';
include 'metodos.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $opinion_id = $_POST['opinion_id'];

    eliminarRegistro('opiniones', 'OpinionID', $opinion_id);

    $conn->close();
}
?>
