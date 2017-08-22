-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2017 at 08:51 PM
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
(15, '../../assets/images/admin.png', 'Cabuga', 'Jeddahlyn', 'Linzag', 'cabugajeddahlyn@gmail.com', '9555444888', 'Female', 'jeddahlyncabuga', '$2y$10$n4Gy65TpnohZIApYh.AGEu1g.K1dhuPo2.lLcGFrMM1xNxUdQzSE.', 749861, 0, 1, '2017-08-22 18:25:37'),
(18, '../../assets/images/admin.png', 'Lozano', 'Adora', 'Sadia', 'adoralozano@gmail.com', '9562211554', 'Female', 'adoralozano', '$2y$10$8VbiyjnoI5z6suXgrz4p4uOq85qmN0WuVzQUnQL55jGCn.HODfY5y', 699014, 1, 2, '2017-08-22 18:24:07');

-- --------------------------------------------------------

--
-- Table structure for table `requests_tbl`
--

CREATE TABLE `requests_tbl` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests_tbl`
--

INSERT INTO `requests_tbl` (`id`, `name`, `username`, `contact`, `role`) VALUES
(4, 'John David', '', '', 1),
(5, 'Jeddahlyn', '', '', 2),
(6, 'Jade', '', '', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts_tbl`
--
ALTER TABLE `accounts_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests_tbl`
--
ALTER TABLE `requests_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts_tbl`
--
ALTER TABLE `accounts_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `requests_tbl`
--
ALTER TABLE `requests_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
