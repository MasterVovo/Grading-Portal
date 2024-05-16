-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2024 at 03:39 PM
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
-- Database: `grading_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `approval`
--

CREATE TABLE `approval` (
  `approvalID` int(11) NOT NULL,
  `midtermApprovedByChair` tinyint(1) DEFAULT NULL,
  `midtermApprovedByDean` tinyint(1) DEFAULT NULL,
  `midtermApprovedByRegistrar` tinyint(1) DEFAULT NULL,
  `finalApprovedByChair` tinyint(1) DEFAULT NULL,
  `finalApprovedByDean` tinyint(1) DEFAULT NULL,
  `finalApprovedByRegistrar` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `approval`
--

INSERT INTO `approval` (`approvalID`, `midtermApprovedByChair`, `midtermApprovedByDean`, `midtermApprovedByRegistrar`, `finalApprovedByChair`, `finalApprovedByDean`, `finalApprovedByRegistrar`) VALUES
(1, 1, 1, 1, 1, 1, 1),
(2, 1, 1, 1, 1, 1, 1),
(3, 1, 1, 1, 1, 1, 1),
(4, 1, 1, 1, 1, 1, 1),
(5, 1, 1, 1, 1, 1, 1),
(6, 1, 1, 1, 1, 1, 1),
(7, 1, 1, 1, 1, 1, 1),
(8, 1, 1, 1, 1, 1, 1),
(9, 1, 1, 1, 1, 1, 1),
(10, 1, 1, 1, 1, 1, 1),
(11, 1, 1, 1, 1, 1, 1),
(12, 1, 1, 1, 1, 1, 1),
(13, 1, 1, 1, 1, 1, 1),
(14, 1, 1, 1, 1, 1, 1),
(15, 1, 1, 1, 1, 1, 1),
(16, 1, 1, 1, 1, 1, 1),
(17, 1, 1, 1, 1, 1, 1),
(18, 1, 1, 1, 1, 1, 1),
(19, 1, 1, 1, 1, 1, 1);

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
(6, 'KLD-24-0038', 'BSIS101', 'CCIS1101'),
(7, 'KLD-24-0037', 'BSIS101', 'CCIS1101L'),
(8, 'KLD-24-0001', 'BSIS101', 'CCIS1203L'),
(9, 'KLD-24-0001', 'BSIS101', 'CCIS1203'),
(10, 'KLD-24-0004', 'BSIS201', 'GEE5000'),
(11, 'KLD-24-0038', 'BSIS101', 'GEC5000'),
(12, 'KLD-24-0038', 'BSIS101', 'GEC1000'),
(13, 'KLD-24-0038', 'BSIS101', 'GEC3000'),
(14, 'KLD-24-0037', 'BSIS201', 'CCIS2205L'),
(15, 'KLD-24-0037', 'BSIS201', 'PCIS2205'),
(16, 'KLD-24-0037', 'BSIS201', 'GEC2000'),
(17, 'KLD-24-0036', 'BSIS301', 'ISCP3201'),
(18, 'KLD-24-0036', 'BSIS301', 'PCIS3213'),
(19, 'KLD-24-0036', 'BSIS301', 'PCIS3212'),
(20, 'KLD-24-0038', 'BSIS102', 'CCIS1203'),
(21, 'KLD-24-0038', 'BSIS102', 'CCIS1203L'),
(22, 'KLD-24-0038', 'BSIS102', 'GEC3000'),
(23, 'KLD-24-0038', 'BSIS103', 'CCIS1203'),
(24, 'KLD-24-0038', 'BSIS103', 'CCIS1203L'),
(25, 'KLD-24-0038', 'BSIS103', 'GEC1000'),
(26, 'KLD-24-0038', 'BSIS104', 'CCIS1203'),
(27, 'KLD-24-0038', 'BSIS104', 'CCIS1203L'),
(28, 'KLD-24-0038', 'BSIS104', 'GEC1000'),
(29, 'KLD-24-0038', 'BSIS105', 'CCIS1203L'),
(30, 'KLD-24-0038', 'BSIS105', 'GEC3000'),
(31, 'KLD-24-0038', 'BSIS105', 'CCIS1203'),
(32, 'KLD-24-0037', 'BSIS202', 'GEC2000'),
(33, 'KLD-24-0037', 'BSIS202', 'CCIS2205'),
(34, 'KLD-24-0037', 'BSIS202', 'CCIS2205L'),
(35, 'KLD-24-0037', 'BSIS203', 'CCIS2205L'),
(36, 'KLD-24-0037', 'BSIS203', 'CCIS2205'),
(37, 'KLD-24-0037', 'BSIS203', 'GEC2000'),
(38, 'KLD-24-0038', 'BSIS204', 'CCIS2205'),
(39, 'KLD-24-0037', 'BSIS204', 'CCIS2205L'),
(40, 'KLD-24-0037', 'BSIS204', 'GEC2000'),
(41, 'KLD-24-0037', 'BSIS205', 'CCIS2205'),
(42, 'KLD-24-0037', 'BSIS205', 'GEC9100'),
(43, 'KLD-24-0037', 'BSIS205', 'CCIS2205L'),
(44, 'KLD-24-0036', 'BSIS302', 'ISCP3201'),
(45, 'KLD-24-0036', 'BSIS302', 'PCIS3212'),
(46, 'KLD-24-0036', 'BSIS302', 'PCIS3213'),
(47, 'KLD-24-0036', 'BSIS303', 'PCIS3212'),
(48, 'KLD-24-0036', 'BSIS303', 'ISCP3201'),
(49, 'KLD-24-0036', 'BSIS303', 'PCIS3213'),
(50, 'KLD-24-0036', 'BSIS304', 'ISCP3201'),
(51, 'KLD-24-0036', 'BSIS304', 'PCIS3213'),
(52, 'KLD-24-0036', 'BSIS304', 'PCIS3212'),
(53, 'KLD-24-0036', 'BSIS305', 'ISCP3201'),
(54, 'KLD-24-0036', 'BSIS305', 'PCIS3212'),
(55, 'KLD-24-0036', 'BSIS305', 'PCIS3215');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `courseCode` varchar(10) NOT NULL,
  `courseName` varchar(100) NOT NULL,
  `courseYear` int(11) NOT NULL,
  `courseSem` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseCode`, `courseName`, `courseYear`, `courseSem`) VALUES
