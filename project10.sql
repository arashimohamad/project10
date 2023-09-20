-- MariaDB dump 10.19-11.2.1-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: project10
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
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
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banners`
--

LOCK TABLES `banners` WRITE;
/*!40000 ALTER TABLE `banners` DISABLE KEYS */;
INSERT INTO `banners` VALUES
(1,'sitemaker-slider-banner-1.png','Slider','','T-Shirts Collection','T-Shirts Collection',1,1,'2023-09-11 07:36:46','2023-09-12 17:05:03'),
(2,'sitemaker-slider-banner-2.png','Slider','','Women Collection','Women Collection',2,1,'2023-09-11 07:36:46','2023-09-12 17:05:05');
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
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
(7,0,'Accessories','65511.jpg',10,'This is accessories','accessories','Accessories','Accessories info','accessories',1,'2023-06-19 05:48:15','2023-06-19 05:48:15'),
(8,4,'T-Shirts','',20,NULL,'tshirts',NULL,NULL,NULL,1,'2023-06-19 11:00:06','2023-08-18 10:19:40'),
(9,5,'Women Shirts','60955.jpg',20,'Women Shirts','women-shirts','Women Shirts','women shirts are available','women shirts',1,'2023-06-19 11:35:48','2023-06-20 03:01:04');
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
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
(4,'Gray','#808080',1,'2023-08-20 00:00:00','2023-08-19 16:00:00'),
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
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
(14,'2023_09_11_151936_create_banners_table',9);
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
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES
(1,8,0,'Blue T-Shirt','BT001','Dark Blue','Blue','TSHIRT0000',150.00,10.00,'product',135.00,'500','','Test Product','','','','','','','','','','','Yes',1,'2023-08-16 03:44:29','2023-08-16 06:44:52'),
(2,8,0,'Red T-Shirt','RT001','Red','Red','TSHIRT0000',100.00,0.00,'',100.00,'400','','Test Product','','','','','','','','','','','No',1,'2023-08-16 03:44:29','2023-08-16 06:44:53'),
(3,9,NULL,'Green Women T-Shirt','GWT011','Dark Gren','Black','1000',40.00,NULL,'category',32.00,'100',NULL,'Women Shirt','TESTING','tshirts','Polyester','Printed','Short Sleeve','Slim','Formal','tshirt','good tshirts','tshirt','Yes',1,'2023-08-17 11:34:17','2023-08-18 18:38:24'),
(4,8,NULL,'Yellow T-Shirt','YT001','Yellow','Yellow','10',70.00,NULL,'category',56.00,NULL,'701721522.mp4','TEST','TEST','TEST','Cotton','Plain','Short Sleeve','Regular','Casual','TEST','TEST','TEST','Yes',1,'2023-08-18 04:03:43','2023-08-21 16:34:04'),
(5,8,4,'Green Casual T-Shirt','GCT001','Green','Green',NULL,10.00,NULL,'category',8.00,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'No',1,'2023-08-22 10:28:39','2023-09-08 00:12:31'),
(7,8,2,'Gap T-shirt','GT01','Blue','Blue','4500',50.00,10.00,'product',45.00,'100',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'No',1,'2023-09-08 00:15:06','2023-09-08 00:15:06');
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_attributes`
--

LOCK TABLES `products_attributes` WRITE;
/*!40000 ALTER TABLE `products_attributes` DISABLE KEYS */;
INSERT INTO `products_attributes` VALUES
(1,1,'Small','BT001S',10.00,100,1,'2023-08-21 17:15:35','2023-08-21 17:15:35'),
(2,1,'Medium','BT001M',15.00,80,1,'2023-08-21 17:15:35','2023-08-21 17:15:35'),
(3,1,'Large','BT001L',20.00,60,1,'2023-08-21 17:15:35','2023-08-21 17:15:35'),
(4,1,'Extra Large','BT001XL',25.00,40,1,'2023-08-21 17:15:35','2023-08-21 17:15:35'),
(5,1,'Double Extra Large','BT001XXL',30.00,30,1,'2023-08-21 17:15:35','2023-08-21 17:15:35'),
(6,5,'Small','GCT001S',10.00,100,1,'2023-08-22 10:28:39','2023-09-08 00:12:31'),
(7,5,'Medium','GCT001M',15.00,60,1,'2023-08-22 10:28:39','2023-09-08 00:12:31'),
(8,5,'Large','GCT001L',20.00,80,1,'2023-08-22 10:28:39','2023-09-08 00:12:31');
/*!40000 ALTER TABLE `products_attributes` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products_images`
--

LOCK TABLES `products_images` WRITE;
/*!40000 ALTER TABLE `products_images` DISABLE KEYS */;
INSERT INTO `products_images` VALUES
(1,4,'product-4188587.jpg',2,1,'2023-08-21 16:34:05','2023-08-21 16:34:17'),
(2,4,'product-5974464.jpg',1,1,'2023-08-21 16:34:05','2023-08-21 16:34:17');
/*!40000 ALTER TABLE `products_images` ENABLE KEYS */;
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
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
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

-- Dump completed on 2023-09-15 12:53:46
