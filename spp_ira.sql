-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2021 at 07:49 AM
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
-- Table structure for table `biaya_daftar`
--

CREATE TABLE `biaya_daftar` (
  `id_biaya_daftar` int(11) NOT NULL,
  `nama_item` varchar(50) NOT NULL,
  `harga_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biaya_daftar`
--

INSERT INTO `biaya_daftar` (`id_biaya_daftar`, `nama_item`, `harga_item`) VALUES
(0, '--Pilih Biaya daftar--', 0);

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
(1, 10000000);

-- --------------------------------------------------------

--
-- Table structure for table `panggilan_penggugat`
--

CREATE TABLE `panggilan_penggugat` (
  `id_panggilan_penggugat` int(11) NOT NULL,
  `nama_item` varchar(50) NOT NULL,
  `harga_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `panggilan_penggugat`
--

INSERT INTO `panggilan_penggugat` (`id_panggilan_penggugat`, `nama_item`, `harga_item`) VALUES
(0, '--Pilih biaya panggilan penggugat--', 0);

-- --------------------------------------------------------

--
-- Table structure for table `panggilan_tergugat`
--

CREATE TABLE `panggilan_tergugat` (
  `id_panggilan_tergugat` int(11) NOT NULL,
  `nama_item` varchar(50) NOT NULL,
  `harga_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `panggilan_tergugat`
--

INSERT INTO `panggilan_tergugat` (`id_panggilan_tergugat`, `nama_item`, `harga_item`) VALUES
(0, '--Pilih biaya panggilan tergugat--', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pemberitahuan_penggugat`
--

CREATE TABLE `pemberitahuan_penggugat` (
  `id_pemberitahuan_penggugat` int(11) NOT NULL,
  `nama_item` varchar(50) NOT NULL,
  `harga_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemberitahuan_penggugat`
--

INSERT INTO `pemberitahuan_penggugat` (`id_pemberitahuan_penggugat`, `nama_item`, `harga_item`) VALUES
(0, '--Pilih pemberitahuan penggugat--', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pemberitahuan_tergugat`
--

CREATE TABLE `pemberitahuan_tergugat` (
  `id_pemberitahuan_tergugat` int(11) NOT NULL,
  `nama_item` varchar(50) NOT NULL,
  `harga_item` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemberitahuan_tergugat`
--

INSERT INTO `pemberitahuan_tergugat` (`id_pemberitahuan_tergugat`, `nama_item`, `harga_item`) VALUES
(0, '--Pilih pemberitahuan tergugat--', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `no_perkara` varchar(60) NOT NULL,
  `id_biaya_daftar` int(11) DEFAULT NULL,
  `biaya_proses` int(11) DEFAULT NULL,
  `id_panggilan_penggugat` int(11) DEFAULT NULL,
  `id_panggilan_tergugat` int(11) DEFAULT NULL,
  `id_pemberitahuan_penggugat` int(11) DEFAULT NULL,
  `id_pemberitahuan_tergugat` int(11) DEFAULT NULL,
  `pnbp` int(11) DEFAULT NULL,
  `materai` int(11) DEFAULT NULL,
  `redaksi` int(11) DEFAULT NULL,
  `panjar` int(11) DEFAULT NULL,
  `tambah_panjar` int(11) DEFAULT NULL,
  `sisa_panjar` int(11) DEFAULT NULL,
  `delegasi_panggilan` int(11) DEFAULT NULL,
  `delegasi_pemberitahuan` int(11) DEFAULT NULL,
  `delegasi_pengiriman` int(11) DEFAULT NULL,
  `keterangan` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for table `biaya_daftar`
--
ALTER TABLE `biaya_daftar`
  ADD PRIMARY KEY (`id_biaya_daftar`);

--
-- Indexes for table `kas`
--
ALTER TABLE `kas`
  ADD PRIMARY KEY (`id_kas`);

--
-- Indexes for table `panggilan_penggugat`
--
ALTER TABLE `panggilan_penggugat`
  ADD PRIMARY KEY (`id_panggilan_penggugat`);

--
-- Indexes for table `panggilan_tergugat`
--
ALTER TABLE `panggilan_tergugat`
  ADD PRIMARY KEY (`id_panggilan_tergugat`);

--
-- Indexes for table `pemberitahuan_penggugat`
--
ALTER TABLE `pemberitahuan_penggugat`
  ADD PRIMARY KEY (`id_pemberitahuan_penggugat`);

--
-- Indexes for table `pemberitahuan_tergugat`
--
ALTER TABLE `pemberitahuan_tergugat`
  ADD PRIMARY KEY (`id_pemberitahuan_tergugat`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_biaya_daftar` (`id_biaya_daftar`),
  ADD KEY `id_panggilan_penggugat` (`id_panggilan_penggugat`),
  ADD KEY `id_panggilan_tergugat` (`id_panggilan_tergugat`),
  ADD KEY `id_pemberitahuan_penggugat` (`id_pemberitahuan_penggugat`),
  ADD KEY `id_pemberitahuan_tergugat` (`id_pemberitahuan_tergugat`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biaya_daftar`
--
ALTER TABLE `biaya_daftar`
  MODIFY `id_biaya_daftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kas`
--
ALTER TABLE `kas`
  MODIFY `id_kas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `panggilan_penggugat`
--
ALTER TABLE `panggilan_penggugat`
  MODIFY `id_panggilan_penggugat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `panggilan_tergugat`
--
ALTER TABLE `panggilan_tergugat`
  MODIFY `id_panggilan_tergugat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pemberitahuan_penggugat`
--
ALTER TABLE `pemberitahuan_penggugat`
  MODIFY `id_pemberitahuan_penggugat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pemberitahuan_tergugat`
--
ALTER TABLE `pemberitahuan_tergugat`
  MODIFY `id_pemberitahuan_tergugat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_biaya_daftar`) REFERENCES `biaya_daftar` (`id_biaya_daftar`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_panggilan_penggugat`) REFERENCES `panggilan_penggugat` (`id_panggilan_penggugat`),
  ADD CONSTRAINT `transaksi_ibfk_3` FOREIGN KEY (`id_panggilan_tergugat`) REFERENCES `panggilan_tergugat` (`id_panggilan_tergugat`),
  ADD CONSTRAINT `transaksi_ibfk_4` FOREIGN KEY (`id_pemberitahuan_penggugat`) REFERENCES `pemberitahuan_penggugat` (`id_pemberitahuan_penggugat`),
  ADD CONSTRAINT `transaksi_ibfk_5` FOREIGN KEY (`id_pemberitahuan_tergugat`) REFERENCES `pemberitahuan_tergugat` (`id_pemberitahuan_tergugat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
