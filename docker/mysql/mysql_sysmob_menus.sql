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
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menus` (
  `idx` mediumint(9) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `removed_at` datetime DEFAULT NULL,
  `removed_by` int(11) DEFAULT NULL,
  `active` enum('yes','no') DEFAULT 'yes',
  `name` varchar(255) DEFAULT NULL,
  `parent` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,'2021-12-26 03:01:01',1,'2023-01-15 15:01:43',2,NULL,NULL,'yes','Locátarios','-1','bi bi-book',20),(2,'2021-12-26 05:40:23',1,'2023-01-15 15:31:55',2,NULL,NULL,'yes','Menus','6',NULL,4),(3,'2021-12-26 05:40:36',1,'2023-01-15 15:32:03',2,NULL,NULL,'yes','Urls','6',NULL,2),(4,'2021-12-26 05:41:10',1,'2023-01-15 15:32:10',2,NULL,NULL,'yes','Usuários','-1','bi bi-people-fill',10),(5,'2021-12-26 18:32:44',1,'2023-01-15 15:42:36',2,NULL,NULL,'yes','Rotas','6',NULL,3),(6,'2021-12-26 18:33:01',1,NULL,NULL,NULL,NULL,'yes','Configurações','-1','bi bi-gear',1),(7,'2022-02-20 03:26:01',1,'2023-01-15 15:44:30',2,NULL,NULL,'yes','Perfis','4',NULL,12),(8,'2022-03-04 13:22:29',1,'2023-01-15 15:41:30',2,NULL,NULL,'yes','Pré Locatários','1',NULL,21),(9,'2022-03-04 13:37:15',1,'2023-01-15 15:02:44',2,NULL,NULL,'yes','Lista de Locatários','1',NULL,22),(10,'2023-01-15 15:32:32',2,'2023-01-15 15:35:17',2,NULL,NULL,'yes','Usuarios','4',NULL,11);
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
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
