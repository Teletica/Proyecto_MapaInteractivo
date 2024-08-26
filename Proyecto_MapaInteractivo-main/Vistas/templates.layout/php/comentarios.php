<?php
// Incluir la conexión a la base de datos
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $comentario = $_POST['comentario'];
    $id_hotel = (int) $_POST['id_hotel'];

    // Insertar el comentario en la base de datos
    $sql = "INSERT INTO comentarios (id_hotel, comentario) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $id_hotel, $comentario);
    $stmt->execute();

    // Redirigir de vuelta a la página de cotización
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}
?>