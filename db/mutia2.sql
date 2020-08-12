-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2020 at 04:21 PM
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
-- Database: `mutia2`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kd_brg` varchar(50) NOT NULL,
  `nama_brg` varchar(100) NOT NULL,
  `kd_kategori` int(3) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kd_brg`, `nama_brg`, `kd_kategori`, `tanggal_masuk`, `deskripsi`, `harga`, `berat`) VALUES
('DR-01', 'BRIDAL', 3, '2020-07-09', 'tes', 280000, 0.5),
('OST-01', 'JENNIE', 4, '2020-07-02', 'tes', 230000, 0.5),
('SY-01', 'DIOR', 1, '2020-07-03', 'we', 330000, 0.54),
('SY-02', 'SEALER', 1, '2020-07-01', 'wewe', 310000, 0.55),
('SY-03', 'TES 1', 1, '2020-07-31', 'TES', 2424242, 1),
('SY-04', 'TES 2', 1, '2020-07-25', 'wewe', 12323232, 1),
('TNK-02', 'ZHARA', 2, '2020-07-11', 'uwww', 200000, 0.5);

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
(5, 'SY-01', 'biru', 'xl', 24, 'flanella_syarii_biru.jpg'),
(6, 'SY-01', 'pink', 'xl', 30, 'flanella_syarii_pink.jpg'),
(7, 'SY-01', 'kuning', 'l', 30, 'flanella_syari-kuning-l.jpg'),
(8, 'SY-01', 'kuning', 'm', 30, 'flanella_syari-kuning-m.jpg'),
(10, 'OST-01', 'navy', 'allsize', 30, 'jennie-navy-allsize.JPG'),
(12, 'DR-01', 'abu-abu', 'allsize', 49, 'bridal-abu-abu-allsize.JPG'),
(13, 'DR-01', 'murstard', 'allsize', 40, 'bridal-murstard-allsize.JPG'),
(14, 'DR-01', 'ungu', 'allsize', 40, 'bridal-ungu-allsize.JPG'),
(15, 'SY-02', 'mocca', 'allsize', 35, 'sealer-mocca-allsize.JPG'),
(17, 'SY-02', 'merah', 'allsize', 35, 'sealer-merah-allsize.JPG'),
(18, 'TNK-02', 'biru', 'allsize', 20, 'zhara-biru-allsize.JPG'),
(19, 'TNK-02', 'hijau', 'allsize', 20, 'zhara-hijau-allsize.JPG'),
(20, 'TNK-02', 'kuning', 'allsize', 20, 'zhara-kuning-allsize.JPG'),
(21, 'SY-02', 'navy', 'allsize', 10, 'sealer-navy-allsize.JPG'),
(22, 'TNK-02', 'merah', 'allsize', 30, 'zhara-merah-allsize.JPG'),
(23, 'SY-02', 'putih', 'allsize', 10, 'sealer-putih-allsize.JPG'),
(24, 'OST-01', 'merah muda', 'allsize', 26, 'jennie-merah_muda-allsize.JPG'),
(25, 'OST-01', 'ungu', 'allsize', 25, 'jennie-ungu-allsize.JPG'),
(26, 'TNK-02', 'abu-abu', 'allsize', 19, 'zhara-abu-abu-allsize.JPG');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `id_detailbrg` int(11) NOT NULL,
  `warna` varchar(100) NOT NULL,
  `ukuran` varchar(50) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`id`, `id_pesanan`, `id_detailbrg`, `warna`, `ukuran`, `jumlah`, `total_harga`) VALUES
