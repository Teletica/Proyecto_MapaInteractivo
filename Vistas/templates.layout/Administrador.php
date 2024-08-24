<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-6">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRAVELER - Free Travel Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet"> 

    <link href="/Proyecto_MapaInteractivo/CSS/estilos.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="script.js"></script>
    <link rel="stylesheet" href="../CCSS" type="text/css" />
    <script src="/Proyecto_MapaInteractivo/JS/script.js"></script>

    <!-- Customized Bootstrap Stylesheet -->
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
                    <h1 id="title" class="m-0 text-primary text-dark">
                        TURISMO COSTA RICA</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                    <div class="navbar-nav ml-auto py-0">
                        <a href="login.html" class="nav-item nav-link active">Login</a>
                        <a href="../templates.layout/Destination.html" class="nav-item nav-link">Destinos</a>
                        <a href="../templates.layout/Services.html" class="nav-item nav-link">Servicios</a>
                        <a href="../templates.layout/Administrador.html" class="nav-item nav-link">Administrador</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Paginas</a>
                            <div class="dropdown-menu border-0 rounded-0 m-0">
                                <a href="blog.html" class="dropdown-item">Guia</a>
                                <a href="single.html" class="dropdown-item">Lugares famosos</a>
                                <a href="destination.html" class="dropdown-item">Destinos</a>
                                <a href="guide.html" class="dropdown-item">Guias de viaje</a>
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

    <div class="container mt-5">
    <h1>Administrar Datos</h1>
    <div class="form-group">
        <label for="tablaSelect">Seleccionar Tabla:</label>
        <select id="tablaSelect" class="form-control">
            <option value="">Selecciona una opción</option>
            <option value="atracciones">Atracciones</option>
            <option value="cantones">Cantones</option>
            <option value="costumbresindigenas">Costumbres Indígenas</option>
            <option value="eventos">Eventos</option>
            <option value="opiniones">Opiniones</option>
            <option value="provincias">Provincias</option>
            <option value="restaurantes">Restaurantes</option>
            <option value="ubicacionesempresas">Ubicaciones Empresas</option>
            <option value="usuarios">Usuarios</option>
        </select>
    </div>

    <div id="formSections">
        <!-- Formulario Atracciones -->
        <div id="atracciones" class="form-section">
            <?php
            include 'php/conexion.php';
            include 'php/metodos.php';

            $atracciones = obtenerDatos('atracciones');

            $conn->close();
            ?>
            <div class="form-group">
                <h1 class="mt-4">Listado de Atracciones</h1>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>ID del Cantón</th>
                            <th>Tipo</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($atracciones) > 0): ?>
                            <?php foreach ($atracciones as $atraccion): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($atraccion['AtraccionID']); ?></td>
                                    <td><?php echo htmlspecialchars($atraccion['Nombre']); ?></td>
                                    <td><?php echo htmlspecialchars($atraccion['Descripcion']); ?></td>
                                    <td><?php echo htmlspecialchars($atraccion['CantonID']); ?></td>
                                    <td><?php echo htmlspecialchars($atraccion['Tipo']); ?></td>
                                    <td>
                                    <form action="/Proyecto_MapaInteractivo/Controller/atracciones/AtraccionesEliminar.php" method="post" style="display:inline;">
                                        <input type="hidden" name="id" value="<?php echo htmlspecialchars($atraccion['AtraccionID']); ?>">
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5">No hay atracciones disponibles</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <form action="/Proyecto_MapaInteractivo/Controller/atracciones/AtraccionesAgregar.php" method="post">
                <div class="form-group">
                    <label for="nombre_atraccion">Nombre de la Atracción:</label>
                    <input type="text" id="nombre_atraccion" name="nombre" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="descripcion_atraccion">Descripción:</label>
                    <input type="text" id="descripcion_atraccion" name="descripcion" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="canton_id_atraccion">ID del Cantón:</label>
                    <input type="number" id="canton_id_atraccion" name="canton_id" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="tipo_atraccion">Tipo:</label>
                    <select id="tipo_atraccion" name="tipo" class="form-control" required>
                        <option value="Parque">Parque</option>
                        <option value="Museo">Museo</option>
                        <option value="Playa">Playa</option>
                        <option value="Montaña">Montaña</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Agregar Atracción</button>
            </form>
        </div>

        <div id="provincias" class="form-section">
            <?php
            include 'php/conexion.php';
            include_once 'php/metodos.php';

            $provincias = obtenerDatos('provincias');

            $conn->close();
            ?>
            <div class="form-group">
                <h1 class="mt-4">Listado de Provincias</h1>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($provincias) > 0): ?>
                            <?php foreach ($provincias as $provincia): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($provincia['ProvinciaID']); ?></td>
                                    <td><?php echo htmlspecialchars($provincia['Nombre']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="2">No hay provincias disponibles</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <form action="/Proyecto_MapaInteractivo/Controller/ProvinciasAgregar.php" method="post">
                <div class="form-group">
                    <label for="nombre_provincia">Nombre de la Provincia:</label>
                    <input type="text" id="nombre_provincia" name="nombre" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Agregar Provincia</button>
            </form>
        </div>
    </div>


        <div id="costumbresindigenas" class="form-section">
            <?php
            include 'php/conexion.php';
            include_once 'php/metodos.php';

            $costumbresindigenas = obtenerDatos('costumbresindigenas');

            $conn->close();
            ?>
            <div class="form-group">
                <h1 class="mt-4">Listado de Costumbres Indígenas</h1>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($costumbresindigenas) > 0): ?>
                            <?php foreach ($costumbresindigenas as $costumbre): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($costumbre['CostumbreID']); ?></td>
                                    <td><?php echo htmlspecialchars($costumbre['Nombre']); ?></td>
                                    <td><?php echo htmlspecialchars($costumbre['Descripcion']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="3">No hay costumbres indígenas disponibles</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <form action="/Proyecto_MapaInteractivo/Controller/CostumbresIndigenas.php" method="post">
                <div class="form-group">
                    <label for="nombre_costumbre">Nombre de la Costumbre:</label>
                    <input type="text" id="nombre_costumbre" name="nombre" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="descripcion_costumbre">Descripción:</label>
                    <input type="text" id="descripcion_costumbre" name="descripcion" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Agregar Costumbre</button>
            </form>
        </div>

        <!-- Formulario Cantones -->
        <div id="cantones" class="form-section">
            <?php
            include 'php/conexion.php';
            include_once 'php/metodos.php';

            // Obtener datos de la tabla 'cantones'
            $cantones = obtenerDatos('cantones');

            $conn->close();
            ?>
            <div class="form-group">
                <h1 class="mt-4">Listado de Cantones</h1>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>ID Provincia</th>
                            <th>Imagen</th>
                            <th>Descripción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($cantones) > 0): ?>
                            <?php foreach ($cantones as $canton): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($canton['CantonID']); ?></td>
                                    <td><?php echo htmlspecialchars($canton['Nombre']); ?></td>
                                    <td><?php echo htmlspecialchars($canton['ProvinicaID']); ?></td>
                                    <td><?php echo htmlspecialchars($canton['Img']); ?></td>
                                    <td><?php echo htmlspecialchars($canton['Descripcion']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5">No hay cantones disponibles</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <form action="/Proyecto_MapaInteractivo/Controller/CantonesAgregar.php" method="post">
                <div class="form-group">
                    <label for="nombre_canton">Nombre del Cantón:</label>
                    <input type="text" id="nombre_canton" name="nombre" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="provincia_id_canton">ID de la Provincia:</label>
                    <input type="number" id="provincia_id_canton" name="provincia_id" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="imagen_canton">Imagen:</label>
                    <input type="text" id="imagen_canton" name="imagen" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="descripcion_canton">Descripción:</label>
                    <input type="text" id="descripcion_canton" name="descripcion" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Agregar Cantón</button>
            </form>
        </div>
    </div>


    <div id="eventos" class="form-section">
        <?php
        include 'php/conexion.php';
        include_once 'php/metodos.php';

        $eventos = obtenerDatos('eventos');

        $conn->close();
        ?>
        <div class="form-group">
            <h1 class="mt-4">Listado de Eventos</h1>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Fin</th>
                        <th>ID Cantón</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($eventos) > 0): ?>
                        <?php foreach ($eventos as $evento): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($evento['EventoID']); ?></td>
                                <td><?php echo htmlspecialchars($evento['Nombre']); ?></td>
                                <td><?php echo htmlspecialchars($evento['Descripcion']); ?></td>
                                <td><?php echo htmlspecialchars($evento['FechaInicio']); ?></td>
                                <td><?php echo htmlspecialchars($evento['FechaFin']); ?></td>
                                <td><?php echo htmlspecialchars($evento['CantonID']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6">No hay eventos disponibles</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
                <form action="/Proyecto_MapaInteractivo/Controller/EventosAgregar.php" method="post">
                    <div class="form-group">
                        <label for="nombre_evento">Nombre del Evento:</label>
                        <input type="text" id="nombre_evento" name="nombre" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion_evento">Descripción:</label>
                        <input type="text" id="descripcion_evento" name="descripcion" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_inicio_evento">Fecha de Inicio:</label>
                        <input type="date" id="fecha_inicio_evento" name="fecha_inicio" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_fin_evento">Fecha de Fin:</label>
                        <input type="date" id="fecha_fin_evento" name="fecha_fin" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="canton_id_evento">ID del Cantón:</label>
                        <input type="number" id="canton_id_evento" name="canton_id" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Agregar Evento</button>
                </form>
            </div>
        </div>


        <!-- Formulario Opiniones -->
        <div id="opiniones" class="form-section">
            <?php
            include 'php/conexion.php';
            include_once 'php/metodos.php';

            $opiniones = obtenerDatos('opiniones');

            $conn->close();
            ?>
            <div class="form-group">
                <h1 class="mt-4">Listado de Opiniones</h1>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Usuario</th>
                            <th>Opinión</th>
                            <th>calificacion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($opiniones) > 0): ?>
                            <?php foreach ($opiniones as $opinion): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($opinion['UsuarioID']); ?></td>
                                    <td><?php echo htmlspecialchars($opinion['AtraccionID']); ?></td>
                                    <td><?php echo htmlspecialchars($opinion['Comentario']); ?></td>
                                    <td><?php echo htmlspecialchars($opinion['Calificacion']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="3">No hay opiniones disponibles</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <form action="/Proyecto_MapaInteractivo/Controller/Opiniones.php" method="post">
                <div class="form-group">
                    <label for="usuario_opinion">Usuario:</label>
                    <input type="text" id="usuario_opinion" name="usuario" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="opinion_texto">Opinión:</label>
                    <textarea id="opinion_texto" name="opinión" class="form-control" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Agregar Opinión</button>
            </form>
        </div>

        <!-- Formulario Restaurantes -->
        <div id="restaurantes" class="form-section">
            <?php
            include 'php/conexion.php';
            include_once 'php/metodos.php';

            $restaurantes = obtenerDatos('restaurantes');

            $conn->close();
            ?>
            <div class="form-group">
                <h1 class="mt-4">Listado de Restaurantes</h1>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Tipo de Cocina</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($restaurantes) > 0): ?>
                            <?php foreach ($restaurantes as $restaurante): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($restaurante['RestauranteID']); ?></td>
                                    <td><?php echo htmlspecialchars($restaurante['Nombre']); ?></td>
                                    <td><?php echo htmlspecialchars($restaurante['Descripcion']); ?></td>
                                    <td><?php echo htmlspecialchars($restaurante['CantonID']); ?></td>
                                    <td><?php echo htmlspecialchars($restaurante['Tipo']); ?></td>

                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4">No hay restaurantes disponibles</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <form action="/Proyecto_MapaInteractivo/Controller/Restaurantes.php" method="post">
                <div class="form-group">
                    <label for="nombre_restaurante">Nombre del Restaurante:</label>
                    <input type="text" id="nombre_restaurante" name="nombre" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="direccion_restaurante">Dirección:</label>
                    <input type="text" id="direccion_restaurante" name="direccion" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="tipo_cocina_restaurante">Tipo de Cocina:</label>
                    <input type="text" id="tipo_cocina_restaurante" name="tipo_cocina" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Agregar Restaurante</button>
            </form>
        </div>

        <!-- Formulario Ubicaciones Empresas -->
        <div id="ubicacionesempresas" class="form-section">
            <?php
            include 'php/conexion.php';
            include_once 'php/metodos.php';

            $ubicacionesempresas = obtenerDatos('ubicacionesempresas');

            $conn->close();
            ?>
            <div class="form-group">
                <h1 class="mt-4">Listado de Ubicaciones de Empresas</h1>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Dirección</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($ubicacionesempresas) > 0): ?>
                            <?php foreach ($ubicacionesempresas as $ubicacion): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($ubicacion['EmpresaID']); ?></td>
                                    <td><?php echo htmlspecialchars($ubicacion['Nombre']); ?></td>
                                    <td><?php echo htmlspecialchars($ubicacion['Direccion']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="3">No hay ubicaciones de empresas disponibles</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <form action="/Proyecto_MapaInteractivo/Controller/UbicacionesEmpresas.php" method="post">
                <div class="form-group">
                    <label for="nombre_empresa">Nombre de la Empresa:</label>
                    <input type="text" id="nombre_empresa" name="nombre" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="direccion_empresa">Dirección:</label>
                    <input type="text" id="direccion_empresa" name="direccion" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Agregar Ubicación</button>
            </form>
        </div>

        <!-- Formulario Usuarios -->
        <div id="usuarios" class="form-section">
            <?php
            include 'php/conexion.php';
            include_once 'php/metodos.php';

            $usuarios = obtenerDatos('usuarios');

            $conn->close();
            ?>
            <div class="form-group">
                <h1 class="mt-4">Listado de Usuarios</h1>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Correo Electrónico</th>
                            <th>tipo usuario</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($usuarios) > 0): ?>
                            <?php foreach ($usuarios as $usuario): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($usuario['UsuarioID']); ?></td>
                                    <td><?php echo htmlspecialchars($usuario['Nombre']); ?></td>
                                    <td><?php echo htmlspecialchars($usuario['Correo']); ?></td>
                                    <td><?php echo htmlspecialchars($usuario['TipoUsuario']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5">No hay usuarios disponibles</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            <form action="/Proyecto_MapaInteractivo/Controller/Usuarios.php" method="post">
                <div class="form-group">
                    <label for="nombre_usuario">Nombre:</label>
                    <input type="text" id="nombre_usuario" name="nombre" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email_usuario">Correo Electrónico:</label>
                    <input type="email" id="email_usuario" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="telefono_usuario">Teléfono:</label>
                    <input type="text" id="telefono_usuario" name="telefono" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="direccion_usuario">Dirección:</label>
                    <input type="text" id="direccion_usuario" name="direccion" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Agregar Usuario</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var tablaSelect = document.getElementById('tablaSelect');
        var formSections = document.querySelectorAll('.form-section');

        tablaSelect.addEventListener('change', function() {
            var selectedValue = tablaSelect.value;

            formSections.forEach(function(section) {
                if (section.id === selectedValue || selectedValue === '') {
                    section.style.display = 'block';
                } else {
                    section.style.display = 'none';
                }
            });
        });

        formSections.forEach(function(section) {
            section.style.display = 'none';
        });
    });
</script>


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 py-5 px-sm-3 px-lg-5">
        <div class="row pt-5">
            <div class="col-lg-3 col-md-6 mb-5">
                <a href="" class="navbar-brand">
                    <h1 class="text-primary"><span class="text-white">TRAVEL</span>ER</h1>
                </a>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer condimentum vehicula tempor.</p>
                <h6 class="text-uppercase text-white py-2">Follow Us</h6>
                <div class="d-flex justify-content-start">
                    <a class="text-white-50 mr-3" href=""><i class="fab fa-twitter"></i></a>
                    <a class="text-white-50 mr-3" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="text-white-50 mr-3" href=""><i class="fab fa-instagram"></i></a>
                    <a class="text-white-50" href=""><i class="fab fa-linkedin-in"></i></a>
                </div>
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


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>