-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 15, 2020 at 05:45 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `suckhoe`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `accountID` varchar(20) NOT NULL,
  `accountType` enum('citizen','ho') NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`accountID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`accountID`, `accountType`, `username`, `password`, `phone`, `address`) VALUES
('C01', 'citizen', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', '0123098234', '123 minh khai'),
('C02', 'citizen', 'hieudo', '900150983cd24fb0d6963f7d28e17f72', '0123456123', 'lang vong'),
('H01', 'ho', 'admin', '21232f297a57a5a743894a0e4a801fc3', '0243123123', 'giai phong'),
('H02', 'ho', 'xanhpon', '3f11745e4cc6b6bd111d30db398454e8', '0243789987', 'ba dinh');

-- --------------------------------------------------------

--
-- Table structure for table `citizen`
--

DROP TABLE IF EXISTS `citizen`;
CREATE TABLE IF NOT EXISTS `citizen` (
  `accountID` varchar(20) NOT NULL,
  `HOAccountID` varchar(20) NOT NULL,
  `citizenID` varchar(20) NOT NULL,
  `firstName` varchar(20) DEFAULT NULL,
  `lastName` varchar(20) DEFAULT NULL,
  `jobTitle` varchar(20) DEFAULT NULL,
  `DoB` date DEFAULT NULL,
  PRIMARY KEY (`accountID`,`citizenID`),
  KEY `fk_ho` (`HOAccountID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `citizen`
--

INSERT INTO `citizen` (`accountID`, `HOAccountID`, `citizenID`, `firstName`, `lastName`, `jobTitle`, `DoB`) VALUES
('C01', 'H01', '0123123', 'long', 'doan', 'sinh vien', '1998-06-27'),
('C02', 'H01', '0423842', 'hieu', 'do', 'can bo dang', '1998-10-05');

-- --------------------------------------------------------

--
-- Table structure for table `citizenform`
--

