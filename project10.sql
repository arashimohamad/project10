-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 05, 2023 at 04:46 PM
-- Server version: 11.2.1-MariaDB-log
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project10`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `type`, `mobile`, `email`, `password`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Eric', 'admin', '0133311920', 'admin@admin.com', '$2y$10$9lebGDOPEzuPr49Hhfk/LOC9401o6N8xLRq2ty45Nq46PynQ2Dr/W', '23593.jpg', 1, '2023-05-20 10:59:46', '2023-05-20 10:59:46'),
(2, 'Lisa', 'subadmin', '0111111111', 'lisa@admin.com', '$2y$10$9lebGDOPEzuPr49Hhfk/LOC9401o6N8xLRq2ty45Nq46PynQ2Dr/W', NULL, 1, '2023-05-20 10:59:46', '2023-05-22 04:59:19'),
(3, 'John', 'subadmin', '0111111112', 'john@admin.com', '$2y$10$9lebGDOPEzuPr49Hhfk/LOC9401o6N8xLRq2ty45Nq46PynQ2Dr/W', NULL, 1, '2023-05-20 10:59:46', '2023-05-22 04:59:21');

-- --------------------------------------------------------

--
-- Table structure for table `admins_roles`
--

DROP TABLE IF EXISTS `admins_roles`;
CREATE TABLE `admins_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subadmin_id` int(11) DEFAULT NULL COMMENT 'admin_id',
  `module` varchar(255) DEFAULT NULL,
  `view_access` varchar(255) DEFAULT NULL,
  `edit_access` varchar(255) DEFAULT NULL,
  `full_access` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins_roles`
--

