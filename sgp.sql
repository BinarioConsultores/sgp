-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-10-2018 a las 04:33:01
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sgp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_09_10_193152_crear_tabla_cliente', 1),
(4, '2018_09_10_193413_crear_tabla_proveedor', 1),
(5, '2018_09_10_193545_crear_tabla_unidadmedida', 1),
(6, '2018_09_10_193819_crear_tabla_tipoproyecto', 1),
(7, '2018_09_10_194454_crear_tabla_proyecto', 1),
(8, '2018_09_11_145526_crear_tabla_reajustefamilia', 1),
(9, '2018_09_11_145744_crear_tabla_reajustecategoria', 1),
(10, '2018_09_11_145946_crear_tabla_valorizacionc', 1),
(11, '2018_09_11_150011_crear_tabla_valorizacionr', 1),
(12, '2018_09_11_150108_crear_tabla_reajuste', 1),
(13, '2018_09_11_175258_crear_tabla_adelanto', 1),
(14, '2018_09_11_175330_crear_tabla_ingreso', 1),
(15, '2018_09_16_204321_crear_tabla_recurso', 1),
(16, '2018_09_17_204256_crear_tabla_gasto', 1),
(17, '2018_09_17_204541_crear_tabla_recursounidadmedida', 1),
(18, '2018_09_18_162416_crear_tabla_persona', 1),
(19, '2018_09_18_162735_crear_tabla_usuario', 1),
(20, '2018_09_18_162810_crear_tabla_proyectousuario', 1),
(21, '2018_09_18_162844_crear_tabla_tarea', 1),
(22, '2018_09_18_182514_crear_tabla_empleado', 1),
(23, '2018_09_18_182543_crear_tabla_factura', 1),
(24, '2018_09_18_182614_crear_tabla_facturadetalle', 1),
(25, '2018_09_19_151331_crear_tabla_registrotarea', 1),
(26, '2018_09_19_151414_crear_tabla_archivotarea', 1),
(27, '2018_09_19_204152_crear_tabla_precio', 1),
(28, '2018_09_19_204631_crear_tabla_presupuesto', 1),
(29, '2018_09_19_204700_crear_tabla_partida', 1),
(30, '2018_09_19_204759_crear_tabla_analisiscostounitario', 1),
(31, '2018_09_19_204912_crear_tabla_egreso', 1),
(32, '2018_09_26_233231_crear_tabla_cur', 2),
(33, '2018_09_26_233351_crear_tabla_curdetalle', 2),
(34, '2018_09_26_233414_crear_tabla_curdplazo', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_adelanto`
--

CREATE TABLE `t_adelanto` (
  `adel_id` int(10) UNSIGNED NOT NULL,
  `adel_mat` decimal(8,2) NOT NULL,
  `adel_cd` decimal(8,2) NOT NULL,
  `adel_est` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_analisiscostounitario`
--

CREATE TABLE `t_analisiscostounitario` (
  `acu_id` int(10) UNSIGNED NOT NULL,
  `acu_prec` decimal(8,2) NOT NULL,
  `acu_cant` decimal(8,2) NOT NULL,
  `acu_cuad` decimal(8,2) NOT NULL,
  `part_id` int(10) UNSIGNED NOT NULL,
  `recum_id` int(10) UNSIGNED NOT NULL,
  `acu_idpadre` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_archivotarea`
--

CREATE TABLE `t_archivotarea` (
  `archita_id` int(10) UNSIGNED NOT NULL,
  `archita_nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `archita_peso` double NOT NULL,
  `archita_tip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `archita_dir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regitar_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cliente`
--

CREATE TABLE `t_cliente` (
  `cli_id` int(10) UNSIGNED NOT NULL,
  `cli_nom` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_cliente`
--

INSERT INTO `t_cliente` (`cli_id`, `cli_nom`, `created_at`, `updated_at`) VALUES
(1, 'Municipalidad de Arequipa', NULL, NULL),
(2, 'Municipalidad de Caylloma', NULL, NULL),
(3, 'Binario Consultores', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cur`
--

CREATE TABLE `t_cur` (
  `cur_id` int(10) UNSIGNED NOT NULL,
  `cur_dir` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_cur`
--

INSERT INTO `t_cur` (`cur_id`, `cur_dir`, `pro_id`, `created_at`, `updated_at`) VALUES
(1, 'defecto', 1, NULL, NULL),
(75, 'curs/7.xlsx', 7, '2018-10-04 05:26:39', '2018-10-04 05:26:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_curdetalle`
--

CREATE TABLE `t_curdetalle` (
  `curd_id` int(10) UNSIGNED NOT NULL,
  `curd_cant` decimal(8,2) NOT NULL,
  `curd_prec` decimal(8,2) NOT NULL,
  `curd_idpadre` int(11) UNSIGNED NOT NULL,
  `recum_id` int(10) UNSIGNED NOT NULL,
  `cur_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_curdetalle`
--

INSERT INTO `t_curdetalle` (`curd_id`, `curd_cant`, `curd_prec`, `curd_idpadre`, `recum_id`, `cur_id`, `created_at`, `updated_at`) VALUES
(1, '0.00', '0.00', 1, 1, 1, NULL, NULL),
(192, '0.00', '0.00', 1, 243, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(193, '172.53', '23.69', 192, 244, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(194, '53.20', '23.69', 192, 245, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(195, '538.80', '21.01', 192, 246, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(196, '830.08', '17.03', 192, 247, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(197, '3760.46', '15.33', 192, 248, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(198, '0.00', '0.00', 1, 249, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(199, '8.00', '50.00', 198, 250, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(200, '218.89', '5.08', 198, 251, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(201, '94.59', '2.46', 198, 252, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(202, '1.12', '46.61', 198, 253, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(203, '452.61', '50.85', 198, 254, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(204, '2426.40', '42.37', 198, 255, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(205, '9.59', '5.00', 198, 256, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(206, '328.04', '50.85', 198, 257, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(207, '29.12', '55.08', 198, 258, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(208, '0.20', '46.61', 198, 259, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(209, '2369.13', '10.17', 198, 260, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(210, '15412.29', '12.71', 198, 261, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(211, '385.99', '17.80', 198, 262, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(212, '20.00', '28.70', 198, 263, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(213, '6.00', '101.69', 198, 264, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(214, '20.00', '6.78', 198, 265, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(215, '20.00', '6.00', 198, 266, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(216, '20.00', '6.78', 198, 267, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(217, '200.13', '4.24', 198, 268, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(218, '19.98', '5.08', 198, 269, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(219, '1.00', '466.10', 198, 270, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(220, '20.00', '76.27', 198, 271, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(221, '6.00', '101.69', 198, 272, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(222, '1.00', '5000.00', 198, 273, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(223, '20.00', '18.64', 198, 274, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(224, '20.00', '22.88', 198, 275, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(225, '1.00', '3500.00', 198, 276, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(226, '19.99', '15.25', 198, 277, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(227, '10.00', '38.98', 198, 278, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(228, '58.31', '10.17', 198, 279, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(229, '19.99', '8.47', 198, 280, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(230, '466.51', '10.17', 198, 281, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(231, '0.20', '42.37', 198, 282, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(232, '5.00', '25.42', 198, 283, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(233, '3.00', '600.00', 198, 284, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(234, '4.00', '84.75', 198, 285, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(235, '20.00', '50.85', 198, 286, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(236, '176.53', '4.49', 198, 287, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(237, '10.00', '38.14', 198, 288, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(238, '0.00', '0.00', 1, 289, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(239, '1.00', '25000.00', 238, 290, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(240, '1.00', '2661.04', 238, 291, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(241, '59.31', '5.00', 238, 292, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(242, '139.00', '120.00', 238, 293, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(243, '65.36', '120.00', 238, 294, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(244, '114.74', '170.00', 238, 295, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(245, '7.48', '12.00', 238, 296, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(246, '7.35', '7.63', 238, 297, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(247, '16.26', '155.00', 238, 298, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(248, '28.02', '130.00', 238, 299, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(249, '57.76', '170.00', 238, 300, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(250, '53.46', '15.25', 238, 301, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(251, '205.22', '150.00', 238, 302, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(252, '59.31', '225.00', 238, 303, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(253, '109.35', '6.78', 238, 304, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(254, '395.37', '120.00', 238, 305, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(255, '59.31', '130.00', 238, 306, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(256, '147.73', '140.00', 238, 307, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(257, '39.35', '130.00', 238, 308, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(258, '39.54', '120.00', 238, 309, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(259, '51.57', '11.50', 238, 310, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(260, '80.94', '330.00', 238, 311, 75, '2018-10-04 05:26:39', '2018-10-04 05:26:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_curdplazo`
--

CREATE TABLE `t_curdplazo` (
  `curdp_id` int(10) UNSIGNED NOT NULL,
  `curdp_cant` decimal(8,2) NOT NULL,
  `curdp_fechin` date NOT NULL,
  `curdp_fechfin` date NOT NULL,
  `curdp_nro` int(11) NOT NULL,
  `curd_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_egreso`
--

CREATE TABLE `t_egreso` (
  `egre_id` int(10) UNSIGNED NOT NULL,
  `egre_monto` decimal(8,2) NOT NULL,
  `pro_id` int(10) UNSIGNED NOT NULL,
  `facd_id` int(10) UNSIGNED NOT NULL,
  `egre_idpadre` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_empleado`
--

CREATE TABLE `t_empleado` (
  `emp_id` int(10) UNSIGNED NOT NULL,
  `per_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_empleado`
--

INSERT INTO `t_empleado` (`emp_id`, `per_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL),
(2, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_factura`
--

CREATE TABLE `t_factura` (
  `fac_id` int(10) UNSIGNED NOT NULL,
  `fac_nro` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fac_fech` date NOT NULL,
  `fac_tipo` int(11) NOT NULL,
  `fac_est` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fac_obs` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `prov_id` int(10) UNSIGNED NOT NULL,
  `emp_id` int(10) UNSIGNED NOT NULL,
  `pro_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_factura`
--

INSERT INTO `t_factura` (`fac_id`, `fac_nro`, `fac_fech`, `fac_tipo`, `fac_est`, `fac_obs`, `prov_id`, `emp_id`, `pro_id`, `created_at`, `updated_at`) VALUES
(2, '234-122', '2018-10-19', 1, 'realizada', 'fsdfsdfsdfsdfsdf', 1, 2, 7, '2018-10-08 06:57:32', '2018-10-08 06:57:32'),
(3, '288-23', '2018-10-04', 1, 'realizada', 'obs', 1, 1, 1, '2018-10-08 09:13:31', '2018-10-08 09:13:31'),
(4, '9879', '2018-10-16', 1, 'realizada', 'ibsb', 1, 1, 1, '2018-10-08 21:59:42', '2018-10-08 21:59:42'),
(5, '0344666', '2018-10-22', 2, 'realizada', 'swisiisisis66666', 1, 1, 7, '2018-10-09 05:40:05', '2018-10-09 06:10:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_facturadetalle`
--

CREATE TABLE `t_facturadetalle` (
  `facd_id` int(10) UNSIGNED NOT NULL,
  `facd_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `facd_cant` int(11) NOT NULL,
  `facd_punit` decimal(8,2) NOT NULL,
  `fac_id` int(10) UNSIGNED NOT NULL,
  `gas_id` int(10) UNSIGNED NOT NULL,
  `recum_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_facturadetalle`
--

INSERT INTO `t_facturadetalle` (`facd_id`, `facd_desc`, `facd_cant`, `facd_punit`, `fac_id`, `gas_id`, `recum_id`, `created_at`, `updated_at`) VALUES
(6, 'kakakak222222', 10, '69.00', 3, 1, 247, '2018-10-09 02:06:06', '2018-10-09 03:10:17'),
(7, 'ajajjaja', 1, '56.00', 5, 1, 245, '2018-10-09 05:40:18', '2018-10-09 05:40:18'),
(8, 'sjjsjsjs', 32, '23.45', 5, 1, 244, '2018-10-09 05:44:22', '2018-10-09 05:44:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_gasto`
--

CREATE TABLE `t_gasto` (
  `gas_id` int(10) UNSIGNED NOT NULL,
  `gas_nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_gasto`
--

INSERT INTO `t_gasto` (`gas_id`, `gas_nom`, `created_at`, `updated_at`) VALUES
(1, 'Defecto', NULL, NULL),
(2, 'No Oficial', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_ingreso`
--

CREATE TABLE `t_ingreso` (
  `ing_id` int(10) UNSIGNED NOT NULL,
  `ing_monto` decimal(8,2) NOT NULL,
  `ing_tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ing_fech` date NOT NULL,
  `valr_id` int(10) UNSIGNED NOT NULL,
  `adel_id` int(10) UNSIGNED NOT NULL,
  `pro_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_partida`
--

CREATE TABLE `t_partida` (
  `part_id` int(10) UNSIGNED NOT NULL,
  `part_nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `part_prec` decimal(8,2) NOT NULL,
  `part_met` decimal(8,2) NOT NULL,
  `part_cod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `part_rend` decimal(8,2) NOT NULL,
  `rec_cod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `umr1_id` int(10) UNSIGNED NOT NULL,
  `umr2_id` int(10) UNSIGNED NOT NULL,
  `um_id` int(10) UNSIGNED NOT NULL,
  `part_idpadre` int(10) UNSIGNED NOT NULL,
  `pres_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_persona`
--

CREATE TABLE `t_persona` (
  `per_id` int(10) UNSIGNED NOT NULL,
  `per_nom` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `per_ape` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `per_tel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `per_dni` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `per_dir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `per_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_persona`
--

INSERT INTO `t_persona` (`per_id`, `per_nom`, `per_ape`, `per_tel`, `per_dni`, `per_dir`, `per_email`, `created_at`, `updated_at`) VALUES
(1, 'David', 'Dueñas Bravo', '974204853', '89746374', 'Calle Girasoles 450', 'davidxd@gmail.com', NULL, NULL),
(2, 'Dani', 'Quiroz Aldazabal', '987672536', '91876352', 'Calle Luna 908', 'dani@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_precio`
--

CREATE TABLE `t_precio` (
  `prec_id` int(10) UNSIGNED NOT NULL,
  `prec_monto` decimal(8,2) NOT NULL,
  `recum_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_presupuesto`
--

CREATE TABLE `t_presupuesto` (
  `pres_id` int(10) UNSIGNED NOT NULL,
  `pres_dir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_proveedor`
--

CREATE TABLE `t_proveedor` (
  `prov_id` int(10) UNSIGNED NOT NULL,
  `prov_nom` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `prov_ruc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_proveedor`
--

INSERT INTO `t_proveedor` (`prov_id`, `prov_nom`, `prov_ruc`, `created_at`, `updated_at`) VALUES
(1, 'DEFECTO', '00000000000', NULL, NULL),
(2, 'Binario Consultores', '20600983939', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_proyecto`
--

CREATE TABLE `t_proyecto` (
  `pro_id` int(10) UNSIGNED NOT NULL,
  `pro_nom` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_ubi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_cd` decimal(10,2) NOT NULL,
  `pro_gg` decimal(10,2) NOT NULL,
  `pro_uti` decimal(10,2) NOT NULL,
  `pro_fechin` date NOT NULL,
  `pro_fechfin` date NOT NULL,
  `pro_tipo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cli_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_proyecto`
--

INSERT INTO `t_proyecto` (`pro_id`, `pro_nom`, `pro_ubi`, `pro_cd`, `pro_gg`, `pro_uti`, `pro_fechin`, `pro_fechfin`, `pro_tipo`, `cli_id`, `created_at`, `updated_at`) VALUES
(1, 'Alcantarillado de Socabaya', 'Arequipa - Socabaya', '1200000.90', '13.00', '19.00', '2018-09-01', '2018-11-30', 'obra', 3, '2018-09-22 00:38:34', '2018-09-22 00:38:34'),
(2, 'Alcantarillado de Socabaya', 'Arequipa - Socabaya', '1200000.90', '13.00', '19.00', '2018-09-01', '2018-11-30', 'expediente', 3, '2018-09-22 00:46:11', '2018-09-22 00:46:11'),
(3, 'Alcantarillado de Socabaya', 'Arequipa - Socabaya', '1200000.90', '13.00', '19.00', '2018-09-01', '2018-11-30', 'supervision', 3, '2018-09-22 00:48:08', '2018-09-22 00:48:08'),
(4, 'Pavimentación Av. Parra', 'asdasd', '1200000.90', '15.00', '20.00', '2018-09-08', '2018-09-30', 'obra', 3, '2018-09-22 00:50:55', '2018-09-22 00:50:55'),
(5, 'Nuevo Proyecto', 'Arequipa', '12334566.00', '12.00', '10.00', '2018-09-28', '2018-09-28', 'supervision', 3, '2018-09-27 01:18:20', '2018-09-27 01:18:20'),
(6, 'Pavimentación Av. Dolores', 'JLByR - Arequipa', '500000.00', '15.00', '20.00', '2018-10-01', '2018-12-29', 'obra', 3, '2018-10-01 21:00:30', '2018-10-01 21:00:30'),
(7, ': REFORMULACIÓN, ACTUALIZACION Y MEJORAMIENTO,  DEL SERVICIO  DE TRANSITO VEHICULAR  Y PEATONAL EN EL ANEXOS', 'URACA - CASTILLA - AREQUIPA', '733195.00', '10.00', '5.00', '2018-10-01', '2019-01-26', 'obra', 2, '2018-10-01 21:16:21', '2018-10-01 21:16:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_proyectousuario`
--

CREATE TABLE `t_proyectousuario` (
  `prousu_id` int(10) UNSIGNED NOT NULL,
  `prousu_cargo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_id` int(10) UNSIGNED NOT NULL,
  `usu_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_reajuste`
--

CREATE TABLE `t_reajuste` (
  `rea_id` int(10) UNSIGNED NOT NULL,
  `rea_nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rea_monto` decimal(8,2) NOT NULL,
  `rea_oper` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reac_id` int(10) UNSIGNED NOT NULL,
  `valr_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_reajustecategoria`
--

CREATE TABLE `t_reajustecategoria` (
  `reac_id` int(10) UNSIGNED NOT NULL,
  `reac_nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reaf_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_reajustefamilia`
--

CREATE TABLE `t_reajustefamilia` (
  `reaf_id` int(10) UNSIGNED NOT NULL,
  `reaf_nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_recurso`
--

CREATE TABLE `t_recurso` (
  `rec_id` int(10) UNSIGNED NOT NULL,
  `rec_nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rec_cod` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_recurso`
--

INSERT INTO `t_recurso` (`rec_id`, `rec_nom`, `rec_cod`, `created_at`, `updated_at`) VALUES
(1, 'defecto', '0', NULL, NULL),
(2, 'OTROS', '0', NULL, NULL),
(290, 'MANO DE OBRA', '', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(291, 'CAPATAZ', '47 00006', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(292, 'TOPOGRAFO', '47 00086', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(293, 'OPERARIO', '47 00007', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(294, 'OFICIAL', '47 00008', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(295, 'PEON', '47 00009', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(296, 'MATERIALES', '', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(297, 'LETREROS DE SEGURIDAD', '00 07740', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(298, 'CLAVOS CON CABEZA 2\" A 4\"', '02 07734', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(299, 'ACERO CORRUGADO FY=4200 KG/CM2 GRADO 60', '03 06206', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(300, 'ARENA FINA', '04 00033', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(301, 'ARENA GRUESA', '04 00029', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(302, 'AFIRMADO', '05 00337', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(303, 'AGUA', '05 00002', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(304, 'PIEDRA CHANCADA 1/2\"', '05 07029', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(305, 'PIEDRA CHANCADA DE 1/2\" - 3/4\"', '05 06995', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(306, 'PIEDRA MEDIANA DE 4\"', '05 01399', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(307, 'ASFALTO DILUIDO MC-30', '13 07039', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(308, 'ASFALTO LIQUIDO RC-250', '13 00097', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(309, 'CEMENTO PORTLAND TIPO IP (42.5 KG)', '21 06994', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(310, 'BOTAS DE JEBE', '26 07002', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(311, 'EXTINTOR DE FUEGO DE 6KG PQS-ABC', '26 07015', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(312, 'GUANTES DE CUERO', '26 07005', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(313, 'GUANTES DE JEBE', '26 07006', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(314, 'LENTES DE PROTECCION', '26 07007', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(315, 'MALLA ARPILLERA', '26 07017', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(316, 'PROTECCION DE OIDOS TIPO TAPON', '26 07008', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(317, 'BANNER A COLOR 3.00M X 5.00M', '29 07732', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(318, 'BOTINES DE CUERO CON PUNTA DE ACERO', '29 07003', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(319, 'BOTIQUIN DE PRIMEROS AUXILIOS', '29 07014', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(320, 'CAPACITACIóN: SEGURIDAD Y SALUD EN EL TRABAJO', '29 07741', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(321, 'CASCO CON BARBIQUEJO DE BUENA CALIDAD', '29 07004', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(322, 'CINTA DE SEÑALIZACION COLOR ROJO PARA SEGURIDAD  DE OBRA', '29 07056', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(323, 'ELABORACION, IMPLEMENTACION Y ADMINISTRACION DEL PLAN DE SEG', '29 07737', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(324, 'RESPIRADOR DOBLE VIA CONTRA POLVO', '29 07738', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(325, 'CONO DE SEGURIDAD D=0,31 M Y H=0,67 M FV C/BASE FIERRO', '30 06265', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(326, 'YESO DE 28 KG', '30 01352', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(327, 'CHALECO REFLECTIVO', '37 06946', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(328, 'ESCOBA', '37 06828', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(329, 'HORMIGON (PUESTO EN OBRA)', '38 00115', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(330, 'ROTURA DE PROBETA', '38 07743', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(331, 'ALQUILER DE CASA O ALMACEN', '39 06042', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(332, 'LÁMPARA DE SEGURIDAD INTERMITENTE  P/SEÑAL', '39 06263', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(333, 'UNIFORME DE TRABAJO', '39 07739', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(334, 'MADERA TORNILLO', '43 00020', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(335, 'MALLA FAENA ROLLO 50 YD X 1 M NARANJA', '72 07485', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(336, 'EQUIPO', '', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(337, 'MOVILIZACIÓN Y DESMOVILIZACIÓN DE EQUIPOS PESADO, MATERIALES Y HERRAMIENTAS', '32 07733', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(338, 'HERRAMIENTAS MANUALES', '37 00004', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(339, 'MIRAS Y JALONES', '37 00104', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(340, 'CAMION CISTERNA 4X2 (AGUA) 122 HP 3,500GLN', '48 07038', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(341, 'CAMION VOLQUETE 15 M3.', '48 03748', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(342, 'CAMION VOLQUETE 6X4 330 HP 15 M3', '48 06996', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(343, 'MEZCLADORA DE CONCRETO 9 - 11 P3 (23 HP)', '48 06993', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(344, 'VIBRADOR DE CONCRETO 4 HP 1.25\"', '48 06876', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(345, 'CAMION IMPRIMADOR 6X2 178-210 HP DE 1800 GLS.', '49 07040', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(346, 'CARGADOR S/LLANTAS  110 - 125 HP', '49 00385', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(347, 'CARGADOR S/LLANTAS 125-155 HP 3 YD3.', '49 01350', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(348, 'ESTACION TOTAL COMPUTARIZADA', '49 07735', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(349, 'MOTONIVELADORA DE 125 HP', '49 00351', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(350, 'PAVIMENTADORA SOBRE ORUGAS 65 HP', '49 07044', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(351, 'PRISMAS PARA ESTACION TOTAL', '49 07736', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(352, 'RIPPER (P\' 150 HP)', '49 02705', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(353, 'RODILLO LISO VIBR AUTOP 101-135 HP DE 10-12 TN', '49 07742', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(354, 'RODILLO LISO VIBR AUTOP 70-100 HP 7-9 T.', '49 00349', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(355, 'RODILLO NEUMATICO AUTOP. 135 HP 9-26 TON', '49 06832', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(356, 'RODILLO TANDEM VIB.AUTOP 111-130HP 9-11T', '49 05739', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(357, 'TEODOLITO', '49 00105', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(358, 'TRACTOR DE ORUGAS DE 190-240 HP', '49 03178', '2018-10-04 05:26:39', '2018-10-04 05:26:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_recursounidadmedida`
--

CREATE TABLE `t_recursounidadmedida` (
  `recum_id` int(10) UNSIGNED NOT NULL,
  `rec_id` int(10) UNSIGNED NOT NULL,
  `um_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_recursounidadmedida`
--

INSERT INTO `t_recursounidadmedida` (`recum_id`, `rec_id`, `um_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(243, 290, 1, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(244, 291, 87, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(245, 292, 87, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(246, 293, 87, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(247, 294, 87, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(248, 295, 87, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(249, 296, 1, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(250, 297, 88, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(251, 298, 89, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(252, 299, 89, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(253, 300, 90, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(254, 301, 90, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(255, 302, 90, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(256, 303, 90, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(257, 304, 90, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(258, 305, 90, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(259, 306, 90, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(260, 307, 91, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(261, 308, 91, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(262, 309, 92, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(263, 310, 93, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(264, 311, 94, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(265, 312, 93, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(266, 313, 93, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(267, 314, 94, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(268, 315, 95, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(269, 316, 94, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(270, 317, 94, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(271, 318, 93, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(272, 319, 94, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(273, 320, 96, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(274, 321, 94, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(275, 322, 97, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(276, 323, 94, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(277, 324, 94, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(278, 325, 94, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(279, 326, 98, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(280, 327, 94, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(281, 328, 94, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(282, 329, 90, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(283, 330, 94, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(284, 331, 99, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(285, 332, 94, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(286, 333, 94, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(287, 334, 100, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(288, 335, 97, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(289, 336, 1, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(290, 337, 96, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(291, 338, 101, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(292, 339, 102, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(293, 340, 102, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(294, 341, 102, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(295, 342, 102, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(296, 343, 102, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(297, 344, 102, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(298, 345, 102, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(299, 346, 102, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(300, 347, 102, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(301, 348, 102, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(302, 349, 102, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(303, 350, 102, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(304, 351, 102, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(305, 352, 102, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(306, 353, 102, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(307, 354, 102, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(308, 355, 102, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(309, 356, 102, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(310, 357, 102, '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(311, 358, 102, '2018-10-04 05:26:39', '2018-10-04 05:26:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_registrotarea`
--

CREATE TABLE `t_registrotarea` (
  `regitar_id` int(10) UNSIGNED NOT NULL,
  `regitar_por` decimal(8,2) NOT NULL,
  `regitar_tit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regitar_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regitar_tiporeg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regitar_fech` date NOT NULL,
  `tar_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_tarea`
--

CREATE TABLE `t_tarea` (
  `tar_id` int(10) UNSIGNED NOT NULL,
  `tar_nom` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tar_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tar_fechin` date NOT NULL,
  `tar_fechfin` date NOT NULL,
  `tar_prio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tar_est` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tar_idpadre` int(10) UNSIGNED NOT NULL,
  `pro_id` int(10) UNSIGNED NOT NULL,
  `usu_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_tipoproyecto`
--

CREATE TABLE `t_tipoproyecto` (
  `tpro_id` int(10) UNSIGNED NOT NULL,
  `tpro_nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_unidadmedida`
--

CREATE TABLE `t_unidadmedida` (
  `um_id` int(10) UNSIGNED NOT NULL,
  `um_desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `um_abr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `t_unidadmedida`
--

INSERT INTO `t_unidadmedida` (`um_id`, `um_desc`, `um_abr`, `created_at`, `updated_at`) VALUES
(1, 'defecto', 'defecto', NULL, NULL),
(87, 'Sin nombre', 'HH', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(88, 'Sin nombre', 'PZA', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(89, 'Sin nombre', 'KG', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(90, 'Sin nombre', 'M3', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(91, 'Sin nombre', 'GLN', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(92, 'Sin nombre', 'BLS', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(93, 'Sin nombre', 'PAR', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(94, 'Sin nombre', 'UND', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(95, 'Sin nombre', 'M', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(96, 'Sin nombre', 'GLB', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(97, 'Sin nombre', 'RLL', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(98, 'Sin nombre', 'BOL', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(99, 'Sin nombre', 'MES', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(100, 'Sin nombre', 'P2', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(101, 'Sin nombre', '%MO', '2018-10-04 05:26:39', '2018-10-04 05:26:39'),
(102, 'Sin nombre', 'HM', '2018-10-04 05:26:39', '2018-10-04 05:26:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_usuario`
--

CREATE TABLE `t_usuario` (
  `usu_id` int(10) UNSIGNED NOT NULL,
  `usu_nom` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `usu_tip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usu_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usu_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `per_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_valorizacionc`
--

CREATE TABLE `t_valorizacionc` (
  `valc_id` int(10) UNSIGNED NOT NULL,
  `valc_nro` int(11) NOT NULL,
  `valc_cd` decimal(8,2) NOT NULL,
  `valc_fechin` date NOT NULL,
  `valc_fechfin` date NOT NULL,
  `valc_tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valc_gg` decimal(8,2) NOT NULL,
  `valc_uti` decimal(8,2) NOT NULL,
  `valc_por` decimal(8,2) NOT NULL,
  `valc_est` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_valorizacionr`
--

CREATE TABLE `t_valorizacionr` (
  `valr_id` int(10) UNSIGNED NOT NULL,
  `valr_nro` int(11) NOT NULL,
  `valr_cd` decimal(8,2) NOT NULL,
  `valr_fechin` date NOT NULL,
  `valr_fechfin` date NOT NULL,
  `valr_tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valr_gg` decimal(8,2) NOT NULL,
  `valr_uti` decimal(8,2) NOT NULL,
  `valr_por` decimal(8,2) NOT NULL,
  `valr_est` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pro_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `tipo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Jorge Luis Garnica Blanco', 'jorgegarba@gmail.com', '$2y$10$CR/fNZP0jJgjvPm.E2P9J.Ax/zt/5e9zrBZb7L7F4u5mf6lcQ.LlS', 'gerente', 'luea9Xv7rBLe9j0pqC80xAGONl7fjk7lKIohrIiyl547Oy9F9VdWojH8PDJv', '2018-09-21 19:18:20', '2018-09-21 19:18:20');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD UNIQUE KEY `password_resets_email_unique` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `t_adelanto`
--
ALTER TABLE `t_adelanto`
  ADD PRIMARY KEY (`adel_id`),
  ADD UNIQUE KEY `t_adelanto_pro_id_unique` (`pro_id`);

--
-- Indices de la tabla `t_analisiscostounitario`
--
ALTER TABLE `t_analisiscostounitario`
  ADD PRIMARY KEY (`acu_id`),
  ADD KEY `t_analisiscostounitario_part_id_foreign` (`part_id`),
  ADD KEY `t_analisiscostounitario_recum_id_foreign` (`recum_id`);

--
-- Indices de la tabla `t_archivotarea`
--
ALTER TABLE `t_archivotarea`
  ADD PRIMARY KEY (`archita_id`),
  ADD KEY `t_archivotarea_regitar_id_foreign` (`regitar_id`);

--
-- Indices de la tabla `t_cliente`
--
ALTER TABLE `t_cliente`
  ADD PRIMARY KEY (`cli_id`);

--
-- Indices de la tabla `t_cur`
--
ALTER TABLE `t_cur`
  ADD PRIMARY KEY (`cur_id`),
  ADD KEY `t_cur_pro_id_foreign` (`pro_id`);

--
-- Indices de la tabla `t_curdetalle`
--
ALTER TABLE `t_curdetalle`
  ADD PRIMARY KEY (`curd_id`),
  ADD KEY `t_curdetalle_recum_id_foreign` (`recum_id`),
  ADD KEY `t_curdetalle_cur_id_foreign` (`cur_id`),
  ADD KEY `t_curdetalle_curd_idpadre_foreign_idx` (`curd_idpadre`);

--
-- Indices de la tabla `t_curdplazo`
--
ALTER TABLE `t_curdplazo`
  ADD PRIMARY KEY (`curdp_id`),
  ADD KEY `t_curdplazo_curd_id_foreign` (`curd_id`);

--
-- Indices de la tabla `t_egreso`
--
ALTER TABLE `t_egreso`
  ADD PRIMARY KEY (`egre_id`),
  ADD KEY `t_egreso_pro_id_foreign` (`pro_id`),
  ADD KEY `t_egreso_facd_id_foreign` (`facd_id`);

--
-- Indices de la tabla `t_empleado`
--
ALTER TABLE `t_empleado`
  ADD PRIMARY KEY (`emp_id`),
  ADD KEY `t_empleado_per_id_foreign` (`per_id`);

--
-- Indices de la tabla `t_factura`
--
ALTER TABLE `t_factura`
  ADD PRIMARY KEY (`fac_id`),
  ADD KEY `t_factura_prov_id_foreign` (`prov_id`),
  ADD KEY `t_factura_emp_id_foreign` (`emp_id`),
  ADD KEY `t_factura_pro_id_foreign` (`pro_id`);

--
-- Indices de la tabla `t_facturadetalle`
--
ALTER TABLE `t_facturadetalle`
  ADD PRIMARY KEY (`facd_id`),
  ADD KEY `t_facturadetalle_fac_id_foreign` (`fac_id`),
  ADD KEY `t_facturadetalle_gas_id_foreign` (`gas_id`),
  ADD KEY `t_facturadetalle_recum_id_foreign` (`recum_id`);

--
-- Indices de la tabla `t_gasto`
--
ALTER TABLE `t_gasto`
  ADD PRIMARY KEY (`gas_id`);

--
-- Indices de la tabla `t_ingreso`
--
ALTER TABLE `t_ingreso`
  ADD PRIMARY KEY (`ing_id`),
  ADD KEY `t_ingreso_valr_id_foreign` (`valr_id`),
  ADD KEY `t_ingreso_adel_id_foreign` (`adel_id`),
  ADD KEY `t_ingreso_pro_id_foreign` (`pro_id`);

--
-- Indices de la tabla `t_partida`
--
ALTER TABLE `t_partida`
  ADD PRIMARY KEY (`part_id`),
  ADD KEY `t_partida_umr1_id_foreign` (`umr1_id`),
  ADD KEY `t_partida_umr2_id_foreign` (`umr2_id`),
  ADD KEY `t_partida_um_id_foreign` (`um_id`),
  ADD KEY `t_partida_pres_id_foreign` (`pres_id`);

--
-- Indices de la tabla `t_persona`
--
ALTER TABLE `t_persona`
  ADD PRIMARY KEY (`per_id`);

--
-- Indices de la tabla `t_precio`
--
ALTER TABLE `t_precio`
  ADD PRIMARY KEY (`prec_id`),
  ADD KEY `t_precio_recum_id_foreign` (`recum_id`);

--
-- Indices de la tabla `t_presupuesto`
--
ALTER TABLE `t_presupuesto`
  ADD PRIMARY KEY (`pres_id`),
  ADD KEY `t_presupuesto_pro_id_foreign` (`pro_id`);

--
-- Indices de la tabla `t_proveedor`
--
ALTER TABLE `t_proveedor`
  ADD PRIMARY KEY (`prov_id`);

--
-- Indices de la tabla `t_proyecto`
--
ALTER TABLE `t_proyecto`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `t_proyecto_cli_id_foreign` (`cli_id`);

--
-- Indices de la tabla `t_proyectousuario`
--
ALTER TABLE `t_proyectousuario`
  ADD PRIMARY KEY (`prousu_id`),
  ADD KEY `t_proyectousuario_pro_id_foreign` (`pro_id`),
  ADD KEY `t_proyectousuario_usu_id_foreign` (`usu_id`);

--
-- Indices de la tabla `t_reajuste`
--
ALTER TABLE `t_reajuste`
  ADD PRIMARY KEY (`rea_id`),
  ADD KEY `t_reajuste_reac_id_foreign` (`reac_id`),
  ADD KEY `t_reajuste_valr_id_foreign` (`valr_id`);

--
-- Indices de la tabla `t_reajustecategoria`
--
ALTER TABLE `t_reajustecategoria`
  ADD PRIMARY KEY (`reac_id`),
  ADD KEY `t_reajustecategoria_reaf_id_foreign` (`reaf_id`);

--
-- Indices de la tabla `t_reajustefamilia`
--
ALTER TABLE `t_reajustefamilia`
  ADD PRIMARY KEY (`reaf_id`);

--
-- Indices de la tabla `t_recurso`
--
ALTER TABLE `t_recurso`
  ADD PRIMARY KEY (`rec_id`);

--
-- Indices de la tabla `t_recursounidadmedida`
--
ALTER TABLE `t_recursounidadmedida`
  ADD PRIMARY KEY (`recum_id`),
  ADD KEY `t_recursounidadmedida_rec_id_foreign` (`rec_id`),
  ADD KEY `t_recursounidadmedida_um_id_foreign` (`um_id`);

--
-- Indices de la tabla `t_registrotarea`
--
ALTER TABLE `t_registrotarea`
  ADD PRIMARY KEY (`regitar_id`),
  ADD KEY `t_registrotarea_tar_id_foreign` (`tar_id`);

--
-- Indices de la tabla `t_tarea`
--
ALTER TABLE `t_tarea`
  ADD PRIMARY KEY (`tar_id`),
  ADD KEY `t_tarea_pro_id_foreign` (`pro_id`),
  ADD KEY `t_tarea_usu_id_foreign` (`usu_id`);

--
-- Indices de la tabla `t_tipoproyecto`
--
ALTER TABLE `t_tipoproyecto`
  ADD PRIMARY KEY (`tpro_id`);

--
-- Indices de la tabla `t_unidadmedida`
--
ALTER TABLE `t_unidadmedida`
  ADD PRIMARY KEY (`um_id`);

--
-- Indices de la tabla `t_usuario`
--
ALTER TABLE `t_usuario`
  ADD PRIMARY KEY (`usu_id`),
  ADD KEY `t_usuario_per_id_foreign` (`per_id`);

--
-- Indices de la tabla `t_valorizacionc`
--
ALTER TABLE `t_valorizacionc`
  ADD PRIMARY KEY (`valc_id`),
  ADD KEY `t_valorizacionc_pro_id_foreign` (`pro_id`);

--
-- Indices de la tabla `t_valorizacionr`
--
ALTER TABLE `t_valorizacionr`
  ADD PRIMARY KEY (`valr_id`),
  ADD KEY `t_valorizacionr_pro_id_foreign` (`pro_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `t_adelanto`
--
ALTER TABLE `t_adelanto`
  MODIFY `adel_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_analisiscostounitario`
--
ALTER TABLE `t_analisiscostounitario`
  MODIFY `acu_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_archivotarea`
--
ALTER TABLE `t_archivotarea`
  MODIFY `archita_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_cliente`
--
ALTER TABLE `t_cliente`
  MODIFY `cli_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `t_cur`
--
ALTER TABLE `t_cur`
  MODIFY `cur_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT de la tabla `t_curdetalle`
--
ALTER TABLE `t_curdetalle`
  MODIFY `curd_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=261;

--
-- AUTO_INCREMENT de la tabla `t_curdplazo`
--
ALTER TABLE `t_curdplazo`
  MODIFY `curdp_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_egreso`
--
ALTER TABLE `t_egreso`
  MODIFY `egre_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_empleado`
--
ALTER TABLE `t_empleado`
  MODIFY `emp_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `t_factura`
--
ALTER TABLE `t_factura`
  MODIFY `fac_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `t_facturadetalle`
--
ALTER TABLE `t_facturadetalle`
  MODIFY `facd_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `t_gasto`
--
ALTER TABLE `t_gasto`
  MODIFY `gas_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `t_ingreso`
--
ALTER TABLE `t_ingreso`
  MODIFY `ing_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_partida`
--
ALTER TABLE `t_partida`
  MODIFY `part_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_persona`
--
ALTER TABLE `t_persona`
  MODIFY `per_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `t_precio`
--
ALTER TABLE `t_precio`
  MODIFY `prec_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_presupuesto`
--
ALTER TABLE `t_presupuesto`
  MODIFY `pres_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_proveedor`
--
ALTER TABLE `t_proveedor`
  MODIFY `prov_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `t_proyecto`
--
ALTER TABLE `t_proyecto`
  MODIFY `pro_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `t_proyectousuario`
--
ALTER TABLE `t_proyectousuario`
  MODIFY `prousu_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_reajuste`
--
ALTER TABLE `t_reajuste`
  MODIFY `rea_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_reajustecategoria`
--
ALTER TABLE `t_reajustecategoria`
  MODIFY `reac_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_reajustefamilia`
--
ALTER TABLE `t_reajustefamilia`
  MODIFY `reaf_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_recurso`
--
ALTER TABLE `t_recurso`
  MODIFY `rec_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=359;

--
-- AUTO_INCREMENT de la tabla `t_recursounidadmedida`
--
ALTER TABLE `t_recursounidadmedida`
  MODIFY `recum_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=312;

--
-- AUTO_INCREMENT de la tabla `t_registrotarea`
--
ALTER TABLE `t_registrotarea`
  MODIFY `regitar_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_tarea`
--
ALTER TABLE `t_tarea`
  MODIFY `tar_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_tipoproyecto`
--
ALTER TABLE `t_tipoproyecto`
  MODIFY `tpro_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_unidadmedida`
--
ALTER TABLE `t_unidadmedida`
  MODIFY `um_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT de la tabla `t_usuario`
--
ALTER TABLE `t_usuario`
  MODIFY `usu_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_valorizacionc`
--
ALTER TABLE `t_valorizacionc`
  MODIFY `valc_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_valorizacionr`
--
ALTER TABLE `t_valorizacionr`
  MODIFY `valr_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `t_adelanto`
--
ALTER TABLE `t_adelanto`
  ADD CONSTRAINT `t_adelanto_pro_id_foreign` FOREIGN KEY (`pro_id`) REFERENCES `t_proyecto` (`pro_id`);

--
-- Filtros para la tabla `t_analisiscostounitario`
--
ALTER TABLE `t_analisiscostounitario`
  ADD CONSTRAINT `t_analisiscostounitario_part_id_foreign` FOREIGN KEY (`part_id`) REFERENCES `t_partida` (`part_id`),
  ADD CONSTRAINT `t_analisiscostounitario_recum_id_foreign` FOREIGN KEY (`recum_id`) REFERENCES `t_recursounidadmedida` (`recum_id`);

--
-- Filtros para la tabla `t_archivotarea`
--
ALTER TABLE `t_archivotarea`
  ADD CONSTRAINT `t_archivotarea_regitar_id_foreign` FOREIGN KEY (`regitar_id`) REFERENCES `t_registrotarea` (`regitar_id`);

--
-- Filtros para la tabla `t_cur`
--
ALTER TABLE `t_cur`
  ADD CONSTRAINT `t_cur_pro_id_foreign` FOREIGN KEY (`pro_id`) REFERENCES `t_proyecto` (`pro_id`);

--
-- Filtros para la tabla `t_curdetalle`
--
ALTER TABLE `t_curdetalle`
  ADD CONSTRAINT `t_curdetalle_cur_id_foreign` FOREIGN KEY (`cur_id`) REFERENCES `t_cur` (`cur_id`),
  ADD CONSTRAINT `t_curdetalle_curd_idpadre_foreign` FOREIGN KEY (`curd_idpadre`) REFERENCES `t_curdetalle` (`curd_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `t_curdetalle_recum_id_foreign` FOREIGN KEY (`recum_id`) REFERENCES `t_recursounidadmedida` (`recum_id`);

--
-- Filtros para la tabla `t_curdplazo`
--
ALTER TABLE `t_curdplazo`
  ADD CONSTRAINT `t_curdplazo_curd_id_foreign` FOREIGN KEY (`curd_id`) REFERENCES `t_curdetalle` (`curd_id`);

--
-- Filtros para la tabla `t_egreso`
--
ALTER TABLE `t_egreso`
  ADD CONSTRAINT `t_egreso_facd_id_foreign` FOREIGN KEY (`facd_id`) REFERENCES `t_facturadetalle` (`facd_id`),
  ADD CONSTRAINT `t_egreso_pro_id_foreign` FOREIGN KEY (`pro_id`) REFERENCES `t_proyecto` (`pro_id`);

--
-- Filtros para la tabla `t_empleado`
--
ALTER TABLE `t_empleado`
  ADD CONSTRAINT `t_empleado_per_id_foreign` FOREIGN KEY (`per_id`) REFERENCES `t_persona` (`per_id`);

--
-- Filtros para la tabla `t_factura`
--
ALTER TABLE `t_factura`
  ADD CONSTRAINT `t_factura_emp_id_foreign` FOREIGN KEY (`emp_id`) REFERENCES `t_empleado` (`emp_id`),
  ADD CONSTRAINT `t_factura_pro_id_foreign` FOREIGN KEY (`pro_id`) REFERENCES `t_proyecto` (`pro_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `t_factura_prov_id_foreign` FOREIGN KEY (`prov_id`) REFERENCES `t_proveedor` (`prov_id`);

--
-- Filtros para la tabla `t_facturadetalle`
--
ALTER TABLE `t_facturadetalle`
  ADD CONSTRAINT `t_facturadetalle_fac_id_foreign` FOREIGN KEY (`fac_id`) REFERENCES `t_factura` (`fac_id`),
  ADD CONSTRAINT `t_facturadetalle_gas_id_foreign` FOREIGN KEY (`gas_id`) REFERENCES `t_gasto` (`gas_id`),
  ADD CONSTRAINT `t_facturadetalle_recum_id_foreign` FOREIGN KEY (`recum_id`) REFERENCES `t_recursounidadmedida` (`recum_id`);

--
-- Filtros para la tabla `t_ingreso`
--
ALTER TABLE `t_ingreso`
  ADD CONSTRAINT `t_ingreso_adel_id_foreign` FOREIGN KEY (`adel_id`) REFERENCES `t_adelanto` (`adel_id`),
  ADD CONSTRAINT `t_ingreso_pro_id_foreign` FOREIGN KEY (`pro_id`) REFERENCES `t_proyecto` (`pro_id`),
  ADD CONSTRAINT `t_ingreso_valr_id_foreign` FOREIGN KEY (`valr_id`) REFERENCES `t_valorizacionr` (`valr_id`);

--
-- Filtros para la tabla `t_partida`
--
ALTER TABLE `t_partida`
  ADD CONSTRAINT `t_partida_pres_id_foreign` FOREIGN KEY (`pres_id`) REFERENCES `t_presupuesto` (`pres_id`),
  ADD CONSTRAINT `t_partida_um_id_foreign` FOREIGN KEY (`um_id`) REFERENCES `t_unidadmedida` (`um_id`),
  ADD CONSTRAINT `t_partida_umr1_id_foreign` FOREIGN KEY (`umr1_id`) REFERENCES `t_unidadmedida` (`um_id`),
  ADD CONSTRAINT `t_partida_umr2_id_foreign` FOREIGN KEY (`umr2_id`) REFERENCES `t_unidadmedida` (`um_id`);

--
-- Filtros para la tabla `t_precio`
--
ALTER TABLE `t_precio`
  ADD CONSTRAINT `t_precio_recum_id_foreign` FOREIGN KEY (`recum_id`) REFERENCES `t_recursounidadmedida` (`recum_id`);

--
-- Filtros para la tabla `t_presupuesto`
--
ALTER TABLE `t_presupuesto`
  ADD CONSTRAINT `t_presupuesto_pro_id_foreign` FOREIGN KEY (`pro_id`) REFERENCES `t_proyecto` (`pro_id`);

--
-- Filtros para la tabla `t_proyecto`
--
ALTER TABLE `t_proyecto`
  ADD CONSTRAINT `t_proyecto_cli_id_foreign` FOREIGN KEY (`cli_id`) REFERENCES `t_cliente` (`cli_id`);

--
-- Filtros para la tabla `t_proyectousuario`
--
ALTER TABLE `t_proyectousuario`
  ADD CONSTRAINT `t_proyectousuario_pro_id_foreign` FOREIGN KEY (`pro_id`) REFERENCES `t_proyecto` (`pro_id`),
  ADD CONSTRAINT `t_proyectousuario_usu_id_foreign` FOREIGN KEY (`usu_id`) REFERENCES `t_usuario` (`usu_id`);

--
-- Filtros para la tabla `t_reajuste`
--
ALTER TABLE `t_reajuste`
  ADD CONSTRAINT `t_reajuste_reac_id_foreign` FOREIGN KEY (`reac_id`) REFERENCES `t_reajustecategoria` (`reac_id`),
  ADD CONSTRAINT `t_reajuste_valr_id_foreign` FOREIGN KEY (`valr_id`) REFERENCES `t_valorizacionr` (`valr_id`);

--
-- Filtros para la tabla `t_reajustecategoria`
--
ALTER TABLE `t_reajustecategoria`
  ADD CONSTRAINT `t_reajustecategoria_reaf_id_foreign` FOREIGN KEY (`reaf_id`) REFERENCES `t_reajustefamilia` (`reaf_id`);

--
-- Filtros para la tabla `t_recursounidadmedida`
--
ALTER TABLE `t_recursounidadmedida`
  ADD CONSTRAINT `t_recursounidadmedida_rec_id_foreign` FOREIGN KEY (`rec_id`) REFERENCES `t_recurso` (`rec_id`),
  ADD CONSTRAINT `t_recursounidadmedida_um_id_foreign` FOREIGN KEY (`um_id`) REFERENCES `t_unidadmedida` (`um_id`);

--
-- Filtros para la tabla `t_registrotarea`
--
ALTER TABLE `t_registrotarea`
  ADD CONSTRAINT `t_registrotarea_tar_id_foreign` FOREIGN KEY (`tar_id`) REFERENCES `t_tarea` (`tar_id`);

--
-- Filtros para la tabla `t_tarea`
--
ALTER TABLE `t_tarea`
  ADD CONSTRAINT `t_tarea_pro_id_foreign` FOREIGN KEY (`pro_id`) REFERENCES `t_proyecto` (`pro_id`),
  ADD CONSTRAINT `t_tarea_usu_id_foreign` FOREIGN KEY (`usu_id`) REFERENCES `t_usuario` (`usu_id`);

--
-- Filtros para la tabla `t_usuario`
--
ALTER TABLE `t_usuario`
  ADD CONSTRAINT `t_usuario_per_id_foreign` FOREIGN KEY (`per_id`) REFERENCES `t_persona` (`per_id`);

--
-- Filtros para la tabla `t_valorizacionc`
--
ALTER TABLE `t_valorizacionc`
  ADD CONSTRAINT `t_valorizacionc_pro_id_foreign` FOREIGN KEY (`pro_id`) REFERENCES `t_proyecto` (`pro_id`);

--
-- Filtros para la tabla `t_valorizacionr`
--
ALTER TABLE `t_valorizacionr`
  ADD CONSTRAINT `t_valorizacionr_pro_id_foreign` FOREIGN KEY (`pro_id`) REFERENCES `t_proyecto` (`pro_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
