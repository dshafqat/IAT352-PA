-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2020 at 07:21 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kimmy_chu`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(16) UNSIGNED NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `tea` varchar(100) NOT NULL,
  `add_on` varchar(100) CHARACTER SET latin1 NOT NULL,
  `price_r` varchar(100) CHARACTER SET latin1 NOT NULL,
  `price_l` varchar(100) CHARACTER SET latin1 NOT NULL,
  `product_image` varchar(100) CHARACTER SET latin1 NOT NULL,
  `detail_image` varchar(100) NOT NULL,
  `information` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `tea`, `add_on`, `price_r`, `price_l`, `product_image`, `detail_image`, `information`) VALUES
(1, 'Original Milk Tea', 'Milk Tea', 'Pearls', '4.0', '4.5', 'img/bubbleTea/bubble_tea_1.png', 'img/product_info/product1.jpg', 'The tea: We used Tetley’s orange pekoe black tea for its strong flavour and rich colour.\r\nThe milk: In this case, we’re not using real “milk”. We chose to use Coffee Mate’s non-dairy powdered creamer for a richer and milkier flavour and a slightly richer texture.\r\nThe sweetener: We used regular granulated white sugar because we want to keep the sweetener flavour neutral.'),
(2, 'Strawberry Green Tea', 'Green Tea', 'Puree', '5.0', '5.5', 'img/bubbleTea/bubble_tea_2.png', 'img/product_info/product2.jpg', 'Juicy strawberry notes in our fruit and botanical blends are combined with premium Teavana® Green Tea then slightly sweetened with liquid cane sugar for a refreshing afternoon drink free from artificial flavors & sweeteners.'),
(3, 'Hokkaido Green Milk Tea', 'Milk Tea', 'Pearls', '5.5', '6.0', 'img/bubbleTea/bubble_tea_3.png', 'img/product_info/product3.jpg', 'Hokkaido is a region in Japan and in this region they have perfect a variety of a richer and creamier milk tea that is enjoyed all across the globe. Its main difference from other milk teas is its deep tea and caramel like flavors.'),
(4, 'Thai Tea', 'Other', 'Pearls', '5.5', '6.0', 'img/bubbleTea/bubble_tea_4.png', 'img/product_info/product4.jpg', 'The tea itself is a blend of black tea infused with spices. The orange color was added to make the tea stand out amongst other teas. The tea mixture may also have sugar and evaporated milk added that give it the sweet, creamy taste.'),
(5, 'Passion Fruit Green Tea', 'Green Tea', 'Puree', '5.0', '5.5', 'img/bubbleTea/bubble_tea_5.png', 'img/product_info/product5.jpg', 'A little sweet, a little tart – our passion fruit green tea is made with REAL passion fruit seeds! Which means it’s loaded with delicious, refreshing flavour!'),
(6, 'Taro Milk Tea', 'Milk Tea', 'Pearls', '4.5', '5.0', 'img/bubbleTea/bubble_tea_6.png', 'img/product_info/product6.jpg', 'Sweet, rich, and creamy taro root combines with classic milk tea for an amazing and colorfully purple drink hugely popular all over Asia. Milky tea with boba pearls. Main ingredient is taro powder with a creamy taste and added with ice to make this drink cool and delicious'),
(7, 'Lychee Black Tea', 'Black Tea', 'Puree', '5.0', '5.5', 'img/bubbleTea/bubble_tea_7.png', 'img/product_info/product7.jpg', 'Full-bodied black tea flavour with a touch of tropical fruitiness. The unique perfumed flavor of the lychee fruit paired with fine China black tea results in a distinct uplifting taste'),
(8, 'Green Apple Green Tea', 'Green Tea', 'Puree', '5.0', '5.5', 'img/bubbleTea/bubble_tea_8.png', 'img/product_info/product8.jpg', 'Juicy green apple notes in our fruit and botanical blends are combined with premium Teavana® Green Tea then slightly sweetened with liquid cane sugar for a refreshing afternoon drink free from artificial flavors & sweeteners.'),
(9, 'Jasmine Green Tea', 'Green Tea', 'Puree', '5.0', '5.5', 'img/bubbleTea/bubble_tea_9.png', 'img/product_info/product9.jpg', 'Pure green tea expertly blended and infused with real jasmine flowers to deliver a fragrant tea with a unique floral aroma and taste.Made without artificial ingredients, this jasmine green tea provides a wholesome tea experience.'),
(10, 'Pineapple Green Tea', 'Green Tea', 'Puree', '5.0', '5.5', 'img/bubbleTea/bubble_tea_10.png', 'img/product_info/product10.jpg', 'Tropical pineapple flavors from our fruit and botanical blends are combined with premium Teavana® Green Tea, lemonade, then slightly sweetened with liquid cane sugar for a refreshing drink that\'s just subtly sweet.'),
(11, 'Coconut Milk Tea', 'Milk Tea', 'Pearls', '4.5', '5.0', 'img/bubbleTea/bubble_tea_11.png', 'img/product_info/product11.jpg', 'A hint of creamy coconut mixed with our signature milk tea. This Coconut Milk Tea will take your tastebuds for a trip with our signature milk tea and a hint of creamy coconut mixed for a tropical flavour.'),
(12, 'Peach Green Tea', 'Green Tea', 'Puree', '5.0', '5.5', 'img/bubbleTea/bubble_tea_12.png', 'img/product_info/product12.jpg', 'The soft and subtle sweetness of refreshing and fruity peach. This boldly flavored iced tea—made with a combination of our peach-flavored fruit juice blend and Teavana® iced green tea, and then sweetened with liquid cane sugar and hand-shaken with ice—brings you refreshing vibes.'),
(13, 'Matcha Milk Tea', 'Milk Tea', 'Pearls', '4.5', '5.0', 'img/bubbleTea/bubble_tea_13.png', 'img/product_info/product13.jpg', 'A spin on traditional Matcha green tea, smooth and creamy matcha sweetened just right and served with steamed milk. This favorite will transport your senses to pure green delight.'),
(14, 'Almond Milk Tea', 'Milk Tea', 'Pearls', '4.5', '5.0', 'img/bubbleTea/bubble_tea_14.png', 'img/product_info/product14.jpg', 'Almond milk tea is a type of boba or \"bubble tea,\" with tapioca balls on the bottom of the tea for extra taste and texture. Enjoy the rich flavor of almonds in milk teas. We carry the creamiest, most satisfying almond milk tea this side of the Atlantic Ocean. This caffeine-free drink makes soothing hot beverages on stormy, wintry evenings.'),
(15, 'Rose Milk Tea', 'Milk Tea', 'Pearls', '4.5', '5.0', 'img/bubbleTea/bubble_tea_15.png', 'img/product_info/product15.jpg', 'Rose milk tea is a delicious combination of black tea infused with floral, aromatic rose syrup and a splash of warm milk. A perfect and comfort drink to warm up inside out in this cold weather.'),
(16, 'Mango Green Tea', 'Green Tea', 'Puree', '5.0', '5.5', 'img/bubbleTea/bubble_tea_16.png', 'img/product_info/product16.jpg', 'The tropical flavour of juicy mango, combined with earthy green tea. The Teavana® Shaken Iced Mango Green Tea Lemonade is a delicious blend of premium green tea, juicy mango, sweet passion fruit, and a splash of lemonade. Made with 100% Organic Green Tea and real Mango Fruit with a light and fruity flavor. No sugar, additives, fillers or preservatives ever! Zero grams of sugar, but with a slightly sweet taste from the Mango Fruit.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `choice` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `name`, `email`, `password`, `choice`) VALUES
(1, 'aaa', 'bbb@ccc', 'e2fc714c4727ee9395f324cd2e7f331f', 'BubbleTea'),
(2, 'bob', 'bob@bobs.com', '81dc9bdb52d04dc20036dbd8313ed055', 'MilkTea');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(16) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
