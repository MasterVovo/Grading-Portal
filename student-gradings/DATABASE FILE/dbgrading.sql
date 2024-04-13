-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2021 at 08:28 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbgrading`
--

-- --------------------------------------------------------

--
-- Table structure for table `ay`
--

CREATE TABLE IF NOT EXISTS `ay` (
`AY_ID` int(11) NOT NULL,
  `ACADYR` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
`CLASS_ID` int(11) NOT NULL,
  `CLASS_CODE` varchar(30) NOT NULL,
  `SUBJ_ID` int(11) NOT NULL,
  `INST_ID` int(11) NOT NULL,
  `SYID` int(11) NOT NULL,
  `AY` varchar(11) NOT NULL,
  `DAY` varchar(20) NOT NULL,
  `C_TIME` varchar(11) NOT NULL,
  `IDNO` int(11) NOT NULL,
  `ROOM` varchar(30) NOT NULL DEFAULT 'NONE',
  `SECTION` varchar(30) NOT NULL DEFAULT 'NONE'
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`CLASS_ID`, `CLASS_CODE`, `SUBJ_ID`, `INST_ID`, `SYID`, `AY`, `DAY`, `C_TIME`, `IDNO`, `ROOM`, `SECTION`) VALUES
(3, 'Spiral Filipino', 438, 1, 0, '2013-2014', 'MWF', '7:30-8:30', 0, 'Room01', 'A'),
(4, 'Spiral English', 439, 1, 0, '2013-2014', 'NONE', 'NONE', 0, 'NONE', 'NONE'),
(5, 'Spiral Science', 441, 6, 0, '2013-2014', 'NONE', 'NONE', 0, 'NONE', 'NONE'),
(6, 'Spiral T.L.E', 442, 6, 0, '2013-2014', 'NONE', 'NONE', 0, 'NONE', 'NONE'),
(7, 'Spiral A.P', 443, 6, 0, '2013-2014', 'NONE', 'NONE', 0, 'NONE', 'NONE'),
(8, 'Spiral Religion', 444, 6, 0, '2013-2014', 'NONE', 'NONE', 0, 'NONE', 'NONE'),
(9, 'Spiral EsP.', 445, 6, 0, '2013-2014', 'NONE', 'NONE', 0, 'NONE', 'NONE'),
(10, 'Spiral Mathematics', 440, 7, 0, '2013-2014', 'NONE', 'NONE', 0, 'NONE', 'NONE'),
(11, 'MAPEH', 447, 7, 0, '2013-2014', 'NONE', 'NONE', 0, 'NONE', 'NONE'),
(12, 'Spiral Science', 469, 5, 0, '2013-2014', 'NONE', 'NONE', 0, 'NONE', 'NONE'),
(13, 'Spiral T.L.E.', 471, 5, 0, '2013-2014', 'NONE', 'NONE', 0, 'NONE', 'NONE'),
(14, 'Spiral MAPEH', 472, 5, 0, '2013-2014', 'NONE', 'NONE', 0, 'NONE', 'NONE'),
(15, 'Values Education', 473, 5, 0, '2013-2014', 'NONE', 'NONE', 0, 'NONE', 'NONE'),
(16, 'CAT', 474, 5, 0, '2013-2014', 'NONE', 'NONE', 0, 'NONE', 'NONE'),
(17, 'Computer', 475, 5, 0, '2013-2014', 'NONE', 'NONE', 0, 'NONE', 'NONE');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
`COURSE_ID` int(11) NOT NULL,
  `COURSE_NAME` varchar(30) NOT NULL,
  `COURSE_LEVEL` int(11) NOT NULL DEFAULT '1',
  `COURSE_MAJOR` varchar(30) NOT NULL DEFAULT 'None',
  `COURSE_DESC` varchar(255) NOT NULL,
  `DEPT_ID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`COURSE_ID`, `COURSE_NAME`, `COURSE_LEVEL`, `COURSE_MAJOR`, `COURSE_DESC`, `DEPT_ID`) VALUES
(47, 'Grade 7', 7, '', 'Grade 7', 2),
(48, 'Grade 8', 8, '', 'Grade 8 ', 1),
(49, 'Grade 9', 9, '', 'Grade 9', 1),
(50, 'Grade 10', 10, '', 'Grade 10', 1),
(53, 'Grade 11', 11, '', 'Grade 11 ', 1),
(54, 'Grade 12', 0, '', '2nd year of Senior High', 2);

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
`DEPT_ID` int(11) NOT NULL,
  `DEPARTMENT_NAME` varchar(30) NOT NULL,
  `DEPARTMENT_DESC` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`DEPT_ID`, `DEPARTMENT_NAME`, `DEPARTMENT_DESC`) VALUES
(1, 'High School', 'High School Department'),
(2, 'Junior High', 'Junior Higschool');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE IF NOT EXISTS `grades` (
`GRADE_ID` int(11) NOT NULL,
  `IDNO` int(11) NOT NULL,
  `SUBJ_ID` int(11) NOT NULL,
  `INST_ID` int(11) NOT NULL,
  `SYID` int(30) NOT NULL,
  `FIRST` int(11) NOT NULL,
  `SECOND` int(11) NOT NULL,
  `THIRD` int(11) NOT NULL,
  `FOURTH` int(11) NOT NULL,
  `AVE` float NOT NULL,
  `DAY` varchar(30) NOT NULL,
  `G_TIME` time NOT NULL,
  `ROOM` varchar(30) NOT NULL,
  `REMARKS` text NOT NULL,
  `COMMENT` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`GRADE_ID`, `IDNO`, `SUBJ_ID`, `INST_ID`, `SYID`, `FIRST`, `SECOND`, `THIRD`, `FOURTH`, `AVE`, `DAY`, `G_TIME`, `ROOM`, `REMARKS`, `COMMENT`) VALUES
