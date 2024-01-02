-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 03, 2021 at 12:34 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_s6_MPPL_Restoran`
--

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
(1, '2021_06_09_022418_create_table_menu', 1),
(2, '2021_06_09_022548_create_table_meja', 1),
(3, '2021_06_09_022916_create_table_pemesanan', 1),
(4, '2021_06_09_022935_create_table_detail_pemesanan', 1),
(5, '2021_07_14_025850_create_table_pegawai', 2),
(6, '2021_07_14_025954_create_table_master', 2);

-- --------------------------------------------------------

--
-- Table structure for table `table_detail_pemesanan`
--

CREATE TABLE `table_detail_pemesanan` (
  `id_detail` int(10) UNSIGNED NOT NULL,
  `status_pemesanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pemesanan` int(10) UNSIGNED NOT NULL,
  `id_menu` int(10) UNSIGNED NOT NULL,
  `jumlah_pesan` int(10) UNSIGNED DEFAULT NULL,
  `total_per_detail` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_detail_pemesanan`
--

INSERT INTO `table_detail_pemesanan` (`id_detail`, `status_pemesanan`, `id_pemesanan`, `id_menu`, `jumlah_pesan`, `total_per_detail`, `created_at`, `updated_at`) VALUES
(1, 'Sajikan', 1, 20, 2, 10000, NULL, NULL),
(2, 'Sajikan', 1, 5, 4, 10000, NULL, NULL),
(3, 'Sajikan', 2, 2, 1, 30000, NULL, NULL),
(4, 'Sajikan', 2, 15, 1, 5000, NULL, NULL),
(5, 'Sajikan', 3, 4, 3, 36000, NULL, NULL),
(6, 'Sajikan', 3, 19, 3, 15000, NULL, NULL),
(7, 'Sajikan', 4, 1, 3, 24000, NULL, NULL),
(8, 'Sajikan', 4, 18, 3, 12000, NULL, NULL),
(9, 'Sajikan', 4, 20, 1, 4000, NULL, NULL),
(10, 'Sajikan', 64, 10, 5, 15000, '2021-07-11 04:00:57', '2021-07-14 20:01:23'),
(11, 'Sajikan', 5, 9, 1, 50000, NULL, NULL),
(12, 'Sajikan', 5, 11, 1, 10000, NULL, NULL),
(13, 'Sajikan', 64, 2, 10, 300000, '2021-07-13 05:55:34', '2021-07-13 06:54:14'),
(14, 'Sajikan', 64, 5, 1, 3000, '2021-07-13 06:10:34', '2021-07-15 02:46:25'),
(15, 'Sajikan', 64, 9, 1, 3000, '2021-07-13 06:11:50', '2021-08-02 11:25:52'),
(16, 'Sajikan', 64, 2, 7, 210000, '2021-07-13 06:50:30', '2021-07-15 02:52:41'),
(21, 'Sajikan', 64, 11, 2, 6000, '2021-07-13 08:07:49', '2021-08-02 11:42:19'),
(22, 'Sajikan', 76, 2, 1, 30000, '2021-07-15 03:58:49', '2021-07-15 04:05:48'),
(23, 'Sajikan', 76, 11, 1, 10000, NULL, NULL),
(24, 'Order', 78, 1, 2, NULL, '2021-07-17 12:57:08', '2021-07-18 05:47:38'),
(25, 'Order', 78, 11, 2, NULL, '2021-07-17 12:57:18', '2021-07-18 05:47:38'),
(26, 'Sajikan', 78, 16, 1, 3000, '2021-07-18 05:47:33', '2021-08-02 11:42:57'),
(28, 'Order', 81, 1, 1, NULL, '2021-07-20 11:53:44', '2021-07-20 11:55:16'),
(29, 'Sajikan', 83, 11, 1, 3000, '2021-07-20 12:54:53', '2021-08-02 11:46:16'),
(30, 'Order', 83, 1, 1, NULL, '2021-07-20 12:55:02', '2021-07-20 12:56:05'),
(31, 'Sajikan', 78, 1, 1, 10000, '2021-08-02 11:20:47', '2021-08-02 11:34:01'),
(32, 'Order', 78, 2, 1, NULL, '2021-08-02 11:20:49', '2021-08-02 11:21:00'),
(33, 'Order', 78, 14, 1, NULL, '2021-08-02 11:20:56', '2021-08-02 11:21:00'),
(34, 'Sajikan', 77, 5, 1, 3000, '2021-08-02 11:21:34', '2021-08-02 11:43:16'),
(35, 'Order', 77, 9, 1, NULL, '2021-08-02 11:21:40', '2021-08-02 11:21:51'),
(36, 'Order', 77, 11, 1, NULL, '2021-08-02 11:21:45', '2021-08-02 11:21:51');

