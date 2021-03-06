-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Bulan Mei 2021 pada 07.40
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sikp_uas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `nidn` char(8) NOT NULL,
  `namaDosen` varchar(100) NOT NULL,
  `emailDosen` varchar(100) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`nidn`, `namaDosen`, `emailDosen`, `status`) VALUES
('11111111', 'Dosen Koor', 'louis.halawa@students.ukdw.ac.id', 1),
('12222222', 'Dosen Biasa', 'ristri.krisnugraheni@students.ukdw.ac.id', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kp`
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
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` char(8) NOT NULL,
  `namaMhs` varchar(100) NOT NULL,
  `emailMhs` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `namaMhs`, `emailMhs`) VALUES
('72180204', 'RISTRI KRISNUGRAHENI', 'ristri.krisnugraheni@si.ukdw.ac.id');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_05_06_144748_add_field_socialite_to_users_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `periode`
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
-- Dumping data untuk tabel `periode`
--

INSERT INTO `periode` (`idPeriode`, `semester`, `tahun`, `mulaiKp`, `akhirKp`, `aktif`) VALUES
(10, 'Gasal', '2021', '2021-05-06', '2021-07-10', '0'),
(11, 'Genap', '2021', '2021-05-31', '2021-05-31', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prakp`
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
-- Struktur dari tabel `registrasi`
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
-- Struktur dari tabel `ruang`
--

CREATE TABLE `ruang` (
  `idRuang` int(2) NOT NULL,
  `namaRuang` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ruang`
--

INSERT INTO `ruang` (`idRuang`, `namaRuang`) VALUES
(1, 'Didaktos'),
(2, 'Biblos'),
(3, 'Agape'),
(4, 'Hagios'),
(5, 'Chara');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat`
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
-- Struktur dari tabel `ujian`
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
-- Struktur dari tabel `users`
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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `socialite_id`, `socialite_name`, `photo`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(9, NULL, NULL, 'https://lh3.googleusercontent.com/a-/AOh14Gi27KBLkn3_LFy6XxY69lL0fw9OkI3IwveHLpfaeQ=s96-c', 'Louis Halawa', 'louishalawa@gmail.com', NULL, NULL, 'nWYmr0WrbVvX4QOJjlrXagiFKoYiz3XVh83WIvdtJQqx3VikCvMJdHxIh6fz', '2021-05-05 14:08:41', '2021-05-05 14:08:41'),
(10, NULL, NULL, 'https://lh3.googleusercontent.com/a/AATXAJxFh6WU7qCXbP7rsxNP46WnwLR6K9ab1NgDwvei=s96-c', 'LOUIS HALAWA', 'louishalawa69@gmail.com', NULL, NULL, 'RUHqGDUeu3TKefAh2JPLHHdtc0Rdu4T90UD9MgqisycqbOjUWYCAmCwaxxNu', '2021-05-05 16:20:17', '2021-05-05 16:20:17'),
(11, NULL, NULL, 'https://lh3.googleusercontent.com/a-/AOh14GheHgUF5jYvswuJH0ui8w0lmX9VJPb1nCfEBo3erA=s96-c', 'LOUIS HAGA ALNOVEUS HALAWA', 'louis.alnoveus@si.ukdw.ac.id', NULL, NULL, '61D3XjBCYn79qUUgql8ZHMzvOmUa4vt1aiaIYuKCUyJfBxx58o4bw2Y5IlXq', '2021-05-05 17:35:52', '2021-05-05 17:35:52'),
(12, NULL, NULL, 'https://lh3.googleusercontent.com/a-/AOh14Gi5kLGKch_wFpNvPhG6NV0kKx_Re4kz-P4Qe-fP=s96-c', 'RISTRI KRISNUGRAHENI', 'ristri.krisnugraheni@si.ukdw.ac.id', NULL, NULL, 'vQVCVXImzVdICU35ywm2wJWkk9yTvbTEntrVKYjWipfKAn4ZoO3RMOYAAFV7', '2021-05-09 23:57:11', '2021-05-09 23:57:11'),
(13, NULL, NULL, NULL, 'Louis Halawa', 'louis.halawa@students.ukdw.ac.id', NULL, NULL, 'SLafIbGYKVl2vp7d27fnDemmhva4chTJWlU1Og7yoP2VsHl5Px8hHk0PwNRa', '2021-05-30 20:14:06', '2021-05-30 20:14:06'),
(14, NULL, NULL, NULL, 'Ristri Krisnugraheni', 'ristri.krisnugraheni@students.ukdw.ac.id', NULL, NULL, 'N3ZfDXJ3BFTkwrr9CxqeJSDmLDTMFfeBduEdeQIc2tR21JOiqryyc01PC5cr', '2021-05-30 22:29:01', '2021-05-30 22:29:01');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`nidn`);

--
-- Indeks untuk tabel `kp`
--
ALTER TABLE `kp`
  ADD PRIMARY KEY (`idKp`),
  ADD KEY `FK_idRegistrasi_2` (`idReg`),
  ADD KEY `FK_nik_2` (`nidn`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`idPeriode`);

--
-- Indeks untuk tabel `prakp`
--
ALTER TABLE `prakp`
  ADD PRIMARY KEY (`idPraKp`),
  ADD KEY `FK_idRegistrasi` (`idReg`);

--
-- Indeks untuk tabel `registrasi`
--
ALTER TABLE `registrasi`
  ADD PRIMARY KEY (`idReg`),
  ADD KEY `FK_idPeriode` (`idPeriode`),
  ADD KEY `FK_nim` (`nim`);

--
-- Indeks untuk tabel `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`idRuang`);