(1, 20004277, 438, 1, 0, 30, 67, 0, 0, 3.85, 'NONE', '00:00:00', '', 'Failed', ''),
(2, 20004277, 439, 0, 0, 0, 0, 0, 0, 0, 'NONE', '00:00:00', '', 'NONE', ''),
(3, 20004207, 438, 0, 0, 0, 0, 0, 0, 0, 'NONE', '00:00:00', '', 'NONE', ''),
(4, 20004207, 439, 0, 0, 0, 0, 0, 0, 0, 'NONE', '00:00:00', '', 'NONE', ''),
(5, 20004180, 438, 0, 0, 0, 0, 0, 0, 0, 'NONE', '00:00:00', '', 'NONE', ''),
(6, 20004180, 439, 0, 0, 0, 0, 0, 0, 0, 'NONE', '00:00:00', '', 'NONE', ''),
(7, 20004180, 440, 0, 0, 0, 0, 0, 0, 0, 'NONE', '00:00:00', '', 'NONE', ''),
(8, 20004180, 441, 6, 0, 60, 78, 80, 90, 77, 'NONE', '00:00:00', '', 'Passed', ''),
(9, 20004180, 442, 0, 0, 0, 0, 0, 0, 0, 'NONE', '00:00:00', '', 'NONE', ''),
(10, 20004180, 443, 6, 0, 90, 89, 78, 90, 87, 'NONE', '00:00:00', '', 'Passed', ''),
(11, 20004180, 444, 0, 0, 0, 0, 0, 0, 0, 'NONE', '00:00:00', '', 'NONE', ''),
(12, 20004180, 445, 0, 0, 0, 0, 0, 0, 0, 'NONE', '00:00:00', '', 'NONE', ''),
(13, 20004180, 447, 7, 0, 20, 55, 65, 40, 45, 'NONE', '00:00:00', '', 'Failed', ''),
(14, 20004623, 438, 0, 0, 0, 0, 0, 0, 0, 'NONE', '00:00:00', '', 'NONE', ''),
(15, 20004623, 439, 0, 0, 0, 0, 0, 0, 0, 'NONE', '00:00:00', '', 'NONE', ''),
(16, 20004623, 440, 0, 0, 0, 0, 0, 0, 0, 'NONE', '00:00:00', '', 'NONE', ''),
(17, 20004623, 441, 6, 0, 80, 80, 78, 80, 80, 'NONE', '00:00:00', '', 'Passed', ''),
(18, 20004623, 442, 0, 0, 0, 0, 0, 0, 0, 'NONE', '00:00:00', '', 'NONE', ''),
(19, 20004623, 443, 0, 0, 0, 0, 0, 0, 0, 'NONE', '00:00:00', '', 'NONE', ''),
(20, 20004623, 444, 0, 0, 0, 0, 0, 0, 0, 'NONE', '00:00:00', '', 'NONE', ''),
(21, 20004623, 445, 0, 0, 0, 0, 0, 0, 0, 'NONE', '00:00:00', '', 'NONE', ''),
(22, 20004623, 447, 0, 0, 0, 0, 0, 0, 0, 'NONE', '00:00:00', '', 'NONE', ''),
(23, 6231415, 438, 0, 0, 0, 0, 0, 0, 0, 'NONE', '00:00:00', '', 'NONE', ''),
(24, 6231415, 439, 0, 0, 0, 0, 0, 0, 0, 'NONE', '00:00:00', '', 'NONE', ''),
(25, 6231415, 440, 0, 0, 0, 0, 0, 0, 0, 'NONE', '00:00:00', '', 'NONE', ''),
(26, 6231415, 441, 0, 0, 0, 0, 0, 0, 0, 'NONE', '00:00:00', '', 'NONE', ''),
(27, 6231415, 442, 0, 0, 0, 0, 0, 0, 0, 'NONE', '00:00:00', '', 'NONE', ''),
(28, 6231415, 443, 0, 0, 0, 0, 0, 0, 0, 'NONE', '00:00:00', '', 'NONE', ''),
(29, 6231415, 444, 0, 0, 0, 0, 0, 0, 0, 'NONE', '00:00:00', '', 'NONE', ''),
(30, 6231415, 445, 0, 0, 0, 0, 0, 0, 0, 'NONE', '00:00:00', '', 'NONE', ''),
(31, 6231415, 447, 7, 0, 90, 88, 91, 92, 90, 'NONE', '00:00:00', '', 'Passed', ''),
(32, 6231415, 446, 0, 0, 0, 0, 0, 0, 0, 'NONE', '00:00:00', '', 'NONE', ''),
(33, 6231415, 474, 0, 0, 0, 0, 0, 0, 0, 'NONE', '00:00:00', '', 'NONE', ''),
(44, 6231415, 448, 0, 6, 0, 0, 0, 0, 0, 'NONE', '00:00:00', '', 'NONE', ''),
(45, 696969, 439, 0, 7, 0, 0, 0, 0, 0, 'NONE', '00:00:00', '', 'NONE', ''),
(46, 696969, 441, 6, 7, 65, 40, 52, 75, 58, 'NONE', '00:00:00', '', 'Failed', ''),
(49, 696969, 440, 7, 7, 6, 40, 32, 65, 36, 'NONE', '00:00:00', '', 'Failed', ''),
(50, 696969, 475, 5, 7, 90, 91, 92, 95, 92, 'NONE', '00:00:00', '', 'Passed', ''),
(51, 696969, 473, 5, 7, 80, 90, 80, 95, 86, 'NONE', '00:00:00', '', 'Passed', '');

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE IF NOT EXISTS `instructor` (
`INST_ID` int(30) NOT NULL,
  `INST_FULLNAME` varchar(255) NOT NULL,
  `INST_ADDRESS` varchar(255) NOT NULL,
  `INST_SEX` varchar(20) NOT NULL DEFAULT 'Male',
  `INST_STATUS` varchar(20) NOT NULL DEFAULT 'Single',
  `SPECIALIZATION` text NOT NULL,
  `INST_EMAIL` varchar(255) NOT NULL,
  `EMPLOYMENT_STATUS` varchar(40) NOT NULL DEFAULT 'Probationary'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`INST_ID`, `INST_FULLNAME`, `INST_ADDRESS`, `INST_SEX`, `INST_STATUS`, `SPECIALIZATION`, `INST_EMAIL`, `EMPLOYMENT_STATUS`) VALUES
