-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: localhost    Database: database_sistema
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `auth_token`
--

DROP TABLE IF EXISTS `auth_token`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_token` (
  `id` int NOT NULL AUTO_INCREMENT,
  `token` varchar(255) NOT NULL,
  `user` int DEFAULT NULL,
  `expires_in` datetime DEFAULT NULL,
  `created_in` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `auth_token_FK` (`user`),
  CONSTRAINT `auth_token_FK` FOREIGN KEY (`user`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `auth_token_ibfk_1` FOREIGN KEY (`user`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_token`
--

LOCK TABLES `auth_token` WRITE;
/*!40000 ALTER TABLE `auth_token` DISABLE KEYS */;
INSERT INTO `auth_token` VALUES (2,'cyOnJbiCIJiCNIIXIe1V9pzUI6hIGsJ5iRkc.ziJYQiIZd8Sjti43mJijiIywClw2pivO2fWiLaJyIHIFINYJkMx0WxWtZbe6DMZlOoTRIb.T_93_rtuBHkjnN-0ro6nvUef9EM8Vut-sUSmskYbcuJ',1,'2023-09-14 12:06:45','2023-09-14 00:06:45'),(3,'I5IyJckeNUbGizInic16OXIIRCJIip9hJsVC.YOZ6IJNkjtiYZRizIlSIwI08ptbWCxWj4dFibIITJDLMMiiyfOWaiZwl2JyJH2emvi3xQo.sYueEkTk3ur96U80oNtn-bBMcS_tU-rfJmVnvju_s9H',1,'2023-09-18 12:07:42','2023-09-18 00:07:42'),(4,'RXNOC5eVsCIiIJbIzGpyiUJhI96Ick1IciJn.2oSilIRMvbJtT0yNii4jzawjJibiJfIxmItH6ICJk3edQ2pFxDiWZIZwZYOM8lLIiOWyYW.3eBs_mVbk0U6EUMn-_tJ9tScu-rYjnruukTs9NHvo8f',1,'2023-09-18 12:07:55','2023-09-18 00:07:55'),(5,'1e6bpOCyIUIzRnIiG9CcJJXkcIIVhJisNi5I.WbmjJx42iiOLvNyJCiatSfIIJMieziOR6MiI8jYdlZ2iypIlZDJwtFYbZQoWTIxW0k3HIw.n8utEMSHk0mUrfUb-VnkoTYs_63jB9eJtcu_r9u-vNs',1,'2023-09-18 12:09:51','2023-09-18 00:09:51'),(6,'CI1JI6yGnhzJOIs9VcIUeIJpi5iRkINXCicb.NROZiZtCjMW2FJLwwIxJmi0W2YHQDfdbIIiYioTIjtxJypzileyiikMIb8ZJWIS3avOl64.rsYu9jUEfU-mcT9beH6N8o0nrvsB_SJVuu_kt-n3Mtk',1,'2023-09-18 12:10:02','2023-09-18 00:10:02'),(7,'pc1yIhiU5INICIcRJzIG6VkCs9JJniebOiXI.MZkIODQJbbYYiiOilmHZMvpaSWIR34jItzWyw8JlFWiitI02IIjoyJLxNxd26JwiTCfieZ.nMUut3sBboun_vTfk96_0rtUer-Jcm8jE-Ns9YkSuVH',1,'2023-09-18 13:09:16','2023-09-18 01:09:16');
/*!40000 ALTER TABLE `auth_token` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pessoa`
--

DROP TABLE IF EXISTS `pessoa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pessoa` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoa`
--

LOCK TABLES `pessoa` WRITE;
/*!40000 ALTER TABLE `pessoa` DISABLE KEYS */;
/*!40000 ALTER TABLE `pessoa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario` varchar(100) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'teste','7c4a8d09ca3762af61e59520943dc26494f8941b',1);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'database_sistema'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-09-17 22:19:49