('CCIS1101', 'Intoduction to Computing Lec', 1, 1),
('CCIS1101L', 'Intoduction to Computing Lab', 1, 1),
('CCIS1102', 'Computer Programming 1 Lec', 1, 1),
('CCIS1102L', 'Computer Programming 1 Lab', 1, 1),
('CCIS1203', 'Computer Programming 2 Lec', 1, 2),
('CCIS1203L', 'Computer Programming 2 Lab', 1, 2),
('CCIS2104', 'Data Structures and Algorithm Lec', 2, 1),
('CCIS2104L', 'Data Structures and Algorithm Lab', 2, 1),
('CCIS2205', 'Information Management Lec', 2, 2),
('CCIS2205L', 'Information Management Lab', 2, 2),
('CCIS3106', 'Application Development and Emerging Tech Lec', 3, 1),
('CCIS3106L', 'Application Development and Emerging Tech Lab', 3, 1),
('GEC1000', 'Understanding the Self', 1, 2),
('GEC1100', 'Technical Writing', 2, 1),
('GEC2000', 'Ethics', 2, 2),
('GEC3000', 'Art Appreciation', 1, 2),
('GEC4000', 'Purposive Communication', 1, 1),
('GEC5000', 'Mathematics in the Modern World', 1, 2),
('GEC6000', 'The Contemporary World', 4, 1),
('GEC7000', 'Mga Babasahin Hinggil sa Kasaysayan ng Pilipinas', 2, 1),
('GEC8000', 'Science, Technology, and Society', 1, 1),
('GEC9100', 'Filipino 1', 2, 2),
('GEE1000', 'Living in the IT Era', 1, 1),
('GEE5000', 'People, Earth and Ecosystem', 2, 2),
('GEE5100', 'People, Earth and Ecosystem', 4, 1),
('ISCP3201', 'IS Capstone Project 1', 3, 2),
('ISCP4102', 'IS Capstone Project 2', 4, 1),
('ISMAT1200', 'Math Analysis', 2, 1),
('NSTP1101', 'National Training Service Program 1', 1, 1),
('NSTP1202', 'National Training Service Program 2', 1, 2),
('PCIS1101', 'Fundamentals of Information Systems', 1, 1),
('PCIS1102', 'Fundamentals of Database System', 1, 2),
('PCIS1102L', 'Fundamentals of Database System Lab', 1, 2),
('PCIS2103', 'Professional Issues in Information System', 2, 1),
('PCIS2104', 'IT Infrastructure and Network Technologies Lec', 2, 1),
('PCIS2104L', 'IT Infrastructure and Network Technologies Lab', 2, 1),
('PCIS2118', 'Web Development Lec', 2, 1),
('PCIS2118L', 'Web Development Lab', 2, 1),
('PCIS2205', 'System Analysis and Design', 2, 2),
('PCIS2206', 'Business Process Design and Management', 2, 2),
('PCIS2209', 'Organization and Management Concepts', 2, 2),
('PCIS2219', 'Business Law', 2, 2),
('PCIS3107', 'Enterprise Architecture', 3, 1),
('PCIS3108', 'IS Strategy, Management and Acquisition', 3, 1),
('PCIS3110', 'Financial Management', 3, 1),
('PCIS3111', 'Project Management Lec', 3, 1),
('PCIS3111L', 'Project Management Lab', 3, 1),
('PCIS3120', 'E-Commerce Mobile Application and Internet Marketing Lec', 3, 1),
('PCIS3120L', 'E-Commerce Mobile Application and Internet Marketing Lab', 3, 1),
('PCIS3121', 'Human Computer Interaction Lec', 3, 1),
('PCIS3121L', 'Human Computer Interaction Lab', 3, 1),
('PCIS3212', 'Evaluation of Business Performance', 3, 2),
('PCIS3213', 'Quantitative Methods', 3, 2),
('PCIS3214', 'Mobile Application Development Lec', 3, 2),
('PCIS3214L', 'Mobile Application Development Lab', 3, 2),
('PCIS3215', 'Internet of Things Lec', 3, 2),
('PCIS3215L', 'Internet of Things Lab', 3, 2),
('PCIS3216', 'Information System Assurance', 3, 2),
('PCIS3222', 'IS Technopreneurship', 3, 2),
('PCIS4117', 'Information Security', 4, 1),
('PCIS4123', 'Good Governance and Social Responsibility', 4, 1),
('PE1101', 'PATHFIT 1', 1, 1),
('PE1202', 'PATHFIT 2', 1, 2),
('PE2103', 'PATHFIT 3', 2, 1),
('PE2204', 'PATHFIT 4', 2, 2),
('RZL1000', 'Kursong Rizal', 1, 2);

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
  `gradeMidterm` decimal(4,2) DEFAULT NULL,
  `gradeFinal` decimal(4,2) DEFAULT NULL,
  `gradeSemestral` decimal(4,2) DEFAULT NULL,
  `gradeFeedback` text NOT NULL,
  `gradeApproved` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`gradeID`, `studentID`, `teacherID`, `courseCode`, `gradeMidterm`, `gradeFinal`, `gradeSemestral`, `gradeFeedback`, `gradeApproved`) VALUES
