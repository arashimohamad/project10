-- MariaDB dump 10.19-11.2.1-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: ecommerce_project10
-- ------------------------------------------------------
-- Server version	11.2.1-MariaDB-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES
(1,'Eric','admin','0133311920','admin@admin.com','$2y$10$9lebGDOPEzuPr49Hhfk/LOC9401o6N8xLRq2ty45Nq46PynQ2Dr/W','23593.jpg',1,'2023-05-20 10:59:46','2023-05-20 10:59:46'),
(2,'Lisa','subadmin','0111111111','lisa@admin.com','$2y$10$9lebGDOPEzuPr49Hhfk/LOC9401o6N8xLRq2ty45Nq46PynQ2Dr/W',NULL,1,'2023-05-20 10:59:46','2023-05-22 04:59:19'),
(3,'John','subadmin','0111111112','john@admin.com','$2y$10$9lebGDOPEzuPr49Hhfk/LOC9401o6N8xLRq2ty45Nq46PynQ2Dr/W',NULL,1,'2023-05-20 10:59:46','2023-05-22 04:59:21');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admins_roles`
--

DROP TABLE IF EXISTS `admins_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins_roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `subadmin_id` int(11) DEFAULT NULL COMMENT 'admin_id',
  `module` varchar(255) DEFAULT NULL,
  `view_access` varchar(255) DEFAULT NULL,
  `edit_access` varchar(255) DEFAULT NULL,
  `full_access` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins_roles`
--

LOCK TABLES `admins_roles` WRITE;
/*!40000 ALTER TABLE `admins_roles` DISABLE KEYS */;
INSERT INTO `admins_roles` VALUES
(18,3,'subadmin_id','0','0','0','2023-08-24 15:24:38','2023-08-24 15:24:38'),
(74,2,'_token','0','0','0','2023-09-08 17:21:43','2023-09-08 17:21:43'),
(75,2,'subadmin_id','0','0','0','2023-09-08 17:21:43','2023-09-08 17:21:43'),
(76,2,'cms_pages','1','1','0','2023-09-08 17:21:43','2023-09-08 17:21:43'),
(77,2,'categories','1','0','1','2023-09-08 17:21:43','2023-09-08 17:21:43'),
(78,2,'products','0','1','0','2023-09-08 17:21:43','2023-09-08 17:21:43'),
(79,2,'brands','1','1','1','2023-09-08 17:21:43','2023-09-08 17:21:43');
/*!40000 ALTER TABLE `admins_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banners` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `alt` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banners`
--

