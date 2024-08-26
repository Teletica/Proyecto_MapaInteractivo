<?php

include '../templates.layout/php/conexion.php';

date_default_timezone_set('America/Costa_Rica');
$fecha_actual = date('d/m/Y H:i:s');

if (isset($_GET['provincia'])) {
    $provincia = htmlspecialchars($_GET['provincia']);

    // Consulta para obtener el nombre de la provincia
    $query = "SELECT Nombre FROM provincias WHERE Nombre = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $provincia); // Cambiado a "s" para string
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $provinciaNombre = $row['Nombre'];
    } else {
        $provinciaNombre = 'Provincia no encontrada';
    }

    $stmt->close();

    // Consulta para obtener los cantones correspondientes
    $query_cantones = "SELECT Nombre, Img, Descripcion FROM cantones WHERE ProvinciaID = (SELECT ProvinciaID FROM provincias WHERE Nombre = ?)";
    $stmt_cantones = $conn->prepare($query_cantones);
    $stmt_cantones->bind_param('s', $provincia);
    $stmt_cantones->execute();
    $result_cantones = $stmt_cantones->get_result();

    // Consulta para obtener los cantones correspondientes
    $query_atracciones = "SELECT Nombre, Descripcion, Tipo, imagenAtraccion FROM atracciones WHERE ProvinciaID IN (SELECT ProvinciaID FROM cantones WHERE ProvinciaID = (SELECT ProvinciaID FROM provincias WHERE Nombre = ?))";
    $stmt_atracciones = $conn->prepare($query_atracciones);
    $stmt_atracciones->bind_param('s', $provincia);
    $stmt_atracciones->execute();
    $result_atracciones = $stmt_atracciones->get_result();

    $query_restaurantes = "SELECT Nombre, Descripcion, Tipo, Imagen_comida FROM restaurantes WHERE ProvinciaID = (SELECT ProvinciaID FROM provincias WHERE Nombre = ?)";
    $stmt_restaurantes = $conn->prepare($query_restaurantes);
    $stmt_restaurantes->bind_param('s', $provincia);
    $stmt_restaurantes->execute();
    $result_restaurantes = $stmt_restaurantes->get_result();


} else {
    $provinciaNombre = 'No encontramos esa provincia, tal vez aún estamos trabajando en ella.';
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title><?php echo $provinciaNombre ?></title>

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
    <script src="/Proyecto_MapaInteractivo/JS/script.js"></script>

    <!-- Estilos incluidos -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #169873;
            scroll-behavior: smooth;
            transition: transform 1s ease-in-out, opacity 1s ease-in-out, background-color 0.5s ease;
        }

        /* Animación de carga personalizada */
        #preloader {
            position: fixed;
            left: 0;
            top: 0;
            z-index: 9999;
            width: 100%;
            height: 100%;
            overflow: visible;
            background: #169873 url('/Proyecto_MapaInteractivo/Imgs/Heredia/heredia-logo.png') no-repeat center center;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #preloader .spinner {
            width: 80px;
            height: 80px;
            border: 10px solid #fff;
            border-top: 10px solid ;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        footer {
            background-color: #169873;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Modo oscuro */
        body.dark-mode {
            background-color: #121212;
            color: #ffffff;
        }

        body.dark-mode .header_provincia h1 {
            color: #fcf8e3;
        }

        body.dark-mode .header_provincia i {
            color: #121212;
        }

        body.dark-mode .section h2 {
            color: #fcf8e3;
        }

        body.dark-mode .header_provincia {
            color: white;
        }

        body.dark-mode .section-green {
            background-color: #121212;
            color: white;
        }

        body.dark-mode .section-wheat {
            background-color: #121212;
            color: #333333;
        }

        body.dark-mode footer {
            background-color: #121212;
            color: #121212;
        }

        body.dark-mode .section {
            background-color: #121212;
        }

        /* Modo oscuro para tarjetas */
        body.dark-mode .canton-card {
            background-color: #333333;
            color: #ffeb3b;
            border: 1px solid #fcf8e3;
        }

        body.dark-mode .canton-card img {
            border-bottom: 5px solid #fcf8e3;
        }

        body.dark-mode .canton-content h3 {
            color: #fcf8e3;
        }

        body.dark-mode .canton-content p {
            color: #ffffff;
        }

        /* Efecto parallax en la cabecera */
        .header_provincia {
            background-image: url('/Proyecto_MapaInteractivo/Imgs/Heredia/heredia-background.jpg');
            background-size: cover;
            background-position: center;
            color: #000;
            text-align: center;
            padding: 150px 20px;
            position: relative;
            background-attachment: fixed;
        }

        /* Botón para cambiar modo oscuro */
        #toggle-dark-mode {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 30px;
            cursor: pointer;
            z-index: 1001;
        }

        #toggle-dark-mode.dark-mode {
            background-color: #fcf8e3;
            color: #121212;
        }

        .header_provincia h1 {
            font-size: 4rem;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 3px;
            color: #;
            position: relative;
        }

        .header_provincia h1::before {
            content: "\f060";
            /* Código Unicode del ícono de flecha */
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            font-size: 2rem;
            position: absolute;
            left: -50px;
            top: 50%;
            transform: translateY(-50%);
            color: #000;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .header_provincia h1:hover::before {
            color: #d32f2f;
            /* Cambia a rojo al hacer hover */
        }

        .header_provincia .botones {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 40px;
        }

        .header_provincia .boton-redondo {
            /*font-size: 1.5rem;
            color: #fff;
            background-color: #d32f2f;
            /* Rojo predominante *//*
            border-radius: 50%;
            width: 80px;
            height: 80px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.3s ease;
            text-decoration: none;*/

            font-size: 72px;
            background-color: #fcf8e3;
            color: #169873;
            text-decoration: none;
        }

        .header_provincia .boton-redondo:hover {
            background-color: #fcf4ca;
            /* Cambia a amarillo al hacer hover */
            color: #d32f2f;
            /* Texto rojo al hacer hover */
        }


        .section {
            padding: 80px 20px;
            text-align: justify;
            background-color: #fcf8e3;
        }

        .section h3 {
            text-align: left;
        }

        .section p,
        .section h3 {
            margin-top: 5%;
            margin-left: 5%;
            margin-right: 5%;
        }

        .section h2 {
            font-size: 2.5rem;
            color: #169873;
            /* Rojo */
            margin-bottom: 40px;
            text-transform: uppercase;
        }

        .section .canton-card {
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            overflow: hidden;
            transition: transform 0.3s ease;
            height: 100%;
        }

        .section .canton-card:hover {
            transform: translateY(-10px);
        }

        .section img {
            width: 100%;
            height: auto;
            border-bottom: 5px solid #169873;
            /* Rojo */
            transition: transform 0.6s ease-in-out;
        }

        .section img.shrink {
            width: 80%;
            /* Hacer la imagen más pequeña */
            transform: scale(1);
            margin: 0 auto;
            display: block;
        }

        .shrink-on-load {
            animation: shrink 0.6s ease-in-out forwards;
        }

        @keyframes shrink {
            0% {
                transform: scale(1.1);
            }

            100% {
                transform: scale(1);
            }
        }

        /* Estilo para la sección con fondo verde */
        .section-green {
            background-color: #169873;
            /* Fondo rojo */
            color: #fff;
            /* Texto en blanco */
        }

        .section-green h2 {
            color: #fcf8e3;
            /* Texto amarillo */
        }

        .section-green .canton-card {
            background-color: #fcf8e3;
            /* Fondo más oscuro para las tarjetas */
            border: 1px solid #01523b;
            /* Borde amarillo para resaltar */
        }

        .section-green .canton-content h3,
        .section-green .canton-content p {
            color: #333;
            /* Texto en blanco para la sección roja */
        }

        .section-green .canton-card:hover {
            transform: translateY(-10px) scale(1.05);
        }

        /* Estilo para la sección con fondo amarillo */
        .section-wheat {
            background-color: #fcf8e3;
            /* Fondo amarillo */
            color: #000;
            /* Texto en negro para contraste */
        }

        .section-wheat .canton-card {
            background-color: #fff;
            /* Fondo blanco para las tarjetas */
            border: 1px solid #169873;
            /* Borde rojo para resaltar */
        }

        .section-wheat .canton-content h3 {
            color: #169873;
            /* Título en rojo */
        }

        .section-wheat .canton-content p {
            color: #333;
            /* Texto en gris oscuro */
        }

        .section-wheat .canton-card:hover {
            transform: translateY(-10px) scale(1.05);
        }

        .back-button {
            font-size: 1.5rem;
            color: #169873;
            background-color: #fcf8e3;
            /* Rojo predominante */
            border-radius: 50%;
            width: 80px;
            height: 80px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            position: fixed;
            bottom: 20px;
            right: 20px;
            text-decoration: none;
            z-index: 1000;
            transition: background-color 0.3s ease;
        }

        .back-button:hover {
            background-color: #fcf4ca;
            /* Amarillo */
            color: #169873;
            text-decoration: none;
            /* Texto rojo al hacer hover */
        }

        .back-button-emoji {
            position: absolute;
            left: 20px;
            top: 20px;
            font-size: 2rem;
            color: #000;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .back-button-emoji:hover {
            color: #d32f2f;
        }

        html {
            scroll-behavior: smooth;
        }

        @keyframes bounce {

            0%,
            20%,
            50%,
            80%,
            100% {
                transform: translateY(0);
            }

            40% {
                transform: translateY(-30px);
            }

            60% {
                transform: translateY(-15px);
            }
        }

        .back-button-emoji {
            position: absolute;
            left: 20px;
            bottom: 20px;
            font-size: 2rem;
            color: #000;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .back-button-emoji:hover {
            color: #d32f2f;
            animation: bounce 1s;
        }

        .back-button-emoji:active {
            transform: scale(0.95);
        }

        .fa-moon 
        .fa-sun{
            font-size: 20px;
        }
    </style>

