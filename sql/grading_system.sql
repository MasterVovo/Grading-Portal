-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2024 at 05:06 PM
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
('CCIS1101', 'Intoduction to Computing Lec', 1, '1'),
('CCIS1101L', 'Intoduction to Computing Lab', 1, '1'),
('CCIS1102', 'Computer Programming 1 Lec', 1, '1'),
('CCIS1102L', 'Computer Programming 1 Lab', 1, '1'),
('CCIS1203', 'Computer Programming 2 Lec', 1, '2'),
('CCIS1203L', 'Computer Programming 2 Lab', 1, '2'),
('CCIS2104', 'Data Structures and Algorithm Lec', 2, '1'),
('CCIS2104L', 'Data Structures and Algorithm Lab', 2, '1'),
('CCIS2205', 'Information Management Lec', 2, '2'),
('CCIS2205L', 'Information Management Lab', 2, '2'),
('CCIS3106', 'Application Development and Emerging Tech Lec', 3, '1'),
('CCIS3106L', 'Application Development and Emerging Tech Lab', 3, '1'),
('GEC1000', 'Understanding the Self', 1, '2'),
('GEC1100', 'Technical Writing', 2, '1'),
('GEC2000', 'Ethics', 2, '2'),
('GEC3000', 'Art Appreciation', 1, '2'),
('GEC4000', 'Purposive Communication', 1, '1'),
('GEC5000', 'Mathematics in the Modern World', 1, '2'),
('GEC6000', 'The Contemporary World', 4, '1'),
('GEC7000', 'Mga Babasahin Hinggil sa Kasaysayan ng Pilipinas', 2, '1'),
('GEC8000', 'Science, Technology, and Society', 1, '1'),
('GEC9100', 'Filipino 1', 2, '2'),
('GEE1000', 'Living in the IT Era', 1, '1'),
('GEE5000', 'People, Earth and Ecosystem', 2, '2'),
('GEE5100', 'People, Earth and Ecosystem', 4, '1'),
('ISCP3201', 'IS Capstone Project 1', 3, '2'),
('ISCP4102', 'IS Capstone Project 2', 4, '1'),
('ISMAT1200', 'Math Analysis', 2, '1'),
('NSTP1101', 'National Training Service Program 1', 1, '1'),
('NSTP1202', 'National Training Service Program 2', 1, '2'),
('PCIS1101', 'Fundamentals of Information Systems', 1, '1'),
('PCIS1102', 'Fundamentals of Database System', 1, '2'),
('PCIS1102L', 'Fundamentals of Database System Lab', 1, '2'),
('PCIS2103', 'Professional Issues in Information System', 2, '1'),
('PCIS2104', 'IT Infrastructure and Network Technologies Lec', 2, '1'),
('PCIS2104L', 'IT Infrastructure and Network Technologies Lab', 2, '1'),
('PCIS2118', 'Web Development Lec', 2, '1'),
('PCIS2118L', 'Web Development Lab', 2, '1'),
('PCIS2205', 'System Analysis and Design', 2, '2'),
('PCIS2206', 'Business Process Design and Management', 2, '2'),
('PCIS2209', 'Organization and Management Concepts', 2, '2'),
('PCIS2219', 'Business Law', 2, '2'),
('PCIS3107', 'Enterprise Architecture', 3, '1'),
('PCIS3108', 'IS Strategy, Management and Acquisition', 3, '1'),
('PCIS3110', 'Financial Management', 3, '1'),
('PCIS3111', 'Project Management Lec', 3, '1'),
('PCIS3111L', 'Project Management Lab', 3, '1'),
('PCIS3120', 'E-Commerce Mobile Application and Internet Marketing Lec', 3, '1'),
('PCIS3120L', 'E-Commerce Mobile Application and Internet Marketing Lab', 3, '1'),
('PCIS3121', 'Human Computer Interaction Lec', 3, '1'),
('PCIS3121L', 'Human Computer Interaction Lab', 3, '1'),
('PCIS3212', 'Evaluation of Business Performance', 3, '2'),
('PCIS3213', 'Quantitative Methods', 3, '2'),
('PCIS3214', 'Mobile Application Development Lec', 3, '2'),
('PCIS3214L', 'Mobile Application Development Lab', 3, '2'),
('PCIS3215', 'Internet of Things Lec', 3, '2'),
('PCIS3215L', 'Internet of Things Lab', 3, '2'),
('PCIS3216', 'Information System Assurance', 3, '2'),
('PCIS3222', 'IS Technopreneurship', 3, '2'),
('PCIS4117', 'Information Security', 4, '1'),
('PCIS4123', 'Good Governance and Social Responsibility', 4, '1'),
('PE1101', 'PATHFIT 1', 1, '1'),
('PE1202', 'PATHFIT 2', 1, '2'),
('PE2103', 'PATHFIT 3', 2, '1'),
('PE2204', 'PATHFIT 4', 2, '2'),
('RZL1000', 'Kursong Rizal', 1, '2');

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
('admin', '', '', '', '', '12345', 0, 0),
('KLD-23-000001', 'Abra', '', 'Kadabra', 'abracadabra@gmail.com', '123', 2, 2),
('KLD-23-0001', 'Kellye', '', 'Dobson-Beaudry', 'leonardo8@bid.com', '12345', 2, 1),
('KLD-23-0002', 'Alfredo', '', 'Han', 'soledad.drury@remains.com', '12345', 3, 1),
('KLD-23-0003', 'John Lloyd', 'Flordeliza', 'Mata', 'mata@gmail.com', '12345', 2, 1),
('KLD-23-0004', 'Aibu', '', 'Kuan', 'kuan@gmail.com', '12345', 3, 1),
('KLD-23-0005', 'Claudia', 'Lowe', 'Galloway', 'nunc.quisque.ornare@email.com', '12345', 2, 2),
('KLD-23-0006', 'Chaney', 'Pruitt', 'Middleton', 'sed@gmail.com', '12345', 1, 1),
('KLD-23-0007', 'Natalie', 'Jarvis', 'Stout', 'dis@outlook.com', '12345', 2, 2),
('KLD-23-0008', 'Amethyst', 'Garrett', 'Todd', 'ultrices@gmail.com', '12345', 2, 2),
('KLD-23-0009', 'Colton', 'Gonzalez', 'Johnston', 'adipiscing@gmail.com', '12345', 2, 2),
('KLD-23-0010', 'Colt', 'Morrow', 'Swanson', 'enim.nunc@email.com', '12345', 3, 1),
('KLD-23-0011', 'Gail', 'Rutledge', 'Guerrero', 'taciti.sociosqu.ad@gmail.com', '12345', 3, 1),
('KLD-23-0012', 'Nadine', 'Bishop', 'Dominguez', 'luctus@email.com', '12345', 4, 2),
('KLD-23-0013', 'Kieran', 'Rosario', 'Logan', 'iaculis.aliquet@gmail.com', '12345', 4, 2),
('KLD-23-0014', 'Sonya', 'Burgess', 'Ewing', 'dis.parturient.montes@outlook.com', '12345', 1, 1),
('KLD-24-0001', 'John Andrew', 'Gadin', 'Reyes', 'reyes@gmail.com', '12345', 1, 1),
('KLD-24-0002', 'Mark Christopher', 'Pogi', 'Borja', 'borjie@gmail.com', '12345', 3, 1),
('KLD-24-0003', 'Cesar', 'Masipag', 'Galingana', 'galingana@gmail.com', '12345', 2, 1),
('KLD-24-0004', 'Cecille', 'Maganda', 'Alvaran', 'alvaran@gmail.com', '12345', 1, 1),
('KLD-24-0005', 'Mary Jane', 'Malupet', 'Legaspi', 'legaspi@gmail.com', '12345', 1, 1),
('KLD-24-0006', 'Jackie', '', 'Bostick', 'amal_horan@hotmail.com', '12345', 2, 1),
('KLD-24-0007', 'Belinda', '', 'Brewster', 'kit-wentz03995@ins.com', '12345', 3, 1),
('KLD-24-0008', 'Alba', '', 'Mcknight', 'marnie-hook@yahoo.com', '12345', 3, 1),
('KLD-24-0009', 'Veronique', '', 'Estrella', 'shanti.hager@bmw.com', '12345', 2, 1),
('KLD-24-0010', 'Cally', 'Thomas', 'Clarke', 'duis.mi.enim@gmail.com', '12345', 1, 1),
('KLD-24-0011', 'Daniel', 'Martin', 'Franklin', 'lacus@email.com', '12345', 1, 1),
('KLD-24-0012', 'Ava', 'Villarreal', 'Hahn', 'imperdiet.erat@email.com', '12345', 2, 2),
('KLD-24-0013', 'Holmes', 'Mcfarland', 'Bond', 'lacus.ut.nec@email.com', '12345', 2, 2),
('KLD-24-0014', 'David', 'Hartman', 'Barrera', 'curabitur.dictum@email.com', '12345', 3, 1),
('KLD-24-0015', 'Stephanie', 'Shields', 'Finley', 'ligula.nullam@email.com', '12345', 3, 1),
('KLD-24-0016', 'Gavin', 'Bridges', 'Dunn', 'quam.a.felis@outlook.com', '12345', 4, 2),
('KLD-24-0017', 'Castor', 'Parks', 'Charles', 'est.arcu@outlook.com', '12345', 4, 2),
('KLD-24-0018', 'Cade', 'Dorsey', 'Barron', 'a.auctor.non@outlook.com', '12345', 1, 1),
('KLD-24-0019', 'Phyllis', 'Larsen', 'Lloyd', 'cras.dolor.dolor@gmail.com', '12345', 1, 1),
('KLD-24-0020', 'John Andrew', 'Gadin', 'Reyes', 'johnandrewreyes3@gmail.com', 'bjWZcWJl', 2, 3),
('KLD-24-0021', 'John Andrew', 'Gadin', 'Reyes', 'johnandrewreyes3@gmail.com', 'kwxFsrhq', 1, 1),
('KLD-24-0022', 'John Andrew', 'Gadin', 'Reyes', 'johnandrewreyes3@gmail.com', 'iqChiKAN', 2, 1),
('KLD-24-0023', 'Raimondo', '', 'Cassy', 'tcassy0@cargocollective.com', '123', 1, 1),
('KLD-24-0024', 'Bronnie', '', 'Daud', 'fdaud1@friendfeed.com', '123', 1, 1),
('KLD-24-0025', 'Anton', '', 'Tomson', 'htomson2@ed.gov', '123', 1, 1),
('KLD-24-0026', 'Jeffie', '', 'Le febre', 'glefebre3@yale.edu', '123', 1, 1),
('KLD-24-0027', 'Bell', '', 'Orrocks', 'horrocks4@cyberchimps.com', '123', 1, 1),
('KLD-24-0028', 'Blinny', 'Cynthy', 'Lunny', 'clunny5@utexas.edu', '123', 1, 1),
('KLD-24-0029', 'Avrit', 'Charlena', 'Pedrocchi', 'cpedrocchi6@columbia.edu', '123', 1, 1),
('KLD-24-0030', 'Sharity', 'Karee', 'Dyball', 'kdyball7@mit.edu', '123', 1, 1),
('KLD-24-0031', 'Ferdy', 'Sonya', 'Grahame', 'sgrahame8@hibu.com', '123', 1, 1),
('KLD-24-0032', 'Shela', '', 'Clipson', 'iclipson9@jimbo.com', '123', 1, 1),
('KLD-24-0033', 'Conrade', 'Buddy', 'Kubanek', 'bkubanek0@umich.edu', '123', 1, 1),
('KLD-24-0034', 'Freddy', '', 'Sweetlove', 'hsweetlove1@yahoo.com', '123', 1, 1),
('KLD-24-0035', 'Hillie', 'Frances', 'Veillard', 'fveillard2@twitpic.com', '123', 1, 1),
('KLD-24-0036', 'Tiphany', 'Torey', 'Storks', 'tstorks3@bbb.org', '123', 1, 1),
('KLD-24-0037', 'Harlan', 'Pearl', 'Eley', 'peley4@bloglovin.com', '123', 1, 1),
('KLD-24-0038', 'Ashly', '', 'Langeren', 'mlangeren5@ehow.com', '123', 1, 1);

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
(0, 'Admin'),
(1, 'Teacher'),
(2, 'Program Chair'),
(3, 'Dean'),
(4, 'Registrar');

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
('BSIS101', 'KLD-24-0001', 1),
('BSIS102', 'KLD-24-0001', 1),
('BSIS103', 'KLD-24-0001', 1),
('BSIS104', 'KLD-24-0001', 1),
('BSIS105', 'KLD-24-0001', 1),
('BSIS201', 'KLD-24-0001', 2),
('BSIS202', 'KLD-24-0001', 2),
('BSIS203', 'KLD-24-0001', 2),
('BSIS204', 'KLD-24-0001', 2),
('BSIS205', 'KLD-24-0001', 2),
('BSIS301', 'KLD-24-0001', 3),
('BSIS302', 'KLD-24-0001', 3),
('BSIS303', 'KLD-24-0001', 3),
('BSIS304', 'KLD-24-0001', 3),
('BSIS305', 'KLD-24-0001', 3),
('BSIS401', 'KLD-24-0001', 4),
('BSIS402', 'KLD-24-0001', 4),
('BSIS403', 'KLD-24-0001', 4),
('BSIS404', 'KLD-24-0001', 4),
('BSIS405', 'KLD-24-0001', 4),
('sct2', 'KLD-23-000001', 2);

