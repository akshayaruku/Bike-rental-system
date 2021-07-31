-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jun 27, 2021 at 07:04 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dreambikes`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(20) NOT NULL,
  `aemail` varchar(40) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `aemail`, `username`, `password`) VALUES
(1, 'akshay@gmail.com', 'aruku', 'akshay@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `bikes`
--

CREATE TABLE `bikes` (
  `id` int(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `pph` int(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bikes`
--

INSERT INTO `bikes` (`id`, `name`, `pph`, `status`) VALUES
(1001, 'Honda Activa', 70, 'booked'),
(1002, 'Honda Dio', 100, 'available'),
(1003, 'Suzuki Access', 70, 'available'),
(1004, 'Yamaha Fascino', 70, 'available'),
(1005, 'Piaggio Vespa', 70, 'available'),
(1006, 'Bajaj Pulsar 150', 200, 'available'),
(1007, 'Yamaha FZ 150', 150, 'available'),
(1008, 'Suzuki Gixer 150', 150, 'available'),
(1009, 'Bajaj Avenger', 100, 'available'),
(1010, 'Yamaha Entizer', 100, 'available'),
(1011, 'RE Classic 350', 250, 'available'),
(1012, 'RE Thunderbird', 150, 'available'),
(1013, 'RE Himalayan', 200, 'available'),
(1014, 'RE Continental', 250, 'available');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(255) NOT NULL,
  `bikeid` int(255) NOT NULL,
  `userid` int(255) NOT NULL,
  `price` int(255) NOT NULL,
  `pdate` date NOT NULL,
  `ddate` date NOT NULL,
  `utr` varchar(20) NOT NULL,
  `bstatus` varchar(20) NOT NULL,
  `vname` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `bikeid`, `userid`, `price`, `pdate`, `ddate`, `utr`, `bstatus`, `vname`) VALUES
(13, 1001, 42, 1680, '2021-06-26', '2021-06-27', '123456789012', 'pending', 'Honda'),
(14, 1001, 43, 5040, '2021-06-27', '2021-06-30', '123456536', 'success', 'Honda');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `username` varchar(100) NOT NULL,
  `phoneno` varchar(10) NOT NULL,
  `aadhar` int(12) NOT NULL,
  `driving` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(100) NOT NULL,
  `image_url` text CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `phoneno`, `aadhar`, `driving`, `password`, `role`, `image_url`) VALUES
(42, 'shashank.cr007@gmail.com', 'Shashank CR', '8660300067', 2147483647, 'KA13 20190008882', '7fc31348bedc75a229eac251ab7b8689c32fe147', 'user', 'IMG-60d743c48ab5e5.52746194.png'),
(43, 'testest@gmail.com', 'testest', '8660300077', 2147483647, '0835408574', 'a1bbb8f34e9c48c3894e2ec691c8eafed5641bd1', 'user', 'IMG-60d806556dde39.68229096.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`),
  ADD UNIQUE KEY `email` (`aemail`);

--
-- Indexes for table `bikes`
--
ALTER TABLE `bikes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `utr` (`utr`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bikes`
--
ALTER TABLE `bikes`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1019;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
