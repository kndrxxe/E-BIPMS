-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2024 at 07:21 PM
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `phonenumber` varchar(100) NOT NULL,
  `birthday` varchar(100) NOT NULL,
  `civilstatus` varchar(100) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `purok` varchar(100) NOT NULL,
  `purpose` varchar(100) NOT NULL,
  `issue_date` varchar(100) NOT NULL,
  `date_requested` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `isPaid` int(11) NOT NULL,
  `paymentmethod` varchar(100) NOT NULL,
  `proof` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `eventname`, `eventdatestart`, `eventdateend`, `eventtimestart`, `eventtimeend`, `eventlocation`, `eventdescription`, `eventcolor`, `status`) VALUES
(1, 'Implantation', '2023-12-11', '2023-12-11', '08:00:00', '17:00:00', 'Liliw Covered Court', 'Implantation    ', '#ffc800', 0),
(2, 'Anti Rabies Vaccination', '2023-12-13', '2023-12-15', '08:00:00', '17:00:00', 'Liliw Covered Court', 'Anti Rabies Vaccination', '#66ff00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `incidentreport`
--

CREATE TABLE `incidentreport` (
  `id` int(11) NOT NULL,
  `userID` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `incident` text NOT NULL,
  `date` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `person` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(2) NOT NULL,
  `date_reported` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `indigency`
--

CREATE TABLE `indigency` (
  `id` int(11) NOT NULL,
  `userID` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phonenumber` varchar(100) NOT NULL,
  `purok` varchar(100) NOT NULL,
  `purpose` varchar(100) NOT NULL,
  `issue_date` varchar(100) NOT NULL,
  `date_requested` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `hash_id` varchar(100) NOT NULL,
  `applicants` int(11) NOT NULL,
  `companyname` varchar(255) NOT NULL,
  `region` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `jobtitle` varchar(255) NOT NULL,
  `jobdescription` text NOT NULL,
  `jobrequirements` text NOT NULL,
  `joblink` varchar(100) NOT NULL,
  `date_posted` datetime NOT NULL DEFAULT current_timestamp(),
  `isFeatured` tinyint(2) NOT NULL,
  `status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `hash_id`, `applicants`, `companyname`, `region`, `province`, `city`, `jobtitle`, `jobdescription`, `jobrequirements`, `joblink`, `date_posted`, `isFeatured`, `status`) VALUES
(1, '', 120, 'Canon Business Machines Philippines Inc.', '', '', '', 'Production Operator', '<p style=\"text-align: justify;\">To be successful as a production worker you should be able to work on the production line with consistent speed and accuracy. An outstanding production worker should be able to maintain production standards and work towards', '<ul>\r\n<li>High school diploma/GED.</li>\r\n<li>Previous experience working in a factory is beneficial.</li>\r\n<li>Experience operating manufacturing machinery.</li>\r\n<li>Able to work as part of a team.</li>\r\n<li>Good communication skills.</li>\r\n<li>Basic mat', '', '2024-01-03 01:42:53', 1, 1),
(2, '59d8c94e668078a74e9b2ad2197f7d08', 120, 'Höegh Autoliners', 'National Capital Region (NCR)', 'NCR, Fourth District', 'City Of Makati', 'Integration Developer', '<p class=\"MsoNoSpacing\" style=\"text-align: justify;\"><strong>A Little About Us</strong></p>\r\n<p class=\"MsoNoSpacing\" style=\"text-align: justify;\">H&ouml;egh Autoliners is a global player in Ro/Ro deep sea transportation services and operates the greenest fleet in this segment. The company owns and operates approx. 40 Pure Car and Truck Carriers (PCTCs) in global trade systems, making around 3 000 port calls yearly. Managed from a worldwide network of around 16 offices, our main customers are major manufacturers of new cars, heavy machinery and other rolling stock. We are working towards a goal of zero emissions by 2040 and have an exciting roadmap to achieve this.&nbsp;</p>\r\n<p class=\"MsoNoSpacing\" style=\"text-align: justify;\"><strong>A Lot About You</strong></p>\r\n<p style=\"text-align: justify;\">You are a self-motivated developer who is passionate about designing, implementing and maintaining integrations across internal systems, to third party systems and services. You are looking for a new opportunity to implemented and design integration solutions in a variety of situations. You enjoy establishing good monitoring and optimization solutions to ensure good quality of the established integrations. You are someone who is systematic in analyzing the specific requirements for a given integration and in applying well established integration patterns to determine the most appropriate and cost-effective solutions for each case.</p>\r\n<p style=\"text-align: justify;\">As an Integration Developer, you will be responsible for coding, design, implementation, and testing to deliver quality templates according to given specifications for different applications. Your role will focus primarily to address technical/production issues which include back-end and front-end issues raised by the end users. Your task involves creation of technical documents and training materials for team to be used as a guide in maintaining the application.</p>\r\n<p style=\"text-align: justify;\">You will work in our Manila office and will directly report to the Data Integration Specialist.&nbsp;</p>\r\n<p style=\"text-align: justify;\"><strong>Main Responsibilities</strong></p>\r\n<ul>\r\n<li style=\"text-align: justify;\">Take ownership of incoming tickets reported in our ticketing system and ensure tickets are resolved in the shortest reasonable time possible</li>\r\n<li style=\"text-align: justify;\">Responsible for the daily maintenance of the company&rsquo;s existing software product system and make timely response to the problem of the system</li>\r\n<li style=\"text-align: justify;\">Proper documentation of new solutions for easier tracking and fixing of issues. This also includes new features to serve as guide for the other teams</li>\r\n<li style=\"text-align: justify;\">Participate in improving the department&rsquo;s processes</li>\r\n<li style=\"text-align: justify;\">Maintain and support existing systems</li>\r\n<li style=\"text-align: justify;\">Performs other ad hoc activities as prescribed by the Immediate Manager/Authorized Representative</li>\r\n</ul>', '<p><strong>Minimum Qualifications</strong></p>\r\n<ul>\r\n<li>Bachelor&rsquo;s Degree in Computer Science, Information System, or Information Technology</li>\r\n<li>Minimum of three (3)&nbsp;years of work related experience in integration development</li>\r\n<li>Experience in XSLT, &nbsp;XML, HTML, Java, EDI, SOAP, Rest API\'s&nbsp;</li>\r\n<li>Familiarity with&nbsp;Dell Boomi, Mulesoft, IBM App Connect, Oracle Integration Cloud, Oracle SOA</li>\r\n<li>Knowledgeable in Jira and ServiceNow&nbsp;</li>\r\n<li>Exposure in an agile environment&nbsp;</li>\r\n<li>Must have good testing and programming aptitude</li>\r\n<li>Ability to work both independently with minimal supervision and in a team environment</li>\r\n</ul>', 'https://career2.successfactors.eu/sfcareer/jobreqcareer?jobId=1023&company=hoeghautol', '2024-01-02 18:52:53', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `localgovernment`
--

CREATE TABLE `localgovernment` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `officials`
--

INSERT INTO `officials` (`id`, `firstName`, `middleName`, `lastName`, `position`, `committee`, `termStartYear`, `termEndYear`, `type`, `picture`) VALUES
(1, 'Henry', 'O.', 'Duller', 'Barangay Chairperson', '', 2023, 2025, 'Barangay', ''),
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
-- Table structure for table `residency`
--

CREATE TABLE `residency` (
  `id` int(11) NOT NULL,
  `userID` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phonenumber` varchar(100) NOT NULL,
  `purok` varchar(100) NOT NULL,
  `issue_date` varchar(100) NOT NULL,
  `date_requested` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `isEditable` tinyint(2) NOT NULL,
  `last_username_change` datetime NOT NULL DEFAULT current_timestamp(),
  `last_password_change` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `userID`, `firstname`, `middlename`, `lastname`, `sex`, `birthday`, `age`, `house_no`, `purok`, `civilstatus`, `voter`, `is_special_group`, `specialgroup`, `members`, `housingstatus`, `employmentstatus`, `yearsliving`, `phonenumber`, `email`, `username`, `password`, `profile_picture`, `proof`, `status`, `isEditable`, `last_username_change`, `last_password_change`) VALUES
(5, '499156d1cdc17570d398c84e136a6e8e', 'Kendrix', 'Britiller', 'Brosas', 'Male', '2001-05-05', 22, '050', 'Purok 1', 'Single', 'Yes', 0, '', 5, 'Owned', 'Employed', '', '+639664179718', 'brosaskndrx05@gmail.com', 'kndrxxe', 'f31315b06fa7e2b2f3b3b91bf7bdfe8f', '', '', '1', 0, '2024-01-03 02:13:04', '2024-01-03 02:13:04'),
(6, '709952d92683212899be32c29fa7c75a', 'Joselyn', 'Britiller', 'Brosas', 'Female', '1977-04-27', 46, '050', 'Purok 1', 'Married', 'Yes', 0, '', 4, 'Owned', 'Self-Employed', '', '+639213023468', '', '', '', '', '', '', 1, '2024-01-03 02:13:04', '2024-01-03 02:13:04'),
(7, 'cbb03857b58b5fbba6658994468f12ed', 'Alvin', 'Borlaza', 'Brosas', 'Male', '1977-02-01', 46, '050', 'Purok 1', 'Married', 'Yes', 0, '', 4, 'Owned', 'Unemployed', '', '+639558403607', '', '', '', '', '', '', 1, '2024-01-03 02:13:04', '2024-01-03 02:13:04'),
(8, 'c4160a1011d03eab54393f8130ef5aea', 'Evelyn', 'Silva', 'Britiller', 'Female', '1949-09-05', 74, '001', 'Purok 1', 'Widowed', 'Yes', 0, 'Senior Citizen', 5, 'Owned', 'Retired', '', '+639664179718', '', '', '', '', '', '', 1, '2024-01-03 02:13:04', '2024-01-03 02:13:04'),
(9, '0328893455a76621029b8ea1620d3ec6', 'Clarissa', 'Silva', 'Britiller', 'Female', '1979-05-04', 44, '001', 'Purok 1', 'Single', 'Yes', 0, '', 4, 'Owned', 'Self-Employed', '', '+639664179718', '', '', '', '', '', '', 1, '2024-01-03 02:13:04', '2024-01-03 02:13:04'),
(10, '765507b482b325ccfd7fa617099462e4', 'Lyn Mae', 'Britiller', 'Brosas', 'Male', '1998-05-08', 25, '050', 'Purok 1', 'Single', 'Yes', 0, '', 4, 'Owned', 'Employed', '', '+639665272626', '', '', '', '', '', '', 1, '2024-01-03 02:13:04', '2024-01-03 02:13:04');

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
-- Indexes for table `incidentreport`
--
ALTER TABLE `incidentreport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indigency`
--
ALTER TABLE `indigency`
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
-- Indexes for table `residency`
--
ALTER TABLE `residency`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `incidentreport`
--
ALTER TABLE `incidentreport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `indigency`
--
ALTER TABLE `indigency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- AUTO_INCREMENT for table `residency`
--
ALTER TABLE `residency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `residents`
--
ALTER TABLE `residents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
