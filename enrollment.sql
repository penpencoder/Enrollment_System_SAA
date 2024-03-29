-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 07, 2019 at 05:24 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enrollment`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `announce_id` int(11) NOT NULL,
  `announcement` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`announce_id`, `announcement`, `date`) VALUES
(9, 'final input of grades is on friday', '2019-05-02 15:12:39'),
(10, 'Another Announcement', '2019-05-02 15:24:35'),
(11, 'More annoucement', '2019-05-02 15:29:11'),
(12, 'post anouncment', '2019-05-02 15:31:57'),
(13, 'anuna boyyy', '2019-05-02 15:32:26'),
(14, 'testing allert', '2019-05-02 15:33:59'),
(15, 'testing', '2019-05-02 15:35:48'),
(16, 'Final Input Of Grades is on Friday', '2019-05-03 02:03:25'),
(17, 'Grades will be locked today at 4:00pm', '2019-05-05 08:54:45');

-- --------------------------------------------------------

--
-- Table structure for table `clearance`
--

CREATE TABLE `clearance` (
  `clearance_id` int(11) NOT NULL,
  `lrn` varchar(255) NOT NULL,
  `grade_level` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `subject_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clearance`
--

INSERT INTO `clearance` (`clearance_id`, `lrn`, `grade_level`, `status`, `subject_id`) VALUES
(10, '1081789580', '7', '0', ''),
(11, '1095163189', '8', '0', ''),
(12, '1092380588', '7', '0', ''),
(13, '1044609096', '7', '1', ''),
(15, '1108414836', '7', '0', ''),
(16, '1067864989', '7', '0', ''),
(17, '1100019968', '7', '0', ''),
(18, '1003380319', '7', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `enrollment`
--

CREATE TABLE `enrollment` (
  `enrollment_id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `status` enum('pending','enrolled') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrollment`
--

INSERT INTO `enrollment` (`enrollment_id`, `student_id`, `status`) VALUES
(2, '40', 'enrolled'),
(3, '43', 'enrolled'),
(5, '45', 'enrolled'),
(6, '46', 'enrolled'),
(8, '48', 'pending'),
(9, '49', 'pending'),
(10, '50', 'pending'),
(11, '51', 'pending'),
(12, '52', 'pending'),
(13, '53', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` int(11) NOT NULL,
  `faculty_id_number` varchar(255) NOT NULL,
  `family_name` text NOT NULL,
  `first_name` text NOT NULL,
  `middle_name` text NOT NULL,
  `bday` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `faculty_id_number`, `family_name`, `first_name`, `middle_name`, `bday`, `address`, `mobile_number`) VALUES
(4, '498893', 'Paleracio', 'Errol', 'VOVO', '2019-01-01', 'Laoag City, Ilocos Norte', '09588848838'),
(5, '29099', 'Barroga', 'William', 'Will', '2019-01-01', 'Piddig, Ilocon Norte', '098776543312'),
(6, '12899488', 'Balatico', 'Steve', 'Rey', '2019-12-01', 'Laoag City, Ilocos Norte', '09487857883'),
(7, '10001', 'Andres', 'Charles', 'Jr', '1997-09-12', 'Laoag City, Ilocos Norte', '09899876543'),
(8, '10002', 'lorenzo', 'vince', 'linbergh', '1999-03-29', 'piddig, ilocos norte', '09098987677'),
(9, '111111', 'q', 'q', 'q', '0001-01-01', 'q', '66');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `grade_id` int(11) NOT NULL,
  `faculty_id` varchar(255) NOT NULL,
  `subject_id` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `first_grading` varchar(255) NOT NULL,
  `first_grading_lock` int(11) NOT NULL,
  `second_grading` varchar(255) NOT NULL,
  `second_grading_lock` int(11) NOT NULL,
  `third_grading` varchar(255) NOT NULL,
  `third_grading_lock` int(11) NOT NULL,
  `fourth_grading` varchar(255) NOT NULL,
  `fourth_grading_lock` int(11) NOT NULL,
  `lock` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`grade_id`, `faculty_id`, `subject_id`, `student_id`, `first_grading`, `first_grading_lock`, `second_grading`, `second_grading_lock`, `third_grading`, `third_grading_lock`, `fourth_grading`, `fourth_grading_lock`, `lock`) VALUES
