-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2017 at 07:19 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbcommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(2) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hp` varchar(16) NOT NULL,
  `level` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `nama`, `alamat`, `email`, `hp`, `level`) VALUES
(1, 'admin', '244b754768ffa8757687216361105b6b', 'Administrator', 'Jakarta', 'admin@localhost.com', '082122444621', 1),
(2, 'admin2', '21232f297a57a5a743894a0e4a801fc3', 'TESTER', 'tester', 'admin@gmail.com', '00000000', 1),
(3, 'kasir', '21232f297a57a5a743894a0e4a801fc3', 'kasri1', 'test program', 'kasirtest@gmail.com', '08870878559', 2);

-- --------------------------------------------------------

--
-- Table structure for table `alamat`
--

CREATE TABLE `alamat` (
  `alamat_id` int(11) NOT NULL,
  `no_order` varchar(25) NOT NULL,
  `nm_pengirim` varchar(50) NOT NULL,
  `nm_penerima` varchar(25) NOT NULL,
  `alamat` varchar(70) NOT NULL,
  `kelurahan` varchar(25) NOT NULL,
  `kecamatan` varchar(25) NOT NULL,
  `kota` varchar(25) NOT NULL,
  `provinsi` varchar(25) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alamat`
--

INSERT INTO `alamat` (`alamat_id`, `no_order`, `nm_pengirim`, `nm_penerima`, `alamat`, `kelurahan`, `kecamatan`, `kota`, `provinsi`, `no_telp`, `user_id`) VALUES
(1, 'ORD170830DA-983', 'andre setiabudi', 'lname', 'asdasdasdasdas', '', 'asdas', 'Bantul', 'DI Yogyakarta', '085779576317', 2),
(6, 'ORD170902DA-224', '', '', '', '1', '', '', '', '', 2),
(7, 'ORD170902DA-419', '', '', '', '1', '', '', '', '', 2),
(8, 'ORD170902DA-516', 'andre setiabudi', 'asdasdasd', 'asdasdasasdasdasdasdasdasdas', '1', 'aasdasdasd', 'Jakarta Barat', 'DKI Jakarta', '12312312312', 2),
(9, 'ORD170902DA-843', 'asdasd', 'CIPTO HANDOYO', 'asdasdasasdasdasdasdasdasdas', '1', 'wqweqweqwe', 'Bantul', 'DI Yogyakarta', '1231231231231', 2),
(10, 'ORD170902DA-689', 'asdasd', 'asdasdasd', 'asdasdasasdasdasdasdasdasdas', '1', 'aasdasdasd', 'Bantul', 'DI Yogyakarta', '1231231231231', 2),
(11, 'ORD170902DA-689', 'asdasd', 'asdasdasd', 'asdasdasasdasdasdasdasdasdas', '1', 'aasdasdasd', 'Bantul', 'DI Yogyakarta', '1231231231231', 2);

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `bank_id` int(2) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`bank_id`, `nama`) VALUES
(1, 'BCA'),
(2, 'MANDIRI');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `barang_id` int(11) NOT NULL,
  `barcode` varchar(20) NOT NULL,
  `kd_brg` varchar(30) NOT NULL,
  `nm_brg` varchar(20) DEFAULT NULL,
  `warna` varchar(15) NOT NULL,
  `berat` int(11) NOT NULL,
  `qty` int(11) DEFAULT '0',
  `harga` bigint(20) DEFAULT '0',
  `harga_last_update` datetime DEFAULT NULL,
  `last_update` date DEFAULT '2000-01-01',
  `gambar` text NOT NULL,
  `image1` text NOT NULL,
  `image2` text NOT NULL,
  `image3` text NOT NULL,
  `image4` text NOT NULL,
  `short_desc` text NOT NULL,
  `long_desc` text NOT NULL,
  `non_aktif` tinyint(4) DEFAULT NULL,
  `kategori_id` int(2) DEFAULT '0',
  `satuan_id` int(2) DEFAULT '0',
  `supplier_id` int(3) DEFAULT '0',
  `rak_id` int(2) DEFAULT '0',
  `admin_id` int(2) DEFAULT '0',
  `warna_id` int(2) DEFAULT '0',
  `size_id` int(2) DEFAULT '0',
  `merk_id` int(3) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`barang_id`, `barcode`, `kd_brg`, `nm_brg`, `warna`, `berat`, `qty`, `harga`, `harga_last_update`, `last_update`, `gambar`, `image1`, `image2`, `image3`, `image4`, `short_desc`, `long_desc`, `non_aktif`, `kategori_id`, `satuan_id`, `supplier_id`, `rak_id`, `admin_id`, `warna_id`, `size_id`, `merk_id`) VALUES
