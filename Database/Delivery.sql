-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 23, 2022 at 07:15 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Delivery`
--

-- --------------------------------------------------------

--
-- Table structure for table `Order`
--

CREATE TABLE `Order` (
  `id` int(30) NOT NULL,
  `reference_number` varchar(100) NOT NULL,
  `sender_name` text NOT NULL,
  `sender_address` text NOT NULL,
  `sender_contact` text NOT NULL,
  `recipient_name` text NOT NULL,
  `recipient_address` text NOT NULL,
  `recipient_contact` text NOT NULL,
  `weight` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `status` int(2) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `LivreurId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Order`
--

INSERT INTO `Order` (`id`, `reference_number`, `sender_name`, `sender_address`, `sender_contact`, `recipient_name`, `recipient_address`, `recipient_contact`, `weight`, `price`, `status`, `date_created`, `LivreurId`) VALUES
(1, '137186115589', 'yassin', 'Laayayda', '+21206025452155', 'yassin zeus', 'Laayayda', '+21206025452155', '200', 400, 0, '2022-07-20 00:45:05', 1),
(3, '869779504757', 'yassin', 'Laayayda', '+21206025452155', 'yassin zeus', 'Laayayda', '+21206025452155', '200', 200, 3, '2022-07-20 01:29:18', 2),
(4, '869779504757', 'Vendeur1', 'Laayayda', '+21206025452155', 'yassin zeus', 'Laayayda', '+21206025452155', '200', 200, 1, '2022-07-20 01:35:01', 2),
(5, '869779504757', 'yassin', 'Laayayda', '+21206025452155', 'yassin zeus', 'Laayayda', '+21206025452155', '200', 200, 0, '2022-07-20 01:41:42', 2);

-- --------------------------------------------------------

--
-- Table structure for table `order_track`
--

CREATE TABLE `order_track` (
  `idTrack` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `Status` int(11) NOT NULL,
  `Date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_track`
--

INSERT INTO `order_track` (`idTrack`, `orderId`, `Status`, `Date_created`) VALUES
(1, 4, 1, '2022-07-21 21:44:10'),
(2, 1, 2, '2022-07-22 14:51:30'),
(3, 1, 3, '2022-07-22 14:52:36'),
(4, 1, 4, '2022-07-22 14:53:52');

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `UserId` int(11) NOT NULL,
  `FullName` varchar(50) DEFAULT NULL,
  `Addresse` varchar(50) DEFAULT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `Profile` int(11) DEFAULT NULL,
  `Contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`UserId`, `FullName`, `Addresse`, `Username`, `password`, `Profile`, `Contact`) VALUES
(1, 'admin', 'Laayayda', 'admin', 'admin', 1, ''),
(2, 'Livreur 1', 'Laayayda', 'livreur1', 'livreur', 2, '+212604005904'),
(3, 'Vendeur1', 'laa', 'vendeur', 'vendeur', 3, '+212633333333'),
(5, 'Vendeur2', 'Laayayda ', 'yassin', 'vendeur2', 3, '+212633333333'),
(9, 'Yassin', 'Laayayda ', 'yassin', 'Livreur2', 2, '+212633333333');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Order`
--
ALTER TABLE `Order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_or_us` (`LivreurId`);

--
-- Indexes for table `order_track`
--
ALTER TABLE `order_track`
  ADD PRIMARY KEY (`idTrack`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`UserId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Order`
--
ALTER TABLE `Order`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_track`
--
ALTER TABLE `order_track`
  MODIFY `idTrack` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Order`
--
ALTER TABLE `Order`
  ADD CONSTRAINT `fk_or_us` FOREIGN KEY (`LivreurId`) REFERENCES `User` (`UserId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
