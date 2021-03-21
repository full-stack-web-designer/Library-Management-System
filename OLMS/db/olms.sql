-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2021 at 08:07 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `olms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `AdminEmail` varchar(100) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `UpdateDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `Status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`AdminEmail`, `UserName`, `Password`, `UpdateDate`, `Status`) VALUES
('sandeeppatel245570@gmail.com', 'sandeep', '$2y$10$ZmMXRxZcON8g3KqV3MEtW.m4YkTlyPD8x5CZ2txB2PZyHFogGlCgu', '2020-05-26 06:52:52', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_authors`
--

CREATE TABLE `tbl_authors` (
  `Id` int(12) NOT NULL,
  `CatId` int(11) DEFAULT NULL,
  `AuthorName` varchar(150) DEFAULT NULL,
  `CreateDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdateDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_authors`
--

INSERT INTO `tbl_authors` (`Id`, `CatId`, `AuthorName`, `CreateDate`, `UpdateDate`, `Status`) VALUES
(11, 5, 'R. C Agraval', '2020-05-03 14:25:43', '2020-05-03 14:32:32', 1),
(12, 6, 'R. K Raman', '2020-05-03 14:26:01', NULL, 1),
(13, 7, 'shivam sahu', '2020-05-03 14:26:10', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_books`
--

CREATE TABLE `tbl_books` (
  `BookName` varchar(200) DEFAULT NULL,
  `CatId` int(12) DEFAULT NULL,
  `AuthorId` int(12) DEFAULT NULL,
  `BookNumber` int(12) NOT NULL,
  `RegDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdateDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_books`
--

INSERT INTO `tbl_books` (`BookName`, `CatId`, `AuthorId`, `BookNumber`, `RegDate`, `UpdateDate`, `Status`) VALUES
('Physics', 6, 12, 1, '2020-05-03 14:36:04', '2020-05-03 14:41:23', 1),
('chamestry', 6, 12, 12, '2020-05-03 14:36:35', NULL, 1),
('m1', 5, 11, 123, '2020-05-03 14:37:05', NULL, 1),
('m2', 5, 11, 1234, '2020-05-03 14:37:24', NULL, 1),
('Basic Computer', 8, 14, 2020, '2020-05-04 06:28:26', NULL, 1),
('Apptitude', 7, 13, 12345, '2020-05-03 14:37:56', NULL, 1),
('Comms Skill', 7, 13, 123456, '2020-05-03 14:38:32', NULL, 1),
('m3', 5, 11, 1234567, '2020-05-03 14:53:47', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `CatId` int(12) NOT NULL,
  `CategoryName` varchar(150) DEFAULT NULL,
  `Status` int(1) DEFAULT NULL,
  `CreateDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdateDate` timestamp NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`CatId`, `CategoryName`, `Status`, `CreateDate`, `UpdateDate`) VALUES
(5, 'Engineering Mathematics', 1, '2020-05-02 20:32:33', '2020-05-03 14:39:56'),
(6, 'science', 1, '2020-05-02 20:35:00', '0000-00-00 00:00:00'),
(7, 'Compus Drive', 1, '2020-05-03 05:43:10', '0000-00-00 00:00:00'),
(8, 'Computer Science', 1, '2020-05-04 06:25:26', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `FullName` varchar(50) NOT NULL,
  `EmailId` varchar(150) NOT NULL,
  `Comment` varchar(200) NOT NULL,
  `CreateDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `UpdateDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`FullName`, `EmailId`, `Comment`, `CreateDate`, `UpdateDate`, `Status`) VALUES
('lucky patel', 'luckypatel@gmail.com', 'nice', '2020-07-03 14:22:21', '0000-00-00 00:00:00', 1),
('raj', 'raj@gmail.com', 'nice', '2020-06-05 07:19:51', '0000-00-00 00:00:00', 1),
('sandeep Patel', 'sandeeppatel245570@gmail.com', 'very nice\r\n', '2020-05-03 06:42:31', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_issuedbookdetails`
--

CREATE TABLE `tbl_issuedbookdetails` (
  `BookId` int(12) NOT NULL,
  `StudentId` varchar(12) NOT NULL,
  `IssuedDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `LastUpdate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `ReturnDate` varchar(100) NOT NULL,
  `ReturnStatus` int(1) DEFAULT NULL,
  `Fine` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_issuedbookdetails`
--

INSERT INTO `tbl_issuedbookdetails` (`BookId`, `StudentId`, `IssuedDate`, `LastUpdate`, `ReturnDate`, `ReturnStatus`, `Fine`) VALUES
(1, '0187cs171133', '2020-05-03 05:49:55', '2020-05-03 14:55:57', '', 1, 0),
(12, '0187cs171133', '2020-05-03 05:50:22', '2020-05-03 14:47:37', '', 1, 0),
(123, '0187cs171133', '2020-05-03 05:51:21', NULL, '', 1, 0),
(1234, '0187cs171133', '2020-05-03 05:51:36', NULL, '', 1, 0),
(2020, '0187cs171144', '2020-05-04 06:29:28', NULL, '05/10/2020', 1, 0),
(12345, '0187cs171133', '2020-05-03 05:52:00', NULL, '', 1, 0),
(123456, '0187cs171133', '2020-05-03 05:54:14', NULL, '', 1, 0),
(1234567, '0187cs171144', '2020-05-03 14:57:11', NULL, '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `StudentId` varchar(12) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `Branch` varchar(5) NOT NULL,
  `Semester` varchar(5) NOT NULL,
  `Gender` varchar(1) NOT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `MobileNumber` varchar(12) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `Status` int(1) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdateDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`StudentId`, `FullName`, `Branch`, `Semester`, `Gender`, `EmailId`, `MobileNumber`, `Password`, `Status`, `RegDate`, `UpdateDate`) VALUES
('0187cs171133', 'sandeep patel', 'CSE', 'VI', 'm', 'sandeeppatel245570@gmail.com', '9516161756', '$2y$10$Jpxshb8DZVx.Ob2LUXjW0O0uzzfd9NSPusE33PRe/Al7bFre.baiy', 1, '2020-05-02 20:31:32', '2020-05-26 07:21:47'),
('0187cs171134', 'sandeep malvuya', 'CSE', 'VI', 'm', 'sandeep@gmail.com', '7223085127', '$2y$10$9E/WXzO7ccvU5GO5CqfW6up3lw31.4vIgIubErWTXIkh.Qt00oCJy', 1, '2020-06-05 07:16:32', '2020-06-05 07:17:25'),
('0187cs171135', 'sandeep patel', 'IT', 'II', 'm', 'sandy@gmail.com', '1234567890', '$2y$10$zQu47YQ33CqaBnbLSdPSPO2LGoi82RCSVXtWC95eKAdr9fVEM/j6W', 1, '2021-03-21 19:02:24', '2021-03-21 19:05:42'),
('0187cs171144', 'shivchand sahu', 'CSE', 'VI', 'm', 'shivchansahu@gmail.com', '9170931852', '$2y$10$zbrJgGjr6Xxl3353xqfWKOmuiaLcunY/2LR3HmtYZ8JkrqUQItqgG', 1, '2020-05-03 14:50:37', '2020-05-03 14:50:57'),
('1234', 'sandeep patel', 'CSE', 'I', 'm', 'sandeeptirole1998@gmail.com', '9516161756', '$2y$10$mqh6Q1ZHTTqinMhh0No9Iuz4Dn8ngPgxwy4DSFvJ/JzuHErp3H7A6', 1, '2020-06-04 05:02:40', '2020-06-04 05:10:20'),
('123456', 'luckypatel', 'CSE', 'I', 'm', 'luckypatel@gmail.com', '9926921752', '$2y$10$EYkU3K66ZrkkV3hVIHjCvuvN9HMNYWkf6y8/GAXQWHaUHGRJQ/PLG', 1, '2020-07-03 14:17:25', '2020-07-03 14:19:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`AdminEmail`);

--
-- Indexes for table `tbl_authors`
--
ALTER TABLE `tbl_authors`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tbl_books`
--
ALTER TABLE `tbl_books`
  ADD PRIMARY KEY (`BookNumber`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`CatId`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`EmailId`);

--
-- Indexes for table `tbl_issuedbookdetails`
--
ALTER TABLE `tbl_issuedbookdetails`
  ADD PRIMARY KEY (`BookId`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`StudentId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_authors`
--
ALTER TABLE `tbl_authors`
  MODIFY `Id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `CatId` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
