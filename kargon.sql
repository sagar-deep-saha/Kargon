-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2023 at 03:28 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kargon`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `type` varchar(60) NOT NULL,
  `blog` varchar(600) NOT NULL,
  `writer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `type`, `blog`, `writer`) VALUES
(1, 'For Testing Purpose', 'This blog has been posted for the testing purpose of the website.', 10),
(2, 'Confirming for Sustainability', 'Testing again this website for confirming the strength & sustainability of the website.', 10),
(3, '# First Time', 'This is for the first time i have joined this website.I liked it 👍', 11),
(4, '#SongLover', 'You Know me, I am good at singing too.', 10),
(5, 'd', 'd', 10),
(6, 'dddde', 'deded', 15),
(7, 'yui', 'no no no', 14);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `blogid` varchar(60) NOT NULL,
  `comment` varchar(60) NOT NULL,
  `writer` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `blogid`, `comment`, `writer`) VALUES
(1, '2', 'Congratulations, It sustained and works properly', '2063050022'),
(2, '4', 'Yes, Yes', '2063050026'),
(3, '4', 'Tu merese accha gaata hain kya ?', '2063050022'),
(4, '7', 'o y', '216305131');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(60) NOT NULL,
  `roll` varchar(60) NOT NULL,
  `pass` varchar(60) NOT NULL,
  `name` varchar(60) NOT NULL,
  `phone` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `addr` varchar(60) NOT NULL,
  `ct` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `roll`, `pass`, `name`, `phone`, `email`, `addr`, `ct`) VALUES
(10, '2063050026', '$2y$10$3PLmNmGFE9DGD5nLAVPi1OhGWMh5U6RYyyylXKWiKBhV7aW4JgZla', 'Sagar Saha', '8257803481', 'sagarsaha@outlook.in', 'Krishna Nagar', '2023-01-18 03:07:09'),
(11, '2063050022', '$2y$10$B6auv7LpDObVjrYogbENNOVTVHf3cm7Yal30NYa3Jv.KEI2Pj0hK2', 'Aarman Malik', '7412369850', 'arman@malik.in', 'India', '2023-01-18 03:10:55'),
(12, '2063050014', '$2y$10$xlxefv9tVoRTBvAUIZEQVuVN3yEGiac7zQsg54Zaf2BBH5ogHTNV2', 'Arijit Chowdhury', '8257996315', 'arijit@google.com', 'NatunNagar', '2023-01-20 05:49:53'),
(13, '2063050024', '$2y$10$UYh/dtZtsWEbY2VH.Cc/M.BhFfXYDp7gSIlWuGhumi7XPIuKX5C.i', 'Kishanu Choudhury', '7412589603', 'kishanu@google.com', 'Middle BhuvanBan', '2023-01-20 05:51:47'),
(14, '216305131', '$2y$10$e1TwNufemmqts11w8AxsMedvwcIy1crCPz8/O1B1y/WXRtHFnycNe', 'Arkajyoti Roy', '8974335084', 'arkajyotiroy445@gmail.com', 'Thana', '2023-01-27 19:27:11'),
(15, '216305121', '$2y$10$uBRQDFb3X95iR.d3hkpFK.YcuzX7BgEwp9RMxX8UCmwIYltsP7cia', 'A Roy', '8837789', '123@gmail.com', 'Thane', '2023-01-27 19:36:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `writer` (`writer`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `writer` (`writer`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `roll` (`roll`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`writer`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`writer`) REFERENCES `users` (`roll`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
