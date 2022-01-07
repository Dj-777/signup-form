-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2022 at 11:11 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `signup`
--

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `id` int(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(30) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `address` varchar(250) NOT NULL,
  `countries` varchar(50) NOT NULL,
  `states` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pincode` varchar(12) NOT NULL,
  `date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`id`, `email`, `name`, `password`, `gender`, `address`, `countries`, `states`, `city`, `pincode`, `date`) VALUES
(1, 'dchampavat777@gmail.com', 'Divyarajsinh Yashvantsinh Champavat', '$2y$10$EDCQowZmRnEcirPtQa7YV.V', 'male', '43/3 j type sector22 aurvedic road Gandhinagar', 'United States', 'Maharastra', 'Gandhinagar', '382022', '2022-01-07 10:49:55.000000'),
(2, 'bhumikachampavat@gmail.com', 'bhumi', '$2y$10$4fTeQ.A.ZIB6CGHBM2Oil.N', 'female', 'Someshwar-1 satellite-road opposite to jodhpur cross road,Ahmedabad  ', 'chaina', 'wuhan', 'Mubai', '380060', '2022-01-07 11:03:31.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
