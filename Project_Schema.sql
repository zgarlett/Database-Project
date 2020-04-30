-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 30, 2020 at 07:40 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

-- Host: localhost
-- Username: root
-- Database Name: Project_Schema
-- Password: (leave blank)

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Project_Schema`
--
CREATE DATABASE IF NOT EXISTS `Project_Schema` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `Project_Schema`;

-- --------------------------------------------------------

--
-- Table structure for table `Course`
--

DROP TABLE IF EXISTS `Course`;
CREATE TABLE IF NOT EXISTS `Course` (
  `CourseName` varchar(20) NOT NULL,
  `Department` varchar(20) DEFAULT NULL,
  `Time` time DEFAULT NULL,
  `FID` int(11) DEFAULT NULL,
  `Class_Type` set('Online','Lecture') DEFAULT NULL,
  PRIMARY KEY (`CourseName`),
  KEY `FID` (`FID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Course`
--

INSERT INTO `Course` (`CourseName`, `Department`, `Time`, `FID`, `Class_Type`) VALUES
('C++', 'Arts and Sciences', '09:00:00', 1111, 'Lecture'),
('CS1', 'Arts and Sciences', '09:15:00', 4444, 'Lecture');

-- --------------------------------------------------------

--
-- Table structure for table `Enrollment`
--

DROP TABLE IF EXISTS `Enrollment`;
CREATE TABLE IF NOT EXISTS `Enrollment` (
  `SID` int(11) NOT NULL,
  `CourseName` varchar(20) NOT NULL,
  `Score` int(11) DEFAULT NULL,
  PRIMARY KEY (`SID`,`CourseName`),
  KEY `CourseName` (`CourseName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Enrollment`
--

INSERT INTO `Enrollment` (`SID`, `CourseName`, `Score`) VALUES
(1111, 'C++', 100),
(1111, 'CS1', 98),
(2222, 'C++', 43),
(3333, 'C++', 99),
(5555, 'C++', 76);

-- --------------------------------------------------------

--
-- Table structure for table `Faculty`
--

DROP TABLE IF EXISTS `Faculty`;
CREATE TABLE IF NOT EXISTS `Faculty` (
  `FID` int(11) NOT NULL,
  `Name` varchar(20) DEFAULT NULL,
  `Email` varchar(40) DEFAULT NULL,
  `Phone_number` varchar(30) DEFAULT NULL,
  `Department` varchar(20) DEFAULT NULL,
  `Date_of_birth` date DEFAULT NULL,
  `Campus` set('Stillwater','Tulsa') DEFAULT NULL,
  `Education_Level` varchar(30) DEFAULT NULL,
  `Field_of_Study` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`FID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Faculty`
--

INSERT INTO `Faculty` (`FID`, `Name`, `Email`, `Phone_number`, `Department`, `Date_of_birth`, `Campus`, `Education_Level`, `Field_of_Study`) VALUES
(1111, 'Terry Crews', 'tC@ok.com', NULL, 'Math', NULL, 'Stillwater', 'Masters', 'Math'),
(4444, 'Amy', 'Amy@ok.com', NULL, 'CS', NULL, 'Tulsa', 'Masters', 'CS'),
(5555, 'Jay', 'Jay@c.com', NULL, 'Math', NULL, 'Tulsa', 'Masters', 'Math');

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

DROP TABLE IF EXISTS `Student`;
CREATE TABLE IF NOT EXISTS `Student` (
  `SID` int(11) NOT NULL,
  `Name` varchar(20) DEFAULT NULL,
  `Email` varchar(40) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Date_of_Birth` date DEFAULT NULL,
  `Major` varchar(20) DEFAULT NULL,
  `Campus` set('Stillwater','Tulsa') DEFAULT NULL,
  `Year` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`SID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Student`
--

INSERT INTO `Student` (`SID`, `Name`, `Email`, `Phone`, `Date_of_Birth`, `Major`, `Campus`, `Year`) VALUES
(1111, 'Jacob', 'j@ok.com', '1', NULL, 'CS', 'Stillwater', 'Sophmore'),
(2222, 'Giovanni', 'asdf@asdf.com', '8123', NULL, 'CS', 'Stillwater', 'Sophmore'),
(3333, 'Tyler', 'T@ok.com', '2', NULL, 'CS', 'Stillwater', 'Sophmore'),
(5555, 'Wes', 'Wes@t.com', '23423', NULL, 'CS', 'Stillwater', 'Freshman');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Course`
--
ALTER TABLE `Course`
  ADD CONSTRAINT `Course_ibfk_1` FOREIGN KEY (`FID`) REFERENCES `Faculty` (`FID`) ON DELETE CASCADE;

--
-- Constraints for table `Enrollment`
--
ALTER TABLE `Enrollment`
  ADD CONSTRAINT `Enrollment_ibfk_1` FOREIGN KEY (`SID`) REFERENCES `Student` (`SID`) ON DELETE CASCADE,
  ADD CONSTRAINT `Enrollment_ibfk_2` FOREIGN KEY (`CourseName`) REFERENCES `Course` (`CourseName`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
