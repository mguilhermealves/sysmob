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
-- Table structure for table `prespouses`
--

DROP TABLE IF EXISTS `prespouses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `prespouses` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `removed_at` datetime DEFAULT NULL,
  `removed_by` int(11) DEFAULT NULL,
  `active` enum('yes','no') NOT NULL DEFAULT 'yes',
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `cpf` varchar(255) NOT NULL,
  `rg` varchar(255) NOT NULL,
  `nacionality` varchar(255) NOT NULL,
  `celphone` varchar(255) DEFAULT NULL,
  `is_show_financer` enum('yes','no') NOT NULL DEFAULT 'no',
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prespouses`
--

LOCK TABLES `prespouses` WRITE;
/*!40000 ALTER TABLE `prespouses` DISABLE KEYS */;
INSERT INTO `prespouses` VALUES (1,'2023-01-18 00:43:30',2,NULL,NULL,NULL,NULL,'yes','Teste','Silva','2255555','2344','Brasileiro',NULL,'no'),(2,'2023-01-18 00:44:06',2,NULL,NULL,NULL,NULL,'yes','Teste','Silva','2255555','2344','Brasileiro',NULL,'no'),(3,'2023-01-18 00:45:16',2,NULL,NULL,NULL,NULL,'yes','Testa','Alves','2255555','','Brasileiro',NULL,'yes'),(4,'2023-01-18 00:46:38',2,NULL,NULL,NULL,NULL,'yes','Testa','Alves','2255555','','Brasileiro',NULL,'yes'),(5,'2023-01-18 00:47:56',2,NULL,NULL,NULL,NULL,'yes','Testa','Alves','2255555','','Brasileiro',NULL,'yes'),(6,'2023-01-18 00:48:17',2,NULL,NULL,NULL,NULL,'yes','Teste','Silva','2255555','','Brasileiro',NULL,'no'),(7,'2023-01-18 00:48:32',2,NULL,NULL,NULL,NULL,'yes','Teste','Silva','2255555','','Brasileiro',NULL,'no');
/*!40000 ALTER TABLE `prespouses` ENABLE KEYS */;
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
