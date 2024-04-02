-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2024 at 04:19 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grading_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `crstable`
--

CREATE TABLE `crstable` (
  `crsID` varchar(11) NOT NULL,
  `crsTitle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grdtable`
--

CREATE TABLE `grdtable` (
  `grdID` int(11) NOT NULL,
  `stdID` varchar(11) NOT NULL,
  `thrID` varchar(11) NOT NULL,
  `crsID` varchar(11) NOT NULL,
  `grdMidTerm` decimal(3,2) NOT NULL,
  `grdFinTerm` decimal(3,2) NOT NULL,
  `grdFinal` decimal(3,2) NOT NULL,
  `grdDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stdtable`
--

CREATE TABLE `stdtable` (
  `stdID` varchar(11) NOT NULL,
  `stdFName` varchar(30) NOT NULL,
  `stdMName` varchar(30) DEFAULT NULL,
  `stdLName` varchar(30) NOT NULL,
  `stdEmail` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `thrtable`
--

CREATE TABLE `thrtable` (
  `thrID` varchar(11) NOT NULL,
  `thrFName` varchar(30) NOT NULL,
  `thrMName` varchar(30) DEFAULT NULL,
  `thrLName` varchar(30) NOT NULL,
  `thrEmail` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usersession`
--

CREATE TABLE `usersession` (
  `sessionId` int(11) NOT NULL,
  `sessionSelector` char(32) NOT NULL,
  `sessionValidator` char(64) NOT NULL,
  `userID` varchar(11) NOT NULL,
  `sessionExpiry` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `userID` varchar(11) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `usertype` varchar(20) NOT NULL,
  `userstatus` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grdtable`
--
ALTER TABLE `grdtable`
  ADD PRIMARY KEY (`grdID`);

--
-- Indexes for table `stdtable`
--
ALTER TABLE `stdtable`
  ADD PRIMARY KEY (`stdID`);

--
-- Indexes for table `thrtable`
--
ALTER TABLE `thrtable`
  ADD PRIMARY KEY (`thrID`);

--
-- Indexes for table `usersession`
--
ALTER TABLE `usersession`
  ADD PRIMARY KEY (`sessionId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `grdtable`
--
ALTER TABLE `grdtable`
  MODIFY `grdID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usersession`
--
ALTER TABLE `usersession`
  MODIFY `sessionId` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
