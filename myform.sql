-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 12, 2020 at 10:00 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myform`
--

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `ID` int(11) NOT NULL,
  `name` text NOT NULL,
  `sername` text NOT NULL,
  `gender` text NOT NULL,
  `birthday` text NOT NULL,
  `edu` text NOT NULL,
  `home` text NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`ID`, `name`, `sername`, `gender`, `birthday`, `edu`, `home`, `img`) VALUES
(1, 'ชินอิจิ', 'คุโด้', 'ชาย', '04/05/1977', 'ชั้นมัธยมศึกษาปลายหรือเทียบเท่า', 'บ้านเลขที่ 21 หมู่ 2 เมือง เบกะ จังหวัด โตเกียว ประเทศ ญี่ปุ่น', '504deaae96850d4c6a88c7b5aecd1bac.jpg'),
(2, 'ยูกิโกะ', 'คุโด้', 'หญิง', '03/05/1957', 'ปริญญาตรี', 'บ้านเลขที่ 21 หมู่ 2 เมือง เบกะ จังหวัด โตเกียว ประเทศ ญี่ปุ่น', 'Yukiko_Kudo_Profile-e1565275937989.png'),
(3, 'ยูซากุ', 'คุโด้', 'ชาย', '02/05/1955', 'ปริญญาตรี', 'บ้านเลขที่ 21 หมู่ 2 เมือง เบกะ จังหวัด โตเกียว ประเทศ ญี่ปุ่น', 'Yusaku_Kudo.jpg'),
(7, 'วรพล', 'ทั่งศิริ', 'ชาย', '11/09/1999', 'ปริญญาตรี', 'บ้านเลขที่ 131 หมู่ที่ 9 บ้าน หนองแวง ตำบล โพธิ์ใหญ่ อำเภอ พนมไพร จังหวัด ร้อยเอ็ด ', '8rB1fzlgJs126291823_1584648865027657_4557222309825463478_o.jpg'),
(8, 'โคนัน', 'เอโดงาวา', 'ชาย', '04/05/1987', 'ชั้นประถมศึกษา', 'สำนักงานนักสืบ โมริ หมู่ 4 เมือง เบกะ จังหวัด โตเกียว ประเทศ ญี่ปุ่น', 'c5diup30b5IMG_2738.jpg'),
(9, 'รัน', 'โมริ', 'หญิง', '03/05/1987', 'ชั้นมัธยมศึกษาปลายหรือเทียบเท่า', 'สำนักงานนักสืบ โมริ หมู่ 4 เมือง เบกะ จังหวัด โตเกียว ประเทศ ญี่ปุ่น', 'AABvcdyCUPRun_Mouri_@ED17.jpg'),
(10, 'โคโกโร่', 'โมริ', 'ชาย', '28/10/1957', 'ปริญญาตรี', 'สำนักงานนักสืบ โมริ หมู่ 4 เมือง เบกะ จังหวัด โตเกียว ประเทศ ญี่ปุ่น		\n', 'TaT2ZdqobIโมริ_โคโกโร่1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `ID` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `passwordnode` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `username`, `password`, `passwordnode`) VALUES
(1, 'myform_admin', '$2y$10$JT2XFf3MmYoDQAWKBbftYusmZTCmyX94up5kwK2E.fvdG0adxPPEu', '$2b$10$61SP7ksJd.hhMOkwW57LuumuPGLgbr8ERz/y2ddm5Mhpvd3cnXBIS'),
(2, 'myform_root', '$2y$10$I5XSZcL2g2PJPifnRwlyje7Nn/Yk5YI.3r/A41Ga1WG7RbeMbb726', '$2b$10$vJI1qwg/ru7tZvKTO58yye8n7vjmRlpNIqstmCtQbF31P3gYPsgym');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
