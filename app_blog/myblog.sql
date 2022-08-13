-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Jan 2022 pada 07.34
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
-- Database: `myblog`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Alat Musik Tradisional', 'file/category/MIAgujFWknBsIte4GVxM-alat musik.jpg', '2022-01-08 10:15:36', '2022-01-08 10:15:36'),
(2, 'Pencak Silat', 'file/category/lipzNOyu7TUwxGQ8ghHq-48pencak silat nuef.jpg', '2022-01-08 10:16:02', '2022-01-08 14:44:19'),
(3, 'Kuliner', 'file/category/oCQ2yK6EUApGyxzjQ8LR-kuliner.jpg', '2022-01-08 10:16:19', '2022-01-08 10:16:19');

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
-- Struktur dari tabel `mainmenu`
--

CREATE TABLE `mainmenu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tittle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent` bigint(20) NOT NULL DEFAULT 0,
  `category` enum('link','content','file') COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `mainmenu`
--

INSERT INTO `mainmenu` (`id`, `tittle`, `parent`, `category`, `content`, `url`, `file`, `order`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Home', 0, 'link', NULL, 'http://localhost:8000', '', 1, 1, '2022-01-08 14:07:06', '2022-01-08 14:07:06'),
(6, 'Registrasi', 6, 'link', NULL, 'http://localhost:8000/register', '', 3, 0, '2022-01-08 14:08:00', '2022-01-08 14:09:05'),
(7, 'Login', 7, 'link', NULL, 'http://localhost:8000/login', '', 4, 0, '2022-01-08 14:08:24', '2022-01-08 14:09:15'),
(9, 'Post', 0, 'link', NULL, 'http://localhost:8000/post', '', 1, 1, '2022-01-10 09:45:05', '2022-01-10 09:45:05'),
(10, 'Contact', 0, 'link', NULL, 'http://localhost:8000/contact', '', 1, 1, '2022-01-10 09:45:50', '2022-01-10 09:45:50'),
(11, 'Category', 0, 'link', NULL, 'http://localhost:8000/category', '', 1, 1, '2022-01-10 09:46:54', '2022-01-11 07:51:18'),
(13, 'Alat Musik Tradisional', 11, 'link', NULL, 'http://localhost:8000/category/1', '', 1, 1, '2022-01-11 07:53:01', '2022-01-11 07:53:01'),
(14, 'Kuliner', 11, 'link', NULL, 'http://localhost:8000/category/3', '', 1, 1, '2022-01-11 07:53:37', '2022-01-11 07:53:37'),
(15, 'Pencak Silat', 11, 'link', NULL, 'http://localhost:8000/category/2', '', 1, 1, '2022-01-11 07:54:09', '2022-01-11 07:54:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad Dwi Cahyono', 'wikk@gmail.com', 'Saran Post', 'tambahkan post komen mengenai postingan di kategori pencak silat min. karena saya suka artikel atau postingan mengenai pencak silat.', '2022-01-10 11:35:55', '2022-01-10 11:35:55');

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
(5, '2021_12_28_095605_create_categories_table', 1),
(6, '2021_12_28_122514_add_image_user_table', 2),
(7, '2022_01_04_173653_create_post_table', 3),
(8, '2022_01_07_165046_create_mainmenu_table', 4),
(9, '2022_01_07_170232_create_post_table', 5),
(10, '2022_01_07_170548_create_categories_table', 6),
(11, '2022_01_08_170238_create_slider_table', 6),
(12, '2022_01_08_171256_create_post_table', 7),
(13, '2022_01_08_180152_create_messages_table', 8),
(14, '2022_01_08_193159_create_post_comment_table', 9),
(15, '2022_01_08_215521_create_slider_table', 10),
(16, '2022_01_10_175023_create_post_comment_table', 11);

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
-- Struktur dari tabel `post`
--

CREATE TABLE `post` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tittle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_headline` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `post`
--

INSERT INTO `post` (`id`, `tittle`, `thumbnail`, `category_id`, `content`, `is_headline`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Pencak Silat', 'file/post/oWIUyi7fOmfqeCmYJssc-48pencak silat nuef.jpg', 2, '<p>pencak silat merupakan seni bela diri yang diwariskan oleh nenek moyang kita untuk membela diri.</p>', 0, 1, '2022-01-08 10:18:45', '2022-01-10 10:05:03'),
(2, 'Alat Musik Tradisional', 'file/post/5VT4G8VTgd8UTstdvnB5-cover_-_buffalogamelan.jpg', 1, '<p>Alat musik tradisional yang diwariskan oleh leluhur kita khususnya di jawa. alat tradisional tersebut bernama demung</p>', 1, 1, '2022-01-10 10:56:15', '2022-01-10 10:56:15'),
(3, 'Pecel Lele Lamongan', 'file/post/5HRx03ppwoTr15BOPUJs-pecel-lele.jpg', 3, '<p>Makanan Khas dari kota kecil sejuta kenangan yaitu Kota Lamongan. Lamongan sendiri memiliki makanan khas diantaranya tedapat Pecel Lele Lamongan. bisa di lihat banyak sekali warung yang berjajar di pinggir jalan di seluruh kota yang ada di Indonesia dengan nama Pecel Lele Lamongan.</p>', 1, 1, '2022-01-10 10:59:44', '2022-01-10 10:59:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `post_comment`
--

CREATE TABLE `post_comment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `post_comment`
--

INSERT INTO `post_comment` (`id`, `post_id`, `name`, `comment`, `created_at`, `updated_at`) VALUES
(1, 3, 'Aqmal Ade', 'Makanan yang wajib untuk dinikmati setiap hari', '2022-01-11 00:39:36', '2022-01-11 00:39:36'),
(2, 3, 'MaiSyaroh', 'makanan khas Lamongan yang menyebar ke penjuru negeri Indonesia', '2022-01-11 00:42:08', '2022-01-11 00:42:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `slider`
--

CREATE TABLE `slider` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tittle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `order` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `slider`
--

INSERT INTO `slider` (`id`, `tittle`, `image`, `url`, `category_id`, `order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Pencak Silat', 'file/slider/w02AoI5iU7x6q0zn9Wes-48pencak silat nuef.jpg', 'pencaksilat', 2, 1, 1, '2022-01-08 15:05:57', '2022-01-08 15:05:57'),
(2, 'Kuliner', 'file/slider/AuYhhxsIjOJmphRXe1dD-kuliner.jpg', 'kuliner', 3, 1, 1, '2022-01-08 15:06:39', '2022-01-08 15:06:39');

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
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Muh Dwi Cahyono', 'uwikklett@gmail.com', NULL, '$2y$10$gBBlXVsIXW/MR0brkEkHIe4Mz0cBrDvX2lTo31MEP4ZeI5AdbIm36', NULL, 'file/admin/hZlOZhppCLfuwsTzN8vp-admin-settings-male.png', '2021-12-28 11:20:55', '2022-01-08 12:11:34');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `mainmenu`
--
ALTER TABLE `mainmenu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `messages`
--
ALTER TABLE `messages`
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
-- Indeks untuk tabel `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_category_id_foreign` (`category_id`);

--
-- Indeks untuk tabel `post_comment`
--
ALTER TABLE `post_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_comment_post_id_foreign` (`post_id`);

--
-- Indeks untuk tabel `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`),
  ADD KEY `slider_category_id_foreign` (`category_id`);

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
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mainmenu`
--
ALTER TABLE `mainmenu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `post`
--
ALTER TABLE `post`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `post_comment`
--
ALTER TABLE `post_comment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `slider`
--
ALTER TABLE `slider`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Ketidakleluasaan untuk tabel `post_comment`
--
ALTER TABLE `post_comment`
  ADD CONSTRAINT `post_comment_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`);

--
-- Ketidakleluasaan untuk tabel `slider`
--
ALTER TABLE `slider`
  ADD CONSTRAINT `slider_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
