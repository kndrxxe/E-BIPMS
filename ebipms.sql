-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2023 at 04:16 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ebipms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `userID` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `userID`, `username`, `password`) VALUES
(1, '', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `userID` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `purpose` varchar(100) NOT NULL,
  `issue_date` varchar(100) NOT NULL,
  `date_requested` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `isPaid` int(11) NOT NULL,
  `proof` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `userID`, `firstname`, `middlename`, `lastname`, `email`, `purpose`, `issue_date`, `date_requested`, `status`, `isPaid`, `proof`) VALUES
(26, '0cfa6111a70bc02ff9d9c7853f027cfb', 'honeylette', 'j.', 'villanueva', 'honeylettevillanueva928@gmail.com', 'Scholarship', '2023-12-06', '2023-12-01', 1, 1, 'proof_of_payment/370346024_850477970109676_4144084443042587058_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `eventname` varchar(255) DEFAULT NULL,
  `eventdatestart` date DEFAULT NULL,
  `eventdateend` date DEFAULT NULL,
  `eventtimestart` time NOT NULL,
  `eventtimeend` time NOT NULL,
  `eventlocation` varchar(255) DEFAULT NULL,
  `eventdescription` text DEFAULT NULL,
  `eventcolor` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `eventname`, `eventdatestart`, `eventdateend`, `eventtimestart`, `eventtimeend`, `eventlocation`, `eventdescription`, `eventcolor`) VALUES
(8, 'Anti Rabies Vaccination', '2023-12-01', '2023-12-04', '08:00:00', '17:00:00', 'Liliw Covered Court', 'Anti Rabies Vaccination', '#ff4d00');

-- --------------------------------------------------------

--
-- Table structure for table `localgovernment`
--

CREATE TABLE `localgovernment` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `localgovernment`
--

INSERT INTO `localgovernment` (`id`, `username`, `password`) VALUES
(1, 'lguadmin1', 'admin1');

-- --------------------------------------------------------

--
-- Table structure for table `officials`
--

CREATE TABLE `officials` (
  `id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `middleName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `committee` varchar(100) NOT NULL,
  `termStartYear` int(11) NOT NULL,
  `termEndYear` int(11) NOT NULL,
  `type` enum('Barangay','SK') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `officials`
--

INSERT INTO `officials` (`id`, `firstName`, `middleName`, `lastName`, `position`, `committee`, `termStartYear`, `termEndYear`, `type`) VALUES
(1, 'Henry', 'O.', 'Duller', 'Barangay Chairman', '', 2023, 2025, 'Barangay'),
(2, 'Almer', 'A.', 'Britiller', 'Barangay Councilor', 'Health', 2023, 2025, 'Barangay');

-- --------------------------------------------------------

--
-- Table structure for table `residents`
--

CREATE TABLE `residents` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `birthday` varchar(100) NOT NULL,
  `house_no` varchar(100) NOT NULL,
  `purok` varchar(100) NOT NULL,
  `civilstatus` varchar(100) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `sex` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `userID` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `birthday` varchar(100) NOT NULL,
  `age` int(11) NOT NULL,
  `house_no` varchar(100) NOT NULL,
  `purok` varchar(100) NOT NULL,
  `civilstatus` varchar(100) NOT NULL,
  `voter` varchar(100) NOT NULL,
  `is_special_group` tinyint(1) NOT NULL,
  `specialgroup` varchar(100) NOT NULL,
  `members` int(11) NOT NULL,
  `housingstatus` varchar(100) NOT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profile_picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userID`, `firstname`, `middlename`, `lastname`, `sex`, `birthday`, `age`, `house_no`, `purok`, `civilstatus`, `voter`, `is_special_group`, `specialgroup`, `members`, `housingstatus`, `phonenumber`, `email`, `username`, `password`, `profile_picture`) VALUES
(3, '0cfa6111a70bc02ff9d9c7853f027cfb', 'honeylette', 'j.', 'villanueva', 'Female', '1985-09-13', 38, '442', 'Purok 3', 'Single', 'Yes', 0, '', 6, 'Owned', '+639978478603', 'honeylettevillanueva928@gmail.com', 'leth', '5b4537dcdc44ad6cd55f3a3f3ff557c8', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userID` (`userID`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `localgovernment`
--
ALTER TABLE `localgovernment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `officials`
--
ALTER TABLE `officials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `residents`
--
ALTER TABLE `residents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userID` (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `localgovernment`
--
ALTER TABLE `localgovernment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `officials`
--
ALTER TABLE `officials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `residents`
--
ALTER TABLE `residents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
