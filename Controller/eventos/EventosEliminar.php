<?php
include 'conexion.php';
include 'metodos.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $evento_id = $_POST['evento_id'];

    eliminarRegistro('eventos', 'EventoID', $evento_id);

    $conn->close();
}
?>
