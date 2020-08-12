-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2020 at 07:21 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mutiafashion`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kd_brg` varchar(50) NOT NULL,
  `nama_brg` varchar(100) NOT NULL,
  `kd_kategori` int(3) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kd_brg`, `nama_brg`, `kd_kategori`, `harga`) VALUES
('SY-01', 'flanella syar\'i', 1, 400000),
('TNK-02', 'Zhara', 2, 200000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_barang`
--

CREATE TABLE `detail_barang` (
  `id_detailbrg` int(11) NOT NULL,
  `kd_brg` varchar(50) NOT NULL,
  `warna` varchar(100) NOT NULL,
  `ukuran` varchar(50) NOT NULL,
  `stok` int(3) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_barang`
--

INSERT INTO `detail_barang` (`id_detailbrg`, `kd_brg`, `warna`, `ukuran`, `stok`, `gambar`) VALUES
(4, 'SY-01', 'kuning', 'xl', 30, 'flanella_syarii_kuning.jpg'),
(5, 'SY-01', 'biru', 'xl', 30, 'flanella_syarii_biru.jpg'),
(6, 'SY-01', 'pink', 'xl', 30, 'flanella_syarii_pink.jpg'),
(7, 'SY-01', 'kuning', 'l', 30, 'flanella_syari-kuning-l.jpg'),
(8, 'SY-01', 'kuning', 'm', 30, 'flanella_syari-kuning-m.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `kd_brg` int(11) NOT NULL,
  `warna` varchar(100) NOT NULL,
  `ukuran` varchar(50) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kd_kategori` int(3) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kd_kategori`, `nama_kategori`) VALUES
(1, 'Syar\'i'),
(2, 'Tunik'),
(3, 'Gaun'),
(4, 'kulot'),
(5, 'kerudung');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` varchar(200) NOT NULL,
  `total_brg` int(11) NOT NULL,
  `pengiriman` varchar(100) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `jenis_pembayaran` varchar(128) NOT NULL,
  `bank` varchar(128) NOT NULL,
  `va_number` varchar(128) NOT NULL,
  `tgl_dibuat` datetime NOT NULL,
  `tgl_dibayar` datetime NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `intruksi` varchar(255) NOT NULL,
  `status_pesanan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_tlp` varchar(13) NOT NULL,
  `provinsi` varchar(100) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `kode_pos` varchar(12) NOT NULL,
  `alamat` varchar(258) NOT NULL,
  `image` varchar(100) NOT NULL,
  `password` varchar(258) NOT NULL,
  `role_id` int(11) NOT NULL,
  `active` int(1) NOT NULL,
  `tanggal_dibuat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `no_tlp`, `provinsi`, `kota`, `kode_pos`, `alamat`, `image`, `password`, `role_id`, `active`, `tanggal_dibuat`) VALUES
(1, 'Eka Nur Hajijah', 'ekanurhjjh@gmail.com', '089651587837', 'Banten', 'Kota Serang-Serang', '42111', 'Jl.Jiwantaka 1 gang.cendana rt/rw 04/01', 'eka.jpg', '$2y$10$XnxX3Q.gCGE7M1kt82GSd.Na6S9l3ANN3lGKvARQ0iusi/8b6aMIe', 2, 1, 29),
(2, 'Khusnul Khotimah', 'minul@gmail.com', '089536717231', 'Banten', 'KotaSerang-Kasemen', '42191', 'kp.Suka Jaya rt/rw 01/12', 'minul.jpg', '$2y$10$Kz5BX0c7DKHyWcvnpBh4i.qJoobb27N.tGApSBADMrBqvM5vGWa5i', 3, 1, 30);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int(11) NOT NULL,
  `nama_role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`role_id`, `nama_role`) VALUES
(1, 'Pemilik'),
(2, 'Admin'),
(3, 'Pelanggan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kd_brg`);

--
-- Indexes for table `detail_barang`
--
ALTER TABLE `detail_barang`
  ADD PRIMARY KEY (`id_detailbrg`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kd_kategori`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_barang`
--
ALTER TABLE `detail_barang`
  MODIFY `id_detailbrg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kd_kategori` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
