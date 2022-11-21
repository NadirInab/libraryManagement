-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2022 at 01:50 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `youcodelibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `fullName`, `email`, `image`, `phone`, `pwd`) VALUES
(2, 'Nadir', 'nadir@gmail.com', 'user.png', '06 45 67 89 09', 'nadir'),
(7, 'jomabymuk@mailinator.com', 'fupuj@mailinator.com', '', '+1 (985) 446-8673', 'Pa$$w0rd!'),
(8, 'MEHDI', 'Mehdi@gmail.com', 'user.png', '06 45 67 89 09', 'rain'),
(9, 'nadirpo', 'nadirop@gmail.com', 'user.png', '0636740837', '123'),
(10, 'Ali', 'ali@gmail.com', 'user.png', '0636740837', 'ali'),
(11, 'agra', 'agra@gmail.com', 'user.png', '0636740837', 'rain');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `isbn` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `publish_date` date DEFAULT NULL,
  `add_at` datetime DEFAULT current_timestamp(),
  `admin_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`isbn`, `title`, `type`, `image`, `publish_date`, `add_at`, `admin_id`) VALUES
('291-5-4227', 'updated', 'SC', 'jpg.jpg', '2013-05-09', '2022-11-20 03:32:39', 2),
('296-3-7337', 'udated12', 'IT', 'theLogo.png', '2004-01-02', '2022-11-20 18:59:11', 2),
('344-0-2404', 'tiwybugele@mailinator.com', 'ST', 'palehorse.jpg', '2003-09-09', '2022-11-20 19:29:44', 2),
('568-2-9437', 'POMLKIYNB ', 'Mystery', 'jpg.jpg', '1997-08-31', '2022-11-20 19:00:22', 2),
('646-4-8375', 'pain nu', 'ST', 'pain_nu.jpg', '2022-11-03', '2022-11-20 20:23:48', 2),
('675-2-9224', 'sumy', 'IT', 'signup.webp', '1989-01-21', '2022-11-20 21:05:38', 2),
('93-1-4820', 'cevokyhupe', 'IT', 'theLogo.png', '1996-10-15', '2022-11-20 21:08:03', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`isbn`),
  ADD KEY `admin_id` (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
