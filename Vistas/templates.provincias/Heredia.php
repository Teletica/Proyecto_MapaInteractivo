<?php
// Establecer la zona horaria
date_default_timezone_set('America/Costa_Rica');

// Obtener la fecha y hora actual
$fecha_actual = date('d/m/Y H:i:s');
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heredia</title>
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
    <script src="/Proyecto_MapaInteractivo/JS/script.js"></script>

    <!-- Estilos incluidos -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ffeb3b;
            /* Fondo amarillo */
            scroll-behavior: smooth;
            transition: transform 1s ease-in-out, opacity 1s ease-in-out;
        }


        .zoom-out {
            transform: scale(0.5);
            opacity: 0;
        }


        .header_provincia {
            background-image: url('/Proyecto_MapaInteractivo/Imgs/Heredia/heredia-background.jpg');
            background-size: cover;
            background-position: center;
            color: #000;
            /* Cambiado a negro */
            text-align: center;
            padding: 150px 20px;
            position: relative;
        }

        .header_provincia h1 {
            font-size: 4rem;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 3px;
            color: #000;
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
        }

        .header_provincia h1::before:hover {
            color: #d32f2f;
        }

        .header_provincia h1::before {
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .header_provincia h1::before {
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .header_provincia h1::before {
            content: "\f060";
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            position: absolute;
            left: -50px;
            top: 50%;
            transform: translateY(-50%);
            color: #000;
        }

        .header_provincia h1:hover::before {
            color: #d32f2f;
        }

        .header_provincia .botones {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 40px;
        }

        .header_provincia .boton-redondo {
            font-size: 1.5rem;
            color: #fff;
            background-color: #d32f2f;
            /* Rojo predominante */
            border-radius: 50%;
            width: 80px;
            height: 80px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.3s ease;
            text-decoration: none;
        }

        .header_provincia .boton-redondo:hover {
            background-color: #ffeb3b;
            /* Amarillo */
            color: #d32f2f;
            /* Texto rojo al hacer hover */
        }

        .section {
            padding: 80px 20px;
            text-align: center;
            background-color: #fff;
        }

        .section h2 {
            font-size: 2.5rem;
            color: #d32f2f;
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
            border-bottom: 5px solid #d32f2f;
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

        /* Estilo para la sección con fondo rojo */
        .section-red {
            background-color: #d32f2f;
            /* Fondo rojo */
            color: #fff;
            /* Texto en blanco */
        }

        .section-red h2 {
            color: #ffeb3b;
            /* Texto amarillo */
        }

        .section-red .canton-card {
            background-color: #b71c1c;
            /* Fondo más oscuro para las tarjetas */
            border: 1px solid #ffeb3b;
            /* Borde blanco para resaltar */
        }

        .section-red .canton-content h3,
        .section-red .canton-content p {
            color: #fff;
            /* Texto en blanco para la sección roja */
        }

        .section-red .canton-card:hover {
            transform: translateY(-10px) scale(1.05);
        }

        /* Estilo para la sección con fondo amarillo */
        .section-yellow {
            background-color: #ffeb3b;
            /* Fondo amarillo */
            color: #000;
            /* Texto en negro para contraste */
        }

        .section-yellow .canton-card {
            background-color: #fff;
            /* Fondo blanco para las tarjetas */
            border: 1px solid #d32f2f;
            /* Borde rojo para resaltar */
        }

        .section-yellow .canton-content h3 {
            color: #d32f2f;
            /* Título en rojo */
        }

        .section-yellow .canton-content p {
            color: #333;
            /* Texto en gris oscuro */
        }

        .section-yellow .canton-card:hover {
            transform: translateY(-10px) scale(1.05);
        }

        .back-button {
            font-size: 1.5rem;
            color: #fff;
            background-color: #d32f2f;
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
            background-color: #ffeb3b;
            /* Amarillo */
            color: #d32f2f;
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
    </style>
</head>

<body>

    <header class="header_provincia" id="header_provincia">
        <h1>HEREDIA</h1>
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

    </header>

    <section class="section" id="cantones">
        <h2>CANTONES</h2>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="canton-card">
                        <img src="/Proyecto_MapaInteractivo/Imgs/Heredia/parquecentraldeheredia.jpg"
                            alt="Parque Central de Heredia" class="shrink-on-load">
                        <div class="canton-content">
                            <h3>Heredia</h3>
                            <p>Conocida como la "Ciudad de las Flores", Heredia es el cantón central que alberga la
                                mayoría de los edificios históricos de la provincia.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="canton-card">
                        <img src="/Proyecto_MapaInteractivo/Imgs/Heredia/fiestasdebarvadeheredia.jpg" alt="Barva"
                            class="shrink shrink-on-load">
                        <div class="canton-content">
                            <h3>Barva</h3>
                            <p>Famoso por su cultura colonial y sus celebraciones tradicionales, Barva es un destino
                                popular para los amantes de la historia y el folclore costarricense.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="canton-card">
                        <img src="/Proyecto_MapaInteractivo/Imgs/Heredia/sanrafa-Heredia.jpeg" alt="San Rafael"
                            class="shrink-on-load">
                        <div class="canton-content">
                            <h3>San Rafael</h3>
                            <p>Conocido por sus hermosas montañas y su cercanía a parques naturales, San Rafael es ideal
                                para quienes buscan actividades al aire libre.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--  sección de Lugares Turísticos  -->
    <section class="section section-red" id="lugares-turisticos">
        <h2>LUGARES TURÍSTICOS</h2>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="canton-card">
                        <img src="/Proyecto_MapaInteractivo/Imgs/Heredia/volcan-barva.jpg" alt="Volcán Barva"
                            class="shrink-on-load">
                        <div class="canton-content">
                            <h3>Volcán Barva</h3>
                            <p>Ubicado en el Parque Nacional Braulio Carrillo, el Volcán Barva ofrece vistas
                                espectaculares y es ideal para hacer senderismo.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="canton-card">
                        <img src="/Proyecto_MapaInteractivo/Imgs/Heredia/catarata-la-paz.jpg" alt="Catarata La Paz"
                            class="shrink-on-load">
                        <div class="canton-content">
                            <h3>Catarata La Paz</h3>
                            <p>Un impresionante salto de agua rodeado de selva tropical, perfecto para los amantes de la
                                naturaleza y la fotografía.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="canton-card">
                        <img src="/Proyecto_MapaInteractivo/Imgs/Heredia/jardin-lankester.jpg"
                            alt="Jardín Botánico Lankester" class="shrink-on-load">
                        <div class="canton-content">
                            <h3>Jardín Botánico Lankester</h3>
                            <p>Este jardín botánico es famoso por su colección de orquídeas y plantas exóticas, un lugar
                                ideal para los botánicos y amantes de la naturaleza.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--  sección de Comida Típica  -->
    <section class="section section-yellow" id="comida-tipica">
        <h2>COMIDA TÍPICA</h2>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="canton-card">
                        <img src="/Proyecto_MapaInteractivo/Imgs/Heredia/donde-papa.jpg" alt="Donde Papa Restaurant"
                            class="shrink-on-load">
                        <div class="canton-content">
                            <h3>Donde Papa Restaurant</h3>
                            <p>Amplio y versátil, Donde Papa Restaurant en Santa Lucía de Heredia ofrece una amplia
                                variedad de platos de todos los tipos, convirtiéndose en un lugar favorito para
                                disfrutar de una comida en familia o con amigos.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="canton-card">
                        <img src="/Proyecto_MapaInteractivo/Imgs/Heredia/barva-callejera-xl.jpg"
                            alt="Barva de Heredia Comida Callejera XL" class="shrink-on-load">
                        <div class="canton-content">
                            <h3>Barva de Heredia Comida Callejera XL</h3>
                            <p>Situado en Barva de Heredia, este lugar es conocido por sus platos de gran tamaño que
                                hacen honor a su nombre, ofreciendo una amplia variedad de comida callejera en porciones
                                generosas.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="canton-card">
                        <img src="/Proyecto_MapaInteractivo/Imgs/Heredia/caldosas-heredia.jpg" alt="Caldosas de Heredia"
                            class="shrink-on-load">
                        <div class="canton-content">
                            <h3>Caldosas de Heredia</h3>
                            <p>En pleno centro de Heredia, las Caldosas se han vuelto una leyenda, combinando chips de
                                tortilla con ceviche para crear una experiencia gastronómica única que es sinónimo de
                                esta provincia.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section section-red" id="cultura">
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




<footer style="background-color: #d32f2f; color: #fff; padding: 40px 20px; text-align: center; position: relative;">
    <div style="max-width: 1200px; margin: 0 auto;">
        <!-- Logo -->
        <div style="margin-bottom: 20px;">
            <img src="/Proyecto_MapaInteractivo/Imgs/Heredia/costarica.png" alt="Costa Rica Logo"
                style="max-width: 150px;">
        </div>

        <!-- Enlaces rápidos -->
        <div style="display: flex; justify-content: center; gap: 40px; margin-bottom: 20px;">
            <a href="#cantones" style="color: #ffeb3b; text-decoration: none;">Cantones</a>
            <a href="#lugares-turisticos" style="color: #ffeb3b; text-decoration: none;">Lugares Turísticos</a>
            <a href="#comida-tipica" style="color: #ffeb3b; text-decoration: none;">Comida Típica</a>
            <a href="#cultura" style="color: #ffeb3b; text-decoration: none;">Cultura</a>
            <a href="http://localhost/Proyecto_MapaInteractivo/Vistas/templates/"
                style="color: #ffeb3b; text-decoration: none;">Inicio</a>
        </div>

        <!-- Redes Sociales -->
        <div style="margin-bottom: 20px;">
            <a href="https://www.facebook.com/visitcostarica" target="_blank" style="margin-right: 15px;">
                <i class="fab fa-facebook-f" style="color: #ffeb3b; font-size: 1.5rem;"></i>
            </a>
            <a href="https://www.instagram.com/visit_costarica" target="_blank" style="margin-right: 15px;">
                <i class="fab fa-instagram" style="color: #ffeb3b; font-size: 1.5rem;"></i>
            </a>
            <a href="https://twitter.com/visit_costarica" target="_blank" style="margin-right: 15px;">
                <i class="fab fa-twitter" style="color: #ffeb3b; font-size: 1.5rem;"></i>
            </a>
            <a href="https://www.youtube.com/visitcostarica" target="_blank">
                <i class="fab fa-youtube" style="color: #ffeb3b; font-size: 1.5rem;"></i>
            </a>
        </div>

        <!-- Información de contacto y lema -->
        <div style="margin-bottom: 20px;">
            <p style="font-size: 1.2rem; font-style: italic;">"Pura Vida - Donde la Aventura Encuentra la Serenidad"</p>
            <p style="font-size: 0.9rem;">Junta de Turismo de Costa Rica - TurismoPuraVida@ufide.ac.cr
                - Tel: +506 1234 5678
            </p>
        </div>

        <!-- Mostrar fecha y hora actual -->
        <div style="margin-bottom: 20px;">
            <p style="font-size: 0.9rem;">Fecha y hora actual:
                <?php echo $fecha_actual; ?>
            </p>
        </div>

        <!-- Suscripción al boletín -->
        <div style="margin-bottom: 20px;">
            <form action="/subscribe" method="post" style="display: flex; justify-content: center;">
                <input type="email" name="email" placeholder="Suscríbete a nuestro boletín" required
                    style="padding: 10px; border: none; border-radius: 5px 0 0 5px; width: 300px;">
                <button type="submit"
                    style="padding: 10px; background-color: #ffeb3b; color: #d32f2f; border: none; border-radius: 0 5px 5px 0; cursor: pointer;">
                    Suscribirse
                </button>
            </form>
        </div>

        <!-- Botón de regreso al inicio -->
        <div style="position: absolute; left: 20px; bottom: 20px;">
            <a href="#top" style="color: #ffeb3b; text-decoration: none;">
                <i class="fas fa-arrow-up" style="font-size: 2rem;"></i>
            </a>
        </div>
    </div>

    <div style="margin-top: 20px; font-size: 0.8rem; color: #ccc;">
        <p>© 2024 Junta de Turismo de Costa Rica. Todos los derechos reservados.</p>
    </div>
</footer>




</html>