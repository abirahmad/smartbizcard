-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 21, 2022 at 11:34 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartbiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin__taxes`
--

CREATE TABLE `admin__taxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `internal_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` double(8,2) NOT NULL,
  `value_type` enum('percentage','fixed') COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('inclusive','exclusive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing_type` enum('personal','business','both') COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=>active, 0=>inactive',
  `category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `author`, `image`, `description`, `tags`, `status`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'You need our Small Business or Corporate Plans!', 1, 'blog_image1.png', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et', 'Something Exclusive', 1, 1, '2022-09-21 03:28:41', '2022-09-21 03:28:41'),
(2, 'You need our Small Business or Corporate Plans!', 1, 'blog_image2.png', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et', 'Something Exclusive', 1, 2, '2022-09-21 03:28:41', '2022-09-21 03:28:41'),
(3, 'You need our Small Business or Corporate Plans!', 1, 'blog_image3.png', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et', 'Something Exclusive', 1, 3, '2022-09-21 03:28:41', '2022-09-21 03:28:41'),
(4, 'You need our Small Business or Corporate Plans!', 1, 'blog_image4.png', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et', 'Something Exclusive', 1, 3, '2022-09-21 03:28:41', '2022-09-21 03:28:41');

-- --------------------------------------------------------

--
-- Table structure for table `card_social_links`
--

CREATE TABLE `card_social_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `social_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  `active` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `position`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Technology', 'blog-category-1', 1, '0', '2022-09-21 03:28:41', '2022-09-21 03:28:41'),
(2, 'Literature', 'blog-category-2', 2, '0', '2022-09-21 03:28:41', '2022-09-21 03:28:41'),
(3, 'Thriller', 'blog-category-3', 3, '0', '2022-09-21 03:28:41', '2022-09-21 03:28:41');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blog_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `custom_settings`
--

CREATE TABLE `custom_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `custom_settings`
--

INSERT INTO `custom_settings` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Update Your Card Info Anytime', 1, '2022-09-21 03:28:41', '2022-09-21 03:28:41'),
(2, 'Custom Sales Contest', 1, '2022-09-21 03:28:41', '2022-09-21 03:28:41'),
(3, 'White Labeled Dashboard', 1, '2022-09-21 03:28:41', '2022-09-21 03:28:41'),
(4, 'Integrated CRM', 1, '2022-09-21 03:28:41', '2022-09-21 03:28:41'),
(5, 'Email Support', 1, '2022-09-21 03:28:41', '2022-09-21 03:28:41');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feed_backs`
--

CREATE TABLE `feed_backs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logo_copyright_settings`
--

CREATE TABLE `logo_copyright_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `header_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `footer_logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `copyright` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member_plans`
--

CREATE TABLE `member_plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `monthly_price` double(8,2) DEFAULT NULL,
  `annual_price` double(8,2) DEFAULT NULL,
  `lifetime_price` double(8,2) DEFAULT NULL,
  `recommended` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL,
  `scan_limit_per_month` int(11) DEFAULT NULL,
  `frequency` int(11) DEFAULT NULL,
  `additional_field_limit` int(11) DEFAULT NULL,
  `hide_branding` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `customize_card` double(8,2) NOT NULL DEFAULT 0.00,
  `team_member` int(11) DEFAULT NULL,
  `options` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member_plans`
--

INSERT INTO `member_plans` (`id`, `user_id`, `name`, `monthly_price`, `annual_price`, `lifetime_price`, `recommended`, `scan_limit_per_month`, `frequency`, `additional_field_limit`, `hide_branding`, `status`, `customize_card`, `team_member`, `options`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Entreprenuer', 200.00, 1.00, 1.00, 'yes', 1, 0, 1, 'yes', 1, 30.00, NULL, 'Optional Customization Available', 'small_business-image1.png', '2022-09-21 03:28:41', '2022-09-21 03:28:41'),
(2, 1, 'Small Business', 200.00, 1.00, 1.00, 'yes', 30, 1, 1, 'yes', 1, 20.00, 1, NULL, 'small_business-image1.png', '2022-09-21 03:28:41', '2022-09-21 03:28:41'),
(3, 1, 'Corporation', 200.00, 1.00, 1.00, 'yes', 1, 2, 1, 'yes', 1, 30.00, 20, 'Unlimited', 'small_business-image1.png', '2022-09-21 03:28:41', '2022-09-21 03:28:41');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_06_08_194522_create_vcards_table', 1),
(5, '2021_06_13_090016_create_blogs_table', 1),
(6, '2021_06_14_045103_create_categories_table', 1),
(7, '2021_06_14_120547_create_vcard_urls_table', 1),
(8, '2021_06_15_053405_create_comments_table', 1),
(9, '2021_06_16_100310_create_plan__taxes_table', 1),
(10, '2021_06_17_080220_create_plan_custom_settings_table', 1),
(11, '2021_06_19_061013_create_social_links_table', 1),
(12, '2021_06_19_062220_create_member_plans_table', 1),
(13, '2021_06_19_062802_create_custom_settings_table', 1),
(14, '2021_06_19_063127_create_admin__taxes_table', 1),
(15, '2021_06_22_091216_create_payment_transactions_table', 1),
(16, '2021_06_29_084214_create_logo_copyright_settings_table', 1),
(17, '2021_06_29_090405_create_tutorials_table', 1),
(18, '2021_06_30_112420_create_qr_code_settings_table', 1),
(19, '2021_07_01_215304_create_qr_builders_table', 1),
(20, '2021_07_02_135913_create_card_social_links_table', 1),
(21, '2021_07_02_171842_create_scan_details_table', 1),
(22, '2021_07_04_061756_create_feed_backs_table', 1),
(23, '2021_07_17_113629_create_payment_records_table', 1),
(24, '2021_07_26_233047_create_share_contacts_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_records`
--

CREATE TABLE `payment_records` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `payment_transaction_id` bigint(20) UNSIGNED NOT NULL,
  `card_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_id` bigint(20) UNSIGNED NOT NULL,
  `amount` double(8,2) NOT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `frequency` enum('MONTHLY','YEARLY','LIFETIME') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_transactions`
--

CREATE TABLE `payment_transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `card_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `card_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cvc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exp_month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exp_year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan_id` bigint(20) UNSIGNED NOT NULL,
  `plan_expire_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reminder_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seller_id` bigint(20) UNSIGNED NOT NULL,
  `amount` double(8,2) NOT NULL,
  `base_amount` double(8,2) NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `urgent` tinyint(1) NOT NULL DEFAULT 0,
  `highlight` tinyint(1) NOT NULL DEFAULT 0,
  `transaction_time` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `transaction_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_gatway` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `frequency` enum('MONTHLY','YEARLY','LIFETIME') COLLATE utf8mb4_unicode_ci NOT NULL,
  `billing` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `taxes_ids` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plan_custom_settings`
--

CREATE TABLE `plan_custom_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plan_id` int(10) UNSIGNED NOT NULL,
  `custom_setting_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plan_custom_settings`
--

INSERT INTO `plan_custom_settings` (`id`, `plan_id`, `custom_setting_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-09-21 03:28:41', '2022-09-21 03:28:41'),
(2, 2, 5, '2022-09-21 03:28:41', '2022-09-21 03:28:41'),
(3, 2, 2, '2022-09-21 03:28:41', '2022-09-21 03:28:41'),
(4, 2, 3, '2022-09-21 03:28:41', '2022-09-21 03:28:41'),
(5, 3, 5, '2022-09-21 03:28:41', '2022-09-21 03:28:41'),
(6, 3, 2, '2022-09-21 03:28:41', '2022-09-21 03:28:41'),
(7, 3, 3, '2022-09-21 03:28:41', '2022-09-21 03:28:41'),
(8, 3, 4, '2022-09-21 03:28:41', '2022-09-21 03:28:41');

-- --------------------------------------------------------

--
-- Table structure for table `plan__taxes`
--

CREATE TABLE `plan__taxes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plan_id` int(10) UNSIGNED NOT NULL,
  `tax_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `qr_builders`
--

CREATE TABLE `qr_builders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `foreground_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `background_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qr_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qr_size` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `qr_code_settings`
--

CREATE TABLE `qr_code_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `foreground_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `background_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qr_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qr_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `scan_details`
--

CREATE TABLE `scan_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scan_details`
--

INSERT INTO `scan_details` (`id`, `user_id`, `ip_address`, `reference`, `created_at`, `updated_at`) VALUES
(1, 2, '12.0.0.1', 'test', '2022-07-13 07:10:12', NULL),
(2, 2, '12.0.0.1', 'test', '2022-05-21 15:19:08', NULL),
(3, 2, '12.0.0.1', 'test', '2022-06-29 09:48:22', NULL),
(4, 2, '12.0.0.1', 'test', '2022-06-26 19:27:01', NULL),
(5, 2, '12.0.0.1', 'test', '2022-08-12 00:13:28', NULL),
(6, 2, '12.0.0.1', 'test', '2022-09-10 04:21:55', NULL),
(7, 2, '12.0.0.1', 'test', '2022-04-13 17:00:48', NULL),
(8, 2, '12.0.0.1', 'test', '2022-07-14 21:46:58', NULL),
(9, 2, '12.0.0.1', 'test', '2022-09-03 07:08:57', NULL),
(10, 2, '12.0.0.1', 'test', '2022-05-11 22:41:43', NULL),
(11, 2, '12.0.0.1', 'test', '2022-05-28 23:36:46', NULL),
(12, 2, '12.0.0.1', 'test', '2022-08-12 17:35:16', NULL),
(13, 2, '12.0.0.1', 'test', '2022-08-06 13:32:21', NULL),
(14, 2, '12.0.0.1', 'test', '2022-08-02 16:27:06', NULL),
(15, 2, '12.0.0.1', 'test', '2022-07-04 11:38:34', NULL),
(16, 2, '12.0.0.1', 'test', '2022-10-04 01:55:22', NULL),
(17, 2, '12.0.0.1', 'test', '2022-10-07 22:53:32', NULL),
(18, 2, '12.0.0.1', 'test', '2022-07-04 01:54:53', NULL),
(19, 2, '12.0.0.1', 'test', '2022-07-21 10:09:48', NULL),
(20, 2, '12.0.0.1', 'test', '2022-10-03 08:55:48', NULL),
(21, 2, '12.0.0.1', 'test', '2022-05-10 16:52:18', NULL),
(22, 2, '12.0.0.1', 'test', '2022-04-27 16:54:55', NULL),
(23, 2, '12.0.0.1', 'test', '2022-08-01 23:55:51', NULL),
(24, 2, '12.0.0.1', 'test', '2022-07-04 05:18:33', NULL),
(25, 2, '12.0.0.1', 'test', '2022-05-12 08:25:39', NULL),
(26, 2, '12.0.0.1', 'test', '2022-03-26 21:25:13', NULL),
(27, 2, '12.0.0.1', 'test', '2022-04-23 00:21:01', NULL),
(28, 2, '12.0.0.1', 'test', '2022-04-19 11:47:20', NULL),
(29, 2, '12.0.0.1', 'test', '2022-04-01 22:42:51', NULL),
(30, 2, '12.0.0.1', 'test', '2022-03-26 03:34:45', NULL),
(31, 2, '12.0.0.1', 'test', '2022-09-10 14:14:47', NULL),
(32, 2, '12.0.0.1', 'test', '2022-08-18 22:14:25', NULL),
(33, 2, '12.0.0.1', 'test', '2022-09-08 13:03:29', NULL),
(34, 2, '12.0.0.1', 'test', '2022-07-04 14:30:00', NULL),
(35, 2, '12.0.0.1', 'test', '2022-09-10 13:50:28', NULL),
(36, 2, '12.0.0.1', 'test', '2022-10-06 22:06:20', NULL),
(37, 2, '12.0.0.1', 'test', '2022-07-24 17:08:32', NULL),
(38, 2, '12.0.0.1', 'test', '2022-04-07 03:49:37', NULL),
(39, 2, '12.0.0.1', 'test', '2022-09-27 16:47:39', NULL),
(40, 2, '12.0.0.1', 'test', '2022-07-04 05:18:38', NULL),
(41, 2, '12.0.0.1', 'test', '2022-08-20 21:21:30', NULL),
(42, 2, '12.0.0.1', 'test', '2022-10-20 11:29:08', NULL),
(43, 2, '12.0.0.1', 'test', '2022-07-05 23:18:56', NULL),
(44, 2, '12.0.0.1', 'test', '2022-05-31 08:20:21', NULL),
(45, 2, '12.0.0.1', 'test', '2022-09-27 11:03:31', NULL),
(46, 2, '12.0.0.1', 'test', '2022-06-23 08:25:48', NULL),
(47, 2, '12.0.0.1', 'test', '2022-04-11 03:57:52', NULL),
(48, 2, '12.0.0.1', 'test', '2022-04-02 08:55:42', NULL),
(49, 2, '12.0.0.1', 'test', '2022-05-13 16:04:18', NULL),
(50, 2, '12.0.0.1', 'test', '2022-03-21 14:41:16', NULL),
(51, 2, '12.0.0.1', 'test', '2022-09-08 10:22:16', NULL),
(52, 2, '12.0.0.1', 'test', '2022-09-14 08:11:36', NULL),
(53, 2, '12.0.0.1', 'test', '2022-08-03 21:19:53', NULL),
(54, 2, '12.0.0.1', 'test', '2022-10-07 02:31:32', NULL),
(55, 2, '12.0.0.1', 'test', '2022-08-21 03:41:17', NULL),
(56, 2, '12.0.0.1', 'test', '2022-09-18 06:49:58', NULL),
(57, 2, '12.0.0.1', 'test', '2022-07-08 10:28:49', NULL),
(58, 2, '12.0.0.1', 'test', '2022-09-04 01:19:45', NULL),
(59, 2, '12.0.0.1', 'test', '2022-10-14 01:37:03', NULL),
(60, 2, '12.0.0.1', 'test', '2022-10-10 14:58:46', NULL),
(61, 2, '12.0.0.1', 'test', '2022-05-14 18:40:32', NULL),
(62, 2, '12.0.0.1', 'test', '2022-03-28 17:35:40', NULL),
(63, 2, '12.0.0.1', 'test', '2022-08-30 17:44:19', NULL),
(64, 2, '12.0.0.1', 'test', '2022-08-06 01:36:49', NULL),
(65, 2, '12.0.0.1', 'test', '2022-08-25 05:21:49', NULL),
(66, 2, '12.0.0.1', 'test', '2022-06-18 01:14:55', NULL),
(67, 2, '12.0.0.1', 'test', '2022-04-30 01:28:35', NULL),
(68, 2, '12.0.0.1', 'test', '2022-05-09 03:22:05', NULL),
(69, 2, '12.0.0.1', 'test', '2022-09-23 16:16:10', NULL),
(70, 2, '12.0.0.1', 'test', '2022-04-26 02:38:28', NULL),
(71, 2, '12.0.0.1', 'test', '2022-06-10 16:17:52', NULL),
(72, 2, '12.0.0.1', 'test', '2022-09-13 20:20:26', NULL),
(73, 2, '12.0.0.1', 'test', '2022-06-13 12:17:02', NULL),
(74, 2, '12.0.0.1', 'test', '2022-09-27 21:12:32', NULL),
(75, 2, '12.0.0.1', 'test', '2022-04-01 05:44:16', NULL),
(76, 2, '12.0.0.1', 'test', '2022-04-21 19:16:49', NULL),
(77, 2, '12.0.0.1', 'test', '2022-05-22 23:24:40', NULL),
(78, 2, '12.0.0.1', 'test', '2022-05-30 05:08:54', NULL),
(79, 2, '12.0.0.1', 'test', '2022-07-09 22:38:02', NULL),
(80, 2, '12.0.0.1', 'test', '2022-04-21 19:46:59', NULL),
(81, 2, '12.0.0.1', 'test', '2022-05-14 19:39:11', NULL),
(82, 2, '12.0.0.1', 'test', '2022-04-26 23:19:51', NULL),
(83, 2, '12.0.0.1', 'test', '2022-08-17 05:34:50', NULL),
(84, 2, '12.0.0.1', 'test', '2022-05-14 07:33:41', NULL),
(85, 2, '12.0.0.1', 'test', '2022-05-13 12:39:14', NULL),
(86, 2, '12.0.0.1', 'test', '2022-07-21 01:27:29', NULL),
(87, 2, '12.0.0.1', 'test', '2022-07-19 11:09:45', NULL),
(88, 2, '12.0.0.1', 'test', '2022-10-07 12:08:58', NULL),
(89, 2, '12.0.0.1', 'test', '2022-06-07 15:52:18', NULL),
(90, 2, '12.0.0.1', 'test', '2022-04-06 20:54:23', NULL),
(91, 2, '12.0.0.1', 'test', '2022-05-16 02:45:22', NULL),
(92, 2, '12.0.0.1', 'test', '2022-08-09 14:44:33', NULL),
(93, 2, '12.0.0.1', 'test', '2022-09-15 15:26:02', NULL),
(94, 2, '12.0.0.1', 'test', '2022-04-16 17:04:21', NULL),
(95, 2, '12.0.0.1', 'test', '2022-10-16 19:02:49', NULL),
(96, 2, '12.0.0.1', 'test', '2022-10-15 07:07:48', NULL),
(97, 2, '12.0.0.1', 'test', '2022-06-05 06:08:01', NULL),
(98, 2, '12.0.0.1', 'test', '2022-08-13 21:48:05', NULL),
(99, 2, '12.0.0.1', 'test', '2022-08-13 10:41:49', NULL),
(100, 2, '12.0.0.1', 'test', '2022-09-12 04:42:04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `share_contacts`
--

CREATE TABLE `share_contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `reference_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE `social_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facebook_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tutorials`
--

CREATE TABLE `tutorials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED DEFAULT NULL,
  `reference_id` bigint(20) UNSIGNED DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` enum('user','employer') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance` decimal(20,2) DEFAULT NULL,
  `confirm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `view` int(11) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `tag_line` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `salary_min` decimal(8,2) DEFAULT NULL,
  `salary_max` decimal(8,2) DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` bigint(20) UNSIGNED DEFAULT NULL,
  `subcategory` bigint(20) UNSIGNED DEFAULT NULL,
  `sex` enum('male','female') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_active` date DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `group_id`, `reference_id`, `first_name`, `last_name`, `username`, `user_type`, `balance`, `confirm`, `email`, `designation`, `status`, `view`, `email_verified_at`, `is_admin`, `tag_line`, `description`, `dob`, `salary_min`, `salary_max`, `password`, `category`, `subcategory`, `sex`, `phone`, `postcode`, `address`, `country`, `city`, `city_code`, `state_code`, `country_code`, `image`, `last_active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'Abir', 'Ahmad', 'abir', NULL, NULL, NULL, 'abir@gmail.com', NULL, 0, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, '$2y$10$G8F7g2xe0s2q.8l7tO7jG.3Jpynewj1898Hi5w31EDgkXvjKLjz22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'image.jpg', NULL, NULL, '2022-09-21 03:28:41', '2022-09-21 03:28:41'),
(2, NULL, NULL, 'Test', 'User', 'test', NULL, NULL, NULL, 'test@gmail.com', NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '$2y$10$3ztdr0y4g7GKanENPQbMEuGP7BClDbs83QJrDwM7TIqM5gDcUdh/O', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'image.jpg', NULL, NULL, '2022-09-21 03:28:41', '2022-09-21 03:28:41'),
(3, NULL, NULL, 'Test2', 'User', 'test2', NULL, NULL, NULL, 'test2@gmail.com', NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, '$2y$10$CkJ8DPvXC2P5vKlldP4ykO7mCwiFom7j3eTCVglpR8pvTDJ4ZdlGi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'image.jpg', NULL, NULL, '2022-09-21 03:28:41', '2022-09-21 03:28:41');

-- --------------------------------------------------------

--
-- Table structure for table `vcards`
--

CREATE TABLE `vcards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_office` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `main_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vcard_urls`
--

CREATE TABLE `vcard_urls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `card_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin__taxes`
--
ALTER TABLE `admin__taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `card_social_links`
--
ALTER TABLE `card_social_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_settings`
--
ALTER TABLE `custom_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `feed_backs`
--
ALTER TABLE `feed_backs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logo_copyright_settings`
--
ALTER TABLE `logo_copyright_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_plans`
--
ALTER TABLE `member_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_records`
--
ALTER TABLE `payment_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_transactions`
--
ALTER TABLE `payment_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan_custom_settings`
--
ALTER TABLE `plan_custom_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan__taxes`
--
ALTER TABLE `plan__taxes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qr_builders`
--
ALTER TABLE `qr_builders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qr_code_settings`
--
ALTER TABLE `qr_code_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scan_details`
--
ALTER TABLE `scan_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `share_contacts`
--
ALTER TABLE `share_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutorials`
--
ALTER TABLE `tutorials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- Indexes for table `vcards`
--
ALTER TABLE `vcards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vcard_urls`
--
ALTER TABLE `vcard_urls`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin__taxes`
--
ALTER TABLE `admin__taxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `card_social_links`
--
ALTER TABLE `card_social_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `custom_settings`
--
ALTER TABLE `custom_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feed_backs`
--
ALTER TABLE `feed_backs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logo_copyright_settings`
--
ALTER TABLE `logo_copyright_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member_plans`
--
ALTER TABLE `member_plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `payment_records`
--
ALTER TABLE `payment_records`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_transactions`
--
ALTER TABLE `payment_transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plan_custom_settings`
--
ALTER TABLE `plan_custom_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `plan__taxes`
--
ALTER TABLE `plan__taxes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qr_builders`
--
ALTER TABLE `qr_builders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `qr_code_settings`
--
ALTER TABLE `qr_code_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `scan_details`
--
ALTER TABLE `scan_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `share_contacts`
--
ALTER TABLE `share_contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `social_links`
--
ALTER TABLE `social_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tutorials`
--
ALTER TABLE `tutorials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vcards`
--
ALTER TABLE `vcards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vcard_urls`
--
ALTER TABLE `vcard_urls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
