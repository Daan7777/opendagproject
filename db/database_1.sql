-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2023 at 02:49 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `beroepenevent`
--

-- --------------------------------------------------------

--
-- Table structure for table `email_queue`
--

CREATE TABLE `email_queue` (
  `ID` int(11) NOT NULL,
  `Recipient` varchar(255) NOT NULL,
  `Subject` varchar(255) NOT NULL,
  `Message` text NOT NULL,
  `Headers` text DEFAULT NULL,
  `CreatedAt` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `JobID` int(11) NOT NULL,
  `JobName` varchar(64) NOT NULL,
  `JobSector` varchar(64) NOT NULL,
  `JobLocation` varchar(64) NOT NULL,
  `JobOrganisation` varchar(64) NOT NULL,
  `OrganisationURL` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`JobID`, `JobName`, `JobSector`, `JobLocation`, `JobOrganisation`, `OrganisationURL`) VALUES
(1, 'Kapper', 'Detailhandel', 'Alkmaar', 'Theartro', 'http://www.nu.nl'),
(2, 'Bakker', 'Agri & Food', 'Schagen', 'Bakker Beerse', 'http://www.nu.nl'),
(3, 'Schoenmaker', 'Detailhandel', 'Alkmaar', 'Schoensmit', 'http://www.nu.nl');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `logID` int(11) NOT NULL,
  `LogName` varchar(64) NOT NULL,
  `LogDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`logID`, `LogName`, `LogDate`, `UserID`) VALUES
(1, 'Login', '2022-12-25 18:46:42', 1),
(2, 'Login', '2023-01-01 11:53:33', 2),
(3, 'Logout', '2023-01-01 12:26:40', 2),
(4, 'Login', '2023-01-01 12:28:35', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `MiddleName` varchar(64) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `resettoken` varchar(50) DEFAULT NULL,
  `resettokenexp` date DEFAULT NULL,
  `EmailConfimed` int(4) DEFAULT 0,
  `Admin` tinyint(4) DEFAULT NULL,
  `EmailToken` varchar(50) DEFAULT NULL,
  `EmailTokenDate` date DEFAULT NULL,
  `Class` varchar(64) NOT NULL,
  `StudentNumber` varchar(64) NOT NULL,
  `Mentor` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `FirstName`, `MiddleName`, `LastName`, `Password`, `Email`, `resettoken`, `resettokenexp`, `EmailConfimed`, `Admin`, `EmailToken`, `EmailTokenDate`, `Class`, `StudentNumber`, `Mentor`) VALUES
(2, 'Admin', NULL, 'User', '$2y$10$Kr4zSHydmsDRyDOtnFhlbeFLyPBGoR0KgHtaR23kQDSX8Ufi.a5O2', 'admin@admin.nl', NULL, NULL, 1, NULL, NULL, NULL, 'ICTDEVE420AH', '1234', 'J. Marbus');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `email_queue`
--
ALTER TABLE `email_queue`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`JobID`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`logID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `email_queue`
--
ALTER TABLE `email_queue`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `JobID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `logID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