(8, 2020295739, 5, 'biru', 'xl', 1, 330000),
(9, 2020295739, 24, 'merah muda', 'allsize', 1, 230000),
(10, 2020304530, 12, 'abu-abu', 'allsize', 1, 280000),
(11, 2020304681, 12, 'abu-abu', 'allsize', 1, 280000),
(12, 2020304768, 12, 'abu-abu', 'allsize', 1, 280000),
(13, 2020306957, 24, 'merah muda', 'allsize', 1, 230000),
(14, 2020307202, 24, 'merah muda', 'allsize', 1, 230000),
(15, 2020305659, 24, 'merah muda', 'allsize', 1, 230000),
(16, 2020308001, 17, 'merah', 'allsize', 5, 1550000),
(17, 2020308001, 12, 'abu-abu', 'allsize', 1, 280000),
(18, 2020308001, 24, 'merah muda', 'allsize', 1, 230000),
(19, 2020318568, 12, 'abu-abu', 'allsize', 1, 280000),
(20, 2020319871, 7, 'kuning', 'l', 1, 330000),
(21, 2020318224, 24, 'merah muda', 'allsize', 1, 230000),
(22, 2020319387, 24, 'merah muda', 'allsize', 1, 230000),
(23, 2020319465, 12, 'abu-abu', 'allsize', 1, 280000),
(24, 2020023121, 24, 'merah muda', 'allsize', 1, 230000),
(25, 2020026208, 5, 'biru', 'xl', 1, 330000),
(26, 2020026208, 26, 'abu-abu', 'allsize', 1, 200000),
(27, 2020026466, 5, 'biru', 'xl', 5, 1650000),
(28, 2020033719, 24, 'merah muda', 'allsize', 1, 230000),
(29, 2020035609, 12, 'abu-abu', 'allsize', 1, 280000),
(30, 2020035802, 12, 'abu-abu', 'allsize', 1, 280000),
(31, 2020035919, 12, 'abu-abu', 'allsize', 1, 280000),
(32, 2020036025, 12, 'abu-abu', 'allsize', 1, 280000);

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
(3, 'Dress'),
(4, 'OneSet');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id_kota` int(11) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `tipe` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_kota`, `id_provinsi`, `kota`, `tipe`) VALUES
(1, 21, 'Aceh Barat', 'Kabupaten'),
(2, 21, 'Aceh Barat Daya', 'Kabupaten'),
(3, 21, 'Aceh Besar', 'Kabupaten'),
(4, 21, 'Aceh Jaya', 'Kabupaten'),
(5, 21, 'Aceh Selatan', 'Kabupaten'),
(6, 21, 'Aceh Singkil', 'Kabupaten'),
(7, 21, 'Aceh Tamiang', 'Kabupaten'),
(8, 21, 'Aceh Tengah', 'Kabupaten'),
(9, 21, 'Aceh Tenggara', 'Kabupaten'),
(10, 21, 'Aceh Timur', 'Kabupaten'),
(11, 21, 'Aceh Utara', 'Kabupaten'),
(12, 32, 'Agam', 'Kabupaten'),
(13, 23, 'Alor', 'Kabupaten'),
(14, 19, 'Ambon', 'Kota'),
(15, 34, 'Asahan', 'Kabupaten'),
(16, 24, 'Asmat', 'Kabupaten'),
(17, 1, 'Badung', 'Kabupaten'),
(18, 13, 'Balangan', 'Kabupaten'),
(19, 15, 'Balikpapan', 'Kota'),
(20, 21, 'Banda Aceh', 'Kota'),
(21, 18, 'Bandar Lampung', 'Kota'),
(22, 9, 'Bandung', 'Kabupaten'),
(23, 9, 'Bandung', 'Kota'),
(24, 9, 'Bandung Barat', 'Kabupaten'),
(25, 29, 'Banggai', 'Kabupaten'),
(26, 29, 'Banggai Kepulauan', 'Kabupaten'),
(27, 2, 'Bangka', 'Kabupaten'),
(28, 2, 'Bangka Barat', 'Kabupaten'),
(29, 2, 'Bangka Selatan', 'Kabupaten'),
(30, 2, 'Bangka Tengah', 'Kabupaten'),
(31, 11, 'Bangkalan', 'Kabupaten'),
(32, 1, 'Bangli', 'Kabupaten'),
(33, 13, 'Banjar', 'Kabupaten'),
(34, 9, 'Banjar', 'Kota'),
(35, 13, 'Banjarbaru', 'Kota'),
(36, 13, 'Banjarmasin', 'Kota'),
(37, 10, 'Banjarnegara', 'Kabupaten'),
(38, 28, 'Bantaeng', 'Kabupaten'),
(39, 5, 'Bantul', 'Kabupaten'),
(40, 33, 'Banyuasin', 'Kabupaten'),
(41, 10, 'Banyumas', 'Kabupaten'),
(42, 11, 'Banyuwangi', 'Kabupaten'),
(43, 13, 'Barito Kuala', 'Kabupaten'),
(44, 14, 'Barito Selatan', 'Kabupaten'),
(45, 14, 'Barito Timur', 'Kabupaten'),
(46, 14, 'Barito Utara', 'Kabupaten'),
(47, 28, 'Barru', 'Kabupaten'),
(48, 17, 'Batam', 'Kota'),
(49, 10, 'Batang', 'Kabupaten'),
(50, 8, 'Batang Hari', 'Kabupaten'),
(51, 11, 'Batu', 'Kota'),
(52, 34, 'Batu Bara', 'Kabupaten'),
(53, 30, 'Bau-Bau', 'Kota'),
(54, 9, 'Bekasi', 'Kabupaten'),
(55, 9, 'Bekasi', 'Kota'),
(56, 2, 'Belitung', 'Kabupaten'),
(57, 2, 'Belitung Timur', 'Kabupaten'),
(58, 23, 'Belu', 'Kabupaten'),
(59, 21, 'Bener Meriah', 'Kabupaten'),
(60, 26, 'Bengkalis', 'Kabupaten'),
(61, 12, 'Bengkayang', 'Kabupaten'),
(62, 4, 'Bengkulu', 'Kota'),
(63, 4, 'Bengkulu Selatan', 'Kabupaten'),
(64, 4, 'Bengkulu Tengah', 'Kabupaten'),
(65, 4, 'Bengkulu Utara', 'Kabupaten'),
(66, 15, 'Berau', 'Kabupaten'),
(67, 24, 'Biak Numfor', 'Kabupaten'),
(68, 22, 'Bima', 'Kabupaten'),
(69, 22, 'Bima', 'Kota'),
(70, 34, 'Binjai', 'Kota'),
(71, 17, 'Bintan', 'Kabupaten'),
(72, 21, 'Bireuen', 'Kabupaten'),
(73, 31, 'Bitung', 'Kota'),
(74, 11, 'Blitar', 'Kabupaten'),
(75, 11, 'Blitar', 'Kota'),
(76, 10, 'Blora', 'Kabupaten'),
(77, 7, 'Boalemo', 'Kabupaten'),
(78, 9, 'Bogor', 'Kabupaten'),
(79, 9, 'Bogor', 'Kota'),
(80, 11, 'Bojonegoro', 'Kabupaten'),
(81, 31, 'Bolaang Mongondow (Bolmong)', 'Kabupaten'),
(82, 31, 'Bolaang Mongondow Selatan', 'Kabupaten'),
(83, 31, 'Bolaang Mongondow Timur', 'Kabupaten'),
(84, 31, 'Bolaang Mongondow Utara', 'Kabupaten'),
(85, 30, 'Bombana', 'Kabupaten'),
(86, 11, 'Bondowoso', 'Kabupaten'),
(87, 28, 'Bone', 'Kabupaten'),
(88, 7, 'Bone Bolango', 'Kabupaten'),
(89, 15, 'Bontang', 'Kota'),
(90, 24, 'Boven Digoel', 'Kabupaten'),
(91, 10, 'Boyolali', 'Kabupaten'),
(92, 10, 'Brebes', 'Kabupaten'),
(93, 32, 'Bukittinggi', 'Kota'),
(94, 1, 'Buleleng', 'Kabupaten'),
(95, 28, 'Bulukumba', 'Kabupaten'),
(96, 16, 'Bulungan (Bulongan)', 'Kabupaten'),
(97, 8, 'Bungo', 'Kabupaten'),
(98, 29, 'Buol', 'Kabupaten'),
(99, 19, 'Buru', 'Kabupaten'),
(100, 19, 'Buru Selatan', 'Kabupaten'),
(101, 30, 'Buton', 'Kabupaten'),
(102, 30, 'Buton Utara', 'Kabupaten'),
(103, 9, 'Ciamis', 'Kabupaten'),
(104, 9, 'Cianjur', 'Kabupaten'),
(105, 10, 'Cilacap', 'Kabupaten'),
(106, 3, 'Cilegon', 'Kota'),
(107, 9, 'Cimahi', 'Kota'),
(108, 9, 'Cirebon', 'Kabupaten'),
(109, 9, 'Cirebon', 'Kota'),
(110, 34, 'Dairi', 'Kabupaten'),
(111, 24, 'Deiyai (Deliyai)', 'Kabupaten'),
(112, 34, 'Deli Serdang', 'Kabupaten'),
(113, 10, 'Demak', 'Kabupaten'),
(114, 1, 'Denpasar', 'Kota'),
(115, 9, 'Depok', 'Kota'),
(116, 32, 'Dharmasraya', 'Kabupaten'),
(117, 24, 'Dogiyai', 'Kabupaten'),
(118, 22, 'Dompu', 'Kabupaten'),
(119, 29, 'Donggala', 'Kabupaten'),
(120, 26, 'Dumai', 'Kota'),
(121, 33, 'Empat Lawang', 'Kabupaten'),
(122, 23, 'Ende', 'Kabupaten'),
(123, 28, 'Enrekang', 'Kabupaten'),
(124, 25, 'Fakfak', 'Kabupaten'),
(125, 23, 'Flores Timur', 'Kabupaten'),
(126, 9, 'Garut', 'Kabupaten'),
(127, 21, 'Gayo Lues', 'Kabupaten'),
(128, 1, 'Gianyar', 'Kabupaten'),
(129, 7, 'Gorontalo', 'Kabupaten'),
(130, 7, 'Gorontalo', 'Kota'),
(131, 7, 'Gorontalo Utara', 'Kabupaten'),
(132, 28, 'Gowa', 'Kabupaten'),
(133, 11, 'Gresik', 'Kabupaten'),
(134, 10, 'Grobogan', 'Kabupaten'),
(135, 5, 'Gunung Kidul', 'Kabupaten'),
(136, 14, 'Gunung Mas', 'Kabupaten'),
(137, 34, 'Gunungsitoli', 'Kota'),
(138, 20, 'Halmahera Barat', 'Kabupaten'),
(139, 20, 'Halmahera Selatan', 'Kabupaten'),
(140, 20, 'Halmahera Tengah', 'Kabupaten'),
(141, 20, 'Halmahera Timur', 'Kabupaten'),
(142, 20, 'Halmahera Utara', 'Kabupaten'),
(143, 13, 'Hulu Sungai Selatan', 'Kabupaten'),
(144, 13, 'Hulu Sungai Tengah', 'Kabupaten'),
(145, 13, 'Hulu Sungai Utara', 'Kabupaten'),
(146, 34, 'Humbang Hasundutan', 'Kabupaten'),
(147, 26, 'Indragiri Hilir', 'Kabupaten'),
(148, 26, 'Indragiri Hulu', 'Kabupaten'),
(149, 9, 'Indramayu', 'Kabupaten'),
(150, 24, 'Intan Jaya', 'Kabupaten'),
(151, 6, 'Jakarta Barat', 'Kota'),
(152, 6, 'Jakarta Pusat', 'Kota'),
(153, 6, 'Jakarta Selatan', 'Kota'),
(154, 6, 'Jakarta Timur', 'Kota'),
(155, 6, 'Jakarta Utara', 'Kota'),
(156, 8, 'Jambi', 'Kota'),
(157, 24, 'Jayapura', 'Kabupaten'),
(158, 24, 'Jayapura', 'Kota'),
(159, 24, 'Jayawijaya', 'Kabupaten'),
(160, 11, 'Jember', 'Kabupaten'),
(161, 1, 'Jembrana', 'Kabupaten'),
(162, 28, 'Jeneponto', 'Kabupaten'),
(163, 10, 'Jepara', 'Kabupaten'),
(164, 11, 'Jombang', 'Kabupaten'),
(165, 25, 'Kaimana', 'Kabupaten'),
(166, 26, 'Kampar', 'Kabupaten'),
(167, 14, 'Kapuas', 'Kabupaten'),
(168, 12, 'Kapuas Hulu', 'Kabupaten'),
(169, 10, 'Karanganyar', 'Kabupaten'),
(170, 1, 'Karangasem', 'Kabupaten'),
(171, 9, 'Karawang', 'Kabupaten'),
(172, 17, 'Karimun', 'Kabupaten'),
(173, 34, 'Karo', 'Kabupaten'),
(174, 14, 'Katingan', 'Kabupaten'),
(175, 4, 'Kaur', 'Kabupaten'),
(176, 12, 'Kayong Utara', 'Kabupaten'),
(177, 10, 'Kebumen', 'Kabupaten'),
(178, 11, 'Kediri', 'Kabupaten'),
(179, 11, 'Kediri', 'Kota'),
(180, 24, 'Keerom', 'Kabupaten'),
(181, 10, 'Kendal', 'Kabupaten'),
(182, 30, 'Kendari', 'Kota'),
(183, 4, 'Kepahiang', 'Kabupaten'),
(184, 17, 'Kepulauan Anambas', 'Kabupaten'),
(185, 19, 'Kepulauan Aru', 'Kabupaten'),
(186, 32, 'Kepulauan Mentawai', 'Kabupaten'),
(187, 26, 'Kepulauan Meranti', 'Kabupaten'),
(188, 31, 'Kepulauan Sangihe', 'Kabupaten'),
(189, 6, 'Kepulauan Seribu', 'Kabupaten'),
(190, 31, 'Kepulauan Siau Tagulandang Biaro (Sitaro)', 'Kabupaten'),
(191, 20, 'Kepulauan Sula', 'Kabupaten'),
(192, 31, 'Kepulauan Talaud', 'Kabupaten'),
(193, 24, 'Kepulauan Yapen (Yapen Waropen)', 'Kabupaten'),
(194, 8, 'Kerinci', 'Kabupaten'),
(195, 12, 'Ketapang', 'Kabupaten'),
(196, 10, 'Klaten', 'Kabupaten'),
(197, 1, 'Klungkung', 'Kabupaten'),
(198, 30, 'Kolaka', 'Kabupaten'),
(199, 30, 'Kolaka Utara', 'Kabupaten'),
(200, 30, 'Konawe', 'Kabupaten'),
(201, 30, 'Konawe Selatan', 'Kabupaten'),
(202, 30, 'Konawe Utara', 'Kabupaten'),
(203, 13, 'Kotabaru', 'Kabupaten'),
(204, 31, 'Kotamobagu', 'Kota'),
(205, 14, 'Kotawaringin Barat', 'Kabupaten'),
(206, 14, 'Kotawaringin Timur', 'Kabupaten'),
(207, 26, 'Kuantan Singingi', 'Kabupaten'),
(208, 12, 'Kubu Raya', 'Kabupaten'),
(209, 10, 'Kudus', 'Kabupaten'),
(210, 5, 'Kulon Progo', 'Kabupaten'),
(211, 9, 'Kuningan', 'Kabupaten'),
(212, 23, 'Kupang', 'Kabupaten'),
(213, 23, 'Kupang', 'Kota'),
(214, 15, 'Kutai Barat', 'Kabupaten'),
(215, 15, 'Kutai Kartanegara', 'Kabupaten'),
(216, 15, 'Kutai Timur', 'Kabupaten'),
(217, 34, 'Labuhan Batu', 'Kabupaten'),
(218, 34, 'Labuhan Batu Selatan', 'Kabupaten'),
(219, 34, 'Labuhan Batu Utara', 'Kabupaten'),
(220, 33, 'Lahat', 'Kabupaten'),
(221, 14, 'Lamandau', 'Kabupaten'),
(222, 11, 'Lamongan', 'Kabupaten'),
(223, 18, 'Lampung Barat', 'Kabupaten'),
(224, 18, 'Lampung Selatan', 'Kabupaten'),
(225, 18, 'Lampung Tengah', 'Kabupaten'),
(226, 18, 'Lampung Timur', 'Kabupaten'),
(227, 18, 'Lampung Utara', 'Kabupaten'),
(228, 12, 'Landak', 'Kabupaten'),
(229, 34, 'Langkat', 'Kabupaten'),
(230, 21, 'Langsa', 'Kota'),
(231, 24, 'Lanny Jaya', 'Kabupaten'),
(232, 3, 'Lebak', 'Kabupaten'),
(233, 4, 'Lebong', 'Kabupaten'),
(234, 23, 'Lembata', 'Kabupaten'),
(235, 21, 'Lhokseumawe', 'Kota'),
(236, 32, 'Lima Puluh Koto/Kota', 'Kabupaten'),
(237, 17, 'Lingga', 'Kabupaten'),
(238, 22, 'Lombok Barat', 'Kabupaten'),
(239, 22, 'Lombok Tengah', 'Kabupaten'),
(240, 22, 'Lombok Timur', 'Kabupaten'),
(241, 22, 'Lombok Utara', 'Kabupaten'),
(242, 33, 'Lubuk Linggau', 'Kota'),
(243, 11, 'Lumajang', 'Kabupaten'),
(244, 28, 'Luwu', 'Kabupaten'),
(245, 28, 'Luwu Timur', 'Kabupaten'),
(246, 28, 'Luwu Utara', 'Kabupaten'),
(247, 11, 'Madiun', 'Kabupaten'),
(248, 11, 'Madiun', 'Kota'),
(249, 10, 'Magelang', 'Kabupaten'),
(250, 10, 'Magelang', 'Kota'),
(251, 11, 'Magetan', 'Kabupaten'),
(252, 9, 'Majalengka', 'Kabupaten'),
(253, 27, 'Majene', 'Kabupaten'),
(254, 28, 'Makassar', 'Kota'),
(255, 11, 'Malang', 'Kabupaten'),
(256, 11, 'Malang', 'Kota'),
(257, 16, 'Malinau', 'Kabupaten'),
(258, 19, 'Maluku Barat Daya', 'Kabupaten'),
(259, 19, 'Maluku Tengah', 'Kabupaten'),
(260, 19, 'Maluku Tenggara', 'Kabupaten'),
(261, 19, 'Maluku Tenggara Barat', 'Kabupaten'),
(262, 27, 'Mamasa', 'Kabupaten'),
(263, 24, 'Mamberamo Raya', 'Kabupaten'),
(264, 24, 'Mamberamo Tengah', 'Kabupaten'),
(265, 27, 'Mamuju', 'Kabupaten'),
(266, 27, 'Mamuju Utara', 'Kabupaten'),
(267, 31, 'Manado', 'Kota'),
(268, 34, 'Mandailing Natal', 'Kabupaten'),
(269, 23, 'Manggarai', 'Kabupaten'),
(270, 23, 'Manggarai Barat', 'Kabupaten'),
(271, 23, 'Manggarai Timur', 'Kabupaten'),
(272, 25, 'Manokwari', 'Kabupaten'),
(273, 25, 'Manokwari Selatan', 'Kabupaten'),
(274, 24, 'Mappi', 'Kabupaten'),
(275, 28, 'Maros', 'Kabupaten'),
(276, 22, 'Mataram', 'Kota'),
(277, 25, 'Maybrat', 'Kabupaten'),
(278, 34, 'Medan', 'Kota'),
(279, 12, 'Melawi', 'Kabupaten'),
(280, 8, 'Merangin', 'Kabupaten'),
(281, 24, 'Merauke', 'Kabupaten'),
(282, 18, 'Mesuji', 'Kabupaten'),
(283, 18, 'Metro', 'Kota'),
(284, 24, 'Mimika', 'Kabupaten'),
(285, 31, 'Minahasa', 'Kabupaten'),
(286, 31, 'Minahasa Selatan', 'Kabupaten'),
(287, 31, 'Minahasa Tenggara', 'Kabupaten'),
(288, 31, 'Minahasa Utara', 'Kabupaten'),
(289, 11, 'Mojokerto', 'Kabupaten'),
(290, 11, 'Mojokerto', 'Kota'),
(291, 29, 'Morowali', 'Kabupaten'),
(292, 33, 'Muara Enim', 'Kabupaten'),
(293, 8, 'Muaro Jambi', 'Kabupaten'),
(294, 4, 'Muko Muko', 'Kabupaten'),
(295, 30, 'Muna', 'Kabupaten'),
(296, 14, 'Murung Raya', 'Kabupaten'),
(297, 33, 'Musi Banyuasin', 'Kabupaten'),
(298, 33, 'Musi Rawas', 'Kabupaten'),
(299, 24, 'Nabire', 'Kabupaten'),
(300, 21, 'Nagan Raya', 'Kabupaten'),
(301, 23, 'Nagekeo', 'Kabupaten'),
(302, 17, 'Natuna', 'Kabupaten'),
(303, 24, 'Nduga', 'Kabupaten'),
(304, 23, 'Ngada', 'Kabupaten'),
(305, 11, 'Nganjuk', 'Kabupaten'),
(306, 11, 'Ngawi', 'Kabupaten'),
(307, 34, 'Nias', 'Kabupaten'),
(308, 34, 'Nias Barat', 'Kabupaten'),
(309, 34, 'Nias Selatan', 'Kabupaten'),
(310, 34, 'Nias Utara', 'Kabupaten'),
(311, 16, 'Nunukan', 'Kabupaten'),
(312, 33, 'Ogan Ilir', 'Kabupaten'),
(313, 33, 'Ogan Komering Ilir', 'Kabupaten'),
(314, 33, 'Ogan Komering Ulu', 'Kabupaten'),
(315, 33, 'Ogan Komering Ulu Selatan', 'Kabupaten'),
(316, 33, 'Ogan Komering Ulu Timur', 'Kabupaten'),
(317, 11, 'Pacitan', 'Kabupaten'),
(318, 32, 'Padang', 'Kota'),
(319, 34, 'Padang Lawas', 'Kabupaten'),
(320, 34, 'Padang Lawas Utara', 'Kabupaten'),
(321, 32, 'Padang Panjang', 'Kota'),
(322, 32, 'Padang Pariaman', 'Kabupaten'),
(323, 34, 'Padang Sidempuan', 'Kota'),
(324, 33, 'Pagar Alam', 'Kota'),
(325, 34, 'Pakpak Bharat', 'Kabupaten'),
(326, 14, 'Palangka Raya', 'Kota'),
(327, 33, 'Palembang', 'Kota'),
(328, 28, 'Palopo', 'Kota'),
(329, 29, 'Palu', 'Kota'),
(330, 11, 'Pamekasan', 'Kabupaten'),
(331, 3, 'Pandeglang', 'Kabupaten'),
(332, 9, 'Pangandaran', 'Kabupaten'),
(333, 28, 'Pangkajene Kepulauan', 'Kabupaten'),
(334, 2, 'Pangkal Pinang', 'Kota'),
(335, 24, 'Paniai', 'Kabupaten'),
(336, 28, 'Parepare', 'Kota'),
(337, 32, 'Pariaman', 'Kota'),
(338, 29, 'Parigi Moutong', 'Kabupaten'),
(339, 32, 'Pasaman', 'Kabupaten'),
(340, 32, 'Pasaman Barat', 'Kabupaten'),
(341, 15, 'Paser', 'Kabupaten'),
(342, 11, 'Pasuruan', 'Kabupaten'),
(343, 11, 'Pasuruan', 'Kota'),
(344, 10, 'Pati', 'Kabupaten'),
(345, 32, 'Payakumbuh', 'Kota'),
(346, 25, 'Pegunungan Arfak', 'Kabupaten'),
(347, 24, 'Pegunungan Bintang', 'Kabupaten'),
(348, 10, 'Pekalongan', 'Kabupaten'),
(349, 10, 'Pekalongan', 'Kota'),
(350, 26, 'Pekanbaru', 'Kota'),
(351, 26, 'Pelalawan', 'Kabupaten'),
(352, 10, 'Pemalang', 'Kabupaten'),
(353, 34, 'Pematang Siantar', 'Kota'),
(354, 15, 'Penajam Paser Utara', 'Kabupaten'),
(355, 18, 'Pesawaran', 'Kabupaten'),
(356, 18, 'Pesisir Barat', 'Kabupaten'),
(357, 32, 'Pesisir Selatan', 'Kabupaten'),
(358, 21, 'Pidie', 'Kabupaten'),
(359, 21, 'Pidie Jaya', 'Kabupaten'),
(360, 28, 'Pinrang', 'Kabupaten'),
(361, 7, 'Pohuwato', 'Kabupaten'),
(362, 27, 'Polewali Mandar', 'Kabupaten'),
(363, 11, 'Ponorogo', 'Kabupaten'),
(364, 12, 'Pontianak', 'Kabupaten'),
(365, 12, 'Pontianak', 'Kota'),
(366, 29, 'Poso', 'Kabupaten'),
(367, 33, 'Prabumulih', 'Kota'),
(368, 18, 'Pringsewu', 'Kabupaten'),
(369, 11, 'Probolinggo', 'Kabupaten'),
(370, 11, 'Probolinggo', 'Kota'),
(371, 14, 'Pulang Pisau', 'Kabupaten'),
(372, 20, 'Pulau Morotai', 'Kabupaten'),
(373, 24, 'Puncak', 'Kabupaten'),
(374, 24, 'Puncak Jaya', 'Kabupaten'),
(375, 10, 'Purbalingga', 'Kabupaten'),
(376, 9, 'Purwakarta', 'Kabupaten'),
(377, 10, 'Purworejo', 'Kabupaten'),
(378, 25, 'Raja Ampat', 'Kabupaten'),
(379, 4, 'Rejang Lebong', 'Kabupaten'),
(380, 10, 'Rembang', 'Kabupaten'),
(381, 26, 'Rokan Hilir', 'Kabupaten'),
(382, 26, 'Rokan Hulu', 'Kabupaten'),
(383, 23, 'Rote Ndao', 'Kabupaten'),
(384, 21, 'Sabang', 'Kota'),
(385, 23, 'Sabu Raijua', 'Kabupaten'),
(386, 10, 'Salatiga', 'Kota'),
(387, 15, 'Samarinda', 'Kota'),
(388, 12, 'Sambas', 'Kabupaten'),
(389, 34, 'Samosir', 'Kabupaten'),
(390, 11, 'Sampang', 'Kabupaten'),
(391, 12, 'Sanggau', 'Kabupaten'),
(392, 24, 'Sarmi', 'Kabupaten'),
(393, 8, 'Sarolangun', 'Kabupaten'),
(394, 32, 'Sawah Lunto', 'Kota'),
(395, 12, 'Sekadau', 'Kabupaten'),
(396, 28, 'Selayar (Kepulauan Selayar)', 'Kabupaten'),
(397, 4, 'Seluma', 'Kabupaten'),
(398, 10, 'Semarang', 'Kabupaten'),
(399, 10, 'Semarang', 'Kota'),
(400, 19, 'Seram Bagian Barat', 'Kabupaten'),
(401, 19, 'Seram Bagian Timur', 'Kabupaten'),
(402, 3, 'Serang', 'Kabupaten'),
(403, 3, 'Serang', 'Kota'),
(404, 34, 'Serdang Bedagai', 'Kabupaten'),
(405, 14, 'Seruyan', 'Kabupaten'),
(406, 26, 'Siak', 'Kabupaten'),
(407, 34, 'Sibolga', 'Kota'),
(408, 28, 'Sidenreng Rappang/Rapang', 'Kabupaten'),
(409, 11, 'Sidoarjo', 'Kabupaten'),
(410, 29, 'Sigi', 'Kabupaten'),
(411, 32, 'Sijunjung (Sawah Lunto Sijunjung)', 'Kabupaten'),
(412, 23, 'Sikka', 'Kabupaten'),
(413, 34, 'Simalungun', 'Kabupaten'),
(414, 21, 'Simeulue', 'Kabupaten'),
(415, 12, 'Singkawang', 'Kota'),
(416, 28, 'Sinjai', 'Kabupaten'),
(417, 12, 'Sintang', 'Kabupaten'),
(418, 11, 'Situbondo', 'Kabupaten'),
(419, 5, 'Sleman', 'Kabupaten'),
(420, 32, 'Solok', 'Kabupaten'),
(421, 32, 'Solok', 'Kota'),
(422, 32, 'Solok Selatan', 'Kabupaten'),
(423, 28, 'Soppeng', 'Kabupaten'),
(424, 25, 'Sorong', 'Kabupaten'),
(425, 25, 'Sorong', 'Kota'),
(426, 25, 'Sorong Selatan', 'Kabupaten'),
(427, 10, 'Sragen', 'Kabupaten'),
(428, 9, 'Subang', 'Kabupaten'),
(429, 21, 'Subulussalam', 'Kota'),
(430, 9, 'Sukabumi', 'Kabupaten'),
(431, 9, 'Sukabumi', 'Kota'),
(432, 14, 'Sukamara', 'Kabupaten'),
(433, 10, 'Sukoharjo', 'Kabupaten'),
(434, 23, 'Sumba Barat', 'Kabupaten'),
(435, 23, 'Sumba Barat Daya', 'Kabupaten'),
(436, 23, 'Sumba Tengah', 'Kabupaten'),
(437, 23, 'Sumba Timur', 'Kabupaten'),
(438, 22, 'Sumbawa', 'Kabupaten'),
(439, 22, 'Sumbawa Barat', 'Kabupaten'),
(440, 9, 'Sumedang', 'Kabupaten'),
(441, 11, 'Sumenep', 'Kabupaten'),
(442, 8, 'Sungaipenuh', 'Kota'),
(443, 24, 'Supiori', 'Kabupaten'),
(444, 11, 'Surabaya', 'Kota'),
(445, 10, 'Surakarta (Solo)', 'Kota'),
(446, 13, 'Tabalong', 'Kabupaten'),
(447, 1, 'Tabanan', 'Kabupaten'),
(448, 28, 'Takalar', 'Kabupaten'),
(449, 25, 'Tambrauw', 'Kabupaten'),
(450, 16, 'Tana Tidung', 'Kabupaten'),
(451, 28, 'Tana Toraja', 'Kabupaten'),
(452, 13, 'Tanah Bumbu', 'Kabupaten'),
(453, 32, 'Tanah Datar', 'Kabupaten'),
(454, 13, 'Tanah Laut', 'Kabupaten'),
(455, 3, 'Tangerang', 'Kabupaten'),
(456, 3, 'Tangerang', 'Kota'),
(457, 3, 'Tangerang Selatan', 'Kota'),
(458, 18, 'Tanggamus', 'Kabupaten'),
(459, 34, 'Tanjung Balai', 'Kota'),
(460, 8, 'Tanjung Jabung Barat', 'Kabupaten'),
(461, 8, 'Tanjung Jabung Timur', 'Kabupaten'),
(462, 17, 'Tanjung Pinang', 'Kota'),
(463, 34, 'Tapanuli Selatan', 'Kabupaten'),
(464, 34, 'Tapanuli Tengah', 'Kabupaten'),
(465, 34, 'Tapanuli Utara', 'Kabupaten'),
(466, 13, 'Tapin', 'Kabupaten'),
(467, 16, 'Tarakan', 'Kota'),
(468, 9, 'Tasikmalaya', 'Kabupaten'),
(469, 9, 'Tasikmalaya', 'Kota'),
(470, 34, 'Tebing Tinggi', 'Kota'),
(471, 8, 'Tebo', 'Kabupaten'),
(472, 10, 'Tegal', 'Kabupaten'),
(473, 10, 'Tegal', 'Kota'),
(474, 25, 'Teluk Bintuni', 'Kabupaten'),
(475, 25, 'Teluk Wondama', 'Kabupaten'),
(476, 10, 'Temanggung', 'Kabupaten'),
(477, 20, 'Ternate', 'Kota'),
(478, 20, 'Tidore Kepulauan', 'Kota'),
(479, 23, 'Timor Tengah Selatan', 'Kabupaten'),
(480, 23, 'Timor Tengah Utara', 'Kabupaten'),
(481, 34, 'Toba Samosir', 'Kabupaten'),
(482, 29, 'Tojo Una-Una', 'Kabupaten'),
(483, 29, 'Toli-Toli', 'Kabupaten'),
(484, 24, 'Tolikara', 'Kabupaten'),
(485, 31, 'Tomohon', 'Kota'),
(486, 28, 'Toraja Utara', 'Kabupaten'),
(487, 11, 'Trenggalek', 'Kabupaten'),
(488, 19, 'Tual', 'Kota'),
(489, 11, 'Tuban', 'Kabupaten'),
(490, 18, 'Tulang Bawang', 'Kabupaten'),
(491, 18, 'Tulang Bawang Barat', 'Kabupaten'),
(492, 11, 'Tulungagung', 'Kabupaten'),
(493, 28, 'Wajo', 'Kabupaten'),
(494, 30, 'Wakatobi', 'Kabupaten'),
(495, 24, 'Waropen', 'Kabupaten'),
(496, 18, 'Way Kanan', 'Kabupaten'),
(497, 10, 'Wonogiri', 'Kabupaten'),
(498, 10, 'Wonosobo', 'Kabupaten'),
(499, 24, 'Yahukimo', 'Kabupaten'),
(500, 24, 'Yalimo', 'Kabupaten'),
(501, 5, 'Yogyakarta', 'Kota');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` varchar(200) NOT NULL,
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_tlp` varchar(13) NOT NULL,
  `alamat` varchar(258) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `kode_pos` varchar(12) NOT NULL,
  `total_berat` float NOT NULL,
  `kurir` varchar(100) NOT NULL,
  `layanan` varchar(100) NOT NULL,
  `ongkir` int(11) NOT NULL,
  `jenis_pembayaran` varchar(128) NOT NULL,
  `bank` varchar(128) NOT NULL,
  `va_number` varchar(128) NOT NULL,
  `tgl_dibuat` datetime NOT NULL,
  `tgl_dibayar` datetime NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `instruksi` varchar(255) NOT NULL,
  `resi` varchar(100) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `status_pesanan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id`, `email`, `nama`, `no_tlp`, `alamat`, `id_kota`, `kode_pos`, `total_berat`, `kurir`, `layanan`, `ongkir`, `jenis_pembayaran`, `bank`, `va_number`, `tgl_dibuat`, `tgl_dibayar`, `total_bayar`, `instruksi`, `resi`, `keterangan`, `status_pesanan`) VALUES
