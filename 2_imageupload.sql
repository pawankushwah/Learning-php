-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2023 at 03:52 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learning-php`
--

-- --------------------------------------------------------

--
-- Table structure for table `imageupload`
--

CREATE TABLE `imageupload` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `imageupload`
--

INSERT INTO `imageupload` (`id`, `name`, `date`) VALUES
(1, 'tata tiago.jpg', '2023-01-22 19:25:12'),
(2, '', '2023-01-22 19:26:26'),
(3, '', '2023-01-22 19:34:11'),
(4, '', '2023-01-22 19:35:09'),
(5, '', '2023-01-22 19:40:12'),
(6, '', '2023-01-22 19:43:56'),
(7, 'tata tiago.jpg', '2023-01-22 19:44:04'),
(8, 'tata tiago.jpg', '2023-01-22 20:01:09'),
(9, 'tata tiago.jpg', '2023-01-22 20:01:21'),
(10, 'amd ryzen.webp', '2023-01-22 20:01:44'),
(11, 'tata tiago.jpg', '2023-01-22 20:06:17'),
(12, 'amd ryzen.webp', '2023-01-22 20:06:43'),
(13, 'window book and pc.jpg', '2023-01-22 20:06:51'),
(14, 'window book and pc.jpg', '2023-01-22 20:07:24'),
(15, 'F:PAWANxampptmpphp546.tmp', '2023-01-22 20:12:29'),
(16, 'PAWANxampptmpphp4E4D.tmp', '2023-01-22 20:14:59'),
(17, 'car.jpg', '2023-01-22 20:20:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `imageupload`
--
ALTER TABLE `imageupload`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `imageupload`
--
ALTER TABLE `imageupload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
