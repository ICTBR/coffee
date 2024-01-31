-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2024 at 04:40 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banjongrat_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(5) NOT NULL COMMENT 'รหัส',
  `admin_name` varchar(50) DEFAULT NULL COMMENT 'ชื่อ',
  `admin_surname` varchar(50) DEFAULT NULL COMMENT 'นามสกุล',
  `admin_gender` varchar(10) DEFAULT NULL COMMENT 'เพศ',
  `admin_position` varchar(50) DEFAULT NULL COMMENT 'ตำแหน่ง',
  `admin_email` varchar(50) DEFAULT NULL COMMENT 'เมล',
  `admin_password` varchar(100) DEFAULT NULL COMMENT 'รหัสผ่าน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_surname`, `admin_gender`, `admin_position`, `admin_email`, `admin_password`) VALUES
(1, 'จุฑามาส', 'คงบัว', 'หญิง', 'การเงิน', 'jutamask@teacher.ac.th', '1234'),
(2, 'ศรุติ', 'พุ่มเจิรญ', 'ชาย', 'สารสนเทศ', 'sarutp@teacher.banjongrat.ac.th', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `admin_copy`
--

CREATE TABLE `admin_copy` (
  `admin_id` int(5) NOT NULL COMMENT 'รหัส',
  `admin_name` varchar(50) DEFAULT NULL COMMENT 'ชื่อ',
  `admin_surname` varchar(50) DEFAULT NULL COMMENT 'นามสกุล',
  `admin_gender` varchar(10) DEFAULT NULL COMMENT 'เพศ',
  `admin_position` varchar(50) DEFAULT NULL COMMENT 'ตำแหน่ง',
  `admin_email` varchar(50) DEFAULT NULL COMMENT 'เมล',
  `admin_password` varchar(100) DEFAULT NULL COMMENT 'รหัสผ่าน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_copy`
--

INSERT INTO `admin_copy` (`admin_id`, `admin_name`, `admin_surname`, `admin_gender`, `admin_position`, `admin_email`, `admin_password`) VALUES
(1, 'จุฑามาส', 'คงบัว', 'หญิง', 'การเงิน', 'jutamask@teacher.ac.th', '$2y$10$y6nO5nINmDVyv810BOSOm.V0sWbFtnmYOfAtd5n4yW3Yo7Q.9CXty'),
(2, 'ศรุติ', 'พุ่มเจิรญ', 'ชาย', 'สารสนเทศ', 'sarutp@teacher.banjongrat.ac.th', '$2y$10$y6nO5nINmDVyv810BOSOm.V0sWbFtnmYOfAtd5n4yW3Yo7Q.9CXty');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `cou_id` int(5) NOT NULL COMMENT 'รหัสคอร์ส',
  `sub_id` int(5) DEFAULT NULL COMMENT 'รหัสวิชา',
  `cou_period` varchar(50) DEFAULT NULL COMMENT 'ช่วงเวลา',
  `cou_round` varchar(50) DEFAULT NULL COMMENT 'รอบเรียน',
  `cou_price` decimal(10,2) DEFAULT NULL COMMENT 'ราคา',
  `cou_level` varchar(50) DEFAULT NULL COMMENT 'ชั้นปี',
  `cou_limit` int(3) DEFAULT NULL COMMENT 'จำนวนเปิดรับ',
  `cou_regis` int(3) DEFAULT NULL COMMENT 'จำนวนสมัคร',
  `cou_status` enum('เปิดรับ','ปิดรับ','เริ่มคอร์ส','จบคอร์ส') DEFAULT NULL COMMENT 'สถานะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`cou_id`, `sub_id`, `cou_period`, `cou_round`, `cou_price`, `cou_level`, `cou_limit`, `cou_regis`, `cou_status`) VALUES
(2, 2, '15 ส.ค. - 1 ก.ย. 66', 'จันทร์,อังคาร', 1500.00, 'ป.1-6', 3, 3, 'เปิดรับ'),
(3, 14, '15 ส.ค. - 30 ก.ย. 66', 'จันทร์,อังคาร', 1500.00, 'ป.1-6', 10, 9, 'เปิดรับ');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `reg_id` int(10) NOT NULL COMMENT 'รหัสลงทะเบียน',
  `reg_datetime` datetime DEFAULT NULL COMMENT 'วันที่ลงทะเบียน',
  `cou_id` int(5) DEFAULT NULL COMMENT 'รหัสคอร์ส',
  `stu_id` int(5) DEFAULT NULL COMMENT 'รหัสนักเรียน',
  `reg_status` enum('สมัคร','ชำระเงินแล้ว','ยกเลิก','') DEFAULT NULL COMMENT 'สถานะ',
  `reg_file` varchar(100) DEFAULT NULL COMMENT 'หลักฐาน',
  `pay_price` double(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`reg_id`, `reg_datetime`, `cou_id`, `stu_id`, `reg_status`, `reg_file`, `pay_price`) VALUES
(84, '2023-11-28 08:31:21', 4, 1, 'สมัคร', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `stu_id` int(5) NOT NULL COMMENT 'รหัสนักเรียน',
  `stu_name` varchar(50) DEFAULT NULL COMMENT 'ชื่อ',
  `stu_surname` varchar(50) DEFAULT NULL COMMENT 'นามสกุล',
  `stu_level` varchar(10) DEFAULT NULL COMMENT 'ชั้นปี',
  `stu_password` varchar(100) DEFAULT NULL COMMENT 'รหัสผ่าน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`stu_id`, `stu_name`, `stu_surname`, `stu_level`, `stu_password`) VALUES
(3, 'เทพรัตน์2', 'แดงสุวรรณ์3', 'ป.1/1', '1234'),
(2544, 'xa', 'dd', 'ป.6/6', '1234'),
(2564, 'เทพรัตน์', 'แดงสุวรรณ์', 'ป.6/4', '1234'),
(2565, 'ดกเด้', 'หดกปเด้', 'ป.6/1', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `student_copy`
--

CREATE TABLE `student_copy` (
  `stu_id` int(5) NOT NULL COMMENT 'รหัสนักเรียน',
  `stu_name` varchar(50) DEFAULT NULL COMMENT 'ชื่อ',
  `stu_surname` varchar(50) DEFAULT NULL COMMENT 'นามสกุล',
  `stu_level` varchar(10) DEFAULT NULL COMMENT 'ชั้นปี',
  `stu_email` varchar(50) DEFAULT NULL COMMENT 'อีเมล',
  `stu_password` varchar(100) DEFAULT NULL COMMENT 'รหัสผ่าน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_copy`
--

INSERT INTO `student_copy` (`stu_id`, `stu_name`, `stu_surname`, `stu_level`, `stu_email`, `stu_password`) VALUES
(1, 'เทพรัตน์', 'แดงสุวรรณ์', 'ป.6/1', 'tepparatd@teacher.banjongrat.ac.th', '$2y$10$y6nO5nINmDVyv810BOSOm.V0sWbFtnmYOfAtd5n4yW3Yo7Q.9CXty'),
(2, 'แบมแบม', 'พุ่มเจริญ', 'ป.5/1', 'ss@teacher.banjongrat.ac.th', '$2y$10$y6nO5nINmDVyv810BOSOm.V0sWbFtnmYOfAtd5n4yW3Yo7Q.9CXty'),
(3, 'เทพรัตน์2', 'แดงสุวรรณ์3', 'ป.1/1', 'a@gmail.com', '$2y$10$y6nO5nINmDVyv810BOSOm.V0sWbFtnmYOfAtd5n4yW3Yo7Q.9CXty');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `sub_id` int(5) NOT NULL COMMENT 'รหัสวิชา',
  `sub_name` varchar(100) DEFAULT NULL COMMENT 'ชื่อวิชา',
  `sub_detail` varchar(2000) DEFAULT NULL COMMENT 'รายละเอียด',
  `sub_image` varchar(100) DEFAULT NULL COMMENT 'รูปภาพ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sub_id`, `sub_name`, `sub_detail`, `sub_image`) VALUES
(1, 'เสริมพิเศษทบทวนบทเรียน', 'เสริมพิเศษทบทวนบทเรียน1', 'pic1.jpg'),
(2, 'คอมพิวเตอร์', '8', '04082023115007_pic4.jpg'),
(4, 'เทควันโด', '-', 'pic4.jpg'),
(14, 'การงาน', '', 'noimage.jpg'),
(15, 'คณิตศาสตร์', '', 'noimage.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` varchar(10) NOT NULL COMMENT 'รหัส',
  `firstname` varchar(50) DEFAULT NULL COMMENT 'ชื่อ',
  `surname` varchar(50) DEFAULT NULL COMMENT 'นามสกุล',
  `gender` varchar(10) DEFAULT NULL COMMENT 'เพศ',
  `position` enum('ครูประจำชั้น','ครูพิเศษทำการสอน','ครูพิเศษไม่ครูพิเศษทำการสอน','ฝ่ายบริหาร') DEFAULT NULL COMMENT 'ตำแหน่ง',
  `birthdate` date DEFAULT NULL COMMENT 'วันเกิด',
  `salary` decimal(10,2) DEFAULT NULL COMMENT 'เงินเดือน',
  `email` varchar(50) DEFAULT NULL COMMENT 'เมล',
  `password` varchar(100) DEFAULT NULL COMMENT 'รหัสผ่าน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `firstname`, `surname`, `gender`, `position`, `birthdate`, `salary`, `email`, `password`) VALUES
('62-001P', 'มะนิสา', 'แก้วกาหลง', 'หญิง', 'ครูพิเศษทำการสอน', '1981-05-01', 11000.00, 'st.banjongrat@gmail.com', '1234'),
('65-003P', 'ศรุติ', 'พุ่มเจริญ', 'ชาย', 'ครูประจำชั้น', '1981-05-01', 17000.00, 'sarutp@teacher.banjongrat.ac.th', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `admin_copy`
--
ALTER TABLE `admin_copy`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`cou_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`reg_id`),
  ADD UNIQUE KEY `ix_id` (`cou_id`,`stu_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`stu_id`);

--
-- Indexes for table `student_copy`
--
ALTER TABLE `student_copy`
  ADD PRIMARY KEY (`stu_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'รหัส', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_copy`
--
ALTER TABLE `admin_copy`
  MODIFY `admin_id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'รหัส', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `cou_id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'รหัสคอร์ส', AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `reg_id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'รหัสลงทะเบียน', AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `stu_id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'รหัสนักเรียน', AUTO_INCREMENT=2566;

--
-- AUTO_INCREMENT for table `student_copy`
--
ALTER TABLE `student_copy`
  MODIFY `stu_id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'รหัสนักเรียน', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `sub_id` int(5) NOT NULL AUTO_INCREMENT COMMENT 'รหัสวิชา', AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
