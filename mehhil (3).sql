-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 19, 2012 at 10:32 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mehhil`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `sinopsi` mediumtext NOT NULL,
  `author` varchar(255) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `published` date NOT NULL,
  `amount` decimal(65,0) NOT NULL,
  `image` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `name`, `sinopsi`, `author`, `publisher`, `published`, `amount`, `image`, `kategori`, `stock`) VALUES
(1, '30 Aplikasi Android Paling Dahsyat', 'Apapun jenis, tipe, dan merek ponsel atau tablet Android yang Anda miliki, buku ini wajib Anda baca sebab buku ini mengupas 30 aplikasi paling dahsyat dan keren yang bisa mendukung hobi, karier, minat, dan pekerjaan Anda setiap hari. \r\nSetelah membaca buku ini, selain wawasan akan bertambah, Anda pun akan menyadari kalau dengan menggunakan ponsel atau tablet Android, Anda bisa nge-blog, membaca ebook, men-download berita, mencari kata-kata asing Bahasa Indonesia-Inggris, chatting, ber-social media, nge-tweet, mengolah dan manipulasi foto, memasak, berbelanja dan menjual barang, hingga mengecek email. Ketiga puluh aplikasi yang dikupas di dalam buku ini adalah: Facebook, Facebook Messenger, Photofunia, PicSay, Tokobagus, Skitch, Yahoo! Messenger, Bahasa Dictionary, Detikcom, Majalah Detik, Kompas.com, Makan di Mana, Masak Apa, xWallet Password, Yahoo! Mail, Mindjet, Wordpress, Notes Everything, Evernote, Tumblr, Twitter, Goo.gl, TweetDeck, OfficeSuite (PDF Reader), Slide Notes, Dropbox, Dolphin Web Browser, Read It Later, Photo Grid, Moon Reader (ePub Reader). \r\nBuku ini praktis dan bisa dipraktekkan menggunakan segala jenis merek dan tipe ponsel serta tablet Android yang Anda miliki. Jika ada rencana untuk membeli ponsel atau tablet Android, buku ini wajib Anda baca supaya Anda bisa menguji kecanggihan gadget ini terlebih dulu sebelum memutuskan untuk membeli salah satu ponsel/tablet yang ada di pasaran. Namun kalau Anda sudah memiliki ponsel/tablet Android, buku ini membantu Anda mengoptimalkan gadget tersebut ke tingkat yang lebih maksimal. Selamat ber-Android ria!	', 'Jubilee Enterprise', 'ALEX MEDIA', '2012-05-15', 2000, 'business-background.jpg', '1', 7),
(2, 'Berburu Aplikasi Gratis Android', '', 'Fahrul Muanif', 'ELEX MEDIA', '2012-05-23', 4000, 'business-background.jpg', '1', 5),
(3, 'Strategi Komunikasi', '', 'Endang Soelistiyowati, Vincent Nugroho', 'Gramedia Pustaka Utama (GPU)', '2012-05-02', 6000, '', '2', 10),
(4, 'test', 'test', 'test', 'test', '0000-00-00', 1000, '', '1', 3),
(5, 'test', 'test', 'test', 'test', '0000-00-00', 1000, '', '1', 2),
(6, 'aa', 'aa', 'aa', 'aa', '0000-00-00', 2000, '', '1', 3),
(7, 'bb', 'bbb', 'bb', 'bb', '2012-05-15', 2000, '', '1', 123),
(8, 'ccc', 'cc', 'cc', 'cc', '2012-05-15', 2000, 'business-background.jpg', '1', 120);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `telp` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `title`, `name`, `address`, `city`, `state`, `telp`, `email`) VALUES
('4fb8e0336ed1a', 'mr', 'Denny', 'jknk', 'kjn', 'kjn', 'kn', 'kjn');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `name`) VALUES
(1, 'komputer'),
(2, 'Hukum');

-- --------------------------------------------------------

--
-- Table structure for table `rental`
--

CREATE TABLE IF NOT EXISTS `rental` (
  `id` varchar(255) NOT NULL,
  `norental` varchar(255) NOT NULL,
  `custid` varchar(255) NOT NULL,
  `rentaldate` datetime NOT NULL,
  `expiredate` datetime NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `status` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rental`
--

INSERT INTO `rental` (`id`, `norental`, `custid`, `rentaldate`, `expiredate`, `total`, `status`) VALUES
('4fb8e0337ecb9', '4fb8e0337ec91', '4fb8e0336ed1a', '2012-05-20 19:14:43', '2012-05-21 19:14:43', 2000, 'Bayar');

-- --------------------------------------------------------

--
-- Table structure for table `rentaldetail`
--

CREATE TABLE IF NOT EXISTS `rentaldetail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bookid` int(11) NOT NULL,
  `rentalid` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `term` int(11) NOT NULL,
  `total` decimal(10,0) NOT NULL,
  `returndate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `rentaldetail`
--

INSERT INTO `rentaldetail` (`id`, `bookid`, `rentalid`, `qty`, `term`, `total`, `returndate`) VALUES
(52, 1, '4fb8e0337ecb9', 1, 1, 2000, '2012-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
