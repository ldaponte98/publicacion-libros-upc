-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-05-2023 a las 02:41:47
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `publicacion-libros-upc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dominio`
--

CREATE TABLE `dominio` (
  `id` int(11) NOT NULL,
  `codigo` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `padre_id` int(11) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `dominio`
--

INSERT INTO `dominio` (`id`, `codigo`, `nombre`, `padre_id`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'AREA-CONOCIMIENTO', 'Área del conocimiento de la obra', NULL, 1, '2022-08-22 21:49:50', '2022-08-22 21:49:50'),
(2, NULL, 'Literatura', 1, 1, '2022-08-22 21:50:32', '2023-05-31 00:12:51'),
(3, '', 'Matematicas', 1, 1, '2022-08-22 21:50:32', '2022-08-22 21:50:32'),
(4, '', 'Sistemas informaticos', 1, 1, '2022-08-22 21:50:32', '2022-08-22 21:50:32'),
(5, 'SUBAREA-CONOCIMIENTO', 'Sub área del conocimiento de la obra', NULL, 1, '2022-08-22 21:51:05', '2022-08-22 21:51:05'),
(6, '', 'Investigativa', 5, 1, '2022-08-22 21:51:32', '2022-08-22 21:51:32'),
(7, '', 'Calculo diferencial', 5, 1, '2022-08-22 21:52:01', '2022-08-22 21:52:01'),
(8, '', 'Calculo multivariable', 5, 1, '2022-08-22 21:52:01', '2022-08-22 21:52:01'),
(9, '', 'Ingenieria de software', 5, 1, '2022-08-22 21:52:25', '2022-08-22 21:52:25'),
(10, 'PROGRAMAS-ACADEMICOS', 'Programas academicos', NULL, 1, '2023-05-27 19:03:41', '2023-05-27 19:03:41'),
(11, NULL, 'Administración de empresas', 10, 1, '2023-05-27 19:05:58', '2023-05-27 19:05:58'),
(12, 'FORMACIONES-ACADEMICAS', 'Formaciones académicas', NULL, 1, '2023-05-27 19:08:22', '2023-05-27 19:08:22'),
(13, 'Profesional', 'Profesional', 12, 1, '2023-05-27 19:11:11', '2023-05-27 19:11:11'),
(14, 'MUS', 'Musica', 1, 0, '2023-05-31 00:13:07', '2023-05-31 00:13:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `titulo` text COLLATE utf8_spanish_ci NOT NULL,
  `ruta` text COLLATE utf8_spanish_ci NOT NULL,
  `padre_id` int(11) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id`, `titulo`, `ruta`, `padre_id`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Mis publicaciones', 'publicacion/mis-publicaciones', NULL, 1, '2022-08-22 16:40:04', '2022-08-22 16:40:04'),
(2, 'Publicaciones docentes', 'publicacion/publicaciones-docentes', NULL, 1, '2022-10-18 15:11:40', '2022-10-18 15:11:40'),
(3, 'Publicaciones', 'publicacion/publicaciones-por-revisar', NULL, 1, '2022-10-18 16:12:11', '2022-10-18 16:12:11'),
(4, 'Gestion usuarios', 'usuario/listar', NULL, 1, '2023-05-27 15:16:13', '2023-05-27 15:16:13'),
(5, 'Variables del sistema', 'dominio/listar', NULL, 1, '2023-05-27 19:13:06', '2023-05-27 19:13:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_perfil`
--

CREATE TABLE `menu_perfil` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `perfil_id` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `menu_perfil`
--

INSERT INTO `menu_perfil` (`id`, `menu_id`, `perfil_id`, `estado`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, '2022-08-22 16:53:43', '2022-08-22 16:53:43'),
(2, 2, 1, 1, '2022-10-18 15:11:51', '2022-10-18 15:11:51'),
(3, 3, 3, 1, '2022-10-18 16:12:31', '2022-10-18 16:12:31'),
(4, 4, 1, 1, '2023-05-27 15:16:32', '2023-05-27 15:16:32'),
(5, 5, 1, 1, '2023-05-27 19:13:16', '2023-05-27 19:13:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id`, `nombre`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Comite editorial', 1, '2022-08-21 03:57:57', '2022-08-21 03:57:57'),
(2, 'Docente', 1, '2022-08-22 16:16:50', '2022-08-22 16:16:50'),
(3, 'Evaluador', 1, '2022-10-18 16:11:26', '2022-10-18 16:11:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion`
--

CREATE TABLE `publicacion` (
  `id` int(11) NOT NULL,
  `tercero_id` int(11) NOT NULL,
  `titulo_obra` text COLLATE utf8_spanish_ci NOT NULL,
  `id_dominio_area_conocimiento` int(11) NOT NULL,
  `id_dominio_subarea_conocimiento` int(11) NOT NULL,
  `id_dominio_programa_academico` int(11) NOT NULL,
  `formacion_academica` text COLLATE utf8_spanish_ci NOT NULL,
  `telefono` text COLLATE utf8_spanish_ci NOT NULL,
  `email` text COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `departamento` text COLLATE utf8_spanish_ci NOT NULL,
  `municipio` text COLLATE utf8_spanish_ci NOT NULL,
  `tipo_obra` text COLLATE utf8_spanish_ci NOT NULL,
  `libro_resultado_investigacion_nombre_proyecto` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `libro_resultado_investigacion_fuente` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `libro_resultado_investigacion_nombre_entidad` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `libro_resultado_investigacion_fecha_inicio` date DEFAULT NULL,
  `libro_resultado_investigacion_fecha_fin` date DEFAULT NULL,
  `libro_resultado_investigacion_tiempo_ejecucion` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `libro_resultado_investigacion_grupo_investigacion` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `libro_resultado_investigacion_linea_investigacion` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `libro_memorias_eventos_nombre_evento` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `libro_memorias_eventos_fecha_inicio` date DEFAULT NULL,
  `libro_memorias_eventos_fecha_fin` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `libro_memorias_eventos_nombre_organizadores` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `libro_memorias_eventos_grupo_investigacion_organizador` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipo_publico` text COLLATE utf8_spanish_ci NOT NULL,
  `formato_obra` text COLLATE utf8_spanish_ci NOT NULL,
  `num_paginas` int(11) NOT NULL,
  `num_graficos` int(11) NOT NULL,
  `num_fotos_blanco_negro` int(11) NOT NULL,
  `num_fotos_color` int(11) NOT NULL,
  `num_tablas_cuadros` int(11) NOT NULL,
  `obra_publicada_unicesar` text COLLATE utf8_spanish_ci NOT NULL,
  `obra_publicada_otra_editorial` text COLLATE utf8_spanish_ci NOT NULL,
  `obra_publicada_unicesar_solicitud_nueva_edicion` text COLLATE utf8_spanish_ci NOT NULL,
  `obra_publicada_unicesar_nueva_edicion_editorial_unicesar` text COLLATE utf8_spanish_ci NOT NULL,
  `obra_publicada_unicesar_formato_diferente` text COLLATE utf8_spanish_ci NOT NULL,
  `archivo_pdf` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `archivo_word` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `archivo_firma` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `observaciones` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `observaciones_rechazo_comite` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_usuario_rechaza_comite` int(11) DEFAULT NULL,
  `observaciones_rechazo_parents` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `id_usuario_rechaza_parents` int(11) DEFAULT NULL,
  `id_usuario_aprueba_comite` int(11) DEFAULT NULL,
  `id_usuario_aprueba_parents` int(11) DEFAULT NULL,
  `estado` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_envio_evaluador` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion_calificacion`
--

CREATE TABLE `publicacion_calificacion` (
  `id` int(11) NOT NULL,
  `publicacion_id` int(11) NOT NULL,
  `tercero_id` int(11) NOT NULL,
  `observaciones_fecha_entrega` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `observaciones_fecha_elaboracion` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `observaciones_fecha_recepcion_comite` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `evaluador_nombres` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `evaluador_fecha_nacimiento` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `evaluador_nacionalidad` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `evaluador_pais_nacimiento` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `evaluador_identificacion` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `evaluador_titulo_profesional` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `evaluador_institucion_expide` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `evaluador_nivel_formacion` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `evaluador_institucion_expide_nivel_formacion` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `evaluador_email` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `evaluador_telefono` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `evaluador_direccion` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `evaluador_ciudad` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `evaluador_pais` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `evaluador_institucion_vinculada` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `evaluador_cargo` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `evaluador_link` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipo_obra` text COLLATE utf8_spanish_ci NOT NULL,
  `brinda_aportes` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `unidad_conceptual` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `medida_objetivos` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `solidez` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `adecuacion_producto` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `aporte_pertenencia` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `adecuado_titulo` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `justificada_inclusion` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `estilo_concuerda` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `ortografia_redaccion` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `producto_fuentes_pertinentes` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `evidencia_exactitud` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `distinguir_aportes_autor` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `uso_adecuado_procedimientos` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `fuentes_pertinentes` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `producto_de_interes` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado_evaluacion` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado_evaluacion_final` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `recomendaciones` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `observaciones` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `archivo_firma` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `texto_responde_categoria` text COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion_persona`
--

CREATE TABLE `publicacion_persona` (
  `id` int(11) NOT NULL,
  `publicacion_id` int(11) NOT NULL,
  `tipo` text COLLATE utf8_spanish_ci NOT NULL,
  `nombres` text COLLATE utf8_spanish_ci NOT NULL,
  `telefono` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `departamento` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `municipio` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `actividad` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tercero`
--

CREATE TABLE `tercero` (
  `id` int(11) NOT NULL,
  `identificacion` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombres` text COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tercero`
--

INSERT INTO `tercero` (`id`, `identificacion`, `nombres`, `apellidos`, `email`, `estado`, `created_at`, `updated_at`) VALUES
(1, '1065843709', 'Luis Daniel', 'Aponte', 'ldaponte97@gmail.com', 1, '2022-08-21 03:58:41', '2023-05-31 00:34:07'),
(2, '1065843702', 'Docente', 'test2', 'ldaponte98@gmail.com', 1, '2022-10-18 15:01:01', '2022-10-18 15:01:01'),
(3, '1065843703', 'Parent 1', 'test 3', 'ldaponte98@gmail.com', 1, '2022-10-18 16:13:20', '2022-10-18 16:13:20'),
(4, '231234143', 'dsdfasdfasd', 'fsdfsdfa', 'ldaponte101@gmail.com', 1, '2023-05-27 16:30:01', '2023-05-27 16:30:01'),
(5, '231234143', 'dsdfasdfasd', 'fsdfsdfa', 'ldaponte101@gmail.com', 1, '2023-05-27 16:31:16', '2023-05-27 16:31:16'),
(6, '231234143', 'dsdfasdfasd', 'fsdfsdfa', 'ldaponte101@gmail.com', 1, '2023-05-27 16:33:23', '2023-05-27 16:33:23'),
(7, '231234143', 'dsdfasdfasd', 'fsdfsdfa', 'ldaponte101@gmail.com', 1, '2023-05-27 16:34:13', '2023-05-27 16:34:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `clave` text COLLATE utf8_spanish_ci NOT NULL,
  `perfil_id` int(11) NOT NULL,
  `tercero_id` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `clave`, `perfil_id`, `tercero_id`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'docente', '827ccb0eea8a706c4c34a16891f84e7b', 2, 1, 1, '2022-08-21 04:02:38', '2023-05-27 16:16:06'),
(2, 'comite', '827ccb0eea8a706c4c34a16891f84e7b', 1, 2, 1, '2022-10-18 15:01:59', '2022-10-18 15:01:59'),
(3, 'evaluador', '827ccb0eea8a706c4c34a16891f84e7b', 3, 3, 1, '2022-10-18 16:13:47', '2023-05-27 16:18:43');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `dominio`
--
ALTER TABLE `dominio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_dominio_padre` (`padre_id`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `menu_perfil`
--
ALTER TABLE `menu_perfil`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_perfil_menu` (`menu_id`),
  ADD KEY `menu_perfil_perfil` (`perfil_id`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `publicacion_calificacion`
--
ALTER TABLE `publicacion_calificacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `publicacion_persona`
--
ALTER TABLE `publicacion_persona`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tercero`
--
ALTER TABLE `tercero`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_perfil_pk` (`perfil_id`),
  ADD KEY `usuario_tercero_pk` (`tercero_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `dominio`
--
ALTER TABLE `dominio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `menu_perfil`
--
ALTER TABLE `menu_perfil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `publicacion_calificacion`
--
ALTER TABLE `publicacion_calificacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `publicacion_persona`
--
ALTER TABLE `publicacion_persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tercero`
--
ALTER TABLE `tercero`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `dominio`
--
ALTER TABLE `dominio`
  ADD CONSTRAINT `fk_dominio_padre` FOREIGN KEY (`padre_id`) REFERENCES `dominio` (`id`);

--
-- Filtros para la tabla `menu_perfil`
--
ALTER TABLE `menu_perfil`
  ADD CONSTRAINT `menu_perfil_menu` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`),
  ADD CONSTRAINT `menu_perfil_perfil` FOREIGN KEY (`perfil_id`) REFERENCES `perfil` (`id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_perfil_pk` FOREIGN KEY (`perfil_id`) REFERENCES `perfil` (`id`),
  ADD CONSTRAINT `usuario_tercero_pk` FOREIGN KEY (`tercero_id`) REFERENCES `tercero` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
