-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2024 at 11:18 AM
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
-- Database: `bus`
--

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `b_id` int(2) NOT NULL,
  `b_no` varchar(11) NOT NULL,
  `b_type` varchar(30) NOT NULL,
  `no_of_seats` int(3) NOT NULL,
  `departuredate` date NOT NULL,
  `departuretime` time NOT NULL,
  `ro_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_mysql500_ci;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`b_id`, `b_no`, `b_type`, `no_of_seats`, `departuredate`, `departuretime`, `ro_id`) VALUES
(1, 'KA04AA5678', 'a/c sleeper bus', 30, '2024-02-10', '11:00:00', 3124),
(2, 'KA05AA6754', 'non a/c', 28, '2024-02-12', '10:30:00', 3124),
(3, 'KA22XA5998', 'non a/c', 29, '2024-02-13', '02:00:00', 3127),
(4, 'KA00BA3321', 'a/c sleeper bus', 22, '2024-02-14', '06:00:00', 3126),
(5, 'KA00BB6754', 'non a/c', 28, '2024-02-11', '06:00:00', 3125),
(6, 'KA05NA6786', 'a/c', 24, '2024-02-17', '03:00:00', 3126);

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `d_id` int(4) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `age` int(3) NOT NULL,
  `contact_no` int(20) NOT NULL,
  `address` varchar(20) NOT NULL,
  `b_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`d_id`, `Name`, `age`, `contact_no`, `address`, `b_id`) VALUES
(561, 'Raju', 34, 783578296, 'Bangalore', 1),
(562, 'Suresh', 25, 724358146, 'Bangalore', 5),
(563, 'Ramesh', 32, 871366253, 'Bijapur', 4),
(564, 'Prakash', 30, 981723673, 'Mysore', 6),
(565, 'Mahesh', 28, 982534672, 'Mysore', 2),
(566, 'Arun', 33, 981754127, 'Kolar', 3);

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `p_id` int(3) NOT NULL,
  `Name` varchar(15) NOT NULL,
  `age` int(2) NOT NULL,
  `address` varchar(20) NOT NULL,
  `contact_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`p_id`, `Name`, `age`, `address`, `contact_number`) VALUES
(216, 'Varshini', 25, 'Bangalore', 781352301),
(217, 'Harsha', 28, 'bangalore', 891358701),
(218, 'Geetha', 27, 'Bangalore', 873918123),
(219, 'Akhil', 30, 'Mysore', 713618328),
(220, 'roh', 25, 'mysore', 765587676),
(221, 'akash', 26, 'mysore', 765587676);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `res_id` int(4) NOT NULL,
  `reserved date/time` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `no_of_persons` int(10) NOT NULL,
  `ro_id` int(5) NOT NULL,
  `name` varchar(15) NOT NULL,
  `b_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`res_id`, `reserved date/time`, `no_of_persons`, `ro_id`, `name`, `b_id`) VALUES
(5400, '2024-01-30 11:59:15.000000', 4, 3124, 'Varshini', 1),
(5401, '2024-01-30 12:04:18.000000', 2, 3125, 'Akhil', 5),
(5402, '2024-02-01 10:07:23.000000', 5, 3126, 'Harsha', 4),
(5403, '2024-02-02 12:08:30.000000', 1, 3127, 'Geetha', 3),
(5406, '2024-01-30 13:44:42.068652', 2, 3125, 'akash', 5);

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `ro_id` int(5) NOT NULL,
  `source` varchar(20) NOT NULL,
  `destination` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`ro_id`, `source`, `destination`) VALUES
(3124, 'Bangalore', 'Tumkur'),
(3125, 'Bangalore', 'Mysore'),
(3126, 'Bangalore', 'Hassan'),
(3127, 'Mysore', 'Mandya');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `t_no` int(10) NOT NULL,
  `res_id` int(5) NOT NULL,
  `amount` int(20) NOT NULL,
  `payment_method` text NOT NULL,
  `date/time` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`t_no`, `res_id`, `amount`, `payment_method`, `date/time`) VALUES
(17325811, 5400, 1600, 'online', '2024-01-31 15:02:45.000000'),
(25131732, 5403, 500, 'cash', '2024-02-03 14:58:20.000000'),
(54545348, 5406, 800, 'online', '2024-01-31 11:28:05.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`b_id`),
  ADD KEY `b_id` (`b_id`),
  ADD KEY `ro_id` (`ro_id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`d_id`),
  ADD KEY `b_id` (`b_id`);

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `p_id` (`p_id`),
  ADD KEY `Name` (`Name`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`res_id`),
  ADD KEY `res_id` (`res_id`),
  ADD KEY `b_id` (`b_id`),
  ADD KEY `ro_id` (`ro_id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`ro_id`),
  ADD KEY `ro_id` (`ro_id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`t_no`),
  ADD KEY `res_id` (`res_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `b_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `d_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=567;

--
-- AUTO_INCREMENT for table `passenger`
--
ALTER TABLE `passenger`
  MODIFY `p_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `res_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5407;

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `ro_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3129;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `t_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231231315;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bus`
--
ALTER TABLE `bus`
  ADD CONSTRAINT `bus_ibfk_1` FOREIGN KEY (`ro_id`) REFERENCES `route` (`ro_id`);

--
-- Constraints for table `driver`
--
ALTER TABLE `driver`
  ADD CONSTRAINT `driver_ibfk_1` FOREIGN KEY (`b_id`) REFERENCES `bus` (`b_id`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`b_id`) REFERENCES `bus` (`b_id`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`ro_id`) REFERENCES `route` (`ro_id`),
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`name`) REFERENCES `passenger` (`Name`);

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`res_id`) REFERENCES `reservation` (`res_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
