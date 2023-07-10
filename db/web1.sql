-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 10, 2023 at 03:34 AM
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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `category_id`, `name`, `desc`, `content`, `link`, `display_order`, `image`, `status`) VALUES
(1, 1, 'test banner', '<p>test banner</p>', '<p>test banner</p>', 'https://www.facebook.com', 1, 'vga-msi-rtx-4090-gaming-trio-24gb-2vccg90.jpg', 1),
(2, 2, 'gpu', '<p>gpu</p>', '<p>gpu</p>', 'https://www.facebook.com', 2, '3991083-6171737723-Nvidi95.jpg', 3),
(3, 0, 'gpu 2', '<p>gpu 2</p>', '<p>gpu 2</p>', 'https://www.facebook.com', 3, '9753-front70.jpg', 3),
(4, 17, 'vga', '<p>vga</p>', '<p>vga</p>', 'https://www.facebook.com', 4, 'vga-msi-rtx-4090-gaming-trio-24gb-2vccg55.jpg', 1),
(6, 10, 'banner hp', '<p>banner hp</p>', '<p>banner hp</p>', 'https://www.facebook.com', 5, '9753-front49.jpg', 3),
(9, 15, 'bn', '<p>bn</p>', '<p>bn</p>', 'https://www.facebook.com', 7, '9753-front58.jpg', 1),
(8, 15, 'test fgjfgjhfgjh', '<p>test fgjfgjhfgjh</p>', '<p>test fgjfgjhfgjh</p>', 'https://www.facebook.com', 6, '352805347_272465948645658_9096286696674757798_n57.jpg', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(32, 'test aaaaaa', '<p>test aaaaaa</p>', '<p>test aaaaaa</p>', 20),
(35, 'nmmfghgchjyuitgbfgb yuouyip;oikhluio', '<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost/dac96f56-5b7e-4ca9-a813-60352fc81509\" width=\"2048\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost/a88db52c-eb48-488e-b845-e67e52ab2623\" width=\"700\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>&nbsp;</p>', '<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost/c8d41977-22db-415d-ba96-e3fee5b52bd1\" width=\"922\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost/0acfa635-b595-41ff-bd28-b8b8c531b6f1\" width=\"2048\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>&nbsp;</p>', 21);

-- --------------------------------------------------------

--
-- Table structure for table `form_contacts`
--

DROP TABLE IF EXISTS `form_contacts`;
CREATE TABLE IF NOT EXISTS `form_contacts` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_created` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `form_contacts`
--

INSERT INTO `form_contacts` (`id`, `fullname`, `title`, `address`, `phone`, `email`, `content`, `note`, `date_created`) VALUES
(1, 'aaa', 'aaa aaaaaaaaaaa aaaaaaaaaa', 'aaa', 123, 'aaa', 'aaa', 'aaa', 1),
(2, 'bbb', 'bbbbbbbbbbb bbbbbbbbbbbbbbbb bbbbbbbb', 'bbb', 123, 'bbb', 'bbb', 'bbb', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `seo_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_desc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` smallint NOT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_folder` smallint NOT NULL,
  `is_horizontal` smallint NOT NULL,
  `display_order` int NOT NULL,
  `status` smallint NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `parent_id`, `name`, `seo_name`, `tags`, `meta_title`, `meta_desc`, `meta_keyword`, `type`, `icon`, `is_folder`, `is_horizontal`, `display_order`, `status`) VALUES
(18, 10, 'Intel', 'intel', 'Intel', 'Intel', 'Intel', 'Intel', 6, 'gearvn-intel-core-i5-13600k-3_610a0170cf6844caa7f4b8add912bc0e46.webp', 0, 0, 16, 1),
(4, 0, 'menu abc', 'menu-abc', '', '', '', '', 15, '352805347_272465948645658_9096286696674757798_n29.jpg', 1, 0, 4, 3),
(5, 2, 'menu vn', 'menu-vn', '', '', '', '', 15, '9753-front29.jpg', 1, 0, 5, 3),
(6, 0, 'Trang chủ', 'trang-chu', 'Trang chủ', 'Trang chủ', 'Trang chủ', 'Trang chủ', 0, 'hotel90.png', 0, 0, 6, 3),
(7, 0, 'Giới thiệu', 'gioi-thieu', 'Giới thiệu', 'Giới thiệu', 'Giới thiệu', 'Giới thiệu', 10, 'online-learning43.png', 0, 0, 7, 3),
(10, 0, 'Danh mục sản phẩm', 'danh-muc-san-pham', 'Danh mục sản phẩm', 'Danh mục sản phẩm', 'Danh mục sản phẩm', 'Danh mục sản phẩm', 6, 'wireless-router88.png', 1, 0, 8, 1),
(13, 11, 'Tin công nghệ', 'tin-cong-nghe', 'Tin công nghệ', 'Tin công nghệ', 'Tin công nghệ', 'Tin công nghệ', 5, 'handshake18.png', 0, 0, 11, 1),
(11, 0, 'Danh mục tin tức', 'danh-muc-tin-tuc', 'Danh mục tin tức', 'Danh mục tin tức', 'Danh mục tin tức', 'Danh mục tin tức', 5, 'webinar45.png', 1, 0, 9, 1),
(12, 0, 'Liên hệ', 'lien-he', 'Liên hệ', 'Liên hệ', 'Liên hệ', 'Liên hệ', 20, 'phone-call66.png', 0, 0, 10, 3),
(14, 11, 'Tin khuyến mãi', 'tin-khuyen-mai', 'Tin khuyến mãi', 'Tin khuyến mãi', 'Tin khuyến mãi', 'Tin khuyến mãi', 5, 'economy41.png', 0, 0, 12, 1),
(15, 13, 'Tin test', 'tin-test', 'Tin test', 'Tin test', 'Tin test', 'Tin test', 5, '352805347_272465948645658_9096286696674757798_n34.jpg', 0, 1, 13, 1),
(16, 10, 'AMD', 'amd', 'AMD', 'AMD', 'AMD', 'AMD', 6, 'o1Sx0GmTnr43.png', 0, 0, 14, 1),
(17, 16, 'CPU AMD', 'cpu-amd', 'CPU AMD', 'CPU AMD', 'CPU AMD', 'CPU AMD', 6, 'o1Sx0GmTnr22.png', 0, 0, 15, 1),
(19, 16, 'Mainboard AMD', 'mainboard-amd', 'Mainboard AMD', 'Mainboard AMD', 'Mainboard AMD', 'Mainboard AMD', 6, '33642_product_5_20200520154829_5ec4e0cdbea5214.png', 0, 0, 17, 1),
(20, 18, 'CPU Intel', 'cpu-intel', 'CPU Intel', 'CPU Intel', 'CPU Intel', 'CPU Intel', 6, 'gearvn-intel-core-i5-13600k-3_610a0170cf6844caa7f4b8add912bc0e25.webp', 0, 0, 18, 1),
(21, 14, 'Tin giảm giá', 'tin-giam-gia', 'Tin giảm giá', 'Tin giảm giá', 'Tin giảm giá', 'Tin giảm giá', 5, 'o1Sx0GmTnr60.png', 0, 0, 19, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(10, '2023_07_02_121939_create_tbl_news', 6),
(11, '2023_07_03_061512_create_tbl_form_contacts', 7),
(12, '2023_07_05_023120_create_tbl_menus', 8),
(13, '2023_07_05_063537_create_tbl_nodes', 9);

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
) ENGINE=InnoDB AUTO_INCREMENT=189 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `multi_languages`
--

