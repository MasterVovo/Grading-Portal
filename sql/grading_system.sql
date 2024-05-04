-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2024 at 02:46 PM
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
-- Database: `grading_system5`
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
  `facultyMName` varchar(30) DEFAULT NULL,
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
('KLD-24-0001', 'Raimondo', NULL, 'Cassy', 'tcassy0@cargocollective.com', '123', 1, 3),
('KLD-24-0002', 'Bronnie', NULL, 'Daud', 'fdaud1@friendfeed.com', '123', 1, 1),
('KLD-24-0003', 'Anton', NULL, 'Tomson', 'htomson2@ed.gov', '123', 1, 1),
('KLD-24-0004', 'Jeffie', NULL, 'Le febre', 'glefebre3@yale.edu', '123', 1, 1),
('KLD-24-0005', 'Bell', NULL, 'Orrocks', 'horrocks4@cyberchimps.com', '123', 1, 1),
('KLD-24-0006', 'Blinny', 'Cynthy', 'Lunny', 'clunny5@utexas.edu', '123', 1, 1),
('KLD-24-0007', 'Avrit', 'Charlena', 'Pedrocchi', 'cpedrocchi6@columbia.edu', '123', 1, 1),
('KLD-24-0008', 'Sharity', 'Karee', 'Dyball', 'kdyball7@mit.edu', '123', 1, 1),
('KLD-24-0009', 'Ferdy', 'Sonya', 'Grahame', 'sgrahame8@hibu.com', '123', 1, 1),
('KLD-24-0010', 'Shela', NULL, 'Clipson', 'iclipson9@jimbo.com', '123', 1, 1),
('KLD-24-0011', 'Conrade', 'Buddy', 'Kubanek', 'bkubanek0@umich.edu', '123', 1, 1),
('KLD-24-0012', 'Freddy', NULL, 'Sweetlove', 'hsweetlove1@yahoo.com', '123', 1, 1),
('KLD-24-0013', 'Hillie', 'Frances', 'Veillard', 'fveillard2@twitpic.com', '123', 1, 1),
('KLD-24-0014', 'Tiphany', 'Torey', 'Storks', 'tstorks3@bbb.org', '123', 1, 1),
('KLD-24-0015', 'Harlan', 'Pearl', 'Eley', 'peley4@bloglovin.com', '123', 1, 1),
('KLD-24-0016', 'Ashly', NULL, 'Langeren', 'mlangeren5@ehow.com', '123', 1, 1),
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
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `semesterID` int(11) NOT NULL,
  `semesterName` varchar(8) NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 'KLD-24-0002', 'CCIS1101'),
