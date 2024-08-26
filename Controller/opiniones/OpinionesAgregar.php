<?php
include '../conexion.php';
include '../metodos.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario_id = $_POST['usuario_id'];
    $atraccion_id = $_POST['atraccion_id'];
    $comentario = $_POST['comentario'];
    $calificacion = $_POST['calificacion'];

    $datos = array(
        'UsuarioID' => $usuario_id,
        'AtraccionID' => $atraccion_id,
        'Comentario' => $comentario,
        'Calificacion' => $calificacion
    );

    agregarRegistro('opiniones', $datos);  
    echo '<meta http-equiv="refresh" content="0;url=' . $_SERVER['HTTP_REFERER'] . '">';

    $conn->close();
}
?>
