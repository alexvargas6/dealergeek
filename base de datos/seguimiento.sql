-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-10-2023 a las 04:22:57
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `seguimiento`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idpaquete` bigint(20) UNSIGNED DEFAULT NULL,
  `numero_evento` int(10) UNSIGNED NOT NULL,
  `unixtime` bigint(20) UNSIGNED NOT NULL,
  `descripcion_evento` varchar(255) NOT NULL,
  `localizacion_evento` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `idpaquete`, `numero_evento`, `unixtime`, `descripcion_evento`, `localizacion_evento`, `created_at`, `updated_at`) VALUES
(1, 5, 2, 1696546400, 'Orden confirmada', '::1', '2023-10-06 04:53:20', '2023-10-06 04:53:20'),
(2, 6, 2, 1696611804, 'Orden confirmada', '::1', '2023-10-06 23:03:24', '2023-10-06 23:03:24'),
(3, 7, 1, 1696620880, 'Orden confirmada', '::1', '2023-10-07 01:34:40', '2023-10-07 01:34:40'),
(4, 8, 1, 1696625854, 'Orden confirmada', '::1', '2023-10-07 02:57:34', '2023-10-07 02:57:34'),
(5, 6, 3, 1696625915, '{\"id\":1,\"nombre_evento\":\"Orden confirmada\",\"icono\":\"fa fa-check\",\"estatus\":\"A\",\"created_at\":\"2023-10-05T21:02:38.000000Z\",\"updated_at\":\"2023-10-05T21:02:38.000000Z\"}', ', DISTRITO FEDERAL', '2023-10-07 02:58:35', '2023-10-07 02:58:35'),
(6, 6, 4, 1696626062, 'Orden confirmada', ', COAHUILA', '2023-10-07 03:01:02', '2023-10-07 03:01:02'),
(7, 6, 4, 1696626227, 'Listo para recojer', ', CHIHUAHUA', '2023-10-07 03:03:47', '2023-10-07 03:03:47'),
(8, 9, 1, 1696626511, 'Orden confirmada', '::1', '2023-10-07 03:08:31', '2023-10-07 03:08:31'),
(10, 9, 4, 1696626590, 'Listo para recojer', ', CAMPECHE', '2023-10-07 03:09:50', '2023-10-07 03:09:50'),
(11, 10, 1, 1696627536, 'Orden confirmada', '::1', '2023-10-07 03:25:36', '2023-10-07 03:25:36'),
(12, 11, 1, 1696627560, 'Orden confirmada', '::1', '2023-10-07 03:26:00', '2023-10-07 03:26:00'),
(13, 5, 3, 1696630023, 'En camino', ', BAJA CALIFORNIA', '2023-10-07 04:07:03', '2023-10-07 04:07:03'),
(14, 5, 3, 1696630062, 'En camino', ', AGUASCALIENTES', '2023-10-07 04:07:42', '2023-10-07 04:07:42'),
(15, 5, 4, 1696631388, 'Listo para recojer', ', BAJA CALIFORNIA', '2023-10-07 04:29:48', '2023-10-07 04:29:48'),
(16, 12, 1, 1696634517, 'Orden confirmada', '::1', '2023-10-07 05:21:57', '2023-10-07 05:21:57'),
(17, 13, 1, 1696635593, 'Orden confirmada', '::1', '2023-10-07 05:39:53', '2023-10-07 05:39:53'),
(18, 14, 1, 1696636245, 'Orden confirmada', '::1', '2023-10-07 05:50:45', '2023-10-07 05:50:45'),
(19, 15, 1, 1696636455, 'Orden confirmada', '::1', '2023-10-07 05:54:15', '2023-10-07 05:54:15'),
(20, 16, 1, 1696638183, 'Orden confirmada', '::1', '2023-10-07 06:23:03', '2023-10-07 06:23:03'),
(21, 17, 1, 1696638356, 'Orden confirmada', '::1', '2023-10-07 06:25:56', '2023-10-07 06:25:56'),
(22, 18, 1, 1696638861, 'Orden confirmada', '::1', '2023-10-07 06:34:21', '2023-10-07 06:34:21'),
(24, 12, 2, 1696642451, 'Recogido por mensajería', ', BAJA CALIFORNIA', '2023-10-07 07:34:11', '2023-10-07 07:34:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos_predeterminados`
--

