-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2024 at 04:08 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookingtable`
--

CREATE TABLE `bookingtable` (
  `Booking_ID` int(11) NOT NULL,
  `Date` datetime NOT NULL,
  `Venue` varchar(500) NOT NULL,
  `Time` time NOT NULL,
  `Package` varchar(500) NOT NULL,
  `Status` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookingtable`
--

INSERT INTO `bookingtable` (`Booking_ID`, `Date`, `Venue`, `Time`, `Package`, `Status`) VALUES
(2, '0000-00-00 00:00:00', 'fsg', '00:00:00', 'erg', 'erg'),
(7, '2023-10-02 00:00:00', 'sef', '12:34:00', 'GABS', 'cancelled'),
(35, '0000-00-00 00:00:00', 'e', '00:00:00', '', ''),
(36, '0000-00-00 00:00:00', 'r', '00:00:00', '', ''),
(37, '0000-00-00 00:00:00', 'r', '00:00:00', '', ''),
(38, '0000-00-00 00:00:00', 'c', '00:00:00', '', ''),
(39, '0000-00-00 00:00:00', 'z', '00:00:00', '', ''),
(42, '0000-00-00 00:00:00', 'dafzac', '00:00:00', '', ''),
(45, '2023-10-02 00:00:00', 'matt', '12:34:00', 'bins', 'ok na raw');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookingtable`
--
ALTER TABLE `bookingtable`
  ADD PRIMARY KEY (`Booking_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookingtable`
--
ALTER TABLE `bookingtable`
  MODIFY `Booking_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
