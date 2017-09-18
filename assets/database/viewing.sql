-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2017 at 06:28 AM
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
(18, '../../assets/images/admin.png', '', 'Administrator', '', 'admin@gmail.com', '9562211554', 'Female', 'Administrator', '$2y$10$.TO3f0wO3xGy/fNh6SINz.TIwFcX6k0D3Q7XSj.gYxDCJEmlqUSOC', 699014, 0, 0, '2017-09-09 05:05:38'),
(73, '../../assets/images/admin.png', 'Lozano', 'Adora', 'Sadia', 'adoralozano@gmail.com', '9123344556', 'Female', 'adoralozano', '$2y$10$5e1y16v6l9BvSm7Eh0plcOd8muZwPcUWu5tflEqXAoEGsEFKG13YG', 500006, 0, 2, '2017-09-09 21:36:20'),
(74, '../../assets/images/student_female.png', 'Romano', 'Mary Claire', 'Qui&ntilde;ones', 'romanomaryclaire@gmail.com', '9336101918', 'Female', 'A114C0270', '$2y$10$BsqLnv4Cn.QzDmIPZhEDxONv4RorGDlPwfwoPfbLDu.wpODJSAkG2', 845925, 0, 3, '2017-09-09 21:46:54'),
(75, '../../assets/images/student_female.png', 'Lucena', 'Diana Jane', 'Davis', 'dianalucenau121598@gmail.com', '9553318477', 'Female', 'A114C0440', '$2y$10$83wBF7pkAD1IzO9B00ptmu09FzEYhLrf/zf5k8za9eC.RrVQuzPte', 429635, 0, 3, '2017-09-09 07:17:46'),
(76, '../../assets/images/student_male.png', 'Saracanlao', 'Sam', 'japitana', 'zhamsaracanlao@yahoo.com', '9297470474', 'Male', 'A114C0447', '$2y$10$eMwhFPOcdlQZK9RY6y0A7.lqzfQaUrLJCwYxEA7wm4PgRpNS0Du3.', 538499, 0, 3, '2017-09-09 07:17:52'),
(77, '../../assets/images/student_male.png', 'Serquina', 'Dennis Dondon', 'Frando', 'ddserquina@gmail.com', '9970846704', 'Male', 'A114C0426', '$2y$10$TOZ8YCh7i64yF07M54SJ3OBvNxs.n9bvs0R3CpMTic4qM0r4f2nv.', 398920, 0, 3, '2017-09-09 07:17:50'),
(78, '../../assets/images/student_male.png', 'Francisco', 'Judy', 'Dela Fuente', 'tungsten022326@gmail.com', '9306669105', 'Male', 'A114C0268', '$2y$10$0ebZc6c2m3DK4tcGE7Yk8OO1DDlA3azuQqcpuSbhGiZPIs4OC9ujm', 902139, 0, 3, '2017-09-09 07:17:49'),
(79, '../../assets/images/student_male.png', 'Romano', 'Carmela', 'Qui&ntilde;ones', 'tungsten022326@gmail.com', '9306669105', 'Male', 'A114C0269', '$2y$10$CF9LQ4i0.VzFtS82JKSsz.rU2cneDrJPEocZ7aR6GwqieiodAt5Ie', 914527, 0, 3, '2017-09-09 07:17:55'),
(80, '../../assets/images/student_female.png', 'Cabuga', 'Jeddahlyn', 'Linzag', 'cabugajeddahlyn@gmail.com', '9265691158', 'Camarin', 'Capstone ', '$2y$10$3etoU.nvyRaVgaUCga6s2OojxA9KHeXSDkkD/X1RrBKgVUNF/D3/.', 268117, 0, 0, '2017-09-09 19:53:57'),
(81, '../../assets/images/student_female.png', 'Cabuga', 'Jeddahlyn', 'Linzag', 'cabugajeddahlyn@gmail.com', '9265691158', 'Female', 'A111G0001', '$2y$10$fl2V1GFMAw/7GIPPTzMQRO8RqLvSkKwoeS55NMXnLn1o4YQONdkZi', 883277, 0, 3, '2017-09-09 19:56:18'),
(82, '../../assets/images/admin.png', 'Admin', 'Admin', 'Admin', 'Admin@yahoo.com', '9228828288', 'Male', 'adminmoto', '$2y$10$7q6smPeiE/BF1PR36sV8tupQ6B7XbB7Vvs08lvKNVWw1kQ5f0G1fm', 488991, 0, 1, '2017-09-09 21:22:52');

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
(11, 'Balagtas'),
(13, 'ccxc');

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
(18, 'B.S. in Information Technology', 'Degree Courses');

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
  `g_add` varchar(255) NOT NULL,
  `final` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `professor_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `sy` varchar(255) NOT NULL,
  `code` int(11) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `professor_grades_tbl`
--

INSERT INTO `professor_grades_tbl` (`id`, `username`, `name`, `q_pl`, `q_mt`, `q_pf`, `q_fn`, `q_ave`, `q_result`, `e_pl`, `e_mt`, `e_pf`, `e_fn`, `e_ave`, `e_result`, `s_sio`, `s_result`, `grades`, `g_add`, `final`, `remarks`, `professor_id`, `status`, `branch`, `course`, `subject`, `section`, `sy`, `code`, `date`) VALUES
(64, 'A114C0270', 'Mary Claire Q. Romano', '100', '100', '100', '100', '100', '40', '100', '100', '100', '100', '100', '40', '20', '20', '100', '0', '100', '4.0', 73, 1, 'Cubao 2', 'B.S. in Information Technology', 'CAPSPRO', 'M72', '2017 - 2018', 446142, '2017-09-18'),
(65, 'A114C0440', 'Diana Jane D. Lucena', '98', '98', '98', '98', '98', '39.2', '98', '98', '98', '98', '98', '39.2', '20', '20', '98.4', '1', '99.4', '4.0', 73, 1, 'Cubao 2', 'B.S. in Information Technology', 'CAPSPRO', 'M72', '2017 - 2018', 446142, '2017-09-18'),
(66, 'A114C0447', 'Sam J. Saracanlao', '94', '94', '94', '94', '94', '37.6', '94', '94', '94', '94', '94', '37.6', '20', '20', '95.2', '2', '97.2', '3.5', 73, 1, 'Cubao 2', 'B.S. in Information Technology', 'CAPSPRO', 'M72', '2017 - 2018', 446142, '2017-09-18'),
(67, 'A114C0426', 'Dennis Dondon F. Serquina', '90', '90', '90', '90', '90', '36', '90', '90', '90', '90', '90', '36', '20', '20', '92', '3', '95', '3.5', 73, 1, 'Cubao 2', 'B.S. in Information Technology', 'CAPSPRO', 'M72', '2017 - 2018', 446142, '2017-09-18'),
(68, 'A114C0268', 'Judy Dela F. Francisco', '88', '88', '88', '88', '88', '35.2', '88', '88', '88', '88', '88', '35.2', '20', '20', '90.4', '4', '94.4', '3.5', 73, 1, 'Cubao 2', 'B.S. in Information Technology', 'CAPSPRO', 'M72', '2017 - 2018', 446142, '2017-09-18'),
(69, 'A114C0269', 'Carmela Q. Romano', '82', '82', '82', '82', '82', '32.8', '82', '82', '82', '82', '82', '32.8', '20', '20', '85.6', '5', '90.6', '2.5', 73, 1, 'Cubao 2', 'B.S. in Information Technology', 'CAPSPRO', 'M72', '2017 - 2018', 446142, '2017-09-18');

-- --------------------------------------------------------

--
-- Table structure for table `professor_students_tbl`
--

CREATE TABLE `professor_students_tbl` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `professor_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `professor_students_tbl`
--

