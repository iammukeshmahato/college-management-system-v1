-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 23, 2022 at 03:13 AM
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
-- Table structure for table `Admin_list`
--

CREATE TABLE `Admin_list` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Admin_list`
--

INSERT INTO `Admin_list` (`id`, `fullname`, `username`, `password`, `image_id`) VALUES
(1, 'Mukesh Mahato', 'iammukeshmahato', '662f707d5491e9bce8238a6c0be92190', 'Mukesh.jpeg'),
(2, 'Sanjeev Pandit', 'mesanjeevsu', 'bf62343936ba2dd99a7b429dc36ad55b', 'sanjeev.jpeg'),
(3, 'Bikee Kumar Sah', 'Bikeeshah248', 'e6326800eaa8c727c0cf6bcbb2e8f969', 'bikee.jpg'),
(4, 'Dhan Kumari Pulami', 'dhankumaripulami', '604c3fe4b9ccbc773e7ccd3056e74080', 'dhan_kumari.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `batch_id` int(11) NOT NULL,
  `batch_name` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`batch_id`, `batch_name`) VALUES
(1, 2069),
(2, 2070),
(3, 2071),
(4, 2072),
(5, 2073),
(6, 2074),
(7, 2075),
(8, 2076),
(9, 2077),
(10, 2078),
(11, 2079);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` int(11) NOT NULL,
  `faculty_name` varchar(100) NOT NULL,
  `faculty_code` varchar(2) NOT NULL,
  `faculty_short` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `faculty_name`, `faculty_code`, `faculty_short`) VALUES
(1, 'Diploma In Information Technology', '17', 'DIT'),
(2, 'Diploma In Civil Engineering', '02', 'DCE'),
(3, 'Diploma In Electrical Engineering', '', 'DEE'),
(4, 'Diploma In Geomatics Engineering', '', 'DGE'),
(5, 'Diploma In Hotel Management', '', 'DHM');

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

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `t_id` int(11) NOT NULL,
  `t_name` varchar(100) NOT NULL,
  `t_address` varchar(100) NOT NULL,
  `t_contact` varchar(10) NOT NULL,
  `t_email` varchar(100) NOT NULL,
  `t_gender` varchar(10) NOT NULL,
  `t_qualification` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`t_id`, `t_name`, `t_address`, `t_contact`, `t_email`, `t_gender`, `t_qualification`) VALUES
