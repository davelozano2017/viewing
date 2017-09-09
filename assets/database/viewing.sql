-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2017 at 08:36 AM
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
(18, '../../assets/images/admin.png', '', 'Administrator', '', 'admin@gmail.com', '9562211554', 'Female', 'Administrator', '$2y$10$.TO3f0wO3xGy/fNh6SINz.TIwFcX6k0D3Q7XSj.gYxDCJEmlqUSOC', 699014, 0, 0, '2017-09-09 06:05:38'),
(73, '../../assets/images/admin.png', 'Lozano', 'Adora', 'Sadia', 'adoralozano@gmail.com', '9123344556', 'Female', 'adoralozano', '$2y$10$5e1y16v6l9BvSm7Eh0plcOd8muZwPcUWu5tflEqXAoEGsEFKG13YG', 500006, 0, 2, '2017-09-08 17:17:07'),
(74, '../../assets/images/student_female.png', 'Romano', 'Mary Claire', 'Qui&ntilde;ones', 'romanomaryclaire@gmail.com', '9336101918', 'Female', 'A114C0270', '$2y$10$UbK81Z.aOdG.LicFZpI28OA2fLX5XA5UYaTrtlCk2DOfgonrW8fgu', 845925, 1, 3, '2017-09-08 18:16:08'),
(75, '../../assets/images/student_female.png', 'Lucena', 'Diana Jane', 'Davis', 'dianalucenau121598@gmail.com', '9553318477', 'Female', 'A114C0440', '$2y$10$83wBF7pkAD1IzO9B00ptmu09FzEYhLrf/zf5k8za9eC.RrVQuzPte', 429635, 1, 3, '2017-09-08 17:44:11'),
(76, '../../assets/images/student_male.png', 'Saracanlao', 'Sam', 'japitana', 'zhamsaracanlao@yahoo.com', '9297470474', 'Male', 'A114C0447', '$2y$10$eMwhFPOcdlQZK9RY6y0A7.lqzfQaUrLJCwYxEA7wm4PgRpNS0Du3.', 538499, 1, 3, '2017-09-08 18:01:37'),
(77, '../../assets/images/student_male.png', 'Serquina', 'Dennis Dondon', 'Frando', 'ddserquina@gmail.com', '9970846704', 'Male', 'A114C0426', '$2y$10$TOZ8YCh7i64yF07M54SJ3OBvNxs.n9bvs0R3CpMTic4qM0r4f2nv.', 398920, 1, 3, '2017-09-08 18:02:12'),
(78, '../../assets/images/student_male.png', 'Francisco', 'Judy', 'Dela Fuente', 'tungsten022326@gmail.com', '9306669105', 'Male', 'A114C0268', '$2y$10$0ebZc6c2m3DK4tcGE7Yk8OO1DDlA3azuQqcpuSbhGiZPIs4OC9ujm', 902139, 1, 3, '2017-09-08 18:02:39'),
(79, '../../assets/images/student_male.png', 'Romano', 'Carmela', 'Qui&ntilde;ones', 'tungsten022326@gmail.com', '9306669105', 'Male', 'A114C0269', '$2y$10$CF9LQ4i0.VzFtS82JKSsz.rU2cneDrJPEocZ7aR6GwqieiodAt5Ie', 914527, 1, 3, '2017-09-08 18:16:19');

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
(68, 73, 'B.S.  in Information Technology');

-- --------------------------------------------------------

--
-- Table structure for table `professor_grades_tbl`
--

