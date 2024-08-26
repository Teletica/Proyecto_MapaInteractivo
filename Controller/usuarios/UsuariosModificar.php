<?php
include '../conexion.php';
include '../metodos.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario_id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $contraseña = $_POST['contraseña'];
    $tipo_usuario = $_POST['tipo_usuario'];

    $datos = array(
        'Nombre' => $nombre,
        'Correo' => $correo,
        'Contraseña' => $contraseña,
        'TipoUsuario' => $tipo_usuario
    );

    modificarRegistro('usuarios', $datos, 'UsuarioID', $usuario_id);
    echo '<meta http-equiv="refresh" content="0;url=' . $_SERVER['HTTP_REFERER'] . '">';

    $conn->close();
}
?>
