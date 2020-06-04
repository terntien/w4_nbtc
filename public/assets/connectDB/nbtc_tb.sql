-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 13, 2020 at 05:42 PM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `nbtc_tb`
--

-- --------------------------------------------------------

--
-- Table structure for table `law`
--

CREATE TABLE `law` (
  `law_id` int(11) NOT NULL,
  `law_heading` varchar(50) NOT NULL,
  `law_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `report_id` int(11) NOT NULL,
  `report_problem` int(10) NOT NULL,
  `report_date` datetime NOT NULL,
  `report_detail` text NOT NULL,
  `report_user` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `report_problem`
--

CREATE TABLE `report_problem` (
  `problem_id` int(11) NOT NULL,
  `problem_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tower`
--

CREATE TABLE `tower` (
  `tower_id` int(10) NOT NULL,
  `tower_image` text NOT NULL,
  `tower_sending` int(10) NOT NULL,
  `tower_typeleaf` varchar(20) NOT NULL,
  `tower_address` text NOT NULL,
  `tower_parish` varchar(20) NOT NULL,
  `tower_district` varchar(20) NOT NULL,
  `tower_pravince` varchar(20) NOT NULL,
  `tower_code` int(5) NOT NULL,
  `LATDEG` int(5) NOT NULL,
  `LATMIN` int(5) NOT NULL,
  `LATSEC` int(5) NOT NULL,
  `LATDIR` int(5) NOT NULL,
  `LONGDEG` int(5) NOT NULL,
  `LONGMIN` int(5) NOT NULL,
  `LONGSEC` int(5) NOT NULL,
  `LONGDIR` int(5) NOT NULL,
  `tower_license` int(25) NOT NULL,
  `tower_customer` int(10) NOT NULL,
  `tower_network` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tower_customer`
--

CREATE TABLE `tower_customer` (
  `customer_id` int(11) NOT NULL,
  `customer_code` int(20) NOT NULL,
  `customer_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tower_license`
--

CREATE TABLE `tower_license` (
  `license_id` int(11) NOT NULL,
  `license_code` int(20) NOT NULL,
  `license_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tower_network`
--

CREATE TABLE `tower_network` (
  `network_id` int(11) NOT NULL,
  `network_name` text NOT NULL,
  `network_code` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `users_name` int(25) NOT NULL,
  `users_gender` int(1) NOT NULL,
  `users_age` int(11) NOT NULL,
  `users_email` varchar(50) NOT NULL,
  `users_address` text NOT NULL,
  `users_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `law`
--
ALTER TABLE `law`
  ADD PRIMARY KEY (`law_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `report_problem`
--
ALTER TABLE `report_problem`
  ADD PRIMARY KEY (`problem_id`);

--
-- Indexes for table `tower`
--
ALTER TABLE `tower`
  ADD PRIMARY KEY (`tower_id`);

--
-- Indexes for table `tower_customer`
--
ALTER TABLE `tower_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tower_license`
--
ALTER TABLE `tower_license`
  ADD PRIMARY KEY (`license_id`);

--
-- Indexes for table `tower_network`
--
ALTER TABLE `tower_network`
  ADD PRIMARY KEY (`network_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `law`
--
ALTER TABLE `law`
  MODIFY `law_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report_problem`
--
ALTER TABLE `report_problem`
  MODIFY `problem_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tower`
--
ALTER TABLE `tower`
  MODIFY `tower_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tower_customer`
--
ALTER TABLE `tower_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tower_license`
--
ALTER TABLE `tower_license`
  MODIFY `license_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tower_network`
--
ALTER TABLE `tower_network`
  MODIFY `network_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT;
