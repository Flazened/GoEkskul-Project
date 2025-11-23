-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 15, 2025 at 05:09 PM
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
-- Database: `goekskul_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `extracurriculars`
--

CREATE TABLE `extracurriculars` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `day` varchar(20) DEFAULT NULL,
  `time` varchar(50) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `instructor_name` varchar(100) DEFAULT NULL,
  `instructor_photo` varchar(255) DEFAULT NULL,
  `activity_photo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `extracurriculars`
--

INSERT INTO `extracurriculars` (`id`, `name`, `category`, `day`, `time`, `location`, `instructor_name`, `instructor_photo`, `activity_photo`) VALUES
(1, 'NIHONGO CLUB', 'BAHASA', 'Senin', '15.00 - 16.00 WIB', 'Ruang Kelas X BiD', 'Emilia Fontaine', '../../../Images/Person-Photo/Person-19.jpg', '../../../Images/Ekskul-Photo/nihon.jpg'),
(2, 'HANGUL CLUB', 'BAHASA', 'Senin', '15.00 - 16.30 WIB', 'Ruang Kelas XI TKJ 3', 'Henrik Olsen', '../../../Images/Person-Photo/Person-21.jpg', '../../../Images/Ekskul-Photo/hangul.jpg'),
(3, 'CHINESE CLUB', 'BAHASA', 'Selasa', '15.00 - 16.00 WIB', 'Lab Komputer Lt. 2', 'Lin Xia', '../../../Images/Person-Photo/Person-20.jpg', '../../../Images/Ekskul-Photo/chinese.jpg'),
(4, 'ENGLISH CLUB', 'BAHASA', 'Selasa', '15.00 - 17.00 WIB', 'Ruang Kelas XI TKJ 1', 'Sophia Andersson', '../../../Images/Person-Photo/Person-3.jpg', '../../../Images/Ekskul-Photo/english.jpg'),
(5, 'TAEKWONDO', 'BELA DIRI', 'Sabtu', '07.00 - 08.00 WIB', 'Aula Sekolah', 'Oliver Grant', '../../../Images/Person-Photo/Person-26.jpg', '../../../Images/Ekskul-Photo/taekwondo.jpg'),
(6, 'KARATE', 'BELA DIRI', 'Sabtu', '07.30 - 08.30 WIB', 'Lobby Sekolah', 'Alexander Moreau', '../../../Images/Person-Photo/Person-24.jpg', '../../../Images/Ekskul-Photo/karate.jpg'),
(7, 'BEVERAGE & BARISTA', 'CULINARY CLUB', 'Selasa', '15.00 - 16.00 WIB', 'Cafe Lab', 'Arthur Bennett', '../../../Images/Person-Photo/Person-22.jpg', '../../../Images/Ekskul-Photo/barista.jpg'),
(8, 'BAKING & PASTRY', 'CULINARY CLUB', 'Kamis', '15.00 - 16.00 WIB', 'Kitchen Studio', 'Marianne Keller', '../../../Images/Person-Photo/Person-30.jpg', '../../../Images/Ekskul-Photo/baking.jpg'),
(9, 'COOKING & CULINARY ARTS', 'CULINARY CLUB', 'Rabu', '14.00 - 15.00 WIB', 'Kitchen Studio', 'Greta Lindstrom', '../../../Images/Person-Photo/Person-23.jpg', '../../../Images/Ekskul-Photo/culinary.jpg'),
(10, 'ACCOUNTING CLUB', 'ECONOMY BUSINESS', 'Sabtu', '08.00 - 10.00 WIB', 'Ruang Kelas XII AKL 1', 'Elena Petrova', '../../../Images/Person-Photo/Person-17.jpg', '../../../Images/Ekskul-Photo/accounting.jpg'),
(11, 'BUSINESS INNOVATION CLUB', 'ECONOMY BUSINESS', 'Rabu', '18.00 - 19.00 WIB', 'Online Meeting', 'Marcus Romano', '../../../Images/Person-Photo/Person-28.jpg', '../../../Images/Ekskul-Photo/business.jpg'),
(12, 'DIGITAL MARKETING CLUB', 'ECONOMY BUSINESS', 'Kamis', '15.00 - 17.00 WIB', 'Ruang Kelas XI BiD', 'Marianne Keller', '../../../Images/Person-Photo/Person-30.jpg', '../../../Images/Ekskul-Photo/digital_marketing.jpg'),
(13, 'MOBILE LEGENDS ESPORTS', 'ESPORTS', 'Kamis', '15.00 - 16.00 WIB', 'Ruang Esports MLBB', 'Nathan Brooks', '../../../Images/Person-Photo/Person-25.jpg', '../../../Images/Ekskul-Photo/ml.png'),
(14, 'VALORANT ESPORTS', 'ESPORTS', 'Jumat', '14.00 - 15.00 WIB', 'Ruang Esports VL', 'Ethan Walker', '../../../Images/Person-Photo/Person-27.jpg', '../../../Images/Ekskul-Photo/valorant.png'),
(15, 'FINANCE & INVESTMENT CLUB', 'FINANCE', 'Senin', '18.00 - 20.00 WIB', 'Online Meeting', 'Dimitri Volkov', '../../../Images/Person-Photo/Person-12.jpg', '../../../Images/Ekskul-Photo/web.jpg'),
(16, 'STOCK & TRADING CLUB', 'FINANCE', 'Selasa', '15.00 - 16.30 WIB', 'Ruang Kelas X TKJ 2', 'Henrik Olsen', '../../../Images/Person-Photo/Person-21.jpg', '../../../Images/Ekskul-Photo/it.jpg'),
(17, 'TAX & AUDIT CLUB', 'FINANCE', 'Kamis', '17.00 - 19.00 WIB', 'Online Meeting', 'Adrian Novak', '../../../Images/Person-Photo/Person-5.jpg', '../../../Images/Ekskul-Photo/cyber.jpg'),
(18, 'WEB TECHNOLOGIES', 'IT CLUB', 'Rabu', '14.30 - 16.00 WIB', 'Ruang Kelas XI TKJ 3', 'Nora Schmidt', '../../../Images/Person-Photo/Person-6.jpg', '../../../Images/Ekskul-Photo/web.jpg'),
(19, 'IT SOFTWARE', 'IT CLUB', 'Senin', '15.00 - 16.30 WIB', 'Ruang Kelas XI TKJ 3', 'Joseph Raymond', '../../../Images/Person-Photo/Person-14.jpg', '../../../Images/Ekskul-Photo/it.jpg'),
(20, 'CYBER SECURITY', 'IT CLUB', 'Selasa', '15.00 - 16.00 WIB', 'Lab Komputer Lt. 2', 'Ricky Martinez', '../../../Images/Person-Photo/Person-15.jpg', '../../../Images/Ekskul-Photo/cyber.jpg'),
(21, '3D MODELING', 'IT CLUB', 'Selasa', '15.00 - 17.00 WIB', 'Ruang Kelas XI TKJ 1', 'William Jensen', '../../../Images/Person-Photo/Person-11.jpg', '../../../Images/Ekskul-Photo/3d.jpg'),
(22, 'DESAIN GRAFIS', 'IT CLUB', 'Kamis', '14.30 - 16.00 WIB', 'Ruang Kelas XI TKJ 3', 'William Jensen', '../../../Images/Person-Photo/Person-11.jpg', '../../../Images/Ekskul-Photo/design.jpg'),
(23, 'ROBOTIC', 'IT CLUB', 'Rabu', '14.30 - 15.30 WIB', 'Lab Robotic', 'Ricky Martinez', '../../../Images/Person-Photo/Person-15.jpg', '../../../Images/Ekskul-Photo/robotic.jpg'),
(24, 'BROADCASTING CLUB', 'MEDIA KREATIF', 'Rabu', '14.30 - 16.00 WIB', 'Studio Sekolah', 'Beatrice Collins', '../../../Images/Person-Photo/Person-29.jpg', '../../../Images/Ekskul-Photo/broadcast.jpg'),
(25, 'PHOTOGRAPHY', 'MEDIA KREATIF', 'Senin', '15.00 - 16.30 WIB', 'Studio Sekolah', 'Leonardo Voss', '../../../Images/Person-Photo/Person-16.jpg', '../../../Images/Ekskul-Photo/photography.jpg'),
(26, 'FILM PENDEK', 'MEDIA KREATIF', 'Rabu', '14.30 - 15.30 WIB', 'Lab Robotic', 'Lukas Moretti', '../../../Images/Person-Photo/Person-7.jpg', '../../../Images/Ekskul-Photo/film_pendek.jpg'),
(27, 'BILLIARD CLUB', 'MIND SPORTS', 'Sabtu', '08.00 - 09.00 WIB', 'Billiard\'s Hall', 'Dimitri Volkov', '../../../Images/Person-Photo/Person-12.jpg', '../../../Images/Ekskul-Photo/billiard.jpg'),
(28, 'RUBIK\'S CUBE CLUB', 'MIND SPORTS', 'Selasa', '16.00 - 17.00 WIB', 'Studio Sekolah', 'Joseph Raymond', '../../../Images/Person-Photo/Person-14.jpg', '../../../Images/Ekskul-Photo/rubik.jpg'),
(29, 'CHESS CLUB', 'MIND SPORTS', 'Jumat', '13.00 - 14.00 WIB', 'Ruang Kelas XII TKJ 2', 'Leonardo Voss', '../../../Images/Person-Photo/Person-16.jpg', '../../../Images/Ekskul-Photo/chess.png'),
(30, 'BASKET CLUB', 'OLAHRAGA', 'Selasa', '17.00 - 20.00 WIB', 'Lapangan Basket', 'Alex Fischer', '../../../Images/Person-Photo/Person-2.jpg', '../../../Images/Ekskul-Photo/basket.jpg'),
(31, 'BADMINTON', 'OLAHRAGA', 'Kamis', '15.00 - 17.00 WIB', 'Lapangan Badminton', 'Julien Laurent', '../../../Images/Person-Photo/Person-10.jpg', '../../../Images/Ekskul-Photo/badminton.jpg'),
(32, 'FUTSAL', 'OLAHRAGA', 'Selasa', '18.00 - 20.00 WIB', 'Lapangan Futsal', 'Lukas Moretti', '../../../Images/Person-Photo/Person-7.jpg', '../../../Images/Ekskul-Photo/futsal.jpg'),
(33, 'VOLI', 'OLAHRAGA', 'Jumat', '15.00 - 18.00 WIB', 'Lapangan Voli', 'Victor Hansen', '../../../Images/Person-Photo/Person-9.jpg', '../../../Images/Ekskul-Photo/voli.jpg'),
(34, 'RENANG', 'OLAHRAGA', 'Jumat', '15.00 - 17.00 WIB', 'Kolam Renang Sekolah', 'Adrian Novak', '../../../Images/Person-Photo/Person-5.jpg', '../../../Images/Ekskul-Photo/renang.jpg'),
(35, 'TENIS MEJA', 'OLAHRAGA', 'Jumat', '14.00 - 16.00 WIB', 'Lobby Sekolah', 'Alex Fischer', '../../../Images/Person-Photo/Person-2.jpg', '../../../Images/Ekskul-Photo/tenis_meja.jpg'),
(36, 'SCIENCE INNOVATORS CLUB', 'SAINS', 'Kamis', '15.00 - 16.00 WIB', 'Laboratorium Sekolah', 'Lin Xia', '../../../Images/Person-Photo/Person-20.jpg', '../../../Images/Ekskul-Photo/science.jpg'),
(37, 'ASTRONOVA CLUB', 'SAINS', 'Sabtu', '09.00 - 11.00 WIB', 'Ruang Astronomi', 'Katarina Novakova', '../../../Images/Person-Photo/Person-8.jpg', '../../../Images/Ekskul-Photo/astro.jpg'),
(38, 'TARI TRADISIONAL', 'SENI', 'Kamis', '15.00 - 16.00 WIB', 'Aula Sekolah', 'Clara Rossi', '../../../Images/Person-Photo/Person-4.jpg', '../../../Images/Ekskul-Photo/tari_tradisional.jpg'),
(39, 'MODERN DANCE', 'SENI', 'Rabu', '15.00 - 16.00 WIB', 'Aula Sekolah', 'Anna Weiss', '../../../Images/Person-Photo/Person-18.jpg', '../../../Images/Ekskul-Photo/modern_dance.jpg'),
(40, 'BAND', 'SENI', 'Sabtu', '08.00 - 10.00 WIB', 'Studio Sekolah', 'Ricky Martinez', '../../../Images/Person-Photo/Person-15.jpg', '../../../Images/Ekskul-Photo/band.jpg'),
(41, 'PADUAN SUARA', 'SENI', 'Sabtu', '09.00 - 10.00 WIB', 'Aula Sekolah', 'Clara Rossi', '../../../Images/Person-Photo/Person-4.jpg', '../../../Images/Ekskul-Photo/paduan_suara.jpg'),
(42, 'TEATER', 'SENI', 'Jumat', '17.00 - 19.00 WIB', 'Aula Sekolah', 'Anna Weiss', '../../../Images/Person-Photo/Person-18.jpg', '../../../Images/Ekskul-Photo/teater.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `extracurricular_registrations`
--

CREATE TABLE `extracurricular_registrations` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `extracurricular_id` int NOT NULL,
  `registration_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `status` enum('pending','approved','rejected') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `extracurricular_registrations`
--

INSERT INTO `extracurricular_registrations` (`id`, `user_id`, `extracurricular_id`, `registration_date`, `status`) VALUES
(1, 1, 30, '2025-11-14 21:43:52', 'pending'),
(3, 14, 21, '2025-11-14 22:31:31', 'approved'),
(5, 14, 3, '2025-11-14 23:21:55', 'approved'),
(6, 14, 4, '2025-11-14 23:22:02', 'approved'),
(8, 14, 31, '2025-11-14 23:23:39', 'approved'),
(9, 14, 13, '2025-11-15 09:53:20', 'approved'),
(11, 16, 3, '2025-11-15 15:28:51', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `kata_sandi` varchar(255) NOT NULL,
  `tanggal_daftar` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama_lengkap`, `kelas`, `email`, `kata_sandi`, `tanggal_daftar`) VALUES
