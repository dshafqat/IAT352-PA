-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 12, 2020 at 04:58 AM
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
-- Database: `Kimmy_Chu`
--
CREATE DATABASE IF NOT EXISTS `Kimmy_Chu` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `Kimmy_Chu`;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `cid` int(255) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `product_code` varchar(11) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cid`, `product_name`, `product_price`, `product_image`, `qty`, `product_code`) VALUES
(1, 'Original Milk Tea', '4.0', 'img/bubbleTea/bubble_tea_1.png', '2', 'P001');
COMMIT;
-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(16) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_name` varchar(100) NOT NULL,
  `product_code` varchar(16) NOT NULL,
  `tea` varchar(100) NOT NULL,
  `add_on` varchar(100) CHARACTER SET latin1 NOT NULL,
  `price_r` varchar(100) CHARACTER SET latin1 NOT NULL,
  `product_image` varchar(100) CHARACTER SET latin1 NOT NULL,
  `detail_image` varchar(100) NOT NULL,
  `information` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_code`, `tea`, `add_on`, `price_r`, `product_image`, `detail_image`, `information`) VALUES
(1, 'Original Milk Tea', 'P001', 'Milk Tea', 'Pearls', '4.0', 'img/bubbleTea/bubble_tea_1.png', 'img/product_info/product1.jpg', 'The tea: We used Tetley’s orange pekoe black tea for its strong flavour and rich colour.\r\nThe milk: In this case, we’re not using real “milk”. We chose to use Coffee Mate’s non-dairy powdered creamer for a richer and milkier flavour and a slightly richer texture.\r\nThe sweetener: We used regular granulated white sugar because we want to keep the sweetener flavour neutral.'),
(2, 'Strawberry Green Tea', 'P002', 'Green Tea', 'Puree', '5.0', 'img/bubbleTea/bubble_tea_2.png', 'img/product_info/product2.jpg', 'Juicy strawberry notes in our fruit and botanical blends are combined with premium Teavana® Green Tea then slightly sweetened with liquid cane sugar for a refreshing afternoon drink free from artificial flavors & sweeteners.'),
(3, 'Hokkaido Green Milk Tea', 'P003', 'Milk Tea', 'Pearls', '5.5', 'img/bubbleTea/bubble_tea_3.png', 'img/product_info/product3.jpg', 'Hokkaido is a region in Japan and in this region they have perfect a variety of a richer and creamier milk tea that is enjoyed all across the globe. Its main difference from other milk teas is its deep tea and caramel like flavors.'),
(4, 'Thai Tea', 'P004', 'Other', 'Pearls', '5.5', 'img/bubbleTea/bubble_tea_4.png', 'img/product_info/product4.jpg', 'The tea itself is a blend of black tea infused with spices. The orange color was added to make the tea stand out amongst other teas. The tea mixture may also have sugar and evaporated milk added that give it the sweet, creamy taste.'),
(5, 'Passion Fruit Green Tea', 'P005', 'Green Tea', 'Puree', '5.0', 'img/bubbleTea/bubble_tea_5.png', 'img/product_info/product5.jpg', 'A little sweet, a little tart – our passion fruit green tea is made with REAL passion fruit seeds! Which means it’s loaded with delicious, refreshing flavour!'),
(6, 'Taro Milk Tea', 'P006', 'Milk Tea', 'Pearls', '4.5', 'img/bubbleTea/bubble_tea_6.png', 'img/product_info/product6.jpg', 'Sweet, rich, and creamy taro root combines with classic milk tea for an amazing and colorfully purple drink hugely popular all over Asia. Milky tea with boba pearls. Main ingredient is taro powder with a creamy taste and added with ice to make this drink cool and delicious'),
(7, 'Lychee Black Tea', 'P007', 'Black Tea', 'Puree', '5.0', 'img/bubbleTea/bubble_tea_7.png', 'img/product_info/product7.jpg', 'Full-bodied black tea flavour with a touch of tropical fruitiness. The unique perfumed flavor of the lychee fruit paired with fine China black tea results in a distinct uplifting taste'),
(8, 'Green Apple Green Tea', 'P008', 'Green Tea', 'Puree', '5.0', 'img/bubbleTea/bubble_tea_8.png', 'img/product_info/product8.jpg', 'Juicy green apple notes in our fruit and botanical blends are combined with premium Teavana® Green Tea then slightly sweetened with liquid cane sugar for a refreshing afternoon drink free from artificial flavors & sweeteners.'),
(9, 'Jasmine Green Tea', 'P009', 'Green Tea', 'Puree', '5.0', 'img/bubbleTea/bubble_tea_9.png', 'img/product_info/product9.jpg', 'Pure green tea expertly blended and infused with real jasmine flowers to deliver a fragrant tea with a unique floral aroma and taste.Made without artificial ingredients, this jasmine green tea provides a wholesome tea experience.'),
(10, 'Pineapple Green Tea', 'P010', 'Green Tea', 'Puree', '5.0', 'img/bubbleTea/bubble_tea_10.png', 'img/product_info/product10.jpg', 'Tropical pineapple flavors from our fruit and botanical blends are combined with premium Teavana® Green Tea, lemonade, then slightly sweetened with liquid cane sugar for a refreshing drink that\'s just subtly sweet.'),
(11, 'Coconut Milk Tea', 'P011', 'Milk Tea', 'Pearls', '4.5', 'img/bubbleTea/bubble_tea_11.png', 'img/product_info/product11.jpg', 'A hint of creamy coconut mixed with our signature milk tea. This Coconut Milk Tea will take your tastebuds for a trip with our signature milk tea and a hint of creamy coconut mixed for a tropical flavour.'),
(12, 'Peach Green Tea', 'P012', 'Green Tea', 'Puree', '5.0', 'img/bubbleTea/bubble_tea_12.png', 'img/product_info/product12.jpg', 'The soft and subtle sweetness of refreshing and fruity peach. This boldly flavored iced tea—made with a combination of our peach-flavored fruit juice blend and Teavana® iced green tea, and then sweetened with liquid cane sugar and hand-shaken with ice—brings you refreshing vibes.'),
(13, 'Matcha Milk Tea', 'P013', 'Milk Tea', 'Pearls', '4.5', 'img/bubbleTea/bubble_tea_13.png', 'img/product_info/product13.jpg', 'A spin on traditional Matcha green tea, smooth and creamy matcha sweetened just right and served with steamed milk. This favorite will transport your senses to pure green delight.'),
(14, 'Almond Milk Tea', 'P014', 'Milk Tea', 'Pearls', '4.5', 'img/bubbleTea/bubble_tea_14.png', 'img/product_info/product14.jpg', 'Almond milk tea is a type of boba or \"bubble tea,\" with tapioca balls on the bottom of the tea for extra taste and texture. Enjoy the rich flavor of almonds in milk teas. We carry the creamiest, most satisfying almond milk tea this side of the Atlantic Ocean. This caffeine-free drink makes soothing hot beverages on stormy, wintry evenings.'),
(15, 'Rose Milk Tea', 'P015', 'Milk Tea', 'Pearls', '4.5', 'img/bubbleTea/bubble_tea_15.png', 'img/product_info/product15.jpg', 'Rose milk tea is a delicious combination of black tea infused with floral, aromatic rose syrup and a splash of warm milk. A perfect and comfort drink to warm up inside out in this cold weather.'),
(16, 'Mango Green Tea', 'P016', 'Green Tea', 'Puree', '5.0', 'img/bubbleTea/bubble_tea_16.png', 'img/product_info/product16.jpg', 'The tropical flavour of juicy mango, combined with earthy green tea. The Teavana® Shaken Iced Mango Green Tea Lemonade is a delicious blend of premium green tea, juicy mango, sweet passion fruit, and a splash of lemonade. Made with 100% Organic Green Tea and real Mango Fruit with a light and fruity flavor. No sugar, additives, fillers or preservatives ever! Zero grams of sugar, but with a slightly sweet taste from the Mango Fruit.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `choice` varchar(255) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `name`, `email`, `password`, `choice`) VALUES
(1, 'aaa', 'bbb@ccc', 'e2fc714c4727ee9395f324cd2e7f331f', 'BubbleTea'),
(2, 'bob', 'bob@bobs.com', '81dc9bdb52d04dc20036dbd8313ed055', 'MilkTea');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
