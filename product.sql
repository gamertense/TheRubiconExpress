-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2017 at 03:53 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rubi`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `specification` text NOT NULL,
  `comment` int(11) NOT NULL,
  `category_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `name`, `price`, `image`, `specification`, `comment`, `category_id`) VALUES
(2, 'Samsung Galaxy S8 ', 22000.00, 'product-images/s8.jpg', '1440p AMOLED Display|8 Gbs of RAM|Android 6.0|Wireless charging|USB-c', 0, 1),
(3, 'iPhone X', 40000.00, 'product-images/ix.jpg', '1440p AMOLED display|Face-scanner|Apple Logo', 0, 1),
(4, 'Samsung Galaxy Note 8', 32000.00, 'product-images/note8.jpg', '', 0, 1),
(5, 'google pixel 2', 33000.00, 'product-images/google.jpg', '', 0, 1),
(7, 'HTC One A9', 15000.00, 'product-images/one.jpg', '', 0, 1),
(8, 'Nokia 5', 9000.00, 'product-images/nikia.jpg', '', 0, 1),
(9, 'The Last of Us', 1470.00, 'game-images/TLOU.jpg', 'PS4|Singleplayer|Multiplayer', 0, 2),
(10, 'Horizon Zerodawn', 1860.00, 'game-images/HZD.jpg', 'PS4|Singleplayer|Openworld', 0, 2),
(11, 'Assassin\'s creed Origin', 1980.00, 'game-images/ACO.jpg', 'PC|PS4|XBOX1|Singleplayer|Openworld', 0, 2),
(12, 'Zelda Breath of the Wild', 1670.00, 'game-images/Z-BOTW.jpg', 'Switch|Singleplayer|Openworld', 0, 2),
(13, 'Civilization VI', 1540.00, 'game-images/CIV6.jpg', 'PC|Strategy', 0, 2),
(14, 'Persona 5', 1790.00, 'game-images/P5.jpg', 'PS4|JRPG', 0, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
