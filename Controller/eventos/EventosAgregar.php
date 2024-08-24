<?php
include 'conexion.php';
include 'metodos.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];
    $canton_id = $_POST['canton_id'];

    $datos = array(
        'Nombre' => $nombre,
        'Descripcion' => $descripcion,
        'FechaInicio' => $fecha_inicio,
        'FechaFin' => $fecha_fin,
        'CantonID' => $canton_id
    );

    agregarRegistro('eventos', $datos);  

    $conn->close();
}
?>
