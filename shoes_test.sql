-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Jan 02, 2017 at 05:40 PM
-- Server version: 5.5.42
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shoes_test`
--
CREATE DATABASE IF NOT EXISTS `shoes_test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `shoes_test`;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE `brands` (
  `id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=212 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `brands_stores`
--

DROP TABLE IF EXISTS `brands_stores`;
CREATE TABLE `brands_stores` (
  `id` bigint(20) unsigned NOT NULL,
  `brands_id` int(11) DEFAULT NULL,
  `stores_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands_stores`
--

INSERT INTO `brands_stores` (`id`, `brands_id`, `stores_id`) VALUES
(1, 78, 77),
(2, 79, 78),
(3, 79, 79),
(4, 88, 87),
(5, 89, 88),
(6, 89, 89),
(7, 98, 97),
(8, 99, 98),
(9, 99, 99),
(10, 108, 107),
(11, 109, 108),
(12, 109, 109),
(13, 118, 117),
(14, 119, 118),
(15, 119, 119),
(16, 128, 127),
(17, 129, 128),
(18, 129, 129),
(19, 138, 137),
(20, 139, 138),
(21, 139, 139),
(22, 148, 147),
(23, 148, 148),
(24, 157, 156),
(25, 157, 157),
(26, 166, 165),
(27, 166, 166),
(28, 175, 174),
(29, 175, 175),
(30, 184, 183),
(31, 184, 184),
(32, 193, 192),
(33, 193, 193),
(34, 202, 201),
(35, 202, 202),
(36, 210, 211),
(37, 211, 211);

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

DROP TABLE IF EXISTS `stores`;
CREATE TABLE `stores` (
  `id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=212 DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `brands_stores`
--
ALTER TABLE `brands_stores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=212;
--
-- AUTO_INCREMENT for table `brands_stores`
--
ALTER TABLE `brands_stores`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=212;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
