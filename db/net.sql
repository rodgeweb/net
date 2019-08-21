-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2019 at 05:23 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `net`
--

-- --------------------------------------------------------

--
-- Table structure for table `job_position`
--

CREATE TABLE `job_position` (
  `id` int(255) NOT NULL,
  `job_name` varchar(255) NOT NULL,
  `job_description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_position`
--

INSERT INTO `job_position` (`id`, `job_name`, `job_description`) VALUES
(1, 'Web Deveoper', 'Web Developer who can create a website'),
(2, 'Web Designer', 'Web Designer who designs websites and adds materials.'),
(3, 'Content Writter', 'Writes content for website and social media adds.'),
(4, 'Project Manager', 'Manager of projects');

-- --------------------------------------------------------

--
-- Table structure for table `job_tenure`
--

CREATE TABLE `job_tenure` (
  `id` int(255) NOT NULL,
  `tenure_name` varchar(255) NOT NULL,
  `tenure_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employer`
--

CREATE TABLE `tbl_employer` (
  `id` int(255) NOT NULL,
  `employer_name` varchar(255) NOT NULL,
  `employer_description` varchar(255) NOT NULL,
  `emp_status` tinyint(1) NOT NULL,
  `agent_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_employer`
--

INSERT INTO `tbl_employer` (`id`, `employer_name`, `employer_description`, `emp_status`, `agent_id`) VALUES
(1, 'Shakeys Pizaa', 'Pizza parlor', 1, 1),
(2, 'Jollibee', 'Chicken joy and Burger seller', 1, 1),
(3, 'Mang Insasl', 'unlimited rice restaurant', 1, 1),
(4, 'Sitel', 'Call Center Industry', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_job_post`
--

CREATE TABLE `tbl_job_post` (
  `id` int(255) NOT NULL,
  `job_name` varchar(255) NOT NULL,
  `job_description` longtext NOT NULL,
  `job_position_id` int(255) NOT NULL,
  `job_salary` double(255,2) NOT NULL,
  `job_tenure_id` int(255) NOT NULL,
  `employer_id` int(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_job_post`
--

INSERT INTO `tbl_job_post` (`id`, `job_name`, `job_description`, `job_position_id`, `job_salary`, `job_tenure_id`, `employer_id`, `status`) VALUES
(1, 'Web Developer', 'Web Developer specialized in front end web development', 1, 35000.00, 1, 1, 1),
(2, 'web sr', 'SR Web developer', 1, 5555.00, 1, 1, 1),
(3, 'web designer', 'Design Web Pages and other Digital Marketing materials.', 1, 4444.00, 1, 1, 0),
(4, 'SEO Specialist', 'Manage SEO', 1, 3333.00, 1, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `job_position`
--
ALTER TABLE `job_position`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_tenure`
--
ALTER TABLE `job_tenure`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_employer`
--
ALTER TABLE `tbl_employer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_job_post`
--
ALTER TABLE `tbl_job_post`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `job_position`
--
ALTER TABLE `job_position`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `job_tenure`
--
ALTER TABLE `job_tenure`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_employer`
--
ALTER TABLE `tbl_employer`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_job_post`
--
ALTER TABLE `tbl_job_post`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
