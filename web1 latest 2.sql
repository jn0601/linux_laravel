-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 03, 2023 at 02:15 AM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web1`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
CREATE TABLE IF NOT EXISTS `banners` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_order` int NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` smallint NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `category_id`, `name`, `desc`, `content`, `link`, `display_order`, `image`, `status`) VALUES
(1, 1, 'test banner', '<p>test banner</p>', '<p>test banner</p>', 'https://www.facebook.com', 1, 'vga-msi-rtx-4090-gaming-trio-24gb-2vccg90.jpg', 1),
(2, 2, 'gpu', '<p>gpu</p>', '<p>gpu</p>', 'https://www.facebook.com', 2, '3991083-6171737723-Nvidi95.jpg', 3),
(3, 0, 'gpu 2', '<p>gpu 2</p>', '<p>gpu 2</p>', 'https://www.facebook.com', 3, '9753-front70.jpg', 3),
(4, 17, 'vga', '<p>vga</p>', '<p>vga</p>', 'https://www.facebook.com', 4, 'vga-msi-rtx-4090-gaming-trio-24gb-2vccg55.jpg', 1),
(6, 10, 'banner hp', '<p>banner hp</p>', '<p>banner hp</p>', 'https://www.facebook.com', 5, '9753-front49.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `banner_categories`
--

DROP TABLE IF EXISTS `banner_categories`;
CREATE TABLE IF NOT EXISTS `banner_categories` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_order` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banner_categories`
--

INSERT INTO `banner_categories` (`id`, `name`, `desc`, `content`, `display_order`) VALUES
(10, 'banner language', '<p>banner language</p>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost/051bbb99-e92b-4f85-94e8-652c679b5858\" width=\"700\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>&nbsp;</p>', '<p>banner language</p>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost/b1e2179e-c7a9-4072-9b28-042d51d61f91\" width=\"2048\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>&nbsp;</p>', 7),
(11, 'banner tv', '<p>banner tv</p>', '<p>banner tv</p>', 8),
(12, 'banner tv 2', '<p>banner tv 2</p>', '<p>banner tv 2</p>', 9),
(13, 'banner tv 3', '<p>banner tv 3</p>', '<p>banner tv 3</p>', 10),
(15, 'test ngôn ngữ', '<p>test ng&ocirc;n ngữ</p>', '<p>test ng&ocirc;n ngữ</p>', 12),
(17, 'đa ngôn ngữ 1', '<p>đa ng&ocirc;n ngữ 1</p>', '<p>đa ng&ocirc;n ngữ 1</p>', 14),
(29, 'wwwwwwwwwwwwwwwww', '<p>wwwwwwwwwwwwwwwww</p>', '<p>wwwwwwwwwwwwwwwww</p>', 16),
(30, 'asd', '<p>asd</p>', '<p>asd</p>', 18),
(32, 'test aaaaaa', '<p>test aaaaaa</p>', '<p>test aaaaaa</p>', 20);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2023_06_22_081321_create_tbl_banner_categories', 1),
(4, '2023_06_22_083214_create_tbl_multi_languages', 2),
(5, '2023_06_27_063011_create_tbl_banner', 3),
(6, '2023_06_28_040339_create_tbl_product_categories', 4),
(7, '2023_06_28_040406_create_tbl_products', 4),
(8, '2023_06_29_044450_create_tbl_product_category_products', 5),
(9, '2023_07_02_121904_create_tbl_news_categories', 6),
(10, '2023_07_02_121939_create_tbl_news', 6);

-- --------------------------------------------------------

--
-- Table structure for table `multi_languages`
--

DROP TABLE IF EXISTS `multi_languages`;
CREATE TABLE IF NOT EXISTS `multi_languages` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` int NOT NULL,
  `object_id` int NOT NULL,
  `lang_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `multi_languages`
--

INSERT INTO `multi_languages` (`id`, `type`, `object_id`, `lang_code`, `name`, `desc`, `content`, `seo_name`, `tags`, `meta_title`, `meta_desc`, `meta_keyword`) VALUES
(1, 3, 10, 'vn', 'banner language', '<p>banner language</p>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost/051bbb99-e92b-4f85-94e8-652c679b5858\" width=\"700\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>&nbsp;</p>', '<p>banner language</p>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost/b1e2179e-c7a9-4072-9b28-042d51d61f91\" width=\"2048\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>&nbsp;</p>', 'banner language', 'banner language', 'banner language', 'banner language', 'banner language'),
(2, 3, 11, 'vn', 'banner tv', '<p>banner tv</p>', '<p>banner tv</p>', 'banner tv', 'banner tv', 'banner tv', 'banner tv', 'banner tv'),
(3, 3, 12, 'vn', 'monitor abc', '<p>monitor</p>', '<p>monitor</p>', 'monitor', 'monitor', 'monitor', 'monitor', 'monitor'),
(4, 3, 13, 'vn', 'banner tv 3', '<p>banner tv 3</p>', '<p>banner tv 3</p>', 'banner tv 3', 'banner tv 3', 'banner tv 3', 'banner tv 3', 'banner tv 3'),
(6, 3, 15, 'vn', 'test ngôn ngữ', '<p>test ng&ocirc;n ngữ</p>', '<p>test ng&ocirc;n ngữ</p>', 'test ngôn ngữ', 'test ngôn ngữ', 'test ngôn ngữ', 'test ngôn ngữ', 'test ngôn ngữ'),
(9, 3, 15, 'en', 'test en của ngôn ngữ', '<p>test en của ng&ocirc;n ngữ</p>', '<p>test en của ng&ocirc;n ngữ</p>', 'test en của ngôn ngữ', 'test en của ngôn ngữ', 'test en của ngôn ngữ', 'test en của ngôn ngữ', 'test en của ngôn ngữ'),
(10, 3, 17, 'vn', 'đa ngôn ngữ 1', '<p>đa ng&ocirc;n ngữ 1</p>', '<p>đa ng&ocirc;n ngữ 1</p>', 'đa ngôn ngữ 1', 'đa ngôn ngữ 1', 'đa ngôn ngữ 1', 'đa ngôn ngữ 1', 'đa ngôn ngữ 1'),
(11, 3, 17, 'en', 'đa ngôn ngữ 2', '<p>abc</p>', '<p>đa ng&ocirc;n ngữ 2</p>\r\n\r\n<p>&nbsp;</p>', 'đa ngôn ngữ 2', 'đa ngôn ngữ 2', 'đa ngôn ngữ 2', 'đa ngôn ngữ 2', 'đa ngôn ngữ 2'),
(19, 4, 24, 'vn', 'qweqweerqwetrwert', '<p>qweqweerqwetrwert</p>', '<p>qweqweerqwetrwert</p>', 'qweqweerqwetrwert', 'qweqweerqwetrwert', 'qweqweerqwetrwert', 'qweqweerqwetrwert', 'qweqweerqwetrwert'),
(20, 4, 24, 'en', '', '', '', '', '', '', '', ''),
(21, 4, 25, 'vn', 'bnmbnmbn', '<p>bnmbnmbn</p>', '<p>bnmbnmbn</p>', 'bnmbnmbn', 'bnmbnmbn', 'bnmbnmbn', 'bnmbnmbn', 'bnmbnmbn'),
(22, 4, 25, 'en', 'jk;iupop]ioiktyhgh fgjyipuipuyiku', '<p>jk;iupop]ioiktyhgh fgjyipuipuyiku</p>', '<p>jk;iupop]ioiktyhgh fgjyipuipuyiku</p>', 'jk;iupop]ioiktyhgh fgjyipuipuyiku', 'jk;iupop]ioiktyhgh fgjyipuipuyiku', '', 'jk;iupop]ioiktyhgh fgjyipuipuyikujk;iupop]ioiktyhgh fgjyipuipuyiku', 'jk;iupop]ioiktyhgh fgjyipuipuyiku'),
(29, 3, 29, 'vn', 'wwwwwwwwwwwwwwwww', '<p>wwwwwwwwwwwwwwwww</p>', '<p>wwwwwwwwwwwwwwwww</p>', 'wwwwwwwwwwwwwwwww', 'wwwwwwwwwwwwwwwww', 'wwwwwwwwwwwwwwwww', 'wwwwwwwwwwwwwwwww', 'wwwwwwwwwwwwwwwww'),
(30, 4, 29, 'en', '', '', '', '', '', '', '', ''),
(31, 3, 30, 'vn', 'asd', '<p>asd</p>', '<p>asd</p>', 'asd', 'asd', 'asd', 'asd', 'asd'),
(32, 4, 30, 'en', '', '', '', '', '', '', '', ''),
(35, 3, 32, 'vn', 'test aaaaaa', '<p>test aaaaaa</p>', '<p>test aaaaaa</p>', 'test aaaaaa', 'test aaaaaa', 'test aaaaaa', 'test aaaaaa', 'test aaaaaa'),
(36, 3, 32, 'en', 'test aaaaaa', '<p>test aaaaaa</p>', '<p>test aaaaaa</p>', '', '', 'test aaaaaa', 'test aaaaaa', 'test aaaaaa'),
(47, 6, 11, 'vn', 'msi', '<p>msi</p>', '<p>msi</p>', 'msi', 'msi', 'msi', 'msi', 'msi'),
(48, 6, 11, 'en', 'msi en', '<p>msi en</p>', '<p>msi en</p>', 'msi en', 'msi en', 'msi en', 'msi en', 'msi en'),
(49, 6, 12, 'vn', 'monitor xyz', '<p>monitor</p>', '<p>monitor</p>', 'monitor', 'monitor', 'monitor', 'monitor', 'monitor'),
(50, 6, 12, 'en', 'abc', '', '', '', '', '', '', ''),
(51, 6, 13, 'vn', 'LG', '<p>LG</p>', '<p>LG</p>', 'LG', 'LG', 'LG', 'LG', 'LG'),
(52, 6, 13, 'en', 'LG VN', '', '', '', '', '', '', ''),
(53, 6, 14, 'vn', 'test danh mục', '<p>test danh mục</p>', '<p>test danh mục</p>', 'test danh mục', 'test danh mục', 'test danh mục', 'test danh mục', 'test danh mục'),
(54, 6, 14, 'en', '', '', '', '', '', '', '', ''),
(57, 1, 4, 'vn', 'ipm', '<p>ipm</p>', '<p>ipm</p>', 'ipm', 'ipm', 'ipm', 'ipm', 'ipm'),
(58, 1, 4, 'en', '', '', '', '', '', '', '', ''),
(59, 1, 5, 'vn', 'SP2 hehe', '<p>SP2</p>', '<p>SP2</p>', 'SP2', 'SP2', 'SP2', 'SP2', 'SP2'),
(60, 1, 5, 'en', '', '', '', '', '', '', '', ''),
(61, 1, 6, 'vn', 'SP3', '<p>SP3</p>', '<p>SP3</p>', 'SP3', 'SP3', 'SP3', 'SP3', 'SP3'),
(62, 1, 6, 'en', '', '', '', '', '', '', '', ''),
(63, 1, 7, 'vn', 'SP4 123', '<p>SP4</p>', '<p>SP4</p>', 'SP4', 'SP4', 'SP4', 'SP4', 'SP4'),
(64, 1, 7, 'en', '123', '', '', '', '', '', '', ''),
(71, 5, 4, 'vn', 'news 1', '<p>news 1</p>', '<p>news 1</p>', 'news 1', 'news 1', 'news 1', 'news 1', 'news 1'),
(72, 5, 4, 'en', '', '', '', '', '', '', '', ''),
(73, 5, 5, 'vn', 'news 2', '<p>news 2</p>', '<p>news 2</p>', 'news 2', 'news 2', 'news 2', 'news 2', 'news 2'),
(74, 5, 5, 'en', '', '', '', '', '', '', '', ''),
(75, 5, 6, 'vn', 'news 3', '<p>news 3</p>', '<p>news 3</p>', 'news 3', 'news 3', 'news 3', 'news 3', 'news 3'),
(76, 5, 6, 'en', 'news 3 en', '<p>news 3 en</p>', '<p>news 3 en</p>', 'news 3 en', 'news 3 en', 'news 3 en', 'news 3 en', 'news 3 en'),
(77, 2, 1, 'vn', 'test news 1', '<p>test news 1</p>', '<p>test news 1</p>', 'test news 1', 'test news 1', 'test news 1', 'test news 1', 'test news 1'),
(78, 2, 1, 'en', '', '', '', '', '', '', '', ''),
(79, 2, 2, 'vn', 'test news 2', '<p>test news 2</p>', '<p>test news 2</p>', 'test news 2', 'test news 2', 'test news 2', 'test news 2', 'test news 2'),
(80, 2, 2, 'en', 'test news 2 en', '<p>test news 2 en</p>', '<p>test news 2 en</p>', 'test news 2 en', 'test news 2 en', 'test news 2 en', 'test news 2 en', 'test news 2 en'),
(81, 2, 3, 'vn', 'test news 3', '<p>test news 3</p>', '<p>test news 3</p>', 'test news 3', 'test news 3', 'test news 3', 'test news 3', 'test news 3'),
(82, 2, 3, 'en', 'test news en 3', '<p>test news en 3</p>', '<p>test news en 3</p>', 'test news en 3', 'test news en 3', 'test news en 3', 'test news en 3', ''),
(83, 2, 4, 'vn', 'test news 4', '<p>test news 4</p>', '<p>test news 4</p>', 'test news 4', 'test news 4', 'test news 4', 'test news 4', 'test news 4'),
(84, 2, 4, 'en', '', '', '', '', '', '', '', ''),
(85, 2, 5, 'vn', 'abc 123', '<p>abc</p>', '<p>abc</p>', 'abc', 'abc', 'abc', 'abc', 'abc'),
(86, 2, 5, 'en', '', '', '', '', '', '', '', ''),
(89, 4, 6, 'vn', 'banner hp', '<p>banner hp</p>', '<p>banner hp</p>', 'banner hp', 'banner hp', 'banner hp', 'banner hp', 'banner hp'),
(90, 4, 6, 'en', 'en', '<p>en</p>', '<p>en</p>', 'en', 'en', 'en', 'en', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_order` int NOT NULL,
  `status` smallint NOT NULL,
  `options` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `count_view` int NOT NULL,
  `date_created` int NOT NULL,
  `date_updated` int NOT NULL,
  `seo_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `category_id`, `name`, `desc`, `content`, `image`, `display_order`, `status`, `options`, `count_view`, `date_created`, `date_updated`, `seo_name`, `tags`, `meta_title`, `meta_desc`, `meta_keyword`) VALUES
(1, 0, 'test news 1', '<p>test news 1</p>', '<p>test news 1</p>', '352805347_272465948645658_9096286696674757798_n10.jpg', 1, 1, ',1,2', 0, 20230702, 20230702, 'test news 1', 'test news 1', 'test news 1', 'test news 1', 'test news 1'),
(2, 4, 'test news 2', '<p>test news 2</p>', '<p>test news 2</p>', '352805347_272465948645658_9096286696674757798_n25.jpg', 2, 1, ',3,4', 0, 20230702, 20230702, 'test news 2', 'test news 2', 'test news 2', 'test news 2', 'test news 2'),
(3, 5, 'test news 3', '<p>test news 3</p>', '<p>test news 3</p>', '352805347_272465948645658_9096286696674757798_n44.jpg', 3, 3, ',1,3', 0, 20230702, 20230702, 'test news 3', 'test news 3', 'test news 3', 'test news 3', 'test news 3'),
(4, 6, 'test news 4', '<p>test news 4</p>', '<p>test news 4</p>', '352805347_272465948645658_9096286696674757798_n62.jpg', 4, 1, ',1', 0, 20230702, 20230702, 'test news 4', 'test news 4', 'test news 4', 'test news 4', 'test news 4'),
(5, 4, 'abc 123', '<p>abc</p>', '<p>abc</p>', '352805347_272465948645658_9096286696674757798_n58.jpg', 5, 1, ',4', 0, 20230702, 20230702, 'abc', 'abc', 'abc', 'abc', 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `news_categories`
--

DROP TABLE IF EXISTS `news_categories`;
CREATE TABLE IF NOT EXISTS `news_categories` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` int NOT NULL,
  `root_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` smallint NOT NULL,
  `display_order` int NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `representative` smallint NOT NULL,
  `status` smallint NOT NULL,
  `display_menu` smallint NOT NULL,
  `date_created` int NOT NULL,
  `seo_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_categories`
