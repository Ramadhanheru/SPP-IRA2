-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 08, 2021 at 04:10 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spp_ira`
--

-- --------------------------------------------------------

--
-- Table structure for table `kas`
--

CREATE TABLE `kas` (
  `id_kas` int(11) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kas`
--

INSERT INTO `kas` (`id_kas`, `nominal`) VALUES
(1, 3472000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksii`
--

CREATE TABLE `transaksii` (
  `id_transaksi` int(11) NOT NULL,
  `no_perkara` varchar(60) NOT NULL,
  `tanggal` text NOT NULL,
  `panjar1` int(11) NOT NULL DEFAULT 0,
  `panjar2` int(11) NOT NULL DEFAULT 0,
  `panjar3` int(11) NOT NULL DEFAULT 0,
  `panjar4` int(11) NOT NULL DEFAULT 0,
  `tambah_panjar` int(11) NOT NULL DEFAULT 0,
  `sisa_panjar` int(11) NOT NULL DEFAULT 0,
  `negara_panjar` int(11) NOT NULL DEFAULT 0,
  `panggilan_penggugat` int(11) NOT NULL DEFAULT 0,
  `panggilan_tergugat` int(11) NOT NULL DEFAULT 0,
  `panggilan_pemohon` int(11) NOT NULL DEFAULT 0,
  `pemberitahuan_penggugat` int(11) NOT NULL DEFAULT 0,
  `pemberitahuan_tergugat` int(11) NOT NULL DEFAULT 0,
  `pemeriksaan` int(11) NOT NULL DEFAULT 0,
  `materai` int(11) NOT NULL DEFAULT 0,
  `pnbp` int(11) NOT NULL DEFAULT 0,
  `biaya_proses` int(11) NOT NULL DEFAULT 0,
  `redaksi` int(11) NOT NULL DEFAULT 0,
  `delegasi` int(11) NOT NULL DEFAULT 0,
  `keterangan` varchar(60) DEFAULT NULL,
  `saldo` int(11) NOT NULL,
  `update_saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksii`
--

INSERT INTO `transaksii` (`id_transaksi`, `no_perkara`, `tanggal`, `panjar1`, `panjar2`, `panjar3`, `panjar4`, `tambah_panjar`, `sisa_panjar`, `negara_panjar`, `panggilan_penggugat`, `panggilan_tergugat`, `panggilan_pemohon`, `pemberitahuan_penggugat`, `pemberitahuan_tergugat`, `pemeriksaan`, `materai`, `pnbp`, `biaya_proses`, `redaksi`, `delegasi`, `keterangan`, `saldo`, `update_saldo`) VALUES
(35, '52/pdt-P/2021/PN NBA', '2021-10-08', 30000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'AHAH', 3472000, 3502000),
(36, 'abcdf123', '2021-10-08', 0, 50000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'aaa', 3502000, 3552000),
(37, 'aaa', '2021-10-08', 0, 0, 0, 0, 150000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'bbb', 3552000, 3702000),
(38, '52/pdt-P/2021/PN NBA', '2021-10-08', 0, 0, 0, 0, 0, 2000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', 3702000, 3700000),
(39, '52/pdt-P/2021/PN NBA', '2021-10-08', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 50000, 0, 0, 'ccc', 3700000, 3650000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(60) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `photo` varchar(120) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `jabatan`, `photo`, `role`) VALUES
(1, 'admin', '$2y$10$hpBa2/yx7eGzptPq/hwPEuWb8O6h/Lh/sdCdOAzsp9hq.Sdu4MOmy', 'IRA NOVIRA, A.Md. Kom.', 'Kasir Perkara', 'logo-free.png', 1),
(3, 'herua', '$2y$10$8W.1223Tk0p6URHIZYa9suIWwOpXkMsoQLbPgkqLPEEoI.gih0mlW', 'EDY SWADESI,S.H.', 'Plt. Panitera', '5f412fab98e791.jpg', 2),
(4, 'wawan', '$2y$10$4yG7LdXfKv0UKfWV/xeQuuzq2j6tqWVBrKSTHRmcTbMUKke.XwBuO', 'GILANG PAMUNGKAS S.H', 'Plt. Ketua Pengadilan Ngaban', '0.png', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kas`
--
ALTER TABLE `kas`
  ADD PRIMARY KEY (`id_kas`);

--
-- Indexes for table `transaksii`
--
ALTER TABLE `transaksii`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kas`
--
ALTER TABLE `kas`
  MODIFY `id_kas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksii`
--
ALTER TABLE `transaksii`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
