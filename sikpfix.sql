-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2021 at 02:20 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sikpfix`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `nidn` char(8) NOT NULL,
  `namaDosen` varchar(100) NOT NULL,
  `emailDosen` varchar(100) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`nidn`, `namaDosen`, `emailDosen`, `status`) VALUES
('11111111', 'Dosen Koor', 'louishalawa@gmail.com', 1),
('12222222', 'Dosen Biasa', 'louishalawa69@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kp`
--

CREATE TABLE `kp` (
  `idKp` int(2) NOT NULL,
  `idReg` int(2) DEFAULT NULL,
  `judul` varchar(200) DEFAULT NULL,
  `tools` varchar(200) DEFAULT NULL,
  `spesifikasi` varchar(200) DEFAULT NULL,
  `lembaga` varchar(30) DEFAULT NULL,
  `pimpinan` varchar(30) DEFAULT NULL,
  `noTelp` varchar(15) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `fax` varchar(15) DEFAULT NULL,
  `dokumenKp` varchar(12) DEFAULT NULL,
  `statusUjianKp` char(1) DEFAULT '0',
  `nidn` char(8) DEFAULT NULL,
  `pengajuanUjian` char(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` char(8) NOT NULL,
  `namaMhs` varchar(100) NOT NULL,
  `emailMhs` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `namaMhs`, `emailMhs`) VALUES
('72180204', 'RISTRI KRISNUGRAHENI', 'ristri.krisnugraheni@si.ukdw.ac.id'),
('72180233', 'LOUIS HAGA ALNOVEUS HALAWA', 'louis.alnoveus@si.ukdw.ac.id');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_05_06_144748_add_field_socialite_to_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `periode`
--

CREATE TABLE `periode` (
  `idPeriode` int(2) NOT NULL,
  `semester` varchar(5) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `mulaiKp` date DEFAULT NULL,
  `akhirKp` date NOT NULL,
  `aktif` char(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `periode`
--

INSERT INTO `periode` (`idPeriode`, `semester`, `tahun`, `mulaiKp`, `akhirKp`, `aktif`) VALUES
(10, 'Gasal', '2021', '2021-05-06', '2021-07-10', '1');

-- --------------------------------------------------------

--
-- Table structure for table `prakp`
--

CREATE TABLE `prakp` (
  `idPraKp` int(2) NOT NULL,
  `idReg` int(2) DEFAULT NULL,
  `judul` varchar(200) DEFAULT NULL,
  `tools` varchar(200) DEFAULT NULL,
  `spesifikasi` varchar(200) DEFAULT NULL,
  `lembaga` varchar(30) DEFAULT NULL,
  `pimpinan` varchar(30) DEFAULT NULL,
  `noTelp` varchar(15) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `fax` varchar(15) DEFAULT NULL,
  `dokumenPraKp` varchar(12) DEFAULT NULL,
  `statusPraKp` char(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `registrasi`
--

CREATE TABLE `registrasi` (
  `idReg` int(2) NOT NULL,
  `idPeriode` int(2) DEFAULT NULL,
  `nim` char(8) DEFAULT NULL,
  `semester` varchar(5) DEFAULT NULL,
  `tahun` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE `ruang` (
  `idRuang` int(2) NOT NULL,
  `namaRuang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`idRuang`, `namaRuang`) VALUES
(1, 'Didaktos'),
(2, 'Biblos'),
(3, 'Agape'),
(4, 'Hagios'),
(5, 'Chara');

-- --------------------------------------------------------

--
-- Table structure for table `surat`
--

CREATE TABLE `surat` (
  `idSurat` int(2) NOT NULL,
  `idReg` int(2) DEFAULT NULL,
  `lembaga` varchar(30) DEFAULT NULL,
  `pimpinan` varchar(30) DEFAULT NULL,
  `noTelp` varchar(15) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `fax` varchar(15) DEFAULT NULL,
  `dokumenSurat` varchar(12) DEFAULT NULL,
  `statusSurat` char(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ujian`
--

CREATE TABLE `ujian` (
  `idUjian` int(2) NOT NULL,
  `idRuang` int(2) DEFAULT NULL,
  `idKp` int(2) DEFAULT NULL,
  `nim` char(8) DEFAULT NULL,
  `nidn` char(8) DEFAULT NULL,
  `tglUjian` date DEFAULT NULL,
  `jamUjian` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `socialite_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `socialite_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `socialite_id`, `socialite_name`, `photo`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(9, NULL, NULL, 'https://lh3.googleusercontent.com/a-/AOh14Gi27KBLkn3_LFy6XxY69lL0fw9OkI3IwveHLpfaeQ=s96-c', 'Louis Halawa', 'louishalawa@gmail.com', NULL, NULL, 'nWYmr0WrbVvX4QOJjlrXagiFKoYiz3XVh83WIvdtJQqx3VikCvMJdHxIh6fz', '2021-05-05 14:08:41', '2021-05-05 14:08:41'),
(10, NULL, NULL, 'https://lh3.googleusercontent.com/a/AATXAJxFh6WU7qCXbP7rsxNP46WnwLR6K9ab1NgDwvei=s96-c', 'LOUIS HALAWA', 'louishalawa69@gmail.com', NULL, NULL, 'RUHqGDUeu3TKefAh2JPLHHdtc0Rdu4T90UD9MgqisycqbOjUWYCAmCwaxxNu', '2021-05-05 16:20:17', '2021-05-05 16:20:17'),
(11, NULL, NULL, 'https://lh3.googleusercontent.com/a-/AOh14GheHgUF5jYvswuJH0ui8w0lmX9VJPb1nCfEBo3erA=s96-c', 'LOUIS HAGA ALNOVEUS HALAWA', 'louis.alnoveus@si.ukdw.ac.id', NULL, NULL, '61D3XjBCYn79qUUgql8ZHMzvOmUa4vt1aiaIYuKCUyJfBxx58o4bw2Y5IlXq', '2021-05-05 17:35:52', '2021-05-05 17:35:52'),
(12, NULL, NULL, 'https://lh3.googleusercontent.com/a-/AOh14Gi5kLGKch_wFpNvPhG6NV0kKx_Re4kz-P4Qe-fP=s96-c', 'RISTRI KRISNUGRAHENI', 'ristri.krisnugraheni@si.ukdw.ac.id', NULL, NULL, 'ITisKAO6EQDRjBikDGUthujc9oBWtA6oR2DxW7PqlUUxYUKm2VGiLIqa5mvJ', '2021-05-09 23:57:11', '2021-05-09 23:57:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nidn`);

--
-- Indexes for table `kp`
--
ALTER TABLE `kp`
  ADD PRIMARY KEY (`idKp`),
  ADD KEY `FK_idRegistrasi_2` (`idReg`),
  ADD KEY `FK_nik_2` (`nidn`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`idPeriode`);

--
-- Indexes for table `prakp`
--
ALTER TABLE `prakp`
  ADD PRIMARY KEY (`idPraKp`),
  ADD KEY `FK_idRegistrasi` (`idReg`);

--
-- Indexes for table `registrasi`
--
ALTER TABLE `registrasi`
  ADD PRIMARY KEY (`idReg`),
  ADD KEY `FK_idPeriode` (`idPeriode`),
  ADD KEY `FK_nim` (`nim`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`idRuang`);

--
-- Indexes for table `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`idSurat`),
  ADD KEY `FK_idReg` (`idReg`);

--
-- Indexes for table `ujian`
--
ALTER TABLE `ujian`
  ADD PRIMARY KEY (`idUjian`),
  ADD KEY `FK_idRuang` (`idRuang`),
  ADD KEY `FK_idKp_2` (`idKp`),
  ADD KEY `FK_nim_3` (`nim`),
  ADD KEY `FK_nik` (`nidn`);

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
-- AUTO_INCREMENT for table `kp`
--
ALTER TABLE `kp`
  MODIFY `idKp` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
  MODIFY `idPeriode` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `prakp`
--
ALTER TABLE `prakp`
  MODIFY `idPraKp` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `registrasi`
--
ALTER TABLE `registrasi`
  MODIFY `idReg` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
  MODIFY `idRuang` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `surat`
--
ALTER TABLE `surat`
  MODIFY `idSurat` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `ujian`
--
ALTER TABLE `ujian`
  MODIFY `idUjian` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kp`
--
ALTER TABLE `kp`
  ADD CONSTRAINT `kp_ibfk_1` FOREIGN KEY (`nidn`) REFERENCES `dosen` (`nidn`),
  ADD CONSTRAINT `kp_ibfk_2` FOREIGN KEY (`idReg`) REFERENCES `registrasi` (`idReg`);

--
-- Constraints for table `prakp`
--
ALTER TABLE `prakp`
  ADD CONSTRAINT `prakp_ibfk_1` FOREIGN KEY (`idReg`) REFERENCES `registrasi` (`idReg`);

--
-- Constraints for table `registrasi`
--
ALTER TABLE `registrasi`
  ADD CONSTRAINT `registrasi_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`),
  ADD CONSTRAINT `registrasi_ibfk_2` FOREIGN KEY (`idPeriode`) REFERENCES `periode` (`idPeriode`);

--
-- Constraints for table `surat`
--
ALTER TABLE `surat`
  ADD CONSTRAINT `surat_ibfk_1` FOREIGN KEY (`idReg`) REFERENCES `registrasi` (`idReg`);

--
-- Constraints for table `ujian`
--
ALTER TABLE `ujian`
  ADD CONSTRAINT `ujian_ibfk_1` FOREIGN KEY (`idRuang`) REFERENCES `ruang` (`idRuang`),
  ADD CONSTRAINT `ujian_ibfk_2` FOREIGN KEY (`idKp`) REFERENCES `kp` (`idKp`),
  ADD CONSTRAINT `ujian_ibfk_3` FOREIGN KEY (`nidn`) REFERENCES `dosen` (`nidn`),
  ADD CONSTRAINT `ujian_ibfk_4` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