(1, 'Michael', 'XI TKJ 3', 'michael@gmail.com', '$2y$10$fvbIx7cSt0bwJM7l741Aaew9gX/bvqi0WjFKGCW0M/3LcxgQ26lOq', '2025-10-28 17:36:25'),
(2, 'Vincent Genesius', 'XI TKJ 3', 'Vincent@ski.sch.id', '$2y$10$xFAbbb4U3a.b3IMi5xheo.IlZkJ/TMLq0Gk.B22ff.Hof5teUMWeK', '2025-10-29 18:09:02'),
(4, 'williamhitamnigga', 'XI TKJ 3', 'williamnigger@gmail.com', '$2y$10$2b2z6gIYvFfPUUmeAtMzOuH/Bk3U24DrNBengg0yYvhLup8yBfggS', '2025-11-06 01:51:16'),
(5, 'William', 'XI TKJ 2', 'williamatom@gmail.com', '$2y$10$99.zEO.c3BrEXBBLpNvVb.5hXZtRzgVQkP01qp9PuOYO5sQ5uAqVK', '2025-11-06 02:06:36'),
(6, 'test', 'test', 'test@gmail.com', '$2y$10$7DXYkzIjhhtAaVjyxHUvRedQqS4B2Jzwpf.ak3IU6lQNPSmeS5bkm', '2025-11-06 02:49:34'),
(7, 'Justin', 'XI TKJ 2', 'justin@gmail.com', '$2y$10$QnkG6ASkChrlxd56m6QOGeeoClqHYYeRphNRF9hWfaxD2mtJIORiO', '2025-11-06 11:31:41'),
(8, 'JoseNiggero', 'XII TKJ 9', 'JoseNiggero@gmail.com', '$2y$10$SUn7uImBc2qwpOIXTbYLEOsu1RkfsliLdDcujgg0Xqz1IZ.m1GSq6', '2025-11-07 03:47:54'),
(9, 'LewisGay', 'Gay Banget Jir', 'lewisantiedigay@gmail.com', '$2y$10$pXb/w0N7wIX4G1mtfwcKEuXasnmuvZvamolqmVvfzsQvUJT0UaPvi', '2025-11-07 03:49:15'),
(11, 'admin', 'admin', 'admin@gmail.com', '$2y$10$dIEc2b5yR4azs7..Wgc0O.2mgswaIlh56OB1CufpuxRR41A4lR/X2', '2025-11-13 15:40:58'),
(13, 'Guru', 'guru', 'tutorialguru@gmail.com', '$2y$10$Aayu6P4XET9VOPlTxMjOLuWMz2qxhsr3kf986uEvLQVXmtQiPZm4.', '2025-11-14 03:34:10'),
(14, 'sadadas', 'XI TKJ 3', 'A@gmail.com', '$2y$10$q0KgHCeUyivY8zrKPoegduxHPvGApueuwi1zkuPJ4vRhdoqWD6Rb6', '2025-11-14 03:34:50'),
(15, 'asda', 'admin', 'b@gmail.com', '$2y$10$A.TawX1UgDkn.HfTvdFHaObgqrsw0Op4ERZUVtZs6yLs8xhBsCsjy', '2025-11-14 03:35:32'),
(16, 'Gurusadsadasd', 'guru', 'guruguru@gmail.com', '$2y$10$vyLhFCs4ZgaXtUPKe.hrCuXcOIO8Tg6pc139y32BZSU5vkHndkdi.', '2025-11-14 03:56:07'),
(17, 'Asma', 'XI TKJ 1', 'Asma@gmail.com', '$2y$10$VZb410tszdAiuUfmnYb1deMAiKumswe42joLUDUBaQjdSgc9nib5S', '2025-11-15 02:54:22'),
(18, 'Alex Fischer', 'guru', 'AlexFischer.012@ski.sch.id', '$2y$10$L1st4cxDOAqESm8fH4vGPuckhF6n821IVYLvcpsJSM.GZGQXdUtC2', '2025-11-15 09:09:51'),
(19, 'Vincent Geneius', 'XI TKJ 3', 'Vincent.045@ski.sch.id', '$2y$10$2pgUw8L1scchLeYcIhEuEuuY3xoAVJ.DZEOq97RZM1z4paaSEPWOK', '2025-11-15 09:10:53'),
(20, 'George', 'admin', 'George.999@ski.sch.id', '$2y$10$xry.Fja/kf22wEnBfrD2uui/Ov2UB8q77B2adoJ6H2U93OINonXXG', '2025-11-15 09:14:23'),
(21, 'Sigmabosda', 'XI TKJ 2', 'sadasdasb@gmail.cm', '$2y$10$VlpNQ7rg29WHSdf79FKWOOMGnHOpT76h1Y3k/rwXyoDcm2uH0trrW', '2025-11-15 16:55:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `extracurriculars`
--
ALTER TABLE `extracurriculars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extracurricular_registrations`
--
ALTER TABLE `extracurricular_registrations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `extracurricular_id` (`extracurricular_id`);

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
-- AUTO_INCREMENT for table `extracurriculars`
--
ALTER TABLE `extracurriculars`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `extracurricular_registrations`
--
ALTER TABLE `extracurricular_registrations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `extracurricular_registrations`
--
ALTER TABLE `extracurricular_registrations`
  ADD CONSTRAINT `extracurricular_registrations_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `extracurricular_registrations_ibfk_2` FOREIGN KEY (`extracurricular_id`) REFERENCES `extracurriculars` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