INSERT INTO `admins_roles` (`id`, `subadmin_id`, `module`, `view_access`, `edit_access`, `full_access`, `created_at`, `updated_at`) VALUES
(18, 3, 'subadmin_id', '0', '0', '0', '2023-08-24 15:24:38', '2023-08-24 15:24:38'),
(74, 2, '_token', '0', '0', '0', '2023-09-08 17:21:43', '2023-09-08 17:21:43'),
(75, 2, 'subadmin_id', '0', '0', '0', '2023-09-08 17:21:43', '2023-09-08 17:21:43'),
(76, 2, 'cms_pages', '1', '1', '0', '2023-09-08 17:21:43', '2023-09-08 17:21:43'),
(77, 2, 'categories', '1', '0', '1', '2023-09-08 17:21:43', '2023-09-08 17:21:43'),
(78, 2, 'products', '0', '1', '0', '2023-09-08 17:21:43', '2023-09-08 17:21:43'),
(79, 2, 'brands', '1', '1', '1', '2023-09-08 17:21:43', '2023-09-08 17:21:43');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `alt` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `type`, `link`, `title`, `alt`, `sort`, `status`, `created_at`, `updated_at`) VALUES
(1, '84766.png', 'Slider', 'winter', 'Winter Collection', 'Winter Collection', 1, 1, '2023-09-11 07:36:46', '2023-11-02 16:18:32'),
(2, '84571.png', 'Slider', 'women', 'Women Collection', 'Women Collection', 2, 1, '2023-11-02 16:20:16', '2023-11-02 16:20:16'),
(3, '96889.png', 'Slider', 't-shirts', 'T-Shirts Collection', 'T-Shirts Collection', 3, 1, '2023-11-02 16:21:16', '2023-11-02 16:21:16'),
(4, '7075.png', 'Fix', 'new', 'New Collection', 'New Collection', 1, 1, '2023-11-02 16:24:10', '2023-11-02 16:24:10'),
(5, '7336.png', 'Fix', 'sale', 'Sale', 'Sale', 2, 1, '2023-11-02 16:25:23', '2023-11-02 16:25:23'),
(6, '34633.png', 'Fix', 'men', 'Men Collection', 'Men Collection', 3, 1, '2023-11-02 16:26:47', '2023-11-02 16:26:47'),
(7, '8238.png', 'Fix', 'new', 'New Arrivals', 'New Arrivals', 4, 1, '2023-11-02 16:27:23', '2023-11-02 16:27:23');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_image`, `brand_logo`, `brand_discount`, `description`, `url`, `meta_title`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Arrow', '', '', 0.00, '', 'arrow', '', '', '', 1, '2023-08-27 16:10:12', '2023-09-07 23:36:58'),
(2, 'Gap', '', '', 0.00, '', 'gap', '', '', '', 1, '2023-08-27 16:10:12', '2023-09-07 23:36:58'),
(3, 'Monte Carlo', '', '', 0.00, '', 'monte-carlo', '', '', '', 1, '2023-08-27 16:10:12', '2023-08-27 16:10:12'),
(4, 'Nike', '', '', 0.00, '', 'nike', '', '', '', 1, '2023-08-27 16:10:12', '2023-08-27 16:10:12'),
(5, 'Puma', '', '', 0.00, '', 'puma', '', '', '', 1, '2023-08-27 16:10:12', '2023-09-07 23:36:56'),
(6, 'Fila', '2087.jpg', '88749.png', 10.00, 'Fila shoes are available', 'fila', 'Fila Shoes', 'Fila Shoes', 'fila,shoes', 1, '2023-09-03 02:29:37', '2023-09-07 23:36:55');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `category_name`, `category_image`, `category_discount`, `description`, `url`, `meta_title`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'Clothing', NULL, 0, NULL, 'clothing', NULL, NULL, NULL, 1, '2023-06-07 02:20:51', '2023-06-07 23:10:18'),
(2, 0, 'Electronics', NULL, 0, NULL, 'electronics', NULL, NULL, NULL, 1, '2023-06-07 02:20:51', '2023-06-07 23:10:26'),
(3, 0, 'Appliances', NULL, 0, NULL, 'appliances', NULL, NULL, NULL, 1, '2023-06-07 02:20:51', '2023-06-07 02:20:51'),
(4, 1, 'Men', NULL, 0, NULL, 'men', NULL, NULL, NULL, 1, '2023-06-07 02:20:51', '2023-06-07 02:20:51'),
(5, 1, 'Women', NULL, 0, NULL, 'women', NULL, NULL, NULL, 1, '2023-06-07 02:20:51', '2023-06-07 02:20:51'),
(6, 1, 'Kids', NULL, 0, NULL, 'kids', NULL, NULL, NULL, 1, '2023-06-07 02:20:51', '2023-06-07 02:20:51'),
(7, 0, 'Accessories', '65511.jpg', 10, 'This is accessories', 'accessories', 'Accessories', 'Accessories info', 'accessories', 0, '2023-06-19 05:48:15', '2023-11-04 15:29:52'),
(8, 4, 'T-Shirts', '', 20, NULL, 'tshirts', NULL, NULL, NULL, 1, '2023-06-19 11:00:06', '2023-08-18 10:19:40'),
(9, 5, 'Women Shirts', '60955.jpg', 20, 'Women Shirts', 'women-shirts', 'Women Shirts', 'women shirts are available', 'women shirts', 1, '2023-06-19 11:35:48', '2023-06-20 03:01:04'),
(15, 4, 'Shirts', '', 0, NULL, 'shirts', NULL, NULL, NULL, 1, '2023-11-04 15:27:29', '2023-11-04 15:27:29'),
(16, 4, 'Jackets', '', 0, NULL, 'jackets', NULL, NULL, NULL, 1, '2023-11-04 15:28:32', '2023-11-04 15:28:32');

-- --------------------------------------------------------

--
-- Table structure for table `cms_pages`
--

DROP TABLE IF EXISTS `cms_pages`;
CREATE TABLE `cms_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_pages`
--

INSERT INTO `cms_pages` (`id`, `title`, `description`, `url`, `meta_title`, `meta_description`, `meta_keywords`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Terms & Conditions', 'Testing', 'terms-conditions', 'Testing', 'Testing', 'Testing', 1, '2023-05-18 17:32:25', '2023-06-07 20:03:41'),
(2, 'Privacy Policy', 'Testing', 'privacy-policy', 'Testing', 'Testing', 'Testing', 1, '2023-05-18 17:33:01', '2023-05-18 17:33:01'),
(3, 'About Us', 'Aydentech content provides Laravel Training', 'about-us', 'About Us', 'Aydentech provides Laravel Tutorial', 'aydentech, about us, laravel', 1, '2023-05-18 17:33:55', '2023-05-18 17:41:20');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

DROP TABLE IF EXISTS `colors`;
CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `color_name` varchar(255) DEFAULT NULL,
  `color_code` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL COMMENT 'Active-1, Disable-0',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `color_name`, `color_code`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Black', '#000000', 1, '2023-08-20 00:00:00', '2023-08-19 16:00:00'),
(2, 'Blue', '#0000FF', 1, '2023-08-20 00:00:00', '2023-08-19 16:00:00'),
(3, 'Brown', '#964B00', 1, '2023-08-20 00:00:00', '2023-08-19 16:00:00'),
(4, 'Gray', '#808080', 1, '2023-08-20 00:00:00', '2023-08-19 16:00:00'),
(5, 'Green', '#00FF00', 1, '2023-08-20 00:00:00', '2023-08-19 16:00:00'),
(6, 'Multi', '', 1, '2023-08-20 00:00:00', '2023-08-19 16:00:00'),
(7, 'Olive', '#808000', 1, '2023-08-20 00:00:00', '2023-08-19 16:00:00'),
(8, 'Orange', '#FFA500', 1, '2023-08-20 00:00:00', '2023-08-19 16:00:00'),
(9, 'Pink ', '#FFC0CB', 1, '2023-08-20 00:00:00', '2023-08-19 16:00:00'),
(10, 'Purple', '#800080', 1, '2023-08-20 00:00:00', '2023-08-19 16:00:00'),
(11, 'Red', '#FF0000', 1, '2023-08-20 00:00:00', '2023-08-19 16:00:00'),
(12, 'White', '#FFFFFF', 1, '2023-08-20 00:00:00', '2023-08-19 16:00:00'),
(13, 'Yellow', '#FFFF00', 1, '2023-08-20 00:00:00', '2023-08-19 16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_05_09_062716_create_admins_table', 1),
(6, '2023_05_17_013024_create_cms_pages_table', 2),
(7, '2023_05_23_113937_create_admins_roles_table', 3),
(8, '2023_06_07_091414_create_categories_table', 4),
(9, '2023_08_16_104036_create_products_table', 5),
(10, '2023_08_20_144501_create_products_images_table', 6),
(11, '2023_08_22_005139_create_products_attributes_table', 7),
(12, '2023_08_24_235418_create_brands_table', 8),
(14, '2023_09_11_151936_create_banners_table', 9),
(19, '2023_11_05_194912_update_products_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `product_name`, `product_code`, `product_color`, `family_color`, `group_code`, `product_price`, `product_discount`, `discount_type`, `final_price`, `product_weight`, `product_video`, `description`, `wash_care`, `search_keywords`, `fabric`, `pattern`, `sleeve`, `fit`, `occasion`, `meta_title`, `meta_description`, `meta_keywords`, `is_featured`, `is_bestseller`, `status`, `created_at`, `updated_at`) VALUES
(1, 8, 1, 'Blue T-Shirt', 'BT001', 'Dark Blue', 'Blue', 'TSHIRT0000', 150.00, 10.00, 'product', 135.00, '500', '', 'Test Product', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', 'Yes', 1, '2023-08-16 03:44:29', '2023-11-05 12:31:15'),
(2, 8, 0, 'Red T-Shirt', 'RT001', 'Red', 'Red', 'TSHIRT0000', 100.00, 0.00, '', 100.00, '400', '', 'Test Product', '', '', '', '', '', '', '', '', '', '', 'No', 'No', 1, '2023-08-16 03:44:29', '2023-08-16 06:44:53'),
(3, 9, 4, 'Green Women T-Shirt', 'GWT011', 'Dark Gren', 'Black', '1000', 40.00, 0.00, 'category', 32.00, '100', NULL, 'Women Shirt', 'TESTING', 'tshirts', 'Polyester', 'Printed', 'Short Sleeve', 'Slim', 'Formal', 'tshirt', 'good tshirts', 'tshirt', 'Yes', 'No', 1, '2023-08-17 11:34:17', '2023-11-05 13:45:30'),
(4, 8, 3, 'Yellow T-Shirt', 'YT001', 'Yellow', 'Yellow', '10', 70.00, 0.00, 'category', 56.00, NULL, '701721522.mp4', 'TEST', 'TEST', 'TEST', 'Cotton', 'Plain', 'Short Sleeve', 'Regular', 'Casual', 'TEST', 'TEST', 'TEST', 'Yes', 'No', 1, '2023-08-18 04:03:43', '2023-11-05 13:46:01'),
(5, 8, 4, 'Green Casual T-Shirt', 'GCT001', 'Green', 'Green', NULL, 10.00, NULL, 'category', 8.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', 'No', 1, '2023-08-22 10:28:39', '2023-09-08 00:12:31'),
(7, 8, 2, 'Gap T-shirt', 'GT01', 'Blue', 'Blue', '4500', 50.00, 10.00, 'product', 45.00, '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', 'No', 1, '2023-09-08 00:15:06', '2023-09-08 00:15:06'),
(12, 8, 1, 'Red Casual T-shirt', 'RCT001', 'Red', 'Red', NULL, 110.00, 0.00, 'category', 88.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', 'No', 1, '2023-11-04 16:50:18', '2023-11-04 17:32:59'),
(13, 8, 2, 'Gap T-shirt', 'GT01', 'Blue', 'Blue', '45000', 120.00, 10.00, 'product', 108.00, '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', 'No', 1, '2023-11-04 16:52:21', '2023-11-05 14:30:10'),
(14, 8, 2, 'Gap Blue T-Shirt', 'GBT001', 'Blue', 'Blue', '45000', 130.00, 10.00, 'product', 117.00, '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', 'Yes', 1, '2023-11-04 17:08:40', '2023-11-05 14:14:39'),
(15, 8, 2, 'Red Gap T-shirt', 'RGT01', 'Red', 'Red', NULL, 140.00, 15.00, 'product', 119.00, '100', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', 'Yes', 1, '2023-11-04 17:10:50', '2023-11-05 13:44:00');

-- --------------------------------------------------------

--
-- Table structure for table `products_attributes`
--

DROP TABLE IF EXISTS `products_attributes`;
CREATE TABLE `products_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `size` varchar(255) DEFAULT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_attributes`
--

INSERT INTO `products_attributes` (`id`, `product_id`, `size`, `sku`, `price`, `stock`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Small', 'BT001S', 10.00, 100, 1, '2023-08-21 17:15:35', '2023-11-05 12:31:15'),
(2, 1, 'Medium', 'BT001M', 15.00, 80, 1, '2023-08-21 17:15:35', '2023-11-05 12:31:15'),
(3, 1, 'Large', 'BT001L', 20.00, 60, 1, '2023-08-21 17:15:35', '2023-11-05 12:31:15'),
(4, 1, 'Extra Large', 'BT001XL', 25.00, 40, 1, '2023-08-21 17:15:35', '2023-11-05 12:31:15'),
(5, 1, 'Double Extra Large', 'BT001XXL', 30.00, 30, 1, '2023-08-21 17:15:35', '2023-11-05 12:31:15'),
(6, 5, 'Small', 'GCT001S', 10.00, 100, 1, '2023-08-22 10:28:39', '2023-09-08 00:12:31'),
(7, 5, 'Medium', 'GCT001M', 15.00, 60, 1, '2023-08-22 10:28:39', '2023-09-08 00:12:31'),
(8, 5, 'Large', 'GCT001L', 20.00, 80, 1, '2023-08-22 10:28:39', '2023-09-08 00:12:31'),
(15, 12, 'Small', 'RCT001S', 120.00, 100, 1, '2023-11-04 16:50:18', '2023-11-04 17:32:59'),
(16, 12, 'Medium', 'RCT001M', 130.00, 100, 1, '2023-11-04 16:50:18', '2023-11-04 17:32:59'),
(17, 12, 'Large', 'RCT001L', 135.00, 100, 1, '2023-11-04 16:50:18', '2023-11-04 17:32:59');

-- --------------------------------------------------------

--
-- Table structure for table `products_images`
--

DROP TABLE IF EXISTS `products_images`;
CREATE TABLE `products_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `image_sort` int(11) DEFAULT 0,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_images`
--

INSERT INTO `products_images` (`id`, `product_id`, `image`, `image_sort`, `status`, `created_at`, `updated_at`) VALUES
(8, 14, 'product-6893143.jpg', 0, 1, '2023-11-04 17:08:41', '2023-11-05 14:14:39'),
(9, 15, 'product-6729803.jpg', 0, 1, '2023-11-04 17:10:50', '2023-11-05 13:44:00'),
(10, 4, 'product-3202221.jpg', 1, 1, '2023-11-05 14:10:13', '2023-11-05 14:12:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admins_roles`
--
ALTER TABLE `admins_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_pages`
--
ALTER TABLE `cms_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_attributes`
--
ALTER TABLE `products_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_images`
--
ALTER TABLE `products_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `admins_roles`
--
ALTER TABLE `admins_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `cms_pages`
--
ALTER TABLE `cms_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products_attributes`
--
ALTER TABLE `products_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products_images`
--
ALTER TABLE `products_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
