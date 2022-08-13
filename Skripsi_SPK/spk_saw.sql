-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Agu 2022 pada 07.42
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_saw`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alternatif`
--

CREATE TABLE `alternatif` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_alternatif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `alternatif`
--

INSERT INTO `alternatif` (`id`, `nama_alternatif`, `created_at`, `updated_at`) VALUES
(1, 'Nafik', '2022-04-22 11:01:10', '2022-04-22 11:01:18'),
(2, 'Maisyaroh', '2022-04-22 11:01:36', '2022-04-22 11:01:36'),
(3, 'Akhwan', '2022-04-22 11:01:41', '2022-04-22 11:01:41'),
(4, 'Mubin', '2022-04-22 11:01:46', '2022-04-22 11:01:46'),
(5, 'Akip', '2022-04-22 11:01:51', '2022-04-22 11:01:51');

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
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kriteria` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attribut` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id`, `nama_kriteria`, `attribut`, `bobot`, `created_at`, `updated_at`) VALUES
(1, 'Luas Lahan', 'Benefit', 25, '2022-04-14 12:20:16', '2022-04-14 12:20:16'),
(2, 'Jenis Tanaman', 'Benefit', 50, '2022-04-14 12:21:50', '2022-04-14 12:21:50'),
(3, 'Umur Tanaman', 'Benefit', 25, '2022-04-14 12:22:09', '2022-04-14 12:22:09');

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
(5, '2022_04_13_170122_create_alternatif_table', 1),
(6, '2022_04_13_170226_create_kriteria_table', 1),
(7, '2022_04_13_170250_create_sub_kriteria_table', 1),
(8, '2022_04_16_182510_create_penilaian_table', 2),
(9, '2022_04_17_182025_create_pupuk_table', 3),
(10, '2022_04_21_172718_create_nilai_table', 4),
(11, '2022_04_24_215724_create_sub_kriteria_table', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE `penilaian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pupuk_id` bigint(20) UNSIGNED NOT NULL,
  `alternatif_id` bigint(20) UNSIGNED NOT NULL,
  `sub_kriteria_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `penilaian`
--

