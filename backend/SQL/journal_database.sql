-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2018 at 01:10 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `journal_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `paper`
--

CREATE TABLE `paper` (
  `paper_id` int(255) NOT NULL,
  `field` text NOT NULL,
  `file_name` text NOT NULL,
  `file_tmp_name` text NOT NULL,
  `name_th` text NOT NULL,
  `name_eng` text NOT NULL,
  `abstract` text NOT NULL,
  `key_word` text NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `paper`
--

INSERT INTO `paper` (`paper_id`, `field`, `file_name`, `file_tmp_name`, `name_th`, `name_eng`, `abstract`, `key_word`, `status`) VALUES
(10000, 'อิอิ', 'อิอิ', 'sdfhdfh', 'อิอิ อะโรห้าาา', 'eiei alohaaa', 'ไม่มี', 'อิอิจัง', 1),
(10001, 'asdhs', 'adfhdfh', 'sdfhdfh', 'dsfh', 'sdfh', 'dsfh', 'dsfh', 3);

-- --------------------------------------------------------

--
-- Table structure for table `reviewer_answer`
--

CREATE TABLE `reviewer_answer` (
  `order` int(11) NOT NULL,
  `reviewer_id` text NOT NULL,
  `paper_id` text NOT NULL,
  `status` text NOT NULL,
  `comment` text NOT NULL,
  `score` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reviewer_answer`
--

INSERT INTO `reviewer_answer` (`order`, `reviewer_id`, `paper_id`, `status`, `comment`, `score`) VALUES
(1, '321654', '10000', '2', 'กุ๊กๆๆๆ', 100),
(2, '123456', '10000', '4', '...', 20);

-- --------------------------------------------------------

--
-- Table structure for table `reviewer_paper`
--

CREATE TABLE `reviewer_paper` (
  `paper_id` text NOT NULL,
  `reviewer1` text NOT NULL,
  `reviewer2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reviewer_paper`
--

INSERT INTO `reviewer_paper` (`paper_id`, `reviewer1`, `reviewer2`) VALUES
('10000', '321654', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `order` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `address` text NOT NULL,
  `email` text NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`order`, `username`, `password`, `first_name`, `last_name`, `address`, `email`, `role`) VALUES
(1, 'singha', '123456', 'ตะวัน', 'เข็มทอง', 'ไม่มี', 'ไม่มี', 1),
(2, 'singha2', '123456', 'ตะวัน', 'เข็มทอง', 'ไม่มี', 'ไม่มี', 1),
(3, '321654', '321654', 'นาย ก', 'ไก่', 'เล้า(อยู่กับแม่)', 'ไก้ไก่ๆไกลไก้ไกลไก่ไกๆไก่@coldmail.com', 2),
(4, '123456', '123456', 'นาย ข', 'ไข่', 'ไม่ให้ๆอย่ามาเอานะเค้าหวง', '8e88@morning.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_paper`
--

CREATE TABLE `user_paper` (
  `username` text NOT NULL,
  `paper_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_paper`
--

INSERT INTO `user_paper` (`username`, `paper_id`) VALUES
('singha', '10000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `paper`
--
ALTER TABLE `paper`
  ADD PRIMARY KEY (`paper_id`);

--
-- Indexes for table `reviewer_answer`
--
ALTER TABLE `reviewer_answer`
  ADD PRIMARY KEY (`order`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`order`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `paper`
--
ALTER TABLE `paper`
  MODIFY `paper_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10002;

--
-- AUTO_INCREMENT for table `reviewer_answer`
--
ALTER TABLE `reviewer_answer`
  MODIFY `order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
