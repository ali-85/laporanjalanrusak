-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Okt 2019 pada 06.46
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_laporan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `desas`
--

CREATE TABLE `desas` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `desas`
--

INSERT INTO `desas` (`id`, `created_at`, `updated_at`, `nama`, `kecamatan_id`) VALUES
(6, '2019-10-17 02:08:09', '2019-10-17 02:08:09', 'Cisadap', 8),
(7, '2019-10-17 02:08:23', '2019-10-17 05:37:45', 'Imbanaga Raya', 8),
(8, '2019-10-17 02:08:58', '2019-10-17 02:08:58', 'Pawindan', 8),
(9, '2019-10-17 02:09:09', '2019-10-17 02:09:09', 'Panyingkiran', 8),
(11, '2019-10-17 02:10:31', '2019-10-17 02:10:31', 'Benteng', 8),
(12, '2019-10-17 02:10:39', '2019-10-17 02:10:39', 'Ciamis', 8),
(13, '2019-10-17 02:10:55', '2019-10-17 02:10:55', 'Cigembor', 8),
(14, '2019-10-17 02:11:18', '2019-10-17 02:11:18', 'Linggasari', 8),
(15, '2019-10-17 02:11:33', '2019-10-17 02:11:33', 'Maleber', 8),
(16, '2019-10-17 02:11:54', '2019-10-17 02:11:54', 'Sindangrasa', 8),
(19, '2019-10-17 05:31:22', '2019-10-17 05:31:22', 'Banjaranyar', 6),
(20, '2019-10-17 05:31:47', '2019-10-17 05:31:47', 'Baregbeg', 7),
(21, '2019-10-17 05:31:59', '2019-10-17 05:31:59', 'Jelat', 7),
(22, '2019-10-17 05:32:36', '2019-10-17 05:32:36', 'Banjarsari', 6),
(23, '2019-10-17 05:33:16', '2019-10-17 05:33:16', 'Cidolog', 9),
(24, '2019-10-17 05:33:26', '2019-10-17 05:33:26', 'Ciparay', 9),
(25, '2019-10-17 05:33:40', '2019-10-17 05:33:40', 'Hegarmanah', 9),
(26, '2019-10-17 05:33:52', '2019-10-17 05:33:52', 'Janggala', 9),
(27, '2019-10-17 05:34:01', '2019-10-17 05:34:01', 'Jelegong', 9),
(28, '2019-10-17 05:34:15', '2019-10-17 05:34:15', 'Sukasari', 9),
(29, '2019-10-17 05:36:43', '2019-10-17 05:36:43', 'Imbanagara', 8),
(30, '2019-10-17 05:42:51', '2019-10-17 05:42:51', 'Bunisari', 42),
(31, '2019-10-17 05:43:06', '2019-10-17 05:43:06', 'Campaka', 42),
(32, '2019-10-17 05:44:10', '2019-10-17 05:44:10', 'Cihaurbeuti', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ditolaks`
--

CREATE TABLE `ditolaks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `laporan_id` int(11) NOT NULL,
  `alasan` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ditolaks`
--

INSERT INTO `ditolaks` (`id`, `created_at`, `updated_at`, `laporan_id`, `alasan`) VALUES
(1, '2019-10-16 23:39:01', '2019-10-16 23:39:01', 4, 'Test Penolakan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatans`
--

CREATE TABLE `kecamatans` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kecamatans`
--

INSERT INTO `kecamatans` (`id`, `created_at`, `updated_at`, `nama`) VALUES
(6, '2019-10-17 01:48:12', '2019-10-17 01:48:12', 'Banjarsari'),
(7, '2019-10-17 02:04:18', '2019-10-17 02:04:18', 'Baregbeg'),
(8, '2019-10-17 02:04:26', '2019-10-17 02:09:50', 'Ciamis'),
(9, '2019-10-17 02:04:39', '2019-10-17 02:04:39', 'Cidolog'),
(10, '2019-10-17 02:04:48', '2019-10-17 02:04:48', 'Cihaurbeuti'),
(11, '2019-10-17 02:04:57', '2019-10-17 02:04:57', 'Cijeungjing'),
(12, '2019-10-17 02:05:12', '2019-10-17 02:05:12', 'Cikoneng'),
(13, '2019-10-17 02:05:23', '2019-10-17 02:05:23', 'Cimaragas'),
(14, '2019-10-17 05:16:59', '2019-10-17 05:16:59', 'Cijulang'),
(15, '2019-10-17 05:17:29', '2019-10-17 05:17:29', 'Cimerak'),
(16, '2019-10-17 05:18:44', '2019-10-17 05:18:44', 'Cipaku'),
(17, '2019-10-17 05:19:16', '2019-10-17 05:19:16', 'Cisaga'),
(18, '2019-10-17 05:19:32', '2019-10-17 05:19:32', 'Jatinagara'),
(19, '2019-10-17 05:19:38', '2019-10-17 05:19:38', 'Kalipucang'),
(20, '2019-10-17 05:19:50', '2019-10-17 05:19:50', 'Kawali'),
(21, '2019-10-17 05:20:02', '2019-10-17 05:20:02', 'Lakbok'),
(22, '2019-10-17 05:20:11', '2019-10-17 05:20:11', 'Langkaplancar'),
(23, '2019-10-17 05:20:51', '2019-10-17 05:20:51', 'Lumbung'),
(24, '2019-10-17 05:21:03', '2019-10-17 05:21:03', 'Mangunjaya'),
(25, '2019-10-17 05:21:17', '2019-10-17 05:21:17', 'Padaherang'),
(26, '2019-10-17 05:21:28', '2019-10-17 05:21:28', 'Pamarican'),
(27, '2019-10-17 05:21:37', '2019-10-17 05:21:37', 'Panawangan'),
(28, '2019-10-17 05:21:47', '2019-10-17 05:21:47', 'Pangandaran'),
(29, '2019-10-17 05:21:56', '2019-10-17 05:21:56', 'Panjalu'),
(30, '2019-10-17 05:22:11', '2019-10-17 05:22:11', 'Panjalu Utara'),
(31, '2019-10-17 05:22:18', '2019-10-17 05:22:18', 'Panumbangan'),
(32, '2019-10-17 05:22:26', '2019-10-17 05:22:26', 'Parigi'),
(33, '2019-10-17 05:22:34', '2019-10-17 05:22:34', 'Purwadadi'),
(34, '2019-10-17 05:22:42', '2019-10-17 05:22:42', 'Rajadesa'),
(35, '2019-10-17 05:22:54', '2019-10-17 05:22:54', 'Rancah'),
(36, '2019-10-17 05:23:04', '2019-10-17 05:23:04', 'Sadananya'),
(37, '2019-10-17 05:23:10', '2019-10-17 05:23:10', 'Sidamulih'),
(38, '2019-10-17 05:23:17', '2019-10-17 05:23:17', 'Sindangkasih'),
(39, '2019-10-17 05:23:27', '2019-10-17 05:23:27', 'Sukadana'),
(40, '2019-10-17 05:23:38', '2019-10-17 05:23:38', 'Sukamantri'),
(41, '2019-10-17 05:23:57', '2019-10-17 05:23:57', 'Tambaksari'),
(42, '2019-10-17 05:41:22', '2019-10-17 05:41:22', 'Cigugur');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporans`
--

CREATE TABLE `laporans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` int(11) NOT NULL,
  `desa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `note` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `laporans`
--

INSERT INTO `laporans` (`id`, `created_at`, `updated_at`, `user_id`, `nama`, `nohp`, `alamat`, `kecamatan`, `desa`, `image`, `status`, `note`) VALUES
(10, '2019-10-18 02:19:48', '2019-10-18 02:19:48', 4, 'Ali Davit', '088274122151', 'Test', 7, 'Baregbeg', '1571390388.jpg', 'pending', 'Jalan rusak');

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
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2014_10_12_100000_create_password_resets_table', 1),
(11, '2019_10_05_141334_create_laporans_table', 1),
(12, '2019_10_05_170007_create_desas_table', 1),
(13, '2019_10_05_170249_create_kecamatans_table', 1),
(14, '2019_10_06_053711_create_ditolaks_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `nohp`, `role`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@gmail.com', '088274122151', 1, '$2y$10$min4OESmeSco/50fPAWa7.7CheTLyX4UJ2KHrH4ZHlq.5oo8vivN2', '2019-10-05 21:10:01', '2019-10-05 21:10:01'),
(4, 'Ali Davit', 'alidavit@gmail.com', '088274122151', 0, '$2y$10$/AqgYfZ4d30w5e7BPNuLGeyL/7XFe1MkFS66mCUjgcRQu/qpsx9CO', '2019-10-17 01:39:17', '2019-10-17 01:39:17');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `desas`
--
ALTER TABLE `desas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `ditolaks`
--
ALTER TABLE `ditolaks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kecamatans`
--
ALTER TABLE `kecamatans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `laporans`
--
ALTER TABLE `laporans`
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
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `desas`
--
ALTER TABLE `desas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `ditolaks`
--
ALTER TABLE `ditolaks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kecamatans`
--
ALTER TABLE `kecamatans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `laporans`
--
ALTER TABLE `laporans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
