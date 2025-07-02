-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 02, 2025 at 11:53 AM
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
-- Database: `db-simasjid-ci4`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_agenda`
--

CREATE TABLE `tbl_agenda` (
  `id_agenda` int NOT NULL,
  `nama_kegiatan` varchar(255) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `jam` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_agenda`
--

INSERT INTO `tbl_agenda` (`id_agenda`, `nama_kegiatan`, `tanggal`, `jam`) VALUES
(1, 'Kajian Bersama ust nisa', '2025-04-16', '10:30:26'),
(2, 'Kajian Rutin (Seninan)', '2025-04-21', '19:30:41'),
(10, 'kajian ustazah lia', '2025-04-28', '12:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_anggota_kelompok`
--

CREATE TABLE `tbl_anggota_kelompok` (
  `id_anggota` int NOT NULL,
  `id_kelompok` int DEFAULT NULL,
  `nama_peserta` varchar(100) DEFAULT NULL,
  `biaya` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_anggota_kelompok`
--

INSERT INTO `tbl_anggota_kelompok` (`id_anggota`, `id_kelompok`, `nama_peserta`, `biaya`) VALUES
(21, 3, 'febri', 200000),
(22, 6, 'sisi', 200000),
(23, 8, 'lia', 1000000),
(24, 4, 'tuti', 3000000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donasi`
--

CREATE TABLE `tbl_donasi` (
  `id_donasi` int NOT NULL,
  `tgl` date DEFAULT NULL,
  `id_rekening` int DEFAULT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `no_rekening` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nama_pengirim` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `jumlah` int DEFAULT NULL,
  `jenis_donasi` varchar(10) DEFAULT NULL,
  `bukti` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_donasi`
--

INSERT INTO `tbl_donasi` (`id_donasi`, `tgl`, `id_rekening`, `nama_bank`, `no_rekening`, `nama_pengirim`, `jumlah`, `jenis_donasi`, `bukti`) VALUES
(1, '2025-06-30', 1, 'Bank BRI', '2277-9911-0023', 'Nisa ', 200000, 'masjid', '1751253785_8a1b2e0b43bb3ebd0dd2.png'),
(2, '2025-06-30', 2, 'Bank Mandiri', '2430-9911-0023', 'Tuti', 250000, 'masjid', '1751253911_b8087346213038b7a2d6.png'),
(3, '2025-01-30', 3, 'Bank BSI', '1099-9911-0023', 'Febri', 150000, 'Sosial', '1751254159_c366488700661899ce78.png'),
(4, '2025-06-30', 4, 'Bank BRI', '0981-5611-9065', 'Lia', 300000, 'sosial', '1751260433_8eb66649fafca0bd8d6f.png'),
(5, '2025-06-30', 5, 'Bank BRI', '0981-5611-9065', 'Lia', 300000, 'sosial', '1751260463_84a2ae2a79f3507ff48d.png'),
(6, '2025-06-30', 6, 'Bank BRI', '0981-5611-9065', 'Lia', 250000, 'Masjid', '1751261162_ffc46643a2b7bff7386e.png'),
(7, '2025-06-30', 1, 'Bank BRI', '0911-5611-7641', 'iva', 200000, 'Masjid', '1751264837_19603480c53bbc12dcd4.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kas_masjid`
--

CREATE TABLE `tbl_kas_masjid` (
  `id_kas` int NOT NULL,
  `tanggal` date DEFAULT NULL,
  `ket` varchar(255) DEFAULT NULL,
  `kas_masuk` int DEFAULT NULL,
  `kas_keluar` int DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_kas_masjid`
--

INSERT INTO `tbl_kas_masjid` (`id_kas`, `tanggal`, `ket`, `kas_masuk`, `kas_keluar`, `status`) VALUES
(1, '2025-05-06', 'Saldo Awal', 10000000, 0, 'Masuk'),
(2, '2025-05-06', 'Pembayaran PDAM', 0, 150000, 'Keluar'),
(3, '2025-05-06', 'Pembayaran Tagihan Listrik Bulan Agustus 2025', 0, 250000, 'Keluar'),
(4, '2025-06-29', 'donasi', 3000000, 0, 'Masuk'),
(5, '2025-06-29', 'donasi masjid', 300000, 0, 'Masuk');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kas_sosial`
--

CREATE TABLE `tbl_kas_sosial` (
  `id_kas_sosial` int NOT NULL,
  `tanggal` date DEFAULT NULL,
  `ket` varchar(255) DEFAULT NULL,
  `kas_masuk` int DEFAULT NULL,
  `kas_keluar` int DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_kas_sosial`
--

INSERT INTO `tbl_kas_sosial` (`id_kas_sosial`, `tanggal`, `ket`, `kas_masuk`, `kas_keluar`, `status`) VALUES
(1, '2025-06-28', 'donasi', 1000, 0, 'Masuk'),
(2, '2025-06-30', 'Donasi', 80000000, 0, 'Masuk');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelompok`
--

CREATE TABLE `tbl_kelompok` (
  `id_kelompok` int NOT NULL,
  `id_tahun` int NOT NULL,
  `nama_kelompok` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_kelompok`
--

INSERT INTO `tbl_kelompok` (`id_kelompok`, `id_tahun`, `nama_kelompok`) VALUES
(1, 1, 'kelompok 1'),
(2, 1, 'kelompok 2'),
(3, 6, 'kelompok 2'),
(4, 6, 'kelompok 3'),
(6, 7, 'kelompok 1'),
(8, 7, 'Kambing 1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rekening`
--

CREATE TABLE `tbl_rekening` (
  `id_rekening` int NOT NULL,
  `nama_bank` varchar(50) DEFAULT NULL,
  `no_rekening` varchar(25) DEFAULT NULL,
  `atas_nama` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_rekening`
--

INSERT INTO `tbl_rekening` (`id_rekening`, `nama_bank`, `no_rekening`, `atas_nama`) VALUES
(1, 'Bank BRI', '8573-2327-8593', 'Masjid Nurul Iman'),
(3, 'Bank BSI', '7566-9911-0023', 'Masjid Nurul Iman'),
(4, 'Bank Mandiri', '2197-5611-9023', 'Masjid Nurul Iman');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_setting`
--

CREATE TABLE `tbl_setting` (
  `id` int NOT NULL,
  `nama_masjid` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_kota` varchar(5) NOT NULL,
  `nama_kota` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_setting`
--

INSERT INTO `tbl_setting` (`id`, `nama_masjid`, `id_kota`, `nama_kota`, `alamat`) VALUES
(1, 'Masjid KH.Ahmad Dahlan', '1406', ' KAB. BREBES', 'JL. PAGOJENGAN');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tahun`
--

CREATE TABLE `tbl_tahun` (
  `id_tahun` int NOT NULL,
  `tahun_h` varchar(4) DEFAULT NULL,
  `tahun_m` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_tahun`
--

INSERT INTO `tbl_tahun` (`id_tahun`, `tahun_h`, `tahun_m`) VALUES
(6, '2604', '2025'),
(7, '1444', '2022');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `email`, `password`) VALUES
(4, 'admin@gmail.com', '$2y$10$deSNcyaNLNNBikh5Pk5Xxu9oXweTLNlY0d8rJy5hb7i8Fcoo/5k9S');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_agenda`
--
ALTER TABLE `tbl_agenda`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Indexes for table `tbl_anggota_kelompok`
--
ALTER TABLE `tbl_anggota_kelompok`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `tbl_donasi`
--
ALTER TABLE `tbl_donasi`
  ADD PRIMARY KEY (`id_donasi`);

--
-- Indexes for table `tbl_kas_masjid`
--
ALTER TABLE `tbl_kas_masjid`
  ADD PRIMARY KEY (`id_kas`);

--
-- Indexes for table `tbl_kas_sosial`
--
ALTER TABLE `tbl_kas_sosial`
  ADD PRIMARY KEY (`id_kas_sosial`);

--
-- Indexes for table `tbl_kelompok`
--
ALTER TABLE `tbl_kelompok`
  ADD PRIMARY KEY (`id_kelompok`);

--
-- Indexes for table `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indexes for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tahun`
--
ALTER TABLE `tbl_tahun`
  ADD PRIMARY KEY (`id_tahun`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_agenda`
--
ALTER TABLE `tbl_agenda`
  MODIFY `id_agenda` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_anggota_kelompok`
--
ALTER TABLE `tbl_anggota_kelompok`
  MODIFY `id_anggota` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_donasi`
--
ALTER TABLE `tbl_donasi`
  MODIFY `id_donasi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_kas_masjid`
--
ALTER TABLE `tbl_kas_masjid`
  MODIFY `id_kas` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_kas_sosial`
--
ALTER TABLE `tbl_kas_sosial`
  MODIFY `id_kas_sosial` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_kelompok`
--
ALTER TABLE `tbl_kelompok`
  MODIFY `id_kelompok` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_rekening`
--
ALTER TABLE `tbl_rekening`
  MODIFY `id_rekening` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_setting`
--
ALTER TABLE `tbl_setting`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_tahun`
--
ALTER TABLE `tbl_tahun`
  MODIFY `id_tahun` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
