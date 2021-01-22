-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2021 at 09:52 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `donation`
--

-- --------------------------------------------------------

--
-- Table structure for table `countryss`
--

CREATE TABLE `countryss` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `countryss`
--

INSERT INTO `countryss` (`id`, `name`) VALUES
(1, 'algerie');

-- --------------------------------------------------------

--
-- Table structure for table `favoritss`
--

CREATE TABLE `favoritss` (
  `id` bigint(20) NOT NULL,
  `id_post` bigint(20) NOT NULL,
  `id_user` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favoritss`
--

INSERT INTO `favoritss` (`id`, `id_post`, `id_user`) VALUES
(3, 1, 1),
(6, 10, 1),
(7, 8, 1),
(8, 13, 2);

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `politics_fr` longtext NOT NULL,
  `politics_en` longtext NOT NULL,
  `politics_ar` longtext NOT NULL,
  `about_fr` longtext NOT NULL,
  `about_en` longtext NOT NULL,
  `about_ar` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `postss`
--

CREATE TABLE `postss` (
  `id` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `id_donation` bigint(20) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `name_donation` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `images` longtext NOT NULL,
  `share_link` varchar(255) NOT NULL,
  `type_post` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `postss`
--

INSERT INTO `postss` (`id`, `title`, `id_donation`, `id_user`, `name_donation`, `date`, `description`, `images`, `share_link`, `type_post`) VALUES
(21, 'khobz', 0, 1, '', '2021-01-19', 'khobz', '600755c12d906.jpg;', 'http://it-smv.com/donation/khobz', 1);

-- --------------------------------------------------------

--
-- Table structure for table `proviances`
--

CREATE TABLE `proviances` (
  `id` bigint(20) NOT NULL,
  `id_country` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proviances`
--

INSERT INTO `proviances` (`id`, `id_country`, `name`) VALUES
(1, 1, 'adrar'),
(2, 1, 'chlef');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) NOT NULL,
  `id_post` bigint(20) NOT NULL,
  `id_reporter` bigint(20) NOT NULL,
  `id_type_report` bigint(20) NOT NULL,
  `date` varchar(255) NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `id_post`, `id_reporter`, `id_type_report`, `date`, `description`) VALUES
(1, 10, 1, 1, '2021-01-14', 'qd'),
(2, 10, 1, 1, '2021-01-14', 'sdsq'),
(3, 1, 1, 2, '2021-01-14', 'sdsqd');

-- --------------------------------------------------------

--
-- Table structure for table `types_reportss`
--

CREATE TABLE `types_reportss` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `types_reportss`
--

INSERT INTO `types_reportss` (`id`, `name`) VALUES
(1, 'hate speech'),
(2, 'naudity and sex');

-- --------------------------------------------------------

--
-- Table structure for table `type_donations`
--

CREATE TABLE `type_donations` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `type_donations`
--

INSERT INTO `type_donations` (`id`, `name`) VALUES
(1, 'sang'),
(2, 'l\'argent'),
(3, 'autre');

-- --------------------------------------------------------

--
-- Table structure for table `userss`
--

CREATE TABLE `userss` (
  `id` bigint(20) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `password` longtext NOT NULL,
  `id_country` bigint(20) NOT NULL,
  `id_town` bigint(20) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `verified` tinyint(4) NOT NULL,
  `code_verification` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userss`
--

INSERT INTO `userss` (`id`, `fullName`, `username`, `email`, `phone`, `password`, `id_country`, `id_town`, `avatar`, `verified`, `code_verification`) VALUES
(1, 'elhousseyn arab', 'hocine12', 'potency.football@gmail.com', '0782903695', '$2y$10$swg7eeOe4gDYoBIzKJvVkuPQfW5r4E0orYWq.KCAidIJg4Y4thtZa', 1, 1, '5ffef9e2f0b3f.jpg', 0, ''),
(2, 'aziz', 'aziz12', 'hocine.arab1@hotmail.com', '0000000000', '$2y$10$v9EcQB5GRRb6OSexoBrDbO./cJwBiKEhOowd7Qez2RoxnXAEnX/Q.', 1, 2, '', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countryss`
--
ALTER TABLE `countryss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favoritss`
--
ALTER TABLE `favoritss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postss`
--
ALTER TABLE `postss`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `proviances`
--
ALTER TABLE `proviances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types_reportss`
--
ALTER TABLE `types_reportss`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `type_donations`
--
ALTER TABLE `type_donations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userss`
--
ALTER TABLE `userss`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countryss`
--
ALTER TABLE `countryss`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `favoritss`
--
ALTER TABLE `favoritss`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `postss`
--
ALTER TABLE `postss`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `proviances`
--
ALTER TABLE `proviances`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `types_reportss`
--
ALTER TABLE `types_reportss`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `type_donations`
--
ALTER TABLE `type_donations`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `userss`
--
ALTER TABLE `userss`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
