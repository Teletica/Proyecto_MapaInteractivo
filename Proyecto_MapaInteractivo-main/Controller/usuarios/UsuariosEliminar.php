<?php
include '../conexion.php';
include '../metodos.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario_id = $_POST['id'];

    eliminarRegistro('usuarios', 'UsuarioID', $usuario_id);
    echo '<meta http-equiv="refresh" content="0;url=' . $_SERVER['HTTP_REFERER'] . '">';

    $conn->close();
}
?>
