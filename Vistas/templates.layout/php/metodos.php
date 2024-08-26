<?php
include 'conexion.php';

function obtenerDatos($tabla) {
    global $conn;
    $sql = "SELECT * FROM $tabla";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $datos = [];
        while ($row = $result->fetch_assoc()) {
            $datos[] = $row;
        }
        return $datos;
    } else {
        return [];
    }
}
?>