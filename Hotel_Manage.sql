-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 10, 2023 at 06:26 PM
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
-- Table structure for table `Booking`
--

CREATE TABLE `Booking` (
  `b_id` int(11) NOT NULL,
  `b_amount` int(11) NOT NULL,
  `b_from` date NOT NULL,
  `b_to` date NOT NULL,
  `p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Books_room`
--

CREATE TABLE `Books_room` (
  `b_id` int(11) NOT NULL,
  `r_type` varchar(50) NOT NULL,
  `h_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `c_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Hotel`
--

CREATE TABLE `Hotel` (
  `h_id` int(11) NOT NULL,
  `h_name` varchar(50) NOT NULL,
  `h_number` int(11) NOT NULL,
  `h_email` varchar(50) NOT NULL,
  `h_location` varchar(200) NOT NULL,
  `h_descripton` varchar(300) NOT NULL,
  `ho_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Hotel_features`
--

CREATE TABLE `Hotel_features` (
  `h_id` int(11) NOT NULL,
  `h_features` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Hotel_image_archive`
--

CREATE TABLE `Hotel_image_archive` (
  `h_id` int(11) NOT NULL,
  `h_image` varchar(100) NOT NULL
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

--
-- Dumping data for table `Hotel_Owner`
--

INSERT INTO `Hotel_Owner` (`ho_id`, `ho_name`, `ho_number`, `ho_email`, `ho_gender`, `ho_address`, `ho_password`) VALUES
(11, 'Farhana Rahman', '01812345678', 'farhana@gmail.com', 'Female', 'Cox\'s Bazar', 'farhana123'),
(12, 'Arif Khan', '01767890123', 'arif@gmail.com', 'Male', 'Dhaka', 'arif123'),
(13, 'Tasnim Ahmed', '01723456789', 'tasnim@gmail.com', 'Male', 'Sylhet', 'tasnim123');

-- --------------------------------------------------------

--
-- Table structure for table `Payment`
--

CREATE TABLE `Payment` (
  `p_id` int(11) NOT NULL,
  `p_amount` float NOT NULL,
  `p_method` varchar(50) DEFAULT 'CASH',
  `p_time` timestamp NULL DEFAULT current_timestamp(),
  `c_id` int(11) NOT NULL,
  `ho_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Room`
--

CREATE TABLE `Room` (
  `h_id` int(11) NOT NULL,
  `r_type` varchar(50) NOT NULL,
  `r_price` float NOT NULL,
  `r_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Booking`
--
ALTER TABLE `Booking`
  ADD PRIMARY KEY (`b_id`),
  ADD KEY `p_id (fk)` (`p_id`);

--
-- Indexes for table `Books_room`
--
ALTER TABLE `Books_room`
  ADD PRIMARY KEY (`b_id`,`r_type`,`h_id`),
  ADD KEY `b_id (fk)` (`b_id`),
  ADD KEY `r_type (fk)` (`r_type`),
  ADD KEY `h_id` (`h_id`),
  ADD KEY `h_id_2` (`h_id`,`r_type`);

--
-- Indexes for table `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`c_id`),
  ADD UNIQUE KEY `c_email` (`c_email`);

--
-- Indexes for table `Hotel`
--
ALTER TABLE `Hotel`
  ADD PRIMARY KEY (`h_id`),
  ADD UNIQUE KEY `h_email` (`h_email`),
  ADD KEY `ho_id` (`ho_id`);

--
-- Indexes for table `Hotel_features`
--
ALTER TABLE `Hotel_features`
  ADD PRIMARY KEY (`h_id`,`h_features`),
  ADD KEY `h_id` (`h_id`);

--
-- Indexes for table `Hotel_image_archive`
--
ALTER TABLE `Hotel_image_archive`
  ADD PRIMARY KEY (`h_id`,`h_image`),
  ADD UNIQUE KEY `h_id` (`h_id`);

--
-- Indexes for table `Hotel_Owner`
--
ALTER TABLE `Hotel_Owner`
  ADD PRIMARY KEY (`ho_id`),
  ADD UNIQUE KEY `ho_email` (`ho_email`);

--
-- Indexes for table `Payment`
--
ALTER TABLE `Payment`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `c_id` (`c_id`),
  ADD KEY `ho_id (fk)` (`ho_id`);

--
-- Indexes for table `Room`
--
ALTER TABLE `Room`
  ADD PRIMARY KEY (`h_id`,`r_type`),
  ADD KEY `h_id` (`h_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Booking`
--
ALTER TABLE `Booking`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `Customer`
--
ALTER TABLE `Customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Hotel`
--
ALTER TABLE `Hotel`
  MODIFY `h_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `Hotel_Owner`
--
ALTER TABLE `Hotel_Owner`
  MODIFY `ho_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `Payment`
--
ALTER TABLE `Payment`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Booking`
--
ALTER TABLE `Booking`
  ADD CONSTRAINT `Booking_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `Payment` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Books_room`
--
ALTER TABLE `Books_room`
  ADD CONSTRAINT `Books_room_ibfk_1` FOREIGN KEY (`b_id`) REFERENCES `Booking` (`b_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Books_room_ibfk_2` FOREIGN KEY (`h_id`,`r_type`) REFERENCES `Room` (`h_id`, `r_type`);

--
-- Constraints for table `Hotel`
--
ALTER TABLE `Hotel`
  ADD CONSTRAINT `Hotel_ibfk_1` FOREIGN KEY (`ho_id`) REFERENCES `Hotel_Owner` (`ho_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Hotel_features`
--
ALTER TABLE `Hotel_features`
  ADD CONSTRAINT `Hotel_features_ibfk_1` FOREIGN KEY (`h_id`) REFERENCES `Hotel` (`h_id`);

--
-- Constraints for table `Hotel_image_archive`
--
ALTER TABLE `Hotel_image_archive`
  ADD CONSTRAINT `Hotel_image_archive_ibfk_1` FOREIGN KEY (`h_id`) REFERENCES `Hotel` (`h_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Payment`
--
ALTER TABLE `Payment`
  ADD CONSTRAINT `Payment_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `Customer` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Payment_ibfk_2` FOREIGN KEY (`ho_id`) REFERENCES `Hotel_Owner` (`ho_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Room`
--
ALTER TABLE `Room`
  ADD CONSTRAINT `Room_ibfk_1` FOREIGN KEY (`h_id`) REFERENCES `Hotel` (`h_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