('2020023121', 4, 'rizkyzetzet121@gmail.com', 'Muhamad Rizki', ' 089535944937', 'Komp. Taman Puri Indah Blok b6 No.1', 403, '42112', 0.5, 'pos', 'Paket Kilat Khusus', 7000, 'bank_transfer', 'bca', '60009205101', '2020-08-02 19:58:55', '2020-08-02 20:00:28', 237000, 'https://app.sandbox.midtrans.com/snap/v1/transactions/1d90f366-3b83-466c-a2e9-e2f585875a6b/pdf', '1232423231', 'Cek No. resi : 1232423231 (POS)', 'dikirim'),
('2020026208', 4, 'rizkyzetzet121@gmail.com', 'Muhamad Rizki', ' 089535944937', 'Komp. Taman Puri Indah Blok b6 No.1', 403, '42112', 1.04, 'pos', 'Express Sameday Barang', 18000, 'bank_transfer', 'bca', '60009558690', '2020-08-02 20:50:14', '2020-08-02 20:50:57', 548000, 'https://app.sandbox.midtrans.com/snap/v1/transactions/bff86644-7e3b-44f1-89b1-25401c4f8da5/pdf', '', 'pesanan sedang dalam proses packing', 'dibayar'),
('2020026466', 4, 'rizkyzetzet121@gmail.com', 'Muhamad Rizki', ' 089535944937', 'Komp. Taman Puri Indah Blok b6 No.1', 403, '42112', 2.7, 'pos', 'Express Sameday Barang', 54000, 'bank_transfer', 'bca', '60009457630', '2020-08-02 20:54:33', '2020-08-02 20:55:46', 1704000, 'https://app.sandbox.midtrans.com/snap/v1/transactions/8bdb2e0c-2f74-4b9a-8863-b52083eaefbb/pdf', '', 'pesanan sedang dalam proses packing', 'dibayar'),
('2020033719', 4, 'rizkyzetzet121@gmail.com', 'Muhamad Rizki', ' 089535944937', 'Komp. Taman Puri Indah Blok b6 No.1', 403, '42112', 0.5, 'pos', 'Q9 Barang', 15000, 'bank_transfer', 'bca', '60009967099', '2020-08-03 18:22:09', '0000-00-00 00:00:00', 245000, 'https://app.sandbox.midtrans.com/snap/v1/transactions/0e7a8a2d-b98a-4df5-a7bc-01708852f0d6/pdf', '', 'pesanan dibatalkan karena melewati batas waktu pembayaran', 'expired'),
('2020035609', 4, 'rizkyzetzet121@gmail.com', 'Muhamad Rizki', ' 089535944937', 'Komp. Taman Puri Indah Blok b6 No.1', 403, '42112', 0.5, 'pos', 'Q9 Barang', 15000, 'bank_transfer', 'bca', '60009722986', '2020-08-03 21:40:16', '0000-00-00 00:00:00', 295000, 'https://app.sandbox.midtrans.com/snap/v1/transactions/cdc8e087-5484-47d7-9657-a7a501f3f0cf/pdf', '', 'pesanan dibatalkan karena melewati batas waktu pembayaran', 'expired'),
('2020035802', 4, 'rizkyzetzet121@gmail.com', 'Muhamad Rizki', ' 089535944937', 'Komp. Taman Puri Indah Blok b6 No.1', 403, '42112', 0.5, 'tiki', 'ECO', 6000, 'bank_transfer', 'bca', '60009212903', '2020-08-03 21:43:29', '0000-00-00 00:00:00', 286000, 'https://app.sandbox.midtrans.com/snap/v1/transactions/b5beb412-4fe7-43c1-8c28-ce6c5866e20a/pdf', '', 'pesanan dibatalkan karena melewati batas waktu pembayaran', 'expired'),
('2020035919', 4, 'rizkyzetzet121@gmail.com', 'Muhamad Rizki', ' 089535944937', 'Komp. Taman Puri Indah Blok b6 No.1', 403, '42112', 0.5, 'pos', 'Paket Kilat Khusus', 7000, 'bank_transfer', 'bca', '60009950525', '2020-08-03 21:45:22', '0000-00-00 00:00:00', 287000, 'https://app.sandbox.midtrans.com/snap/v1/transactions/962db385-2952-47dd-8b7d-f4f8a504c4b8/pdf', '', 'pesanan dibatalkan karena melewati batas waktu pembayaran', 'expired'),
('2020036025', 4, 'rizkyzetzet121@gmail.com', 'Muhamad Rizki', ' 089535944937', 'Komp. Taman Puri Indah Blok b6 No.1', 403, '42112', 0.5, 'pos', 'Express Sameday Barang', 18000, 'bank_transfer', 'bca', '60009793059', '2020-08-03 21:47:09', '0000-00-00 00:00:00', 298000, 'https://app.sandbox.midtrans.com/snap/v1/transactions/59574969-adf0-4afa-98a4-bf8e88fef212/pdf', '', 'pesanan dibatalkan karena melewati batas waktu pembayaran', 'expired'),
('2020295739', 4, '', 'Muhamad Rizki', ' 089535944937', 'Komp. Taman Puri Indah Blok b6 No.1', 17, '42112', 1.04, 'pos', 'Paket Kilat Khusus', 20000, 'bank_transfer', 'bca', '60009367264', '2020-07-30 01:02:23', '0000-00-00 00:00:00', 580000, 'https://app.sandbox.midtrans.com/snap/v1/transactions/60d37cb6-5537-4779-9c42-40a1931772e7/pdf', '', 'pesanan dibatalkan karena melewati batas waktu pembayaran', 'expired'),
('2020304530', 4, 'rizkyzetzet121@gmail.com', 'Muhamad Rizki', ' 089535944937', 'Komp. Taman Puri Indah Blok b6 No.1', 331, '42112', 0.5, 'pos', 'Express Next Day Barang', 13000, 'bank_transfer', 'bca', '60009463677', '2020-07-30 14:35:35', '0000-00-00 00:00:00', 293000, 'https://app.sandbox.midtrans.com/snap/v1/transactions/26900627-03a3-43a8-b519-e2e8c83bb9bd/pdf', '', 'pesanan dibatalkan karena melewati batas waktu pembayaran', 'expired'),
('2020304681', 4, 'rizkyzetzet121@gmail.com', 'Muhamad Rizki', ' 089535944937', 'Komp. Taman Puri Indah Blok b6 No.1', 402, '42112', 0.5, 'pos', 'Paket Kilat Khusus', 9000, 'bank_transfer', 'bca', '60009785255', '2020-07-30 14:38:05', '0000-00-00 00:00:00', 289000, 'https://app.sandbox.midtrans.com/snap/v1/transactions/fe26e261-8aee-41ab-8a58-a176789a1662/pdf', '', 'pesanan dibatalkan karena melewati batas waktu pembayaran', 'expired'),
('2020304768', 4, 'rizkyzetzet121@gmail.com', 'Muhamad Rizki', ' 089535944937', 'Komp. Taman Puri Indah Blok b6 No.1', 402, '42112', 0.5, 'pos', 'Paket Kilat Khusus', 9000, 'bank_transfer', 'bca', '60009993656', '2020-07-30 14:39:30', '0000-00-00 00:00:00', 289000, 'https://app.sandbox.midtrans.com/snap/v1/transactions/5660e828-a033-4391-add2-a72db73f197a/pdf', '', 'pesanan dibatalkan karena melewati batas waktu pembayaran', 'expired'),
('2020305659', 4, 'rizkyzetzet121@gmail.com', 'Muhamad Rizki', ' 089535944937', 'Komp. Taman Puri Indah Blok b6 No.1', 402, '42112', 0.5, 'pos', 'Paket Kilat Khusus', 9000, 'bank_transfer', 'bca', '60009885976', '2020-07-30 23:14:23', '2020-07-30 23:15:11', 239000, 'https://app.sandbox.midtrans.com/snap/v1/transactions/503e77e3-e896-4b55-baf0-0cd3af319c0f/pdf', '1', 'Cek No. resi : 1 (POS)', 'dikirim'),
('2020306957', 4, 'rizkyzetzet121@gmail.com', 'Muhamad Rizki', ' 089535944937', 'Komp. Taman Puri Indah Blok b6 No.1', 402, '42112', 0.5, 'pos', 'Paket Kilat Khusus', 9000, 'bank_transfer', 'bca', '60009021038', '2020-07-30 20:49:20', '2020-07-30 21:07:56', 239000, 'https://app.sandbox.midtrans.com/snap/v1/transactions/5f6364ac-13b5-4ef8-9bf6-fdbad22d6178/pdf', '2222222222', 'Cek No. resi : 2222222222 (POS)', 'dikirim'),
('2020307202', 4, 'rizkyzetzet121@gmail.com', 'Muhamad Rizki', ' 089535944937', 'Komp. Taman Puri Indah Blok b6 No.1', 402, '42112', 0.5, 'tiki', 'REG', 7000, 'bank_transfer', 'bca', '60009244971', '2020-07-30 20:53:24', '2020-07-30 20:53:51', 237000, 'https://app.sandbox.midtrans.com/snap/v1/transactions/2a2633e2-facd-4cdc-918e-b7271961492c/pdf', '1232423231', 'Cek No. resi : 1232423231 (TIKI)', 'dikirim'),
('2020308001', 4, 'rizkyzetzet121@gmail.com', 'Muhamad Rizki', ' 089535944937', 'Komp. Taman Puri Indah Blok b6 No.1', 402, '42112', 3.75, 'tiki', 'ECO', 24000, 'bank_transfer', 'bca', '60009705831', '2020-07-30 23:53:25', '0000-00-00 00:00:00', 2084000, 'https://app.sandbox.midtrans.com/snap/v1/transactions/0f6071a8-68c7-429c-abf9-d75043ae393c/pdf', '', 'pesanan dibatalkan karena melewati batas waktu pembayaran', 'expired'),
('2020318224', 4, 'rizkyzetzet121@gmail.com', 'Muhamad Rizki', ' 089535944937', 'Komp. Taman Puri Indah Blok b6 No.1', 402, '42112', 0.5, 'pos', 'Express Next Day Barang', 13000, 'bank_transfer', 'bni', '9886000977587379', '2020-07-31 19:23:49', '0000-00-00 00:00:00', 243000, 'https://app.sandbox.midtrans.com/snap/v1/transactions/d4aeff79-98d4-4c68-a9fc-cd1c8d48f38c/pdf', '', 'pesanan dibatalkan karena melewati batas waktu pembayaran', 'expired'),
('2020318568', 4, 'minul@gmail.com', 'Khusnul Khotimah', ' 081232478630', 'Komp. Banten Blok C no 1', 331, '42113', 0.5, 'pos', 'Paket Kilat Khusus', 10000, 'bank_transfer', 'bca', '60009406989', '2020-07-31 13:56:18', '0000-00-00 00:00:00', 290000, 'https://app.sandbox.midtrans.com/snap/v1/transactions/9b75f159-32a2-4c7b-8737-beb68b1648d3/pdf', '', 'pesanan dibatalkan karena melewati batas waktu pembayaran', 'expired'),
('2020319387', 4, 'rizkyzetzet121@gmail.com', 'Muhamad Rizki', ' 089535944937', 'Komp. Taman Puri Indah Blok b6 No.1', 403, '42112', 0.5, 'pos', 'Express Sameday Barang', 18000, 'bank_transfer', 'bni', '9886000903767568', '2020-07-31 22:29:53', '0000-00-00 00:00:00', 248000, 'https://app.sandbox.midtrans.com/snap/v1/transactions/0adefc9d-97d9-4245-b614-5b01fb64bd48/pdf', '', 'pesanan dibatalkan karena melewati batas waktu pembayaran', 'expired'),
('2020319871', 4, 'rizkyzetzet121@gmail.com', 'Muhamad Rizki', ' 089535944937', 'Komp. Taman Puri Indah Blok b6 No.1', 402, '42112', 0.54, 'pos', 'Express Next Day Barang', 13000, 'bank_transfer', 'bca', '60009294226', '2020-07-31 17:04:36', '0000-00-00 00:00:00', 343000, 'https://app.sandbox.midtrans.com/snap/v1/transactions/20a5a72c-927c-4c20-9ea4-87b5f1a259b4/pdf', '', 'pesanan dibatalkan karena melewati batas waktu pembayaran', 'expired');

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `id_provinsi` int(11) NOT NULL,
  `provinsi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id_provinsi`, `provinsi`) VALUES
