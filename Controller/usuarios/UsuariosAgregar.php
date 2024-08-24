<?php
include 'conexion.php';
include 'metodos.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    agregarRegistro('usuarios', $datos);

    $conn->close();
}
?>
