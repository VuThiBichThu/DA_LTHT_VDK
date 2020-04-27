-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2020 at 12:23 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doan`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(6) NOT NULL,
  `day` date NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `img_ps` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `plate_num` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `fee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `day`, `time_start`, `time_end`, `img_ps`, `plate_num`, `fee`) VALUES
(0, '2020-04-27', '16:24:44', '00:00:00', 'human (1).jpg', 'moto (1).jpg', 0),
(1, '2020-04-20', '07:00:00', '12:00:00', 'A.jpg', '92-FA00214', 1000),
(2, '2020-04-21', '12:07:00', '19:00:00', 'B.jpg', '92-G100258', 2000),
(3, '2020-04-20', '04:07:00', '15:00:00', 'C.jpg', '92-FA00216', 2000),
(4, '2020-04-20', '07:00:00', '12:00:00', 'D.jpg', '92-FA00218', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `statistics`
--

CREATE TABLE `statistics` (
  `day` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `sum_fee` int(11) NOT NULL,
  `lost` int(11) NOT NULL,
  `overnight` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `statistics`
--

INSERT INTO `statistics` (`day`, `quantity`, `sum_fee`, `lost`, `overnight`) VALUES
('2020-04-20', 3, 4000, 0, 0),
('2020-04-21', 1, 2000, 0, 0),
('2020-04-24', 0, 0, 0, 0),
('2020-04-25', 0, 0, 0, 0),
('2020-04-27', 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `day` (`day`);

--
-- Indexes for table `statistics`
--
ALTER TABLE `statistics`
  ADD PRIMARY KEY (`day`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