(1, 'Ajay Acharya', 'Sanga-2', '9863510808', 'Ajayacharya657@gmail.com', 'Male', 'B.sc in accountant'),
(2, 'Anup Bhuju', 'Suryabanaka-3', '9841604541', 'iammanupbhuju@gmail.com', 'Male', 'M.sc in computer'),
(3, 'Bed Prasad Neupane', 'Nala-3', '9841664776', 'bedpraasadneupane@gmail.com', 'Male', 'M.sc in computer'),
(4, 'Bharat Sapkota', 'Chitwan-5', '9841639147', 'sapkotaBharat675@gmail.com', 'Male', 'B.sc in computer science'),
(5, 'Bikash Kumar Singh', 'Janakpur-18', '9849947308', 'bikashsingh4@gmail.com', 'Male', 'M.sc in electrical'),
(6, 'Dinesh Humagain', 'Dhukhiel-15', '9841290234', 'dineshhumagain354@gmail.com', 'Male', 'B.sc in computer science'),
(7, 'Dr. Rajendra Shrestha', 'Khosaltayar-3', '9841836861', 'shresthaRajendra@gmail.com', 'Male', 'M.sc in computer'),
(8, 'Govinda Gautam', 'Thimi-8', '9849019829', 'govinda_Gautam@gmail.com', 'Male', 'B.sc in computer science'),
(9, 'Ishwar Chandra Ghimire', 'Banepa-5', '9851212625', 'Ishwarchandra321@gmail.com', 'Male', 'M.sc in computer'),
(10, 'Manish Bhagat', 'Janakpur-5', '9813692885', 'manishbhagat453@gmail.com', 'Male', 'B.sc in computer science'),
(11, 'Mukesh Mahato', 'Lahan', '9814234567', 'example@gmail.com', 'Male', 'B.Sc '),
(12, 'Nisha Bhochhibhoya', 'Pulbazar-6', '9841007857', 'nishabhoch78@gmail.com', 'Female', 'B.sc in computer science'),
(13, 'Prabin Shrestha', 'Bhaktpur-1', '9841405946', 'prabinshrestha342@gmail.com', 'Male', 'B.sc in computer science'),
(14, 'Pukar Parajuli', 'Bharatpur-6', '9856053980', 'pukarprajuli149@gmail.com', 'Male', 'B.sc in accountant'),
(15, 'Rabindra Prajapati', 'Newroad-13', '9849929529', 'info_rabindra@gmail.com', 'Male', 'M.sc in computer'),
(16, 'Ramji Khatri', 'Nala-3', '9849631114', 'ramjikhatri7@gmail.com', 'Male', 'B.sc in accountant'),
(17, 'Rita Silpakar', 'Kamalpokhri-13', '9841330262', 'ritashilpakar645@gmail.com', 'Female', 'M.sc in computer'),
(18, 'Rojil Shrestha', 'Kathmandu-18', '9849019829', 'rojilShrestha@gmail.com', 'Male', 'B.sc in computer science'),
(19, 'Sabin Baniya', 'Kathmandu-14', '9841290234', 'sabinbaniya980@gmail.com', 'Male', 'B.sc in computer science'),
(20, 'Saroj Baniya', 'Kathmandu-4', '9841615299', 'sarojbanya453@gmail.com', 'Male', 'B.sc in accountant'),
(21, 'Satya Dev Pandit', 'Kathmandu-14', '9861291594', 'satyaDevPandit@gmail.com', 'Male', 'B.sc in accountant'),
(22, 'shubas Bhuju', 'Bhaktapur-7', '9860335692', 'contact@shubash.com', 'Male', 'B.sc in computer science'),
(23, 'Sujan Nepali', 'Dhukhiel-5', '9861291592', 'sujan_nepali@gmail.com', 'Male', 'B.sc in accountant'),
(24, 'Sujan Sapkota', 'Nabalpur-7', '9849165519', 'sujansapkota879@gmail.com', 'Male', 'B.sc in accountant'),
(25, 'Suman Sigh Thakuri', 'Bhandipur-15', '9869418840', 'sumansighthakuri@gmail.com', 'Male', 'B.sc in accountant'),
(26, 'Sumit Bidari', 'Bhaktapur-5', '9845031869', 'contact@sumitbidari.com', 'Male', 'M.sc in computer'),
(27, 'Sunil Kumar Sah', 'Janakpur-14', '9841290234', 'sunilkumarsah897@gmail.com', 'Male', 'B.sc in computer science'),
(28, 'Suraj K.C.', 'Newbuspark-4', '9849019829', 'KC_suraj@gmail.com', 'Male', 'B.sc in computer science'),
(29, 'Suraj Karki', 'Banepa-5', '9849019829', 'suraj_karki@gmail.com', 'Male', 'B.sc in computer science'),
(30, 'Suraj Kumar Hekka', 'Kamaltayar-19', '9865477765', 'contact_suraj@gmail.com', 'Male', 'M.sc in computer'),
(31, 'Uddav Prasad Ghimire', 'Bharatour-5', '9841393959', 'contactuddav@gmail.com', 'Male', 'B.sc in accountant');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admin_list`
--
ALTER TABLE `Admin_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`batch_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`std_id`),
  ADD KEY `faculty_id` (`faculty_id`),
  ADD KEY `yoj` (`yoj`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Admin_list`
--
ALTER TABLE `Admin_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `batch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `faculty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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
