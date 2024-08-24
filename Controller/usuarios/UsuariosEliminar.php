<?php
include 'conexion.php';
include 'metodos.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario_id = $_POST['usuario_id'];

    eliminarRegistro('usuarios', 'UsuarioID', $usuario_id);

    $conn->close();
}
?>
