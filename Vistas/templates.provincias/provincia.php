<?php
//include 'Proyecto_MapaInteractivo/Vistas/templates.layout/php/conexion.php';

if (isset($_GET['provincia'])) {
    // Obtener la provincia
    $provincia = htmlspecialchars($_GET['provincia']);
} else {
    $provincia = 'No se ha seleccionado ninguna provincia';
}
?>

<!DOCTYPE html>
<html>
    <head>
    </head>
    <body>
        <h1> <?php echo $provincia; ?></h1>
    </body>
</html>