(1, '39051649', 'AWQ04', 'sepatu buluk keren', '', 100, 52, 50000, '2017-09-14 21:55:33', '2017-09-06', '10q09q09.png&&19225461_10209827376509598_894056997944213739_n.jpg&&80808080.png&&boot1.png&&boot2.png', '', '', '', '', 'asdasdasd', 'asdasdasd', NULL, 1, 1, 1, 0, 0, 1, 3, 1),
(2, '29006618', 'AWQ04', 'sepatu buluk keren', '', 100, 25, 50000, '2017-09-14 21:55:33', '2017-09-06', '10q09q09.png&&19225461_10209827376509598_894056997944213739_n.jpg&&80808080.png&&boot1.png&&boot2.png', '', '', '', '', 'asdasdasd', 'asdasdasd', NULL, 1, 1, 1, 0, 0, 1, 5, 1),
(3, '43820529', 'AWQ04', 'sepatu buluk keren', '', 100, 54, 50000, '2017-09-14 21:55:33', '2017-09-06', '10q09q09.png&&19225461_10209827376509598_894056997944213739_n.jpg&&80808080.png&&boot1.png&&boot2.png', '', '', '', '', 'asdasdasd', 'asdasdasd', NULL, 1, 1, 1, 0, 0, 1, 6, 1),
(4, '40481228', 'AWQ04', 'sepatu buluk keren', '', 100, 50, 50000, '2017-09-14 21:55:34', '2017-09-06', '10q09q09.png&&19225461_10209827376509598_894056997944213739_n.jpg&&80808080.png&&boot1.png&&boot2.png', '', '', '', '', 'asdasdasd', 'asdasdasd', NULL, 1, 1, 1, 0, 0, 1, 7, 1),
(5, '19552951', 'AWQ04', 'sepatu buluk keren', '', 100, 50, 50000, '2017-09-14 21:55:34', '2017-09-06', '10q09q09.png&&19225461_10209827376509598_894056997944213739_n.jpg&&80808080.png&&boot1.png&&boot2.png', '', '', '', '', 'asdasdasd', 'asdasdasd', NULL, 1, 1, 1, 0, 0, 1, 8, 1),
(6, '20315212', 'AWQ04', 'sepatu buluk keren', '', 100, 50, 50000, '2017-09-14 21:55:34', '2017-09-06', '10q09q09.png&&19225461_10209827376509598_894056997944213739_n.jpg&&80808080.png&&boot1.png&&boot2.png', '', '', '', '', 'asdasdasd', 'asdasdasd', NULL, 1, 1, 1, 0, 0, 2, 3, 1),
(7, '35346137', 'AWQ04', 'sepatu buluk keren', '', 100, 50, 50000, '2017-09-14 21:55:34', '2017-09-06', '10q09q09.png&&19225461_10209827376509598_894056997944213739_n.jpg&&80808080.png&&boot1.png&&boot2.png', '', '', '', '', 'asdasdasd', 'asdasdasd', NULL, 1, 1, 1, 0, 0, 2, 5, 1),
(8, '33439127', 'AWQ04', 'sepatu buluk keren', '', 100, 50, 50000, '2017-09-14 21:55:34', '2017-09-06', '10q09q09.png&&19225461_10209827376509598_894056997944213739_n.jpg&&80808080.png&&boot1.png&&boot2.png', '', '', '', '', 'asdasdasd', 'asdasdasd', NULL, 1, 1, 1, 0, 0, 2, 6, 1),
(9, '57519531', 'AWQ04', 'sepatu buluk keren', '', 100, 50, 50000, '2017-09-14 21:55:34', '2017-09-06', '10q09q09.png&&19225461_10209827376509598_894056997944213739_n.jpg&&80808080.png&&boot1.png&&boot2.png', '', '', '', '', 'asdasdasd', 'asdasdasd', NULL, 1, 1, 1, 0, 0, 2, 7, 1),
(10, '53116861', 'AWQ04', 'sepatu buluk keren', '', 100, 50, 50000, '2017-09-14 21:55:34', '2017-09-06', '10q09q09.png&&19225461_10209827376509598_894056997944213739_n.jpg&&80808080.png&&boot1.png&&boot2.png', '', '', '', '', 'asdasdasd', 'asdasdasd', NULL, 1, 1, 1, 0, 0, 2, 8, 1),
(11, '16281466', 'AWQ04', 'sepatu buluk keren', '', 100, 50, 50000, '2017-09-14 21:55:34', '2017-09-06', '10q09q09.png&&19225461_10209827376509598_894056997944213739_n.jpg&&80808080.png&&boot1.png&&boot2.png', '', '', '', '', 'asdasdasd', 'asdasdasd', NULL, 1, 1, 1, 0, 0, 3, 3, 1),
(12, '27612304', 'AWQ04', 'sepatu buluk keren', '', 100, 50, 50000, '2017-09-14 21:55:34', '2017-09-06', '10q09q09.png&&19225461_10209827376509598_894056997944213739_n.jpg&&80808080.png&&boot1.png&&boot2.png', '', '', '', '', 'asdasdasd', 'asdasdasd', NULL, 1, 1, 1, 0, 0, 3, 5, 1),
(13, '50173611', 'AWQ04', 'sepatu buluk keren', '', 100, 50, 50000, '2017-09-14 21:55:34', '2017-09-06', '10q09q09.png&&19225461_10209827376509598_894056997944213739_n.jpg&&80808080.png&&boot1.png&&boot2.png', '', '', '', '', 'asdasdasd', 'asdasdasd', NULL, 1, 1, 1, 0, 0, 3, 6, 1),
(14, '35744900', 'AWQ04', 'sepatu buluk keren', '', 100, 50, 50000, '2017-09-14 21:55:35', '2017-09-06', '10q09q09.png&&19225461_10209827376509598_894056997944213739_n.jpg&&80808080.png&&boot1.png&&boot2.png', '', '', '', '', 'asdasdasd', 'asdasdasd', NULL, 1, 1, 1, 0, 0, 3, 7, 1),
(15, '39404296', 'AWQ04', 'sepatu buluk keren', '', 100, 50, 50000, '2017-09-14 21:55:35', '2017-09-06', '10q09q09.png&&19225461_10209827376509598_894056997944213739_n.jpg&&80808080.png&&boot1.png&&boot2.png', '', '', '', '', 'asdasdasd', 'asdasdasd', NULL, 1, 1, 1, 0, 0, 3, 8, 1),
(16, '86889648', 'AWQ05', 'sepatu bagus', '', 100, 0, 0, NULL, '2017-09-06', '', '', '', '', '', 'awseqwewqe', 'qweqweqweqweqwewqw', NULL, 2, 2, 1, 0, 0, 4, 26, 2),
(17, '28070746', 'AWQ05', 'sepatu bagus', '', 100, 0, 0, NULL, '2017-09-06', '', '', '', '', '', 'awseqwewqe', 'qweqweqweqweqwewqw', NULL, 2, 2, 1, 0, 0, 4, 6, 2),
(18, '98754882', 'AWQ05', 'sepatu bagus', '', 100, 0, 0, NULL, '2017-09-06', '', '', '', '', '', 'awseqwewqe', 'qweqweqweqweqwewqw', NULL, 2, 2, 1, 0, 0, 4, 15, 2),
(19, '24159071', 'AWQ05', 'sepatu bagus', '', 100, 0, 0, NULL, '2017-09-06', '', '', '', '', '', 'awseqwewqe', 'qweqweqweqweqwewqw', NULL, 2, 2, 1, 0, 0, 4, 9, 2),
(20, '52937825', 'AWQ05', 'sepatu bagus', '', 100, 0, 0, NULL, '2017-09-06', '', '', '', '', '', 'awseqwewqe', 'qweqweqweqweqwewqw', NULL, 2, 2, 1, 0, 0, 3, 26, 2),
(21, '66210937', 'AWQ05', 'sepatu bagus', '', 100, 0, 0, NULL, '2017-09-06', '', '', '', '', '', 'awseqwewqe', 'qweqweqweqweqwewqw', NULL, 2, 2, 1, 0, 0, 3, 6, 2),
(22, '61591254', 'AWQ05', 'sepatu bagus', '', 100, 0, 0, NULL, '2017-09-06', '', '', '', '', '', 'awseqwewqe', 'qweqweqweqweqwewqw', NULL, 2, 2, 1, 0, 0, 3, 15, 2),
(23, '23323567', 'AWQ05', 'sepatu bagus', '', 100, 0, 0, NULL, '2017-09-06', '', '', '', '', '', 'awseqwewqe', 'qweqweqweqweqwewqw', NULL, 2, 2, 1, 0, 0, 3, 9, 2),
(24, '78534613', 'AWQ05', 'sepatu bagus', '', 100, 0, 0, NULL, '2017-09-06', '', '', '', '', '', 'awseqwewqe', 'qweqweqweqweqwewqw', NULL, 2, 2, 1, 0, 0, 5, 26, 2),
(25, '17371961', 'AWQ05', 'sepatu bagus', '', 100, 0, 0, NULL, '2017-09-06', '', '', '', '', '', 'awseqwewqe', 'qweqweqweqweqwewqw', NULL, 2, 2, 1, 0, 0, 5, 6, 2),
(26, '54809570', 'AWQ05', 'sepatu bagus', '', 100, 0, 0, NULL, '2017-09-06', '', '', '', '', '', 'awseqwewqe', 'qweqweqweqweqwewqw', NULL, 2, 2, 1, 0, 0, 5, 15, 2),
(27, '45231119', 'AWQ05', 'sepatu bagus', '', 100, 0, 0, NULL, '2017-09-06', '', '', '', '', '', 'awseqwewqe', 'qweqweqweqweqwewqw', NULL, 2, 2, 1, 0, 0, 5, 9, 2);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(5) NOT NULL,
  `barang_id` varchar(15) NOT NULL,
  `qty` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `user_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `idConfig` bigint(20) NOT NULL,
  `option` varchar(30) NOT NULL,
  `value` varchar(70) NOT NULL,
  `description` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`idConfig`, `option`, `value`, `description`) VALUES
(1, 'store_name', 'AHADMART', 'Nama Toko'),
(2, 'receipt_footer1', 'Terimakasih telah berbelanja di Ahadmart', 'Struk Footer 1'),
(3, 'receipt_footer2', 'Murah, Lengkap, dan Islami', 'Struk Footer 2'),
(4, 'receipt_header1', '---------------------', 'Struk Header 1'),
(5, 'temporary_space', '/tmp/', 'Temporary Space'),
(6, 'version', 'a:3:{i:0;i:2;i:1;i:0;i:2;i:17;}', 'Versi'),
(7, 'ukm_mode', '0', 'UKM Mode'),
(8, 'point_value', '', 'Nilai rupiah untuk member mendapatkan 1 point'),
(9, 'footer_nota_a4', 'Barang yang sudah dibeli tidak bisa ditukar atau dikembalikan', 'Footer Nota A4'),
(10, 'abangadek_mode', '0', 'Abang Adek Mode');

-- --------------------------------------------------------

--
-- Table structure for table `detail_beli`
--

CREATE TABLE `detail_beli` (
  `idDetailBeli` bigint(20) NOT NULL,
  `idTransaksiBeli` bigint(20) NOT NULL,
  `barang_id` bigint(20) NOT NULL,
  `tglExpire` date NOT NULL,
  `qty` int(10) NOT NULL,
  `hargaBeli` bigint(20) NOT NULL,
  `isSold` varchar(1) DEFAULT 'N',
  `barcode` varchar(25) DEFAULT NULL,
  `kd_brg` varchar(10) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `jumBarangAsli` int(11) DEFAULT NULL COMMENT 'Jumlah Barang pada saat Pembelian'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='latin1_swedish_ci';

--
-- Dumping data for table `detail_beli`
--

INSERT INTO `detail_beli` (`idDetailBeli`, `idTransaksiBeli`, `barang_id`, `tglExpire`, `qty`, `hargaBeli`, `isSold`, `barcode`, `kd_brg`, `username`, `jumBarangAsli`) VALUES
(1, 1, 1, '0000-00-00', 50, 40000, 'Y', '39051649', 'AWQ04', '', 50),
(2, 1, 2, '0000-00-00', 50, 40000, 'N', '29006618', 'AWQ04', '', 50),
(3, 1, 3, '0000-00-00', 50, 40000, 'N', '43820529', 'AWQ04', '', 50),
(4, 1, 4, '0000-00-00', 50, 40000, 'N', '40481228', 'AWQ04', '', 50),
(5, 1, 5, '0000-00-00', 50, 40000, 'N', '19552951', 'AWQ04', '', 50),
(6, 1, 6, '0000-00-00', 50, 40000, 'N', '20315212', 'AWQ04', '', 50),
(7, 1, 7, '0000-00-00', 50, 40000, 'N', '35346137', 'AWQ04', '', 50),
(8, 1, 8, '0000-00-00', 50, 40000, 'N', '33439127', 'AWQ04', '', 50),
(9, 1, 9, '0000-00-00', 50, 40000, 'N', '57519531', 'AWQ04', '', 50),
(10, 1, 10, '0000-00-00', 50, 40000, 'N', '53116861', 'AWQ04', '', 50),
(11, 1, 11, '0000-00-00', 50, 40000, 'N', '16281466', 'AWQ04', '', 50),
(12, 1, 12, '0000-00-00', 50, 40000, 'N', '27612304', 'AWQ04', '', 50),
(13, 1, 13, '0000-00-00', 50, 40000, 'N', '50173611', 'AWQ04', '', 50),
(14, 1, 14, '0000-00-00', 50, 40000, 'N', '35744900', 'AWQ04', '', 50),
(15, 1, 15, '0000-00-00', 50, 40000, 'N', '39404296', 'AWQ04', '', 50);

-- --------------------------------------------------------

--
-- Table structure for table `detail_jual`
--

CREATE TABLE `detail_jual` (
  `uid` bigint(20) UNSIGNED NOT NULL,
  `idTransaksiJual` bigint(20) NOT NULL,
  `idBarang` bigint(20) NOT NULL,
  `jumBarang` int(10) NOT NULL,
  `hargaBeli` bigint(20) DEFAULT NULL,
  `hargaJual` bigint(20) NOT NULL,
  `harga_jual_asli` bigint(20) DEFAULT NULL,
  `admin` varchar(30) DEFAULT NULL,
  `diskon` bigint(20) NOT NULL,
  `barcode` varchar(25) DEFAULT NULL,
  `nomorStruk` bigint(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_jual`
