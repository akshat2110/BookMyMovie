-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2021 at 07:39 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_movie_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `status`) VALUES
(1, 'admin', 'admin@movie.com', '1234', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `b_id` int(10) NOT NULL,
  `f_name` varchar(20) NOT NULL,
  `l_name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `seats` int(10) NOT NULL,
  `s_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`b_id`, `f_name`, `l_name`, `email`, `phone`, `seats`, `s_id`) VALUES
(1, 'Akshat', 'Mantry', 'akshatmantry@gmail.com', '7001223912', 4, 2),
(2, 'Vedika', 'Mantry', 'vedika@gmail.com', '123456789', 3, 4),
(3, 'Akshat', 'Mantry', 'akshatmantry@gmail.com', '7001223912', 5, 7),
(4, 'Adrija ', 'Guha', 'adrija@gmail.com', '9112233445', 4, 3),
(5, 'Komal', 'Agarwal', 'komal@gmail.com', '8564217912', 3, 7),
(6, 'Vedika', 'Mantry', 'vedikamantry@gmail.com', '7001223111', 6, 2),
(7, 'Akshat', 'Mantry', 'akshat@gmail.com', '7001223912', 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `mov_id` int(10) NOT NULL,
  `mov_name` varchar(30) NOT NULL,
  `price` varchar(10) NOT NULL,
  `mov_image` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`mov_id`, `mov_name`, `price`, `mov_image`, `status`) VALUES
(1, 'The Matrix', '250', 'the_matrix.jpg', 'active'),
(2, 'Greatest Showman', '200', 'greatest_showman.jpg', 'active'),
(3, 'Batman Begins', '250', 'batman.jpg', 'active'),
(4, 'Spider-Man: Homecoming', '200', 'spiderman_homecoming.jpg', 'active'),
(5, 'Fight Club', '150', 'fightClub.jpg', 'inactive'),
(7, 'Avengers Endgame', '350', '20a644e92aa028ca0364c00a795e82b4.jpg', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `shows`
--

CREATE TABLE `shows` (
  `s_id` int(10) NOT NULL,
  `mov_id` int(10) NOT NULL,
  `theatre_id` int(10) NOT NULL,
  `reserved_seats` int(10) NOT NULL DEFAULT 0,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shows`
--

INSERT INTO `shows` (`s_id`, `mov_id`, `theatre_id`, `reserved_seats`, `date`, `start_time`, `end_time`, `status`) VALUES
(1, 1, 1, 0, '2021-04-22', '14:00:00', '17:00:00', 'inactive'),
(2, 1, 3, 15, '2021-04-23', '09:00:00', '12:00:00', 'active'),
(3, 2, 4, 4, '2021-04-22', '15:30:00', '18:30:00', 'active'),
(4, 3, 10, 3, '2021-04-23', '09:00:00', '12:00:00', 'active'),
(5, 4, 7, 0, '2021-04-23', '17:30:00', '20:30:00', 'inactive'),
(6, 4, 5, 0, '2021-04-24', '16:30:00', '19:30:00', 'active'),
(7, 7, 8, 8, '2021-04-25', '09:30:00', '12:30:00', 'active'),
(8, 7, 7, 0, '2021-04-24', '14:30:00', '17:30:00', 'active'),
(9, 1, 11, 0, '2021-04-24', '09:00:00', '12:00:00', 'active'),
(10, 1, 5, 0, '2021-04-25', '15:00:00', '18:00:00', 'active'),
(11, 4, 7, 0, '2021-04-26', '09:00:00', '12:00:00', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `theatre`
--

CREATE TABLE `theatre` (
  `theatre_id` int(10) NOT NULL,
  `theatre_name` varchar(30) NOT NULL,
  `hall_id` int(10) NOT NULL,
  `capacity` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `theatre`
--

INSERT INTO `theatre` (`theatre_id`, `theatre_name`, `hall_id`, `capacity`) VALUES
(1, 'New Empire Cinema', 1, 80),
(2, 'New Empire Cinema', 2, 70),
(3, 'PVR Cinemas Mani Square', 1, 100),
(4, 'PVR Cinemas Diamond ', 2, 90),
(5, 'Paradise Cinema Hall', 1, 50),
(6, 'Jaya Cinemas', 1, 80),
(7, 'INOX CC1', 1, 100),
(8, 'INOX CC2', 2, 90),
(9, 'Chaplin Cinemas', 1, 90),
(10, 'Globe Cinema', 1, 80),
(11, 'INOX CC1', 2, 90);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`b_id`),
  ADD UNIQUE KEY `email` (`email`,`s_id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`mov_id`);

--
-- Indexes for table `shows`
--
ALTER TABLE `shows`
  ADD PRIMARY KEY (`s_id`),
  ADD UNIQUE KEY `theatre_id` (`theatre_id`,`date`,`start_time`);

--
-- Indexes for table `theatre`
--
ALTER TABLE `theatre`
  ADD PRIMARY KEY (`theatre_id`),
  ADD UNIQUE KEY `theatre_name` (`theatre_name`,`hall_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `b_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `mov_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `shows`
--
ALTER TABLE `shows`
  MODIFY `s_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `theatre`
--
ALTER TABLE `theatre`
  MODIFY `theatre_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
