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
-- Table structure for table `manuals`
--

DROP TABLE IF EXISTS `manuals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `manuals` (
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
  `video` varchar(255) DEFAULT NULL,
  `manual_pdf` longtext,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manuals`
--

LOCK TABLES `manuals` WRITE;
/*!40000 ALTER TABLE `manuals` DISABLE KEYS */;
INSERT INTO `manuals` VALUES (1,'2022-03-25 01:28:51',2,'2022-03-30 12:28:54',2,NULL,NULL,'yes','AAR-T19-01','Manual conector reforçado optap. Manual e vídeo.','https://www.youtube.com/watch?v=9vvKb-rrBz8',NULL),(2,'2022-03-25 02:34:33',2,'2022-08-03 00:52:00',2,NULL,NULL,'yes','AAR-T18-03','Manual de Instruções Reforçado Telefonica AAR-T19-02','https://www.youtube.com/embed/m2f2tquk0yA','s:77:\"furniture/upload/manual/20220802215200_modelo-informe-de-rendimentos-2022.pdf\";'),(3,'2022-05-05 13:55:18',2,'2022-05-05 14:10:10',2,NULL,NULL,'yes','AAR-T18-01','Manual conector reforçado optap. Manual e vídeo.','https://www.youtube.com/watch?v=9vvKb-rrBz8',NULL);
/*!40000 ALTER TABLE `manuals` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-01-19 20:56:41
