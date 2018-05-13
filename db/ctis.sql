-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2018 at 03:28 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ctis`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_case_files`
--

CREATE TABLE `tbl_case_files` (
  `case_no` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `crime` varchar(64) NOT NULL,
  `address` varchar(256) NOT NULL,
  `state` varchar(32) NOT NULL,
  `lga` varchar(64) NOT NULL,
  `gender` varchar(16) NOT NULL,
  `age` int(11) NOT NULL,
  `IPO` varchar(64) NOT NULL,
  `town` varchar(64) NOT NULL,
  `court` varchar(128) NOT NULL,
  `verdict` text NOT NULL,
  `cell_no` double NOT NULL,
  `date_arrested` datetime NOT NULL,
  `date_convicted` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_case_files`
--

INSERT INTO `tbl_case_files` (`case_no`, `name`, `crime`, `address`, `state`, `lga`, `gender`, `age`, `IPO`, `town`, `court`, `verdict`, `cell_no`, `date_arrested`, `date_convicted`) VALUES
(1, 'Alex John', 'Rape', 'Hwolshe, Jos', 'Plateau', 'Jos-South', 'MALE', 21, 'NIL', 'Jos', 'Magistrate court, giring', 'Sentenced to 2 years inprisonment', 43, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'John Lanre', 'Armed robbery', 'Hwolshe, Jos', 'Plateau', 'Jos-South', 'MALE', 21, 'NIL', 'Jos', 'Magistrate court, giring', 'Sentenced to 2 years inprisonment', 43, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'Bosun Temitope', 'Rape', 'Hwolshe, Jos', 'Plateau', 'Jos-South', 'MALE', 21, 'NIL', 'Jos', 'Magistrate court, giring', 'Sentenced to 1 year inprisonment', 41, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Tijani Alhamdu', 'Rape', 'Hwolshe, Jos', 'Plateau', 'Jos-South', 'MALE', 21, 'NIL', 'Jos', 'Magistrate court, giring', 'Sentenced to 2 years inprisonment', 43, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'Jessica Musa', 'Armed robbery', 'Hwolshe, Jos', 'Plateau', 'Jos-South', 'FEMALE', 21, 'NIL', 'Jos', 'Magistrate court, giring', 'Sentenced to 3 years inprisonment', 43, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Alex Ibrahim', 'Domestic violence', 'Hwolshe, Jos', 'Plateau', 'Jos-South', 'MALE', 21, 'NIL', 'Jos', 'Federal high court', 'Sentenced to 2 years inprisonment', 34, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'Belinda Jamea', 'Phone theft', 'Hwolshe, Jos', 'Plateau', 'Jos-South', 'FEMALE', 21, 'NIL', 'Jos', 'Magistrate court, giring', 'Sentenced to 6 months inprisonment', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'Mark Sule', 'Domestic violence', 'Hwolshe, Jos', 'Plateau', 'Jos-South', 'MALE', 21, 'NIL', 'Jos', 'Federal high court', 'Sentenced to 2 years inprisonment', 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, 'John Bala', 'Rape', 'Hwolshe, Jos', 'Plateau', 'Jos-South', 'MALE', 21, 'NIL', 'Jos', 'Magistrate court, giring', 'Sentenced to 2 years inprisonment', 43, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, 'Abaraham Paul', 'Rape', 'Hwolshe, Jos', 'Plateau', 'Jos-South', 'MALE', 21, 'NIL', 'Jos', 'Magistrate court, giring', 'Sentenced to 2 years inprisonment', 43, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'Muhammed Salisu', 'Armed robbery', 'Dogon Karfe, Jos', 'Plateau', 'Jos-north', 'MALE', 39, 'NIL', 'Jos', 'Federal high court', 'Sentenced to 6 years inprisonment', 11, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'Ibrahim Adamu', 'Rape', 'Bassa, Jos', 'Plateau', 'Bassa', 'MALE', 45, 'NIL', 'Jos', 'Magistrate court, giring', 'Sentenced to 2 years inprisonment', 43, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_crimes`
--

CREATE TABLE `tbl_crimes` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `email` varchar(64) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `password` varchar(256) NOT NULL,
  `date_registered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `email`, `phone`, `password`, `date_registered`) VALUES
(1, 'ogabulus@gmail.com', '09021254449', '$2y$10$PmVZCEHDdMod9/O0uwk4l.SV8jmXBTWUQpcTXTWfXqnxfyC0byOWq', '2018-04-14 09:30:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_case_files`
--
ALTER TABLE `tbl_case_files`
  ADD PRIMARY KEY (`case_no`);

--
-- Indexes for table `tbl_crimes`
--
ALTER TABLE `tbl_crimes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_case_files`
--
ALTER TABLE `tbl_case_files`
  MODIFY `case_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_crimes`
--
ALTER TABLE `tbl_crimes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
