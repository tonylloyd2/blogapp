-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 26, 2022 at 10:56 PM
-- Server version: 10.11.0-MariaDB
-- PHP Version: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gen_z`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `session_token` varchar(15) DEFAULT NULL,
  `is_logged_in` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`id`, `email`, `password`, `session_token`, `is_logged_in`) VALUES
(1, 'admin@gmail.com', '1234', '8XJD9LKUD7W', 1),
(13, 'lloydkatila@gmail.com', '1234', 'F191WJ7OV6J', 0),
(14, 'test@test.com', '1234', 'N9118UE2HT4', 0),
(15, 'lloyd@gmail.com', '1234', '49834C1MQH3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_password_update`
--

CREATE TABLE `user_password_update` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `code` varchar(50) DEFAULT NULL,
  `original_password` varchar(50) DEFAULT NULL,
  `updated_password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_index` (`email`);

--
-- Indexes for table `user_password_update`
--
ALTER TABLE `user_password_update`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email index` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_password_update`
--
ALTER TABLE `user_password_update`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
