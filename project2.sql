-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Feb 2023 pada 04.52
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `image_uploads`
--

CREATE TABLE `image_uploads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `image_uploads`
--

INSERT INTO `image_uploads` (`id`, `filename`, `created_at`, `updated_at`) VALUES
(17, 'WhatsApp Image 2022-06-07 at 18.23.18 (2).jpeg', '2022-06-09 09:03:30', '2022-06-09 09:03:30'),
(18, 'WhatsApp Image 2022-06-07 at 18.23.18 (1).jpeg', '2022-06-09 09:03:30', '2022-06-09 09:03:30'),
(19, 'WhatsApp Image 2022-06-07 at 18.23.18.jpeg', '2022-06-09 09:03:30', '2022-06-09 09:03:30'),
(20, 'WhatsApp Image 2022-06-07 at 18.23.17 (1).jpeg', '2022-06-09 09:03:31', '2022-06-09 09:03:31'),
(23, 'WhatsApp Image 2022-06-14 at 20.24.59 (1).jpeg', '2022-06-14 21:01:26', '2022-06-14 21:01:26'),
(24, 'WhatsApp Image 2022-06-14 at 20.24.59.jpeg', '2022-06-14 21:01:26', '2022-06-14 21:01:26');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_05_07_041250_create_image_uploads_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('galihsandya@gmail.com', '$2y$10$FEfK0RpVwYBjnL2IYqc2OOdOykuzCtPavafhWciw51lOQmKQpy/l2', '2022-03-24 23:36:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `tb_basah`
--

CREATE TABLE `tb_basah` (
  `no` int(11) NOT NULL,
  `nominal_uang` varchar(255) NOT NULL,
  `jumlah_percobaan` varchar(255) NOT NULL,
  `terdeteksi` varchar(255) NOT NULL,
  `tidak_terdeteksi` varchar(255) NOT NULL,
  `presentase` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_basah`
--

INSERT INTO `tb_basah` (`no`, `nominal_uang`, `jumlah_percobaan`, `terdeteksi`, `tidak_terdeteksi`, `presentase`) VALUES
(1, 'Rp. 1000', '10', '8', '2', '80%'),
(2, 'Rp. 2000', '10', '7', '3', '70%'),
(3, 'Rp. 5000', '10', '6', '4', '60%'),
(4, 'Rp. 10.000', '10', '7', '3', '70%'),
(5, 'Rp. 20.000', '10', '7', '3', '70%'),
(6, 'Rp. 50.000', '10', '8', '2', '80%'),
(7, 'Rp. 100.000', '10', '7', '3', '70%');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_laporan`
--

CREATE TABLE `tb_laporan` (
  `no` int(11) NOT NULL,
  `nama_pengguna` varchar(255) NOT NULL,
  `kondisi_uang` varchar(255) NOT NULL,
  `hasil_deteksi` varchar(255) NOT NULL,
  `kegiatan` varchar(255) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `uang_diberikan` varchar(255) NOT NULL,
  `uang_kembalian` varchar(255) DEFAULT NULL,
  `kondisi_uang2` varchar(255) DEFAULT NULL,
  `hasil_deteksi2` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_laporan`
--

