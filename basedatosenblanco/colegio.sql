-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 30-10-2021 a las 04:37:09
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `colegio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

DROP TABLE IF EXISTS `alumno`;
CREATE TABLE IF NOT EXISTS `alumno` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nivel_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estadoacademico` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `persona_id` bigint(20) UNSIGNED DEFAULT NULL,
  `dni_padre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_padre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono_padre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `alumno_persona_id_foreign` (`persona_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anio_academico`
--

DROP TABLE IF EXISTS `anio_academico`;
CREATE TABLE IF NOT EXISTS `anio_academico` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anio` year(4) DEFAULT NULL,
  `estado` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anio_nivel`
--

DROP TABLE IF EXISTS `anio_nivel`;
CREATE TABLE IF NOT EXISTS `anio_nivel` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `anio` bigint(20) UNSIGNED DEFAULT NULL,
  `nivel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plan` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `anio_nivel_anio_foreign` (`anio`),
  KEY `anio_nivel_nivel_foreign` (`nivel`),
  KEY `anio_nivel_plan_foreign` (`plan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivo_tarea`
--

DROP TABLE IF EXISTS `archivo_tarea`;
CREATE TABLE IF NOT EXISTS `archivo_tarea` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ruta` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tarea` bigint(20) UNSIGNED DEFAULT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ext` char(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `archivo_tarea_tarea_foreign` (`tarea`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

DROP TABLE IF EXISTS `asistencia`;
CREATE TABLE IF NOT EXISTS `asistencia` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `alumno_id` bigint(20) UNSIGNED NOT NULL,
  `curso_id` bigint(20) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `asistencia_alumno_id_foreign` (`alumno_id`),
  KEY `asistencia_curso_id_foreign` (`curso_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banco_preguntas`
--

DROP TABLE IF EXISTS `banco_preguntas`;
CREATE TABLE IF NOT EXISTS `banco_preguntas` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `retroalimentacion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `curso_id` bigint(20) UNSIGNED DEFAULT NULL,
  `docente_id` bigint(20) UNSIGNED DEFAULT NULL,
  `categoria_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `banco_preguntas_curso_id_foreign` (`curso_id`),
  KEY `banco_preguntas_docente_id_foreign` (`docente_id`),
  KEY `banco_preguntas_categoria_id_foreign` (`categoria_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bp_categoria`
--

DROP TABLE IF EXISTS `bp_categoria`;
CREATE TABLE IF NOT EXISTS `bp_categoria` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `docente_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bp_categoria_docente_id_foreign` (`docente_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bp_opciones`
--

DROP TABLE IF EXISTS `bp_opciones`;
CREATE TABLE IF NOT EXISTS `bp_opciones` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_bancop` bigint(20) UNSIGNED DEFAULT NULL,
  `detalle` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bp_opciones_id_bancop_foreign` (`id_bancop`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bp_subcategoria`
--

DROP TABLE IF EXISTS `bp_subcategoria`;
CREATE TABLE IF NOT EXISTS `bp_subcategoria` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categoria_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bp_subcategoria_categoria_id_foreign` (`categoria_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cobro`
--

DROP TABLE IF EXISTS `cobro`;
CREATE TABLE IF NOT EXISTS `cobro` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fecha` datetime DEFAULT NULL,
  `cajero` char(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `importe` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cobro_detalle`
--

DROP TABLE IF EXISTS `cobro_detalle`;
CREATE TABLE IF NOT EXISTS `cobro_detalle` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_cobro` bigint(20) UNSIGNED DEFAULT NULL,
  `id_deuda` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cobro_detalle_id_cobro_foreign` (`id_cobro`),
  KEY `cobro_detalle_id_deuda_foreign` (`id_deuda`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concepto`
--

DROP TABLE IF EXISTS `concepto`;
CREATE TABLE IF NOT EXISTS `concepto` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `importe` double(8,2) DEFAULT NULL,
  `anio` year(4) DEFAULT NULL,
  `fechavencimiento` datetime DEFAULT NULL,
  `mora_dia` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenido`
--

DROP TABLE IF EXISTS `contenido`;
CREATE TABLE IF NOT EXISTS `contenido` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `orden` tinyint(4) DEFAULT NULL,
  `curso` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contenido_curso_foreign` (`curso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `criterioevaluacion`
--

DROP TABLE IF EXISTS `criterioevaluacion`;
CREATE TABLE IF NOT EXISTS `criterioevaluacion` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` varchar(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` char(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `curso` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `criterioevaluacion_curso_foreign` (`curso`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cta_cobrar_descuento`
--

DROP TABLE IF EXISTS `cta_cobrar_descuento`;
CREATE TABLE IF NOT EXISTS `cta_cobrar_descuento` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_cta_cobrar` bigint(20) UNSIGNED DEFAULT NULL,
  `descuento` bigint(20) UNSIGNED DEFAULT NULL,
  `estado` char(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cta_cobrar_descuento_id_cta_cobrar_foreign` (`id_cta_cobrar`),
  KEY `cta_cobrar_descuento_descuento_foreign` (`descuento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta_por_cobrar`
--

DROP TABLE IF EXISTS `cuenta_por_cobrar`;
CREATE TABLE IF NOT EXISTS `cuenta_por_cobrar` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_concepto` bigint(20) UNSIGNED DEFAULT NULL,
  `alumno` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cuenta_por_cobrar_id_concepto_foreign` (`id_concepto`),
  KEY `cuenta_por_cobrar_alumno_foreign` (`alumno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

DROP TABLE IF EXISTS `curso`;
CREATE TABLE IF NOT EXISTS `curso` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nivel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` char(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `imagen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `curso_nivel_foreign` (`nivel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso_criterio`
--

DROP TABLE IF EXISTS `curso_criterio`;
CREATE TABLE IF NOT EXISTS `curso_criterio` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `curso` bigint(20) UNSIGNED DEFAULT NULL,
  `criterio` bigint(20) UNSIGNED DEFAULT NULL,
  `trimestre` bigint(20) UNSIGNED DEFAULT NULL,
  `peso` double(8,2) NOT NULL DEFAULT '1.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `curso_criterio_curso_foreign` (`curso`),
  KEY `curso_criterio_criterio_foreign` (`criterio`),
  KEY `curso_criterio_trimestre_foreign` (`trimestre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descuento`
--

DROP TABLE IF EXISTS `descuento`;
CREATE TABLE IF NOT EXISTS `descuento` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cantidad` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `director`
--

DROP TABLE IF EXISTS `director`;
CREATE TABLE IF NOT EXISTS `director` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `estado` char(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `director`
--

INSERT INTO `director` (`id`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Activo', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

DROP TABLE IF EXISTS `docente`;
CREATE TABLE IF NOT EXISTS `docente` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `especialidad` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` char(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente_nivel`
--

DROP TABLE IF EXISTS `docente_nivel`;
CREATE TABLE IF NOT EXISTS `docente_nivel` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `docente` bigint(20) UNSIGNED NOT NULL,
  `nivel` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `docente_nivel_docente_foreign` (`docente`),
  KEY `docente_nivel_nivel_foreign` (`nivel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entrega_tarea`
--

DROP TABLE IF EXISTS `entrega_tarea`;
CREATE TABLE IF NOT EXISTS `entrega_tarea` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tarea` bigint(20) UNSIGNED DEFAULT NULL,
  `alumno` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `archivo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ext` char(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contenido` longtext COLLATE utf8mb4_unicode_ci,
  `archivo_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `entrega_tarea_tarea_foreign` (`tarea`),
  KEY `entrega_tarea_alumno_foreign` (`alumno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluacion`
--

DROP TABLE IF EXISTS `evaluacion`;
CREATE TABLE IF NOT EXISTS `evaluacion` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `indicaciones` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `duracion` double(8,2) DEFAULT NULL,
  `intentos` tinyint(4) DEFAULT NULL,
  `subcontenido_id` bigint(20) UNSIGNED DEFAULT NULL,
  `calificacion_max` double(8,2) DEFAULT NULL,
  `modo_calificacion` tinyint(4) DEFAULT NULL,
  `aleatorio` tinyint(4) DEFAULT NULL,
  `n_preguntas` tinyint(4) DEFAULT NULL,
  `correccion` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `evaluacion_subcontenido_id_foreign` (`subcontenido_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

DROP TABLE IF EXISTS `grado`;
CREATE TABLE IF NOT EXISTS `grado` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero` tinyint(4) DEFAULT NULL,
  `nivel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` char(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `grado_nivel_foreign` (`nivel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

DROP TABLE IF EXISTS `horario`;
CREATE TABLE IF NOT EXISTS `horario` (
  `idhorario` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `dia` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `horainicio` time DEFAULT NULL,
  `horafin` time DEFAULT NULL,
  `seccion_docente_curso` bigint(20) UNSIGNED DEFAULT NULL,
  `seccion` bigint(20) UNSIGNED DEFAULT NULL,
  `color` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idhorario`),
  KEY `horario_seccion_docente_curso_foreign` (`seccion_docente_curso`),
  KEY `horario_seccion_foreign` (`seccion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `info`
--

DROP TABLE IF EXISTS `info`;
CREATE TABLE IF NOT EXISTS `info` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `direccion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_i` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_d` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `restringir_notas` tinyint(1) NOT NULL DEFAULT '0',
  `simbolo_moneda` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'S/.',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `info`
--

INSERT INTO `info` (`id`, `direccion`, `telefono`, `mail`, `logo`, `logo_i`, `logo_d`, `nombre`, `postal`, `restringir_notas`, `simbolo_moneda`, `created_at`, `updated_at`) VALUES
(1, 'Calle Real 1045 El Tambo - Hyo', '(064) 253396', 'cloued@cloued.com', 'logo.png', NULL, NULL, 'Clouded', '10002', 0, 'S/.', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intentos`
--

DROP TABLE IF EXISTS `intentos`;
CREATE TABLE IF NOT EXISTS `intentos` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `evaluacion_id` bigint(20) UNSIGNED DEFAULT NULL,
  `alumno_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hora_inicio` datetime DEFAULT NULL,
  `hora_fin` datetime DEFAULT NULL,
  `numero` tinyint(4) DEFAULT NULL,
  `estado` char(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `intentos_evaluacion_id_foreign` (`evaluacion_id`),
  KEY `intentos_alumno_id_foreign` (`alumno_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intento_preguntas`
--

DROP TABLE IF EXISTS `intento_preguntas`;
CREATE TABLE IF NOT EXISTS `intento_preguntas` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_intento` bigint(20) UNSIGNED DEFAULT NULL,
  `id_pregunta` bigint(20) UNSIGNED DEFAULT NULL,
  `orden_pregunta` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `intento_preguntas_id_intento_foreign` (`id_intento`),
  KEY `intento_preguntas_id_pregunta_foreign` (`id_pregunta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intento_respuestas`
--

DROP TABLE IF EXISTS `intento_respuestas`;
CREATE TABLE IF NOT EXISTS `intento_respuestas` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pregunta_id` bigint(20) UNSIGNED DEFAULT NULL,
  `respuesta_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `intento_respuestas_pregunta_id_foreign` (`pregunta_id`),
  KEY `intento_respuestas_respuesta_id_foreign` (`respuesta_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

DROP TABLE IF EXISTS `matricula`;
CREATE TABLE IF NOT EXISTS `matricula` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_alumno` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_seccion` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `matricula_id_alumno_foreign` (`id_alumno`),
  KEY `matricula_id_seccion_foreign` (`id_seccion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2011_06_12_215134_create_persona_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2018_12_13_071509_create_permission_tables', 1),
(5, '2021_06_12_223724_create_alumno_table', 1),
(6, '2021_06_12_224132_create_director_table', 1),
(7, '2021_06_12_224429_create_docente_table', 1),
(8, '2021_06_12_224808_create_secretaria_table', 1),
(9, '2021_06_12_225339_create_nivel_table', 1),
(10, '2021_06_12_225614_create_docente_nivel_table', 1),
(11, '2021_06_12_230002_create_curso_table', 1),
(12, '2021_06_12_230423_create_criterioevaluacion_table', 1),
(13, '2021_06_12_230701_create_plan_academico_table', 1),
(14, '2021_06_12_230850_create_grado_table', 1),
(15, '2021_06_12_231028_create_planacad_grado_table', 1),
(16, '2021_06_12_231356_create_planacad_grado_curso_table', 1),
(17, '2021_06_12_231549_create_trimestre_table', 1),
(18, '2021_06_12_231550_create_plangrado_trimestre_table', 1),
(19, '2021_06_12_231551_create_curso_criterio_table', 1),
(20, '2021_06_12_232840_create_anio_academico_table', 1),
(21, '2021_06_12_233313_create_anio_nivel_table', 1),
(22, '2021_06_12_233720_create_plangradtrim_anio_fechas_table', 1),
(23, '2021_06_12_234734_create_seccion_table', 1),
(24, '2021_06_12_235554_create_seccion_docente_curso_table', 1),
(25, '2021_06_13_000300_create_horario_table', 1),
(26, '2021_06_13_113015_create_matricula_table', 1),
(27, '2021_06_13_113345_create_notas_table', 1),
(28, '2021_06_13_113758_create_contenido_table', 1),
(29, '2021_06_13_114658_create_sub_contenido_table', 1),
(30, '2021_06_13_115218_create_multimedia_table', 1),
(31, '2021_06_13_115759_create_texto_table', 1),
(32, '2021_06_13_124943_create_tarea_table', 1),
(33, '2021_06_13_125249_create_archivo_tarea_table', 1),
(34, '2021_06_13_125503_create_revision_tarea_table', 1),
(35, '2021_06_13_125839_create_entrega_tarea_table', 1),
(36, '2021_06_13_145746_create_evaluacion_table', 1),
(37, '2021_06_13_150353_create_preguntas_table', 1),
(38, '2021_06_13_151048_create_intentos_table', 1),
(39, '2021_06_13_151836_create_tipo_pregunta_table', 1),
(40, '2021_06_13_151924_create_pregunta_fija_table', 1),
(41, '2021_06_13_152250_create_opciones_table', 1),
(42, '2021_06_13_152619_create_intento_preguntas_table', 1),
(43, '2021_06_13_153020_create_resultado_pregunta_table', 1),
(44, '2021_06_13_153515_create_respuesta_text_table', 1),
(45, '2021_06_13_153725_create_intento_respuestas_table', 1),
(46, '2021_06_13_160209_create_preguntas_aleatoria_table', 1),
(47, '2021_06_13_160558_create_preguntas_grupo_table', 1),
(48, '2021_06_13_164218_create_observaciones_table', 1),
(49, '2021_06_13_164901_create_concepto_table', 1),
(50, '2021_06_13_165113_create_cuenta_por_cobrar_table', 1),
(51, '2021_06_13_165500_create_descuento_table', 1),
(52, '2021_06_13_170019_create_cta_cobrar_descuento_table', 1),
(53, '2021_06_13_170400_create_cobro_table', 1),
(54, '2021_06_13_170728_create_cobro_detalle_table', 1),
(55, '2021_06_13_174257_create_bp_categoria_table', 1),
(56, '2021_06_13_174258_create_banco_preguntas_table', 1),
(57, '2021_06_13_175103_create_bp_subcategoria_table', 1),
(58, '2021_06_13_175255_create_bp_opciones_table', 1),
(59, '2021_06_13_175759_create_info_table', 1),
(60, '2021_08_24_102335_create_asistencia_table', 1),
(61, '2021_08_24_203329_create_parametros_table', 1),
(62, '2021_10_29_001102_create_plantilla_pago_table', 1),
(63, '2021_10_29_012104_create_plantilla_pagos_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_type_model_id_index` (`model_type`,`model_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_type_model_id_index` (`model_type`,`model_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `multimedia`
--

DROP TABLE IF EXISTS `multimedia`;
CREATE TABLE IF NOT EXISTS `multimedia` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ruta` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ext` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subcont` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `multimedia_subcont_foreign` (`subcont`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel`
--

DROP TABLE IF EXISTS `nivel`;
CREATE TABLE IF NOT EXISTS `nivel` (
  `id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

DROP TABLE IF EXISTS `notas`;
CREATE TABLE IF NOT EXISTS `notas` (
  `idnota` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nota` char(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `criterio` bigint(20) UNSIGNED DEFAULT NULL,
  `id_matricula` bigint(20) UNSIGNED DEFAULT NULL,
  `trimestre` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`idnota`),
  KEY `notas_criterio_foreign` (`criterio`),
  KEY `notas_id_matricula_foreign` (`id_matricula`),
  KEY `notas_trimestre_foreign` (`trimestre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observaciones`
--

DROP TABLE IF EXISTS `observaciones`;
CREATE TABLE IF NOT EXISTS `observaciones` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `trimestre` bigint(20) UNSIGNED DEFAULT NULL,
  `curso` bigint(20) UNSIGNED DEFAULT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alumno` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `observaciones_trimestre_foreign` (`trimestre`),
  KEY `observaciones_curso_foreign` (`curso`),
  KEY `observaciones_alumno_foreign` (`alumno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opciones`
--

DROP TABLE IF EXISTS `opciones`;
CREATE TABLE IF NOT EXISTS `opciones` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pregunta_id` bigint(20) UNSIGNED DEFAULT NULL,
  `respuesta` tinyint(4) DEFAULT NULL,
  `detalle` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `opciones_pregunta_id_foreign` (`pregunta_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametros`
--

DROP TABLE IF EXISTS `parametros`;
CREATE TABLE IF NOT EXISTS `parametros` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `codigo` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor1` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valor2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `valor3` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comentario` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

DROP TABLE IF EXISTS `persona`;
CREATE TABLE IF NOT EXISTS `persona` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nrodocumento` char(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipodocumento` char(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombres` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genero` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fechanacimiento` date NOT NULL,
  `direccion` varchar(90) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` char(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `celular` char(13) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `correo` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `whatsapp` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `persona_nrodocumento_unique` (`nrodocumento`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `nrodocumento`, `tipodocumento`, `nombres`, `apellidos`, `genero`, `fechanacimiento`, `direccion`, `telefono`, `celular`, `correo`, `foto`, `descripcion`, `facebook`, `instagram`, `whatsapp`, `created_at`, `updated_at`) VALUES
(1, '00000000', 'dni', 'Admin', 'Admin', '', '1969-12-31', '', '', '', '', 'b3295b3af3f114f4e3e87e397a9446b1.jpg', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planacad_grado`
--

DROP TABLE IF EXISTS `planacad_grado`;
CREATE TABLE IF NOT EXISTS `planacad_grado` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `grado` bigint(20) UNSIGNED DEFAULT NULL,
  `plan` bigint(20) UNSIGNED DEFAULT NULL,
  `tipo_cal` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `modo_criterio` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `planacad_grado_grado_foreign` (`grado`),
  KEY `planacad_grado_plan_foreign` (`plan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planacad_grado_curso`
--

DROP TABLE IF EXISTS `planacad_grado_curso`;
CREATE TABLE IF NOT EXISTS `planacad_grado_curso` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `curso` bigint(20) UNSIGNED DEFAULT NULL,
  `plan_grado` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `planacad_grado_curso_curso_foreign` (`curso`),
  KEY `planacad_grado_curso_plan_grado_foreign` (`plan_grado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plangrado_trimestre`
--

DROP TABLE IF EXISTS `plangrado_trimestre`;
CREATE TABLE IF NOT EXISTS `plangrado_trimestre` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `plan_grado` bigint(20) UNSIGNED DEFAULT NULL,
  `trimestre` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `plangrado_trimestre_plan_grado_foreign` (`plan_grado`),
  KEY `plangrado_trimestre_trimestre_foreign` (`trimestre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plangradtrim_anio_fechas`
--

DROP TABLE IF EXISTS `plangradtrim_anio_fechas`;
CREATE TABLE IF NOT EXISTS `plangradtrim_anio_fechas` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `fechainicio` date DEFAULT NULL,
  `fechafin` date DEFAULT NULL,
  `anio_nivel` bigint(20) UNSIGNED DEFAULT NULL,
  `plangrad_trim` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `plangradtrim_anio_fechas_anio_nivel_foreign` (`anio_nivel`),
  KEY `plangradtrim_anio_fechas_plangrad_trim_foreign` (`plangrad_trim`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plantilla_pago`
--

DROP TABLE IF EXISTS `plantilla_pago`;
CREATE TABLE IF NOT EXISTS `plantilla_pago` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grado_id` bigint(20) UNSIGNED NOT NULL,
  `anio` year(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `plantilla_pago_grado_id_foreign` (`grado_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plantilla_pagos`
--

DROP TABLE IF EXISTS `plantilla_pagos`;
CREATE TABLE IF NOT EXISTS `plantilla_pagos` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pago_id` bigint(20) UNSIGNED NOT NULL,
  `plantilla_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `plantilla_pagos_pago_id_foreign` (`pago_id`),
  KEY `plantilla_pagos_plantilla_id_foreign` (`plantilla_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan_academico`
--

DROP TABLE IF EXISTS `plan_academico`;
CREATE TABLE IF NOT EXISTS `plan_academico` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nivel` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` char(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `plan_academico_nivel_foreign` (`nivel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

DROP TABLE IF EXISTS `preguntas`;
CREATE TABLE IF NOT EXISTS `preguntas` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `preguntable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preguntable_id` bigint(20) UNSIGNED NOT NULL,
  `evaluacion_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `preguntas_preguntable_type_preguntable_id_index` (`preguntable_type`,`preguntable_id`),
  KEY `preguntas_evaluacion_id_foreign` (`evaluacion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas_aleatoria`
--

DROP TABLE IF EXISTS `preguntas_aleatoria`;
CREATE TABLE IF NOT EXISTS `preguntas_aleatoria` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `puntaje` tinyint(4) DEFAULT NULL,
  `mostrar` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas_grupo`
--

DROP TABLE IF EXISTS `preguntas_grupo`;
CREATE TABLE IF NOT EXISTS `preguntas_grupo` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `grupo_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pregunta_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `preguntas_grupo_grupo_id_foreign` (`grupo_id`),
  KEY `preguntas_grupo_pregunta_id_foreign` (`pregunta_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta_fija`
--

DROP TABLE IF EXISTS `pregunta_fija`;
CREATE TABLE IF NOT EXISTS `pregunta_fija` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` mediumtext COLLATE utf8mb4_unicode_ci,
  `retroalimentacion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `puntos` double(8,2) DEFAULT NULL,
  `tipo` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pregunta_fija_tipo_foreign` (`tipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta_text`
--

DROP TABLE IF EXISTS `respuesta_text`;
CREATE TABLE IF NOT EXISTS `respuesta_text` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `texto` longtext COLLATE utf8mb4_unicode_ci,
  `id_pregunta` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `respuesta_text_id_pregunta_foreign` (`id_pregunta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultado_pregunta`
--

DROP TABLE IF EXISTS `resultado_pregunta`;
CREATE TABLE IF NOT EXISTS `resultado_pregunta` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `pregunta_id` bigint(20) UNSIGNED DEFAULT NULL,
  `comentario` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `puntaje` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `resultado_pregunta_pregunta_id_foreign` (`pregunta_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revision_tarea`
--

DROP TABLE IF EXISTS `revision_tarea`;
CREATE TABLE IF NOT EXISTS `revision_tarea` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tarea` bigint(20) UNSIGNED DEFAULT NULL,
  `alumno` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comentario` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nota` char(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `revision_tarea_tarea_foreign` (`tarea`),
  KEY `revision_tarea_alumno_foreign` (`alumno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Director', 'web', '2021-10-30 05:36:16', '2021-10-30 05:36:16'),
(2, 'Docente', 'web', '2021-10-30 05:36:16', '2021-10-30 05:36:16'),
(3, 'Alumno', 'web', '2021-10-30 05:36:16', '2021-10-30 05:36:16'),
(4, 'Apoderado', 'web', '2021-10-30 05:36:16', '2021-10-30 05:36:16'),
(5, 'Secretaria', 'web', '2021-10-30 05:36:16', '2021-10-30 05:36:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion`
--

DROP TABLE IF EXISTS `seccion`;
CREATE TABLE IF NOT EXISTS `seccion` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `letra` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `capacidad` tinyint(3) UNSIGNED DEFAULT NULL,
  `descripcion` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tutor` bigint(20) UNSIGNED DEFAULT NULL,
  `grado` bigint(20) UNSIGNED DEFAULT NULL,
  `anio_nivel` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `seccion_tutor_foreign` (`tutor`),
  KEY `seccion_grado_foreign` (`grado`),
  KEY `seccion_anio_nivel_foreign` (`anio_nivel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion_docente_curso`
--

DROP TABLE IF EXISTS `seccion_docente_curso`;
CREATE TABLE IF NOT EXISTS `seccion_docente_curso` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `curso` bigint(20) UNSIGNED DEFAULT NULL,
  `seccion` bigint(20) UNSIGNED DEFAULT NULL,
  `docente` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `seccion_docente_curso_curso_foreign` (`curso`),
  KEY `seccion_docente_curso_seccion_foreign` (`seccion`),
  KEY `seccion_docente_curso_docente_foreign` (`docente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secretaria`
--

DROP TABLE IF EXISTS `secretaria`;
CREATE TABLE IF NOT EXISTS `secretaria` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `estado` char(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub_contenido`
--

DROP TABLE IF EXISTS `sub_contenido`;
CREATE TABLE IF NOT EXISTS `sub_contenido` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contenido` bigint(20) UNSIGNED DEFAULT NULL,
  `orden` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sub_contenido_contenido_foreign` (`contenido`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea`
--

DROP TABLE IF EXISTS `tarea`;
CREATE TABLE IF NOT EXISTS `tarea` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `indicaciones` text COLLATE utf8mb4_unicode_ci,
  `fecha_ap` datetime DEFAULT NULL,
  `fecha_ven` datetime DEFAULT NULL,
  `sub_cont` bigint(20) UNSIGNED DEFAULT NULL,
  `nota` char(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tarea_sub_cont_foreign` (`sub_cont`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `texto`
--

DROP TABLE IF EXISTS `texto`;
CREATE TABLE IF NOT EXISTS `texto` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cuerpo` longtext COLLATE utf8mb4_unicode_ci,
  `sub_cont` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `texto_sub_cont_foreign` (`sub_cont`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_pregunta`
--

DROP TABLE IF EXISTS `tipo_pregunta`;
CREATE TABLE IF NOT EXISTS `tipo_pregunta` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_pregunta`
--

INSERT INTO `tipo_pregunta` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Opción múltiple', '2021-10-30 05:36:16', '2021-10-30 05:36:16'),
(2, 'Verdadero/Falso', '2021-10-30 05:36:16', '2021-10-30 05:36:16'),
(3, 'Pregunta abierta', '2021-10-30 05:36:16', '2021-10-30 05:36:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trimestre`
--

DROP TABLE IF EXISTS `trimestre`;
CREATE TABLE IF NOT EXISTS `trimestre` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `numero` tinyint(3) UNSIGNED DEFAULT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `periodo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activo` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_user_unique` (`user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `user`, `password`, `activo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '00000000', '$2y$10$QRdZ.lZLN9erwbj/GxDMoevhsHyclxCm6rP5Y9zF.bPJZaCKF1i3y', 1, NULL, '2021-10-30 05:36:16', '2021-10-30 05:36:16');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `alumno_persona_id_foreign` FOREIGN KEY (`persona_id`) REFERENCES `persona` (`id`);

--
-- Filtros para la tabla `anio_nivel`
--
ALTER TABLE `anio_nivel`
  ADD CONSTRAINT `anio_nivel_anio_foreign` FOREIGN KEY (`anio`) REFERENCES `anio_academico` (`id`),
  ADD CONSTRAINT `anio_nivel_nivel_foreign` FOREIGN KEY (`nivel`) REFERENCES `nivel` (`id`),
  ADD CONSTRAINT `anio_nivel_plan_foreign` FOREIGN KEY (`plan`) REFERENCES `plan_academico` (`id`);

--
-- Filtros para la tabla `archivo_tarea`
--
ALTER TABLE `archivo_tarea`
  ADD CONSTRAINT `archivo_tarea_tarea_foreign` FOREIGN KEY (`tarea`) REFERENCES `tarea` (`id`);

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `asistencia_alumno_id_foreign` FOREIGN KEY (`alumno_id`) REFERENCES `matricula` (`id`),
  ADD CONSTRAINT `asistencia_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `seccion_docente_curso` (`id`);

--
-- Filtros para la tabla `banco_preguntas`
--
ALTER TABLE `banco_preguntas`
  ADD CONSTRAINT `banco_preguntas_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `bp_categoria` (`id`),
  ADD CONSTRAINT `banco_preguntas_curso_id_foreign` FOREIGN KEY (`curso_id`) REFERENCES `curso` (`id`),
  ADD CONSTRAINT `banco_preguntas_docente_id_foreign` FOREIGN KEY (`docente_id`) REFERENCES `docente` (`id`);

--
-- Filtros para la tabla `bp_categoria`
--
ALTER TABLE `bp_categoria`
  ADD CONSTRAINT `bp_categoria_docente_id_foreign` FOREIGN KEY (`docente_id`) REFERENCES `docente` (`id`);

--
-- Filtros para la tabla `bp_opciones`
--
ALTER TABLE `bp_opciones`
  ADD CONSTRAINT `bp_opciones_id_bancop_foreign` FOREIGN KEY (`id_bancop`) REFERENCES `banco_preguntas` (`id`);

--
-- Filtros para la tabla `bp_subcategoria`
--
ALTER TABLE `bp_subcategoria`
  ADD CONSTRAINT `bp_subcategoria_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `bp_categoria` (`id`);

--
-- Filtros para la tabla `cobro_detalle`
--
ALTER TABLE `cobro_detalle`
  ADD CONSTRAINT `cobro_detalle_id_cobro_foreign` FOREIGN KEY (`id_cobro`) REFERENCES `cobro` (`id`),
  ADD CONSTRAINT `cobro_detalle_id_deuda_foreign` FOREIGN KEY (`id_deuda`) REFERENCES `cuenta_por_cobrar` (`id`);

--
-- Filtros para la tabla `contenido`
--
ALTER TABLE `contenido`
  ADD CONSTRAINT `contenido_curso_foreign` FOREIGN KEY (`curso`) REFERENCES `seccion_docente_curso` (`id`);

--
-- Filtros para la tabla `criterioevaluacion`
--
ALTER TABLE `criterioevaluacion`
  ADD CONSTRAINT `criterioevaluacion_curso_foreign` FOREIGN KEY (`curso`) REFERENCES `curso` (`id`);

--
-- Filtros para la tabla `cta_cobrar_descuento`
--
ALTER TABLE `cta_cobrar_descuento`
  ADD CONSTRAINT `cta_cobrar_descuento_descuento_foreign` FOREIGN KEY (`descuento`) REFERENCES `descuento` (`id`),
  ADD CONSTRAINT `cta_cobrar_descuento_id_cta_cobrar_foreign` FOREIGN KEY (`id_cta_cobrar`) REFERENCES `cuenta_por_cobrar` (`id`);

--
-- Filtros para la tabla `cuenta_por_cobrar`
--
ALTER TABLE `cuenta_por_cobrar`
  ADD CONSTRAINT `cuenta_por_cobrar_alumno_foreign` FOREIGN KEY (`alumno`) REFERENCES `alumno` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cuenta_por_cobrar_id_concepto_foreign` FOREIGN KEY (`id_concepto`) REFERENCES `concepto` (`id`);

--
-- Filtros para la tabla `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `curso_nivel_foreign` FOREIGN KEY (`nivel`) REFERENCES `nivel` (`id`);

--
-- Filtros para la tabla `curso_criterio`
--
ALTER TABLE `curso_criterio`
  ADD CONSTRAINT `curso_criterio_criterio_foreign` FOREIGN KEY (`criterio`) REFERENCES `criterioevaluacion` (`id`),
  ADD CONSTRAINT `curso_criterio_curso_foreign` FOREIGN KEY (`curso`) REFERENCES `planacad_grado_curso` (`id`),
  ADD CONSTRAINT `curso_criterio_trimestre_foreign` FOREIGN KEY (`trimestre`) REFERENCES `plangrado_trimestre` (`id`);

--
-- Filtros para la tabla `director`
--
ALTER TABLE `director`
  ADD CONSTRAINT `director_id_foreign` FOREIGN KEY (`id`) REFERENCES `persona` (`id`);

--
-- Filtros para la tabla `docente`
--
ALTER TABLE `docente`
  ADD CONSTRAINT `docente_id_foreign` FOREIGN KEY (`id`) REFERENCES `persona` (`id`);

--
-- Filtros para la tabla `docente_nivel`
--
ALTER TABLE `docente_nivel`
  ADD CONSTRAINT `docente_nivel_docente_foreign` FOREIGN KEY (`docente`) REFERENCES `docente` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `docente_nivel_nivel_foreign` FOREIGN KEY (`nivel`) REFERENCES `nivel` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `entrega_tarea`
--
ALTER TABLE `entrega_tarea`
  ADD CONSTRAINT `entrega_tarea_alumno_foreign` FOREIGN KEY (`alumno`) REFERENCES `alumno` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `entrega_tarea_tarea_foreign` FOREIGN KEY (`tarea`) REFERENCES `tarea` (`id`);

--
-- Filtros para la tabla `evaluacion`
--
ALTER TABLE `evaluacion`
  ADD CONSTRAINT `evaluacion_subcontenido_id_foreign` FOREIGN KEY (`subcontenido_id`) REFERENCES `sub_contenido` (`id`);

--
-- Filtros para la tabla `grado`
--
ALTER TABLE `grado`
  ADD CONSTRAINT `grado_nivel_foreign` FOREIGN KEY (`nivel`) REFERENCES `nivel` (`id`);

--
-- Filtros para la tabla `horario`
--
ALTER TABLE `horario`
  ADD CONSTRAINT `horario_seccion_docente_curso_foreign` FOREIGN KEY (`seccion_docente_curso`) REFERENCES `seccion_docente_curso` (`id`),
  ADD CONSTRAINT `horario_seccion_foreign` FOREIGN KEY (`seccion`) REFERENCES `seccion` (`id`);

--
-- Filtros para la tabla `intentos`
--
ALTER TABLE `intentos`
  ADD CONSTRAINT `intentos_alumno_id_foreign` FOREIGN KEY (`alumno_id`) REFERENCES `alumno` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `intentos_evaluacion_id_foreign` FOREIGN KEY (`evaluacion_id`) REFERENCES `evaluacion` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `intento_preguntas`
--
ALTER TABLE `intento_preguntas`
  ADD CONSTRAINT `intento_preguntas_id_intento_foreign` FOREIGN KEY (`id_intento`) REFERENCES `intentos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `intento_preguntas_id_pregunta_foreign` FOREIGN KEY (`id_pregunta`) REFERENCES `pregunta_fija` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `intento_respuestas`
--
ALTER TABLE `intento_respuestas`
  ADD CONSTRAINT `intento_respuestas_pregunta_id_foreign` FOREIGN KEY (`pregunta_id`) REFERENCES `intento_preguntas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `intento_respuestas_respuesta_id_foreign` FOREIGN KEY (`respuesta_id`) REFERENCES `opciones` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `matricula_id_alumno_foreign` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `matricula_id_seccion_foreign` FOREIGN KEY (`id_seccion`) REFERENCES `seccion` (`id`);

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `multimedia`
--
ALTER TABLE `multimedia`
  ADD CONSTRAINT `multimedia_subcont_foreign` FOREIGN KEY (`subcont`) REFERENCES `sub_contenido` (`id`);

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_criterio_foreign` FOREIGN KEY (`criterio`) REFERENCES `curso_criterio` (`id`),
  ADD CONSTRAINT `notas_id_matricula_foreign` FOREIGN KEY (`id_matricula`) REFERENCES `matricula` (`id`),
  ADD CONSTRAINT `notas_trimestre_foreign` FOREIGN KEY (`trimestre`) REFERENCES `plangrado_trimestre` (`id`);

--
-- Filtros para la tabla `observaciones`
--
ALTER TABLE `observaciones`
  ADD CONSTRAINT `observaciones_alumno_foreign` FOREIGN KEY (`alumno`) REFERENCES `alumno` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `observaciones_curso_foreign` FOREIGN KEY (`curso`) REFERENCES `seccion_docente_curso` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `observaciones_trimestre_foreign` FOREIGN KEY (`trimestre`) REFERENCES `plangrado_trimestre` (`id`);

--
-- Filtros para la tabla `opciones`
--
ALTER TABLE `opciones`
  ADD CONSTRAINT `opciones_pregunta_id_foreign` FOREIGN KEY (`pregunta_id`) REFERENCES `pregunta_fija` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `planacad_grado`
--
ALTER TABLE `planacad_grado`
  ADD CONSTRAINT `planacad_grado_grado_foreign` FOREIGN KEY (`grado`) REFERENCES `grado` (`id`),
  ADD CONSTRAINT `planacad_grado_plan_foreign` FOREIGN KEY (`plan`) REFERENCES `plan_academico` (`id`);

--
-- Filtros para la tabla `planacad_grado_curso`
--
ALTER TABLE `planacad_grado_curso`
  ADD CONSTRAINT `planacad_grado_curso_curso_foreign` FOREIGN KEY (`curso`) REFERENCES `curso` (`id`),
  ADD CONSTRAINT `planacad_grado_curso_plan_grado_foreign` FOREIGN KEY (`plan_grado`) REFERENCES `planacad_grado` (`id`);

--
-- Filtros para la tabla `plangrado_trimestre`
--
ALTER TABLE `plangrado_trimestre`
  ADD CONSTRAINT `plangrado_trimestre_plan_grado_foreign` FOREIGN KEY (`plan_grado`) REFERENCES `planacad_grado` (`id`),
  ADD CONSTRAINT `plangrado_trimestre_trimestre_foreign` FOREIGN KEY (`trimestre`) REFERENCES `trimestre` (`id`);

--
-- Filtros para la tabla `plangradtrim_anio_fechas`
--
ALTER TABLE `plangradtrim_anio_fechas`
  ADD CONSTRAINT `plangradtrim_anio_fechas_anio_nivel_foreign` FOREIGN KEY (`anio_nivel`) REFERENCES `anio_nivel` (`id`),
  ADD CONSTRAINT `plangradtrim_anio_fechas_plangrad_trim_foreign` FOREIGN KEY (`plangrad_trim`) REFERENCES `plangrado_trimestre` (`id`);

--
-- Filtros para la tabla `plantilla_pago`
--
ALTER TABLE `plantilla_pago`
  ADD CONSTRAINT `plantilla_pago_grado_id_foreign` FOREIGN KEY (`grado_id`) REFERENCES `grado` (`id`);

--
-- Filtros para la tabla `plantilla_pagos`
--
ALTER TABLE `plantilla_pagos`
  ADD CONSTRAINT `plantilla_pagos_pago_id_foreign` FOREIGN KEY (`pago_id`) REFERENCES `concepto` (`id`),
  ADD CONSTRAINT `plantilla_pagos_plantilla_id_foreign` FOREIGN KEY (`plantilla_id`) REFERENCES `plantilla_pago` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `plan_academico`
--
ALTER TABLE `plan_academico`
  ADD CONSTRAINT `plan_academico_nivel_foreign` FOREIGN KEY (`nivel`) REFERENCES `nivel` (`id`);

--
-- Filtros para la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD CONSTRAINT `preguntas_evaluacion_id_foreign` FOREIGN KEY (`evaluacion_id`) REFERENCES `evaluacion` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `preguntas_grupo`
--
ALTER TABLE `preguntas_grupo`
  ADD CONSTRAINT `preguntas_grupo_grupo_id_foreign` FOREIGN KEY (`grupo_id`) REFERENCES `preguntas_aleatoria` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `preguntas_grupo_pregunta_id_foreign` FOREIGN KEY (`pregunta_id`) REFERENCES `pregunta_fija` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pregunta_fija`
--
ALTER TABLE `pregunta_fija`
  ADD CONSTRAINT `pregunta_fija_tipo_foreign` FOREIGN KEY (`tipo`) REFERENCES `tipo_pregunta` (`id`);

--
-- Filtros para la tabla `respuesta_text`
--
ALTER TABLE `respuesta_text`
  ADD CONSTRAINT `respuesta_text_id_pregunta_foreign` FOREIGN KEY (`id_pregunta`) REFERENCES `intento_preguntas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `resultado_pregunta`
--
ALTER TABLE `resultado_pregunta`
  ADD CONSTRAINT `resultado_pregunta_pregunta_id_foreign` FOREIGN KEY (`pregunta_id`) REFERENCES `intento_preguntas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `revision_tarea`
--
ALTER TABLE `revision_tarea`
  ADD CONSTRAINT `revision_tarea_alumno_foreign` FOREIGN KEY (`alumno`) REFERENCES `alumno` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `revision_tarea_tarea_foreign` FOREIGN KEY (`tarea`) REFERENCES `tarea` (`id`);

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `seccion`
--
ALTER TABLE `seccion`
  ADD CONSTRAINT `seccion_anio_nivel_foreign` FOREIGN KEY (`anio_nivel`) REFERENCES `anio_nivel` (`id`),
  ADD CONSTRAINT `seccion_grado_foreign` FOREIGN KEY (`grado`) REFERENCES `grado` (`id`),
  ADD CONSTRAINT `seccion_tutor_foreign` FOREIGN KEY (`tutor`) REFERENCES `docente` (`id`);

--
-- Filtros para la tabla `seccion_docente_curso`
--
ALTER TABLE `seccion_docente_curso`
  ADD CONSTRAINT `seccion_docente_curso_curso_foreign` FOREIGN KEY (`curso`) REFERENCES `planacad_grado_curso` (`id`),
  ADD CONSTRAINT `seccion_docente_curso_docente_foreign` FOREIGN KEY (`docente`) REFERENCES `docente` (`id`),
  ADD CONSTRAINT `seccion_docente_curso_seccion_foreign` FOREIGN KEY (`seccion`) REFERENCES `seccion` (`id`);

--
-- Filtros para la tabla `secretaria`
--
ALTER TABLE `secretaria`
  ADD CONSTRAINT `secretaria_id_foreign` FOREIGN KEY (`id`) REFERENCES `persona` (`id`);

--
-- Filtros para la tabla `sub_contenido`
--
ALTER TABLE `sub_contenido`
  ADD CONSTRAINT `sub_contenido_contenido_foreign` FOREIGN KEY (`contenido`) REFERENCES `contenido` (`id`);

--
-- Filtros para la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD CONSTRAINT `tarea_sub_cont_foreign` FOREIGN KEY (`sub_cont`) REFERENCES `sub_contenido` (`id`);

--
-- Filtros para la tabla `texto`
--
ALTER TABLE `texto`
  ADD CONSTRAINT `texto_sub_cont_foreign` FOREIGN KEY (`sub_cont`) REFERENCES `sub_contenido` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_foreign` FOREIGN KEY (`id`) REFERENCES `persona` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
