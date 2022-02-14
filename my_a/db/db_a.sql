-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2021 at 05:07 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db.a`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbprofile`
--

CREATE TABLE `tbprofile` (
  `user_id` bigint(20) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `encpass` varchar(200) NOT NULL,
  `user_type` varchar(200) NOT NULL,
  `code` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `created_on` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbprofile`
--

INSERT INTO `tbprofile` (`user_id`, `user_name`, `email`, `encpass`, `user_type`, `code`, `status`, `created_on`) VALUES
(5, 'Umair@gmail.com', 'lionaks884@gmail.com', '$2y$10$4lp5Re4Mf5ugh8GLtmgEAOmwVvQjeE5bZ2tbaVs.bK8vRwHTmtNcO', 'admin', '0', '1', '2021-10-18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbprofile`
--
ALTER TABLE `tbprofile`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbprofile`
--
ALTER TABLE `tbprofile`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
