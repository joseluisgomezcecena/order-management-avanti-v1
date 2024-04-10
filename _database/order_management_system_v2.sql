-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-04-2024 a las 09:26:08
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `order_management_system_v1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clients`
--

CREATE TABLE `clients` (
  `client_id` int(11) NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `clients`
--

INSERT INTO `clients` (`client_id`, `client_name`, `address`, `created_at`, `updated_at`, `user_name`) VALUES
(1, 'Avanti Manufacturing', '', '2024-04-03 07:03:22', '2024-04-03 07:03:22', 'administrator'),
(3, 'Lancer Orthodontics ', 'Calle Saturno #20  Parque PIMSA 1, CP 21000, Mexicali B.C.', '2024-04-03 08:46:23', '2024-04-03 18:33:23', 'administrator');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `custom_filled`
--

CREATE TABLE `custom_filled` (
  `cf_id` int(11) NOT NULL,
  `cf_project_id` int(11) NOT NULL,
  `cf_operation_id` int(11) NOT NULL,
  `cf_custom_field` int(11) NOT NULL,
  `cf_data` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `custom_filled`
--

INSERT INTO `custom_filled` (`cf_id`, `cf_project_id`, `cf_operation_id`, `cf_custom_field`, `cf_data`) VALUES
(11, 1, 2, 6, ''),
(12, 1, 2, 8, ''),
(13, 1, 2, 9, 'desc cnc'),
(14, 1, 2, 10, 'mat'),
(15, 1, 2, 11, '2'),
(16, 1, 2, 12, '2'),
(25, 1, 1, 1, 'descripcion corte 2'),
(26, 1, 1, 2, 'material'),
(27, 1, 1, 3, '2'),
(28, 1, 1, 4, '100'),
(29, 1, 1, 5, 'on');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operations`
--

CREATE TABLE `operations` (
  `operation_id` int(11) NOT NULL,
  `operation_name` varchar(255) NOT NULL,
  `operation_user` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `operations`
--

INSERT INTO `operations` (`operation_id`, `operation_name`, `operation_user`, `created_at`, `updated_at`) VALUES
(1, 'Corte Laser CNC', 'administrator', '2024-04-03 21:20:59', '2024-04-03 21:31:10'),
(2, 'Dobles CNC', 'administrator', '2024-04-03 21:33:20', '2024-04-03 22:03:17'),
(4, 'Soldadura', 'administrator', '2024-04-05 00:03:43', '2024-04-05 00:03:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operation_custom_field`
--

CREATE TABLE `operation_custom_field` (
  `customfield_id` int(11) NOT NULL,
  `customfield_operation_id` int(11) NOT NULL,
  `customfield_label` varchar(255) NOT NULL,
  `customfield_name` varchar(255) NOT NULL,
  `customfield_type` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `customfield_user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `operation_custom_field`
--

INSERT INTO `operation_custom_field` (`customfield_id`, `customfield_operation_id`, `customfield_label`, `customfield_name`, `customfield_type`, `created_at`, `updated_at`, `customfield_user`) VALUES
(1, 1, 'Descripción del corte', 'descripcindelcorte', 'textarea', '2024-04-05 22:37:00', '2024-04-05 22:37:00', 'administrator'),
(2, 1, 'Material', 'material', 'text', '2024-04-05 22:40:12', '2024-04-05 22:40:12', 'administrator'),
(3, 1, 'Calibre', 'calibre', 'number', '2024-04-05 22:40:34', '2024-04-05 22:40:34', 'administrator'),
(4, 1, 'Cantidad', 'cantidad', 'number', '2024-04-05 22:40:43', '2024-04-05 22:40:43', 'administrator'),
(5, 1, 'Complejidad Alta', 'complejidadalta', 'checkbox', '2024-04-05 22:41:42', '2024-04-05 22:41:42', 'administrator'),
(6, 2, 'Soldadura MIG', 'soldaduramig', 'checkbox', '2024-04-09 07:10:33', '2024-04-09 07:10:33', 'administrator'),
(7, 2, 'Soldadura TIG', 'soldaduratig', 'checkbox', '2024-04-09 07:10:53', '2024-04-09 07:10:53', 'administrator'),
(8, 2, 'Soldadura Electrodo', 'soldaduraelectrodo', 'checkbox', '2024-04-09 07:11:06', '2024-04-09 07:11:06', 'administrator'),
(9, 2, 'Descripcion', 'descripcion', 'text', '2024-04-09 07:11:27', '2024-04-09 07:11:27', 'administrator'),
(10, 2, 'Material', 'material', 'text', '2024-04-09 07:11:42', '2024-04-09 07:11:42', 'administrator'),
(11, 2, 'Calibre', 'calibre', 'number', '2024-04-09 07:11:49', '2024-04-09 07:11:49', 'administrator'),
(12, 2, 'Cantidad', 'cantidad', 'number', '2024-04-09 07:11:56', '2024-04-09 07:11:56', 'administrator');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `operation_shared_fields`
--

CREATE TABLE `operation_shared_fields` (
  `shared_id` int(11) NOT NULL,
  `shared_project_id` int(11) NOT NULL,
  `shared_operation_id` int(11) NOT NULL,
  `hora_inicio` datetime DEFAULT NULL,
  `hora_termino` datetime DEFAULT NULL,
  `realizo` varchar(255) DEFAULT NULL,
  `reviso` varchar(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `entrego` varchar(255) DEFAULT NULL,
  `recibio` varchar(255) DEFAULT NULL,
  `hora_salida` datetime DEFAULT NULL,
  `hora_recibido` datetime DEFAULT NULL,
  `observaciones` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `operation_shared_fields`
--

INSERT INTO `operation_shared_fields` (`shared_id`, `shared_project_id`, `shared_operation_id`, `hora_inicio`, `hora_termino`, `realizo`, `reviso`, `fecha`, `entrego`, `recibio`, `hora_salida`, `hora_recibido`, `observaciones`) VALUES
(1, 1, 1, '2024-04-09 14:08:00', '2024-04-09 17:09:00', 'Realizo 2', 'Reviso', NULL, 'entrego', 'recibio', '2024-04-09 14:09:00', '2024-04-10 14:09:00', 'observaciones'),
(2, 1, 2, '2024-04-10 15:20:00', '2024-04-10 15:20:00', 'jgomezrealizocnc', 'jgomezrevisocnc', NULL, 'entregojgomezcnc', '', '2024-04-10 15:20:00', '2024-04-10 15:20:00', 'cnc observaciones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `projects`
--

CREATE TABLE `projects` (
  `project_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `user` varchar(58) NOT NULL,
  `installation_required` varchar(3) NOT NULL DEFAULT 'no',
  `area` varchar(255) NOT NULL,
  `qty` float NOT NULL,
  `date` date NOT NULL,
  `work_units` float NOT NULL,
  `approved_by` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `main_image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `project_status` varchar(25) NOT NULL DEFAULT 'Registrado' COMMENT 'Registrado;\r\nEn Espera;\r\nEn Proceso;\r\nTerminado;\r\nCancelado;'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `projects`
--

INSERT INTO `projects` (`project_id`, `client_id`, `project_name`, `user`, `installation_required`, `area`, `qty`, `date`, `work_units`, `approved_by`, `user_name`, `main_image`, `created_at`, `updated_at`, `project_status`) VALUES
(1, 1, 'Proyecto 1', 'jgomez', '1', 'area editada', 100, '2024-11-22', 100, 'supervisor', 'administrator', '8577c647231c0cabc7586987bbe03d56.png', '2024-04-04 04:46:24', '2024-04-04 07:40:31', 'Registrado'),
(2, 3, 'Proyecto 2', 'jgomez', '1', 'area', 200, '2024-05-07', 100, 'supervisor', 'administrator', 'project_1712212658.png', '2024-04-04 06:37:38', '2024-04-04 06:37:38', 'Registrado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_operation`
--

CREATE TABLE `project_operation` (
  `po_id` int(11) NOT NULL,
  `po_project_id` int(11) NOT NULL,
  `po_operation_id` int(11) NOT NULL,
  `po_order` int(11) NOT NULL DEFAULT 0,
  `po_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `project_operation`
--

INSERT INTO `project_operation` (`po_id`, `po_project_id`, `po_operation_id`, `po_order`, `po_user`) VALUES
(1, 1, 1, 0, 'administrator'),
(2, 1, 2, 1, 'administrator'),
(3, 1, 4, 2, 'administrator'),
(4, 2, 2, 1, 'administrator'),
(5, 2, 4, 0, 'administrator');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `shared_filled`
--

CREATE TABLE `shared_filled` (
  `sf_id` int(11) NOT NULL,
  `sf_shared_id` int(11) NOT NULL,
  `sf_data` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `is_admin`, `created_at`, `updated_at`) VALUES
(1, 'joseluis', 'jose.gomez@avantimanufacturing.com', '$2y$10$dXl1UWCbvdHYpbLo8TXbo.yHz5clXixmxfjNe/e1DpVqmrmbdraW.', 0, '2024-04-05 04:39:23', '2024-04-05 04:39:23'),
(2, 'administrator', 'admin@admin.com', '$2y$10$07kqsEdai95dj.OZE5deouhrvLNwCnphVpREWoJf.llndHzeHNLaa', 1, '2024-04-05 04:39:23', '2024-04-05 06:13:54'),
(3, 'german', 'german.torres@avantimanufacturing.com', '$2y$10$e7bIctHNHhfH5UHEBkQnHOJb71QRfEH1zl/rvPnjQKfInHFkmRdGm', 0, '2024-04-05 06:32:04', '2024-04-05 06:32:04');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indices de la tabla `custom_filled`
--
ALTER TABLE `custom_filled`
  ADD PRIMARY KEY (`cf_id`);

--
-- Indices de la tabla `operations`
--
ALTER TABLE `operations`
  ADD PRIMARY KEY (`operation_id`);

--
-- Indices de la tabla `operation_custom_field`
--
ALTER TABLE `operation_custom_field`
  ADD PRIMARY KEY (`customfield_id`);

--
-- Indices de la tabla `operation_shared_fields`
--
ALTER TABLE `operation_shared_fields`
  ADD PRIMARY KEY (`shared_id`);

--
-- Indices de la tabla `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`project_id`);

--
-- Indices de la tabla `project_operation`
--
ALTER TABLE `project_operation`
  ADD PRIMARY KEY (`po_id`);

--
-- Indices de la tabla `shared_filled`
--
ALTER TABLE `shared_filled`
  ADD PRIMARY KEY (`sf_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `uniq` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `custom_filled`
--
ALTER TABLE `custom_filled`
  MODIFY `cf_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `operations`
--
ALTER TABLE `operations`
  MODIFY `operation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `operation_custom_field`
--
ALTER TABLE `operation_custom_field`
  MODIFY `customfield_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `operation_shared_fields`
--
ALTER TABLE `operation_shared_fields`
  MODIFY `shared_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `projects`
--
ALTER TABLE `projects`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `project_operation`
--
ALTER TABLE `project_operation`
  MODIFY `po_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `shared_filled`
--
ALTER TABLE `shared_filled`
  MODIFY `sf_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
