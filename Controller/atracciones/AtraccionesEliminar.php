<?php
include '../conexion.php';
include '../metodos.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id']; 

    eliminarRegistro('atracciones', 'AtraccionID', $id);

    $conn->close();
    echo '<meta http-equiv="refresh" content="0;url=' . $_SERVER['HTTP_REFERER'] . '">';

}
?>
