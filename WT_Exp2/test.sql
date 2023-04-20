-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2023 at 08:29 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `img_id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `comment` text NOT NULL,
  `timesatmp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `img_id`, `username`, `comment`, `timesatmp`) VALUES
(12, 22, 'chandra', 'nice', '2023-04-05 17:24:06'),
(13, 22, 'chandra', 'nice', '2023-04-05 17:24:21'),
(14, 24, 'chandra', 'nice ride bruh', '2023-04-09 17:16:29'),
(15, 26, 'vamsi', 'nice', '2023-04-12 06:43:40'),
(16, 26, 'vamsi', '', '2023-04-12 06:43:50');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `filename`, `username`) VALUES
(1, 'lapy.jpg', ''),
(2, 'lapy.jpg', ''),
(3, 'lapy.jpg', ''),
(4, 'lapy.jpg', ''),
(5, 'Screenshot (1).png', ''),
(6, 'krish.png', 'krish'),
(7, '', 'ceycv'),
(8, 'vamsi.jpg', 'vamsi');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `filename` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `uname` varchar(100) NOT NULL,
  `likes` bigint(100) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `filename`, `description`, `created_at`, `uname`, `likes`) VALUES
(22, 'jpeg-home.jpg', '#view', '2023-04-05 17:15:10', 'vamsi', 3),
(23, 'lapy.jpg', 'new lappy', '2023-04-05 17:22:49', 'chandra', 2),
(24, 'porsche.jpg', 'i am porsche with no breaks', '2023-04-09 17:14:09', 'sandeep', 2),
(25, 'ktm.jpg', '#no caption', '2023-04-09 17:17:58', 'chandra', 1),
(26, 'peacock.jpg', '', '2023-04-11 17:15:02', 'vamsi', 2);

-- --------------------------------------------------------

--
-- Table structure for table `post_likes`
--

CREATE TABLE `post_likes` (
  `id` int(11) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_likes`
--

INSERT INTO `post_likes` (`id`, `post_id`, `username`, `created_at`) VALUES
(19, 22, 'vamsi', '2023-04-05 17:15:36'),
(20, 23, 'chandra', '2023-04-05 17:23:40'),
(21, 22, 'chandra', '2023-04-05 17:23:50'),
(22, 24, 'sandeep', '2023-04-09 17:14:32'),
(23, 24, 'chandra', '2023-04-09 17:16:10'),
(24, 25, 'chandra', '2023-04-09 17:18:42'),
(25, 23, 'sandeep', '2023-04-09 17:20:12'),
(26, 22, 'swami', '2023-04-11 16:02:48');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phoneno` varchar(10) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Dob` date NOT NULL,
  `Languages` varchar(20) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`Name`, `Email`, `Phoneno`, `Gender`, `Dob`, `Languages`, `Address`, `Password`) VALUES
('vamsi', 'vamsivemulakonda08@gmail.com', '8309926599', 'male', '2002-08-30', 'TELUGU,', 'vizag', '1234'),
('ram', 'ramkonidela@gmail.com', '8328195999', 'male', '2023-03-02', 'ENGLISH,', 'Hyderabad', '3008'),
('frooti', 'keerthanafrooti@gmail.com', '8179122452', 'female', '2001-07-21', 'TELUGU,ENGLISH,', 'khammam', '222222'),
('vamsirk', 'vamsivemulakonda08@gmail.com', '9110740096', 'male', '2002-06-04', 'TELUGU,', 'tuni', 'vamsi@123'),
('krish', 'krishna20@gmail.com', '1234567890', 'male', '2023-03-02', 'TELUGU,ENGLISH,', 'emo telidhu', '3008'),
('ceycv', 'ceycv@gmail.com', '8559494075', 'female', '2023-04-05', 'TELUGU,', 'dfghj', '1234567');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `uid` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(254) NOT NULL,
  `passw` varchar(200) NOT NULL,
  `phone_no` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`uid`, `username`, `email`, `passw`, `phone_no`) VALUES
(10, 'vamsi', 'vamsivemulakonda@gmail.com', '12345', 2147483647),
(11, 'chandra', 'jaichandranaik@gmail.com', 'chandra123', 2147483647),
(12, 'sandeep', 'sandeep@gmail.com', 'sandeep', 2147483647),
(13, 'abhi', 'abhishek@gmail.com', 'abhi', 2147483647),
(14, 'swami', 'dinesh@gmail.com', 'dinesh', 2147483647);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_likes`
--
ALTER TABLE `post_likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `post_likes`
--
ALTER TABLE `post_likes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