--

INSERT INTO `news_categories` (`id`, `parent_id`, `root_id`, `name`, `desc`, `content`, `level`, `display_order`, `image`, `representative`, `status`, `display_menu`, `date_created`, `seo_name`, `meta_title`, `meta_desc`, `meta_keyword`) VALUES
(4, 0, ' , ', 'news 1', '<p>news 1</p>', '<p>news 1</p>', 1, 1, '352805347_272465948645658_9096286696674757798_n48.jpg', 1, 1, 1, 20230702, 'news 1', 'news 1', 'news 1', 'news 1'),
(5, 4, ',4,', 'news 2', '<p>news 2</p>', '<p>news 2</p>', 2, 2, '352805347_272465948645658_9096286696674757798_n2.jpg', 1, 1, 0, 20230702, 'news 2', 'news 2', 'news 2', 'news 2'),
(6, 5, ',4,5,', 'news 3', '<p>news 3</p>', '<p>news 3</p>', 3, 3, '352805347_272465948645658_9096286696674757798_n76.jpg', 0, 3, 1, 20230702, 'news 3', 'news 3', 'news 3', 'news 3');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `price_sale` double NOT NULL,
  `count_view` int NOT NULL,
  `display_order` int NOT NULL,
  `options` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` smallint NOT NULL,
  `display_menu` smallint NOT NULL,
  `date_created` int NOT NULL,
  `seo_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `code`, `name`, `desc`, `content`, `image`, `price`, `price_sale`, `count_view`, `display_order`, `options`, `status`, `display_menu`, `date_created`, `seo_name`, `tags`, `meta_title`, `meta_desc`, `meta_keyword`) VALUES