</head>

<body>

    <!-- Animación de carga personalizada -->
    <div id="preloader">
        <div class="spinner"></div>
    </div>

    <button id="toggle-dark-mode"><i class="fas fa-solid fa-moon"></i></button>

    <header class="header_provincia" id="header_provincia">
        <h1><?php echo $provinciaNombre ?></h1>
        <div class="botones">
            <a class="boton-redondo" href="#cantones" title="Cantones">
                <i class="fas fa-globe-americas"></i>
            </a>
            <a class="boton-redondo" href="#lugares-turisticos" title="Lugares Turísticos">
                <i style="font-size: 64px;" class="fas fa-mountain"></i>
            </a>
            <a class="boton-redondo" href="#comida-tipica" title="Comida Típica">
                <i class="fas fa-utensils"></i>
            </a>
            <a class="boton-redondo" href="#cultura" title="Cultura">
                <i style="font-size: 64px;" class="fas fa-campground"></i>
            </a>
        </div>

        <!-- Mostrar fecha y hora actual -->
        <div style="margin-top: 20px; text-align: center;">
            <p style="font-size: 1rem; font-weight: bold; color: #fcf8e3;">
                <i class="fas fa-clock"></i> Fecha y hora actual: <?php echo $fecha_actual; ?>
            </p>
        </div>
    </header>

    <section class="section" id="cantones">
        <h2>CANTONES</h2>
        <div class="container">
            <div class="row">
                <?php
                if ($result_cantones->num_rows > 0) {
                    while ($row = $result_cantones->fetch_assoc()) {
                        echo '<div class="col-md-4">';
                        echo '<div class="canton-card">';
                        echo '<img src="' . $row['Img'] . '" alt="' . $row['Nombre'] . '" class="shrink-on-load">';
                        echo '<div class="canton-content">';
                        echo '<h3>' . $row['Nombre'] . '</h3>';
                        echo '<p>' . $row['Descripcion'] . '</p>';
                        echo '</div></div></div>';
                    }
                } else {
                    echo '<p>No hay cantones disponibles para esta provincia.</p>';
                }
                ?>
            </div>
        </div>
    </section>

    <!--  sección de Lugares Turísticos  -->
    <section class="section section-green" id="lugares-turisticos">
    <h2>ATRACCIONES</h2>
        <div class="container">
            <div class="row">
                <?php
                if ($result_atracciones->num_rows > 0) {
                    while ($row = $result_atracciones->fetch_assoc()) {
                        echo '<div class="col-md-4">';
                        echo '<div class="canton-card">';
                        echo '<img src="' . $row['imagenAtraccion'] . '" alt="' . $row['Nombre'] . '" class="shrink-on-load">';
                        echo '<div class="canton-content">';
                        echo '<h3>' . $row['Nombre'] . '</h3>';
                        echo '<p>' . $row['Descripcion'] . '</p>';
                        echo '<p><strong>Tipo:</strong> ' . $row['Tipo'] . '</p>';
                        echo '</div></div></div>';
                    }
                } else {
                    echo '<p>No hay atracciones disponibles para esta provincia.</p>';
                }
                ?>
            </div>
        </div>
    </section>
    </section>


    <!--  sección de Comida Típica  -->
    <section class="section section-wheat" id="comida-tipica">
    <h2>COMIDA TÍPICA</h2>
    <div class="container">
        <div class="row">
            <?php
            // Verifica si la provincia está definida
            if (isset($provincia)) {

                if ($result_restaurantes->num_rows > 0) {
                    while ($row = $result_restaurantes->fetch_assoc()) {
                        echo '<div class="col-md-4">';
                        echo '<div class="canton-card">';
                        echo '<img src="' . $row['Imagen_comida'] . '" alt="' . $row['Nombre'] . '" class="shrink-on-load">';
                        echo '<div class="canton-content">';
                        echo '<h3>' . $row['Nombre'] . '</h3>';
                        echo '<p>' . $row['Descripcion'] . '</p>';
                        echo '</div></div></div>';
                    }
                } else {
                    echo '<p>No hay restaurantes de comida típica disponibles en esta provincia.</p>';
                }
            } else {
                echo '<p>Provincia no definida.</p>';
            }
            ?>
        </div>
    </div>
