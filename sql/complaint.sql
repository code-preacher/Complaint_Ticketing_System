-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2021 at 04:23 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `complaint`
--

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE `complain` (
  `id` int(30) NOT NULL,
  `tid` varchar(200) NOT NULL,
  `matric_no` varchar(200) NOT NULL,
  `lecturer_id` int(30) NOT NULL,
  `course_id` int(30) NOT NULL,
  `msg1` text NOT NULL,
  `msg2` text NOT NULL,
  `status` int(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complain`
--

INSERT INTO `complain` (`id`, `tid`, `matric_no`, `lecturer_id`, `course_id`, `msg1`, `msg2`, `status`, `date_created`) VALUES
(5, '#bsu-complain-05112187552', 'bsu/sc/cmp/15/32204', 1, 6, 'help me,please', '', 1, '2021-11-05 04:27:31'),
(7, '#bsu-complain-05112169515', 'bsu/sc/cmp/15/32204', 1, 6, 'help', '', 2, '2021-11-05 04:29:02'),
(8, '#bsu-complain-05112169515', 'bsu/sc/cmp/15/32204', 1, 6, 'help', 'issue have been resolved', 3, '2021-11-05 04:29:02'),
(9, '#bsu-complain-05112191638', 'bsu/sc/cmp/15/32204', 1, 8, 'missing paper', 'sorry about that, the exam officer will fix it', 3, '2021-11-05 13:30:33');

-- --------------------------------------------------------

--
-- Table structure for table `complain_g`
--

CREATE TABLE `complain_g` (
  `id` int(30) NOT NULL,
  `sender` varchar(200) NOT NULL,
  `reciever` varchar(200) NOT NULL,
  `message` varchar(200) NOT NULL,
  `reply` text NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complain_g`
--

INSERT INTO `complain_g` (`id`, `sender`, `reciever`, `message`, `reply`, `date_created`) VALUES
(1, 'bsu/sc/cmp/15/32204', 'admin', 'hello tce issue', 'coming soon', '2021-10-22 06:22:46'),
(2, 'bsu/sc/cmp/15/32204', 'admin', 'I just paid my fees, i can\'t see course registration option', 'your payment is yet to be confirmed, please do bear a while', '2021-10-22 06:25:07'),
(3, 'bsu/sc/cmp/15/32204', 'admin', 'my exam card', 'You are yet to pay your fees', '2021-10-22 06:22:46'),
(4, 'bsu/sc/cmp/15/32204', 'admin', 'online payment issue', 'Network congestion', '2021-10-22 06:22:46'),
(5, 'bsu/sc/cmp/15/32204', 'admin', 'Course registration issue', 'Ensure that fees is paid.. if fees is paid, click on try again  when registration suddenly terminates', '2021-11-10 03:11:01');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `department_id` int(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `department_id`, `date_created`) VALUES
(6, 'MATHEMATICS', 1, '2021-11-04 08:21:48'),
(7, 'SOCIAL', 5, '2021-11-04 08:22:17'),
(8, 'FISHERY', 5, '2021-11-04 08:50:56');

-- --------------------------------------------------------

--
-- Table structure for table `course_allocation`
--

CREATE TABLE `course_allocation` (
  `id` int(30) NOT NULL,
  `lecturer_id` int(30) NOT NULL,
  `course_id` int(30) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_allocation`
--

INSERT INTO `course_allocation` (`id`, `lecturer_id`, `course_id`, `date_created`) VALUES
(1, 1, 6, '2021-11-04 08:47:32'),
(2, 1, 7, '2021-11-04 08:58:34');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `date_created`) VALUES
(1, 'APC', '2021-02-04 05:34:49'),
(3, 'PDP', '2021-02-04 11:40:14'),
(5, 'SOCIOLOGY', '2021-11-04 08:03:24');

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE `lecturer` (
  `id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `gender` varchar(30) NOT NULL,
  `state_id` int(20) NOT NULL,
  `department_id` int(20) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`id`, `name`, `email`, `password`, `phone`, `address`, `gender`, `state_id`, `department_id`, `date_created`) VALUES
(1, 'Lois', 'l@l.com', '123456', '08136473738', '61 boniface street', 'MALE', 11, 5, '2021-11-04 09:15:39'),
(2, 'Davi Petty', 'd@d.com', '123456', '08136473738', '61 boniface street', 'MALE', 16, 3, '2021-11-04 09:16:32');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` int(2) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `email`, `password`, `role`, `date_created`) VALUES
(1, 'Oche', 'a@a.com', '123456', 1, '2021-11-03 20:00:13'),
(5, 'Lois', 'l@l.com', '123456', 2, '2021-11-06 08:41:41'),
(6, 'friday', 'f@f.com', '123456', 3, '2021-11-06 08:41:41');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `name`) VALUES
(1, 'Abia State'),
(3, 'Akwa Ibom State'),
(4, 'Anambra State'),
(5, 'Bauchi State'),
(6, 'Bayelsa State'),
(7, 'Benue State'),
(8, 'Borno State'),
(9, 'Cross River State'),
(10, 'Delta State'),
(11, 'Ebonyi State'),
(12, 'Edo State'),
(13, 'Ekiti State'),
(14, 'Enugu State'),
(15, 'FCT'),
(16, 'Gombe State'),
(17, 'Imo State'),
(18, 'Jigawa State'),
(19, 'Kaduna State'),
(20, 'Kano State'),
(21, 'Katsina State'),
(22, 'Kebbi State'),
(23, 'Kogi State'),
(24, 'Kwara State'),
(25, 'Lagos State'),
(26, 'Nasarawa State'),
(27, 'Niger State'),
(28, 'Ogun State'),
(29, 'Ondo State'),
(30, 'Osun State'),
(31, 'Oyo State'),
(32, 'Plateau State'),
(33, 'Rivers State'),
(34, 'Sokoto State'),
(35, 'Taraba State'),
(36, 'Yobe State'),
(37, 'Zamfara State');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(30) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `gender` varchar(30) NOT NULL,
  `state_id` int(20) NOT NULL,
  `department_id` int(20) NOT NULL,
  `course_id` int(30) NOT NULL,
  `matric_no` varchar(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `email`, `password`, `phone`, `address`, `gender`, `state_id`, `department_id`, `course_id`, `matric_no`, `date_created`) VALUES
(1, 'friday', 'f@f.com', '123456', '08162023360', '61 boniface street', 'MALE', 20, 5, 7, 'bsu/sc/cmp/15/32204', '2021-11-04 13:35:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `complain`
--
ALTER TABLE `complain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complain_g`
--
ALTER TABLE `complain_g`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_allocation`
--
ALTER TABLE `course_allocation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `complain`
--
ALTER TABLE `complain`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `complain_g`
--
ALTER TABLE `complain_g`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `course_allocation`
--
ALTER TABLE `course_allocation`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lecturer`
--
ALTER TABLE `lecturer`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
