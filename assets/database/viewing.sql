-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2017 at 04:33 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `viewing`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts_tbl`
--

CREATE TABLE `accounts_tbl` (
  `id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `security_code` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts_tbl`
--

INSERT INTO `accounts_tbl` (`id`, `photo`, `lastname`, `firstname`, `middlename`, `email`, `contact`, `gender`, `username`, `password`, `security_code`, `status`, `role`, `created`) VALUES
(14, '../../assets/images/admin.png', '', 'Administrator', '', 'admin@yahoo.com', '9547774444', 'Male', 'administrator', '$2y$10$ybh9eYE20b6ZGrcZQnTeke5TsuuzZT42nxW6WHIBiI/dmOq8RQGKu', 447478, 0, 0, '2017-08-22 05:58:36'),
(15, '../../assets/images/admin.png', 'Cabuga', 'Jeddahlyn', 'Linzag', 'cabugajeddahlyn@gmail.com', '9555444888', 'Female', 'jeddahlyncabuga', '$2y$10$n4Gy65TpnohZIApYh.AGEu1g.K1dhuPo2.lLcGFrMM1xNxUdQzSE.', 749861, 0, 2, '2017-08-22 22:51:26'),
(18, '../../assets/images/admin.png', 'Lozano', 'Adora', 'Sadia', 'adoralozano@gmail.com', '9562211554', 'Female', 'adoralozano', '$2y$10$8VbiyjnoI5z6suXgrz4p4uOq85qmN0WuVzQUnQL55jGCn.HODfY5y', 699014, 0, 1, '2017-08-22 22:51:27'),
(38, '../../assets/images/student_male.png', 'Cruz', 'Juan', 'Dela', 'juandelacruz@gmail.com', '9115522447', 'Male', 'JuanCruzDela', '$2y$10$/0p5WQmItCvv.gYWZsRPcOBq/MipxCTwV/iLXVIuOtO/IMcwRnFuK', 860073, 1, 3, '2017-08-23 10:28:35');

-- --------------------------------------------------------

--
-- Table structure for table `branches_tbl`
--

CREATE TABLE `branches_tbl` (
  `id` int(11) NOT NULL,
  `branches` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branches_tbl`
--

INSERT INTO `branches_tbl` (`id`, `branches`) VALUES
(2, 'Camarin'),
(3, 'Lagro'),
(4, 'Zabarte'),
(5, 'Cubao 2'),
(6, 'Recto'),
(7, 'Monumento'),
(8, 'Marilao'),
(9, 'Pasig'),
(10, 'Meycauayan'),
(11, 'Balagtas');

-- --------------------------------------------------------

--
-- Table structure for table `courses_tbl`
--

CREATE TABLE `courses_tbl` (
  `id` int(11) NOT NULL,
  `courses` varchar(255) NOT NULL,
  `options` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses_tbl`
--

INSERT INTO `courses_tbl` (`id`, `courses`, `options`) VALUES
(9, 'Computer Science', 'Vocational Courses'),
(10, 'Computer Secretarial', 'Vocational Courses'),
(11, 'Computer Technician', 'Vocational Courses'),
(12, 'Electronic Technician', 'Vocational Courses'),
(13, 'B.S. in Computer Engineering', 'Degree Courses'),
(14, 'B.S.  in Computer Science', 'Degree Courses'),
(15, 'B.S.  in Business Administration', 'Degree Courses'),
(16, 'B.S.  in Office Administration', 'Degree Courses'),
(17, 'B.S.  in Hotel &amp; Restaurant Management', 'Degree Courses'),
(18, 'B.S.  in Technical Teacher Education', 'Degree Courses'),
(19, 'B.S.  in Tourism Management', 'Degree Courses'),
(29, 'B.S.  in Information Technology', 'Degree Courses');

-- --------------------------------------------------------

--
-- Table structure for table `professor_courses_tbl`
--

CREATE TABLE `professor_courses_tbl` (
  `id` int(11) NOT NULL,
  `professor_id` int(11) NOT NULL,
  `courses` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `professor_courses_tbl`
--

INSERT INTO `professor_courses_tbl` (`id`, `professor_id`, `courses`) VALUES
(30, 15, 'Computer Secretarial'),
(31, 15, 'B.S.  in Information Technology'),
(32, 15, 'B.S.  in Business Administration');

-- --------------------------------------------------------

--
-- Table structure for table `professor_sections_tbl`
--

CREATE TABLE `professor_sections_tbl` (
  `id` int(11) NOT NULL,
  `professor_id` int(11) NOT NULL,
  `professor_section` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `professor_sections_tbl`
--

INSERT INTO `professor_sections_tbl` (`id`, `professor_id`, `professor_section`) VALUES
(20, 15, 'A32'),
(21, 15, 'A42');

-- --------------------------------------------------------

--
-- Table structure for table `requests_tbl`
--

CREATE TABLE `requests_tbl` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students_tbl`
--

CREATE TABLE `students_tbl` (
  `id` int(11) NOT NULL,
  `professor_id` int(11) NOT NULL,
  `section` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students_tbl`
--

INSERT INTO `students_tbl` (`id`, `professor_id`, `section`, `course`, `branch`, `username`) VALUES
(7, 15, 'A42', 'B.S.  in Business Administration', 'Lagro', 'JuanCruzDela');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts_tbl`
--
ALTER TABLE `accounts_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches_tbl`
--
ALTER TABLE `branches_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses_tbl`
--
ALTER TABLE `courses_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `professor_courses_tbl`
--
ALTER TABLE `professor_courses_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `professor_sections_tbl`
--
ALTER TABLE `professor_sections_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests_tbl`
--
ALTER TABLE `requests_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students_tbl`
--
ALTER TABLE `students_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts_tbl`
--
ALTER TABLE `accounts_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `branches_tbl`
--
ALTER TABLE `branches_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `courses_tbl`
--
ALTER TABLE `courses_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `professor_courses_tbl`
--
ALTER TABLE `professor_courses_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `professor_sections_tbl`
--
ALTER TABLE `professor_sections_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `requests_tbl`
--
ALTER TABLE `requests_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `students_tbl`
--
ALTER TABLE `students_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
