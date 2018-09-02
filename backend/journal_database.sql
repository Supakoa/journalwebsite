-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2018 at 07:20 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

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

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `password`) VALUES
('321654', 'cHB6eDAw');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `order` int(11) NOT NULL,
  `name` text NOT NULL,
  `tmp_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`order`, `name`, `tmp_name`) VALUES
(1, 'Front.jpg', 'banner_5b86d5a2a3080.jpg');

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
(10000, 'อิอิ', 'อิอิ', 'pdf_5b7d9d3f20bc3.pdf', 'อิอิ อะโรห้าาา', 'eiei alohaaa', 'ไม่มี', 'อิอิจัง', 1),
(10001, 'asdhs', 'adfhdfh', 'sdfhdfh', 'dsfh', 'sdfh', 'dsfh', 'dsfh', 3),
(10002, 'asdhs', 'adfhdfh', 'sdfhdfh', 'dsfh', 'sdfh', 'dsfh', 'dsfh', 5),
(10003, 'asdhs', 'adfhdfh', 'sdfhdfh', 'dsfh', 'sdfh', 'dsfh', 'dsfh', 5),
(10004, 'อิอิ', 'อิอิ', 'sdfhdfh', 'อิอิ อะโรห้าาา', 'eiei alohaaa', 'ไม่มี', 'อิอิจัง', 1),
(10005, 'อิอิ', 'อิอิ', 'sdfhdfh', 'อิอิ อะโรห้าาา', 'eiei alohaaa', 'ไม่มี', 'อิอิจัง', 1);

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
(1, '321654', '10000', '2', 'kk', 100),
(2, '123456', '10000', '2', 'kk', 100);

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
-- Table structure for table `show_url`
--

CREATE TABLE `show_url` (
  `id` int(1) NOT NULL,
  `url` text NOT NULL,
  `real_name` text NOT NULL,
  `text` text NOT NULL,
  `group_url` int(1) NOT NULL,
  `hide` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `show_url`
--

INSERT INTO `show_url` (`id`, `url`, `real_name`, `text`, `group_url`, `hide`) VALUES
(1, 'a1', '', 'ab', 1, 0),
(2, 'b1', '', 'b', 1, 0),
(3, 'c1', '', 'c', 1, 0),
(4, 'd1', '', 'd', 1, 0),
(5, 'pdf_5b86d2652c582.pdf', 'pdf_5b83a39497804.pdf', 'ba', 2, 0),
(6, 'pdf_5b86d03c0e1aa.pdf', 'pdf_5b83a39497804.pdf', 'ab', 2, 0),
(7, 'pdf_5b86d03c340b3.pdf', 'pdf_5b83a39497804.pdf', 'a', 2, 0),
(8, 'pdf_5b86d03c844e8.pdf', 'pdf_5b83a39497804.pdf', 'a', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `status_tb`
--

CREATE TABLE `status_tb` (
  `id` int(11) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status_tb`
--

INSERT INTO `status_tb` (`id`, `status`) VALUES
(1, 'รอผลการตรวจสอบ'),
(2, 'ผ่าน'),
(3, 'แก้ไข'),
(4, 'ไม่ผ่าน'),
(5, 'ยังไม่ได้เลือกผู้ตรวจ'),
(6, 'รอผลจากแอดมิน');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `order` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `gender` text NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `address` text NOT NULL,
  `email` text NOT NULL,
  `member` longtext NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`order`, `username`, `password`, `gender`, `first_name`, `last_name`, `address`, `email`, `member`, `role`) VALUES
(1, 'singha', 'cHB6eDAw', 'male', 'ตะวัน', 'เข็มทอง', 'ไม่มี', 'ไม่มี', '', 1),
(2, 'singha2', 'cHB6eDAw', 'male', 'ตะวัน', 'เข็มทอง', 'ไม่มี', 'ไม่มี', '', 1),
(3, '321654', 'cHB6eDAw', 'male', 'นาย ก', 'ไก่', 'เล้า(อยู่กับแม่)', 'ไก้ไก่ๆไกลไก้ไกลไก่ไกๆไก่@coldmail.com', '', 2),
(4, '123456', 'cHB6eDAw', 'male', 'นาย ข', 'ไข่', 'ไม่ให้ๆอย่ามาเอานะเค้าหวง', '8e88@morning.com', '', 2),
(21, 'singha2', 'dGF3YW4=', 'male', 'yerm', 'cheao', 'as', '8e88@morning.com', '', 2),
(22, 'singha2', 'dGF3YW4=', 'male', 'yerm', 'cheao', 'as', '8e88@morning.com', '', 2),
(23, 'singha2', 'dGF3YW4=', 'male', 'yerm', 'cheao', 'as', '8e88@morning.com', '', 2);

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
('singha', '10000'),
('singha2', '10002');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`order`);

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
-- Indexes for table `show_url`
--
ALTER TABLE `show_url`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_tb`
--
ALTER TABLE `status_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`order`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `paper`
--
ALTER TABLE `paper`
  MODIFY `paper_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10006;

--
-- AUTO_INCREMENT for table `reviewer_answer`
--
ALTER TABLE `reviewer_answer`
  MODIFY `order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `show_url`
--
ALTER TABLE `show_url`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `status_tb`
--
ALTER TABLE `status_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