(4, 'ipm', 'ipm', '<p>ipm</p>', '<p>ipm</p>', 'msi-4090-feature67.jpg', 2000, 3000, 0, 4, ',3,5', 1, 1, 20230630, 'ipm', 'ipm', 'ipm', 'ipm', 'ipm'),
(5, 'SP2', 'SP2 hehe', '<p>SP2</p>', '<p>SP2</p>', 'geforce-rtx-3080-ti-product-gallery-full-screen-3840-3_7b0335b3-f6b3-45d5-89f2-206d2a4e190e-prv88.jpg', 2000, 4000, 0, 5, ',3', 3, 0, 20230630, 'SP2', 'SP2', 'SP2', 'SP2', 'SP2'),
(6, 'SP3', 'SP3', '<p>SP3</p>', '<p>SP3</p>', 'vga-msi-rtx-4090-gaming-trio-24gb-2vccg54.jpg', 1000, 2000, 0, 6, ',1,2,3,4', 3, 1, 20230630, 'SP3', 'SP3', 'SP3', 'SP3', 'SP3'),
(7, 'SP4', 'SP4 123', '<p>SP4</p>', '<p>SP4</p>', '352805347_272465948645658_9096286696674757798_n94.jpg', 2000, 3000, 0, 7, ',5', 1, 0, 20230630, 'SP4', 'SP4', 'SP4', 'SP4', 'SP4');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE IF NOT EXISTS `product_categories` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` int NOT NULL,
  `root_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` smallint NOT NULL,
  `display_order` int NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `representative` smallint NOT NULL,
  `status` smallint NOT NULL,
  `display_menu` smallint NOT NULL,
  `date_created` int NOT NULL,
  `seo_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `parent_id`, `root_id`, `name`, `desc`, `content`, `level`, `display_order`, `image`, `representative`, `status`, `display_menu`, `date_created`, `seo_name`, `meta_title`, `meta_desc`, `meta_keyword`) VALUES
