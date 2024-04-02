-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2024 at 01:08 PM
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
-- Database: `contact_form_nm`
--

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `color_ID` int(11) NOT NULL,
  `Color` tinytext NOT NULL,
  `class` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`color_ID`, `Color`, `class`) VALUES
(1, 'blue', NULL),
(2, 'red', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(15) NOT NULL,
  `message` text NOT NULL,
  `marketing` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `ID` int(11) NOT NULL,
  `title` text NOT NULL,
  `minute_read` int(11) NOT NULL,
  `content` text NOT NULL,
  `posted_by_image` text NOT NULL,
  `posted_by` text NOT NULL,
  `date` text NOT NULL,
  `image` text NOT NULL,
  `image_alt` text NOT NULL,
  `color_ID` int(11) NOT NULL,
  `posted_by_image_alt` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`ID`, `title`, `minute_read`, `content`, `posted_by_image`, `posted_by`, `date`, `image`, `image_alt`, `color_ID`, `posted_by_image_alt`) VALUES
(1, 'Jamie Slater - Netmatters 5 year legend', 3, 'Today, we celebrate the brilliant accomplishments of Jamie Slater as he receives the Netmatters Long...', 'images/logos/netmatters-ltd-VXAv.webp', 'Netmatters', '15th December 2023', 'images/people/jamie-slater-DJvi.webp', 'Picture of Jamie', 1, 'Netmatters'),
(2, 'November Notables 2023', 4, 'At Netmatters, recognising and appreciating the hard work and achievements of our team members is a...', 'images/logos/netmatters-ltd-VXAv.webp', 'Netmatters', '9th December 2023', 'images\\people\\samantha.webp', 'Picture of Samantha', 2, 'Netmatters'),
(3, 'Sean Bosley - Netmatters 5 year legend ', 3, 'Today, we celebrate the brilliant accomplishments of Sean Bosley as he receives the Netmatters Long...', 'images/logos/netmatters-ltd-VXAv.webp', 'Netmatters', '8th December 2023', 'images/people/sean-bosley-DG1n.webp', 'Picture of Sean', 1, 'Netmatters');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`color_ID`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
