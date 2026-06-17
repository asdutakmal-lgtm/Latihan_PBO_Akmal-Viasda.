-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 17, 2026 at 02:51 AM
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
-- Database: `db_simulasi_pbo_kelas_akmalviasda.`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_pendaftaran`
--

CREATE TABLE `tabel_pendaftaran` (
  `id_pendaftaran` varchar(10) NOT NULL,
  `nama_calon` varchar(100) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `nilai_ujian` decimal(5,2) NOT NULL,
  `biaya_pendaftaran_dasar` decimal(10,2) NOT NULL,
  `jalur_pendaftaran` enum('Reguler','Prestasi','Kedinasan') NOT NULL,
  `pilihan_prodi` varchar(50) DEFAULT NULL,
  `lokasi_kampus` varchar(50) DEFAULT NULL,
  `jenis_prestasi` varchar(50) DEFAULT NULL,
  `tingkat_prestasi` varchar(30) DEFAULT NULL,
  `sk_ikatan_dinas` varchar(50) DEFAULT NULL,
  `instansi_sponsor` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_pendaftaran`
--

INSERT INTO `tabel_pendaftaran` (`id_pendaftaran`, `nama_calon`, `asal_sekolah`, `nilai_ujian`, `biaya_pendaftaran_dasar`, `jalur_pendaftaran`, `pilihan_prodi`, `lokasi_kampus`, `jenis_prestasi`, `tingkat_prestasi`, `sk_ikatan_dinas`, `instansi_sponsor`) VALUES
('KDN001', 'Oki Setiawan', 'SMAN 1 Taruna Nusantara', '86.00', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-990/IK/2026', 'Kementerian Perhubungan'),
('KDN002', 'Putri Handayani', 'SMAN 1 Sumedang', '89.15', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-102/DINAS/2026', 'Badan Meteorologi Klimatologi Geofisika'),
('KDN003', 'Qori Sandi', 'SMK Kehutanan Makassar', '83.40', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-442/HUT/2026', 'Kementerian Lingkungan Hidup'),
('KDN004', 'Rian Hidayat', 'SMAN 3 Padang', '91.00', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-881/IK/2026', 'Kementerian Perhubungan'),
('KDN005', 'Siti Aminah', 'MAN 1 Yogyakarta', '87.80', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-055/KMT/2026', 'Kementerian Keuangan'),
('KDN006', 'Taufik Hidayat', 'SMAN 2 Balikpapan', '84.50', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-109/DINAS/2026', 'Badan Meteorologi Klimatologi Geofisika'),
('KDN007', 'Utari Lestari', 'SMAN 1 Jayapura', '85.20', '300000.00', 'Kedinasan', NULL, NULL, NULL, NULL, 'SK-059/KMT/2026', 'Kementerian Keuangan'),
('PRS001', 'Hadi Syahputra', 'SMAN 1 Boyolali', '95.00', '150000.00', 'Prestasi', 'Teknik Elektro', 'Kampus Utama', 'Olimpiade Fisika', 'Nasional', NULL, NULL),
('PRS002', 'Indah Permata', 'SMAN 2 Semarang', '91.50', '150000.00', 'Prestasi', 'Farmasi', 'Kampus Utama', 'Karya Ilmiah Remaja', 'Provinsi', NULL, NULL),
('PRS003', 'Kevin Sanjaya', 'SMA Ragunan Jakarta', '80.00', '150000.00', 'Prestasi', 'Pendidikan Olahraga', 'Kampus B', 'Bulutangkis Tunggal', 'Internasional', NULL, NULL),
('PRS004', 'Larasati Dewi', 'SMAN 1 Surakarta', '89.70', '150000.00', 'Prestasi', 'Sastra Inggris', 'Kampus C', 'Debat Bahasa Inggris', 'Nasional', NULL, NULL),
('PRS005', 'Muhammad Rizky', 'MAN 2 Malang', '94.20', '150000.00', 'Prestasi', 'Teknik Mesin', 'Kampus Utama', 'Robotika', 'Nasional', NULL, NULL),
('PRS006', 'Nadia Utami', 'SMAN 3 Banda Aceh', '87.50', '150000.00', 'Prestasi', 'Hukum', 'Kampus B', 'Juara 1 Musabaqah', 'Provinsi', NULL, NULL),
('REG001', 'Ahmad Subarjo', 'SMAN 1 Jakarta', '85.50', '250000.00', 'Reguler', 'Teknik Informatika', 'Kampus Utama', NULL, NULL, NULL, NULL),
('REG002', 'Budi Santoso', 'SMAN 3 Bandung', '78.25', '250000.00', 'Reguler', 'Sistem Informasi', 'Kampus Utama', NULL, NULL, NULL, NULL),
('REG003', 'Citra Lestari', 'SMK 2 Surabaya', '90.00', '250000.00', 'Reguler', 'Akuntansi', 'Kampus B', NULL, NULL, NULL, NULL),
('REG004', 'Dedi Wijaya', 'SMAN 5 Yogyakarta', '82.10', '250000.00', 'Reguler', 'Manajemen', 'Kampus B', NULL, NULL, NULL, NULL),
('REG005', 'Eka Putri', 'SMAN 1 Medan', '88.40', '250000.00', 'Reguler', 'Teknik Sipil', 'Kampus Utama', NULL, NULL, NULL, NULL),
('REG006', 'Fajar Ramadhan', 'SMA Kristen Petra', '79.90', '250000.00', 'Reguler', 'Ilmu Komunikasi', 'Kampus C', NULL, NULL, NULL, NULL),
('REG007', 'Gita Gutawa', 'SMAN 8 Jakarta', '92.30', '250000.00', 'Reguler', 'Kedokteran', 'Kampus Utama', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_pendaftaran`
--
ALTER TABLE `tabel_pendaftaran`
  ADD PRIMARY KEY (`id_pendaftaran`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
