<?php
include '../conexion.php';
include '../metodos.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $opinion_id = $_POST['id'];
    $usuario_id = $_POST['usuario'];
    $atraccion_id = $_POST['atraccion_id'];
    $comentario = $_POST['comentario'];
    $calificacion = $_POST['calificacion'];

    $datos = array(
        'UsuarioID' => $usuario_id,
        'AtraccionID' => $atraccion_id,
        'Comentario' => $comentario,
        'Calificacion' => $calificacion
    );

    modificarRegistro('opiniones', $datos, 'OpinionID', $opinion_id);
    echo '<meta http-equiv="refresh" content="0;url=' . $_SERVER['HTTP_REFERER'] . '">';

    $conn->close();
}
?>
