-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2024 at 02:13 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyecto_mapainteractivo`
--

-- --------------------------------------------------------

--
-- Table structure for table `atracciones`
--

CREATE TABLE `atracciones` (
  `AtraccionID` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Descripcion` varchar(200) NOT NULL,
  `ProvinciaID` int(11) NOT NULL,
  `Tipo` varchar(20) NOT NULL,
  `imagenAtraccion` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `atracciones`
--

INSERT INTO `atracciones` (`AtraccionID`, `Nombre`, `Descripcion`, `ProvinciaID`, `Tipo`, `imagenAtraccion`) VALUES
(1, 'Paseo de los Turistas', 'Boulevard frente al mar con restaurantes, tiendas y postres típicos.', 6, 'Cultural', 'https://i0.wp.com/passporterapp.com/es/blog/wp-content/uploads/2021/11/Puntarenas-Costa-Rica.jpg?resize=1140%2C641&ssl=1'),
(2, 'Isla Tortuga', 'Isla famosa por sus playas de arena blanca y actividades acuáticas.', 6, 'Natural', 'https://www.visitcostarica.com/sites/default/files/2019/Banner_top_1440%20x%20550/BANNER-TOP-ISLA-TORTUGA.jpg'),
(3, 'Parque Nacional Manuel Antonio', 'Parque con playas, biodiversidad y senderos para observar fauna.', 6, 'Natural', 'https://kamuk.co.cr/wp-content/uploads/2022/10/ml-antonio-aereo-1.png'),
(4, 'Reserva Biológica Monteverde', 'Reserva en montañas, conocida por sus bosques nubosos y biodiversidad.', 6, 'Natural', 'https://areasyparques.com/wp-content/uploads/2013/06/monteverde01.jpg'),
(5, 'Parque Marino del Pacífico', 'Lugar educativo con exhibiciones sobre la vida marina de la región.', 6, 'Cultural', 'https://www.puntarenasseoye.com/wp-content/uploads/2023/05/img_6376.jpeg'),
(6, 'Playa Jacó', 'Playa popular para surfistas con vibrante vida nocturna.', 6, 'Recreativa', 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/1a/65/01/16/photo0jpg.jpg?w=900&h=500&s=1'),
(7, 'Puerto de Puntarenas', 'Histórico puerto con excursiones en barco a islas cercanas.', 6, 'Cultural', 'https://www.nacion.com/resizer/v2/EJ3DXXNABFGIFOTPWRQNWRZ7BA.jpg?smart=true&auth=43da7235c7e049d06a319ba8a2e3763d8b171664fad1e9e84ab48ea9303b21df&width=1440&height=959'),
(8, 'Playa Herradura', 'Playa tranquila con aguas calmadas, ideal para actividades acuáticas.', 6, 'Recreativa', 'https://www.govisitcostarica.co.cr/images/photos/desk-los-suenos-marina-herradura.jpg'),
(9, 'Catedral de Puntarenas', 'Iglesia histórica con arquitectura colonial.', 6, 'Cultural', 'https://scontent.fsjo6-1.fna.fbcdn.net/v/t39.30808-6/304783654_5796159787074492_8241476503483048225_n.jpg?stp=dst-jpg_p180x540&_nc_cat=107&ccb=1-7&_nc_sid=127cfc&_nc_ohc=rH80uKhZ1-MQ7kNvgEV0669&_nc_ht=scontent.fsjo6-1.fna&oh=00_AYDeFBsAAbqP2iUOIWR3iW-b50Wu24xP8GPcWoRC1mvAiQ&oe=66D2954B'),
(10, 'Parque Nacional Rincón de la Vieja', 'Parque nacional con un volcán activo, senderos, cascadas y aguas termales.', 5, 'Natural', 'https://www.visitcentroamerica.com/wp-content/uploads/2018/01/ver-centroamerica-costa-rica-parque-nacional-rincon-de-la-vieja.jpg'),
(11, 'Playas del Coco', 'Playa conocida por su vida nocturna, deportes acuáticos y hermosos atardeceres.', 5, 'Recreativa', 'https://cdn-5da890f4f911c8130c44f10c.closte.com/wp-content/uploads/2022/11/playas-del-coco-costa-rica.jpg'),
(12, 'Parque Nacional Palo Verde', 'Refugio de vida silvestre, ideal para la observación de aves.', 5, 'Natural', 'https://costaricasinfiltros.com/wp-content/gallery/palo-verde/thumbs/thumbs_001.jpg'),
(13, 'Playa Tamarindo', 'Playa popular para el surf, con vibrante vida nocturna y excelentes restaurantes.', 5, 'Recreativa', 'https://costarica.org/wp-content/uploads/2014/12/Tamarindo-Beach-500x350.jpg'),
(14, 'Playa Conchal', 'Playa famosa por su arena de conchas trituradas y aguas cristalinas.', 5, 'Natural', 'https://www.entercostarica.com/images/auto-sized/new_ecr/680x340/items/13897-6-westin-playa-conchal.jpg'),
(15, 'Liberia', 'Capital de Guanacaste, conocida como la \"Ciudad Blanca\", con rica historia y arquitectura colonial.', 5, 'Cultural', 'https://www.travelexcellence.com/wp-content/uploads/2020/09/liberia-guanacaste-01.jpg.webp'),
(16, 'Parque Nacional Volcán Poás', 'Uno de los volcanes más visitados de Costa Rica con un cráter impresionante y senderos naturales.', 2, 'Naturaleza', 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3f/Poas_crater.jpg/280px-Poas_crater.jpg'),
(17, 'Catarata La Paz', 'Una de las cascadas más hermosas de Costa Rica, ubicada en un entorno de bosque nuboso.', 2, 'Naturaleza', 'https://media.tacdn.com/media/attractions-splice-spp-674x446/0a/c7/40/39.jpg'),
(18, 'Museo Histórico Cultural Juan Santamaría', 'Museo dedicado a la historia y cultura de Costa Rica, en particular la Campaña Nacional de 1856.', 2, 'Cultura', 'https://www.larepublica.net/storage/images/2020/02/12/20200212143051.201802080955380museofb.jpg'),
(19, 'Teatro Nacional de Costa Rica', 'El principal teatro de Costa Rica, un ícono arquitectónico que ofrece una variedad de espectáculos culturales.', 1, 'Cultura', 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/61/CostaRica44_%288415726720%29.jpg/320px-CostaRica44_%288415726720%29.jpg'),
(20, 'Museo del Oro Precolombino', 'Un museo que alberga una impresionante colección de oro precolombino y otros artefactos históricos.', 1, 'Cultura', 'https://museosdelbancocentral.org/wp-content/uploads/2021/01/slider-principal_9-min.png'),
(21, 'Parque Metropolitano La Sabana', 'El pulmón verde de San José, ideal para actividades al aire libre, deportes y eventos culturales.', 1, 'Naturaleza', 'https://static.wixstatic.com/media/1f9c59_7e2b29b081b74cb1b0c41f56af02af43~mv2.png/v1/fill/w_740,h_440,al_c,q_85,usm_0.66_1.00_0.01,enc_auto/1f9c59_7e2b29b081b74cb1b0c41f56af02af43~mv2.png'),
(22, 'Basílica de Nuestra Señora de los Ángeles', 'Un santuario nacional y sitio de peregrinación, conocido por su arquitectura y la imagen de la Virgen de los Ángeles.', 3, 'Cultura', 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/68/Bas%C3%ADlica_Los_Angeles.JPG/800px-Bas%C3%ADlica_Los_Angeles.JPG'),
(23, 'Ruinas de Cartago', 'Ruinas históricas de la iglesia de Santiago Apóstol, un sitio emblemático en el centro de Cartago.', 3, 'Historia', 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/84/Old-ruins-in-cartago-daniel-vargas19.jpg/800px-Old-ruins-in-cartago-daniel-vargas19.jpg'),
(24, 'Jardín Botánico Lankester', 'Un jardín botánico con una impresionante colección de orquídeas y plantas tropicales.', 3, 'Naturaleza', 'https://www.descubramoscostarica.com/sites/default/files/styles/wide/public/2022-05/jardi%CC%81n-lankester-0.jpg.webp?itok=Ma2YaudH'),
(25, 'Parque Nacional Braulio Carrillo', 'Una vasta área de bosque tropical que ofrece rutas de senderismo, observación de aves y vistas impresionantes.', 4, 'Naturaleza', 'https://areasyparques.com/wp-content/uploads/2013/06/braulio_carrillo02.jpg'),
(26, 'Iglesia de la Inmaculada Concepción', 'Un monumento histórico y arquitectónico ubicado en el centro de Heredia, conocido por su arquitectura colonial.', 4, 'Cultura', 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/38/La_Catedral_de_Comaygua_en_2018.jpg/280px-La_Catedral_de_Comaygua_en_2018.jpg'),
(27, 'Museo de Cultura Popular', 'Un museo dedicado a preservar y mostrar las tradiciones y cultura popular costarricense.', 4, 'Cultura', 'https://www.unacomunica.una.ac.cr/images/Guillermo/Casona%202.jpeg'),
(28, 'Parque Nacional Cahuita', 'Un parque nacional famoso por sus playas de arena blanca, arrecifes de coral y vida silvestre.', 7, 'Naturaleza', 'https://www.cahuita.cr/wp-content/uploads/2019/06/20190608-142054-Costa-Rica-Cahuita-Playa-Parque-Nacional-IMG_0491-L3-960x640.jpeg'),
(29, 'Reserva Indígena Kekoldi', 'Una reserva indígena donde se pueden aprender sobre las tradiciones y cultura del pueblo Bribri.', 7, 'Cultura', 'https://elmundo.cr/wp-content/uploads/2023/07/kekoldi2.jpg.webp'),
(30, 'Tortuguero', 'Un pueblo pintoresco y el Parque Nacional Tortuguero, conocido por ser un sitio importante de anidación de tortugas marinas.', 7, 'Naturaleza', 'https://media-cdn.tripadvisor.com/media/attractions-splice-spp-674x446/0c/0d/fa/20.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cantones`
--

CREATE TABLE `cantones` (
  `CantonID` int(11) NOT NULL,
  `Nombre` varchar(40) NOT NULL,
  `ProvinciaID` int(11) NOT NULL,
  `Img` varchar(300) NOT NULL,
  `Descripcion` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cantones`
--

INSERT INTO `cantones` (`CantonID`, `Nombre`, `ProvinciaID`, `Img`, `Descripcion`) VALUES
(1, 'San Jose', 1, 'https://www.msj.go.cr/SiteAssets/img_principales/mi_canton.png', 'Centro cultural y politico del pais, con eventos como el Festival de la Luz y celebraciones del Dia de la Independencia. Su vida cultural incluye teatros, museos y festivales de musica.'),
(2, 'Alajuelita', 1, 'https://munialajuelita.go.cr/images/2021/02/03/alajuelita.png', 'Conocido por sus festividades religiosas, como la Fiesta de la Virgen de los Angeles, que atrae a muchos fieles.'),
(3, 'Vazquez de Coronado', 1, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRap7ExubMyvw6lBWeUC_hg-6QRqNY-Y8vamg&s', 'Mantiene tradiciones agricolas y festividades como la Feria de la Naranja, celebrando la produccion local.'),
(4, 'Acosta', 1, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTDepa81SAA3kRHLHhxLwJpJ85Y-QmhaniG-Q&s', 'Celebran el Festival de la Miel y la Feria de la Cosecha, destacando su produccion agricola.'),
(5, 'Tibas', 1, 'https://guiascostarica.info/wp-content/gallery/tibas/tibas02.webp', 'Realiza eventos culturales y deportivos, como torneos de futbol y celebraciones locales.'),
(6, 'Moravia', 1, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ7H9YLCIzJzH-XS-AfanasztRu5dztg93RVQ&s', 'Conocido por sus festividades religiosas y eventos culturales comunitarios.'),
(7, 'Montes de Oca', 1, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRLOVNPRQBPQ3IA6xByf96JrpPbiv_OawPv7g&s', 'Alberga la Universidad de Costa Rica y organiza eventos academicos y culturales, como ferias y exposiciones.'),
(8, 'Turrubares', 1, 'https://estaeslalibreria.com/wp-content/uploads/2022/10/turrubares-costa-rica-1.jpg', 'Celebran fiestas tradicionales como la Fiesta de San Rafael y eventos culturales relacionados con su herencia agricola.'),
(9, 'Dota', 1, 'https://www.shutterstock.com/image-photo/beautiful-aerial-view-town-santa-600nw-1602458878.jpg', 'Reconocido por sus festivales de cafe y su celebracion de la cultura indigena local.'),
(10, 'Curridabat', 1, 'https://upload.wikimedia.org/wikipedia/commons/5/51/Curridabat_Catedral_Iglesia_Catolica.jpg', 'Conocido por sus eventos comunitarios y celebraciones locales, como festivales de musica y ferias.'),
(11, 'Perez Zeledon', 1, 'https://assets-teletica.ray.media/Files/Sizes/2021/2/18/prez-zeledn---archivo_1280871134_380x260.jpg', 'Destacan por su Feria del Agricultor y el Festival de la Cosecha, que celebran la agricultura y la cultura local.'),
(12, 'Escazu', 1, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTzjBqvp2SQY2nhRPOKTyHHcqLVOOJx2q9G4w&s', 'Mantiene costumbres tradicionales en la celebracion de la Fiesta de San Juan y eventos culturales.'),
(13, 'Leon Cortes Castro', 1, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSEmHz-1B8gnK_3vwogtOzMgzpoDPJXQWTPfw&s', 'Celebran eventos agricolas y festivos, destacando su produccion cafetalera.'),
(14, 'Desamparados', 1, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRSfQL_JRfBKsOabAUdDpunBPhdp1UXvwTbPQ&s', 'Tiene tradiciones religiosas y eventos culturales como festividades locales y ferias.'),
(15, 'Puriscal', 1, 'https://149478393.v2.pressablecdn.com/wp-content/uploads/2014/12/86a5b25e36524fd9ed947f0b0cff6aaa.jpg', 'Conocido por la Fiesta de San Antonio y celebraciones locales que destacan su patrimonio agricola.'),
(16, 'Tarrazu', 1, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRa_ZQflCEBxZSFJykjijzBY3yVgk8b4czrjw&s', 'Famoso por su cafe, celebran eventos relacionados con la cosecha y la produccion cafetera.'),
(17, 'Aserri', 1, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSniC3kbO8eu-Yf_S9dmvalR05Wd32RJnX5pQ&s', ' Mantienen costumbres relacionadas con la agricultura y festividades locales, como la Fiesta de San Sebastian.'),
(18, 'Mora', 1, 'https://upload.wikimedia.org/wikipedia/commons/e/e0/Ciudad_Colon_Costa_Rica_april_2016%2C_aerial_image.jpg', 'Realizan festivales locales y eventos relacionados con la agricultura y la cultura comunitaria.'),
(19, 'Goicoechea', 1, 'https://kraincostarica.com/en/content-images/GoicoecheaGuadalupeCostaRica.jpg', 'Alberga eventos culturales y deportivos, asi como celebraciones locales de caracter festivo.'),
(20, 'Santa Ana', 1, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQRyZD1dg7ZEHUf0a3wOkDz3CPzuVLYqPwv8Q&s', 'Conocido por sus festivales de musica, arte y eventos comunitarios que reflejan su vida cultural vibrante'),
(21, 'Alajuela', 2, 'https://i0.wp.com/www.unavidadeviajero.com/wp-content/uploads/2022/10/Alajuela-Costa-Rica-9-scaled.jpg?resize=1290%2C968&ssl=1', 'El cantón central de Alajuela, ubicado en la provincia de Alajuela, Costa Rica, es una región de gran relevancia histórica, económica y cultural. Fundado en 1782, ha sido testigo de eventos clave como la Batalla de Rivas en 1856, donde el héroe nacional Juan Santamaría, originario de Alajuela, desem'),
(22, 'San Ramon', 2, 'https://scontent.fsyq3-1.fna.fbcdn.net/v/t1.6435-9/108002471_1161840810856142_11991031356641985_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=0327a3&_nc_ohc=8dmCUW3veMUQ7kNvgEi-Idc&_nc_ht=scontent.fsyq3-1.fna&oh=00_AYAqF-GZVf4d8A5mGGWIz7Ypzh5PG1xqgu93UXLgPQ-otA&oe=66E30A8C', 'San Ramón es un cantón de la provincia de Alajuela, Costa Rica, conocido por su fuerte identidad cultural y su papel histórico en el país. Fundado en 1854, San Ramón ha sido cuna de importantes figuras políticas y literarias de Costa Rica, lo que le ha ganado el sobrenombre de \"La Ciudad de los Poet'),
(23, 'Grecia', 2, 'https://remax-occidente-cr.com/wp-content/uploads/2022/12/Grecia-Costa-Rica-Occidente-real-Estate_n.jpg', 'El cantón de Grecia, ubicado en la provincia de Alajuela, Costa Rica, es conocido por su pintoresca arquitectura, su agricultura próspera y su vibrante vida comunitaria. Fundado en 1838, Grecia ha sido un centro de producción agrícola, especialmente reconocido por su café de alta calidad, que es uno'),
(36, 'Cartago', 3, 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3e/Basilica_Virgen_de_los_Angeles_CRI_07_2018_0316.jpg/250px-Basilica_Virgen_de_los_Angeles_CRI_07_2018_0316.jpg', 'Histórica capital antigua de Costa Rica.'),
(37, 'Turrialba', 3, 'https://blog.nativu.com/wp-content/uploads/2021/04/Turrialba-Villas-Vistas-del-Volcan-16.jpg', 'Conocido por su volcán y actividades deportivas al aire libre.'),
(38, 'Paraíso', 3, 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/bd/Iglesia_Inmaculada_Concepcion_Ujarras.jpg/250px-Iglesia_Inmaculada_Concepcion_Ujarras.jpg', 'Famoso por su producción de café y paisajes naturales.'),
(43, 'Heredia', 4, 'https://www.monumental.co.cr/wp-content/uploads/2023/09/Heredia-Costa-Rica-sign_Tico-Lingo-700x403.png', 'Con rica cultura cafetera y clima fresco.'),
(44, 'Barva', 4, 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fb/Templo_Catolico_y_Barvak.JPG/250px-Templo_Catolico_y_Barvak.JPG', 'Zona rural con paisajes hermosos.'),
(45, 'San Isidro', 4, 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c4/Iglesia_de_San_Isidro_de_Heredia.jpg/250px-Iglesia_de_San_Isidro_de_Heredia.jpg', 'Un cantón creciente con desarrollo urbano.'),
(55, 'Cartago', 3, 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3e/Basilica_Virgen_de_los_Angeles_CRI_07_2018_0316.jpg/250px-Basilica_Virgen_de_los_Angeles_CRI_07_2018_0316.jpg', 'Histórica capital antigua de Costa Rica.'),
(56, 'Turrialba', 3, 'https://blog.nativu.com/wp-content/uploads/2021/04/Turrialba-Villas-Vistas-del-Volcan-16.jpg', 'Conocido por su volcán y actividades deportivas al aire libre.'),
(57, 'Paraíso', 3, 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/bd/Iglesia_Inmaculada_Concepcion_Ujarras.jpg/250px-Iglesia_Inmaculada_Concepcion_Ujarras.jpg', 'Famoso por su producción de café y paisajes naturales.'),
(58, 'Heredia', 4, 'https://www.monumental.co.cr/wp-content/uploads/2023/09/Heredia-Costa-Rica-sign_Tico-Lingo-700x403.png', 'Con rica cultura cafetera y clima fresco.'),
(59, 'Barva', 4, 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fb/Templo_Catolico_y_Barvak.JPG/250px-Templo_Catolico_y_Barvak.JPG', 'Zona rural con paisajes hermosos.'),
(60, 'San Isidro', 4, 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c4/Iglesia_de_San_Isidro_de_Heredia.jpg/250px-Iglesia_de_San_Isidro_de_Heredia.jpg', 'Un cantón creciente con desarrollo urbano.'),
(61, 'Liberia', 5, 'https://internationalliving.com/_next/image/?url=https%3A%2F%2Fimages.ctfassets.net%2Fwv75stsetqy3%2F1smuFMK680ZVvwgqSiB46c%2Fc8212d1a7cc348116dd17bd21faf7b54%2FLiberia__Costa_Rica.webp%3Fw%3D1800%26h%3D600%26q%3D60%26fit%3Dfill%26fm%3Dwebp&w=1920&q=60', 'Capital de Guanacaste, conocida por su muy bonito centro histórico.'),
(62, 'Nicoya', 5, 'https://es.wikipedia.org/wiki/Archivo:Iglesia_colonial_2.png', 'Centro de la cultura guanacasteca y hogar de playas hermosas.'),
(63, 'Tilarán', 5, 'https://www.guanacastealaaltura.com/wp-content/uploads/2023/08/Tilaran-y-su-historia.jpg', 'Famoso por el lago Arenal y actividades de ecoturismo.'),
(64, 'Limón', 7, 'https://costarica.org/wp-content/uploads/2017/09/Limon2.jpg', 'Conocido por su cultura afrocaribeña y puerto.'),
(65, 'Pococí', 7, 'https://www.revistaviajesdigital.com/images/2021/tortuguero.jpg', 'Zona agrícola con ricas tradiciones culturales.'),
(66, 'Siquirres', 7, 'https://ecomunicipal.co.cr/wp-content/uploads/2020/12/siquirres-1024x575-1.jpg', 'Conocido por su producción de banano y comercio.');

-- --------------------------------------------------------

--
-- Table structure for table `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `id_hotel` int(11) NOT NULL,
  `comentario` text NOT NULL,
  `likes` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `costumbresindigenas`
--

CREATE TABLE `costumbresindigenas` (
  `CostumbreID` int(11) NOT NULL,
  `Nombre` varchar(75) NOT NULL,
  `Descripcion` varchar(150) NOT NULL,
  `GrupoEtnico` varchar(50) NOT NULL,
  `ProvinciaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `costumbresindigenas`
--

INSERT INTO `costumbresindigenas` (`CostumbreID`, `Nombre`, `Descripcion`, `GrupoEtnico`, `ProvinciaID`) VALUES
(1, 'Danza del Jaguar', 'Ritual que representa al jaguar, símbolo de poder en la cultura Bribri.', 'Bribri', 1),
(2, 'Ceremonia del Maíz', 'Ritual para agradecer la cosecha de maíz a los dioses.', 'Cabécar', 1),
(3, 'Juego de la Tira', 'Juego tradicional que simula antiguos desafíos de resistencia.', 'Cabécar', 1),
(4, 'Fiesta del Sol', 'Celebración en la que se honra al dios del sol con danzas y ofrendas.', 'Maleku', 2),
(5, 'Rituales del Fuego', 'Ceremonia para pedir la protección del fuego sagrado.', 'Maleku', 2),
(6, 'Cantos del Espíritu', 'Cantos tradicionales que cuentan historias y leyendas locales.', 'Bribri', 2),
(7, 'Ceremonia del Agua', 'Ritual para rendir homenaje a las aguas sagradas y pedir su bendición.', 'Cabécar', 3),
(8, 'Danza de la Serpiente', 'Danza ceremonial que simboliza la conexión con la serpiente y su sabiduría.', 'Buglé', 3),
(9, 'Festival de la Cosecha', 'Celebración para conmemorar la cosecha de productos tradicionales.', 'Bribri', 3),
(10, 'Fiesta del Yuca', 'Celebración en la que se honra la cosecha de yuca con bailes y cantos.', 'Cabécar', 4),
(11, 'Rituales del Bosque', 'Ceremonias realizadas en el bosque para pedir protección a los espíritus.', 'Bribri', 4),
(12, 'Danza del Colibrí', 'Danza ceremonial que representa al colibrí como símbolo de vida.', 'Bribri', 4),
(13, 'Festival del Maíz', 'Celebración de la cosecha de maíz con eventos y danzas tradicionales.', 'Chorotega', 5),
(14, 'Ceremonia del Cacao', 'Ritual para bendecir el cultivo del cacao y pedir una buena cosecha.', 'Guaymí', 5),
(15, 'Danza de los Espíritus', 'Danza que representa a los espíritus protectores de la comunidad.', 'Chorotega', 5),
(16, 'Fiesta del Mar', 'Celebración en la que se honra el mar con ofrendas y danzas.', 'Ngäbe', 6),
(17, 'Ritual del Jaguar', 'Ceremonia para invocar la protección del jaguar, un animal sagrado.', 'Bribri', 6),
(18, 'Danza de la Canoa', 'Danza tradicional que simboliza la conexión con el agua y la pesca.', 'Ngäbe', 6),
(19, 'Festival del Banano', 'Celebración de la cosecha del banano con música y bailes tradicionales.', 'Bribri', 7),
(20, 'Ritual del Río', 'Ceremonia para honrar los ríos y pedir su protección.', 'Cabécar', 7),
(21, 'Danza del Colibrí', 'Danza ceremonial en honor al colibrí y su significado en la cultura local.', 'Bribri', 7);

-- --------------------------------------------------------

--
-- Table structure for table `cotizaciones`
--

CREATE TABLE `cotizaciones` (
  `id_hotel` int(11) NOT NULL,
  `precio_noche` int(11) NOT NULL,
  `categoria_estrellas` varchar(255) NOT NULL,
  `nombre_hotel` varchar(255) NOT NULL,
  `comentarios` varchar(255) NOT NULL,
  `canasta_basica` int(11) NOT NULL,
  `provincia` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cotizaciones`
--

INSERT INTO `cotizaciones` (`id_hotel`, `precio_noche`, `categoria_estrellas`, `nombre_hotel`, `comentarios`, `canasta_basica`, `provincia`) VALUES
(1, 375, 'Cinco estrellas y media ', 'Tabacon Thermal Resort y Spa', 'Noreste de Centro de la Fortuna de San Carlos 13 Km, Provincia de Alajuela, Nuevo Arenal', 32500, 'Alajuela'),
(2, 144, 'Cinco estrellas y media ', 'Shana By The Beach Manuel Antonio', 'Ruta Punta Quepos Manuel Antonio, Provincia de Puntarenas, Quepos, 60601', 21175, 'Puntarenas'),
(3, 211, '5 estrellas y media', 'Arenal manoa Resort Hotel Y Hot Spings', 'la palma de la fortuna Hotel Arenal Manoa Alajuela San Carlos, Provincia de Alajuela, Palma, 21007', 27500, 'Alajuela'),
(4, 84, 'Arenal manoa Resort Hotel Y Hot Spings', 'Camino Verde Bed & Breakfast', 'Next to Pulperia Las Orquídeas, Santa Elena, Monteverde, Puntarenas Province, Monteverde, 60109', 14500, 'Puntarenas '),
(5, 147, '4 estrellas y media', 'Volcano Lodge, Hotel & Thermal Experience', 'Hotel & Thermal Experience 7 km Oeste del Centro de, Volcano Lodge, Provincia de Alajuela, La Fortuna, 21007', 27483, 'Alajuela'),
(6, 86, '4 estrellas y media', 'Arenal Observatory Lodge & Trails', '7Km Sureste del Parque Nacional Volcan Arenal, Provincia de Alajuela, San Carlos, 21007', 27483, 'Alajuela'),
(7, 102, '4 estrellas', 'Blue River Resort & Hot Springs', 'de, 600 metros norte del antiguo mariposario, Provincia de Guanacaste, El Gavilan, 21306', 22500, 'Guanacaste'),
(8, 276, '5 Estrellas ', 'Hideaway Rio Celeste Hotel', '700 meter west of national park Tenorio Alajuela Rio Celeste, 21502', 25500, 'la fortuna');

-- --------------------------------------------------------

--
-- Table structure for table `eventos`
--

CREATE TABLE `eventos` (
  `EventoID` int(11) NOT NULL,
  `Nombre` varchar(75) NOT NULL,
  `Descripcion` varchar(150) NOT NULL,
  `FechaInicio` date NOT NULL,
  `FechaFin` date NOT NULL,
  `CantonID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `opiniones`
--

CREATE TABLE `opiniones` (
  `OpinionID` int(11) NOT NULL,
  `UsuarioID` int(11) NOT NULL,
  `AtraccionID` int(11) NOT NULL,
  `Comentario` varchar(150) NOT NULL,
  `Calificacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `provincias`
--

CREATE TABLE `provincias` (
  `ProvinciaID` int(11) NOT NULL,
  `Nombre` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `provincias`
--

INSERT INTO `provincias` (`ProvinciaID`, `Nombre`) VALUES
(1, 'San José'),
(2, 'Alajuela'),
(3, 'Cartago'),
(4, 'Heredia'),
(5, 'Guanacaste'),
(6, 'Puntarenas'),
(7, 'Limón');

-- --------------------------------------------------------

--
-- Table structure for table `restaurantes`
--

CREATE TABLE `restaurantes` (
  `RestauranteID` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Descripcion` varchar(150) NOT NULL,
  `ProvinciaID` int(11) NOT NULL,
  `Tipo` varchar(20) NOT NULL,
  `Imagen_comida` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `restaurantes`
--

INSERT INTO `restaurantes` (`RestauranteID`, `Nombre`, `Descripcion`, `ProvinciaID`, `Tipo`, `Imagen_comida`) VALUES
(1, 'Restaurante La Vasija', 'Famoso por su Casado, un plato típico que incluye arroz, frijoles, plátano maduro, ensalada, y carne a elección.', 1, 'Comida Típica', 'https://www.comedera.com/wp-content/uploads/2022/10/Casado-costarricense-shutterstock_638209654.jpg'),
(2, 'Soda Tapia', 'Conocida por su Gallo Pinto, un desayuno tradicional hecho con arroz y frijoles mezclados, acompañado de huevos y plátano.', 1, 'Comida Típica', 'https://laroussecocina.mx/wp-content/uploads/2020/09/gallo_pinto_-_Google_Search.png.webp'),
(3, 'Restaurante Tiquicia', 'Ofrece Sopa Negra, una sopa a base de frijoles negros, servida con huevo duro y plátano verde.', 1, 'Comida Típica', 'https://preview.redd.it/week-1-beans-sopa-negra-black-soup-v0-f68s84uqlhac1.jpeg?width=1080&crop=smart&auto=webp&s=6deb03fe1e0d842f4a296c17e93a91eec8cd6f9c'),
(4, 'La Posada de Doña Lela', 'Conocida por sus Tortillas de Queso, gruesas y llenas de queso fresco, un clásico en Cartago.', 3, 'Comida Típica', 'https://www.instamasa.com/wp-content/uploads/2020/04/tortilla-e1640276100175.jpg'),
(5, 'Restaurante Casona del Cafetal', 'Famoso por su Pejibaye, una crema hecha de la fruta del pejibaye, tradicionalmente servida como entrada.', 3, 'Comida Típica', 'https://www.numar.net/wp-content/uploads/2022/03/Pollo-en-salsa-pejibaye.jpg'),
(6, 'Soda El Patio', 'Popular por sus Tamales, preparados especialmente durante la época navideña con masa de maíz rellena de carne y vegetales.', 3, 'Comida Típica', 'https://tulemar.com/wp-content/uploads/2022/12/tamales-e1674070279378.jpg'),
(7, 'Restaurante La Candelaria', 'Especializado en Picadillo de Arracache, un plato típico de Heredia hecho con arracache y carne.', 4, 'Comida Típica', 'https://si.cultura.cr/_next/image?url=https%3A%2F%2Fsicultura-live.s3.amazonaws.com%2Fpublic%2Fmedia%2F0237_picadillo_de_arrache_el_original_1.jpg&w=828&q=75'),
(8, 'El Rinconcito Herediano', 'Famoso por sus Chorreadas, tortas hechas de maíz tierno acompañadas con natilla.', 4, 'Comida Típica', 'https://www.recipesfromcostarica.com/uploads/2/0/3/7/2037234/chorreada-recipe_orig.jpg'),
(9, 'Soda El Sabor Tico', 'Ofrece olla de carne, un guiso típico con carne de res, vegetales y yuca.', 4, 'Comida Típica', 'https://www.comedera.com/wp-content/uploads/2022/10/olla-de-carne.jpg'),
(10, 'Restaurante Afrocaribeño', 'Famoso por su Rice and Beans, un plato típico de Limón hecho con arroz, frijoles, leche de coco y especias.', 7, 'Comida Típica', 'https://i.pinimg.com/564x/74/06/2c/74062ca3be8ed2680b28fade01dc29cf.jpg'),
(11, 'Soda Caribeña', 'Ofrece Rondón, un guiso tradicional de mariscos y tubérculos cocidos en leche de coco.', 7, 'Comida Típica', 'https://cocina.guru/wp-content/uploads/2022/11/guiso-de-mariscos-1024x683.jpg'),
(12, 'Restaurante Limonense', 'Conocido por su Patí, un pastelillo relleno de carne molida y especias.', 7, 'Comida Típica', 'https://mipanasociados.com/wp-content/uploads/2016/05/pastelillos-de-carne.jpg'),
(13, 'Restaurante Las Candelillas', 'Especializado en Pollo a la Leña, un plato típico de la zona que se caracteriza por su sabor ahumado.', 2, 'Comida Típica', 'https://gestion.pe/resizer/uhT_XjRaKrOJfmhjgmovvVXmJJ4=/580x330/smart/filters:format(jpeg):quality(75)/arc-anglerfish-arc2-prod-elcomercio.s3.amazonaws.com/public/65KKOJKGIBG3JMR4UIO2TX3PCE.jpg'),
(14, 'Soda El Balcón', 'Conocido por su Cajeta de Coco, un dulce tradicional hecho de coco y azúcar, común en la región de Alajuela.', 2, 'Comida Típica', 'https://donamaria.cr/wp-content/uploads/Web-DM-Noviembre-03.png'),
(15, 'Restaurante Mi Tierra', 'Ofrece Chifrijo, un popular plato que mezcla chicharrones, frijoles, arroz, y pico de gallo, típico de Alajuela.', 2, 'Comida Típica', 'https://upload.wikimedia.org/wikipedia/commons/thumb/5/54/Chifrijo_tico.jpg/621px-Chifrijo_tico.jpg'),
(16, 'Restaurante La Hacienda', 'Famoso por su Gallo de Res, un plato típico guanacasteco hecho con carne de res desmenuzada y tortillas.', 5, 'Comida Típica', 'https://upload.wikimedia.org/wikipedia/commons/e/eb/Gallitos_de_chorizo.jpg'),
(17, 'Soda Las Palmas', 'Conocida por sus Rosquillas, pequeñas galletas saladas hechas a base de maíz y queso, tradicionales en Guanacaste.', 5, 'Comida Típica', 'https://dynamic-media-cdn.tripadvisor.com/media/photo-o/0b/a6/d0/bc/photo0jpg.jpg?w=1200&h=-1&s=1'),
(18, 'Restaurante El Sabor Guanacasteco', 'Especializado en Bizcochos, bocadillos hechos de maíz y queso, característicos de la región.', 5, 'Comida Típica', 'https://noticiasguanacaste.com/wp-content/uploads/2024/05/sabor-guanacasteco-platos-780x470.png.webp'),
(19, 'Restaurante Mariscos El Pescador', 'Conocido por su ceviche fresco y su variada selección de mariscos como camarones, pulpo y pescado.', 6, 'Comida Típica', 'https://caldosas.com/wp-content/uploads/2022/03/picaritas.jpg'),
(20, 'Soda El Cangrejo', 'Famosa por sus casados con mariscos, incluyendo camarones y calamares, servidos con arroz, frijoles y plátano.', 6, 'Comida Típica', 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0e/CEVICHE_DE_CAMAR%C3%93N_ECUATORIANO.jpg/273px-CEVICHE_DE_CAMAR%C3%93N_ECUATORIANO.jpg'),
(21, 'Restaurante La Ostra', 'Ofrece platos tradicionales como la sopa de mariscos y el arroz con camarones, además de una excelente vista al mar.', 6, 'Comida Típica', 'https://mandolina.co/wp-content/uploads/2023/08/sopa-de-mariscos-1080x550-1.png'),
(22, 'Soda Puntarenas', 'Especializa en pescado frito acompañado de yuca y ensalada, un plato típico costarricense con un toque costero.', 6, 'Comida Típica', 'https://www.comedera.com/wp-content/uploads/2022/05/pescado-frito-con-tostones-y-ensalada.jpg'),
(23, 'Restaurante El Coral', 'Destaca por su variedad de ceviches y su plato estrella, el arroz con mariscos, ideal para disfrutar junto al mar.', 6, 'Comida Típica', 'https://www.platingsandpairings.com/wp-content/uploads/2020/07/octopus-ceviche-recipe-15-scaled.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ubicacionesempresas`
--

CREATE TABLE `ubicacionesempresas` (
  `EmpresaID` int(11) NOT NULL,
  `Nombre` varchar(75) NOT NULL,
  `Direccion` varchar(125) NOT NULL,
  `TipoEmpresa` varchar(25) NOT NULL,
  `ProvinciaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `UsuarioID` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Correo` varchar(50) NOT NULL,
  `Contraseña` varchar(20) NOT NULL,
  `TipoUsuario` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atracciones`
--
ALTER TABLE `atracciones`
  ADD PRIMARY KEY (`AtraccionID`);

--
-- Indexes for table `cantones`
--
ALTER TABLE `cantones`
  ADD PRIMARY KEY (`CantonID`);

--
-- Indexes for table `costumbresindigenas`
--
ALTER TABLE `costumbresindigenas`
  ADD PRIMARY KEY (`CostumbreID`);

--
-- Indexes for table `cotizaciones`
--
ALTER TABLE `cotizaciones`
  ADD PRIMARY KEY (`id_hotel`);

--
-- Indexes for table `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`EventoID`);

--
-- Indexes for table `opiniones`
--
ALTER TABLE `opiniones`
  ADD PRIMARY KEY (`OpinionID`);

--
-- Indexes for table `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`ProvinciaID`);

--
-- Indexes for table `restaurantes`
--
ALTER TABLE `restaurantes`
  ADD PRIMARY KEY (`RestauranteID`);

--
-- Indexes for table `ubicacionesempresas`
--
ALTER TABLE `ubicacionesempresas`
  ADD PRIMARY KEY (`EmpresaID`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`UsuarioID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atracciones`
--
ALTER TABLE `atracciones`
  MODIFY `AtraccionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `costumbresindigenas`
--
ALTER TABLE `costumbresindigenas`
  MODIFY `CostumbreID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `eventos`
--
ALTER TABLE `eventos`
  MODIFY `EventoID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `opiniones`
--
ALTER TABLE `opiniones`
  MODIFY `OpinionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `provincias`
--
ALTER TABLE `provincias`
  MODIFY `ProvinciaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `restaurantes`
--
ALTER TABLE `restaurantes`
  MODIFY `RestauranteID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `ubicacionesempresas`
--
ALTER TABLE `ubicacionesempresas`
  MODIFY `EmpresaID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `UsuarioID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
