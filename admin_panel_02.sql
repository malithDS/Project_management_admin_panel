-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2024 at 08:57 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin_panel_02`
--

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `p_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ad_unit_id_android_rewarded` varchar(255) NOT NULL,
  `ad_unit_id_ios_rewarded` varchar(255) NOT NULL,
  `ad_unit_id_android_intesting` varchar(255) NOT NULL,
  `ad_unit_id_ios_intesting` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`p_id`, `name`, `ad_unit_id_android_rewarded`, `ad_unit_id_ios_rewarded`, `ad_unit_id_android_intesting`, `ad_unit_id_ios_intesting`) VALUES
(4, 'mobile app', '2556547121', '4569871212', '569874522124', '00036578025112 '),
(7, 'fast food delivery website', '123654236545', '4569852233547', '4569852233547', '4569852233547');

-- --------------------------------------------------------

--
-- Table structure for table `super_user`
--

CREATE TABLE `super_user` (
  `su_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `super_user`
--

INSERT INTO `super_user` (`su_id`, `name`, `username`, `password`) VALUES
(1, 'Malith Dayanga', 'Malith9999', '12345'),
(2, 'malith', 'malith99', '123654'),
(3, 'amith', 'amith1999', 'amith123#');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `super_user`
--
ALTER TABLE `super_user`
  ADD PRIMARY KEY (`su_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `super_user`
--
ALTER TABLE `super_user`
  MODIFY `su_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
