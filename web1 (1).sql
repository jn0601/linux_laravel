-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 28, 2023 at 03:53 AM
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
(1, 'banner 1', 'banner 1', 'banner 1', 0),
(2, 'banner 2', 'banner 2', 'banner 2', 1),
(4, 'banner 3', 'banner 3', 'banner 3', 2),
(5, 'banner 4', 'banner 4', 'banner 4', 3),
(6, 'banner 5', 'banner 5', 'banner 5', 4),
(7, 'banner 6', 'banner 6', 'banner 6', 5),
(8, 'banner 6', '<p>banner 6</p>\r\n\r\n<p><img alt=\"Có thể là hình ảnh về 1 người và văn bản cho biết \'CÔNG BỘ AN � CÔNG AN 1956 HÀ NỘIFC NỘI FC NOI\'\" src=\"https://scontent.fsgn2-3.fna.fbcdn.net/v/t39.30808-6/355488499_1515151425683988_2630204324865430062_n.jpg?_nc_cat=107&amp;ccb=1-7&amp;_nc_sid=5cd70e&amp;_nc_ohc=Lliz5_3NQDMAX_-jdhV&amp;_nc_ht=scontent.fsgn2-3.fna&amp;oh=00_AfD8fJ6fi-ZBURa97l5qm41uu-NaABkUd4OmAZN_NESpEQ&amp;oe=64999320\" /></p>', '<p>banner 6</p>\r\n\r\n<p><img alt=\"Có thể là hình ảnh về 1 người và văn bản cho biết \'CÔNG BỘ AN � CÔNG AN 1956 HÀ NỘIFC NỘI FC NOI\'\" src=\"https://scontent.fsgn2-3.fna.fbcdn.net/v/t39.30808-6/355488499_1515151425683988_2630204324865430062_n.jpg?_nc_cat=107&amp;ccb=1-7&amp;_nc_sid=5cd70e&amp;_nc_ohc=Lliz5_3NQDMAX_-jdhV&amp;_nc_ht=scontent.fsgn2-3.fna&amp;oh=00_AfD8fJ6fi-ZBURa97l5qm41uu-NaABkUd4OmAZN_NESpEQ&amp;oe=64999320\" /></p>', 6),
(10, 'banner language', '<p>banner language</p>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost/051bbb99-e92b-4f85-94e8-652c679b5858\" width=\"700\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>&nbsp;</p>', '<p>banner language</p>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost/b1e2179e-c7a9-4072-9b28-042d51d61f91\" width=\"2048\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>&nbsp;</p>', 7),
(11, 'banner tv', '<p>banner tv</p>', '<p>banner tv</p>', 8),
(12, 'banner tv 2', '<p>banner tv 2</p>', '<p>banner tv 2</p>', 9),
(13, 'banner tv 3', '<p>banner tv 3</p>', '<p>banner tv 3</p>', 10),
(14, 'banner tv4', '<p>banner tv4</p>', '<p>banner tv4</p>', 11),
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2023_06_22_081321_create_tbl_banner_categories', 1),
(4, '2023_06_22_083214_create_tbl_multi_languages', 2),
(5, '2023_06_27_063011_create_tbl_banner', 3);

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
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `multi_languages`
--

INSERT INTO `multi_languages` (`id`, `type`, `object_id`, `lang_code`, `name`, `desc`, `content`, `seo_name`, `tags`, `meta_title`, `meta_desc`, `meta_keyword`) VALUES
(1, 4, 10, 'vn', 'banner language', '<p>banner language</p>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost/051bbb99-e92b-4f85-94e8-652c679b5858\" width=\"700\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>&nbsp;</p>', '<p>banner language</p>\r\n\r\n<figure class=\"easyimage easyimage-full\"><img alt=\"\" src=\"blob:http://localhost/b1e2179e-c7a9-4072-9b28-042d51d61f91\" width=\"2048\" />\r\n<figcaption></figcaption>\r\n</figure>\r\n\r\n<p>&nbsp;</p>', 'banner language', 'banner language', 'banner language', 'banner language', 'banner language'),
(2, 4, 11, 'vn', 'banner tv', '<p>banner tv</p>', '<p>banner tv</p>', 'banner tv', 'banner tv', 'banner tv', 'banner tv', 'banner tv'),
(3, 4, 12, 'vn', 'banner tv 2', '<p>banner tv 2</p>', '<p>banner tv 2</p>', 'banner tv 2', 'banner tv 2', 'banner tv 2', 'banner tv 2', 'banner tv 2'),
(4, 4, 13, 'vn', 'banner tv 3', '<p>banner tv 3</p>', '<p>banner tv 3</p>', 'banner tv 3', 'banner tv 3', 'banner tv 3', 'banner tv 3', 'banner tv 3'),
(5, 4, 14, 'vn', 'banner tv4', '<p>banner tv4</p>', '<p>banner tv4</p>', 'banner tv4', 'banner tv4', 'banner tv4', 'banner tv4', 'banner tv4'),
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
(37, 4, 1, 'vn', 'test banner', '<p>test banner</p>', '<p>test banner</p>', 'test banner', 'test banner', 'test banner', 'test banner', 'test banner'),
(38, 4, 1, 'en', 'test banner en', '<p>test banner en</p>', '<p>test banner en</p>', 'test banner en', 'test banner en', 'test banner en', 'test banner en', 'test banner en'),
(39, 4, 2, 'vn', 'gpu', '<p>gpu</p>', '<p>gpu</p>', 'gpu', 'gpu', 'gpu', 'gpu', 'gpu'),
(40, 4, 2, 'en', '', '', '', '', '', '', '', ''),
(41, 4, 3, 'vn', 'gpu 2', '<p>gpu 2</p>', '<p>gpu 2</p>', 'gpu 2', 'gpu 2', 'gpu 2', 'gpu 2', 'gpu 2'),
(42, 4, 3, 'en', '', '', '', '', '', '', '', ''),
(43, 4, 4, 'vn', 'vga', '<p>vga</p>', '<p>vga</p>', 'vga', 'vga', 'vga', 'vga', 'vga'),
(44, 4, 4, 'en', 'vga en', '<p>vga en</p>', '<p>vga en</p>', 'vga en', 'vga en', 'vga en', 'vga en', 'vga en');

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