INSERT INTO `multi_languages` (`id`, `type`, `object_id`, `lang_code`, `name`, `desc`, `content`, `seo_name`, `tags`, `meta_title`, `meta_desc`, `meta_keyword`) VALUES
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
(49, 6, 12, 'vn', 'monitor xyz', '<p>monitor</p>', '<p>monitor</p>', 'monitor-xyz', 'monitor', 'monitor', 'monitor', 'monitor'),
(50, 6, 12, 'en', 'abc', '', '', 'abc', '', '', '', ''),
(51, 6, 13, 'vn', 'LG', '<p>LG</p>', '<p>LG</p>', 'LG', 'LG', 'LG', 'LG', 'LG'),
(52, 6, 13, 'en', 'LG VN', '', '', '', '', '', '', ''),
(53, 6, 14, 'vn', 'test danh mục', '<p>test danh mục</p>', '<p>test danh mục</p>', 'test-danh-muc', 'test danh mục', 'test danh mục', 'test danh mục', 'test danh mục'),
(54, 6, 14, 'en', '', '', '', '', '', '', '', ''),
(57, 1, 4, 'vn', 'ipm', '<p>ipm</p>', '<p>ipm</p>', 'ipm', 'ipm', 'ipm', 'ipm', 'ipm'),
(58, 1, 4, 'en', '', '', '', '', '', '', '', ''),
(59, 1, 5, 'vn', 'SP2 hehe', '<p>SP2</p>', '<p>SP2</p>', 'SP2', 'SP2', 'SP2', 'SP2', 'SP2'),
(60, 1, 5, 'en', '', '', '', '', '', '', '', ''),
(61, 1, 6, 'vn', 'MSI B550m Mortar', '<p>MSI B550m Mortar</p>', '<p>MSI B550m Mortar</p>', 'msi-b550m-mortar', 'MSI B550m Mortar', 'MSI B550m Mortar', 'MSI B550m Mortar', 'MSI B550m Mortar'),
(62, 1, 6, 'en', '', '', '', '', '', '', '', ''),
(63, 1, 7, 'vn', 'Ryzen 5 5600x', '<p>Ryzen 5 5600x</p>', '<p>Ryzen 5 5600x</p>', 'ryzen-5-5600x', 'Ryzen 5 5600x', 'Ryzen 5 5600x', 'Ryzen 5 5600x', 'Ryzen 5 5600x'),
(64, 1, 7, 'en', '123', '', '', '123', '', '', '', ''),
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
(85, 2, 5, 'vn', 'abc 123', '<p>abc</p>', '<p>abc</p>', 'abc-123', 'abc', 'abc', 'abc', 'abc'),
(86, 2, 5, 'en', '', '', '', '', '', '', '', ''),
(89, 4, 6, 'vn', 'banner hp', '<p>banner hp</p>', '<p>banner hp</p>', 'banner hp', 'banner hp', 'banner hp', 'banner hp', 'banner hp'),
(90, 4, 6, 'en', 'en', '<p>en</p>', '<p>en</p>', 'en', 'en', 'en', 'en', 'en'),
(93, 2, 7, 'vn', 'nvidia vn', '<p>nvidia vn</p>', '<p>nvidia vn</p>', 'nvidia-vn', 'nvidia vn', 'nvidia vn', 'nvidia vn', 'nvidia vn'),
(94, 2, 7, 'en', '', '', '', '', '', '', '', ''),
(95, 15, 4, 'vn', 'menu abc', '', '', 'menu-abc', '', '', '', ''),
(96, 15, 4, 'en', 'menu abc end', '', '', 'menu-abc-end', '', '', '', ''),
(97, 2, 8, 'vn', 'test news', '<p>test news</p>', '<p>test news</p>', 'test-news', 'test news', 'test news', 'test news', 'test news'),
(98, 2, 8, 'en', '', '', '', '', '', '', '', ''),
(99, 2, 9, 'vn', 'node news', '<p>node news</p>', '<p>node news</p>', 'node-news', 'node news', 'node news', 'node news', 'node news'),
(100, 2, 9, 'en', '', '', '', '', '', '', '', ''),
(105, 2, 12, 'vn', 'news lang', '<p>news lang</p>', '<p>news lang</p>', 'news-lang', 'news lang', 'news lang', 'news lang', 'news lang'),
(106, 2, 12, 'en', 'news lang en', '<p>news lang en</p>', '<p>news lang en</p>', 'news-lang-en', 'news lang en', 'news lang en', 'news lang en', 'news lang en'),
(107, 2, 14, 'vn', 'basemodel', '<p>thfthfsth ftsrth rtyhrtsghrtgrtg rthrthtrhrtshtrh fghgdfjhgdhjdtgjtdj</p>', '<p>basemodel</p>', 'basemodel', 'basemodel', 'basemodel', 'basemodel', 'basemodel'),
(108, 2, 14, 'en', 'basemodel en', '<p>basemodel en</p>', '<p>basemodel en</p>', 'basemodel-en', 'basemodel en', 'basemodel en', 'basemodel en', 'basemodel en'),
(111, 3, 35, 'vn', 'nmmfghgchjyuitgbfgb yuouyip;oikhluio', '<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost/dac96f56-5b7e-4ca9-a813-60352fc81509\" width=\"2048\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost/a88db52c-eb48-488e-b845-e67e52ab2623\" width=\"700\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>&nbsp;</p>', '<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost/c8d41977-22db-415d-ba96-e3fee5b52bd1\" width=\"922\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost/0acfa635-b595-41ff-bd28-b8b8c531b6f1\" width=\"2048\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>&nbsp;</p>', 'nmmfghgchjyuitgbfgb-yuouyipoikhluio', 'nmmfghgchjyuitgbfgb yuouyip;oikhluio', 'nmmfghgchjyuitgbfgb yuouyip;oikhluio', 'nmmfghgchjyuitgbfgb yuouyip;oikhluio', 'nmmfghgchjyuitgbfgb yuouyip;oikhluio'),
(112, 3, 35, 'en', '', '', '', '', '', '', '', ''),
(113, 2, 15, 'vn', 'Meta chính thức ra mắt Threads, cạnh tranh với Twitter', '<p><em>Meta vừa mới ra mắt ứng dụng mạng x&atilde; hội Threads cạnh tranh với Twitter. Hiện tại, ứng dụng n&agrave;y chưa c&oacute; quảng c&aacute;o v&agrave; cho ph&eacute;p người d&ugrave;ng li&ecirc;n kết Instagram để giữ lại số lượng người theo d&otilde;i v&agrave; t&ecirc;n người d&ugrave;ng của họ.</em></p>', '<p>Đến thời điểm viết b&agrave;i n&agrave;y, Threads đ&atilde; leo l&ecirc;n vị tr&iacute; thứ 27 trong danh s&aacute;ch &ldquo;Mạng x&atilde; hội&rdquo; tr&ecirc;n App Store của Apple. Dự kiến với việc ng&agrave;y c&agrave;ng c&oacute; nhiều người d&ugrave;ng biết đến v&agrave; tải xuống ứng dụng n&agrave;y, lượt tải về sẽ tiếp tục tăng trong tương lai.</p>\r\n\r\n<h3><img alt=\"Threads\" height=\"1200\" sizes=\"(max-width: 1080px) 100vw, 1080px\" src=\"https://news.tandoanh.vn/wp-content/uploads/2023/07/Thread.jpg\" srcset=\"https://news.tandoanh.vn/wp-content/uploads/2023/07/Thread.jpg 1080w, https://news.tandoanh.vn/wp-content/uploads/2023/07/Thread-405x450.jpg 405w, https://news.tandoanh.vn/wp-content/uploads/2023/07/Thread-922x1024.jpg 922w, https://news.tandoanh.vn/wp-content/uploads/2023/07/Thread-768x853.jpg 768w, https://news.tandoanh.vn/wp-content/uploads/2023/07/Thread-150x167.jpg 150w, https://news.tandoanh.vn/wp-content/uploads/2023/07/Thread-300x333.jpg 300w, https://news.tandoanh.vn/wp-content/uploads/2023/07/Thread-696x773.jpg 696w, https://news.tandoanh.vn/wp-content/uploads/2023/07/Thread-1068x1187.jpg 1068w\" width=\"1080\" /></h3>\r\n\r\n<p>C&aacute;ch đ&acirc;y v&agrave;i ph&uacute;t Tỷ ph&uacute; Markzuckerbeg đ&atilde; chia sẻ tr&ecirc;n trang c&aacute; nh&acirc;n ch&iacute;nh thức giới thiệu Thread. Được biết th&igrave; mạng x&atilde; hội n&agrave;y cũng nguy&ecirc;n nh&acirc;n khiến hai vị tỷ ph&uacute; Zucker v&agrave; Musk hẹn đấu v&otilde; với nhau.</p>\r\n\r\n<p>Th&ocirc;ng tin từ App Store cho biết, ứng dụng n&agrave;y y&ecirc;u cầu&nbsp;<strong><a href=\"https://tandoanh.vn/\" rel=\"noopener\" target=\"_blank\">thiết bị</a></strong>&nbsp;chạy iOS 14.0 trở l&ecirc;n để sử dụng v&agrave; y&ecirc;u cầu độ tuổi &ldquo;12+&rdquo;. Hiện tại, ứng dụng n&agrave;y chưa c&oacute; bất kỳ t&ugrave;y chọn mua trong ứng dụng n&agrave;o.</p>\r\n\r\n<p><img alt=\"Threads logo\" height=\"450\" sizes=\"(max-width: 800px) 100vw, 800px\" src=\"https://news.tandoanh.vn/wp-content/uploads/2023/07/Theard-logo.jpg\" srcset=\"https://news.tandoanh.vn/wp-content/uploads/2023/07/Theard-logo.jpg 800w, https://news.tandoanh.vn/wp-content/uploads/2023/07/Theard-logo-450x253.jpg 450w, https://news.tandoanh.vn/wp-content/uploads/2023/07/Theard-logo-768x432.jpg 768w, https://news.tandoanh.vn/wp-content/uploads/2023/07/Theard-logo-150x84.jpg 150w, https://news.tandoanh.vn/wp-content/uploads/2023/07/Theard-logo-300x169.jpg 300w, https://news.tandoanh.vn/wp-content/uploads/2023/07/Theard-logo-696x392.jpg 696w\" width=\"800\" />​</p>\r\n\r\n<p>Threads được mi&ecirc;u tả l&agrave; &ldquo;ứng dụng tr&ograve; chuyện văn bản dựa tr&ecirc;n Instagram&rdquo;, người d&ugrave;ng c&oacute; thể sử dụng ứng dụng n&agrave;y để đăng b&agrave;i &ldquo;Threads&rdquo; v&agrave; những người d&ugrave;ng kh&aacute;c c&oacute; thể trả lời. Điều n&agrave;y r&otilde; r&agrave;ng cho thấy Thread l&agrave; một sản phẩm cạnh tranh với Twitter.</p>\r\n\r\n<p>Một điểm tương đồng với Twitter l&agrave; c&aacute;c Threads của người theo d&otilde;i sẽ xuất hiện tr&ecirc;n d&ograve;ng thời gian của người d&ugrave;ng.</p>\r\n\r\n<p>Threads hỗ trợ b&agrave;i đăng d&agrave;i tối đa 500 k&yacute; tự v&agrave; cũng hỗ trợ c&aacute;c nội dung phổ biến kh&aacute;c như h&igrave;nh ảnh, video v&agrave; li&ecirc;n kết.</p>\r\n\r\n<h4><img alt=\"Threads meta\" height=\"674\" sizes=\"(max-width: 1200px) 100vw, 1200px\" src=\"https://news.tandoanh.vn/wp-content/uploads/2023/07/Theard-meta.jpg\" srcset=\"https://news.tandoanh.vn/wp-content/uploads/2023/07/Theard-meta.jpg 1200w, https://news.tandoanh.vn/wp-content/uploads/2023/07/Theard-meta-450x253.jpg 450w, https://news.tandoanh.vn/wp-content/uploads/2023/07/Theard-meta-1024x575.jpg 1024w, https://news.tandoanh.vn/wp-content/uploads/2023/07/Theard-meta-768x431.jpg 768w, https://news.tandoanh.vn/wp-content/uploads/2023/07/Theard-meta-150x84.jpg 150w, https://news.tandoanh.vn/wp-content/uploads/2023/07/Theard-meta-300x169.jpg 300w, https://news.tandoanh.vn/wp-content/uploads/2023/07/Theard-meta-696x391.jpg 696w, https://news.tandoanh.vn/wp-content/uploads/2023/07/Theard-meta-1068x600.jpg 1068w\" width=\"1200\" /></h4>\r\n\r\n<p>Meta cho ph&eacute;p người d&ugrave;ng li&ecirc;n kết Threads với t&agrave;i khoản Instagram của họ . Điều n&agrave;y c&oacute; nghĩa l&agrave; th&ocirc;ng tin như t&ecirc;n người d&ugrave;ng Instagram v&agrave; c&aacute;c th&ocirc;ng tin kh&aacute;c c&oacute; thể được nhanh ch&oacute;ng chuyển sang Threads v&agrave; người d&ugrave;ng cũng c&oacute; thể chọn theo d&otilde;i những người d&ugrave;ng m&agrave; họ đ&atilde; theo d&otilde;i tr&ecirc;n Instagram.</p>\r\n\r\n<p>Với số lượng người d&ugrave;ng khổng lồ của Instagram v&agrave; kh&ocirc;ng bị giới hạn giống như Bluesky hay kh&oacute; sử dụng như Mastodon, dự kiến Threads sẽ l&agrave; mối đe dọa lớn đối với Twitter.</p>\r\n\r\n<p>Ngo&agrave;i ra, một số người cũng lo ngại về việc ứng dụng n&agrave;y thu thập dữ liệu người d&ugrave;ng. Tuy nhi&ecirc;n, theo lời&nbsp;<strong><a href=\"https://news.tandoanh.vn/tag/meta/\">Meta</a></strong>, hiện tại Threads kh&ocirc;ng sử dụng bất kỳ dữ liệu n&agrave;o để theo d&otilde;i người d&ugrave;ng tr&ecirc;n c&aacute;c trang web v&agrave; ứng dụng thuộc sở hữu của c&aacute;c c&ocirc;ng ty kh&aacute;c, điều n&agrave;y l&agrave;m cho Threads trở n&ecirc;n ri&ecirc;ng tư hơn so với Twitter, Facebook v&agrave; Instagram.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost/83b85c6e-5cef-4653-a58e-d959bc548fc2\" width=\"700\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost/ab95ee81-bc78-46c3-9fd6-ff1895977342\" width=\"700\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>&nbsp;</p>', 'meta-chinh-thuc-ra-mat-threads-canh-tranh-voi-twitter', 'meta', 'meta', 'meta', 'meta'),
(114, 2, 15, 'en', 'dvcjn jkljkljkl', '', '', 'dvcjn-jkljkljkl', '', '', '', ''),
(117, 5, 8, 'vn', 'test dm 123', '<p>test dm</p>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost/40d338bc-dbbf-48a4-8b4c-8b5110555075\" width=\"700\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>&nbsp;</p>', '<p>test dm</p>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost/7378ff1a-4bdb-4ddc-93a1-0160f1975dea\" width=\"922\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>&nbsp;</p>', 'test-dm-123', 'test dm', 'test dm', 'test dm', 'test dm'),
(118, 5, 8, 'en', 'test dm en 123', '<p>test dm en</p>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost/170f8508-6b04-4ca0-9d35-e47d90d6f264\" width=\"922\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>&nbsp;</p>', '', 'test-dm-en-123', '', '', '', ''),
(131, 15, 5, 'vn', 'menu vn', '', '', 'menu-vn', '', '', '', ''),
(132, 15, 5, 'en', 'menu en', '', '', 'menu-en', '', '', '', ''),
(133, 15, 6, 'vn', 'Trang chủ', '', '', 'trang-chu', 'Trang chủ', 'Trang chủ', 'Trang chủ', 'Trang chủ'),
(134, 15, 6, 'en', 'Home page', '', '', 'home-page', 'Home page', 'Home page', 'Home page', 'Home page'),
(135, 15, 7, 'vn', 'Giới thiệu', '', '', 'gioi-thieu', 'Giới thiệu', 'Giới thiệu', 'Giới thiệu', 'Giới thiệu'),
(136, 15, 7, 'en', 'About us', '', '', 'about-us', 'About us', 'About us', 'About us', 'About us'),
(137, 4, 8, 'vn', 'test fgjfgjhfgjh', '<p>test fgjfgjhfgjh</p>', '<p>test fgjfgjhfgjh</p>', 'test-fgjfgjhfgjh', 'test fgjfgjhfgjh', 'test fgjfgjhfgjh', 'test fgjfgjhfgjh', 'test fgjfgjhfgjh'),
(138, 4, 8, 'en', '', '', '', '', '', '', '', ''),
(141, 4, 9, 'vn', 'bn', '<p>bn</p>', '<p>bn</p>', 'bn', 'bn', 'bn', 'bn', 'bn'),
(142, 4, 9, 'en', '', '', '', '', '', '', '', ''),
(143, 15, 10, 'vn', 'Danh mục sản phẩm', '', '', 'danh-muc-san-pham', 'Danh mục sản phẩm', 'Danh mục sản phẩm', 'Danh mục sản phẩm', 'Danh mục sản phẩm'),
(144, 15, 10, 'en', 'Product Category', '', '', 'product-category', 'Product Category', 'Product Category', 'Product Category', 'Product Category'),
(145, 15, 11, 'vn', 'Danh mục tin tức', '', '', 'danh-muc-tin-tuc', 'Danh mục tin tức', 'Danh mục tin tức', 'Danh mục tin tức', 'Danh mục tin tức'),
(146, 15, 11, 'en', 'News category', '', '', 'news-category', 'News category', 'News category', 'News category', 'News category'),
(147, 15, 12, 'vn', 'Liên hệ', '', '', 'lien-he', 'Liên hệ', 'Liên hệ', 'Liên hệ', 'Liên hệ'),
(148, 15, 12, 'en', 'Contact', '', '', 'contact', 'Contact', 'Contact', 'Contact', 'Contact'),
(149, 5, 10, 'vn', 'Tin công nghệ', '<p>Tin c&ocirc;ng nghệ</p>', '<p>Tin c&ocirc;ng nghệ</p>', 'tin-cong-nghe', 'Tin công nghệ', 'Tin công nghệ', 'Tin công nghệ', 'Tin công nghệ'),
(150, 5, 10, 'en', '', '', '', '', '', '', '', ''),
(151, 5, 11, 'vn', 'Tin khuyến mãi', '<p>Tin khuyến m&atilde;i</p>', '<p>Tin khuyến m&atilde;i</p>', 'tin-khuyen-mai', 'Tin khuyến mãi', 'Tin khuyến mãi', 'Tin khuyến mãi', 'Tin khuyến mãi'),
(152, 5, 11, 'en', '', '', '', '', '', '', '', ''),
(153, 15, 13, 'vn', 'Tin công nghệ', '', '', 'tin-cong-nghe', 'Tin công nghệ', 'Tin công nghệ', 'Tin công nghệ', 'Tin công nghệ'),
(154, 15, 13, 'en', '', '', '', '', '', '', '', ''),
(155, 15, 14, 'vn', 'Tin khuyến mãi', '<p>Tin khuyến m&atilde;i</p>', '<p>Tin khuyến m&atilde;i</p>', 'tin-khuyen-mai', 'Tin khuyến mãi', 'Tin khuyến mãi', 'Tin khuyến mãi', 'Tin khuyến mãi'),
(156, 15, 14, 'en', '', '', '', '', '', '', '', ''),
(157, 5, 12, 'vn', 'Tin test', '<p>Tin test</p>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost/c08f8dbe-e017-4868-8eb6-6dd9405568db\" width=\"2048\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>&nbsp;</p>', '<p>Tin test</p>', 'tin-test', 'Tin test', 'Tin test', 'Tin test', 'Tin test'),
(158, 5, 12, 'en', '', '', '', '', '', '', '', ''),
(159, 15, 15, 'vn', 'Tin test', '<p>Tin test</p>', '<p>Tin test</p>', 'tin-test', 'Tin test', 'Tin test', 'Tin test', 'Tin test'),
(160, 15, 15, 'en', '', '', '', '', '', '', '', ''),
(161, 15, 16, 'vn', 'AMD', '', '', 'amd', 'AMD', 'AMD', 'AMD', 'AMD'),
(162, 15, 16, 'en', '', '', '', '', '', '', '', ''),
(163, 6, 16, 'vn', 'AMD', '<p>AMD</p>', '<p>AMD</p>', 'amd', 'AMD', 'AMD', 'AMD', 'AMD'),
(164, 6, 16, 'en', '', '', '', '', '', '', '', ''),
(165, 6, 17, 'vn', 'CPU AMD', '<p>CPU AMD</p>', '<p>CPU AMD</p>', 'cpu-amd', 'CPU AMD', 'CPU AMD', 'CPU AMD', 'CPU AMD'),
(166, 6, 17, 'en', '', '', '', '', '', '', '', ''),
(167, 6, 18, 'vn', 'Mainboard AMD', '<p>Mainboard AMD</p>', '<p>Mainboard AMD</p>', 'mainboard-amd', 'Mainboard AMD', 'Mainboard AMD', 'Mainboard AMD', 'Mainboard AMD'),
(168, 6, 18, 'en', '', '', '', '', '', '', '', ''),
(169, 15, 17, 'vn', 'CPU AMD', '', '', 'cpu-amd', 'CPU AMD', 'CPU AMD', 'CPU AMD', 'CPU AMD'),
(170, 15, 17, 'en', '', '', '', '', '', '', '', ''),
(171, 15, 18, 'vn', 'Intel', '<p>Intel</p>', '<p>Intel</p>', 'intel', 'Intel', 'Intel', 'Intel', 'Intel'),
(172, 15, 18, 'en', '', '', '', '', '', '', '', ''),
(173, 15, 19, 'vn', 'Mainboard AMD', '<p>Mainboard AMD</p>', '<p>Mainboard AMD</p>', 'mainboard-amd', 'Mainboard AMD', 'Mainboard AMD', 'Mainboard AMD', 'Mainboard AMD'),
(174, 15, 19, 'en', '', '', '', '', '', '', '', ''),
(175, 6, 19, 'vn', 'Intel', '<p>Intel</p>', '<p>Intel</p>', 'intel', 'Intel', 'Intel', 'Intel', 'Intel'),
(176, 6, 19, 'en', '', '', '', '', '', '', '', ''),
(177, 1, 11, 'vn', 'Intel Core i5 13600K / 3.5GHz Turbo 5.1GHz / 14 Nhân 20 Luồng / 24MB / LGA 1700', '<p>Intel Core i5 13600K / 3.5GHz Turbo 5.1GHz / 14 Nh&acirc;n 20 Luồng / 24MB / LGA 1700</p>', '<p>Intel Core i5 13600K / 3.5GHz Turbo 5.1GHz / 14 Nh&acirc;n 20 Luồng / 24MB / LGA 1700</p>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost/de89c1b0-f167-4777-9f98-703bb9dec3b0\" width=\"480\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>&nbsp;</p>', 'intel-core-i5-13600k-35ghz-turbo-51ghz-14-nhan-20-luong-24mb-lga-1700', 'Intel', 'Intel', 'Intel', 'Intel'),
(178, 1, 11, 'en', '', '', '', '', '', '', '', ''),
(179, 15, 20, 'vn', 'CPU Intel', '<p>CPU Intel</p>', '<p>CPU Intel</p>', 'cpu-intel', 'CPU Intel', 'CPU Intel', 'CPU Intel', 'CPU Intel'),
(180, 15, 20, 'en', '', '', '', '', '', '', '', ''),
(181, 6, 20, 'vn', 'CPU Intel', '<p>CPU Intel</p>', '<p>CPU Intel</p>', 'cpu-intel', 'CPU Intel', 'CPU Intel', 'CPU Intel', 'CPU Intel'),
(182, 6, 20, 'en', '', '', '', '', '', '', '', ''),
(183, 1, 12, 'vn', 'Ryzen 5 5500', '<p>Ryzen 5 5500</p>', '<p>Ryzen 5 5500</p>', 'ryzen-5-5500', 'Ryzen 5 5500', 'Ryzen 5 5500', 'Ryzen 5 5500', 'Ryzen 5 5500'),
(184, 1, 12, 'en', '', '', '', '', '', '', '', ''),
(185, 5, 13, 'vn', 'Tin giảm giá', '<p>Tin giảm gi&aacute;</p>', '<p>Tin giảm gi&aacute;</p>', 'tin-giam-gia', 'Tin giảm giá', 'Tin giảm giá', 'Tin giảm giá', 'Tin giảm giá'),
(186, 5, 13, 'en', '', '', '', '', '', '', '', ''),
(187, 15, 21, 'vn', 'Tin giảm giá', '<p>Tin giảm gi&aacute;</p>', '<p>Tin giảm gi&aacute;</p>', 'tin-giam-gia', 'Tin giảm giá', 'Tin giảm giá', 'Tin giảm giá', 'Tin giảm giá'),
(188, 15, 21, 'en', '', '', '', '', '', '', '', '');

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
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `category_id`, `name`, `desc`, `content`, `image`, `display_order`, `status`, `options`, `count_view`, `date_created`, `date_updated`, `seo_name`, `tags`, `meta_title`, `meta_desc`, `meta_keyword`) VALUES
(1, 0, 'test news 1', '<p>test news 1</p>', '<p>test news 1</p>', '352805347_272465948645658_9096286696674757798_n10.jpg', 1, 1, ',1,2', 0, 20230702, 20230702, 'test news 1', 'test news 1', 'test news 1', 'test news 1', 'test news 1'),
(2, 4, 'test news 2', '<p>test news 2</p>', '<p>test news 2</p>', '352805347_272465948645658_9096286696674757798_n25.jpg', 2, 1, ',3,4', 0, 20230702, 20230702, 'test news 2', 'test news 2', 'test news 2', 'test news 2', 'test news 2'),
(3, 5, 'test news 3', '<p>test news 3</p>', '<p>test news 3</p>', '352805347_272465948645658_9096286696674757798_n44.jpg', 3, 3, ',1,3', 0, 20230702, 20230702, 'test news 3', 'test news 3', 'test news 3', 'test news 3', 'test news 3'),
(4, 6, 'test news 4', '<p>test news 4</p>', '<p>test news 4</p>', '352805347_272465948645658_9096286696674757798_n62.jpg', 4, 1, ',1', 0, 20230702, 20230702, 'test news 4', 'test news 4', 'test news 4', 'test news 4', 'test news 4'),
(5, 13, 'abc 123', '<p>abc</p>', '<p>abc</p>', '352805347_272465948645658_9096286696674757798_n58.jpg', 5, 1, ',4', 1, 20230702, 20230702, 'abc-123', 'abc', 'abc', 'abc', 'abc'),
(7, 11, 'nvidia vn', '<p>nvidia vn</p>', '<p>nvidia vn</p>', '352805347_272465948645658_9096286696674757798_n9.jpg', 6, 1, ',', 1, 20230705, 20230705, 'nvidia-vn', 'nvidia vn', 'nvidia vn', 'nvidia vn', 'nvidia vn'),
(8, 10, 'test news', '<p>test news</p>', '<p>test news</p>', '352805347_272465948645658_9096286696674757798_n30.jpg', 7, 1, ',4', 2, 20230705, 20230705, 'test-news', 'test news', 'test news', 'test news', 'test news'),
(9, 10, 'node news', '<p>node news</p>', '<p>node news</p>', '352805347_272465948645658_9096286696674757798_n93.jpg', 8, 1, ',2', 0, 20230705, 20230705, 'node-news', 'node news', 'node news', 'node news', 'node news'),
(10, 0, 'new nodes', '<p>new nodes</p>', '<p>new nodes</p>', '9753-front13.jpg', 9, 1, ',', 0, 20230705, 20230705, 'new-nodes', 'new nodes', 'new nodes', 'new nodes', 'new nodes'),
(12, 10, 'news lang', '<p>news lang</p>', '<p>news lang</p>', 'vga-msi-rtx-4090-gaming-trio-24gb-2vccg41.jpg', 10, 1, ',2', 6, 20230705, 20230705, 'news-lang', 'news lang', 'news lang', 'news lang', 'news lang'),
(14, 10, 'basemodel', '<p>thfthfsth ftsrth rtyhrtsghrtgrtg rthrthtrhrtshtrh fghgdfjhgdhjdtgjtdj</p>', '<p>basemodel</p>', '9753-front94.jpg', 11, 1, ',', 18, 20230705, 20230705, 'basemodel', 'basemodel', 'basemodel', 'basemodel', 'basemodel'),
(15, 12, 'Meta chính thức ra mắt Threads, cạnh tranh với Twitter', '<p><em>Meta vừa mới ra mắt ứng dụng mạng x&atilde; hội Threads cạnh tranh với Twitter. Hiện tại, ứng dụng n&agrave;y chưa c&oacute; quảng c&aacute;o v&agrave; cho ph&eacute;p người d&ugrave;ng li&ecirc;n kết Instagram để giữ lại số lượng người theo d&otilde;i v&agrave; t&ecirc;n người d&ugrave;ng của họ.</em></p>', '<p>Đến thời điểm viết b&agrave;i n&agrave;y, Threads đ&atilde; leo l&ecirc;n vị tr&iacute; thứ 27 trong danh s&aacute;ch &ldquo;Mạng x&atilde; hội&rdquo; tr&ecirc;n App Store của Apple. Dự kiến với việc ng&agrave;y c&agrave;ng c&oacute; nhiều người d&ugrave;ng biết đến v&agrave; tải xuống ứng dụng n&agrave;y, lượt tải về sẽ tiếp tục tăng trong tương lai.</p>\r\n\r\n<h3><img alt=\"Threads\" height=\"1200\" sizes=\"(max-width: 1080px) 100vw, 1080px\" src=\"https://news.tandoanh.vn/wp-content/uploads/2023/07/Thread.jpg\" srcset=\"https://news.tandoanh.vn/wp-content/uploads/2023/07/Thread.jpg 1080w, https://news.tandoanh.vn/wp-content/uploads/2023/07/Thread-405x450.jpg 405w, https://news.tandoanh.vn/wp-content/uploads/2023/07/Thread-922x1024.jpg 922w, https://news.tandoanh.vn/wp-content/uploads/2023/07/Thread-768x853.jpg 768w, https://news.tandoanh.vn/wp-content/uploads/2023/07/Thread-150x167.jpg 150w, https://news.tandoanh.vn/wp-content/uploads/2023/07/Thread-300x333.jpg 300w, https://news.tandoanh.vn/wp-content/uploads/2023/07/Thread-696x773.jpg 696w, https://news.tandoanh.vn/wp-content/uploads/2023/07/Thread-1068x1187.jpg 1068w\" width=\"1080\" /></h3>\r\n\r\n<p>C&aacute;ch đ&acirc;y v&agrave;i ph&uacute;t Tỷ ph&uacute; Markzuckerbeg đ&atilde; chia sẻ tr&ecirc;n trang c&aacute; nh&acirc;n ch&iacute;nh thức giới thiệu Thread. Được biết th&igrave; mạng x&atilde; hội n&agrave;y cũng nguy&ecirc;n nh&acirc;n khiến hai vị tỷ ph&uacute; Zucker v&agrave; Musk hẹn đấu v&otilde; với nhau.</p>\r\n\r\n<p>Th&ocirc;ng tin từ App Store cho biết, ứng dụng n&agrave;y y&ecirc;u cầu&nbsp;<strong><a href=\"https://tandoanh.vn/\" rel=\"noopener\" target=\"_blank\">thiết bị</a></strong>&nbsp;chạy iOS 14.0 trở l&ecirc;n để sử dụng v&agrave; y&ecirc;u cầu độ tuổi &ldquo;12+&rdquo;. Hiện tại, ứng dụng n&agrave;y chưa c&oacute; bất kỳ t&ugrave;y chọn mua trong ứng dụng n&agrave;o.</p>\r\n\r\n<p><img alt=\"Threads logo\" height=\"450\" sizes=\"(max-width: 800px) 100vw, 800px\" src=\"https://news.tandoanh.vn/wp-content/uploads/2023/07/Theard-logo.jpg\" srcset=\"https://news.tandoanh.vn/wp-content/uploads/2023/07/Theard-logo.jpg 800w, https://news.tandoanh.vn/wp-content/uploads/2023/07/Theard-logo-450x253.jpg 450w, https://news.tandoanh.vn/wp-content/uploads/2023/07/Theard-logo-768x432.jpg 768w, https://news.tandoanh.vn/wp-content/uploads/2023/07/Theard-logo-150x84.jpg 150w, https://news.tandoanh.vn/wp-content/uploads/2023/07/Theard-logo-300x169.jpg 300w, https://news.tandoanh.vn/wp-content/uploads/2023/07/Theard-logo-696x392.jpg 696w\" width=\"800\" />​</p>\r\n\r\n<p>Threads được mi&ecirc;u tả l&agrave; &ldquo;ứng dụng tr&ograve; chuyện văn bản dựa tr&ecirc;n Instagram&rdquo;, người d&ugrave;ng c&oacute; thể sử dụng ứng dụng n&agrave;y để đăng b&agrave;i &ldquo;Threads&rdquo; v&agrave; những người d&ugrave;ng kh&aacute;c c&oacute; thể trả lời. Điều n&agrave;y r&otilde; r&agrave;ng cho thấy Thread l&agrave; một sản phẩm cạnh tranh với Twitter.</p>\r\n\r\n<p>Một điểm tương đồng với Twitter l&agrave; c&aacute;c Threads của người theo d&otilde;i sẽ xuất hiện tr&ecirc;n d&ograve;ng thời gian của người d&ugrave;ng.</p>\r\n\r\n<p>Threads hỗ trợ b&agrave;i đăng d&agrave;i tối đa 500 k&yacute; tự v&agrave; cũng hỗ trợ c&aacute;c nội dung phổ biến kh&aacute;c như h&igrave;nh ảnh, video v&agrave; li&ecirc;n kết.</p>\r\n\r\n<h4><img alt=\"Threads meta\" height=\"674\" sizes=\"(max-width: 1200px) 100vw, 1200px\" src=\"https://news.tandoanh.vn/wp-content/uploads/2023/07/Theard-meta.jpg\" srcset=\"https://news.tandoanh.vn/wp-content/uploads/2023/07/Theard-meta.jpg 1200w, https://news.tandoanh.vn/wp-content/uploads/2023/07/Theard-meta-450x253.jpg 450w, https://news.tandoanh.vn/wp-content/uploads/2023/07/Theard-meta-1024x575.jpg 1024w, https://news.tandoanh.vn/wp-content/uploads/2023/07/Theard-meta-768x431.jpg 768w, https://news.tandoanh.vn/wp-content/uploads/2023/07/Theard-meta-150x84.jpg 150w, https://news.tandoanh.vn/wp-content/uploads/2023/07/Theard-meta-300x169.jpg 300w, https://news.tandoanh.vn/wp-content/uploads/2023/07/Theard-meta-696x391.jpg 696w, https://news.tandoanh.vn/wp-content/uploads/2023/07/Theard-meta-1068x600.jpg 1068w\" width=\"1200\" /></h4>\r\n\r\n<p>Meta cho ph&eacute;p người d&ugrave;ng li&ecirc;n kết Threads với t&agrave;i khoản Instagram của họ . Điều n&agrave;y c&oacute; nghĩa l&agrave; th&ocirc;ng tin như t&ecirc;n người d&ugrave;ng Instagram v&agrave; c&aacute;c th&ocirc;ng tin kh&aacute;c c&oacute; thể được nhanh ch&oacute;ng chuyển sang Threads v&agrave; người d&ugrave;ng cũng c&oacute; thể chọn theo d&otilde;i những người d&ugrave;ng m&agrave; họ đ&atilde; theo d&otilde;i tr&ecirc;n Instagram.</p>\r\n\r\n<p>Với số lượng người d&ugrave;ng khổng lồ của Instagram v&agrave; kh&ocirc;ng bị giới hạn giống như Bluesky hay kh&oacute; sử dụng như Mastodon, dự kiến Threads sẽ l&agrave; mối đe dọa lớn đối với Twitter.</p>\r\n\r\n<p>Ngo&agrave;i ra, một số người cũng lo ngại về việc ứng dụng n&agrave;y thu thập dữ liệu người d&ugrave;ng. Tuy nhi&ecirc;n, theo lời&nbsp;<strong><a href=\"https://news.tandoanh.vn/tag/meta/\">Meta</a></strong>, hiện tại Threads kh&ocirc;ng sử dụng bất kỳ dữ liệu n&agrave;o để theo d&otilde;i người d&ugrave;ng tr&ecirc;n c&aacute;c trang web v&agrave; ứng dụng thuộc sở hữu của c&aacute;c c&ocirc;ng ty kh&aacute;c, điều n&agrave;y l&agrave;m cho Threads trở n&ecirc;n ri&ecirc;ng tư hơn so với Twitter, Facebook v&agrave; Instagram.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost/83b85c6e-5cef-4653-a58e-d959bc548fc2\" width=\"700\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost/ab95ee81-bc78-46c3-9fd6-ff1895977342\" width=\"700\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>&nbsp;</p>', 'image_2023-07-10_02065668463.png', 12, 1, ',1', 13, 20230706, 20230706, 'meta-chinh-thuc-ra-mat-threads-canh-tranh-voi-twitter', 'meta', 'meta', 'meta', 'meta');

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
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_categories`
--

INSERT INTO `news_categories` (`id`, `parent_id`, `root_id`, `name`, `desc`, `content`, `level`, `display_order`, `image`, `representative`, `status`, `display_menu`, `date_created`, `seo_name`, `meta_title`, `meta_desc`, `meta_keyword`) VALUES
(4, 0, ' , ', 'news 1', '<p>news 1</p>', '<p>news 1</p>', 1, 1, '352805347_272465948645658_9096286696674757798_n48.jpg', 0, 3, 0, 20230702, 'news 1', 'news 1', 'news 1', 'news 1'),
(5, 4, ',4,', 'news 2', '<p>news 2</p>', '<p>news 2</p>', 2, 2, '352805347_272465948645658_9096286696674757798_n2.jpg', 0, 3, 0, 20230702, 'news 2', 'news 2', 'news 2', 'news 2'),
(6, 5, ',4,5,', 'news 3', '<p>news 3</p>', '<p>news 3</p>', 3, 3, '352805347_272465948645658_9096286696674757798_n76.jpg', 0, 3, 0, 20230702, 'news 3', 'news 3', 'news 3', 'news 3'),
(8, 11, ',11,', 'test dm 123', '<p>test dm</p>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost/40d338bc-dbbf-48a4-8b4c-8b5110555075\" width=\"700\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>&nbsp;</p>', '<p>test dm</p>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost/7378ff1a-4bdb-4ddc-93a1-0160f1975dea\" width=\"922\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>&nbsp;</p>', 2, 4, '352805347_272465948645658_9096286696674757798_n34.jpg', 0, 3, 0, 20230706, 'test-dm-123', 'test dm', 'test dm', 'test dm'),
(10, 0, ' , ', 'Tin công nghệ', '<p>Tin c&ocirc;ng nghệ</p>', '<p>Tin c&ocirc;ng nghệ</p>', 1, 5, 'eng15.png', 0, 1, 1, 20230707, 'tin-cong-nghe', 'Tin công nghệ', 'Tin công nghệ', 'Tin công nghệ'),
(11, 0, ' , ', 'Tin khuyến mãi', '<p>Tin khuyến m&atilde;i</p>', '<p>Tin khuyến m&atilde;i</p>', 1, 6, 'bookshelf79.png', 0, 1, 1, 20230707, 'tin-khuyen-mai', 'Tin khuyến mãi', 'Tin khuyến mãi', 'Tin khuyến mãi'),
(12, 10, ',10,', 'Tin test', '<p>Tin test</p>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost/c08f8dbe-e017-4868-8eb6-6dd9405568db\" width=\"2048\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>&nbsp;</p>', '<p>Tin test</p>', 2, 7, '352805347_272465948645658_9096286696674757798_n63.jpg', 0, 1, 1, 20230708, 'tin-test', 'Tin test', 'Tin test', 'Tin test'),
(13, 11, ',11,', 'Tin giảm giá', '<p>Tin giảm gi&aacute;</p>', '<p>Tin giảm gi&aacute;</p>', 2, 8, 'Theard-meta46.jpg', 0, 1, 1, 20230709, 'tin-giam-gia', 'Tin giảm giá', 'Tin giảm giá', 'Tin giảm giá');

-- --------------------------------------------------------

--
-- Table structure for table `nodes`
--

DROP TABLE IF EXISTS `nodes`;
CREATE TABLE IF NOT EXISTS `nodes` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` smallint NOT NULL,
  `object_id` int NOT NULL,
  `seo_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` smallint NOT NULL,
  `is_sitemap` smallint NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nodes`
--

INSERT INTO `nodes` (`id`, `type`, `object_id`, `seo_name`, `status`, `is_sitemap`) VALUES
(1, 15, 4, 'menu-abc', 1, 1),
(2, 2, 8, 'test-news', 1, 1),
(3, 2, 9, 'node-news', 1, 1),
(4, 2, 10, 'new-nodes', 1, 1),
(5, 2, 11, 'news-lang', 1, 1),
(6, 2, 12, 'news-lang', 1, 1),
(7, 2, 14, 'basemodel', 1, 1),
(8, 2, 15, 'meta-chinh-thuc-ra-mat-threads-canh-tranh-voi-twitter', 1, 1),
(10, 5, 8, 'test-dm-123', 1, 1),
(18, 15, 5, 'menu-vn', 1, 1),
(19, 15, 6, 'trang-chu', 1, 1),
(20, 15, 7, 'gioi-thieu', 1, 1),
(21, 4, 8, 'test-fgjfgjhfgjh', 1, 1),
(23, 4, 9, 'bn', 1, 1),
(26, 15, 10, 'danh-muc-san-pham', 1, 1),
(27, 15, 11, 'danh-muc-tin-tuc', 1, 1),
(28, 15, 12, 'lien-he', 1, 1),
(29, 5, 10, 'tin-cong-nghe', 1, 1),
(30, 5, 11, 'tin-khuyen-mai', 1, 1),
(31, 15, 13, 'tin-cong-nghe', 1, 1),
(32, 15, 14, 'tin-khuyen-mai', 1, 1),
(33, 5, 12, 'tin-test', 1, 1),
(34, 15, 15, 'tin-test', 1, 1),
(35, 15, 16, 'amd', 1, 1),
(36, 6, 16, 'amd', 1, 1),
(37, 6, 17, 'cpu-amd', 1, 1),
(38, 6, 18, 'mainboard-amd', 1, 1),
(39, 15, 17, 'cpu-amd', 1, 1),
(40, 15, 18, 'intel', 1, 1),
(41, 15, 19, 'mainboard-amd', 1, 1),
(42, 6, 19, 'intel', 1, 1),
(43, 1, 11, 'intel-core-i5-13600k-35ghz-turbo-51ghz-14-nhan-20-luong-24mb-lga-1700', 1, 1),
(44, 15, 20, 'cpu-intel', 1, 1),
(45, 6, 20, 'cpu-intel', 1, 1),
(46, 1, 12, 'ryzen-5-5500', 1, 1),
(47, 5, 13, 'tin-giam-gia', 1, 1),
(48, 15, 21, 'tin-giam-gia', 1, 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `code`, `name`, `desc`, `content`, `image`, `price`, `price_sale`, `count_view`, `display_order`, `options`, `status`, `display_menu`, `date_created`, `seo_name`, `tags`, `meta_title`, `meta_desc`, `meta_keyword`) VALUES
(4, 'ipm', 'ipm', '<p>ipm</p>', '<p>ipm</p>', 'msi-4090-feature67.jpg', 2000, 3000, 0, 4, ',3,5', 3, 0, 20230630, 'ipm', 'ipm', 'ipm', 'ipm', 'ipm'),
(5, 'SP2', 'SP2 hehe', '<p>SP2</p>', '<p>SP2</p>', 'geforce-rtx-3080-ti-product-gallery-full-screen-3840-3_7b0335b3-f6b3-45d5-89f2-206d2a4e190e-prv88.jpg', 2000, 4000, 0, 5, ',3', 3, 0, 20230630, 'SP2', 'SP2', 'SP2', 'SP2', 'SP2'),
(6, 'msib550m', 'MSI B550m Mortar', '<p>MSI B550m Mortar</p>', '<p>MSI B550m Mortar</p>', '33642_product_5_20200520154829_5ec4e0cdbea5210.png', 1000, 2000, 1, 6, ',1,2,3,4', 1, 1, 20230630, 'msi-b550m-mortar', 'MSI B550m Mortar', 'MSI B550m Mortar', 'MSI B550m Mortar', 'MSI B550m Mortar'),
(7, '5600x', 'Ryzen 5 5600x', '<p>Ryzen 5 5600x</p>', '<p>Ryzen 5 5600x</p>', 'o1Sx0GmTnr60.png', 2000, 3000, 5, 7, ',1', 1, 0, 20230630, 'ryzen-5-5600x', 'Ryzen 5 5600x', 'Ryzen 5 5600x', 'Ryzen 5 5600x', 'Ryzen 5 5600x'),
(11, '13600k', 'Intel Core i5 13600K / 3.5GHz Turbo 5.1GHz / 14 Nhân 20 Luồng / 24MB / LGA 1700', '<p>Intel Core i5 13600K / 3.5GHz Turbo 5.1GHz / 14 Nh&acirc;n 20 Luồng / 24MB / LGA 1700</p>', '<p>Intel Core i5 13600K / 3.5GHz Turbo 5.1GHz / 14 Nh&acirc;n 20 Luồng / 24MB / LGA 1700</p>\n\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost/de89c1b0-f167-4777-9f98-703bb9dec3b0\" width=\"480\" />\n<figcaption></figcaption>\n</figure>\n\n<p>&nbsp;</p>', 'gearvn-intel-core-i5-13600k-3_610a0170cf6844caa7f4b8add912bc0e28.webp', 2000, 5000, 2, 8, ',2', 1, 1, 20230709, 'intel-core-i5-13600k-35ghz-turbo-51ghz-14-nhan-20-luong-24mb-lga-1700', 'Intel', 'Intel', 'Intel', 'Intel'),
(12, 'R5500', 'Ryzen 5 5500', '<p>Ryzen 5 5500</p>', '<p>Ryzen 5 5500</p>', 'o1Sx0GmTnr69.png', 2000, 5000, 6, 9, ',4', 1, 1, 20230709, 'ryzen-5-5500', 'Ryzen 5 5500', 'Ryzen 5 5500', 'Ryzen 5 5500', 'Ryzen 5 5500');

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
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `parent_id`, `root_id`, `name`, `desc`, `content`, `level`, `display_order`, `image`, `representative`, `status`, `display_menu`, `date_created`, `seo_name`, `meta_title`, `meta_desc`, `meta_keyword`) VALUES
(5, 0, ' ,  , ', 'PSU', '<p>PSU</p>', '<p>PSU</p>', 1, 4, 'vga-msi-rtx-4090-gaming-trio-24gb-2vccg10.jpg', 0, 3, 0, 20230629, 'PSU', 'PSU', 'PSU', 'PSU'),
(7, 6, ' , {\"id\":6}', 'HDD', '<p>HDD</p>', '<p>HDD</p>', 2, 6, 'vga-msi-rtx-4090-gaming-trio-24gb-2vccg75.jpg', 0, 3, 0, 20230629, 'HDD', 'HDD', 'HDD', 'HDD'),
(8, 7, ' ,  , {\"id\":7}', 'cooler', '<p>cooler</p>', '<p>cooler</p>', 3, 7, 'kv-pd30.png', 0, 3, 0, 20230629, 'cooler', 'cooler', 'cooler', 'cooler'),
(9, 7, ' , 6 , 7', 'gpu', '<p>gpu</p>', '<p>gpu</p>', 3, 8, 'vga-msi-rtx-4090-gaming-trio-24gb-2vccg61.jpg', 0, 3, 0, 20230629, 'gpu', 'gpu', 'gpu', 'gpu'),
(10, 5, ' , 5', 'asus', '<p>asus</p>', '<p>asus</p>', 2, 9, 'kv-pd41.png', 0, 3, 0, 20230629, 'asus', 'asus', 'asus', 'asus'),
(11, 0, ' , ', 'msi', '<p>msi</p>', '<p>msi</p>', 1, 10, '9753-front28.jpg', 0, 3, 0, 20230629, 'msi', 'msi', 'msi', 'msi'),
(12, 11, ',11,', 'monitor xyz', '<p>monitor</p>', '<p>monitor</p>', 2, 11, 'vga-msi-rtx-4090-gaming-trio-24gb-2vccg38.jpg', 0, 3, 0, 20230629, 'monitor-xyz', 'monitor', 'monitor', 'monitor'),
(13, 11, ',11,', 'LG', '<p>LG</p>', '<p>LG</p>', 2, 12, 'GeForce_RTX_390.jpg', 0, 3, 0, 20230629, 'LG', 'LG', 'LG', 'LG'),
(14, 0, ' , ', 'test danh mục', '<p>test danh mục</p>', '<p>test danh mục</p>', 1, 13, 'msi-4090-feature65.jpg', 0, 3, 0, 20230630, 'test-danh-muc', 'test danh mục', 'test danh mục', 'test danh mục'),
(16, 0, ' , ', 'AMD', '<p>AMD</p>', '<p>AMD</p>', 1, 14, 'o1Sx0GmTnr55.png', 0, 1, 1, 20230708, 'amd', 'AMD', 'AMD', 'AMD'),
(17, 16, ',16,', 'CPU AMD', '<p>CPU AMD</p>', '<p>CPU AMD</p>', 2, 15, 'o1Sx0GmTnr91.png', 0, 1, 1, 20230708, 'cpu-amd', 'CPU AMD', 'CPU AMD', 'CPU AMD'),
(18, 16, ',16,', 'Mainboard AMD', '<p>Mainboard AMD</p>', '<p>Mainboard AMD</p>', 2, 16, '33642_product_5_20200520154829_5ec4e0cdbea5241.png', 0, 1, 1, 20230708, 'mainboard-amd', 'Mainboard AMD', 'Mainboard AMD', 'Mainboard AMD'),
(19, 0, ' , ', 'Intel', '<p>Intel</p>', '<p>Intel</p>', 1, 17, 'gearvn-intel-core-i5-13600k-3_610a0170cf6844caa7f4b8add912bc0e23.webp', 0, 1, 1, 20230709, 'intel', 'Intel', 'Intel', 'Intel'),
(20, 19, ',19,', 'CPU Intel', '<p>CPU Intel</p>', '<p>CPU Intel</p>', 2, 18, 'gearvn-intel-core-i5-13600k-3_610a0170cf6844caa7f4b8add912bc0e25.webp', 1, 1, 1, 20230709, 'cpu-intel', 'CPU Intel', 'CPU Intel', 'CPU Intel');

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
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_category_products`
--

INSERT INTO `product_category_products` (`id`, `category_id`, `product_id`) VALUES
(18, 6, 4),
(16, 8, 5),
(15, 10, 5),
(14, 11, 5),
(38, 18, 6),
(37, 16, 6),
(17, 9, 5),
(19, 2, 4),
(20, 9, 4),
(36, 17, 7),
(35, 16, 7),
(45, 20, 11),
(44, 19, 11),
(46, 16, 12),
(47, 17, 12);

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