LOCK TABLES `banners` WRITE;
/*!40000 ALTER TABLE `banners` DISABLE KEYS */;
INSERT INTO `banners` VALUES
(1,'84766.png','Slider','winter','Winter Collection','Winter Collection',1,1,'2023-09-11 07:36:46','2023-11-02 16:18:32'),
(2,'84571.png','Slider','women','Women Collection','Women Collection',2,1,'2023-11-02 16:20:16','2023-11-02 16:20:16'),
(3,'96889.png','Slider','t-shirts','T-Shirts Collection','T-Shirts Collection',3,1,'2023-11-02 16:21:16','2023-11-02 16:21:16'),
(4,'7075.png','Fix','new','New Collection','New Collection',1,1,'2023-11-02 16:24:10','2023-11-02 16:24:10'),
(5,'7336.png','Fix','sale','Sale','Sale',2,1,'2023-11-02 16:25:23','2023-11-02 16:25:23'),
(6,'34633.png','Fix','men','Men Collection','Men Collection',3,1,'2023-11-02 16:26:47','2023-11-02 16:26:47'),
(7,'8238.png','Fix','new','New Arrivals','New Arrivals',4,1,'2023-11-02 16:27:23','2023-11-02 16:27:23');
/*!40000 ALTER TABLE `banners` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `brands` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(255) DEFAULT NULL,
  `brand_image` varchar(255) DEFAULT NULL,
  `brand_logo` varchar(255) DEFAULT NULL,
  `brand_discount` double(8,2) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brands`
--

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
INSERT INTO `brands` VALUES
(1,'Arrow','','',0.00,'','arrow','','','',1,'2023-08-27 16:10:12','2023-09-07 23:36:58'),
(2,'Gap','','',0.00,'','gap','','','',1,'2023-08-27 16:10:12','2023-09-07 23:36:58'),
(3,'Monte Carlo','','',0.00,'','monte-carlo','','','',1,'2023-08-27 16:10:12','2023-08-27 16:10:12'),
(4,'Nike','','',0.00,'','nike','','','',1,'2023-08-27 16:10:12','2023-08-27 16:10:12'),
(5,'Puma','','',0.00,'','puma','','','',1,'2023-08-27 16:10:12','2023-09-07 23:36:56'),
(6,'Fila','2087.jpg','88749.png',10.00,'Fila shoes are available','fila','Fila Shoes','Fila Shoes','fila,shoes',1,'2023-09-03 02:29:37','2023-09-07 23:36:55');
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `session_id` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_size` varchar(255) DEFAULT NULL,
  `product_qty` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carts`
--

LOCK TABLES `carts` WRITE;
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;
INSERT INTO `carts` VALUES
(16,'2d3e3bb444b39767e16494d34a3ab43a',NULL,14,'Small',1,'2024-02-09 08:44:50','2024-02-09 08:44:50'),
(17,'33ce8fc88a40d0ddeafac981479054db',NULL,14,'Medium',1,'2024-02-10 12:29:28','2024-02-10 12:29:28'),
(19,'387182378bfee330df244394a3705d50',NULL,14,'Medium',1,'2024-02-15 09:46:59','2024-02-15 09:46:59'),
(24,'399757258245296aadd9819e41826d40',NULL,15,'Large',2,'2024-02-15 11:08:03','2024-02-15 11:08:03'),
(25,'399757258245296aadd9819e41826d40',NULL,14,'Medium',1,'2024-02-15 11:08:12','2024-02-15 11:08:12'),
(27,'7dc68fdf349c217d062e1f0f1b6aa7c6',NULL,4,'Extra Large',2,'2024-03-20 15:10:43','2024-03-20 15:10:43'),
(31,'c0e4702af56ded3290ab4278b5b8734a',NULL,4,'Small',2,'2024-03-22 14:34:55','2024-03-22 14:34:55'),
(32,'d2b4ea868abe2d0d2074c58b6c04f177',NULL,14,'Medium',1,'2024-03-22 14:36:35','2024-03-22 14:36:35'),
(33,'d48c9ccb640a64690e570f0222b295cd',1,14,'Medium',2,'2024-03-22 14:47:17','2024-03-22 14:47:17'),
(34,'d48c9ccb640a64690e570f0222b295cd',1,15,'Medium',2,'2024-03-22 14:47:34','2024-03-22 14:47:34');
/*!40000 ALTER TABLE `carts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `category_image` varchar(255) DEFAULT NULL,
  `category_discount` float DEFAULT 0,
  `description` text DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES
(1,0,'Clothing',NULL,0,NULL,'clothing',NULL,NULL,NULL,1,'2023-06-07 02:20:51','2023-06-07 23:10:18'),
(2,0,'Electronics',NULL,0,NULL,'electronics',NULL,NULL,NULL,1,'2023-06-07 02:20:51','2023-06-07 23:10:26'),
(3,0,'Appliances',NULL,0,NULL,'appliances',NULL,NULL,NULL,1,'2023-06-07 02:20:51','2023-06-07 02:20:51'),
(4,1,'Men',NULL,0,NULL,'men',NULL,NULL,NULL,1,'2023-06-07 02:20:51','2023-06-07 02:20:51'),
(5,1,'Women',NULL,0,NULL,'women',NULL,NULL,NULL,1,'2023-06-07 02:20:51','2023-06-07 02:20:51'),
(6,1,'Kids',NULL,0,NULL,'kids',NULL,NULL,NULL,1,'2023-06-07 02:20:51','2023-06-07 02:20:51'),
(7,0,'Accessories','65511.jpg',10,'This is accessories','accessories','Accessories','Accessories info','accessories',0,'2023-06-19 05:48:15','2023-11-04 15:29:52'),
(8,4,'T-Shirts','',20,NULL,'tshirts',NULL,NULL,NULL,1,'2023-06-19 11:00:06','2023-08-18 10:19:40'),
(9,5,'Women Shirts','60955.jpg',20,'Women Shirts','women-shirts','Women Shirts','women shirts are available','women shirts',1,'2023-06-19 11:35:48','2023-06-20 03:01:04'),
(10,4,'Shirts','',0,NULL,'shirts',NULL,NULL,NULL,1,'2023-11-04 15:27:29','2023-11-04 15:27:29'),
(11,4,'Jackets','',0,NULL,'jackets',NULL,NULL,NULL,1,'2023-11-04 15:28:32','2023-11-04 15:28:32');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cms_pages`
--

DROP TABLE IF EXISTS `cms_pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cms_pages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cms_pages`
--

LOCK TABLES `cms_pages` WRITE;
/*!40000 ALTER TABLE `cms_pages` DISABLE KEYS */;
INSERT INTO `cms_pages` VALUES
(1,'Terms & Conditions','Testing','terms-conditions','Testing','Testing','Testing',1,'2023-05-18 17:32:25','2023-06-07 20:03:41'),
(2,'Privacy Policy','Testing','privacy-policy','Testing','Testing','Testing',1,'2023-05-18 17:33:01','2023-05-18 17:33:01'),
(3,'About Us','Aydentech content provides Laravel Training','about-us','About Us','Aydentech provides Laravel Tutorial','aydentech, about us, laravel',1,'2023-05-18 17:33:55','2023-05-18 17:41:20');
/*!40000 ALTER TABLE `cms_pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colors`
--

DROP TABLE IF EXISTS `colors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `colors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `color_name` varchar(255) DEFAULT NULL,
  `color_code` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL COMMENT 'Active-1, Disable-0',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colors`
--

LOCK TABLES `colors` WRITE;
/*!40000 ALTER TABLE `colors` DISABLE KEYS */;
INSERT INTO `colors` VALUES
(1,'Black','#000000',1,'2023-08-20 00:00:00','2023-08-19 16:00:00'),
(2,'Blue','#0000FF',1,'2023-08-20 00:00:00','2023-08-19 16:00:00'),
(3,'Brown','#964B00',1,'2023-08-20 00:00:00','2023-08-19 16:00:00'),
(4,'Grey','#808080',1,'2023-08-20 00:00:00','2023-08-19 16:00:00'),
(5,'Green','#00FF00',1,'2023-08-20 00:00:00','2023-08-19 16:00:00'),
(6,'Multi','',1,'2023-08-20 00:00:00','2023-08-19 16:00:00'),
(7,'Olive','#808000',1,'2023-08-20 00:00:00','2023-08-19 16:00:00'),
(8,'Orange','#FFA500',1,'2023-08-20 00:00:00','2023-08-19 16:00:00'),
(9,'Pink ','#FFC0CB',1,'2023-08-20 00:00:00','2023-08-19 16:00:00'),
(10,'Purple','#800080',1,'2023-08-20 00:00:00','2023-08-19 16:00:00'),
(11,'Red','#FF0000',1,'2023-08-20 00:00:00','2023-08-19 16:00:00'),
(12,'White','#FFFFFF',1,'2023-08-20 00:00:00','2023-08-19 16:00:00'),
(13,'Yellow','#FFFF00',1,'2023-08-20 00:00:00','2023-08-19 16:00:00');
/*!40000 ALTER TABLE `colors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_code` varchar(2) DEFAULT NULL,
  `country_name` varchar(100) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=247 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries` DISABLE KEYS */;
