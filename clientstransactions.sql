-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2018 at 08:01 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clientstransactions`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `FirstName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LastName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'NULL',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `FirstName`, `LastName`, `email`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 'Vito Marquardt', 'Hilpert', 'leffler.marcelle@yahoo.com', 'NULL', NULL, NULL),
(2, 'Ewald McLaughlin', 'Kuhn', 'nichole.marks@stamm.com', 'NULL', NULL, NULL),
(3, 'Rhoda Weimann PhD', 'Blick', 'nquitzon@yahoo.com', 'NULL', NULL, NULL),
(4, 'Dr. Juanita Tromp', 'Vandervort', 'mose22@yahoo.com', 'NULL', NULL, NULL),
(7, 'Aliyah Braun', 'Macejkovic', 'hlangworth@okeefe.com', 'NULL', NULL, NULL),
(8, 'Prof. Jesus Wehner', 'Altenwerth', 'jacey70@schaden.info', 'NULL', NULL, NULL),
(9, 'Aliyah Treutel', 'West', 'vita.walter@hintz.net', 'NULL', NULL, NULL),
(10, 'Dr. Elda Orn', 'Torp', 'kconn@langworth.com', 'NULL', NULL, NULL),
(11, 'Ms. Patience Wiegand Jr.', 'Denesik', 'bobby.bauch@kohler.com', 'NULL', NULL, NULL),
(12, 'Carey Moore', 'Pfeffer', 'adeline27@hotmail.com', 'NULL', NULL, NULL),
(13, 'Addison Stanton PhD', 'Stehr', 'boyle.makenna@hotmail.com', 'NULL', NULL, NULL),
(14, 'Sydnie Reichert', 'VonRueden', 'crooks.deontae@hotmail.com', 'NULL', NULL, NULL),
(15, 'Ulices Lindgren', 'Brown', 'macejkovic.griffin@abshire.net', 'NULL', NULL, NULL),
(16, 'Delia Stoltenberg', 'Schuppe', 'leonardo.mueller@grady.com', 'NULL', NULL, NULL),
(17, 'Triston Marquardt', 'Kuhlman', 'crooks.bo@gibson.com', 'NULL', NULL, NULL),
(18, 'Selena Kuphal DDS', 'Gislason', 'jaleel.hirthe@gmail.com', 'NULL', NULL, NULL),
(19, 'Kianna Schuppe I', 'Hahn', 'gloria47@hotmail.com', 'NULL', NULL, NULL),
(20, 'Alysa Leannon', 'Morissette', 'davon44@schumm.com', 'NULL', NULL, NULL),
(21, 'Gudrun Schneider', 'Dickinson', 'pspinka@green.com', 'NULL', NULL, NULL),
(22, 'Dr. Seth Langosh', 'Feeney', 'bahringer.hope@hill.info', 'NULL', NULL, NULL),
(23, 'Roxane Grimes', 'Kreiger', 'simeon.tillman@strosin.com', 'NULL', NULL, NULL),
(24, 'Gia Lebsack', 'Metz', 'dallas17@gmail.com', 'NULL', NULL, NULL),
(25, 'Geraldine Treutel', 'Hudson', 'johnnie.kris@gmail.com', 'NULL', NULL, NULL),
(26, 'Dr. Juwan Heathcote', 'Baumbach', 'ibrahim.stroman@emmerich.net', 'NULL', NULL, NULL),
(27, 'Kailey Yost', 'Zboncak', 'oconnell.howell@nader.biz', 'NULL', NULL, NULL),
(28, 'Daniella Oberbrunner', 'Predovic', 'bkessler@beer.com', 'NULL', NULL, NULL),
(29, 'Sedrick Rutherford', 'Spencer', 'mertz.dameon@ritchie.info', 'NULL', NULL, NULL),
(30, 'Taryn Erdman Sr.', 'Hermiston', 'nickolas37@hotmail.com', 'NULL', NULL, NULL),
(31, 'Dr. Oscar Jacobson DDS', 'Dicki', 'ilueilwitz@kshlerin.org', 'NULL', NULL, NULL),
(32, 'Mr. Rodrick Kautzer I', 'Rohan', 'victor.oreilly@trantow.com', 'NULL', NULL, NULL),
(33, 'Dr. Odie Dach V', 'Muller', 'kamron53@hotmail.com', 'NULL', NULL, NULL),
(34, 'Elizabeth Wiza II', 'Terry', 'rodriguez.gwen@donnelly.com', 'NULL', NULL, NULL),
(35, 'Marisa West', 'Denesik', 'leila50@hotmail.com', 'NULL', NULL, NULL),
(36, 'Mr. Ottis Emmerich Jr.', 'Lakin', 'deckow.vicente@blick.com', 'NULL', NULL, NULL),
(37, 'Hertha Schowalter', 'Zboncak', 'hazel.cummerata@upton.org', 'NULL', NULL, NULL),
(38, 'Haven Harris', 'Gerhold', 'morar.charles@gottlieb.com', 'NULL', NULL, NULL),
(39, 'Florence Armstrong', 'Murphy', 'johnson76@yahoo.com', 'NULL', NULL, NULL),
(40, 'Wilfred Crist', 'Bailey', 'homenick.orville@yahoo.com', 'NULL', NULL, NULL),
(41, 'Prof. Sandy Carroll', 'Goldner', 'marquardt.glenda@moen.com', 'NULL', NULL, NULL),
(42, 'Lorenzo Hill', 'Stamm', 'hillard.carter@keeling.info', 'NULL', NULL, NULL),
(43, 'Prof. Sven Flatley DVM', 'Bailey', 'rosa73@littel.com', 'NULL', NULL, NULL),
(44, 'Prof. Casimir O\'Kon', 'Heathcote', 'pattie.brakus@mcclure.com', 'NULL', NULL, NULL),
(45, 'Ms. Patricia Leannon', 'Labadie', 'ferdman@gmail.com', 'NULL', NULL, NULL),
(46, 'Mrs. Sister Bergstrom', 'Osinski', 'dora79@yahoo.com', 'NULL', NULL, NULL),
(47, 'Prof. Dedric Kulas V', 'Murphy', 'verona.schimmel@dooley.info', 'NULL', NULL, NULL),
(48, 'Guillermo Herzog', 'Haag', 'josiane74@yahoo.com', 'NULL', NULL, NULL),
(49, 'Elfrieda Conn', 'Christiansen', 'mustafa38@yahoo.com', 'NULL', NULL, NULL),
(50, 'Adelia Schaefer DVM', 'Kulas', 'schimmel.webster@yahoo.com', 'NULL', NULL, NULL),
(51, 'Dr. Wava Conroy', 'Kassulke', 'kihn.kelli@beahan.com', 'NULL', NULL, NULL),
(52, 'Prof. Santa McGlynn III', 'Trantow', 'vdare@hintz.com', 'NULL', NULL, NULL),
(53, 'Gregoria Smith', 'Zemlak', 'kris.gordon@homenick.com', 'NULL', NULL, NULL),
(54, 'Delphia Sauer', 'Deckow', 'frosenbaum@yahoo.com', 'NULL', NULL, NULL),
(55, 'Prof. Drew Gaylord PhD', 'Macejkovic', 'wunsch.concepcion@witting.info', 'NULL', NULL, NULL),
(56, 'Lily Jenkins', 'Zieme', 'karlee.steuber@robel.com', 'NULL', NULL, NULL),
(57, 'Birdie Corwin', 'Gutmann', 'lucie.effertz@ferry.biz', 'NULL', NULL, NULL),
(58, 'Barrett Jaskolski', 'Willms', 'riley.flatley@lubowitz.com', 'NULL', NULL, NULL),
(59, 'Claude Hane', 'Gaylord', 'iblock@runolfsdottir.org', 'NULL', NULL, NULL),
(60, 'Enrique O\'Reilly', 'Berge', 'johnston.davion@klein.com', 'NULL', NULL, NULL),
(61, 'Demetrius Dach DDS', 'Reilly', 'pansy.douglas@streich.com', 'NULL', NULL, NULL),
(62, 'Josianne Bode', 'Hamill', 'crona.eloy@ruecker.com', 'NULL', NULL, NULL),
(63, 'Glennie Wehner', 'Nader', 'boyer.angeline@keeling.com', 'NULL', NULL, NULL),
(64, 'Kaley Nicolas', 'Hyatt', 'ustreich@gmail.com', 'NULL', NULL, NULL),
(65, 'Lera Bartoletti V', 'Rowe', 'king.arnold@gmail.com', 'NULL', NULL, NULL),
(66, 'Rosalinda Reynolds', 'Pouros', 'quinton.fisher@gmail.com', 'NULL', NULL, NULL),
(67, 'sd', 'sd', 'asdf@sdf.asd', 'sdfsdf', '2018-11-24 23:40:04', '2018-11-24 23:40:04'),
(68, 'ProvaClient', 'sdf', 'asdf@ASd.asd', 'NULL', '2018-11-26 01:38:52', '2018-11-26 01:38:52'),
(70, 'Prova Cliente 2', 'Prova Cliente 4', 'asdf@ASd.sdf', 'NULL', '2018-11-26 01:40:52', '2018-11-26 01:40:52'),
(72, 'Prova Cliente 3', 'Prova Cliente 4', 'asdf@dddd.sdf', '72_prova cliente 3_prova cliente 4.jpg', '2018-11-26 01:41:45', '2018-11-26 01:41:45'),
(73, 'prova 4', 'prova 5', 'asd@asd.asd', '73_prova 4_prova 5.jpg', '2018-11-26 01:43:38', '2018-11-26 01:43:38'),
(74, 'Fabio', 'Franchi', 'asd@asdf.asd', '74_fabio_franchi.jpg', '2018-11-26 01:45:26', '2018-11-26 01:45:26'),
(77, 'prova cliente 4', 'prova cliente 4', 'asdf@sdfasd.sdf', '77_prova cliente 4_prova cliente 4.jpg', '2018-11-26 01:53:58', '2018-11-26 01:53:58'),
(78, 'sdfsdf', 'sdfsdf', 'asdd@asdd.asd', '78_sdfsdf_sdfsdf.jpg', '2018-11-26 01:59:08', '2018-11-26 01:59:08'),
(80, 'prova cliente 3', 'prova cliente 3', 'asd@asdllf.asd', '80_prova cliente 3_prova cliente 3.jpg', '2018-11-26 02:05:51', '2018-11-26 02:05:51'),
(81, 'werwe', 'wewer', 'asdf@sdfasd.sd', '81_werwe_wewer.jpg', '2018-11-26 02:08:03', '2018-11-26 02:08:03'),
(82, 'sfsd2', 'fasdf4', 'asd@sdf.sd', '82_sfsd2_fasdf4.jpg', '2018-11-26 02:13:19', '2018-11-26 02:13:19'),
(89, 'sdfsdf', 'sdfsdf', 'asdf@asdf.asd', '89_sdfsdf_sdfsdf.jpg', '2018-11-26 06:56:28', '2018-11-26 06:56:28'),
(90, 'aaronne', 'aaronne', 'asdfasdf@asdf.sdf', '90_aaronne_aaronne.jpg', '2018-11-26 06:59:30', '2018-11-26 06:59:30');

