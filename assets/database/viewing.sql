-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2017 at 04:49 AM
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
(18, '../../assets/images/admin.png', 'Lozano', 'Adora', 'Sadia', 'adoralozano@gmail.com', '9562211554', 'Female', 'adoralozano', '$2y$10$8VbiyjnoI5z6suXgrz4p4uOq85qmN0WuVzQUnQL55jGCn.HODfY5y', 699014, 0, 0, '2017-09-04 08:18:52'),
(54, '../../assets/images/admin.png', 'Admin', 'Admin', 'Admin', 'Admin@yahoo.com', '9222828282', 'Male', 'Admin', '$2y$10$bJxTsWubRofo8t1trbb4Ce8IVa3CHK8EH2w6MZXE6EOPNqHr4jMpm', 880249, 1, 1, '2017-09-04 08:31:49'),
(55, '../../assets/images/admin.png', 'zxczxc', 'zxczxc', 'zxczxc', 'zxczxc@aa.co', '1313181812', 'Male', 'zxczxc', '$2y$10$rD2ts/G3XqvOGu2jc9rstOI5fmBampm6ndqvFFL9N6m6XMog6KR2q', 379195, 1, 1, '2017-09-04 08:27:58'),
(56, '../../assets/images/admin.png', 'asd', 'asd', 'asd', 'asd@aa.co', '1313131311', 'Male', 'asdasd', '$2y$10$AUd.vSOUbqQvj3Zy0mOPZ.cdECWMwcIV2bLwzs/Oidqhxe.BhSDYq', 789931, 1, 1, '2017-09-04 08:32:09'),
(57, '../../assets/images/admin.png', 'Cabuga', 'Jeddahlyn', 'Linzag', 'cabugajeddahlyn@gmail.com', '9555773952', 'Female', 'jeddahlyncabuga', '$2y$10$UWTXqe5zN.mUGLJMHiahJ.UGWctXlZYWsG7GpEwMnuRxo4Rpg4Rbe', 960688, 0, 2, '2017-09-04 08:33:17'),
(72, '../../assets/images/student_male.png', 'Lozano', 'John David', 'Sadia', 'lozanojohndavid@gmail.com', '9555773952', 'Male', 'A111G0001', '$2y$10$jbnXySo5rLD.t2uJMRU.yuo6qQm6CMoyEe.O6N/q1IODADL3q9B7O', 125465, 1, 3, '2017-09-05 02:44:24');

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
(64, 57, 'B.S.  in Information Technology'),
(66, 57, 'B.S.  in Computer Science'),
(67, 57, 'B.S. in Computer Engineering');

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
(34, 57, 'M 22'),
(35, 57, 'M 42'),
(36, 57, 'M 62');

-- --------------------------------------------------------

--
-- Table structure for table `professor_subjects_tbl`
--

CREATE TABLE `professor_subjects_tbl` (
  `id` int(11) NOT NULL,
  `professor_id` int(11) NOT NULL,
  `course` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `professor_subjects_tbl`
--

INSERT INTO `professor_subjects_tbl` (`id`, `professor_id`, `course`, `subject`, `section`) VALUES
(16, 57, 'B.S.  in Information Technology', 'Prola 3', 'M 62');

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
  `studentid` int(11) NOT NULL,
  `professor_id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students_tbl`
--

INSERT INTO `students_tbl` (`studentid`, `professor_id`, `subject`, `section`, `course`, `branch`, `username`) VALUES
(48, 57, 'Prola 3', 'M 62', 'B.S.  in Information Technology', 'Camarin', 'A111G0001');

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
-- Indexes for table `professor_subjects_tbl`
--
ALTER TABLE `professor_subjects_tbl`
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
  ADD PRIMARY KEY (`studentid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts_tbl`
--
ALTER TABLE `accounts_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `professor_sections_tbl`
--
ALTER TABLE `professor_sections_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `professor_subjects_tbl`
--
ALTER TABLE `professor_subjects_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `requests_tbl`
--
ALTER TABLE `requests_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `students_tbl`
--
ALTER TABLE `students_tbl`
  MODIFY `studentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
