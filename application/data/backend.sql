-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2016 at 08:52 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `backend`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `supplies`;
CREATE TABLE `supplies` (
  `id` int(11) NOT NULL,
  `code` varchar(32) NOT NULL,
  `description` varchar(256) NOT NULL,
  `receivingUnit` varchar(32) NOT NULL,
  `receivingCost` decimal(5,2) NOT NULL,
  `stockingUnit` varchar(32) NOT NULL,
  `quantityOnHand` decimal(3,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supplies`
--

INSERT INTO `supplies` (`id`, `code`, `description`, `receivingUnit`, `receivingCost`, `stockingUnit`, `quantityOnHand`) VALUES
(1, 'Pizza Slice', 'Slice of pepperoni pizza.', 'slice', 2, 'slice', 0),
(2, 'Kraft Dinner', 'Macaroni and cheese.', 'box', 1.5, 'box', 10),
(3, 'Mountain Dew', 'Nectar of the nerds.', 'bottle', 2.5, '1L bottle', 13),
(4, 'Steak', 'Just the beef.', 'single', 8, 'single', 20),
(5, 'Baked Potato', 'Russet potato.', 'single', 0.5, 'single', 25),
(6, 'Asparagus Spear', 'Fresh non-organic asparagus.', 'spear', 3, 'spear', 30),
(7, 'Beer', 'Local craft beer.', 'bottle', 8, '22oz bottle', 25),
(8, 'Deck of Cards', 'Simple and cheap fun.', 'deck', 1, 'deck', 15),
(9, 'Poker Chips', 'Casino chip set', 'set', 50, 'set', 0),
(10, 'Cigars', 'Premium Cuban cigars', 'single', 15, 'single', 40),
(11, 'Chips', 'Good old fashioned salt and vinegar.', 'bag', 3.5, 'bag', 20),
(12, 'Netflix Subscription', 'The be-all end-all of streaming media.', 'subscription', 9.99, 'subscription', 9999),
(13, 'Candles', 'Fancy-smelling candles.', 'single', 5, 'single', 30),
(14, 'Wine', 'Run of the mill Riesling.', 'bottle', 15, '750ml bottle', 28),
(15, 'Febreeze', 'Cleaning supplies for lazy people.', 'bottle', 5, 'bottle', 4),
(16, 'Garbage Bag', 'hefty x-large black garbage bags.', 'bag', 4, 'bag', 21),
(17, 'Condoms', 'Box of premium condoms.', 'box', 15, 'box', 2);;

-- --------------------------------------------------------

--
-- Indexes for table `supplies`
--
ALTER TABLE `supplies`
  ADD PRIMARY KEY (`id`);