(26, '10002', '15', '1092380588', '98', 1, '', 1, '', 1, '', 1, '1'),
(27, '10002', '18', '1081789580', '23', 1, '95', 1, '95', 1, '95', 1, '1'),
(28, '10002', '18', '1095163189', '22', 1, '99', 1, '48', 1, '', 1, '1'),
(29, '10002', '15', '1044609096', '88', 1, '', 1, '', 1, '', 1, '1'),
(34, '10002', '15', '1108414836', '99', 1, '', 1, '', 1, '', 1, '1'),
(35, '10002', '15', '1067864989', '99', 1, '', 1, '', 1, '', 1, '1'),
(36, '10002', '15', '1100019968', '78', 1, '', 1, '', 1, '', 1, '1'),
(37, '10002', '15', '1003380319', '85', 1, '', 1, '', 1, '', 1, '1');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `time_id` int(11) NOT NULL,
  `school_year_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `faculty_id`, `subject_id`, `time_id`, `school_year_id`) VALUES
(19, 8, 15, 1, 4),
(21, 7, 20, 3, 4),
(24, 8, 18, 6, 4),
(25, 9, 21, 1, 4),
(26, 4, 15, 1, 4),
(27, 4, 15, 8, 4),
(28, 5, 20, 1, 4),
(29, 8, 22, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `school_year`
--

CREATE TABLE `school_year` (
  `school_year_id` int(11) NOT NULL,
  `school_year_start` int(11) NOT NULL,
  `school_year_end` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school_year`
--

INSERT INTO `school_year` (`school_year_id`, `school_year_start`, `school_year_end`) VALUES
(4, 2019, 2020),
(7, 2020, 2021),
(9, 2021, 2022),
(10, 2022, 2023),
(11, 2023, 2024),
(12, 2024, 2025);

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `section_id` int(11) NOT NULL,
  `section_name` varchar(255) NOT NULL,
  `grade_level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`section_id`, `section_name`, `grade_level`) VALUES
(16, 'St. Stephen', 7),
(19, 'St. Vince', 7),
(20, 'St. Keane', 8),
(21, 'St. Luke', 8);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `lrn` varchar(255) NOT NULL,
  `grade_level_id` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `school_year` varchar(255) NOT NULL,
  `family_name` text NOT NULL,
  `first_name` text NOT NULL,
  `middle_name` text NOT NULL,
  `bday` date NOT NULL,
  `gender` text NOT NULL,
  `address` varchar(255) NOT NULL,
  `status` text NOT NULL,
  `mother_tounge` text NOT NULL,
  `religion` text NOT NULL,
  `ethnicity` text NOT NULL,
  `dialect` text NOT NULL,
  `other_details` text NOT NULL,
  `school_id_number` varchar(255) NOT NULL,
  `school_name` text NOT NULL,
  `adviser_name` text NOT NULL,
  `father_name` text NOT NULL,
  `mother_name` text NOT NULL,
  `guardian_name` text NOT NULL,
  `mobile_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `lrn`, `grade_level_id`, `section`, `school_year`, `family_name`, `first_name`, `middle_name`, `bday`, `gender`, `address`, `status`, `mother_tounge`, `religion`, `ethnicity`, `dialect`, `other_details`, `school_id_number`, `school_name`, `adviser_name`, `father_name`, `mother_name`, `guardian_name`, `mobile_number`) VALUES
(54, '1081789580', '8', '', '4', 'Lorenzo', 'Vince', 'Linbergh', '1999-02-27', 'male', 'Piddig, Ilocos Norte', 'Regular', 'Filipino', 'Roman Catholic', 'Ilocano', 'Iloco', 'none', '1000200', 'Saint Anne Academy', 'Elizabeth', 'Jimmy', 'Neutron', 'Galaxy', '09480380883'),
(55, '1095163189', '8', '', '4', 'Bolusan', 'Keane', 'Audren', '1998-09-18', 'male', 'Bacarra, Ilocos Norte', 'Regular', 'Filipino', 'Roman Catholic', 'Ilocano', 'Iloco', 'none', '7896952', 'Saint Anne Academy', 'Charles', 'asddfg', 'fghhjy', 'hijlk', '09876543212'),
(56, '1092380588', '7', '', '4', 'b', 'a', 'a', '0009-09-09', 'male', 'a', 'Regular', 'a', 'a', 'a', 'a', 'none', '7', 'a', 'a', 'a', 'a', 'a', '8'),
(58, '1044609096', '7', '', '4', 'q', 'q', 'q', '0009-09-09', 'male', 'q', 'Regular', 'q', 'q', 'q', 'q', 'none', '7', 'q', 'q', 'q', 'q', 'q', '9'),
(60, '1108414836', '7', '', '4', 'Ballesteros', 'Shaina', 'Pascual', '1999-01-27', 'female', 'Laoag City, Ilocos Norte', 'Regular', 'asdf', 'sadfjjh', 'jhlkj', 'lkjh', 'none', '24958', 'asdfkjlhljahs', 'Charles Andres', 'asdf', 'kjh', 'kjh', '0988992899290'),
(61, '1067864989', '7', '', '4', 'Pascual', 'Stephen Pogi', 'Robinos', '2019-01-01', 'male', 'Laoag City, Ilocos Norte', 'Regular', 'd', 'kj', 'kj', 'kjb', 'none', '98', 'kjh', 'kjh', 'kj', 'kh', 'kjh', '4'),
(62, '1100019968', '7', '', '4', 'Andres', 'Boadu', 'dsf', '2019-01-01', 'male', 'kjkjh', 'Regular', 'jhb', 'jhb', 'jhb', 'jhb', 'none', '88', 'kjb', 'j', 'kjkj', 'kjn', 'kjn', '0909'),
(63, '1003380319', '7', '', '4', 'm', 'm', 'm', '1999-09-08', 'male', 'm', 'Regular', 'm', 'm', 'm', 'm', 'none', '9', 'm', 'm', 'm', 'm', 'm', '9');

