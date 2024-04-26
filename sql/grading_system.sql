-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2024 at 03:22 PM
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

--
-- Dumping data for table `archivefaculty`
--

INSERT INTO `archivefaculty` (`facultyID`, `facultyFName`, `facultyMName`, `facultyLName`, `facultyEmail`, `facultyPass`, `facultyType`) VALUES
('fct1', 'asdf', 'asdf', 'asdf', 'asdf@f.c', '123', 1),
('fct10', 'Aibu', 'B', 'Kuan', 'abcde@gmail.com', '123', 1),
('KLD-23-0001', 'John Lloyd', 'Flordeliza', 'Mata', 'sample@gmail.com', '12345', 1),
('KLD-24-0003', 'sample', '', 'sample', 'sample@email.com', 'Q2y8FexR', 1),
('KLD-24-0004', 'Wan', 'Tuu', 'Trii', 'eme@gmail.com', 'kwLtnnZx', 1),
('KLD-24-0005', 'Wandasd', 'Tuudsad', 'Triiasd', 'emsade@gmail.com', 'cqKpeCuZ', 1),
('KLD-24-0006', 'dfsdf', 'sdfsd', 'fsdfs', 'emsade@gmail.com', 'Gng8FkeE', 1);

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

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`assignID`, `facultyID`, `sectionID`, `courseCode`) VALUES
(2, 'fct2', 'sct2', 'GEC1000'),
(3, 'fct3', 'sct3', 'PCIS1109'),
(4, 'KLD125288', 'BSIS201', 'CCIS1101'),
(5, 'KLD125288', 'BSIS101', 'GEC1000');

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

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseCode`, `courseName`, `courseYear`, `courseSem`) VALUES
('CCIS1101', 'Computer Programming Lec', 1, '1'),
('CCIS1102', 'Computer Programming Lab', 1, '1'),
('GEC1000', 'Purposive Communication', 1, '1'),
('PCIS1011', 'Intro to Computing', 1, '1'),
('PCIS1109', 'Living in the IT Era', 2, '1');

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
  `facultyType` int(11) NOT NULL,
  `facultyStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`facultyID`, `facultyFName`, `facultyMName`, `facultyLName`, `facultyEmail`, `facultyPass`, `facultyType`, `facultyStatus`) VALUES
