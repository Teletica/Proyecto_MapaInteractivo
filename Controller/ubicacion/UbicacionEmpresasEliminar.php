<?php
include 'conexion.php';
include 'metodos.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $empresa_id = $_POST['empresa_id'];

    eliminarRegistro('ubicacionesempresas', 'EmpresaID', $empresa_id);

    $conn->close();
}
?>