INSERT INTO `countries` VALUES
(1,'AF','Afghanistan',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(2,'AL','Albania',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(3,'DZ','Algeria',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(4,'AS','American Samoa',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(5,'AD','Andorra',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(6,'AO','Angola',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(7,'AI','Anguilla',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(8,'AQ','Antarctica',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(9,'AG','Antigua and Barbuda',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(10,'AR','Argentina',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(11,'AM','Armenia',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(12,'AW','Aruba',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(13,'AU','Australia',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(14,'AT','Austria',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(15,'AZ','Azerbaijan',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(16,'BS','Bahamas',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(17,'BH','Bahrain',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(18,'BD','Bangladesh',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(19,'BB','Barbados',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(20,'BY','Belarus',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(21,'BE','Belgium',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(22,'BZ','Belize',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(23,'BJ','Benin',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(24,'BM','Bermuda',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(25,'BT','Bhutan',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(26,'BO','Bolivia',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(27,'BA','Bosnia and Herzegovina',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(28,'BW','Botswana',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(29,'BV','Bouvet Island',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(30,'BR','Brazil',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(31,'IO','British Indian Ocean Territory',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(32,'BN','Brunei Darussalam',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(33,'BG','Bulgaria',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(34,'BF','Burkina Faso',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(35,'BI','Burundi',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(36,'KH','Cambodia',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(37,'CM','Cameroon',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(38,'CA','Canada',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(39,'CV','Cape Verde',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(40,'KY','Cayman Islands',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(41,'CF','Central African Republic',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(42,'TD','Chad',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(43,'CL','Chile',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(44,'CN','China',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(45,'CX','Christmas Island',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(46,'CC','Cocos (Keeling) Islands',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(47,'CO','Colombia',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(48,'KM','Comoros',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(49,'CD','Democratic Republic of the Congo',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(50,'CG','Republic of Congo',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(51,'CK','Cook Islands',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(52,'CR','Costa Rica',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(53,'HR','Croatia (Hrvatska)',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(54,'CU','Cuba',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(55,'CY','Cyprus',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(56,'CZ','Czech Republic',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(57,'DK','Denmark',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(58,'DJ','Djibouti',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(59,'DM','Dominica',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(60,'DO','Dominican Republic',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(61,'TL','East Timor',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(62,'EC','Ecuador',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(63,'EG','Egypt',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(64,'SV','El Salvador',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(65,'GQ','Equatorial Guinea',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(66,'ER','Eritrea',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(67,'EE','Estonia',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(68,'ET','Ethiopia',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(69,'FK','Falkland Islands (Malvinas)',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(70,'FO','Faroe Islands',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(71,'FJ','Fiji',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(72,'FI','Finland',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(73,'FR','France',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(74,'FX','France, Metropolitan',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(75,'GF','French Guiana',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(76,'PF','French Polynesia',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(77,'TF','French Southern Territories',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(78,'GA','Gabon',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(79,'GM','Gambia',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(80,'GE','Georgia',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(81,'DE','Germany',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(82,'GH','Ghana',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(83,'GI','Gibraltar',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(84,'GG','Guernsey',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(85,'GR','Greece',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(86,'GL','Greenland',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(87,'GD','Grenada',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(88,'GP','Guadeloupe',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(89,'GU','Guam',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(90,'GT','Guatemala',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(91,'GN','Guinea',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(92,'GW','Guinea-Bissau',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(93,'GY','Guyana',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(94,'HT','Haiti',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(95,'HM','Heard and Mc Donald Islands',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(96,'HN','Honduras',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(97,'HK','Hong Kong',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(98,'HU','Hungary',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(99,'IS','Iceland',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(100,'IN','India',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(101,'IM','Isle of Man',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(102,'ID','Indonesia',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(103,'IR','Iran (Islamic Republic of)',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(104,'IQ','Iraq',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(105,'IE','Ireland',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(106,'IL','Israel',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(107,'IT','Italy',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(108,'CI','Ivory Coast',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(109,'JE','Jersey',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(110,'JM','Jamaica',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(111,'JP','Japan',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(112,'JO','Jordan',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(113,'KZ','Kazakhstan',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(114,'KE','Kenya',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(115,'KI','Kiribati',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(116,'KP','Korea, Democratic People\'s Republic of',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(117,'KR','Korea, Republic of',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(118,'XK','Kosovo',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(119,'KW','Kuwait',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(120,'KG','Kyrgyzstan',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(121,'LA','Lao People\'s Democratic Republic',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(122,'LV','Latvia',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(123,'LB','Lebanon',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(124,'LS','Lesotho',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(125,'LR','Liberia',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(126,'LY','Libyan Arab Jamahiriya',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(127,'LI','Liechtenstein',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(128,'LT','Lithuania',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(129,'LU','Luxembourg',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(130,'MO','Macau',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(131,'MK','North Macedonia',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(132,'MG','Madagascar',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(133,'MW','Malawi',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(134,'MY','Malaysia',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(135,'MV','Maldives',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(136,'ML','Mali',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(137,'MT','Malta',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(138,'MH','Marshall Islands',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(139,'MQ','Martinique',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(140,'MR','Mauritania',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(141,'MU','Mauritius',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(142,'YT','Mayotte',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(143,'MX','Mexico',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(144,'FM','Micronesia, Federated States of',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(145,'MD','Moldova, Republic of',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(146,'MC','Monaco',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(147,'MN','Mongolia',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(148,'ME','Montenegro',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(149,'MS','Montserrat',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(150,'MA','Morocco',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(151,'MZ','Mozambique',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(152,'MM','Myanmar',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(153,'NA','Namibia',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(154,'NR','Nauru',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(155,'NP','Nepal',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(156,'NL','Netherlands',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(157,'AN','Netherlands Antilles',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(158,'NC','New Caledonia',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(159,'NZ','New Zealand',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(160,'NI','Nicaragua',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(161,'NE','Niger',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(162,'NG','Nigeria',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(163,'NU','Niue',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(164,'NF','Norfolk Island',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(165,'MP','Northern Mariana Islands',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(166,'NO','Norway',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(167,'OM','Oman',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(168,'PK','Pakistan',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(169,'PW','Palau',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(170,'PS','Palestine',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(171,'PA','Panama',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(172,'PG','Papua New Guinea',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(173,'PY','Paraguay',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(174,'PE','Peru',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(175,'PH','Philippines',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(176,'PN','Pitcairn',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(177,'PL','Poland',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(178,'PT','Portugal',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(179,'PR','Puerto Rico',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(180,'QA','Qatar',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(181,'RE','Reunion',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(182,'RO','Romania',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(183,'RU','Russian Federation',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(184,'RW','Rwanda',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(185,'KN','Saint Kitts and Nevis',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(186,'LC','Saint Lucia',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(187,'VC','Saint Vincent and the Grenadines',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(188,'WS','Samoa',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(189,'SM','San Marino',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(190,'ST','Sao Tome and Principe',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(191,'SA','Saudi Arabia',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(192,'SN','Senegal',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(193,'RS','Serbia',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(194,'SC','Seychelles',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(195,'SL','Sierra Leone',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(196,'SG','Singapore',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(197,'SK','Slovakia',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(198,'SI','Slovenia',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(199,'SB','Solomon Islands',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(200,'SO','Somalia',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(201,'ZA','South Africa',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(202,'GS','South Georgia South Sandwich Islands',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(203,'SS','South Sudan',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(204,'ES','Spain',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(205,'LK','Sri Lanka',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(206,'SH','St. Helena',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(207,'PM','St. Pierre and Miquelon',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(208,'SD','Sudan',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(209,'SR','Suriname',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(210,'SJ','Svalbard and Jan Mayen Islands',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(211,'SZ','Eswatini',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(212,'SE','Sweden',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(213,'CH','Switzerland',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(214,'SY','Syrian Arab Republic',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(215,'TW','Taiwan',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(216,'TJ','Tajikistan',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(217,'TZ','Tanzania, United Republic of',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(218,'TH','Thailand',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(219,'TG','Togo',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(220,'TK','Tokelau',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(221,'TO','Tonga',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(222,'TT','Trinidad and Tobago',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(223,'TN','Tunisia',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(224,'TR','Turkey',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(225,'TM','Turkmenistan',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(226,'TC','Turks and Caicos Islands',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(227,'TV','Tuvalu',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(228,'UG','Uganda',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(229,'UA','Ukraine',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(230,'AE','United Arab Emirates',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(231,'GB','United Kingdom',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(232,'US','United States',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(233,'UM','United States minor outlying islands',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(234,'UY','Uruguay',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(235,'UZ','Uzbekistan',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(236,'VU','Vanuatu',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(237,'VA','Vatican City State',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(238,'VE','Venezuela',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(239,'VN','Vietnam',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(240,'VG','Virgin Islands (British)',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(241,'VI','Virgin Islands (U.S.)',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(242,'WF','Wallis and Futuna Islands',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(243,'EH','Western Sahara',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(244,'YE','Yemen',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(245,'ZM','Zambia',1,'2024-01-18 05:59:50','2024-01-18 05:59:50'),
(246,'ZW','Zimbabwe',1,'2024-01-18 05:59:50','2024-01-18 05:59:50');
/*!40000 ALTER TABLE `countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coupons` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `coupon_option` varchar(255) DEFAULT NULL,
  `coupon_code` varchar(255) DEFAULT NULL,
  `coupon_type` varchar(255) DEFAULT NULL,
  `amount_type` varchar(255) DEFAULT NULL,
  `amount` double(8,2) DEFAULT NULL,
  `categories` text DEFAULT NULL,
  `brands` text DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `users` text DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coupons`
--

LOCK TABLES `coupons` WRITE;
/*!40000 ALTER TABLE `coupons` DISABLE KEYS */;
INSERT INTO `coupons` VALUES
(1,'Manual','test10','Single Time','Percentage',10.00,'1,4,8,10,11,5,9,6','6','2024-12-31','aamily@yahoo.com',1,'2024-01-26 08:55:09','2024-02-10 17:59:58'),
(2,'Manual','test20','Single Time','Percentage',20.00,'1,4,8,10,11,5,9,6,2,3','1,2','2024-12-31','aamily@yahoo.com',1,'2024-01-26 08:55:09','2024-02-15 11:21:30'),
(3,'Automatic','miaEHus5','Single Time','Percentage',10.00,'1,4,8,10','1,6,2,3','2024-03-09','aamily@yahoo.com,rosli.khamis@gmail.com',1,'2024-02-09 10:43:45','2024-02-15 11:20:20'),
(4,'Manual','test21','Single Time','Fixed',55.00,'1,4,8,10,11','1,6,2,3','2024-03-09','rosli.khamis@gmail.com,melati.samad@yahoo.com,tuanhakimi@gmail.com',1,'2024-02-09 10:47:44','2024-02-15 11:22:09'),
(5,'Automatic','f9OqsRz7','Single Time','Percentage',200.00,'1,4,8','1,6','2024-03-09','aamily@yahoo.com,rosli.khamis@gmail.com',1,'2024-02-10 10:32:30','2024-02-10 17:46:09');
/*!40000 ALTER TABLE `coupons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `delivery_addresses`
--

DROP TABLE IF EXISTS `delivery_addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `delivery_addresses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `delivery_addresses`
--

LOCK TABLES `delivery_addresses` WRITE;
/*!40000 ALTER TABLE `delivery_addresses` DISABLE KEYS */;
INSERT INTO `delivery_addresses` VALUES
(1,1,'Ismail Bin Taib','Lot 270 Lrg Haji Yaacob Kg Tok Buak, Simpang Empat Tendong','Pasir Mas','Kelantan','Malaysia','17030','013-9235690',1,'2024-03-22 15:16:34','2024-03-22 15:16:34'),
(2,1,'Muhammad Fathmi Bin Masor @ Mansor','Lot 506, Lorong Mussala, Kg. Pulau Belanga, Sering','Kota Bharu','Kelantan','Malaysia','16150','014-8253134',1,'2024-03-22 15:16:34','2024-03-22 15:16:34');
/*!40000 ALTER TABLE `delivery_addresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_reset_tokens_table',1),
(3,'2019_08_19_000000_create_failed_jobs_table',1),
(4,'2019_12_14_000001_create_personal_access_tokens_table',1),
(5,'2023_05_09_062716_create_admins_table',1),
(6,'2023_05_17_013024_create_cms_pages_table',2),
(7,'2023_05_23_113937_create_admins_roles_table',3),
(8,'2023_06_07_091414_create_categories_table',4),
(9,'2023_08_16_104036_create_products_table',5),
(10,'2023_08_20_144501_create_products_images_table',6),
(11,'2023_08_22_005139_create_products_attributes_table',7),
(12,'2023_08_24_235418_create_brands_table',8),
(14,'2023_09_11_151936_create_banners_table',9),
(19,'2023_11_05_194912_update_products_table',10),
(20,'2023_11_11_081425_create_products_filters_table',11),
(21,'2023_11_19_150446_create_recently_viewed_items_table',12),
(22,'2023_11_28_231758_create_carts_table',13),
(23,'2023_12_22_182659_add_columns_to_users_table',14),
(24,'2024_01_26_155305_create_coupons_table',15),
(26,'2024_03_22_225052_create_delivery_addresses_table',16);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `product_code` varchar(255) DEFAULT NULL,
  `product_color` varchar(255) DEFAULT NULL,
  `family_color` varchar(255) DEFAULT NULL,
  `group_code` varchar(255) DEFAULT NULL,
  `product_price` double(8,2) DEFAULT NULL,
  `product_discount` double(8,2) DEFAULT NULL,
  `discount_type` varchar(255) DEFAULT NULL,
  `final_price` double(8,2) DEFAULT NULL,
  `product_weight` varchar(255) DEFAULT NULL,
  `product_video` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `wash_care` text DEFAULT NULL,
  `search_keywords` text DEFAULT NULL,
  `fabric` varchar(255) DEFAULT NULL,
  `pattern` varchar(255) DEFAULT NULL,
  `sleeve` varchar(255) DEFAULT NULL,
  `fit` varchar(255) DEFAULT NULL,
  `occasion` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `is_featured` enum('No','Yes') DEFAULT NULL,
  `is_bestseller` enum('No','Yes') DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES
(1,8,1,'Blue T-Shirt','BT001','Dark Blue','Blue','TSHIRT0000',170.00,10.00,'product',153.00,'500','','Test Product',NULL,NULL,'Cotton','Plain','Full Sleeve','Regular','Casual',NULL,NULL,NULL,'Yes','Yes',1,'2023-08-16 03:44:29','2023-12-03 15:45:58'),
(2,8,5,'Red T-Shirt','RT001','Red','Red','TSHIRT0000',100.00,0.00,'category',80.00,'400','','Test Product',NULL,NULL,'Polyester','Plain','Half Sleeve','Slim','Casual',NULL,NULL,NULL,'No','No',1,'2023-08-16 03:44:29','2023-11-11 10:25:02'),
(3,9,4,'Green Women T-Shirt','GWT011','Dark Green','Green','1000',40.00,0.00,'category',32.00,'100',NULL,'Women Shirt','TESTING','tshirts','Polyester','Printed','Short Sleeve','Slim','Formal','tshirt','good tshirts','tshirt','Yes','No',1,'2023-08-17 11:34:17','2023-11-11 09:38:58'),
(4,8,3,'Yellow T-Shirt','YT001','Yellow','Yellow','10',70.00,0.00,'category',56.00,NULL,'701721522.mp4','TEST','TEST','TEST','Cotton',NULL,NULL,NULL,NULL,'TEST','TEST','TEST','Yes','No',1,'2023-08-18 04:03:43','2023-11-11 13:26:48'),
(5,8,4,'Grey Casual T-Shirt','GRCT001','Grey','Grey',NULL,10.00,0.00,'category',8.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'No','No',1,'2023-08-22 10:28:39','2023-11-11 13:38:11'),
(7,8,1,'Green T-shirt','GT011','Green','Green',NULL,70.00,10.00,'product',63.00,'100',NULL,NULL,NULL,NULL,'Cotton',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'No','No',1,'2023-09-08 00:15:06','2023-11-18 03:38:01'),
(12,8,1,'Red Casual T-shirt','RCT001','Red','Red',NULL,110.00,0.00,'category',88.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'No','No',1,'2023-11-04 16:50:18','2023-11-04 17:32:59'),
(13,8,2,'Gap T-shirt','GT01','Blue','Blue','45000',120.00,10.00,'product',108.00,'100',NULL,NULL,NULL,NULL,'Cotton',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Yes','No',1,'2023-11-04 16:52:21','2023-11-11 13:42:58'),
(14,8,2,'Gap Blue T-Shirt','GBT001','Blue','Blue','RGT0100',130.00,10.00,'product',117.00,'100',NULL,NULL,NULL,NULL,'Cotton',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Yes','Yes',1,'2023-11-04 17:08:40','2023-11-18 03:34:46'),
(15,8,2,'Red Gap T-shirt','RGT01','Red','Red','RGT0100',140.00,15.00,'product',119.00,'100','1214211892.mp4','This is Red Gap T-shirt. Very Good T-shirt and was created by pure cotton.',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Yes','Yes',1,'2023-11-04 17:10:50','2023-11-18 07:36:17'),
(16,8,5,'Black Puma T-shirt','BLPT001','Black','Black','45000',160.00,10.00,'product',144.00,'100',NULL,NULL,NULL,NULL,'Cotton',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'No','No',1,'2023-11-09 15:09:40','2023-11-11 13:27:54'),
(17,9,1,'Women Red Shirt','WRS001','Red','Red','45000',190.00,10.00,'product',171.00,'100',NULL,NULL,NULL,NULL,'Wool',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'No','No',1,'2023-11-11 13:33:29','2023-11-11 13:33:29'),
(18,8,6,'Grey T-Shirt','GT001','Grey','Grey',NULL,170.00,0.00,'category',136.00,'100',NULL,NULL,NULL,NULL,'Cotton',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'No','No',1,'2023-11-11 13:37:49','2023-11-11 13:40:57'),
(19,8,2,'Green Gap T-Shirt','GGT001','Green','Green','RGT0100',145.00,10.00,'product',130.50,'100',NULL,NULL,NULL,NULL,'Cotton',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'No','No',1,'2023-11-18 03:41:34','2023-11-18 03:41:34');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products_attributes`
--

DROP TABLE IF EXISTS `products_attributes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products_attributes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_attributes`
--

LOCK TABLES `products_attributes` WRITE;
/*!40000 ALTER TABLE `products_attributes` DISABLE KEYS */;
INSERT INTO `products_attributes` VALUES
(1,1,'Small','BT001S',130.00,100,1,'2023-08-21 17:15:35','2023-12-03 15:48:47'),
(2,1,'Medium','BT001M',140.00,80,1,'2023-08-21 17:15:35','2023-12-03 15:48:47'),
(3,1,'Large','BT001L',150.00,60,1,'2023-08-21 17:15:35','2023-12-03 15:48:47'),
(4,4,'Extra Large','YT001XL',25.00,40,1,'2023-08-21 17:15:35','2023-11-11 18:24:04'),
(5,1,'Double Extra Large','BT001XXL',160.00,30,1,'2023-08-21 17:15:35','2023-12-03 15:48:47'),
(6,5,'Small','GCT001S',10.00,100,1,'2023-08-22 10:28:39','2023-11-11 13:38:11'),
(7,5,'Medium','GCT001M',15.00,60,1,'2023-08-22 10:28:39','2023-11-11 13:38:11'),
(8,5,'Large','GCT001L',20.00,80,1,'2023-08-22 10:28:39','2023-11-11 13:38:11'),
(15,12,'Small','RCT001S',120.00,100,1,'2023-11-04 16:50:18','2023-11-04 17:32:59'),
(16,12,'Medium','RCT001M',130.00,100,1,'2023-11-04 16:50:18','2023-11-04 17:32:59'),
(17,12,'Large','RCT001L',135.00,100,1,'2023-11-04 16:50:18','2023-11-04 17:32:59'),
(18,4,'Small','YT001S',50.00,10,1,'2023-11-11 18:12:52','2023-11-11 18:26:35'),
(19,4,'Medium','YT001M',60.00,20,1,'2023-11-11 18:12:52','2023-11-11 18:26:35'),
(20,4,'Large','YT001L',70.00,15,1,'2023-11-11 18:26:35','2023-11-11 18:26:35'),
(21,1,'Extra Large','BT001XL',170.00,20,1,'2023-11-11 18:26:35','2023-12-03 15:48:47'),
(22,15,'Small','RGT01-S',140.00,18,1,'2023-11-17 06:33:52','2023-11-18 07:52:45'),
(23,15,'Medium','RGT01-M',160.00,7,1,'2023-11-17 06:33:52','2023-11-18 07:52:45'),
(24,15,'Large','RGT01-L',180.00,22,1,'2023-11-17 06:33:52','2023-11-18 07:52:45'),
(25,14,'Small','GBT001-S',130.00,10,1,'2023-12-03 13:55:04','2023-12-08 07:46:36'),
(26,14,'Medium','GBT001-M',140.00,20,1,'2023-12-03 13:55:04','2023-12-03 13:55:04');
/*!40000 ALTER TABLE `products_attributes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products_filters`
--

DROP TABLE IF EXISTS `products_filters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products_filters` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `filter_name` varchar(255) DEFAULT NULL,
  `filter_value` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_filters`
--

LOCK TABLES `products_filters` WRITE;
/*!40000 ALTER TABLE `products_filters` DISABLE KEYS */;
INSERT INTO `products_filters` VALUES
(1,'Fabric','Cotton',1,1,'2023-11-11 00:41:48','2023-11-11 00:41:48'),
(2,'Fabric','Polyester',2,1,'2023-11-11 00:41:48','2023-11-11 00:41:48'),
(3,'Fabric','Wool',3,1,'2023-11-11 00:41:48','2023-11-11 00:41:48'),
(4,'Sleeve','Full Sleeve',1,1,'2023-11-11 00:41:48','2023-11-11 00:41:48'),
(5,'Sleeve','Half Sleeve',2,1,'2023-11-11 00:41:48','2023-11-11 00:41:48'),
(6,'Sleeve','Short Sleeve',3,1,'2023-11-11 00:41:48','2023-11-11 00:41:48'),
(7,'Sleeve','Sleeveless',4,1,'2023-11-11 00:41:48','2023-11-11 00:41:48'),
(8,'Pattern','Checked',1,1,'2023-11-11 00:41:48','2023-11-11 00:41:48'),
(9,'Pattern','Plain',2,1,'2023-11-11 00:41:48','2023-11-11 00:41:48'),
(10,'Pattern','Printed',3,1,'2023-11-11 00:41:48','2023-11-11 00:41:48'),
(11,'Pattern','Self',4,1,'2023-11-11 00:41:48','2023-11-11 00:41:48'),
(12,'Pattern','Solid',5,1,'2023-11-11 00:41:48','2023-11-11 00:41:48'),
(13,'Fit','Regular',1,1,'2023-11-11 00:41:48','2023-11-11 00:41:48'),
(14,'Fit','Slim',2,1,'2023-11-11 00:41:48','2023-11-11 00:41:48'),
(15,'Occasion','Casual',1,1,'2023-11-11 00:41:48','2023-11-11 00:41:48'),
(16,'Occasion','Formal',2,1,'2023-11-11 00:41:48','2023-11-11 00:41:48'),
(17,'Occasion','Party',3,1,'2011-11-23 00:41:00','2011-11-23 00:41:00');
/*!40000 ALTER TABLE `products_filters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products_images`
--

DROP TABLE IF EXISTS `products_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products_images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `image_sort` int(11) DEFAULT 0,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_images`
--

LOCK TABLES `products_images` WRITE;
/*!40000 ALTER TABLE `products_images` DISABLE KEYS */;
INSERT INTO `products_images` VALUES
(8,14,'product-6893143.jpg',0,1,'2023-11-04 17:08:41','2023-12-03 13:55:04'),
(9,15,'product-6729803.jpg',0,1,'2023-11-04 17:10:50','2023-11-18 07:52:45'),
(11,4,'product-882432.jpg',0,1,'2023-11-11 18:10:48','2023-11-11 18:26:35'),
(12,15,'product-1697623.jpg',0,1,'2023-11-13 00:04:57','2023-11-18 07:52:45'),
(13,15,'product-2349149.jpg',0,1,'2023-11-13 00:05:18','2023-11-18 07:52:45'),
(17,19,'product-5184377.jpg',0,1,'2023-11-18 04:42:47','2023-11-18 04:42:47');
/*!40000 ALTER TABLE `products_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recently_viewed_items`
--

DROP TABLE IF EXISTS `recently_viewed_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recently_viewed_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recently_viewed_items`
--

LOCK TABLES `recently_viewed_items` WRITE;
/*!40000 ALTER TABLE `recently_viewed_items` DISABLE KEYS */;
INSERT INTO `recently_viewed_items` VALUES
(1,19,'dec3a972d146e176f27ff7c468429de5','2023-11-19 14:06:22','2023-11-19 14:06:22'),
(2,15,'dec3a972d146e176f27ff7c468429de5','2023-11-19 14:06:32','2023-11-19 14:06:32'),
(3,14,'dec3a972d146e176f27ff7c468429de5','2023-11-19 14:07:19','2023-11-19 14:07:19'),
(4,1,'dec3a972d146e176f27ff7c468429de5','2023-11-19 14:31:51','2023-11-19 14:31:51'),
(5,4,'259d8f63cb65a10b4676e44a99b94f91','2023-11-28 15:14:53','2023-11-28 15:14:53'),
(6,15,'259d8f63cb65a10b4676e44a99b94f91','2023-11-28 15:15:00','2023-11-28 15:15:00'),
(7,15,'f827568de9da6875841ee19357910728','2023-11-28 15:33:20','2023-11-28 15:33:20'),
(8,15,'29b64eef1141360873e83ea8ce2f5d8d','2023-11-28 15:47:48','2023-11-28 15:47:48'),
(9,15,'1874c67ef2cc02093c0c363755e1adba','2023-11-28 15:51:31','2023-11-28 15:51:31'),
(10,15,'ec22a71c6819c6d97126a01f5332505b','2023-11-28 17:11:59','2023-11-28 17:11:59'),
(11,15,'d8471667e4b23cf77fb898bf6e58a6f6','2023-11-28 17:50:59','2023-11-28 17:50:59'),
(12,15,'2b54d5a290b9fb29af4fedb1340bb91e','2023-11-28 19:06:16','2023-11-28 19:06:16'),
(13,15,'5e4f4ab997e12f0aac4bde8c738c21e3','2023-12-03 13:32:42','2023-12-03 13:32:42'),
(14,14,'5e4f4ab997e12f0aac4bde8c738c21e3','2023-12-03 13:52:06','2023-12-03 13:52:06'),
(15,1,'5e4f4ab997e12f0aac4bde8c738c21e3','2023-12-03 15:15:10','2023-12-03 15:15:10'),
(16,4,'faf32c65f7779acaf7c0eb23f12ecf16','2023-12-04 09:28:00','2023-12-04 09:28:00'),
(17,15,'faf32c65f7779acaf7c0eb23f12ecf16','2023-12-04 09:28:06','2023-12-04 09:28:06'),
(18,14,'faf32c65f7779acaf7c0eb23f12ecf16','2023-12-04 09:28:25','2023-12-04 09:28:25'),
(19,1,'faf32c65f7779acaf7c0eb23f12ecf16','2023-12-04 09:28:49','2023-12-04 09:28:49'),
(20,14,'a6db50c0a545f3066ceedd27288bd176','2023-12-05 15:44:08','2023-12-05 15:44:08'),
(21,15,'a6db50c0a545f3066ceedd27288bd176','2023-12-05 15:44:22','2023-12-05 15:44:22'),
(22,14,'7d7919799703f269d6fe30e9ff1cd17b','2023-12-05 16:19:02','2023-12-05 16:19:02'),
(23,15,'7d7919799703f269d6fe30e9ff1cd17b','2023-12-05 16:19:19','2023-12-05 16:19:19'),
(24,4,'a6db50c0a545f3066ceedd27288bd176','2023-12-05 16:30:53','2023-12-05 16:30:53'),
(25,14,'8cdeef8dbe1f68c455cc75781879807a','2023-12-06 18:02:53','2023-12-06 18:02:53'),
(26,15,'8cdeef8dbe1f68c455cc75781879807a','2023-12-06 18:03:16','2023-12-06 18:03:16'),
(27,14,'21350941a14dadab99f5e1a6cd2fce43','2023-12-06 18:24:01','2023-12-06 18:24:01'),
(28,15,'21350941a14dadab99f5e1a6cd2fce43','2023-12-06 18:24:16','2023-12-06 18:24:16'),
(29,14,'442ed5f4466df4e970cbde028b9e9e3e','2023-12-08 06:57:14','2023-12-08 06:57:14'),
(30,15,'442ed5f4466df4e970cbde028b9e9e3e','2023-12-08 06:57:32','2023-12-08 06:57:32'),
(31,15,'75f0d0054b55a985ed719b960d26b83d','2023-12-10 17:41:50','2023-12-10 17:41:50'),
(32,4,'75f0d0054b55a985ed719b960d26b83d','2023-12-10 17:58:03','2023-12-10 17:58:03'),
(33,14,'75f0d0054b55a985ed719b960d26b83d','2023-12-10 17:58:29','2023-12-10 17:58:29'),
(34,19,'75f0d0054b55a985ed719b960d26b83d','2023-12-10 17:58:39','2023-12-10 17:58:39'),
(35,1,'75f0d0054b55a985ed719b960d26b83d','2023-12-10 17:59:02','2023-12-10 17:59:02'),
(36,2,'75f0d0054b55a985ed719b960d26b83d','2023-12-10 18:07:17','2023-12-10 18:07:17'),
(37,7,'75f0d0054b55a985ed719b960d26b83d','2023-12-10 18:07:35','2023-12-10 18:07:35'),
(38,13,'75f0d0054b55a985ed719b960d26b83d','2023-12-10 18:07:45','2023-12-10 18:07:45'),
(39,15,'cb16c63137338b54ea0159f0a8786921','2023-12-14 17:02:45','2023-12-14 17:02:45'),
(40,15,'999ed90cb73bc94188478fbdba2d0415','2023-12-14 23:58:14','2023-12-14 23:58:14'),
(41,1,'999ed90cb73bc94188478fbdba2d0415','2023-12-15 00:34:30','2023-12-15 00:34:30'),
(42,14,'7f90b366abe58e9867f7c3f1addc307a','2023-12-17 13:18:43','2023-12-17 13:18:43'),
(43,15,'7f90b366abe58e9867f7c3f1addc307a','2023-12-17 13:18:53','2023-12-17 13:18:53'),
(44,15,'3df42341cda97259badfec20ef8126a2','2024-01-25 07:47:02','2024-01-25 07:47:02'),
(45,14,'3df42341cda97259badfec20ef8126a2','2024-01-25 07:54:40','2024-01-25 07:54:40'),
(46,4,'3df42341cda97259badfec20ef8126a2','2024-01-25 08:09:51','2024-01-25 08:09:51'),
(47,19,'3df42341cda97259badfec20ef8126a2','2024-01-25 08:11:59','2024-01-25 08:11:59'),
(48,4,'5f45f7477301e931d4dbdd12f4ff3924','2024-01-25 08:19:38','2024-01-25 08:19:38'),
(49,4,'10ac8b5744e720bf7dc997653bccfefe','2024-01-25 08:23:20','2024-01-25 08:23:20'),
(50,4,'1f0d2e783066326d9fbccd2fbb7e6515','2024-01-25 08:28:41','2024-01-25 08:28:41'),
(51,1,'3df42341cda97259badfec20ef8126a2','2024-01-25 08:31:49','2024-01-25 08:31:49'),
(52,18,'3df42341cda97259badfec20ef8126a2','2024-01-25 08:32:11','2024-01-25 08:32:11'),
(53,7,'3df42341cda97259badfec20ef8126a2','2024-01-25 08:32:16','2024-01-25 08:32:16'),
(54,2,'3df42341cda97259badfec20ef8126a2','2024-01-25 08:32:20','2024-01-25 08:32:20'),
(55,12,'3df42341cda97259badfec20ef8126a2','2024-01-25 08:32:25','2024-01-25 08:32:25'),
(56,14,'10fd8d15230a30644e646f3139e8e833','2024-01-25 08:45:20','2024-01-25 08:45:20'),
(57,4,'28447907feff7e6dcb5b7bcfd3f4377e','2024-01-25 08:57:12','2024-01-25 08:57:12'),
(58,4,'c5275849003f4d29ddb0e1147f5f2e99','2024-01-25 08:57:27','2024-01-25 08:57:27'),
(59,14,'60423c3aeba729097251d9b7b58d8c38','2024-01-25 09:26:51','2024-01-25 09:26:51'),
(61,15,'2d3e3bb444b39767e16494d34a3ab43a','2024-02-09 08:44:21','2024-02-09 08:44:21'),
(62,19,'2d3e3bb444b39767e16494d34a3ab43a','2024-02-09 08:44:27','2024-02-09 08:44:27'),
(63,14,'2d3e3bb444b39767e16494d34a3ab43a','2024-02-09 08:44:36','2024-02-09 08:44:36'),
(64,14,'33ce8fc88a40d0ddeafac981479054db','2024-02-10 12:29:17','2024-02-10 12:29:17'),
(65,14,'387182378bfee330df244394a3705d50','2024-02-15 09:46:52','2024-02-15 09:46:52'),
(66,15,'387182378bfee330df244394a3705d50','2024-02-15 10:08:27','2024-02-15 10:08:27'),
(67,19,'387182378bfee330df244394a3705d50','2024-02-15 10:57:49','2024-02-15 10:57:49'),
(68,15,'399757258245296aadd9819e41826d40','2024-02-15 11:07:59','2024-02-15 11:07:59'),
(69,14,'399757258245296aadd9819e41826d40','2024-02-15 11:08:09','2024-02-15 11:08:09'),
(70,4,'387182378bfee330df244394a3705d50','2024-02-15 11:20:04','2024-02-15 11:20:04'),
(71,4,'7dc68fdf349c217d062e1f0f1b6aa7c6','2024-03-20 15:10:37','2024-03-20 15:10:37'),
(72,4,'e8062805323ce381fa37b58c24872980','2024-03-20 15:11:23','2024-03-20 15:11:23'),
(73,4,'5d2aea4c02ed975eeaceacc50e8b6940','2024-03-20 15:26:11','2024-03-20 15:26:11'),
(74,15,'d48c9ccb640a64690e570f0222b295cd','2024-03-22 14:31:13','2024-03-22 14:31:13'),
(75,14,'d48c9ccb640a64690e570f0222b295cd','2024-03-22 14:31:43','2024-03-22 14:31:43'),
(76,4,'d48c9ccb640a64690e570f0222b295cd','2024-03-22 14:32:45','2024-03-22 14:32:45'),
(77,4,'c0e4702af56ded3290ab4278b5b8734a','2024-03-22 14:34:49','2024-03-22 14:34:49'),
(78,14,'d2b4ea868abe2d0d2074c58b6c04f177','2024-03-22 14:36:31','2024-03-22 14:36:31');
/*!40000 ALTER TABLE `recently_viewed_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
(1,'Fariha Aamily Binti Mohd Farid','A-30-06','Bukit Jalil','Kuala Lumpur','Malaysia','57000','0192949487','aamily@yahoo.com',NULL,'$2y$10$3evYkK0J8Zd5.hK4.iOwR.OaqgCXPp0sd1b01G3LEdvfFiJJVyW2G',NULL,1,'2023-12-31 14:06:26','2024-02-15 13:16:46'),
(2,'Rosli Khamis Bin Kalamullah','No.20, Jalan Kenanga, Taman Kenanga','Gombak','Kuala Lumpur','Malaysia','56100','0123697895','rosli.khamis@gmail.com',NULL,'$2y$10$3evYkK0J8Zd5.hK4.iOwR.OaqgCXPp0sd1b01G3LEdvfFiJJVyW2G',NULL,1,'2023-12-31 14:06:26','2024-02-15 13:16:45'),
(3,'Melati Binti Abdul Samad','Lot.78, Lorong Haji Taming, Kg. Rakit','Dungun','Terengganu','Malaysia','75600','0144447788','melati.samad@yahoo.com',NULL,'$2y$10$3evYkK0J8Zd5.hK4.iOwR.OaqgCXPp0sd1b01G3LEdvfFiJJVyW2G',NULL,1,'2023-12-31 14:06:26','2024-01-18 06:14:27'),
(4,'Tuan Noor Hakimi Bin Tuan Mohd Faiz','No.14, Residensi Perindu, Jalan Bangi','Bangi ','Selangor','Malaysia','54100','0195566222','tuanhakimi@gmail.com',NULL,'$2y$10$3evYkK0J8Zd5.hK4.iOwR.OaqgCXPp0sd1b01G3LEdvfFiJJVyW2G',NULL,1,'2023-12-31 14:06:26','2024-01-18 06:14:27');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-03-22 23:18:22