-- --------------------------------------------------------

--
-- Table structure for table `table_master`
--

CREATE TABLE `table_master` (
  `kd_pengguna` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hak_akses` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_master`
--

INSERT INTO `table_master` (`kd_pengguna`, `username`, `password`, `hak_akses`, `created_at`, `updated_at`) VALUES
(1, 'fauzan', '$2y$10$fiRB5Z2fcY.aThF3pgsAq.vbQYAffv/OBIEVqHK02pOL5KIyjct7C', 'Admin', NULL, '2021-07-16 22:16:12'),
(2, 'gentra', '$2y$10$4L5ruL6lGt1MuA3WQZSkxOzD/cH51DcPvWkeKpMbl.Fer/.vX5PKS', 'Koki', NULL, '2021-07-16 22:31:08'),
(3, 'azzz', '$2y$10$fOm70x8mOSPMxvzGBTT2peCLFnGpm0tpI1WHr9dKtYZQcqNE87.7a', 'Petugas', '2021-07-16 02:41:55', '2021-07-16 22:42:23'),
(4, 'zaldi', '$2y$10$mdQwHwird0Smhz6eFEvb3uHFKaOWSyHEF2IkEkAKFBnNOwMrX9LZC', 'Admin', '2021-07-16 22:44:24', '2021-08-02 12:01:43');

-- --------------------------------------------------------

--
-- Table structure for table `table_meja`
--

CREATE TABLE `table_meja` (
  `no_meja` int(10) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_meja`
--

INSERT INTO `table_meja` (`no_meja`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Terisi', NULL, '2021-07-17 12:51:26'),
(2, 'Terisi', NULL, '2021-07-16 22:36:49'),
(3, 'Terisi', NULL, '2021-07-17 14:49:21'),
(4, 'Terisi', NULL, '2021-07-20 11:31:57'),
(5, 'Terisi', NULL, '2021-07-20 11:52:16'),
(6, 'Terisi', NULL, '2021-07-20 12:51:21'),
(7, 'Terisi', NULL, '2021-08-02 11:03:34'),
(8, 'Kosong', NULL, NULL),
(9, 'Terisi', NULL, '2021-08-03 07:34:14'),
(10, 'Kosong', NULL, NULL),
(11, 'Kosong', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `table_menu`
--

CREATE TABLE `table_menu` (
  `id_menu` int(10) UNSIGNED NOT NULL,
  `nama_menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_menu` int(11) NOT NULL,
  `kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_penyajian` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_menu`
--

INSERT INTO `table_menu` (`id_menu`, `nama_menu`, `deskripsi`, `harga_menu`, `kategori`, `status`, `waktu_penyajian`, `created_at`, `updated_at`) VALUES
(1, 'Serabi', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi officiis aperiam perspiciatis quibusdam! Pariatur veritatis, repellat quidem nihil at sunt?', 10000, 'Makanan', 'Tersedia', 10, NULL, '2021-07-17 13:07:27'),
(2, 'Soto Ayam', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi officiis aperiam perspiciatis quibusdam! Pariatur veritatis, repellat quidem nihil at sunt?', 30000, 'Makanan', 'Tersedia', 20, NULL, '2021-06-09 02:51:26'),
(3, 'Gulai', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi officiis aperiam perspiciatis quibusdam! Pariatur veritatis, repellat quidem nihil at sunt?', 3000, 'Makanan', 'Tersedia', 26, NULL, '2021-07-13 20:31:37'),
(4, 'Opor Ayam', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi officiis aperiam perspiciatis quibusdam! Pariatur veritatis, repellat quidem nihil at sunt?', 3000, 'Makanan', 'Tersedia', 30, NULL, NULL),
(5, 'Kroket', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi officiis aperiam perspiciatis quibusdam! Pariatur veritatis, repellat quidem nihil at sunt?', 3000, 'Makanan', 'Tersedia', 10, '0000-00-00 00:00:00', NULL),
(6, 'Sayur Lodeh', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi officiis aperiam perspiciatis quibusdam! Pariatur veritatis, repellat quidem nihil at sunt?', 3000, 'Makanan', 'Tersedia', 10, NULL, NULL),
(7, 'Getuk', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi officiis aperiam perspiciatis quibusdam! Pariatur veritatis, repellat quidem nihil at sunt?', 3000, 'Makanan', 'Tersedia', 5, NULL, NULL),
(8, 'Nasi Kucing', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi officiis aperiam perspiciatis quibusdam! Pariatur veritatis, repellat quidem nihil at sunt?', 3000, 'Makanan', 'Tersedia', 10, NULL, NULL),
(9, 'Ayam Bakar', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi officiis aperiam perspiciatis quibusdam! Pariatur veritatis, repellat quidem nihil at sunt?', 3000, 'Makanan', 'Tersedia', 60, NULL, NULL),
(10, 'Siomay', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi officiis aperiam perspiciatis quibusdam! Pariatur veritatis, repellat quidem nihil at sunt?', 3000, 'Makanan', 'Tersedia', 5, NULL, NULL),
(11, 'Red Velvet', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi officiis aperiam perspiciatis quibusdam! Pariatur veritatis, repellat quidem nihil at sunt?', 3000, 'Minuman', 'Tersedia', 5, NULL, '2021-07-17 13:06:28'),
(12, 'Wedang Ronde', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi officiis aperiam perspiciatis quibusdam! Pariatur veritatis, repellat quidem nihil at sunt?', 3000, 'Minuman', 'Tersedia', 5, NULL, NULL),
(13, 'Es Kelapa Muda', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi officiis aperiam perspiciatis quibusdam! Pariatur veritatis, repellat quidem nihil at sunt?', 3000, 'Minuman', 'Tersedia', 5, NULL, NULL),
(14, 'Es Jeruk', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi officiis aperiam perspiciatis quibusdam! Pariatur veritatis, repellat quidem nihil at sunt?', 3000, 'Minuman', 'Tersedia', 10, NULL, NULL),
(15, 'Susu Vanilla', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi officiis aperiam perspiciatis quibusdam! Pariatur veritatis, repellat quidem nihil at sunt?', 3000, 'Minuman', 'Tersedia', 5, NULL, NULL),
(16, 'Susu Coklat', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi officiis aperiam perspiciatis quibusdam! Pariatur veritatis, repellat quidem nihil at sunt?', 3000, 'Minuman', 'Tersedia', 5, NULL, NULL),
(18, 'Susu Hangat', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi officiis aperiam perspiciatis quibusdam! Pariatur veritatis, repellat quidem nihil at sunt?', 3000, 'Minuman', 'Tersedia', 5, NULL, NULL),
(19, 'Es Cendol', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi officiis aperiam perspiciatis quibusdam! Pariatur veritatis, repellat quidem nihil at sunt?', 3000, 'Minuman', 'Tidak Tersedia', 10, NULL, NULL),
(20, 'Kopi', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit.', 3000, 'Minuman', 'Tersedia', 10, NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `table_pegawai`
--

CREATE TABLE `table_pegawai` (
  `kd_pegawai` int(10) UNSIGNED NOT NULL,
  `nama_pegawai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notlp_pegawai` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `almt_pegawai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kd_penguna` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_pegawai`
--

INSERT INTO `table_pegawai` (`kd_pegawai`, `nama_pegawai`, `notlp_pegawai`, `almt_pegawai`, `kd_penguna`, `created_at`, `updated_at`) VALUES
(1, 'Fauzan Lukmanul Hakim', '8888', 'Kopo', 1, NULL, '2021-07-16 02:35:51'),
(2, 'Gentra Aria Wibawa', '08089', 'Lembang', 2, NULL, NULL),
(5, 'Azz', '0099', 'Padalarang', 3, '2021-07-16 02:41:55', '2021-07-16 02:41:55'),
(6, 'rizaldi', '08080', 'Bandung', 4, '2021-07-16 22:44:24', '2021-07-16 22:44:24');

-- --------------------------------------------------------

--
-- Table structure for table `table_pemesanan`
--

CREATE TABLE `table_pemesanan` (
  `id_pemesanan` int(10) UNSIGNED NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `no_meja` int(10) UNSIGNED NOT NULL,
  `status_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_pembayaran` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `table_pemesanan`
--

INSERT INTO `table_pemesanan` (`id_pemesanan`, `tanggal_pemesanan`, `no_meja`, `status_pembayaran`, `total_pembayaran`, `created_at`, `updated_at`) VALUES
(1, '2021-01-21', 1, 'Dibayar', 20000, '2021-07-16 13:05:00', NULL),
(2, '2021-02-02', 7, 'Dibayar', 35000, NULL, NULL),
(3, '2021-03-09', 10, 'Dibayar', 51000, NULL, NULL),
(4, '2021-04-06', 5, 'Dibayar', 40000, NULL, NULL),
(5, '2021-05-12', 10, 'Dibayar', 60000, NULL, NULL),
(64, '2021-06-19', 1, 'Dibayar', 528000, '2021-06-19 06:32:28', '2021-07-15 07:00:57'),
(76, '2021-07-15', 2, 'Dibayar', 30000, '2021-07-15 03:57:53', '2021-07-16 07:34:18'),
(77, '2021-07-17', 2, 'Masih', 0, '2021-07-16 22:36:49', '2021-07-16 22:36:49'),
(78, '2021-07-17', 1, 'Masih', 0, '2021-07-17 12:51:26', '2021-07-17 12:51:26'),
(81, '2021-07-20', 5, 'Masih', 0, '2021-07-20 11:52:06', '2021-07-20 11:52:06'),
(83, '2021-07-20', 6, 'Masih', 0, '2021-07-20 12:51:19', '2021-07-20 12:51:19'),
(85, '2021-08-03', 9, 'Masih', 0, '2021-08-03 07:34:14', '2021-08-03 07:34:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_detail_pemesanan`
--
ALTER TABLE `table_detail_pemesanan`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_menu` (`id_menu`),
  ADD KEY `id_pemesanan` (`id_pemesanan`);

--
-- Indexes for table `table_master`
--
ALTER TABLE `table_master`
  ADD PRIMARY KEY (`kd_pengguna`);

--
-- Indexes for table `table_meja`
--
ALTER TABLE `table_meja`
  ADD PRIMARY KEY (`no_meja`);

--
-- Indexes for table `table_menu`
--
ALTER TABLE `table_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `table_pegawai`
--
ALTER TABLE `table_pegawai`
  ADD PRIMARY KEY (`kd_pegawai`);

--
-- Indexes for table `table_pemesanan`
--
ALTER TABLE `table_pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `no_meja` (`no_meja`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `table_detail_pemesanan`
--
ALTER TABLE `table_detail_pemesanan`
  MODIFY `id_detail` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `table_master`
--
ALTER TABLE `table_master`
  MODIFY `kd_pengguna` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `table_meja`
--
ALTER TABLE `table_meja`
  MODIFY `no_meja` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `table_menu`
--
ALTER TABLE `table_menu`
  MODIFY `id_menu` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `table_pegawai`
--
ALTER TABLE `table_pegawai`
  MODIFY `kd_pegawai` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `table_pemesanan`
--
ALTER TABLE `table_pemesanan`
  MODIFY `id_pemesanan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `table_detail_pemesanan`
--
ALTER TABLE `table_detail_pemesanan`
  ADD CONSTRAINT `table_detail_pemesanan_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `table_menu` (`id_menu`),
  ADD CONSTRAINT `table_detail_pemesanan_ibfk_2` FOREIGN KEY (`id_pemesanan`) REFERENCES `table_pemesanan` (`id_pemesanan`);

--
-- Constraints for table `table_pemesanan`
--
ALTER TABLE `table_pemesanan`
  ADD CONSTRAINT `table_pemesanan_ibfk_1` FOREIGN KEY (`no_meja`) REFERENCES `table_meja` (`no_meja`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
