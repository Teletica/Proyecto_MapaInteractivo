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

    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="../../../CSS/estilos.css" type="text/css" />
</head>
<body>
    
    <!-- Topbar Start -->
    <div class="container-fluid bg-light pt-3 d-none d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-center text-lg-left mb-2 mb-lg-0">
                    <div class="d-inline-flex align-items-center">
                        <p><i class="fa fa-envelope mr-2"></i>TurismoPuraVida@ufide.ac.cr</p>
                        <p class="text-body px-3">|</p>
                        <p><i class="fa fa-phone-alt mr-2"></i>+506 6017 1212</p>
                    </div>
                </div>
                <div class="col-lg-6 text-center text-lg-right">
                    <div class="d-inline-flex align-items-center">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


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
                        <a href="../../templates.layout/Destination.html" class="nav-item nav-link">Destinos</a>
                        <a href="../../templates.layout/php/cotizar.php" class="nav-item nav-link">Cotización</a>
                        <a href="../../templates.layout/Administrador.php" class="nav-item nav-link">Administrador</a>
                        <a href="login.html" class="nav-item nav-link active">Login</a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    <br><br>

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

    <br><br>       

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 py-5 px-sm-3 px-lg-5">
        <div class="row pt-5">
            <div class="col-lg-3 col-md-6 mb-5" style="margin-top: -0.7%;">
                <a href="" class="navbar-brand">
                    <h1 class="text-primary"><span class="text-white">TURISMO <br>COSTA RICA</span></h1>
                </a>
                <p style="text-align: justify; margin-right: 11%;">
                    Costa Rica ofrece <span class="verde">paisajes</span> impresionantes, 
                    <span class="verde">biodiversidad</span> única, y 
                    <span class="verde">experiencias inolvidables</span>. ¡Visítalo!</p>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="text-uppercase text-white mb-4">Quick Links</h5>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white-50 mb-2" href=""><i class="fa fa-angle-right mr-2"></i>Home</a>
                    <a class="text-white-50 mb-2" href=""><i class="fa fa-angle-right mr-2"></i>About Us</a>
                    <a class="text-white-50 mb-2" href=""><i class="fa fa-angle-right mr-2"></i>Services</a>
                    <a class="text-white-50 mb-2" href=""><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="text-uppercase text-white mb-4">Our Services</h5>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-white-50 mb-2" href=""><i class="fa fa-angle-right mr-2"></i>Travel Arrangement</a>
                    <a class="text-white-50 mb-2" href=""><i class="fa fa-angle-right mr-2"></i>Air Ticketing</a>
                    <a class="text-white-50 mb-2" href=""><i class="fa fa-angle-right mr-2"></i>Travel Insurance</a>
                    <a class="text-white-50 mb-2" href=""><i class="fa fa-angle-right mr-2"></i>Hotel Booking</a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h5 class="text-uppercase text-white mb-4">Contact Us</h5>
                <p><i class="fa fa-map-marker-alt mr-2"></i>123 Street, New York, USA</p>
                <p><i class="fa fa-phone-alt mr-2"></i>+012 345 67890</p>
                <p><i class="fa fa-envelope mr-2"></i>info@example.com</p>
            </div>
        </div>
    </div>
    <!-- Footer End -->

</body>
</html>

<?php
// Cerrar la conexión
$conn->close();
?>