-- --------------------------------------------------------

--
-- Table structure for table `student_subject`
--

CREATE TABLE `student_subject` (
  `student_subject_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `school_year_id` int(11) NOT NULL,
  `1_grading` int(11) NOT NULL,
  `2_grading` int(11) NOT NULL,
  `3_grading` int(11) NOT NULL,
  `4_grading` int(11) NOT NULL,
  `final_grade` int(11) NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `subject_code` varchar(50) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `grade_level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_code`, `subject_name`, `grade_level`) VALUES
(15, '1925', 'Math 001', '7'),
(16, '7204', 'English 001', '7'),
(18, '7831', 'Math 002', '8'),
(20, '9425', 'English 002', '8'),
(22, '9923', 'Araling Panlipunan (AP) 001', '1');

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE `time` (
  `time_id` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`time_id`, `start_time`, `end_time`) VALUES
(1, '07:30:00', '08:30:00'),
(2, '08:30:00', '09:30:00'),
(3, '09:30:00', '10:30:00'),
(4, '10:30:00', '11:30:00'),
(6, '01:00:00', '02:00:00'),
(7, '02:00:00', '03:00:00'),
(8, '03:00:00', '04:00:00'),
(9, '04:00:00', '05:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `faculty_id` varchar(255) NOT NULL,
  `lrn` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `role` enum('student','faculty','enrollment officer','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `faculty_id`, `lrn`, `username`, `password`, `status`, `role`) VALUES
(1, '', '', 'admin', 'admin', '1', 'admin'),
(12, '', '', 'will', 'will', '1', 'enrollment officer'),
(26, '10001', '', 'charles', 'charles1', '1', 'faculty'),
(28, '10002', '', 'vince', 'vince', '1', 'faculty'),
(32, '10002', '', 'vince1', 'vince1', '1', 'enrollment officer'),
(33, '', '1081789580', 'lorenzo', 'linbergh', '1', 'student'),
(34, '', '1095163189', 'keanee', 'audren11', '0', 'student'),
(35, '', '1092380588', 'aaaaaaaaa', 'aaaaaaaaaaa', '0', 'student'),
(36, '', '1003380319', 'mmmmmm', 'mmmmmmmm', '1', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`announce_id`);

--
-- Indexes for table `clearance`
--
ALTER TABLE `clearance`
  ADD PRIMARY KEY (`clearance_id`);

--
-- Indexes for table `enrollment`
--
ALTER TABLE `enrollment`
  ADD PRIMARY KEY (`enrollment_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`grade_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `school_year`
--
ALTER TABLE `school_year`
  ADD PRIMARY KEY (`school_year_id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student_subject`
--
ALTER TABLE `student_subject`
  ADD PRIMARY KEY (`student_subject_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`time_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `announce_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `clearance`
--
ALTER TABLE `clearance`
  MODIFY `clearance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `enrollment`
--
ALTER TABLE `enrollment`
  MODIFY `enrollment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `faculty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `school_year`
--
ALTER TABLE `school_year`
  MODIFY `school_year_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `student_subject`
--
ALTER TABLE `student_subject`
  MODIFY `student_subject_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `time`
--
ALTER TABLE `time`
  MODIFY `time_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `student_subject`
--
ALTER TABLE `student_subject`
  ADD CONSTRAINT `student_subject_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_subject_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
