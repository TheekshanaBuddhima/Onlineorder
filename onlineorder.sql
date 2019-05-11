-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2019 at 01:13 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineorder`
--

-- --------------------------------------------------------

--
-- Table structure for table `function`
--

CREATE TABLE `function` (
  `fun_id` int(11) NOT NULL,
  `fun_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `function_role`
--

CREATE TABLE `function_role` (
  `fun_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `function_user`
--

CREATE TABLE `function_user` (
  `fun_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `log_id` int(11) NOT NULL,
  `log_in` datetime NOT NULL,
  `log_out` datetime NOT NULL,
  `log_ip` varchar(200) NOT NULL,
  `log_status` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `session_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`log_id`, `log_in`, `log_out`, `log_ip`, `log_status`, `user_id`, `session_id`) VALUES
(1, '2019-02-16 10:41:27', '0000-00-00 00:00:00', '::1', 'login', 1, '1_::1_1550293887'),
(2, '2019-02-16 11:51:38', '0000-00-00 00:00:00', '::1', 'login', 1, '1_::1_1550298098'),
(3, '2019-02-16 11:52:14', '0000-00-00 00:00:00', '::1', 'login', 1, '1_::1_1550298134'),
(4, '2019-02-16 12:16:39', '0000-00-00 00:00:00', '::1', 'login', 1, '1_::1_1550299599'),
(5, '2019-02-16 12:33:25', '0000-00-00 00:00:00', '::1', 'login', 1, '1_::1_1550300605'),
(6, '2019-02-16 12:34:15', '2019-02-16 12:34:22', '::1', 'logout', 1, '1_::1_1550300655'),
(7, '2019-02-16 16:25:42', '2019-02-16 16:32:05', '::1', 'logout', 1, '1_::1_1550314542'),
(8, '2019-03-02 11:37:07', '0000-00-00 00:00:00', '::1', 'login', 1, '1_::1_1551506827'),
(9, '2019-03-16 09:42:19', '0000-00-00 00:00:00', '::1', 'login', 1, '1_::1_1552709539'),
(10, '2019-03-20 08:16:19', '2019-03-20 08:16:25', '::1', 'logout', 1, '1_::1_1553049979'),
(11, '2019-03-23 11:47:44', '2019-03-23 13:07:56', '::1', 'logout', 1, '1_::1_1553321864'),
(12, '2019-03-23 13:10:21', '2019-03-23 13:10:28', '::1', 'logout', 1, '1_::1_1553326821'),
(13, '2019-03-23 13:10:54', '2019-03-23 13:11:05', '::1', 'logout', 1, '1_::1_1553326854'),
(14, '2019-03-23 13:11:21', '2019-03-23 13:11:23', '::1', 'logout', 5, '5_::1_1553326881'),
(15, '2019-03-23 13:11:37', '2019-03-23 13:11:40', '::1', 'logout', 1, '1_::1_1553326897'),
(16, '2019-03-23 13:11:51', '2019-03-23 13:11:56', '::1', 'logout', 5, '5_::1_1553326911'),
(17, '2019-03-23 13:12:23', '2019-03-23 15:20:17', '::1', 'logout', 1, '1_::1_1553326943'),
(18, '2019-03-23 15:20:37', '0000-00-00 00:00:00', '::1', 'login', 1, '1_::1_1553334637');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_email` varchar(255) NOT NULL,
  `login_pwd` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_email`, `login_pwd`, `user_id`) VALUES
('chamaralahiru@yahoo.com', '8cb2237d0679ca88db6464eac60da96345513964', 5),
('dilinamadhushan@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 1),
('madhawacn@gmail.com', '1a9b9508b6003b68ddfe03a9c8cbc4bd4388339b', 3),
('prabathl@gmail.com', '403d9917c3e950798601addf7ba82cd3c83f344b', 4),
('theekshana@gmail.com', '7b21848ac9af35be0ddb2d6b9fc3851934db8420', 2);

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `m_id` int(5) NOT NULL,
  `m_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`m_id`, `m_name`) VALUES