(1, 'Bali'),
(2, 'Bangka Belitung'),
(3, 'Banten'),
(4, 'Bengkulu'),
(5, 'DI Yogyakarta'),
(6, 'DKI Jakarta'),
(7, 'Gorontalo'),
(8, 'Jambi'),
(9, 'Jawa Barat'),
(10, 'Jawa Tengah'),
(11, 'Jawa Timur'),
(12, 'Kalimantan Barat'),
(13, 'Kalimantan Selatan'),
(14, 'Kalimantan Tengah'),
(15, 'Kalimantan Timur'),
(16, 'Kalimantan Utara'),
(17, 'Kepulauan Riau'),
(18, 'Lampung'),
(19, 'Maluku'),
(20, 'Maluku Utara'),
(21, 'Nanggroe Aceh Darussalam (NAD)'),
(22, 'Nusa Tenggara Barat (NTB)'),
(23, 'Nusa Tenggara Timur (NTT)'),
(24, 'Papua'),
(25, 'Papua Barat'),
(26, 'Riau'),
(27, 'Sulawesi Barat'),
(28, 'Sulawesi Selatan'),
(29, 'Sulawesi Tengah'),
(30, 'Sulawesi Tenggara'),
(31, 'Sulawesi Utara'),
(32, 'Sumatera Barat'),
(33, 'Sumatera Selatan'),
(34, 'Sumatera Utara');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_tlp` varchar(13) NOT NULL,
  `id_kota` int(11) NOT NULL,
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

INSERT INTO `user` (`id`, `nama`, `email`, `no_tlp`, `id_kota`, `kode_pos`, `alamat`, `image`, `password`, `role_id`, `active`, `tanggal_dibuat`) VALUES
(1, 'Eka Nur Hajijah', 'ekanurhjjh@gmail.com', '087871175551', 403, '1', 'Jl.Jiwantaka 1 gang.cendana rt/rw 04/01', '1.jpg', '$2y$10$cJnel9/gz6wK3XH7Hr9dTOTAW3ID1wLQ5tULgRu/PcKQbpkYdaqTK', 2, 1, 29),
(4, 'Muhamad Rizkiii', 'rizkyzetzet121@gmail.com', '089535944932', 403, '42112', 'Komp. Taman Puri Indah Blok b6 No.1', '4.jpg', '$2y$10$jOkHQpQ2kdacCErirOjnve9BK88ikAZxJ/VlEcvcRdp8k5xnHGwjq', 1, 1, 1595490789),
(5, 'Fazri Azhari', 'fazriazhari4@gmail.com', '089621872267', 331, '42264', 'Kp. Masjid Barat, Desa Labuan, Kec. Labuan.', 'no_image.png', '$2y$10$hqqGUJJyKhsT/sq45ysNMuyOv93MGN9XyrG/MQjvdKqD.lIz5Un1i', 3, 1, 1595492798),
(7, 'rae rae', 'rae@gmail.com', '0895359449377', 106, '42112', 'Benggalaaa', '7.jpg', '$2y$10$6QV8pgEX5dkWIkWFiH5t6OA.PW8CzcvDXUpCoA3KnxgI3MU8iFltq', 2, 1, 1597154638);

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

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `token` varchar(255) NOT NULL,
  `tanggal_dibuat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `tanggal_dibuat`) VALUES
(1, 'fazriazhari4@gmail.com', 'Qgtr0MMAb3cEwQ8nVwmbrmdKsgAQtFDnU7uhAQqT6jk=', 1595665501);

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
-- Indexes for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kd_kategori`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

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
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_barang`
--
ALTER TABLE `detail_barang`
  MODIFY `id_detailbrg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kd_kategori` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