(1, 'KLD-24-000096', 'KLD-24-0038', 'CCIS1101', 4.50, 3.00, NULL, '', 1),
(2, 'KLD-24-000097', 'KLD-24-0038', 'CCIS1101', 3.25, 3.75, NULL, '', 1),
(3, 'KLD-24-000098', 'KLD-24-0038', 'CCIS1101', 3.00, 4.75, NULL, '', 1),
(4, 'KLD-24-000099', 'KLD-24-0038', 'CCIS1101', 2.50, 2.75, NULL, '', 1),
(5, 'KLD-24-000100', 'KLD-24-0038', 'CCIS1101', 3.75, 3.25, NULL, '', 1),
(6, 'KLD-24-000101', 'KLD-24-0038', 'CCIS1101', 4.25, 3.50, NULL, '', 1),
(7, 'KLD-24-000066', 'KLD-24-0038', 'CCIS1101', 4.25, 4.75, NULL, '', 2),
(8, 'KLD-24-000067', 'KLD-24-0038', 'CCIS1101', 3.00, 2.25, NULL, '', 2),
(9, 'KLD-24-000068', 'KLD-24-0038', 'CCIS1101', 5.00, 3.25, NULL, '', 2),
(10, 'KLD-24-000069', 'KLD-24-0038', 'CCIS1101', 2.25, 4.50, NULL, '', 2),
(11, 'KLD-24-000070', 'KLD-24-0038', 'CCIS1101', 4.00, 1.50, NULL, '', 2),
(12, 'KLD-24-000071', 'KLD-24-0038', 'CCIS1101', 4.50, 1.75, NULL, '', 2),
(13, 'KLD-24-000036', 'KLD-24-0038', 'CCIS1101', 1.00, 3.00, NULL, '', 3),
(14, 'KLD-24-000037', 'KLD-24-0038', 'CCIS1101', 1.75, 2.00, NULL, '', 3),
(15, 'KLD-24-000038', 'KLD-24-0038', 'CCIS1101', 4.00, 3.25, NULL, '', 3),
(16, 'KLD-24-000039', 'KLD-24-0038', 'CCIS1101', 3.00, 4.75, NULL, '', 3),
(17, 'KLD-24-000040', 'KLD-24-0038', 'CCIS1101', 2.00, 4.25, NULL, '', 3),
(18, 'KLD-24-000041', 'KLD-24-0038', 'CCIS1101', 1.75, 3.75, NULL, '', 3),
(19, 'KLD-24-000006', 'KLD-24-0038', 'CCIS1101', 1.25, 4.00, NULL, '', 4),
(20, 'KLD-24-000007', 'KLD-24-0038', 'CCIS1101', 4.25, 3.00, NULL, '', 4),
(21, 'KLD-24-000008', 'KLD-24-0038', 'CCIS1101', 3.25, 3.50, NULL, '', 4),
(22, 'KLD-24-000009', 'KLD-24-0038', 'CCIS1101', 1.50, 1.50, NULL, '', 4),
(23, 'KLD-24-000010', 'KLD-24-0038', 'CCIS1101', 3.00, 1.00, NULL, '', 4),
(24, 'KLD-24-000011', 'KLD-24-0038', 'CCIS1101', 5.00, 4.75, NULL, '', 4),
(25, 'KLD-24-000096', 'KLD-24-0038', 'CCIS1203', 4.50, 2.00, NULL, '', 5),
(26, 'KLD-24-000097', 'KLD-24-0038', 'CCIS1203', 4.50, 2.50, NULL, '', 5),
(27, 'KLD-24-000098', 'KLD-24-0038', 'CCIS1203', 4.75, 1.75, NULL, '', 5),
(28, 'KLD-24-000099', 'KLD-24-0038', 'CCIS1203', 4.75, 3.00, NULL, '', 5),
(29, 'KLD-24-000100', 'KLD-24-0038', 'CCIS1203', 1.25, 4.50, NULL, '', 5),
(30, 'KLD-24-000101', 'KLD-24-0038', 'CCIS1203', 4.25, 4.75, NULL, '', 5),
(31, 'KLD-24-000066', 'KLD-24-0038', 'CCIS1203', 3.25, 2.00, NULL, '', 6),
(32, 'KLD-24-000067', 'KLD-24-0038', 'CCIS1203', 4.50, 3.50, NULL, '', 6),
(33, 'KLD-24-000068', 'KLD-24-0038', 'CCIS1203', 3.00, 1.50, NULL, '', 6),
(34, 'KLD-24-000069', 'KLD-24-0038', 'CCIS1203', 4.50, 3.25, NULL, '', 6),
(35, 'KLD-24-000070', 'KLD-24-0038', 'CCIS1203', 4.00, 3.50, NULL, '', 6),
(36, 'KLD-24-000071', 'KLD-24-0038', 'CCIS1203', 2.50, 1.75, NULL, '', 6),
(37, 'KLD-24-000036', 'KLD-24-0038', 'CCIS1203', 3.50, 5.00, NULL, '', 7),
(38, 'KLD-24-000037', 'KLD-24-0038', 'CCIS1203', 3.50, 3.25, NULL, '', 7),
(39, 'KLD-24-000038', 'KLD-24-0038', 'CCIS1203', 1.50, 2.00, NULL, '', 7),
(40, 'KLD-24-000039', 'KLD-24-0038', 'CCIS1203', 4.50, 3.50, NULL, '', 7),
(41, 'KLD-24-000040', 'KLD-24-0038', 'CCIS1203', 1.25, 3.25, NULL, '', 7),
(42, 'KLD-24-000041', 'KLD-24-0038', 'CCIS1203', 3.00, 3.50, NULL, '', 7),
(43, 'KLD-24-000006', 'KLD-24-0038', 'CCIS1203', 4.00, 3.00, NULL, '', 8),
(44, 'KLD-24-000007', 'KLD-24-0038', 'CCIS1203', 1.75, 1.75, NULL, '', 8),
(45, 'KLD-24-000008', 'KLD-24-0038', 'CCIS1203', 2.25, 2.25, NULL, '', 8),
(46, 'KLD-24-000009', 'KLD-24-0038', 'CCIS1203', 3.75, 3.25, NULL, '', 8),
(47, 'KLD-24-000010', 'KLD-24-0038', 'CCIS1203', 4.25, 2.25, NULL, '', 8),
(48, 'KLD-24-000011', 'KLD-24-0038', 'CCIS1203', 2.00, 1.75, NULL, '', 8),
(49, 'KLD-24-000096', 'KLD-24-0037', 'CCIS2104', 3.75, 1.50, NULL, '', 9),
(50, 'KLD-24-000097', 'KLD-24-0037', 'CCIS2104', 1.00, 4.75, NULL, '', 9),
(51, 'KLD-24-000098', 'KLD-24-0037', 'CCIS2104', 4.75, 3.25, NULL, '', 9),
(52, 'KLD-24-000099', 'KLD-24-0037', 'CCIS2104', 4.25, 1.50, NULL, '', 9),
(53, 'KLD-24-000100', 'KLD-24-0037', 'CCIS2104', 3.75, 2.75, NULL, '', 9),
(54, 'KLD-24-000101', 'KLD-24-0037', 'CCIS2104', 3.75, 4.00, NULL, '', 9),
(55, 'KLD-24-000066', 'KLD-24-0037', 'CCIS2104', 2.50, 5.00, NULL, '', 10),
(56, 'KLD-24-000067', 'KLD-24-0037', 'CCIS2104', 1.75, 3.25, NULL, '', 10),
(57, 'KLD-24-000068', 'KLD-24-0037', 'CCIS2104', 4.00, 2.75, NULL, '', 10),
(58, 'KLD-24-000069', 'KLD-24-0037', 'CCIS2104', 2.25, 4.25, NULL, '', 10),
(59, 'KLD-24-000070', 'KLD-24-0037', 'CCIS2104', 4.00, 2.00, NULL, '', 10),
(60, 'KLD-24-000071', 'KLD-24-0037', 'CCIS2104', 2.75, 2.00, NULL, '', 10),
(61, 'KLD-24-000036', 'KLD-24-0037', 'CCIS2104', 2.00, 1.00, NULL, '', 11),
(62, 'KLD-24-000037', 'KLD-24-0037', 'CCIS2104', 4.00, 2.25, NULL, '', 11),
(63, 'KLD-24-000038', 'KLD-24-0037', 'CCIS2104', 2.75, 4.75, NULL, '', 11),
(64, 'KLD-24-000039', 'KLD-24-0037', 'CCIS2104', 1.00, 2.75, NULL, '', 11),
(65, 'KLD-24-000040', 'KLD-24-0037', 'CCIS2104', 4.25, 4.75, NULL, '', 11),
(66, 'KLD-24-000041', 'KLD-24-0037', 'CCIS2104', 1.75, 1.75, NULL, '', 11),
(67, 'KLD-24-000096', 'KLD-24-0037', 'CCIS2205', 3.25, 2.50, NULL, '', 12),
(68, 'KLD-24-000097', 'KLD-24-0037', 'CCIS2205', 1.75, 3.00, NULL, '', 12),
(69, 'KLD-24-000098', 'KLD-24-0037', 'CCIS2205', 2.00, 2.75, NULL, '', 12),
(70, 'KLD-24-000099', 'KLD-24-0037', 'CCIS2205', 2.75, 2.75, NULL, '', 12),
(71, 'KLD-24-000100', 'KLD-24-0037', 'CCIS2205', 4.25, 2.25, NULL, '', 12),
(72, 'KLD-24-000101', 'KLD-24-0037', 'CCIS2205', 1.75, 1.25, NULL, '', 12),
(73, 'KLD-24-000066', 'KLD-24-0037', 'CCIS2205', 2.00, 4.75, NULL, '', 13),
(74, 'KLD-24-000067', 'KLD-24-0037', 'CCIS2205', 4.50, 3.75, NULL, '', 13),
(75, 'KLD-24-000068', 'KLD-24-0037', 'CCIS2205', 1.75, 3.25, NULL, '', 13),
(76, 'KLD-24-000069', 'KLD-24-0037', 'CCIS2205', 2.00, 4.50, NULL, '', 13),
(77, 'KLD-24-000070', 'KLD-24-0037', 'CCIS2205', 3.00, 4.75, NULL, '', 13),
(78, 'KLD-24-000071', 'KLD-24-0037', 'CCIS2205', 3.25, 5.00, NULL, '', 13),
(79, 'KLD-24-000036', 'KLD-24-0037', 'CCIS2205', 1.50, 2.50, NULL, '', 14),
(80, 'KLD-24-000037', 'KLD-24-0037', 'CCIS2205', 1.25, 2.25, NULL, '', 14),
(81, 'KLD-24-000038', 'KLD-24-0037', 'CCIS2205', 1.75, 1.25, NULL, '', 14),
(82, 'KLD-24-000039', 'KLD-24-0037', 'CCIS2205', 1.00, 1.25, NULL, '', 14),
(83, 'KLD-24-000040', 'KLD-24-0037', 'CCIS2205', 3.50, 1.00, NULL, '', 14),
(84, 'KLD-24-000041', 'KLD-24-0037', 'CCIS2205', 4.75, 1.50, NULL, '', 14),
(85, 'KLD-24-000096', 'KLD-24-0036', 'CCIS3106', 1.25, 4.50, NULL, '', 15),
(86, 'KLD-24-000097', 'KLD-24-0036', 'CCIS3106', 1.25, 5.00, NULL, '', 15),
(87, 'KLD-24-000098', 'KLD-24-0036', 'CCIS3106', 4.00, 1.75, NULL, '', 15),
(88, 'KLD-24-000099', 'KLD-24-0036', 'CCIS3106', 2.25, 4.75, NULL, '', 15),
(89, 'KLD-24-000100', 'KLD-24-0036', 'CCIS3106', 2.00, 2.25, NULL, '', 15),
(90, 'KLD-24-000101', 'KLD-24-0036', 'CCIS3106', 3.25, 3.25, NULL, '', 15),
(91, 'KLD-24-000066', 'KLD-24-0036', 'CCIS3106', 4.00, 3.50, NULL, '', 16),
(92, 'KLD-24-000067', 'KLD-24-0036', 'CCIS3106', 3.50, 1.75, NULL, '', 16),
(93, 'KLD-24-000068', 'KLD-24-0036', 'CCIS3106', 1.50, 3.50, NULL, '', 16),
(94, 'KLD-24-000069', 'KLD-24-0036', 'CCIS3106', 5.00, 5.00, NULL, '', 16),
(95, 'KLD-24-000070', 'KLD-24-0036', 'CCIS3106', 2.25, 3.25, NULL, '', 16),
(96, 'KLD-24-000071', 'KLD-24-0036', 'CCIS3106', 3.00, 3.75, NULL, '', 16),
(97, 'KLD-24-000096', 'KLD-24-0036', 'ISCP3201', 5.00, 1.25, NULL, '', 17),
(98, 'KLD-24-000097', 'KLD-24-0036', 'ISCP3201', 1.75, 1.25, NULL, '', 17),
(99, 'KLD-24-000098', 'KLD-24-0036', 'ISCP3201', 1.25, 4.50, NULL, '', 17),
(100, 'KLD-24-000099', 'KLD-24-0036', 'ISCP3201', 1.25, 5.00, NULL, '', 17),
(101, 'KLD-24-000100', 'KLD-24-0036', 'ISCP3201', 2.25, 3.50, NULL, '', 17),
(102, 'KLD-24-000101', 'KLD-24-0036', 'ISCP3201', 1.00, 4.00, NULL, '', 17),
(103, 'KLD-24-000066', 'KLD-24-0036', 'ISCP3201', 3.50, 1.00, NULL, '', 18),
(104, 'KLD-24-000067', 'KLD-24-0036', 'ISCP3201', 2.25, 1.00, NULL, '', 18),
(105, 'KLD-24-000068', 'KLD-24-0036', 'ISCP3201', 1.00, 2.75, NULL, '', 18),
(106, 'KLD-24-000069', 'KLD-24-0036', 'ISCP3201', 1.00, 1.75, NULL, '', 18),
(107, 'KLD-24-000070', 'KLD-24-0036', 'ISCP3201', 3.00, 3.00, NULL, '', 18),
(108, 'KLD-24-000071', 'KLD-24-0036', 'ISCP3201', 3.25, 1.25, NULL, '', 18),
(109, 'KLD-24-000096', 'KLD-24-0035', 'ISCP4102', 2.00, 3.50, NULL, '', 19),
(110, 'KLD-24-000097', 'KLD-24-0035', 'ISCP4102', 1.25, 2.75, NULL, '', 19),
(111, 'KLD-24-000098', 'KLD-24-0035', 'ISCP4102', 4.75, 1.00, NULL, '', 19),
(112, 'KLD-24-000099', 'KLD-24-0035', 'ISCP4102', 2.75, 4.75, NULL, '', 19),
(113, 'KLD-24-000100', 'KLD-24-0035', 'ISCP4102', 3.75, 1.75, NULL, '', 19),
(114, 'KLD-24-000101', 'KLD-24-0035', 'ISCP4102', 4.25, 1.75, NULL, '', 19);

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
('BSIS405', 'KLD-24-0001', 4);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `semesterID` int(11) NOT NULL,
  `semesterName` varchar(16) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semesterID`, `semesterName`, `startDate`, `endDate`) VALUES
(1, 'First Semester', '2024-06-01', '2024-12-31'),
(2, 'Second Semester', '2024-01-01', '2024-05-31');

-- --------------------------------------------------------

--
-- Table structure for table `specialization`
--

CREATE TABLE `specialization` (
  `specializationID` int(11) NOT NULL,
  `facultyID` varchar(20) NOT NULL,
  `courseCode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `specialization`