</section>


    <section class="section section-green" id="cultura">
        <h2>CULTURA</h2>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="canton-card">
                        <img src="/Proyecto_MapaInteractivo/Imgs/Heredia/Club-Sport-Herediano.jpeg"
                            alt="Donde Papa Restaurant" class="shrink-on-load">
                        <div class="canton-content">
                            <h3>Club Sport Herediano</h3>
                            <p>El Club Sport Herediano, fundado el 12 de junio de 1921,
                                es uno de los equipos más históricos y exitosos del fútbol costarricense,
                                conocido por ser el primer campeón nacional en 1921. Con sede en Heredia y apodado
                                "El Team", ha ganado 29 títulos de liga y posee su propio estadio, el Eladio Rosabal
                                Cordero.
                                A lo largo de su historia, ha sido cuna de grandes jugadores y ha mantenido intensas
                                rivalidades
                                con otros clubes, como Saprissa y Alajuelense. La afición herediana es apasionada y
                                leal, y el club también
                                está comprometido con iniciativas sociales en su comunidad.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="canton-card">
                        <img src="/Proyecto_MapaInteractivo/Imgs/Heredia/Feria-de-la-mascaradas.jpg"
                            alt="Barva de Heredia Comida Callejera XL" class="shrink-on-load">
                        <div class="canton-content">
                            <h3>Fiestas Patronales</h3>
                            <p>En la provincia de Heredia, las fiestas patronales son una expresión vibrante de la
                                identidad local, celebradas con fervor en cantones como Barva, Santo Domingo y San
                                Joaquín. Estas festividades rinden homenaje a los santos patronos con actividades que
                                incluyen procesiones religiosas, desfiles, música tradicional, bailes folclóricos y
                                ferias populares. Cada comunidad se une en estos eventos que refuerzan los lazos
                                sociales y preservan las tradiciones ancestrales, convirtiéndose en momentos de
                                encuentro y celebración que reflejan el orgullo y la devoción de los heredianos por su
                                patrimonio cultural.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="canton-card">
                        <img src="/Proyecto_MapaInteractivo/Imgs/Heredia/sanrafa-Heredia.jpeg" alt="San Rafael"
                            class="shrink-on-load">
                        <div class="canton-content">
                            <h3>Procesión de la Virgen de los Ángeles</h3>
                            <p>La procesión de la Virgen de los Ángeles en San Rafael de Heredia, celebrada cada 2 de
                                agosto, es una de las tradiciones religiosas más importantes de la provincia. La
                                "Negrita", patrona de Costa Rica, es llevada en andas por las calles del distrito,
                                acompañada de rezos, cantos y la devoción de cientos de fieles. Esta manifestación de fe
                                refuerza los lazos comunitarios y espirituales, convirtiéndose en un evento central para
                                los heredianos. Además de la procesión, se realizan misas y actividades culturales que
                                reflejan la profunda devoción mariana en la región y en todo el país.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <a href="http://localhost/Proyecto_MapaInteractivo/Vistas/templates/" class="back-button" title="Regresar">
        <i class="fas fa-arrow-left"></i>
    </a>





