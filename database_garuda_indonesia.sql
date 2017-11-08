-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2017 at 07:13 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `survey`
--

-- --------------------------------------------------------

--
-- Table structure for table `averagedata`
--

CREATE TABLE `averagedata` (
  `tipe` varchar(20) NOT NULL,
  `avgTangibles` float DEFAULT NULL,
  `avgReliability` float DEFAULT NULL,
  `avgResponsiveness` float DEFAULT NULL,
  `avgAssurance` float DEFAULT NULL,
  `avgEmpathy` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `averagedata`
--

INSERT INTO `averagedata` (`tipe`, `avgTangibles`, `avgReliability`, `avgResponsiveness`, `avgAssurance`, `avgEmpathy`) VALUES
('update', 4.75, 4.5, 4.5, 4, 3.25);

-- --------------------------------------------------------

--
-- Table structure for table `averagedatavertical`
--

CREATE TABLE `averagedatavertical` (
  `playerid` int(10) NOT NULL,
  `tipe` varchar(20) DEFAULT NULL,
  `percentage` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `averagedatavertical`
--

INSERT INTO `averagedatavertical` (`playerid`, `tipe`, `percentage`) VALUES
(1, 'Tangibles', 2.3333),
(2, 'Reliability', 2),
(3, 'Responsiveness', 3.2),
(4, 'Assurance', 4.3333),
(5, 'Empathy', 5);

-- --------------------------------------------------------

--
-- Table structure for table `datasurvey`
--

CREATE TABLE `datasurvey` (
  `id` int(8) NOT NULL,
  `tangibles` int(8) DEFAULT NULL,
  `reliability` int(8) DEFAULT NULL,
  `responsiveness` int(8) DEFAULT NULL,
  `assurance` int(8) DEFAULT NULL,
  `empathy` int(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datasurvey`
--

INSERT INTO `datasurvey` (`id`, `tangibles`, `reliability`, `responsiveness`, `assurance`, `empathy`) VALUES
(1, 1, 2, 4, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id` int(10) NOT NULL,
  `dimensi` varchar(20) DEFAULT NULL,
  `pertanyaan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id`, `dimensi`, `pertanyaan`) VALUES
(1, 'Tangibles', '"Perusahaan memiliki peralatan yang terlihat  canggih dan modern?\r\n"\r\n'),
(2, 'Reliability', '"Bila pelanggan memiliki masalah, perusahaan akan menunjukkan ketulusan untuk menyelesaikannya?\r\n"\r\n'),
(3, 'Responsiveness', '"Karyawan perusahaan selalu bersedia membantu nasabah?\r\n"\r\n'),
(4, 'Assurance', '"Karyawan Garuda Indonesia bersikap sopan kepada pelanggan?\r\n"\r\n'),
(5, 'Empathy', '"Perusahaan memberi perhatian secara individual kepada pelanggan?\r\n"\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(0, 'arga', 'arga@mail.com', 'c4ca4238a0b923820dcc509a6f75849b'),
(0, 'admin', 'admin@mail.com', 'c4ca4238a0b923820dcc509a6f75849b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `averagedata`
--
ALTER TABLE `averagedata`
  ADD PRIMARY KEY (`tipe`),
  ADD UNIQUE KEY `tipe` (`tipe`);

--
-- Indexes for table `averagedatavertical`
--
ALTER TABLE `averagedatavertical`
  ADD PRIMARY KEY (`playerid`);

--
-- Indexes for table `datasurvey`
--
ALTER TABLE `datasurvey`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datasurvey`
--
ALTER TABLE `datasurvey`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `pertanyaan`
--
ALTER TABLE `pertanyaan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
