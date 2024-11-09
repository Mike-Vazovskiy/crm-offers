-- MySQL dump 10.13  Distrib 9.0.1, for macos15.1 (arm64)
--
-- Host: localhost    Database: crm_offers_db
-- ------------------------------------------------------
-- Server version	9.0.1

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
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migration` (
  `version` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apply_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration`
--

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` VALUES ('m000000_000000_base',1731100014),('m241109_081219_create_offers_table',1731140181),('m241109_081955_insert_offers_data',1731140515),('m241109_082806_insert_offers_data',1731140932);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `offers`
--

DROP TABLE IF EXISTS `offers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `offers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `offers`
--

LOCK TABLES `offers` WRITE;
/*!40000 ALTER TABLE `offers` DISABLE KEYS */;
INSERT INTO `offers` VALUES (1,'Offer 1','offer1@example.com','123-456-7890','2024-11-08 07:00:00'),(2,'Offer 2','offer2@example.com','123-456-7891','2024-11-08 07:05:00'),(3,'Offer 3','offer3@example.com','123-456-7892','2024-11-08 07:10:00'),(4,'Offer 4','offer4@example.com','123-456-7893','2024-11-08 07:15:00'),(5,'Offer 5','offer5@example.com','123-456-7894','2024-11-08 07:20:00'),(6,'Offer 6','offer6@example.com','123-456-7895','2024-11-08 07:25:00'),(7,'Offer 7','offer7@example.com','123-456-7896','2024-11-08 07:30:00'),(8,'Offer 8','offer8@example.com','123-456-7897','2024-11-08 07:35:00'),(9,'Offer 9','offer9@example.com','123-456-7898','2024-11-08 07:40:00'),(10,'Offer 10','offer10@example.com','123-456-7899','2024-11-08 07:45:00'),(11,'Offer 11','offer11@example.com','123-456-7800','2024-11-08 07:50:00'),(12,'Offer 12','offer12@example.com','123-456-7801','2024-11-08 07:55:00'),(13,'Offer 13','offer13@example.com','123-456-7802','2024-11-08 08:00:00'),(14,'Offer 14','offer14@example.com','123-456-7803','2024-11-08 08:05:00'),(15,'Offer 15','offer15@example.com','123-456-7804','2024-11-08 08:10:00'),(16,'Offer 16','offer16@example.com','123-456-7805','2024-11-08 08:15:00'),(17,'Offer 17','offer17@example.com','123-456-7806','2024-11-08 08:20:00'),(18,'Offer 18','offer18@example.com','123-456-7807','2024-11-08 08:25:00'),(19,'Offer 19','offer19@example.com','123-456-7808','2024-11-08 08:30:00'),(20,'Offer 20','offer20@example.com','123-456-7809','2024-11-08 08:35:00'),(21,'Offer 21','offer21@example.com','123-456-7810','2024-11-08 08:40:00');
/*!40000 ALTER TABLE `offers` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-11-09 11:55:09
