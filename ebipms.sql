-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2023 at 02:38 AM
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
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `bhw`
--

CREATE TABLE `bhw` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bhw`
--

INSERT INTO `bhw` (`id`, `username`, `password`) VALUES
(1, 'bhwuser', 'bhwuser123');

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
  `birthday` varchar(100) NOT NULL,
  `civilstatus` varchar(100) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `purok` varchar(100) NOT NULL,
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

INSERT INTO `documents` (`id`, `userID`, `firstname`, `middlename`, `lastname`, `email`, `birthday`, `civilstatus`, `sex`, `purok`, `purpose`, `issue_date`, `date_requested`, `status`, `isPaid`, `proof`) VALUES
(1, '0c90d6f1ed7fdce9a4a06accd1384150', 'Kendrix', 'Britiller', 'Brosas', 'brosaskndrx05@gmail.com', '2001-05-05', 'Single', 'Male', 'Purok 1', 'Employment', '2023-12-13', '2023-12-08', 1, 1, 'proof_of_payment/370346024_850477970109676_4144084443042587058_n.jpg');

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
  `eventcolor` varchar(7) NOT NULL,
  `status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `eventname`, `eventdatestart`, `eventdateend`, `eventtimestart`, `eventtimeend`, `eventlocation`, `eventdescription`, `eventcolor`, `status`) VALUES
(3, 'Anti Rabies Vaccination', '2023-12-06', '2023-12-08', '08:00:00', '17:00:00', 'Liliw Covered Court', 'Anti Rabies Vaccination', '#000000', 0),
(4, 'Implantation', '2023-12-07', '2023-12-08', '08:00:00', '17:00:00', 'Liliw Covered Court', 'Implantation', '#00ffbf', 0),
(5, 'Flu Vaccination', '2023-12-07', '2023-12-08', '08:00:00', '17:00:00', 'Liliw Town Plaza', 'Flu Vaccination', '#ffd500', 0),
(6, 'Anti Rabies Vaccination', '2023-12-11', '2023-12-15', '08:00:00', '17:00:00', 'Liliw Covered Court', 'Anti Rabies Vaccination', '#ffa200', 0),
(7, 'Flu Vaccination', '2023-12-13', '2023-12-16', '08:00:00', '17:00:00', 'Liliw Covered Court', 'Flu Vaccination', '#ff4d00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `companyname` varchar(255) NOT NULL,
  `jobtitle` varchar(255) NOT NULL,
  `jobdescription` varchar(255) NOT NULL,
  `joblocation` varchar(255) NOT NULL,
  `jobrequirements` varchar(255) NOT NULL,
  `isFeatured` tinyint(2) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `companyname`, `jobtitle`, `jobdescription`, `joblocation`, `jobrequirements`, `isFeatured`, `image`) VALUES
(1, 'Canon Business Machines Philippines Inc.', 'Production Operator', '<p style=\"text-align: justify;\">To be successful as a production worker you should be able to work on the production line with consistent speed and accuracy. An outstanding production worker should be able to maintain production standards and work towards', 'Tanauan City, Batangas', '<ul>\r\n<li>High school diploma/GED.</li>\r\n<li>Previous experience working in a factory is beneficial.</li>\r\n<li>Experience operating manufacturing machinery.</li>\r\n<li>Able to work as part of a team.</li>\r\n<li>Good communication skills.</li>\r\n<li>Basic mat', 1, '');

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
  `type` enum('Barangay','SK') NOT NULL,
  `picture` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `officials`
--

INSERT INTO `officials` (`id`, `firstName`, `middleName`, `lastName`, `position`, `committee`, `termStartYear`, `termEndYear`, `type`, `picture`) VALUES
(1, 'Henry', 'O.', 'Duller', 'Barangay Chairperson', '', 2023, 2025, 'Barangay', 'officials/1661497184343.jfif'),
(2, 'Almer', 'A.', 'Britiller', 'Barangay Councilor', 'Infrastracture', 2023, 2025, 'Barangay', ''),
(3, 'Ronald', 'B.', 'Britiller', 'Barangay Councilor', 'Agriculture', 2023, 2025, 'Barangay', ''),
(4, 'Jerome', 'M.', 'Borgonia', 'Barangay Councilor', 'Health', 2023, 2025, 'Barangay', ''),
(5, 'Ruby', 'P.', 'Borlaza', 'Barangay Councilor', 'VAWC / PWD / Senior', 2023, 2025, 'Barangay', ''),
(6, 'Mario', 'A.', 'Reyes', 'Barangay Councilor', 'Peace and Order', 2023, 2025, 'Barangay', ''),
(7, 'Paul Joseph ', 'R.', 'Britiller', 'Barangay Councilor', 'CCA', 2023, 2025, 'Barangay', ''),
(8, 'Mark Dufer', 'L.', 'Agapay', 'Barangay Councilor', 'Education', 2023, 2025, 'Barangay', ''),
(9, 'Honeylette', 'J.', 'Villanueva', 'Barangay Secretary', '', 2023, 2025, 'Barangay', ''),
(10, 'Menalyn', 'M.', 'Reyes', 'Barangay Treasurer', '', 2023, 2025, 'Barangay', ''),
(11, 'Claire', 'B.', 'Trillana', 'SK Chairperson', '', 2023, 2025, 'SK', '');

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
  `employmentstatus` varchar(100) NOT NULL,
  `yearsliving` varchar(100) NOT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `proof` varchar(255) NOT NULL,
  `status` text NOT NULL,
  `isEditable` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userID`, `firstname`, `middlename`, `lastname`, `sex`, `birthday`, `age`, `house_no`, `purok`, `civilstatus`, `voter`, `is_special_group`, `specialgroup`, `members`, `housingstatus`, `employmentstatus`, `yearsliving`, `phonenumber`, `email`, `username`, `password`, `profile_picture`, `proof`, `status`, `isEditable`) VALUES
(1, '0c90d6f1ed7fdce9a4a06accd1384150', 'Kendrix', 'Britiller', 'Brosas', 'Male', '2001-05-05', 22, '050', 'Purok 1', 'Single', 'Yes', 1, 'Solo Parent', 5, 'Owned', 'Student', '', '+639664179718', 'brosaskndrx05@gmail.com', 'kndrxxe', 'f31315b06fa7e2b2f3b3b91bf7bdfe8f', 'user_profile_pic/1661497184343.jfif', '', '1', 0),
(2, 'dc55ec844fa5c6e3cb3873c9452875d1', 'Marie', 'Jose', 'Chan', 'Female', '1977-05-04', 46, '002', 'Purok 3', 'Widowed', 'Yes', 0, '', 4, 'Owned', 'Employed', '', '+639567855411', '', '', '', '', '', '', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bhw`
--
ALTER TABLE `bhw`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
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
-- AUTO_INCREMENT for table `bhw`
--
ALTER TABLE `bhw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `localgovernment`
--
ALTER TABLE `localgovernment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `officials`
--
ALTER TABLE `officials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `residents`
--
ALTER TABLE `residents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
