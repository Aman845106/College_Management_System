-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2020 at 07:55 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(5) NOT NULL,
  `std_id` int(5) NOT NULL,
  `course` varchar(30) NOT NULL,
  `subject` varchar(30) NOT NULL,
  `semester` int(1) NOT NULL,
  `attendance` varchar(8) NOT NULL,
  `date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(3) NOT NULL,
  `course` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` int(5) NOT NULL,
  `std_id` int(5) NOT NULL,
  `std_name` varchar(30) NOT NULL,
  `std_father` varchar(30) NOT NULL,
  `std_course` varchar(30) NOT NULL,
  `std_session` varchar(10) NOT NULL,
  `std_year` int(1) NOT NULL,
  `date` varchar(10) NOT NULL,
  `fees` mediumint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hod`
--

CREATE TABLE `hod` (
  `id` int(5) NOT NULL,
  `name` varchar(30) NOT NULL,
  `father` varchar(30) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `department` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `photo` varchar(30) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(5) NOT NULL,
  `notice` varchar(150) NOT NULL,
  `date` varchar(10) NOT NULL,
  `noticepdf` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(5) NOT NULL,
  `std_id` int(5) NOT NULL,
  `sub_name` varchar(30) NOT NULL,
  `marks` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `father` varchar(30) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `course` varchar(20) NOT NULL,
  `session` varchar(9) NOT NULL,
  `password` varchar(20) NOT NULL,
  `photo` varchar(30) NOT NULL,
  `status` int(1) NOT NULL,
  `year` varchar(4) NOT NULL,
  `semester` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(5) NOT NULL,
  `course` varchar(30) NOT NULL,
  `year` int(1) NOT NULL,
  `semester` int(1) NOT NULL,
  `subject` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `super_admin`
--

CREATE TABLE `super_admin` (
  `id` int(5) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `super_admin`
--

INSERT INTO `super_admin` (`id`, `email`, `password`, `status`) VALUES
(1, 'super@gmail.com', 'super123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(5) NOT NULL,
  `name` varchar(30) NOT NULL,
  `father` varchar(30) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `qualification` varchar(30) NOT NULL,
  `department` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hod`
--
ALTER TABLE `hod`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `super_admin`
--
ALTER TABLE `super_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hod`
--
ALTER TABLE `hod`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `super_admin`
--
ALTER TABLE `super_admin`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
