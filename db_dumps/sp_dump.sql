-- MySQL dump 10.13  Distrib 8.0.28, for Linux (x86_64)
--
-- Host: localhost    Database: vet_and_tech
-- ------------------------------------------------------
-- Server version	8.0.28-0ubuntu0.20.04.3

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
-- Table structure for table `sp_categories`
--

DROP TABLE IF EXISTS `sp_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sp_categories` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) CHARACTER SET latin1 DEFAULT NULL,
  `slug` varchar(128) DEFAULT NULL,
  `description` text,
  `status` enum('Y','N') CHARACTER SET latin1 DEFAULT 'Y',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sp_categories`
--

LOCK TABLES `sp_categories` WRITE;
/*!40000 ALTER TABLE `sp_categories` DISABLE KEYS */;
INSERT INTO `sp_categories` VALUES (1,'Orthopedic Surgeries','orthopedic-surgeries',NULL,'Y','2020-03-12 05:11:49','2022-03-01 07:46:26');
/*!40000 ALTER TABLE `sp_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sp_posts`
--

DROP TABLE IF EXISTS `sp_posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sp_posts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int unsigned DEFAULT '0',
  `name` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `heading_content` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `short_content` text CHARACTER SET latin1,
  `full_content` text CHARACTER SET latin1,
  `image_thumbnail` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `image` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `meta_title` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `meta_keywords` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `meta_description` varchar(500) CHARACTER SET latin1 DEFAULT NULL,
  `publish_date` date DEFAULT NULL,
  `status` enum('Y','N') CHARACTER SET latin1 DEFAULT 'Y',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sp_posts`
--

LOCK TABLES `sp_posts` WRITE;
/*!40000 ALTER TABLE `sp_posts` DISABLE KEYS */;
INSERT INTO `sp_posts` VALUES (1,1,'testing article1','testing-article1','testing only','dsfa sdfa sdf','<p>asdf asd asdf&nbsp;</p>','testing article-thumbnail-1646140071.png','testing article-1646140071.png',NULL,NULL,NULL,'2022-03-09','Y','2022-03-01 08:07:51','2022-03-01 08:14:58');
/*!40000 ALTER TABLE `sp_posts` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-01 20:12:17
