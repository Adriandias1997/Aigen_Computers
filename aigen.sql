-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 30, 2019 at 11:15 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aigen`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

DROP TABLE IF EXISTS `administrators`;
CREATE TABLE IF NOT EXISTS `administrators` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`user_id`, `user_email`, `user_password`) VALUES
(1, 'adrian@aigen.com', 'adrian123'),
(2, 'abdallah@aigen.com', 'abdallah123'),
(3, 'infaz@aigen.com', 'infaz123'),
(4, 'azahd@aigen.com', 'azahd123'),
(5, 'aravinda@aigen.com', 'aravinda123');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `brand_id` int(100) NOT NULL AUTO_INCREMENT,
  `brand_title` text NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Acer'),
(2, 'Apple'),
(3, 'Asus'),
(4, 'Dell'),
(5, 'HP');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `product_id` int(10) NOT NULL,
  `ip_address` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`product_id`, `ip_address`, `quantity`) VALUES
(35, '::1', 0),
(31, '::1', 0),
(27, '::1', 0),
(25, '::1', 0),
(23, '::1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `categories_id` int(100) NOT NULL AUTO_INCREMENT,
  `categories_title` text NOT NULL,
  PRIMARY KEY (`categories_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_id`, `categories_title`) VALUES
(1, 'Laptops'),
(2, 'Desktops'),
(3, 'Accessories'),
(6, 'Phones'),
(16, 'Printers'),
(17, 'Scanners');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_ip` varchar(255) NOT NULL,
  `customer_name` text NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_password` varchar(100) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` varchar(255) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_image` text NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_ip`, `customer_name`, `customer_email`, `customer_password`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`) VALUES
(29, '::1', 'tuan mohammed infaz', 'infaz@gmail.com', 'infaz', 'Sri Lanka', 'ragama', '0776325412', '1a, station road, ragama', 'man.png'),
(28, '::1', 'azahd nazar', 'azadh@yahoo.com', 'azadh', 'Sri Lanka', 'dematagoda', '0774584754', '32,dematagoda road, dematagoda', 'man.png'),
(27, '::1', 'dharmalingham aravinda', 'aravinda@gmail.com', 'aravinda', 'Sri Lanka', 'modara', '0775454632', '22, modara road, mattakkuliya', 'man.png'),
(25, '::1', 'abdallah', 'abdasalaf@yahoo.com', 'rambo', 'Armenia', 'colombo', '0777587835', 'enderamulla', 'abdallah.jpg'),
(26, '::1', 'adrian pravishan dias ', 'adrian@gmail.com', 'adrian', 'Sri Lanka', 'wattala', '0775858965', '22, sampaya mawatha, enderamulla, wattala', 'adrian.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `feedback_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(100) NOT NULL,
  `customer_feedback` varchar(255) NOT NULL,
  PRIMARY KEY (`feedback_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `customer_name`, `customer_feedback`) VALUES
(7, 'azadh', 'great products'),
(4, 'JOHN', 'excellent service provided'),
(6, 'jack', 'highly recommend others'),
(8, 'david', 'the best products in town');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(100) NOT NULL AUTO_INCREMENT,
  `product_category` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(100) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_description` varchar(500) NOT NULL,
  `product_image` text NOT NULL,
  `product_keyword` varchar(100) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_category`, `product_brand`, `product_title`, `product_price`, `product_description`, `product_image`, `product_keyword`) VALUES
(13, 1, 4, 'Dell Inspiron 5570', 138000, '<p>Windows 10 Home | Intel core i7 | 8GB DDR4 | 15.6 | Intel HD Graphics | Wifi | BT | Webcam</p>', 'Dell Inspiron 5570.jpg', 'dell'),
(14, 1, 4, 'Dell Vostro 3578', 106000, '<p><span style=\"font-family: Thasadith; font-size: large; text-align: center; background-color: #ffffff;\">Dos | Intel core i5 | 4GB DDR4 | 15.6 | 2GB Redorn R5 530</span><span style=\"font-family: Thasadith; font-size: large; text-align: center; background-color: #ffffff;\"> | Wifi | BT | Webcam | 3 Year warranty</span></p>', 'Dell Vostro 3578.jpg', 'dell, vostro'),
(15, 1, 4, 'Dell G7588-7413blk', 260000, '<p><span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-family: Thasadith; font-size: large; text-align: center; background-color: #ffffff;\">Windows 10 home | Intel core i7 | 16GB | 15.6 | NVIDIA GEFORCE GTX 1060</span><span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-family: Thasadith; font-size: large; text-align: center; background-color: #ffffff;\">&nbsp;| Wifi | BT | Webcam | 3 Year warranty</span></p>', 'Dell G7588-7413blk.jpg', 'dell'),
(16, 1, 4, 'Dell Inspiron 5481', 139000, '<p><span style=\"font-family: Thasadith; font-size: large; text-align: center; background-color: #ffffff;\">Windows 10 Home | Intel core i5 | 8GB DDR4 | 14\" | Intel UHD Graphics 620 | Wifi | BT | Webcam</span></p>', 'Dell Inspiron 5481.jpg', 'dell, inspiron'),
(18, 1, 4, 'Dell Inspiron 5570 - 5279', 110000, '<p><span style=\"font-family: Thasadith; font-size: large; text-align: center; background-color: #ffffff;\">Windows 10 Home | Intel core i5 | 8GB DDR4 | 14\" | Intel UHD Graphics 620 | Wifi | BT | Webcam</span></p>', 'Dell Inspiron 5570 - 5279.jpg', 'dell, inspiron'),
(19, 1, 4, 'Dell Inspiron 11 - 3179', 81000, '<p><span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-family: Thasadith; font-size: large; text-align: center; background-color: #ffffff;\">Windows 10 home | Intel core M3 | 4GB DDR4 | 11.6\" | INTEL HD Graphics</span><span style=\"margin: 0px; padding: 0px; border: 0px; vertical-align: baseline; font-family: Thasadith; font-size: large; text-align: center; background-color: #ffffff;\"> | Wifi | BT | Webcam | 3 Year warranty</span></p>', 'Dell Inspiron 11 - 3179.jpg', 'dell, inspiron'),
(21, 1, 5, 'Hp Probook 450 G5', 147000, '<p><span style=\"font-family: Thasadith; font-size: large; text-align: center; background-color: #ffffff;\">Windows 10 Pro | Intel core i5 | 8GB DDR4 | 14\" | Intel UHD Graphics 620 | Wifi | BT | Webcam</span></p>', 'Hp Probook 450 G5.jpg', 'hp, probook'),
(22, 1, 5, ' Hp Spectre X360', 252000, '<p><span style=\"font-family: Thasadith; font-size: large; text-align: center; background-color: #ffffff;\">Windows 10 Home | Intel core i7 | 8GB DDR4 | 14\" | Intel UHD Graphics 620 | Wifi | BT | Webcam</span></p>', 'Hp Spectre X360.jpg', 'hp, spectre'),
(23, 1, 5, ' Hp Probook 470 G5', 203000, '<p><span style=\"font-family: Thasadith; font-size: large; text-align: center; background-color: #ffffff;\">Windows 10 Pro | Intel core i7 | 8GB DDR4 | 17.3\" | 2GB Geforce 930MX | Wifi | BT | Webcam</span></p>', 'Hp Probook 470 G5.jpg', 'hp, probook'),
(24, 1, 5, 'Hp Pavilion 15', 148500, '<p><span style=\"font-family: Thasadith; font-size: large; text-align: center; background-color: #ffffff;\">Windows 10 Home | Intel core i7 | 8GB DDR4 | 15.6\" | 4GB AMD R5 530 | Wifi | BT | Webcam | 4 Year warranty</span></p>', 'Hp Pavilion 15 - Cu0010tx.jpg', 'hp, pavilion'),
(25, 1, 5, 'Hp 15 - Da0028tu', 92000, '<p><span style=\"font-family: Thasadith; font-size: large; text-align: center; background-color: #ffffff;\">Windows 10 Home | Intel core i5 | 4GB DDR4 | 15.6\" | Intel UHD Graphics | Wifi | BT | Webcam | 4 Year warranty</span></p>', 'Hp 15 - Da0028tu.jpg', 'hp'),
(26, 1, 5, 'Hp 15 - Da0004tu', 73000, '<p><span style=\"font-family: Thasadith; font-size: large; text-align: center; background-color: #ffffff;\">Windows 10 Home | Intel core i3 | 4GB DDR4 | 15.6\" | Intel UHD Graphics | Wifi | BT | Webcam | 4 Year warranty</span></p>', 'Hp 15 - Da0004tu.jpg', 'hp'),
(27, 1, 3, 'Asus Vivobook X542ua', 80000, '<p><span style=\"font-family: Thasadith; font-size: large; text-align: center; background-color: #ffffff;\">Windows 10 Home | Intel core i3 | 4GB DDR4 | 15.6\" | Intel UHD Graphics | Wifi | BT | Webcam | 4 Year warranty</span></p>', 'Asus Vivobook X542ua.png', 'asus, vivobook'),
(28, 1, 3, 'Asus Vivobook X540ua', 102000, '<p><span style=\"font-family: Thasadith; font-size: large; text-align: center; background-color: #ffffff;\">Windows 10 Home | Intel core i5 | 4GB DDR4 | 15.6\" | Intel UHD Graphics | Wifi | BT | Webcam | 4 Year warranty</span></p>', 'Asus Vivobook X540ua.jpg', 'asus, vivobook'),
(29, 1, 3, 'Asus Vivobook X507uf', 117000, '<p><span style=\"font-family: Thasadith; font-size: large; text-align: center; background-color: #ffffff;\">Windows 10 Home | Intel core i5 | 8GB DDR4 | 15.6\" | 2GB Geforce 130MX | Wifi | BT | Webcam | 4 Year warranty</span></p>', 'Asus Vivobook X507uf.png', 'asus, vivobook'),
(30, 1, 3, 'Asus Vivobook S530fn', 147500, '<p><span style=\"font-family: Thasadith; font-size: large; text-align: center; background-color: #ffffff;\">Windows 10 Home | Intel core i5 | 8GB DDR4 | 15.6\" | 2GB Geforce MX130 | Wifi | BT | Webcam | 4 Year warranty</span></p>', 'Asus Vivobook S530fn.png', 'asus, vivobook'),
(31, 1, 3, 'Asus Vivobook Tp412u', 162500, '<p><span style=\"font-family: Thasadith; font-size: large; text-align: center; background-color: #ffffff;\">Windows 10 Home | Intel core i5 | 8GB DDR4 | 14\" | Intel UHD Graphics | Wifi | BT | Webcam | 4 Year warranty</span></p>', 'Asus Vivobook Tp412u.png', 'asus, vivobook'),
(32, 1, 3, 'Asus S406ua', 137000, '<p><span style=\"font-family: Thasadith; font-size: large; text-align: center; background-color: #ffffff;\">Windows 10 Home | Intel core i5 | 8GB DDR4 | 14\" | Intel UHD Graphics | Wifi | BT | Webcam | 4 Year warranty</span></p>', 'Asus S406ua.png', 'asus, vivobook'),
(33, 1, 1, 'Acer Swift 3 I5', 129500, '<p><span style=\"font-family: Thasadith; font-size: large; text-align: center; background-color: #ffffff;\">Windows 10 Home | Intel core i5 | 8GB DDR4 | 15.6\" | 2GB Geforce MX150 | Wifi | BT | Webcam | 4 Year warranty</span></p>', 'Acer Swift 3.jpg', 'acer, swift'),
(34, 1, 1, 'Acer Swift 3 I7', 147000, '<p><span style=\"font-family: Thasadith; font-size: large; text-align: center; background-color: #ffffff;\">Windows 10 Home | Intel core i7 | 8GB DDR4 | 15.6\" | 2GB Geforce MX150 | Wifi | BT | Webcam | 4 Year warranty</span></p>', 'Acer Swift 3.jpg', 'acer, swift'),
(35, 1, 1, 'Acer One 10 S1003-15sl', 56000, '<p><span style=\"font-family: Thasadith; font-size: large; text-align: center; background-color: #ffffff;\">Windows 10 Home | Intel atom X5 | 4GB DDR3 | 10.1\" Touch | Intel HD Graphics | Wifi | BT | Webcam | 4 Year warranty</span></p>', 'Acer One 10 S1003-15sl.jpg', 'acer, one'),
(36, 1, 1, 'Acer Swift 5', 186000, '<p><span style=\"font-family: Thasadith; font-size: large; text-align: center; background-color: #ffffff;\">Windows 10 Pro | Intel core i7 | 8GB DDR4 | 14\" FHD Touch | Intel HD Graphics | Wifi | BT | Webcam | 4 Year warranty</span></p>', 'Acer Swift 5.jpg', 'acer, swift'),
(37, 6, 2, 'Apple iPhone XR', 164800, '<p>Coral Blue/Red/Black/White/Yellow | 64/128/256 GB memory + 3GB RAM | IPS LCD capactive touchscreen | iOS 12 | Apple A12 Bionic | GSM/CDMA/HSPA/EVDO/LTE</p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>', 'Apple iPhone XR.jpg', 'apple, iphone'),
(38, 6, 2, 'Apple iPhone Xs', 218900, '<p>Coral Blue/Red/Black/White/Yellow | 64/128/256 GB memory | 4GB RAM | Single Sim or Dualsim | OLED capactive touchscreen | iOS 12 | Apple A12 Bionic | GSM/CDMA/HSPA/EVDO/LTE</p>\r\n<p>&nbsp;</p>', 'Apple iPhone Xs.jpg', 'apple, iphone'),
(39, 6, 2, 'Apple iphone XS max', 222900, '<p>Blue/Red/Black/White/Yellow | 64/128/256 GB | 4GB RAM | Single Sim/Dualsim | OLED capactive touchscreen | iOS 12 | Apple A12 Bionic | GSM/CDMA/HSPA/EVDO/LTE</p>', 'apple iphone xs max.png', 'apple, iphone'),
(40, 3, 5, 'Hp Omen Mouse', 9500, '<p>Hp Omen Mouse Steel Series | 1:1 Tracking, adjustable CPI, extreme precision, zero hardware acceleration, sweat resistance side grips, lighting zones with 16.8 million colors, service life of more than 30 million clicks.</p>', 'Hp Omen Mouse Steel Series.jpg', 'hp, omen, mouse'),
(41, 3, 5, 'Hp Omen Headset', 12700, '<p>Balanced Soundscape | Retractable Mic</p>', 'Hp Omen Headset Steelseries.jpg', 'hp, omen, headset'),
(42, 3, 5, ' Hp K2500 Wireless Keyboard', 3700, '<p>Connector USB | Wireless Nano receiver</p>', 'Hp K2500 Wireless Keyboard.jpg', 'hp, wireless, keyboard'),
(43, 3, 5, 'Hp X3000 Wireless Mouse', 2500, '<p>Color: Black | 3 buttons | Scroll wheel | USB wireless receiver</p>', 'Hp X3000 Wireless Mouse.png', 'hp, wireless, mouse'),
(44, 3, 5, 'Hp H2800 White Headset', 3700, '<p>Color: White | 3.5mm Jack</p>', 'Hp H2800 White Headset.jpg', 'hp, headset');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
