-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2023 at 03:40 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_curd`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` bigint(10) DEFAULT NULL,
  `last_login_time` varchar(255) NOT NULL,
  `image_file_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone_number`, `last_login_time`, `image_file_name`) VALUES
(1, 'Aditya Mishr', 'aditya@gamil.com', '123456', 2147483647, '2023/01/21  04:19:34am', '63cce546a462d.png'),
(2, 'Ashish', 'adi@gmail.com', '49299599', 948899898, '2023/01/19  05:08:49pm', '63c96b28c72cf.png'),
(4, 'Aditya Shyamanand Mishra', 'adityamishra2525@gmail.com', '123456', 2147483647, '2023/01/19  04:34:50pm', '63c9639eb5f66.png'),
(5, 'Aditya ', 'adityamishra9124@gmail.com', '121@gamil', 2147483647, '2023/01/15  02:30:39pm', NULL),
(6, 'A', 'adi@gamil.com', '123456', 84848848, '2023/01/21  04:09:54am', NULL),
(7, 'Aditya Shyamanand ', 'vishal@gamil.com', '123456', 2147483647, '2023/01/22  12:09:11pm', '63caa9eb97a0d.jpg'),
(8, 'Aditya Mishra', 'adityamaster@gmail.com', '123456', 123948, '2023/01/22  08:38:54am', '63cce7f9c081c.png'),
(9, 'Mohini  Mishra', 'mohini@gmail.com', '123456', 2147483647, '2023/01/22  10:37:17am', '63cce87740a03.jpg'),
(10, 'Vishal Gupta', 'vishaly@gmail.com', '123456', 9326293287, '2023/01/22  11:27:10am', '63cd189cb2769.png'),
(11, 'Vishal Yadav', 'visahl@gmail.com', '123456', 7720930999, '2023/01/22  12:08:37pm', NULL),
(12, 'vikas Gupta', 'vikas@gmail.com', '123456', 9326293287, '2023/01/22  12:11:09pm', '63cd19e4796d9.png'),
(13, 'Aditya Shyamanand Mishra', 'aditya121@gmail.com', '123456', 9326293287, '2023/01/26  01:27:39pm', '63d269a7d2eb5.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