-- --------------------------------------------------------

--
-- Table structure for table `copyusers`
--

CREATE TABLE `copyusers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` smallint(6) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(16, '2014_10_12_000000_create_users_table', 1),
(17, '2014_10_12_100000_create_password_resets_table', 1),
(18, '2018_11_21_121832_create_clients_table', 1),
(19, '2018_11_21_121951_create_transactions_table', 1),
(20, '2018_11_24_030446_update_transactions_table_add_new_foreignkey', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(10) UNSIGNED DEFAULT NULL,
  `amount` decimal(8,2) NOT NULL,
  `transaction_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `client_id`, `amount`, `transaction_date`, `created_at`, `updated_at`) VALUES
(1, 1, '87.00', '2018-06-07 02:50:13', NULL, NULL),
(2, 9, '81.00', '1979-08-11 23:31:35', NULL, NULL),
(3, 23, '63.00', '1992-02-04 18:36:40', NULL, NULL),
(4, 2, '93.00', '1972-09-08 02:59:54', NULL, NULL),
(5, 18, '56.00', '1979-08-31 00:41:16', NULL, NULL),
(6, 18, '71.00', '2007-03-12 01:38:39', NULL, NULL),
(7, 23, '60.00', '1994-11-13 12:21:53', NULL, NULL),
(8, 7, '57.00', '1983-07-10 01:16:50', NULL, NULL),
(9, 15, '68.00', '2006-05-29 18:07:01', NULL, NULL),
(10, 13, '66.00', '2010-04-19 18:21:44', NULL, NULL),
(12, 4, '98.00', '1971-07-18 09:07:25', NULL, NULL),
(14, 14, '68.00', '1972-11-16 11:57:17', NULL, NULL),
(15, 14, '86.00', '2000-01-22 16:12:47', NULL, NULL),
(16, 11, '79.00', '1972-03-18 05:09:40', NULL, NULL),
(17, 16, '98.00', '2016-04-29 15:10:34', NULL, NULL),
(18, 7, '80.00', '1998-05-09 21:45:57', NULL, NULL),
(19, 10, '58.00', '1973-06-01 09:02:10', NULL, NULL),
(20, 17, '87.00', '1970-03-04 13:45:50', NULL, NULL),
(21, 8, '91.00', '2006-01-14 03:09:33', NULL, NULL),
(22, 21, '81.00', '1996-03-06 10:39:44', NULL, NULL),
(23, 3, '60.00', '1987-03-05 06:21:08', NULL, NULL),
(24, 14, '53.00', '2017-04-27 03:57:04', NULL, NULL),
(25, 10, '80.00', '1971-10-20 03:35:12', NULL, NULL),
(26, 8, '77.00', '2014-07-03 12:43:37', NULL, NULL),
(27, 2, '78.00', '1989-01-03 08:35:00', NULL, NULL),
(28, 4, '55.00', '1970-12-24 20:31:35', NULL, NULL),
(29, 9, '65.00', '1996-09-25 08:38:30', NULL, NULL),
(31, 12, '95.00', '1971-10-22 04:43:11', NULL, NULL),
(32, 15, '60.00', '1975-07-11 14:14:54', NULL, NULL),
(33, 4, '55.00', '1995-08-01 05:34:06', NULL, NULL),
(34, NULL, '88.77', '2018-11-17 00:00:00', '2018-11-26 06:33:38', '2018-11-26 06:33:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` smallint(6) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'William Armillei', 'admin@admin.com', '$2y$10$dZBs2XCupu3zUPKePNv.nO2l4hpG.tHwH71giztSjdf1NM0MNLnm2', 1, 'ScQU5axQ3IxffsFzkEkhdKnp4dmxteJJBoF4FQHxIsDkXMZcS9e3Y584K0xK', '2018-11-24 10:11:18', '2018-11-24 10:11:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_email_unique` (`email`);

--
-- Indexes for table `copyusers`
--
ALTER TABLE `copyusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clients_user_id_foreign` (`client_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `copyusers`
--
ALTER TABLE `copyusers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `clients_user_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `clients` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