CREATE TABLE `eventos_predeterminados` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_evento` varchar(255) NOT NULL,
  `icono` varchar(255) NOT NULL,
  `estatus` enum('A','E') NOT NULL DEFAULT 'A',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `eventos_predeterminados`
--

INSERT INTO `eventos_predeterminados` (`id`, `nombre_evento`, `icono`, `estatus`, `created_at`, `updated_at`) VALUES
(1, 'Orden confirmada', 'fa fa-check', 'A', '2023-10-06 03:02:38', '2023-10-06 03:02:38'),
(2, 'Recogido por mensajería', 'fa fa-user', 'A', '2023-10-06 03:02:38', '2023-10-06 03:02:38'),
(3, 'En camino', 'fa fa-truck', 'A', '2023-10-06 03:02:38', '2023-10-06 03:02:38'),
(4, 'Listo para recojer', 'fa fa-box', 'A', '2023-10-06 03:02:38', '2023-10-06 03:02:38'),
(5, 'ENTREGADO', 'fa fa-box', 'A', '2023-10-06 03:02:38', '2023-10-06 03:02:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_10_05_040628_create_permisos_table', 1),
(6, '2023_10_05_041319_create_permiso_usuario_table', 1),
(7, '2023_10_05_191854_create_paquetes_table', 1),
(8, '2023_10_05_205557_create_eventos_predeterminados_table', 2),
(9, '2023_10_05_210211_create_eventos_table', 2),
(10, '2023_10_05_222951_add_columns_to_paquetes_table', 3),
(11, '2023_10_05_225214_add_idpaquete_to_eventos', 4),
(12, '2023_10_06_035803_add_columns_to_permissions_table', 5),
(13, '2023_10_06_165707_add_fecha_estimada_llegada_to_paquetes', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paquetes`
--

