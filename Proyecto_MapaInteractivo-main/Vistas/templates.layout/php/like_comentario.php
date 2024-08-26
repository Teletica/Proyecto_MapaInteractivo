<?php
// Incluir la conexión a la base de datos
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_comentario = (int) $_POST['id_comentario'];

    // Incrementar el número de likes en la base de datos
    $sql = "UPDATE comentarios SET likes = likes + 1 WHERE id_comentario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_comentario);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error";
    }
    
    $stmt->close();
}

$conn->close();
?>