</body>




<footer style="color: #fff; padding: 40px 20px; text-align: center; position: relative;">
    <div style="max-width: 1200px; margin: 0 auto;">
        <!-- Logo -->
        <div style="margin-bottom: 20px;">
            <img src="/Proyecto_MapaInteractivo/Imgs/Heredia/costarica.png" alt="Costa Rica Logo"
                style="max-width: 150px;">
        </div>

        <!-- Enlaces rápidos -->
        <div style="display: flex; justify-content: center; gap: 40px; margin-bottom: 20px;">
            <a href="#cantones" style="color: #fcf8e3; text-decoration: none;">Cantones</a>
            <a href="#lugares-turisticos" style="color: #fcf8e3; text-decoration: none;">Lugares Turísticos</a>
            <a href="#comida-tipica" style="color: #fcf8e3; text-decoration: none;">Comida Típica</a>
            <a href="#cultura" style="color: #fcf8e3; text-decoration: none;">Cultura</a>
            <a href="http://localhost/Proyecto_MapaInteractivo/Vistas/templates/"
                style="color: #fcf8e3; text-decoration: none;">Inicio</a>
        </div>

        <!-- Redes Sociales -->
        <div style="margin-bottom: 20px;">
            <a href="https://www.facebook.com/visitcostarica" target="_blank" style="margin-right: 15px;">
                <i class="fab fa-facebook-f" style="color: #fcf8e3; font-size: 1.5rem;"></i>
            </a>
            <a href="https://www.instagram.com/visit_costarica" target="_blank" style="margin-right: 15px;">
                <i class="fab fa-instagram" style="color: #fcf8e3; font-size: 1.5rem;"></i>
            </a>
            <a href="https://twitter.com/visit_costarica" target="_blank" style="margin-right: 15px;">
                <i class="fab fa-twitter" style="color: #fcf8e3; font-size: 1.5rem;"></i>
            </a>
            <a href="https://www.youtube.com/visitcostarica" target="_blank">
                <i class="fab fa-youtube" style="color: #fcf8e3; font-size: 1.5rem;"></i>
            </a>
        </div>

        <!-- Información de contacto y lema -->
        <div style="margin-bottom: 20px;">
            <p style="font-size: 1.2rem; font-style: italic;">"Pura Vida - Donde la Aventura Encuentra la Serenidad"</p>
            <p style="font-size: 0.9rem;">Junta de Turismo de Costa Rica - TurismoPuraVida@ufide.ac.cr
                - Tel: +506 1234 5678
            </p>
        </div>



        <!-- Suscripción al boletín -->
        <div style="margin-bottom: 20px;">
            <form action="/subscribe" method="post" style="display: flex; justify-content: center;">
                <input type="email" name="email" placeholder="Suscríbete a nuestro boletín" required
                    style="padding: 10px; border: none; border-radius: 5px 0 0 5px; width: 300px;">
                <button type="submit"
                    style="padding: 10px; background-color: #fcf4ca; color: #169873; border: none; border-radius: 0 5px 5px 0; cursor: pointer;">
                    Suscribirse
                </button>
            </form>
        </div>

        <!-- Botón de regreso al inicio -->
        <div style="position: absolute; left: 20px; bottom: 20px;">
            <a href="#top" style="color: #fcf8e3; text-decoration: none;">
                <i class="fas fa-arrow-up" style="font-size: 2rem;"></i>
            </a>
        </div>
    </div>

    <div style="margin-top: 20px; font-size: 0.8rem; color: #ccc;">
        <p>© 2024 Junta de Turismo de Costa Rica. Todos los derechos reservados.</p>
    </div>
</footer>

<script>
    // Quitar preloader al cargar la página
    document.addEventListener('DOMContentLoaded', function () {
    // Quitar preloader al cargar la página
    $(window).on('load', function () {
        $('#preloader').fadeOut('slow', function () {
            $(this).remove();
        });
    });

    // Modo oscuro toggle
    const toggleDarkMode = document.getElementById('toggle-dark-mode');
    if (toggleDarkMode) { // Verificar que el elemento exista
        toggleDarkMode.addEventListener('click', function () {
            document.body.classList.toggle('dark-mode');
            toggleDarkMode.classList.toggle('dark-mode');
            if (document.body.classList.contains('dark-mode')) {
                toggleDarkMode.innerHTML = '<i class="fas fa-sun"></i>'; // Puedes usar innerHTML aquí
            } else {
                toggleDarkMode.innerHTML = '<i class="fas fa-solid fa-moon"></i>'; // Insertar ícono de Font Awesome
            }
        });
    }
});

</script>


</html>