DROP TABLE IF EXISTS `citizenform`;
CREATE TABLE IF NOT EXISTS `citizenform` (
  `formNumberID` int(11) NOT NULL AUTO_INCREMENT,
  `formID` varchar(20) NOT NULL,
  `citizenAccountID` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`formNumberID`),
  KEY `fk_citizen` (`citizenAccountID`),
  KEY `fk_form` (`formID`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `citizenform`
--

INSERT INTO `citizenform` (`formNumberID`, `formID`, `citizenAccountID`, `date`) VALUES
(1, 'F01', 'C02', '2020-05-31 17:00:00'),
(31, 'F02', 'C01', '2020-04-30 17:00:00'),
(32, 'F01', 'C02', '2020-06-14 16:16:23'),
(33, 'F01', 'C02', '2020-06-14 16:17:26'),
(34, 'F02', 'C02', '2020-06-14 16:20:24'),
(35, 'F01', 'C02', '2020-06-15 17:31:34'),
(36, 'F02', 'C02', '2020-06-15 17:34:07');

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

DROP TABLE IF EXISTS `form`;
CREATE TABLE IF NOT EXISTS `form` (
  `HOAccountID` varchar(20) NOT NULL,
  `formID` varchar(20) NOT NULL,
  `title` varchar(20) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `description` varchar(100) DEFAULT NULL,
  `content` text DEFAULT NULL,
  PRIMARY KEY (`formID`),
  KEY `HOAccountID` (`HOAccountID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`HOAccountID`, `formID`, `title`, `date`, `description`, `content`) VALUES
('H01', 'F1', 'Medical Form', '2020-01-31 17:00:00', 'Medical Form for citizen', '../uploads/form/fillMedicalFormQuestion.php'),
('H02', 'F2', 'Travel Form', '2020-02-14 17:00:00', 'Travel form for travelers', '../uploads/form/fillTravelFormQuestion.php'),
('H01', 'F3', 'Drug test form', '2020-06-15 10:40:24', 'Drug test form', '../uploads/form/fillTestForm2.php');

-- --------------------------------------------------------

--
-- Table structure for table `ho`
--

DROP TABLE IF EXISTS `ho`;
CREATE TABLE IF NOT EXISTS `ho` (
  `accountID` varchar(20) NOT NULL,
  `specialization` varchar(20) DEFAULT NULL,
  `name` varchar(40) NOT NULL,
  PRIMARY KEY (`accountID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ho`
--

INSERT INTO `ho` (`accountID`, `specialization`, `name`) VALUES
('H01', 'da khoa', 'benh vien bach mai'),
('H02', 'da khoa', 'benh vien xanh pon');

-- --------------------------------------------------------

--
-- Table structure for table `medicalform`
--

DROP TABLE IF EXISTS `medicalform`;
CREATE TABLE IF NOT EXISTS `medicalform` (
  `formID` int(11) NOT NULL,
  `fever` tinyint(1) NOT NULL,
  `cough` tinyint(1) NOT NULL,
  `shortBreath` tinyint(1) NOT NULL,
  `soreThroat` tinyint(1) NOT NULL,
  `vomit` tinyint(1) NOT NULL,
  `diarrhea` tinyint(1) NOT NULL,
  `skinBleeding` tinyint(1) NOT NULL,
  `skinRash` tinyint(1) NOT NULL,
  `usedMedicine` varchar(200) DEFAULT NULL,
  `contactWildAnimal` tinyint(1) NOT NULL,
  `contactCovidPatient` tinyint(1) NOT NULL,
  PRIMARY KEY (`formID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medicalform`
--

INSERT INTO `medicalform` (`formID`, `fever`, `cough`, `shortBreath`, `soreThroat`, `vomit`, `diarrhea`, `skinBleeding`, `skinRash`, `usedMedicine`, `contactWildAnimal`, `contactCovidPatient`) VALUES
(1, 0, 0, 0, 1, 0, 1, 0, 0, 'Cough Syrum', 0, 0),
(32, 0, 0, 0, 0, 0, 0, 0, 0, '', 0, 0),
(35, 0, 0, 0, 0, 0, 0, 0, 0, 'None', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `statistics`
--

DROP TABLE IF EXISTS `statistics`;
CREATE TABLE IF NOT EXISTS `statistics` (
  `HOAccountID` varchar(20) NOT NULL,
  `statisticsID` varchar(20) NOT NULL,
  `title` varchar(20) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `description` varchar(100) DEFAULT NULL,
  `content` text DEFAULT NULL,
  PRIMARY KEY (`statisticsID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `statistics`
--

INSERT INTO `statistics` (`HOAccountID`, `statisticsID`, `title`, `date`, `description`, `content`) VALUES
('H01', 'S1', 'Medical Statistics', '2020-06-15 09:33:26', 'Medical Statistics June 1st', '../uploads/statistics/statistics.png'),
('H02', 'S2', 'Medical Statistics 2', '2020-06-15 09:37:14', 'Medical Statistics June 2nd', '../uploads/statistics/statistics2.png'),
('H01', 'S3', 'Drug Test Statistics', '2020-06-15 10:41:01', 'Drug Test Statistics', '../uploads/statistics/bargraph1.gif');

-- --------------------------------------------------------

--
-- Table structure for table `travelform`
--

DROP TABLE IF EXISTS `travelform`;
CREATE TABLE IF NOT EXISTS `travelform` (
  `formID` int(11) NOT NULL,
  `vehicle` enum('plane','car','ship','other') NOT NULL,
  `otherVehicle` varchar(200) DEFAULT NULL,
  `licensePlate` varchar(20) DEFAULT NULL,
  `seatNumber` varchar(10) DEFAULT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `srcCountry` varchar(40) DEFAULT NULL,
  `destCountry` varchar(40) NOT NULL,
  `srcLocation` varchar(200) DEFAULT NULL,
  `destLocation` varchar(200) DEFAULT NULL,
  `travelHistory` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`formID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `travelform`
--

INSERT INTO `travelform` (`formID`, `vehicle`, `otherVehicle`, `licensePlate`, `seatNumber`, `startDate`, `endDate`, `srcCountry`, `destCountry`, `srcLocation`, `destLocation`, `travelHistory`) VALUES
(31, 'car', NULL, '29D-6969', NULL, '2020-04-01', '2020-04-30', 'Japan', 'Vietnam', 'Tokyo', 'Hanoi', NULL),
(34, 'ship', '', '', '123', '2020-06-01', '2020-06-03', 'Vietnam', 'China', 'Hanoi', 'Beijing', 'Taiwan'),
(36, 'car', '', '29-D1 134.45', '', '2020-06-01', '2020-06-04', 'China', 'Vietnam', 'Shanghai', 'Hanoi', 'Singapore, Thailand');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
