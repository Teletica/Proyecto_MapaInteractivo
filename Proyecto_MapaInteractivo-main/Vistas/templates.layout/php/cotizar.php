<?php
include '../php/conexion.php';

$resultado = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos del formulario
    $presupuesto = (int) $_POST['presupuesto'];
    $personas = (int) $_POST['personas'];
    $noches = (int) $_POST['noches'];
    $provincia = $_POST['provincia'];

    $presupuesto_por_persona = $presupuesto / $personas;
    $tasa_cambio = 535; 

    $sql = "SELECT nombre_hotel, precio_noche, categoria_estrellas, provincia, comentarios, canasta_basica, id_hotel 
            FROM cotizaciones 
            WHERE precio_noche <= ? AND provincia = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $presupuesto_por_persona, $provincia);
    $stmt->execute();
    $resultado = $stmt->get_result();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cotización de Hoteles</title>
    <link rel="stylesheet" href="../../../CSS/estilos.css" type="text/css" />
</head>
<body>
    <!-- Navbar Start -->
    <div class="container-fluid position-relative nav-bar p-0">
        <div class="container-lg position-relative p-0 px-lg-3" style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-light navbar-light shadow-lg py-3 py-lg-0 pl-3 pl-lg-5">
                <a href="/Proyecto_MapaInteractivo/Vistas/templates/index.php" class="navbar-brand">
                    <h1 id="title" class="m-0 text-primary text-dark">TURISMO COSTA RICA</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                    <div class="navbar-nav ml-auto py-0">
                        <a href="login.html" class="nav-item nav-link active">Login</a>
                        <a href="../templates.layout/Destination.html" class="nav-item nav-link">Destinos</a>
                        <a href="../templates.layout/Services.html" class="nav-item nav-link">Servicios</a>
                        <a href="../templates.layout/cotizacion.html" class="nav-item nav-link">Cotización</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Páginas</a>
                            <div class="dropdown-menu border-0 rounded-0 m-0">
                                <a href="blog.html" class="dropdown-item">Guía</a>
                                <a href="single.html" class="dropdown-item">Lugares famosos</a>
                                <a href="destination.html" class="dropdown-item">Destinos</a>
                                <a href="guide.html" class="dropdown-item">Guías de viaje</a>
                                <a href="testimonial.html" class="dropdown-item">Reseñas</a>
                            </div>
                        </div>
                        <a href="contact.html" class="nav-item nav-link">Contacto</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    <section class="centered-form">
        <div class="quote-container">
            <h1>Calcula tu Presupuesto</h1>
            <form action="" method="post" id="quote-form">
                <div class="form-group">
                    <label for="presupuesto">Presupuesto total (₡):</label>
                    <input type="number" id="presupuesto" name="presupuesto" required>
                </div>
                <div class="form-group">
                    <label for="personas">Cantidad de personas:</label>
                    <input type="number" id="personas" name="personas" required>
                </div>
                <div class="form-group">
                    <label for="noches">Cantidad de noches:</label>
                    <input type="number" id="noches" name="noches" required>
                </div>
                <div class="form-group">
                    <label for="provincia">Provincia:</label>
                    <select id="provincia" name="provincia" required>
                        <option value="">Seleccione una provincia</option>
                        <option value="San José">San José</option>
                        <option value="Alajuela">Alajuela</option>
                        <option value="Cartago">Cartago</option>
                        <option value="Heredia">Heredia</option>
                        <option value="Guanacaste">Guanacaste</option>
                        <option value="Puntarenas">Puntarenas</option>
                        <option value="Limón">Limón</option>
                    </select>
                </div>
                <input type="submit" value="Obtener Cotización" class="submit-button">
            </form>
        </div>
    </section>

    <?php if ($resultado && $resultado->num_rows > 0): ?>
        <section class="quote-results">
            <h2>Hoteles dentro de tu presupuesto en <?php echo htmlspecialchars($provincia); ?>:</h2>
            <?php while ($row = $resultado->fetch_assoc()): ?>
                <?php
                $precio_noche_dolares = $row["precio_noche"];
                $precio_noche_colones = $precio_noche_dolares * $tasa_cambio;
                $gasto_total_dolares = $precio_noche_dolares * $personas * $noches;
                $gasto_total_colones = $precio_noche_colones * $personas * $noches;

                
                $canasta_basica_total_colones = $row["canasta_basica"];
                $costo_promedio_plato_colones = $canasta_basica_total_colones / 4;
                $gasto_total_comidas_colones = $costo_promedio_plato_colones * $personas * $noches * 3;

                $costo_promedio_plato_dolares = $costo_promedio_plato_colones / $tasa_cambio;
                $gasto_total_comidas_dolares = $gasto_total_comidas_colones / $tasa_cambio;

               
                $presupuesto_por_dia_dolares = ($gasto_total_dolares + $gasto_total_comidas_dolares) / $noches;
                $presupuesto_por_dia_colones = ($gasto_total_colones + $gasto_total_comidas_colones) / $noches;

              
                $dinero_restante_sin_comida_colones = $presupuesto - $gasto_total_colones;
                $dinero_restante_con_comida_colones = $dinero_restante_sin_comida_colones - $gasto_total_comidas_colones;

               
                $dinero_restante_sin_comida_dolares = $dinero_restante_sin_comida_colones / $tasa_cambio;
                $dinero_restante_con_comida_dolares = $dinero_restante_con_comida_colones / $tasa_cambio;

               
                $sql_comentarios = "SELECT id_comentario, comentario, likes FROM comentarios WHERE id_hotel = ?";
                $stmt_comentarios = $conn->prepare($sql_comentarios);
                $stmt_comentarios->bind_param("i", $row['id_hotel']);
                $stmt_comentarios->execute();
                $resultado_comentarios = $stmt_comentarios->get_result();
                ?>
               <div class="hotel-card">
                    <h3><?php echo htmlspecialchars($row["nombre_hotel"]); ?></h3>
                    <p><strong>Categoría:</strong> <?php echo htmlspecialchars($row["categoria_estrellas"]); ?></p>
                    <p><strong>Provincia:</strong> <?php echo htmlspecialchars($row["provincia"]); ?></p>
                    <p><strong>Ubicación:</strong> <?php echo htmlspecialchars($row["comentarios"]); ?></p>

                    <div class="cost-container">
                        <div class="cost-div">
                            <h4>Gastos en Dólares:</h4>
                            <p><strong>Precio por noche:</strong> $<?php echo number_format($precio_noche_dolares, 2, '.', ','); ?></p>
                            <p><strong>Gasto total para <?php echo $personas; ?> personas por <?php echo $noches; ?> noches:</strong> $<?php echo number_format($gasto_total_dolares, 2, '.', ','); ?></p>
                            <h4>Dinero restante:</h4>
                            <p><strong>Sin comida:</strong> $<?php echo number_format($dinero_restante_sin_comida_dolares, 2, '.', ','); ?></p>
                            <p><strong>Con comida:</strong> $<?php echo number_format($dinero_restante_con_comida_dolares, 2, '.', ','); ?> ($<?php echo number_format($dinero_restante_con_comida_dolares / $personas, 2, '.', ','); ?> por persona)</p>
                            <h4>Gastos en alimentación:</h4>
                            <p><strong>Costo promedio por plato:</strong> $<?php echo number_format($costo_promedio_plato_dolares, 2, '.', ','); ?></p>
                            <p><strong>Gasto total en comidas para <?php echo $personas; ?> personas por <?php echo $noches; ?> noches:</strong> $<?php echo number_format($gasto_total_comidas_dolares, 2, '.', ','); ?></p>
                            <h4>Presupuesto por Día:</h4>
                            <p><strong>Presupuesto por día (dólares):</strong> $<?php echo number_format($presupuesto_por_dia_dolares, 2, '.', ','); ?></p>
                        </div>

                        <div class="cost-div">
                            <h4>Gastos en Colones:</h4>
                            <p><strong>Precio por noche:</strong> ₡<?php echo number_format($precio_noche_colones, 0, ',', '.'); ?></p>
                            <p><strong>Gasto total para <?php echo $personas; ?> personas por <?php echo $noches; ?> noches:</strong> ₡<?php echo number_format($gasto_total_colones, 0, ',', '.'); ?></p>
                            <h4>Dinero restante:</h4>
                            <p><strong>Sin comida:</strong> ₡<?php echo number_format($dinero_restante_sin_comida_colones, 0, ',', '.'); ?></p>
                            <p><strong>Con comida:</strong> ₡<?php echo number_format($dinero_restante_con_comida_colones, 0, ',', '.'); ?> (₡<?php echo number_format($dinero_restante_con_comida_colones / $personas, 0, ',', '.'); ?> por persona)</p>
                            <h4>Gastos en alimentación:</h4>
                            <p><strong>Costo promedio por plato:</strong> ₡<?php echo number_format($costo_promedio_plato_colones, 0, ',', '.'); ?></p>
                            <p><strong>Gasto total en comidas para <?php echo $personas; ?> personas por <?php echo $noches; ?> noches:</strong> ₡<?php echo number_format($gasto_total_comidas_colones, 0, ',', '.'); ?></p>
                            <h4>Presupuesto por Día:</h4>
                            <p><strong>Presupuesto por día (colones):</strong> ₡<?php echo number_format($presupuesto_por_dia_colones, 0, ',', '.'); ?></p>
                        </div>
                    </div>

                    <!-- Sección de Comentarios -->
                    <div class="comments-list">
                        <h4>Comentarios de Usuarios:</h4>
                        <form action="../php/comentarios.php" method="post">
                            <textarea name="comentario" placeholder="Escribe tu comentario aquí..." required></textarea>
                            <input type="hidden" name="id_hotel" value="<?php echo $row['id_hotel']; ?>">
                            <button type="submit">Enviar Comentario</button>
                        </form>

                        <?php while ($comentario = $resultado_comentarios->fetch_assoc()): ?>
                            <div class="comment">
                                <p><?php echo htmlspecialchars($comentario['comentario']); ?></p>
                                <button class="like-button" data-id="<?php echo $comentario['id_comentario']; ?>">Like (<?php echo $comentario['likes']; ?>)</button>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
                <hr>
            <?php endwhile; ?>
        </section>
    <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <p>No se encontraron hoteles dentro de tu presupuesto en <?php echo htmlspecialchars($provincia); ?>.</p>
    <?php endif; ?>

</body>
</html>

<?php
// Cerrar la conexión
$conn->close();
?>