--
-- Indeks untuk tabel `surat`
--
ALTER TABLE `surat`
  ADD PRIMARY KEY (`idSurat`),
  ADD KEY `FK_idReg` (`idReg`);

--
-- Indeks untuk tabel `ujian`
--
ALTER TABLE `ujian`
  ADD PRIMARY KEY (`idUjian`),
  ADD KEY `FK_idRuang` (`idRuang`),
  ADD KEY `FK_idKp_2` (`idKp`),
  ADD KEY `FK_nim_3` (`nim`),
  ADD KEY `FK_nik` (`nidn`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kp`
--
ALTER TABLE `kp`
  MODIFY `idKp` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `periode`
--
ALTER TABLE `periode`
  MODIFY `idPeriode` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `prakp`
--
ALTER TABLE `prakp`
  MODIFY `idPraKp` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `registrasi`
--
ALTER TABLE `registrasi`
  MODIFY `idReg` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `ruang`
--
ALTER TABLE `ruang`
  MODIFY `idRuang` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `surat`
--
ALTER TABLE `surat`
  MODIFY `idSurat` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `ujian`
--
ALTER TABLE `ujian`
  MODIFY `idUjian` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kp`
--
ALTER TABLE `kp`
  ADD CONSTRAINT `kp_ibfk_1` FOREIGN KEY (`nidn`) REFERENCES `dosen` (`nidn`),
  ADD CONSTRAINT `kp_ibfk_2` FOREIGN KEY (`idReg`) REFERENCES `registrasi` (`idReg`);

--
-- Ketidakleluasaan untuk tabel `prakp`
--
ALTER TABLE `prakp`
  ADD CONSTRAINT `prakp_ibfk_1` FOREIGN KEY (`idReg`) REFERENCES `registrasi` (`idReg`);

--
-- Ketidakleluasaan untuk tabel `registrasi`
--
ALTER TABLE `registrasi`
  ADD CONSTRAINT `registrasi_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`),
  ADD CONSTRAINT `registrasi_ibfk_2` FOREIGN KEY (`idPeriode`) REFERENCES `periode` (`idPeriode`);

--
-- Ketidakleluasaan untuk tabel `surat`
--
ALTER TABLE `surat`
  ADD CONSTRAINT `surat_ibfk_1` FOREIGN KEY (`idReg`) REFERENCES `registrasi` (`idReg`);

--
-- Ketidakleluasaan untuk tabel `ujian`
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
