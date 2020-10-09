-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 08, 2020 at 02:47 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bubbletea`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(16) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `tea` varchar(100) NOT NULL,
  `add_on` varchar(100) CHARACTER SET latin1 NOT NULL,
  `price_r` varchar(100) CHARACTER SET latin1 NOT NULL,
  `price_l` varchar(100) CHARACTER SET latin1 NOT NULL,
  `product_image` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `tea`, `add_on`, `price_r`, `price_l`, `product_image`) VALUES
(1, 'Original Milk Tea', 'Milk Tea', 'Pearls', '4.0', '4.5', 'img/bubbleTea/bubble_tea_1.png'),
(2, 'Strawberry Green Tea', 'Green Tea', 'Puree', '5.0', '5.5', 'img/bubbleTea/bubble_tea_2.png'),
(3, 'Hokkaido Green Milk Tea', 'Milk Tea', 'Pearls', '5.5', '6.0', 'img/bubbleTea/bubble_tea_3.png'),
(4, 'Thai Tea', 'Other', 'Pearls', '5.5', '6.0', 'img/bubbleTea/bubble_tea_4.png'),
(5, 'Passion Fruit Green Tea', 'Green Tea', 'Puree', '5.0', '5.5', 'img/bubbleTea/bubble_tea_5.png'),
(6, 'Taro Milk Tea', 'Milk Tea', 'Pearls', '4.5', '5.0', 'img/bubbleTea/bubble_tea_6.png'),
(7, 'Lychee Black Tea', 'Black Tea', 'Puree', '5.0', '5.5', 'img/bubbleTea/bubble_tea_7.png'),
(8, 'Green Apple Green Tea', 'Green Tea', 'Puree', '5.0', '5.5', 'img/bubbleTea/bubble_tea_8.png'),
(9, 'Jasmine Green Tea', 'Green Tea', 'Puree', '5.0', '5.5', 'img/bubbleTea/bubble_tea_9.png'),
(10, 'Pineapple Green Tea', 'Green Tea', 'Puree', '5.0', '5.5', 'img/bubbleTea/bubble_tea_10.png'),
(11, 'Coconut Milk Tea', 'Milk Tea', 'Pearls', '4.5', '5.0', 'img/bubbleTea/bubble_tea_11.png'),
(12, 'Peach Green Tea', 'Green Tea', 'Puree', '5.0', '5.5', 'img/bubbleTea/bubble_tea_12.png'),
(13, 'Matcha Milk Tea', 'Milk Tea', 'Pearls', '4.5', '5.0', 'img/bubbleTea/bubble_tea_13.png'),
(14, 'Almond Milk Tea', 'Milk Tea', 'Pearls', '4.5', '5.0', 'img/bubbleTea/bubble_tea_14.png'),
(15, 'Rose Milk Tea', 'Milk Tea', 'Pearls', '4.5', '5.0', 'img/bubbleTea/bubble_tea_15.png'),
(16, 'Mango Green Tea', 'Green Tea', 'Puree', '5.0', '5.5', 'img/bubbleTea/bubble_tea_16.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
