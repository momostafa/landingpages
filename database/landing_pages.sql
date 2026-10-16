-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 16, 2026 at 08:24 AM
-- Server version: 8.0.40
-- PHP Version: 8.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `landing_pages`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('landingpages_cache_filament-fabricator::page-url--1', 's:5:\"/play\";', 2107497952),
('landingpages_cache_filament-fabricator::page-url--13', 's:5:\"/play\";', 2107487227),
('landingpages_cache_filament-fabricator::page-url--14', 's:6:\"/folio\";', 2107425576),
('landingpages_cache_filament-fabricator::page-url--2', 's:6:\"/folio\";', 2107497952),
('landingpages_cache_filament-fabricator::PageRoutesService::id-to-uri', 'a:2:{i:13;a:1:{i:0;s:5:\"/play\";}i:14;a:1:{i:0;s:6:\"/folio\";}}', 2107489824),
('landingpages_cache_filament-fabricator::PageRoutesService::uri-to-id', 'a:2:{s:5:\"/play\";i:13;s:6:\"/folio\";i:14;}', 2107489824),
('landingpages_cache_livewire-rate-limiter:16d36dff9abd246c67dfac3e63b993a169af77e6', 'i:1;', 1792138011),
('landingpages_cache_livewire-rate-limiter:16d36dff9abd246c67dfac3e63b993a169af77e6:timer', 'i:1792138011;', 1792138011);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `domains`
--