('fct2', 'asdf2', 'asdf2', 'asdf2', 'asdf2@f.c', '123', 2, 3),
('fct3', 'asdf3', 'asdf3', 'asdf3', 'asdf3@f.c', '123', 3, 3),
('KLD1', 'John Andrew', 'Gadin', 'Reyes', 'reyes@gmail.com', '12345', 1, 1),
('KLD125288', 'Mark Christopher', 'Pogi', 'Borja', 'borjie@gmail.com', '12345', 3, 1),
('KLD125289', 'Cesar', 'Masipag', 'Galingana', 'galingana@gmail.com', '12345', 2, 1),
('KLD125290', 'Cecille', 'Maganda', 'Alvaran', 'alvaran@gmail.com', '12345', 1, 1),
('KLD125291', 'Mary Jane', 'Malupet', 'Legaspi', 'legaspi@gmail.com', '12345', 1, 1),
('KLD125292', 'Jackie', '', 'Bostick', 'amal_horan@hotmail.com', '12345', 2, 3),
('KLD125293', 'Belinda', '', 'Brewster', 'kit-wentz03995@ins.com', '12345', 3, 1),
('KLD125294', 'Alba', '', 'Mcknight', 'marnie-hook@yahoo.com', '12345', 3, 1),
('KLD125295', 'Veronique', '', 'Estrella', 'shanti.hager@bmw.com', '12345', 2, 1),
('KLD125296', 'Kellye', '', 'Dobson-Beaudry', 'leonardo8@bid.com', '12345', 2, 1),
('KLD125297', 'Alfredo', '', 'Han', 'soledad.drury@remains.com', '12345', 3, 1),
('KLD2', 'John Lloyd', 'Flordeliza', 'Mata', 'mata@gmail.com', '12345', 2, 1),
('KLD3', 'Aibu', '', 'Kuan', 'kuan@gmail.com', '12345', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `facultytype`
--

CREATE TABLE `facultytype` (
  `facultyTypeID` int(11) NOT NULL,
  `facultyType` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `facultytype`
--

INSERT INTO `facultytype` (`facultyTypeID`, `facultyType`) VALUES
(1, 'Teacher'),
(2, 'Program Chair'),
(3, 'Dean'),
(4, 'registrar');

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

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`sectionID`, `sectionAdv`, `sectionYearLvl`) VALUES
('BSIS101', 'KLD1', 1),
('BSIS102', 'KLD1', 1),
('BSIS103', 'KLD1', 1),
('BSIS104', 'KLD1', 1),
('BSIS105', 'KLD1', 1),
('BSIS201', 'KLD1', 2),
('BSIS202', 'KLD1', 2),
('BSIS203', 'KLD1', 2),
('BSIS204', 'KLD1', 2),
('BSIS205', 'KLD1', 2),
('BSIS301', 'KLD1', 3),
('BSIS302', 'KLD1', 3),
('BSIS303', 'KLD1', 3),
('BSIS304', 'KLD1', 3),
('BSIS305', 'KLD1', 3),
('BSIS401', 'KLD1', 4),
('BSIS402', 'KLD1', 4),
('BSIS403', 'KLD1', 4),
('BSIS404', 'KLD1', 4),
('BSIS405', 'KLD1', 4),
('sct2', 'fct2', 2),
('sct3', 'fct3', 3);

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

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentID`, `studentFName`, `studentMName`, `studentLName`, `studentEmail`, `studentPass`, `studentSect`) VALUES
('125328', 'Lucas', '', 'Yang', 'scarlet.barone@exclude.com', '12345', 'BSIS403'),
('125329', 'Kasey', '', 'Lister', 'catherina_rogers9664@gmail.com', '12345', 'BSIS305'),
('125330', 'Mayme', '', 'Palumbo', 'lulalake2@gmail.com', '12345', 'BSIS105'),
('125331', 'Tambra', '', 'Matthew', 'russel-pack2@understood.com', '12345', 'BSIS204'),
('125332', 'Karri', '', 'Lindstrom', 'zoila21718@hotmail.com', '12345', 'BSIS403'),
('125333', 'Cayla', '', 'Putnam', 'elaina11604@yahoo.com', '12345', 'BSIS201'),
('125334', 'Latoria', '', 'Burris', 'davisgonsalves95290@grow.com', '12345', 'BSIS202'),
('125335', 'Katlyn', '', 'Keeling', 'krystlemilton35116@visitors.com', '12345', 'BSIS404'),
('125336', 'Loris', '', 'Yancey', 'nelle_hand012@gmail.com', '12345', 'BSIS401'),
('125337', 'Kristan', '', 'Daigle', 'janey.vanhorn83085@gmail.com', '12345', 'BSIS105'),
('std2', 'asdf2', 'asdf2', 'asdf2', 'asdf2@f.c', '123', 'sct2'),
('std3', 'asdf3', 'asdf3', 'asdf3', 'asdf3@f.c', '123', 'sct3');

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
-- Table structure for table `userstatus`
--

CREATE TABLE `userstatus` (
  `statusID` int(11) NOT NULL,
  `userStatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userstatus`
--

INSERT INTO `userstatus` (`statusID`, `userStatus`) VALUES
(1, 'new'),
(2, 'active'),
(3, 'archive');

-- --------------------------------------------------------

--
-- Table structure for table `yearlevel`
--

CREATE TABLE `yearlevel` (
  `yearLevelID` int(11) NOT NULL,
  `yearLevel` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `yearlevel`
--

INSERT INTO `yearlevel` (`yearLevelID`, `yearLevel`) VALUES
(1, '1st Year'),
(2, '2nd Year'),
(3, '3rd Year'),
(4, '4th Year');

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
  ADD KEY `fkfacultyType` (`facultyType`),
  ADD KEY `fkfacultyStatus` (`facultyStatus`);

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
  ADD KEY `fkgradeapproved` (`gradeApproved`),
  ADD KEY `fkgradeteacher` (`teacherID`);

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
  ADD PRIMARY KEY (`studentID`),
  ADD KEY `fkstudentsect` (`studentSect`);

--
-- Indexes for table `usersession`
--
ALTER TABLE `usersession`
  ADD PRIMARY KEY (`sessionId`);

--
-- Indexes for table `userstatus`
--
ALTER TABLE `userstatus`
  ADD PRIMARY KEY (`statusID`);

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
  MODIFY `assignID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `facultytype`
--
ALTER TABLE `facultytype`
  MODIFY `facultyTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `gradeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usersession`
--
ALTER TABLE `usersession`
  MODIFY `sessionId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `yearlevel`
--
ALTER TABLE `yearlevel`
  MODIFY `yearLevelID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  ADD CONSTRAINT `fkfacultyStatus` FOREIGN KEY (`facultyStatus`) REFERENCES `userstatus` (`statusID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkfacultyType` FOREIGN KEY (`facultyType`) REFERENCES `facultytype` (`facultyTypeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `grade`
--
ALTER TABLE `grade`
  ADD CONSTRAINT `fkgradecourse` FOREIGN KEY (`courseCode`) REFERENCES `course` (`courseCode`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkgradestudent` FOREIGN KEY (`studentID`) REFERENCES `student` (`studentID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkgradeteacher` FOREIGN KEY (`teacherID`) REFERENCES `faculty` (`facultyID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `fksectionadviser` FOREIGN KEY (`sectionAdv`) REFERENCES `faculty` (`facultyID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fksectionyear` FOREIGN KEY (`sectionYearLvl`) REFERENCES `yearlevel` (`yearLevelID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fkstudentsect` FOREIGN KEY (`studentSect`) REFERENCES `section` (`sectionID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
