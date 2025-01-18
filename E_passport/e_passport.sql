-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2024 at 07:16 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_passport`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`) VALUES
(1, 'Admin', 'admin111@gmail.com', 1111),
(2, 'shahida ima', 'ima123@gmail.com', 1357),
(3, 'maisha', 'maisha15151@gmail.com', 15151),
(4, 'Shahida ima', 'ima92@gmail.com', 15151);

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `ApplicationID` int(11) NOT NULL,
  `nameofapplicant` varchar(50) NOT NULL,
  `Gender` varchar(20) NOT NULL,
  `NID_number` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `ApplyingFrom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`ApplicationID`, `nameofapplicant`, `Gender`, `NID_number`, `Email`, `ApplyingFrom`) VALUES
(1, 'shahida ima', 'Female', 8236487, 'imashahida92@gmail.com', 'Bangladesh'),
(10001, 'shahida rahman', 'Female', 122383, '2022-1-60-318@std.ewubd.edu', 'Bangladesh'),
(10002, 'ima rahman', 'Female', 2988734, 'ima99@gmail.com', 'Germain'),
(10003, 'Musarat Kbir', 'Female', 42657625, 'musarat@gmail.com', 'Germain'),
(10004, 'nafisa kabir', 'Female', 42945836, 'nafisa@gmail.com', 'Germain'),
(10005, 'someroze islam', 'Male', 76423, 'islam@gmail.com', 'Germain');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `ApplicationID` int(11) NOT NULL,
  `payment` int(11) DEFAULT NULL,
  `ApplicationType` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`ApplicationID`, `payment`, `ApplicationType`) VALUES
(10001, 37623, 'Usual'),
(10002, 7634, 'regular'),
(10004, 20002, 'regular'),
(10003, 41441, 'urgent');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `ApplicationID` int(11) NOT NULL,
  `Status` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`ApplicationID`, `Status`) VALUES
(10003, 'Complete'),
(10004, 'pending'),
(10005, 'Complete'),
(10001, 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES
(2, 'ima', 'shahidaima@gmail.com', 81),
(3, 'maisha  kabir', 'maisha151@gmail.com', 0),
(5, 'shahida rahman', 'rahman1212@gmail.com', 0),
(7, 'shahida ima', 'shahida@gmail.com', 0),
(9, 'maisha', 'dha@gadhajsgj', 0),
(10, 'samanta ghosh', 'samant@gmail.com', 0),
(11, 'Someroze islam', 'islam@gmail.com', 6),
(12, 'ima', 'imashahida92@gmail.com', 0),
(13, 'shahida ima', 'ima92@gmail.com', 81);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`ApplicationID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD KEY `ApplicationID` (`ApplicationID`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD KEY `ApplicationID` (`ApplicationID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`ApplicationID`) REFERENCES `application` (`ApplicationID`);

--
-- Constraints for table `status`
--
ALTER TABLE `status`
  ADD CONSTRAINT `status_ibfk_1` FOREIGN KEY (`ApplicationID`) REFERENCES `application` (`ApplicationID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
