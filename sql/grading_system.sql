-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2024 at 03:52 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

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
-- Table structure for table `approval`
--

CREATE TABLE `approval` (
  `approvalID` int(11) NOT NULL,
  `courseCode` varchar(10) NOT NULL,
  `facultyID` varchar(20) NOT NULL,
  `isApprovedByChair` int(11) NOT NULL,
  `isApprovedByDean` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `archivecourse`
--

CREATE TABLE `archivecourse` (
  `courseCode` varchar(10) NOT NULL,
  `courseName` varchar(100) NOT NULL,
  `courseYear` int(11) NOT NULL,
  `courseSem` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `archivefaculty`
--

CREATE TABLE `archivefaculty` (
  `facultyID` varchar(20) NOT NULL,
  `facultyFName` varchar(50) NOT NULL,
  `facultyMName` varchar(30) NOT NULL,
  `facultyLName` varchar(50) NOT NULL,
  `facultyEmail` varchar(100) NOT NULL,
  `facultyPass` varchar(255) NOT NULL,
  `facultyType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `archivesection`
--

CREATE TABLE `archivesection` (
  `sectionID` varchar(10) NOT NULL,
  `sectionAdv` varchar(20) NOT NULL,
  `sectionYearLvl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `archivestudent`
--

CREATE TABLE `archivestudent` (
  `studentID` varchar(20) NOT NULL,
  `studentFName` varchar(50) NOT NULL,
  `studentMName` varchar(30) NOT NULL,
  `studentLName` varchar(50) NOT NULL,
  `studentEmail` varchar(100) NOT NULL,
  `studentPass` varchar(255) NOT NULL,
  `studentSect` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `assignID` int(11) NOT NULL,
  `facultyID` varchar(20) NOT NULL,
  `sectionID` varchar(10) NOT NULL,
  `courseCode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `courseCode` varchar(10) NOT NULL,
  `courseName` varchar(100) NOT NULL,
  `courseYear` int(11) NOT NULL,
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
  `facultyPass` varchar(255) NOT NULL,
  `facultyType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `facultytype`
--

CREATE TABLE `facultytype` (
  `facultyTypeID` int(11) NOT NULL,
  `facultyType` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `gradeFeedback` text NOT NULL,
  `gradeApproved` int(11) NOT NULL
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
  `sectionYearLvl` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Table structure for table `yearlevel`
--

CREATE TABLE `yearlevel` (
  `yearLevelID` int(11) NOT NULL,
  `yearLevel` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approval`
--
ALTER TABLE `approval`
  ADD PRIMARY KEY (`approvalID`),
  ADD KEY `fkapprovalfaculty` (`facultyID`),
  ADD KEY `fkapprovalcourse` (`courseCode`);

--
-- Indexes for table `archivecourse`
--
ALTER TABLE `archivecourse`
  ADD PRIMARY KEY (`courseCode`),
  ADD KEY `fkcourseyear` (`courseYear`);

--
-- Indexes for table `archivefaculty`
--
ALTER TABLE `archivefaculty`
  ADD PRIMARY KEY (`facultyID`),
  ADD KEY `fkfacultyType` (`facultyType`);

--
-- Indexes for table `archivesection`
--
ALTER TABLE `archivesection`
  ADD PRIMARY KEY (`sectionID`),
  ADD KEY `fksectionadviser` (`sectionAdv`),
  ADD KEY `fksectionyear` (`sectionYearLvl`);

--
-- Indexes for table `archivestudent`
--
ALTER TABLE `archivestudent`
  ADD PRIMARY KEY (`studentID`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`assignID`),
  ADD KEY `fkfaculty` (`facultyID`),
  ADD KEY `fkcourse` (`courseCode`),
  ADD KEY `fksection` (`sectionID`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseCode`),
  ADD KEY `fkcourseyear` (`courseYear`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`facultyID`),
  ADD KEY `fkfacultyType` (`facultyType`);

--
-- Indexes for table `facultytype`
--
ALTER TABLE `facultytype`
  ADD PRIMARY KEY (`facultyTypeID`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`gradeID`),
  ADD KEY `fkgradestudent` (`studentID`),
  ADD KEY `fkgradecourse` (`courseCode`),
  ADD KEY `fkgradeapproved` (`gradeApproved`);

--
-- Indexes for table `gradecriteria`
--
ALTER TABLE `gradecriteria`
  ADD PRIMARY KEY (`gradeEquivalent`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`sectionID`),
  ADD KEY `fksectionadviser` (`sectionAdv`),
  ADD KEY `fksectionyear` (`sectionYearLvl`);

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
-- Indexes for table `yearlevel`
--
ALTER TABLE `yearlevel`
  ADD PRIMARY KEY (`yearLevelID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `assignID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `facultytype`
--
ALTER TABLE `facultytype`
  MODIFY `facultyTypeID` int(11) NOT NULL AUTO_INCREMENT;

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

--
-- AUTO_INCREMENT for table `yearlevel`
--
ALTER TABLE `yearlevel`
  MODIFY `yearLevelID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `approval`
--
ALTER TABLE `approval`
  ADD CONSTRAINT `fkapprovalcourse` FOREIGN KEY (`courseCode`) REFERENCES `course` (`courseCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkapprovalfaculty` FOREIGN KEY (`facultyID`) REFERENCES `faculty` (`facultyID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `assignment`
--
ALTER TABLE `assignment`
  ADD CONSTRAINT `fkcourse` FOREIGN KEY (`courseCode`) REFERENCES `course` (`courseCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkfaculty` FOREIGN KEY (`facultyID`) REFERENCES `faculty` (`facultyID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fksection` FOREIGN KEY (`sectionID`) REFERENCES `section` (`sectionID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `fkcourseyear` FOREIGN KEY (`courseYear`) REFERENCES `yearlevel` (`yearLevelID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `faculty`
--
ALTER TABLE `faculty`
  ADD CONSTRAINT `fkfacultyType` FOREIGN KEY (`facultyType`) REFERENCES `facultytype` (`facultyTypeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `grade`
--
ALTER TABLE `grade`
  ADD CONSTRAINT `fkgradeapproved` FOREIGN KEY (`gradeApproved`) REFERENCES `approval` (`approvalID`),
  ADD CONSTRAINT `fkgradecourse` FOREIGN KEY (`courseCode`) REFERENCES `course` (`courseCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkgradestudent` FOREIGN KEY (`studentID`) REFERENCES `student` (`studentID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `fksectionadviser` FOREIGN KEY (`sectionAdv`) REFERENCES `faculty` (`facultyID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fksectionyear` FOREIGN KEY (`sectionYearLvl`) REFERENCES `yearlevel` (`yearLevelID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