INSERT INTO `professor_students_tbl` (`id`, `student_id`, `professor_id`) VALUES
(101, 51, 73),
(103, 52, 73),
(104, 53, 73),
(105, 54, 73),
(106, 55, 73),
(107, 56, 73),
(110, 60, 73);

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
-- Table structure for table `school_year_tbl`
--

CREATE TABLE `school_year_tbl` (
  `id` int(11) NOT NULL,
  `schoolyear` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_year_tbl`
--

INSERT INTO `school_year_tbl` (`id`, `schoolyear`) VALUES
(1, '2017 - 2018');

-- --------------------------------------------------------

--
-- Table structure for table `sections_tbl`
--

CREATE TABLE `sections_tbl` (
  `id` int(11) NOT NULL,
  `sections` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sections_tbl`
--

INSERT INTO `sections_tbl` (`id`, `sections`) VALUES
(28, 'M11'),
(29, 'M12'),
(30, 'M21'),
(31, 'M22'),
(32, 'M31'),
(33, 'M32'),
(34, 'M41'),
(35, 'M42'),
(36, 'M51'),
(37, 'M52'),
(38, 'M61'),
(39, 'M62'),
(40, 'M71'),
(41, 'M72'),
(42, 'M81'),
(43, 'M82'),
(44, 'A11'),
(45, 'A12'),
(46, 'A21'),
(47, 'A22'),
(48, 'A31'),
(49, 'A32'),
(50, 'A41'),
(51, 'A42'),
(52, 'A51'),
(53, 'A52'),
(54, 'A61'),
(55, 'A62'),
(56, 'A71'),
(57, 'A72'),
(58, 'A81'),
(59, 'A82'),
(60, 'E11'),
(61, 'E12'),
(62, 'E21'),
(63, 'E22'),
(64, 'E31'),
(65, 'E32'),
(66, 'E41'),
(67, 'E42'),
(68, 'E51'),
(69, 'E52'),
(70, 'E61'),
(71, 'E62'),
(72, 'E71'),
(73, 'E72'),
(74, 'E81'),
(75, 'E82');

-- --------------------------------------------------------

--
-- Table structure for table `students_tbl`
--

CREATE TABLE `students_tbl` (
  `student_id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `sy` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students_tbl`
--

INSERT INTO `students_tbl` (`student_id`, `subject`, `section`, `course`, `branch`, `username`, `sy`) VALUES
(51, 'CAPSPRO', 'M72', 'B.S. in Information Technology', 'Cubao 2', 'A114C0270', '2017 - 2018'),
(52, 'CAPSPRO', 'M72', 'B.S. in Information Technology', 'Cubao 2', 'A114C0440', '2017 - 2018'),
(53, 'CAPSPRO', 'M72', 'B.S. in Information Technology', 'Cubao 2', 'A114C0447', '2017 - 2018'),
(54, 'CAPSPRO', 'M72', 'B.S. in Information Technology', 'Cubao 2', 'A114C0426', '2017 - 2018'),
(55, 'CAPSPRO', 'M72', 'B.S. in Information Technology', 'Cubao 2', 'A114C0268', '2017 - 2018'),
(56, 'CAPSPRO', 'M72', 'B.S. in Information Technology', 'Cubao 2', 'A114C0269', '2017 - 2018'),
(59, 'CAPSPRO', 'M72', 'B.S. in Information Technology', 'Camarin', 'A111G0001', '2017 - 2018'),
(60, 'PROLA2', 'M32', 'B.S. in Information Technology', 'Cubao 2', 'A114C0270', '2017 - 2018');

-- --------------------------------------------------------

--
-- Table structure for table `subjects_tbl`
--

CREATE TABLE `subjects_tbl` (
  `id` int(11) NOT NULL,
  `course` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjects_tbl`
--

INSERT INTO `subjects_tbl` (`id`, `course`, `subject`, `section`) VALUES
(6, 'B.S. in Information Technology', 'CAPSPRO', 'M72'),
(8, 'B.S. in Information Technology', 'PROLA2', 'M42'),
(9, 'B.S. in Information Technology', 'PROLA3', 'M52');

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
-- Indexes for table `professor_grades_tbl`
--
ALTER TABLE `professor_grades_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `professor_students_tbl`
--
ALTER TABLE `professor_students_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests_tbl`
--
ALTER TABLE `requests_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_year_tbl`
--
ALTER TABLE `school_year_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections_tbl`
--
ALTER TABLE `sections_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students_tbl`
--
ALTER TABLE `students_tbl`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `subjects_tbl`
--
ALTER TABLE `subjects_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts_tbl`
--
ALTER TABLE `accounts_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT for table `branches_tbl`
--
ALTER TABLE `branches_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `courses_tbl`
--
ALTER TABLE `courses_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `professor_grades_tbl`
--
ALTER TABLE `professor_grades_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `professor_students_tbl`
--
ALTER TABLE `professor_students_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
--
-- AUTO_INCREMENT for table `requests_tbl`
--
ALTER TABLE `requests_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `school_year_tbl`
--
ALTER TABLE `school_year_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sections_tbl`
--
ALTER TABLE `sections_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `students_tbl`
--
ALTER TABLE `students_tbl`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `subjects_tbl`
--
ALTER TABLE `subjects_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
