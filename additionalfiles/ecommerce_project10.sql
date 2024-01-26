-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 26, 2024 at 08:56 AM
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
-- Database: `ecommerce_project10`
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
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_size` varchar(255) DEFAULT NULL,
  `product_qty` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(10, 4, 'Shirts', '', 0, NULL, 'shirts', NULL, NULL, NULL, 1, '2023-11-04 15:27:29', '2023-11-04 15:27:29'),
(11, 4, 'Jackets', '', 0, NULL, 'jackets', NULL, NULL, NULL, 1, '2023-11-04 15:28:32', '2023-11-04 15:28:32');

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
(4, 'Grey', '#808080', 1, '2023-08-20 00:00:00', '2023-08-19 16:00:00'),
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
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) DEFAULT NULL,
  `country_name` varchar(100) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_code`, `country_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'AF', 'Afghanistan', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(2, 'AL', 'Albania', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(3, 'DZ', 'Algeria', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(4, 'AS', 'American Samoa', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(5, 'AD', 'Andorra', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(6, 'AO', 'Angola', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(7, 'AI', 'Anguilla', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(8, 'AQ', 'Antarctica', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(9, 'AG', 'Antigua and Barbuda', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(10, 'AR', 'Argentina', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(11, 'AM', 'Armenia', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(12, 'AW', 'Aruba', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(13, 'AU', 'Australia', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(14, 'AT', 'Austria', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(15, 'AZ', 'Azerbaijan', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(16, 'BS', 'Bahamas', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(17, 'BH', 'Bahrain', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(18, 'BD', 'Bangladesh', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(19, 'BB', 'Barbados', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(20, 'BY', 'Belarus', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(21, 'BE', 'Belgium', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(22, 'BZ', 'Belize', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(23, 'BJ', 'Benin', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(24, 'BM', 'Bermuda', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(25, 'BT', 'Bhutan', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(26, 'BO', 'Bolivia', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(27, 'BA', 'Bosnia and Herzegovina', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(28, 'BW', 'Botswana', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(29, 'BV', 'Bouvet Island', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(30, 'BR', 'Brazil', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(31, 'IO', 'British Indian Ocean Territory', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(32, 'BN', 'Brunei Darussalam', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(33, 'BG', 'Bulgaria', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(34, 'BF', 'Burkina Faso', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(35, 'BI', 'Burundi', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(36, 'KH', 'Cambodia', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(37, 'CM', 'Cameroon', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(38, 'CA', 'Canada', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(39, 'CV', 'Cape Verde', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(40, 'KY', 'Cayman Islands', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(41, 'CF', 'Central African Republic', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(42, 'TD', 'Chad', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(43, 'CL', 'Chile', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(44, 'CN', 'China', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(45, 'CX', 'Christmas Island', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(46, 'CC', 'Cocos (Keeling) Islands', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(47, 'CO', 'Colombia', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(48, 'KM', 'Comoros', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(49, 'CD', 'Democratic Republic of the Congo', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(50, 'CG', 'Republic of Congo', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(51, 'CK', 'Cook Islands', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(52, 'CR', 'Costa Rica', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(53, 'HR', 'Croatia (Hrvatska)', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(54, 'CU', 'Cuba', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(55, 'CY', 'Cyprus', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(56, 'CZ', 'Czech Republic', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(57, 'DK', 'Denmark', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(58, 'DJ', 'Djibouti', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(59, 'DM', 'Dominica', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(60, 'DO', 'Dominican Republic', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(61, 'TL', 'East Timor', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(62, 'EC', 'Ecuador', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(63, 'EG', 'Egypt', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(64, 'SV', 'El Salvador', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(65, 'GQ', 'Equatorial Guinea', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(66, 'ER', 'Eritrea', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(67, 'EE', 'Estonia', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(68, 'ET', 'Ethiopia', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(69, 'FK', 'Falkland Islands (Malvinas)', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(70, 'FO', 'Faroe Islands', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(71, 'FJ', 'Fiji', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(72, 'FI', 'Finland', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(73, 'FR', 'France', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(74, 'FX', 'France, Metropolitan', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(75, 'GF', 'French Guiana', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(76, 'PF', 'French Polynesia', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(77, 'TF', 'French Southern Territories', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(78, 'GA', 'Gabon', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(79, 'GM', 'Gambia', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(80, 'GE', 'Georgia', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(81, 'DE', 'Germany', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(82, 'GH', 'Ghana', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(83, 'GI', 'Gibraltar', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(84, 'GG', 'Guernsey', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(85, 'GR', 'Greece', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(86, 'GL', 'Greenland', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(87, 'GD', 'Grenada', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(88, 'GP', 'Guadeloupe', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(89, 'GU', 'Guam', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(90, 'GT', 'Guatemala', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(91, 'GN', 'Guinea', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(92, 'GW', 'Guinea-Bissau', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(93, 'GY', 'Guyana', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(94, 'HT', 'Haiti', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(95, 'HM', 'Heard and Mc Donald Islands', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(96, 'HN', 'Honduras', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(97, 'HK', 'Hong Kong', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(98, 'HU', 'Hungary', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(99, 'IS', 'Iceland', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(100, 'IN', 'India', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(101, 'IM', 'Isle of Man', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(102, 'ID', 'Indonesia', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(103, 'IR', 'Iran (Islamic Republic of)', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(104, 'IQ', 'Iraq', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(105, 'IE', 'Ireland', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(106, 'IL', 'Israel', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(107, 'IT', 'Italy', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(108, 'CI', 'Ivory Coast', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(109, 'JE', 'Jersey', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(110, 'JM', 'Jamaica', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(111, 'JP', 'Japan', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(112, 'JO', 'Jordan', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(113, 'KZ', 'Kazakhstan', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(114, 'KE', 'Kenya', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(115, 'KI', 'Kiribati', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(116, 'KP', 'Korea, Democratic People\'s Republic of', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(117, 'KR', 'Korea, Republic of', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(118, 'XK', 'Kosovo', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(119, 'KW', 'Kuwait', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(120, 'KG', 'Kyrgyzstan', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(121, 'LA', 'Lao People\'s Democratic Republic', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(122, 'LV', 'Latvia', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(123, 'LB', 'Lebanon', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(124, 'LS', 'Lesotho', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(125, 'LR', 'Liberia', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(126, 'LY', 'Libyan Arab Jamahiriya', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(127, 'LI', 'Liechtenstein', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(128, 'LT', 'Lithuania', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(129, 'LU', 'Luxembourg', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(130, 'MO', 'Macau', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(131, 'MK', 'North Macedonia', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(132, 'MG', 'Madagascar', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(133, 'MW', 'Malawi', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(134, 'MY', 'Malaysia', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(135, 'MV', 'Maldives', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(136, 'ML', 'Mali', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(137, 'MT', 'Malta', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(138, 'MH', 'Marshall Islands', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(139, 'MQ', 'Martinique', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(140, 'MR', 'Mauritania', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(141, 'MU', 'Mauritius', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(142, 'YT', 'Mayotte', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(143, 'MX', 'Mexico', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(144, 'FM', 'Micronesia, Federated States of', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(145, 'MD', 'Moldova, Republic of', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(146, 'MC', 'Monaco', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(147, 'MN', 'Mongolia', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(148, 'ME', 'Montenegro', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(149, 'MS', 'Montserrat', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(150, 'MA', 'Morocco', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(151, 'MZ', 'Mozambique', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(152, 'MM', 'Myanmar', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(153, 'NA', 'Namibia', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(154, 'NR', 'Nauru', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(155, 'NP', 'Nepal', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(156, 'NL', 'Netherlands', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(157, 'AN', 'Netherlands Antilles', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(158, 'NC', 'New Caledonia', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(159, 'NZ', 'New Zealand', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(160, 'NI', 'Nicaragua', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(161, 'NE', 'Niger', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(162, 'NG', 'Nigeria', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(163, 'NU', 'Niue', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(164, 'NF', 'Norfolk Island', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(165, 'MP', 'Northern Mariana Islands', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(166, 'NO', 'Norway', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(167, 'OM', 'Oman', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(168, 'PK', 'Pakistan', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(169, 'PW', 'Palau', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(170, 'PS', 'Palestine', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(171, 'PA', 'Panama', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(172, 'PG', 'Papua New Guinea', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(173, 'PY', 'Paraguay', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(174, 'PE', 'Peru', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(175, 'PH', 'Philippines', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(176, 'PN', 'Pitcairn', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(177, 'PL', 'Poland', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(178, 'PT', 'Portugal', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(179, 'PR', 'Puerto Rico', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(180, 'QA', 'Qatar', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(181, 'RE', 'Reunion', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(182, 'RO', 'Romania', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(183, 'RU', 'Russian Federation', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(184, 'RW', 'Rwanda', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(185, 'KN', 'Saint Kitts and Nevis', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(186, 'LC', 'Saint Lucia', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(187, 'VC', 'Saint Vincent and the Grenadines', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(188, 'WS', 'Samoa', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(189, 'SM', 'San Marino', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(190, 'ST', 'Sao Tome and Principe', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(191, 'SA', 'Saudi Arabia', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(192, 'SN', 'Senegal', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(193, 'RS', 'Serbia', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(194, 'SC', 'Seychelles', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(195, 'SL', 'Sierra Leone', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(196, 'SG', 'Singapore', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(197, 'SK', 'Slovakia', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(198, 'SI', 'Slovenia', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(199, 'SB', 'Solomon Islands', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(200, 'SO', 'Somalia', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(201, 'ZA', 'South Africa', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(202, 'GS', 'South Georgia South Sandwich Islands', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(203, 'SS', 'South Sudan', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(204, 'ES', 'Spain', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(205, 'LK', 'Sri Lanka', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(206, 'SH', 'St. Helena', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(207, 'PM', 'St. Pierre and Miquelon', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(208, 'SD', 'Sudan', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(209, 'SR', 'Suriname', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(210, 'SJ', 'Svalbard and Jan Mayen Islands', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(211, 'SZ', 'Eswatini', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(212, 'SE', 'Sweden', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(213, 'CH', 'Switzerland', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(214, 'SY', 'Syrian Arab Republic', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(215, 'TW', 'Taiwan', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(216, 'TJ', 'Tajikistan', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(217, 'TZ', 'Tanzania, United Republic of', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(218, 'TH', 'Thailand', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(219, 'TG', 'Togo', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(220, 'TK', 'Tokelau', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(221, 'TO', 'Tonga', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(222, 'TT', 'Trinidad and Tobago', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(223, 'TN', 'Tunisia', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(224, 'TR', 'Turkey', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(225, 'TM', 'Turkmenistan', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(226, 'TC', 'Turks and Caicos Islands', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(227, 'TV', 'Tuvalu', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(228, 'UG', 'Uganda', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(229, 'UA', 'Ukraine', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(230, 'AE', 'United Arab Emirates', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(231, 'GB', 'United Kingdom', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(232, 'US', 'United States', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(233, 'UM', 'United States minor outlying islands', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(234, 'UY', 'Uruguay', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(235, 'UZ', 'Uzbekistan', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(236, 'VU', 'Vanuatu', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(237, 'VA', 'Vatican City State', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(238, 'VE', 'Venezuela', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(239, 'VN', 'Vietnam', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(240, 'VG', 'Virgin Islands (British)', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(241, 'VI', 'Virgin Islands (U.S.)', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(242, 'WF', 'Wallis and Futuna Islands', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(243, 'EH', 'Western Sahara', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(244, 'YE', 'Yemen', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(245, 'ZM', 'Zambia', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50'),
(246, 'ZW', 'Zimbabwe', 1, '2024-01-18 05:59:50', '2024-01-18 05:59:50');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_option`, `coupon_code`, `coupon_type`, `amount_type`, `amount`, `categories`, `brands`, `expiry_date`, `users`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Manual', 'test10', 'Single', 'Percentage', 10.00, '1,2,3,4,5,6,7,8,9,10,11', '1,2', '2024-12-31', '', 1, '2024-01-26 08:55:09', '2024-01-26 08:55:09'),
(2, 'Manual', 'test20', 'Single', 'Percentage', 20.00, '1,2,3,4,5,6,7,8,9,10,11', '1,2', '2024-12-31', 'aamily@yahoo.com', 1, '2024-01-26 08:55:09', '2024-01-26 08:55:09'),
(3, 'Automatic', 'ZT64qSOX', 'Multiple', 'Fixed', 100.00, '1,2,3,4,5,6,7,8,9,10,11', '1,2', '2024-12-31', '', 1, '2024-01-26 08:55:09', '2024-01-26 08:55:09');

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
(19, '2023_11_05_194912_update_products_table', 10),
(20, '2023_11_11_081425_create_products_filters_table', 11),
(21, '2023_11_19_150446_create_recently_viewed_items_table', 12),
(22, '2023_11_28_231758_create_carts_table', 13),
(23, '2023_12_22_182659_add_columns_to_users_table', 14),
(24, '2024_01_26_155305_create_coupons_table', 15);

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
(1, 8, 1, 'Blue T-Shirt', 'BT001', 'Dark Blue', 'Blue', 'TSHIRT0000', 170.00, 10.00, 'product', 153.00, '500', '', 'Test Product', NULL, NULL, 'Cotton', 'Plain', 'Full Sleeve', 'Regular', 'Casual', NULL, NULL, NULL, 'Yes', 'Yes', 1, '2023-08-16 03:44:29', '2023-12-03 15:45:58'),
(2, 8, 5, 'Red T-Shirt', 'RT001', 'Red', 'Red', 'TSHIRT0000', 100.00, 0.00, 'category', 80.00, '400', '', 'Test Product', NULL, NULL, 'Polyester', 'Plain', 'Half Sleeve', 'Slim', 'Casual', NULL, NULL, NULL, 'No', 'No', 1, '2023-08-16 03:44:29', '2023-11-11 10:25:02'),
(3, 9, 4, 'Green Women T-Shirt', 'GWT011', 'Dark Green', 'Green', '1000', 40.00, 0.00, 'category', 32.00, '100', NULL, 'Women Shirt', 'TESTING', 'tshirts', 'Polyester', 'Printed', 'Short Sleeve', 'Slim', 'Formal', 'tshirt', 'good tshirts', 'tshirt', 'Yes', 'No', 1, '2023-08-17 11:34:17', '2023-11-11 09:38:58'),
(4, 8, 3, 'Yellow T-Shirt', 'YT001', 'Yellow', 'Yellow', '10', 70.00, 0.00, 'category', 56.00, NULL, '701721522.mp4', 'TEST', 'TEST', 'TEST', 'Cotton', NULL, NULL, NULL, NULL, 'TEST', 'TEST', 'TEST', 'Yes', 'No', 1, '2023-08-18 04:03:43', '2023-11-11 13:26:48'),
(5, 8, 4, 'Grey Casual T-Shirt', 'GRCT001', 'Grey', 'Grey', NULL, 10.00, 0.00, 'category', 8.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', 'No', 1, '2023-08-22 10:28:39', '2023-11-11 13:38:11'),
(7, 8, 1, 'Green T-shirt', 'GT011', 'Green', 'Green', NULL, 70.00, 10.00, 'product', 63.00, '100', NULL, NULL, NULL, NULL, 'Cotton', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', 'No', 1, '2023-09-08 00:15:06', '2023-11-18 03:38:01'),
(12, 8, 1, 'Red Casual T-shirt', 'RCT001', 'Red', 'Red', NULL, 110.00, 0.00, 'category', 88.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', 'No', 1, '2023-11-04 16:50:18', '2023-11-04 17:32:59'),
(13, 8, 2, 'Gap T-shirt', 'GT01', 'Blue', 'Blue', '45000', 120.00, 10.00, 'product', 108.00, '100', NULL, NULL, NULL, NULL, 'Cotton', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', 'No', 1, '2023-11-04 16:52:21', '2023-11-11 13:42:58'),
(14, 8, 2, 'Gap Blue T-Shirt', 'GBT001', 'Blue', 'Blue', 'RGT0100', 130.00, 10.00, 'product', 117.00, '100', NULL, NULL, NULL, NULL, 'Cotton', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', 'Yes', 1, '2023-11-04 17:08:40', '2023-11-18 03:34:46'),
(15, 8, 2, 'Red Gap T-shirt', 'RGT01', 'Red', 'Red', 'RGT0100', 140.00, 15.00, 'product', 119.00, '100', '1214211892.mp4', 'This is Red Gap T-shirt. Very Good T-shirt and was created by pure cotton.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Yes', 'Yes', 1, '2023-11-04 17:10:50', '2023-11-18 07:36:17'),
(16, 8, 5, 'Black Puma T-shirt', 'BLPT001', 'Black', 'Black', '45000', 160.00, 10.00, 'product', 144.00, '100', NULL, NULL, NULL, NULL, 'Cotton', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', 'No', 1, '2023-11-09 15:09:40', '2023-11-11 13:27:54'),
(17, 9, 1, 'Women Red Shirt', 'WRS001', 'Red', 'Red', '45000', 190.00, 10.00, 'product', 171.00, '100', NULL, NULL, NULL, NULL, 'Wool', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', 'No', 1, '2023-11-11 13:33:29', '2023-11-11 13:33:29'),
(18, 8, 6, 'Grey T-Shirt', 'GT001', 'Grey', 'Grey', NULL, 170.00, 0.00, 'category', 136.00, '100', NULL, NULL, NULL, NULL, 'Cotton', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', 'No', 1, '2023-11-11 13:37:49', '2023-11-11 13:40:57'),
(19, 8, 2, 'Green Gap T-Shirt', 'GGT001', 'Green', 'Green', 'RGT0100', 145.00, 10.00, 'product', 130.50, '100', NULL, NULL, NULL, NULL, 'Cotton', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'No', 'No', 1, '2023-11-18 03:41:34', '2023-11-18 03:41:34');

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
(1, 1, 'Small', 'BT001S', 130.00, 100, 1, '2023-08-21 17:15:35', '2023-12-03 15:48:47'),
(2, 1, 'Medium', 'BT001M', 140.00, 80, 1, '2023-08-21 17:15:35', '2023-12-03 15:48:47'),
(3, 1, 'Large', 'BT001L', 150.00, 60, 1, '2023-08-21 17:15:35', '2023-12-03 15:48:47'),
(4, 4, 'Extra Large', 'YT001XL', 25.00, 40, 1, '2023-08-21 17:15:35', '2023-11-11 18:24:04'),
(5, 1, 'Double Extra Large', 'BT001XXL', 160.00, 30, 1, '2023-08-21 17:15:35', '2023-12-03 15:48:47'),
(6, 5, 'Small', 'GCT001S', 10.00, 100, 1, '2023-08-22 10:28:39', '2023-11-11 13:38:11'),
(7, 5, 'Medium', 'GCT001M', 15.00, 60, 1, '2023-08-22 10:28:39', '2023-11-11 13:38:11'),
(8, 5, 'Large', 'GCT001L', 20.00, 80, 1, '2023-08-22 10:28:39', '2023-11-11 13:38:11'),
(15, 12, 'Small', 'RCT001S', 120.00, 100, 1, '2023-11-04 16:50:18', '2023-11-04 17:32:59'),
(16, 12, 'Medium', 'RCT001M', 130.00, 100, 1, '2023-11-04 16:50:18', '2023-11-04 17:32:59'),
(17, 12, 'Large', 'RCT001L', 135.00, 100, 1, '2023-11-04 16:50:18', '2023-11-04 17:32:59'),
(18, 4, 'Small', 'YT001S', 50.00, 10, 1, '2023-11-11 18:12:52', '2023-11-11 18:26:35'),
(19, 4, 'Medium', 'YT001M', 60.00, 20, 1, '2023-11-11 18:12:52', '2023-11-11 18:26:35'),
(20, 4, 'Large', 'YT001L', 70.00, 15, 1, '2023-11-11 18:26:35', '2023-11-11 18:26:35'),
(21, 1, 'Extra Large', 'BT001XL', 170.00, 20, 1, '2023-11-11 18:26:35', '2023-12-03 15:48:47'),
(22, 15, 'Small', 'RGT01-S', 140.00, 18, 1, '2023-11-17 06:33:52', '2023-11-18 07:52:45'),
(23, 15, 'Medium', 'RGT01-M', 160.00, 7, 1, '2023-11-17 06:33:52', '2023-11-18 07:52:45'),
(24, 15, 'Large', 'RGT01-L', 180.00, 22, 1, '2023-11-17 06:33:52', '2023-11-18 07:52:45'),
(25, 14, 'Small', 'GBT001-S', 130.00, 10, 1, '2023-12-03 13:55:04', '2023-12-08 07:46:36'),
(26, 14, 'Medium', 'GBT001-M', 140.00, 20, 1, '2023-12-03 13:55:04', '2023-12-03 13:55:04');

-- --------------------------------------------------------

--
-- Table structure for table `products_filters`
--

DROP TABLE IF EXISTS `products_filters`;
CREATE TABLE `products_filters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filter_name` varchar(255) DEFAULT NULL,
  `filter_value` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_filters`
--

INSERT INTO `products_filters` (`id`, `filter_name`, `filter_value`, `sort`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Fabric', 'Cotton', 1, 1, '2023-11-11 00:41:48', '2023-11-11 00:41:48'),
(2, 'Fabric', 'Polyester', 2, 1, '2023-11-11 00:41:48', '2023-11-11 00:41:48'),
(3, 'Fabric', 'Wool', 3, 1, '2023-11-11 00:41:48', '2023-11-11 00:41:48'),
(4, 'Sleeve', 'Full Sleeve', 1, 1, '2023-11-11 00:41:48', '2023-11-11 00:41:48'),
(5, 'Sleeve', 'Half Sleeve', 2, 1, '2023-11-11 00:41:48', '2023-11-11 00:41:48'),
(6, 'Sleeve', 'Short Sleeve', 3, 1, '2023-11-11 00:41:48', '2023-11-11 00:41:48'),
(7, 'Sleeve', 'Sleeveless', 4, 1, '2023-11-11 00:41:48', '2023-11-11 00:41:48'),
(8, 'Pattern', 'Checked', 1, 1, '2023-11-11 00:41:48', '2023-11-11 00:41:48'),
(9, 'Pattern', 'Plain', 2, 1, '2023-11-11 00:41:48', '2023-11-11 00:41:48'),
(10, 'Pattern', 'Printed', 3, 1, '2023-11-11 00:41:48', '2023-11-11 00:41:48'),
(11, 'Pattern', 'Self', 4, 1, '2023-11-11 00:41:48', '2023-11-11 00:41:48'),
(12, 'Pattern', 'Solid', 5, 1, '2023-11-11 00:41:48', '2023-11-11 00:41:48'),
(13, 'Fit', 'Regular', 1, 1, '2023-11-11 00:41:48', '2023-11-11 00:41:48'),
(14, 'Fit', 'Slim', 2, 1, '2023-11-11 00:41:48', '2023-11-11 00:41:48'),
(15, 'Occasion', 'Casual', 1, 1, '2023-11-11 00:41:48', '2023-11-11 00:41:48'),
(16, 'Occasion', 'Formal', 2, 1, '2023-11-11 00:41:48', '2023-11-11 00:41:48'),
(17, 'Occasion', 'Party', 3, 1, '2011-11-23 00:41:00', '2011-11-23 00:41:00');

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
(8, 14, 'product-6893143.jpg', 0, 1, '2023-11-04 17:08:41', '2023-12-03 13:55:04'),
(9, 15, 'product-6729803.jpg', 0, 1, '2023-11-04 17:10:50', '2023-11-18 07:52:45'),
(11, 4, 'product-882432.jpg', 0, 1, '2023-11-11 18:10:48', '2023-11-11 18:26:35'),
(12, 15, 'product-1697623.jpg', 0, 1, '2023-11-13 00:04:57', '2023-11-18 07:52:45'),
(13, 15, 'product-2349149.jpg', 0, 1, '2023-11-13 00:05:18', '2023-11-18 07:52:45'),
(17, 19, 'product-5184377.jpg', 0, 1, '2023-11-18 04:42:47', '2023-11-18 04:42:47');

-- --------------------------------------------------------

--
-- Table structure for table `recently_viewed_items`
--

DROP TABLE IF EXISTS `recently_viewed_items`;
CREATE TABLE `recently_viewed_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `session_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recently_viewed_items`
--

INSERT INTO `recently_viewed_items` (`id`, `product_id`, `session_id`, `created_at`, `updated_at`) VALUES
(1, 19, 'dec3a972d146e176f27ff7c468429de5', '2023-11-19 14:06:22', '2023-11-19 14:06:22'),
(2, 15, 'dec3a972d146e176f27ff7c468429de5', '2023-11-19 14:06:32', '2023-11-19 14:06:32'),
(3, 14, 'dec3a972d146e176f27ff7c468429de5', '2023-11-19 14:07:19', '2023-11-19 14:07:19'),
(4, 1, 'dec3a972d146e176f27ff7c468429de5', '2023-11-19 14:31:51', '2023-11-19 14:31:51'),
(5, 4, '259d8f63cb65a10b4676e44a99b94f91', '2023-11-28 15:14:53', '2023-11-28 15:14:53'),
(6, 15, '259d8f63cb65a10b4676e44a99b94f91', '2023-11-28 15:15:00', '2023-11-28 15:15:00'),
(7, 15, 'f827568de9da6875841ee19357910728', '2023-11-28 15:33:20', '2023-11-28 15:33:20'),
(8, 15, '29b64eef1141360873e83ea8ce2f5d8d', '2023-11-28 15:47:48', '2023-11-28 15:47:48'),
(9, 15, '1874c67ef2cc02093c0c363755e1adba', '2023-11-28 15:51:31', '2023-11-28 15:51:31'),
(10, 15, 'ec22a71c6819c6d97126a01f5332505b', '2023-11-28 17:11:59', '2023-11-28 17:11:59'),
(11, 15, 'd8471667e4b23cf77fb898bf6e58a6f6', '2023-11-28 17:50:59', '2023-11-28 17:50:59'),
(12, 15, '2b54d5a290b9fb29af4fedb1340bb91e', '2023-11-28 19:06:16', '2023-11-28 19:06:16'),
(13, 15, '5e4f4ab997e12f0aac4bde8c738c21e3', '2023-12-03 13:32:42', '2023-12-03 13:32:42'),
(14, 14, '5e4f4ab997e12f0aac4bde8c738c21e3', '2023-12-03 13:52:06', '2023-12-03 13:52:06'),
(15, 1, '5e4f4ab997e12f0aac4bde8c738c21e3', '2023-12-03 15:15:10', '2023-12-03 15:15:10'),
(16, 4, 'faf32c65f7779acaf7c0eb23f12ecf16', '2023-12-04 09:28:00', '2023-12-04 09:28:00'),
(17, 15, 'faf32c65f7779acaf7c0eb23f12ecf16', '2023-12-04 09:28:06', '2023-12-04 09:28:06'),
(18, 14, 'faf32c65f7779acaf7c0eb23f12ecf16', '2023-12-04 09:28:25', '2023-12-04 09:28:25'),
(19, 1, 'faf32c65f7779acaf7c0eb23f12ecf16', '2023-12-04 09:28:49', '2023-12-04 09:28:49'),
(20, 14, 'a6db50c0a545f3066ceedd27288bd176', '2023-12-05 15:44:08', '2023-12-05 15:44:08'),
(21, 15, 'a6db50c0a545f3066ceedd27288bd176', '2023-12-05 15:44:22', '2023-12-05 15:44:22'),
(22, 14, '7d7919799703f269d6fe30e9ff1cd17b', '2023-12-05 16:19:02', '2023-12-05 16:19:02'),
(23, 15, '7d7919799703f269d6fe30e9ff1cd17b', '2023-12-05 16:19:19', '2023-12-05 16:19:19'),
(24, 4, 'a6db50c0a545f3066ceedd27288bd176', '2023-12-05 16:30:53', '2023-12-05 16:30:53'),
(25, 14, '8cdeef8dbe1f68c455cc75781879807a', '2023-12-06 18:02:53', '2023-12-06 18:02:53'),
(26, 15, '8cdeef8dbe1f68c455cc75781879807a', '2023-12-06 18:03:16', '2023-12-06 18:03:16'),
(27, 14, '21350941a14dadab99f5e1a6cd2fce43', '2023-12-06 18:24:01', '2023-12-06 18:24:01'),
(28, 15, '21350941a14dadab99f5e1a6cd2fce43', '2023-12-06 18:24:16', '2023-12-06 18:24:16'),
(29, 14, '442ed5f4466df4e970cbde028b9e9e3e', '2023-12-08 06:57:14', '2023-12-08 06:57:14'),
(30, 15, '442ed5f4466df4e970cbde028b9e9e3e', '2023-12-08 06:57:32', '2023-12-08 06:57:32'),
(31, 15, '75f0d0054b55a985ed719b960d26b83d', '2023-12-10 17:41:50', '2023-12-10 17:41:50'),
(32, 4, '75f0d0054b55a985ed719b960d26b83d', '2023-12-10 17:58:03', '2023-12-10 17:58:03'),
(33, 14, '75f0d0054b55a985ed719b960d26b83d', '2023-12-10 17:58:29', '2023-12-10 17:58:29'),
(34, 19, '75f0d0054b55a985ed719b960d26b83d', '2023-12-10 17:58:39', '2023-12-10 17:58:39'),
(35, 1, '75f0d0054b55a985ed719b960d26b83d', '2023-12-10 17:59:02', '2023-12-10 17:59:02'),
(36, 2, '75f0d0054b55a985ed719b960d26b83d', '2023-12-10 18:07:17', '2023-12-10 18:07:17'),
(37, 7, '75f0d0054b55a985ed719b960d26b83d', '2023-12-10 18:07:35', '2023-12-10 18:07:35'),
(38, 13, '75f0d0054b55a985ed719b960d26b83d', '2023-12-10 18:07:45', '2023-12-10 18:07:45'),
(39, 15, 'cb16c63137338b54ea0159f0a8786921', '2023-12-14 17:02:45', '2023-12-14 17:02:45'),
(40, 15, '999ed90cb73bc94188478fbdba2d0415', '2023-12-14 23:58:14', '2023-12-14 23:58:14'),
(41, 1, '999ed90cb73bc94188478fbdba2d0415', '2023-12-15 00:34:30', '2023-12-15 00:34:30'),
(42, 14, '7f90b366abe58e9867f7c3f1addc307a', '2023-12-17 13:18:43', '2023-12-17 13:18:43'),
(43, 15, '7f90b366abe58e9867f7c3f1addc307a', '2023-12-17 13:18:53', '2023-12-17 13:18:53'),
(44, 15, '3df42341cda97259badfec20ef8126a2', '2024-01-25 07:47:02', '2024-01-25 07:47:02'),
(45, 14, '3df42341cda97259badfec20ef8126a2', '2024-01-25 07:54:40', '2024-01-25 07:54:40'),
(46, 4, '3df42341cda97259badfec20ef8126a2', '2024-01-25 08:09:51', '2024-01-25 08:09:51'),
(47, 19, '3df42341cda97259badfec20ef8126a2', '2024-01-25 08:11:59', '2024-01-25 08:11:59'),
(48, 4, '5f45f7477301e931d4dbdd12f4ff3924', '2024-01-25 08:19:38', '2024-01-25 08:19:38'),
(49, 4, '10ac8b5744e720bf7dc997653bccfefe', '2024-01-25 08:23:20', '2024-01-25 08:23:20'),
(50, 4, '1f0d2e783066326d9fbccd2fbb7e6515', '2024-01-25 08:28:41', '2024-01-25 08:28:41'),
(51, 1, '3df42341cda97259badfec20ef8126a2', '2024-01-25 08:31:49', '2024-01-25 08:31:49'),
(52, 18, '3df42341cda97259badfec20ef8126a2', '2024-01-25 08:32:11', '2024-01-25 08:32:11'),
(53, 7, '3df42341cda97259badfec20ef8126a2', '2024-01-25 08:32:16', '2024-01-25 08:32:16'),
(54, 2, '3df42341cda97259badfec20ef8126a2', '2024-01-25 08:32:20', '2024-01-25 08:32:20'),
(55, 12, '3df42341cda97259badfec20ef8126a2', '2024-01-25 08:32:25', '2024-01-25 08:32:25'),
(56, 14, '10fd8d15230a30644e646f3139e8e833', '2024-01-25 08:45:20', '2024-01-25 08:45:20'),
(57, 4, '28447907feff7e6dcb5b7bcfd3f4377e', '2024-01-25 08:57:12', '2024-01-25 08:57:12'),
(58, 4, 'c5275849003f4d29ddb0e1147f5f2e99', '2024-01-25 08:57:27', '2024-01-25 08:57:27'),
(59, 14, '60423c3aeba729097251d9b7b58d8c38', '2024-01-25 09:26:51', '2024-01-25 09:26:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `address`, `city`, `state`, `country`, `postcode`, `mobile`, `email`, `email_verified_at`, `password`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Fariha Aamily Binti Mohd Farid', 'A-30-06', 'Bukit Jalil', 'Kuala Lumpur', 'Malaysia', '57000', '0192949487', 'aamily@yahoo.com', NULL, '$2y$10$3evYkK0J8Zd5.hK4.iOwR.OaqgCXPp0sd1b01G3LEdvfFiJJVyW2G', NULL, 1, '2023-12-31 14:06:26', '2024-01-19 08:35:53'),
(2, 'Rosli Khamis Bin Kalamullah', 'No.20, Jalan Kenanga, Taman Kenanga', 'Gombak', 'Kuala Lumpur', 'Malaysia', '56100', '0123697895', 'rosli.khamis@gmail.com', NULL, '$2y$10$3evYkK0J8Zd5.hK4.iOwR.OaqgCXPp0sd1b01G3LEdvfFiJJVyW2G', NULL, 1, '2023-12-31 14:06:26', '2024-01-18 06:14:27'),
(3, 'Melati Binti Abdul Samad', 'Lot.78, Lorong Haji Taming, Kg. Rakit', 'Dungun', 'Terengganu', 'Malaysia', '75600', '0144447788', 'melati.samad@yahoo.com', NULL, '$2y$10$3evYkK0J8Zd5.hK4.iOwR.OaqgCXPp0sd1b01G3LEdvfFiJJVyW2G', NULL, 1, '2023-12-31 14:06:26', '2024-01-18 06:14:27'),
(4, 'Tuan Noor Hakimi Bin Tuan Mohd Faiz', 'No.14, Residensi Perindu, Jalan Bangi', 'Bangi ', 'Selangor', 'Malaysia', '54100', '0195566222', 'tuanhakimi@gmail.com', NULL, '$2y$10$3evYkK0J8Zd5.hK4.iOwR.OaqgCXPp0sd1b01G3LEdvfFiJJVyW2G', NULL, 1, '2023-12-31 14:06:26', '2024-01-18 06:14:27');

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
-- Indexes for table `carts`
--
ALTER TABLE `carts`
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
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
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
-- Indexes for table `products_filters`
--
ALTER TABLE `products_filters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_images`
--
ALTER TABLE `products_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recently_viewed_items`
--
ALTER TABLE `recently_viewed_items`
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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `products_attributes`
--
ALTER TABLE `products_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `products_filters`
--
ALTER TABLE `products_filters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products_images`
--
ALTER TABLE `products_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `recently_viewed_items`
--
ALTER TABLE `recently_viewed_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
