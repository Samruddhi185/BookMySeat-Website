-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2018 at 01:02 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bms`
--

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `station_id` int(255) NOT NULL,
  `time` time NOT NULL,
  `train_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`station_id`, `time`, `train_id`) VALUES
(11, '08:00:00', 1001),
(12, '08:20:00', 1001),
(13, '08:30:00', 1001),
(14, '08:40:00', 1001),
(15, '08:50:00', 1001),
(16, '09:00:00', 1001);

-- --------------------------------------------------------

--
-- Table structure for table `train`
--

CREATE TABLE `train` (
  `train_id` int(255) NOT NULL,
  `start_time` datetime NOT NULL,
  `schedule_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `train`
--

INSERT INTO `train` (`train_id`, `start_time`, `schedule_id`) VALUES
(1001, '2018-03-31 08:00:00', 101);

-- --------------------------------------------------------

--
-- Table structure for table `train_1001`
--

CREATE TABLE `train_1001` (
  `user_id` int(255) UNSIGNED NOT NULL,
  `train_id` int(255) NOT NULL,
  `station_id` int(255) NOT NULL,
  `leave_time` time NOT NULL,
  `compartment` int(11) NOT NULL,
  `seat_avail` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `train_1001`
--

INSERT INTO `train_1001` (`user_id`, `train_id`, `station_id`, `leave_time`, `compartment`, `seat_avail`) VALUES
(5, 1001, 12, '08:20:00', 1, 2),
(5, 1001, 13, '08:20:00', 1, 1),
(4, 1001, 14, '08:30:00', 1, 2);

--
-- Triggers `train_1001`
--
DELIMITER $$
CREATE TRIGGER `reward_trigg` AFTER INSERT ON `train_1001` FOR EACH ROW SET @SUM = 100
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `train_schedule`
--

CREATE TABLE `train_schedule` (
  `schedule_id` int(255) NOT NULL,
  `station_id` int(255) NOT NULL,
  `station_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `train_schedule`
--

INSERT INTO `train_schedule` (`schedule_id`, `station_id`, `station_name`) VALUES
(101, 12, 'ANDHERI'),
(101, 13, 'BANDRA'),
(101, 11, 'BORIVALI'),
(101, 16, 'CHURCHGATE'),
(101, 14, 'DADAR'),
(101, 15, 'MUMBAI CENTRAL');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(255) UNSIGNED NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `mobile` bigint(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `reward_pts` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `first_name`, `last_name`, `mobile`, `email`, `password`, `reward_pts`) VALUES
(1, 'ran', 'riddhi', 'nisar', 9833653819, 'rnn@gmail.com', 'rnn1', 0),
(2, 'rnn', 'r', 'n', 9, NULL, 'r', 1),
(3, 'riddhi', 'riddhi', '99', 0, 'blah', 'rr', 0),
(4, 'dar', 'dar', 'nisar', 1, 'riddhinisar11@gmail.com', 'blah', 0),
(5, 'samruddhi', 'samruddhi', 'patil', 9987433480, 'samruddhiptl@gmail.com', '123', 0),
(6, 'sam', 'sam', 'patil', 8087237068, 'samruddhi.ptl@gmail.com', '289dff07669d7a23de0ef88d2f7129e7', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD KEY `station_id` (`station_id`),
  ADD KEY `train_id` (`train_id`);

--
-- Indexes for table `train`
--
ALTER TABLE `train`
  ADD PRIMARY KEY (`train_id`,`schedule_id`),
  ADD KEY `schedule_id` (`schedule_id`),
  ADD KEY `train_id` (`train_id`);

--
-- Indexes for table `train_1001`
--
ALTER TABLE `train_1001`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `train_id` (`train_id`),
  ADD KEY `station_id` (`station_id`);

--
-- Indexes for table `train_schedule`
--
ALTER TABLE `train_schedule`
  ADD KEY `schedule_id` (`schedule_id`),
  ADD KEY `station_id` (`station_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `password` (`password`),
  ADD UNIQUE KEY `mobile` (`mobile`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `timetable`
--
ALTER TABLE `timetable`
  ADD CONSTRAINT `fk2` FOREIGN KEY (`train_id`) REFERENCES `train` (`train_id`),
  ADD CONSTRAINT `fk3` FOREIGN KEY (`station_id`) REFERENCES `train_schedule` (`station_id`);

--
-- Constraints for table `train_1001`
--
ALTER TABLE `train_1001`
  ADD CONSTRAINT `fk4` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `fk5` FOREIGN KEY (`train_id`) REFERENCES `train` (`train_id`),
  ADD CONSTRAINT `fk6` FOREIGN KEY (`station_id`) REFERENCES `train_schedule` (`station_id`);

--
-- Constraints for table `train_schedule`
--
ALTER TABLE `train_schedule`
  ADD CONSTRAINT `FK1` FOREIGN KEY (`schedule_id`) REFERENCES `train` (`schedule_id`);

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `delete1001` ON SCHEDULE EVERY 1 HOUR STARTS '2018-04-07 00:25:00' ON COMPLETION PRESERVE DISABLE COMMENT 'clears table 1001' DO DELETE FROM `train_1001`$$

CREATE DEFINER=`root`@`localhost` EVENT `add` ON SCHEDULE AT '2018-04-06 00:00:00' ON COMPLETION PRESERVE DISABLE COMMENT 'ADDS ROW' DO INSERT INTO `train_1001` (`user_id`, `train_id`, `station_id`, `leave_time`, `1`, `compartment`) VALUES ('4', '1001', '13', 'CURRENT_TIMESTAMP(1).0000000','YES', '1')$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
