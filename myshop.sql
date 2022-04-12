-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2019 at 02:55 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `myshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `admin_id` int(10) NOT NULL AUTO_INCREMENT,
  `admin_email` varchar(100) NOT NULL,
  `admin_pass` varchar(100) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_email`, `admin_pass`) VALUES
(1, 'ankitnarwade51@gmail.com', 'Ankit@123'),
(2, 'omnarwade51@gmail.com', 'Om@123');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
  `brand_id` int(10) NOT NULL AUTO_INCREMENT,
  `brand_title` text NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'Hp'),
(2, 'Dell'),
(3, 'Nokia'),
(4, 'Samsung'),
(5, 'Sony'),
(6, 'Motorola'),
(7, 'Iball');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(10) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`p_id`, `ip_add`, `qty`) VALUES
(12, '::1', 0),
(20, '::1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `cat_title` text NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(2, 'Computers'),
(3, 'Mobiles'),
(4, 'Cameras'),
(5, 'Tablets');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_pass` varchar(10) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` int(13) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` int(100) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`) VALUES
(24, 'ankit Narwade', 'ankitnarwade51@gmail.com', 'ankit@123', 'india', 'Risod', 2147483647, 'At bibkheda', 'Bank Passbook.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE IF NOT EXISTS `customer_orders` (
  `order_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `total_products` int(100) NOT NULL,
  `order_date` timestamp NOT NULL,
  `order_status` text NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `payment_id` int(10) NOT NULL AUTO_INCREMENT,
  `invoice_no` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `payment_mode` text NOT NULL,
  `ref_no` int(10) NOT NULL,
  `code` int(10) NOT NULL,
  `payment_date` text NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE IF NOT EXISTS `pending_orders` (
  `order_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `order_status` text NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(10) NOT NULL AUTO_INCREMENT,
  `cat_id` int(10) NOT NULL,
  `brand_id` int(10) NOT NULL,
  `date` timestamp NOT NULL,
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_desc` text NOT NULL,
  `product_keywords` text NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `cat_id`, `brand_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_desc`, `product_keywords`, `status`) VALUES
(12, 1, 1, '2019-03-13 14:13:35', 'HP 15 Intel Core i7', 'hp3.jpg', 'hp.jpg', 'hp.jpg', 55000, '<p>Best Product</p>', 'Hp Laptops', 'on'),
(13, 1, 2, '2019-03-04 08:34:34', 'Dell Inspiron 3567', 'dell2.jpg', 'dell4.jpg', 'dell4.jpg', 49000, '<p>This Is Best Top 10</p>', 'Dell Laptops', 'on'),
(14, 3, 3, '2019-03-04 08:38:12', 'Nokia 7.1_BL', 'nokia.jpg', 'nokia1.jpg', 'noki2.jpg', 14000, '<p>Noki Is One Of the Most Pupular&nbsp;</p>', 'Nokia Mobiles', 'on'),
(15, 4, 5, '2019-03-04 08:41:18', 'Sony DSC W830 Cyber-Shot ', 'sony.jpg', 'sony1.jpg', 'sony2.jpg', 8000, '<p>Bst cameras for 2019</p>', 'Sony Camaras', 'on'),
(16, 5, 2, '2019-03-04 08:45:26', 'Lenovo Tab4 10 ', 'delltab.jpg', 'delltab1.jpg', 'delltab.jpg', 3500, '<p>This Is Best For 2019</p>', 'Lenovo Tablets', 'on'),
(17, 3, 4, '2019-03-04 10:25:24', 'Samsung galaxy s5', 'samsung4.jpg', 'samsung2.jpg', 'samsung4.jpg', 25000, '<p>This Is Best Product 2019</p>', 'Samsung Mobiles', 'on'),
(18, 1, 1, '2019-03-05 03:09:58', 'HP Core I3', 'hp3.jpg', 'lenovo3.jpg', 'hp.jpg', 40000, '<p>This Is Very Nice Laptop</p>', 'Hp Laptops', 'on'),
(19, 1, 2, '2019-03-05 03:12:21', 'Dell Core I7', 'dell4.jpg', 'dell.jpg', 'dell2.jpg', 45000, '<p>This Is Best Laptops</p>', 'Dell Laptops', 'on'),
(20, 1, 5, '2019-03-05 03:14:24', 'Sony Note 3', 'sony.jpg', 'sony1.jpg', 'sony2.jpg', 6000, '<p>This Is&nbsp; Very Nice Best Laptop</p>', 'Sony Laptops', 'on'),
(21, 1, 5, '2019-03-05 03:40:37', 'Sony Note 3', 'sony.jpg', 'sony1.jpg', 'sony2.jpg', 6000, '<p>This Is&nbsp; Very Nice Best Laptop</p>', 'Sony Camaras', 'on');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