INSERT INTO `tb_laporan` (`no`, `nama_pengguna`, `kondisi_uang`, `hasil_deteksi`, `kegiatan`, `tanggal`, `uang_diberikan`, `uang_kembalian`, `kondisi_uang2`, `hasil_deteksi2`) VALUES
(1, 'Alvin Triyanto', 'Warna Pudar', 'Tidak Terdeteksi', 'Membeli makanan di kantin', '2022-06-07', 'Rp. 100.000', 'Rp. 5000', 'Warna Pudar', 'Tidak Terdeteksi'),
(2, 'Indri Destiani', 'Rapi', 'Terdeteksi', 'Membayar Kas', '2022-06-07', 'Rp. 2000', '', '', ''),
(3, 'Gia Prisilya', 'Rapi', 'Terdeteksi', 'Membeli makanan di kantin', '2022-06-07', 'Rp. 10.000', 'Rp. 5000, Rp. 2000', 'Lecek, Rapi', 'Terdeteksi, Terdeteksi'),
(4, 'Pierre Aji Wajiehan', 'Lecek', 'Terdeteksi', 'Membeli makanan di kantin', '2022-06-07', 'Rp. 10.000', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_lecek`
--

CREATE TABLE `tb_lecek` (
  `no` int(11) NOT NULL,
  `nominal_uang` varchar(255) NOT NULL,
  `jumlah_percobaan` varchar(255) NOT NULL,
  `terdeteksi` varchar(255) NOT NULL,
  `tidak_terdeteksi` varchar(255) NOT NULL,
  `presentase` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_lecek`
--

INSERT INTO `tb_lecek` (`no`, `nominal_uang`, `jumlah_percobaan`, `terdeteksi`, `tidak_terdeteksi`, `presentase`) VALUES
(1, 'Rp. 1000', '10', '7', '3', '70%'),
(2, 'Rp. 2000', '10', '8', '2', '80%'),
(3, 'Rp. 5000', '10', '7', '3', '70%'),
(4, 'Rp. 10.000', '10', '9', '1', '90%'),
(5, 'Rp. 20.000', '10', '10', '0', '100%'),
(6, 'Rp. 50.000', '10', '10', '0', '100%'),
(7, 'Rp. 100.000', '10', '10', '0', '100%');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengujian`
--

CREATE TABLE `tb_pengujian` (
  `no` int(11) NOT NULL,
  `nominal_uang` varchar(255) NOT NULL,
  `jumlah_percobaan` varchar(255) NOT NULL,
  `terdeteksi` varchar(255) NOT NULL,
  `tidak_terdeteksi` varchar(255) NOT NULL,
  `presentase` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pengujian`
--

INSERT INTO `tb_pengujian` (`no`, `nominal_uang`, `jumlah_percobaan`, `terdeteksi`, `tidak_terdeteksi`, `presentase`) VALUES
(1, 'Rp. 1000', '10', '8', '2', '80%'),
(2, 'Rp. 2000', '10', '8', '2', '80%'),
(3, 'Rp. 5000', '10', '9', '1', '90%'),
(4, 'Rp. 10.000', '10', '10', '0', '100%'),
(5, 'Rp. 20.000', '10', '10', '0', '100%'),
(6, 'Rp. 50.000', '10', '10', '0', '100%'),
(7, 'Rp. 100.000', '10', '10', '0', '100%');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pudar`
--

CREATE TABLE `tb_pudar` (
  `no` int(11) NOT NULL,
  `nominal_uang` varchar(255) NOT NULL,
  `jumlah_percobaan` varchar(255) NOT NULL,
  `terdeteksi` varchar(255) NOT NULL,
  `tidak_terdeteksi` varchar(255) NOT NULL,
  `presentase` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pudar`
--

INSERT INTO `tb_pudar` (`no`, `nominal_uang`, `jumlah_percobaan`, `terdeteksi`, `tidak_terdeteksi`, `presentase`) VALUES
(1, 'Rp. 1000', '10', '5', '5', '50%'),
(2, 'Rp. 2000', '10', '6', '4', '60%'),
(3, 'Rp. 5000', '10', '4', '6', '40%'),
(4, 'Rp. 10.000', '10', '5', '5', '50%'),
(5, 'Rp. 20.000', '10', '4', '6', '40%'),
(6, 'Rp. 50.000', '10', '7', '3', '70%'),
(7, 'Rp. 100.000', '10', '6', '4', '60%');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_range`
--

CREATE TABLE `tb_range` (
  `no` int(11) NOT NULL,
  `nominal` varchar(255) NOT NULL,
  `merah` varchar(255) NOT NULL,
  `hijau` varchar(255) NOT NULL,
  `biru` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_range`
--

INSERT INTO `tb_range` (`no`, `nominal`, `merah`, `hijau`, `biru`) VALUES
(1, 'Rp. 1000', '51-57', '46-57', '45-48'),
(2, 'Rp. 2000', '45-51', '44-50', '34-41'),
(3, 'Rp. 5000', '42-50', '54-56', '41-46'),
(4, 'Rp. 10.000', '60-67', '59-66', '39-45'),
(5, 'Rp. 20.000', '51-56', '48-50', '41-43'),
(6, 'Rp. 50.000', '63-70', '49-56', '37-40'),
(7, 'Rp. 100.000', '47-54', '59-68', '47-53'),
(8, 'Rp. 75.000', '46-57', '38-39', '26-27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `photo`, `created_at`, `updated_at`) VALUES
(2, 'Dinda Nur Hasanah', 'dindanur063@gmail.com', NULL, '$2y$10$7uy/u.Ug4ihvRMtqu/GPnuLy7MpYj6o8njYS/W3VaEvQDx3abNDVO', NULL, 'user.png', '2022-03-24 20:38:56', '2022-03-24 20:38:56'),
(5, 'Dinda Nur Hasanah', 'dindanurhasanah560@gmail.com', NULL, '$2y$10$M0Vd3evUN.9bhjefTwq5Qe.et5mVU.0FeZJENuNAIYUD5gbML1RA2', NULL, 'user.png', '2022-03-31 19:56:57', '2022-03-31 19:56:57'),
(15, 'Fauzan Akbar', 'galihsandya@gmail.com', NULL, '$2y$10$wilS/1AmjT9L19YcXpOgU.N7nfs35nPgynknOcUhv3DQ6jWAies9C', NULL, '1655978435-user.png', '2022-05-11 08:09:04', '2022-06-23 03:00:41');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `image_uploads`
--
ALTER TABLE `image_uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `tb_basah`
--
ALTER TABLE `tb_basah`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `tb_laporan`
--
ALTER TABLE `tb_laporan`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `tb_lecek`
--
ALTER TABLE `tb_lecek`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `tb_pengujian`
--
ALTER TABLE `tb_pengujian`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `tb_pudar`
--
ALTER TABLE `tb_pudar`
  ADD PRIMARY KEY (`no`);

--
-- Indeks untuk tabel `tb_range`
--
ALTER TABLE `tb_range`
  ADD PRIMARY KEY (`no`);

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
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `image_uploads`
--
ALTER TABLE `image_uploads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_basah`
--
ALTER TABLE `tb_basah`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_laporan`
--
ALTER TABLE `tb_laporan`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT untuk tabel `tb_lecek`
--
ALTER TABLE `tb_lecek`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_pengujian`
--
ALTER TABLE `tb_pengujian`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_pudar`
--
ALTER TABLE `tb_pudar`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_range`
--
ALTER TABLE `tb_range`
  MODIFY `no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
