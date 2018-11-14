-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: localhost    Database: sekolah_db
-- ------------------------------------------------------
-- Server version	5.7.24-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `mata_kuliah`
--

DROP TABLE IF EXISTS `mata_kuliah`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mata_kuliah` (
  `matkul_id` varchar(10) NOT NULL,
  `matkul_nama` varchar(250) DEFAULT NULL,
  `pengajar_id` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`matkul_id`),
  KEY `pengajar_id` (`pengajar_id`),
  CONSTRAINT `mata_kuliah_ibfk_1` FOREIGN KEY (`pengajar_id`) REFERENCES `pengajar` (`pengajar_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mata_kuliah`
--

LOCK TABLES `mata_kuliah` WRITE;
/*!40000 ALTER TABLE `mata_kuliah` DISABLE KEYS */;
/*!40000 ALTER TABLE `mata_kuliah` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pengajar`
--

DROP TABLE IF EXISTS `pengajar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pengajar` (
  `pengajar_id` varchar(20) NOT NULL,
  `pengajar_nama` varchar(250) DEFAULT NULL,
  `pengajar_password` varchar(250) DEFAULT NULL,
  `pengajar_nohp` varchar(12) DEFAULT NULL,
  `pengajar_alamat` varchar(20) NOT NULL,
  `pengajar_gender` varchar(20) NOT NULL,
  `pengajar_email` varchar(20) NOT NULL,
  PRIMARY KEY (`pengajar_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengajar`
--

LOCK TABLES `pengajar` WRITE;
/*!40000 ALTER TABLE `pengajar` DISABLE KEYS */;
/*!40000 ALTER TABLE `pengajar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sesi_kuliah`
--

DROP TABLE IF EXISTS `sesi_kuliah`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sesi_kuliah` (
  `sesi_id` varchar(20) NOT NULL,
  `sesi_nama` text,
  `matkul_id` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`sesi_id`),
  KEY `matkul_id` (`matkul_id`),
  CONSTRAINT `sesi_kuliah_ibfk_1` FOREIGN KEY (`matkul_id`) REFERENCES `mata_kuliah` (`matkul_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sesi_kuliah`
--

LOCK TABLES `sesi_kuliah` WRITE;
/*!40000 ALTER TABLE `sesi_kuliah` DISABLE KEYS */;
/*!40000 ALTER TABLE `sesi_kuliah` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `siswa`
--

DROP TABLE IF EXISTS `siswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `siswa` (
  `siswa_id` varchar(20) NOT NULL,
  `siswa_nama` varchar(250) DEFAULT NULL,
  `siswa_password` varchar(250) DEFAULT NULL,
  `siswa_nohp` varchar(12) DEFAULT NULL,
  `siswa_alamat` varchar(20) NOT NULL,
  `siswa_gender` varchar(20) NOT NULL,
  `siswa_email` varchar(20) NOT NULL,
  PRIMARY KEY (`siswa_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `siswa`
--

LOCK TABLES `siswa` WRITE;
/*!40000 ALTER TABLE `siswa` DISABLE KEYS */;
/*!40000 ALTER TABLE `siswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `siswa_jawaban`
--

DROP TABLE IF EXISTS `siswa_jawaban`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `siswa_jawaban` (
  `siswa_id` varchar(20) DEFAULT NULL,
  `matkul_id` varchar(10) DEFAULT NULL,
  `siswa_soalid` varchar(10) DEFAULT NULL,
  `siswa_jawaban` varchar(1) DEFAULT NULL,
  `sesi_id` varchar(20) DEFAULT NULL,
  KEY `siswa_id` (`siswa_id`),
  KEY `matkul_id` (`matkul_id`),
  KEY `siswa_soalid` (`siswa_soalid`),
  KEY `sesi_id` (`sesi_id`),
  CONSTRAINT `siswa_jawaban_ibfk_1` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`siswa_id`) ON DELETE CASCADE,
  CONSTRAINT `siswa_jawaban_ibfk_2` FOREIGN KEY (`matkul_id`) REFERENCES `mata_kuliah` (`matkul_id`) ON DELETE CASCADE,
  CONSTRAINT `siswa_jawaban_ibfk_3` FOREIGN KEY (`siswa_soalid`) REFERENCES `soal_matkul` (`soal_id`) ON DELETE CASCADE,
  CONSTRAINT `siswa_jawaban_ibfk_4` FOREIGN KEY (`sesi_id`) REFERENCES `sesi_kuliah` (`sesi_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `siswa_jawaban`
--

LOCK TABLES `siswa_jawaban` WRITE;
/*!40000 ALTER TABLE `siswa_jawaban` DISABLE KEYS */;
/*!40000 ALTER TABLE `siswa_jawaban` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `siswa_matkul`
--

DROP TABLE IF EXISTS `siswa_matkul`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `siswa_matkul` (
  `siswa_id` varchar(20) DEFAULT NULL,
  `matkul_id` varchar(20) DEFAULT NULL,
  KEY `siswa_id` (`siswa_id`),
  KEY `matkul_id` (`matkul_id`),
  CONSTRAINT `siswa_matkul_ibfk_1` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`siswa_id`) ON DELETE CASCADE,
  CONSTRAINT `siswa_matkul_ibfk_2` FOREIGN KEY (`matkul_id`) REFERENCES `mata_kuliah` (`matkul_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `siswa_matkul`
--

LOCK TABLES `siswa_matkul` WRITE;
/*!40000 ALTER TABLE `siswa_matkul` DISABLE KEYS */;
/*!40000 ALTER TABLE `siswa_matkul` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `soal_detail`
--

DROP TABLE IF EXISTS `soal_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `soal_detail` (
  `soal_id` varchar(20) DEFAULT NULL,
  `soal_opsi` varchar(1) DEFAULT NULL,
  `soal_opsi_text` text,
  KEY `soal_id` (`soal_id`),
  CONSTRAINT `soal_detail_ibfk_1` FOREIGN KEY (`soal_id`) REFERENCES `soal_matkul` (`soal_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `soal_detail`
--

LOCK TABLES `soal_detail` WRITE;
/*!40000 ALTER TABLE `soal_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `soal_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `soal_matkul`
--

DROP TABLE IF EXISTS `soal_matkul`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `soal_matkul` (
  `soal_id` varchar(10) NOT NULL,
  `soal_no` int(11) DEFAULT NULL,
  `soal_text` text,
  `soal_jawab` varchar(1) DEFAULT NULL,
  `matkul_id` varchar(10) DEFAULT NULL,
  `soal_jawab_text` text NOT NULL,
  `sesi_id` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`soal_id`),
  KEY `matkul_id` (`matkul_id`),
  KEY `sesi_id` (`sesi_id`),
  CONSTRAINT `soal_matkul_ibfk_1` FOREIGN KEY (`sesi_id`) REFERENCES `sesi_kuliah` (`sesi_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `soal_matkul`
--

LOCK TABLES `soal_matkul` WRITE;
/*!40000 ALTER TABLE `soal_matkul` DISABLE KEYS */;
/*!40000 ALTER TABLE `soal_matkul` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-14 14:11:44
