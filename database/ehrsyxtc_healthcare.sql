-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2018 at 12:34 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ehr_healthcare`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `d_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `addrs` varchar(200) NOT NULL,
  `dob` date NOT NULL,
  `gndr` varchar(200) NOT NULL,
  `qualific` longblob NOT NULL,
  `password` varchar(200) NOT NULL,
  `mypatient` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `firstaid`
--

CREATE TABLE `firstaid` (
  `id` int(12) NOT NULL,
  `uidai` varchar(12) NOT NULL,
  `rid` varchar(12) NOT NULL,
  `pc` varchar(200) NOT NULL,
  `hpc` varchar(500) NOT NULL,
  `oa` varchar(200) NOT NULL,
  `oe` varchar(200) NOT NULL,
  `alg` varchar(200) NOT NULL,
  `imp` varchar(200) NOT NULL,
  `tx` varchar(200) NOT NULL,
  `plan` varchar(500) NOT NULL,
  `rp` varchar(200) NOT NULL,
  `cp` varchar(10) NOT NULL,
  `rr` varchar(10) NOT NULL,
  `egcs` varchar(10) NOT NULL,
  `vgcs` varchar(10) NOT NULL,
  `mgcs` varchar(10) NOT NULL,
  `cmeds` varchar(500) NOT NULL,
  `maj_inj` varchar(200) NOT NULL,
  `min_inj` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `generalhealth`
--

CREATE TABLE `generalhealth` (
  `uidai` varchar(200) NOT NULL,
  `weight` double NOT NULL,
  `feet` int(11) NOT NULL,
  `inches` int(11) NOT NULL,
  `bmi` double NOT NULL,
  `blood` varchar(10) NOT NULL,
  `eright` float NOT NULL,
  `eleft` float NOT NULL,
  `diseases` varchar(500) NOT NULL,
  `allergy` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `hospital_id` int(11) NOT NULL,
  `hospital_name` varchar(255) NOT NULL,
  `street_1` varchar(255) NOT NULL,
  `street_2` varchar(255) NOT NULL,
  `city_town` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `postal_code` varchar(6) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `patients` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `m_rec`
--

CREATE TABLE `m_rec` (
  `r_id` int(11) NOT NULL,
  `uidai` int(11) NOT NULL,
  `ilns` varchar(200) NOT NULL,
  `doc` longblob NOT NULL,
  `type` varchar(200) NOT NULL,
  `p_doc` longblob NOT NULL,
  `presc_doc` longblob NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pathology`
--

CREATE TABLE `pathology` (
  `pathology_id` int(11) NOT NULL,
  `registration_no` varchar(15) NOT NULL,
  `pathology_name` varchar(255) NOT NULL,
  `street_1` varchar(255) NOT NULL,
  `street_2` varchar(255) NOT NULL,
  `city_town` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `postal_code` varchar(6) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registered_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `uidai` varchar(12) NOT NULL,
  `verification_status` int(11) NOT NULL DEFAULT '0',
  `name` varchar(500) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `address` text NOT NULL,
  `gender` varchar(10) NOT NULL,
  `mobile` varchar(13) NOT NULL,
  `email_id` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `doc` mediumtext NOT NULL,
  `myhospital` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `firstaid`
--
ALTER TABLE `firstaid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `generalhealth`
--
ALTER TABLE `generalhealth`
  ADD PRIMARY KEY (`uidai`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`hospital_id`);

--
-- Indexes for table `m_rec`
--
ALTER TABLE `m_rec`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `pathology`
--
ALTER TABLE `pathology`
  ADD PRIMARY KEY (`pathology_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `registration_no` (`registration_no`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`uidai`),
  ADD UNIQUE KEY `uidai` (`uidai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `firstaid`
--
ALTER TABLE `firstaid`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `hospital_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4590;

--
-- AUTO_INCREMENT for table `m_rec`
--
ALTER TABLE `m_rec`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pathology`
--
ALTER TABLE `pathology`
  MODIFY `pathology_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