CREATE TABLE `professor_grades_tbl` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `q_pl` varchar(255) NOT NULL,
  `q_mt` varchar(255) NOT NULL,
  `q_pf` varchar(255) NOT NULL,
  `q_fn` varchar(255) NOT NULL,
  `q_ave` varchar(255) NOT NULL,
  `q_result` varchar(255) NOT NULL,
  `e_pl` varchar(255) NOT NULL,
  `e_mt` varchar(255) NOT NULL,
  `e_pf` varchar(255) NOT NULL,
  `e_fn` varchar(255) NOT NULL,
  `e_ave` varchar(255) NOT NULL,
  `e_result` varchar(255) NOT NULL,
  `s_sio` varchar(255) NOT NULL,
  `s_result` varchar(255) NOT NULL,
  `grades` varchar(255) NOT NULL,
  `final` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `professor_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `code` int(11) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `professor_grades_tbl`
--

INSERT INTO `professor_grades_tbl` (`id`, `username`, `name`, `q_pl`, `q_mt`, `q_pf`, `q_fn`, `q_ave`, `q_result`, `e_pl`, `e_mt`, `e_pf`, `e_fn`, `e_ave`, `e_result`, `s_sio`, `s_result`, `grades`, `final`, `remarks`, `professor_id`, `status`, `branch`, `course`, `subject`, `section`, `code`, `date`) VALUES
(22, 'A114C0270', 'Mary Claire Q. Romano', '100', '100', '100', '100', '100', '40', '100', '100', '100', '100', '100', '40', '20', '20', '100', '100', '4.0', 73, 0, 'Cubao 2', 'B.S.  in Information Technology', 'Capstone ', 'M72', 201562, '2017-09-09'),
(23, 'A114C0440', 'Diana Jane D. Lucena', '100', '100', '100', '100', '100', '40', '100', '100', '100', '100', '100', '40', '20', '20', '100', '100', '4.0', 73, 0, 'Cubao 2', 'B.S.  in Information Technology', 'Capstone ', 'M72', 201562, '2017-09-09'),
(24, 'A114C0447', 'Sam J. Saracanlao', '100', '100', '100', '100', '100', '40', '100', '100', '100', '100', '100', '40', '20', '20', '100', '100', '4.0', 73, 0, 'Cubao 2', 'B.S.  in Information Technology', 'Capstone ', 'M72', 201562, '2017-09-09'),
(25, 'A114C0426', 'Dennis Dondon F. Serquina', '100', '100', '100', '100', '100', '40', '100', '100', '100', '100', '100', '40', '20', '20', '100', '100', '4.0', 73, 0, 'Cubao 2', 'B.S.  in Information Technology', 'Capstone ', 'M72', 201562, '2017-09-09'),
(26, 'A114C0268', 'Judy Dela F. Francisco', '100', '100', '100', '100', '100', '40', '100', '100', '100', '100', '100', '40', '20', '20', '100', '100', '4.0', 73, 0, 'Cubao 2', 'B.S.  in Information Technology', 'Capstone ', 'M72', 201562, '2017-09-09'),
(27, 'A114C0269', 'Carmela Q. Romano', '100', '100', '100', '100', '100', '40', '100', '100', '100', '100', '100', '0', '20', '20', '100', '100', '4.0', 73, 0, 'Cubao 2', 'B.S.  in Information Technology', 'Capstone ', 'M72', 201562, '2017-09-09');

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
(37, 73, 'M72');

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
(19, 73, 'B.S.  in Information Technology', 'Capstone ', 'M72');

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
(51, 73, 'Capstone ', 'M72', 'B.S.  in Information Technology', 'Cubao 2', 'A114C0270'),
(52, 73, 'Capstone ', 'M72', 'B.S.  in Information Technology', 'Cubao 2', 'A114C0440'),
(53, 73, 'Capstone ', 'M72', 'B.S.  in Information Technology', 'Cubao 2', 'A114C0447'),
(54, 73, 'Capstone ', 'M72', 'B.S.  in Information Technology', 'Cubao 2', 'A114C0426'),
(55, 73, 'Capstone ', 'M72', 'B.S.  in Information Technology', 'Cubao 2', 'A114C0268'),
(56, 73, 'Capstone ', 'M72', 'B.S.  in Information Technology', 'Cubao 2', 'A114C0269');

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
-- Indexes for table `professor_grades_tbl`
--
ALTER TABLE `professor_grades_tbl`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `professor_grades_tbl`
--
ALTER TABLE `professor_grades_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `professor_sections_tbl`
--
ALTER TABLE `professor_sections_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `professor_subjects_tbl`
--
ALTER TABLE `professor_subjects_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `requests_tbl`
--
ALTER TABLE `requests_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `students_tbl`
--
ALTER TABLE `students_tbl`
  MODIFY `studentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
