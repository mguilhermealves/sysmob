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
-- Table structure for table `urls`
--

DROP TABLE IF EXISTS `urls`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `urls` (
  `idx` mediumint(9) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `removed_at` datetime DEFAULT NULL,
  `removed_by` int(11) DEFAULT NULL,
  `active` enum('yes','no') DEFAULT 'yes',
  `name` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `pattern` varchar(255) NOT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `urls`
--

LOCK TABLES `urls` WRITE;
/*!40000 ALTER TABLE `urls` DISABLE KEYS */;
INSERT INTO `urls` VALUES (1,'2023-01-15 15:08:20',1,NULL,NULL,NULL,NULL,'yes','URL Cadastrar','newurl','cadastrar_url'),(2,'2023-01-15 15:08:20',1,NULL,NULL,NULL,NULL,'yes','Urls Listar','urls','urls'),(3,'2023-01-15 15:08:20',1,NULL,NULL,NULL,NULL,'yes','Url Ação','url','url/%d'),(4,'2023-01-15 15:08:20',1,NULL,NULL,NULL,NULL,'yes','Menu Cadastrar','newmenu','cadastrar_menu'),(5,'2023-01-15 15:08:20',1,NULL,NULL,NULL,NULL,'yes','Menu Listar','menus','menus'),(6,'2023-01-15 15:08:20',1,'2023-01-15 15:08:38',2,NULL,NULL,'yes','Menu Ação','menu','menu/%d'),(7,'2023-01-15 15:08:20',1,NULL,NULL,NULL,NULL,'yes','Rota Ação','route','rota/%d'),(8,'2023-01-15 15:08:20',1,NULL,NULL,NULL,NULL,'yes','Rotas Listar','routes','rotas'),(9,'2023-01-15 15:08:20',1,NULL,NULL,NULL,NULL,'yes','Rota Cadastrar','new_route','cadastrar_rota'),(10,'2023-01-15 15:08:20',1,NULL,NULL,NULL,NULL,'yes','Usuários Listar','users','usuarios'),(11,'2023-01-15 15:08:20',1,NULL,NULL,NULL,NULL,'yes','Usuários Cadastrar','newuser','cadastrar_usuario'),(12,'2023-01-15 15:08:20',1,NULL,NULL,NULL,NULL,'yes','Usuários Ação','user','usuario/%d'),(13,'2023-01-15 15:08:20',1,NULL,NULL,NULL,NULL,'yes','Perfis Listar','profiles','perfis'),(14,'2023-01-15 15:08:20',1,NULL,NULL,NULL,NULL,'yes','Perfis Ação','profile','perfil/%d'),(15,'2023-01-15 15:08:20',1,NULL,NULL,NULL,NULL,'yes','Perfis Cadastrar','newprofile','cadastrar_perfil'),(16,'2023-01-15 15:08:20',1,NULL,NULL,NULL,NULL,'yes','Pre Locatario Cadastrar','newpretenant','cadastrar_pre_locatario'),(17,'2023-01-15 15:08:20',1,NULL,NULL,NULL,NULL,'yes','Pre Locatario Listar','pretenants','pre_locatarios'),(18,'2023-01-15 15:08:20',1,NULL,NULL,NULL,NULL,'yes','Pre Locatario Ação','pretenant','pre_locatario/%d');
/*!40000 ALTER TABLE `urls` ENABLE KEYS */;
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
