-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2019 at 01:55 PM
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
-- Database: `bkmh`
--

-- --------------------------------------------------------

--
-- Table structure for table `library`
--

CREATE TABLE `library` (
  `student_id` int(100) NOT NULL,
  `bookname` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `issuedate` date NOT NULL,
  `duedate` date NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `library`
--

INSERT INTO `library` (`student_id`, `bookname`, `author`, `issuedate`, `duedate`, `status`) VALUES
(3, 'hvg', 'chg', '2019-10-15', '2019-11-12', 'returned'),
(6, 'moon', 'mary', '2019-11-30', '2019-12-30', 'pending'),
(7, 'harry potter', 'j k rawlings', '2019-11-16', '2019-12-18', 'pending'),
(8, '', '', '0000-00-00', '0000-00-00', ''),
(9, '', '', '0000-00-00', '0000-00-00', ''),
(10, 'ncj', 'kkc', '0000-00-00', '0000-00-00', 'k');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(20) NOT NULL,
  `action` varchar(20) NOT NULL,
  `cdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `action`, `cdate`) VALUES
(1, 'inserted', '2019-11-20'),
(2, 'inserted', '2019-11-24');

-- --------------------------------------------------------

--
-- Table structure for table `mess`
--

CREATE TABLE `mess` (
  `id` int(10) NOT NULL,
  `day` varchar(20) NOT NULL,
  `morning` varchar(20) NOT NULL,
  `evening` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mess`
--

INSERT INTO `mess` (`id`, `day`, `morning`, `evening`) VALUES
(5, 'Friday', 'fooddcsd', 'Chapathi and curry'),
(1, 'Monday', 'monday', 'def'),
(6, 'Saturday', '', ''),
(0, 'Sunday', 'jvdkg', ''),
(4, 'Thursday ', 'food', 'Ragi ball and sambar'),
(2, 'Tuesday', 'fooddcsd', 'Ragi ball and sambar'),
(3, 'Wednesday', 'food', 'Chapathi and curry');

-- --------------------------------------------------------

--
-- Table structure for table `official`
--

CREATE TABLE `official` (
  `id` int(10) NOT NULL,
  `billname` varchar(10) NOT NULL,
  `billphoto` varchar(255) NOT NULL,
  `due date` date NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `student_id` int(100) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(25) NOT NULL,
  `phonenumber` int(11) NOT NULL,
  `college` varchar(50) NOT NULL,
  `year` int(10) NOT NULL,
  `course` varchar(20) NOT NULL,
  `password` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`student_id`, `fullname`, `username`, `email`, `phonenumber`, `college`, `year`, `course`, `password`) VALUES
(3, 'reena r', 'reena', 'ree@gmail.com', 1234567890, 'vit', 1, 'ec', '123456'),
(6, 'ruchith', 'ruchith', 'a@gmail.com', 2147483647, 'uvce', 3, 'cse', '1234'),
(7, 'rahul', 'rahul', 'r@gmail.com', 1234567890, 'vit', 2, 'ise', '12345'),
(8, 'rahul', 'admin', 'ruchithmrg@gmail.com', 1234567890, 'vit', 3, 'ise', 'admin@1234'),
(9, 'food', 'ruchith123', 'ruchithgauravmrg@gmail.co', 2147483647, 'uvce', 3, 'cse', 'ruchith@123'),
(10, 'abcd', 'abcd', 'abcd@gmail.com', 2147483647, 'kjcj', 0, 'ojoi', 'abcd'),
(11, 'huygyu', 'yubuy', 'uyb@fdc', 15642354, 'niu', 5, 'mk', '321456987'),
(12, 'dd', 'gubij', 'hbjuhbbbbmm@gmail.com', 34234234, 'ewfwef', 4, 'fd', '1234567');

--
-- Triggers `register`
--
DELIMITER $$
CREATE TRIGGER `after_delete` AFTER INSERT ON `register` FOR EACH ROW INSERT INTO logs VALUES(null,student_id,'inserted',now())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(100) NOT NULL,
  `file` varchar(50) NOT NULL,
  `file_name` varchar(50) NOT NULL,
  `file_desig` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `file`, `file_name`, `file_desig`) VALUES
(4, '82406-ptr.jpg', 'Puttarudra R', 'Managing trustee'),
(6, '75507-vijayendra.jpg', 'Vijayendra rao', 'Trustee manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `library`
--
ALTER TABLE `library`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mess`
--
ALTER TABLE `mess`
  ADD PRIMARY KEY (`day`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `library`
--
ALTER TABLE `library`
  MODIFY `student_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `student_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `library`
--
ALTER TABLE `library`
  ADD CONSTRAINT `student_id` FOREIGN KEY (`student_id`) REFERENCES `register` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
