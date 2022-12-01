-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th9 26, 2022 lúc 03:04 PM
-- Phiên bản máy phục vụ: 5.7.36
-- Phiên bản PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ecomerce-thoitrangl9`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banners`
--

DROP TABLE IF EXISTS `banners`;
CREATE TABLE IF NOT EXISTS `banners` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `banners_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `banners`
--

INSERT INTO `banners` (`id`, `title`, `slug`, `photo`, `description`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Ưu đãi Cực Lớn', 'uu-dai-cuc-lon', '/storage/photos/1/Banners/shop-ban-thoi-trang-nam-cong-so.jpg', '<p>Ưu đãi cực lớn trong mùa hè</p>', 'active', '2022-08-21 21:32:25', '2022-08-22 06:05:13'),
(6, 'Thoải Mái Dễ Dàng Hoạt Động Và Phong Cách', 'phong-cach-thoi-trang-moi', '/storage/photos/1/Banners/resfaf28e39c61a4fe3a85e42869c23174cfr.jpg', '<p>Lorem shhhhhhhhhhhhhhhhhhhhhhhhhhhhh</p>', 'active', '2022-08-22 06:25:07', '2022-09-03 23:26:55'),
(5, 'Giảm Mạnh Trong Tháng 8', 'giam-manh-trong-thang-8', '/storage/photos/1/Banners/banner-landing-mn-min-min-01.jpg', '<p>Lorem usisishshsh</p>', 'active', '2022-08-22 06:06:29', '2022-08-22 06:06:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

DROP TABLE IF EXISTS `brand`;
CREATE TABLE IF NOT EXISTS `brand` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `brand_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`id`, `title`, `slug`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Somthing', 'a', '/storage/photos/1/Brands/2.png', 'active', NULL, '2022-08-15 20:15:41'),
(2, 'EUSSISU', 'eussisu', '/storage/photos/1/Brands/4.png', 'active', '2022-08-15 20:15:58', '2022-08-15 20:15:58'),
(3, 'LAOIHSHS', 'laoihshs', '/storage/photos/1/Brands/9.png', 'active', '2022-08-15 20:16:11', '2022-08-15 20:16:11'),
(4, 'HSGSGGS', 'hsgsggs', '/storage/photos/1/Brands/4.png', 'active', '2022-08-15 20:16:22', '2022-08-15 20:16:22'),
(5, 'LUSJSIUS', 'lusjsius', '/storage/photos/1/Brands/8.png', 'active', '2022-08-18 18:14:51', '2022-08-18 18:14:51'),
(6, 'YODY', 'yody', '/storage/photos/1/Brands/4.png', 'active', '2022-08-20 06:17:11', '2022-08-20 06:17:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

DROP TABLE IF EXISTS `carts`;
CREATE TABLE IF NOT EXISTS `carts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` decimal(18,2) NOT NULL,
  `status` enum('new','progress','delivered','cancel') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `quantity` int(11) NOT NULL,
  `amount` decimal(18,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `carts_product_id_foreign` (`product_id`),
  KEY `carts_user_id_foreign` (`user_id`),
  KEY `carts_order_id_foreign` (`order_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `order_id`, `user_id`, `price`, `status`, `quantity`, `amount`, `created_at`, `updated_at`) VALUES
(23, 16, 32, 1, '630000.00', 'new', 2, '1260000.00', '2022-09-13 20:00:03', '2022-09-13 20:02:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_parent` tinyint(1) NOT NULL DEFAULT '1',
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `added_by` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`),
  KEY `categories_parent_id_foreign` (`parent_id`),
  KEY `categories_added_by_foreign` (`added_by`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `summary`, `photo`, `is_parent`, `parent_id`, `added_by`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Áo Thun', 'ao-thun', '<p>aaaaaaaaaaaaaaaaaa</p>', '/storage/photos/1/Categorys/dtgd.jpg', 1, NULL, NULL, 'active', '2022-09-03 23:00:14', '2022-09-03 23:00:14'),
(6, 'Áo Sơ Mi', 'ao-so-mi', '<p>aaaaaaaaaaaaaaa</p>', '/storage/photos/1/Categorys/goods_64_444642.jpg', 1, NULL, NULL, 'active', '2022-09-03 23:01:12', '2022-09-03 23:01:12'),
(7, 'Áo Khoác', 'ao-khoac', '<p>aaaaaaa</p>', '/storage/photos/1/Categorys/vngoods_01_450198.jpg', 1, NULL, NULL, 'active', '2022-09-03 23:02:13', '2022-09-03 23:02:13'),
(8, 'Quần Jeans', 'quan-jeans', '<p>aaaaa</p>', '/storage/photos/1/Categorys/vngoods_66_439218.jpg', 1, NULL, NULL, 'active', '2022-09-03 23:03:23', '2022-09-03 23:03:23'),
(9, 'Quần Short', 'quan-short', '<p>aaaaaaaa</p>', '/storage/photos/1/Categorys/sort.jpg', 1, NULL, NULL, 'active', '2022-09-03 23:05:34', '2022-09-03 23:05:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `coupons`
--

DROP TABLE IF EXISTS `coupons`;
CREATE TABLE IF NOT EXISTS `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('fixed','percent') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'fixed',
  `value` decimal(20,2) NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `coupons_code_unique` (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `messages`
--

INSERT INTO `messages` (`id`, `name`, `subject`, `email`, `photo`, `phone`, `message`, `read_at`, `created_at`, `updated_at`) VALUES
(2, 'Nguyễn Quốc Khánh', 'Nguyễn Khánh TV', 'admin@gmail.com', NULL, '1234578902', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', NULL, '2022-08-19 17:29:43', '2022-08-19 17:29:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2020_07_10_025334_create_banners_table', 1),
(6, '2020_07_10_112147_create_categories_table', 1),
(7, '2020_07_11_063857_create_products_table', 1),
(8, '2020_07_12_073132_create_post_categories_table', 1),
(9, '2020_07_12_073701_create_post_tags_table', 1),
(10, '2020_07_12_083638_create_posts_table', 1),
(11, '2020_07_13_151329_create_messages_table', 1),
(12, '2020_07_14_023748_create_shippings_table', 1),
(13, '2020_07_15_102626_create_carts_table', 1),
(14, '2020_07_16_041623_create_notifications_table', 1),
(15, '2020_07_16_053240_create_coupons_table', 1),
(16, '2020_07_23_143757_create_wishlists_table', 1),
(17, '2020_07_24_074930_create_product_reviews_table', 1),
(18, '2020_07_24_131727_create_post_comments_table', 1),
(19, '2020_08_01_143408_create_settings_table', 1),
(20, '2022_08_14_091405_create_table_orders', 1),
(21, '2022_08_14_091445_create_table_orders_details', 1),
(22, '2022_08_14_131559_create_table_suppliers', 1),
(23, '2022_08_15_124304_create_table_brand', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('7f57115a-5526-4bb5-bcc4-a2ca87881ece', 'App\\Notifications\\StatusNotification', 'App\\Models\\User', 1, '{\"title\":\"New Product Rating!\",\"actionURL\":\"http:\\/\\/127.0.0.1:8000\\/product-detail\\/quan-nam-swestw-dang-om-body-goi-cam-sexy-ke-caro-phong-cach-han-quoc\",\"fas\":\"fa-star\"}', NULL, '2022-08-19 07:25:36', '2022-08-19 07:25:36'),
('bd373ff3-6771-4753-9aed-0f3cdf9fd070', 'App\\Notifications\\StatusNotification', 'App\\Models\\User', 1, '{\"title\":\"New Product Rating!\",\"actionURL\":\"http:\\/\\/127.0.0.1:8000\\/product-detail\\/quan-nam-swestw-dang-om-body-goi-cam-sexy-ke-caro-phong-cach-han-quoc\",\"fas\":\"fa-star\"}', NULL, '2022-08-19 07:28:45', '2022-08-19 07:28:45'),
('a4e04246-0aa0-4e64-9b11-77aa53aec5d5', 'App\\Notifications\\StatusNotification', 'App\\Models\\User', 1, '{\"title\":\"New Comment created\",\"actionURL\":\"http:\\/\\/127.0.0.1:8000\\/blog-detail\\/cac-mat-hang-dang-giam-gia-manh\",\"fas\":\"fas fa-comment\"}', NULL, '2022-08-19 21:22:26', '2022-08-19 21:22:26'),
('35b0fd31-7647-4676-9663-f8f6114c807a', 'App\\Notifications\\StatusNotification', 'App\\Models\\User', 1, '{\"title\":\"New Comment created\",\"actionURL\":\"http:\\/\\/127.0.0.1:8000\\/blog-detail\\/cac-mat-hang-dang-giam-gia-manh\",\"fas\":\"fas fa-comment\"}', NULL, '2022-08-19 21:26:44', '2022-08-19 21:26:44'),
('f16b00d8-2baf-43e3-89b0-b10493ebc1d0', 'App\\Notifications\\StatusNotification', 'App\\Models\\User', 1, '{\"title\":\"New Product Rating!\",\"actionURL\":\"http:\\/\\/127.0.0.1:8000\\/product-detail\\/ao-thun-nam-polo-thiet-ke-vai-ca-sau-cotton-cao-cap-ngan-tay\",\"fas\":\"fa-star\"}', NULL, '2022-08-21 01:23:41', '2022-08-21 01:23:41'),
('2e99861b-4ce0-4fb4-8ed8-51dad9cb798b', 'App\\Notifications\\StatusNotification', 'App\\Models\\User', 1, '{\"title\":\"New Product Rating!\",\"actionURL\":\"http:\\/\\/127.0.0.1:8000\\/product-detail\\/a\",\"fas\":\"fa-star\"}', NULL, '2022-08-21 21:41:44', '2022-08-21 21:41:44'),
('512e9a38-4358-411e-b425-9bc0c31693e5', 'App\\Notifications\\StatusNotification', 'App\\Models\\User', 1, '{\"title\":\"New Product Rating!\",\"actionURL\":\"http:\\/\\/127.0.0.1:8000\\/product-detail\\/ao-khoac-du-day-theu-logo-fs-cao-cap-co-tui-trong-nhieu-mau-akdu002\",\"fas\":\"fa-star\"}', NULL, '2022-09-03 07:51:22', '2022-09-03 07:51:22'),
('839e5b1f-643a-4636-bfc5-c3865d92c725', 'App\\Notifications\\StatusNotification', 'App\\Models\\User', 1, '{\"title\":\"New Product Rating!\",\"actionURL\":\"http:\\/\\/127.0.0.1:8000\\/product-detail\\/airism-cotton-ao-thun-co-tron-dang-rong\",\"fas\":\"fa-star\"}', NULL, '2022-09-13 19:59:27', '2022-09-13 19:59:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date_founded` date NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` decimal(18,2) NOT NULL,
  `id_discount` bigint(20) UNSIGNED DEFAULT NULL,
  `payment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`),
  KEY `orders_id_discount_foreign` (`id_discount`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `date_founded`, `address`, `phone`, `total`, `id_discount`, `payment`, `status`, `created_at`, `updated_at`) VALUES
(31, 2, '2022-08-22', 'Phú Thanh,Tân Phú,Đồng Nai', '1234578902', '233750.00', NULL, '1', 'Đang chờ xác nhận', '2022-08-22 06:55:59', '2022-08-22 06:55:59'),
(30, 1, '2022-08-22', 'Phú Thanh,Tân Phú,Đồng Nai', '0343754517', '99000.00', NULL, '1', 'Đang chờ xác nhận', '2022-08-22 06:47:11', '2022-08-22 06:47:11'),
(32, 1, '2022-09-14', 'Điện Biên Phủ HCM', '1234578902', '1260000.00', NULL, '1', 'process', '2022-09-13 20:02:26', '2022-09-13 20:02:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders_detail`
--

DROP TABLE IF EXISTS `orders_detail`;
CREATE TABLE IF NOT EXISTS `orders_detail` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `amount` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_detail_order_id_foreign` (`order_id`),
  KEY `orders_detail_product_id_foreign` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders_detail`
--

INSERT INTO `orders_detail` (`id`, `order_id`, `product_id`, `amount`, `price`, `created_at`, `updated_at`) VALUES
(33, 32, 23, 2, '630000.00', '2022-09-13 20:02:26', '2022-09-13 20:02:26'),
(32, 31, 20, 1, '233750.00', '2022-08-22 06:55:59', '2022-08-22 06:55:59'),
(31, 30, 18, 1, '125100.00', '2022-08-22 06:47:11', '2022-08-22 06:47:11'),
(30, 30, 19, 1, '99000.00', '2022-08-22 06:47:11', '2022-08-22 06:47:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `quote` text COLLATE utf8mb4_unicode_ci,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_cat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `post_tag_id` bigint(20) UNSIGNED DEFAULT NULL,
  `added_by` bigint(20) UNSIGNED DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `posts_slug_unique` (`slug`),
  KEY `posts_post_cat_id_foreign` (`post_cat_id`),
  KEY `posts_post_tag_id_foreign` (`post_tag_id`),
  KEY `posts_added_by_foreign` (`added_by`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `summary`, `description`, `quote`, `photo`, `tags`, `post_cat_id`, `post_tag_id`, `added_by`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Các mặt hàng đang giảm giá mạnh', 'cac-mat-hang-dang-giam-gia-manh', '<p><span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif; font-size: 14px;\">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</span><br></p>', '<p><span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif; font-size: 14px;\">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</span><br></p>', '<p><span style=\"color: rgb(77, 81, 86); font-family: arial, sans-serif; font-size: 14px;\">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.</span><br></p>', '/storage/photos/1/Blog/post-2.jpg', 'LSH', 1, NULL, 1, 'active', '2022-08-16 10:53:18', '2022-08-16 10:53:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_categories`
--

DROP TABLE IF EXISTS `post_categories`;
CREATE TABLE IF NOT EXISTS `post_categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `post_categories_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `post_categories`
--

INSERT INTO `post_categories` (`id`, `title`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bài viết mới nhất', 'bai-viet-moi-nhat', 'active', '2022-08-16 10:50:07', '2022-08-16 10:50:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_comments`
--

DROP TABLE IF EXISTS `post_comments`;
CREATE TABLE IF NOT EXISTS `post_comments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `post_id` bigint(20) UNSIGNED DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `replied_comment` text COLLATE utf8mb4_unicode_ci,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `post_comments_user_id_foreign` (`user_id`),
  KEY `post_comments_post_id_foreign` (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post_tags`
--

DROP TABLE IF EXISTS `post_tags`;
CREATE TABLE IF NOT EXISTS `post_tags` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `post_tags_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `post_tags`
--

INSERT INTO `post_tags` (`id`, `title`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'LSH', 'lsh', 'active', '2022-08-16 10:51:15', '2022-08-16 10:51:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `photo` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int(11) NOT NULL DEFAULT '1',
  `size` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'M',
  `condition` enum('default','new','hot') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `price` double(8,2) NOT NULL,
  `discount` double(8,2) NOT NULL,
  `is_featured` tinyint(1) NOT NULL,
  `cat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `child_cat_id` bigint(20) UNSIGNED DEFAULT NULL,
  `supplier_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_slug_unique` (`slug`),
  KEY `products_brand_id_foreign` (`brand_id`),
  KEY `products_supplier_id_foreign` (`supplier_id`),
  KEY `products_cat_id_foreign` (`cat_id`),
  KEY `products_child_cat_id_foreign` (`child_cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `title`, `slug`, `summary`, `description`, `photo`, `stock`, `size`, `condition`, `status`, `price`, `discount`, `is_featured`, `cat_id`, `child_cat_id`, `supplier_id`, `brand_id`, `created_at`, `updated_at`) VALUES
(14, 'Quần jean nam rách Gấu 194 was cào kiểu vải jeans co dãn, dày dặn form slimfit - 5678', 'quan-jean-nam-rach-gau-194-was-cao-kieu-vai-jeans-co-dan-day-dan-form-slimfit-5678', '<p><span style=\"color: rgb(27, 27, 27); font-family: &quot;Helvetica Neue&quot;, HelveticaNeue, Helvetica, &quot;Noto Sans&quot;, Roboto, Arial, &quot;Hiragino Sans&quot;, &quot;Hiragino Kaku Gothic Pro&quot;, &quot;ヒラギノ角ゴ  Pro W3&quot;, &quot;Noto Sans CJK JP&quot;, Osaka, Meiryo, メイリオ, &quot;MS PGothic&quot;, &quot;ＭＳ  Ｐゴシック&quot;, &quot;Hiragino Sans GB&quot;, &quot;Arial Unicode MS&quot;, sans-serif; font-size: medium; letter-spacing: 0.16px;\">Được sản xuất bằng phương pháp giặt thân thiện với môi trường của chúng tôi được phát triển tại Trung tâm Cải tiến Quần jean, giảm lượng nước sử dụng trong quá trình xử lý xuống hơn 90％.</span><br></p>', '<p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">TÊN SẢN PHẨM:</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">Quần jean nam rách Gấu 194 wass kiểu vải jeans co dãn, dày dặn form slimfit</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">\r\n</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">THÀNH PHẦN</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">   - Form dáng: Slimfit vừa vặn, trẻ trung, lịch lãm, sang chảnh</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">   - chất liệu: vải jeans bò cao cấp</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">   - Xuất xứ: Việt Nam</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">   - Màu sắc: Màu tại phân loại sản phẩm</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">\r\n</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">ƯU ĐIỂM</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">   -Vượt trội hơn các loại sản phẩm thông thường trên thị trường</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">   -Độ co dãn, thoải mái cho người mặc</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">   -Chất liệu jean bò cao cấp Coton thấm hút mồ hôi, thoáng mát</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">   -Đảm bảo không xù lông, không bay màu</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">\r\n</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">✈  🏠 SỐ ĐO : Số đo có thể xê xích 1 chút tầm 1cm - 1.5cm ạ</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">Ngang: ngang đai lưng quần</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">Dài: Chiều dài quần</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">   -Size 28: Ngang  37cm -- Dài 93cm  </p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">   -Size 29: Ngang  37.5cm -- Dài 93.5cm</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">   -Size 30: Ngang  38cm -- Dài 94cm</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">   -Size 31: Ngang  38.5cm -- Dài 95cm</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">   -Size 32: Ngang  40cm -- Dài 95cm</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">   -Size 33: Ngang  41cm -- Dài 95cm</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">   -Size 34: Ngang  42cm -- Dài 95cm</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">   -Size 35: Ngang  43cm -- Dài 95cm</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">   -Size 36: Ngang  44cm -- Dài 95cm</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">   -Ống Quần Ngang 15cm</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">\r\n</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">\r\n</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\"> BẢNG SIZE:</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">(Bảng size mang tính chất tham khảo và phù hợp 80-90% sở thích các cậu ạ. Các bạn muốn chọn size phù hợp có thể xem hình feedback các khách đã mua hoặc inbox cho GấuStore nhé ^^)</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">-Nếu được các bạn bỏ chút thời gian để lấy số đo ngang quần mà bạn thường xuyên mặc để chọn được size quần phù hợp nhất nhé, để tránh chọn size không vừa phải đổi trả nè, chúc bạn chọn được size quần vừa theo ý muốn nha hihi.</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">\r\n</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">HƯỚNG DẪN CHỌN SIZE:</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">   - 28                       dưới 1m70             dưới 52kg</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">   - 29                    1m64 - 1m72             51 - 56kg</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">   - 30                    1m65 - 1m74             57 - 61kg</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">   - 31                    1m66 - 1m76             62 - 66kg</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">   - 32                    1m67 - 1m78             67 - 70kg</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">   - 33                    1m68 - 1m80             71 - 73kg</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">   - 34                    1m69 - 1m80             74 - 76kg</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">   - 35                    1m70 - 1m85             77 - 79kg</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">   - 36                    1m72 - 1m85              80 - 85kg</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">\r\n</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">Lưu Ý: khách có bụng,vòng 3 lớn hoặc thíc mặc rộng lấy lên 1 size nhé khách</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">\r\n</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">HƯỚNG DẪN SỬ DỤNG VÀ BẢO QUẢN</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">   - Nước đầu giặt bằng nước lạnh.</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">   - Nước đầu ko giặt bột giặt nhé, phơi khô, lần sau giặt thoải không sợ ra màu nha.</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">    - Giặt ở nhiệt độ bình thường, với đồ có màu tương tự.</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">    - Không được dùng hóa chất tẩy.</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">    - Giặt mặt trái, nhẹ tay, giặt xong phơi ngay, không ngâm trong nước quá lâu.</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">\r\n</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">Gấu194 CAM KẾT:</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">   - Sản phẩm 100% giống mô tả.</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">   - Cam kết 100% đổi size nếu sản phẩm khách đặt không vừa (hỗ trợ đổi size trong vòng 7 ngày).</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">   - Hỗ trợ đổi trả sản phẩm, hoàn tiền nếu lỗi do nhà sản xuất</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">   - Nếu có bất kì khiếu nại cần Shop hỗ trợ về sản phẩm, khi mở sản phẩm các Chị vui lòng quay lại video quá trình mở sản phẩm để được đảm bảo 100% đổi lại sản phẩm mới nếu Shop giao bị lỗi.</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">   - Sản phẩm đầy đủ tem, mác, bao bì cao cấp.</p><p class=\"_2jrvqA\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">   - Quý khách nhận được sản phẩm, hãy lòng đánh giá giúp Shop để hưởng thêm nhiều ưu đãi hơn nhé.</p>', '/storage/photos/1/Products/vngoods_66_439218 (1).jpg,/storage/photos/1/Products/goods_439218_sub26.jpg,/storage/photos/1/Products/goods_439218_sub24.jpg,/storage/photos/1/Products/goods_439218_sub19.jpg', 20, ',S,M,L,XL', 'new', 'active', 250000.00, 0.00, 1, 8, NULL, 2, 1, '2022-09-03 23:18:37', '2022-09-03 23:18:37'),
(15, 'AIRism Cotton Áo Thun Cổ Tròn Dáng Rộng', 'airism-cotton-ao-thun-co-tron-dang-rong', '<span style=\"color: rgb(27, 27, 27); font-family: &quot;Helvetica Neue&quot;, HelveticaNeue, Helvetica, &quot;Noto Sans&quot;, Roboto, Arial, &quot;Hiragino Sans&quot;, &quot;Hiragino Kaku Gothic Pro&quot;, &quot;ヒラギノ角ゴ  Pro W3&quot;, &quot;Noto Sans CJK JP&quot;, Osaka, Meiryo, メイリオ, &quot;MS PGothic&quot;, &quot;ＭＳ  Ｐゴシック&quot;, &quot;Hiragino Sans GB&quot;, &quot;Arial Unicode MS&quot;, sans-serif; font-size: medium; letter-spacing: 0.16px;\">&nbsp;Đội ngũ thiết kế ở Paris do Christophe Lemaire đứng đầu đã tạo ra bộ sưu tập LifeWear mới bằng cách sử dụng các loại vải tân tiến và kiểu dáng hiện đại.</span><br style=\"background-repeat: no-repeat; box-sizing: inherit; padding: 0px; margin: 0px; color: rgb(27, 27, 27); font-family: &quot;Helvetica Neue&quot;, HelveticaNeue, Helvetica, &quot;Noto Sans&quot;, Roboto, Arial, &quot;Hiragino Sans&quot;, &quot;Hiragino Kaku Gothic Pro&quot;, &quot;ヒラギノ角ゴ  Pro W3&quot;, &quot;Noto Sans CJK JP&quot;, Osaka, Meiryo, メイリオ, &quot;MS PGothic&quot;, &quot;ＭＳ  Ｐゴシック&quot;, &quot;Hiragino Sans GB&quot;, &quot;Arial Unicode MS&quot;, sans-serif; font-size: medium; letter-spacing: 0.16px;\"><span style=\"color: rgb(27, 27, 27); font-family: &quot;Helvetica Neue&quot;, HelveticaNeue, Helvetica, &quot;Noto Sans&quot;, Roboto, Arial, &quot;Hiragino Sans&quot;, &quot;Hiragino Kaku Gothic Pro&quot;, &quot;ヒラギノ角ゴ  Pro W3&quot;, &quot;Noto Sans CJK JP&quot;, Osaka, Meiryo, メイリオ, &quot;MS PGothic&quot;, &quot;ＭＳ  Ｐゴシック&quot;, &quot;Hiragino Sans GB&quot;, &quot;Arial Unicode MS&quot;, sans-serif; font-size: medium; letter-spacing: 0.16px;\">- Một sản phẩm có cảm giác mềm mại khô ráo, và có thể sử dụng để mặc thường ngày và trang trọng.</span><br style=\"background-repeat: no-repeat; box-sizing: inherit; padding: 0px; margin: 0px; color: rgb(27, 27, 27); font-family: &quot;Helvetica Neue&quot;, HelveticaNeue, Helvetica, &quot;Noto Sans&quot;, Roboto, Arial, &quot;Hiragino Sans&quot;, &quot;Hiragino Kaku Gothic Pro&quot;, &quot;ヒラギノ角ゴ  Pro W3&quot;, &quot;Noto Sans CJK JP&quot;, Osaka, Meiryo, メイリオ, &quot;MS PGothic&quot;, &quot;ＭＳ  Ｐゴシック&quot;, &quot;Hiragino Sans GB&quot;, &quot;Arial Unicode MS&quot;, sans-serif; font-size: medium; letter-spacing: 0.16px;\"><span style=\"color: rgb(27, 27, 27); font-family: &quot;Helvetica Neue&quot;, HelveticaNeue, Helvetica, &quot;Noto Sans&quot;, Roboto, Arial, &quot;Hiragino Sans&quot;, &quot;Hiragino Kaku Gothic Pro&quot;, &quot;ヒラギノ角ゴ  Pro W3&quot;, &quot;Noto Sans CJK JP&quot;, Osaka, Meiryo, メイリオ, &quot;MS PGothic&quot;, &quot;ＭＳ  Ｐゴシック&quot;, &quot;Hiragino Sans GB&quot;, &quot;Arial Unicode MS&quot;, sans-serif; font-size: medium; letter-spacing: 0.16px;\">- Thiết kế cổ tròn với cổ áo ôm sát hơn là điểm mấu chốt của thiết kế.</span>', '<p><span style=\"color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">Áo thun trơn AGE2X \r\nÁO THUN TRƠN màu PEACHY chính hãng AGE2X \r\nChuyên sỉ SLL , hàng trực tiếp xưởng\r\nChất liệu: 83% cotton, 10% spendex, 7% polyester\r\nForm: Unisex Chung cho cả Nam &amp; Nữ\r\n✅  HƯỚNG DẪN CHỌN SIZE  CHO ÁO\r\n   SIZE              S              M                     L                  XL\r\n✔️NGANG       43cm         46cm.           48cm             53cm\r\n✔️DÀI              61cm         66cm.           70cm             73cm\r\n✔️CAO           &lt;158cm      158-168cm   168-175cm    &lt;183cm\r\n✔️NẶNG         40-50kg       50-60kg       61-70kg         71-87kg\r\nShip hàng trên toàn quốc \r\nShip COD &gt; nhận hàng &gt; Hài lòng &gt; Giao tiền$$$ \r\n\r\nCHẤT LIỆU MỀM, THOẢI MÁI KHI HOẠT ĐỘNG\r\n✔️Chất liệu: Vải thun tăm Borip 83% cotton, 10% spendex, 7% polyester\r\n✔️Vài mềm, thấm hút mồ hội tốt phù hợp mặc trong mọi hoàn cảnh.\r\n✔️ Màu sắc: 30 màu tinh tế , dễ mặc với mọi màu da, dễ phối xinh xắn với nhiều phụ kiện\r\nCHÍNH SÁCH HOÀN/TRẢ HÀNG:\r\n✔️100% hàng chính hãng.\r\n✔️Miễn phí ô trả hàng trong vòng 7 ngày.\r\n✔️Màu sắc vải/ sản phẩm có thể sẽ chênh lệch thực tế một phần nhỏ, do ảnh hưởng về độ lệch màu của ánh sáng nhưng vẫn đảm bảo chất lượng.\r\n✔️Cam kết 100% đổi Size nếu sản phẩm khách đặt không vừa.\r\n✔️Shop hỗ trợ đổi sang sản phẩm khác cùng giá hoặc cao hơn nếu khách có nhu cầu đổi mẫu khác.\r\n\r\nCÁCH THỨC MUA HÀNG:\r\n✔️Ship COD &gt; nhận hàng &gt; Hài lòng &gt; Giao tiền$\r\n✔️Mua hàng trực tiếp:\r\n112/47 Bùi Quang Là, P.12, Q.Gò Vấp,TPHCM\r\nSĐT: (0944 673 446 - có Zalo, Viber)\r\n\r\nHƯỚNG DẪN SỬ DỤNG\r\n\r\n✔️ Giặt máy ở nhiệt độ thường.\r\n✔️  Không sử dụng hóa chất tẩy có chứa clo.\r\n✔️ Nên Phơi ở nơi có ánh nắng nhẹ hoặc trong bóng mát.\r\n✔️Sấy khô, nhẹ nhàng.\r\n✔️ Là ủi ở nhiệt độ thấp 110 độ c.\r\n✔️Giặt với sản phẩm cùng màu.\r\n✔️Không là lên chi tiết trang trí.\r\n\r\nTHÔNG TIN THƯƠNG HIỆU\r\n\r\n✔️ Sau hơn 10 năm có mặt tại Việt Nam, Sản phẩm mang thương hiệu AGE2X đã được nhiều thế hệ người Việt tin dùng. Với tiêu chuẩn nghiêm ngặt theo chuẩn hàng VNXK từ xơ sợi tới may và xử lý hoàn thiện.\r\n✔️ 100% sản phẩm được chứng nhận bởi viện dệt may Việt Nam KHÔNG CHỨA FORMALDEHYDE gây hại cho da ,ảnh hưởng đến sức khỏe người dùng\r\n✔️ Với hệ thống cửa hàng và đại lý phân phối khắp toàn quốc, chúng tôi luôn mong muốn đem lại những sản phẩm, dịch vụ chất lượng nhất tới khách hàng.</span><br></p>', '/storage/photos/1/Products/vngoods_69_425974.jpg,/storage/photos/1/Products/vngoods_66_439218 (1).jpg,/storage/photos/1/Products/vngoods_425974_sub7.jpg,/storage/photos/1/Products/vngoods_425974_sub2.jpg,/storage/photos/1/Products/vngoods_425974_sub1.jpg', 30, 'S,M,L,XL', 'new', 'active', 315000.00, 5.00, 1, 5, NULL, 1, 2, '2022-09-03 23:32:29', '2022-09-03 23:32:29'),
(16, 'Áo Sơ Mi Không Cần Ủi Slim Fit Dài Tay', 'ao-so-mi-khong-can-ui-slim-fit-dai-tay', '<p><span style=\"color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">Áo Sơ Mi Nam dài tay dáng ôm body , chống nhăn cao cấp  chính là gợi ý tuyệt vời cho nam giới mỗi khi lựa chọn trang phục mỗi ngày. </span><br></p>', '<p><span style=\"color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">Áo sơ mi nam Mantoni dài tay kiểu dáng hàn quốc vải lụa thái mềm mịn chống nhăn. \r\n\r\n      1. GIỚI THIỆU SẢN PHẨM\r\nÁo Sơ Mi Nam dài tay dáng ôm body , chống nhăn cao cấp  chính là gợi ý tuyệt vời cho nam giới mỗi khi lựa chọn trang phục mỗi ngày. \r\n\r\nVới những mẫu áo sơ mi nam thiết kế đơn giản và toát lên vẻ lịch lãm tinh tế, mang đến phong cách thời trang trẻ trung, năng động chắc chắn sẽ là lựa chọn hoàn hảo cho chàng trai hiện đại, nam tính. \r\n\r\nNhững chiếc áo sơ mi dài tay dáng ôm body Hàn Quốc , chống nhăn cao cấp  dù kết hợp với quần âu, quần jeans khi đi làm hay diện cùng quần ngố, quần short đi chơi đều NỔI BẬT, THOẢI MÁI và PHONG CÁCH. \r\n\r\nVới form dáng vừa vặn các chàng có thể tự tin khoe body cực chuẩn của mình. Hãy bổ sung ngay vào tủ đồ item này để diện thật chất nhé!\r\n\r\n   2. THÔNG TIN CHI TIẾT\r\n+ MÀU ÁO : TRẮNG , ĐEN , XANH THAN . XANH NƯỚC BIỂN , ĐỎ ĐÔ , GHI XÁM \r\n+ Chất liệu: 100% chất cotton lụa, thấm hút mồ hôi \r\n+ Chất vải sờ mịn không bai, không nhăn, không xù\r\n+ Quy cách, tiêu chuẩn đường may tinh tế, tỉ mỉ trong từng chi tiết\r\n+ Kiểu dáng: Thiết kế đơn giản, dễ mặc, dễ phối đồ\r\n+ Form body Hàn Quốc mang lại phong cách trẻ trung, lịch lãm\r\n+ Chất lượng sản phẩm tốt, giá cả hợp lý\r\n\r\n   3 . CHÍNH SÁCH BÁN HÀNG:\r\n- Cam kết chất lượng và mẫu mã sản phẩm giống với hình ảnh.\r\n- Hoàn tiền nếu sản phẩm không giống với mô tả\r\n- Cam kết được đổi trả hàng trong vòng 7 ngày\r\n-Ngoài ra SHOP tặng voucher hoặc hoàn xu cho các đơn hàng tương ứng đủ điều kiện.\r\n- Uy tín bán hàng được đặt lên hàng đầu, không kinh doanh chộp giật\r\n- Rất mong nhận được ý kiến đóng góp của Quý khách hàng để chúng tôi cải thiện chất lượng dịch vụ tốt hơn.\r\n\r\n4. HƯỚNG DẪN CHỌN SIZE ÁO SƠ MI NAM:\r\n Size M     :  Cân nặng từ 43-50kg,  Chiều cao dưới 160cm\r\n Size L      :  Cân nặng từ 52-58kg,  Chiều cao dưới 165cm\r\n Size XL    :  Cân nặng từ 59-65kg,  Chiều cao dưới 170cm\r\nSize 2XL  :  Cân nặng từ 66-72kg,  Chiều cao dưới 175cm\r\nSize 3XL  :  Cân nặng từ 73-80kg,  Chiều cao dưới 185cm</span><br></p>', '/storage/photos/1/Products/AoSoMi/goods_425050_sub17.jpg,/storage/photos/1/Products/AoSoMi/goods_425050_sub18.jpg,/storage/photos/1/Products/AoSoMi/goods_425050_sub19.jpg,/storage/photos/1/Products/AoSoMi/goods_64_425050.jpg', 50, 'S,M,L,XL', 'new', 'active', 700000.00, 10.00, 1, 6, NULL, 1, 5, '2022-09-03 23:35:30', '2022-09-03 23:35:30'),
(17, 'Quần Cotton Dáng Relaxed Dài Đến Mắt Cá', 'quan-cotton-dang-relaxed-dai-den-mat-ca', '<p><span style=\"color: rgb(27, 27, 27); font-family: &quot;Helvetica Neue&quot;, HelveticaNeue, Helvetica, &quot;Noto Sans&quot;, Roboto, Arial, &quot;Hiragino Sans&quot;, &quot;Hiragino Kaku Gothic Pro&quot;, &quot;ヒラギノ角ゴ  Pro W3&quot;, &quot;Noto Sans CJK JP&quot;, Osaka, Meiryo, メイリオ, &quot;MS PGothic&quot;, &quot;ＭＳ  Ｐゴシック&quot;, &quot;Hiragino Sans GB&quot;, &quot;Arial Unicode MS&quot;, sans-serif; letter-spacing: 0.16px;\">Quần làm bằng chất liệu cotton 100% mềm mại với dáng quần ống ôm dần.</span><br></p>', '<p><span style=\"color: rgba(0, 0, 0, 0.8); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, 文泉驛正黑, &quot;WenQuanYi Zen Hei&quot;, &quot;Hiragino Sans GB&quot;, &quot;儷黑 Pro&quot;, &quot;LiHei Pro&quot;, &quot;Heiti TC&quot;, 微軟正黑體, &quot;Microsoft JhengHei UI&quot;, &quot;Microsoft JhengHei&quot;, sans-serif; font-size: 14px; white-space: pre-wrap;\">-Được làm bằng 100% cotton chải cả hai mặt cho cảm giác mềm mại và thoải mái hơn. \r\n- Kiểu dáng côn giãn vừa vặn giúp di chuyển dễ dàng. \r\n- Thun eo kiểu dáng đẹp cho vẻ ngoài sành điệu. \r\n-Kiểu cắt côn cổ điển phù hợp với bất kỳ đỉnh nào cho dù bạn đang ở nhà hay đi chơi xa.\r\n\r\nChất liệu:\r\nVẢI: 100%&nbsp;Cotton\r\nHƯỚNG DẪN GIẶT: Giặt máy nước lạnh</span><br></p>', '/storage/photos/1/Products/vngoods_425974_sub7.jpg,/storage/photos/1/Products/vngoods_445338_sub1.jpg,/storage/photos/1/Products/vngoods_445338_sub7.jpg,/storage/photos/1/Products/vngoods_445338_sub8.jpg', 10, 'S,M,L,XL', 'new', 'active', 485000.00, 0.00, 1, 9, NULL, 2, 3, '2022-09-03 23:39:48', '2022-09-03 23:39:48'),
(18, 'Áo Thun Dry Cổ V Ngắn Tay', 'ao-thun-dry-co-v-ngan-tay', '<p><span style=\"color: rgb(27, 27, 27); font-family: &quot;Helvetica Neue&quot;, HelveticaNeue, Helvetica, &quot;Noto Sans&quot;, Roboto, Arial, &quot;Hiragino Sans&quot;, &quot;Hiragino Kaku Gothic Pro&quot;, &quot;ヒラギノ角ゴ  Pro W3&quot;, &quot;Noto Sans CJK JP&quot;, Osaka, Meiryo, メイリオ, &quot;MS PGothic&quot;, &quot;ＭＳ  Ｐゴシック&quot;, &quot;Hiragino Sans GB&quot;, &quot;Arial Unicode MS&quot;, sans-serif; letter-spacing: 0.16px;\">Một món đồ cần thiết cho tủ quần áo của bạn. Mang lại cảm giác mịn màng, thoáng mát.</span><br></p>', '<section style=\"background-repeat: no-repeat; box-sizing: inherit; padding: 0px; margin: 0px; color: rgb(27, 27, 27); font-family: &quot;Helvetica Neue&quot;, HelveticaNeue, Helvetica, &quot;Noto Sans&quot;, Roboto, Arial, &quot;Hiragino Sans&quot;, &quot;Hiragino Kaku Gothic Pro&quot;, &quot;ヒラギノ角ゴ  Pro W3&quot;, &quot;Noto Sans CJK JP&quot;, Osaka, Meiryo, メイリオ, &quot;MS PGothic&quot;, &quot;ＭＳ  Ｐゴシック&quot;, &quot;Hiragino Sans GB&quot;, &quot;Arial Unicode MS&quot;, sans-serif; font-size: medium; letter-spacing: 0.16px;\"><div data-test=\"material-accordion\" style=\"background-repeat: no-repeat; box-sizing: inherit; padding: 0px; margin: 0px; position: relative;\"><div class=\"fr-accordion fr-accordion-open\" style=\"background-repeat: no-repeat; box-sizing: inherit; padding: 0px; margin: 0px; position: relative; overflow: visible;\"><div class=\"fr-accordion-items\" role=\"tabpanel\" style=\"background-repeat: no-repeat; box-sizing: inherit; padding: 0px; margin: 0px; position: relative; max-height: none; overflow: inherit; height: auto;\"><div class=\"fr-wrapper pt-m UuKlr5nOMg9O9Geo9_45q\" style=\"background-repeat: no-repeat; box-sizing: inherit; padding: 20px; margin: 0px; position: relative; line-height: 24px; width: auto;\"><div class=\"fr-text fr-system-text\" style=\"background-repeat: no-repeat; box-sizing: inherit; padding: 0px; margin: 0px; position: relative; font-size: 15px;\">Mã sản phẩm 452398</div></div><div class=\"fr-wrapper pl-m\" style=\"background-repeat: no-repeat; box-sizing: inherit; padding: 0px 0px 0px 20px; margin: 0px; position: relative; width: auto;\"><div class=\"fr-text fr-system-text\" style=\"background-repeat: no-repeat; box-sizing: inherit; padding: 0px; margin: 0px; position: relative; font-size: 15px;\">Xin lưu ý mã số nhận diện của sản phẩm có thể có sự khác biệt, kể cả khi đó là cùng một mặt hàng.</div></div><dl class=\"fr-definition-list\" style=\"background-repeat: no-repeat; box-sizing: inherit; padding: 0px; margin-right: 20px; margin-bottom: 0px; margin-left: 20px;\"><dt class=\"fr-definition-list-term fr-definition-list-description\" style=\"background-repeat: no-repeat; box-sizing: inherit; padding: 0px; margin: 4px 0px 0px; font-family: Arial, &quot;Helvetica Neue&quot;, HelveticaNeue, Helvetica, &quot;Noto Sans&quot;, Roboto, &quot;Hiragino Sans&quot;, &quot;Hiragino Kaku Gothic Pro&quot;, &quot;ヒラギノ角ゴ  Pro W3&quot;, &quot;Noto Sans CJK JP&quot;, Osaka, Meiryo, メイリオ, &quot;MS PGothic&quot;, &quot;ＭＳ  Ｐゴシック&quot;, &quot;Hiragino Sans GB&quot;, &quot;Arial Unicode MS&quot;, sans-serif; font-stretch: normal; font-weight: normal; letter-spacing: 0.02em; line-height: 1.2; text-transform: uppercase; max-width: 100%; hyphens: auto; overflow-wrap: break-word;\">VẢI</dt><dd class=\"fr-definition-list-description\" style=\"background-repeat: no-repeat; box-sizing: inherit; padding: 0px; margin-top: 4px; margin-right: 0px; margin-bottom: 0px; letter-spacing: 0.01em; line-height: 1.2; max-width: 100%; hyphens: auto; overflow-wrap: break-word;\">66%&nbsp;Bông, 34%&nbsp;Polyeste</dd><dt class=\"fr-definition-list-term fr-definition-list-description\" style=\"background-repeat: no-repeat; box-sizing: inherit; padding: 0px; margin: 4px 0px 0px; font-family: Arial, &quot;Helvetica Neue&quot;, HelveticaNeue, Helvetica, &quot;Noto Sans&quot;, Roboto, &quot;Hiragino Sans&quot;, &quot;Hiragino Kaku Gothic Pro&quot;, &quot;ヒラギノ角ゴ  Pro W3&quot;, &quot;Noto Sans CJK JP&quot;, Osaka, Meiryo, メイリオ, &quot;MS PGothic&quot;, &quot;ＭＳ  Ｐゴシック&quot;, &quot;Hiragino Sans GB&quot;, &quot;Arial Unicode MS&quot;, sans-serif; font-stretch: normal; font-weight: normal; letter-spacing: 0.02em; line-height: 1.2; text-transform: uppercase; max-width: 100%; hyphens: auto; overflow-wrap: break-word;\">HƯỚNG DẪN GIẶT</dt><dd class=\"fr-definition-list-description\" style=\"background-repeat: no-repeat; box-sizing: inherit; padding: 0px; margin-top: 4px; margin-right: 0px; margin-bottom: 0px; letter-spacing: 0.01em; line-height: 1.2; max-width: 100%; hyphens: auto; overflow-wrap: break-word;\">Giặt máy nước lạnh</dd><dd class=\"fr-definition-list-description\" style=\"background-repeat: no-repeat; box-sizing: inherit; padding: 0px; margin-top: 4px; margin-right: 0px; margin-bottom: 0px; letter-spacing: 0.01em; line-height: 1.2; max-width: 100%; hyphens: auto; overflow-wrap: break-word;\">-</dd></dl><div style=\"background-repeat: no-repeat; box-sizing: inherit; padding: 0px; margin: 0px; position: relative;\"></div><div style=\"background-repeat: no-repeat; box-sizing: inherit; padding: 0px; margin: 0px; position: relative;\"></div><div class=\"fr-wrapper pl-m mt-xxxs mb-s\" style=\"background-repeat: no-repeat; box-sizing: inherit; padding: 0px 0px 0px 20px; margin: 4px 0px 16px; position: relative; width: auto;\"><div data-test=\"material-accordion-content\" style=\"background-repeat: no-repeat; box-sizing: inherit; padding: 0px; margin: 0px; position: relative;\">- Những hình ảnh sản phẩm có thể bao gồm những màu không có sẵn.</div><div><br></div></div><div style=\"background-repeat: no-repeat; box-sizing: inherit; padding: 0px; margin: 0px; position: relative;\"></div></div></div></div></section>', '/storage/photos/1/Products/AoThun/vngoods_427916_sub2.jpg,/storage/photos/1/Products/AoThun/vngoods_61_427916.jpg,/storage/photos/1/Products/AoThun/vngoods_427916_sub1.jpg,/storage/photos/1/Products/AoThun/goods_427916_sub14.jpg', 50, 'S,M,L,XL', 'new', 'active', 186000.00, 0.00, 1, 5, NULL, 1, 3, '2022-09-04 04:57:45', '2022-09-04 04:57:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_reviews`
--

DROP TABLE IF EXISTS `product_reviews`;
CREATE TABLE IF NOT EXISTS `product_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `rate` tinyint(4) NOT NULL DEFAULT '0',
  `review` text COLLATE utf8mb4_unicode_ci,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_reviews_user_id_foreign` (`user_id`),
  KEY `product_reviews_product_id_foreign` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_des` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`id`, `description`, `short_des`, `logo`, `photo`, `address`, `phone`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Chào mừng bạn đến shop quần áo của XSHOP', 'Lorem isum sjsjhsgs', '/storage/photos/1/Settings/logo.png', '/storage/photos/1/Settings/logo-footer.png', '55A Nam Kỳ Khởi Nghĩa,Quận 1,TP Hồ Chí Minh', '0343754517', 'admin@gmail.com', NULL, '2022-09-26 08:04:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shippings`
--

DROP TABLE IF EXISTS `shippings`;
CREATE TABLE IF NOT EXISTS `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `shippings`
--

INSERT INTO `shippings` (`id`, `type`, `price`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Giao Hàng Tiết Kiệm', '15000.00', 'active', '2022-08-17 20:56:56', '2022-08-17 20:56:56'),
(2, 'Giao hàng nhanh', '25000.00', 'active', '2022-08-17 20:57:12', '2022-08-17 20:57:12'),
(3, 'VN EXPRESS', '22000.00', 'active', '2022-08-17 20:57:22', '2022-08-17 20:57:22'),
(4, 'Giao hàng hỏa tốc', '70000.00', 'active', '2022-08-17 20:57:32', '2022-08-17 20:57:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `supplier`
--

DROP TABLE IF EXISTS `supplier`;
CREATE TABLE IF NOT EXISTS `supplier` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `supplier_slug_unique` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `supplier`
--

INSERT INTO `supplier` (`id`, `title`, `address`, `phone`, `email`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Hùng Ke', '65 Huỳnh Thúc Kháng P Bến Nghé Q1 TP HCM', '1234578902', 'admin@gmail.com', 'hung-ke', 'active', '2022-08-15 20:04:58', '2022-08-15 20:04:58'),
(2, 'Thanh Duy', 'Thống Nhất Đồng Nai', '093383737', 'duy15102000@gmail.com', 'thanh-duy', 'active', '2022-08-21 22:01:41', '2022-08-21 22:01:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `photo`, `role`, `provider`, `provider_id`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Khánh TV', 'admin@gmail.com', NULL, '$2y$10$iLN1SMzqsmSxiEQRBC8CZ.hWP1DeGhLIr8rX13uOYy421stROaz6q', '/storage/photos/1/Users/member-2.jpg', 'admin', NULL, NULL, 'active', 'NN0OCl22anYrv18e8Z4ixSSh0qTv0yyZFQldSeoD9HtmmDGLBE6Xgo2IAys0', NULL, '2022-08-23 22:11:11'),
(2, 'Thanh Duy', 'duy15102000@gmail.com', NULL, '$2y$10$RLlwhJQaG5e1FBzR1Xv6tuogMb66JXcVqa3OWo4epLe2aonkQr3u6', NULL, 'user', NULL, NULL, 'active', NULL, '2022-08-18 04:07:38', '2022-08-18 04:07:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wishlists`
--

DROP TABLE IF EXISTS `wishlists`;
CREATE TABLE IF NOT EXISTS `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` double(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `wishlists_product_id_foreign` (`product_id`),
  KEY `wishlists_user_id_foreign` (`user_id`),
  KEY `wishlists_cart_id_foreign` (`cart_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `wishlists`
--

INSERT INTO `wishlists` (`id`, `product_id`, `cart_id`, `user_id`, `price`, `quantity`, `amount`, `created_at`, `updated_at`) VALUES
(2, 11, 7, 1, 185000.00, 1, 185000.00, '2022-08-17 18:53:45', '2022-08-17 20:51:31'),
(3, 10, 7, 1, 261000.00, 1, 261000.00, '2022-08-17 19:00:34', '2022-08-17 20:51:31'),
(4, 18, 23, 1, 186000.00, 1, 186000.00, '2022-09-13 19:57:41', '2022-09-13 20:00:03');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