(1, 0, '', 'pro cate', 'pro cate', 'pro cate', 1, 1, 'pro cate', 1, 1, 1, 1, 'pro cate', 'pro cate', 'pro cate', 'pro cate'),
(2, 1, ' ,1', 'ryzen', 'ryzen', 'ryzen', 2, 2, 'ryzen', 3, 1, 0, 1, 'ryzen', 'ryzen', 'ryzen', 'ryzen'),
(3, 2, ' ,1,2', 'ram', 'ram', 'ram', 3, 3, 'ram', 1, 3, 1, 1, 'ram', 'ram', 'ram', 'ram'),
(5, 0, ' ,  , ', 'PSU', '<p>PSU</p>', '<p>PSU</p>', 1, 4, 'vga-msi-rtx-4090-gaming-trio-24gb-2vccg10.jpg', 0, 3, 0, 20230629, 'PSU', 'PSU', 'PSU', 'PSU'),
(6, 0, ' , ', 'SSD', '<p>SSD</p>', '<p>SSD</p>', 1, 5, '9753-front15.jpg', 0, 3, 0, 20230629, 'SSD', 'SSD', 'SSD', 'SSD'),
(7, 6, ' , {\"id\":6}', 'HDD', '<p>HDD</p>', '<p>HDD</p>', 2, 6, 'vga-msi-rtx-4090-gaming-trio-24gb-2vccg75.jpg', 0, 3, 0, 20230629, 'HDD', 'HDD', 'HDD', 'HDD'),
(8, 7, ' ,  , {\"id\":7}', 'cooler', '<p>cooler</p>', '<p>cooler</p>', 3, 7, 'kv-pd30.png', 0, 3, 0, 20230629, 'cooler', 'cooler', 'cooler', 'cooler'),
(9, 7, ' , 6 , 7', 'gpu', '<p>gpu</p>', '<p>gpu</p>', 3, 8, 'vga-msi-rtx-4090-gaming-trio-24gb-2vccg61.jpg', 0, 3, 0, 20230629, 'gpu', 'gpu', 'gpu', 'gpu'),
(10, 5, ' , 5', 'asus', '<p>asus</p>', '<p>asus</p>', 2, 9, 'kv-pd41.png', 0, 3, 0, 20230629, 'asus', 'asus', 'asus', 'asus'),
(11, 0, ' , ', 'msi', '<p>msi</p>', '<p>msi</p>', 1, 10, '9753-front28.jpg', 1, 3, 1, 20230629, 'msi', 'msi', 'msi', 'msi'),
(12, 11, ',11,', 'monitor xyz', '<p>monitor</p>', '<p>monitor</p>', 2, 11, 'vga-msi-rtx-4090-gaming-trio-24gb-2vccg38.jpg', 0, 1, 0, 20230629, 'monitor', 'monitor', 'monitor', 'monitor'),
(13, 11, ',11,', 'LG', '<p>LG</p>', '<p>LG</p>', 2, 12, 'GeForce_RTX_390.jpg', 1, 3, 0, 20230629, 'LG', 'LG', 'LG', 'LG'),
(14, 2, ',1,2,', 'test danh mục', '<p>test danh mục</p>', '<p>test danh mục</p>', 3, 13, 'msi-4090-feature65.jpg', 0, 3, 0, 20230630, 'test danh mục', 'test danh mục', 'test danh mục', 'test danh mục');

-- --------------------------------------------------------

--
-- Table structure for table `product_category_products`
--

DROP TABLE IF EXISTS `product_category_products`;
CREATE TABLE IF NOT EXISTS `product_category_products` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int NOT NULL,
  `product_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_category_products`
--

INSERT INTO `product_category_products` (`id`, `category_id`, `product_id`) VALUES
(18, 6, 4),
(16, 8, 5),
(15, 10, 5),
(14, 11, 5),
(9, 11, 6),
(10, 13, 6),
(17, 9, 5),
(19, 2, 4),
(20, 9, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
