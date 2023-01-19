-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: mysql_sysmob
-- ------------------------------------------------------
-- Server version	5.6.35

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `qrcodes`
--

DROP TABLE IF EXISTS `qrcodes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `qrcodes` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `removed_at` datetime DEFAULT NULL,
  `removed_by` int(11) DEFAULT NULL,
  `active` enum('yes','no') DEFAULT 'yes',
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `link` longtext,
  `url` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `qrcodes`
--

LOCK TABLES `qrcodes` WRITE;
/*!40000 ALTER TABLE `qrcodes` DISABLE KEYS */;
INSERT INTO `qrcodes` VALUES (1,'2022-03-25 00:41:46',2,'2022-07-31 17:54:10',2,NULL,NULL,'yes','Qrcode - AAR-T19-01','Manual conector reforçado optap. Manual e vídeo.','http://sysmob.com/manual/1','furniture/upload/qrcode/file/manual-1.jpeg'),(2,'2022-03-25 02:33:42',2,'2022-07-27 01:06:00',2,NULL,NULL,'yes','Teste','teste','http://sysmob.com/manual/2','furniture/upload/qrcode/file/qrcode-20220726220600.png'),(3,'2022-07-27 00:41:49',2,'2022-07-26 21:41:49',NULL,NULL,NULL,'yes','Teste','testinho',NULL,NULL),(4,'2022-07-27 00:53:08',2,'2022-07-26 21:53:08',NULL,NULL,NULL,'yes','Teste','testinho',NULL,NULL),(5,'2022-07-27 00:54:08',2,'2022-07-31 17:48:44',2,NULL,NULL,'yes','Teste','testinho','http://sysmob.com/manual/5','furniture/upload/qrcode/file/testeqrcode-20220731144535.png'),(6,'2022-07-27 00:54:20',2,'2022-07-31 17:46:28',2,NULL,NULL,'yes','Teste','testinho','http://sysmob.com/manual/6','furniture/upload/qrcode/file/qrcode-20220731144627.png');
/*!40000 ALTER TABLE `qrcodes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-01-19 20:56:43
