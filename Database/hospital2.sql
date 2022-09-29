-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2021 at 05:02 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Email` varchar(100) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Email`, `Password`) VALUES
('admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `PatientName` varchar(100) NOT NULL,
  `PatientMobileNumber` int(11) NOT NULL,
  `Doctor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `clinicdetail`
--

CREATE TABLE `clinicdetail` (
  `No` int(11) NOT NULL,
  `Disease` varchar(100) NOT NULL,
  `Treatment` varchar(100) NOT NULL,
  `Testing` varchar(100) NOT NULL,
  `Doctor` varchar(100) NOT NULL,
  `Day` varchar(50) NOT NULL,
  `Time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clinicdetail`
--

INSERT INTO `clinicdetail` (`No`, `Disease`, `Treatment`, `Testing`, `Doctor`, `Day`, `Time`) VALUES
(1, 'Chlamydia', 'Oral antibiotics', 'Nucleic acid amplification test, Pap test, Urine test', 'Dr.Javasekara', 'Monday', '08:30:00'),
(3, 'Syphilis', 'Intramuscular injection', 'Blood test, VDRL, PRPR', 'Dr.Sirisena', 'Tuesday', '12:00:00'),
(4, 'HIV', 'Antiretroviral therapy', 'HIV antibody test', 'Dr.Jayapala', 'Wednesday', '10:00:00'),
(5, 'Gonorrhea', 'Oral azithromycin, Ceftriaxone Injection', 'Nucleic acid Amplification test, Urine test', 'Dr.Senarath', 'Tuesday', '08:00:00'),
(6, 'Pubic lice', 'Insecticide shampoo, Cream, Lotion, Follow the advices', '---------', 'Dr.Sadun', 'Wednesday', '08:30:00'),
(7, 'Trichomoniasis', 'Metronidazole, Tinidazole', 'Nucleic acid amplification test, Molecular test, Direct DNA probes', 'Dr.Rasika', 'Thursday', '13:00:00'),
(8, 'Herpes', 'Acyclovir, Famvir, Valtrex', 'PCR test, Blood test', 'Dr.Rashmi', 'Friday', '09:00:00'),
(9, 'Hepatitis', 'B Baraclude, Viread, Epivi, Tyzeka', 'HBsAG test, Anti-HBc test', 'Dr.Santha', 'Thursday', '08:15:00'),
(10, 'Scabies', 'Permethrin crea, Malathion lotion, Permethrin 5% cream, Malathion 0.5% lotion', 'STI screen, HIV test', 'Dr.chathunika', 'Thursday', '08:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `name` varchar(200) NOT NULL,
  `message` varchar(500) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `Id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `AppointmentDay` varchar(50) NOT NULL,
  `AppointmentTime` time NOT NULL,
  `EmailAddress` varchar(100) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`Id`, `Name`, `AppointmentDay`, `AppointmentTime`, `EmailAddress`, `Password`) VALUES
(12, 'Dilshan', 'Monday', '08:20:00', 'dilshan@gmail.com', '123'),
(13, 'Dinithi', 'Monday', '07:00:00', 'dinithi@gmail.com', '456');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Name` varchar(100) NOT NULL,
  `MobileNumber` int(11) NOT NULL,
  `EmailAddress` varchar(100) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Name`, `MobileNumber`, `EmailAddress`, `Password`) VALUES
('dila', 23113132, 'dila@gmail.com', 'dila');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `clinicdetail`
--
ALTER TABLE `clinicdetail`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `EmailAddress` (`EmailAddress`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`EmailAddress`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
