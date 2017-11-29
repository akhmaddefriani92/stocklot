-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2017 at 11:43 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbcommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE IF NOT EXISTS `notifikasi` (
  `idkonfirmasi` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(5) NOT NULL,
  `tgl_konfirmasi` date NOT NULL,
  `tgl_kirim` date NOT NULL,
  `user_id` int(5) NOT NULL,
  `namabank` varchar(10) NOT NULL,
  `norekening` varchar(15) NOT NULL,
  `nominal` varchar(10) NOT NULL,
  `gambar` text NOT NULL,
  PRIMARY KEY (`idkonfirmasi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`idkonfirmasi`, `order_id`, `tgl_konfirmasi`, `tgl_kirim`, `user_id`, `namabank`, `norekening`, `nominal`, `gambar`) VALUES
(1, 1, '2017-08-04', '2017-08-04', 1, 'BCA', '123456', '2500000', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
