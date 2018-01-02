-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2017 at 03:32 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `galleriawebsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment` varchar(500) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `Date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `img_link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment`, `user_name`, `Date`, `img_link`) VALUES
('this image is beautiful!', 'aroxsediq', '2017-12-10 14:29:01.799277', 'img/Mountains@aroxsediq.jpg'),
('Nice!', 'abc', '2017-12-10 14:29:53.067761', 'img/Koala@abc.jpg'),
('Amazing Picture!', 'abc', '2017-12-10 14:30:09.123680', 'img/Mountains@aroxsediq.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `img_link` varchar(100) NOT NULL,
  `img_uploader` varchar(50) NOT NULL,
  `img_descript` varchar(255) NOT NULL,
  `img_title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`img_link`, `img_uploader`, `img_descript`, `img_title`) VALUES
('img/Mountains@aroxsediq.jpg', 'aroxsediq', ' a beautiful landscape of a mountains', 'mountains'),
('img/Koala@abc.jpg', 'abc', '  an nice koala   ', 'koala');

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `city` varchar(15) NOT NULL,
  `ID` int(5) NOT NULL,
  `type` int(2) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`first_name`, `last_name`, `email`, `password`, `city`, `ID`, `type`, `gender`) VALUES
('Arox', 'Sediq', 'aroxsediq@gmail.com', '0123456789', 'slemani', 1, 1, 'Male'),
('USER', 'Someone', 'uzer@info.com', '098', 'virtual', 6, 2, ''),
('a', 'b', 'abc@gmail.com', '123', 'virtual', 16, 2, 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
