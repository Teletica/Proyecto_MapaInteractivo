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
    <title>Limón</title>
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
            background-color: #4CAF50;
            /* Verde representativo */
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
            background: #ffeb3b url('/Proyecto_MapaInteractivo/Imgs/Limon/limon-logo.png') no-repeat center center;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #preloader .spinner {
            width: 80px;
            height: 80px;
            border: 10px solid #fff;
            border-top: 10px solid #d32f2f;
            border-radius: 50%;
            animation: spin 1s linear infinite;
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

        body.dark-mode .header_provincia h1,
        body.dark-mode .section h2 {
            color: #ffeb3b;
        }

        body.dark-mode .header_provincia {
            color: #ffeb3b;
        }

        body.dark-mode .section-red {
            background-color: #333333;
            color: #ffeb3b;
        }

        body.dark-mode .section-yellow {
            background-color: #ffeb3b;
            color: #333333;
        }

        body.dark-mode footer {
            background-color: #333333;
            color: #ffeb3b;
        }

        /* Modo oscuro para tarjetas */
        body.dark-mode .canton-card {
            background-color: #333333;
            color: #ffeb3b;
            border: 1px solid #ffeb3b;
        }

        body.dark-mode .canton-card img {
            border-bottom: 5px solid #ffeb3b;
        }

        body.dark-mode .canton-content h3 {
            color: #ffeb3b;
        }

        body.dark-mode .canton-content p {
            color: #ffffff;
        }

        /* Efecto parallax en la cabecera */
        .header_provincia {
            background-image: url('/Proyecto_MapaInteractivo/Imgs/Limon/limon-background.jpg');
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
            background-color: #d32f2f;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 30px;
            cursor: pointer;
            z-index: 1001;
        }

        #toggle-dark-mode.dark-mode {
            background-color: #ffeb3b;
            color: #d32f2f;
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
            font-size: 1.5rem;
            color: #ffffff;
            /* Blanco */
            background-color: #4CAF50;
            /* Verde menta */
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
            background-color: #FFFFFF;
            /* Verde menta */
            color: #FFFFFF;
            /* Blanco */
        }



        .section {
            padding: 80px 20px;
            text-align: center;
            background-color: #fff;
        }

        .section h2 {
            font-size: 2.5rem;
            color: #FBC02D;
            /* Amarillo Rasta */
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

        /* Estilo para la sección con fondo esmeralda */
        .section-red {
            background-color: #2E7D32;
            /* Verde esmeralda */
            color: #FFFFFF;
            /* Texto blanco */
        }


        .section-red h2 {
            color: #ffeb3b;
            /* Texto amarillo */
        }

        .section-red .canton-card {
            background-color: #b71c1c;
            /* Fondo más oscuro para las tarjetas */
            border: 1px solid #ffeb3b;
            /* Borde amarillo para resaltar */
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
            color: #FFFFFF;
            background-color: #4CAF50;
          
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
            background-color: #ffeb background-color: #ffeb3b;
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

    <!-- Animación de carga personalizada -->
    <div id="preloader">
        <div class="spinner"></div>
    </div>

    <button id="toggle-dark-mode">Modo Oscuro</button>

    <header class="header_provincia" id="header_provincia">
        <h1>LIMÓN</h1>
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
            <p style="font-size: 1rem; font-weight: bold; color: #333;">
                <i class="fas fa-clock"></i> Fecha y hora actual: <?php echo $fecha_actual; ?>
            </p>
        </div>
    </header>

    <section class="section" id="cantones">
        <h2>CANTONES</h2>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="canton-card">
                        <img src="/Proyecto_MapaInteractivo/Imgs/Limón/limon-canton.jpg" alt="Limón"
                            class="shrink-on-load">
                        <div class="canton-content">
                            <h3>Limón</h3>
                            <p>La capital de la provincia, conocida por su rica historia afrocaribeña y su vibrante
                                cultura, es el principal puerto de Costa Rica.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="canton-card">
                        <img src="/Proyecto_MapaInteractivo/Imgs/Limón/pococi.jpg" alt="Pococí" class="shrink-on-load">
                        <div class="canton-content">
                            <h3>Pococí</h3>
                            <p>Hogar de la Reserva de la Biosfera de Tortuguero, Pococí es famoso por sus canales y la
                                biodiversidad que alberga.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="canton-card">
                        <img src="/Proyecto_MapaInteractivo/Imgs/Limón/talamanca.jpg" alt="Talamanca"
                            class="shrink-on-load">
                        <div class="canton-content">
                            <h3>Talamanca</h3>
                            <p>Con su rica cultura indígena y playas paradisíacas, Talamanca es un tesoro de la
                                biodiversidad y el ecoturismo.</p>
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
                        <img src="/Proyecto_MapaInteractivo/Imgs/Limón/cahuita.jpg" alt="Parque Nacional Cahuita"
                            class="shrink-on-load">
                        <div class="canton-content">
                            <h3>Parque Nacional Cahuita</h3>
                            <p>Conocido por sus arrecifes de coral y playas de arena blanca, Cahuita es un paraíso para
                                los amantes del snorkeling y la naturaleza.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="canton-card">
                        <img src="/Proyecto_MapaInteractivo/Imgs/Limón/puertoviejo.jpg" alt="Puerto Viejo"
                            class="shrink-on-load">
                        <div class="canton-content">
                            <h3>Puerto Viejo</h3>
                            <p>Un destino popular por sus playas, cultura caribeña y vibrante vida nocturna, perfecto
                                para surfistas y viajeros.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="canton-card">
                        <img src="/Proyecto_MapaInteractivo/Imgs/Limón/tortuguero.jpg" alt="Parque Nacional Tortuguero"
                            class="shrink-on-load">
                        <div class="canton-content">
                            <h3>Parque Nacional Tortuguero</h3>
                            <p>Famoso por ser uno de los sitios de anidación más importantes para las tortugas verdes,
                                es un santuario de vida silvestre único en el mundo.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--  sección de Comida Típica  -->
    <section class="section section-rasta" id="comida-tipica" style="background-color: #388E3C; color: #FFEB3B;">
        <h2 style="color: #FFEB3B;">COMIDA TÍPICA</h2>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="canton-card" style="background-color: #FFEB3B; color: #388E3C;">
                        <img src="/Proyecto_MapaInteractivo/Imgs/Limón/pati.jpg" alt="Rondón" class="shrink-on-load">
                        <div class="canton-content">
                            <h3 style="color: #D32F2F;">Patí</h3>
                            <p>
                            El Pati es un platillo emblemático de Limón, una especie de empanada rellena de carne sazonada con especias caribeñas. Es un favorito en las fiestas y eventos, conocido por su masa suave y su sabor picante.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="canton-card" style="background-color: #FFEB3B; color: #388E3C;">
                        <img src="/Proyecto_MapaInteractivo/Imgs/Limón/pollocari.jpg" alt="Patacones"
                            class="shrink-on-load">
                        <div class="canton-content">
                            <h3 style="color: #D32F2F;">Pollo Caribeño</h3>
                            <p>El pollo caribeño de Limón es un plato sabroso, cocinado con especias y leche de coco. Es popular por su mezcla única de sabores, y se sirve en ocasiones especiales, resaltando la tradición culinaria de la región..</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="canton-card" style="background-color: #FFEB3B; color: #388E3C;">
                        <img src="/Proyecto_MapaInteractivo/Imgs/Limón/riceandbeans.jpg" alt="Rice and Beans"
                            class="shrink-on-load">
                        <div class="canton-content">
                            <h3 style="color: #D32F2F;">Rice and Beans</h3>
                            <p>Este platillo, preparado con arroz y frijoles cocidos en leche de coco, es un icono de la
                                cocina limonense.</p>
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
                        <img src="/Proyecto_MapaInteractivo/Imgs/Limón/carnaval.jpg" alt="Carnaval de Limón"
                            class="shrink-on-load">
                        <div class="canton-content">
                            <h3>Carnaval de Limón</h3>
                            <p>El Carnaval de Limón es una celebración vibrante y colorida, llena de música, danza, y
                                tradición afrocaribeña.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="canton-card">
                        <img src="/Proyecto_MapaInteractivo/Imgs/Limón/bailes.jpg" alt="Bailes Afrocaribeños"
                            class="shrink-on-load">
                        <div class="canton-content">
                            <h3>Bailes Afrocaribeños</h3>
                            <p>Los bailes afrocaribeños son una parte esencial de la cultura de Limón, reflejando la
                                rica herencia africana en Costa Rica.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="canton-card">
                        <img src="/Proyecto_MapaInteractivo/Imgs/Limón/bribri.jpg" alt="Cultura Bribri"
                            class="shrink-on-load">
                        <div class="canton-content">
                            <h3>Cultura Bribri</h3>
                            <p>La comunidad Bribri mantiene sus tradiciones ancestrales, con un profundo respeto por la
                                naturaleza y el medio ambiente.</p>
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

<footer style="background-color: #2E7D32; color: #fff; padding: 40px 20px; text-align: center; position: relative;">
    <div style="max-width: 1200px; margin: 0 auto;">
        <!-- Logo -->
        <div style="margin-bottom: 20px;">
            <img src="/Proyecto_MapaInteractivo/Imgs/Heredia/costarica.png" alt="Costa Rica Logo"
                style="max-width: 150px;">
        </div>

        <!-- Enlaces rápidos -->
        <div style="display: flex; justify-content: center; gap: 40px; margin-bottom: 20px;">
            <a href="#cantones" style="color: #FFEB3B; text-decoration: none;">Cantones</a>
            <a href="#lugares-turisticos" style="color: #FFEB3B; text-decoration: none;">Lugares Turísticos</a>
            <a href="#comida-tipica" style="color: #FFEB3B; text-decoration: none;">Comida Típica</a>
            <a href="#cultura" style="color: #FFEB3B; text-decoration: none;">Cultura</a>
            <a href="http://localhost/Proyecto_MapaInteractivo/Vistas/templates/"
                style="color: #FFEB3B; text-decoration: none;">Inicio</a>
        </div>

        <!-- Redes Sociales -->
        <div style="margin-bottom: 20px;">
            <a href="https://www.facebook.com/visitcostarica" target="_blank" style="margin-right: 15px;">
                <i class="fab fa-facebook-f" style="color: #FFEB3B; font-size: 1.5rem;"></i>
            </a>
            <a href="https://www.instagram.com/visit_costarica" target="_blank" style="margin-right: 15px;">
                <i class="fab fa-instagram" style="color: #FFEB3B; font-size: 1.5rem;"></i>
            </a>
            <a href="https://twitter.com/visit_costarica" target="_blank" style="margin-right: 15px;">
                <i class="fab fa-twitter" style="color: #FFEB3B; font-size: 1.5rem;"></i>
            </a>
            <a href="https://www.youtube.com/visitcostarica" target="_blank">
                <i class="fab fa-youtube" style="color: #FFEB3B; font-size: 1.5rem;"></i>
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
                    style="padding: 10px; background-color: #FFEB3B; color: #2E7D32; border: none; border-radius: 0 5px 5px 0; cursor: pointer;">
                    Suscribirse
                </button>
            </form>
        </div>

        <!-- Botón de regreso al inicio -->
        <div style="position: absolute; left: 20px; bottom: 20px;">
            <a href="#top" style="color: #FFEB3B; text-decoration: none;">
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
                    toggleDarkMode.textContent = 'Modo Claro';
                } else {
                    toggleDarkMode.textContent = 'Modo Oscuro';
                }
            });
        }
    });
</script>

</html>