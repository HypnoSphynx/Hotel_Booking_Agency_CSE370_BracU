-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 21, 2023 at 09:10 PM
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
-- Database: `Hotel Management System`
--

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE `Customer` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(100) NOT NULL,
  `c_number` varchar(11) NOT NULL,
  `c_class` varchar(10) NOT NULL,
  `c_ratings` int(5) NOT NULL,
  `c_bookings` varchar(11) DEFAULT NULL,
  `h_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Customer`
--

INSERT INTO `Customer` (`c_id`, `c_name`, `c_number`, `c_class`, `c_ratings`, `c_bookings`, `h_id`) VALUES
(1, 'Tanvir', '01724698352', 'Platinum', 55555, 'H4082', 3),
(2, 'Sakib', '01781726495', 'Silver', 0, NULL, NULL),
(3, 'Nur', '01748321706', 'Gold', 33, 'AF4567', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Customer_issues`
--

CREATE TABLE `Customer_issues` (
  `c_id` int(11) NOT NULL,
  `c_issues` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Customer_issues`
--

INSERT INTO `Customer_issues` (`c_id`, `c_issues`) VALUES
(1, 'Maja Vanga'),
(3, 'Heart Problem');

-- --------------------------------------------------------

--
-- Table structure for table `Employee`
--

CREATE TABLE `Employee` (
  `e_id` int(11) NOT NULL,
  `e_name` varchar(50) NOT NULL,
  `e_address` varchar(1000) NOT NULL,
  `e_salary` double NOT NULL,
  `e_number` varchar(11) NOT NULL,
  `e_position` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Employee`
--

INSERT INTO `Employee` (`e_id`, `e_name`, `e_address`, `e_salary`, `e_number`, `e_position`) VALUES
(1, 'Badhon', 'Kosai Bazar Railgate, Shahid Latif Rd, Dhaka 1230', 677777.77, '01753672914', 'Developer'),
(2, 'Zawad', 'Block #A, Plot #27, Kolatoli Road Cox\'s Bazar, Cox\'s Bazar 4700', 55555555, '01762583147', 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `Hotel`
--

CREATE TABLE `Hotel` (
  `h_id` int(11) NOT NULL,
  `h_name` varchar(100) NOT NULL,
  `h_number` varchar(11) NOT NULL,
  `h_location` varchar(500) NOT NULL,
  `h_rating` float NOT NULL,
  `h_incentive` int(1) NOT NULL,
  `ho_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Hotel`
--

INSERT INTO `Hotel` (`h_id`, `h_name`, `h_number`, `h_location`, `h_rating`, `h_incentive`, `ho_id`) VALUES
(1, 'Grand Sylhet Hotel & Resort', '01321201600', 'Boroshala, Khadimnogor, Union Parishad, Airport Road, Shodor Sylhet', 4.53, 5, 6),
(2, 'Hotel Diamond Park', '01973306306', '9R8V+W4P, Khwaja Super Market, Chattogram 4000', 55.6, 100, 1),
(3, 'Grand Beach Resort Cox\'s Bazar', '01720355991', 'Block #A, Plot #27, Kolatoli Road Cox\'s Bazar, Cox\'s Bazar 4700', 111111000, 444444, 3),
(4, 'Hotel Ali International', '01940603244', 'Kosai Bazar Railgate, Shahid Latif Rd, Dhaka 1230', 0, 4488, 5),
(5, 'Hotel Sea Queen', '01819321888', '4700 Jhawtola Main Rd, Cox\'s Bazar', 7.88, 11, 2);

-- --------------------------------------------------------

--
-- Table structure for table `Hotel_Features`
--

CREATE TABLE `Hotel_Features` (
  `h_id` int(11) NOT NULL,
  `h_features` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Hotel_Features`
--

INSERT INTO `Hotel_Features` (`h_id`, `h_features`) VALUES
(3, 'Excellent location: A hotel\'s location is often the first thing guests consider when choosing a place to stay. A central location close to popular attractions, public transportation, and dining options is always a plus.'),
(1, 'Impeccable cleanliness: Cleanliness is paramount for a good hotel experience. Guests should feel confident that their rooms, bathrooms, and common areas are spotless.'),
(4, 'Exceptional customer service: Friendly, attentive, and helpful staff members can make a world of difference in a guest\'s experience. Staff should be knowledgeable about the hotel and its surroundings, and be able to resolve any issues promptly and efficiently.'),
(5, 'On-site dining options: Having one or more restaurants on-site can be a convenient amenity for guests, especially those who don\'t want to venture out too far. Diverse dining options, from casual eateries to fine-dining establishments, can cater to a wide range of preferences.\r\n\r\n'),
(2, 'Relaxing amenities: Amenities such as a swimming pool, hot tub, sauna, or fitness center can enhance a guest\'s stay and provide opportunities for relaxation and recreation.'),
(2, 'Sustainability and eco-friendly practices: Eco-conscious guests appreciate hotels that implement sustainable practices such as recycling, water conservation, and energy efficiency.'),
(3, 'Pet-friendly policies: For pet owners, the ability to bring their furry companions along can be a major deciding factor when choosing a hotel. Pet-friendly policies and amenities can make all the difference.');

-- --------------------------------------------------------

--
-- Table structure for table `Hotel_Owner`
--

CREATE TABLE `Hotel_Owner` (
  `ho_id` int(11) NOT NULL,
  `ho_name` varchar(100) NOT NULL,
  `ho_number` varchar(11) NOT NULL,
  `ho_address` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Hotel_Owner`
--

INSERT INTO `Hotel_Owner` (`ho_id`, `ho_name`, `ho_number`, `ho_address`) VALUES
(1, 'Abdul Bari', '01708777774', 'Plot 6,7 & 8, Hotel Motel Zone, Sea Beach 4701 Cox\'s Bazar, Chittagong Division, Bangladesh, 4701 Cox\'s Bazar, Bangladesh'),
(2, 'Mr Noyon', '01819321888', '4700 Jhawtola Main Rd, Cox\'s Bazar'),
(3, 'Shakib Al Hasan', '01720355991', 'Block #A, Plot #27, Kolatoli Road Cox\'s Bazar, Cox\'s Bazar 4700'),
(4, 'Tanzid Hasan', '01940603244', 'Kosai Bazar Railgate, Shahid Latif Rd, Dhaka 1230'),
(5, 'Liton Das', '01973306306', '9R8V+W4P, Khwaja Super Market, Chattogram 4000'),
(6, 'Mehidy Hasan', '01321201600', 'Boroshala, Khadimnogor, Union Parishad, Airport Road, Shodor Sylhet');

-- --------------------------------------------------------

--
-- Table structure for table `Manage`
--

CREATE TABLE `Manage` (
  `e_id` int(11) NOT NULL,
  `h_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Manage`
--

INSERT INTO `Manage` (`e_id`, `h_id`) VALUES
(2, 3),
(1, 5),
(1, 4),
(2, 4),
(1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `Payment`
--

CREATE TABLE `Payment` (
  `p_id` int(11) NOT NULL,
  `p_amount` int(11) NOT NULL,
  `p_method` varchar(20) NOT NULL,
  `p_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `r_floorNo` int(11) NOT NULL,
  `r_serialNo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Payment`
--

INSERT INTO `Payment` (`p_id`, `p_amount`, `p_method`, `p_time`, `r_floorNo`, `r_serialNo`) VALUES
(2, 5999, 'bkash', '2023-11-21 20:05:57', 4, '102'),
(3, 6000, 'cash', '2023-11-21 20:07:35', 4, '102');

-- --------------------------------------------------------

--
-- Table structure for table `Room`
--

CREATE TABLE `Room` (
  `r_floorNo` int(11) NOT NULL,
  `r_serialNo` varchar(10) NOT NULL,
  `r_price` int(11) NOT NULL,
  `r_type` varchar(10) NOT NULL,
  `r_avalibility` tinyint(1) NOT NULL,
  `h_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Room`
--

INSERT INTO `Room` (`r_floorNo`, `r_serialNo`, `r_price`, `r_type`, `r_avalibility`, `h_id`) VALUES
(3, '2789', 2999, 'Sliver', 1, 4),
(3, '3333', 33333, 'gold', 44, 1),
(4, '102', 5660, 'Premium', 0, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `h_id_(fk)` (`h_id`);

--
-- Indexes for table `Customer_issues`
--
ALTER TABLE `Customer_issues`
  ADD PRIMARY KEY (`c_issues`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `Employee`
--
ALTER TABLE `Employee`
  ADD PRIMARY KEY (`e_id`);

--
-- Indexes for table `Hotel`
--
ALTER TABLE `Hotel`
  ADD PRIMARY KEY (`h_id`),
  ADD KEY `ho_id` (`ho_id`);

--
-- Indexes for table `Hotel_Features`
--
ALTER TABLE `Hotel_Features`
  ADD KEY `h_id_(fk)` (`h_id`);

--
-- Indexes for table `Hotel_Owner`
--
ALTER TABLE `Hotel_Owner`
  ADD PRIMARY KEY (`ho_id`);

--
-- Indexes for table `Manage`
--
ALTER TABLE `Manage`
  ADD KEY `e_id` (`e_id`),
  ADD KEY `h_id` (`h_id`);

--
-- Indexes for table `Payment`
--
ALTER TABLE `Payment`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `r_floorNo_(fk)` (`r_floorNo`),
  ADD KEY `r_serialNo(fk)` (`r_serialNo`),
  ADD KEY `r_floorNo` (`r_floorNo`,`r_serialNo`);

--
-- Indexes for table `Room`
--
ALTER TABLE `Room`
  ADD PRIMARY KEY (`r_floorNo`,`r_serialNo`,`h_id`),
  ADD KEY `h_id_(fk)` (`h_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Customer`
--
ALTER TABLE `Customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Employee`
--
ALTER TABLE `Employee`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Hotel`
--
ALTER TABLE `Hotel`
  MODIFY `h_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `Hotel_Owner`
--
ALTER TABLE `Hotel_Owner`
  MODIFY `ho_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Payment`
--
ALTER TABLE `Payment`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Customer`
--
ALTER TABLE `Customer`
  ADD CONSTRAINT `Customer_ibfk_1` FOREIGN KEY (`h_id`) REFERENCES `Hotel` (`h_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `Customer_issues`
--
ALTER TABLE `Customer_issues`
  ADD CONSTRAINT `Customer_issues_ibfk_1` FOREIGN KEY (`c_id`) REFERENCES `Customer` (`c_id`);

--
-- Constraints for table `Hotel`
--
ALTER TABLE `Hotel`
  ADD CONSTRAINT `Hotel_ibfk_1` FOREIGN KEY (`ho_id`) REFERENCES `Hotel_Owner` (`ho_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Hotel_Features`
--
ALTER TABLE `Hotel_Features`
  ADD CONSTRAINT `Hotel_Features_ibfk_1` FOREIGN KEY (`h_id`) REFERENCES `Hotel` (`h_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Manage`
--
ALTER TABLE `Manage`
  ADD CONSTRAINT `Manage_ibfk_1` FOREIGN KEY (`e_id`) REFERENCES `Employee` (`e_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Manage_ibfk_2` FOREIGN KEY (`h_id`) REFERENCES `Hotel` (`h_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Payment`
--
ALTER TABLE `Payment`
  ADD CONSTRAINT `Payment_ibfk_1` FOREIGN KEY (`r_floorNo`,`r_serialNo`) REFERENCES `Room` (`r_floorNo`, `r_serialNo`);

--
-- Constraints for table `Room`
--
ALTER TABLE `Room`
  ADD CONSTRAINT `Room_ibfk_1` FOREIGN KEY (`h_id`) REFERENCES `Hotel` (`h_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
