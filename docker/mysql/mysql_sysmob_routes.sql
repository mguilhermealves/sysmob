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
-- Table structure for table `routes`
--

DROP TABLE IF EXISTS `routes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `routes` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_at` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `removed_at` datetime DEFAULT NULL,
  `removed_by` int(11) DEFAULT NULL,
  `active` enum('yes','no') DEFAULT 'yes',
  `name` varchar(255) DEFAULT NULL,
  `method` varchar(255) NOT NULL DEFAULT '-',
  `pattern` varchar(255) DEFAULT 'yes',
  `controller` varchar(255) DEFAULT NULL,
  `btncheck` varchar(255) DEFAULT NULL,
  `params` varchar(255) DEFAULT NULL,
  `sys_type` varchar(45) NOT NULL DEFAULT 'system',
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `routes`
--

LOCK TABLES `routes` WRITE;
/*!40000 ALTER TABLE `routes` DISABLE KEYS */;
INSERT INTO `routes` VALUES (1,'2023-01-15 15:30:23',1,NULL,NULL,NULL,NULL,'yes','Rotas Cadastro','GET','cadastrar_rota','routes_controller:form',NULL,NULL,'system'),(2,'2023-01-15 15:30:23',1,NULL,NULL,NULL,NULL,'yes','Rotas Listagem','GET','rotas(?P<format>.html|.json)?','routes_controller:display',NULL,NULL,'system'),(3,'2023-01-15 15:30:23',1,NULL,NULL,NULL,NULL,'yes','Rota Salvar','POST','rota/(?P<idx>[0-9]+?)','routes_controller:save','btn_save',NULL,'system'),(4,'2023-01-15 15:30:23',1,NULL,NULL,NULL,NULL,'yes','Rota Formulário','GET','rota/(?P<idx>[0-9]+?)','routes_controller:form',NULL,NULL,'system'),(5,'2023-01-15 15:30:23',1,NULL,NULL,NULL,NULL,'yes','Rota Cadastrar','POST','cadastrar_rota','routes_controller:save','btn_save',NULL,'system'),(6,'2023-01-15 15:30:23',1,NULL,NULL,NULL,NULL,'yes','Rota Remover','POST','rota/(?P<idx>[0-9]+?)','routes_controller:remove','btn_remove',NULL,'system'),(7,'2023-01-15 15:30:23',1,'2023-01-15 15:31:02',2,NULL,NULL,'yes','Menus Cadastro','GET','cadastrar_menu','menus_controller:form',NULL,NULL,'system'),(8,'2023-01-15 15:30:23',1,NULL,NULL,NULL,NULL,'yes','Menus Listagem','GET','menus(?P<format>.html|.json)?','menus_controller:display',NULL,NULL,'system'),(9,'2023-01-15 15:30:23',1,NULL,NULL,NULL,NULL,'yes','Menus Salvar','POST','menu/(?P<idx>[0-9]+?)','menus_controller:save','btn_save',NULL,'system'),(10,'2023-01-15 15:30:23',1,'2023-01-15 15:31:08',2,NULL,NULL,'yes','Menus Formulário','GET','menu/(?P<idx>[0-9]+?)','menus_controller:form',NULL,NULL,'system'),(11,'2023-01-15 15:30:23',1,'2023-01-15 15:30:58',2,NULL,NULL,'yes','Menus Cadastrar','POST','cadastrar_menu','menus_controller:save','btn_save',NULL,'system'),(12,'2023-01-15 15:30:23',1,NULL,NULL,NULL,NULL,'yes','Menus Remover','POST','menu/(?P<idx>[0-9]+?)','menus_controller:remove','btn_remove',NULL,'system'),(13,'2023-01-15 15:30:23',1,NULL,NULL,NULL,NULL,'yes','Urls Cadastro','GET','cadastrar_url','urls_controller:form',NULL,NULL,'system'),(14,'2023-01-15 15:30:23',1,NULL,NULL,NULL,NULL,'yes','Urls Listagem','GET','urls(?P<format>.html|.json)?','urls_controller:display',NULL,NULL,'system'),(15,'2023-01-15 15:30:23',1,NULL,NULL,NULL,NULL,'yes','Urls Salvar','POST','url/(?P<idx>[0-9]+?)','urls_controller:save','btn_save',NULL,'system'),(16,'2023-01-15 15:30:23',1,NULL,NULL,NULL,NULL,'yes','Urls Formulário','GET','url/(?P<idx>[0-9]+?)','urls_controller:form',NULL,NULL,'system'),(17,'2023-01-15 15:30:23',1,NULL,NULL,NULL,NULL,'yes','Urls Cadastrar','POST','cadastrar_url','urls_controller:save','btn_save',NULL,'system'),(18,'2023-01-15 15:30:23',1,NULL,NULL,NULL,NULL,'yes','Urls Remover','POST','url/(?P<idx>[0-9]+?)','urls_controller:remove','btn_remove',NULL,'system'),(19,'2023-01-15 15:30:23',1,NULL,NULL,NULL,NULL,'yes','Usuários Cadastro','GET','cadastrar_usuario','users_controller:form',NULL,NULL,'system'),(20,'2023-01-15 15:30:23',1,NULL,NULL,NULL,NULL,'yes','Usuários Listagem','GET','usuarios(?P<format>.html|.xls|.json|.autocomplete)?','users_controller:display',NULL,NULL,'system'),(21,'2023-01-15 15:30:23',1,NULL,NULL,NULL,NULL,'yes','Usuários Salvar','POST','usuario/(?P<idx>[0-9]+?)','users_controller:save','btn_save',NULL,'system'),(22,'2023-01-15 15:30:23',1,NULL,NULL,NULL,NULL,'yes','Usuários Formulário','GET','usuario/(?P<idx>[0-9]+?)','users_controller:form',NULL,NULL,'system'),(23,'2023-01-15 15:30:23',1,NULL,NULL,NULL,NULL,'yes','Usuários Cadastrar','POST','cadastrar_usuario','users_controller:save','btn_save',NULL,'system'),(24,'2023-01-15 15:30:23',1,NULL,NULL,NULL,NULL,'yes','Usuários Remover','POST','usuario/(?P<idx>[0-9]+?)','users_controller:remove','btn_remove',NULL,'system'),(25,'2023-01-15 15:30:23',1,NULL,NULL,NULL,NULL,'yes','Perfis Cadastro','GET','cadastrar_perfil','profiles_controller:form',NULL,NULL,'system'),(26,'2023-01-15 15:30:23',1,NULL,NULL,NULL,NULL,'yes','Perfis Listagem','GET','perfis(?P<format>.html|.json)?','profiles_controller:display',NULL,NULL,'system'),(27,'2023-01-15 15:30:23',1,NULL,NULL,NULL,NULL,'yes','Perfis Salvar','POST','perfil/(?P<idx>[0-9]+?)','profiles_controller:save','btn_save',NULL,'system'),(28,'2023-01-15 15:30:23',1,NULL,NULL,NULL,NULL,'yes','Perfis Formulário','GET','perfil/(?P<idx>[0-9]+?)','profiles_controller:form',NULL,NULL,'system'),(29,'2023-01-15 15:30:23',1,NULL,NULL,NULL,NULL,'yes','Perfis Cadastrar','POST','cadastrar_perfil','profiles_controller:save','btn_save',NULL,'system'),(30,'2023-01-15 15:30:23',1,NULL,NULL,NULL,NULL,'yes','Perfis Remover','POST','perfil/(?P<idx>[0-9]+?)','profiles_controller:remove','btn_remove',NULL,'system'),(31,'2023-01-15 15:39:25',1,'2023-01-15 15:43:25',2,NULL,NULL,'yes','Pre Locatario Cadastro','GET','cadastrar_pre_locatario','pretenants_controller:form',NULL,NULL,'system'),(32,'2023-01-15 15:39:25',1,NULL,NULL,NULL,NULL,'yes','Pre Locatario Listagem','GET','pre_locatarios(?P<format>.html|.json)?','pretenants_controller:display',NULL,NULL,'system'),(33,'2023-01-15 15:39:25',1,NULL,NULL,NULL,NULL,'yes','Pre Locatario Salvar','POST','pre_locatario/(?P<idx>[0-9]+?)','pretenants_controller:save','btn_save',NULL,'system'),(34,'2023-01-15 15:39:25',1,NULL,NULL,NULL,NULL,'yes','Pre Locatario Formulário','GET','pre_locatario/(?P<idx>[0-9]+?)','pretenants_controller:form',NULL,NULL,'system'),(35,'2023-01-15 15:39:25',1,'2023-01-15 15:42:56',2,NULL,NULL,'yes','Pre Locatario Cadastrar','POST','cadastrar_pre_locatario','pretenants_controller:save','btn_save',NULL,'system'),(36,'2023-01-15 15:39:25',1,NULL,NULL,NULL,NULL,'yes','Pre Locatario Remover','POST','pre_locatario/(?P<idx>[0-9]+?)','pretenants_controller:remove','btn_remove',NULL,'system');
/*!40000 ALTER TABLE `routes` ENABLE KEYS */;
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
