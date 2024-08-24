<?php
include 'conexion.php';
include 'metodos.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $grupo_etnico = $_POST['grupo_etnico'];
    $provincia_id = $_POST['provincia_id'];

    $datos = array(
        'Nombre' => $nombre,
        'Descripcion' => $descripcion,
        'GrupoEtnico' => $grupo_etnico,
        'ProvinciaID' => $provincia_id
    );

    agregarRegistro('costumbresindigenas', $datos);  

    $conn->close();
