-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2017 at 06:53 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pieychpi2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblaccounts`
--

CREATE TABLE `tblaccounts` (
  `account_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `account_password` varchar(100) NOT NULL,
  `account_savings` double NOT NULL,
  `account_status` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblcreditcards`
--

CREATE TABLE `tblcreditcards` (
  `card_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `card_password` int(4) NOT NULL,
  `card_savings` double NOT NULL,
  `credit_status` int(11) NOT NULL,
  `card_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `card_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbldeposits`
--

CREATE TABLE `tbldeposits` (
  `dep_id` int(11) NOT NULL,
  `dep_amount` double NOT NULL,
  `dep_user_id` int(11) NOT NULL,
  `dep_status` int(11) NOT NULL,
  `dep_date` varchar(30) NOT NULL,
  `dep_time` varchar(30) NOT NULL,
  `dep_location` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbltransaction`
--

CREATE TABLE `tbltransaction` (
  `tran_id` int(11) NOT NULL,
  `tran_type` varchar(100) NOT NULL,
  `tran_user_id` int(11) NOT NULL,
  `tran_status` int(11) NOT NULL,
  `tran_date` int(11) NOT NULL,
  `tran_time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `user_id` int(11) NOT NULL,
  `user_fname` varchar(100) NOT NULL,
  `user_mname` varchar(100) NOT NULL,
  `user_lname` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_status` int(11) NOT NULL,
  `user_activation_code` varchar(30) NOT NULL,
  `user_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`user_id`, `user_fname`, `user_mname`, `user_lname`, `user_email`, `user_password`, `user_status`, `user_activation_code`, `user_created_at`, `user_updated_at`) VALUES
(1, 'Deomar', 'Del Castillo', 'Torres', 'djtores102@gmail.com', '05e959e529cf13b1fb9b4d3d17767b0998054511', 0, 'qYZ8pfSM', '2017-10-19 16:52:20', '2017-10-19 16:52:20');

-- --------------------------------------------------------

--
-- Table structure for table `tblwithdraw`
--

CREATE TABLE `tblwithdraw` (
  `with_id` int(11) NOT NULL,
  `with_amount` int(11) NOT NULL,
  `with_user_id` int(11) NOT NULL,
  `with_status` int(11) NOT NULL,
  `with_date` int(11) NOT NULL,
  `with_time` int(11) NOT NULL,
  `with_location` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblaccounts`
--
ALTER TABLE `tblaccounts`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `tblcreditcards`
--
ALTER TABLE `tblcreditcards`
  ADD PRIMARY KEY (`card_id`);

--
-- Indexes for table `tbldeposits`
--
ALTER TABLE `tbldeposits`
  ADD PRIMARY KEY (`dep_id`);

--
-- Indexes for table `tbltransaction`
--
ALTER TABLE `tbltransaction`
  ADD PRIMARY KEY (`tran_id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tblwithdraw`
--
ALTER TABLE `tblwithdraw`
  ADD PRIMARY KEY (`with_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblaccounts`
--
ALTER TABLE `tblaccounts`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblcreditcards`
--
ALTER TABLE `tblcreditcards`
  MODIFY `card_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
