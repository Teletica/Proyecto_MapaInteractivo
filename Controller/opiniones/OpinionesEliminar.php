<?php
include '../conexion.php';
include '../metodos.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $opinion_id = $_POST['id'];

    eliminarRegistro('opiniones', 'OpinionID', $opinion_id);
    echo '<meta http-equiv="refresh" content="0;url=' . $_SERVER['HTTP_REFERER'] . '">';

    $conn->close();
}
?>