INSERT INTO `penilaian` (`id`, `pupuk_id`, `alternatif_id`, `sub_kriteria_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 11, '2022-05-27 00:31:28', '2022-05-27 00:31:28'),
(2, 1, 1, 3, '2022-05-27 00:31:28', '2022-05-27 00:31:28'),
(3, 1, 1, 13, '2022-05-27 00:31:28', '2022-05-27 00:31:28'),
(4, 1, 2, 10, '2022-05-27 00:31:28', '2022-05-27 00:31:28'),
(5, 1, 2, 1, '2022-05-27 00:31:28', '2022-05-27 00:31:28'),
(6, 1, 2, 13, '2022-05-27 00:31:28', '2022-05-27 00:31:28'),
(7, 1, 3, 11, '2022-05-27 00:31:28', '2022-05-27 00:31:28'),
(8, 1, 3, 3, '2022-05-27 00:31:28', '2022-05-27 00:31:28'),
(9, 1, 3, 15, '2022-05-27 00:31:28', '2022-05-27 00:31:28'),
(10, 1, 4, 11, '2022-05-27 00:31:28', '2022-05-27 00:31:28'),
(11, 1, 4, 2, '2022-05-27 00:31:28', '2022-05-27 00:31:28'),
(12, 1, 4, 15, '2022-05-27 00:31:28', '2022-05-27 00:31:28'),
(13, 1, 5, 11, '2022-05-27 00:31:28', '2022-05-27 00:31:28'),
(14, 1, 5, 3, '2022-05-27 00:31:28', '2022-05-27 00:31:28'),
(15, 1, 5, 13, '2022-05-27 00:31:28', '2022-05-27 00:31:28');

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
-- Struktur dari tabel `pupuk`
--

CREATE TABLE `pupuk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pupuk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pupuk`
--

INSERT INTO `pupuk` (`id`, `nama_pupuk`, `created_at`, `updated_at`) VALUES
(1, 'Urea', '2022-04-23 11:46:04', '2022-04-23 11:46:04'),
(2, 'Phonska', '2022-04-23 11:46:10', '2022-04-23 11:46:10'),
(3, 'ZA', '2022-04-23 11:46:15', '2022-04-23 11:46:15'),
(123, 'Semua Jenis Pupuk', '2022-04-24 21:49:35', '2022-04-24 21:49:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pupuk_id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_id` bigint(20) UNSIGNED NOT NULL,
  `nama_sub` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot_sub` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id`, `pupuk_id`, `kriteria_id`, `nama_sub`, `bobot_sub`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Cabai | Urea', 3, '2022-04-24 15:01:58', '2022-04-24 15:01:58'),
(2, 1, 2, 'Jagung | Urea', 2, '2022-04-24 15:03:21', '2022-04-24 15:03:21'),
(3, 1, 2, 'Padi | Urea', 1, '2022-04-24 15:03:31', '2022-04-24 15:03:31'),
(4, 2, 2, 'Jagung | Phonska', 3, '2022-04-24 15:03:54', '2022-04-24 15:03:54'),
(5, 2, 2, 'Padi  | Phonska', 2, '2022-04-24 15:04:12', '2022-04-24 15:04:12'),
(6, 2, 2, 'Cabai | Phonska', 1, '2022-04-24 15:04:27', '2022-04-24 15:04:27'),
(7, 3, 2, 'Padi | ZA', 3, '2022-04-24 15:04:40', '2022-04-24 15:04:40'),
(8, 3, 2, 'Cabai | ZA', 2, '2022-04-24 15:04:54', '2022-04-24 15:04:54'),
(9, 3, 2, 'Jagung | ZA', 1, '2022-04-24 15:05:07', '2022-04-24 15:05:07'),
(10, 123, 1, '< 200', 3, '2022-04-24 15:06:07', '2022-04-24 15:06:07'),
(11, 123, 1, '200 - 400', 2, '2022-04-24 15:06:18', '2022-04-24 15:06:18'),
(12, 123, 1, '> 400', 1, '2022-04-24 15:06:27', '2022-04-24 15:06:27'),
(13, 123, 3, 'Pemupukan Ke 1', 3, '2022-04-24 15:06:45', '2022-04-24 15:06:45'),
(14, 123, 3, 'Pemupukan Ke 2', 2, '2022-04-24 15:06:56', '2022-04-24 15:06:56'),
(15, 123, 3, 'Pemupukan Ke 3', 1, '2022-04-24 15:07:06', '2022-04-24 15:07:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Arjan', 'Admin', 'admin@gmail.com', NULL, '$2y$10$OOLCULQ7Mp6/SqTWkGt63uN22vbUYmfUTmiy1KrWubnXwQJBAJaza', NULL, '2022-04-15 12:35:26', '2022-04-15 12:35:26'),
(2, 'Suharto', 'Kades', 'kades@gmail.com', NULL, '$2y$10$JGn5kf/MM5N9zYSh3ZzXC.xry7G9eFodlA1xnL6/.41ncjNffZBLi', NULL, '2022-04-15 12:56:56', '2022-04-15 12:56:56');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
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
-- Indeks untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_alternatif` (`alternatif_id`),
  ADD KEY `fk_sub_kriteria` (`sub_kriteria_id`),
  ADD KEY `fk_pupuk` (`pupuk_id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `pupuk`
--
ALTER TABLE `pupuk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_kriteria_pupuk_id_foreign` (`pupuk_id`),
  ADD KEY `sub_kriteria_kriteria_id_foreign` (`kriteria_id`);

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
-- AUTO_INCREMENT untuk tabel `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pupuk`
--
ALTER TABLE `pupuk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT untuk tabel `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `fk_alternatif` FOREIGN KEY (`alternatif_id`) REFERENCES `alternatif` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_pupuk` FOREIGN KEY (`pupuk_id`) REFERENCES `pupuk` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD CONSTRAINT `sub_kriteria_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id`),
  ADD CONSTRAINT `sub_kriteria_pupuk_id_foreign` FOREIGN KEY (`pupuk_id`) REFERENCES `pupuk` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
