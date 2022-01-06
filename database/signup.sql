-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2022 at 11:44 AM
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
(1, 'dchampavat777@gmail.com', 'Divyarajsinh Yashvantsinh Champavat', 'Dj@123', 'male', '43/3 j type sector22 aurvedic road Gandhinagar', 'india', 'Maharastra', 'Gandhinagar', '382022', '2022-01-06 02:37:13.000000'),
(2, 'bhumikachampavat97@gmail.com', 'Divyarajsinh Champavat', '1234567', 'male', '43/3 j type sector22 aurvedic road Gandhinagar', 'india', 'Maharastra', 'Gandhinagar', '382022', '2022-01-06 07:13:40.000000'),
(3, 'jigneshbhimani2411@gmail.com', 'jignesh', 'jignesh@123', 'male', 'Rajkot', 'india', 'Maharastra', 'Gandhinagar', '360004', '2022-01-06 02:45:05.000000'),
(4, 'rchampavat777@gmail.com', 'Ramila Champavat', 'ramila@123', 'female', '43/3 j type sector22 aurvedic road Gandhinagar', 'india', 'Maharastra', 'Gandhinagar', '382022', '2022-01-06 02:46:31.000000'),
(5, 'jayveersinhchampavat2006@gmail.com', 'jayveersinh', 'jayveer@123', 'male', 'pethapur', 'india', 'Maharastra', 'Gandhinagar', '380002', '2022-01-06 02:48:33.000000'),
(6, 'ramanijanvi00@gmail.com', 'janvi', 'janvi@888', 'female', '43/3 j type sector22 aurvedic road Gandhinagar', 'india', 'Maharastra', 'Gandhinagar', '382022', '2022-01-06 02:50:03.000000'),
(7, '190773107501@socet.edu.in', 'Divyarajsinh Yashvantsinh Champavat', 'socet@123', 'male', '43/3 j type sector22 aurvedic road Gandhinagar', 'india', 'Maharastra', 'Gandhinagar', '382022', '2022-01-06 02:56:54.000000'),
(8, 'ychampavat777@gmail.com', 'yashvantsinh', 'y@12345', 'male', '43/3 j type sector22 aurvedic road Gandhinagar', 'United States', 'Texas', 'New York', '382022', '2022-01-06 07:29:55.000000'),
(9, 'thedjgamer777@gmail.com', 'Divyarajsinh Yashvantsinh Champavat', '$2y$10$Anj1lQAHpyTfO8MxvrIFuO6', 'male', '43/3 j type sector22 aurvedic road Gandhinagar', 'india', 'Maharastra', 'Gandhinagar', '382022', '2022-01-06 08:19:37.000000'),
(10, 'Divyaraj@123.gamil.com', 'Divyarajsinh Champavat', '$2y$10$gsc72Xjw.v/ibLCLyaEyt.l', 'male', '43/3 j type sector22 aurvedic road Gandhinagar', 'india', 'Maharastra', 'Gandhinagar', '382022', '2022-01-06 08:30:42.000000'),
(11, 'bhumikachampavat@gmail.com', 'bhumi', '$2y$10$jt2FGutcE9u7/kpRKXEPOOO', 'male', '43/3 j type sector22 aurvedic road Gandhinagar', 'india', 'Maharastra', 'Gandhinagar', '382022', '2022-01-06 08:45:22.000000');

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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