CREATE TABLE `domains` (
  `id` bigint UNSIGNED NOT NULL,
  `domain` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dns_ok` tinyint(1) NOT NULL DEFAULT '0',
  `reputation_score` int DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unknown',
  `checks` json DEFAULT NULL,
  `last_checked_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emails`
--

CREATE TABLE `emails` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint DEFAULT NULL,
  `page_id` bigint DEFAULT NULL,
  `source` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direction` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `auto_responder_sent` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mailables`
--

CREATE TABLE `mailables` (
  `id` bigint UNSIGNED NOT NULL,
  `mail_id` bigint UNSIGNED NOT NULL,
  `mailable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mailable_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mails`
--

CREATE TABLE `mails` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mailer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `transport` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stream_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_class` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from` json DEFAULT NULL,
  `reply_to` json DEFAULT NULL,
  `to` json DEFAULT NULL,
  `cc` json DEFAULT NULL,
  `bcc` json DEFAULT NULL,
  `html` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `opens` bigint UNSIGNED NOT NULL DEFAULT '0',
  `clicks` bigint UNSIGNED NOT NULL DEFAULT '0',
  `tags` json DEFAULT NULL,
  `sent_at` timestamp NULL DEFAULT NULL,
  `resent_at` timestamp NULL DEFAULT NULL,
  `accepted_at` timestamp NULL DEFAULT NULL,
  `delivered_at` timestamp NULL DEFAULT NULL,
  `last_opened_at` timestamp NULL DEFAULT NULL,
  `last_clicked_at` timestamp NULL DEFAULT NULL,
  `complained_at` timestamp NULL DEFAULT NULL,
  `soft_bounced_at` timestamp NULL DEFAULT NULL,
  `hard_bounced_at` timestamp NULL DEFAULT NULL,
  `unsubscribed_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mail_attachments`
--

CREATE TABLE `mail_attachments` (
  `id` bigint UNSIGNED NOT NULL,
  `mail_id` bigint UNSIGNED NOT NULL,
  `disk` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `inline` tinyint(1) NOT NULL,
  `size` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mail_events`
--

CREATE TABLE `mail_events` (
  `id` bigint UNSIGNED NOT NULL,
  `mail_id` bigint UNSIGNED NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hostname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `platform` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `os` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `browser` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` char(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tag` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `occurred_at` timestamp NULL DEFAULT NULL,
  `unsuppressed_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_05_23_100420_create_pages_table', 2),
(5, '2025_05_23_100421_fix_slug_unique_constraint_on_pages_table', 2),
(6, '2025_06_12_045522_1_create_mails_table', 3),
(7, '2025_06_12_045523_2_create_mail_attachments_table', 3),
(8, '2025_06_12_045524_2_create_mail_events_table', 3),
(9, '2025_06_12_045525_2_create_mailables_table', 3),
(10, '2025_06_12_045526_3_add_unsuppressed_at_to_mail_events', 3),
(11, '2025_06_12_045527_4_add_tags_to_mails_table', 3),
(12, '2025_06_12_045528_4_add_transport_column_to_mails_table', 3),
(15, '2025_06_19_021216_add_themes_settings_to_users_table', 5),
(16, '2025_06_26_005003_create_email_templates_themes_table', 6),
(17, '2025_06_26_005004_create_email_templates_table', 6),
(18, '2025_08_25_155335_create_domains_table', 7),
(19, '2025_08_25_155336_create_pages_live_table', 7),
(20, '2025_08_25_155337_create_pages_publish_logs_table', 7),
(21, '2025_08_25_155338_create_short_urls_table', 7),
(22, '2025_08_25_182940_create_landing_pages_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `layout` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default',
  `blocks` json NOT NULL,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `user_id`, `title`, `slug`, `layout`, `blocks`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Play', 'play', 'play', '[{\"data\": {\"navbar\": {\"logo\": \"templates/media/navbar/01M4CFWY2XY7DPT5E9X796PSNA.svg\", \"is_active\": true, \"logo_dark\": \"templates/media/navbar/01M4F8SFEN7FG99VZ0MGVTSJSH.svg\", \"logo_light\": \"templates/media/navbar/01M4F8SFEPBE4DYWERTZF3EKN3.svg\", \"menu_items\": [{\"type\": \"home\", \"title\": \"Home\", \"is_active\": true, \"title_link\": \"#home\"}, {\"type\": \"about\", \"title\": \"About\", \"is_active\": true, \"title_link\": \"#about\"}, {\"type\": \"features\", \"title\": \"Features\", \"is_active\": true, \"title_link\": \"#features\"}, {\"type\": \"team\", \"title\": \"Team\", \"is_active\": true, \"title_link\": \"#team\"}, {\"type\": \"pricing\", \"title\": \"Pricing\", \"is_active\": true, \"title_link\": \"#pricing\"}, {\"type\": \"contact\", \"title\": \"Contact\", \"is_active\": true, \"title_link\": \"#contact\"}, {\"type\": \"blog\", \"title\": \"Blog\", \"is_active\": true, \"title_link\": \"#blog\"}], \"signin_link\": \"#\", \"signin_text\": \"Sign In\", \"signup_link\": \"#\", \"signup_text\": \"Sign Up\"}}, \"type\": \"play.navbar\"}, {\"data\": {\"hero\": {\"image\": \"templates/play/assets/images/hero/hero-image.jpg\", \"items\": [{\"icon\": \"devicon-bootstrap\", \"title\": \"Bootstrap\", \"title_link\": null}, {\"icon\": \"devicon-tailwindcss\", \"title\": \"Tailwind\", \"title_link\": null}, {\"icon\": \"devicon-nodejs\", \"title\": \"NodeJs\", \"title_link\": null}], \"heading\": \"Providing Brilliant Ideas For Your\", \"is_active\": true, \"button_link\": \"#\", \"button_text\": \"Download Now\", \"description\": \"Launch your campaign and benefit from our expertise on designing and managing conversion centered Tailwind CSS html page.\", \"items_title\": \"Built with latest technology\", \"secondary_button_link\": \"#\", \"secondary_button_text\": \"Star on Github\"}}, \"type\": \"play.hero\"}, {\"data\": {\"about\": {\"heading\": \"Our Company Story\", \"image_1\": \"templates/media/about/01M4BSR36V2TTG296G3YQ7MQ9S.jpg\", \"image_2\": \"templates/media/about/01M4BSR36WZB3T0J55J3WRH9W4.jpg\", \"video_id\": \"S_CGed6E610\", \"is_active\": true, \"button_link\": \"#portfolio\", \"button_text\": \"View Portfolio\", \"description\": \"Start working with Play that can provide everything you need to generate awareness, drive traffic, connect. Dummy text is text that is used in the publishing industry or by web designers to occupy the space which will later be filled with \'real\' content. This is required when, for example, the final text is not yet available. Dummy texts have been in use by typesetters since the 16th century.\", \"section_title\": \"Who We Are ?\", \"background_image\": null, \"experience_years\": \"20\"}}, \"type\": \"play.about\"}, {\"data\": {\"features\": {\"items\": [{\"icon\": \"uni-adjust-circle-o\", \"title\": \"Grow Your Business\", \"title_link\": \"#\", \"button_link\": \"#\", \"button_text\": \"Read More\", \"description\": \"The phrasal sequence of the is now so that many campaign and benefit\"}, {\"icon\": \"uni-circuit-o\", \"title\": \"Drive More Sales\", \"title_link\": \"#\", \"button_link\": \"#\", \"button_text\": \"Read More\", \"description\": \"The phrasal sequence of the is now so that many campaign and benefit\"}, {\"icon\": \"uni-fire-o\", \"title\": \"Handled By Expert\", \"title_link\": \"#\", \"button_link\": \"#\", \"button_text\": \"Read More\", \"description\": \"The phrasal sequence of the is now so that many campaign and benefit\"}, {\"icon\": \"uni-flower-o\", \"title\": \"Discussion For Idea\", \"title_link\": \"#\", \"button_link\": \"#\", \"button_text\": \"Read More\", \"description\": \"The phrasal sequence of the is now so that many campaign and benefit\"}], \"heading\": \"Perfect Solution For Your Business\", \"is_active\": true, \"description\": \"Launch your campaign and benefit from our expertise on designing and managing conversion centered Tailwind CSS html page.\", \"section_title\": \"What We Do ?\"}}, \"type\": \"play.features\"}, {\"data\": {\"blog\": {\"items\": [{\"id\": 1, \"image\": \"templates/media/portfolio/01M4BKM2GBXVYRDH6GYEGXNEE7.jpg\", \"title\": \"Building Your Corporate Identity from Play\", \"title_link\": \"#\", \"button_link\": \"#\", \"button_text\": \"Read More\", \"description\": \"The phrasal sequence of the is now so that many campaign and benefit\", \"published_at\": \"2026-10-05 22:57\"}, {\"id\": 2, \"image\": \"templates/media/portfolio/01M4BKM2GCBKMKSBGTRAX1EYW6.jpg\", \"title\": \"The Right Hand of Business IT World\", \"title_link\": \"#\", \"button_link\": \"#\", \"button_text\": \"Read More\", \"description\": \"The phrasal sequence of the is now so that many campaign and benefit\", \"published_at\": \"2026-10-04 22:57\"}, {\"id\": 3, \"image\": \"templates/media/portfolio/01M4BKM2GD0KJX0931Q7E5E41D.jpg\", \"title\": \"The Building Your Corporate Identity from Play\", \"title_link\": \"#\", \"button_link\": \"#\", \"button_text\": \"Read More\", \"description\": \"The phrasal sequence of the is now so that many campaign and benefit\", \"published_at\": \"2026-09-28 22:57\"}], \"heading\": \"Latest News\", \"is_active\": true, \"description\": \"Launch your campaign and benefit from our expertise on designing and managing conversion centered Tailwind CSS html page\", \"section_title\": \"Blog\"}}, \"type\": \"play.blog\"}, {\"data\": {\"pricing\": {\"items\": [{\"name\": \"Basic\", \"price\": 10, \"title\": \"Basic features for up to 10 users.\", \"features\": [{\"icon\": \"uni-check-circle-o\", \"feature\": \"Complete documentation\"}, {\"icon\": \"uni-check-circle-o\", \"feature\": \"Working materials in Figma\"}, {\"icon\": \"uni-check-circle-o\", \"feature\": \"100GB cloud storage\"}, {\"icon\": \"uni-check-circle-o\", \"feature\": \"500 team members\"}], \"button_link\": \"#\", \"button_text\": \"Signup Now\"}, {\"name\": \"Business\", \"price\": 99, \"title\": \"Basic features for up to 30 users.\", \"features\": [{\"icon\": \"uni-check-circle-o\", \"feature\": \"Complete documentation\"}, {\"icon\": \"uni-check-circle-o\", \"feature\": \"Working materials in Figma\"}, {\"icon\": \"uni-check-circle-o\", \"feature\": \"100GB cloud storage\"}, {\"icon\": \"uni-check-circle-o\", \"feature\": \"500 team members\"}], \"button_link\": \"#\", \"button_text\": \"Signup Now\"}, {\"name\": \"Professional\", \"price\": 299, \"title\": \"Basic features for up to 100 users.\", \"features\": [{\"icon\": \"uni-check-circle-o\", \"feature\": \"Complete documentation\"}, {\"icon\": \"uni-check-circle-o\", \"feature\": \"Working materials in Figma\"}, {\"icon\": \"uni-check-circle-o\", \"feature\": \"100GB cloud storage\"}, {\"icon\": \"uni-check-circle-o\", \"feature\": \"500 team members\"}], \"button_link\": \"#\", \"button_text\": \"Signup Now\"}], \"heading\": \"Comfortable Rates\", \"is_active\": true, \"description\": \"Launch your campaign and benefit from our expertise on designing and managing conversion centered Tailwind CSS html page\", \"footer_text\": \"No credit card required\", \"section_title\": \"Pricing\"}}, \"type\": \"play.pricing\"}, {\"data\": {\"team\": {\"items\": [{\"name\": \"Calvin Carlo\", \"image\": \"templates/media/team/01M4BKM2GD0KJX0931Q7E5E41E.png\", \"title\": \"Designer\", \"title_link\": \"#\"}, {\"name\": \"Aliana Rosy\", \"image\": \"templates/media/team/01M4BKM2GD0KJX0931Q7E5E41F.png\", \"title\": \"Designer\", \"title_link\": \"#\"}, {\"name\": \"Sofia Razaq\", \"image\": \"templates/media/team/01M4BKM2GD0KJX0931Q7E5E41G.png\", \"title\": \"Designer\", \"title_link\": \"#\"}, {\"name\": \"Micheal Carlo\", \"image\": \"templates/media/team/01M4BKM2GEKC7H9R0VNQKTKBZ4.png\", \"title\": \"Designer\", \"title_link\": \"#\"}], \"clients\": [{\"alt\": \"Amazon\", \"image\": \"templates/media/clients/01M4BKM2GEKC7H9R0VNQKTKBZ5.svg\"}, {\"alt\": \"Google\", \"image\": \"templates/media/clients/01M4BKM2GEKC7H9R0VNQKTKBZ6.svg\"}, {\"alt\": \"Lenovo\", \"image\": \"templates/media/clients/01M4BKM2GEKC7H9R0VNQKTKBZ7.svg\"}, {\"alt\": \"Paypal\", \"image\": \"templates/media/clients/01M4BKM2GFPMAQERV3T0TRY17M.svg\"}, {\"alt\": \"Shopify\", \"image\": \"templates/media/clients/01M4BKM2GFPMAQERV3T0TRY17N.svg\"}, {\"alt\": \"Whatsapp\", \"image\": \"templates/media/clients/01M4BKM2GFPMAQERV3T0TRY17P.svg\"}], \"heading\": \"Our Creative Team\", \"counters\": [{\"title\": \"Projects\", \"number\": 3, \"symbol\": \"+\", \"target\": \"40\"}, {\"title\": \"Clients\", \"number\": 1, \"symbol\": \"+\", \"target\": \"200\"}, {\"title\": \"Members\", \"number\": 200, \"symbol\": \"K\", \"target\": \"457\"}, {\"title\": \"Employee\", \"number\": 100, \"symbol\": \"+\", \"target\": \"150\"}], \"is_active\": true, \"description\": \"Launch your campaign and benefit from our expertise on designing and managing conversion centered Tailwind CSS html page\", \"social_links\": [{\"icon\": \"uni-facebook-f-o\", \"link\": \"#\"}, {\"icon\": \"uni-instagram-o\", \"link\": \"#\"}, {\"icon\": \"uni-twitter-o\", \"link\": \"#\"}], \"section_title\": \"Team\"}}, \"type\": \"play.team\"}, {\"data\": {\"meta\": {\"email\": \"support@website.com\", \"title\": \"Play - Laravel 12 Landing Page Template\", \"author\": \"Website Name\", \"favicon\": \"templates/media/meta/01M4BJCXAT37MR5DD7BBV4VVQH.ico\", \"version\": \"2.1.0\", \"website\": \"https://website.com\", \"keywords\": [\"Onepage\", \"creative\", \"modern\", \"Tailwind CSS\", \"multipurpose\", \"clean\"], \"is_active\": true, \"description\": \"Responsive Tailwind CSS Template\"}}, \"type\": \"play.meta\"}, {\"data\": {\"brands\": {\"logos\": [{\"alt\": \"Ayroui\", \"link\": \"#\", \"image_dark\": \"templates/play/assets/images/brands/ayroui-white.svg\", \"image_light\": \"templates/play/assets/images/brands/ayroui.svg\"}, {\"alt\": \"Graygrids\", \"link\": \"#\", \"image_dark\": \"templates/play/assets/images/brands/graygrids-white.svg\", \"image_light\": \"templates/play/assets/images/brands/graygrids.svg\"}, {\"alt\": \"Lineicons\", \"link\": \"#\", \"image_dark\": \"templates/play/assets/images/brands/lineicons-white.svg\", \"image_light\": \"templates/play/assets/images/brands/lineicons.svg\"}, {\"alt\": \"Uideck\", \"link\": \"#\", \"image_dark\": \"templates/play/assets/images/brands/uideck-white.svg\", \"image_light\": \"templates/play/assets/images/brands/uideck.svg\"}, {\"alt\": \"Tailgrids\", \"link\": \"#\", \"image_dark\": \"templates/play/assets/images/brands/tailgrids-white.svg\", \"image_light\": \"templates/play/assets/images/brands/tailgrids.svg\"}], \"heading\": \"Our Works & Projects\", \"is_active\": true, \"description\": \"Launch your campaign and benefit from our expertise on designing and managing conversion centered Tailwind CSS html page\", \"section_title\": \"Brands\"}}, \"type\": \"play.brands\"}, {\"data\": {\"contact\": {\"email\": \"contact@example.com\", \"phone\": \"+152 534-468-854\", \"address\": \"C/54 Northwest Freeway, Suite 558, Houston, USA 485\", \"heading\": \"Our Location\", \"website\": \"https://example.com\", \"heading2\": \"How Can We Help?\", \"is_active\": true, \"description\": \"Let\'s talk about your project!\", \"section_name\": \"Contact Us\", \"autoresponder\": {\"cc\": \"cc@example.com\", \"subject\": \"New Contact Form Submission\", \"to_name\": \"John Doe\", \"reply_to\": \"reply@example.com\", \"to_email\": \"info@example.com\", \"from_name\": \"John Doe\", \"from_email\": \"noreply@example.com\"}}}, \"type\": \"play.contact\"}, {\"data\": {\"smtp\": {\"host\": \"smtp.mailgun.org\", \"port\": 587, \"password\": \"demo@domain.com\", \"username\": \"demo@domain.com\", \"from_name\": \"My Company\", \"is_active\": true, \"encryption\": \"tls\", \"from_email\": \"demo@domain.com\", \"test_email\": \"demo@domain.com\"}}, \"type\": \"smtp\"}, {\"data\": {\"footer\": {\"blog\": \"Latest blog\", \"logo\": \"templates/media/footer/01M4Z65T8RTZC76YXCR6PMP7P2.svg\", \"heading\": \"We create digital experiences for brands and companies by using technology.\", \"about_us\": \"About Us\", \"features\": \"Features\", \"products\": \"Our Products\", \"is_active\": true, \"logo_link\": \"#\", \"blog_links\": [{\"image\": \"templates/play/assets/images/blog/blog-footer-01.jpg\", \"title\": \"I think really important to design with...\", \"title_link\": \"#blog\"}, {\"image\": \"templates/play/assets/images/blog/blog-footer-02.jpg\", \"title\": \"The rise of E-commerce...\", \"title_link\": \"#blog\"}], \"about_links\": [{\"title\": \"Home\", \"title_link\": \"#home\"}, {\"title\": \"Features\", \"title_link\": \"#Features\"}, {\"title\": \"About\", \"title_link\": \"#about\"}, {\"title\": \"Testimonial\", \"title_link\": \"#testimonial\"}], \"legal_notice\": \"Legal notice\", \"social_links\": [{\"icon\": \"uni-linkedin-o\", \"title\": \"Linkedin\", \"title_link\": \"#\"}, {\"icon\": \"uni-facebook-f-o\", \"title\": \"Facebook\", \"title_link\": \"#\"}, {\"icon\": \"uni-instagram-o\", \"title\": \"Instagram\", \"title_link\": \"#\"}, {\"icon\": \"uni-twitter-o\", \"title\": \"Twitter\", \"title_link\": \"#\"}, {\"icon\": \"uni-envelope-o\", \"title\": \"Email\", \"title_link\": \"#\"}], \"terms_service\": \"Terms of service\", \"copyright_link\": \"https://tailgrids.com\", \"copyright_text\": \"Designed & Developed by TailGrids & UIdeck\", \"features_links\": [{\"title\": \"How it works\", \"title_link\": \"#\"}, {\"title\": \"Privacy policy\", \"title_link\": \"#\"}, {\"title\": \"Terms of Service\", \"title_link\": \"#\"}, {\"title\": \"Refund policy\", \"title_link\": \"#\"}], \"privacy_policy\": \"Privacy Policy\", \"products_links\": [{\"title\": \"LineIcons\", \"title_link\": \"#\"}, {\"title\": \"Ecommerce HTML\", \"title_link\": \"#\"}, {\"title\": \"TailAdmin\", \"title_link\": \"#\"}, {\"title\": \"PlainAdmin\", \"title_link\": \"#\"}], \"legal_notice_link\": \"#\", \"terms_service_link\": \"#\", \"privacy_policy_link\": \"#\"}}, \"type\": \"play.footer\"}]', NULL, '2026-10-07 13:15:58', '2026-10-16 02:07:07'),
(2, 1, 'Folio', 'folio', 'folio', '[{\"data\": {\"navmain\": {\"logo\": \"templates/media/navbar/01M4MEQAY0CCZM99Z4KBJNZAYA.svg\", \"is_active\": true, \"menu_items\": [{\"icon\": \"heroicon-o-home\", \"type\": \"home\", \"title\": \"Home\", \"is_active\": true, \"nav_number\": 0, \"title_link\": \"#home\"}, {\"icon\": \"heroicon-o-user\", \"type\": \"about\", \"title\": \"About\", \"is_active\": true, \"nav_number\": 1, \"title_link\": \"#about\"}, {\"icon\": \"heroicon-o-sparkles\", \"type\": \"services\", \"title\": \"Services\", \"is_active\": true, \"nav_number\": 2, \"title_link\": \"#services\"}, {\"icon\": \"heroicon-o-academic-cap\", \"type\": \"skills\", \"title\": \"Skills\", \"is_active\": false, \"nav_number\": 3, \"title_link\": \"#skills\"}, {\"icon\": \"heroicon-o-document-text\", \"type\": \"resume\", \"title\": \"Resume\", \"is_active\": false, \"nav_number\": 4, \"title_link\": \"#resume\"}, {\"icon\": \"heroicon-o-briefcase\", \"type\": \"portfolio\", \"title\": \"Portfolio\", \"is_active\": true, \"nav_number\": 5, \"title_link\": \"#portfolio\"}, {\"icon\": \"heroicon-o-newspaper\", \"type\": \"blog\", \"title\": \"Blog\", \"is_active\": true, \"nav_number\": 6, \"title_link\": \"#blog\"}, {\"icon\": \"heroicon-o-chat-bubble-left-ellipsis\", \"type\": \"testimonial\", \"title\": \"Testimonials\", \"is_active\": true, \"nav_number\": 7, \"title_link\": \"#testimonials\"}, {\"icon\": \"heroicon-o-envelope\", \"type\": \"contact\", \"title\": \"Contact\", \"is_active\": true, \"nav_number\": 8, \"title_link\": \"#contact\"}], \"social_links\": [{\"icon\": \"uni-linkedin-o\", \"title\": \"Linkedin\", \"title_link\": \"https://www.linkedin.com/company/folio\"}, {\"icon\": \"uni-facebook-f-o\", \"title\": \"Facebook\", \"title_link\": \"https://www.facebook.com/folio\"}, {\"icon\": \"uni-twitter-o\", \"title\": \"Twitter\", \"title_link\": \"https://www.twitter.com/folio\"}, {\"icon\": \"uni-instagram-o\", \"title\": \"Instagram\", \"title_link\": \"https://www.instagram.com/folio\"}], \"is_social_links_active\": true}}, \"type\": \"folio.navmain\"}, {\"data\": {\"hero\": {\"h1_part1\": \"I Craft The\", \"h1_part2\": \"Digital Landscape\", \"partners\": [{\"link\": \"https://example.com\", \"logo\": null, \"name\": \"Adobaco Ltd.\"}, {\"link\": \"https://example.com\", \"logo\": null, \"name\": \"Poppers Ltd.\"}, {\"link\": \"https://example.com\", \"logo\": null, \"name\": \"Octopus Ltd.\"}, {\"link\": \"https://example.com\", \"logo\": null, \"name\": \"Dulalix Ltd.\"}, {\"link\": \"https://example.com\", \"logo\": null, \"name\": \"Poppers Ltd.\"}], \"is_active\": true, \"avatardark\": null, \"text_part1\": \"I am a\", \"text_part2\": \"Frontend Developer\", \"text_part3\": \"at heart and, i create features that are best suited for the job at hand.\", \"avatarlight\": null, \"button_link\": \"#contact\", \"button_text\": \"Hire Me\", \"availablity1\": \"Available for work\", \"availablity2\": \"Full Time Job\", \"section_name\": null, \"slider_title\": \"Trusted Partners\"}}, \"type\": \"folio.hero\"}, {\"data\": {\"services\": {\"items\": [{\"icon\": \"gmdi-design-services-o\", \"image\": null, \"title\": \"UI/UX Design\", \"number\": \"01\", \"description\": \"I design products that are more than pretty. I make them shippable.\"}, {\"icon\": \"gmdi-web-o\", \"image\": null, \"title\": \"Web Development\", \"number\": \"02\", \"description\": \"I design products that are more than pretty. I make them shippable.\"}, {\"icon\": \"heroicon-o-rocket-launch\", \"image\": null, \"title\": \"SEO / Marketing\", \"number\": \"03\", \"description\": \"I design products that are more than pretty. I make them shippable.\"}, {\"icon\": \"heroicon-m-megaphone\", \"image\": null, \"title\": \"Branding & Strategy\", \"number\": \"04\", \"description\": \"I design products that are more than pretty. I make them shippable.\"}], \"heading\": \"SERVICES\", \"is_active\": true, \"description\": \"I design products that are more than pretty. I make them shippable and usable, tempor non mollit dolor et do aute\", \"section_name\": \"My Services\"}}, \"type\": \"folio.services\"}, {\"data\": {\"blog\": {\"posts\": [{\"date\": \"03 May 2025\", \"link\": \"#\", \"image\": \"templates/folio/assets/images/blog/blog-01.jpg\", \"intro\": \"Elevate your mornings with perfectly brewed coffee\", \"title\": \"Elevate your mornings with perfectly brewed coffee\", \"category\": \"UI Design\", \"category_link\": \"#\"}, {\"date\": \"01 May 2025\", \"link\": \"#\", \"image\": \"templates/folio/assets/images/blog/blog-02.jpg\", \"intro\": \"Elevate your mornings with perfectly brewed coffee\", \"title\": \"Mastering the clock: A guide to time management\", \"category\": \"Time Management\", \"category_link\": \"#\"}, {\"date\": \"29 Apr 2025\", \"link\": \"#\", \"image\": \"templates/folio/assets/images/blog/blog-03.jpg\", \"intro\": \"Elevate your mornings with perfectly brewed coffee\", \"title\": \"Homeward bound: Crafting a productive home office\", \"category\": \"Home Office\", \"category_link\": \"#\"}], \"heading\": \"Thoughts\", \"is_active\": true, \"description\": \"I design products that are more than pretty. I make them shippable and usable, tempor non mollit dolor et do aute\", \"section_name\": \"From the blog\", \"allposts_link\": \"#\"}}, \"type\": \"folio.blog\"}, {\"data\": {\"about\": {\"image\": \"media/templates/folio/about/01M4Q0WM3KFE82AA0BS09HH4J9.jpg\", \"skills\": [{\"skill\": \"HTML5 & CSS3\", \"proficiency\": 94}, {\"skill\": \"Bootstrap\", \"proficiency\": 98}, {\"skill\": \"TailwindCSS\", \"proficiency\": 90}, {\"skill\": \"Alpine.js\", \"proficiency\": 95}, {\"skill\": \"Figma\", \"proficiency\": 90}, {\"skill\": \"JavaScript\", \"proficiency\": 95}, {\"skill\": \"Symfony\", \"proficiency\": 90}, {\"skill\": \"Webflow\", \"proficiency\": 85}], \"heading\": \"A bit about\", \"contacts\": [{\"type\": \"Phone\", \"value\": \"+(2) 870 174 302\"}, {\"type\": \"Email\", \"value\": \"info@example.com\"}, {\"type\": \"Skype\", \"value\": \"brown@com\"}, {\"type\": \"Github\", \"value\": \"github.com/user\"}, {\"type\": \"Language\", \"value\": \"English, Dutch, Spanish\"}], \"counters\": [{\"label\": \"Years Of Experience\", \"number\": 185}, {\"label\": \"Handled Projects\", \"number\": 12}, {\"label\": \"Open Source Libraries\", \"number\": 5}, {\"label\": \"Awards Won\", \"number\": 18}], \"heading2\": \"who I am\", \"is_active\": true, \"description\": \"I\'m Eliott, a freelance designer and frontend developer based in Paris with 5 years of experience shipping digital products for startups, agencies, and scale-ups across Europe. I thrive at the intersection of great design and clean code.\", \"description2\": \"I believe great interfaces are invisible — they get out of the user\'s way. My work is fast, accessible and built to last. When I\'m not coding, you\'ll find me hiking or hunting for a good espresso.\", \"section_name\": \"About Me\"}}, \"type\": \"folio.about\"}, {\"data\": {\"portfolio\": {\"items\": [{\"link\": \"#\", \"tags\": [\"tailwindcss\", \"alpinejs\", \"laravel\", \"livewire\", \"Figma\"], \"image\": \"templates/folio/assets/images/portfolio/1.jpg\", \"title\": \"Project Title\", \"category\": \"Branding\", \"col_span\": \"col-span-2\", \"description\": \"I design products that are more than pretty. I make them shippable and usable, tempor non mollit dolor et do aute\", \"category_link\": \"#\"}, {\"link\": \"#\", \"tags\": [\"tailwindcss\", \"alpinejs\", \"laravel\", \"livewire\"], \"image\": \"templates/folio/assets/images/portfolio/2.jpg\", \"title\": \"Project Title\", \"category\": \"Branding\", \"col_span\": \"col-span-1\", \"description\": \"I design products that are more than pretty. I make them shippable and usable, tempor non mollit dolor et do aute\", \"category_link\": \"#\"}, {\"link\": \"#\", \"tags\": [\"tailwindcss\", \"laravel\", \"livewire\", \"Figma\"], \"image\": \"templates/folio/assets/images/portfolio/3.jpg\", \"title\": \"Project Title\", \"category\": \"Branding\", \"col_span\": \"col-span-1\", \"description\": \"I design products that are more than pretty. I make them shippable and usable, tempor non mollit dolor et do aute\", \"category_link\": \"#\"}, {\"link\": \"#\", \"tags\": [\"tailwindcss\", \"NodeJs\", \"laravel\", \"livewire\", \"Figma\"], \"image\": \"templates/folio/assets/images/portfolio/4.jpg\", \"title\": \"Project Title\", \"category\": \"Branding\", \"col_span\": \"col-span-1\", \"description\": \"I design products that are more than pretty. I make them shippable and usable, tempor non mollit dolor et do aute\", \"category_link\": \"#\"}], \"heading\": \"PORTFOLIO\", \"is_active\": true, \"description\": \"I design products that are more than pretty. I make them shippable and usable, tempor non mollit dolor et do aute\", \"section_name\": \"Featured Projects\", \"allprojects_link\": \"#\"}}, \"type\": \"folio.portfolio\"}, {\"data\": {\"testimonial\": {\"posts\": [{\"image\": \"templates/media/testimonial/01M4SG4YRY530YBMH0SE419YFN.jpg\", \"author\": \"Thomas Israel\", \"rating\": \"5\", \"content\": \"It seems that only fragments of the original text remain in the Lorem Ipsum texts used today.\", \"author_position\": \"Staff Engineer, Algolia\"}, {\"image\": \"templates/media/testimonial/01M4SG4YRY530YBMH0SE419YFP.jpg\", \"author\": \"Carl Oliver\", \"rating\": \"5\", \"content\": \"The most well-known dummy text is the \'Lorem Ipsum\', which is said to have originated in the 16th century.\", \"author_position\": \"Staff Engineer, Algolia\"}, {\"image\": \"templates/media/testimonial/01M4SG4YRZPCR4E5SE4DXX8BXH.jpg\", \"author\": \"Barbara McIntosh\", \"rating\": \"5\", \"content\": \"One disadvantage of Lorum Ipsum is that in Latin certain letters appear more frequently than others.\", \"author_position\": \"Staff Engineer, Algolia\"}], \"heading\": \"Social proof\", \"is_active\": true, \"description\": \"I design products that are more than pretty. I make them shippable and usable, tempor non mollit dolor et do aute\", \"section_name\": \"What clients say\"}}, \"type\": \"folio.testimonial\"}, {\"data\": {\"contact\": {\"items\": [{\"url\": \"user@domain.com\", \"icon\": \"uni-envelope-o\", \"type\": \"email\"}, {\"url\": \"https://linkedin.com\", \"icon\": \"uni-linkedin-o\", \"type\": \"linkedin\"}, {\"url\": \"https://github.com\", \"icon\": \"uni-github-o\", \"type\": \"github\"}], \"heading\": \"Let\'s work\", \"heading2\": \"together\", \"is_active\": true, \"description\": \"I\'m open to UI/UX and frontend missions, short or long-term. Landing page, full product redesign, or just a second pair of eyes — let\'s talk.\", \"section_name\": \"Get in touch\"}}, \"type\": \"folio.contact\"}]', NULL, '2026-10-10 23:56:03', '2026-10-14 02:43:29');

-- --------------------------------------------------------

--
-- Table structure for table `pages_empty`
--

CREATE TABLE `pages_empty` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `layout` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default',
  `blocks` json NOT NULL,
  `parent_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages_live`
--

CREATE TABLE `pages_live` (
  `id` bigint UNSIGNED NOT NULL,
  `page_id` bigint UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` json DEFAULT NULL,
  `version` bigint UNSIGNED NOT NULL DEFAULT '1',
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages_publish_logs`
--

CREATE TABLE `pages_publish_logs` (
  `id` bigint UNSIGNED NOT NULL,
  `page_id` bigint UNSIGNED NOT NULL,
  `version` bigint UNSIGNED NOT NULL,
  `diff` json DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
  `meta` json DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('TLktJPSU95JT7IwAjjUZMKxpsfgza1BH7dtnHdKf', 1, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', 'YTo4OntzOjY6Il90b2tlbiI7czo0MDoiVmk1Rkk4SU5JaUlQNkJJcnJ2MzlXWEUzY3JPN3NTNGpuQzNib2JDbCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzc6Imh0dHBzOi8vbGFuZGluZ3BhZ2VzLnRlc3QvYWRtaW4vcGFnZXMiO3M6NToicm91dGUiO3M6MzY6ImZpbGFtZW50LmFkbWluLnJlc291cmNlcy5wYWdlcy5pbmRleCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjY0OiIzMmYxOTlkODNkMDRhOGZlNTFhMjgwNDBkNjYwZmY1NTRiZDg0MjQxNDkyOTlkNzM3YzhkNzU1NDQzM2RjMWJlIjtzOjY6InRhYmxlcyI7YToxOntzOjQwOiI0NTk2Y2RkOTU4MGFlNDRjODBlMzk5YTFmODUwYTM1YV9jb2x1bW5zIjthOjQ6e2k6MDthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czo1OiJ0aXRsZSI7czo1OiJsYWJlbCI7czo1OiJUaXRsZSI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjE7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MzoidXJsIjtzOjU6ImxhYmVsIjtzOjM6IlVSTCI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjE7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtiOjA7fWk6MjthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czo2OiJsYXlvdXQiO3M6NToibGFiZWwiO3M6NjoiTGF5b3V0IjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MTtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO2I6MDt9aTozO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjEyOiJwYXJlbnQudGl0bGUiO3M6NToibGFiZWwiO3M6NjoiUGFyZW50IjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MDtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MTtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO2I6MTt9fX1zOjg6ImZpbGFtZW50IjthOjA6e319', 1792129837),
('XFtVAYw6klROSU48n8L19iIx4wuAij72PIjgWmtj', 1, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/154.0.0.0 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiMUlwUUdCaUtKWTh3aXdHNjlqZzJQN1o0N1o0a1h4NEp4dU1ESTU3WiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjM3OiJodHRwczovL2xhbmRpbmdwYWdlcy50ZXN0L2FkbWluL3BhZ2VzIjtzOjU6InJvdXRlIjtzOjM2OiJmaWxhbWVudC5hZG1pbi5yZXNvdXJjZXMucGFnZXMuaW5kZXgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO3M6MTc6InBhc3N3b3JkX2hhc2hfd2ViIjtzOjY0OiIzMmYxOTlkODNkMDRhOGZlNTFhMjgwNDBkNjYwZmY1NTRiZDg0MjQxNDkyOTlkNzM3YzhkNzU1NDQzM2RjMWJlIjtzOjY6InRhYmxlcyI7YToxOntzOjQwOiI0NTk2Y2RkOTU4MGFlNDRjODBlMzk5YTFmODUwYTM1YV9jb2x1bW5zIjthOjQ6e2k6MDthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czo1OiJ0aXRsZSI7czo1OiJsYWJlbCI7czo1OiJUaXRsZSI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjE7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MzoidXJsIjtzOjU6ImxhYmVsIjtzOjM6IlVSTCI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjE7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtiOjA7fWk6MjthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czo2OiJsYXlvdXQiO3M6NToibGFiZWwiO3M6NjoiTGF5b3V0IjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MTtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO2I6MDt9aTozO2E6Nzp7czo0OiJ0eXBlIjtzOjY6ImNvbHVtbiI7czo0OiJuYW1lIjtzOjEyOiJwYXJlbnQudGl0bGUiO3M6NToibGFiZWwiO3M6NjoiUGFyZW50IjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MDtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MTtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO2I6MTt9fX19', 1792137952);

-- --------------------------------------------------------

--
-- Table structure for table `short_urls`
--

CREATE TABLE `short_urls` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hit_count` bigint UNSIGNED NOT NULL DEFAULT '0',
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `theme` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'default',
  `theme_color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `theme`, `theme_color`) VALUES
(1, 'admin', 'admin@admin.com', NULL, '$2y$12$MsvZzUmPzrO1B.cDHfzLNuA8yUIzkuC/jZ91PuVWgcja..Zjq2Bz2', NULL, '2025-05-23 08:00:21', '2026-10-07 08:01:42', 'default', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `domains`
--
ALTER TABLE `domains`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `domains_domain_unique` (`domain`);

--
-- Indexes for table `emails`
--
ALTER TABLE `emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mailables`
--
ALTER TABLE `mailables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mailables_mail_id_foreign` (`mail_id`),
  ADD KEY `mailables_mailable_type_mailable_id_index` (`mailable_type`,`mailable_id`);

--
-- Indexes for table `mails`
--
ALTER TABLE `mails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mails_uuid_index` (`uuid`),
  ADD KEY `mails_mail_class_index` (`mail_class`);

--
-- Indexes for table `mail_attachments`
--
ALTER TABLE `mail_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mail_attachments_mail_id_foreign` (`mail_id`);

--
-- Indexes for table `mail_events`
--
ALTER TABLE `mail_events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mail_events_mail_id_foreign` (`mail_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_parent_id_unique` (`slug`,`parent_id`),
  ADD KEY `pages_parent_id_foreign` (`parent_id`),
  ADD KEY `pages_title_index` (`title`),
  ADD KEY `pages_layout_index` (`layout`);

--
-- Indexes for table `pages_empty`
--
ALTER TABLE `pages_empty`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pages_slug_parent_id_unique` (`slug`,`parent_id`),
  ADD KEY `pages_parent_id_foreign` (`parent_id`),
  ADD KEY `pages_title_index` (`title`),
  ADD KEY `pages_layout_index` (`layout`);

--
-- Indexes for table `pages_live`
--
ALTER TABLE `pages_live`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pages_live_page_id_index` (`page_id`),
  ADD KEY `pages_live_slug_index` (`slug`);

--
-- Indexes for table `pages_publish_logs`
--
ALTER TABLE `pages_publish_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pages_publish_logs_page_id_index` (`page_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `short_urls`
--
ALTER TABLE `short_urls`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `short_urls_code_unique` (`code`);

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
-- AUTO_INCREMENT for table `domains`
--
ALTER TABLE `domains`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mailables`
--
ALTER TABLE `mailables`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mails`
--
ALTER TABLE `mails`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mail_attachments`
--
ALTER TABLE `mail_attachments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mail_events`
--
ALTER TABLE `mail_events`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pages_empty`
--
ALTER TABLE `pages_empty`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages_live`
--
ALTER TABLE `pages_live`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages_publish_logs`
--
ALTER TABLE `pages_publish_logs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `short_urls`
--
ALTER TABLE `short_urls`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mailables`
--
ALTER TABLE `mailables`
  ADD CONSTRAINT `mailables_mail_id_foreign` FOREIGN KEY (`mail_id`) REFERENCES `mails` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mail_attachments`
--
ALTER TABLE `mail_attachments`
  ADD CONSTRAINT `mail_attachments_mail_id_foreign` FOREIGN KEY (`mail_id`) REFERENCES `mails` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mail_events`
--
ALTER TABLE `mail_events`
  ADD CONSTRAINT `mail_events_mail_id_foreign` FOREIGN KEY (`mail_id`) REFERENCES `mails` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pages_empty`
--
ALTER TABLE `pages_empty`
  ADD CONSTRAINT `pages_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `pages_empty` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