(2, 'KLD-24-0002', 'CCIS1102'),
(3, 'KLD-24-0002', 'GEC1000'),
(4, 'KLD-24-0003', 'PCIS1109');

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
('KLD-24-0001', 'Miniong', 'N/A', 'Navarro', 'mnavarro@email.com', '123', 'BSIS101'),
('KLD-24-0002', 'Miniong', 'N/A', 'Navarro', 'mnavarro@email.com', '123', 'BSIS101'),
('KLD-24-0003', 'Miniong', 'N/A', 'Navarro', 'mnavarro@email.com', '123', 'BSIS101'),
('KLD-24-0004', 'Roniele', 'N/A', 'Guingona', 'rrguingona@social.com', '123', 'BSIS101'),
('KLD-24-0005', 'Mark-Anthony', 'N/A', 'Enciso', 'maenciso@message.com', '123', 'BSIS101'),
('KLD-24-0006', 'Isylle', 'N/A', 'Barrientos', 'isylle.barrientos@mit.edu', '123', 'BSIS101'),
('KLD-24-0007', 'Kyle', 'N/A', 'Miranda', 'mirandkyle@mail.me', '123', 'BSIS101'),
('KLD-24-0008', 'Rosalita Diwata', 'N/A', 'Velasco', 'diwatangvelasco@account.org', '123', 'BSIS101'),
('KLD-24-0009', 'Chito Kidlat', 'N/A', 'Marquez', 'kidlatboy@email.com', '123', 'BSIS101'),
('KLD-24-0010', 'Anna', 'N/A', 'Ramos', 'anna.ramos@email.com', '123', 'BSIS101'),
('KLD-24-0011', 'Adrian', 'N/A', 'Beronilla ', 'beronilla.adrian@mail.me', '123', 'BSIS101'),
('KLD-24-0012', 'Joyce Donnalyn', 'N/A', 'Dureza ', 'jdr.dureza@account.org', '123', 'BSIS101'),
('KLD-24-0013', 'Antolin', 'N/A', 'Del Rosario ', 'antolin.rosario@official.ph', '123', 'BSIS102'),
('KLD-24-0014', 'Daylin', 'N/A', 'Rodriguez ', 'ddrodriguez@mit.edu', '123', 'BSIS102'),
('KLD-24-0015', 'Francis', 'N/A', 'Cortan ', 'fcortan@social.com', '123', 'BSIS102'),
('KLD-24-0016', 'Isylle', 'N/A', 'Binuya ', 'iibinuya123@social.com', '123', 'BSIS102'),
('KLD-24-0017', 'Awit', 'N/A', 'Madriaga ', 'awitca@message.com', '123', 'BSIS102'),
('KLD-24-0018', 'Asuncion', 'N/A', 'Chua ', 'chua.asuncion@mail.me', '123', 'BSIS102'),
('KLD-24-0019', 'Jonard', 'N/A', 'Magsino ', 'jonardmagsino@account.org', '123', 'BSIS102'),
('KLD-24-0020', 'Sheccaniah', 'N/A', 'Barrientos ', 'scbarrientos@email.com', '123', 'BSIS102'),
('KLD-24-0021', 'Josh', 'N/A', 'Delgado ', 'delgado.josh22@social.com', '123', 'BSIS102'),
('KLD-24-0022', 'Sofia', 'N/A', 'Badong ', 'sofia.badong@email.com', '123', 'BSIS102'),
('KLD-24-0023', 'Chino ', 'N/A', 'Binuya ', 'chino.preson.binuya@account.org', '123', 'BSIS103'),
('KLD-24-0024', 'Gelli ', 'N/A', 'Lacumba ', 'jellylacumba@social.com', '123', 'BSIS103'),
('KLD-24-0025', 'John-Marco ', 'N/A', 'Auyong ', 'marco.polo@official.ph', '123', 'BSIS103'),
('KLD-24-0026', 'Aubrey ', 'N/A', 'Ramos ', 'aubrey.ramos@mail.me', '123', 'BSIS103'),
('KLD-24-0027', 'Justin ', 'N/A', 'Valenzuela ', 'valenzuela.co@account.org', '123', 'BSIS103'),
('KLD-24-0028', 'Sherry-Ann ', 'N/A', 'Arroyo ', 'sherryann.lazada@account.org', '123', 'BSIS103'),
('KLD-24-0029', 'Edgardo José-Mari ', 'N/A', 'Barrientos ', 'josemarichan@social.com', '123', 'BSIS103'),
('KLD-24-0030', 'Isylle ', 'N/A', 'Delgado ', 'isylle4@email.com', '123', 'BSIS103'),
('KLD-24-0031', 'Alvaro Ariel ', 'N/A', 'Guirnalda ', 'aarguirnalda@email.com', '123', 'BSIS103'),
('KLD-24-0032', 'Ana ', 'N/A', 'Espina', 'ana.amat.espina@email.com', '123', 'BSIS103'),
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
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`semesterID`);

--
-- Indexes for table `specialization`
--
ALTER TABLE `specialization`
  ADD PRIMARY KEY (`specializationID`),
  ADD KEY `facultyID` (`facultyID`),
  ADD KEY `courseCode` (`courseCode`);

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
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `semesterID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `specialization`
--
ALTER TABLE `specialization`
  MODIFY `specializationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- Constraints for table `specialization`
--
ALTER TABLE `specialization`
  ADD CONSTRAINT `specialization_ibfk_1` FOREIGN KEY (`facultyID`) REFERENCES `faculty` (`facultyID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `specialization_ibfk_2` FOREIGN KEY (`courseCode`) REFERENCES `course` (`courseCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fkstudentsect` FOREIGN KEY (`studentSect`) REFERENCES `section` (`sectionID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
