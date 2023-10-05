-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2023 at 11:52 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `password`) VALUES
(1, 'admin', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `PatientName` varchar(100) NOT NULL,
  `PatientMobileNumber` int(11) NOT NULL,
  `Doctor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `user_id`, `PatientName`, `PatientMobileNumber`, `Doctor`) VALUES
(39, 10, 'normal', 776379211, 'Dinithi');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(9, 'Hepatitis', 'B Baraclude, Viread, Epivi, Tyzeka', 'HBsAG test, Anti-HBc test', 'Dr.Santha', 'Thursday', '08:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `user_id`, `name`, `email`, `number`, `message`) VALUES
(10, 10, 'Nuwantha Dilshan', 'nuwanthadilshan56@gmail.com', 741900211, 'hi');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `AppointmentDay` varchar(50) NOT NULL,
  `AppointmentTime` time NOT NULL,
  `EmailAddress` varchar(100) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `Name`, `AppointmentDay`, `AppointmentTime`, `EmailAddress`, `Password`) VALUES
(5, 'Doctor', 'Monday', '08:30:00', 'doctor@gmail.com', '6216f8a75fd5bb3d5f22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `MobileNumber` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Name`, `MobileNumber`, `email`, `Password`) VALUES
(10, 'normal', 776379211, 'normal@gmail.com', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clinicdetail`
--
ALTER TABLE `clinicdetail`
  ADD PRIMARY KEY (`No`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `clinicdetail`
--
ALTER TABLE `clinicdetail`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
