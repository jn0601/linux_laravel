-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 30, 2023 at 09:55 AM
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
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_order` int NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` smallint NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `category_id`, `name`, `desc`, `content`, `link`, `display_order`, `image`, `status`) VALUES
(1, 1, 'test banner', '<p>test banner</p>', '<p>test banner</p>', 'https://www.facebook.com', 1, 'vga-msi-rtx-4090-gaming-trio-24gb-2vccg90.jpg', 1),
(2, 2, 'gpu', '<p>gpu</p>', '<p>gpu</p>', 'https://www.facebook.com', 2, '3991083-6171737723-Nvidi95.jpg', 3),
(3, 0, 'gpu 2', '<p>gpu 2</p>', '<p>gpu 2</p>', 'https://www.facebook.com', 3, '9753-front70.jpg', 3),
(4, 17, 'vga', '<p>vga</p>', '<p>vga</p>', 'https://www.facebook.com', 4, 'vga-msi-rtx-4090-gaming-trio-24gb-2vccg55.jpg', 1);

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
(31, 'tttttttttttttt', '<p>tttttttttttttt</p>', '<p>tttttttttttttt</p>', 19),
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(8, '2023_06_29_044450_create_tbl_product_category_products', 5);

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
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `multi_languages`
--

INSERT INTO `multi_languages` (`id`, `type`, `object_id`, `lang_code`, `name`, `desc`, `content`, `seo_name`, `tags`, `meta_title`, `meta_desc`, `meta_keyword`) VALUES
(1, 4, 10, 'vn', 'banner language', '<p>banner language</p>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost/051bbb99-e92b-4f85-94e8-652c679b5858\" width=\"700\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>&nbsp;</p>', '<p>banner language</p>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost/b1e2179e-c7a9-4072-9b28-042d51d61f91\" width=\"2048\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>&nbsp;</p>', 'banner language', 'banner language', 'banner language', 'banner language', 'banner language'),
(2, 4, 11, 'vn', 'banner tv', '<p>banner tv</p>', '<p>banner tv</p>', 'banner tv', 'banner tv', 'banner tv', 'banner tv', 'banner tv'),
(3, 4, 12, 'vn', 'monitor abc', '<p>monitor</p>', '<p>monitor</p>', 'monitor', 'monitor', 'monitor', 'monitor', 'monitor'),
(4, 4, 13, 'vn', 'banner tv 3', '<p>banner tv 3</p>', '<p>banner tv 3</p>', 'banner tv 3', 'banner tv 3', 'banner tv 3', 'banner tv 3', 'banner tv 3'),
(6, 4, 15, 'vn', 'test ngôn ngữ', '<p>test ng&ocirc;n ngữ</p>', '<p>test ng&ocirc;n ngữ</p>', 'test ngôn ngữ', 'test ngôn ngữ', 'test ngôn ngữ', 'test ngôn ngữ', 'test ngôn ngữ'),
(9, 4, 15, 'en', 'test en của ngôn ngữ', '<p>test en của ng&ocirc;n ngữ</p>', '<p>test en của ng&ocirc;n ngữ</p>', 'test en của ngôn ngữ', 'test en của ngôn ngữ', 'test en của ngôn ngữ', 'test en của ngôn ngữ', 'test en của ngôn ngữ'),
(10, 4, 17, 'vn', 'đa ngôn ngữ 1', '<p>đa ng&ocirc;n ngữ 1</p>', '<p>đa ng&ocirc;n ngữ 1</p>', 'đa ngôn ngữ 1', 'đa ngôn ngữ 1', 'đa ngôn ngữ 1', 'đa ngôn ngữ 1', 'đa ngôn ngữ 1'),
(11, 4, 17, 'en', 'đa ngôn ngữ 2', '<p>abc</p>', '<p>đa ng&ocirc;n ngữ 2</p>\r\n\r\n<p>&nbsp;</p>', 'đa ngôn ngữ 2', 'đa ngôn ngữ 2', 'đa ngôn ngữ 2', 'đa ngôn ngữ 2', 'đa ngôn ngữ 2'),
(19, 4, 24, 'vn', 'qweqweerqwetrwert', '<p>qweqweerqwetrwert</p>', '<p>qweqweerqwetrwert</p>', 'qweqweerqwetrwert', 'qweqweerqwetrwert', 'qweqweerqwetrwert', 'qweqweerqwetrwert', 'qweqweerqwetrwert'),
(20, 4, 24, 'en', '', '', '', '', '', '', '', ''),
(21, 4, 25, 'vn', 'bnmbnmbn', '<p>bnmbnmbn</p>', '<p>bnmbnmbn</p>', 'bnmbnmbn', 'bnmbnmbn', 'bnmbnmbn', 'bnmbnmbn', 'bnmbnmbn'),
(22, 4, 25, 'en', 'jk;iupop]ioiktyhgh fgjyipuipuyiku', '<p>jk;iupop]ioiktyhgh fgjyipuipuyiku</p>', '<p>jk;iupop]ioiktyhgh fgjyipuipuyiku</p>', 'jk;iupop]ioiktyhgh fgjyipuipuyiku', 'jk;iupop]ioiktyhgh fgjyipuipuyiku', '', 'jk;iupop]ioiktyhgh fgjyipuipuyikujk;iupop]ioiktyhgh fgjyipuipuyiku', 'jk;iupop]ioiktyhgh fgjyipuipuyiku'),
(29, 4, 29, 'vn', 'wwwwwwwwwwwwwwwww', '<p>wwwwwwwwwwwwwwwww</p>', '<p>wwwwwwwwwwwwwwwww</p>', 'wwwwwwwwwwwwwwwww', 'wwwwwwwwwwwwwwwww', 'wwwwwwwwwwwwwwwww', 'wwwwwwwwwwwwwwwww', 'wwwwwwwwwwwwwwwww'),
(30, 4, 29, 'en', '', '', '', '', '', '', '', ''),
(31, 4, 30, 'vn', 'asd', '<p>asd</p>', '<p>asd</p>', 'asd', 'asd', 'asd', 'asd', 'asd'),
(32, 4, 30, 'en', '', '', '', '', '', '', '', ''),
(33, 4, 31, 'vn', 'tttttttttttttt', '<p>tttttttttttttt</p>', '<p>tttttttttttttt</p>', 'tttttttttttttt', 'tttttttttttttt', 'tttttttttttttt', 'tttttttttttttt', 'tttttttttttttt'),
(34, 4, 31, 'en', '', '', '', '', '', '', '', ''),
(35, 4, 32, 'vn', 'test aaaaaa', '<p>test aaaaaa</p>', '<p>test aaaaaa</p>', 'test aaaaaa', 'test aaaaaa', 'test aaaaaa', 'test aaaaaa', 'test aaaaaa'),
(36, 4, 32, 'en', 'test aaaaaa', '<p>test aaaaaa</p>', '<p>test aaaaaa</p>', '', '', 'test aaaaaa', 'test aaaaaa', 'test aaaaaa'),
(41, 4, 3, 'vn', 'gpu 2', '<p>gpu 2</p>', '<p>gpu 2</p>', 'gpu 2', 'gpu 2', 'gpu 2', 'gpu 2', 'gpu 2'),
(42, 4, 3, 'en', '', '', '', '', '', '', '', ''),
(47, 6, 11, 'vn', 'msi', '<p>msi</p>', '<p>msi</p>', 'msi', 'msi', 'msi', 'msi', 'msi'),
(48, 6, 11, 'en', 'msi en', '<p>msi en</p>', '<p>msi en</p>', 'msi en', 'msi en', 'msi en', 'msi en', 'msi en'),
(49, 6, 12, 'vn', 'monitor xyz', '<p>monitor</p>', '<p>monitor</p>', 'monitor', 'monitor', 'monitor', 'monitor', 'monitor'),
(50, 6, 12, 'en', 'abc', '', '', '', '', '', '', ''),
(51, 6, 13, 'vn', 'LG', '<p>LG</p>', '<p>LG</p>', 'LG', 'LG', 'LG', 'LG', 'LG'),
(52, 6, 13, 'en', 'LG VN', '', '', '', '', '', '', ''),
(53, 6, 14, 'vn', 'test danh mục', '<p>test danh mục</p>', '<p>test danh mục</p>', 'test danh mục', 'test danh mục', 'test danh mục', 'test danh mục', 'test danh mục'),
(54, 6, 14, 'en', '', '', '', '', '', '', '', ''),
(55, 6, 3, 'vn', 'ipx', '<p>ipx</p>', '<p>ipx</p>', 'ipx', 'ipx', 'ipx', 'ipx', 'ipx'),
(56, 6, 3, 'en', '', '', '', '', '', '', '', ''),
(57, 6, 4, 'vn', 'ipm', '<p>ipm</p>', '<p>ipm</p>', 'ipm', 'ipm', 'ipm', 'ipm', 'ipm'),
(58, 6, 4, 'en', '', '', '', '', '', '', '', ''),
(59, 6, 5, 'vn', 'SP2', '<p>SP2</p>', '<p>SP2</p>', 'SP2', 'SP2', 'SP2', 'SP2', 'SP2'),
(60, 6, 5, 'en', '', '', '', '', '', '', '', ''),
(61, 6, 6, 'vn', 'SP3', '<p>SP3</p>', '<p>SP3</p>', 'SP3', 'SP3', 'SP3', 'SP3', 'SP3'),
(62, 6, 6, 'en', '', '', '', '', '', '', '', ''),
(63, 6, 7, 'vn', 'SP4', '<p>SP4</p>', '<p>SP4</p>', 'SP4', 'SP4', 'SP4', 'SP4', 'SP4'),
(64, 6, 7, 'en', '', '', '', '', '', '', '', '');

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
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `price_sale` double NOT NULL,
  `count_view` int NOT NULL,
  `display_order` int NOT NULL,
  `options` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` smallint NOT NULL,
  `display_menu` smallint NOT NULL,
  `date_created` int NOT NULL,
  `seo_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `code`, `name`, `desc`, `content`, `image`, `price`, `price_sale`, `count_view`, `display_order`, `options`, `status`, `display_menu`, `date_created`, `seo_name`, `tags`, `meta_title`, `meta_desc`, `meta_keyword`) VALUES
