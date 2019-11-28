-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2019 at 08:18 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(6) NOT NULL,
  `user_name` varchar(60) NOT NULL,
  `status` varchar(20) NOT NULL,
  `total` double(8,2) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_name`, `status`, `total`, `created`) VALUES
(31, 'wong', 'Delivered', 8380.00, '2019-11-24 11:51:43'),
(32, 'wong', 'Delivered', 10000.00, '2019-11-24 11:52:50'),
(33, 'wong', 'Delivered', 2000.00, '2019-11-24 11:54:40'),
(34, 'TAN JIA HUI', 'Delivered', 1800.00, '2019-11-24 11:55:04'),
(35, 'TAN JIA HUI', 'Delivered', 1800.00, '2019-11-24 13:58:44'),
(36, 'TAN JIA HUI', 'Delivered', 5600.00, '2019-11-24 15:06:12'),
(37, 'Tyler One', 'Delivered', 580.00, '2019-11-24 15:08:21'),
(38, 'TAN JIA HUI', 'Pending', 4000.00, '2019-11-24 16:08:23'),
(39, 'TAN JIA HUI', 'Pending', 2000.00, '2019-11-24 16:41:46'),
(40, 'TAN JIA HUI', 'Pending', 6400.00, '2019-11-26 19:28:49');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(8) NOT NULL,
  `order_id` int(8) NOT NULL,
  `product_id` int(8) NOT NULL,
  `quantity` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`) VALUES
(19, 31, 2, 1),
(20, 31, 1, 3),
(21, 31, 3, 1),
(22, 32, 1, 5),
(23, 33, 1, 1),
(24, 34, 3, 1),
(25, 35, 9, 1),
(26, 36, 7, 2),
(27, 36, 8, 1),
(28, 36, 3, 1),
(29, 37, 2, 1),
(30, 38, 1, 2),
(31, 39, 1, 1),
(32, 40, 3, 2),
(33, 40, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(3) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` double(8,2) NOT NULL,
  `image` text NOT NULL,
  `details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `brand`, `name`, `price`, `image`, `details`) VALUES
(1, 'Nikon', 'B700', 2000.00, 'product/nikonb700.jpg', 'Use that power to capture stunning 20.2 megapixel RAW images, 4K Ultra High Definition (UHD) videos with stereo sound or 5 FPS high-speed sequences in nearly any light.'),
(2, 'Nikon', 'A300', 580.00, 'product/nikona300.jpg', '20.1Mp CMOS Sensor, 8x Optical / 16x Dynamic Zoom, HD720p movie mode, Target Finding AF with Face detection, 4-axis Hybrid VR system and 10 Scene Auto Select.'),
(3, 'Nikon', 'D3100', 1800.00, 'product/nikond3100.jpg', '14.2 megapixel DX-format CMOS sensor, 3.0 inch LCD, 1080p HD video with full-time AF, 11 AF points (with 3D tracking) and IS0 100-3200 range (12800 expanded).'),
(4, 'Canon', 'Powershot SX70 HS', 1900.00, 'product/canonsx70.jpg', 'The Canon PowerShot SX70 HS is a super-zoom point-and-shoot camera with a 65x, 21-1365mm equivalent F3.4-6.5 lens and 20MP BSI-CMOS sensor. '),
(5, 'Canon', 'IXUS 285 HS', 820.00, 'product/canonixus285.jpg', '20.2 megapixels high sensitivity CMOS sensor,12x Optical Zoom (25mm-300mm) with 24x ZoomPlus and Wi-Fi & NFC.'),
(6, 'Sony', 'Alpha A6000', 5000.00, 'product/sonyalpha.jpg', 'Ultrafast autofocus with 179 AF points and Focus Sensitivity Range :EV 0 to EV 20 (at ISO 100 equivalent with F2.8 lens attached), capture Life in high resolution with 24MP APS-C sensor, easy and intuitive controls help you shoot Like a Pro, smartphone remote control and sharing via NFC and Wi-Fi and OLED electronic viewfinder with 100% coverage and 1.4 million dots.'),
(7, 'Sony', 'Cybershot DSC W830', 500.00, 'product/sonycybershot.jpg', '720p MP4 movie mode the camera shoots, 1280 x 720 high definition movies at 30 fps, 8x optical zoom Carl Zeiss Vario Tessar lens, equipped with sweep panorama, intelligent auto and picture effect and 2.7-inch (230K dots) clear photo LCD display.'),
(8, 'Sony', 'A5100', 2800.00, 'product/sonya5100.jpg', 'Ultra-fast auto focus with 179 AF points and 6Fps, capture life in high resolution with 24MP APS-C sensor, lens compatibility Sony E-mount lenses and instant sharing via smartphone with Wi-Fi and NFC.'),
(9, 'Canon ', 'EOS 4000D', 1800.00, 'product/canoneos4000d.jpg', '18-megapixel APS-C sensor, full HD movie recording, built-in Wi-Fi, Canon Connect app, 3fps burst shooting, Inbuilt Feature Guide, Creative Auto mode and Creative Filters & 2.7 inches LCD screen.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(16) NOT NULL,
  `address` varchar(60) NOT NULL,
  `postcode` varchar(5) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `phone` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `name`, `email`, `password`, `address`, `postcode`, `city`, `state`, `phone`) VALUES
(1, 'TAN JIA HUI', 'tan@gmail.com', '12345678', '6 , Jalan Taiff,, Taman Ng Lia', '09000', 'George Town', 'Penang', '0123456789'),
(2, 'ALI BIN ABU', 'ali@ali.com', 'abc12345', '699, Jalan LKY, Taman Ng Liang', '10150', 'George Town', 'Penang', '011-2937432'),
(3, 'Goh ', 'goh@gmail.com', '66720404', '2,Jalan 2', '09000', 'George Town', 'Penang', '0123456789'),
(4, 'wong', 'wong@gmail.com', '1234', '6 , Jalan Taiff,, Taman Ng Lia', '09000', 'George Town', 'Penang', '0123757281'),
(5, 'Tyler One', 'tylerone@yahoo.com', '12345678', '6 , Jalan ABC, Taman PYB', '09000', 'George Town', 'Penang', '012-364 5693');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `UserName` (`user_name`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orderID` (`order_id`),
  ADD KEY `productID` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `UserName` FOREIGN KEY (`user_name`) REFERENCES `user` (`name`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `orderID` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productID` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
