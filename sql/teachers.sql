-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 23, 2022 at 03:07 AM
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
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
