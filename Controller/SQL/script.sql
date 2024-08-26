CREATE DATABASE Proyecto_MapaInteractivo;
USE Proyecto_MapaInteractivo;



SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Base de datos: `reservas`
--

-- --------------------------
-- Estructura de tablas
-- --------------------------

-- Estructura de tabla para la tabla `cotizaciones`
CREATE TABLE `cotizaciones` (
  `id_hotel` int NOT NULL,
  `precio_noche` int NOT NULL,
  `categoria_estrellas` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `nombre_hotel` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `comentarios` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `canasta_basica` int NOT NULL,
  `provincia` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Estructura de tabla para la tabla `comentarios`
CREATE TABLE `comentarios` (
  `id_comentario` int NOT NULL,
  `id_hotel` int NOT NULL,
  `comentario` text NOT NULL,
  `likes` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Estructura de tabla para la tabla `atracciones`
CREATE TABLE `atracciones` (
  `AtraccionID` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Descripcion` varchar(200) NOT NULL,
  `CantonID` int(11) NOT NULL,
  `Tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Estructura de tabla para la tabla `cantones`
CREATE TABLE `cantones` (
  `CantonID` int(11) NOT NULL,
  `Nombre` varchar(40) NOT NULL,
  `ProvinicaID` int(11) NOT NULL,
  `Img` varchar(300) NOT NULL,
  `Descripcion` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Estructura de tabla para la tabla `costumbresindigenas`
CREATE TABLE `costumbresindigenas` (
  `CostumbreID` int(11) NOT NULL,
  `Nombre` varchar(75) NOT NULL,
  `Descripcion` varchar(150) NOT NULL,
  `GrupoEtnico` varchar(50) NOT NULL,
  `ProvinciaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Estructura de tabla para la tabla `eventos`
CREATE TABLE `eventos` (
  `EventoID` int(11) NOT NULL,
  `Nombre` varchar(75) NOT NULL,
  `Descripcion` varchar(150) NOT NULL,
  `FechaInicio` date NOT NULL,
  `FechaFin` date NOT NULL,
  `CantonID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Estructura de tabla para la tabla `opiniones`
CREATE TABLE `opiniones` (
  `OpinionID` int(11) NOT NULL,
  `UsuarioID` int(11) NOT NULL,
  `AtraccionID` int(11) NOT NULL,
  `Comentario` varchar(150) NOT NULL,
  `Calificacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Estructura de tabla para la tabla `provincias`
CREATE TABLE `provincias` (
  `ProvinciaID` int(11) NOT NULL,
  `Nombre` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Estructura de tabla para la tabla `restaurantes`
CREATE TABLE `restaurantes` (
  `RestauranteID` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Descripcion` varchar(150) NOT NULL,
  `CantonID` int(11) NOT NULL,
  `Tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Estructura de tabla para la tabla `ubicacionesempresas`
CREATE TABLE `ubicacionesempresas` (
  `EmpresaID` int(11) NOT NULL,
  `Nombre` varchar(75) NOT NULL,
  `Direccion` varchar(125) NOT NULL,
  `TipoEmpresa` varchar(25) NOT NULL,
  `ProvinciaID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Estructura de tabla para la tabla `usuarios`
CREATE TABLE `usuarios` (
  `UsuarioID` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Correo` varchar(50) NOT NULL,
  `Contraseña` varchar(20) NOT NULL,
  `TipoUsuario` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------
-- Índices y restricciones
-- --------------------------

-- Índices para la tabla `cotizaciones`
ALTER TABLE `cotizaciones`
  ADD PRIMARY KEY (`id_hotel`);

-- Índices para la tabla `comentarios`
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_hotel` (`id_hotel`);

-- Índices para la tabla `atracciones`
ALTER TABLE `atracciones`
  ADD PRIMARY KEY (`AtraccionID`);

-- Índices para la tabla `cantones`
ALTER TABLE `cantones`
  ADD PRIMARY KEY (`CantonID`);

-- Índices para la tabla `costumbresindigenas`
ALTER TABLE `costumbresindigenas`
  ADD PRIMARY KEY (`CostumbreID`);

-- Índices para la tabla `eventos`
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`EventoID`);

-- Índices para la tabla `opiniones`
ALTER TABLE `opiniones`
  ADD PRIMARY KEY (`OpinionID`);

-- Índices para la tabla `provincias`
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`ProvinciaID`);

-- Índices para la tabla `restaurantes`
ALTER TABLE `restaurantes`
  ADD PRIMARY KEY (`RestauranteID`);

-- Índices para la tabla `ubicacionesempresas`
ALTER TABLE `ubicacionesempresas`
  ADD PRIMARY KEY (`EmpresaID`);

-- Índices para la tabla `usuarios`
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`UsuarioID`);

-- Restricciones y llaves foráneas
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_hotel`) REFERENCES `cotizaciones` (`id_hotel`);

-- AUTO_INCREMENT para las tablas
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `atracciones`
  MODIFY `AtraccionID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `costumbresindigenas`
  MODIFY `CostumbreID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `eventos`
  MODIFY `EventoID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `opiniones`
  MODIFY `OpinionID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `provincias`
  MODIFY `ProvinciaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

ALTER TABLE `restaurantes`
  MODIFY `RestauranteID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `ubicacionesempresas`
  MODIFY `EmpresaID` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `usuarios`
  MODIFY `UsuarioID` int(11) NOT NULL AUTO_INCREMENT;

-- --------------------------
-- Inserciones de datos
-- --------------------------

-- Volcado de datos para la tabla `cotizaciones`
INSERT INTO `cotizaciones` (`id_hotel`, `precio_noche`, `categoria_estrellas`, `nombre_hotel`, `comentarios`, `canasta_basica`, `provincia`) VALUES
(1, 375, 'Cinco estrellas y media ', 'Tabacon Thermal Resort y Spa', 'Noreste de Centro de la Fortuna de San Carlos 13 Km, Provincia de Alajuela, Nuevo Arenal', 32500, 'Alajuela'),
(2, 144, 'Cinco estrellas y media ', 'Shana By The Beach Manuel Antonio', 'Ruta Punta Quepos Manuel Antonio, Provincia de Puntarenas, Quepos, 60601', 21175, 'Puntarenas'),
(3, 211, '5 estrellas y media', 'Arenal manoa Resort Hotel Y Hot Spings', 'la palma de la fortuna Hotel Arenal Manoa Alajuela San Carlos, Provincia de Alajuela, Palma, 21007', 27500, 'Alajuela'),
(4, 84, 'Arenal manoa Resort Hotel Y Hot Spings', 'Camino Verde Bed & Breakfast', 'Next to Pulperia Las Orquídeas, Santa Elena, Monteverde, Puntarenas Province, Monteverde, 60109', 14500, 'Puntarenas '),
(5, 147, '4 estrellas y media', 'Volcano Lodge, Hotel & Thermal Experience', 'Hotel & Thermal Experience 7 km Oeste del Centro de, Volcano Lodge, Provincia de Alajuela, La Fortuna, 21007', 27483, 'Alajuela'),
(6, 86, '4 estrellas y media', 'Arenal Observatory Lodge & Trails', '7Km Sureste del Parque Nacional Volcan Arenal, Provincia de Alajuela, San Carlos, 21007', 27483, 'Alajuela'),
(7, 102, '4 estrellas', 'Blue River Resort & Hot Springs', 'de, 600 metros norte del antiguo mariposario, Provincia de Guanacaste, El Gavilan, 21306', 22500, 'Guanacaste'),
(8, 276, '5 Estrellas ', 'Hideaway Rio Celeste Hotel', '700 meter west of national park Tenorio Alajuela Rio Celeste, 21502', 25500, 'la fortuna');

-- Volcado de datos para la tabla `comentarios`
INSERT INTO `comentarios` (`id_comentario`, `id_hotel`, `comentario`, `likes`) VALUES
(1, 2, 'Muy lindo y todo pero cuando bajan los precios \r\n', 0),
(2, 4, 'Increible lugar', 0);

-- Volcado de datos para la tabla `cantones`
INSERT INTO `cantones` (`CantonID`, `Nombre`, `ProvinicaID`, `Img`, `Descripcion`) VALUES
(21, 'Alajuela', 2, 'https://i0.wp.com/www.unavidadeviajero.com/wp-content/uploads/2022/10/Alajuela-Costa-Rica-9-scaled.jpg?resize=1290%2C968&ssl=1', 'El cantón central de Alajuela, ubicado en la provincia de Alajuela, Costa Rica, es una región de gran relevancia histórica, económica y cultural. Fundado en 1782, ha sido testigo de eventos clave como la Batalla de Rivas en 1856, donde el héroe nacional Juan Santamaría, originario de Alajuela, desem'),
(22, 'San Ramon', 2, 'https://scontent.fsyq3-1.fna.fbcdn.net/v/t1.6435-9/108002471_1161840810856142_11991031356641985_n.jpg?_nc_cat=105&ccb=1-7&_nc_sid=0327a3&_nc_ohc=8dmCUW3veMUQ7kNvgEi-Idc&_nc_ht=scontent.fsyq3-1.fna&oh=00_AYAqF-GZVf4d8A5mGGWIz7Ypzh5PG1xqgu93UXLgPQ-otA&oe=66E30A8C', 'San Ramón es un cantón de la provincia de Alajuela, Costa Rica, conocido por su fuerte identidad cultural y su papel histórico en el país. Fundado en 1854, San Ramón ha sido cuna de importantes figuras políticas y literarias de Costa Rica, lo que le ha ganado el sobrenombre de \"La Ciudad de los Poet'),
(23, 'Grecia', 2, 'https://remax-occidente-cr.com/wp-content/uploads/2022/12/Grecia-Costa-Rica-Occidente-real-Estate_n.jpg', 'El cantón de Grecia, ubicado en la provincia de Alajuela, Costa Rica, es conocido por su pintoresca arquitectura, su agricultura próspera y su vibrante vida comunitaria. Fundado en 1838, Grecia ha sido un centro de producción agrícola, especialmente reconocido por su café de alta calidad, que es uno');

-- Volcado de datos para la tabla `provincias`
INSERT INTO `provincias` (`ProvinciaID`, `Nombre`) VALUES
(1, 'San Jose'),
(2, 'Alajuela'),
(3, 'Cartago'),
(4, 'Heredia'),
(5, 'Guanacaste'),
(6, 'Puntarenas'),
(7, 'Limón');

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
