-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 27, 2023 at 02:54 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Hotel_Manage`
--

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE `Customer` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(50) NOT NULL,
  `c_number` int(11) NOT NULL,
  `c_email` varchar(50) NOT NULL,
  `c_gender` varchar(10) NOT NULL,
  `c_password` varchar(50) NOT NULL,
  `c_class` varchar(12) NOT NULL DEFAULT 'Silver',
  `c_issues` varchar(200) DEFAULT NULL,
  `p_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Customer_bookings`
--

CREATE TABLE `Customer_bookings` (
  `c_id` int(11) NOT NULL,
  `c_bookings` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Customer_views`
--

CREATE TABLE `Customer_views` (
  `c_id` int(11) NOT NULL,
  `h_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Employee`
--

CREATE TABLE `Employee` (
  `e_id` int(11) NOT NULL,
  `e_name` varchar(50) NOT NULL,
  `e_email` varchar(50) NOT NULL,
  `e_number` varchar(11) NOT NULL,
  `e_gender` varchar(10) NOT NULL,
  `e_password` varchar(50) NOT NULL,
  `e_address` varchar(100) NOT NULL,
  `e_salary` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Employee_manages`
--

CREATE TABLE `Employee_manages` (
  `h_id` int(11) NOT NULL,
  `e_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Hotel`
--

CREATE TABLE `Hotel` (
  `h_id` int(11) NOT NULL,
  `h_name` varchar(50) NOT NULL,
  `h_number` varchar(11) NOT NULL,
  `h_email` varchar(50) NOT NULL,
  `h_location` varchar(300) NOT NULL,
  `h_rating` float DEFAULT NULL,
  `h_incentive` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Hotel_features`
--

CREATE TABLE `Hotel_features` (
  `h_id` int(11) NOT NULL,
  `h_features` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Hotel_Owner`
--

CREATE TABLE `Hotel_Owner` (
  `ho_id` int(11) NOT NULL,
  `ho_name` varchar(50) NOT NULL,
  `ho_number` varchar(11) NOT NULL,
  `ho_email` varchar(50) NOT NULL,
  `ho_gender` varchar(10) NOT NULL,
  `ho_address` varchar(200) NOT NULL,
  `ho_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Hotel_Owner_owns`
--

CREATE TABLE `Hotel_Owner_owns` (
  `ho_id` int(11) NOT NULL,
  `h_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Payment`
--

CREATE TABLE `Payment` (
  `p_id` int(11) NOT NULL,
  `p_amount` float NOT NULL,
  `p_method` varchar(50) NOT NULL,
  `p_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Room`
--

CREATE TABLE `Room` (
  `r_floorNo` int(11) NOT NULL,
  `r_serialNo` int(11) NOT NULL,
  `h_id` int(11) NOT NULL,
  `r_price` float NOT NULL,
  `r_type` varchar(50) NOT NULL,
  `r_availability` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`c_id`),
  ADD UNIQUE KEY `c_email` (`c_email`),
  ADD KEY `p_id (fk)` (`p_id`);

--
-- Indexes for table `Customer_bookings`
--
ALTER TABLE `Customer_bookings`
  ADD PRIMARY KEY (`c_id`,`c_bookings`),
  ADD KEY `c_id (fk)` (`c_id`);

--
-- Indexes for table `Customer_views`
--
ALTER TABLE `Customer_views`
  ADD PRIMARY KEY (`c_id`,`h_id`),
  ADD KEY `c_id (fk)` (`c_id`),
  ADD KEY `h_id (fk)` (`h_id`);

--
-- Indexes for table `Employee`
--
ALTER TABLE `Employee`
  ADD PRIMARY KEY (`e_id`),
  ADD UNIQUE KEY `e_email (u)` (`e_email`);

--
-- Indexes for table `Employee_manages`
--
ALTER TABLE `Employee_manages`
  ADD PRIMARY KEY (`h_id`,`e_id`),
  ADD KEY `h_id (fk)` (`h_id`),
  ADD KEY `e_id (fk)` (`e_id`);

--
-- Indexes for table `Hotel`
--
ALTER TABLE `Hotel`
  ADD PRIMARY KEY (`h_id`);

--
-- Indexes for table `Hotel_features`
--
ALTER TABLE `Hotel_features`
  ADD PRIMARY KEY (`h_id`,`h_features`),
  ADD KEY `h_id (fk)` (`h_id`);

--
-- Indexes for table `Hotel_Owner`
--
ALTER TABLE `Hotel_Owner`
  ADD PRIMARY KEY (`ho_id`),
  ADD UNIQUE KEY `ho_email (u)` (`ho_email`);

--
-- Indexes for table `Hotel_Owner_owns`
--
ALTER TABLE `Hotel_Owner_owns`
  ADD PRIMARY KEY (`ho_id`,`h_id`),
  ADD KEY `ho_id (fk)` (`ho_id`),
  ADD KEY `h_id (fk)` (`h_id`);

--
-- Indexes for table `Payment`
--
ALTER TABLE `Payment`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `Room`
--
ALTER TABLE `Room`
  ADD PRIMARY KEY (`r_floorNo`,`r_serialNo`,`h_id`),
  ADD KEY `h_id (fk)` (`h_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Customer`
--
ALTER TABLE `Customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Hotel`
--
ALTER TABLE `Hotel`
  MODIFY `h_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Hotel_Owner`
--
ALTER TABLE `Hotel_Owner`
  MODIFY `ho_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Payment`
--
ALTER TABLE `Payment`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Customer`
--
ALTER TABLE `Customer`
  ADD CONSTRAINT `Customer_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `Payment` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Customer_bookings`
--
ALTER TABLE `Customer_bookings`
  ADD CONSTRAINT `Customer_bookings_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `Customer` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Customer_views`
--
ALTER TABLE `Customer_views`
  ADD CONSTRAINT `Customer_views_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `Customer` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Customer_views_ibfk_2` FOREIGN KEY (`h_id`) REFERENCES `Hotel` (`h_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Employee_manages`
--
ALTER TABLE `Employee_manages`
  ADD CONSTRAINT `Employee_manages_ibfk_1` FOREIGN KEY (`e_id`) REFERENCES `Employee` (`e_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Employee_manages_ibfk_2` FOREIGN KEY (`h_id`) REFERENCES `Hotel` (`h_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Hotel_features`
--
ALTER TABLE `Hotel_features`
  ADD CONSTRAINT `Hotel_features_ibfk_1` FOREIGN KEY (`h_id`) REFERENCES `Hotel` (`h_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Hotel_Owner_owns`
--
ALTER TABLE `Hotel_Owner_owns`
  ADD CONSTRAINT `Hotel_Owner_owns_ibfk_1` FOREIGN KEY (`ho_id`) REFERENCES `Hotel_Owner` (`ho_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Hotel_Owner_owns_ibfk_2` FOREIGN KEY (`h_id`) REFERENCES `Hotel` (`h_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Room`
--
ALTER TABLE `Room`
  ADD CONSTRAINT `Room_ibfk_1` FOREIGN KEY (`h_id`) REFERENCES `Hotel` (`h_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
