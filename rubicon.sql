-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2017 at 03:06 PM
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
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `cu_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `cu_id`, `product_id`, `quantity`) VALUES
(1, 1, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(20) NOT NULL,
  `category_product` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_product`) VALUES
(1, 'Smart Phone', ''),
(2, 'Video games', '');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `com_id` int(11) NOT NULL,
  `com_name` varchar(50) NOT NULL,
  `com_comment` text NOT NULL,
  `food_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`com_id`, `com_name`, `com_comment`, `food_id`) VALUES
(22, 'pon', 'test', 2),
(27, 'Antonio Jack', 'à¸°à¸³à¸«à¸°à¸°à¸°', 2);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cu_id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cu_id`, `email`, `password`, `name`, `address`) VALUES
(1, 'a@a.com', '123', 'Antonio Jack', 'This is an address'),
(2, 'b@b.com', '123', 'John Doe', 'John Doe\'s address'),
(3, 'c@c.com', '123', 'Jane Doe', 'Jane Doe\'s address');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `cu_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `orderDate` date NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `isDelivered` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 = not delivered, 1 otherwise'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `cu_id`, `product_id`, `orderDate`, `quantity`, `isDelivered`) VALUES
(1, 3, 2, '2017-01-22', 1, 1),
(2, 1, 2, '2017-01-22', 2, 1),
(3, 2, 2, '2017-02-22', 3, 0),
(4, 2, 2, '2017-03-22', 3, 0),
(5, 2, 2, '2017-03-22', 2, 0),
(6, 1, 2, '2017-04-22', 2, 1),
(7, 1, 2, '2017-04-22', 3, 0),
(8, 2, 2, '2017-04-22', 2, 0),
(9, 3, 2, '2017-04-22', 2, 0),
(10, 3, 2, '2017-04-22', 3, 0),
(11, 3, 2, '2017-05-22', 2, 0),
(12, 1, 2, '2017-05-22', 1, 0),
(13, 1, 2, '2017-05-22', 1, 0),
(14, 3, 2, '2017-06-22', 1, 0),
(15, 2, 2, '2017-07-22', 2, 0),
(16, 2, 2, '2017-07-22', 3, 0),
(17, 1, 2, '2017-07-22', 1, 0),
(18, 3, 2, '2017-08-22', 3, 0),
(19, 3, 2, '2017-08-22', 3, 0),
(20, 1, 2, '2017-08-22', 3, 0),
(21, 3, 2, '2017-09-22', 2, 0),
(22, 1, 2, '2017-09-22', 1, 0),
(23, 2, 2, '2017-09-22', 1, 0),
(24, 2, 2, '2017-09-22', 2, 0),
(25, 2, 2, '2017-09-22', 2, 0),
(26, 1, 2, '2017-10-22', 1, 0),
(27, 3, 2, '2017-10-22', 3, 0),
(28, 3, 2, '2017-10-22', 2, 0),
(29, 1, 2, '2017-10-22', 1, 0),
(30, 2, 2, '2017-10-22', 1, 0);

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

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `wishlist_id` int(11) NOT NULL,
  `cu_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `cu_id` (`cu_id`),
  ADD KEY `product_id` (`product_id`) USING BTREE;

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cu_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `cu_id` (`cu_id`),
  ADD KEY `product_id` (`product_id`) USING BTREE;

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`wishlist_id`),
  ADD KEY `cu_id` (`cu_id`),
  ADD KEY `product_id` (`product_id`) USING BTREE,
  ADD KEY `product_id_2` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `wishlist_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`cu_id`) REFERENCES `customer` (`cu_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`cu_id`) REFERENCES `customer` (`cu_id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `cu_id` FOREIGN KEY (`cu_id`) REFERENCES `customer` (`cu_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
