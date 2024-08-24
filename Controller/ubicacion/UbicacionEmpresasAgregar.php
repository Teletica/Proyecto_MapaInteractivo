<?php
include 'conexion.php';
include 'metodos.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $tipo_empresa = $_POST['tipo_empresa'];
    $provincia_id = $_POST['provincia_id'];

    $datos = array(
        'Nombre' => $nombre,
        'Direccion' => $direccion,
        'TipoEmpresa' => $tipo_empresa,
        'ProvinciaID' => $provincia_id
    );

    agregarRegistro('ubicacionesempresas', $datos);

    $conn->close();
}
?>
