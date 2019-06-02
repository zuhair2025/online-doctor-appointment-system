-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2018 at 10:46 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doctor_appoint`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) NOT NULL,
  `adminEmail` varchar(255) NOT NULL,
  `adminPassword` varchar(255) NOT NULL,
  `adminPosition` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminEmail`, `adminPassword`, `adminPosition`) VALUES
(1, 'Mohammad Abdullah Al Zuhair ', 'zuhair@gmail.com', '12345', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_appointment`
--

CREATE TABLE `tbl_appointment` (
  `appointmentId` int(11) NOT NULL,
  `doctor_Id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `appointmentDate` varchar(100) NOT NULL,
  `tokenNumber` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_appointment`
--

INSERT INTO `tbl_appointment` (`appointmentId`, `doctor_Id`, `userId`, `appointmentDate`, `tokenNumber`) VALUES
(1, 7, 1, '2018-02-16', '1'),
(2, 9, 9, '2018-02-16', '1'),
(3, 8, 9, '2018-02-16', '1'),
(4, 8, 9, '2018-02-16', '2'),
(5, 8, 10, '2018-02-16', '3'),
(6, 9, 10, '2018-02-18', '1'),
(7, 8, 10, '2018-02-18', '1'),
(8, 8, 10, '2018-02-22', '1'),
(9, 8, 10, '2018-03-02', '1'),
(10, 8, 10, '2018-03-02', '2'),
(11, 8, 10, '2018-03-02', '3'),
(12, 8, 10, '2018-03-02', '4'),
(13, 8, 10, '2018-03-02', '5'),
(14, 8, 10, '2018-03-02', '6'),
(15, 8, 10, '2018-03-02', '7'),
(16, 9, 10, '2018-03-02', '1'),
(17, 9, 11, '2018-03-02', '2'),
(18, 9, 12, '2018-03-02', '3'),
(19, 8, 12, '2018-03-02', '8'),
(20, 8, 11, '2018-03-02', '9');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doctor`
--

CREATE TABLE `tbl_doctor` (
  `doctorId` int(11) NOT NULL,
  `doctorName` varchar(255) NOT NULL,
  `doctorAge` int(11) NOT NULL,
  `doctorDescription` text NOT NULL,
  `doctorEmail` varchar(255) NOT NULL,
  `doctorPassword` varchar(255) NOT NULL,
  `doctorMobileNumber` varchar(30) NOT NULL,
  `doctorPatientsNumber` int(11) NOT NULL,
  `doctorHospitalName` varchar(255) NOT NULL,
  `doctorRoomNo` varchar(100) NOT NULL,
  `doctorCategory` varchar(255) NOT NULL,
  `doctorFee` int(11) NOT NULL,
  `doctorTime` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_doctor`
--

INSERT INTO `tbl_doctor` (`doctorId`, `doctorName`, `doctorAge`, `doctorDescription`, `doctorEmail`, `doctorPassword`, `doctorMobileNumber`, `doctorPatientsNumber`, `doctorHospitalName`, `doctorRoomNo`, `doctorCategory`, `doctorFee`, `doctorTime`) VALUES
(7, 'Dr. Mohammad Abu Baker', 24, 'Cardiologist Speciallists', 'baker@yahoo.com', '123456', '01675518770', 1, 'National', '608', 'Cardiologist', 1000, '7.00pm to 8.00 p.m.'),
(8, 'Zubair', 25, 'Heart', 'zubair@gmail.com', '12345', '821379123789', 10, 'CSCR', '301', 'Medicine', 1000, '9.00am-12.00pm'),
(9, 'Waziha', 20, 'FCFS from Dhaka Medical College', 'waziha@gmail.com', '12345', '1129389123091', 20, 'Chittagong Medical', '201', 'Eye', 400, '4.00pm-7.00pm');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `userId` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `userAge` int(11) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `userPassword` varchar(255) NOT NULL,
  `userMobileNo` varchar(30) NOT NULL,
  `userAddress` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`userId`, `userName`, `userAge`, `userEmail`, `userPassword`, `userMobileNo`, `userAddress`) VALUES
(1, 'Anika', 22, 'anika@gmail.com', '12345', '018183283', 'Agrabad'),
(10, 'Samoun Baker', 25, 'sam@gmail.com', '12345', '01675518778', 'Halishahar'),
(11, 'Mir. Mohammad Abdullah Al Zuhair ', 28, 'zuhair@gmail.com', '12345', '01857646222', 'Chaktai'),
(12, 'Maria Sultana', 17, 'maria@gmail.com', '12345', '01638611143', 'Halishahar,B-Block,Chittagong');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  ADD PRIMARY KEY (`appointmentId`);

--
-- Indexes for table `tbl_doctor`
--
ALTER TABLE `tbl_doctor`
  ADD PRIMARY KEY (`doctorId`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_appointment`
--
ALTER TABLE `tbl_appointment`
  MODIFY `appointmentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tbl_doctor`
--
ALTER TABLE `tbl_doctor`
  MODIFY `doctorId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
