-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-09-2021 a las 19:17:22
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `php_m14`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `botigas`
--

CREATE TABLE `botigas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomBotiga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `capacitat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `botigas`
--

INSERT INTO `botigas` (`id`, `nomBotiga`, `capacitat`, `created_at`, `updated_at`) VALUES
(1, 'botiga1', '23', '2021-09-23 18:51:35', '2021-09-23 18:51:35'),
(2, 'botiga2', '89', '2021-09-25 03:46:49', '2021-09-25 03:46:49'),
(3, 'botiga1', '23', '2021-09-25 05:03:23', '2021-09-25 05:03:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_09_19_152655_create_botigas_table', 2),
(6, '2021_09_19_152818_create_quadres_table', 3),
(7, '2016_06_01_000001_create_oauth_auth_codes_table', 4),
(8, '2016_06_01_000002_create_oauth_access_tokens_table', 4),
(9, '2016_06_01_000003_create_oauth_refresh_tokens_table', 4),
(10, '2016_06_01_000004_create_oauth_clients_table', 4),
(11, '2016_06_01_000005_create_oauth_personal_access_clients_table', 4),
(12, '2021_09_25_140658_create_roles_table', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('619e0fb44a5828724a9f5e1d124c5d6ed50fef3074b96ccabce7be1663df1b85e6da21e018de8e73', 1, 3, 'Personal Access Token', '[]', 1, '2021-09-25 08:08:30', '2021-09-25 08:08:30', '2022-09-25 10:08:30'),
('83c9d291130f524b9b8179fdae74831307ea808533c0c8adebb612785f175e6bddca490c0a0bce2b', 1, 3, 'Personal Access Token', '[]', 0, '2021-09-25 08:19:23', '2021-09-25 08:19:23', '2022-09-25 10:19:23'),
('901b0353d681bc71509b8d8339c026ced787dcd22405bb506e48e6ada35798ce72cbcf03feeedd66', 1, 3, 'Personal Access Token', '[]', 0, '2021-09-25 08:33:46', '2021-09-25 08:33:46', '2022-09-25 10:33:46'),
('a392518331372b139c805e011bc1b670c3d05245117a94ea235fc51a5578a7ff4f7ab8d2e6c789be', 1, 3, 'Personal Access Token', '[]', 0, '2021-09-25 08:33:14', '2021-09-25 08:33:14', '2022-09-25 10:33:14'),
('cc1b8389a969be9ee264cf3e898d97593660b8dbeaf3fcdc6f88216c5077bd8fac3a5ea95b456508', 2, 3, 'Personal Access Token', '[]', 1, '2021-09-25 08:42:27', '2021-09-25 08:42:27', '2022-09-25 10:42:27'),
('cf48acb1ce346c1a9001eb43bcaeadec9b7e23313705867e40b4a25752518a676716a02dacc410e3', 2, 3, 'Personal Access Token', '[]', 0, '2021-09-25 08:40:06', '2021-09-25 08:40:06', '2022-09-25 10:40:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'gShPIXfxjRDbyLxtNO0lPQTAwmLbUprnStUbJXMT', NULL, 'http://localhost', 1, 0, 0, '2021-09-24 16:09:37', '2021-09-24 16:09:37'),
(2, NULL, 'Laravel Password Grant Client', '0TbfiRwl13GY58UFt8hR6HOTA1zwRTrn2NFyxzKq', 'users', 'http://localhost', 0, 1, 0, '2021-09-24 16:09:37', '2021-09-24 16:09:37'),
(3, NULL, 'Personal Access Token', 'nFxzBO2StDyX0C6n2n96nxsU7Sjwcie5I3v1Ig2p', NULL, 'http://localhost', 1, 0, 0, '2021-09-24 16:34:29', '2021-09-24 16:34:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-09-24 16:09:37', '2021-09-24 16:09:37'),
(2, 3, '2021-09-24 16:34:29', '2021-09-24 16:34:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `quadres`
--

CREATE TABLE `quadres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomAutor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `quadres`
--

INSERT INTO `quadres` (`id`, `nomAutor`, `preu`, `created_at`, `updated_at`) VALUES
(1, 'quadre1', '3000', '2021-09-25 03:32:00', '2021-09-25 03:32:00'),
(2, 'quadre2', '3400', '2021-09-25 03:32:12', '2021-09-25 03:32:12'),
(3, 'quadre3', '1003', '2021-09-25 03:41:38', '2021-09-25 03:41:38'),
(4, 'quadre4', '43204', '2021-09-25 04:08:13', '2021-09-25 04:08:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `user_id` int(11) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`user_id`, `role`) VALUES
(27, 'admin'),
(28, 'moderator'),
(29, 'basic');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'jose', 'jose@gmail.com', NULL, '$2y$10$8rdDRrwIyIVBg9XHo92fSOvT4b2GsSbMIwF8R4/dbIQO1lET7t2RW', NULL, '2021-09-25 08:08:18', '2021-09-25 08:08:18'),
(2, 'jose2', 'jose2@gmail.com', NULL, '$2y$10$zscasoS9Hi21SZk30wSFuunh9BPfMEPn/og6ZHHNE5G2oOlcDMxOG', NULL, '2021-09-25 08:40:06', '2021-09-25 08:40:06'),
(3, 'Ms. Whitney Rosenbaum IV', 'maida60@example.com', '2021-09-25 13:22:52', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'mfjFwChbnc', '2021-09-25 13:22:52', '2021-09-25 13:22:52'),
(4, 'Malvina Champlin Jr.', 'rosalinda.reynolds@example.com', '2021-09-25 13:22:52', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'JlVeiE4Yzd', '2021-09-25 13:22:53', '2021-09-25 13:22:53'),
(5, 'Prof. Melissa Rogahn', 'hauck.theresia@example.com', '2021-09-25 13:22:52', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '5ahJ8VSASj', '2021-09-25 13:22:53', '2021-09-25 13:22:53'),
(6, 'Jay Keebler DDS', 'gkihn@example.net', '2021-09-25 13:32:15', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'MYsHYo4Liv', '2021-09-25 13:32:15', '2021-09-25 13:32:15'),
(7, 'Haley Jones', 'alvena61@example.com', '2021-09-25 13:32:15', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'oOukM15Xtb', '2021-09-25 13:32:15', '2021-09-25 13:32:15'),
(8, 'Lauryn Prosacco', 'vance25@example.com', '2021-09-25 13:32:15', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'GCyEu4BS6U', '2021-09-25 13:32:15', '2021-09-25 13:32:15'),
(9, 'Mr. Torrance Lang', 'arlo88@example.org', '2021-09-25 13:44:24', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '3ZPWsSv48n', '2021-09-25 13:44:24', '2021-09-25 13:44:24'),
(10, 'Elza Medhurst MD', 'keebler.velda@example.com', '2021-09-25 13:44:24', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'X9G3UF2zjQ', '2021-09-25 13:44:24', '2021-09-25 13:44:24'),
(11, 'Laurianne Lehner', 'eldridge67@example.net', '2021-09-25 13:44:24', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'jsGtTQ4BPq', '2021-09-25 13:44:24', '2021-09-25 13:44:24'),
(12, 'Silas Toy', 'uondricka@example.net', '2021-09-25 13:49:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'AoG8vsT1Az', '2021-09-25 13:49:18', '2021-09-25 13:49:18'),
(13, 'Zane Powlowski', 'fhessel@example.com', '2021-09-25 13:49:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'swQc1XpN5V', '2021-09-25 13:49:18', '2021-09-25 13:49:18'),
(14, 'Tod Boyle', 'elda74@example.org', '2021-09-25 13:49:18', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '833aakUseD', '2021-09-25 13:49:19', '2021-09-25 13:49:19'),
(15, 'Selina Von', 'kariane.kuhic@example.com', '2021-09-25 13:52:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'n7w7GjlQvK', '2021-09-25 13:52:48', '2021-09-25 13:52:48'),
(16, 'Madge Ryan PhD', 'bheaney@example.com', '2021-09-25 13:52:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Ady6KfYLMW', '2021-09-25 13:52:48', '2021-09-25 13:52:48'),
(17, 'Mrs. Eulalia Krajcik Jr.', 'spencer.gust@example.com', '2021-09-25 13:52:48', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'UoQTrLTX0h', '2021-09-25 13:52:48', '2021-09-25 13:52:48'),
(18, 'Mikel Bailey', 'aullrich@example.org', '2021-09-25 13:53:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'CVgYvoVORv', '2021-09-25 13:53:59', '2021-09-25 13:53:59'),
(19, 'Armand Gleason', 'domingo.nolan@example.org', '2021-09-25 13:53:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'KlgZJKJv3s', '2021-09-25 13:53:59', '2021-09-25 13:53:59'),
(20, 'Dr. Pietro Gaylord', 'ynienow@example.com', '2021-09-25 13:53:59', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'KoTLWnKEar', '2021-09-25 13:53:59', '2021-09-25 13:53:59'),
(21, 'Dessie Witting', 'nyasia.berge@example.com', '2021-09-25 13:56:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'J38Ki7eyHc', '2021-09-25 13:56:17', '2021-09-25 13:56:17'),
(22, 'Mrs. Syble O\'Kon II', 'arne18@example.com', '2021-09-25 13:56:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'SFoewnXuO1', '2021-09-25 13:56:17', '2021-09-25 13:56:17'),
(23, 'Tianna Emmerich', 'camryn.mayer@example.net', '2021-09-25 13:56:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'VN5NoZRa5D', '2021-09-25 13:56:17', '2021-09-25 13:56:17'),
(24, 'Delphine Kovacek', 'jimmie39@example.org', '2021-09-25 13:57:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'dd7Ms35RjP', '2021-09-25 13:57:11', '2021-09-25 13:57:11'),
(25, 'Courtney Harber II', 'newell.kautzer@example.com', '2021-09-25 13:57:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'LX2gRV0ywd', '2021-09-25 13:57:13', '2021-09-25 13:57:13'),
(26, 'Jaqueline Daniel', 'walter.vivianne@example.net', '2021-09-25 13:57:11', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '4q6XE6KSBz', '2021-09-25 13:57:13', '2021-09-25 13:57:13'),
(27, 'Prof. Alene Brown', 'amani23@example.com', '2021-09-25 14:03:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '5fVKfiYVme', '2021-09-25 14:03:29', '2021-09-25 14:03:29'),
(28, 'Nadia Von', 'qfadel@example.org', '2021-09-25 14:03:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '7qbZ3YTJam', '2021-09-25 14:03:29', '2021-09-25 14:03:29'),
(29, 'Bernadette Kirlin', 'xlindgren@example.com', '2021-09-25 14:03:28', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ZwrdXiRJU8', '2021-09-25 14:03:29', '2021-09-25 14:03:29');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `botigas`
--
ALTER TABLE `botigas`
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
-- Indices de la tabla `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indices de la tabla `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indices de la tabla `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indices de la tabla `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `quadres`
--
ALTER TABLE `quadres`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`user_id`);

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
-- AUTO_INCREMENT de la tabla `botigas`
--
ALTER TABLE `botigas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `quadres`
--
ALTER TABLE `quadres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
