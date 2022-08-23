
-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 23, 2022 at 03:06 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `MyCollege`
--

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `std_id` varchar(15) NOT NULL,
  `std_name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `parents_name` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `yoj` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`std_id`, `std_name`, `address`, `gender`, `faculty_id`, `parents_name`, `phone`, `dob`, `yoj`) VALUES
('DIT-2076-001', 'Abhiyan Dhungana', 'Kathmandu', 'Male', 1, 'Krishna Dhungana', '9824850321', '2057-03-03', 8),
('DIT-2076-002', 'Alina K.C', 'Rukum', 'Female', 1, 'Lal Bhadur K.C', '9866160920', '2060-08-03', 8),
('DIT-2076-003', 'Amisha Satyal', 'Panauti', 'Female', 1, 'Amrit Raj Satyal', '9824850321', '2058-01-03', 8),
('DIT-2076-004', 'Anita Rana Magar', 'Koshipari', 'Female', 1, 'Gopal Magar', '9824850322', '2059-02-20', 8),
('DIT-2076-005', 'Ashish Acarya', 'Captionpur', 'Male', 1, 'Kishna Acarya', '9862411678', '2058-12-06', 8),
('DIT-2076-006', 'Bibek Mahat', 'Panauti', 'Male', 1, 'Ramu Mahat', '9840612096', '2059-11-10', 8),
('DIT-2076-007', 'Bibek Tamang', 'Dhanesawar', 'Male', 1, 'Rahu Tamang', '9824850301', '2057-03-03', 8),
('DIT-2076-008', 'Jibesh singh', 'Mahendranagar', 'Male', 1, 'Mukesh Singh', '9824850521', '2057-03-03', 8),
('DIT-2076-009', 'Bikee Kumar Sah', 'Parsa', 'Male', 1, 'Rampratap Sah', '9824857321', '2059-10-15', 8),
('DIT-2076-010', 'Bikesh Prajapati', 'Nala', 'Male', 1, 'Kamlesh Prajapati', '9824850421', '2057-03-13', 8),
('DIT-2076-011', 'Damber Rasaili', 'Bhaktpur', 'Male', 1, 'Rohan Rasaili', '9845351743', '2060-12-03', 8),
('DIT-2076-012', 'Dhan Kumari Pulami', 'Koshipari', 'Female', 1, 'Bimlesh Pilami', '9845654349', '2057-03-29', 8),
('DIT-2076-013', 'Dil bahadur Bk', 'Godavari', 'Male', 1, 'Khuisam Bk', '9824800321', '2059-03-28', 8),
('DIT-2076-014', 'Jayanti Raya', 'Nala', 'Female', 1, 'Shree Ram Raya', '9813868326', '2058-01-08', 8),
('DIT-2076-015', 'Karishma Bhandari', 'Suryabanak', 'Female', 1, 'Raqhul Bhandari', '9824850321', '2055-06-28', 8),
('DIT-2076-016', 'Kul Bahadur Thapa', 'Koshi', 'Male', 1, 'Kulkishor Thapa', '9824840321', '2058-08-30', 8),
('DIT-2076-017', 'Milan Tamang', 'Kathmandu', 'Male', 1, 'Kishori Tamang', '9824850221', '2057-03-03', 8),
('DIT-2076-018', 'Mukesh Awale', 'Banepa', 'Male', 1, 'Sushil Awale', '9824850321', '2057-04-03', 8),
('DIT-2076-019', 'Mukesh Mahato', 'Lahan', 'Male', 1, 'Ram Prakash Mahato', '9814794910', '2058-10-18', 8),
('DIT-2076-020', 'Najmul Hak Ansari', 'Kalaya', 'Male', 1, 'Khum Ansari', '9824830321', '2056-12-13', 8),
('DIT-2076-021', 'Nirmala Rawal', 'Rukum', 'Female', 1, 'Raj Rawal', '9814850321', '2057-08-15', 8),
('DIT-2076-022', 'Niruta Dahal', 'Bodual', 'Female', 1, 'Bhim Prasad Dahal', '9824000301', '2057-04-20', 8),
('DIT-2076-023', 'Nishcala Tamang', 'Pachkhal', 'Female', 1, 'Shyam Tamang', '9814850021', '2061-02-32', 8),
('DIT-2076-024', 'Nitesh Kumar Mishra', 'Sarlahi', 'Male', 1, 'Gautam Mishra', '9824850320', '2056-03-03', 8),
('DIT-2076-025', 'Parash Kumar Bhandari', 'Jhapa', 'Male', 1, 'Bhudi Bhandari', '9824850021', '2057-03-03', 8),
('DIT-2076-026', 'Prabin Jirel', 'Hostelnagar', 'Male', 1, 'Chandan Jirel', '9824850381', '2056-03-03', 8),
('DIT-2076-027', 'Prajisha Magrati', 'Panauti', 'Female', 1, 'Fakuchand Magrati', '9804850321', '2060-02-19', 8),
('DIT-2076-028', 'Prakriti Sapkota', 'Nala', 'Female', 1, 'Ramhari Sapkota', '9843057567', '2059-03-02', 8),
('DIT-2076-029', 'Prapti Sapkota', 'Banepa', 'Female', 1, 'Krish Sapkota', '9824850001', '2056-03-23', 8),
('DIT-2076-030', 'Rabindra Rokaya', 'Mostang', 'Male', 1, 'Manoj Rokaya', '9800850377', '2059-07-20', 8),
('DIT-2076-031', 'Rajan Shrestha', 'Banepa', 'Male', 1, 'Shambhu Shrestha', '9800851321', '2059-06-21', 8),
('DIT-2076-032', 'Rajesh Kunwar', 'Banepa', 'Male', 1, 'Bimlesh kumwar', '9800850325', '2059-07-30', 8),
('DIT-2076-033', 'Ram Bilash Kherwar', 'Saptari', 'Male', 1, 'Ramukaka Yadav', '9816705937', '2058-10-09', 8),
('DIT-2076-034', 'Rikshya Khwaunju', 'Panauti', 'Female', 1, 'Ripuraj Khwaunju', '9800850331', '2058-07-19', 8),
('DIT-2076-035', 'Rojik Bajgai', 'Banepa', 'Male', 1, 'Ramesh Bajgai', '980085030', '2059-08-27', 8),
('DIT-2076-036', 'Ruby Shrestha', 'Banepa', 'Female', 1, 'Ramakant Shrestha', '9800850329', '2054-07-19', 8),
('DIT-2076-037', 'Sabin Bhujel', 'Nala', 'Male', 1, 'Sanjay Bhujel', '9800851391', '2060-05-27', 8),
('DIT-2076-038', 'Sagar Bhusal', 'Lalitpur', 'Male', 1, 'Shree Bhusal', '9800850321', '2059-08-09', 8),
('DIT-2076-039', 'Sakriya Sainju', 'Kantipur', 'Male', 1, 'Shree Bhusal', '9899850330', '2054-02-23', 8),
('DIT-2076-040', 'Sanjeev kumar Pandit', 'Saptari', 'Male', 1, 'Mayor Pandit', '9899850332', '2057-07-07', 8),
('DIT-2076-041', 'Saron Shrestha', 'Panauti', 'Male', 1, 'Subodh Shrestha', '9899850334', '2055-12-23', 8),
('DIT-2076-042', 'Shuvam Sharma', 'Kathmandu', 'Male', 1, 'Anil Sharma', '9899850326', '2054-09-23', 8),
('DIT-2076-043', 'Subesh Raj Pandey', 'Mahendranagar', 'Male', 1, 'Ganesh Pandey', '9899850336', '2060-08-21', 8),
('DIT-2076-044', 'Sujan Tamang', 'Mostang', 'Male', 1, 'Bissu Tamang', '9899850338', '2058-03-23', 8),
('DIT-2076-045', 'Suresh Dahal', 'Jhapa', 'Male', 1, 'Prabin Dahal', '9899850340', '2054-11-23', 8),
('DIT-2076-046', 'Sushil Pandit', 'Dolkha', 'Male', 1, 'Suraj Pandit', '9899850342', '2054-04-23', 8),
('DIT-2076-047', 'Sushma Ranjitkar', 'Panauti', 'Female', 1, 'Smarat Ranjitkar', '9899850344', '2054-04-23', 8),
('DIT-2076-048', 'Ujwal suwal', 'Jagati', 'Male', 1, 'Rishikant Suwal', '9899850320', '2054-04-23', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`std_id`),
  ADD KEY `faculty_id` (`faculty_id`),
  ADD KEY `yoj` (`yoj`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty` (`faculty_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`yoj`) REFERENCES `batch` (`batch_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
