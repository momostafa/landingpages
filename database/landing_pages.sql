-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 15, 2026 at 03:41 PM
-- Server version: 8.0.40
-- PHP Version: 8.4.27

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
-- Table structure for table `agent_conversations`
--

CREATE TABLE `agent_conversations` (
  `id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agent_conversation_messages`
--

CREATE TABLE `agent_conversation_messages` (
  `id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conversation_id` varchar(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `agent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachments` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tool_calls` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tool_results` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `usage` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `agent_prompts`
--

CREATE TABLE `agent_prompts` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prompt_blocks` json DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agent_prompts`
--

INSERT INTO `agent_prompts` (`id`, `user_id`, `title`, `prompt_blocks`, `description`, `content_type`, `created_at`, `updated_at`) VALUES
(28, 1, 'Rewrite', '[{\"data\": {\"tone\": \"casual\", \"examples\": \"<p>Example: Input -&gt; 500-word blog post -&gt; Output: 1000-word blog post</p>\", \"is_active\": true, \"prompt_id\": 28, \"task_type\": \"rewrite\", \"constraints\": [{\"constraint\": \"Maintain factual accuracy without interpretation.\"}], \"task_prompt\": \"<p>Your sole task is to rewrite the user&#039;s content.</p><ul><li><p>The user wants to <span data-type=\\\"mention\\\" data-id=\\\"percent_direction\\\" data-label=\\\"percent_direction{{increase}}\\\" data-char=\\\"@\\\">@percent_direction{{increase}}</span> the content by: <span data-type=\\\"mention\\\" data-id=\\\"limit_percent\\\" data-label=\\\"limit_percent{{20}}\\\" data-char=\\\"@\\\">@limit_percent{{20}}</span> <span data-type=\\\"mention\\\" data-id=\\\"limit_length_by\\\" data-label=\\\"limit_length_by{{percent}}\\\" data-char=\\\"@\\\">@limit_length_by{{percent}}</span></p></li><li><p>The style must match the existing portfolio: professional, results-oriented, and tech-savvy.</p></li></ul>\", \"limit_percent\": 20, \"system_prompt\": \"<p>You are a Generalist Expert Copywriter. Your primary goal is to assist the user with <span data-type=\\\"mention\\\" data-id=\\\"task_type\\\" data-label=\\\"task_type{{rewrite}}\\\" data-char=\\\"@\\\">@task_type{{rewrite}}</span> tasks in a <span data-type=\\\"mention\\\" data-id=\\\"tone\\\" data-label=\\\"tone{{casual}}\\\" data-char=\\\"@\\\">@tone{{casual}}</span> tone</p>\", \"constraint_main\": \"CRITICAL CONSTRAINTS: You MUST adhere to the following rules:\", \"limit_length_by\": \"percent\", \"constraint_footer\": \"<p>OUTPUT CONSTRAINT:</p><ol start=\\\"1\\\"><li><p>You must return ONLY a valid JSON object.</p></li></ol><ol start=\\\"2\\\"><li><p>You must return 3 options for the user to chose from.</p></li><li><p>Do not include any introductory text, explanations, or markdown code blocks (like ```json).</p></li><li><p>The JSON structure must strictly follow the provided schema.</p></li><li><p>If you cannot fulfill the request within the schema, return an empty object {}.</p></li></ol>\", \"percent_direction\": \"increase\", \"system_prompt_final\": \"You are a Generalist Expert Copywriter. Your primary goal is to assist the user with rewrite tasks in a casual tone\\n\\n**Your sole task** is to rewrite the user\'s content.\\n\\nThe user wants to increase the content by: 20 percent\\n\\nThe style must match the existing portfolio: professional, results-oriented, and tech-savvy.\\n\\n**CRITICAL CONSTRAINTS**: You MUST adhere to the following rules:\\n\\n- Maintain factual accuracy without interpretation.\", \"system_prompt_composer\": \"<p><span data-type=\\\"mention\\\" data-id=\\\"system_prompt\\\" data-label=\\\"system_prompt{{&lt;p&gt;You are a Generalist Expert Copywriter. Your primary goal is to assist the user with &lt;span data-type=&quot;mention&quot; data-id=&quot;task_type&quot; data-label=&quot;task_type{{rewrite}}&quot; data-char=&quot;@&quot;&gt;@task_type{{rewrite}}&lt;/span&gt; tasks in a &lt;span data-type=&quot;mention&quot; data-id=&quot;tone&quot; data-label=&quot;tone{{casual}}&quot; data-char=&quot;@&quot;&gt;@tone{{casual}}&lt;/span&gt; tone&lt;/p&gt;}}\\\" data-char=\\\"@\\\">@system_prompt{{&lt;p&gt;You are a Generalist Expert Copywriter. Your primary goal is to assist the user with &lt;span data-type=&quot;mention&quot; data-id=&quot;task_type&quot; data-label=&quot;task_type{{rewrite}}&quot; data-char=&quot;@&quot;&gt;@task_type{{rewrite}}&lt;/span&gt; tasks in a &lt;span data-type=&quot;mention&quot; data-id=&quot;tone&quot; data-label=&quot;tone{{casual}}&quot; data-char=&quot;@&quot;&gt;@tone{{casual}}&lt;/span&gt; tone&lt;/p&gt;}}</span></p><p><span data-type=\\\"mention\\\" data-id=\\\"task_prompt\\\" data-label=\\\"task_prompt{{&lt;p&gt;Your sole task is to rewrite the user&amp;#039;s content.&lt;/p&gt;&lt;ul&gt;&lt;li&gt;&lt;p&gt;The user wants to &lt;span data-type=&quot;mention&quot; data-id=&quot;percent_direction&quot; data-label=&quot;percent_direction{{increase}}&quot; data-char=&quot;@&quot;&gt;@percent_direction{{increase}}&lt;/span&gt; the content by: &lt;span data-type=&quot;mention&quot; data-id=&quot;limit_percent&quot; data-label=&quot;limit_percent{{20}}&quot; data-char=&quot;@&quot;&gt;@limit_percent{{20}}&lt;/span&gt; &lt;span data-type=&quot;mention&quot; data-id=&quot;limit_length_by&quot; data-label=&quot;limit_length_by{{percent}}&quot; data-char=&quot;@&quot;&gt;@limit_length_by{{percent}}&lt;/span&gt;&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;The style must match the existing portfolio: professional, results-oriented, and tech-savvy.&lt;/p&gt;&lt;/li&gt;&lt;/ul&gt;}}\\\" data-char=\\\"@\\\">@task_prompt{{&lt;p&gt;Your sole task is to rewrite the user&amp;#039;s content.&lt;/p&gt;&lt;ul&gt;&lt;li&gt;&lt;p&gt;The user wants to &lt;span data-type=&quot;mention&quot; data-id=&quot;percent_direction&quot; data-label=&quot;percent_direction{{increase}}&quot; data-char=&quot;@&quot;&gt;@percent_direction{{increase}}&lt;/span&gt; the content by: &lt;span data-type=&quot;mention&quot; data-id=&quot;limit_percent&quot; data-label=&quot;limit_percent{{20}}&quot; data-char=&quot;@&quot;&gt;@limit_percent{{20}}&lt;/span&gt; &lt;span data-type=&quot;mention&quot; data-id=&quot;limit_length_by&quot; data-label=&quot;limit_length_by{{percent}}&quot; data-char=&quot;@&quot;&gt;@limit_length_by{{percent}}&lt;/span&gt;&lt;/p&gt;&lt;/li&gt;&lt;li&gt;&lt;p&gt;The style must match the existing portfolio: professional, results-oriented, and tech-savvy.&lt;/p&gt;&lt;/li&gt;&lt;/ul&gt;}}</span></p><p><span data-type=\\\"mention\\\" data-id=\\\"constraint_main\\\" data-label=\\\"constraint_main{{CRITICAL CONSTRAINTS: You MUST adhere to the following rules:}}\\\" data-char=\\\"@\\\">@constraint_main{{CRITICAL CONSTRAINTS: You MUST adhere to the following rules:}}</span></p><p><span data-type=\\\"mention\\\" data-id=\\\"constraints\\\" data-label=\\\"constraints: [{&quot;constraint&quot;:&quot;Maintain factual accuracy without interpretation.&quot;}]\\\" data-char=\\\"@\\\">@constraints: [{&quot;constraint&quot;:&quot;Maintain factual accuracy without interpretation.&quot;}]</span></p><p></p>\"}, \"type\": \"text_generation\"}]', 'Rewrites Text Content', 'text', '2026-11-09 18:09:52', '2026-11-13 02:56:36'),
(29, 1, 'Summarize', '[{\"data\": {\"tone\": \"casual\", \"examples\": \"Input Example: 500-word blog post -&gt; Output Example: 1000-word blog post\", \"is_active\": true, \"prompt_id\": 29, \"task_type\": \"summarize\", \"constraints\": [{\"constraint\": \"Maintain factual accuracy without interpretation.\"}, {\"constraint\": \"Use bullet points for multiple key points.\"}], \"task_prompt\": \"Your sole task is to rewrite the user&#039;s content.\", \"limit_percent\": 10, \"system_prompt\": \"You are a Generalist Expert Copywriter. Your primary goal is to assist the user with [taskType] tasks in a [toneLabel] tone\", \"constraint_main\": \"CRITICAL CONSTRAINTS: You MUST adhere to the following rules:\", \"limit_length_by\": \"percent\", \"constraint_footer\": \"You MUST return a single, valid JSON object that strictly adheres to the provided schema. Do not include any introductory text or explanations outside of the JSON object.\", \"percent_direction\": \"increase\", \"system_prompt_final\": \"\", \"system_prompt_composer\": \"<p></p>\"}, \"type\": \"text_generation\"}]', 'Summarize Text Content', 'text', '2026-11-09 20:36:22', '2026-11-10 02:09:50');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `domain` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dns_ok` tinyint(1) NOT NULL DEFAULT '0',
  `reputation_score` int DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unknown',
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

--
-- Dumping data for table `emails`
--

INSERT INTO `emails` (`id`, `user_id`, `page_id`, `source`, `direction`, `first_name`, `last_name`, `email`, `phone`, `subject`, `message`, `status`, `auto_responder_sent`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'contact_form', 'inbound', 'Mohamed Mostafa', '', 'ms.osman@gmail.com', '+201001066681', '', 'test', 'pending', 0, '2026-10-16 08:49:52', '2026-10-16 08:49:52'),
(2, 1, 2, 'contact_form', 'inbound', 'Mohamed Mostafa', 'Mohamed Mostafa', 'ms.osman@gmail.com', '+201001066681', 'test folio', 'test folio', 'pending', 0, '2026-10-16 08:51:48', '2026-10-16 08:51:48');

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
(22, '2025_08_25_182940_create_landing_pages_table', 7),
(23, '2025_10_16_000000_add_user_id_to_pages_table', 8),
(24, '2026_11_15_000000_create_agent_prompts_table', 9),
(25, '2026_11_15_133920_create_agent_conversations_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
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
(1, 1, 'Play', 'play', 'play', '[{\"data\": {\"navbar\": {\"is_active\": true, \"logo_dark\": \"templates/play/assets/images/logo/logo-white.svg\", \"logo_light\": \"templates/play/assets/images/logo/logo.svg\", \"signin_link\": \"#\", \"signup_link\": \"#\", \"menu_items:ar\": [{\"type\": \"home\", \"title\": \"الرئيسية\", \"is_active\": true, \"title_link\": \"#home\"}, {\"type\": \"about\", \"title\": \"معلومات عنا\", \"is_active\": true, \"title_link\": \"#about\"}, {\"type\": \"features\", \"title\": \"الميزات\", \"is_active\": true, \"title_link\": \"#features\"}, {\"type\": \"pricing\", \"title\": \"الأسعار\", \"is_active\": true, \"title_link\": \"#pricing\"}, {\"type\": \"team\", \"title\": \"الفريق\", \"is_active\": true, \"title_link\": \"#team\"}, {\"type\": \"contact\", \"title\": \"اتصل بنا\", \"is_active\": true, \"title_link\": \"#contact\"}, {\"type\": \"blog\", \"title\": \"المدونة\", \"is_active\": true, \"title_link\": \"#blog\"}], \"menu_items:en\": [{\"type\": \"home\", \"title\": \"Home\", \"is_active\": true, \"title_link\": \"#home\"}, {\"type\": \"about\", \"title\": \"About\", \"is_active\": true, \"title_link\": \"#about\"}, {\"type\": \"features\", \"title\": \"Features\", \"is_active\": true, \"title_link\": \"#features\"}, {\"type\": \"pricing\", \"title\": \"Pricing\", \"is_active\": true, \"title_link\": \"#pricing\"}, {\"type\": \"team\", \"title\": \"Team\", \"is_active\": true, \"title_link\": \"#team\"}, {\"type\": \"contact\", \"title\": \"Contact\", \"is_active\": true, \"title_link\": \"#contact\"}, {\"type\": \"blog\", \"title\": \"Blog\", \"is_active\": true, \"title_link\": \"#blog\"}], \"signin_text:ar\": \"تسجيل الدخول\", \"signin_text:en\": \"Sign In\", \"signup_text:ar\": \"اشتراك\", \"signup_text:en\": \"Sign Up\"}}, \"type\": \"play.navbar\"}, {\"data\": {\"hero\": {\"image\": \"templates/play/assets/images/hero/hero-image.jpg\", \"items:ar\": [{\"icon\": \"devicon-bootstrap\", \"title\": \"Bootstrap\", \"title_link\": \"https://github.com/uideck/play-bootstrap/\"}, {\"icon\": \"devicon-tailwindcss\", \"title\": \"Tailwind\", \"title_link\": \"https://github.com/TailGrids/play-tailwind/\"}, {\"icon\": \"devicon-nodejs\", \"title\": \"NodeJs\", \"title_link\": \"https://github.com/NextJSTemplates/play-nextjs\"}], \"items:en\": [{\"icon\": \"devicon-bootstrap\", \"title\": \"Bootstrap\", \"title_link\": \"https://github.com/uideck/play-bootstrap/\"}, {\"icon\": \"devicon-tailwindcss\", \"title\": \"Tailwind\", \"title_link\": \"https://github.com/TailGrids/play-tailwind/\"}, {\"icon\": \"devicon-nodejs\", \"title\": \"NodeJs\", \"title_link\": \"https://github.com/NextJSTemplates/play-nextjs\"}], \"is_active\": true, \"heading:ar\": \"تقديم أفكار رائعة لك\", \"heading:en\": \"Providing Brilliant Ideas For Your\", \"button_link\": \"#\", \"button_text:ar\": \"حمل الآن\", \"button_text:en\": \"Download Now\", \"description:ar\": \"أطلق حملتك واستفد من خبرتنا في تصميم وإدارة صفحات HTML باستخدام Tailwind CSS والتي تركز على التحويل.\", \"description:en\": \"Launch your campaign and benefit from our expertise on designing and managing conversion centered Tailwind CSS html page.\", \"items_title:ar\": \"مصمم بأحدث التقنيات\", \"items_title:en\": \"Built with latest technology\", \"secondary_button_link\": \"#\", \"secondary_button_text:ar\": \"تابعنا على جيت هاب\", \"secondary_button_text:en\": \"Star on Github\"}}, \"type\": \"play.hero\"}, {\"data\": {\"about\": {\"image_1\": \"templates/play/assets/images/about/about-image-01.jpg\", \"image_2\": \"templates/play/assets/images/about/about-image-02.jpg\", \"is_active\": true, \"heading:ar\": \"مجموعة أدوات رائعة لبناء مواقع ويب من الجيل التالي بشكل أسرع.\", \"heading:en\": \"Brilliant Toolkit to Build Nextgen Website Faster.\", \"button_link\": \"#\", \"button_text:ar\": \"اعرف المزيد\", \"button_text:en\": \"Know More\", \"description:ar\": \"ينصب التركيز الرئيسي على تثقيف الحضور حول أفضل السبل لحماية تطبيقات الأعمال شديدة الحساسية، وذلك من خلال حلقات نقاش تفاعلية وجلسات حوارية يديرها خبراء متخصصون.\\n\\nينصب التركيز الرئيسي على تثقيف الحضور حول أفضل السبل لحماية تطبيقات الأعمال شديدة الحساسية، وذلك من خلال حلقات نقاش تفاعلية.\", \"description:en\": \"The main \'thrust\' is to focus on educating attendees on how to best protect highly vulnerable business applications with interactive panel discussions and roundtables led by subject matter experts.\\n\\nThe main \'thrust\' is to focus on educating attendees on how to best protect highly vulnerable business applications with interactive panel.\", \"experience_years:ar\": \"10\", \"experience_years:en\": \"10\"}}, \"type\": \"play.about\"}, {\"data\": {\"features\": {\"items:ar\": [{\"icon\": \"uni-adjust-circle-o\", \"title\": \"نمِّ أعمالك\", \"title_link\": \"#\", \"button_link\": \"#\", \"button_text\": \"اقرأ المزيد\", \"description\": \"تسلسل العبارات في الـ الآن بحيث يمكن للعديد من الحملات والاستفادة منها\"}, {\"icon\": \"uni-circuit-o\", \"title\": \"زيادة المبيعات\", \"title_link\": \"#\", \"button_link\": \"#\", \"button_text\": \"اقرأ المزيد\", \"description\": \"تسلسل العبارات في الـ الآن بحيث يمكن للعديد من الحملات والاستفادة منها\"}, {\"icon\": \"uni-fire-o\", \"title\": \"يتم التعامل معه بواسطة خبير\", \"title_link\": \"#\", \"button_link\": \"#\", \"button_text\": \"اقرأ المزيد\", \"description\": \"تسلسل العبارات في الـ الآن بحيث يمكن للعديد من الحملات والاستفادة منها\"}, {\"icon\": \"uni-shopping-basket-o\", \"title\": \"زيادة التحويل\", \"title_link\": \"#\", \"button_link\": \"#\", \"button_text\": \"اقرأ المزيد\", \"description\": \"تسلسل العبارات في الـ الآن بحيث يمكن للعديد من الحملات والاستفادة منها\"}], \"items:en\": [{\"icon\": \"uni-adjust-circle-o\", \"title\": \"Grow Your Business\", \"title_link\": \"#\", \"button_link\": \"#\", \"button_text\": \"Read More\", \"description\": \"The phrasal sequence of the is now so that many campaign and benefit\"}, {\"icon\": \"uni-circuit-o\", \"title\": \"Drive More Sales\", \"title_link\": \"#\", \"button_link\": \"#\", \"button_text\": \"Read More\", \"description\": \"The phrasal sequence of the is now so that many campaign and benefit\"}, {\"icon\": \"uni-fire-o\", \"title\": \"Handled By Expert\", \"title_link\": \"#\", \"button_link\": \"#\", \"button_text\": \"Read More\", \"description\": \"The phrasal sequence of the is now so that many campaign and benefit\"}, {\"icon\": \"uni-shopping-basket-o\", \"title\": \"Increase Conversion\", \"title_link\": \"#\", \"button_link\": \"#\", \"button_text\": \"Read More\", \"description\": \"The phrasal sequence of the is now so that many campaign and benefit\"}], \"is_active\": true, \"heading:ar\": \"الحل الأمثل لعملك\", \"heading:en\": \"Perfect Solution For Your Business\", \"description:ar\": \"أطلق حملتك واستفد من خبرتنا في تصميم وإدارة صفحات HTML باستخدام Tailwind CSS مع التركيز على زيادة التحويلات\", \"description:en\": \"Launch your campaign and benefit from our expertise on designing and managing conversion centered Tailwind CSS html page.\", \"section_title:ar\": \"ماذا نفعل ؟\", \"section_title:en\": \"What We Do ?\"}}, \"type\": \"play.features\"}, {\"data\": {\"team\": {\"items:ar\": [{\"name\": \"كالفن كارلو\", \"image\": \"templates/play/assets/images/team/team-01.png\", \"title\": \"مصمم\", \"title_link\": \"#\"}, {\"name\": \"أليانا روزي\", \"image\": \"templates/play/assets/images/team/team-02.png\", \"title\": \"مصمم\", \"title_link\": \"#\"}, {\"name\": \"صوفيا رزاق\", \"image\": \"templates/play/assets/images/team/team-03.png\", \"title\": \"مصمم\", \"title_link\": \"#\"}, {\"name\": \"مايكل كارلو\", \"image\": \"templates/play/assets/images/team/team-04.png\", \"title\": \"مصمم\", \"title_link\": \"#\"}], \"items:en\": [{\"name\": \"Calvin Carlo\", \"image\": \"templates/play/assets/images/team/team-01.png\", \"title\": \"Designer\", \"title_link\": \"#\"}, {\"name\": \"Aliana Rosy\", \"image\": \"templates/play/assets/images/team/team-02.png\", \"title\": \"Designer\", \"title_link\": \"#\"}, {\"name\": \"Sofia Razaq\", \"image\": \"templates/play/assets/images/team/team-03.png\", \"title\": \"Designer\", \"title_link\": \"#\"}, {\"name\": \"Micheal Carlo\", \"image\": \"templates/play/assets/images/team/team-04.png\", \"title\": \"Designer\", \"title_link\": \"#\"}], \"is_active\": true, \"clients:ar\": [{\"alt\": \"Amazon\", \"image\": \"templates/play/assets/images/client/amazon.svg\"}, {\"alt\": \"Google\", \"image\": \"templates/play/assets/images/client/google.svg\"}, {\"alt\": \"Lenovo\", \"image\": \"templates/play/assets/images/client/lenovo.svg\"}, {\"alt\": \"Paypal\", \"image\": \"templates/play/assets/images/client/paypal.svg\"}, {\"alt\": \"Shopify\", \"image\": \"templates/play/assets/images/client/shopify.svg\"}, {\"alt\": \"Whatsapp\", \"image\": \"templates/play/assets/images/client/whatsapp.svg\"}], \"clients:en\": [{\"alt\": \"Amazon\", \"image\": \"templates/play/assets/images/client/amazon.svg\"}, {\"alt\": \"Google\", \"image\": \"templates/play/assets/images/client/google.svg\"}, {\"alt\": \"Lenovo\", \"image\": \"templates/play/assets/images/client/lenovo.svg\"}, {\"alt\": \"Paypal\", \"image\": \"templates/play/assets/images/client/paypal.svg\"}, {\"alt\": \"Shopify\", \"image\": \"templates/play/assets/images/client/shopify.svg\"}, {\"alt\": \"Whatsapp\", \"image\": \"templates/play/assets/images/client/whatsapp.svg\"}], \"heading:ar\": \"فريقنا الإبداعي\", \"heading:en\": \"Our Creative Team\", \"counters:ar\": [{\"title\": \"مشاريع\", \"number\": 3, \"symbol\": \"+\", \"target\": \"40\"}, {\"title\": \"عملاء\", \"number\": 1, \"symbol\": \"+\", \"target\": \"200\"}, {\"title\": \"أعضاء\", \"number\": 200, \"symbol\": \"K\", \"target\": \"457\"}, {\"title\": \"موظف\", \"number\": 100, \"symbol\": \"+\", \"target\": \"150\"}], \"counters:en\": [{\"title\": \"Projects\", \"number\": 3, \"symbol\": \"+\", \"target\": \"40\"}, {\"title\": \"Clients\", \"number\": 1, \"symbol\": \"+\", \"target\": \"200\"}, {\"title\": \"Members\", \"number\": 200, \"symbol\": \"K\", \"target\": \"457\"}, {\"title\": \"Employee\", \"number\": 100, \"symbol\": \"+\", \"target\": \"150\"}], \"description:ar\": \"تتوفر العديد من الاختلافات في فقرات نص لوريم إيبسوم، لكن معظمها تعرض للتغيير بشكل أو بآخر.\", \"description:en\": \"There are many variations of passages of Lorem Ipsum available but the majority have suffered alteration in some form.\", \"social_links:ar\": [{\"icon\": \"uni-facebook-f-o\", \"link\": \"#\"}, {\"icon\": \"uni-instagram-o\", \"link\": \"#\"}, {\"icon\": \"uni-twitter-o\", \"link\": \"#\"}], \"social_links:en\": [{\"icon\": \"uni-facebook-f-o\", \"link\": \"#\"}, {\"icon\": \"uni-instagram-o\", \"link\": \"#\"}, {\"icon\": \"uni-twitter-o\", \"link\": \"#\"}], \"section_title:ar\": \"الفريق\", \"section_title:en\": \"Team\"}}, \"type\": \"play.team\"}, {\"data\": {\"brands\": {\"logos:ar\": [{\"alt\": \"Ayroui\", \"link\": \"#\", \"image_dark\": \"templates/play/assets/images/brands/ayroui-white.svg\", \"image_light\": \"templates/play/assets/images/brands/ayroui.svg\"}, {\"alt\": \"Graygrids\", \"link\": \"#\", \"image_dark\": \"templates/play/assets/images/brands/graygrids-white.svg\", \"image_light\": \"templates/play/assets/images/brands/graygrids.svg\"}, {\"alt\": \"Lineicons\", \"link\": \"#\", \"image_dark\": \"templates/play/assets/images/brands/lineicons-white.svg\", \"image_light\": \"templates/play/assets/images/brands/lineicons.svg\"}, {\"alt\": \"Uideck\", \"link\": \"#\", \"image_dark\": \"templates/play/assets/images/brands/uideck-white.svg\", \"image_light\": \"templates/play/assets/images/brands/uideck.svg\"}, {\"alt\": \"Tailgrids\", \"link\": \"#\", \"image_dark\": \"templates/play/assets/images/brands/tailgrids-white.svg\", \"image_light\": \"templates/play/assets/images/brands/tailgrids.svg\"}], \"logos:en\": [{\"alt\": \"Ayroui\", \"link\": \"#\", \"image_dark\": \"templates/play/assets/images/brands/ayroui-white.svg\", \"image_light\": \"templates/play/assets/images/brands/ayroui.svg\"}, {\"alt\": \"Graygrids\", \"link\": \"#\", \"image_dark\": \"templates/play/assets/images/brands/graygrids-white.svg\", \"image_light\": \"templates/play/assets/images/brands/graygrids.svg\"}, {\"alt\": \"Lineicons\", \"link\": \"#\", \"image_dark\": \"templates/play/assets/images/brands/lineicons-white.svg\", \"image_light\": \"templates/play/assets/images/brands/lineicons.svg\"}, {\"alt\": \"Uideck\", \"link\": \"#\", \"image_dark\": \"templates/play/assets/images/brands/uideck-white.svg\", \"image_light\": \"templates/play/assets/images/brands/uideck.svg\"}, {\"alt\": \"Tailgrids\", \"link\": \"#\", \"image_dark\": \"templates/play/assets/images/brands/tailgrids-white.svg\", \"image_light\": \"templates/play/assets/images/brands/tailgrids.svg\"}], \"is_active\": true, \"heading:ar\": \"أعمالنا ومشاريعنا\", \"heading:en\": \"Our Works & Projects\", \"description:ar\": \"أطلق حملتك واستفد من خبرتنا في تصميم وإدارة صفحات HTML باستخدام Tailwind CSS مع التركيز على زيادة التحويلات\", \"description:en\": \"Launch your campaign and benefit from our expertise on designing and managing conversion centered Tailwind CSS html page\", \"section_title:ar\": \"العلامات التجارية\", \"section_title:en\": \"Brands\"}}, \"type\": \"play.brands\"}, {\"data\": {\"pricing\": {\"items:ar\": [{\"name\": \"أساسي\", \"price\": 10, \"title\": \"الميزات الأساسية لما يصل إلى 10 مستخدمين.\", \"features\": [{\"icon\": \"uni-check-circle-o\", \"feature\": \"توثيق كامل\"}, {\"icon\": \"uni-check-circle-o\", \"feature\": \"مواد عمل في Figma\"}, {\"icon\": \"uni-check-circle-o\", \"feature\": \"سعة تخزين سحابية 100 جيجابايت\"}, {\"icon\": \"uni-check-circle-o\", \"feature\": \"500 عضو في الفريق\"}], \"button_link\": \"#\", \"button_text\": \"اشترك الآن\"}, {\"name\": \"أعمال\", \"price\": 99, \"title\": \"الميزات الأساسية لما يصل إلى 30 مستخدمين.\", \"features\": [{\"icon\": \"uni-check-circle-o\", \"feature\": \"توثيق كامل\"}, {\"icon\": \"uni-check-circle-o\", \"feature\": \"مواد عمل في Figma\"}, {\"icon\": \"uni-check-circle-o\", \"feature\": \"سعة تخزين سحابية 100 جيجابايت\"}, {\"icon\": \"uni-check-circle-o\", \"feature\": \"500 عضو في الفريق\"}], \"button_link\": \"#\", \"button_text\": \"اشترك الآن\"}, {\"name\": \"احترافي\", \"price\": 299, \"title\": \"الميزات الأساسية لما يصل إلى 100 مستخدمين.\", \"features\": [{\"icon\": \"uni-check-circle-o\", \"feature\": \"توثيق كامل\"}, {\"icon\": \"uni-check-circle-o\", \"feature\": \"مواد عمل في Figma\"}, {\"icon\": \"uni-check-circle-o\", \"feature\": \"سعة تخزين سحابية 100 جيجابايت\"}, {\"icon\": \"uni-check-circle-o\", \"feature\": \"500 عضو في الفريق\"}], \"button_link\": \"#\", \"button_text\": \"اشترك الآن\"}], \"items:en\": [{\"name\": \"Basic\", \"price\": 10, \"title\": \"Basic features for up to 10 users.\", \"features\": [{\"icon\": \"uni-check-circle-o\", \"feature\": \"Complete documentation\"}, {\"icon\": \"uni-check-circle-o\", \"feature\": \"Working materials in Figma\"}, {\"icon\": \"uni-check-circle-o\", \"feature\": \"100GB cloud storage\"}, {\"icon\": \"uni-check-circle-o\", \"feature\": \"500 team members\"}], \"button_link\": \"#\", \"button_text\": \"Signup Now\"}, {\"name\": \"Business\", \"price\": 99, \"title\": \"Basic features for up to 30 users.\", \"features\": [{\"icon\": \"uni-check-circle-o\", \"feature\": \"Complete documentation\"}, {\"icon\": \"uni-check-circle-o\", \"feature\": \"Working materials in Figma\"}, {\"icon\": \"uni-check-circle-o\", \"feature\": \"100GB cloud storage\"}, {\"icon\": \"uni-check-circle-o\", \"feature\": \"500 team members\"}], \"button_link\": \"#\", \"button_text\": \"Signup Now\"}, {\"name\": \"Professional\", \"price\": 299, \"title\": \"Basic features for up to 100 users.\", \"features\": [{\"icon\": \"uni-check-circle-o\", \"feature\": \"Complete documentation\"}, {\"icon\": \"uni-check-circle-o\", \"feature\": \"Working materials in Figma\"}, {\"icon\": \"uni-check-circle-o\", \"feature\": \"100GB cloud storage\"}, {\"icon\": \"uni-check-circle-o\", \"feature\": \"500 team members\"}], \"button_link\": \"#\", \"button_text\": \"Signup Now\"}], \"is_active\": true, \"heading:ar\": \"أسعار مناسبة\", \"heading:en\": \"Comfortable Rates\", \"description:ar\": \"أطلق حملتك واستفد من خبرتنا في تصميم وإدارة صفحات HTML باستخدام Tailwind CSS مع التركيز على زيادة التحويلات\", \"description:en\": \"Launch your campaign and benefit from our expertise on designing and managing conversion centered Tailwind CSS html page\", \"footer_text:ar\": \"لا حاجة لبطاقة ائتمان\", \"footer_text:en\": \"No credit card required\", \"section_title:ar\": \"التسعير\", \"section_title:en\": \"Pricing\"}}, \"type\": \"play.pricing\"}, {\"data\": {\"blog\": {\"items:ar\": [{\"id\": 1, \"image\": \"templates/play/assets/images/blog/blog-01.jpg\", \"title\": \"بناء هوية شركتك \", \"title_link\": \"#\", \"button_link\": \"#\", \"button_text\": \"اقرأ المزيد\", \"description\": \"أصبح تسلسل العبارات في \\\"الـ\\\" الآن بحيث يمكن للعديد من الحملات والاستفادة منها\", \"published_at\": \"2026-10-21 15:20\"}, {\"id\": 2, \"image\": \"templates/play/assets/images/blog/blog-02.jpg\", \"title\": \"اليد اليمنى لعالم تكنولوجيا المعلومات للأعمال\", \"title_link\": \"#\", \"button_link\": \"#\", \"button_text\": \"اقرأ المزيد\", \"description\": \"أصبح تسلسل العبارات في \\\"الـ\\\" الآن بحيث يمكن للعديد من الحملات والاستفادة منها\", \"published_at\": \"2026-10-21 15:20\"}, {\"id\": 3, \"image\": \"templates/play/assets/images/blog/blog-03.jpg\", \"title\": \"بناء هوية شركتك \", \"title_link\": \"#\", \"button_link\": \"#\", \"button_text\": \"اقرأ المزيد\", \"description\": \"أصبح تسلسل العبارات في \\\"الـ\\\" الآن بحيث يمكن للعديد من الحملات والاستفادة منها\", \"published_at\": \"2026-10-21 18:27\"}], \"items:en\": [{\"id\": 1, \"image\": \"templates/play/assets/images/blog/blog-01.jpg\", \"title\": \"Building Your Corporate Identity from Play\", \"title_link\": \"#\", \"button_link\": \"#\", \"button_text\": \"Read More\", \"description\": \"The phrasal sequence of the is now so that many campaign and benefit\", \"published_at\": \"2026-10-20 15:20\"}, {\"id\": 2, \"image\": \"templates/play/assets/images/blog/blog-02.jpg\", \"title\": \"The Right Hand of Business IT World\", \"title_link\": \"#\", \"button_link\": \"#\", \"button_text\": \"Read More\", \"description\": \"The phrasal sequence of the is now so that many campaign and benefit\", \"published_at\": \"2026-10-19 15:20\"}, {\"id\": 3, \"image\": \"templates/play/assets/images/blog/blog-03.jpg\", \"title\": \"The Building Your Corporate Identity from Play\", \"title_link\": \"#\", \"button_link\": \"#\", \"button_text\": \"Read More\", \"description\": \"The phrasal sequence of the is now so that many campaign and benefit\", \"published_at\": \"2026-10-18 15:20\"}], \"is_active\": true, \"heading:ar\": \"آخر الأخبار\", \"heading:en\": \"Latest News\", \"description:ar\": \"أطلق حملتك واستفد من خبرتنا في تصميم وإدارة صفحات HTML باستخدام Tailwind CSS مع التركيز على زيادة التحويلات\", \"description:en\": \"Launch your campaign and benefit from our expertise on designing and managing conversion centered Tailwind CSS html page\", \"section_title:ar\": \"مدونة\", \"section_title:en\": \"Blog\"}}, \"type\": \"play.blog\"}, {\"data\": {\"contact\": {\"email\": \"contact@example.com\", \"phone\": \"152 534-468-854\", \"website\": \"https://example.com\", \"is_active\": true, \"address:ar\": \"C/54 طريق نورث ويست السريع، جناح 558، هيوستن، الولايات المتحدة الأمريكية 485\", \"address:en\": \"C/54 Northwest Freeway, Suite 558, Houston, USA 485\", \"heading:ar\": \"موقعنا\", \"heading:en\": \"Our Location\", \"heading2:ar\": \" كيف يمكننا المساعدة ؟ \", \"heading2:en\": \"How Can We Help?\", \"autoresponder\": {\"cc:ar\": \"cc@example.com\", \"cc:en\": \"cc@example.com\", \"subject:ar\": \"تقديم نموذج اتصال جديد\", \"subject:en\": \"New Contact Form Submission\", \"to_name:ar\": \"جون دو\", \"to_name:en\": \"John Doe\", \"reply_to:ar\": \"reply@example.com\", \"reply_to:en\": \"reply@example.com\", \"to_email:ar\": \"info@example.com\", \"to_email:en\": \"info@example.com\", \"from_name:ar\": \"جون دو\", \"from_name:en\": \"John Doe\", \"from_email:ar\": \"noreply@example.com\", \"from_email:en\": \"noreply@example.com\"}, \"description:ar\": \" دعنا نتحدث عن مشروعك. \", \"description:en\": \"Let\'s talk about your project.\", \"section_name:ar\": \"اتصل بنا\", \"section_name:en\": \"Contact Us\"}}, \"type\": \"play.contact\"}, {\"data\": {\"footer\": {\"logo\": \"templates/media/footer/01M5TXMW4H2VG8943E87Y83ECP.svg\", \"blog:ar\": \"أحدث مدونة\", \"blog:en\": \"Latest blog\", \"is_active\": true, \"logo_link\": \"#\", \"heading:ar\": \"نحن نصمم تجارب رقمية للعلامات التجارية والشركات باستخدام التكنولوجيا.\", \"heading:en\": \"We create digital experiences for brands and companies by using technology.\", \"about_us:ar\": \"معلومات عنا\", \"about_us:en\": \"About Us\", \"features:ar\": \"الميزات\", \"features:en\": \"Features\", \"products:ar\": \"منتجاتنا\", \"products:en\": \"Our Products\", \"blog_links:ar\": [{\"image\": \"templates/play/assets/images/blog/blog-footer-01.jpg\", \"title\": \"أعتقد أنه من المهم حقًا التصميم بـ...\", \"title_link\": \"#blog\"}, {\"image\": \"templates/play/assets/images/blog/blog-footer-02.jpg\", \"title\": \"صعود التجارة الإلكترونية...\", \"title_link\": \"#blog\"}], \"blog_links:en\": [{\"image\": \"templates/play/assets/images/blog/blog-footer-01.jpg\", \"title\": \"I think really important to design with...\", \"title_link\": \"#blog\"}, {\"image\": \"templates/play/assets/images/blog/blog-footer-02.jpg\", \"title\": \"The rise of Ecommerce...\", \"title_link\": \"#blog\"}], \"about_links:ar\": [{\"title\": \"الرئيسية\", \"title_link\": \"#home\"}, {\"title\": \"الميزات\", \"title_link\": \"#Features\"}, {\"title\": \"من نحن\", \"title_link\": \"#about\"}, {\"title\": \"شهادات العملاء\", \"title_link\": \"#testimonial\"}], \"about_links:en\": [{\"title\": \"Home\", \"title_link\": \"#home\"}, {\"title\": \"Features\", \"title_link\": \"#Features\"}, {\"title\": \"About\", \"title_link\": \"#about\"}, {\"title\": \"Testimonial\", \"title_link\": \"#testimonial\"}], \"copyright_link\": \"https://tailgrids.com\", \"legal_notice:ar\": \"إشعار قانوني\", \"legal_notice:en\": \"Legal notice\", \"social_links:ar\": [{\"icon\": \"uni-linkedin-o\", \"title\": \"Linkedin\", \"title_link\": \"#\"}, {\"icon\": \"uni-facebook-f-o\", \"title\": \"Facebook\", \"title_link\": \"#\"}, {\"icon\": \"uni-instagram-o\", \"title\": \"Instagram\", \"title_link\": \"#\"}, {\"icon\": \"uni-twitter-o\", \"title\": \"Twitter\", \"title_link\": \"#\"}, {\"icon\": \"uni-envelope-o\", \"title\": \"Email\", \"title_link\": \"#\"}], \"social_links:en\": [{\"icon\": \"uni-linkedin-o\", \"title\": \"Linkedin\", \"title_link\": \"#\"}, {\"icon\": \"uni-facebook-f-o\", \"title\": \"Facebook\", \"title_link\": \"#\"}, {\"icon\": \"uni-instagram-o\", \"title\": \"Instagram\", \"title_link\": \"#\"}, {\"icon\": \"uni-twitter-o\", \"title\": \"Twitter\", \"title_link\": \"#\"}, {\"icon\": \"uni-envelope-o\", \"title\": \"Email\", \"title_link\": \"#\"}], \"terms_service:ar\": \"شروط الخدمة\", \"terms_service:en\": \"Terms of service\", \"copyright_text:ar\": \"Designed & Developed by TailGrids & UIdeck\", \"copyright_text:en\": \"Designed & Developed by TailGrids & UIdeck\", \"features_links:ar\": [{\"title\": \"كيف يعمل\", \"title_link\": \"#\"}, {\"title\": \"سياسة الخصوصية\", \"title_link\": \"#\"}, {\"title\": \"شروط الخدمة\", \"title_link\": \"#\"}, {\"title\": \"سياسة الاسترداد\", \"title_link\": \"#\"}], \"features_links:en\": [{\"title\": \"How it works\", \"title_link\": \"#\"}, {\"title\": \"Privacy policy\", \"title_link\": \"#\"}, {\"title\": \"Terms of Service\", \"title_link\": \"#\"}, {\"title\": \"Refund policy\", \"title_link\": \"#\"}], \"legal_notice_link\": \"#\", \"privacy_policy:ar\": \"سياسة الخصوصية\", \"privacy_policy:en\": \"Privacy Policy\", \"products_links:ar\": [{\"title\": \"LineIcons\", \"title_link\": \"#\"}, {\"title\": \"Ecommerce HTML\", \"title_link\": \"#\"}, {\"title\": \"TailAdmin\", \"title_link\": \"#\"}, {\"title\": \"PlainAdmin\", \"title_link\": \"#\"}], \"products_links:en\": [{\"title\": \"LineIcons\", \"title_link\": \"#\"}, {\"title\": \"Ecommerce HTML\", \"title_link\": \"#\"}, {\"title\": \"TailAdmin\", \"title_link\": \"#\"}, {\"title\": \"PlainAdmin\", \"title_link\": \"#\"}], \"terms_service_link\": \"#\", \"privacy_policy_link\": \"#\"}}, \"type\": \"play.footer\"}, {\"data\": {\"meta\": {\"email\": \"support@website.com\", \"title\": \"Play - Laravel 12 Landing Page Template\", \"author\": \"Website Name\", \"favicon\": \"templates/media/meta/01M5TXMW4KJY12SERADTFTTXXC.svg\", \"version\": \"2.1.0\", \"website\": \"https://website.com\", \"keywords\": [\"Onepage\", \"creative\", \"modern\", \"Tailwind CSS\", \"multipurpose\", \"clean\"], \"is_active\": true, \"description\": \"Responsive Tailwind CSS Template\"}}, \"type\": \"play.meta\"}, {\"data\": {\"smtp\": {\"host\": \"smtp.mailgun.org\", \"port\": 587, \"password\": \"password\", \"username\": \"username\", \"from_name\": \"My Company\", \"is_active\": true, \"encryption\": \"tls\", \"from_email\": \"info@domain\", \"test_email\": \"test@example.com\"}}, \"type\": \"smtp\"}]', NULL, '2026-10-07 13:15:58', '2026-10-25 22:36:52'),
(2, 1, 'Folio', 'folio', 'folio', '[{\"data\": {\"navbar\": {\"logo\": null, \"is_active\": true, \"menu_items\": [{\"icon\": \"heroicon-o-home\", \"type\": \"home\", \"title\": \"Home\", \"is_active\": true, \"nav_number\": 0, \"title_link\": \"#hero\"}, {\"icon\": \"heroicon-o-user\", \"type\": \"about\", \"title\": \"About\", \"is_active\": true, \"nav_number\": 1, \"title_link\": \"#about\"}, {\"icon\": \"heroicon-o-sparkles\", \"type\": \"services\", \"title\": \"Services\", \"is_active\": true, \"nav_number\": 2, \"title_link\": \"#services\"}, {\"icon\": \"heroicon-o-briefcase\", \"type\": \"portfolio\", \"title\": \"Portfolio\", \"is_active\": true, \"nav_number\": 5, \"title_link\": \"#portfolio\"}, {\"icon\": \"heroicon-o-newspaper\", \"type\": \"blog\", \"title\": \"Blog\", \"is_active\": true, \"nav_number\": 6, \"title_link\": \"#blog\"}, {\"icon\": \"heroicon-o-chat-bubble-left-ellipsis\", \"type\": \"testimonial\", \"title\": \"Testimonials\", \"is_active\": true, \"nav_number\": 7, \"title_link\": \"#testimonial\"}, {\"icon\": \"heroicon-o-envelope\", \"type\": \"contact\", \"title\": \"Contact\", \"is_active\": true, \"nav_number\": 8, \"title_link\": \"#contact\"}], \"social_links\": [{\"icon\": \"uni-linkedin-o\", \"title\": \"Linkedin\", \"title_link\": \"https://www.linkedin.com/company/folio\"}, {\"icon\": \"uni-facebook-f-o\", \"title\": \"Facebook\", \"title_link\": \"https://www.facebook.com/folio\"}, {\"icon\": \"uni-twitter-o\", \"title\": \"Twitter\", \"title_link\": \"https://www.twitter.com/folio\"}, {\"icon\": \"uni-instagram-o\", \"title\": \"Instagram\", \"title_link\": \"https://www.instagram.com/folio\"}], \"is_social_links_active\": true}, \"logo_text\": \"eli\", \"logo_text1\": \"oot\"}, \"type\": \"folio.navbar\"}, {\"data\": {\"hero\": {\"h1_part1\": \"I Craft The\", \"h1_part2\": \"Digital Landscape\", \"partners\": [{\"link\": \"https://example.com\", \"logo\": null, \"name\": \"Adobaco Ltd.\"}, {\"link\": \"https://example.com\", \"logo\": null, \"name\": \"Poppers Ltd.\"}, {\"link\": \"https://example.com\", \"logo\": null, \"name\": \"Octopus Ltd.\"}, {\"link\": \"https://example.com\", \"logo\": null, \"name\": \"Dulalix Ltd.\"}, {\"link\": \"https://example.com\", \"logo\": null, \"name\": \"Poppers Ltd.\"}], \"is_active\": true, \"avatardark\": null, \"text_part1\": \"I am a\", \"text_part2\": \"Frontend Developer\", \"text_part3\": \"at heart and, i create features that are best suited for the job at hand.\", \"avatarlight\": null, \"button_link\": \"#contact\", \"button_text\": \"Hire Me\", \"availablity1\": \"Available for work\", \"availablity2\": \"Full Time Job\", \"section_name\": null, \"slider_title\": \"Trusted Partners\"}}, \"type\": \"folio.hero\"}, {\"data\": {\"services\": {\"items\": [{\"icon\": \"gmdi-design-services-o\", \"image\": null, \"title\": \"UI/UX Design\", \"number\": \"01\", \"description\": \"I design products that are more than pretty. I make them shippable.\"}, {\"icon\": \"gmdi-web-o\", \"image\": null, \"title\": \"Web Development\", \"number\": \"02\", \"description\": \"I design products that are more than pretty. I make them shippable.\"}, {\"icon\": \"heroicon-o-rocket-launch\", \"image\": null, \"title\": \"SEO / Marketing\", \"number\": \"03\", \"description\": \"I design products that are more than pretty. I make them shippable.\"}, {\"icon\": \"heroicon-m-megaphone\", \"image\": null, \"title\": \"Branding & Strategy\", \"number\": \"04\", \"description\": \"I design products that are more than pretty. I make them shippable.\"}], \"heading\": \"SERVICES\", \"is_active\": true, \"description\": \"I design products that are more than pretty. I make them shippable and usable, tempor non mollit dolor et do aute\", \"section_name\": \"My Services\"}}, \"type\": \"folio.services\"}, {\"data\": {\"blog\": {\"posts\": [{\"date\": \"03 May 2025\", \"link\": \"#\", \"image\": \"templates/folio/assets/images/blog/blog-01.jpg\", \"intro\": \"Elevate your mornings with perfectly brewed coffee\", \"title\": \"Elevate your mornings with perfectly brewed coffee\", \"category\": \"UI Design\", \"category_link\": \"#\"}, {\"date\": \"01 May 2025\", \"link\": \"#\", \"image\": \"templates/folio/assets/images/blog/blog-02.jpg\", \"intro\": \"Elevate your mornings with perfectly brewed coffee\", \"title\": \"Mastering the clock: A guide to time management\", \"category\": \"Time Management\", \"category_link\": \"#\"}, {\"date\": \"29 Apr 2025\", \"link\": \"#\", \"image\": \"templates/folio/assets/images/blog/blog-03.jpg\", \"intro\": \"Elevate your mornings with perfectly brewed coffee\", \"title\": \"Homeward bound: Crafting a productive home office\", \"category\": \"Home Office\", \"category_link\": \"#\"}], \"heading\": \"Thoughts\", \"is_active\": true, \"description\": \"I design products that are more than pretty. I make them shippable and usable, tempor non mollit dolor et do aute\", \"section_name\": \"From the blog\", \"allposts_link\": \"#\"}}, \"type\": \"folio.blog\"}, {\"data\": {\"about\": {\"image\": \"media/templates/folio/about/01M4Q0WM3KFE82AA0BS09HH4J9.jpg\", \"skills\": [{\"skill\": \"HTML5 & CSS3\", \"proficiency\": 94}, {\"skill\": \"Bootstrap\", \"proficiency\": 98}, {\"skill\": \"TailwindCSS\", \"proficiency\": 90}, {\"skill\": \"Alpine.js\", \"proficiency\": 95}, {\"skill\": \"Figma\", \"proficiency\": 90}, {\"skill\": \"JavaScript\", \"proficiency\": 95}, {\"skill\": \"Symfony\", \"proficiency\": 90}, {\"skill\": \"Webflow\", \"proficiency\": 85}], \"heading\": \"A bit about\", \"contacts\": [{\"type\": \"Phone\", \"value\": \"+(2) 870 174 302\"}, {\"type\": \"Email\", \"value\": \"info@example.com\"}, {\"type\": \"Skype\", \"value\": \"brown@com\"}, {\"type\": \"Github\", \"value\": \"github.com/user\"}, {\"type\": \"Language\", \"value\": \"English, Dutch, Spanish\"}], \"counters\": [{\"label\": \"Years Of Experience\", \"number\": 185}, {\"label\": \"Handled Projects\", \"number\": 12}, {\"label\": \"Open Source Libraries\", \"number\": 5}, {\"label\": \"Awards Won\", \"number\": 18}], \"heading2\": \"who I am\", \"is_active\": true, \"description\": \"I\'m Eliott, a freelance designer and frontend developer based in Paris with 5 years of experience shipping digital products for startups, agencies, and scale-ups across Europe. I thrive at the intersection of great design and clean code.\", \"description2\": \"I believe great interfaces are invisible — they get out of the user\'s way. My work is fast, accessible and built to last. When I\'m not coding, you\'ll find me hiking or hunting for a good espresso.\", \"section_name\": \"About Me\"}}, \"type\": \"folio.about\"}, {\"data\": {\"portfolio\": {\"items\": [{\"link\": \"#\", \"tags\": [\"tailwindcss\", \"alpinejs\", \"laravel\", \"livewire\", \"Figma\"], \"image\": \"templates/folio/assets/images/portfolio/1.jpg\", \"title\": \"Project Title\", \"category\": \"Branding\", \"col_span\": \"col-span-2\", \"description\": \"I design products that are more than pretty. I make them shippable and usable, tempor non mollit dolor et do aute\", \"category_link\": \"#\"}, {\"link\": \"#\", \"tags\": [\"tailwindcss\", \"alpinejs\", \"laravel\", \"livewire\"], \"image\": \"templates/folio/assets/images/portfolio/2.jpg\", \"title\": \"Project Title\", \"category\": \"Branding\", \"col_span\": \"col-span-1\", \"description\": \"I design products that are more than pretty. I make them shippable and usable, tempor non mollit dolor et do aute\", \"category_link\": \"#\"}, {\"link\": \"#\", \"tags\": [\"tailwindcss\", \"laravel\", \"livewire\", \"Figma\"], \"image\": \"templates/folio/assets/images/portfolio/3.jpg\", \"title\": \"Project Title\", \"category\": \"Branding\", \"col_span\": \"col-span-1\", \"description\": \"I design products that are more than pretty. I make them shippable and usable, tempor non mollit dolor et do aute\", \"category_link\": \"#\"}, {\"link\": \"#\", \"tags\": [\"tailwindcss\", \"NodeJs\", \"laravel\", \"livewire\", \"Figma\"], \"image\": \"templates/folio/assets/images/portfolio/4.jpg\", \"title\": \"Project Title\", \"category\": \"Branding\", \"col_span\": \"col-span-1\", \"description\": \"I design products that are more than pretty. I make them shippable and usable, tempor non mollit dolor et do aute\", \"category_link\": \"#\"}], \"heading\": \"PORTFOLIO\", \"is_active\": true, \"description\": \"I design products that are more than pretty. I make them shippable and usable, tempor non mollit dolor et do aute\", \"section_name\": \"Featured Projects\", \"allprojects_link\": \"#\"}}, \"type\": \"folio.portfolio\"}, {\"data\": {\"testimonial\": {\"posts\": [{\"image\": \"templates/media/testimonial/01M4SG4YRY530YBMH0SE419YFN.jpg\", \"author\": \"Thomas Israel\", \"rating\": \"5\", \"content\": \"It seems that only fragments of the original text remain in the Lorem Ipsum texts used today.\", \"author_position\": \"Staff Engineer, Algolia\"}, {\"image\": \"templates/media/testimonial/01M4SG4YRY530YBMH0SE419YFP.jpg\", \"author\": \"Carl Oliver\", \"rating\": \"5\", \"content\": \"The most well-known dummy text is the \'Lorem Ipsum\', which is said to have originated in the 16th century.\", \"author_position\": \"Staff Engineer, Algolia\"}, {\"image\": \"templates/media/testimonial/01M4SG4YRZPCR4E5SE4DXX8BXH.jpg\", \"author\": \"Barbara McIntosh\", \"rating\": \"5\", \"content\": \"One disadvantage of Lorum Ipsum is that in Latin certain letters appear more frequently than others.\", \"author_position\": \"Staff Engineer, Algolia\"}], \"heading\": \"Social proof\", \"is_active\": true, \"description\": \"I design products that are more than pretty. I make them shippable and usable, tempor non mollit dolor et do aute\", \"section_name\": \"What clients say\"}}, \"type\": \"folio.testimonial\"}, {\"data\": {\"contact\": {\"items\": [{\"url\": \"https://platform.com/user\", \"icon\": \"uni-facebook-o\", \"type\": \"facebook\"}, {\"url\": \"https://platform.com/user\", \"icon\": \"uni-linkedin-o\", \"type\": \"linkedin\"}, {\"url\": \"https://platform.com/user\", \"icon\": \"uni-github-o\", \"type\": \"github\"}], \"heading\": \"Let\'s work\", \"heading2\": \"together\", \"is_active\": true, \"description\": \"I\'m open to UI/UX and frontend missions, short or long-term. Landing page, full product redesign, or just a second pair of eyes — let\'s talk.\", \"section_name\": \"Get in touch\", \"autoresponder\": {\"cc\": \"cc@example.com\", \"subject\": \"New Contact Form Submission\", \"to_name\": \"John Doe\", \"reply_to\": \"reply@example.com\", \"to_email\": \"info@example.com\", \"from_name\": \"John Doe\", \"from_email\": \"noreply@example.com\"}}}, \"type\": \"folio.contact\"}, {\"data\": {\"footer\": {\"is_active\": true, \"built_with\": \"Tailwind CSS & Alpine.js\", \"copyright_name\": \"Eliott\", \"built_with_tech_1\": \"Tailwind CSS\", \"built_with_tech_2\": \"Alpine.js\", \"built_with_tech_3\": \"Filament\", \"built_with_tech_4\": \"Laravel\", \"copyright_company\": \"ThemeWagon\", \"copyright_name_link\": \"#\", \"built_with_tech_1_link\": \"https://tailwindcss.com\", \"built_with_tech_2_link\": \"https://alpinejs.dev\", \"built_with_tech_3_link\": \"https://filamentphp.com\", \"built_with_tech_4_link\": \"https://laravel.com\", \"copyright_company_link\": \"https://themewagon.com\", \"copyright_developer_name\": \"Laurent Begey\", \"copyright_developer_name2\": \"Mo Mostafa\", \"copyright_developer_name_link\": \"https://lbegey78.gumroad.com\", \"copyright_developer_name2_link\": \"https://github.com/momostafa/landingpages\"}}, \"type\": \"folio.footer\"}, {\"data\": {\"smtp\": {\"host\": \"smtp.mailgun.org\", \"port\": 587, \"password\": \"password\", \"username\": \"username\", \"from_name\": \"My Company\", \"is_active\": true, \"encryption\": \"tls\", \"from_email\": \"info@domain\", \"test_email\": \"test@example.com\"}}, \"type\": \"smtp\"}]', NULL, '2026-10-10 23:56:03', '2026-10-25 22:29:42'),
(15, 1, 'Mo Mostafa', 'mo-mostafa', 'folio', '[{\"data\": {\"hero\": {\"h1_part1\": \"I Craft The\", \"h1_part2\": \"Digital Landscape\", \"partners\": [{\"link\": \"https://example.com\", \"logo\": null, \"name\": \"Adobaco Ltd.\"}, {\"link\": \"https://example.com\", \"logo\": null, \"name\": \"Poppers Ltd.\"}, {\"link\": \"https://example.com\", \"logo\": null, \"name\": \"Octopus Ltd.\"}, {\"link\": \"https://example.com\", \"logo\": null, \"name\": \"Dulalix Ltd.\"}, {\"link\": \"https://example.com\", \"logo\": null, \"name\": \"Poppers Ltd.\"}], \"is_active\": true, \"avatardark\": null, \"text_part1\": \"I am a\", \"text_part2\": \"Frontend Developer\", \"text_part3\": \"at heart and, i create features that are best suited for the job at hand.\", \"avatarlight\": null, \"button_link\": \"#contact\", \"button_text\": \"Hire Me\", \"availablity1\": \"Available for work\", \"availablity2\": \"Full Time Job\", \"section_name\": null, \"slider_title\": \"Trusted Partners\"}}, \"type\": \"folio.hero\"}, {\"data\": {\"portfolio\": {\"items\": [{\"link\": \"#\", \"tags\": [\"tailwindcss\", \"alpinejs\", \"laravel\", \"livewire\", \"Figma\"], \"image\": \"templates/folio/assets/images/portfolio/1.jpg\", \"title\": \"Project Title\", \"category\": \"Branding\", \"col_span\": \"col-span-2\", \"description\": \"I design products that are more than pretty. I make them shippable and usable, tempor non mollit dolor et do aute\", \"category_link\": \"#\"}, {\"link\": \"#\", \"tags\": [\"tailwindcss\", \"alpinejs\", \"laravel\", \"livewire\"], \"image\": \"templates/folio/assets/images/portfolio/2.jpg\", \"title\": \"Project Title\", \"category\": \"Branding\", \"col_span\": \"col-span-1\", \"description\": \"I design products that are more than pretty. I make them shippable and usable, tempor non mollit dolor et do aute\", \"category_link\": \"#\"}, {\"link\": \"#\", \"tags\": [\"tailwindcss\", \"laravel\", \"livewire\", \"Figma\"], \"image\": \"templates/folio/assets/images/portfolio/3.jpg\", \"title\": \"Project Title\", \"category\": \"Branding\", \"col_span\": \"col-span-1\", \"description\": \"I design products that are more than pretty. I make them shippable and usable, tempor non mollit dolor et do aute\", \"category_link\": \"#\"}, {\"link\": \"#\", \"tags\": [\"tailwindcss\", \"NodeJs\", \"laravel\", \"livewire\", \"Figma\"], \"image\": \"templates/folio/assets/images/portfolio/4.jpg\", \"title\": \"Project Title\", \"category\": \"Branding\", \"col_span\": \"col-span-1\", \"description\": \"I design products that are more than pretty. I make them shippable and usable, tempor non mollit dolor et do aute\", \"category_link\": \"#\"}], \"heading\": \"PORTFOLIO\", \"is_active\": true, \"description\": \"I design products that are more than pretty. I make them shippable and usable, tempor non mollit dolor et do aute\", \"section_name\": \"Featured Projects\", \"allprojects_link\": \"#\"}}, \"type\": \"folio.portfolio\"}, {\"data\": {\"contact\": {\"items\": [{\"url\": null, \"icon\": \"uni-facebook-o\", \"type\": \"facebook\"}], \"heading\": \"Let\'s work\", \"heading2\": \"together\", \"is_active\": true, \"description\": \"I\'m open to UI/UX and frontend missions, short or long-term. Landing page, full product redesign, or just a second pair of eyes — let\'s talk.\", \"section_name\": \"Get in touch\", \"autoresponder\": {\"cc\": \"cc@example.com\", \"subject\": \"New Contact Form Submission\", \"to_name\": \"John Doe\", \"reply_to\": \"reply@example.com\", \"to_email\": \"info@example.com\", \"from_name\": \"John Doe\", \"from_email\": \"noreply@example.com\"}}}, \"type\": \"folio.contact\"}, {\"data\": {\"footer\": {\"content\": \"Copyright  2025. All rights reserved.\", \"is_active\": true, \"built_with\": null, \"copyright_name\": null, \"built_with_tech_1\": null, \"built_with_tech_2\": null, \"built_with_tech_3\": null, \"built_with_tech_4\": null, \"copyright_company\": null, \"copyright_name_link\": null, \"built_with_tech_1_link\": null, \"built_with_tech_2_link\": null, \"built_with_tech_3_link\": null, \"built_with_tech_4_link\": null, \"copyright_company_link\": null, \"copyright_developer_name\": null, \"copyright_developer_name2\": null, \"copyright_developer_name_link\": null, \"copyright_developer_name2_link\": null}}, \"type\": \"folio.footer\"}]', NULL, '2026-10-25 14:32:47', '2026-10-25 22:38:48');

-- --------------------------------------------------------

--
-- Table structure for table `pages_arbk`
--

CREATE TABLE `pages_arbk` (
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
-- Dumping data for table `pages_arbk`
--

INSERT INTO `pages_arbk` (`id`, `user_id`, `title`, `slug`, `layout`, `blocks`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Play', 'play', 'play', '[{\"data\": {\"about\": {\"image_1\": \"templates/play/assets/images/about/about-image-01.jpg\", \"image_2\": \"templates/play/assets/images/about/about-image-02.jpg\", \"is_active\": true, \"heading:ar\": \"مجموعة أدوات رائعة لبناء مواقع ويب من الجيل التالي بشكل أسرع.\", \"heading:en\": \"Brilliant Toolkit to Build Nextgen Website Faster.\", \"button_link\": \"#\", \"button_text:ar\": \"اعرف المزيد\", \"button_text:en\": \"Know More\", \"description:ar\": \"ينصب التركيز الرئيسي على تثقيف الحضور حول أفضل السبل لحماية تطبيقات الأعمال شديدة الحساسية، وذلك من خلال حلقات نقاش تفاعلية وجلسات حوارية يديرها خبراء متخصصون.\\n\\nينصب التركيز الرئيسي على تثقيف الحضور حول أفضل السبل لحماية تطبيقات الأعمال شديدة الحساسية، وذلك من خلال حلقات نقاش تفاعلية.\", \"description:en\": \"The main \'thrust\' is to focus on educating attendees on how to best protect highly vulnerable business applications with interactive panel discussions and roundtables led by subject matter experts.\\n\\nThe main \'thrust\' is to focus on educating attendees on how to best protect highly vulnerable business applications with interactive panel.\", \"experience_years:ar\": \"10\", \"experience_years:en\": \"10\"}}, \"type\": \"play.about\"}, {\"data\": {\"navbar\": {\"is_active\": true, \"logo_dark\": \"templates/play/assets/images/logo/logo-white.svg\", \"logo_light\": \"templates/play/assets/images/logo/logo.svg\", \"signin_link\": \"#\", \"signup_link\": \"#\", \"menu_items:ar\": [{\"type\": \"home\", \"title\": \"الرئيسية\", \"is_active\": true, \"title_link\": \"#home\"}, {\"type\": \"about\", \"title\": \"معلومات عنا\", \"is_active\": true, \"title_link\": \"#about\"}], \"menu_items:en\": [{\"type\": \"home\", \"title\": \"Home\", \"is_active\": true, \"title_link\": \"#home\"}, {\"type\": \"about\", \"title\": \"About\", \"is_active\": true, \"title_link\": \"#about\"}], \"signin_text:ar\": \"تسجيل الدخول\", \"signin_text:en\": \"Sign In\", \"signup_text:ar\": \"اشتراك\", \"signup_text:en\": \"Sign Up\"}}, \"type\": \"play.navbar\"}]', NULL, '2026-10-07 13:15:58', '2026-10-16 02:07:07'),
(2, 1, 'Folio', 'folio', 'folio', '[{\"data\": {\"navmain\": {\"logo\": \"templates/media/navbar/01M4MEQAY0CCZM99Z4KBJNZAYA.svg\", \"is_active\": true, \"menu_items\": [{\"icon\": \"heroicon-o-home\", \"type\": \"home\", \"title\": \"Home\", \"is_active\": true, \"nav_number\": 0, \"title_link\": \"#home\"}, {\"icon\": \"heroicon-o-user\", \"type\": \"about\", \"title\": \"About\", \"is_active\": true, \"nav_number\": 1, \"title_link\": \"#about\"}, {\"icon\": \"heroicon-o-sparkles\", \"type\": \"services\", \"title\": \"Services\", \"is_active\": true, \"nav_number\": 2, \"title_link\": \"#services\"}, {\"icon\": \"heroicon-o-academic-cap\", \"type\": \"skills\", \"title\": \"Skills\", \"is_active\": false, \"nav_number\": 3, \"title_link\": \"#skills\"}, {\"icon\": \"heroicon-o-document-text\", \"type\": \"resume\", \"title\": \"Resume\", \"is_active\": false, \"nav_number\": 4, \"title_link\": \"#resume\"}, {\"icon\": \"heroicon-o-briefcase\", \"type\": \"portfolio\", \"title\": \"Portfolio\", \"is_active\": true, \"nav_number\": 5, \"title_link\": \"#portfolio\"}, {\"icon\": \"heroicon-o-newspaper\", \"type\": \"blog\", \"title\": \"Blog\", \"is_active\": true, \"nav_number\": 6, \"title_link\": \"#blog\"}, {\"icon\": \"heroicon-o-chat-bubble-left-ellipsis\", \"type\": \"testimonial\", \"title\": \"Testimonials\", \"is_active\": true, \"nav_number\": 7, \"title_link\": \"#testimonials\"}, {\"icon\": \"heroicon-o-envelope\", \"type\": \"contact\", \"title\": \"Contact\", \"is_active\": true, \"nav_number\": 8, \"title_link\": \"#contact\"}], \"social_links\": [{\"icon\": \"uni-linkedin-o\", \"title\": \"Linkedin\", \"title_link\": \"https://www.linkedin.com/company/folio\"}, {\"icon\": \"uni-facebook-f-o\", \"title\": \"Facebook\", \"title_link\": \"https://www.facebook.com/folio\"}, {\"icon\": \"uni-twitter-o\", \"title\": \"Twitter\", \"title_link\": \"https://www.twitter.com/folio\"}, {\"icon\": \"uni-instagram-o\", \"title\": \"Instagram\", \"title_link\": \"https://www.instagram.com/folio\"}], \"is_social_links_active\": true}}, \"type\": \"folio.navmain\"}, {\"data\": {\"hero\": {\"h1_part1\": \"I Craft The\", \"h1_part2\": \"Digital Landscape\", \"partners\": [{\"link\": \"https://example.com\", \"logo\": null, \"name\": \"Adobaco Ltd.\"}, {\"link\": \"https://example.com\", \"logo\": null, \"name\": \"Poppers Ltd.\"}, {\"link\": \"https://example.com\", \"logo\": null, \"name\": \"Octopus Ltd.\"}, {\"link\": \"https://example.com\", \"logo\": null, \"name\": \"Dulalix Ltd.\"}, {\"link\": \"https://example.com\", \"logo\": null, \"name\": \"Poppers Ltd.\"}], \"is_active\": true, \"avatardark\": null, \"text_part1\": \"I am a\", \"text_part2\": \"Frontend Developer\", \"text_part3\": \"at heart and, i create features that are best suited for the job at hand.\", \"avatarlight\": null, \"button_link\": \"#contact\", \"button_text\": \"Hire Me\", \"availablity1\": \"Available for work\", \"availablity2\": \"Full Time Job\", \"section_name\": null, \"slider_title\": \"Trusted Partners\"}}, \"type\": \"folio.hero\"}, {\"data\": {\"services\": {\"items\": [{\"icon\": \"gmdi-design-services-o\", \"image\": null, \"title\": \"UI/UX Design\", \"number\": \"01\", \"description\": \"I design products that are more than pretty. I make them shippable.\"}, {\"icon\": \"gmdi-web-o\", \"image\": null, \"title\": \"Web Development\", \"number\": \"02\", \"description\": \"I design products that are more than pretty. I make them shippable.\"}, {\"icon\": \"heroicon-o-rocket-launch\", \"image\": null, \"title\": \"SEO / Marketing\", \"number\": \"03\", \"description\": \"I design products that are more than pretty. I make them shippable.\"}, {\"icon\": \"heroicon-m-megaphone\", \"image\": null, \"title\": \"Branding & Strategy\", \"number\": \"04\", \"description\": \"I design products that are more than pretty. I make them shippable.\"}], \"heading\": \"SERVICES\", \"is_active\": true, \"description\": \"I design products that are more than pretty. I make them shippable and usable, tempor non mollit dolor et do aute\", \"section_name\": \"My Services\"}}, \"type\": \"folio.services\"}, {\"data\": {\"blog\": {\"posts\": [{\"date\": \"03 May 2025\", \"link\": \"#\", \"image\": \"templates/folio/assets/images/blog/blog-01.jpg\", \"intro\": \"Elevate your mornings with perfectly brewed coffee\", \"title\": \"Elevate your mornings with perfectly brewed coffee\", \"category\": \"UI Design\", \"category_link\": \"#\"}, {\"date\": \"01 May 2025\", \"link\": \"#\", \"image\": \"templates/folio/assets/images/blog/blog-02.jpg\", \"intro\": \"Elevate your mornings with perfectly brewed coffee\", \"title\": \"Mastering the clock: A guide to time management\", \"category\": \"Time Management\", \"category_link\": \"#\"}, {\"date\": \"29 Apr 2025\", \"link\": \"#\", \"image\": \"templates/folio/assets/images/blog/blog-03.jpg\", \"intro\": \"Elevate your mornings with perfectly brewed coffee\", \"title\": \"Homeward bound: Crafting a productive home office\", \"category\": \"Home Office\", \"category_link\": \"#\"}], \"heading\": \"Thoughts\", \"is_active\": true, \"description\": \"I design products that are more than pretty. I make them shippable and usable, tempor non mollit dolor et do aute\", \"section_name\": \"From the blog\", \"allposts_link\": \"#\"}}, \"type\": \"folio.blog\"}, {\"data\": {\"about\": {\"image\": \"media/templates/folio/about/01M4Q0WM3KFE82AA0BS09HH4J9.jpg\", \"skills\": [{\"skill\": \"HTML5 & CSS3\", \"proficiency\": 94}, {\"skill\": \"Bootstrap\", \"proficiency\": 98}, {\"skill\": \"TailwindCSS\", \"proficiency\": 90}, {\"skill\": \"Alpine.js\", \"proficiency\": 95}, {\"skill\": \"Figma\", \"proficiency\": 90}, {\"skill\": \"JavaScript\", \"proficiency\": 95}, {\"skill\": \"Symfony\", \"proficiency\": 90}, {\"skill\": \"Webflow\", \"proficiency\": 85}], \"heading\": \"A bit about\", \"contacts\": [{\"type\": \"Phone\", \"value\": \"+(2) 870 174 302\"}, {\"type\": \"Email\", \"value\": \"info@example.com\"}, {\"type\": \"Skype\", \"value\": \"brown@com\"}, {\"type\": \"Github\", \"value\": \"github.com/user\"}, {\"type\": \"Language\", \"value\": \"English, Dutch, Spanish\"}], \"counters\": [{\"label\": \"Years Of Experience\", \"number\": 185}, {\"label\": \"Handled Projects\", \"number\": 12}, {\"label\": \"Open Source Libraries\", \"number\": 5}, {\"label\": \"Awards Won\", \"number\": 18}], \"heading2\": \"who I am\", \"is_active\": true, \"description\": \"I\'m Eliott, a freelance designer and frontend developer based in Paris with 5 years of experience shipping digital products for startups, agencies, and scale-ups across Europe. I thrive at the intersection of great design and clean code.\", \"description2\": \"I believe great interfaces are invisible — they get out of the user\'s way. My work is fast, accessible and built to last. When I\'m not coding, you\'ll find me hiking or hunting for a good espresso.\", \"section_name\": \"About Me\"}}, \"type\": \"folio.about\"}, {\"data\": {\"portfolio\": {\"items\": [{\"link\": \"#\", \"tags\": [\"tailwindcss\", \"alpinejs\", \"laravel\", \"livewire\", \"Figma\"], \"image\": \"templates/folio/assets/images/portfolio/1.jpg\", \"title\": \"Project Title\", \"category\": \"Branding\", \"col_span\": \"col-span-2\", \"description\": \"I design products that are more than pretty. I make them shippable and usable, tempor non mollit dolor et do aute\", \"category_link\": \"#\"}, {\"link\": \"#\", \"tags\": [\"tailwindcss\", \"alpinejs\", \"laravel\", \"livewire\"], \"image\": \"templates/folio/assets/images/portfolio/2.jpg\", \"title\": \"Project Title\", \"category\": \"Branding\", \"col_span\": \"col-span-1\", \"description\": \"I design products that are more than pretty. I make them shippable and usable, tempor non mollit dolor et do aute\", \"category_link\": \"#\"}, {\"link\": \"#\", \"tags\": [\"tailwindcss\", \"laravel\", \"livewire\", \"Figma\"], \"image\": \"templates/folio/assets/images/portfolio/3.jpg\", \"title\": \"Project Title\", \"category\": \"Branding\", \"col_span\": \"col-span-1\", \"description\": \"I design products that are more than pretty. I make them shippable and usable, tempor non mollit dolor et do aute\", \"category_link\": \"#\"}, {\"link\": \"#\", \"tags\": [\"tailwindcss\", \"NodeJs\", \"laravel\", \"livewire\", \"Figma\"], \"image\": \"templates/folio/assets/images/portfolio/4.jpg\", \"title\": \"Project Title\", \"category\": \"Branding\", \"col_span\": \"col-span-1\", \"description\": \"I design products that are more than pretty. I make them shippable and usable, tempor non mollit dolor et do aute\", \"category_link\": \"#\"}], \"heading\": \"PORTFOLIO\", \"is_active\": true, \"description\": \"I design products that are more than pretty. I make them shippable and usable, tempor non mollit dolor et do aute\", \"section_name\": \"Featured Projects\", \"allprojects_link\": \"#\"}}, \"type\": \"folio.portfolio\"}, {\"data\": {\"testimonial\": {\"posts\": [{\"image\": \"templates/media/testimonial/01M4SG4YRY530YBMH0SE419YFN.jpg\", \"author\": \"Thomas Israel\", \"rating\": \"5\", \"content\": \"It seems that only fragments of the original text remain in the Lorem Ipsum texts used today.\", \"author_position\": \"Staff Engineer, Algolia\"}, {\"image\": \"templates/media/testimonial/01M4SG4YRY530YBMH0SE419YFP.jpg\", \"author\": \"Carl Oliver\", \"rating\": \"5\", \"content\": \"The most well-known dummy text is the \'Lorem Ipsum\', which is said to have originated in the 16th century.\", \"author_position\": \"Staff Engineer, Algolia\"}, {\"image\": \"templates/media/testimonial/01M4SG4YRZPCR4E5SE4DXX8BXH.jpg\", \"author\": \"Barbara McIntosh\", \"rating\": \"5\", \"content\": \"One disadvantage of Lorum Ipsum is that in Latin certain letters appear more frequently than others.\", \"author_position\": \"Staff Engineer, Algolia\"}], \"heading\": \"Social proof\", \"is_active\": true, \"description\": \"I design products that are more than pretty. I make them shippable and usable, tempor non mollit dolor et do aute\", \"section_name\": \"What clients say\"}}, \"type\": \"folio.testimonial\"}, {\"data\": {\"contact\": {\"items\": [{\"url\": \"https://platform.com/user\", \"icon\": \"uni-facebook-o\", \"type\": \"facebook\"}, {\"url\": \"https://platform.com/user\", \"icon\": \"uni-linkedin-o\", \"type\": \"linkedin\"}, {\"url\": \"https://platform.com/user\", \"icon\": \"uni-github-o\", \"type\": \"github\"}], \"heading\": \"Let\'s work\", \"heading2\": \"together\", \"is_active\": true, \"description\": \"I\'m open to UI/UX and frontend missions, short or long-term. Landing page, full product redesign, or just a second pair of eyes — let\'s talk.\", \"section_name\": \"Get in touch\", \"autoresponder\": {\"cc\": \"cc@example.com\", \"subject\": \"New Contact Form Submission\", \"to_name\": \"John Doe\", \"reply_to\": \"reply@example.com\", \"to_email\": \"info@example.com\", \"from_name\": \"John Doe\", \"from_email\": \"noreply@example.com\"}}}, \"type\": \"folio.contact\"}, {\"data\": {\"smtp\": {\"host\": \"smtp.mailgun.org\", \"port\": 587, \"password\": \"password\", \"username\": \"username\", \"from_name\": \"My Company\", \"is_active\": true, \"encryption\": \"tls\", \"from_email\": \"info@domain\", \"test_email\": \"test@example.com\"}}, \"type\": \"smtp\"}]', NULL, '2026-10-10 23:56:03', '2026-10-16 08:00:08');

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
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'published',
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
('0FzDX0X6tiOU1ikrStOgSTYLH6w8lP60L9PjQYht', 1, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/157.0.0.0 Safari/537.36', 'YTo4OntzOjY6Il90b2tlbiI7czo0MDoiR3p2bWc1eVlUWkRQOTRuRWlmVFJOYkpMRllmbVNJMnpkOWYxb3hUYiI7czo4OiJmaWxhbWVudCI7YToyOntzOjEzOiJub3RpZmljYXRpb25zIjthOjE6e3M6NzoibWFpbGJveCI7czo0MDoid0VPVkY1SWxIcTVkbzVYNVV0akdYenRVWDk3NzlmNFczeWtNVDRRYiI7fXM6NjoidGFibGVzIjthOjE6e3M6NjQ6ImI3YzczZTE4MmVhNmVjMGRlNjU1NDMyNWI3ZWQ4ZjY3YWFiNTFmYTY3OTA4NzFlOWEyMGViMzZhOGZjYTBhYzkiO2E6MTp7czo3OiJjb2x1bW5zIjthOjQ6e2k6MDthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czo1OiJ0aXRsZSI7czo1OiJsYWJlbCI7czo1OiJUaXRsZSI7czo4OiJpc0hpZGRlbiI7YjowO3M6OToiaXNUb2dnbGVkIjtiOjE7czoxMjoiaXNUb2dnbGVhYmxlIjtiOjA7czoyNDoiaXNUb2dnbGVkSGlkZGVuQnlEZWZhdWx0IjtOO31pOjE7YTo3OntzOjQ6InR5cGUiO3M6NjoiY29sdW1uIjtzOjQ6Im5hbWUiO3M6MTI6ImNvbnRlbnRfdHlwZSI7czo1OiJsYWJlbCI7czoxMjoiQ29udGVudCB0eXBlIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MjthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxMToiZGVzY3JpcHRpb24iO3M6NToibGFiZWwiO3M6MTE6IkRlc2NyaXB0aW9uIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fWk6MzthOjc6e3M6NDoidHlwZSI7czo2OiJjb2x1bW4iO3M6NDoibmFtZSI7czoxMDoidXBkYXRlZF9hdCI7czo1OiJsYWJlbCI7czo3OiJVcGRhdGVkIjtzOjg6ImlzSGlkZGVuIjtiOjA7czo5OiJpc1RvZ2dsZWQiO2I6MTtzOjEyOiJpc1RvZ2dsZWFibGUiO2I6MDtzOjI0OiJpc1RvZ2dsZWRIaWRkZW5CeURlZmF1bHQiO047fX19fX1zOjM6InVybCI7YTowOnt9czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NTM6Imh0dHBzOi8vbGFuZGluZ3BhZ2VzLnRlc3QvYWRtaW4vYWdlbnQtcHJvbXB0cy8yOC9lZGl0IjtzOjU6InJvdXRlIjtzOjQzOiJmaWxhbWVudC5hZG1pbi5yZXNvdXJjZXMuYWdlbnQtcHJvbXB0cy5lZGl0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2NDoiMzJmMTk5ZDgzZDA0YThmZTUxYTI4MDQwZDY2MGZmNTU0YmQ4NDI0MTQ5Mjk5ZDczN2M4ZDc1NTQ0MzNkYzFiZSI7czoxNjoiYWN0aXZlX3Byb21wdF9pZCI7aToyODt9', 1794756542);

-- --------------------------------------------------------

--
-- Table structure for table `short_urls`
--

CREATE TABLE `short_urls` (
  `id` bigint UNSIGNED NOT NULL,
  `code` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `target_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Indexes for table `agent_conversations`
--
ALTER TABLE `agent_conversations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agent_conversations_user_id_updated_at_index` (`user_id`,`updated_at`);

--
-- Indexes for table `agent_conversation_messages`
--
ALTER TABLE `agent_conversation_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conversation_index` (`conversation_id`,`user_id`,`updated_at`),
  ADD KEY `agent_conversation_messages_user_id_index` (`user_id`),
  ADD KEY `agent_conversation_messages_conversation_id_index` (`conversation_id`);

--
-- Indexes for table `agent_prompts`
--
ALTER TABLE `agent_prompts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agent_prompts_user_id_index` (`user_id`);

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
-- Indexes for table `pages_arbk`
--
ALTER TABLE `pages_arbk`
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
-- AUTO_INCREMENT for table `agent_prompts`
--
ALTER TABLE `agent_prompts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `domains`
--
ALTER TABLE `domains`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emails`
--
ALTER TABLE `emails`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pages_arbk`
--
ALTER TABLE `pages_arbk`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