(1, 'User'),
(2, 'Order'),
(3, 'Customer'),
(4, 'Stock'),
(5, 'Item'),
(6, 'Purchase Order'),
(7, 'Delivery'),
(8, 'Supplier'),
(9, 'Feedback'),
(10, 'Notification'),
(11, 'Report'),
(12, 'Payment'),
(13, 'Backup'),
(14, 'Gift');

-- --------------------------------------------------------

--
-- Table structure for table `module_role`
--

CREATE TABLE `module_role` (
  `m_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module_role`
--

INSERT INTO `module_role` (`m_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(5, 1),
(5, 2),
(5, 3),
(5, 4),
(6, 1),
(6, 2),
(6, 3),
(6, 4),
(6, 5),
(7, 1),
(7, 2),
(7, 3),
(7, 4),
(8, 1),
(8, 2),
(8, 3),
(8, 4),
(9, 1),
(9, 2),
(10, 1),
(10, 2),
(10, 3),
(10, 4),
(10, 5),
(11, 1),
(11, 2),
(11, 3),
(11, 4),
(11, 5),
(12, 1),
(12, 2),
(13, 1),
(13, 2),
(14, 1),
(14, 2),
(14, 5);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'Owner'),
(2, 'Manager'),
(3, 'Stock Officer'),
(4, 'Staff'),
(5, 'Accountant');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_fname` varchar(200) NOT NULL,
  `user_lname` varchar(200) NOT NULL,
  `user_dob` date NOT NULL,
  `user_nic` varchar(20) NOT NULL,
  `user_tel` varchar(20) NOT NULL,
  `user_gender` varchar(10) NOT NULL,
  `user_image` text NOT NULL,
  `user_status` varchar(10) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_fname`, `user_lname`, `user_dob`, `user_nic`, `user_tel`, `user_gender`, `user_image`, `user_status`, `role_id`) VALUES
(1, 'Dilina', 'Madhushan', '1996-06-03', '111111111V', '', 'Male', '', 'Active', 1),
(2, 'Theekshana', 'Buddhima', '1997-07-15', '222222222V', '', 'Male', '', 'Active', 2),
(3, 'Madhawa', 'Dilshan', '1997-01-25', '333333333V', '', 'Male', '', 'Active', 3),
(4, 'Prabath', 'Lakshitha', '1995-02-03', '444444444V', '', 'Male', '', 'Active', 4),
(5, 'Lahiru', 'Chamara', '1995-02-13', '555555555V', '', 'Male', '', 'Active', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `function`
--
ALTER TABLE `function`
  ADD PRIMARY KEY (`fun_id`);

--
-- Indexes for table `function_role`
--
ALTER TABLE `function_role`
  ADD PRIMARY KEY (`fun_id`,`role_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `function_user`
--
ALTER TABLE `function_user`
  ADD PRIMARY KEY (`fun_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`log_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_email`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `module_role`
--
ALTER TABLE `module_role`
  ADD PRIMARY KEY (`m_id`,`role_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `function`
--
ALTER TABLE `function`
  MODIFY `fun_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `m_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `function_role`
--
ALTER TABLE `function_role`
  ADD CONSTRAINT `function_role_ibfk_1` FOREIGN KEY (`fun_id`) REFERENCES `function` (`fun_id`),
  ADD CONSTRAINT `function_role_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);

--
-- Constraints for table `function_user`
--
ALTER TABLE `function_user`
  ADD CONSTRAINT `function_user_ibfk_1` FOREIGN KEY (`fun_id`) REFERENCES `function` (`fun_id`),
  ADD CONSTRAINT `function_user_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `module_role`
--
ALTER TABLE `module_role`
  ADD CONSTRAINT `module_role_ibfk_1` FOREIGN KEY (`m_id`) REFERENCES `module` (`m_id`),
  ADD CONSTRAINT `module_role_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