-- --------------------------------------------------------

--
-- Table structure for table `specialization`
--

CREATE TABLE `specialization` (
  `specializationID` int(11) NOT NULL,
  `facultyID` varchar(20) NOT NULL,
  `courseCode` varchar(10) NOT NULL
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
  `studentStatus` int(11) NOT NULL,
  `studentSect` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentID`, `studentFName`, `studentMName`, `studentLName`, `studentEmail`, `studentPass`, `studentStatus`, `studentSect`) VALUES
('KLD-24-000001', 'John Andrew', 'Gadin', 'Reyes', 'johnandrewreyes3@gmail.com', 'v1lSbSON', 3, 'BSIS201'),
('KLD-24-000002', 'John Andrew', 'Gadin', 'Reyes', 'johnandrewreyes3@gmail.com', 'wK4GR8f2', 1, 'BSIS201'),
('KLD-24-000003', 'John Andrew', 'Gadin', 'Reyes', 'johnandrewreyes3@gmail.com', 'fhMOnc30', 1, 'BSIS201'),
('KLD-24-000004', 'John Andrew', 'Gadin', 'Reyes', 'johnandrewreyes3@gmail.com', '5an5PyIa', 1, 'BSIS102'),
('KLD-24-000005', 'John Andrew', 'Gadin', 'Reyes', 'johnandrewreyes3@gmail.com', '41ucwPQB', 1, 'BSIS101');

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
(0, 'admin'),
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
-- Indexes for table `specialization`
--
ALTER TABLE `specialization`
  ADD PRIMARY KEY (`specializationID`);

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
  MODIFY `facultyTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `gradeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `specialization`
--
ALTER TABLE `specialization`
  MODIFY `specializationID` int(11) NOT NULL AUTO_INCREMENT;

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
