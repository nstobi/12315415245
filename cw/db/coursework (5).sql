-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2023 at 06:39 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coursework`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `category` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `name`, `title`, `content`, `category`, `image`, `date`) VALUES
(24, '123', '123', '123', 'gaming', 'uploads/WORLDS 2023 CHAMPIONS T1 FHD(텍스트X).jpg', '2023-11-29'),
(25, 'tung', 'qwe', 'qwe', 'nature', 'uploads/purepng.com-friesfrench-friesfriespotatochips-14115274213353f6lw.png', '2023-11-29'),
(26, '123', '123', '123', 'education', 'uploads/purepng.com-fried-chickenfood-tasty-dish-cook-chicken-eat-fried-fry-spicy-recipe-leg-941524616527gkslg.png', '2023-11-29'),
(28, 'tung', 'GAME', 'T1 win worlds', 'gaming', 'uploads/WORLDS 2023 CHAMPIONS T1 FHD(텍스트X).jpg', '2023-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `gmail` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` varchar(10) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `gmail`, `password`, `user_type`) VALUES
(37, 'tung', 'tung31102004@gmail.com', '$2y$10$VdsXq9/avolgid7odw02Tuq.zgKbWLUWEp18IHKX6rv', ''),
(38, 'tung123', 'tung31102004t@gmail.com', '$2y$10$CdSDDGsPKPmABA1zb1F6p.G0MpVvMe3yW08y6qDdZXl', ''),
(39, 'admin123', 'tung31102004@gmail.com', '$2y$10$sYFUdEN652juwC0.K8mGl.opMMNAkoSpm7DJHEJ0X5w', ''),
(40, 'tobi123', 'tung31102004@gmail.com', '$2y$10$uQhW.hqI/3eAsZa1hg/7FOhohgwC5rK7P2XfD8ui3P/', ''),
(41, 'lmao', 'tung31102004@gmail.com', '$2y$10$XCMhZGiWEyi9F92onBFOuOJlC9yPkuLDOiAY3uOkd6A', ''),
(42, '12345', 'tung31102004123123@gmail.com', '$2y$10$59dbeUGXS0aDfJHGU1yZx.nOhfKarSWSrtZDW3fPvim', ''),
(43, 'tung1232', 'tung31102004@gmail.com', '123456', ''),
(44, 'lmao123', 'tung311020041123@gmail.com', '123456', ''),
(45, 'asd', 'asd@gmail.com', 'asdasd', 'user'),
(46, '1234567', '123123@gmail.com', '$2y$10$PqIeKczE87g3TF8eCTjNce.W4j0t22dR5Sd8.zz.uY7', 'user'),
(47, 'admintobi', 'tung31102004@gmail.com', '$2y$10$fozMtD0lTqum6kkzwAhPfedDQBRxOv5V0P6hsladitu', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