(1, 'Joken Villanueva', 'Suay Himamaylan City', 'M', 'Single', 'Computer Etc.', 'joken000189561@gmail.com', 'Probationary'),
(2, 'Erick jason Batuto', 'Kabanakalan City', 'M', 'Married', 'Computer ekc...', 'ejbatuto@hotmail.com', 'Regular'),
(3, 'Joel Bagolcol', 'KCC-TC', 'M', 'Single', 'Automotive', 'joel@yahoo.com', 'Probationary'),
(5, 'Allan', 'No whar', 'M', 'Single', 'Computer ekc...', 'allan@yahoo.com', 'Regular'),
(6, 'sdfsdfsdg', 'dfdf', 'M', 'Single', 'sdfsdf', 'joken@gmail.com', 'dfsdf'),
(7, 'George Wilson', 'Sample Address', 'M', 'Single', 'Sample', 'gwilson@sample.com', 'Regular');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE IF NOT EXISTS `level` (
`YR_ID` int(11) NOT NULL,
  `LEVEL` varchar(30) NOT NULL,
  `LEVEL_DESCRIPTION` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `major`
--

CREATE TABLE IF NOT EXISTS `major` (
`MAJOR_ID` int(11) NOT NULL,
  `MAJOR` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `major`
--

INSERT INTO `major` (`MAJOR_ID`, `MAJOR`) VALUES
(1, 'English'),
(2, 'General'),
(3, 'Marketing Management'),
(4, 'Financial Management'),
(5, 'Filipino'),
(6, 'Philosophy'),
(7, 'Math');

-- --------------------------------------------------------

--
-- Table structure for table `photo`
--

CREATE TABLE IF NOT EXISTS `photo` (
`PHOTO_ID` int(11) NOT NULL,
  `FILENAME` text NOT NULL,
  `TYPE` varchar(30) NOT NULL,
  `SIZE` int(30) NOT NULL,
  `CAPTION` varchar(255) NOT NULL,
  `IDNO` int(11) NOT NULL,
  `PRIMARY` varchar(20) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
`ROOM_ID` int(11) NOT NULL,
  `ROOM_NAME` varchar(30) NOT NULL,
  `ROOM_DESC` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`ROOM_ID`, `ROOM_NAME`, `ROOM_DESC`) VALUES
(0, 'Room01', 'Room01'),
(2, 'Room02', 'Room 02'),
(4, 'Room 03', 'Room 03');

-- --------------------------------------------------------

--
-- Table structure for table `schoolyr`
--

CREATE TABLE IF NOT EXISTS `schoolyr` (
`SYID` int(11) NOT NULL,
  `AY` varchar(30) NOT NULL,
  `SEMESTER` varchar(20) NOT NULL,
  `COURSE_ID` int(11) NOT NULL,
  `IDNO` int(30) NOT NULL,
  `CATEGORY` varchar(30) NOT NULL DEFAULT 'ENROLLED',
  `DATE_RESERVED` datetime NOT NULL,
  `DATE_ENROLLED` datetime NOT NULL,
  `STATUS` varchar(30) NOT NULL DEFAULT 'New'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schoolyr`
--

INSERT INTO `schoolyr` (`SYID`, `AY`, `SEMESTER`, `COURSE_ID`, `IDNO`, `CATEGORY`, `DATE_RESERVED`, `DATE_ENROLLED`, `STATUS`) VALUES
(1, '2013-2014', 'First', 47, 20004277, 'ENROLLED', '2014-03-12 02:10:03', '0000-00-00 00:00:00', 'New'),
(2, '2013-2014', 'First', 47, 20004207, 'ENROLLED', '2014-03-12 02:32:19', '0000-00-00 00:00:00', 'New'),
(3, '2014-2015', 'First', 48, 20004277, 'ENROLLED', '2014-03-13 03:18:56', '0000-00-00 00:00:00', 'Continuing'),
(4, '2013-2014', 'First', 47, 20004180, 'ENROLLED', '2014-03-24 08:28:35', '0000-00-00 00:00:00', 'New'),
(5, '2013-2014', 'First', 47, 20004623, 'ENROLLED', '2014-03-24 09:16:15', '0000-00-00 00:00:00', 'New'),
(6, '2018-2019', 'First', 47, 6231415, 'ENROLLED', '2021-01-28 07:34:09', '0000-00-00 00:00:00', 'New'),
(7, '2019-2020', 'First', 50, 696969, 'ENROLLED', '2021-03-23 06:45:55', '0000-00-00 00:00:00', 'New'),
(8, '2013-2014', 'First', 47, 696969, 'ENROLLED', '2021-03-23 06:55:09', '0000-00-00 00:00:00', 'New');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE IF NOT EXISTS `semester` (
`SEM_ID` int(11) NOT NULL,
  `SEM` varchar(15) NOT NULL DEFAULT 'First'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`SEM_ID`, `SEM`) VALUES
(1, 'First'),
(2, 'Second'),
(3, 'Summer');

-- --------------------------------------------------------

--
-- Table structure for table `studentsubjects`
--

CREATE TABLE IF NOT EXISTS `studentsubjects` (
`STUDSUBJ_ID` int(11) NOT NULL,
  `IDNO` int(11) NOT NULL,
  `SUBJ_ID` int(11) NOT NULL,
  `LEVEL` int(11) NOT NULL,
  `SEMESTER` varchar(30) NOT NULL,
  `SY` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentsubjects`
--

INSERT INTO `studentsubjects` (`STUDSUBJ_ID`, `IDNO`, `SUBJ_ID`, `LEVEL`, `SEMESTER`, `SY`) VALUES
(6, 20004207, 11, 1, 'First', '2013-2014'),
(8, 20004207, 13, 1, 'First', '2013-2014'),
(9, 20004207, 14, 1, 'First', '2013-2014'),
(10, 20004207, 15, 1, 'First', '2013-2014'),
(13, 20004277, 13, 1, 'First', '2013-2014'),
(14, 20004277, 14, 1, 'First', '2013-2014'),
(15, 20004277, 15, 1, 'First', '2013-2014');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
`SUBJ_ID` int(11) NOT NULL,
  `SUBJ_CODE` varchar(30) NOT NULL,
  `SUBJ_DESCRIPTION` varchar(255) NOT NULL,
  `UNIT` int(2) NOT NULL,
  `PRE_REQUISITE` varchar(30) NOT NULL DEFAULT 'None',
  `COURSE_ID` int(11) NOT NULL,
  `AY` varchar(30) NOT NULL,
  `SEMESTER` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=477 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`SUBJ_ID`, `SUBJ_CODE`, `SUBJ_DESCRIPTION`, `UNIT`, `PRE_REQUISITE`, `COURSE_ID`, `AY`, `SEMESTER`) VALUES
(438, 'Spiral Filipino', 'Filipino for Grade 7 - Spiral Filipino', 3, '', 47, '2013-2014', 'First'),
(439, 'Spiral English', 'English for Grade 7', 3, '', 47, '2013-2014', 'First'),
(440, 'Spiral Mathematics', 'Mathematics for Grade 7 - Spiral Math', 3, '', 47, '2013-2014', 'First'),
(441, 'Spiral Science', 'Science for Grade 7', 3, '', 47, '2013-2014', 'First'),
(442, 'Spiral T.L.E', 'T.L.E for Grade 7', 3, '', 47, '2013-2014', 'First'),
(443, 'Spiral A.P', 'Araling Panlipunan for Grade 7', 3, '', 47, '2013-2014', 'First'),
(444, 'Spiral Religion', 'rekligion for Grade 7', 3, '', 47, '2013-2014', 'First'),
(445, 'Spiral EsP.', 'EsP. for Grade 7', 3, '', 47, '2013-2014', 'First'),
(446, 'MAPEH', 'MAPEH for Grade 8 ', 3, '', 47, '2013-2014', 'First'),
(447, 'MAPEH', 'MAPEH for Grade 7', 3, '', 47, '2013-2014', 'First'),
(448, 'Religion', 'Religion for Grade 8', 3, '', 48, '2013-2014', 'First'),
(449, 'Spiral Filipino', 'Filipino for Grade 8 ', 3, '', 48, '2013-2014', 'First'),
(450, 'Spiral English', 'English for Grade 8', 3, '', 48, '2013-2014', 'First'),
(451, 'Spiral Mathematics', 'Mathematics for Grade 8 ', 3, '', 48, '2013-2014', 'First'),
(452, 'Spiral Science', 'Science for Grade ', 3, '', 48, '2013-2014', 'First'),
(453, 'Spiral T.L.E.', 'T.L.E for Grade 7 ', 3, '', 48, '2013-2014', 'First'),
(454, 'Spiral A.P.', 'Araling Panlipunan for Grade 8', 3, '', 48, '2013-2014', 'First'),
(455, 'Spiral EsP.', 'EsP. for Grade 7', 3, '', 48, '2013-2014', 'First'),
(457, 'Spiral Filipino', 'Filipino for Grade 9', 3, '', 49, '2013-2014', 'First'),
(458, 'Spiral English', 'English for Grade 9', 3, '', 49, '2013-2014', 'First'),
(459, 'Spiral Mathematics', 'Mathematics for Grade 9', 3, '', 49, '2013-2014', 'First'),
(460, 'Spiral Science', 'Science for Grade 9', 3, '', 49, '2013-2014', 'First'),
(461, 'Spiral A.P.', 'Araling Panlipunan for Grade 9', 3, '', 49, '2013-2014', 'First'),
(462, 'Spiral T.L.E.', 'T.L.E for Grade 9', 3, '', 49, '2013-2014', 'First'),
(463, 'Spiral MAPEH', 'MAPEH for Grade 9', 3, '', 49, '2013-2014', 'First'),
(464, 'Values Education', 'Values Education for Grade 9', 3, '', 49, '2013-2014', 'First'),
(465, 'Computer', 'Computer for grade 9', 3, '', 49, '2013-2014', 'First'),
(466, 'Religion IV', 'Religion for Grade 10', 3, '', 50, '2013-2014', 'First'),
(467, 'Spiral Filipino', 'Filipino for Grade 10', 3, '', 50, '2013-2014', 'First'),
(468, 'Spiral Mathematics', 'Mathematics for Grade 10', 3, '', 50, '2013-2014', 'First'),
(469, 'Spiral Science', 'Science for Grade 10', 3, '', 50, '2013-2014', 'First'),
(471, 'Spiral T.L.E.', 'T.L.E for Grade 10', 3, '', 50, '2013-2014', 'First'),
(472, 'Spiral MAPEH', 'MAPEH for Grade 10', 3, '', 50, '2013-2014', 'First'),
(473, 'Values Education', 'Values Education for Grade 10', 3, '', 50, '2013-2014', 'First'),
(474, 'CAT', 'Citizens Advancement Training', 3, '', 50, '2013-2014', 'First'),
(475, 'Computer', 'Computer for grade 10', 3, '', 50, '2013-2014', 'First'),
(476, 'hjgjhggh', 'gj', 3, '', 51, '2013-2014', 'First');

-- --------------------------------------------------------

--
-- Table structure for table `tblrequirements`
--

CREATE TABLE IF NOT EXISTS `tblrequirements` (
`REQ_ID` int(30) NOT NULL,
  `NSO` varchar(5) NOT NULL DEFAULT 'no',
  `BAPTISMAL` varchar(5) NOT NULL DEFAULT 'no',
  `ENTRANCE_TEST_RESULT` varchar(5) NOT NULL DEFAULT 'no',
  `MARRIAGE_CONTRACT` varchar(5) NOT NULL DEFAULT 'no',
  `CERTIFICATE_OF_TRANSFER` varchar(5) NOT NULL DEFAULT 'no',
  `IDNO` int(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblrequirements`
--

INSERT INTO `tblrequirements` (`REQ_ID`, `NSO`, `BAPTISMAL`, `ENTRANCE_TEST_RESULT`, `MARRIAGE_CONTRACT`, `CERTIFICATE_OF_TRANSFER`, `IDNO`) VALUES
(20, 'Yes', 'Yes', 'Yes', 'No', 'No', 20004277),
(21, 'Yes', 'Yes', 'Yes', 'No', 'No', 20004207),
(22, 'Yes', 'Yes', 'Yes', 'No', 'No', 20004180),
(26, 'Yes', 'Yes', 'Yes', 'No', 'No', 20004623),
(30, 'Yes', 'Yes', 'Yes', 'No', 'Yes', 20004749),
(32, 'Yes', 'Yes', 'Yes', 'No', 'Yes', 20003333),
(35, 'Yes', 'Yes', 'No', 'No', 'No', 20001482),
(36, 'Yes', 'Yes', 'Yes', 'No', 'Yes', 20001937),
(37, 'Yes', 'Yes', 'Yes', 'No', 'No', 20001648),
(38, 'Yes', 'Yes', 'Yes', 'No', 'Yes', 20002408),
(39, 'Yes', 'Yes', 'Yes', 'No', 'Yes', 20005936),
(40, 'No', 'No', 'No', 'No', 'No', 20001550),
(41, 'Yes', 'Yes', 'Yes', 'No', 'No', 20002270),
(47, 'Yes', 'Yes', 'Yes', 'No', 'No', 20001658),
(48, 'Yes', 'No', 'No', 'No', 'No', 20001550),
(51, 'Yes', 'Yes', 'Yes', 'No', 'Yes', 20001673),
(55, 'Yes', 'Yes', 'Yes', 'No', 'Yes', 20002106),
(58, 'Yes', 'Yes', 'No', 'Yes', 'No', 123456),
(59, 'Yes', 'Yes', 'Yes', 'No', 'No', 6231415),
(60, 'Yes', 'Yes', 'Yes', 'No', 'Yes', 696969);

-- --------------------------------------------------------

--
-- Table structure for table `tblstuddetails`
--

CREATE TABLE IF NOT EXISTS `tblstuddetails` (
`DETAIL_ID` int(11) NOT NULL,
  `FATHER` varchar(255) NOT NULL,
  `FATHER_OCCU` varchar(255) NOT NULL,
  `MOTHER` varchar(255) NOT NULL,
  `MOTHER_OCCU` varchar(255) NOT NULL,
  `BOARDING` varchar(5) NOT NULL DEFAULT 'no',
  `WITH_FAMILY` varchar(5) NOT NULL DEFAULT 'yes',
  `GUARDIAN` varchar(255) NOT NULL,
  `GUARDIAN_ADDRESS` varchar(255) NOT NULL,
  `OTHER_PERSON_SUPPORT` varchar(255) NOT NULL,
  `ADDRESS` text NOT NULL,
  `IDNO` int(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstuddetails`
--

INSERT INTO `tblstuddetails` (`DETAIL_ID`, `FATHER`, `FATHER_OCCU`, `MOTHER`, `MOTHER_OCCU`, `BOARDING`, `WITH_FAMILY`, `GUARDIAN`, `GUARDIAN_ADDRESS`, `OTHER_PERSON_SUPPORT`, `ADDRESS`, `IDNO`) VALUES
(20, 'Walter Da-anoy', 'Employee', 'Jessielyn Da-anoy', 'Housewife', 'No', 'No', '', '', '', '', 20004277),
(21, 'Mario P. Amparado', 'OFW', 'Yolly D. Odasco', 'Housewife', 'Yes', 'No', 'Domingga Gomez', '', '', '', 20004207),
(22, 'robert P. ferrer', 'fisherman', 'josephene b. ferrer', 'Housewife', 'Yes', 'Yes', 'josephene b ferrer', 'brgy.cayhagan,sipalay city,neg.occ.', 'sister', '', 20004180),
(26, 'Luis Balico', 'N/A', 'Leonisa Balico', 'N/A', 'No', 'Yes', 'Mary Ann Balico', 'Brgy Isidro Village, Talubangi Kabankalan City', 'N/A', '', 20004623),
(30, 'Rollen Gealon', 'Laborer', 'Marife Gealon', 'Housewife', 'No', 'Yes', 'Mr. & Mrs Rollen Gealon', 'Brgy.2 Ilog, Neg.Occ', '', '', 20004749),
(32, 'Leve Voluntate', 'Farmer', 'Lerma Voluntate', 'Deceased', 'No', 'Yes', '', '', 'Mr.Von Martir', 'Bacolod City', 20003333),
(35, 'Adriano Bayog', 'Farmer', 'Mamerna Dulana', 'housekeeper', 'Yes', 'No', 'Seminary Fathers', 'Kabankalan City', 'Parish', 'La Castellana', 20001482),
(36, 'Ruben J. Principe', '', 'Evelina Gumawa Principe', '', 'No', 'No', '', '', '', '', 20001937),
(37, 'Deceased', 'Deceased', 'Lorna Bandolos', 'Housewife', 'No', 'Yes', '', 'Lorna Bandolos', '', 'Brgy Dancalan Ilog Negros Occidental', 20001648),
(38, 'AMBROCIO SERION', 'FARMER', 'NORMENDA SERION', 'HOUSE WIFE', 'No', 'No', 'JONALYN BUGALON', 'Kabankalan City', 'JONALYN BUGALON', 'KABANKALAN CITY', 20002408),
(39, 'no', '', 'Merlita Macurio', 'housewife', 'No', 'No', 'Gerom Bello', 'Brgy,1 fzo subd.', '', '', 20005936),
(40, 'b', '', '', '', 'No', 'No', '', '', '', '', 20001550),
(41, 'Mr. Edgar C. Macario', 'Farmer', 'Mrs. Hilda F. Macario', 'Housewife', 'No', 'Yes', 'Mrs. Imelda M. Gatoc', 'Cabintagan, Brgy. Linao Kabankalan City, Negros Occidental', 'Mr. Robert C. Macario', 'Brgy. Salong Kabankalan City', 20002270),
(47, 'Alex Flores', 'Carpenter', 'Nelfa L. Flores', 'Brgy. Custodian', 'No', 'Yes', 'Nelfa L. Flores', 'Brgy. Camugao, Kabankalan City', 'Maria Elena T. Flores', 'Brgy. Camugao, Kabankalan City', 20001658),
(48, 'BENIGNO B. CORTEZ', 'FARMER', 'TERESITA P. CORTEZ', 'HOUSE WIFE', 'Yes', 'No', 'BENIGNO B. CORTEZ', 'TABUGON,kABANKALAN CITY', 'NONE', 'NONE', 20001550),
(51, 'Jesus M. Gamala', 'Farmer', 'Carmen N. Gamala', 'Housewife', 'Yes', 'No', 'Saro Yana', 'Bonifacio St.Kabankalan City', 'Jeza Gamala', 'DasmariÃ±as Cavite', 20001673),
(55, 'Benjie Melanio Sr.', 'Farmer', 'Delia Melanio', 'Housewife', 'No', 'Yes', 'Benjie Melanio', 'Brgy. Linao', '', '', 20002106),
(58, '', '', '', '', 'No', 'No', '', '', '', '', 123456),
(59, 'James Smith', 'Software Engineer', 'Cynthia Smith', 'House Wife', 'Yes', 'No', '', 'Sample Address', '', '', 6231415),
(60, 'Demo Name', 'Demo Occ', 'Demo Name M', 'Demo Occ M', 'Yes', 'Yes', 'Demo Name M', 'Demo Address Address', 'None', 'Demo Address', 696969);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent`
--

CREATE TABLE IF NOT EXISTS `tblstudent` (
`S_ID` int(11) NOT NULL,
  `IDNO` int(20) NOT NULL,
  `FNAME` varchar(40) NOT NULL,
  `LNAME` varchar(40) NOT NULL,
  `MNAME` varchar(40) NOT NULL,
  `SEX` varchar(10) NOT NULL DEFAULT 'Male',
  `BDAY` date NOT NULL,
  `BPLACE` text NOT NULL,
  `STATUS` varchar(30) NOT NULL,
  `AGE` int(30) NOT NULL,
  `NATIONALITY` varchar(40) NOT NULL,
  `RELIGION` varchar(255) NOT NULL,
  `CONTACT_NO` varchar(40) NOT NULL,
  `HOME_ADD` text NOT NULL,
  `EMAIL` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudent`
--

INSERT INTO `tblstudent` (`S_ID`, `IDNO`, `FNAME`, `LNAME`, `MNAME`, `SEX`, `BDAY`, `BPLACE`, `STATUS`, `AGE`, `NATIONALITY`, `RELIGION`, `CONTACT_NO`, `HOME_ADD`, `EMAIL`) VALUES
(17, 20004277, 'JESTERRAMY', 'DA-ANOY ', 'PATETE', 'F', '1995-06-14', 'Butuan City', 'Single', 19, 'Filipino', 'roman catholic', '09099754195', 'Brgy Camugao Kabankalan City', 'jesterramy14@yahoo.com'),
(18, 20004207, 'LHENYL GRACE', 'AMPARADO', 'ODASCO', 'F', '1995-08-27', 'Lancaan Dasmarinas Cavite', 'Single', 18, 'Filipino', 'roman catholic', '09263621995', 'Yao Yao Cauayan negros Occidental', 'lhenylgraceamparado@yahoo.com'),
(19, 20004180, 'MYLENE', 'FERRER', 'BALUCAN', 'F', '1972-05-22', 'brgy.cayhagan,sipalay city,neg.occ.', 'Single', 18, 'Filipino', 'roman catholic', '091071717257', 'brgy.cayhagan,sipalay city,neg.occ.', 'macaferrer@yahoo.com'),
(23, 20004623, 'SHARAH MAE', 'BALICO', 'PILLONES', 'F', '1990-11-01', 'Tagoloan Misamis Oriental', 'Single', 23, 'Filipino', 'Catholic', '09216230993', 'Brgy Isidro Village, Talubangi Kabankalan City', 'Sharahmae_balico@yahoo.com'),
(27, 20004749, 'JAMAICA JAIRAH', 'GEALON', 'DELA CRUZ', 'F', '1994-01-12', 'Brgy.2 Ilog,Neg.Occ.', 'Single', 19, 'Filipino', 'Roman Catholic', '09089917220', 'Brgy.2 Ilog Negros Occidental', 'gealon12@yahoo.com.ph'),
(29, 20003333, 'JENEBIE', 'VOLUNTATE', 'TABUCON', 'F', '1991-06-17', 'Kabankalan', 'Single', 22, 'Filipino', 'Roman Catholic', '09102247024', 'Brgy.Camansi,Kabankalan City,Neg.Occ.', 'jhen1704_cute@yahoo.com'),
(32, 20001482, 'ALDREN', 'BAYOG', 'DULANA ', 'M', '1993-12-27', 'La Castellana', 'Single', 20, 'Filipino', 'Roman Catholic', '09077898435', 'Kabankalan City', 'Aldz_bayog@yahoo.com'),
(33, 20001937, 'MERRY GRACE', 'PRINCIPE', 'GUMAWA', 'F', '1988-03-12', 'Candoni', 'Single', 25, 'Filipino', 'Roman Catholic', '09094397440', 'Pabera St.Brgy.East,Candoni, Negros Occidental', 'merrygraceprincipe@yahoo.com'),
(34, 20001648, 'SHIELA MARIE', 'BANDOLOS', 'TADAYA', 'F', '1990-08-21', 'Brgy. Dancalan Ilog Negros Occidental', 'Single', 22, 'Filipino', 'Roman Catholic', '09095596773', 'Brgy. Dancalan Ilog Negros Occidental', 'Marie_Bandolos@yahoo.com'),
(35, 20002408, 'ANALYN', 'SERION', 'ONLAGADA', 'F', '1993-10-30', 'Bry. TAMPALON KABANKALAN CITY', 'Single', 20, 'Filipino', 'Catholic', '09476154838', 'Kabankalan City', 'Analynserion@yahoo.com'),
(36, 20005936, 'JEAN', 'MACURIO', 'GONDAO', 'F', '1994-10-29', 'Brgy.Bantayan', 'Single', 19, 'Filipino', 'Baptist', '09125341710', 'Brgy. Bantayan Kabankalan City', 'jean_29_jake@yahoo.com'),
(37, 20001550, 'BENIGNO', 'CORTEZ', 'LACPAO', 'M', '1992-02-03', 'DUMAGUETE', 'Single', 21, 'FILIPINO', 'BAPTIST', '09097313999', 'TABUGON,KABANKALAN CITY,NEGROS OCCIDENTAL', 'deadlyjay_23@yahoo.com'),
(38, 20002270, 'ARHIL JUN', 'MACARIO', 'FERNANDEZ', 'M', '1993-06-12', 'Cabintagan, Brgy. Linao', 'Single', 20, 'Filipino', 'Roman Catholic', '09489776185', 'Cabintagan, Brgy. Linao Kabankalan City, Negros Occidental', 'elehra_jun_09@yahoo.com'),
(44, 20001658, 'STEVE', 'FLORES', 'LIPER', 'M', '1993-01-02', 'Brgy. Camugao, Kabankalan City', 'Single', 21, 'Filipino', 'Roman Catholic', '09077659710', 'Brgy. Camugao, Kabankalan City', 'skevinz_23@ymail.com'),
(48, 20001673, 'CARJEI', 'GAMALA', 'NAZARETH', 'M', '1993-04-28', 'Bulata', 'Single', 20, 'Filipino', 'Catholic', '09484207156', 'Bulata Cauyan Negros Occidental', 'kai_luv@yahoo.com'),
(52, 20002106, 'JEROM', 'MELANIO', 'BANDOLON', 'M', '1992-10-12', 'Kabankalan City', 'Single', 21, 'Filipino', 'Cathilic', '09303950074', 'Brgy. Linao, Kabankalan City', 'melaniojerom@yahoo.com'),
(55, 123456, 'KEVIN', 'GARGAR', 'DFD', 'M', '2013-07-13', 'bacolod city', 'Single', 12, '', '', '', '', 'Kev@yahoo.cpm'),
(56, 6231415, 'John', 'Smith', 'D', 'M', '2000-06-23', 'Sample City', 'Single', 15, 'Filipino', 'Roman Catholic', '+12354987', 'Sample Address', 'jsmith@sample.com'),
(57, 696969, 'James', 'Williams', 'Rk', 'M', '2003-06-04', 'Demo Place', 'Single', 17, 'Demooo', 'Buddhist', '9876543210', 'Demo Home', 'james@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `useraccounts`
--

CREATE TABLE IF NOT EXISTS `useraccounts` (
`ACCOUNT_ID` int(11) NOT NULL,
  `ACCOUNT_NAME` varchar(255) NOT NULL,
  `ACCOUNT_USERNAME` varchar(255) NOT NULL,
  `ACCOUNT_PASSWORD` text NOT NULL,
  `ACCOUNT_TYPE` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `useraccounts`
--

INSERT INTO `useraccounts` (`ACCOUNT_ID`, `ACCOUNT_NAME`, `ACCOUNT_USERNAME`, `ACCOUNT_PASSWORD`, `ACCOUNT_TYPE`) VALUES
(1, 'Logan Smith', 'adminlogan@gmail.com', 'f865b53623b121fd34ee5426c792e5c33af8c227', 'Administrator'),
(3, 'Joken Villanueva', 'joken@yahoo.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Administrator'),
(4, 'Hatch Villanueva', 'hatchvillanueva16@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Registrar'),
(6, 'joenin', 'joenin@yahoo.com', '25f3c6036a19460cd5d3f302fa7b99e5be56cb0e', 'Encoder'),
(8, 'joken', 'j@y.c', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Student'),
(9, 'Allan', 'allan@yahoo.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Teacher'),
(10, 'sdfsdfsdg', 'joken@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Teacher'),
(11, 'George Wilson', 'gwilson@sample.com', 'e67a0311df4d7de4eb50c3fc1e012b4823a6917d', 'Teacher'),
(12, 'Harry Den', 'harryden@gmail.com', '23a0b5e4fb6c6e8280940920212ecd563859cb3c', 'Student'),
(13, 'demo', 'demo', '89e495e7941cf9e40e6980d14a16bf023ccd4c91', 'Course In-charge');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ay`
--
ALTER TABLE `ay`
 ADD PRIMARY KEY (`AY_ID`), ADD UNIQUE KEY `acadyr` (`ACADYR`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
 ADD PRIMARY KEY (`CLASS_ID`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
 ADD PRIMARY KEY (`COURSE_ID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
 ADD PRIMARY KEY (`DEPT_ID`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
 ADD PRIMARY KEY (`GRADE_ID`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
 ADD PRIMARY KEY (`INST_ID`), ADD UNIQUE KEY `INST_EMAIL` (`INST_EMAIL`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
 ADD PRIMARY KEY (`YR_ID`);

--
-- Indexes for table `major`
--
ALTER TABLE `major`
 ADD PRIMARY KEY (`MAJOR_ID`);

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
 ADD PRIMARY KEY (`PHOTO_ID`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
 ADD PRIMARY KEY (`ROOM_ID`);

--
-- Indexes for table `schoolyr`
--
ALTER TABLE `schoolyr`
 ADD PRIMARY KEY (`SYID`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
 ADD PRIMARY KEY (`SEM_ID`);

--
-- Indexes for table `studentsubjects`
--
ALTER TABLE `studentsubjects`
 ADD PRIMARY KEY (`STUDSUBJ_ID`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
 ADD PRIMARY KEY (`SUBJ_ID`);

--
-- Indexes for table `tblrequirements`
--
ALTER TABLE `tblrequirements`
 ADD PRIMARY KEY (`REQ_ID`);

--
-- Indexes for table `tblstuddetails`
--
ALTER TABLE `tblstuddetails`
 ADD PRIMARY KEY (`DETAIL_ID`);

--
-- Indexes for table `tblstudent`
--
ALTER TABLE `tblstudent`
 ADD PRIMARY KEY (`S_ID`), ADD UNIQUE KEY `IDNO` (`IDNO`);

--
-- Indexes for table `useraccounts`
--
ALTER TABLE `useraccounts`
 ADD PRIMARY KEY (`ACCOUNT_ID`), ADD UNIQUE KEY `ACCOUNT_USERNAME` (`ACCOUNT_USERNAME`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ay`
--
ALTER TABLE `ay`
MODIFY `AY_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
MODIFY `CLASS_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
MODIFY `COURSE_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
MODIFY `DEPT_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
MODIFY `GRADE_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
MODIFY `INST_ID` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
MODIFY `YR_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `major`
--
ALTER TABLE `major`
MODIFY `MAJOR_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
MODIFY `PHOTO_ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
MODIFY `ROOM_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `schoolyr`
--
ALTER TABLE `schoolyr`
MODIFY `SYID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
MODIFY `SEM_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `studentsubjects`
--
ALTER TABLE `studentsubjects`
MODIFY `STUDSUBJ_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
MODIFY `SUBJ_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=477;
--
-- AUTO_INCREMENT for table `tblrequirements`
--
ALTER TABLE `tblrequirements`
MODIFY `REQ_ID` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `tblstuddetails`
--
ALTER TABLE `tblstuddetails`
MODIFY `DETAIL_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `tblstudent`
--
ALTER TABLE `tblstudent`
MODIFY `S_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `useraccounts`
--
ALTER TABLE `useraccounts`
MODIFY `ACCOUNT_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
