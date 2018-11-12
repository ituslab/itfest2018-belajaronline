-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2018 at 09:37 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sekolah_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `matkul_id` varchar(10) NOT NULL,
  `matkul_nama` varchar(250) DEFAULT NULL,
  `pengajar_id` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pengajar`
--

CREATE TABLE `pengajar` (
  `pengajar_id` varchar(20) NOT NULL,
  `pengajar_nama` varchar(250) DEFAULT NULL,
  `pengajar_password` varchar(250) DEFAULT NULL,
  `pengajar_nohp` varchar(12) DEFAULT NULL,
  `pengajar_alamat` varchar(20) NOT NULL,
  `pengajar_gender` varchar(20) NOT NULL,
  `pengajar_email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `siswa_id` varchar(20) NOT NULL,
  `siswa_nama` varchar(250) DEFAULT NULL,
  `siswa_password` varchar(250) DEFAULT NULL,
  `siswa_nohp` varchar(12) DEFAULT NULL,
  `siswa_alamat` varchar(20) NOT NULL,
  `siswa_gender` varchar(20) NOT NULL,
  `siswa_email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `siswa_jawaban`
--

CREATE TABLE `siswa_jawaban` (
  `siswa_id` varchar(20) DEFAULT NULL,
  `matkul_id` varchar(10) DEFAULT NULL,
  `siswa_soalid` varchar(10) DEFAULT NULL,
  `siswa_jawaban` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `siswa_matkul`
--

CREATE TABLE `siswa_matkul` (
  `siswa_id` varchar(20) DEFAULT NULL,
  `matkul_id` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `siswa_skor`
--

CREATE TABLE `siswa_skor` (
  `skor_id` varchar(10) NOT NULL,
  `matkul_id` varchar(10) DEFAULT NULL,
  `skor_nilai` double DEFAULT NULL,
  `siswa_id` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `soal_matkul`
--

CREATE TABLE `soal_matkul` (
  `soal_id` varchar(10) NOT NULL,
  `soal_no` int(11) DEFAULT NULL,
  `soal_text` text,
  `soal_jawab` varchar(1) DEFAULT NULL,
  `matkul_id` varchar(10) DEFAULT NULL,
  `soal_jawab_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`matkul_id`),
  ADD KEY `pengajar_id` (`pengajar_id`);

--
-- Indexes for table `pengajar`
--
ALTER TABLE `pengajar`
  ADD PRIMARY KEY (`pengajar_id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`siswa_id`);

--
-- Indexes for table `siswa_jawaban`
--
ALTER TABLE `siswa_jawaban`
  ADD KEY `siswa_id` (`siswa_id`),
  ADD KEY `matkul_id` (`matkul_id`),
  ADD KEY `siswa_soalid` (`siswa_soalid`);

--
-- Indexes for table `siswa_matkul`
--
ALTER TABLE `siswa_matkul`
  ADD KEY `siswa_id` (`siswa_id`),
  ADD KEY `matkul_id` (`matkul_id`);

--
-- Indexes for table `siswa_skor`
--
ALTER TABLE `siswa_skor`
  ADD PRIMARY KEY (`skor_id`),
  ADD KEY `matkul_id` (`matkul_id`),
  ADD KEY `siswa_id` (`siswa_id`);

--
-- Indexes for table `soal_matkul`
--
ALTER TABLE `soal_matkul`
  ADD PRIMARY KEY (`soal_id`),
  ADD KEY `matkul_id` (`matkul_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD CONSTRAINT `mata_kuliah_ibfk_1` FOREIGN KEY (`pengajar_id`) REFERENCES `pengajar` (`pengajar_id`) ON DELETE CASCADE;

--
-- Constraints for table `siswa_jawaban`
--
ALTER TABLE `siswa_jawaban`
  ADD CONSTRAINT `siswa_jawaban_ibfk_1` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`siswa_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `siswa_jawaban_ibfk_2` FOREIGN KEY (`matkul_id`) REFERENCES `mata_kuliah` (`matkul_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `siswa_jawaban_ibfk_3` FOREIGN KEY (`siswa_soalid`) REFERENCES `soal_matkul` (`soal_id`) ON DELETE CASCADE;

--
-- Constraints for table `siswa_matkul`
--
ALTER TABLE `siswa_matkul`
  ADD CONSTRAINT `siswa_matkul_ibfk_1` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`siswa_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `siswa_matkul_ibfk_2` FOREIGN KEY (`matkul_id`) REFERENCES `mata_kuliah` (`matkul_id`) ON DELETE CASCADE;

--
-- Constraints for table `siswa_skor`
--
ALTER TABLE `siswa_skor`
  ADD CONSTRAINT `siswa_skor_ibfk_1` FOREIGN KEY (`matkul_id`) REFERENCES `soal_matkul` (`matkul_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `siswa_skor_ibfk_2` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`siswa_id`) ON DELETE CASCADE;

--
-- Constraints for table `soal_matkul`
--
ALTER TABLE `soal_matkul`
  ADD CONSTRAINT `soal_matkul_ibfk_1` FOREIGN KEY (`matkul_id`) REFERENCES `mata_kuliah` (`matkul_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
