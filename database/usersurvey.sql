-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2021 at 01:18 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `usersurvey`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `usertype` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `usertype`) VALUES
(1, 'admin1', 'admin', 'user'),
(2, 'rendi', '123', 'user'),
(3, 'rendi7', '123', 'user'),
(4, 'lala', 'lili', 'user'),
(5, 'lili', 'lala', 'user'),
(6, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `dataperusahaan`
--

CREATE TABLE `dataperusahaan` (
  `id` int(40) NOT NULL,
  `namaPerusahaan` varchar(50) NOT NULL,
  `alamatPerusahaan` text NOT NULL,
  `emailPerusahaan` varchar(60) NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dataperusahaan`
--

INSERT INTO `dataperusahaan` (`id`, `namaPerusahaan`, `alamatPerusahaan`, `emailPerusahaan`, `no_telp`) VALUES
(1, 'PT TEMBAGA', 'Tangerang Selatan', 'rendi@gmail.com', '028124125'),
(2, 'pt pln', 'lampung', 'itpln@stt.ac.id', '0241237523'),
(3, 'pt pln', 'jawa', 'pln@gmail.go.id', '021241256'),
(4, 'PT Indo Power', 'Jakarta Barat', 'indopower@gmail.go.id', '08921242358'),
(5, 'PT Indo Power', 'Jakarta Barat', 'indopower@gmail.go.id', '08921242358'),
(6, 'pt pln', 'Jakarta Barat', 'pln@gmail.go.id', '08921242358'),
(7, 'PT Indo Jaya', 'Jakarta Barat', 'indojaya@gmail.com', '0823523667'),
(8, 'PT Indo Jaya', 'Jakarta Barat', 'indojaya@gmail.com', '0823523667'),
(9, 'pt pln', 'asfaw', '12ewdas@mail.com', '21435');

-- --------------------------------------------------------

--
-- Table structure for table `quisioner`
--

CREATE TABLE `quisioner` (
  `Tanggal` date NOT NULL,
  `namaInstansi` varchar(100) NOT NULL,
  `skalaPerusahaan` varchar(50) NOT NULL,
  `namaAlumni` varchar(50) NOT NULL,
  `jabatanAlumni` varchar(50) NOT NULL,
  `Prodi` varchar(40) NOT NULL,
  `kesesuaianBidang` varchar(10) NOT NULL,
  `Integritas` int(15) NOT NULL,
  `Profesionalisme` int(15) NOT NULL,
  `kemampuanBerbahasaAsing` int(15) NOT NULL,
  `penggunaanTeknologiInformasi` int(15) NOT NULL,
  `kemampuanBerkomunikasi` int(15) NOT NULL,
  `Kerjasama` int(15) NOT NULL,
  `pengembanganDiri` int(15) NOT NULL,
  `Usulan` text NOT NULL,
  `namaAtasan` varchar(50) NOT NULL,
  `uploadSignature` longblob NOT NULL,
  `drawSignature` blob NOT NULL,
  `locationSignature` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quisioner`
--

INSERT INTO `quisioner` (`Tanggal`, `namaInstansi`, `skalaPerusahaan`, `namaAlumni`, `jabatanAlumni`, `Prodi`, `kesesuaianBidang`, `Integritas`, `Profesionalisme`, `kemampuanBerbahasaAsing`, `penggunaanTeknologiInformasi`, `kemampuanBerkomunikasi`, `Kerjasama`, `pengembanganDiri`, `Usulan`, `namaAtasan`, `uploadSignature`, `drawSignature`, `locationSignature`) VALUES
('2021-06-04', 'pln jakarta', 'Multinasional', 'zaza', 'manager', '', 'Sedang', 4, 4, 4, 4, 4, 4, 4, '', 'dono', '', '', ''),
('2021-06-25', 'PLN', 'Multinasional', 'zaza', 'manager', '', 'Rendah', 4, 3, 2, 3, 4, 3, 4, '', 'dono', '', 0x7369676e6174757265496d6167652f363064313839363834613364312e706e67, ''),
('2021-06-25', 'PLN', 'Multinasional', 'zaza', 'manager', '', 'Rendah', 4, 3, 2, 3, 4, 3, 4, '', 'dono', '', '', 'signatureImage/60d18a32a922b.png'),
('2021-06-25', 'PLN', 'Multinasional', 'zaza', 'manager', '', 'Rendah', 4, 3, 2, 3, 4, 3, 4, '', 'dono', '', '', 'signatureImage/60d18a8528cd5.png'),
('2021-06-24', 'PLN', 'Lokal/Wilayah/Berwirausaha tidak berbadan hukum', 'zaza', 'manager', 'S1 Teknik Elektro', 'Tinggi', 4, 3, 4, 3, 2, 0, 4, '', 'dono', '', '', 'signatureImage/60d18ab16f2d4.png'),
('2021-06-24', 'PLN', 'Lokal/Wilayah/Berwirausaha tidak berbadan hukum', 'zaza', 'manager', 'S1 Teknik Elektro', 'Tinggi', 4, 3, 4, 3, 2, 3, 4, '', 'dono', '', '', 'signatureImage/60d18c7566468.png'),
('2021-06-19', 'PLN', 'Lokal/Wilayah/Berwirausaha tidak berbadan hukum', 'zaza', 'manager', 'S1 Teknik Informatika', 'Sedang', 0, 0, 0, 0, 0, 0, 0, '', 'dono', '', '', 'signatureImage/60d18cbb4bbd8.png'),
('2021-06-18', 'PLN', 'Multinasional', 'zaza', 'manager', 'S1 Teknik Mesin', 'Sedang', 3, 3, 4, 4, 3, 4, 4, '', 'dono', '', '', 'signatureImage/60d18dac57bba.png'),
('2021-06-25', 'PLN', 'Multinasional', 'zaza', 'manager', 'S1 Teknik Sipil', 'Tinggi', 4, 3, 4, 4, 4, 4, 4, '', 'dono', '', '', 'signatureImage/60d2af823540a.png'),
('2021-06-25', 'PLN', 'Multinasional', 'zaza', 'manager', 'S1 Teknik Sipil', 'Tinggi', 4, 3, 4, 4, 4, 4, 4, '', 'dono', '', '', 'signatureImage/60d2b4b4ee092.png'),
('2021-06-25', 'PLN', 'Multinasional', 'zaza', 'manager', 'S1 Teknik Sipil', 'Tinggi', 4, 3, 4, 4, 4, 4, 4, '', 'dono', '', '', 'signatureImage/60d2b57a526c8.png'),
('2021-06-25', 'PLN', 'Multinasional', 'zaza', 'manager', 'S1 Teknik Sipil', 'Tinggi', 4, 3, 4, 4, 4, 4, 4, '', 'dono', '', '', 'signatureImage/60d2b5d844c21.png'),
('2021-06-25', 'PLN', 'Multinasional', 'zaza', 'manager', 'S1 Teknik Sipil', 'Tinggi', 4, 3, 4, 4, 4, 4, 4, '', 'dono', '', '', 'signatureImage/60d2cb567f14f.png'),
('2021-06-25', 'PLN', 'Multinasional', 'zaza', 'manager', 'S1 Teknik Sipil', 'Tinggi', 4, 3, 4, 4, 4, 4, 4, '', 'dono', '', '', 'signatureImage/60d2cc4a61f83.png'),
('2021-06-25', 'PLN', 'Multinasional', 'zaza', 'manager', 'S1 Teknik Sipil', 'Tinggi', 4, 3, 4, 4, 4, 4, 4, '', 'dono', '', '', 'signatureImage/60d2cc7f713f1.png'),
('2021-06-25', 'PLN', 'Multinasional', 'zaza', 'manager', 'S1 Teknik Sipil', 'Tinggi', 4, 3, 4, 4, 4, 4, 4, '', 'dono', '', '', 'signatureImage/60d2cd1c1a222.png'),
('2021-06-25', 'PLN', 'Multinasional', 'zaza', 'manager', 'S1 Teknik Sipil', 'Tinggi', 4, 3, 4, 4, 4, 4, 4, '', 'dono', '', '', 'signatureImage/60d2cf0e36ad2.png'),
('2021-06-25', 'PLN', 'Multinasional', 'zaza', 'manager', 'S1 Teknik Sipil', 'Tinggi', 4, 3, 4, 4, 4, 4, 4, '', 'dono', '', '', 'signatureImage/60d2d2eeb866c.png'),
('2021-06-25', 'PLN', 'Multinasional', 'zaza', 'manager', 'S1 Teknik Sipil', 'Tinggi', 4, 3, 4, 4, 4, 4, 4, '', 'dono', '', '', 'signatureImage/60d2d30fdcffa.png'),
('2021-06-25', 'PLN', 'Multinasional', 'zaza', 'manager', 'S1 Teknik Sipil', 'Tinggi', 4, 3, 4, 4, 4, 4, 4, '', 'dono', '', '', 'signatureImage/60d2d3375ff1a.png'),
('2021-06-25', 'PLN', 'Multinasional', 'zaza', 'manager', 'S1 Teknik Sipil', 'Tinggi', 4, 3, 4, 4, 4, 4, 4, '', 'dono', '', '', 'signatureImage/60d2d5d144aed.png'),
('2021-06-25', 'PLN', 'Multinasional', 'zaza', 'manager', 'S1 Teknik Sipil', 'Tinggi', 4, 3, 4, 4, 4, 4, 4, '', 'dono', '', '', 'signatureImage/60d2d628865fa.png'),
('2021-07-13', 'PLN', 'Multinasional', 'zaza', 'manager', 'S1 Teknik Elektro', 'Sedang', 4, 3, 3, 4, 4, 3, 3, '', 'dono', '', '', 'signatureImage/60deda5a0392e.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`,`username`);

--
-- Indexes for table `dataperusahaan`
--
ALTER TABLE `dataperusahaan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `dataperusahaan`
--
ALTER TABLE `dataperusahaan`
  MODIFY `id` int(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
