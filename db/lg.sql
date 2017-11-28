-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2017 at 06:23 PM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lg`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `user` varchar(5000) NOT NULL,
  `pass` varchar(5000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user`, `pass`) VALUES
(1, 'admin', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE IF NOT EXISTS `cart_details` (
  `id` int(11) NOT NULL,
  `cname` varchar(5000) NOT NULL,
  `caddress` varchar(5000) NOT NULL,
  `cphone` varchar(5000) NOT NULL,
  `cemail` varchar(5000) NOT NULL,
  `cpname` varchar(5000) NOT NULL,
  `cpcategory` varchar(5000) NOT NULL,
  `cpcost` varchar(5000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`id`, `cname`, `caddress`, `cphone`, `cemail`, `cpname`, `cpcategory`, `cpcost`) VALUES
(1, 'admin', 'test', '00000000', 'test@gmail.com', 'car2', 'Cars', '21,245'),
(2, 'admin', 'test', '00000000', 'test@gmail.com', 'watch2', 'Watch', '205'),
(3, 'admin', 'test', '00000000', 'test@gmail.com', 'car1', 'Cars', '20,095'),
(15, 'user', 'test', 'tst', 'test@test.com', 'car2', 'Cars', '21,245'),
(16, 'user', 'test', 'tst', 'test@test.com', 'car2', 'Cars', '21,245'),
(23, 'user', 'test', 'tst', 'test@test.com', 'watch2', 'Watch', '205'),
(24, 'user', 'test', 'tst', 'test@test.com', 'watch1', 'Watch', '235'),
(27, 'admin', 'test', '00000000', 'test@gmail.com', 'w300i', 'phone', '5000'),
(28, 'admin', 'test', '00000000', 'test@gmail.com', 'w300i', 'phone', '5000'),
(29, 'admin', 'test', '00000000', 'test@gmail.com', 'car2', 'Cars', '21,245'),
(30, 'user', 'test', 'tst', 'test@test.com', 'car2', 'Cars', '21,245'),
(31, 'admin', 'test', '00000000', 'test@gmail.com', 'w300i', 'phone', '5000'),
(32, 'admin', 'test', '00000000', 'test@gmail.com', 'car2', 'Cars', '21,245'),
(33, 'admin', 'test', '00000000', 'test@gmail.com', 'w300i', 'phone', '5000'),
(34, 'admin', 'test', '00000000', 'test@gmail.com', 'watch1', 'Watch', '235'),
(35, 'admin', 'test', '00000000', 'test@gmail.com', 'watch2', 'Watch', '205'),
(36, 'admin', 'test', '00000000', 'test@gmail.com', 'w300i', 'phone', '5000'),
(37, 'user', 'test', 'tst', 'test@test.com', 'car2', 'Cars', '21,245'),
(38, 'admin', 'test', '00000000', 'test@gmail.com', 'w300i', 'phone', '5000'),
(39, 'admin', 'test', '00000000', 'test@gmail.com', 'w300i', 'phone', '5000'),
(40, 'user', 'test', 'tst', 'test@test.com', 'watch1', 'Watch', '235'),
(41, 'user', 'test', 'tst', 'test@test.com', 'watch2', 'Watch', '205'),
(42, 'user', 'test', 'tst', 'test@test.com', 'watch1', 'Watch', '235'),
(43, 'user', 'test', 'tst', 'test@test.com', 'watch2', 'Watch', '205'),
(44, 'admin', 'test', '00000000', 'test@gmail.com', 'car2', 'Cars', '21,245'),
(45, 'admin', 'test', '00000000', 'test@gmail.com', 'w300i', 'phone', '5000'),
(46, 'admin', 'test', '00000000', 'test@gmail.com', 'watch1', 'Watch', '235'),
(47, 'admin', 'test', '00000000', 'test@gmail.com', 'watch2', 'Watch', '205');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(50000) NOT NULL,
  `cat_slug` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`, `cat_slug`) VALUES
(4, 'Independence Day 123', 'Independence_Day'),
(5, 'Meeting123', 'Meeting'),
(9, 'test', 'test'),
(12, 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `max_pro_cat`
--

CREATE TABLE IF NOT EXISTS `max_pro_cat` (
  `name` varchar(225) NOT NULL,
  `product_category` varchar(225) NOT NULL,
  `max_pro` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `max_pro_cat`
--

INSERT INTO `max_pro_cat` (`name`, `product_category`, `max_pro`) VALUES
('admin', 'Cars', 23),
('admin', 'Watch', 29),
('admin', 'phone', 32),
('user', 'Cars', 12),
('user', 'Watch', 20),
('user', 'phone', 6);

-- --------------------------------------------------------

--
-- Table structure for table `newsroom`
--

CREATE TABLE IF NOT EXISTS `newsroom` (
  `id` int(11) NOT NULL,
  `n_name` varchar(5000) NOT NULL,
  `n_category` varchar(5000) NOT NULL,
  `n_image` longtext NOT NULL,
  `n_description` varchar(5000) NOT NULL,
  `ndate` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsroom`
--

INSERT INTO `newsroom` (`id`, `n_name`, `n_category`, `n_image`, `n_description`, `ndate`) VALUES
(4, 'Lt. Governor gives three mantras of prosperity', 'news', 'newsroom.jpg', '<p>She is the 22nd Lieutenant Governor since the merger of Pondicherry, which was a French Colony, with India.</p>\r\n\r\n<p>Justice Huluvadi G.Ramesh, senior most judge of Madras high Court administered the oath of office and secretary at the brief function held on lawns of Raj Nivas, the official residence of Lt. Governor here.</p>\r\n', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL,
  `p_name` varchar(500) NOT NULL,
  `p_category` int(10) NOT NULL,
  `p_image` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `p_name`, `p_category`, `p_image`) VALUES
(10, 'Meeting 1', 5, '3.jpg'),
(11, 'Independence Day 2', 4, '6.jpg'),
(12, 'test', 12, 'diez8.png'),
(13, 'test', 12, 'slider_1_1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `profile_estimation`
--

CREATE TABLE IF NOT EXISTS `profile_estimation` (
  `name` varchar(225) NOT NULL,
  `product_category` varchar(225) NOT NULL,
  `id` int(225) NOT NULL,
  `rep` int(225) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=373 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile_estimation`
--

INSERT INTO `profile_estimation` (`name`, `product_category`, `id`, `rep`) VALUES
('admin', 'Cars', 249, 21),
('admin', 'Watch', 250, 205),
('admin', 'Cars', 251, 20),
('admin', 'phone', 252, 5000),
('admin', 'phone', 253, 5000),
('admin', 'Cars', 254, 21),
('admin', 'phone', 255, 5000),
('admin', 'Cars', 256, 21),
('admin', 'phone', 257, 5000),
('admin', 'Watch', 258, 235),
('admin', 'Watch', 259, 205),
('admin', 'phone', 260, 5000),
('admin', 'phone', 261, 5000),
('admin', 'phone', 262, 5000),
('admin', 'Cars', 263, 21),
('admin', 'phone', 264, 5000),
('admin', 'Watch', 265, 235),
('admin', 'Watch', 266, 205),
('admin', 'Cars', 267, 1),
('admin', 'Watch', 268, 2),
('admin', 'Cars', 269, 3),
('admin', 'phone', 270, 4),
('admin', 'Watch', 271, 5),
('admin', 'phone', 272, 6),
('admin', 'Watch', 273, 7),
('admin', 'phone', 274, 8),
('admin', 'Cars', 275, 9),
('admin', 'phone', 276, 10),
('admin', 'Watch', 277, 11),
('admin', 'Cars', 278, 12),
('admin', 'phone', 279, 13),
('admin', 'Watch', 280, 14),
('admin', 'Cars', 281, 15),
('admin', 'Cars', 282, 16),
('admin', 'Cars', 283, 17),
('admin', 'Watch', 284, 18),
('admin', 'Cars', 285, 19),
('admin', 'phone', 286, 20),
('admin', 'Cars', 287, 21),
('admin', 'Watch', 288, 22),
('admin', 'phone', 289, 23),
('admin', 'Watch', 290, 24),
('admin', 'phone', 291, 25),
('admin', 'Cars', 292, 26),
('admin', 'Watch', 293, 27),
('admin', 'phone', 294, 28),
('admin', 'Cars', 295, 29),
('admin', 'Watch', 296, 30),
('admin', 'phone', 297, 31),
('admin', 'Cars', 298, 32),
('admin', 'Watch', 299, 33),
('admin', 'phone', 300, 34),
('admin', 'Cars', 301, 35),
('admin', 'Watch', 302, 36),
('admin', 'phone', 303, 37),
('admin', 'Cars', 304, 38),
('admin', 'Watch', 305, 39),
('admin', 'phone', 306, 40),
('admin', 'Cars', 307, 41),
('admin', 'Cars', 308, 42),
('admin', 'Watch', 309, 43),
('admin', 'phone', 310, 44),
('admin', 'Cars', 311, 45),
('admin', 'phone', 312, 46),
('admin', 'Watch', 313, 47),
('admin', 'Watch', 314, 48),
('admin', 'Watch', 315, 49),
('admin', 'Watch', 316, 50),
('admin', 'phone', 317, 51),
('admin', 'phone', 318, 52),
('admin', 'Watch', 319, 53),
('admin', 'phone', 320, 54),
('admin', 'phone', 321, 55),
('admin', 'phone', 322, 56),
('admin', 'phone', 323, 57),
('admin', 'phone', 324, 58),
('admin', 'Cars', 325, 59),
('admin', 'phone', 326, 60),
('admin', 'phone', 327, 61),
('admin', 'Watch', 328, 62),
('admin', 'Watch', 329, 63),
('admin', 'Watch', 330, 64),
('admin', 'Watch', 331, 65),
('admin', 'Watch', 332, 66),
('user', 'Cars', 333, 21),
('user', 'Cars', 334, 21),
('user', 'Watch', 335, 205),
('user', 'Watch', 336, 235),
('user', 'Cars', 337, 21),
('user', 'Cars', 338, 21),
('user', 'Watch', 339, 235),
('user', 'Watch', 340, 205),
('user', 'Watch', 341, 235),
('user', 'Watch', 342, 205),
('user', 'Watch', 343, 67),
('user', 'Watch', 344, 68),
('user', 'Watch', 345, 69),
('user', 'phone', 346, 70),
('user', 'Cars', 347, 71),
('user', 'Cars', 348, 72),
('user', 'Cars', 349, 73),
('user', 'watch', 350, 74),
('user', 'Cars', 351, 75),
('user', 'test', 352, 76),
('user', 'test', 353, 77),
('user', 'Cars', 354, 78),
('user', 'Watch', 355, 79),
('user', 'phone', 356, 80),
('user', 'Watch', 357, 81),
('user', 'phone', 358, 82),
('user', 'Watch', 359, 83),
('user', 'phone', 360, 84),
('user', 'Cars', 361, 85),
('user', 'phone', 362, 86),
('user', 'Watch', 363, 87),
('user', 'Watch', 364, 88),
('user', 'Watch', 365, 89),
('user', 'Watch', 366, 90),
('user', 'Watch', 367, 91),
('user', 'Watch', 368, 92),
('user', 'Cars', 369, 93),
('user', 'Cars', 370, 94),
('user', 'Watch', 371, 95),
('user', 'phone', 372, 96);

-- --------------------------------------------------------

--
-- Table structure for table `rti`
--

CREATE TABLE IF NOT EXISTS `rti` (
  `id` int(11) NOT NULL,
  `rtiname` varchar(5000) NOT NULL,
  `rtitext` varchar(5000) NOT NULL,
  `category` varchar(500) NOT NULL,
  `pdf` longtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rti`
--

INSERT INTO `rti` (`id`, `rtiname`, `rtitext`, `category`, `pdf`) VALUES
(2, 'LT-RTI-Index', 'Chapter Index', 'press', 'LT-RTI-Index.pdf'),
(3, 'LT-RTI-Index2', 'Chapter Index', 'presentation', 'LT-RTI-Index.pdf'),
(4, 'LT-RTI-Index3', 'Chapter Index', 'reports', 'LT-RTI-Index.pdf'),
(5, '', '', 'press', 'gallery.php'),
(6, '', '', 'press', 'jquery.themepunch.revolution.min.js'),
(7, 'test', 'test', 'press', 'jquery.themepunch.revolution.min.js'),
(8, 'test', 'test', 'meeting', 'jquery.themepunch.revolution.min.js');

-- --------------------------------------------------------

--
-- Table structure for table `traffic_exploit`
--

CREATE TABLE IF NOT EXISTS `traffic_exploit` (
  `ip` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `url` varchar(200) NOT NULL,
  `referer` varchar(100) NOT NULL,
  `name` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `traffic_exploit`
--

INSERT INTO `traffic_exploit` (`ip`, `date`, `url`, `referer`, `name`) VALUES
('127.0.0.1', '2012-09-13', 'http://localhost/shopping/category.php?name=Cars', 'http://localhost/shopping/cart_view.php', 'admin'),
('127.0.0.1', '2012-09-13', 'http://localhost/shopping/view_details.php?q=2', 'http://localhost/shopping/category.php?name=Cars', 'admin'),
('127.0.0.1', '2012-09-13', 'http://localhost/shopping/category.php?name=Watch', 'http://localhost/shopping/view_details.php?q=2', 'admin'),
('127.0.0.1', '2012-09-13', 'http://localhost/shopping/view_details.php?q=3', 'http://localhost/shopping/category.php?name=Watch', 'admin'),
('127.0.0.1', '2012-09-13', 'http://localhost/shopping/category.php?name=Cars', 'http://localhost/shopping/view_details.php?q=3', 'admin'),
('127.0.0.1', '2012-09-13', 'http://localhost/shopping/view_details.php?q=5', 'http://localhost/shopping/category.php?name=Cars', 'admin'),
('127.0.0.1', '2012-09-13', 'http://localhost/shopping/category.php?name=phone', 'http://localhost/shopping/view_details.php?q=5', 'admin'),
('127.0.0.1', '2012-09-13', 'http://localhost/shopping/category.php?name=Watch', 'http://localhost/shopping/cart_view.php', 'user'),
('127.0.0.1', '2012-09-13', 'http://localhost/shopping/view_details.php?q=3', 'http://localhost/shopping/category.php?name=Watch', 'user'),
('127.0.0.1', '2012-09-13', 'http://localhost/shopping/category.php?name=Watch', 'http://localhost/shopping/view_details.php?q=3', 'user'),
('127.0.0.1', '2012-09-13', 'http://localhost/shopping/view_details.php?q=4', 'http://localhost/shopping/category.php?name=Watch', 'user'),
('127.0.0.1', '2012-09-13', 'http://localhost/shopping/category.php?name=Watch', 'http://localhost/shopping/view_details.php?q=4', 'user'),
('127.0.0.1', '2012-09-13', 'http://localhost/shopping/category.php?name=phone', 'http://localhost/shopping/category.php?name=Watch', 'user'),
('127.0.0.1', '2012-09-13', 'http://localhost/shopping/view_details.php?q=6', 'http://localhost/shopping/category.php?name=phone', 'user'),
('127.0.0.1', '2012-09-13', 'http://localhost/shopping/category.php?name=Cars', 'http://localhost/shopping/view_details.php?q=6', 'user'),
('127.0.0.1', '2012-09-17', 'http://localhost/shopping/category.php?name=Watch', 'http://localhost/shopping/cart_view.php', 'admin'),
('127.0.0.1', '2012-09-17', 'http://localhost/shopping/category.php?name=phone', 'http://localhost/shopping/category.php?name=Watch', 'admin'),
('127.0.0.1', '2012-09-17', 'http://localhost/shopping/category.php?name=Watch', 'http://localhost/shopping/index.php', 'admin'),
('127.0.0.1', '2012-09-17', 'http://localhost/shopping/category.php?name=phone', 'http://localhost/shopping/category.php?name=Watch', 'admin'),
('127.0.0.1', '2012-09-17', 'http://localhost/shopping/category.php?name=Cars', 'http://localhost/shopping/category.php?name=phone', 'admin'),
('127.0.0.1', '2012-09-17', 'http://localhost/shopping/category.php?name=phone', 'http://localhost/shopping/cart_view.php', 'admin'),
('127.0.0.1', '2012-09-17', 'http://localhost/shopping/view_details.php?q=6', 'http://localhost/shopping/category.php?name=phone', 'admin'),
('127.0.0.1', '2012-09-17', 'http://localhost/shopping/category.php?name=Watch', 'http://localhost/shopping/cart_view.php', 'admin'),
('127.0.0.1', '2012-10-03', 'http://localhost/shopping/category.php?name=Cars', 'http://localhost/shopping/index.php', 'admin'),
('127.0.0.1', '2012-10-03', 'http://localhost/shopping/view_details.php?q=2', 'http://localhost/shopping/category.php?name=Cars', 'admin'),
('127.0.0.1', '2012-10-03', 'http://localhost/shopping/category.php?name=phone', 'http://localhost/shopping/view_details.php?q=2', 'admin'),
('127.0.0.1', '2012-10-03', 'http://localhost/shopping/view_details.php?q=6', 'http://localhost/shopping/category.php?name=phone', 'admin'),
('127.0.0.1', '2012-10-03', 'http://localhost/shopping/category.php?name=Watch', 'http://localhost/shopping/view_details.php?q=6', 'admin'),
('127.0.0.1', '2012-10-03', 'http://localhost/shopping/view_details.php?q=3', 'http://localhost/shopping/category.php?name=Watch', 'admin'),
('127.0.0.1', '2012-10-03', 'http://localhost/shopping/category.php?name=Cars', 'http://localhost/shopping/view_details.php?q=3', 'admin'),
('127.0.0.1', '2012-10-03', 'http://localhost/shopping/view_details.php?q=5', 'http://localhost/shopping/category.php?name=Cars', 'admin'),
('127.0.0.1', '2012-10-03', 'http://localhost/shopping/category.php?name=Cars', 'http://localhost/shopping/', 'admin'),
('127.0.0.1', '2012-10-03', 'http://localhost/shopping/category.php?name=Cars', 'http://localhost/shopping/index.php', 'user'),
('127.0.0.1', '2012-10-03', 'http://localhost/shopping/view_details.php?q=2', 'http://localhost/shopping/category.php?name=Cars', 'user'),
('127.0.0.1', '2012-10-03', 'http://localhost/shopping/category.php?name=Cars', 'http://localhost/shopping/view_details.php?q=2', 'user'),
('127.0.0.1', '2012-10-03', 'http://localhost/shopping/category.php?name=watch', 'NA', 'user'),
('127.0.0.1', '2012-10-03', 'http://localhost/shopping/category.php?name=Cars', 'http://localhost/shopping/index.php', 'user'),
('127.0.0.1', '2012-10-03', 'http://localhost/shopping/category.php?name=test', 'http://localhost/shopping/category.php?name=Cars', 'user'),
('127.0.0.1', '2012-10-03', 'http://localhost/shopping/view_details.php?q=7', 'http://localhost/shopping/category.php?name=test', 'user'),
('127.0.0.1', '2012-10-03', 'http://localhost/shopping/category.php?name=test', 'http://localhost/shopping/category.php?name=Cars', 'user'),
('127.0.0.1', '2012-10-03', 'http://localhost/shopping/view_details.php?q=7', 'http://localhost/shopping/category.php?name=test', 'user'),
('127.0.0.1', '2012-10-13', 'http://localhost/shopping/category.php?name=Cars', 'http://localhost/shopping/cart_view.php', 'admin'),
('127.0.0.1', '2012-10-13', 'http://localhost/shopping/view_details.php?q=2', 'http://localhost/shopping/category.php?name=Cars', 'admin'),
('127.0.0.1', '2012-10-28', 'http://localhost/shopping/category.php?name=Watch', 'http://localhost/shopping/cart_view.php', 'admin'),
('127.0.0.1', '2012-10-28', 'http://localhost/shopping/category.php?name=Cars', 'http://localhost/shopping/category.php?name=Watch', 'admin'),
('127.0.0.1', '2012-10-28', 'http://localhost/shopping/category.php?name=phone', 'http://localhost/shopping/category.php?name=Cars', 'admin'),
('127.0.0.1', '2012-10-28', 'http://localhost/shopping/view_details.php?q=6', 'http://localhost/shopping/category.php?name=phone', 'admin'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=Cars', 'http://localhost/shopping/cart_view.php', 'admin'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=Watch', 'http://localhost/shopping/category.php?name=Cars', 'admin'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=phone', 'http://localhost/shopping/category.php?name=Watch', 'admin'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=Watch', 'http://localhost/shopping/index.php', 'admin'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=phone', 'http://localhost/shopping/category.php?name=Watch', 'admin'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=Cars', 'http://localhost/shopping/index.php', 'admin'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=Watch', 'http://localhost/shopping/category.php?name=Cars', 'admin'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=phone', 'http://localhost/shopping/category.php?name=Watch', 'admin'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=Cars', 'http://localhost/shopping/index.php', 'admin'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=Watch', 'http://localhost/shopping/category.php?name=Cars', 'admin'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=phone', 'http://localhost/shopping/category.php?name=Watch', 'admin'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=Cars', 'http://localhost/shopping/index.php', 'admin'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=Watch', 'http://localhost/shopping/category.php?name=Cars', 'admin'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=phone', 'http://localhost/shopping/category.php?name=Watch', 'admin'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=Cars', 'http://localhost/shopping/index.php', 'admin'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=Watch', 'http://localhost/shopping/category.php?name=Cars', 'admin'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=phone', 'http://localhost/shopping/category.php?name=Watch', 'admin'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/view_details.php?q=5', 'http://localhost/shopping/index.php', 'admin'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=Cars', 'http://localhost/shopping/index.php', 'admin'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=Watch', 'http://localhost/shopping/category.php?name=Cars', 'admin'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=phone', 'http://localhost/shopping/category.php?name=Watch', 'admin'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=Cars', 'http://localhost/shopping/category.php?name=phone', 'admin'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=Cars', 'http://localhost/shopping/index.php', 'user'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=Watch', 'http://localhost/shopping/category.php?name=Cars', 'user'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=phone', 'http://localhost/shopping/category.php?name=Watch', 'user'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=Cars', 'http://localhost/shopping/index.php', 'admin'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=Watch', 'http://localhost/shopping/category.php?name=Cars', 'admin'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=phone', 'http://localhost/shopping/category.php?name=Watch', 'admin'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/view_details.php?q=6', 'http://localhost/shopping/category.php?name=phone', 'admin'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=Cars', 'http://localhost/shopping/index.php', 'admin'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=phone', 'http://localhost/shopping/category.php?name=Cars', 'admin'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/view_details.php?q=6', 'http://localhost/shopping/category.php?name=phone', 'admin'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=Watch', 'http://localhost/shopping/view_details.php?q=6', 'admin'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/view_details.php?q=3', 'http://localhost/shopping/category.php?name=Watch', 'admin'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=Watch', 'http://localhost/shopping/view_details.php?q=3', 'admin'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/view_details.php?q=4', 'http://localhost/shopping/category.php?name=Watch', 'admin'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=Watch', 'http://localhost/shopping/view_details.php?q=4', 'admin'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/view_details.php?q=3', 'http://localhost/shopping/category.php?name=Watch', 'admin'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=Watch', 'http://localhost/shopping/success.php', 'admin'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/view_details.php?q=4', 'http://localhost/shopping/category.php?name=Watch', 'admin'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=phone', 'http://localhost/shopping/success.php', 'admin'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/view_details.php?q=6', 'http://localhost/shopping/category.php?name=phone', 'admin'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=Watch', 'http://localhost/shopping/index.php', 'user'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=phone', 'http://localhost/shopping/category.php?name=Watch', 'user'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=Watch', 'http://localhost/shopping/category.php?name=phone', 'user'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=phone', 'http://localhost/shopping/category.php?name=Watch', 'user'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=Cars', 'http://localhost/shopping/category.php?name=phone', 'user'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/view_details.php?q=2', 'http://localhost/shopping/category.php?name=Cars', 'user'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=phone', 'http://localhost/shopping/success.php', 'user'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=phone', 'http://localhost/shopping/index.php', 'admin'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/view_details.php?q=6', 'http://localhost/shopping/category.php?name=phone', 'admin'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=Watch', 'http://localhost/shopping/success.php', 'admin'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=phone', 'http://localhost/shopping/category.php?name=Watch', 'admin'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/view_details.php?q=6', 'http://localhost/shopping/category.php?name=phone', 'admin'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=phone', 'http://localhost/shopping/success.php', 'admin'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/view_details.php?q=6', 'http://localhost/shopping/category.php?name=phone', 'admin'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=phone', 'http://localhost/shopping/view_details.php?q=6', 'admin'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/view_details.php?q=6', 'http://localhost/shopping/category.php?name=phone', 'admin'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=phone', 'http://localhost/shopping/view_details.php?q=6', 'admin'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/view_details.php?q=6', 'http://localhost/shopping/category.php?name=phone', 'admin'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=phone', 'http://localhost/shopping/view_details.php?q=6', 'admin'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/view_details.php?q=6', 'http://localhost/shopping/category.php?name=phone', 'admin'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=Watch', 'http://localhost/shopping/index.php', 'user'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/view_details.php?q=3', 'http://localhost/shopping/category.php?name=Watch', 'user'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=Watch', 'http://localhost/shopping/view_details.php?q=3', 'user'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/view_details.php?q=4', 'http://localhost/shopping/category.php?name=Watch', 'user'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=Watch', 'http://localhost/shopping/view_details.php?q=4', 'user'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/view_details.php?q=3', 'http://localhost/shopping/category.php?name=Watch', 'user'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=Watch', 'http://localhost/shopping/success.php', 'user'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/view_details.php?q=4', 'http://localhost/shopping/category.php?name=Watch', 'user'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=Watch', 'http://localhost/shopping/success.php', 'user'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/view_details.php?q=3', 'http://localhost/shopping/category.php?name=Watch', 'user'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=Watch', 'http://localhost/shopping/success.php', 'user'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/view_details.php?q=4', 'http://localhost/shopping/category.php?name=Watch', 'user'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=Cars', 'http://localhost/shopping/index.php', 'user'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=Cars', 'http://localhost/shopping/index.php', 'user'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=Watch', 'http://localhost/shopping/category.php?name=Cars', 'user'),
('127.0.0.1', '2012-10-29', 'http://localhost/shopping/category.php?name=phone', 'http://localhost/shopping/category.php?name=Watch', 'user'),
('127.0.0.1', '2013-02-04', 'http://localhost/shopping/view_details.php?q=2', 'http://localhost/shopping/index.php', 'admin'),
('127.0.0.1', '2013-02-04', 'http://localhost/shopping/category.php?name=Cars', 'http://localhost/shopping/success.php', 'admin'),
('127.0.0.1', '2013-02-04', 'http://localhost/shopping/category.php?name=phone', 'http://localhost/shopping/category.php?name=Cars', 'admin'),
('127.0.0.1', '2013-02-04', 'http://localhost/shopping/view_details.php?q=6', 'http://localhost/shopping/category.php?name=phone', 'admin'),
('127.0.0.1', '2013-02-04', 'http://localhost/shopping/category.php?name=phone', 'http://localhost/shopping/success.php', 'admin'),
('127.0.0.1', '2013-02-04', 'http://localhost/shopping/view_details.php?q=6', 'http://localhost/shopping/category.php?name=phone', 'admin'),
('127.0.0.1', '2013-02-04', 'http://localhost/shopping/category.php?name=Watch', 'http://localhost/shopping/view_details.php?q=6', 'admin'),
('127.0.0.1', '2013-02-04', 'http://localhost/shopping/view_details.php?q=3', 'http://localhost/shopping/category.php?name=Watch', 'admin'),
('127.0.0.1', '2013-02-04', 'http://localhost/shopping/category.php?name=Watch', 'http://localhost/shopping/success.php', 'admin'),
('127.0.0.1', '2013-02-04', 'http://localhost/shopping/view_details.php?q=4', 'http://localhost/shopping/category.php?name=Watch', 'admin'),
('127.0.0.1', '2013-02-04', 'http://localhost/shopping/category.php?name=Watch', 'http://localhost/shopping/success.php', 'admin'),
('127.0.0.1', '2013-02-04', 'http://localhost/shopping/view_details.php?q=3', 'http://localhost/shopping/category.php?name=Watch', 'admin'),
('127.0.0.1', '2013-02-04', 'http://localhost/shopping/category.php?name=Watch', 'http://localhost/shopping/view_details.php?q=3', 'admin'),
('127.0.0.1', '2013-02-04', 'http://localhost/shopping/view_details.php?q=4', 'http://localhost/shopping/category.php?name=Watch', 'admin'),
('127.0.0.1', '2013-02-04', 'http://localhost/shopping/category.php?name=Watch', 'http://localhost/shopping/view_details.php?q=4', 'admin'),
('127.0.0.1', '2013-02-04', 'http://localhost/shopping/view_details.php?q=3', 'http://localhost/shopping/category.php?name=Watch', 'admin'),
('127.0.0.1', '2013-02-04', 'http://localhost/shopping/view_details.php?q=3', 'http://localhost/shopping/index.php', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_reg`
--

CREATE TABLE IF NOT EXISTS `user_reg` (
  `id` int(11) NOT NULL,
  `name` varchar(5000) NOT NULL,
  `address` varchar(5000) NOT NULL,
  `phone` varchar(5000) NOT NULL,
  `email` varchar(5000) NOT NULL,
  `username` varchar(5000) NOT NULL,
  `password` varchar(5000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_reg`
--

INSERT INTO `user_reg` (`id`, `name`, `address`, `phone`, `email`, `username`, `password`) VALUES
(1, 'admin', 'test', '00000000', 'test@gmail.com', 'admin', 'admin'),
(2, 'user', 'test', 'tst', 'test@test.com', 'user', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsroom`
--
ALTER TABLE `newsroom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile_estimation`
--
ALTER TABLE `profile_estimation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rti`
--
ALTER TABLE `rti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_reg`
--
ALTER TABLE `user_reg`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cart_details`
--
ALTER TABLE `cart_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `newsroom`
--
ALTER TABLE `newsroom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `profile_estimation`
--
ALTER TABLE `profile_estimation`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=373;
--
-- AUTO_INCREMENT for table `rti`
--
ALTER TABLE `rti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user_reg`
--
ALTER TABLE `user_reg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