CREATE TABLE `paquetes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `clave_rastreo` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `largo_cm` decimal(8,2) NOT NULL,
  `ancho_cm` decimal(8,2) NOT NULL,
  `altura_cm` decimal(8,2) NOT NULL,
  `estatus` enum('A','F') NOT NULL DEFAULT 'A',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `correo_recibe` varchar(255) DEFAULT NULL,
  `nombre_recibe` varchar(255) DEFAULT NULL,
  `domicilio_recibe` varchar(255) DEFAULT NULL,
  `ciudad` varchar(255) DEFAULT NULL,
  `fecha_estimada_llegada` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `paquetes`
--

INSERT INTO `paquetes` (`id`, `clave_rastreo`, `descripcion`, `largo_cm`, `ancho_cm`, `altura_cm`, `estatus`, `created_at`, `updated_at`, `correo_recibe`, `nombre_recibe`, `domicilio_recibe`, `ciudad`, `fecha_estimada_llegada`) VALUES
(3, 'VAS1696545377', 'vaso', '1.00', '1.00', '1.00', 'A', '2023-10-06 04:36:17', '2023-10-06 04:36:17', 'alxdeosandro@gmail.com', 'ALEX', 'calle', 'Temixco,MORELOS', NULL),
(5, 'DIS1696546400', 'disco', '23.00', '11.00', '22.00', 'F', '2023-10-06 04:53:20', '2023-10-07 04:29:48', 'jorge@ll.com', 'jorge grindo', 'jajaajaj', 'Gustavo Díaz Ordaz,TAMAULIPAS', NULL),
(6, 'CEL1696611804', 'celular iphone', '43.00', '12.00', '2.00', 'A', '2023-10-06 23:03:24', '2023-10-06 23:03:24', 'dsdsd@hmail.com', 'adasd', 'asd', 'Gral. Terán,NUEVO LEON', '2023-10-09'),
(7, 'DXD1696620880', 'dxd', '2.00', '21.00', '1.00', 'A', '2023-10-07 01:34:40', '2023-10-07 01:34:40', 'a@dd.com', 'ss', 'ss', 'Tepic,NAYARIT', '2023-10-08'),
(8, 'TT1696625854', 'tt', '4.00', '5.00', '2.00', 'A', '2023-10-07 02:57:34', '2023-10-07 02:57:34', 'fgd@dd.com', '33', 'f', 'Gral. Terán,NUEVO LEON', '2023-10-09'),
(9, 'TUT1696626511', 'tu tutu', '21.00', '21.00', '12.00', 'F', '2023-10-07 03:08:31', '2023-10-07 03:09:50', 'alex@m.com', 'jaja', 'calle', 'Temoac,MORELOS', '2023-10-09'),
(10, 'MEX1696627536', 'mextasis', '19.00', '22.00', '23.00', 'A', '2023-10-07 03:25:36', '2023-10-07 03:25:36', 'alexdeosandrock@gmail.com', 'holabola', 'calle 34v', 'Calimaya,ESTADO DE MEXICO', '2023-10-10'),
(11, 'MEX1696627560', 'mextasis', '19.00', '22.00', '23.00', 'A', '2023-10-07 03:26:00', '2023-10-07 03:26:00', 'alexdeosandrock@gmail.com', 'holabola', 'calle 34v', 'Jerécuaro,GUANAJUATO', '2023-10-10'),
(12, 'D1696634517', 'd', '2.00', '1.00', '1.00', 'A', '2023-10-07 05:21:57', '2023-10-07 05:21:57', 's@ss.com', 's', 's', 'Tepic,NAYARIT', '2023-10-08'),
(13, 'TUT1696635593', 'tutu', '12.00', '23.00', '12.00', 'A', '2023-10-07 05:39:53', '2023-10-07 05:39:53', 'alx@gmail.com', 'jorge', 'jaja', 'Charo,MICHOACAN', '2023-10-09'),
(14, 'TUT1696636245', 'tutu', '12.00', '23.00', '12.00', 'A', '2023-10-07 05:50:45', '2023-10-07 05:50:45', 'alx@gmail.com', 'jorge', 'jaja', 'Atlautla,ESTADO DE MEXICO', '2023-10-09'),
(15, 'TUT1696636455', 'tutu', '12.00', '23.00', '12.00', 'A', '2023-10-07 05:54:15', '2023-10-07 05:54:15', 'alx@gmail.com', 'jorge', 'jaja', 'Chilcuautla,HIDALGO', '2023-10-09'),
(16, 'HEL1696638183', 'helado', '31.00', '11.00', '44.00', 'A', '2023-10-07 06:23:03', '2023-10-07 06:23:03', 'alx@gmail.com', 'alex vargas', 'calle quintero', 'Puente de Ixtla,MORELOS', '2023-10-10'),
(17, 'SUE1696638356', 'suegra', '31.00', '2.00', '22.00', 'A', '2023-10-07 06:25:56', '2023-10-07 06:25:56', 'alex@alex.com', 'jose jorge', 'calle 32', 'Mazatepec,MORELOS', '2023-10-10'),
(18, 'EXT1696638861', 'Extasis', '1.00', '1.00', '2.00', 'A', '2023-10-07 06:34:21', '2023-10-07 06:34:21', 'alex@jojogmail.com', 'ojala', '21', 'Galeana,NUEVO LEON', '2023-10-10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre_permiso` varchar(255) NOT NULL,
  `clave_permiso` varchar(255) NOT NULL,
  `estatus` enum('A','E') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `module_name` varchar(255) DEFAULT NULL,
  `module_route` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `nombre_permiso`, `clave_permiso`, `estatus`, `created_at`, `updated_at`, `module_name`, `module_route`) VALUES
(1, 'administrador', 'adm', 'A', '2023-10-06 01:31:27', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso_usuario`
--

CREATE TABLE `permiso_usuario` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permiso_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `estatus` enum('A','E') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permiso_usuario`
--

INSERT INTO `permiso_usuario` (`id`, `permiso_id`, `user_id`, `estatus`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'A', '2023-10-06 01:31:27', '2023-10-06 01:31:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'administrador', 'admin@admin.com', NULL, '$2y$10$jVEqzrtqKu7OjRLDiFrlvuTBLwke68kqtKyp7Iiq0QbDLRFM9.VLq', NULL, '2023-10-06 01:31:26', '2023-10-06 01:31:26');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `eventos_predeterminados`
--
ALTER TABLE `eventos_predeterminados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `paquetes`
--
ALTER TABLE `paquetes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permisos_clave_permiso_unique` (`clave_permiso`);

--
-- Indices de la tabla `permiso_usuario`
--
ALTER TABLE `permiso_usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permiso_usuario_permiso_id_foreign` (`permiso_id`),
  ADD KEY `permiso_usuario_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `eventos_predeterminados`
--
ALTER TABLE `eventos_predeterminados`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `paquetes`
--
ALTER TABLE `paquetes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `permiso_usuario`
--
ALTER TABLE `permiso_usuario`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `permiso_usuario`
--
ALTER TABLE `permiso_usuario`
  ADD CONSTRAINT `permiso_usuario_permiso_id_foreign` FOREIGN KEY (`permiso_id`) REFERENCES `permisos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permiso_usuario_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
