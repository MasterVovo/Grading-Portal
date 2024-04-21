-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2024 at 04:42 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.12

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
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `assignID` int(11) NOT NULL,
  `facultyID` varchar(20) NOT NULL,
  `sectionID` varchar(20) NOT NULL,
  `courseID` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `courseCode` varchar(10) NOT NULL,
  `courseName` varchar(100) NOT NULL,
  `courseYear` varchar(50) NOT NULL,
  `courseSem` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `facultyID` varchar(20) NOT NULL,
  `facultyFName` varchar(50) NOT NULL,
  `facultyMName` varchar(30) NOT NULL,
  `facultyLName` varchar(50) NOT NULL,
  `facultyEmail` varchar(100) NOT NULL,
  `facultyPass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`facultyID`, `facultyFName`, `facultyMName`, `facultyLName`, `facultyEmail`, `facultyPass`) VALUES
('1', 'John', 'A.', 'Doe', 'john.doe@example.com', 'password1'),
('10', 'Patricia', 'J.', 'Taylor', 'patricia.taylor@example.com', 'password10'),
('2', 'Jane', 'B.', 'Smith', 'jane.smith@example.com', 'password2'),
('3', 'Michael', 'C.', 'Johnson', 'michael.johnson@example.com', 'password3'),
('4', 'Emily', 'D.', 'Williams', 'emily.williams@example.com', 'password4'),
('5', 'Robert', 'E.', 'Brown', 'robert.brown@example.com', 'password5'),
('6', 'Linda', 'F.', 'Davis', 'linda.davis@example.com', 'password6'),
('7', 'Thomas', 'G.', 'Miller', 'thomas.miller@example.com', 'password7'),
('8', 'Sarah', 'H.', 'Wilson', 'sarah.wilson@example.com', 'password8'),
('9', 'James', 'I.', 'Moore', 'james.moore@example.com', 'password9');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `gradeID` int(11) NOT NULL,
  `studentID` varchar(20) NOT NULL,
  `teacherID` varchar(20) NOT NULL,
  `courseCode` varchar(10) NOT NULL,
  `gradeMidterm` decimal(4,2) NOT NULL,
  `gradeFinal` decimal(4,2) NOT NULL,
  `gradeSemestral` decimal(4,2) NOT NULL,
  `gradeCreated` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gradecriteria`
--

CREATE TABLE `gradecriteria` (
  `gradeEquivalent` decimal(3,2) NOT NULL,
  `gradeMin` decimal(4,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `sectionID` varchar(10) NOT NULL,
  `sectionAdv` varchar(20) NOT NULL,
  `sectionYearLvl` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`sectionID`, `sectionAdv`, `sectionYearLvl`) VALUES
('BSIS101', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentID` varchar(20) NOT NULL,
  `studentFName` varchar(50) NOT NULL,
  `studentMName` varchar(30) NOT NULL,
  `studentLName` varchar(50) NOT NULL,
  `studentEmail` varchar(100) NOT NULL,
  `studentPass` varchar(255) NOT NULL,
  `studentYear` varchar(20) NOT NULL,
  `studentSect` varchar(10) NOT NULL
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
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`assignID`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseCode`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`facultyID`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`gradeID`);

--
-- Indexes for table `gradecriteria`
--
ALTER TABLE `gradecriteria`
  ADD PRIMARY KEY (`gradeEquivalent`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`sectionID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentID`);

--
-- Indexes for table `usersession`
--
ALTER TABLE `usersession`
  ADD PRIMARY KEY (`sessionId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `assignID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `gradeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usersession`
--
ALTER TABLE `usersession`
  MODIFY `sessionId` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
