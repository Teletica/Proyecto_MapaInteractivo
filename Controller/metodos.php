<?php
include 'conexion.php';

function agregarRegistro($tabla, $datos) {
    global $conn;
    $columnas = implode(", ", array_keys($datos));
    $valores = implode(", ", array_map(function($item) {
        return "'$item'";
    }, array_values($datos)));

    $sql = "INSERT INTO $tabla ($columnas) VALUES ($valores)";

    if ($conn->query($sql) === TRUE) {
    } else {
    }
}

function modificarRegistro($tabla, $datos, $id_columna, $id) {
    global $conn;
    $set = implode(", ", array_map(function($columna, $valor) {
        return "$columna='$valor'";
    }, array_keys($datos), $datos));

    $sql = "UPDATE $tabla SET $set WHERE $id_columna=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Registro actualizado exitosamente en $tabla";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

function eliminarRegistro($tabla, $id_columna, $id) {
    global $conn;

    $sql = "DELETE FROM $tabla WHERE $id_columna=$id";

    if ($conn->query($sql) === TRUE) {
    } else {
    }
}


?>