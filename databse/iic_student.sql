-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2019 at 01:12 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iic_student`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE `colleges` (
  `id` int(11) NOT NULL,
  `college_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`id`, `college_name`, `created_at`, `updated_at`) VALUES
(1, 'GGITS', '2019-12-09 18:24:48', '2019-12-09 18:24:48'),
(2, 'GGCT', '2019-12-09 18:24:48', '2019-12-09 18:24:48'),
(4, 'Global College', '2019-12-09 18:25:31', '2019-12-09 18:25:31'),
(5, 'SRIT', '2019-12-09 18:25:31', '2019-12-09 18:25:31');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `created_at`, `updated_at`) VALUES
(1, 'CSE', '2019-12-09 18:26:16', '2019-12-09 18:26:16'),
(2, 'ECE', '2019-12-09 18:26:16', '2019-12-09 18:26:16'),
(4, 'IT', '2019-12-09 18:26:33', '2019-12-09 18:26:33'),
(5, 'EE', '2019-12-09 18:26:33', '2019-12-09 18:26:33'),
(6, 'CE', '2019-12-09 18:26:47', '2019-12-09 18:26:47'),
(7, 'ME', '2019-12-09 18:26:47', '2019-12-09 18:26:47');

-- --------------------------------------------------------

--
-- Table structure for table `selected_courses`
--

CREATE TABLE `selected_courses` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `college_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `selected_courses`
--

INSERT INTO `selected_courses` (`id`, `student_id`, `course_id`, `college_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, '2019-12-10 13:59:54', '2019-12-10 13:59:54'),
(2, 2, 2, 2, '2019-12-10 13:59:54', '2019-12-10 13:59:54'),
(3, 2, 4, 4, '2019-12-10 13:59:54', '2019-12-10 13:59:54'),
(4, 2, 5, 5, '2019-12-10 13:59:54', '2019-12-10 13:59:54'),
(5, 3, 1, 1, '2019-12-13 11:59:52', '2019-12-13 11:59:52'),
(6, 3, 1, 2, '2019-12-13 11:59:52', '2019-12-13 11:59:52'),
(7, 3, 1, 4, '2019-12-13 11:59:52', '2019-12-13 11:59:52');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `email`, `dob`, `created_at`, `updated_at`) VALUES
(1, 'Rajul Vishwakarma', 'rajulvishwakarma1@gmail.com', '2019-12-17', '2019-12-10 11:58:30', '2019-12-10 11:58:30'),
(2, 'Rakesh', 'rashmisahu5898@gmail.com', '1998-08-05', '2019-12-10 13:59:54', '2019-12-10 13:59:54'),
(3, 'Ram', 'ram@gmail.com', '2005-03-01', '2019-12-13 11:59:52', '2019-12-13 11:59:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin` (`admin`);

--
-- Indexes for table `colleges`
--
ALTER TABLE `colleges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `selected_courses`
--
ALTER TABLE `selected_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `colleges`
--
ALTER TABLE `colleges`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `selected_courses`
--
ALTER TABLE `selected_courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
