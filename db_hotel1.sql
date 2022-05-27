-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 25, 2022 at 09:46 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hotel1`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_kamar`
--

CREATE TABLE `detail_kamar` (
  `id_detail_kamar` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `keterangan_kamar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fasilitas` int(11) NOT NULL,
  `nama_fasilitas` varchar(50) NOT NULL,
  `deskripsi_fasilitas` text NOT NULL,
  `foto_fasilitas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fasilitas`
--

INSERT INTO `fasilitas` (`id_fasilitas`, `nama_fasilitas`, `deskripsi_fasilitas`, `foto_fasilitas`) VALUES
(28, 'masjid', 'nyaman untuk beribadah', 'masjid.jpg'),
(29, 'kolam renang', 'tersedia untuk anak dan dewasa', 'kolam_1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int(11) NOT NULL,
  `no_kamar` char(10) NOT NULL,
  `id_tipe_kamar` int(11) NOT NULL,
  `status` enum('Dalam perbaikan','Sudah dipesan','Free','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `no_kamar`, `id_tipe_kamar`, `status`) VALUES
(45, '001', 1, 'Sudah dipesan'),
(46, '002', 3, 'Dalam perbaikan'),
(53, '003', 4, 'Dalam perbaikan');

-- --------------------------------------------------------

--
-- Table structure for table `reservasi`
--

CREATE TABLE `reservasi` (
  `id_reservasi` int(11) NOT NULL,
  `nik_pemesan` char(20) NOT NULL,
  `id_tipe_kamar` int(11) NOT NULL,
  `tgl_cek_in` date NOT NULL,
  `tgl_cek_out` date NOT NULL,
  `jumlah_kamar_dipesan` int(11) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `nama_pemesan` varchar(30) NOT NULL,
  `email_pemesan` varchar(35) NOT NULL,
  `alamat_pemesan` text NOT NULL,
  `no_telp_pemesan` char(13) NOT NULL,
  `status_kamar` enum('cek-in','cek-out','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservasi`
--

INSERT INTO `reservasi` (`id_reservasi`, `nik_pemesan`, `id_tipe_kamar`, `tgl_cek_in`, `tgl_cek_out`, `jumlah_kamar_dipesan`, `harga`, `nama_pemesan`, `email_pemesan`, `alamat_pemesan`, `no_telp_pemesan`, `status_kamar`) VALUES
(35, '32425533t', 3, '2022-05-01', '2022-05-02', 1, 120000, 'luki aryanto', 'lukiaryanto05@gmail.com', 'kongsi', '098765400000', 'cek-in'),
(36, '32425533t', 4, '2022-05-06', '2022-05-07', 2, 600000, 'luki', 'lukiaryanto05@gmail.com', 'kongsi', '0987654', 'cek-in'),
(37, '32425533t', 1, '2022-05-06', '2022-05-06', 1, 0, 'tio azam', 'lukiaryanto05@gmail.com', 'kongsi', '0987654', 'cek-out'),
(38, '32425533t', 1, '2022-05-04', '2022-05-05', 1, 100000, 'luki aja', 'lukiaryanto05@gmail.com', 'kongsi', '0987654', 'cek-out'),
(40, '32425533t', 1, '2022-05-11', '2022-05-12', 1, 110000, 'luki', 'lukiaryanto05@gmail.com', 'kongsi', '0987654', 'cek-in');

-- --------------------------------------------------------

--
-- Table structure for table `tipe_kamar`
--

CREATE TABLE `tipe_kamar` (
  `id_tipe_kamar` int(11) NOT NULL,
  `tipe_kamar` varchar(128) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tipe_kamar`
--

INSERT INTO `tipe_kamar` (`id_tipe_kamar`, `tipe_kamar`, `harga`, `foto`, `deskripsi`) VALUES
(1, 'deluxe room', 110000, 'kamar1_3.jpg', 'Ukuran kamar 4M, Tv 15 inch, wifi berkafasitas 11mbps'),
(3, 'Standar Room', 120000, 'kamar2_1.jpg', 'Ukuran kamar 4M, Tv 20 inch, wifi berkafasitas 10mbps'),
(4, 'Presidential Suite ', 300000, 'kamar3_1.jpg', 'Ukuran kamar 4M, Tv 30 inch, wifi berkafasitas 10mbps'),
(5, 'Superior Room', 200000, 'kamar4_1.jpg', 'Ukuran kamar 4M, Tv 25 inch, wifi berkafasitas 10mbps'),
(9, 'coba', 123333, 'wifi_2.jpg', 'nnn');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` enum('admin','resepsionis') NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `password`, `level`, `username`) VALUES
(5, 'admin', '202cb962ac59075b964b07152d234b70', 'admin', 'admin'),
(6, 'reservasi', '202cb962ac59075b964b07152d234b70', 'resepsionis', 'resepsionis');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_kamar`
--
ALTER TABLE `detail_kamar`
  ADD PRIMARY KEY (`id_detail_kamar`),
  ADD KEY `id_kamar` (`id_kamar`);

--
-- Indexes for table `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`,`no_kamar`),
  ADD KEY `kamar_ibfk_1` (`id_tipe_kamar`);

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id_reservasi`),
  ADD KEY `reservasi_ibfk_2` (`id_tipe_kamar`);

--
-- Indexes for table `tipe_kamar`
--
ALTER TABLE `tipe_kamar`
  ADD PRIMARY KEY (`id_tipe_kamar`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_kamar`
--
ALTER TABLE `detail_kamar`
  MODIFY `id_detail_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id_reservasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tipe_kamar`
--
ALTER TABLE `tipe_kamar`
  MODIFY `id_tipe_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_kamar`
--
ALTER TABLE `detail_kamar`
  ADD CONSTRAINT `detail_kamar_ibfk_1` FOREIGN KEY (`id_kamar`) REFERENCES `kamar` (`id_kamar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kamar`
--
ALTER TABLE `kamar`
  ADD CONSTRAINT `kamar_ibfk_1` FOREIGN KEY (`id_tipe_kamar`) REFERENCES `tipe_kamar` (`id_tipe_kamar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD CONSTRAINT `reservasi_ibfk_2` FOREIGN KEY (`id_tipe_kamar`) REFERENCES `tipe_kamar` (`id_tipe_kamar`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
