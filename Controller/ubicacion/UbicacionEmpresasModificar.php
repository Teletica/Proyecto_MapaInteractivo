<?php
include '../conexion.php';
include '../metodos.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $empresa_id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $direccion = $_POST['direccion'];
    $tipo_empresa = $_POST['tipo'];
    $provincia_id = $_POST['provincia_id'];

    $datos = array(
        'Nombre' => $nombre,
        'Direccion' => $direccion,
        'TipoEmpresa' => $tipo_empresa,
        'ProvinciaID' => $provincia_id
    );

    modificarRegistro('ubicacionesempresas', $datos, 'EmpresaID', $empresa_id);
    echo '<meta http-equiv="refresh" content="0;url=' . $_SERVER['HTTP_REFERER'] . '">';

    $conn->close();
}
?>