--

INSERT INTO `detail_jual` (`uid`, `idTransaksiJual`, `idBarang`, `jumBarang`, `hargaBeli`, `hargaJual`, `harga_jual_asli`, `admin`, `diskon`, `barcode`, `nomorStruk`) VALUES
(1, 1, 1, 2, 40000, 50000, NULL, '', 0, '39051649', 1);

-- --------------------------------------------------------

--
-- Table structure for table `detail_retur_barang`
--

CREATE TABLE `detail_retur_barang` (
  `uid` bigint(20) NOT NULL,
  `idTransaksiRetur` bigint(20) NOT NULL,
  `tglTransaksi` datetime NOT NULL,
  `idBarang` bigint(20) NOT NULL,
  `jumBarang` int(10) NOT NULL,
  `hargaBeli` bigint(20) DEFAULT NULL,
  `hargaJual` bigint(20) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `barcode` varchar(25) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_retur_beli`
--

CREATE TABLE `detail_retur_beli` (
  `idTransaksiBeli` bigint(20) NOT NULL,
  `idBarang` bigint(20) NOT NULL,
  `tglExpire` date NOT NULL,
  `jumRetur` int(10) NOT NULL,
  `hargaBeli` bigint(20) NOT NULL,
  `barcode` varchar(25) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `idSupplier` varchar(10) DEFAULT NULL,
  `nominal` bigint(20) DEFAULT '0',
  `idTipePembayaran` int(3) DEFAULT NULL,
  `NomorInvoice` varchar(15) NOT NULL DEFAULT '0',
  `idReturBeli` bigint(20) NOT NULL,
  `tglRetur` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='latin1_swedish_ci';

-- --------------------------------------------------------

--
-- Table structure for table `detail_stock_opname`
--

CREATE TABLE `detail_stock_opname` (
  `uid` bigint(20) NOT NULL,
  `idStockOpname` bigint(20) NOT NULL,
  `barcode` varchar(25) NOT NULL,
  `namaBarang` varchar(30) NOT NULL,
  `jmlTercatat` int(11) NOT NULL,
  `selisih` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_stock_opname`
--

INSERT INTO `detail_stock_opname` (`uid`, `idStockOpname`, `barcode`, `namaBarang`, `jmlTercatat`, `selisih`) VALUES
(84, 3, '10q09q08', 'qweqweqw', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `detail_transfer_barang`
--

CREATE TABLE `detail_transfer_barang` (
  `uid` bigint(20) UNSIGNED NOT NULL,
  `idBarang` bigint(20) NOT NULL,
  `jumBarang` int(10) NOT NULL,
  `hargaJual` bigint(20) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `barcode` varchar(25) DEFAULT NULL,
  `nomorStruk` bigint(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `diskon_detail`
--

CREATE TABLE `diskon_detail` (
  `uid` bigint(20) UNSIGNED NOT NULL,
  `diskon_tipe_id` bigint(20) UNSIGNED NOT NULL,
  `diskon_tipe_nama` varchar(25) NOT NULL,
  `trigger` varchar(25) NOT NULL,
  `barcode` varchar(25) DEFAULT NULL,
  `tanggal_dari` datetime DEFAULT '0000-00-00 00:00:00',
  `tanggal_sampai` datetime DEFAULT '0000-00-00 00:00:00',
  `diskon_rupiah` decimal(15,2) NOT NULL DEFAULT '0.00',
  `diskon_persen` int(11) NOT NULL DEFAULT '0',
  `min_item` int(11) UNSIGNED DEFAULT NULL COMMENT 'if (value >= qty) dapatDiskon;',
  `max_item` int(11) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT 'true=aktif; '
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diskon_detail`
--

INSERT INTO `diskon_detail` (`uid`, `diskon_tipe_id`, `diskon_tipe_nama`, `trigger`, `barcode`, `tanggal_dari`, `tanggal_sampai`, `diskon_rupiah`, `diskon_persen`, `min_item`, `max_item`, `status`) VALUES
(1000, 1000, 'Grosir', '', '10q09q09', '2017-04-11 00:17:00', '2017-04-11 00:17:00', '0.00', 20, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `diskon_tipe`
--

CREATE TABLE `diskon_tipe` (
  `uid` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(25) NOT NULL,
  `deskripsi` varchar(250) DEFAULT NULL,
  `trigger_quantity` tinyint(1) NOT NULL DEFAULT '0',
  `trigger_price` tinyint(1) NOT NULL DEFAULT '0',
  `trigger_time` tinyint(1) NOT NULL DEFAULT '0',
  `trigger_total` tinyint(1) NOT NULL DEFAULT '0',
  `trigger_barcode` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diskon_tipe`
--

INSERT INTO `diskon_tipe` (`uid`, `nama`, `deskripsi`, `trigger_quantity`, `trigger_price`, `trigger_time`, `trigger_total`, `trigger_barcode`) VALUES
(1, 'Admin', 'Entry Diskon Manual by Admin', 0, 0, 0, 0, 0),
(2, 'Customer', 'Diskon per Customer/Member', 0, 0, 0, 0, 0),
(1000, 'Grosir', 'Beli banyak harga turun', 1, 0, 0, 0, 1),
(1001, 'Waktu', 'Turun Harga selama waktu tertentu', 0, 0, 1, 0, 1),
(1002, 'Member: Waktu', 'Turun Harga selama waktu tertentu', 0, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `diskon_transaksi`
--

CREATE TABLE `diskon_transaksi` (
  `uid` bigint(20) UNSIGNED NOT NULL,
  `diskon_detail_uids` varchar(255) NOT NULL COMMENT 'json = {diskon_detail_uid : diskon_rupiah}',
  `barcode` varchar(25) DEFAULT NULL,
  `waktu` datetime NOT NULL,
  `diskon_rupiah` decimal(15,2) NOT NULL DEFAULT '0.00',
  `diskon_persen` int(11) NOT NULL DEFAULT '0',
  `idDetailJual` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diskon_transaksi`
--

INSERT INTO `diskon_transaksi` (`uid`, `diskon_detail_uids`, `barcode`, `waktu`, `diskon_rupiah`, `diskon_persen`, `idDetailJual`) VALUES
(1, '{\"1\":-625}', '90909090', '2014-08-05 15:56:13', '-625.00', 0, 6);

-- --------------------------------------------------------

--
-- Table structure for table `fast_stock_opname`
--

CREATE TABLE `fast_stock_opname` (
  `uid` bigint(20) NOT NULL,
  `barang_id` bigint(20) NOT NULL,
  `tanggalSO` date NOT NULL,
  `username` varchar(30) NOT NULL,
  `barcode` varchar(25) NOT NULL,
  `namaBarang` varchar(30) NOT NULL,
  `jmlTercatat` int(11) NOT NULL,
  `selisih` int(11) NOT NULL,
  `approved` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fast_stock_opname`
--

INSERT INTO `fast_stock_opname` (`uid`, `barang_id`, `tanggalSO`, `username`, `barcode`, `namaBarang`, `jmlTercatat`, `selisih`, `approved`) VALUES
(1, 1, '2017-10-21', 'admin', '39051649', 'sepatu buluk keren', 52, 0, 1),
(2, 2, '2017-10-21', 'admin', '29006618', 'sepatu buluk keren', 25, -29, 1),
(3, 1, '2017-10-22', 'admin', '39051649', 'sepatu buluk keren', 60, 8, 0);

-- --------------------------------------------------------

--
-- Table structure for table `harga_banded`
--

CREATE TABLE `harga_banded` (
  `id` int(10) UNSIGNED NOT NULL,
  `kd_brg` varchar(15) NOT NULL,
  `size` varchar(15) NOT NULL,
  `barcode` varchar(25) NOT NULL,
  `qty` int(10) UNSIGNED NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(2) NOT NULL,
  `nama` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `nama`) VALUES
(1, 'sepatu'),
(2, 'skets');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `level_id` int(15) NOT NULL,
  `level` varchar(15) DEFAULT NULL,
  `diskon_persen` int(11) DEFAULT '0',
  `diskon_rupian` decimal(15,5) DEFAULT '0.00000'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`level_id`, `level`, `diskon_persen`, `diskon_rupian`) VALUES
(1, 'user', 0, '0.00000'),
(2, 'bronze', 3, '300.00000'),
(3, 'silver', 5, '500.00000'),
(4, 'gold', 10, '1000.00000');

-- --------------------------------------------------------

--
-- Table structure for table `merk`
--

CREATE TABLE `merk` (
  `merk_id` int(3) NOT NULL,
  `nama` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merk`
--

INSERT INTO `merk` (`merk_id`, `nama`) VALUES
(1, 'nyekermen'),
(2, 'new era');

-- --------------------------------------------------------

--
-- Table structure for table `nm_brg`
--

CREATE TABLE `nm_brg` (
  `nm_id` int(11) NOT NULL,
  `nm_brg` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nm_brg`
--

INSERT INTO `nm_brg` (`nm_id`, `nm_brg`) VALUES
(1, 'Product #1'),
(2, 'Product #2'),
(3, 'sendal mas udin');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `idkonfirmasi` int(11) NOT NULL,
  `order_id` int(5) NOT NULL,
  `tgl_konfirmasi` date NOT NULL,
  `tgl_kirim` date NOT NULL,
  `user_id` int(5) NOT NULL,
  `namabank` varchar(10) NOT NULL,
  `norekening` varchar(15) NOT NULL,
  `nominal` varchar(10) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`idkonfirmasi`, `order_id`, `tgl_konfirmasi`, `tgl_kirim`, `user_id`, `namabank`, `norekening`, `nominal`, `gambar`) VALUES
(1, 1, '2017-08-04', '2017-08-04', 1, 'BCA', '123456', '2500000', ''),
(2, 19, '0000-00-00', '0000-00-00', 2, 'BCA', '', '18689', ''),
(3, 19, '0000-00-00', '0000-00-00', 2, 'BCA', '', '18689', ''),
(4, 19, '0000-00-00', '0000-00-00', 2, 'BCA', '', '12545663', ''),
(5, 6, '0000-00-00', '0000-00-00', 2, 'BCA', '', '100009090', '');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(5) NOT NULL,
  `no_order` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `total_order` int(11) NOT NULL,
  `user_id` int(4) NOT NULL,
  `status_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `no_order`, `tanggal`, `total_order`, `user_id`, `status_id`) VALUES
(1, 'ORD170429DA-167', '2017-04-29', 375167, 2, 1),
(2, 'ORD170825DA-448', '2017-08-25', 448, 9, 1),
(3, 'ORD170825DA-202', '2017-08-25', 202, 9, 1),
(4, 'ORD170825DA-831', '2017-08-25', 831, 9, 1),
(5, 'ORD170825DA-469', '2017-08-25', 469, 2, 1),
(6, 'ORD170825DA-475', '2017-08-25', 475, 2, 1),
(7, 'ORD170825DA-601', '2017-08-25', 601, 2, 1),
(8, 'ORD170825DA-982', '2017-08-25', 982, 2, 1),
(9, 'ORD170829DA-810', '2017-08-29', 810, 2, 1),
(10, 'ORD170830DA-983', '2017-08-30', 18983, 2, 1),
(11, 'ORD170902DA-697', '2017-09-02', 697, 2, 1),
(12, 'ORD170902DA-175', '2017-09-02', 175, 2, 1),
(13, 'ORD170902DA-561', '2017-09-02', 561, 2, 1),
(14, 'ORD170902DA-372', '2017-09-02', 372, 2, 1),
(15, 'ORD170902DA-224', '2017-09-02', 224, 2, 1),
(16, 'ORD170902DA-419', '2017-09-02', 419, 2, 1),
(17, 'ORD170902DA-516', '2017-09-02', 9101, 2, 1),
(18, 'ORD170902DA-843', '2017-09-02', 18385, 2, 1),
(19, 'ORD170902DA-689', '2017-09-02', 18689, 2, 1),
(20, 'ORD170902DA-689', '2017-09-02', 18689, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `order_detail_id` int(7) NOT NULL,
  `no_order` varchar(15) NOT NULL,
  `cart_id` int(5) NOT NULL,
  `barang_id` varchar(15) NOT NULL,
  `harga` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`order_detail_id`, `no_order`, `cart_id`, `barang_id`, `harga`, `qty`, `sub_total`) VALUES
(1, '1', 4, '8', 125000, 1, 125000),
(2, '0', 5, '7', 125000, 2, 250000),
(3, '0', 5, '1', 0, 3, 0),
(4, '4', 6, '1', 0, 12, 0),
(5, '5', 8, '1', 0, 3, 0),
(6, 'ORD170825DA-475', 9, '1', 0, 2, 0),
(7, 'ORD170825DA-475', 10, '3', 0, 12, 0),
(8, 'ORD170825DA-601', 11, '1', 0, 12, 0),
(9, 'ORD170825DA-982', 12, '1', 0, 2, 0),
(10, 'ORD170829DA-810', 8, '1', 0, 14, 0),
(11, 'ORD170830DA-983', 14, '1', 0, 1, 0),
(12, 'ORD170902DA-697', 15, '9', 0, 2, 0),
(13, 'ORD170902DA-697', 16, '1', 0, 14, 0),
(14, 'ORD170902DA-175', 17, '1', 0, 12, 0),
(15, 'ORD170902DA-561', 18, '1', 0, 1, 0),
(16, 'ORD170902DA-372', 19, '1', 0, 2, 0),
(17, 'ORD170902DA-224', 20, '1', 0, 1, 0),
(18, 'ORD170902DA-419', 21, '1', 0, 2, 0),
(19, 'ORD170902DA-419', 22, '9', 0, 14, 0),
(20, 'ORD170902DA-516', 23, '1', 0, 12, 0),
(21, 'ORD170902DA-843', 24, '1', 0, 12, 0),
(22, 'ORD170902DA-689', 25, '1', 0, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `user_id` int(4) NOT NULL,
  `no_order` varchar(15) NOT NULL,
  `bank_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `idTipePembayaran` int(3) NOT NULL,
  `tipePembayaran` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`idTipePembayaran`, `tipePembayaran`) VALUES
(1, 'CASH'),
(2, 'Tempo'),
(3, 'Voucher'),
(4, 'Debit'),
(5, 'Kredit');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL,
  `barcode` varchar(25) NOT NULL,
  `tgltransaksi` datetime NOT NULL,
  `iduser` int(11) DEFAULT NULL,
  `rekening` varchar(10) NOT NULL,
  `last_update` int(11) NOT NULL,
  `idadmin` varchar(20) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `perkerakan`
--

CREATE TABLE `perkerakan` (
  `id` int(11) NOT NULL,
  `barcode` varchar(50) NOT NULL,
  `qtymasuk` int(11) DEFAULT NULL,
  `qtykeluar` int(11) DEFAULT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `piutang`
--

CREATE TABLE `piutang` (
  `idTransaksiJual` bigint(20) NOT NULL,
  `nominal` bigint(20) UNSIGNED DEFAULT NULL,
  `tglDiBayar` date DEFAULT NULL,
  `idUser` int(3) DEFAULT NULL,
  `last_update` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `piutang`
--

INSERT INTO `piutang` (`idTransaksiJual`, `nominal`, `tglDiBayar`, `idUser`, `last_update`) VALUES
(1, 100000, '0000-00-00', 0, '2017-10-07');

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `promo_id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `diskon` varchar(25) NOT NULL,
  `periode` date NOT NULL,
  `barang_id` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rak`
--

CREATE TABLE `rak` (
  `rak_id` bigint(5) NOT NULL,
  `namaRak` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rak`
--

INSERT INTO `rak` (`rak_id`, `namaRak`) VALUES
(1, 'Rak Depan Kasir'),
(2, 'Susu 1'),
(3, 'Susu 2'),
(4, 'Susu 3'),
(5, 'Susu 4'),
(6, 'Susu 5'),
(7, 'Susu 6'),
(8, 'Rak 8'),
(9, 'Rak 9'),
(10, 'Rak 10'),
(11, 'Rak 11'),
(12, 'Rak 12'),
(13, 'Rak 13'),
(14, 'Rak 14'),
(15, 'Rak 15'),
(16, 'Rak 16'),
(17, 'Rak 17'),
(18, 'Rak 18'),
(19, 'Rak 19'),
(20, 'Rak 20');

-- --------------------------------------------------------

--
-- Table structure for table `satuan_barang`
--

CREATE TABLE `satuan_barang` (
  `satuan_id` int(5) NOT NULL,
  `namaSatuanBarang` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `satuan_barang`
--

INSERT INTO `satuan_barang` (`satuan_id`, `namaSatuanBarang`) VALUES
(1, 'kardus'),
(2, 'Kg');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `size_id` int(2) NOT NULL,
  `size` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`size_id`, `size`) VALUES
(1, '21'),
(2, '22'),
(3, '23'),
(4, '24'),
(5, '25'),
(6, '26'),
(7, '27'),
(8, '28'),
(9, '29'),
(10, '30'),
(11, '31'),
(12, '32'),
(13, '33'),
(14, '34'),
(15, '35'),
(16, '36'),
(17, '37'),
(18, '38'),
(19, '39'),
(20, '40'),
(21, '41'),
(22, '42'),
(23, '43'),
(24, '44'),
(25, '45'),
(26, '46'),
(27, '');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `status_id` int(2) NOT NULL,
  `jenis` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stock_opname`
--

CREATE TABLE `stock_opname` (
  `idStockOpname` bigint(20) NOT NULL,
  `idRak` bigint(5) NOT NULL,
  `tanggalSO` date NOT NULL,
  `username` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_opname`
--

INSERT INTO `stock_opname` (`idStockOpname`, `idRak`, `tanggalSO`, `username`) VALUES
(1, 1, '2017-04-10', 'input'),
(2, 1, '2017-04-10', 'admin'),
(3, 1, '2017-04-10', 'admin'),
(4, 1, '2017-04-10', 'admin'),
(5, 1, '2017-04-10', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` bigint(20) NOT NULL,
  `namaSupplier` varchar(30) DEFAULT NULL,
  `alamatSupplier` varchar(100) DEFAULT NULL,
  `telpSupplier` varchar(15) DEFAULT NULL,
  `Keterangan` text,
  `last_update` date DEFAULT NULL,
  `interval` int(11) NOT NULL DEFAULT '7'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `namaSupplier`, `alamatSupplier`, `telpSupplier`, `Keterangan`, `last_update`, `interval`) VALUES
(1, 'mang udin', NULL, NULL, NULL, NULL, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_cetak_label_perbarcode`
--

CREATE TABLE `tmp_cetak_label_perbarcode` (
  `id` int(12) NOT NULL,
  `tmpBarcode` varchar(50) DEFAULT NULL,
  `tmpNama` varchar(100) DEFAULT NULL,
  `tmpKategori` varchar(50) DEFAULT NULL,
  `tmpwarna` varchar(10) NOT NULL,
  `tmpukuran` varchar(10) NOT NULL,
  `tmpSatuan` varchar(50) DEFAULT NULL,
  `tmpJumlah` varchar(100) DEFAULT NULL,
  `tmpHargaJual` varchar(100) DEFAULT NULL,
  `tmpIdBarang` int(12) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmp_cetak_label_perbarcode`
--

INSERT INTO `tmp_cetak_label_perbarcode` (`id`, `tmpBarcode`, `tmpNama`, `tmpKategori`, `tmpwarna`, `tmpukuran`, `tmpSatuan`, `tmpJumlah`, `tmpHargaJual`, `tmpIdBarang`) VALUES
(30, '10q09q09', 'qweqweqw', 'Perlengkapan', 'merah', '12', 'Kg', '101', '50000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_detail_beli`
--

CREATE TABLE `tmp_detail_beli` (
  `supplier_id` int(10) NOT NULL,
  `size_id` varchar(15) NOT NULL,
  `warna_id` int(11) NOT NULL,
  `kd_brg` varchar(15) NOT NULL,
  `tglTransaksi` date NOT NULL,
  `idBarang` bigint(20) NOT NULL,
  `tglExpire` date NOT NULL,
  `qty` int(10) NOT NULL,
  `hargaBeli` float NOT NULL,
  `hargaJual` float NOT NULL,
  `barcode` varchar(25) DEFAULT NULL,
  `admin_id` int(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmp_detail_beli`
--

INSERT INTO `tmp_detail_beli` (`supplier_id`, `size_id`, `warna_id`, `kd_brg`, `tglTransaksi`, `idBarang`, `tglExpire`, `qty`, `hargaBeli`, `hargaJual`, `barcode`, `admin_id`) VALUES
(1, '8', 1, 'AWQ04', '2017-09-16', 20, '0000-00-00', 50, 40000, 50000, '19552951', 1),
(1, '7', 1, 'AWQ04', '2017-09-16', 19, '0000-00-00', 50, 40000, 50000, '40481228', 1),
(1, '6', 1, 'AWQ04', '2017-09-16', 18, '0000-00-00', 50, 40000, 50000, '43820529', 1),
(1, '5', 1, 'AWQ04', '2017-09-16', 17, '0000-00-00', 50, 40000, 50000, '29006618', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_detail_jual`
--

CREATE TABLE `tmp_detail_jual` (
  `idCustomer` bigint(20) NOT NULL,
  `tglTransaksi` datetime NOT NULL,
  `barcode` varchar(25) NOT NULL,
  `jumBarang` int(10) NOT NULL,
  `hargaBeli` float NOT NULL,
  `harga` float NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `uid` bigint(20) NOT NULL,
  `idBarang` bigint(20) DEFAULT NULL,
  `diskon_persen` int(11) NOT NULL DEFAULT '0',
  `diskon_rupiah` decimal(15,2) NOT NULL DEFAULT '0.00',
  `diskon_detail_uids` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmp_detail_jual`
--

INSERT INTO `tmp_detail_jual` (`idCustomer`, `tglTransaksi`, `barcode`, `jumBarang`, `hargaBeli`, `harga`, `username`, `uid`, `idBarang`, `diskon_persen`, `diskon_rupiah`, `diskon_detail_uids`) VALUES
(0, '2017-09-14 09:23:41', '39051649', 1, 0, 50000, '', 3, 0, 0, '0.00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_detail_retur_barang`
--

CREATE TABLE `tmp_detail_retur_barang` (
  `uid` bigint(20) NOT NULL,
  `idTransaksiRetur` bigint(20) NOT NULL,
  `tglTransaksi` datetime NOT NULL,
  `idBarang` bigint(20) NOT NULL,
  `jumBarang` int(10) NOT NULL,
  `hargaBeli` bigint(20) DEFAULT NULL,
  `hargaJual` bigint(20) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `barcode` varchar(25) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_edit_detail_beli`
--

CREATE TABLE `tmp_edit_detail_beli` (
  `idDetailBeli` bigint(20) NOT NULL,
  `idTransaksiBeli` bigint(20) NOT NULL,
  `barang_id` bigint(20) NOT NULL,
  `tglExpire` date NOT NULL,
  `qty` int(10) NOT NULL,
  `hargaBeli` bigint(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tmp_edit_detail_retur_beli`
--

CREATE TABLE `tmp_edit_detail_retur_beli` (
  `idDetailBeli` bigint(20) NOT NULL,
  `idTransaksiBeli` bigint(20) NOT NULL,
  `idBarang` bigint(20) NOT NULL,
  `tglExpire` date NOT NULL,
  `jumBarang` int(10) NOT NULL,
  `hargaBeli` bigint(20) NOT NULL,
  `barcode` varchar(25) NOT NULL,
  `jumRetur` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmp_edit_detail_retur_beli`
--

INSERT INTO `tmp_edit_detail_retur_beli` (`idDetailBeli`, `idTransaksiBeli`, `idBarang`, `tglExpire`, `jumBarang`, `hargaBeli`, `barcode`, `jumRetur`) VALUES
(6, 4, 7, '2022-02-02', 100, 10000, '79874564132131', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_harga_banded`
--

CREATE TABLE `tmp_harga_banded` (
  `barcode` varchar(25) NOT NULL,
  `kd_brg` varchar(15) NOT NULL,
  `size_id` varchar(15) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga_satuan` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmp_harga_banded`
--

INSERT INTO `tmp_harga_banded` (`barcode`, `kd_brg`, `size_id`, `supplier_id`, `user_name`, `qty`, `harga_satuan`) VALUES
('', '5', '45000', 1, 'admin', 10, 40000);

-- --------------------------------------------------------

--
-- Table structure for table `transaksibeli`
--

CREATE TABLE `transaksibeli` (
  `idTransaksiBeli` bigint(20) NOT NULL,
  `tglTransaksiBeli` date DEFAULT NULL,
  `supplier_id` varchar(10) DEFAULT NULL,
  `nominal` bigint(20) DEFAULT '0',
  `idTipePembayaran` int(3) DEFAULT NULL,
  `idUser` int(3) DEFAULT NULL,
  `last_update` date DEFAULT NULL,
  `NomorInvoice` varchar(15) NOT NULL DEFAULT '0',
  `admin_id` int(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksibeli`
--

INSERT INTO `transaksibeli` (`idTransaksiBeli`, `tglTransaksiBeli`, `supplier_id`, `nominal`, `idTipePembayaran`, `idUser`, `last_update`, `NomorInvoice`, `admin_id`) VALUES
(1, '2017-09-14', '1', 33000000, 1, NULL, '2017-09-14', '2131312', 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaksijual`
--

CREATE TABLE `transaksijual` (
  `idTransaksiJual` bigint(20) NOT NULL,
  `tglTransaksiJual` datetime DEFAULT NULL,
  `user_id` varchar(10) DEFAULT NULL,
  `tglKirimBarang` date DEFAULT NULL,
  `idTipePembayaran` int(3) DEFAULT NULL,
  `nominal` bigint(20) DEFAULT '0',
  `idUser` int(3) DEFAULT NULL,
  `last_update` date DEFAULT NULL,
  `uangDibayar` bigint(20) DEFAULT NULL,
  `jumlah_poin` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksijual`
--

INSERT INTO `transaksijual` (`idTransaksiJual`, `tglTransaksiJual`, `user_id`, `tglKirimBarang`, `idTipePembayaran`, `nominal`, `idUser`, `last_update`, `uangDibayar`, `jumlah_poin`) VALUES
(1, '2017-10-07 09:26:45', '8', NULL, 2, 100000, NULL, '2017-10-07', 100000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `transaksikas`
--

CREATE TABLE `transaksikas` (
  `idTransaksiKas` bigint(20) NOT NULL,
  `tglTransaksiKas` date DEFAULT NULL,
  `idUser` int(3) DEFAULT NULL,
  `kasAwal` bigint(20) DEFAULT NULL,
  `kasAkhir` bigint(20) DEFAULT '0',
  `kasSeharusnya` bigint(20) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksikasir`
--

CREATE TABLE `transaksikasir` (
  `idTransKasir` bigint(20) NOT NULL,
  `idUser` int(11) NOT NULL COMMENT 'idUser of the Cashier',
  `jumlahTransaksi` bigint(20) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `approvedBy` int(11) NOT NULL COMMENT 'idUser of the Approver',
  `tglTransaksi` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksireturjual`
--

CREATE TABLE `transaksireturjual` (
  `id` bigint(20) NOT NULL,
  `tglTransaksi` datetime DEFAULT NULL,
  `idCustomer` varchar(10) DEFAULT NULL,
  `nominal` bigint(20) DEFAULT '0',
  `idUser` int(3) DEFAULT NULL,
  `idKasir` int(3) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_jual`
--

CREATE TABLE `transaksi_jual` (
  `transaksi_id` int(11) NOT NULL,
  `order_id` int(5) NOT NULL,
  `no_order` varchar(15) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `user_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(4) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hp` varchar(16) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `gender` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `id_kota` int(10) NOT NULL,
  `kota` varchar(25) NOT NULL,
  `id_provinsi` int(10) NOT NULL,
  `provinsi` varchar(25) NOT NULL,
  `kecamatan` varchar(25) NOT NULL,
  `kode_pos` int(6) NOT NULL,
  `level_id` int(15) NOT NULL,
  `diskonkhusus` decimal(15,5) DEFAULT '0.00000',
  `kd_aktivasi` varchar(100) NOT NULL,
  `aktif` enum('Y','T') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `firstname`, `lastname`, `email`, `hp`, `tanggal_lahir`, `gender`, `alamat`, `id_kota`, `kota`, `id_provinsi`, `provinsi`, `kecamatan`, `kode_pos`, `level_id`, `diskonkhusus`, `kd_aktivasi`, `aktif`) VALUES
(1, 'user', '04f8996da763b7a969b1028ee3007569eaf3a635486ddab211d512c85b9df8fb', 'User', 'user', 'ltresna@gmail.com', '082122444621', '1992-03-14', 'male', 'Papanggo', 0, 'Jakarta Utara', 0, 'DKI Jakarta', 'Tg. Priok', 14340, 4, '0.00000', '', 'Y'),
(2, 'chipstoh', '7695699969097657cc0eae1b332345ce7a374769841a7d4b465e52392118e1dd', 'CIPTO', 'HANDOYO', 'chipstoh@gmail.com', '085779576317', '2017-01-01', 'pria', 'asdasdasdasdas', 419, '', 5, '', 'asdas', 13230, 2, '100.00000', '', 'Y'),
(3, 'rian', '7695699969097657cc0eae1b332345ce7a374769841a7d4b465e52392118e1dd', 'rian', 'faisal', '', '12123', '2017-05-08', 'laki2', '', 0, '', 0, '', '', 132301, 0, '0.00000', '', 'Y'),
(5, 'a', 'a', 'a', 'a', '', 'a', '0000-00-00', '', 'a', 0, 'a', 0, 'a', 'a', 0, 0, '0.00000', '', 'Y'),
(6, 'asdasd', 'asdwqe123', 'asdas', 'dasdasd', '', '123123123', '0000-00-00', '', 'asdasd', 0, 'sadaad', 0, 'asdas', 'asdasda', 12312, 0, '0.00000', '', 'Y'),
(7, 'masganteng', '7695699969097657cc0eae1b332345ce7a374769841a7d4b465e52392118e1dd', '', '', 'cipto.handoyo1994@gmail.com', '', '0000-00-00', '', '', 0, '', 0, '', '', 0, 0, '0.00000', 'c9e29d1b1d5dfab6d20d750efa78fc54', 'Y'),
(8, '', '7695699969097657cc0eae1b332345ce7a374769841a7d4b465e52392118e1dd', '', '', 'chipstoh@gmail.com', '', '0000-00-00', '', '', 0, '', 0, '', '', 0, 0, '0.00000', '86674c02d67ea580e35b82de10a83dbf', 'Y'),
(9, '', '7695699969097657cc0eae1b332345ce7a374769841a7d4b465e52392118e1dd', '', '', 'chipstoh@gmail.com', '', '0000-00-00', '', '', 0, '', 0, '', '', 0, 0, '0.00000', '20c16f2a6a87976e0e901b927767423f', 'Y'),
(10, '', '7695699969097657cc0eae1b332345ce7a374769841a7d4b465e52392118e1dd', '', '', 'chipstoh@gmail.com', '', '0000-00-00', '', '', 0, '', 0, '', '', 0, 0, '0.00000', '2b2e1b1517a287d5de99792210e1390e', 'Y'),
(11, '', '7695699969097657cc0eae1b332345ce7a374769841a7d4b465e52392118e1dd', '', '', 'chipstoh@gmail.com', '', '0000-00-00', '', '', 0, '', 0, '', '', 0, 0, '0.00000', '0f1eea89c2fb3b6186a86e86de961624', 'Y'),
(12, '', '7695699969097657cc0eae1b332345ce7a374769841a7d4b465e52392118e1dd', '', '', 'chipstoh@gmail.com', '', '0000-00-00', '', '', 0, '', 0, '', '', 0, 0, '0.00000', 'a1c503b96a5a75c27cc85639a662dda2', 'Y'),
(13, '', '7695699969097657cc0eae1b332345ce7a374769841a7d4b465e52392118e1dd', '', '', 'chipstoh@gmail.com', '', '0000-00-00', '', '', 0, '', 0, '', '', 0, 0, '0.00000', '4c330e95b662fb45a53f719bdaf0b32f', 'Y'),
(14, '', '7695699969097657cc0eae1b332345ce7a374769841a7d4b465e52392118e1dd', '', '', 'chipstoh@gmail.com', '', '0000-00-00', '', '', 0, '', 0, '', '', 0, 0, '0.00000', '7efcd8c82dc5eff373f8d3c26f4324b4', 'Y'),
(15, '', '7695699969097657cc0eae1b332345ce7a374769841a7d4b465e52392118e1dd', '', '', 'chipstoh@gmail.com', '', '0000-00-00', '', '', 0, '', 0, '', '', 0, 0, '0.00000', 'bbe9c0bb3132b57cbded5853819fdca2', 'Y'),
(16, '', '7695699969097657cc0eae1b332345ce7a374769841a7d4b465e52392118e1dd', '', '', 'chipstoh@gmail.com', '', '0000-00-00', '', '', 0, '', 0, '', '', 0, 0, '0.00000', '945fda3b80601872a1411236d15a1f46', 'Y'),
(17, '', '7695699969097657cc0eae1b332345ce7a374769841a7d4b465e52392118e1dd', '', '', 'chipstoh@gmail.com', '', '0000-00-00', '', '', 0, '', 0, '', '', 0, 0, '0.00000', '577304dcc62488154b23c82353d7fd9c', 'Y'),
(18, '', '7695699969097657cc0eae1b332345ce7a374769841a7d4b465e52392118e1dd', '', '', 'chipstoh@gmail.com', '', '0000-00-00', '', '', 0, '', 0, '', '', 0, 0, '0.00000', 'fab9c5e92f6ba42ddeeade3d488a6b05', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `warna`
--

CREATE TABLE `warna` (
  `warna_id` int(2) NOT NULL,
  `warna` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `warna`
--

INSERT INTO `warna` (`warna_id`, `warna`) VALUES
(1, 'hitam'),
(2, 'hijau'),
(3, 'biru'),
(4, 'kuning'),
(5, 'coklat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `alamat`
--
ALTER TABLE `alamat`
  ADD PRIMARY KEY (`alamat_id`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`barang_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`idConfig`),
  ADD KEY `option` (`option`);

--
-- Indexes for table `detail_beli`
--
ALTER TABLE `detail_beli`
  ADD PRIMARY KEY (`idDetailBeli`),
  ADD KEY `isSold` (`isSold`),
  ADD KEY `jumBarang` (`qty`),
  ADD KEY `idBarang` (`barang_id`),
  ADD KEY `barcode` (`barcode`),
  ADD KEY `barcode_2` (`barcode`);

--
-- Indexes for table `detail_jual`
--
ALTER TABLE `detail_jual`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `username` (`admin`),
  ADD KEY `nomorStruk` (`nomorStruk`),
  ADD KEY `barcode` (`barcode`),
  ADD KEY `barcode_2` (`barcode`);

--
-- Indexes for table `detail_retur_barang`
--
ALTER TABLE `detail_retur_barang`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `detail_retur_beli`
--
ALTER TABLE `detail_retur_beli`
  ADD PRIMARY KEY (`idReturBeli`),
  ADD KEY `idBarang` (`idTransaksiBeli`);

--
-- Indexes for table `detail_stock_opname`
--
ALTER TABLE `detail_stock_opname`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `idStockOpname` (`idStockOpname`);

--
-- Indexes for table `detail_transfer_barang`
--
ALTER TABLE `detail_transfer_barang`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `username` (`username`),
  ADD KEY `nomorStruk` (`nomorStruk`),
  ADD KEY `barcode` (`barcode`);

--
-- Indexes for table `diskon_detail`
--
ALTER TABLE `diskon_detail`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `diskon_tipe`
--
ALTER TABLE `diskon_tipe`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `diskon_transaksi`
--
ALTER TABLE `diskon_transaksi`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `fast_stock_opname`
--
ALTER TABLE `fast_stock_opname`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `idRak` (`barang_id`,`tanggalSO`,`approved`),
  ADD KEY `barcode` (`barcode`);

--
-- Indexes for table `harga_banded`
--
ALTER TABLE `harga_banded`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `barcode_UNIQUE` (`barcode`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `merk`
--
ALTER TABLE `merk`
  ADD PRIMARY KEY (`merk_id`);

--
-- Indexes for table `nm_brg`
--
ALTER TABLE `nm_brg`
  ADD PRIMARY KEY (`nm_id`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`idkonfirmasi`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_detail_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`idTipePembayaran`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `barcode` (`barcode`),
  ADD KEY `iduser` (`iduser`);

--
-- Indexes for table `perkerakan`
--
ALTER TABLE `perkerakan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `piutang`
--
ALTER TABLE `piutang`
  ADD PRIMARY KEY (`idTransaksiJual`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`promo_id`);

--
-- Indexes for table `rak`
--
ALTER TABLE `rak`
  ADD PRIMARY KEY (`rak_id`);

--
-- Indexes for table `satuan_barang`
--
ALTER TABLE `satuan_barang`
  ADD PRIMARY KEY (`satuan_id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `stock_opname`
--
ALTER TABLE `stock_opname`
  ADD PRIMARY KEY (`idStockOpname`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`),
  ADD KEY `namaSupplier` (`namaSupplier`);

--
-- Indexes for table `tmp_cetak_label_perbarcode`
--
ALTER TABLE `tmp_cetak_label_perbarcode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tmp_detail_beli`
--
ALTER TABLE `tmp_detail_beli`
  ADD KEY `idBarang` (`idBarang`),
  ADD KEY `idSupplier` (`supplier_id`),
  ADD KEY `username` (`admin_id`);

--
-- Indexes for table `tmp_detail_jual`
--
ALTER TABLE `tmp_detail_jual`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `barcode` (`barcode`),
  ADD KEY `username` (`username`),
  ADD KEY `idCustomer` (`idCustomer`);

--
-- Indexes for table `tmp_detail_retur_barang`
--
ALTER TABLE `tmp_detail_retur_barang`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `tmp_edit_detail_beli`
--
ALTER TABLE `tmp_edit_detail_beli`
  ADD PRIMARY KEY (`idDetailBeli`);

--
-- Indexes for table `tmp_edit_detail_retur_beli`
--
ALTER TABLE `tmp_edit_detail_retur_beli`
  ADD PRIMARY KEY (`idDetailBeli`);

--
-- Indexes for table `tmp_harga_banded`
--
ALTER TABLE `tmp_harga_banded`
  ADD PRIMARY KEY (`barcode`,`user_name`,`supplier_id`);

--
-- Indexes for table `transaksibeli`
--
ALTER TABLE `transaksibeli`
  ADD PRIMARY KEY (`idTransaksiBeli`);

--
-- Indexes for table `transaksijual`
--
ALTER TABLE `transaksijual`
  ADD PRIMARY KEY (`idTransaksiJual`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `tglTransaksiJual` (`tglTransaksiJual`),
  ADD KEY `nominal` (`nominal`);

--
-- Indexes for table `transaksikas`
--
ALTER TABLE `transaksikas`
  ADD PRIMARY KEY (`idTransaksiKas`);

--
-- Indexes for table `transaksikasir`
--
ALTER TABLE `transaksikasir`
  ADD PRIMARY KEY (`idTransKasir`),
  ADD KEY `idUser` (`idUser`,`tglTransaksi`);

--
-- Indexes for table `transaksireturjual`
--
ALTER TABLE `transaksireturjual`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idUser` (`idUser`),
  ADD KEY `tglTransaksi` (`tglTransaksi`),
  ADD KEY `nominal` (`nominal`);

--
-- Indexes for table `transaksi_jual`
--
ALTER TABLE `transaksi_jual`
  ADD PRIMARY KEY (`transaksi_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `warna`
--
ALTER TABLE `warna`
  ADD PRIMARY KEY (`warna_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `alamat`
--
ALTER TABLE `alamat`
  MODIFY `alamat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `bank_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `barang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `idConfig` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `detail_beli`
--
ALTER TABLE `detail_beli`
  MODIFY `idDetailBeli` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `detail_jual`
--
ALTER TABLE `detail_jual`
  MODIFY `uid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `detail_retur_barang`
--
ALTER TABLE `detail_retur_barang`
  MODIFY `uid` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `detail_retur_beli`
--
ALTER TABLE `detail_retur_beli`
  MODIFY `idReturBeli` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `detail_stock_opname`
--
ALTER TABLE `detail_stock_opname`
  MODIFY `uid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `detail_transfer_barang`
--
ALTER TABLE `detail_transfer_barang`
  MODIFY `uid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `diskon_detail`
--
ALTER TABLE `diskon_detail`
  MODIFY `uid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1001;
--
-- AUTO_INCREMENT for table `diskon_tipe`
--
ALTER TABLE `diskon_tipe`
  MODIFY `uid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003;
--
-- AUTO_INCREMENT for table `diskon_transaksi`
--
ALTER TABLE `diskon_transaksi`
  MODIFY `uid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `fast_stock_opname`
--
ALTER TABLE `fast_stock_opname`
  MODIFY `uid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `harga_banded`
--
ALTER TABLE `harga_banded`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `level_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `merk`
--
ALTER TABLE `merk`
  MODIFY `merk_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `nm_brg`
--
ALTER TABLE `nm_brg`
  MODIFY `nm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `idkonfirmasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detail_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `idTipePembayaran` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `perkerakan`
--
ALTER TABLE `perkerakan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE `promo`
  MODIFY `promo_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rak`
--
ALTER TABLE `rak`
  MODIFY `rak_id` bigint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `satuan_barang`
--
ALTER TABLE `satuan_barang`
  MODIFY `satuan_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `size_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `stock_opname`
--
ALTER TABLE `stock_opname`
  MODIFY `idStockOpname` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tmp_cetak_label_perbarcode`
--
ALTER TABLE `tmp_cetak_label_perbarcode`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `tmp_detail_beli`
--
ALTER TABLE `tmp_detail_beli`
  MODIFY `idBarang` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tmp_detail_jual`
--
ALTER TABLE `tmp_detail_jual`
  MODIFY `uid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tmp_detail_retur_barang`
--
ALTER TABLE `tmp_detail_retur_barang`
  MODIFY `uid` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tmp_edit_detail_beli`
--
ALTER TABLE `tmp_edit_detail_beli`
  MODIFY `idDetailBeli` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112276;
--
-- AUTO_INCREMENT for table `tmp_edit_detail_retur_beli`
--
ALTER TABLE `tmp_edit_detail_retur_beli`
  MODIFY `idDetailBeli` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10047776;
--
-- AUTO_INCREMENT for table `transaksibeli`
--
ALTER TABLE `transaksibeli`
  MODIFY `idTransaksiBeli` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `transaksijual`
--
ALTER TABLE `transaksijual`
  MODIFY `idTransaksiJual` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `transaksikas`
--
ALTER TABLE `transaksikas`
  MODIFY `idTransaksiKas` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transaksikasir`
--
ALTER TABLE `transaksikasir`
  MODIFY `idTransKasir` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transaksireturjual`
--
ALTER TABLE `transaksireturjual`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transaksi_jual`
--
ALTER TABLE `transaksi_jual`
  MODIFY `transaksi_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `warna`
--
ALTER TABLE `warna`
  MODIFY `warna_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
