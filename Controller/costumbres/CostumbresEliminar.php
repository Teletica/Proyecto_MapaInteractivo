<?php
include '../conexion.php';
include '../metodos.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $costumbre_id = $_POST['costumbre_id'];

    eliminarRegistro('costumbresindigenas', 'CostumbreID', $costumbre_id);
    echo '<meta http-equiv="refresh" content="0;url=' . $_SERVER['HTTP_REFERER'] . '">';

    $conn->close();
}
?>