(1, 'a1', 'a1', 'a1', 'a1', 'a1', 10, 10, 10, 1, ',2,4,', 3, 1, 23, 'a1', 'a1', 'a1', 'a1', 'a1'),
(2, 'a2', 'a2', 'a2', 'a2', 'a2', 20, 20, 20, 2, '2,5', 1, 0, 1, 'a2', 'a2', 'a2', 'a2', 'a2'),
(3, 'ipx', 'ipx', '<p>ipx</p>', '<p>ipx</p>', '9753-front29.jpg', 2000, 3000, 0, 3, ',', 1, 1, 20230630, 'ipx', 'ipx', 'ipx', 'ipx', 'ipx'),
(4, 'ipm', 'ipm', '<p>ipm</p>', '<p>ipm</p>', 'msi-4090-feature67.jpg', 2000, 3000, 0, 4, ',3', 1, 1, 20230630, 'ipm', 'ipm', 'ipm', 'ipm', 'ipm'),
(5, 'SP2', 'SP2', '<p>SP2</p>', '<p>SP2</p>', 'geforce-rtx-3080-ti-product-gallery-full-screen-3840-3_7b0335b3-f6b3-45d5-89f2-206d2a4e190e-prv88.jpg', 2000, 4000, 0, 5, ',3', 1, 0, 20230630, 'SP2', 'SP2', 'SP2', 'SP2', 'SP2'),
(6, 'SP3', 'SP3', '<p>SP3</p>', '<p>SP3</p>', 'vga-msi-rtx-4090-gaming-trio-24gb-2vccg54.jpg', 1000, 2000, 0, 6, ',1,2,3,4', 3, 1, 20230630, 'SP3', 'SP3', 'SP3', 'SP3', 'SP3'),
(7, 'SP4', 'SP4', '<p>SP4</p>', '<p>SP4</p>', 'geforce-rtx-3080-ti-product-gallery-full-screen-3840-3_7b0335b3-f6b3-45d5-89f2-206d2a4e190e-prv17.jpg', 2000, 3000, 0, 7, ',', 1, 0, 20230630, 'SP4', 'SP4', 'SP4', 'SP4', 'SP4');

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE IF NOT EXISTS `product_categories` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` int NOT NULL,
  `root_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` smallint NOT NULL,
  `display_order` int NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `representative` smallint NOT NULL,
  `status` smallint NOT NULL,
  `display_menu` smallint NOT NULL,
  `date_created` int NOT NULL,
  `seo_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci NOT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_category_products`
--

INSERT INTO `product_category_products` (`id`, `category_id`, `product_id`) VALUES
(1, 6, 1),
(2, 7, 1),
(3, 8, 1),
(4, 13, 3),
(5, 9, 4),
(6, 11, 5),
(7, 10, 5),
(8, 3, 5),
(9, 1, 6),
(10, 13, 6);

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