--

INSERT INTO `specialization` (`specializationID`, `facultyID`, `courseCode`) VALUES
(1, 'KLD-24-0038', 'CCIS1101'),
(2, 'KLD-24-0037', 'CCIS1101L'),
(3, 'KLD-24-0036', 'CCIS1102'),
(4, 'KLD-24-0035', 'CCIS1102L'),
(5, 'KLD-24-0038', 'CCIS1101L'),
(6, 'KLD-24-0038', 'CCIS2104L'),
(7, 'KLD-24-0038', 'CCIS2205'),
(8, 'KLD-24-0001', 'CCIS1203'),
(9, 'KLD-24-0001', 'CCIS1203L'),
(10, 'KLD-24-0004', 'GEE5000'),
(11, 'KLD-24-0004', 'GEE5100'),
(12, 'KLD-24-0035', 'GEC1100'),
(13, 'KLD-24-0030', 'CCIS2104L'),
(14, 'KLD-23-0006', 'GEE1000'),
(15, 'KLD-24-0029', 'GEC5000'),
(16, 'KLD-24-0031', 'CCIS2205L'),
(17, 'KLD-23-0006', 'CCIS2104'),
(18, 'KLD-24-0035', 'PCIS4117'),
(19, 'KLD-24-0035', 'PCIS4123'),
(20, 'KLD-24-0035', 'GEC6000'),
(21, 'KLD-24-0035', 'GEE5100'),
(22, 'KLD-24-0035', 'ISCP4102'),
(23, 'KLD-24-0036', 'PCIS3213'),
(24, 'KLD-24-0036', 'PCIS3214'),
(25, 'KLD-24-0036', 'PCIS3214L'),
(26, 'KLD-24-0036', 'PCIS3215'),
(27, 'KLD-24-0036', 'PCIS3215L'),
(28, 'KLD-24-0036', 'PCIS3216'),
(29, 'KLD-24-0036', 'PCIS3222'),
(30, 'KLD-24-0036', 'CCIS3106'),
(31, 'KLD-24-0036', 'CCIS3106L'),
(32, 'KLD-24-0036', 'PCIS3212'),
(33, 'KLD-24-0036', 'PCIS3121'),
(34, 'KLD-24-0036', 'PCIS3121L'),
(35, 'KLD-24-0036', 'CCIS3106L'),
(36, 'KLD-24-0036', 'ISCP3201'),
(37, 'KLD-24-0036', 'PCIS3107'),
(38, 'KLD-24-0036', 'PCIS3108'),
(39, 'KLD-24-0036', 'PCIS3110'),
(40, 'KLD-24-0036', 'PCIS3111'),
(41, 'KLD-24-0036', 'PCIS3120L'),
(42, 'KLD-24-0036', 'PCIS3120'),
(43, 'KLD-24-0036', 'PCIS3111L'),
(44, 'KLD-24-0036', 'PCIS3121'),
(45, 'KLD-24-0037', 'PCIS2118L'),
(46, 'KLD-24-0037', 'PCIS2209'),
(47, 'KLD-24-0037', 'PCIS2206'),
(48, 'KLD-24-0037', 'PCIS2103'),
(49, 'KLD-24-0037', 'PCIS2104'),
(50, 'KLD-24-0037', 'PCIS2205'),
(51, 'KLD-24-0037', 'PCIS2104L'),
(52, 'KLD-24-0037', 'PE2103'),
(53, 'KLD-24-0037', 'PCIS2118'),
(54, 'KLD-24-0037', 'PE2204'),
(55, 'KLD-24-0037', 'ISMAT1200'),
(56, 'KLD-24-0037', 'GEC1100'),
(57, 'KLD-24-0037', 'GEC2000'),
(58, 'KLD-24-0037', 'CCIS2205'),
(59, 'KLD-24-0037', 'CCIS2205L'),
(60, 'KLD-24-0037', 'GEC7000'),
(61, 'KLD-24-0037', 'GEC9100'),
(62, 'KLD-24-0037', 'GEE5000'),
(63, 'KLD-24-0037', 'CCIS2104L'),
(64, 'KLD-24-0037', 'PCIS2219'),
(65, 'KLD-24-0037', 'CCIS2104'),
(66, 'KLD-24-0038', 'GEC1000'),
(67, 'KLD-24-0038', 'GEC3000'),
(68, 'KLD-24-0038', 'GEC5000'),
(69, 'KLD-24-0038', 'GEC8000'),
(70, 'KLD-24-0038', 'GEE1000'),
(71, 'KLD-24-0038', 'PCIS1102L'),
(72, 'KLD-24-0038', 'PCIS1102'),
(73, 'KLD-24-0038', 'PCIS1101'),
(74, 'KLD-24-0038', 'NSTP1101'),
(75, 'KLD-24-0038', 'RZL1000'),
(76, 'KLD-24-0038', 'PE1101'),
(77, 'KLD-24-0038', 'CCIS1102'),
(78, 'KLD-24-0038', 'CCIS1102L'),
(79, 'KLD-24-0038', 'CCIS1203'),
(80, 'KLD-24-0038', 'CCIS1203L'),
(81, 'KLD-24-0038', 'NSTP1202'),
(82, 'KLD-24-0038', 'PE1202'),
(83, 'KLD-24-0038', 'GEC4000');

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
('KLD-24-000004', 'John Andrew', 'Gadin', 'Reyes', 'johnandrewreyes3@gmail.com', '5an5PyIa', 1, 'BSIS102'),
('KLD-24-000006', 'Miniong', '', 'Navarro', 'mnavarro@email.com', '12345', 1, 'BSIS101'),
('KLD-24-000007', 'Roniele', 'Rivera', 'Guingona', 'rrguingona@social.com', '12345', 1, 'BSIS101'),
('KLD-24-000008', 'Mark-Anthony', 'Didal', 'Enciso', 'maenciso@message.com', '12345', 1, 'BSIS101'),
('KLD-24-000009', 'Isylle', 'Santillan', 'Barrientos', 'isylle.barrientos@mit.edu', '12345', 1, 'BSIS101'),
('KLD-24-000010', 'Kyle', 'Coronel', 'Miranda', 'mirandkyle@mail.me', '12345', 1, 'BSIS101'),
('KLD-24-000011', 'Rosalita Diwata', 'Daray', 'Velasco', 'diwatangvelasco@account.org', '12345', 1, 'BSIS101'),
('KLD-24-000012', 'Chito Kidlat', 'Pangilinan', 'Marquez', 'kidlatboy@email.com', '12345', 1, 'BSIS102'),
('KLD-24-000013', 'Anna', 'Labay', 'Ramos', 'anna.ramos@email.com', '12345', 1, 'BSIS102'),
('KLD-24-000014', 'Adrian', 'Ruiz ', 'Beronilla ', 'beronilla.adrian@mail.me', '12345', 1, 'BSIS102'),
('KLD-24-000015', 'Joyce Donnalyn', 'Ramos ', 'Dureza ', 'jdr.dureza@account.org', '12345', 1, 'BSIS102'),
('KLD-24-000016', 'Antolin', 'Delos Santos ', 'Del Rosario ', 'antolin.rosario@official.ph', '12345', 1, 'BSIS102'),
('KLD-24-000017', 'Daylin', 'Didal ', 'Rodriguez ', 'ddrodriguez@mit.edu', '12345', 1, 'BSIS102'),
('KLD-24-000018', 'Francis', '', 'Cortan ', 'fcortan@social.com', '12345', 1, 'BSIS103'),
('KLD-24-000019', 'Isylle', 'Isidto ', 'Binuya ', 'iibinuya123@social.com', '12345', 1, 'BSIS103'),
('KLD-24-000020', 'Awit', 'Cacapit ', 'Madriaga ', 'awitca@message.com', '12345', 1, 'BSIS103'),
('KLD-24-000021', 'Asuncion', 'Labay ', 'Chua ', 'chua.asuncion@mail.me', '12345', 1, 'BSIS103'),
('KLD-24-000022', 'Jonard', 'Villaruel ', 'Magsino ', 'jonardmagsino@account.org', '12345', 1, 'BSIS103'),
('KLD-24-000023', 'Sheccaniah', 'Cortan ', 'Barrientos ', 'scbarrientos@email.com', '12345', 1, 'BSIS103'),
('KLD-24-000024', 'Josh', 'Samson ', 'Delgado ', 'delgado.josh22@social.com', '12345', 1, 'BSIS104'),
('KLD-24-000025', 'Sofia', '', 'Badong ', 'sofia.badong@email.com', '12345', 1, 'BSIS104'),
('KLD-24-000026', 'Chino ', 'Presno ', 'Binuya ', 'chino.preson.binuya@account.org', '12345', 1, 'BSIS104'),
('KLD-24-000027', 'Gelli ', 'Gitamondoc ', 'Lacumba ', 'jellylacumba@social.com', '12345', 1, 'BSIS104'),
('KLD-24-000028', 'John-Marco ', 'Delgado ', 'Auyong ', 'marco.polo@official.ph', '12345', 1, 'BSIS104'),
('KLD-24-000029', 'Aubrey ', 'Bozon ', 'Ramos ', 'aubrey.ramos@mail.me', '12345', 1, 'BSIS104'),
('KLD-24-000030', 'Justin ', 'Co ', 'Valenzuela ', 'valenzuela.co@account.org', '12345', 1, 'BSIS105'),
('KLD-24-000031', 'Sherry-Ann ', 'Lozada ', 'Arroyo ', 'sherryann.lazada@account.org', '12345', 1, 'BSIS105'),
('KLD-24-000032', 'Edgardo José-Mari ', 'Pinlac ', 'Barrientos ', 'josemarichan@social.com', '12345', 1, 'BSIS105'),
('KLD-24-000033', 'Isylle ', 'Magdayao ', 'Delgado ', 'isylle4@email.com', '12345', 1, 'BSIS105'),
('KLD-24-000034', 'Alvaro Ariel ', 'Ruedas ', 'Guirnalda ', 'aarguirnalda@email.com', '12345', 1, 'BSIS105'),
('KLD-24-000035', 'Ana ', 'Amat ', 'Espina', 'ana.amat.espina@email.com', '12345', 1, 'BSIS105'),
('KLD-24-000036', 'Miniong', '', 'Navarro', 'mnavarro@email.com', '12345', 1, 'BSIS201'),
('KLD-24-000037', 'Roniele', 'Rivera', 'Guingona', 'rrguingona@social.com', '12345', 1, 'BSIS201'),
('KLD-24-000038', 'Mark-Anthony', 'Didal', 'Enciso', 'maenciso@message.com', '12345', 1, 'BSIS201'),
('KLD-24-000039', 'Isylle', 'Santillan', 'Barrientos', 'isylle.barrientos@mit.edu', '12345', 1, 'BSIS201'),
('KLD-24-000040', 'Kyle', 'Coronel', 'Miranda', 'mirandkyle@mail.me', '12345', 1, 'BSIS201'),
('KLD-24-000041', 'Rosalita Diwata', 'Daray', 'Velasco', 'diwatangvelasco@account.org', '12345', 1, 'BSIS201'),
('KLD-24-000042', 'Chito Kidlat', 'Pangilinan', 'Marquez', 'kidlatboy@email.com', '12345', 1, 'BSIS202'),
('KLD-24-000043', 'Anna', 'Labay', 'Ramos', 'anna.ramos@email.com', '12345', 1, 'BSIS202'),
('KLD-24-000044', 'Adrian', 'Ruiz ', 'Beronilla ', 'beronilla.adrian@mail.me', '12345', 1, 'BSIS202'),
('KLD-24-000045', 'Joyce Donnalyn', 'Ramos ', 'Dureza ', 'jdr.dureza@account.org', '12345', 1, 'BSIS202'),
('KLD-24-000046', 'Antolin', 'Delos Santos ', 'Del Rosario ', 'antolin.rosario@official.ph', '12345', 1, 'BSIS202'),
('KLD-24-000047', 'Daylin', 'Didal ', 'Rodriguez ', 'ddrodriguez@mit.edu', '12345', 1, 'BSIS202'),
('KLD-24-000048', 'Francis', '', 'Cortan ', 'fcortan@social.com', '12345', 1, 'BSIS203'),
('KLD-24-000049', 'Isylle', 'Isidto ', 'Binuya ', 'iibinuya123@social.com', '12345', 1, 'BSIS203'),
('KLD-24-000050', 'Awit', 'Cacapit ', 'Madriaga ', 'awitca@message.com', '12345', 1, 'BSIS203'),
('KLD-24-000051', 'Asuncion', 'Labay ', 'Chua ', 'chua.asuncion@mail.me', '12345', 1, 'BSIS203'),
('KLD-24-000052', 'Jonard', 'Villaruel ', 'Magsino ', 'jonardmagsino@account.org', '12345', 1, 'BSIS203'),
('KLD-24-000053', 'Sheccaniah', 'Cortan ', 'Barrientos ', 'scbarrientos@email.com', '12345', 1, 'BSIS203'),
('KLD-24-000054', 'Josh', 'Samson ', 'Delgado ', 'delgado.josh22@social.com', '12345', 1, 'BSIS204'),
('KLD-24-000055', 'Sofia', '', 'Badong ', 'sofia.badong@email.com', '12345', 1, 'BSIS204'),
('KLD-24-000056', 'Chino ', 'Presno ', 'Binuya ', 'chino.preson.binuya@account.org', '12345', 1, 'BSIS204'),
('KLD-24-000057', 'Gelli ', 'Gitamondoc ', 'Lacumba ', 'jellylacumba@social.com', '12345', 1, 'BSIS204'),
('KLD-24-000058', 'John-Marco ', 'Delgado ', 'Auyong ', 'marco.polo@official.ph', '12345', 1, 'BSIS204'),
('KLD-24-000059', 'Aubrey ', 'Bozon ', 'Ramos ', 'aubrey.ramos@mail.me', '12345', 1, 'BSIS204'),
('KLD-24-000060', 'Justin ', 'Co ', 'Valenzuela ', 'valenzuela.co@account.org', '12345', 1, 'BSIS205'),
('KLD-24-000061', 'Sherry-Ann ', 'Lozada ', 'Arroyo ', 'sherryann.lazada@account.org', '12345', 1, 'BSIS205'),
('KLD-24-000062', 'Edgardo José-Mari ', 'Pinlac ', 'Barrientos ', 'josemarichan@social.com', '12345', 1, 'BSIS205'),
('KLD-24-000063', 'Isylle ', 'Magdayao ', 'Delgado ', 'isylle4@email.com', '12345', 1, 'BSIS205'),
('KLD-24-000064', 'Alvaro Ariel ', 'Ruedas ', 'Guirnalda ', 'aarguirnalda@email.com', '12345', 1, 'BSIS205'),
('KLD-24-000065', 'Ana ', 'Amat ', 'Espina', 'ana.amat.espina@email.com', '12345', 1, 'BSIS205'),
('KLD-24-000066', 'Miniong', '', 'Navarro', 'mnavarro@email.com', '12345', 1, 'BSIS301'),
('KLD-24-000067', 'Roniele', 'Rivera', 'Guingona', 'rrguingona@social.com', '12345', 1, 'BSIS301'),
('KLD-24-000068', 'Mark-Anthony', 'Didal', 'Enciso', 'maenciso@message.com', '12345', 1, 'BSIS301'),
('KLD-24-000069', 'Isylle', 'Santillan', 'Barrientos', 'isylle.barrientos@mit.edu', '12345', 1, 'BSIS301'),
('KLD-24-000070', 'Kyle', 'Coronel', 'Miranda', 'mirandkyle@mail.me', '12345', 1, 'BSIS301'),
('KLD-24-000071', 'Rosalita Diwata', 'Daray', 'Velasco', 'diwatangvelasco@account.org', '12345', 1, 'BSIS301'),
('KLD-24-000072', 'Chito Kidlat', 'Pangilinan', 'Marquez', 'kidlatboy@email.com', '12345', 1, 'BSIS302'),
('KLD-24-000073', 'Anna', 'Labay', 'Ramos', 'anna.ramos@email.com', '12345', 1, 'BSIS302'),
('KLD-24-000074', 'Adrian', 'Ruiz ', 'Beronilla ', 'beronilla.adrian@mail.me', '12345', 1, 'BSIS302'),
('KLD-24-000075', 'Joyce Donnalyn', 'Ramos ', 'Dureza ', 'jdr.dureza@account.org', '12345', 1, 'BSIS302'),
('KLD-24-000076', 'Antolin', 'Delos Santos ', 'Del Rosario ', 'antolin.rosario@official.ph', '12345', 1, 'BSIS302'),
('KLD-24-000077', 'Daylin', 'Didal ', 'Rodriguez ', 'ddrodriguez@mit.edu', '12345', 1, 'BSIS302'),
('KLD-24-000078', 'Francis', '', 'Cortan ', 'fcortan@social.com', '12345', 1, 'BSIS303'),
('KLD-24-000079', 'Isylle', 'Isidto ', 'Binuya ', 'iibinuya123@social.com', '12345', 1, 'BSIS303'),
('KLD-24-000080', 'Awit', 'Cacapit ', 'Madriaga ', 'awitca@message.com', '12345', 1, 'BSIS303'),
('KLD-24-000081', 'Asuncion', 'Labay ', 'Chua ', 'chua.asuncion@mail.me', '12345', 1, 'BSIS303'),
('KLD-24-000082', 'Jonard', 'Villaruel ', 'Magsino ', 'jonardmagsino@account.org', '12345', 1, 'BSIS303'),
('KLD-24-000083', 'Sheccaniah', 'Cortan ', 'Barrientos ', 'scbarrientos@email.com', '12345', 1, 'BSIS303'),
('KLD-24-000084', 'Josh', 'Samson ', 'Delgado ', 'delgado.josh22@social.com', '12345', 1, 'BSIS304'),
('KLD-24-000085', 'Sofia', '', 'Badong ', 'sofia.badong@email.com', '12345', 1, 'BSIS304'),
('KLD-24-000086', 'Chino ', 'Presno ', 'Binuya ', 'chino.preson.binuya@account.org', '12345', 1, 'BSIS304'),
('KLD-24-000087', 'Gelli ', 'Gitamondoc ', 'Lacumba ', 'jellylacumba@social.com', '12345', 1, 'BSIS304'),
('KLD-24-000088', 'John-Marco ', 'Delgado ', 'Auyong ', 'marco.polo@official.ph', '12345', 1, 'BSIS304'),
('KLD-24-000089', 'Aubrey ', 'Bozon ', 'Ramos ', 'aubrey.ramos@mail.me', '12345', 1, 'BSIS304'),
('KLD-24-000090', 'Justin ', 'Co ', 'Valenzuela ', 'valenzuela.co@account.org', '12345', 1, 'BSIS305'),
('KLD-24-000091', 'Sherry-Ann ', 'Lozada ', 'Arroyo ', 'sherryann.lazada@account.org', '12345', 1, 'BSIS305'),
('KLD-24-000092', 'Edgardo José-Mari ', 'Pinlac ', 'Barrientos ', 'josemarichan@social.com', '12345', 1, 'BSIS305'),
('KLD-24-000093', 'Isylle ', 'Magdayao ', 'Delgado ', 'isylle4@email.com', '12345', 1, 'BSIS305'),
('KLD-24-000094', 'Alvaro Ariel ', 'Ruedas ', 'Guirnalda ', 'aarguirnalda@email.com', '12345', 1, 'BSIS305'),
('KLD-24-000095', 'Ana ', 'Amat ', 'Espina', 'ana.amat.espina@email.com', '12345', 1, 'BSIS305'),
('KLD-24-000096', 'Miniong', '', 'Navarro', 'mnavarro@email.com', '12345', 1, 'BSIS401'),
('KLD-24-000097', 'Roniele', 'Rivera', 'Guingona', 'rrguingona@social.com', '12345', 1, 'BSIS401'),
('KLD-24-000098', 'Mark-Anthony', 'Didal', 'Enciso', 'maenciso@message.com', '12345', 1, 'BSIS401'),
('KLD-24-000099', 'Isylle', 'Santillan', 'Barrientos', 'isylle.barrientos@mit.edu', '12345', 1, 'BSIS401'),
('KLD-24-000100', 'Kyle', 'Coronel', 'Miranda', 'mirandkyle@mail.me', '12345', 1, 'BSIS401'),
('KLD-24-000101', 'Rosalita Diwata', 'Daray', 'Velasco', 'diwatangvelasco@account.org', '12345', 1, 'BSIS401'),
('KLD-24-000102', 'Chito Kidlat', 'Pangilinan', 'Marquez', 'kidlatboy@email.com', '12345', 1, 'BSIS402'),
('KLD-24-000103', 'Anna', 'Labay', 'Ramos', 'anna.ramos@email.com', '12345', 1, 'BSIS402'),
('KLD-24-000104', 'Adrian', 'Ruiz ', 'Beronilla ', 'beronilla.adrian@mail.me', '12345', 1, 'BSIS402'),
('KLD-24-000105', 'Joyce Donnalyn', 'Ramos ', 'Dureza ', 'jdr.dureza@account.org', '12345', 1, 'BSIS402'),
('KLD-24-000106', 'Antolin', 'Delos Santos ', 'Del Rosario ', 'antolin.rosario@official.ph', '12345', 1, 'BSIS402'),
('KLD-24-000107', 'Daylin', 'Didal ', 'Rodriguez ', 'ddrodriguez@mit.edu', '12345', 1, 'BSIS402'),
('KLD-24-000108', 'Francis', '', 'Cortan ', 'fcortan@social.com', '12345', 1, 'BSIS403'),
('KLD-24-000109', 'Isylle', 'Isidto ', 'Binuya ', 'iibinuya123@social.com', '12345', 1, 'BSIS403'),
('KLD-24-000110', 'Awit', 'Cacapit ', 'Madriaga ', 'awitca@message.com', '12345', 1, 'BSIS403'),
('KLD-24-000111', 'Asuncion', 'Labay ', 'Chua ', 'chua.asuncion@mail.me', '12345', 1, 'BSIS403'),
('KLD-24-000112', 'Jonard', 'Villaruel ', 'Magsino ', 'jonardmagsino@account.org', '12345', 1, 'BSIS403'),
('KLD-24-000113', 'Sheccaniah', 'Cortan ', 'Barrientos ', 'scbarrientos@email.com', '12345', 1, 'BSIS403'),
('KLD-24-000114', 'Josh', 'Samson ', 'Delgado ', 'delgado.josh22@social.com', '12345', 1, 'BSIS404'),
('KLD-24-000115', 'Sofia', '', 'Badong ', 'sofia.badong@email.com', '12345', 1, 'BSIS404'),
('KLD-24-000116', 'Chino ', 'Presno ', 'Binuya ', 'chino.preson.binuya@account.org', '12345', 1, 'BSIS404'),
('KLD-24-000117', 'Gelli ', 'Gitamondoc ', 'Lacumba ', 'jellylacumba@social.com', '12345', 1, 'BSIS404'),
('KLD-24-000118', 'John-Marco ', 'Delgado ', 'Auyong ', 'marco.polo@official.ph', '12345', 1, 'BSIS404'),
('KLD-24-000119', 'Aubrey ', 'Bozon ', 'Ramos ', 'aubrey.ramos@mail.me', '12345', 1, 'BSIS404'),
('KLD-24-000120', 'Justin ', 'Co ', 'Valenzuela ', 'valenzuela.co@account.org', '12345', 1, 'BSIS405'),
('KLD-24-000121', 'Sherry-Ann ', 'Lozada ', 'Arroyo ', 'sherryann.lazada@account.org', '12345', 1, 'BSIS405'),
('KLD-24-000122', 'Edgardo José-Mari ', 'Pinlac ', 'Barrientos ', 'josemarichan@social.com', '12345', 1, 'BSIS405'),
('KLD-24-000123', 'Isylle ', 'Magdayao ', 'Delgado ', 'isylle4@email.com', '12345', 1, 'BSIS405'),
('KLD-24-000124', 'Alvaro Ariel ', 'Ruedas ', 'Guirnalda ', 'aarguirnalda@email.com', '12345', 1, 'BSIS405'),
('KLD-24-000125', 'Ana ', 'Amat ', 'Espina', 'ana.amat.espina@email.com', '12345', 1, 'BSIS405');

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
  ADD PRIMARY KEY (`approvalID`);

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
  ADD KEY `fkcourseyear` (`courseYear`),
  ADD KEY `courseSem` (`courseSem`);

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
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`semesterID`);

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
-- AUTO_INCREMENT for table `approval`
--
ALTER TABLE `approval`
  MODIFY `approvalID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `assignID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `facultytype`
--
ALTER TABLE `facultytype`
  MODIFY `facultyTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `gradeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `semesterID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `specialization`
--
ALTER TABLE `specialization`
  MODIFY `specializationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

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
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`courseSem`) REFERENCES `semester` (`semesterID`) ON DELETE SET NULL ON UPDATE NO ACTION,
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
  ADD CONSTRAINT `fkgradeteacher` FOREIGN KEY (`teacherID`) REFERENCES `faculty` (`facultyID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `grade_ibfk_1` FOREIGN KEY (`gradeApproved`) REFERENCES `approval` (`approvalID`);

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
