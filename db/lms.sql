-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 15, 2024 at 01:30 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(100) NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `slots` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `date`, `start_time`, `end_time`, `slots`) VALUES
(25, '2024-02-23', '23:33:00', '19:36:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` int(11) NOT NULL,
  `image_path` blob NOT NULL,
  `title` varchar(255) NOT NULL,
  `caption` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`id`, `image_path`, `title`, `caption`) VALUES
(16, 0x2e2e2f6173736574732f63617264732f6368616e6e656c73345f70726f66696c652e6a7067, 'trter', 'edtgrtg');

-- --------------------------------------------------------

--
-- Table structure for table `contact_form_submissions`
--

CREATE TABLE `contact_form_submissions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `submission_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_form_submissions`
--

INSERT INTO `contact_form_submissions` (`id`, `name`, `email`, `message`, `submission_time`) VALUES
(2, 'Criss Pauline', 'paolokabuts@gmail.com', 'Malaki Betlog Ko', '2024-02-15 11:12:38'),
(3, 'CrissRaul', 'paolokabuts@gmail.com', 'malaki betlog ko', '2024-02-15 11:38:58');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(100) NOT NULL,
  `course` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cover`
--

CREATE TABLE `cover` (
  `id` int(11) NOT NULL,
  `picture_path` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cover`
--

INSERT INTO `cover` (`id`, `picture_path`) VALUES
(16, 0x2e2e2f6173736574732f636f766572732f6368616e6e656c73345f70726f66696c652e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `egrades`
--

CREATE TABLE `egrades` (
  `prelim` int(11) DEFAULT NULL,
  `midterm` int(11) DEFAULT NULL,
  `finals` int(11) DEFAULT NULL,
  `average` int(11) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `course` varchar(255) DEFAULT NULL,
  `courseyear` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grid_content`
--

CREATE TABLE `grid_content` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `caption` text NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grid_content`
--

INSERT INTO `grid_content` (`id`, `title`, `caption`, `size`) VALUES
(1, 'ewew', 'erer', 12),
(2, 'ewew', 'erer', 12),
(3, 'waw', 'ewe', 12);

-- --------------------------------------------------------

--
-- Table structure for table `grid_data`
--

CREATE TABLE `grid_data` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `caption` text NOT NULL,
  `size` int(11) NOT NULL,
  `background_color` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grid_data`
--

INSERT INTO `grid_data` (`id`, `title`, `caption`, `size`, `background_color`) VALUES
(12, 'wa', 'wa', 5, '#f81212'),
(13, 'wa', 'sige', 3, '#000000');

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `id` int(169) NOT NULL,
  `pic` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id`, `pic`) VALUES
(15, 0x363435376437303034356562362e706e67);

-- --------------------------------------------------------

--
-- Table structure for table `school_profile`
--

CREATE TABLE `school_profile` (
  `id` int(11) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `contact_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `school_profile`
--

INSERT INTO `school_profile` (`id`, `school_name`, `address`, `contact_number`) VALUES
(1, 'Sample School', 'Sample Address', '8765478');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id` int(100) NOT NULL,
  `section` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_data`
--

CREATE TABLE `student_data` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `elementary` varchar(255) NOT NULL,
  `egrad` varchar(10) DEFAULT NULL,
  `juniorhigh` varchar(255) NOT NULL,
  `hgrad` varchar(10) DEFAULT NULL,
  `seniorhigh` varchar(255) NOT NULL,
  `shgrad` varchar(10) DEFAULT NULL,
  `firstName` varchar(255) NOT NULL,
  `middleName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `courseyear` varchar(10) NOT NULL,
  `course` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `section` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phonenumber` varchar(20) NOT NULL,
  `guardianname` varchar(255) NOT NULL,
  `guardianPhoneNumber` varchar(20) NOT NULL,
  `guardhomeaddress` varchar(255) NOT NULL,
  `enrollment_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(45) NOT NULL,
  `appointment_date` date DEFAULT NULL,
  `appointment_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_data`
--

INSERT INTO `student_data` (`id`, `username`, `password`, `email`, `elementary`, `egrad`, `juniorhigh`, `hgrad`, `seniorhigh`, `shgrad`, `firstName`, `middleName`, `lastName`, `gender`, `courseyear`, `course`, `birthday`, `section`, `address`, `phonenumber`, `guardianname`, `guardianPhoneNumber`, `guardhomeaddress`, `enrollment_date`, `status`, `appointment_date`, `appointment_time`) VALUES
(38, 'admin@student', '$2y$10$psnwKqUy7zSMK.VLMks9LeeJLOTHEDC4hffJKK5kZPe64l3DP31Qu', 'sample@gmail.com', 'San Isidro Elementary School', '2009', 'San Isidro High School', '2016', 'hcc', '2021', 'John Paul', 'Pangan', 'Santos', 'male', '2nd', 'BSCS', '2024-02-06', 'A', 'san isidro', '44', 'Juan dela cruz', '3', 'san Isidro', '2024-02-11 13:09:03', 'drop', '2024-02-11', '14:09:03'),
(39, 'admin', '$2y$10$G2AhsrCj/KVCl/JxTBVCC.63jXezOo4KyiUohWXLkguW0y/6P1yPS', 'johnpaulk24@gmail.com', 'San Isidro Elementary School', '2009', 'San Isidro High School', '20163', 'hcc', '2021', 'Criss Paolo', 'Pangan', 'Daquiz', 'male', '2nd', 'BSCE', '2024-02-24', 'A', 'san isidro', '1223', 'Juan dela cruz', '123', '123dffa', '2024-02-12 12:56:11', '', NULL, NULL),
(40, 'admin', '$2y$10$en6Jmbj04rbgIzviBlkwNueeRLplNcBR62b2FlX7IHSdhA7buXyxG', 'johnpaulk24@gmail.com', 'San Isidro Elementary School', '2009', 'San Isidro High School', '20163', 'hcc', '2021', 'Criss Paolo', 'Pangan', 'Daquiz', 'male', '2nd', 'BSCE', '2024-02-24', 'A', 'san isidro', '1223', 'Juan dela cruz', '123', '123dffa', '2024-02-12 12:59:55', 'reject', NULL, NULL),
(41, 'admin', '$2y$10$LBK/0PQaMPf.U1jxuU0pZOdjlBa1u7thXZjBx4y8sMze.8lHBY.zK', 'johnpaulk24@gmail.com', 'San Isidro Elementary School', '2009', 'San Isidro High School', '20163', 'hcc', '2021', 'Criss Paolo', 'Pangan', 'Daquiz', 'male', '2nd', 'BSCE', '2024-02-24', 'A', 'san isidro', '1223', 'Juan dela cruz', '123', '123dffa', '2024-02-12 13:03:49', 'reject', '2024-02-12', '14:03:49'),
(42, 'qwerty', '$2y$10$1UApfiV9.jgvv8EMUqhx6.jidAVYCXPADe2PhTAyBisR10yikN51u', 'johnpaulk24@gmail.com', 'San Isidro Elementary School', '2009', 'San Isidro High School', '20163', 'hcc', '2021', 'Daquiz', 'Pangan', 'Criss Paolo', 'male', '2nd', 'BSCE', '2024-02-24', 'A', 'san isidro', '1223', 'Juan dela cruz', '123', '123dffa', '2024-02-12 13:09:30', 'drop', '2024-02-12', '14:09:30'),
(43, 'jamps', '$2y$10$5ZJJ4Xe7Cmz0pEiji8TfHO/YJVlW4HganNhe8Z3zCdESYjaaf9whq', '09350961296@asfdf', 'San Isidro Elementary School', '2009', 'San Isidro High School', '2016', 'hcc', '2021', 'Santos', 'Pangan3', 'Criss Paolo', 'male', '1st', 'BSIT', '2024-02-22', 'A', 'san isidro', '1233', 'Juan dela cruz', '123', 'san Isidro', '2024-02-12 13:11:29', 'drop', '2024-02-12', '14:11:29'),
(44, 'jamps2', '$2y$10$3fmM/RTDqmRmbozKuqAC/OpVtxv7Dni5vyCLzPFdnJEC../1ss.fm', '09350961296@asfdf', 'San Isidro Elementary School', '2009', 'San Isidro High School', '2016', 'hcc', '2021', 'Criss Paolo', 'Pangan3', 'Santos', 'male', '1st', 'BSIT', '2024-02-22', 'A', 'san isidro', '1233', 'Juan dela cruz', '123', 'san Isidro', '2024-02-12 13:12:16', 'reject', '2024-02-12', '14:12:16'),
(45, 'jamps23', '$2y$10$ap4oAhKiS04H05yKs9seFuvNA8GTEoadtc/FtlB7FyBR0t9X2zvrm', 'johnpaulk24@gmail.com', 'San Isidro Elementary School', '2009', 'San Isidro High School', '2016', 'hcc', '2021', 'Santos', 'Pangan', 'Mark Angelo', 'male', '1st', 'BSIT', '2024-02-16', 'B', '123', '123', 'Juan dela cruz', '123', 'san Isidro', '2024-02-12 13:13:59', 'enrolled', '2024-02-12', '14:13:59'),
(46, 'admin23', '$2y$10$zqw3FeGcYHiRie3WUzUQkeygcbnCqxIUAO2X2m2vxV5MfRTT7bRA6', 'johnpaulk24@gmail.com', 'San Isidro Elementary School', '2009', '2016', '2016', 'hcc', '2021', 'Santos', 'wa', 'Mark Angelo', 'male', '1st', 'BSIT', '2024-02-13', 'A', 'san isidro', '123', 'Juan dela cruz', '123', 'san Isidro', '2024-02-12 13:16:03', 'drop', '2024-02-12', '14:16:03'),
(47, 'jamps2@student', '$2y$10$TthmoNAymJbJRtIGjYrZjegiabTf9edhhHaGcgVCwGHoAquXKg96i', 'mark@gmail.com', 'San Isidro Elementary School', '2009', 'San Isidro High School', '2016', 'hcc', '2021', 'John Paul', 'Cunanan', 'Santos', 'male', '2nd', 'BSCS', '2024-02-15', 'A', 'san isidro', '123', 'Juan dela cruz', '123', 'san Isidro', '2024-02-13 08:21:44', 'reject', '2024-02-13', '09:21:44'),
(48, 'admin69@student', '$2y$10$55rYz3LfAQ4/EBWCTebJT.CClxhBg6yFXmg0/YHns.TTtl5.D8HUe', 'johnpaulk24@gmail.com', 'San Isidro Elementary School', '2009', 'San Isidro High School', '20163', 'hcc', '2021', 'Gueco', 'Salac', 'noel', 'male', '1st', 'BSCS', '2024-02-01', 'A', 'san isidro', '123', 'Juan dela cruz', '123', '12', '2024-02-14 01:50:46', 'enrolled', '2024-02-14', '02:50:46'),
(49, 'cj@student', '$2y$10$gLlg3fwXgkupGaLO9a3osuJhBClZse3Oiho9V.MsaFc8KnFMHnyYS', 'cjsigua3@gmail.com', 'asdjsahdgsajka', '1334234', '243244', '34234', 'sfsfsdf', '3767', 'sigua', 'malonzo', 'cj', 'male', '1st', 'BSIT', '2024-02-17', 'B', 'arayat', '734234874823748', 'dbakdjsnjkf', '1111111111111111111', '222222222222222222222222222', '2024-02-15 11:33:42', 'enrolled', '2024-02-15', '12:33:42');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `instructor` varchar(255) NOT NULL,
  `courseyear` varchar(10) NOT NULL,
  `hours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject`, `course`, `instructor`, `courseyear`, `hours`) VALUES
(2, 'Introduction to Computing', 'BSIT', 'Mr. Juan Dela Cruz', '2nd', 5),
(3, 'Web Dev', 'BSIT', 'Mr. Juan Dela Cruz', '1st', 5);

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `message` text NOT NULL,
  `captcha_number` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(169) NOT NULL,
  `username` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `role`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE `year` (
  `id` int(100) NOT NULL,
  `year` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_form_submissions`
--
ALTER TABLE `contact_form_submissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cover`
--
ALTER TABLE `cover`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grid_content`
--
ALTER TABLE `grid_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grid_data`
--
ALTER TABLE `grid_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_profile`
--
ALTER TABLE `school_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_data`
--
ALTER TABLE `student_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `contact_form_submissions`
--
ALTER TABLE `contact_form_submissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cover`
--
ALTER TABLE `cover`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `grid_content`
--
ALTER TABLE `grid_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `grid_data`
--
ALTER TABLE `grid_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `id` int(169) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `school_profile`
--
ALTER TABLE `school_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student_data`
--
ALTER TABLE `student_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(169) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
