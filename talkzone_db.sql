-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 21, 2025 at 02:59 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `talkzone_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `konseling`
--

CREATE TABLE `konseling` (
  `id` int NOT NULL,
  `konselor` varchar(255) NOT NULL,
  `topik_konseling` varchar(255) DEFAULT NULL,
  `durasi` int DEFAULT NULL,
  `deskripsi` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `konseling`
--

INSERT INTO `konseling` (`id`, `konselor`, `topik_konseling`, `durasi`, `deskripsi`, `created_at`) VALUES
(1, 'dr. Psikolog Maya Sari', 'Stres Kerja', 60, 'Konseling untuk mengatasi stres di lingkungan kerja.', '2025-11-21 14:26:23'),
(2, 'dr. Psikolog Budi Santoso', 'Hubungan', 60, 'Konseling untuk permasalahan dalam hubungan pribadi.', '2025-11-21 14:26:23'),
(3, 'dr. Psikolog Intan Permata', 'Kecemasan', 45, 'Konseling untuk mengelola gejala kecemasan.', '2025-11-21 14:26:23'),
(4, 'dr. Psikolog Agus Prasetyo', 'Depresi', 90, 'Konseling intensif untuk mengatasi depresi.', '2025-11-21 14:26:23');

-- --------------------------------------------------------

--
-- Table structure for table `konseling_registrasi`
--

CREATE TABLE `konseling_registrasi` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `konseling_id` int NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `status` enum('Terjadwal','Selesai','Dibatalkan') DEFAULT 'Terjadwal',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `konseling_registrasi`
--

INSERT INTO `konseling_registrasi` (`id`, `user_id`, `konseling_id`, `tanggal`, `waktu`, `status`, `created_at`) VALUES
(5, 2, 4, '2025-10-27', '10:48:00', 'Terjadwal', '2025-11-21 14:47:14'),
(6, 2, 3, '2025-11-04', '11:56:00', 'Terjadwal', '2025-11-21 14:55:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'justin@gmail.com', '$2y$10$.gZF6zODXIdtWicvlgD89OAjQwVW4X2NVWaGpSE4BEEuPse9N30Py'),
(2, 'michael.042@ski.sch.id', '$2y$10$qB5mRHZn5ZEoyorUTqao1O2Dha53FetQNpMgoRD.xp0d/36OSPkr.'),
(3, 'asas@gmail.com', '$2y$10$Hrzs9I0KxjyncOfv96SN9uyivwrtroRnHZSqFserXowo1ClgICvHa'),
(4, 'michael.0421@ski.sch.id', '$2y$10$0iXxosOBbNxqDfRjD2BT6Oc4YBVpLz0VpvCb7ISdEGvgTVBRio.Rm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `konseling`
--
ALTER TABLE `konseling`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `konseling_registrasi`
--
ALTER TABLE `konseling_registrasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `konseling_id` (`konseling_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `konseling`
--
ALTER TABLE `konseling`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `konseling_registrasi`
--
ALTER TABLE `konseling_registrasi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `konseling_registrasi`
--
ALTER TABLE `konseling_registrasi`
  ADD CONSTRAINT `konseling_registrasi_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `konseling_registrasi_ibfk_2` FOREIGN KEY (`konseling_id`) REFERENCES `konseling` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
