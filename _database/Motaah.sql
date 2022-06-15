-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2022 at 07:18 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wakelny`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'تطوير الويب', 1, '2022-05-24 06:53:40', '2022-05-24 06:53:40'),
(2, ' اعمال وخدمات استشارية', 1, '2022-05-24 06:53:40', '2022-05-24 06:53:40'),
(3, '   تصميم صوتيات وفديوهات', 1, '2022-05-24 06:53:40', '2022-05-24 06:53:40'),
(4, '     تسويق الكتروني ومبيعات', 1, '2022-05-24 06:53:40', '2022-05-24 06:53:40');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `duration` double NOT NULL,
  `cost` double NOT NULL,
  `cost_after_taxs` double NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `post_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `duration`, `cost`, `cost_after_taxs`, `description`, `is_active`, `file`, `user_id`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 5, 200, 400, 'استطيع عمل المطلوب', 1, NULL, 11, 1, '2022-05-24 07:05:31', '2022-05-24 07:05:31'),
(2, 30, 300, 600, 'انا استطيع انجازه', 1, NULL, 11, 2, '2022-05-24 07:29:12', '2022-05-24 07:32:48'),
(3, 10, 200, 400, 'لدي الخبرة الكافيه لانجاز المطلوب', 1, NULL, 11, 3, '2022-05-25 09:39:45', '2022-05-25 09:39:45'),
(5, 2, 25, 50, 'اهلا بك ، انا لدى القدره على ان افعل ذلك المشروع فقد قمت بعمل مشاريع كثيره مثله، رجاء تواصل معى. سوف استخدم فى هذا المشروع HTML,CSS كى انفذ لك المشروع باقصى سرعه', 1, NULL, 11, 5, '2022-05-25 10:22:27', '2022-05-25 10:22:27'),
(7, 15, 100, 200, 'السلام عليكم ورحمة الله تعالي وبركاته اهلا بك أخي الكريم كيف حالك وايضا اعمل علي برامج مايكروسوفت ( Microsoft ) وأخذت العديد من الدورات في برامج مايكروسوفت', 1, NULL, 11, 7, '2022-05-25 13:39:23', '2022-05-25 13:39:23'),
(8, 30, 50, 100, 'أستطيع ان أقدم لك الخدمه لدي خبرة ف كتابة المحتوي واضافتة مع التصميم المناسب بما أملكه من خبره ايضا ف تصاميم السوشيل ميديا وايضا متابعة التعليقات وفن الرد', 1, NULL, 11, 8, '2022-05-25 13:45:15', '2022-05-25 13:45:15'),
(9, 30, 40, 80, 'يمكنني أن أدير الحسابات ببراعه تامه و ساحرص على جدية التعامل مع الحساب و الالتزام بالعمل والحرص على أن يكون العمل سريعا', 1, NULL, 12, 8, '2022-05-25 14:00:59', '2022-05-25 14:00:59'),
(11, 3, 50, 100, 'أنا يمكنني ان اقوم بعمل لك هذا العرض واستطيع ان انجز لك بالحترافية وان اقوم بالانجاز العرض في اقرب وقت وانا جاهز لهذا العرض', 1, NULL, 11, 9, '2022-05-25 14:24:56', '2022-05-25 14:24:56'),
(12, 5, 50, 100, 'تحياتي لك أخي .قرأت عرضك سأقوم بتصميم وجهات إعلامية لك بطريقة احترافية وفي أقصر وقت إن شاء الله. ستحصل على شكل يصلح لكي يكون لائق بشركتك او مؤسستك', 1, NULL, 12, 9, '2022-05-25 14:28:31', '2022-05-25 14:28:31'),
(13, 7, 50, 100, 'السلام عليكم انا مهندس برمجيات لدي خبرة في تطوير مواقع و إضافات ووردبريس ، و لقد قمت بعمل مشابه للمطلوب على المنصة يمكنك التواصل معي', 1, NULL, 12, 10, '2022-05-25 17:18:32', '2022-05-25 17:18:32'),
(14, 4, 100, 200, 'ممكن عمله', 1, NULL, 12, 11, '2022-05-25 17:47:04', '2022-05-25 17:47:04'),
(15, 70, 1000, 2000, 'السلام عليكم لقد قرات عرضك ويمكنني القيام به', 1, NULL, 12, 12, '2022-05-25 17:54:58', '2022-05-25 17:54:58'),
(16, 10, 500, 1000, 'السلام عليكم  لدي بكالوريوس هندسة البرمجيات ومتخصص في مجال الويب يمكنني تنفيذ طلبك مع تحسين التصميم والاداء وعمل موقع متوافق على جميع الشاشا', 1, NULL, 12, 13, '2022-05-25 18:02:34', '2022-05-25 18:02:34'),
(18, 9, 400, 800, 'السلام عليكم وحمة الله وبركاته لقد صمتت العديد من المواقع لذلك يمكني للتصميم موقعك من (A-Z) ويمكني تصميم شاشات بطريقه عصريه وجذابة ل', 1, NULL, 11, 13, '2022-05-25 18:07:22', '2022-05-25 18:07:22'),
(19, 60, 1000, 2000, 'مرحبا  انا جاهزة لانشاء المنصة معك  مهندسة حاسوب ومبرمجة ويب ساقوم بعمل الموقع بكافة التعليمات التى تريدها وسوف استخدم احدث التقنيا', 1, NULL, 11, 12, '2022-05-25 18:11:45', '2022-05-25 18:11:45'),
(20, 7, 200, 400, 'انا قرات التفاصيل وسوف افعل لك التصميم الذي تريده وجاهز أعطيك مع تسليم العمل علي اعلي جوده و في الوقت المحدد مع التفاصيل التي تريدها', 1, NULL, 11, 14, '2022-05-25 18:16:31', '2022-05-25 18:16:31'),
(21, 7, 250, 500, 'السلام عليكم عميلنا العزيز عرض لتصميم الموقع فقط اطلعت علي طلبكم وتقييم خدماتي %100 يمكنك الاطلاع علي ذلك سوف تستلم عمل احترافي', 1, NULL, 12, 14, '2022-05-25 18:17:52', '2022-05-25 18:17:52'),
(22, 5, 200, 400, 'ممكن عمله', 1, NULL, 12, 15, '2022-05-26 02:58:17', '2022-05-26 02:58:17'),
(28, 3, 200, 400, 'استطيع عمله', 1, NULL, 11, 15, '2022-05-26 05:50:47', '2022-05-26 05:50:47'),
(31, 12, 200, 400, 'التيسلبهعبسعمه', 1, NULL, 11, 18, '2022-05-26 06:21:01', '2022-05-26 06:21:01'),
(32, 34, 499, 998, 'انلمغس', 1, NULL, 12, 18, '2022-05-26 06:21:46', '2022-05-26 06:21:46'),
(33, 4, 70, 140, 'مرحبا انا مصمم جرافيك اطلعت على مشروعك و يمكنني انجازه بكل احترافية', 1, NULL, 12, 19, '2022-05-26 06:30:36', '2022-05-26 06:31:03'),
(34, 10, 500, 1000, 'السلام عليكم ورحمة الله تعالى معك حاصلة على بكالوريوس العلوم مصممة متاجر الكترونية على منصات عديدة مثل شوبيفاي واكسباند كارت و سلة', 1, NULL, 11, 20, '2022-05-26 06:35:22', '2022-05-26 06:36:02'),
(35, 3, 100, 200, 'انا استطيع', 1, NULL, 13, 19, '2022-05-26 09:22:55', '2022-05-26 09:22:55'),
(50, 55, 15, 30, 'gdfg', 1, NULL, 13, 22, '2022-05-27 16:00:49', '2022-05-27 16:00:49'),
(51, 33, 33, 66, 'dfsdf', 1, NULL, 13, 23, '2022-05-27 16:30:48', '2022-05-27 16:30:48');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `evaluations`
--

CREATE TABLE `evaluations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `evaluater_id` bigint(20) UNSIGNED NOT NULL,
  `value` int(11) NOT NULL DEFAULT 0,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `evaluations`
--

INSERT INTO `evaluations` (`id`, `project_id`, `user_id`, `evaluater_id`, `value`, `message`, `created_at`, `updated_at`) VALUES
(1, 1, 11, 10, 4, 'good', '2022-05-24 07:25:32', '2022-05-24 07:25:32'),
(2, 4, 11, 10, 5, 'رائع', '2022-05-25 09:56:27', '2022-05-25 09:56:27'),
(4, 6, 11, 10, 4, 'رائغ', '2022-05-25 11:29:25', '2022-05-25 11:29:25'),
(5, 9, 11, 10, 4, 'رائع', '2022-05-25 14:15:56', '2022-05-25 14:15:56'),
(6, 11, 12, 10, 4, 'عمل رائع', '2022-05-25 17:33:31', '2022-05-25 17:33:31'),
(7, 12, 12, 10, 5, 'ممتاز', '2022-05-25 17:50:25', '2022-05-25 17:50:25'),
(8, 18, 11, 10, 3, 'رائع', '2022-05-26 06:24:39', '2022-05-26 06:24:39'),
(9, 20, 13, 10, 4, 'goog', '2022-05-26 09:31:46', '2022-05-26 09:31:46'),
(10, 24, 13, 14, 2, 'ff', '2022-05-27 16:43:53', '2022-05-27 16:43:53');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `receiver` bigint(20) UNSIGNED NOT NULL,
  `is_seen` tinyint(1) NOT NULL DEFAULT 0,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message`, `user_id`, `receiver`, `is_seen`, `file_name`, `file`, `created_at`, `updated_at`) VALUES
(1, 'ممكن ان تنجز المشروع بوقت اقصر؟\n', 10, 11, 0, NULL, NULL, '2022-05-24 07:06:51', '2022-05-24 07:06:51'),
(2, 'ممكن 3 ايام ', 11, 11, 1, NULL, NULL, '2022-05-24 07:07:49', '2022-05-24 07:09:46'),
(3, 'تم', 10, 11, 0, NULL, NULL, '2022-05-24 07:07:56', '2022-05-24 07:07:56'),
(4, 'هلاا\n', 10, 11, 0, NULL, NULL, '2022-05-25 11:22:58', '2022-05-25 11:22:58'),
(5, 'اهلا', 10, 12, 0, NULL, NULL, '2022-05-26 05:26:31', '2022-05-26 05:26:31'),
(6, NULL, 10, 12, 0, NULL, NULL, '2022-05-26 05:26:32', '2022-05-26 05:26:32'),
(7, 'hi', 10, 12, 0, NULL, NULL, '2022-05-26 09:25:09', '2022-05-26 09:25:09');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_11_06_222923_create_transactions_table', 1),
(4, '2018_11_07_192923_create_transfers_table', 1),
(5, '2018_11_15_124230_create_wallets_table', 1),
(6, '2019_08_19_000000_create_failed_jobs_table', 1),
(7, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(8, '2021_11_02_202021_update_wallets_uuid_table', 1),
(9, '2022_04_13_055516_laratrust_setup_tables', 1),
(10, '2022_04_19_171523_create_skills_table', 1),
(11, '2022_04_19_202827_create_categories_table', 1),
(12, '2022_04_22_015528_create_user_skills_table', 1),
(13, '2022_04_22_194934_create_profiles_table', 1),
(14, '2022_04_26_015037_add_google_id_column', 1),
(15, '2022_04_26_184946_add_profile_active_to_hired', 1),
(16, '2022_04_28_091202_create_posts_table', 1),
(17, '2022_04_28_091229_create_post_skills_table', 1),
(18, '2022_04_28_095507_create_comments_table', 1),
(19, '2022_04_28_100846_add_active_to_posts', 1),
(20, '2022_04_28_111054_create_specializations_table', 1),
(21, '2022_04_28_201402_create_works_table', 1),
(22, '2022_04_29_144243_create_work_skills_table', 1),
(23, '2022_05_03_175048_create_notifications_table', 1),
(24, '2022_05_03_181111_create_reports_table', 1),
(25, '2022_05_04_064831_create_projects_table', 1),
(26, '2022_05_04_184520_add_amount_to_projects', 1),
(27, '2022_05_05_172016_add_limition_to_profiles', 1),
(28, '2022_05_05_172451_add_reseved_to_profiles', 1),
(29, '2022_05_05_181315_add_duration_to_projects', 1),
(30, '2022_05_05_192027_add_post_id_to_projects', 1),
(31, '2022_05_06_075742_add_file_to_projects', 1),
(32, '2022_05_06_095809_add_project_to_report', 1),
(33, '2022_05_06_122134_create_evaluations_table', 1),
(34, '2022_05_08_113951_create_orders_table', 1),
(35, '2022_05_08_160410_add_other_option_to_projects', 1),
(36, '2022_05_11_182756_add_total_amount_to_projects', 1),
(37, '2022_05_13_054438_add_invoice_to_projects', 1),
(38, '2022_05_13_114857_add_is_onlineto_users_table', 1),
(39, '2022_05_13_114948_add_last_activity_to_users_table', 1),
(40, '2022_05_15_130438_add_evaluater_id_to_evaluations_table', 1),
(41, '2022_05_17_063124_create_messages_table', 1),
(42, '2022_05_20_130926_create_contacts_table', 1),
(43, '2022_05_25_084328_add_last_seen_to_users_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `total_amount` int(11) NOT NULL,
  `site_amount` int(11) NOT NULL,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_reference` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seeker_id` bigint(20) UNSIGNED NOT NULL,
  `provider_id` bigint(20) UNSIGNED NOT NULL,
  `project_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permission_user`
--

CREATE TABLE `permission_user` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` int(11) NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offers` int(11) NOT NULL DEFAULT 0,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `cost`, `duration`, `file`, `status`, `offers`, `category_id`, `user_id`, `created_at`, `updated_at`, `is_active`) VALUES
(1, 'تصميم شعار مطعم', 'تصميم شعار مطعمتصميم شعار مطعمتصميم شعار مطعمتصميم شعار مطعمتصميم شعار مطعمتصميم شعار مطعمتصميم شعار مطعمتصميم شعار مطعمتصميم شعار مطعمتصميم شعار مطعمتصميم شعار مطعم', '250-100', 5, NULL, 'closed', 1, 1, 10, '2022-05-24 07:03:59', '2022-05-24 07:25:32', 1),
(2, 'تصميم موقع بيع الكتروني', 'تصميم موقع بيع الكترونيتصميم موقع بيع الكترونيتصميم موقع بيع الكترونيتصميم موقع بيع الكترونيتصميم موقع بيع الكترونيتصميم موقع بيع الكترونيتصميم موقع بيع الكترونيتصميم موقع بيع الكترونيتصميم موقع بيع الكترونيتصميم موقع بيع الكترونيتصميم موقع بيع الكتروني', '250-100', 30, NULL, 'open', 1, 1, 10, '2022-05-24 07:28:13', '2022-05-24 07:29:12', 1),
(3, 'تصميم واجهة تسجبل دخول', 'تصميم واجهة تسجبل دخولتصميم واجهة تسجبل دخولتصميم واجهة تسجبل دخولتصميم واجهة تسجبل دخولتصميم واجهة تسجبل دخولتصميم واجهة تسجبل دخولتصميم واجهة تسجبل دخولتصميم واجهة تسجبل دخولتصميم واجهة تسجبل دخولتصميم واجهة تسجبل دخولتصميم واجهة تسجبل دخولتصميم واجهة تسجبل دخول', '250-100', 10, NULL, 'closed', 1, 1, 10, '2022-05-25 09:38:45', '2022-05-25 09:56:27', 1),
(5, 'برمجة صفحة رئيسية لموقع', 'احتاج شخص يبرمج لي هوم بيج ((اكواد )) فقط للموقع بسيطه احتاج شخص يبرمج لي هوم بيج ((اكواد )) فقط للموقع بسيطه احتاج شخص يبرمج لي هوم بيج ((اكواد )) فقط للموقع بسيطه احتاج شخص يبرمج لي هوم بيج ((اكواد )) فقط للموقع بسيطه', '0-25', 3, NULL, 'closed', 1, 1, 10, '2022-05-25 10:20:41', '2022-05-25 11:29:25', 1),
(7, 'مطلوب عمل ملف اكسل لشؤون الموظفين', 'عمل ملف كامل لشؤون الموظفين يخدم جميع موظفين المنشأة ويشمل العقود، الاجازات، المباشرات، الإنذارات، البصمة، الاستئذانات، التنبيهات والجزاءات بحسب أنظمة وزارة العمل السعودي', '100-50', 15, NULL, 'open', 1, 1, 10, '2022-05-25 13:37:09', '2022-05-25 13:39:23', 1),
(8, 'مطلوب كتابة المحتوى وإدارة الإنستجرام', 'السلام عليكم\r\n\r\n(( فضلا اقرأ المطلوب جيدا\r\n\r\nوقدم عرضك وفقك المطلوب ))\r\n\r\nأبحث عن متخصص للقيام بالمهام التالية :\r\n\r\n- كتابة المحتوى للمنشورات بطريقة إبداعية\r\n\r\n- القيام بنشر المنشورات على حسابات الانستجرام\r\n\r\n- التفاعل مع الهاشتاقات\r\n\r\n- التفاعل مع الحسابات و الرد و كتابة التعليقات\r\nالصفات المطلوبة بالمختص:\r\n\r\n- معرفة بخوارزميات الإنستجرام\r\n\r\n- التزام بالعمل و الوقت المحدد\r\n\r\n- جدية القيام بالمهام\r\n\r\n- تقديم أفكار إبداعية\r\n\r\n- وجود خبرة و معرفة مميزة\r\n(( ملاحظة : التصميم راح يكون من عندنا ))', '50-25', 30, NULL, 'closed', 2, 2, 10, '2022-05-25 13:43:59', '2022-05-25 14:15:56', 1),
(9, 'مطلوب عمل تصاميم اعلانية لشركة اعلام دوائي', 'شركة اعلام دوائي بحاجة الى مصمم للعمل علي تصميم واجهات إعلامية ودعائية للشركة مثل لوحات دلالة كارتات تعريفية إعلانات عن وظائف وغيرها مجموع التصاميم يتراوح بين ٥و ٧ تصاميم', '50-25', 3, NULL, 'open', 2, 1, 10, '2022-05-25 14:22:51', '2022-05-25 14:28:31', 1),
(10, 'تعديل على موقع ووردبريس', 'يوجد موقع مصمم عن طريق الووردبريس ، المطلوب إضافة إمكانية لصفحة المنتجات بحيث يمكن للعميل صاحب الموقع أن يضيف صور المنتجات وبياناتها عن طريق لوحة تحكم بالموقع. عند الإشارة بالماوس إلى صورة المنتج تظهر بيانات خاصة بالمنتج. المطلوب إمكانية التعديل والإضافة فيها', '50-25', 7, NULL, 'closed', 1, 1, 10, '2022-05-25 17:15:50', '2022-05-25 17:33:31', 1),
(11, 'تعديل على مشروع php ووردبرس', 'لدي مشروع ووردبرس احتاج الى تعديل صفحتين فرونت اند و و اضافة خاصية لدي مشروع ووردبرس احتاج الى تعديل صفحتين فرونت اند و و اضافة خاصية', '100-50', 3, NULL, 'closed', 1, 1, 10, '2022-05-25 17:46:14', '2022-05-25 17:50:25', 1),
(12, 'مطلوب تصميم وبرمجة منصة إلكترونية متعددة اللغات', 'لتصميم وبرمجة منصة إلكترونية متعددة اللغات .\r\n\r\nشروط التصميم واجههً مستخدم سهله وبسيطة متوافق مع محركات البحث\r\n\r\nمتاح التعامل مع كم بيانات كبير\r\n\r\nقابل للتطوير فيما بعد لبناء تطبيق هاتف API\r\n\r\nمتوافق مع جميع أجهزهً التابلت و المحمول ( responsive )\r\n\r\nلوحهً تحكم أدمن كامله بكافهً الأدوار و الصلاحيات\r\n\r\nإستخدام unit test لاختبار الكود\r\n\r\nيستخدم المطورDESIGN PATTERNS MVC\r\n\r\nيجب ان يكون المطور ملم بأساسيات ال BUSINESS ANALYSIS و التعامل مع التحديثات والإضافات الجديدة للمنصة\r\n\r\nيجيد التعامل مع بوابات الدفع العالمية', '1000-500', 70, NULL, 'open', 2, 1, 10, '2022-05-25 17:52:52', '2022-05-25 18:11:45', 1),
(13, 'مطلوب تصميم موقع وقف أهلي خيري', 'السلام عليكم\r\n\r\nمطلوب تصميم موقع وقف أهلي خيري\r\n\r\nمع لوحة تحكم لتحديد صلاحيات المستخدمين حسب انواعهم في الاطلاع على المحتوى\r\n\r\nمع خاصية الدخول باسم مستخدم وكلمة مرور وكود تفعيل على الجوال\r\n\r\nشكرا للجميع', '500-250', 10, NULL, 'open', 2, 1, 10, '2022-05-25 18:00:49', '2022-05-25 18:07:22', 1),
(14, 'تصميم موقع الكتروني للخدمات التسويقية', 'شركة خدمات تسويقية نرغب في عمل موقع الكتروني تسويقي للشركة وتكون فيه جميع خدمات واعمال الشركة\r\n\r\nطبعا التصميم جاهز فقط احتاج مبرمج ويب متمكن ينفذ لي الموقع', '250-100', 7, NULL, 'open', 2, 1, 10, '2022-05-25 18:15:32', '2022-05-25 18:17:52', 1),
(15, 'مشروع تسويق الكتروني', 'مشروع تسويق الكترونيمشروع تسويق الكترونيمشروع تسويق الكترونيمشروع تسويق الكترونيمشروع تسويق الكترونيمشروع تسويق الكترونيمشروع تسويق الكترونيمشروع تسويق الكترونيمشروع تسويق الكتروني', '250-100', 10, NULL, 'open', 2, 4, 10, '2022-05-26 02:57:19', '2022-05-26 05:50:47', 1),
(18, 'تسستتتتتتتل لببالبىاىال', 'تسستتتتتتتل لببالبىاىالر تسستتتتتتتل لببالبىاىال ر تسستتتتتتتل لببالبىاىال تسستتتتتتتل لببالبىاىال تسستتتتتتتل لببالبىاىال تسستتتتتتتل لببالبىاىال تسستتتتتتتل لببالبىاىال تسستتتتتتتل لببالبىاىال تسستتتتتتتل لببالبىاىال تسستتتتتتتل لببالبىاىال', '250-100', 3, NULL, 'closed', 2, 1, 10, '2022-05-26 06:20:19', '2022-05-26 06:24:39', 1),
(19, 'تصميم شعار احترافي', 'احتاج مصمم محترف في برامج التصميم\r\n\r\nتصميم شعار هدفه (مدرستي بلا سمنة)\r\n\r\nاحتاج عنوان للشعار حرف أو كلمة يدل على الهدف\r\n\r\nتصميم الحرف أو الكلمة باستخدام تايبوجراف مع دلالات عن السمنة في المدارس', '100-50', 3, NULL, 'closed', 2, 3, 10, '2022-05-26 06:29:23', '2022-05-26 09:31:46', 1),
(20, 'تصميم موقع الكتروني بسيط لشركة خدمات', 'مطلوب مصمم مواقع محترف ، لتصميم موقع الكتروني بسيط ، يحتوي على ما يلي:\r\n\r\n1. الصفحة الأولى (الرئيسية) : تعريف بالشركة والخدمات ومعلومات الاتصال ومن نحن.\r\n\r\n2. الصفحة الثانية : الحجز \"بدون ميزة الدفع\" وهذه الصفحة موجهة للزبائن ، تحتوي على خيارات متعددة ، ويتم حجز الطلب عن طريقها حيث الموقع ستعاود التواصل مع الزبون خلال مدة محددة.\r\n\r\n3. الصفحة الثالثة: للتوظيف ، وبها يتم تعبئة طلب التوظيف من قِبل الموظفين الجدد وإعلامهم مباشرةً بأننا الموقع سيتواصل معهم.\r\n\r\n4. الصفحة الرابعة : معلومات الاتصال\r\n\r\n5. الصفحة الخامسة: من نحن.', '500-250', 20, NULL, 'open', 1, 1, 10, '2022-05-26 06:33:21', '2022-05-26 06:35:22', 1),
(21, 'مطلوب عمل ملف اكسل لشؤون الموظفين', 'مطلوب عمل ملف اكسل لشؤون الموظفين مطلوب عمل ملف اكسل لشؤون الموظفين مطلوب عمل ملف اكسل لشؤون الموظفين مطلوب عمل ملف اكسل لشؤون الموظفين مطلوب عمل ملف اكسل لشؤون الموظفين مطلوب عمل ملف اكسل لشؤون الموظفين مطلوب عمل ملف اكسل لشؤون الموظفين مطلوب عمل ملف اكسل لشؤون الموظفين مطلوب عمل ملف اكسل لشؤون الموظفين', '100-50', 90, NULL, 'open', 1, 1, 10, '2022-05-26 09:48:17', '2022-05-26 09:49:36', 1),
(22, 'مشروع العماله الخيريه', 'مشروع العماله الخيريه  مشروع العماله الخيريه  مشروع العماله الخيريه  مشروع العماله الخيريه  مشروع العماله الخيريه  مشروع العماله الخيريه  مشروع العماله الخيريه  مشروع العماله الخيريه  مشروع العماله الخيريه  مشروع العماله الخيريه  مشروع العماله الخيريه  مشروع العماله الخيريه  مشروع العماله الخيريه  مشروع العماله الخيريه  مشروع العماله الخيريه  مشروع العماله الخيريه  مشروع العماله الخيريه  مشروع العماله الخيريه  مشروع العماله الخيريه  مشروع العماله الخيريه  مشروع العماله الخيريه  مشروع العماله الخيريه  مشروع العماله الخيريه  مشروع العماله الخيريه  مشروع العماله الخيريه  مشروع العماله الخيريه  مشروع العماله الخيريه  مشروع العماله الخيريه  مشروع العماله الخيريه  مشروع العماله الخيريه  مشروع العماله الخيريه  مشروع العماله الخيريه', '500-250', 90, NULL, 'open', 1, 2, 14, '2022-05-27 15:16:05', '2022-05-27 16:00:49', 1),
(23, 'eeeeeeeeeeeeeeeeeeeeeeeee', 'eeeeeeeeeeeeeeeeeeeeeeeee eeeeeeeeeeeeeeeeeeeeeeeee eeeeeeeeeeeeeeeeeeeeeeeee  eeeeeeeeeeeeeeeeeeeeeeeee eeeeeeeeeeeeeeeeeeeeeeeee  eeeeeeeeeeeeeeeeeeeeeeeee eeeeeeeeeeeeeeeeeeeeeeeee  eeeeeeeeeeeeeeeeeeeeeeeee eeeeeeeeeeeeeeeeeeeeeeeee  eeeeeeeeeeeeeeeeeeeeeeeee eeeeeeeeeeeeeeeeeeeeeeeee  eeeeeeeeeeeeeeeeeeeeeeeee eeeeeeeeeeeeeeeeeeeeeeeee  eeeeeeeeeeeeeeeeeeeeeeeee eeeeeeeeeeeeeeeeeeeeeeeee  eeeeeeeeeeeeeeeeeeeeeeeee eeeeeeeeeeeeeeeeeeeeeeeee  eeeeeeeeeeeeeeeeeeeeeeeee eeeeeeeeeeeeeeeeeeeeeeeee  eeeeeeeeeeeeeeeeeeeeeeeee eeeeeeeeeeeeeeeeeeeeeeeee  eeeeeeeeeeeeeeeeeeeeeeeee eeeeeeeeeeeeeeeeeeeeeeeee  eeeeeeeeeeeeeeeeeeeeeeeee eeeeeeeeeeeeeeeeeeeeeeeee  eeeeeeeeeeeeeeeeeeeeeeeee eeeeeeeeeeeeeeeeeeeeeeeee  eeeeeeeeeeeeeeeeeeeeeeeee eeeeeeeeeeeeeeeeeeeeeeeee  eeeeeeeeeeeeeeeeeeeeeeeee eeeeeeeeeeeeeeeeeeeeeeeee  eeeeeeeeeeeeeeeeeeeeeeeee eeeeeeeeeeeeeeeeeeeeeeeee  eeeeeeeeeeeeeeeeeeeeeeeee eeeeeeeeeeeeeeeeeeeeeeeee  eeeeeeeeeeeeeeeeeeeeeeeee eeeeeeeeeeeeeeeeeeeeeeeee  eeeeeeeeeeeeeeeeeeeeeeeee eeeeeeeeeeeeeeeeeeeeeeeee  eeeeeeeeeeeeeeeeeeeeeeeee eeeeeeeeeeeeeeeeeeeeeeeee  eeeeeeeeeeeeeeeeeeeeeeeee eeeeeeeeeeeeeeeeeeeeeeeee  eeeeeeeeeeeeeeeeeeeeeeeee eeeeeeeeeeeeeeeeeeeeeeeee', '250-100', 90, NULL, 'closed', 1, 1, 14, '2022-05-27 16:06:23', '2022-05-27 16:43:53', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post_skills`
--

CREATE TABLE `post_skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED DEFAULT NULL,
  `skill_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_skills`
--

INSERT INTO `post_skills` (`id`, `post_id`, `skill_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 2, 1, NULL, NULL),
(4, 2, 2, NULL, NULL),
(5, 2, 4, NULL, NULL),
(6, 2, 5, NULL, NULL),
(7, 3, 2, NULL, NULL),
(8, 7, 4, NULL, NULL),
(9, 8, 2, NULL, NULL),
(10, 9, 1, NULL, NULL),
(11, 9, 2, NULL, NULL),
(12, 10, 8, NULL, NULL),
(13, 11, 2, NULL, NULL),
(14, 11, 6, NULL, NULL),
(15, 11, 8, NULL, NULL),
(16, 12, 2, NULL, NULL),
(17, 12, 6, NULL, NULL),
(18, 12, 7, NULL, NULL),
(19, 13, 2, NULL, NULL),
(20, 13, 6, NULL, NULL),
(21, 13, 7, NULL, NULL),
(22, 14, 1, NULL, NULL),
(23, 14, 2, NULL, NULL),
(24, 14, 6, NULL, NULL),
(25, 14, 7, NULL, NULL),
(26, 14, 8, NULL, NULL),
(27, 15, 2, NULL, NULL),
(28, 19, 1, NULL, NULL),
(29, 19, 2, NULL, NULL),
(30, 20, 1, NULL, NULL),
(31, 20, 2, NULL, NULL),
(32, 20, 6, NULL, NULL),
(33, 20, 7, NULL, NULL),
(34, 22, 1, NULL, NULL),
(35, 22, 2, NULL, NULL),
(36, 22, 4, NULL, NULL),
(37, 22, 5, NULL, NULL),
(38, 22, 6, NULL, NULL),
(39, 22, 7, NULL, NULL),
(40, 22, 8, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rating` double NOT NULL DEFAULT 0,
  `account_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `job_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialization` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `hire_me` tinyint(1) DEFAULT NULL,
  `limit` int(11) NOT NULL DEFAULT 4,
  `reseved` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`user_id`, `name`, `avatar`, `gender`, `mobile`, `country`, `rating`, `account_type`, `job_title`, `specialization`, `bio`, `video`, `category_id`, `created_at`, `updated_at`, `hire_me`, `limit`, `reseved`) VALUES
(1, 'متاح', NULL, 'female', '773065471', 'Yemen', 0, 'provider', 'backend developer', 'platform', '\"', NULL, NULL, '2022-05-24 06:53:40', '2022-05-24 06:53:40', NULL, 4, 0),
(2, 'ضحى الخراساني', NULL, 'female', '773065471', 'Yemen', 0, 'provider', 'backend developer', 'backend developer', '\"إنه قارئ ومفسر ومبدع في آنٍ واحد.. ذلك هو المترجم.\" بيجاي كومار داس.\r\n\r\n            مترجمة محترفة على مستوى عالي من الدقة والمهارة. خريجة بكالوريوس لغة انجليزية وترجمة وحاصلة على شهادة التوفل وتدريبات مكثفة في اللغة الانجليزية والترجمة. امتلك من الخبرة مايزيد عن 12 عام في هذا المجال.\r\n            \r\n            لا اتقدم لاي مشروع الا اذا كنت واثقة انني استطيع انجازه باحترافية بنسبة 100%. انا مواظبة جدا واهتم بالتفاصيل الصغيرة لاي عمل انجزه.\r\n            \r\n            الخدمات التي اقدمها:\r\n            \r\n            *الترجمة من اللغة العربية <> اللغة الانجليزية.\r\n            \r\n            *التدقيق اللغوي.\r\n            \r\n            *اعمال التلخيص واعادة الصياغة من والى اللغتين.\r\n            \r\n            *التفريغ الصوتي.\r\n            \r\n            *الترجمة المرئية Subtitles.\r\n            انه لمن دواعي سروري ان انجز مشاريعك باقل وقت ممكن وعلى درجة عالية من الدقة والمهنية.\r\n            \r\n            رضا الزبائن هو هدفي الاول واضمن لك تسليمك العمل في اقرب وقت وبافضل نتيجة.\r\n            تواصل معي عبر الرسائل لمناقشة تفاصيل مشروعك.', NULL, NULL, '2022-05-24 06:53:40', '2022-05-25 08:16:09', NULL, 4, 0),
(3, 'فاطمة المشهور', NULL, 'female', '771951728', 'Yemen', 0, 'provider', 'fullstack developer', 'fullstack developer', '\"هداء\" مصممة جرافيك .\r\n\r\n            أمتلك خبرة العديد من السنوات في العمل على برامج التصميم المتنوعة بإتقان وإحترافية.\r\n            \r\n            أسعى دائماً لإخراج تصاميم مميزة، وابداعية تتناسب مع متطلبات العميل لمساعدته في تحقيق أهدافه المرجوة من التصميم .\r\n            \r\n            توظيفي للعمل على مشروعك سيوفر لك خدمات مميزة وإبداعية تناسب ذوقك :\r\n            \r\n            - تصميم المطبوعات.\r\n            \r\n            - تصميم الشعارات والهوية البصرية .\r\n            \r\n            - تصميم ورسم الشخصيات ثنائية الأبعاد\r\n            \r\n            - المونتاج\r\n            \r\n            - الموشن جرافيك\r\n            \r\n            - تصميم مقاطع الرسوم المتحركة\r\n            \r\n            - التعليق الصوتي\r\n            \r\n            عند عملك معي ستجدني شغوفة, ملهمة , صبورة, ومبدعة .. وسأحرص على أن أرتقي بتصميمك ليحقق اهداف ومتطلبات مشروعك .\r\n            \r\n            يسعدني زيارتكم معرض أعمالي ،،\r\n            \r\n            اشكركم لاهتمامكم وطابت أوقاتكم بالخير ،،', NULL, NULL, '2022-05-24 06:53:40', '2022-05-24 06:53:40', NULL, 4, 0),
(4, 'أفنان القدسي', NULL, 'female', '774971302', 'Yemen', 0, 'provider', 'frontend developer', 'frontend developer', 'خليل النوونو\r\n\r\n            مصمم جرافيك من سنة 2009\r\n            \r\n            حاصل على شهادة Adobe\r\n            \r\n            خبير في تصميم packaging ( تغليف المنتجات )\r\n            \r\n            خبير في تصميم branding ( الهويات البصرية والشعارات )\r\n            \r\n            خبير في تصميم المطبوعات و الاعلانات ( بوسترات - بيلبرود - رول اب الخ)\r\n            \r\n            خبير في تصميم اعلانات السوشيال ميديا\r\n            قمت بتفعيل حسابي في موقع مستقل في شهر 10 / 2021', NULL, NULL, '2022-05-24 06:53:40', '2022-05-24 06:53:40', NULL, 4, 0),
(6, 'محمد الدعيس', NULL, 'male', '770527144', 'Yemen', 0, 'provider', 'photoshop designer', 'photoshop designer', 'انا مطور ويب full stack اعمل بلغات html5 ,css3. javascript, jquery, ajax, laravel framework, json, bootstrap\r\n\r\n            حاصل على بكالريوس نظم معلومات ادارية بتقدير امتياز\r\n            \r\n            حاصل على شهادة معتمدة من مركز يات التعليمى بالمعادى فى مصر', NULL, NULL, '2022-05-24 06:53:40', '2022-05-24 06:53:40', NULL, 4, 0),
(7, 'هيفاء نبيل', NULL, 'female', '777526457', 'Yemen', 0, 'provider', 'illustratior designer', 'illustratior designe', 'مهندس مدني حاصل على شهادة بكالوريوس الهندسة المدنية بتقدير جيد جدا.\r\n\r\n            عملت في مكتب استشاري لإعداد وتصميم المخططات الهندسية ، وأعمل في مجال المقاولات كمهندس موقع ... وبهذا جمعت بين الجانب النظري والعملي للإتقان والوصول لأفضل جودة بأقل تكلفة.\r\n            \r\n            أقدم خدماتي في مجالات متنوعة من خلال:\r\n            \r\n            -تصميم المخططات المعمارية والإنشائية والكهربائية والميكانيكية للمنشآت .\r\n            \r\n            -تجهيز المخططات التنفيذية للمنشآت\r\n            \r\n            -حساب الكميات بدقة عالية في الأعمال الخرسانية وفي أعمال التشطيبات .\r\n            \r\n            -تحليل الأسعار وحساب التكلفة التقديرية للأعمال.\r\n            \r\n            -مراجعة المخططات الإنشائية.\r\n            \r\n            -إعداد الجداول الزمنية للمشروع الإنشائي\r\n            \r\n            -إعداد كافة مستخلصات الاعمال (الحصر والمالية).\r\n            \r\n            -مهندس تصميم وإخراج المخططات بكل حرافية باستخدام كل من برامج التصميم.\r\n            \r\n            -استخدام البرامج الهندسية اللازمة مثل Auto Cad civil ،Robot Structural ، Prokon ،CSI Safe & Etabs ،Microsoft Office programs : (Word, PowerPoint, Excel and Access).\r\n            \r\n            -استخدام الاكسل والوورد باحترافية عالية .\r\n            \r\n            -تصميم عروض البوربوينت.\r\n            \r\n            أشكرك على وقتك الثمين، وكن مطمئنًا لأن عملك معي سيفوق توقعاتك.', NULL, NULL, '2022-05-24 06:53:40', '2022-05-24 06:53:40', NULL, 4, 0),
(8, 'مختار غالب', NULL, NULL, NULL, 'Yemen', 0, 'provider', 'Flutter programm', 'Flutter programming', 'مرحبا بكم وأسعد بزيارتكم ملفي الشخصي.\r\n\r\n            شريف سمير مصمم جرافيك ومحترف في رسم الكاريكاتير والشخصيات الكرتونية\r\n            \r\n            متخصص في تصميم الشعارات - وكافة انواع الدعاية المطبوعة والبصرية -\r\n            \r\n            بناء علامات تجارية ( Logo design )\r\n            \r\n            تصميم هويات بصرية تجارية بجميع محتوياتها ( كروت شخصية - خطابات\r\n            \r\n            مراسلة -أظرف - ختم - فواتير الخ )\r\n            \r\n            تصميم المطبوعات بكافة أنواعها (فلاير - بروشور - بانرات - رول أب - بوب أب - أسطوانات - فولدرات)\r\n            \r\n            التزم الدقة في التنفيذ والأحترافية في الأداء والالتزام بموعد التسليم\r\n            \r\n            أهم شيء بالنسبة لي هو ارضاء العميل عن العمل\r\n            \r\n            يسعدني رأيتك لمعرض اعمالي\r\n            \r\n            تحياتي....', NULL, NULL, '2022-05-24 06:53:40', '2022-05-25 06:22:04', NULL, 4, 0),
(9, 'هيثم أمين', NULL, NULL, NULL, 'Yemen', 0, 'provider', 'C++ programm', 'C++ programming', 'مرحبا بك، شكرا لك على زيارة ملفي الشخصي.\r\n\r\n            أنا بلال مصمم جرافيك محترف،\r\n            \r\n            - لدي أزيد من اربع سنوات من الخبرة في مجال التصميم الإعلاني\r\n            \r\n            - حاصل على لقب بائع موثوق في خمسات\r\n            \r\n            - أصمم البوستات لمواقع التواصل الاجتماعي - ( فيسبوك - تويتر - انستقرام - سناب شات - لينكدن - يوتيوب .. الخ ) وكذلك الصور المصغرة - التي توضع في فيديوهات يوتيوب ( YouTube thumbnail ) .\r\n            \r\n            - أصمم صور للمقالات والتدوينات بجودة عالية وبتصميمات مميزة ومعبرة عن المحتوى.\r\n            \r\n            - أصمم ستيكرات ( اغلفة ) المنتجات بمختلف انواعها.\r\n            \r\n            - أصمم الاعلانات بمختلف أنواعها سواء كانت للنشر في الانترنت او للطباعة ( بروشورات، مطويات، بوسترات، فلاير ..الخ ).\r\n            \r\n            - أصمم السير الذاتية (CV or Resume ) ، بطائق الأعمال ( Card business ).\r\n            \r\n            - أصمم أغلفة ( Cover ) لمواقع التواصل الاجتماعي، وكذلك أغلفة للكتب او الكتيبات وتكون جاهزة للطباعة.\r\n            تواصل(ي) معي إذا كان لديك أي استفسار حول عملي وسأكون سعيد بالرد عليك في أقرب وقت ممكن.', NULL, NULL, '2022-05-24 06:53:40', '2022-05-25 06:21:48', NULL, 4, 0),
(10, 'افنان محمود', '1653565754_Avatar (1).png', '-1', '770695605', 'Yemen', 0, NULL, 'مطور ويب', '1', 'مهتم في تطوير الويب وابحث عن اشخاص متاحين في مجال تطوير الويب', NULL, 1, '2022-05-24 06:58:36', '2022-05-26 10:27:43', 0, 4, 0),
(11, 'Ruqaiah Saif', '1653507414_r.jpg', '-1', '7770695605', 'Yemen', 4, NULL, 'Full Stack developer', '1', 'مرحباً بك\r\n\r\nأنا مطورة صفحات الكترونية ذات خبرة ممتدة لأكثر من 8 سنوات في مجال برمجة المواقع الالكترونية\r\n\r\nتشمل مهاراتي في تطوير وبرمجة المواقع الالكترونية :\r\nخبرة ممتازة في اطار العمل Laravel لتطوير المواقع الالكترونية .\r\n\r\nخبرة ممتازة في خدمات API لتطبيقات الاندرويد و الايفون .\r\n\r\nخبرة ممتازة في HTML , JQuery , JavaScript, Bootsrape .\r\n\r\nخبرة ممتازة في تحليل الأنظمة.\r\n\r\nخبرة ممتازة في التدريب في مجال الذكاء الاصطناعي.\r\n\r\nخبرة جيدة في ربط التعلم الآلة و برنامج PictoBlox .\r\n\r\nخبرة جيدة في برمجة Python .\r\nبفضل خبرتي في تطوير وبرمجة المواقع الالكترونية ، يمكنني إنشاء تطبيقات ويب قابلة للتخصيص بالكامل وفقًا لرؤيتك والوظائف المطلوبة.\r\n\r\nأنا سريعة التعلم ، وأعمل على تلبية المعايير العالية في كل مرة وأعمل بسرعة كبيرة في صلب الموضوع!\r\n\r\nهل أنت مستعد لإضفاء الروعة على مشروعك؟ لا تتردد في التواصل معي.', NULL, 1, '2022-05-24 07:01:04', '2022-05-26 06:37:28', 0, -1, 6),
(12, 'محمد المخلافي', '1653565777_Avatar (5).png', '1', '7770695605', 'Yemen', 5, NULL, 'Full Stack developer', '1', 'مطور ويب مبدع ومتمرس في عالم البرمجة متخصص في إطار العمل لارفيل ، مدرك تماما لأحداث الوظائف ومواكب لتطور العلم عن كثب ، أعمل على تطوير ذاتي بإستمرار بما يخدم إحتياجاتكم.\r\n\r\nخبرة كاملة في جميع جوانب برمجة المواقع من التصميم حتى البرمجة باستخدام بيئة العمل لارفيل.\r\nستجدني دائما دقيقا خبيرا مهنيا ومبتكرا ، لذلك أؤكد لك أنك ستكون أكثر من راضٍ بعد استلام عملي.', NULL, 1, '2022-05-25 13:55:01', '2022-05-26 10:28:53', 0, -1, 2),
(13, 'Fatima Almashhor', '1653565712_Avatar (4).png', '-1', '+967738926409', 'Yemen', 3, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-26 08:35:40', '2022-05-28 02:11:19', NULL, 4, 2),
(14, 'ضحى الخراساني', '1653675309_Avatar (3).png', '-1', '+967738926409', 'Yemen', 0, NULL, NULL, NULL, NULL, NULL, NULL, '2022-05-27 15:13:45', '2022-05-27 16:05:05', NULL, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seeker_id` bigint(20) UNSIGNED DEFAULT NULL,
  `provider_id` bigint(20) UNSIGNED DEFAULT NULL,
  `offer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `stated_at` timestamp NULL DEFAULT NULL,
  `duration` double DEFAULT NULL,
  `post_id` bigint(20) UNSIGNED DEFAULT NULL,
  `files` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `finshed` tinyint(1) NOT NULL DEFAULT 0,
  `finshed_at` timestamp NULL DEFAULT NULL,
  `other_way_send_files` tinyint(1) DEFAULT 0,
  `totalAmount` double DEFAULT 0,
  `invoice` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'unpaid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `seeker_id`, `provider_id`, `offer_id`, `status`, `created_at`, `updated_at`, `amount`, `stated_at`, `duration`, `post_id`, `files`, `url`, `finshed`, `finshed_at`, `other_way_send_files`, `totalAmount`, `invoice`, `payment_status`) VALUES
(1, 10, 11, 1, 'received', '2022-05-24 07:20:09', '2022-05-24 07:25:32', 200, '2022-05-23 21:00:00', 3, 1, NULL, NULL, 1, '2022-05-23 21:00:00', 1, 190, 'LoxCFEGWmo', 'received'),
(2, 10, 11, 2, 'rejected', '2022-05-24 07:30:00', '2022-05-24 07:30:32', 200, NULL, 30, 2, NULL, NULL, 0, NULL, 0, 190, NULL, 'unpaid'),
(3, 10, 11, 2, 'received', '2022-05-24 07:33:33', '2022-05-24 07:47:20', 300, '2022-05-23 21:00:00', 30, 2, NULL, NULL, 1, NULL, 1, 285, 'Ve9SgAWW6E', 'received'),
(4, 10, 11, 3, 'received', '2022-05-25 09:50:36', '2022-05-25 09:56:27', 200, '2022-05-24 21:00:00', 5, 3, NULL, NULL, 1, '2022-05-24 21:00:00', 1, 190, 'YcI1L2Jo7G', 'received'),
(6, 10, 11, 5, 'received', '2022-05-25 11:23:33', '2022-05-25 11:29:25', 25, '2022-05-24 21:00:00', 2, 5, NULL, NULL, 1, '2022-05-24 21:00:00', 1, 23.75, 'O88Xu3FFlS', 'received'),
(8, 10, 11, 8, 'pending', '2022-05-25 14:10:20', '2022-05-25 14:10:20', 50, NULL, 5, 8, NULL, NULL, 0, NULL, 0, 47.5, NULL, 'unpaid'),
(9, 10, 11, 8, 'received', '2022-05-25 14:10:27', '2022-05-25 14:15:56', 50, '2022-05-24 21:00:00', 5, 8, NULL, NULL, 1, '2022-05-24 21:00:00', 1, 47.5, 'gaETbmlXE6', 'received'),
(10, 10, 11, 7, 'received', '2022-05-25 14:18:37', '2022-05-26 09:35:14', 100, '2022-05-24 21:00:00', 15, 7, NULL, 'https://join.slack.com/t/web-giz-3rd-batch/shared_invite/zt-17cxdy8ch-nEV_jXVvxqT0PJSGc4ivAQ', 0, NULL, 0, 95, 'TcikBFVP5k', 'paid'),
(11, 10, 12, 13, 'received', '2022-05-25 17:22:52', '2022-05-25 17:33:31', 50, '2022-05-24 21:00:00', 7, 10, NULL, NULL, 1, '2022-05-24 21:00:00', 1, 47.5, '23dgQTjcmb', 'received'),
(12, 10, 12, 14, 'received', '2022-05-25 17:47:56', '2022-05-25 17:50:25', 100, '2022-05-24 21:00:00', 5, 11, NULL, NULL, 1, '2022-05-24 21:00:00', 1, 95, 'WWhtNNDZzd', 'received'),
(13, 10, 11, 20, 'received', '2022-05-26 03:46:12', '2022-05-26 03:58:56', 300, '2022-05-25 21:00:00', 7, 14, NULL, 'https://pretagteam.com/question/validate-url-javascript', 1, NULL, 0, 285, '4UcEihQbBn', 'received'),
(18, 10, 11, 31, 'received', '2022-05-26 06:22:19', '2022-05-26 06:24:39', 399, '2022-05-25 21:00:00', 3883, 18, NULL, NULL, 1, '2022-05-25 21:00:00', 1, 379.05, '5NVjzsY2dZ', 'received'),
(19, 10, 11, 34, 'received', '2022-05-26 06:36:52', '2022-05-26 09:45:36', 400, '2022-05-25 21:00:00', 15, 20, NULL, 'https://join.slack.com/t/web-giz-3rd-batch/shared_invite/zt-17cxdy8ch-nEV_jXVvxqT0PJSGc4ivAQ', 0, NULL, 1, 380, '82H9gocurV', 'paid'),
(20, 10, 13, 35, 'received', '2022-05-26 09:25:29', '2022-05-26 09:31:45', 100, '2022-05-25 21:00:00', 3, 19, NULL, NULL, 1, '2022-05-25 21:00:00', 1, 95, 'G4OKB6LPWQ', 'received'),
(24, 14, 13, 51, 'received', '2022-05-27 16:34:02', '2022-05-27 16:43:53', 33, '2022-05-26 21:00:00', 33, 23, NULL, NULL, 1, '2022-05-26 21:00:00', 1, 31.35, 'bhwbzCy3QV', 'received');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_report` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `massege` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `post_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `project_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `type_report`, `massege`, `provider_id`, `is_active`, `user_id`, `post_id`, `created_at`, `updated_at`, `project_id`) VALUES
(1, 'nonrecevied', 'التصميم سيء', NULL, 0, 10, NULL, '2022-05-24 07:43:36', '2022-05-24 07:47:20', 3),
(2, 'nonrecevied', 'شغلي تمام', NULL, 0, 11, NULL, '2022-05-24 07:44:54', '2022-05-24 07:47:20', 3),
(5, 'هذا المسخدم   يزعجني', 'مزعج', '2', 1, 11, NULL, '2022-05-26 01:18:30', '2022-05-26 01:18:30', NULL),
(6, 'هذا المحتوى يخالف شروط استخدام الموقع', 'هذا المحتوى يخالف شروط استخدام الموقع', NULL, 1, 12, 9, '2022-05-26 01:19:26', '2022-05-26 01:19:26', NULL),
(7, 'nonrecevied', 'التصميم ما اعجبني', NULL, 0, 10, NULL, '2022-05-26 03:54:08', '2022-05-26 03:58:56', 13),
(8, 'nonrecevied', 'الشغل مكتمل', NULL, 0, 11, NULL, '2022-05-26 03:57:31', '2022-05-26 03:58:56', 13),
(11, 'هذا المسخدم   يزعجني', 'مزعج جدا', '2', 1, 10, NULL, '2022-05-26 10:06:12', '2022-05-26 10:06:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', 'إدارة النظام', 'This is role of super admin, has full permissions', '2022-05-24 06:53:39', '2022-05-24 06:53:39'),
(2, 'admin', 'إدارة المحتوى', 'This is role of admin, has partially permissions', '2022-05-24 06:53:39', '2022-05-24 06:53:39'),
(3, 'seeker', 'طالب الخدمة', 'This is role of seeker, who register to post to get a service', '2022-05-24 06:53:39', '2022-05-24 06:53:39'),
(4, 'provider', 'مقدم الخدمة', 'This is role of provider, who register to provide and offer a service', '2022-05-24 06:53:39', '2022-05-24 06:53:39');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`role_id`, `user_id`, `user_type`) VALUES
(2, 1, 'App\\Models\\User'),
(4, 2, 'App\\Models\\User'),
(4, 3, 'App\\Models\\User'),
(4, 4, 'App\\Models\\User'),
(4, 5, 'App\\Models\\User'),
(4, 6, 'App\\Models\\User'),
(4, 7, 'App\\Models\\User'),
(4, 8, 'App\\Models\\User'),
(4, 9, 'App\\Models\\User'),
(3, 10, 'App\\Models\\User'),
(4, 11, 'App\\Models\\User'),
(4, 12, 'App\\Models\\User'),
(4, 13, 'App\\Models\\User'),
(3, 14, 'App\\Models\\User');

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'فتشوب', 1, '2022-05-24 06:53:40', '2022-05-24 06:53:40'),
(2, 'التصميم الابداعي', 1, '2022-05-24 06:53:40', '2022-05-24 06:53:40'),
(3, ' اعلان', 0, '2022-05-24 06:53:40', '2022-05-24 06:53:40'),
(4, ' مايكروسوفت وورد', 1, '2022-05-24 06:53:40', '2022-05-24 06:53:40'),
(5, '  الترجمة', 1, '2022-05-24 06:53:40', '2022-05-24 06:53:40'),
(6, 'لارفيل', 1, '2022-05-25 16:42:31', '2022-05-25 16:42:31'),
(7, 'MySQL', 1, '2022-05-25 16:43:18', '2022-05-25 16:43:18'),
(8, 'وردبريس', 1, '2022-05-25 17:14:37', '2022-05-25 17:14:37');

-- --------------------------------------------------------

--
-- Table structure for table `specializations`
--

CREATE TABLE `specializations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payable_id` bigint(20) UNSIGNED NOT NULL,
  `wallet_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('deposit','withdraw') COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(64,0) NOT NULL,
  `confirmed` tinyint(1) NOT NULL,
  `meta` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`meta`)),
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `payable_type`, `payable_id`, `wallet_id`, `type`, `amount`, `confirmed`, `meta`, `uuid`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 10, 1, 'deposit', '10000', 1, NULL, 'e2888a33-be36-43ae-9d89-3427d2d01a6a', '2022-05-24 06:58:37', '2022-05-24 06:58:37'),
(2, 'App\\Models\\User', 11, 2, 'deposit', '10000', 1, NULL, '0f317b3f-baa2-47d7-aaed-099b7f669f05', '2022-05-24 07:01:04', '2022-05-24 07:01:04'),
(3, 'App\\Models\\User', 10, 1, 'withdraw', '-200', 1, '{\"project_id\":\"1\",\"invoice_referance\":\"LoxCFEGWmo\"}', '2c737718-596d-4fa0-8d03-af8bb3e5bd9c', '2022-05-24 07:22:34', '2022-05-24 07:22:34'),
(4, 'App\\Models\\User', 1, 3, 'deposit', '200', 1, '{\"project_id\":\"1\",\"invoice_referance\":\"LoxCFEGWmo\"}', '6a1a41dd-4a9e-4e57-bb01-f1a2108d6281', '2022-05-24 07:22:34', '2022-05-24 07:22:34'),
(5, 'App\\Models\\User', 1, 3, 'withdraw', '-190', 1, '{\"project_id\":\"1\",\"invoice_referance\":\"LoxCFEGWmo\"}', '7695e882-c1bb-4b73-9127-87aefae5ed80', '2022-05-24 07:25:32', '2022-05-24 07:25:32'),
(6, 'App\\Models\\User', 11, 2, 'deposit', '190', 1, '{\"project_id\":\"1\",\"invoice_referance\":\"LoxCFEGWmo\"}', 'c351d6b2-2d28-41db-8b5d-b4113c7c267a', '2022-05-24 07:25:32', '2022-05-24 07:25:32'),
(7, 'App\\Models\\User', 10, 1, 'withdraw', '-300', 1, '{\"project_id\":\"3\",\"invoice_referance\":\"Ve9SgAWW6E\"}', 'd3e0e992-9758-4d37-b253-0049a5e75b4c', '2022-05-24 07:41:00', '2022-05-24 07:41:00'),
(8, 'App\\Models\\User', 1, 3, 'deposit', '300', 1, '{\"project_id\":\"3\",\"invoice_referance\":\"Ve9SgAWW6E\"}', 'edd54fe0-bf6b-4272-beaf-3d80ad6b6368', '2022-05-24 07:41:00', '2022-05-24 07:41:00'),
(9, 'App\\Models\\User', 1, 3, 'withdraw', '-285', 1, '{\"project_id\":\"3\",\"invoice_referance\":\"Ve9SgAWW6E\"}', '34630829-ef7f-46a1-8724-b471a3d21210', '2022-05-24 07:47:20', '2022-05-24 07:47:20'),
(10, 'App\\Models\\User', 11, 2, 'deposit', '285', 1, '{\"project_id\":\"3\",\"invoice_referance\":\"Ve9SgAWW6E\"}', 'c981aad9-b4d2-4708-9410-40665f320002', '2022-05-24 07:47:20', '2022-05-24 07:47:20'),
(11, 'App\\Models\\User', 10, 1, 'withdraw', '-200', 1, '{\"project_id\":\"4\",\"invoice_referance\":\"YcI1L2Jo7G\"}', 'fb267063-c8c9-43cf-9843-ed99cd72a0ab', '2022-05-25 09:54:44', '2022-05-25 09:54:44'),
(12, 'App\\Models\\User', 1, 3, 'deposit', '200', 1, '{\"project_id\":\"4\",\"invoice_referance\":\"YcI1L2Jo7G\"}', '3fde8126-53c8-486a-a7be-dcb9de5554f8', '2022-05-25 09:54:44', '2022-05-25 09:54:44'),
(13, 'App\\Models\\User', 1, 3, 'withdraw', '-190', 1, '{\"project_id\":\"4\",\"invoice_referance\":\"YcI1L2Jo7G\"}', 'f51c62da-d0ef-4114-b4cb-dc4af7bfa5f5', '2022-05-25 09:56:27', '2022-05-25 09:56:27'),
(14, 'App\\Models\\User', 11, 2, 'deposit', '190', 1, '{\"project_id\":\"4\",\"invoice_referance\":\"YcI1L2Jo7G\"}', '8fcc1d0c-4e06-4275-901a-82bffc45ac79', '2022-05-25 09:56:27', '2022-05-25 09:56:27'),
(15, 'App\\Models\\User', 10, 1, 'withdraw', '-200', 1, '{\"project_id\":\"5\",\"invoice_referance\":\"i3J7y6x9DE\"}', '26d667fd-fc28-46b7-a128-6015138fb2b7', '2022-05-25 10:13:08', '2022-05-25 10:13:08'),
(16, 'App\\Models\\User', 1, 3, 'deposit', '200', 1, '{\"project_id\":\"5\",\"invoice_referance\":\"i3J7y6x9DE\"}', '68ca5059-302a-457c-9c57-65da6ccf9309', '2022-05-25 10:13:08', '2022-05-25 10:13:08'),
(17, 'App\\Models\\User', 1, 3, 'withdraw', '-190', 1, '{\"project_id\":\"5\",\"invoice_referance\":\"i3J7y6x9DE\"}', '3a55532a-3a5d-454b-b488-c017ed75933b', '2022-05-25 10:14:58', '2022-05-25 10:14:58'),
(18, 'App\\Models\\User', 11, 2, 'deposit', '190', 1, '{\"project_id\":\"5\",\"invoice_referance\":\"i3J7y6x9DE\"}', 'bd2f3b9b-f7e1-4f77-9161-2aeb0dd6f3f4', '2022-05-25 10:14:58', '2022-05-25 10:14:58'),
(19, 'App\\Models\\User', 10, 1, 'withdraw', '-25', 1, '{\"project_id\":\"6\",\"invoice_referance\":\"O88Xu3FFlS\"}', '2f1e8357-3f30-450f-9e7f-7f7ad4407852', '2022-05-25 11:27:13', '2022-05-25 11:27:13'),
(20, 'App\\Models\\User', 1, 3, 'deposit', '25', 1, '{\"project_id\":\"6\",\"invoice_referance\":\"O88Xu3FFlS\"}', 'faf45e9b-ed6f-4c2f-8d38-3e1c1a76a8af', '2022-05-25 11:27:13', '2022-05-25 11:27:13'),
(21, 'App\\Models\\User', 1, 3, 'withdraw', '-23', 1, '{\"project_id\":\"6\",\"invoice_referance\":\"O88Xu3FFlS\"}', 'd62eb800-e58f-4128-8ed3-04843e0416c6', '2022-05-25 11:29:25', '2022-05-25 11:29:25'),
(22, 'App\\Models\\User', 11, 2, 'deposit', '23', 1, '{\"project_id\":\"6\",\"invoice_referance\":\"O88Xu3FFlS\"}', '9c4a45a7-ae96-4692-b710-3c6292a72edd', '2022-05-25 11:29:25', '2022-05-25 11:29:25'),
(23, 'App\\Models\\User', 10, 1, 'withdraw', '-200', 1, '{\"project_id\":\"7\",\"invoice_referance\":\"QcCR1wGKoF\"}', 'e99f8e98-3fa2-43a5-8518-df807e00d1dd', '2022-05-25 11:38:09', '2022-05-25 11:38:09'),
(24, 'App\\Models\\User', 1, 3, 'deposit', '200', 1, '{\"project_id\":\"7\",\"invoice_referance\":\"QcCR1wGKoF\"}', '2cbe8c77-fc9f-4b39-b658-8c853a27f224', '2022-05-25 11:38:09', '2022-05-25 11:38:09'),
(25, 'App\\Models\\User', 1, 3, 'withdraw', '-190', 1, '{\"project_id\":\"7\",\"invoice_referance\":\"QcCR1wGKoF\"}', 'a2216f4c-760c-4a57-8ccd-580d90b0bdbf', '2022-05-25 11:49:16', '2022-05-25 11:49:16'),
(26, 'App\\Models\\User', 11, 2, 'deposit', '190', 1, '{\"project_id\":\"7\",\"invoice_referance\":\"QcCR1wGKoF\"}', 'e468a92b-9c68-4167-8c11-42bc83886255', '2022-05-25 11:49:16', '2022-05-25 11:49:16'),
(27, 'App\\Models\\User', 12, 4, 'deposit', '10000', 1, NULL, '9826231e-3b15-4893-b913-2082e72acb0f', '2022-05-25 13:55:01', '2022-05-25 13:55:01'),
(28, 'App\\Models\\User', 10, 1, 'withdraw', '-50', 1, '{\"project_id\":\"9\",\"invoice_referance\":\"gaETbmlXE6\"}', '5906b8f6-c5b6-4ca4-9203-d3b32e01d9a7', '2022-05-25 14:13:45', '2022-05-25 14:13:45'),
(29, 'App\\Models\\User', 1, 3, 'deposit', '50', 1, '{\"project_id\":\"9\",\"invoice_referance\":\"gaETbmlXE6\"}', '2c6f7d4c-9aff-4c6f-a92a-796a4594631c', '2022-05-25 14:13:45', '2022-05-25 14:13:45'),
(30, 'App\\Models\\User', 1, 3, 'withdraw', '-47', 1, '{\"project_id\":\"9\",\"invoice_referance\":\"gaETbmlXE6\"}', '2de3bcae-6054-44e3-88c0-853e7a3ec929', '2022-05-25 14:15:56', '2022-05-25 14:15:56'),
(31, 'App\\Models\\User', 11, 2, 'deposit', '47', 1, '{\"project_id\":\"9\",\"invoice_referance\":\"gaETbmlXE6\"}', 'c50b813f-cf57-4495-aeb6-e23e894c6769', '2022-05-25 14:15:56', '2022-05-25 14:15:56'),
(32, 'App\\Models\\User', 10, 1, 'withdraw', '-100', 1, '{\"project_id\":\"10\",\"invoice_referance\":\"TcikBFVP5k\"}', 'ae270720-cb3a-4268-93f4-ac1b4c370f77', '2022-05-25 14:20:18', '2022-05-25 14:20:18'),
(33, 'App\\Models\\User', 1, 3, 'deposit', '100', 1, '{\"project_id\":\"10\",\"invoice_referance\":\"TcikBFVP5k\"}', 'a9e77241-dc0d-4d58-9148-7aa2e006f81c', '2022-05-25 14:20:18', '2022-05-25 14:20:18'),
(34, 'App\\Models\\User', 10, 1, 'withdraw', '-50', 1, '{\"project_id\":\"11\",\"invoice_referance\":\"23dgQTjcmb\"}', 'bac437d6-4bb3-42ec-aef0-e4f4555f2c9e', '2022-05-25 17:32:10', '2022-05-25 17:32:10'),
(35, 'App\\Models\\User', 1, 3, 'deposit', '50', 1, '{\"project_id\":\"11\",\"invoice_referance\":\"23dgQTjcmb\"}', '9727b675-1a6f-4c72-bbf8-e33fad48d8f3', '2022-05-25 17:32:10', '2022-05-25 17:32:10'),
(36, 'App\\Models\\User', 1, 3, 'withdraw', '-47', 1, '{\"project_id\":\"11\",\"invoice_referance\":\"23dgQTjcmb\"}', '6356659d-58cd-42ce-bb27-2cb3dd7adc0f', '2022-05-25 17:33:31', '2022-05-25 17:33:31'),
(37, 'App\\Models\\User', 12, 4, 'deposit', '47', 1, '{\"project_id\":\"11\",\"invoice_referance\":\"23dgQTjcmb\"}', '64017d85-592b-4e67-b8d1-4cd7a4adce78', '2022-05-25 17:33:31', '2022-05-25 17:33:31'),
(38, 'App\\Models\\User', 10, 1, 'withdraw', '-100', 1, '{\"project_id\":\"12\",\"invoice_referance\":\"WWhtNNDZzd\"}', 'ee50c261-f357-4715-8223-934993ea1337', '2022-05-25 17:49:14', '2022-05-25 17:49:14'),
(39, 'App\\Models\\User', 1, 3, 'deposit', '100', 1, '{\"project_id\":\"12\",\"invoice_referance\":\"WWhtNNDZzd\"}', '432e7556-c95b-47b8-a7d0-ded9ab99670a', '2022-05-25 17:49:14', '2022-05-25 17:49:14'),
(40, 'App\\Models\\User', 1, 3, 'withdraw', '-95', 1, '{\"project_id\":\"12\",\"invoice_referance\":\"WWhtNNDZzd\"}', 'ec447d5c-2846-4e47-89d6-0119c34300c7', '2022-05-25 17:50:25', '2022-05-25 17:50:25'),
(41, 'App\\Models\\User', 12, 4, 'deposit', '95', 1, '{\"project_id\":\"12\",\"invoice_referance\":\"WWhtNNDZzd\"}', '258ab0fa-a04c-4ffe-850b-0e5100c5526d', '2022-05-25 17:50:25', '2022-05-25 17:50:25'),
(42, 'App\\Models\\User', 10, 1, 'withdraw', '-300', 1, '{\"project_id\":\"13\",\"invoice_referance\":\"4UcEihQbBn\"}', '2e56c030-3f4f-4c0e-953b-9a12f3d19795', '2022-05-26 03:48:05', '2022-05-26 03:48:05'),
(43, 'App\\Models\\User', 1, 3, 'deposit', '300', 1, '{\"project_id\":\"13\",\"invoice_referance\":\"4UcEihQbBn\"}', '56cf198b-4f64-4349-bd4e-e61ca5576de8', '2022-05-26 03:48:05', '2022-05-26 03:48:05'),
(44, 'App\\Models\\User', 1, 3, 'withdraw', '-285', 1, '{\"project_id\":\"13\",\"invoice_referance\":\"4UcEihQbBn\"}', 'b6dcf2ed-e6f5-4b81-9d28-fde142ead194', '2022-05-26 03:58:56', '2022-05-26 03:58:56'),
(45, 'App\\Models\\User', 10, 1, 'deposit', '285', 1, '{\"project_id\":\"13\",\"invoice_referance\":\"4UcEihQbBn\"}', '6e09f694-70fd-4d6f-b4c3-74df3c44dc38', '2022-05-26 03:58:56', '2022-05-26 03:58:56'),
(46, 'App\\Models\\User', 10, 1, 'withdraw', '-800', 1, '{\"project_id\":\"14\",\"invoice_referance\":\"cjpMtYUFqH\"}', 'af71b0f5-c849-44a3-ad46-89059c2aee5c', '2022-05-26 05:44:04', '2022-05-26 05:44:04'),
(47, 'App\\Models\\User', 1, 3, 'deposit', '800', 1, '{\"project_id\":\"14\",\"invoice_referance\":\"cjpMtYUFqH\"}', 'd8ca66d0-e236-4d8f-b2e9-931e2ba61007', '2022-05-26 05:44:04', '2022-05-26 05:44:04'),
(48, 'App\\Models\\User', 10, 1, 'withdraw', '-399', 1, '{\"project_id\":\"18\",\"invoice_referance\":\"5NVjzsY2dZ\"}', '31dae04f-9516-44e0-9051-94a2a459cb1c', '2022-05-26 06:23:34', '2022-05-26 06:23:34'),
(49, 'App\\Models\\User', 1, 3, 'deposit', '399', 1, '{\"project_id\":\"18\",\"invoice_referance\":\"5NVjzsY2dZ\"}', 'cc6b126e-36ff-4917-a9f5-55de025434ac', '2022-05-26 06:23:34', '2022-05-26 06:23:34'),
(50, 'App\\Models\\User', 1, 3, 'withdraw', '-379', 1, '{\"project_id\":\"18\",\"invoice_referance\":\"5NVjzsY2dZ\"}', 'a9183f60-bff9-490c-a68f-93f4291bc641', '2022-05-26 06:24:39', '2022-05-26 06:24:39'),
(51, 'App\\Models\\User', 11, 2, 'deposit', '379', 1, '{\"project_id\":\"18\",\"invoice_referance\":\"5NVjzsY2dZ\"}', '9e852bf9-4ca0-47ed-a310-5f3a179e3858', '2022-05-26 06:24:39', '2022-05-26 06:24:39'),
(52, 'App\\Models\\User', 10, 1, 'withdraw', '-400', 1, '{\"project_id\":\"19\",\"invoice_referance\":\"82H9gocurV\"}', 'b9498d8b-dcf4-451c-a933-08ddf556c9a9', '2022-05-26 06:38:13', '2022-05-26 06:38:13'),
(53, 'App\\Models\\User', 1, 3, 'deposit', '400', 1, '{\"project_id\":\"19\",\"invoice_referance\":\"82H9gocurV\"}', '4063b296-728a-497c-8fdc-7d0af9e6e30b', '2022-05-26 06:38:13', '2022-05-26 06:38:13'),
(54, 'App\\Models\\User', 13, 5, 'deposit', '10000', 1, NULL, '605d083e-a9f6-4351-bc14-f7d10068e5d2', '2022-05-26 08:35:42', '2022-05-26 08:35:42'),
(55, 'App\\Models\\User', 10, 1, 'withdraw', '-100', 1, '{\"project_id\":\"20\",\"invoice_referance\":\"G4OKB6LPWQ\"}', '2c654abc-556e-44f0-8775-77aad208d40d', '2022-05-26 09:29:12', '2022-05-26 09:29:12'),
(56, 'App\\Models\\User', 1, 3, 'deposit', '100', 1, '{\"project_id\":\"20\",\"invoice_referance\":\"G4OKB6LPWQ\"}', '60fa19b8-cd15-4e58-a233-09e39efd9603', '2022-05-26 09:29:12', '2022-05-26 09:29:12'),
(57, 'App\\Models\\User', 1, 3, 'withdraw', '-95', 1, '{\"project_id\":\"20\",\"invoice_referance\":\"G4OKB6LPWQ\"}', 'bf649a01-1768-4cca-870d-e1fd6054158a', '2022-05-26 09:31:45', '2022-05-26 09:31:45'),
(58, 'App\\Models\\User', 13, 5, 'deposit', '95', 1, '{\"project_id\":\"20\",\"invoice_referance\":\"G4OKB6LPWQ\"}', '05c34014-cf6f-4228-a7c9-abf0aa53ea3a', '2022-05-26 09:31:45', '2022-05-26 09:31:45'),
(59, 'App\\Models\\User', 10, 1, 'withdraw', '-100', 1, '{\"project_id\":\"21\",\"invoice_referance\":\"C67Rmcb1f4\"}', '73c0478f-6f39-4d46-9a75-ebde4ea47140', '2022-05-26 09:51:50', '2022-05-26 09:51:50'),
(60, 'App\\Models\\User', 1, 3, 'deposit', '100', 1, '{\"project_id\":\"21\",\"invoice_referance\":\"C67Rmcb1f4\"}', 'bed876aa-ab00-4afa-b549-726dee96ba65', '2022-05-26 09:51:50', '2022-05-26 09:51:50'),
(61, 'App\\Models\\User', 1, 3, 'withdraw', '-95', 1, '{\"project_id\":\"21\",\"invoice_referance\":\"C67Rmcb1f4\"}', 'ace57979-94b7-4791-abc8-f276d0fe82e4', '2022-05-26 09:58:20', '2022-05-26 09:58:20'),
(62, 'App\\Models\\User', 13, 5, 'deposit', '95', 1, '{\"project_id\":\"21\",\"invoice_referance\":\"C67Rmcb1f4\"}', '74b64c90-9e4c-458f-9b49-53c3f6fbab5c', '2022-05-26 09:58:20', '2022-05-26 09:58:20'),
(63, 'App\\Models\\User', 14, 6, 'deposit', '10000', 1, NULL, '1b368560-f408-49fa-8af4-8af9c8773006', '2022-05-27 15:13:47', '2022-05-27 15:13:47'),
(64, 'App\\Models\\User', 14, 6, 'withdraw', '-33', 1, '{\"project_id\":\"24\",\"invoice_referance\":\"bhwbzCy3QV\"}', '8c597d54-28fe-41be-9850-cd19a68a722f', '2022-05-27 16:38:43', '2022-05-27 16:38:43'),
(65, 'App\\Models\\User', 1, 3, 'deposit', '33', 1, '{\"project_id\":\"24\",\"invoice_referance\":\"bhwbzCy3QV\"}', '571e76eb-95b7-4318-ab12-8a9ca52c1298', '2022-05-27 16:38:43', '2022-05-27 16:38:43'),
(66, 'App\\Models\\User', 1, 3, 'withdraw', '-31', 1, '{\"project_id\":\"24\",\"invoice_referance\":\"bhwbzCy3QV\"}', 'b04fe1b6-12a2-42bf-8f2c-470983b3e1cf', '2022-05-27 16:43:53', '2022-05-27 16:43:53'),
(67, 'App\\Models\\User', 13, 5, 'deposit', '31', 1, '{\"project_id\":\"24\",\"invoice_referance\":\"bhwbzCy3QV\"}', 'f33c67ed-bf75-4fd4-bbef-4dc551758666', '2022-05-27 16:43:53', '2022-05-27 16:43:53');

-- --------------------------------------------------------

--
-- Table structure for table `transfers`
--

CREATE TABLE `transfers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_id` bigint(20) UNSIGNED NOT NULL,
  `to_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('exchange','transfer','paid','refund','gift') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'transfer',
  `status_last` enum('exchange','transfer','paid','refund','gift') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deposit_id` bigint(20) UNSIGNED NOT NULL,
  `withdraw_id` bigint(20) UNSIGNED NOT NULL,
  `discount` decimal(64,0) NOT NULL DEFAULT 0,
  `fee` decimal(64,0) NOT NULL DEFAULT 0,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transfers`
--

INSERT INTO `transfers` (`id`, `from_type`, `from_id`, `to_type`, `to_id`, `status`, `status_last`, `deposit_id`, `withdraw_id`, `discount`, `fee`, `uuid`, `created_at`, `updated_at`) VALUES
(1, 'Bavix\\Wallet\\Models\\Wallet', 1, 'Bavix\\Wallet\\Models\\Wallet', 3, 'transfer', NULL, 4, 3, '0', '0', '73d6118e-185d-4eaf-bd37-28e57586270d', '2022-05-24 07:22:34', '2022-05-24 07:22:34'),
(2, 'Bavix\\Wallet\\Models\\Wallet', 3, 'Bavix\\Wallet\\Models\\Wallet', 2, 'transfer', NULL, 6, 5, '0', '0', '51d44e9b-39b9-46a8-99f8-e90cc57008da', '2022-05-24 07:25:32', '2022-05-24 07:25:32'),
(3, 'Bavix\\Wallet\\Models\\Wallet', 1, 'Bavix\\Wallet\\Models\\Wallet', 3, 'transfer', NULL, 8, 7, '0', '0', 'e301bc3c-2bc2-4fd7-859f-bff12ead4b68', '2022-05-24 07:41:00', '2022-05-24 07:41:00'),
(4, 'Bavix\\Wallet\\Models\\Wallet', 3, 'Bavix\\Wallet\\Models\\Wallet', 2, 'transfer', NULL, 10, 9, '0', '0', 'a48aaa0e-81ad-408f-ae15-1260b24019c4', '2022-05-24 07:47:20', '2022-05-24 07:47:20'),
(5, 'Bavix\\Wallet\\Models\\Wallet', 1, 'Bavix\\Wallet\\Models\\Wallet', 3, 'transfer', NULL, 12, 11, '0', '0', '4ace3f35-1e7e-450e-aaad-3928fa77b01b', '2022-05-25 09:54:45', '2022-05-25 09:54:45'),
(6, 'Bavix\\Wallet\\Models\\Wallet', 3, 'Bavix\\Wallet\\Models\\Wallet', 2, 'transfer', NULL, 14, 13, '0', '0', '18132939-4a7c-4875-b827-61c1ef55bc91', '2022-05-25 09:56:27', '2022-05-25 09:56:27'),
(7, 'Bavix\\Wallet\\Models\\Wallet', 1, 'Bavix\\Wallet\\Models\\Wallet', 3, 'transfer', NULL, 16, 15, '0', '0', 'b3668be5-2335-4771-99e8-1383322b1cf8', '2022-05-25 10:13:08', '2022-05-25 10:13:08'),
(8, 'Bavix\\Wallet\\Models\\Wallet', 3, 'Bavix\\Wallet\\Models\\Wallet', 2, 'transfer', NULL, 18, 17, '0', '0', '6faab783-00a2-444f-9ed9-5b02fa9d4185', '2022-05-25 10:14:58', '2022-05-25 10:14:58'),
(9, 'Bavix\\Wallet\\Models\\Wallet', 1, 'Bavix\\Wallet\\Models\\Wallet', 3, 'transfer', NULL, 20, 19, '0', '0', '105a8e0f-5ba9-41ca-8b16-69e2b97bedf7', '2022-05-25 11:27:13', '2022-05-25 11:27:13'),
(10, 'Bavix\\Wallet\\Models\\Wallet', 3, 'Bavix\\Wallet\\Models\\Wallet', 2, 'transfer', NULL, 22, 21, '0', '0', '802f00f9-01ed-4d5b-a41d-693db8c6b63c', '2022-05-25 11:29:25', '2022-05-25 11:29:25'),
(11, 'Bavix\\Wallet\\Models\\Wallet', 1, 'Bavix\\Wallet\\Models\\Wallet', 3, 'transfer', NULL, 24, 23, '0', '0', 'eb802da5-5acb-4660-9704-8dc3877d9f16', '2022-05-25 11:38:09', '2022-05-25 11:38:09'),
(12, 'Bavix\\Wallet\\Models\\Wallet', 3, 'Bavix\\Wallet\\Models\\Wallet', 2, 'transfer', NULL, 26, 25, '0', '0', 'f4e64649-08f6-42d7-86cd-82c365b660bb', '2022-05-25 11:49:16', '2022-05-25 11:49:16'),
(13, 'Bavix\\Wallet\\Models\\Wallet', 1, 'Bavix\\Wallet\\Models\\Wallet', 3, 'transfer', NULL, 29, 28, '0', '0', 'a4fae74a-d948-44e6-a279-cd76f5400aca', '2022-05-25 14:13:45', '2022-05-25 14:13:45'),
(14, 'Bavix\\Wallet\\Models\\Wallet', 3, 'Bavix\\Wallet\\Models\\Wallet', 2, 'transfer', NULL, 31, 30, '0', '0', 'fa44750a-1108-4cc1-b849-4e5cf5894f7d', '2022-05-25 14:15:56', '2022-05-25 14:15:56'),
(15, 'Bavix\\Wallet\\Models\\Wallet', 1, 'Bavix\\Wallet\\Models\\Wallet', 3, 'transfer', NULL, 33, 32, '0', '0', '1d6e7375-de20-4e94-89d6-95b41ee85561', '2022-05-25 14:20:18', '2022-05-25 14:20:18'),
(16, 'Bavix\\Wallet\\Models\\Wallet', 1, 'Bavix\\Wallet\\Models\\Wallet', 3, 'transfer', NULL, 35, 34, '0', '0', '74ed3ce3-51c3-4d53-b37f-f72e0cdbf485', '2022-05-25 17:32:10', '2022-05-25 17:32:10'),
(17, 'Bavix\\Wallet\\Models\\Wallet', 3, 'Bavix\\Wallet\\Models\\Wallet', 4, 'transfer', NULL, 37, 36, '0', '0', '43692cc6-dabc-475d-b670-489337bf04dc', '2022-05-25 17:33:31', '2022-05-25 17:33:31'),
(18, 'Bavix\\Wallet\\Models\\Wallet', 1, 'Bavix\\Wallet\\Models\\Wallet', 3, 'transfer', NULL, 39, 38, '0', '0', 'ed82b973-4e1f-42c1-83c2-e44069481d27', '2022-05-25 17:49:14', '2022-05-25 17:49:14'),
(19, 'Bavix\\Wallet\\Models\\Wallet', 3, 'Bavix\\Wallet\\Models\\Wallet', 4, 'transfer', NULL, 41, 40, '0', '0', '05dbc189-205b-415d-9bfd-239d32f21d71', '2022-05-25 17:50:25', '2022-05-25 17:50:25'),
(20, 'Bavix\\Wallet\\Models\\Wallet', 1, 'Bavix\\Wallet\\Models\\Wallet', 3, 'transfer', NULL, 43, 42, '0', '0', 'ce48ce5b-1df3-461e-aaba-e9578e76f080', '2022-05-26 03:48:05', '2022-05-26 03:48:05'),
(21, 'Bavix\\Wallet\\Models\\Wallet', 3, 'Bavix\\Wallet\\Models\\Wallet', 1, 'transfer', NULL, 45, 44, '0', '0', '9e674bb8-2a7d-4d1c-a4fd-b9baadaecd3a', '2022-05-26 03:58:56', '2022-05-26 03:58:56'),
(22, 'Bavix\\Wallet\\Models\\Wallet', 1, 'Bavix\\Wallet\\Models\\Wallet', 3, 'transfer', NULL, 47, 46, '0', '0', 'a8a301ca-c81c-4f00-9395-f1f0f209e9bb', '2022-05-26 05:44:04', '2022-05-26 05:44:04'),
(23, 'Bavix\\Wallet\\Models\\Wallet', 1, 'Bavix\\Wallet\\Models\\Wallet', 3, 'transfer', NULL, 49, 48, '0', '0', '043fdee2-bf0b-4127-832a-3f1aacf1c3e2', '2022-05-26 06:23:34', '2022-05-26 06:23:34'),
(24, 'Bavix\\Wallet\\Models\\Wallet', 3, 'Bavix\\Wallet\\Models\\Wallet', 2, 'transfer', NULL, 51, 50, '0', '0', '9e3dd309-a840-44a9-8940-b23c5f357359', '2022-05-26 06:24:39', '2022-05-26 06:24:39'),
(25, 'Bavix\\Wallet\\Models\\Wallet', 1, 'Bavix\\Wallet\\Models\\Wallet', 3, 'transfer', NULL, 53, 52, '0', '0', '3ec5b4b1-5648-4aa1-9733-e269c2f8941e', '2022-05-26 06:38:13', '2022-05-26 06:38:13'),
(26, 'Bavix\\Wallet\\Models\\Wallet', 1, 'Bavix\\Wallet\\Models\\Wallet', 3, 'transfer', NULL, 56, 55, '0', '0', '14a99689-7202-4292-9dc1-4e9ea4360516', '2022-05-26 09:29:12', '2022-05-26 09:29:12'),
(27, 'Bavix\\Wallet\\Models\\Wallet', 3, 'Bavix\\Wallet\\Models\\Wallet', 5, 'transfer', NULL, 58, 57, '0', '0', 'e22d1e7d-c954-4b1a-9166-f103e6b34212', '2022-05-26 09:31:45', '2022-05-26 09:31:45'),
(28, 'Bavix\\Wallet\\Models\\Wallet', 1, 'Bavix\\Wallet\\Models\\Wallet', 3, 'transfer', NULL, 60, 59, '0', '0', '0ff54747-4d68-411a-8732-d944237a6fc1', '2022-05-26 09:51:51', '2022-05-26 09:51:51'),
(29, 'Bavix\\Wallet\\Models\\Wallet', 3, 'Bavix\\Wallet\\Models\\Wallet', 5, 'transfer', NULL, 62, 61, '0', '0', 'ffb773d9-ed4e-412b-bca1-a0efcd933269', '2022-05-26 09:58:20', '2022-05-26 09:58:20'),
(30, 'Bavix\\Wallet\\Models\\Wallet', 6, 'Bavix\\Wallet\\Models\\Wallet', 3, 'transfer', NULL, 65, 64, '0', '0', '7bc5d556-1ae1-470c-a0aa-de5be289109c', '2022-05-27 16:38:43', '2022-05-27 16:38:43'),
(31, 'Bavix\\Wallet\\Models\\Wallet', 3, 'Bavix\\Wallet\\Models\\Wallet', 5, 'transfer', NULL, 67, 66, '0', '0', '34921096-9a3a-4224-98f7-1c1c4d088e35', '2022-05-27 16:43:53', '2022-05-27 16:43:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `isban` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `google_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_online` tinyint(1) NOT NULL DEFAULT 0,
  `last_activity` timestamp NOT NULL DEFAULT '2022-05-24 06:53:39',
  `last_seen` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `is_active`, `isban`, `remember_token`, `created_at`, `updated_at`, `google_id`, `is_online`, `last_activity`, `last_seen`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$HvHRIlm9DK5Y0K/izPGunesRfrRkXZieaHhsDLSMqZZlKKk4Iv0Ey', 1, 0, '9JmkVk7w36dHJaD8xExAJOUiuwrTIYMaoG0zJIaM6eSnbk1y6P7XjVF6TRMM', '2022-05-24 06:53:39', '2022-05-28 02:12:30', NULL, 0, '2022-05-26 10:31:32', '2022-05-26 10:30:32'),
(2, 'ضحى الخراساني', 'raihanahit2016@gmail.com', NULL, '$2y$10$Q6o1VnMo7KpZMutmpXqzlePNFI6qbEr4IYKALz4UuaB.ne4SYbtk2', 1, 0, 'ml59rAnd8E0xQnDnMJPs4xTZgDDyEZM7vU0sLrwAFoTaRLVmAUa4kJ9LkQnz', '2022-05-24 06:53:39', '2022-05-28 02:12:30', NULL, 0, '2022-05-24 06:53:39', NULL),
(3, 'فاطمة المشهور', 'fatima.almashhor@gmail.com', NULL, '$2y$10$dY50Wzq9aiwSrhI7AK2pUOjBkyzxM0n6WETSPV45pdXauAgURp1PG', 1, 0, 'kGKQA4GgoUiBM2PURU0P30OEFcMskD2GYpTNXCoGJH20YsIEZrKt6fRgeO5W', '2022-05-24 06:53:40', '2022-05-28 02:12:30', NULL, 0, '2022-05-24 06:53:39', NULL),
(4, 'أفنان القدسي', 'afnanalkadasi22@gmail.com', NULL, '$2y$10$znliUarmpPYlCjvQ2zJ3ze/t772beJuClm2tCEJ.WFTX6cToa4Tca', 1, 0, '6rXAU1OFlYsYhqjcSSFAUiK6vkYqZaqNZWBQTQtsiOUxs93xGkqEQK6OlApj', '2022-05-24 06:53:40', '2022-05-28 02:12:30', NULL, 0, '2022-05-24 06:53:39', NULL),
(6, 'محمد الدعيس', 'mohammedaldoais1996@gmail.com', NULL, '$2y$10$/2omypkmcUIwmQwUO9sKquqtWVBta9thZNvB0x74Q9eyNuRsv6ko6', 1, 0, '087Oabq9QWrf2mr1ZtmbpbrPO4ABmtX7KokhffJIhdW9OzTSrdhhEEO6XJpD', '2022-05-24 06:53:40', '2022-05-28 02:12:30', NULL, 0, '2022-05-24 06:53:39', NULL),
(7, 'هيفاء نبيل', 'haifa@gmail.com', NULL, '$2y$10$JnGrqQMr6qwNHLrEd0A3ruWhR2XooF1KSW3g1mr1jfX01g3PLg.K2', 1, 0, 'Xg4pVfoEWPGvhZmnSyyCQ7aHAY7MnCiaAZxe1pm8nzkaNXsRBHgsTJsqb2UB', '2022-05-24 06:53:40', '2022-05-28 02:12:30', NULL, 0, '2022-05-24 06:53:39', NULL),
(8, 'مختار غالب', 'mokhtar@gmail.com', NULL, '$2y$10$t/DQhwKQXGFNQpklDIi6S.X8bxgyDGjEU8fHk3qnw2HVO6PqAxumO', 1, 0, 'TbjbpU9avn631W2Gt2jrSFgL87oCW7dI9xvpnbEzk40ScFAj7ZVf7F8R5SgJ', '2022-05-24 06:53:40', '2022-05-28 02:12:30', NULL, 0, '2022-05-24 06:53:39', NULL),
(9, 'هيثم أمين', 'haitham@gmail.com', NULL, '$2y$10$Viegbg0N1e4582Poh9OZ.uS.ZhFINCf8kuFuRGvK2/fKkHyr46urm', 1, 0, 'flOd4gS7Hat2eJPExMicda6Jf8SaUa1x7G1HndIorVseT1QDzxiCJdJqD3qZ', '2022-05-24 06:53:40', '2022-05-28 02:12:30', NULL, 0, '2022-05-24 06:53:39', NULL),
(10, 'افنان محمود', 'hamsa9469@gmail.com', '2022-05-24 06:59:39', '$2y$10$L0/ioHlnIpUTAap7BdIpz.KdwtVv1T2iD0SgnikiNRT7/yENHJUMS', 1, 0, '3965efc9-a91a-4242-ab10-76cc95a0fe66', '2022-05-24 06:58:26', '2022-05-28 02:12:30', NULL, 0, '2022-05-26 10:29:07', '2022-05-26 10:28:07'),
(11, 'Ruqaiah Saif', 'ruqaiah.saif@gmail.com', '2022-05-24 07:01:37', '$2y$10$4EuPhvuqT.Lz8/i1125b.eYL5roh2FVEiLDjNhcHdfeY7zoNA2xre', 1, 0, NULL, '2022-05-24 07:00:59', '2022-05-28 02:12:30', '115417372658010077322', 0, '2022-05-24 06:53:39', '2022-05-26 08:12:13'),
(12, 'محمد المخلافي', 'ruqaiahsaif2@gmail.com', '2022-05-25 13:59:20', '$2y$10$ohI8YEBdtXNuisj7juTNAO3f1HNTbYSPA6Ldr3fqdpTxOtG04e9om', 1, 0, 'hYkN4exGzv6I9QZgfnmXnCAeVXGabeFJTy4GSczcfxrAuHfVTypo1jGiNP5y', '2022-05-25 13:54:57', '2022-05-28 02:12:30', NULL, 0, '2022-05-26 10:29:53', '2022-05-26 10:28:53'),
(13, 'Fatima Amin', 'fatima.amin4official@gmail.com', '2022-05-26 08:36:11', '$2y$10$HN0eKKGJu5O25PKS4stC9uUiw1orvZzop.MnwlGNuEGzR.oTwWkRa', 1, 0, NULL, '2022-05-26 08:35:31', '2022-05-28 02:12:30', '117348556197028716832', 1, '2022-05-28 02:13:06', '2022-05-28 02:12:06'),
(14, 'ضحى الخرساني', 'ladyrelen@gmail.com', '2022-05-27 15:14:39', '$2y$10$WeiwnkZxzSrAJvzgs5eS/.cwnMFTNRsy73VtF1uWMk0oOU0NcliLm', 1, 0, 'KkWwtfNQSlOxkQEVSkBJrZLzoxw6tZ96Buu1hTWvmGQjk48U2n8QEFVcU36p', '2022-05-27 15:13:32', '2022-05-28 02:12:31', NULL, 1, '2022-05-28 02:13:31', '2022-05-28 02:12:31');

-- --------------------------------------------------------

--
-- Table structure for table `user_skills`
--

CREATE TABLE `user_skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `skill_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_skills`
--

INSERT INTO `user_skills` (`id`, `user_id`, `skill_id`, `created_at`, `updated_at`) VALUES
(1, 11, 2, NULL, NULL),
(2, 11, 6, NULL, NULL),
(3, 11, 7, NULL, NULL),
(4, 12, 1, NULL, NULL),
(5, 12, 2, NULL, NULL),
(7, 12, 6, NULL, NULL),
(8, 12, 7, NULL, NULL),
(9, 10, 1, NULL, NULL),
(10, 10, 2, NULL, NULL),
(11, 12, 8, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `holder_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `holder_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`meta`)),
  `balance` decimal(64,0) NOT NULL DEFAULT 0,
  `decimal_places` smallint(5) UNSIGNED NOT NULL DEFAULT 2,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `holder_type`, `holder_id`, `name`, `slug`, `uuid`, `description`, `meta`, `balance`, `decimal_places`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 10, 'Default Wallet', 'default', '23eb5582-1b16-4e92-b301-1e9789fbbe5a', NULL, '[]', '6761', 2, '2022-05-24 06:58:36', '2022-05-26 09:51:51'),
(2, 'App\\Models\\User', 11, 'Default Wallet', 'default', '025bf2e0-21ba-43c7-a2bd-e5063afe9bf4', NULL, '[]', '11494', 2, '2022-05-24 07:01:04', '2022-05-26 06:24:39'),
(3, 'App\\Models\\User', 1, 'Default Wallet', 'default', 'b362982c-034e-4fc4-877a-dcc1c221bef0', NULL, '[]', '1415', 2, '2022-05-24 07:02:34', '2022-05-27 16:43:53'),
(4, 'App\\Models\\User', 12, 'Default Wallet', 'default', '3727907f-26c2-4ebf-98c0-a88db1a56d07', NULL, '[]', '10142', 2, '2022-05-25 13:55:01', '2022-05-25 17:50:25'),
(5, 'App\\Models\\User', 13, 'Default Wallet', 'default', '1d119ff7-81de-415b-bdd9-cca630895f22', NULL, '[]', '10221', 2, '2022-05-26 08:35:41', '2022-05-27 16:43:53'),
(6, 'App\\Models\\User', 14, 'Default Wallet', 'default', '7a8f3111-182a-4a1e-a964-fbdb63840701', NULL, '[]', '9967', 2, '2022-05-27 15:13:46', '2022-05-27 16:38:43');

-- --------------------------------------------------------

--
-- Table structure for table `works`
--

CREATE TABLE `works` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comple_date` date NOT NULL,
  `main_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `more_file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `works`
--

INSERT INTO `works` (`id`, `title`, `comple_date`, `main_image`, `link`, `details`, `more_file`, `is_active`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'تصميم مشروع مكتبة الكترونيه', '2022-05-31', '1653508005_screencapture-file-C-Users-COMPUTER-TAIZ-Desktop-library-project-lib-project-index-html-2022-05-22-14_21_24.png', 'https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox/FMfcgzGpGBCtvmsqNHZgpQLKpbJtXXnD', 'تصميم مشروع مكتبة الكترونيه', NULL, 1, '2022-05-24 07:52:05', '2022-05-25 16:46:45', 11),
(2, 'تصميم صفحة تسجيل دخول', '2022-05-24', '1653508077_screencapture-file-C-Users-COMPUTER-TAIZ-Desktop-jobs-project-loginpage-html-2022-05-22-14_23_59.png', 'http://localhost:8000/ar/userWork', 'تصميم صفحة تسجيل دخول', NULL, 1, '2022-05-25 16:47:57', '2022-05-25 16:47:57', 11),
(3, 'تصميم موقع مكتبة الكترونيه', '2022-04-06', '1653508532_screencapture-file-C-Users-COMPUTER-TAIZ-Desktop-library-project-lib-project-index-html-2022-05-22-14_21_24.png', NULL, 'تصميم موقع مكتبة الكترونيه', NULL, 1, '2022-05-25 16:55:32', '2022-05-25 16:55:32', 12),
(4, 'تصميم واجهة تسجيل دخول', '2022-03-30', '1653508588_screencapture-file-C-Users-COMPUTER-TAIZ-Desktop-jobs-project-loginpage-html-2022-05-22-14_23_59.png', 'http://localhost:8000/ar/userWork', 'تصميم واجهة تسجيل دخول', NULL, 1, '2022-05-25 16:56:28', '2022-05-25 16:56:28', 12);

-- --------------------------------------------------------

--
-- Table structure for table `work_skills`
--

CREATE TABLE `work_skills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `work_id` bigint(20) UNSIGNED DEFAULT NULL,
  `skill_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work_skills`
--

INSERT INTO `work_skills` (`id`, `work_id`, `skill_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 2, 1, NULL, NULL),
(4, 3, 2, NULL, NULL),
(5, 3, 6, NULL, NULL),
(6, 3, 7, NULL, NULL),
(7, 4, 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_post_id_foreign` (`post_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evaluations`
--
ALTER TABLE `evaluations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evaluations_project_id_foreign` (`project_id`),
  ADD KEY `evaluations_user_id_foreign` (`user_id`),
  ADD KEY `evaluations_evaluater_id_foreign` (`evaluater_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_user_id_foreign` (`user_id`),
  ADD KEY `messages_receiver_foreign` (`receiver`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_seeker_id_foreign` (`seeker_id`),
  ADD KEY `orders_provider_id_foreign` (`provider_id`),
  ADD KEY `orders_project_id_foreign` (`project_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD PRIMARY KEY (`user_id`,`permission_id`,`user_type`),
  ADD KEY `permission_user_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_category_id_foreign` (`category_id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `post_skills`
--
ALTER TABLE `post_skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_skills_post_id_foreign` (`post_id`),
  ADD KEY `post_skills_skill_id_foreign` (`skill_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD KEY `profiles_user_id_foreign` (`user_id`),
  ADD KEY `profiles_category_id_foreign` (`category_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `projects_seeker_id_foreign` (`seeker_id`),
  ADD KEY `projects_provider_id_foreign` (`provider_id`),
  ADD KEY `projects_offer_id_foreign` (`offer_id`),
  ADD KEY `projects_post_id_foreign` (`post_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reports_user_id_foreign` (`user_id`),
  ADD KEY `reports_post_id_foreign` (`post_id`),
  ADD KEY `reports_project_id_foreign` (`project_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`,`user_type`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specializations`
--
ALTER TABLE `specializations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `specializations_category_id_foreign` (`category_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transactions_uuid_unique` (`uuid`),
  ADD KEY `transactions_payable_type_payable_id_index` (`payable_type`,`payable_id`),
  ADD KEY `payable_type_payable_id_ind` (`payable_type`,`payable_id`),
  ADD KEY `payable_type_ind` (`payable_type`,`payable_id`,`type`),
  ADD KEY `payable_confirmed_ind` (`payable_type`,`payable_id`,`confirmed`),
  ADD KEY `payable_type_confirmed_ind` (`payable_type`,`payable_id`,`type`,`confirmed`),
  ADD KEY `transactions_type_index` (`type`),
  ADD KEY `transactions_wallet_id_foreign` (`wallet_id`);

--
-- Indexes for table `transfers`
--
ALTER TABLE `transfers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transfers_uuid_unique` (`uuid`),
  ADD KEY `transfers_from_type_from_id_index` (`from_type`,`from_id`),
  ADD KEY `transfers_to_type_to_id_index` (`to_type`,`to_id`),
  ADD KEY `transfers_deposit_id_foreign` (`deposit_id`),
  ADD KEY `transfers_withdraw_id_foreign` (`withdraw_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_skills`
--
ALTER TABLE `user_skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_skills_user_id_foreign` (`user_id`),
  ADD KEY `user_skills_skill_id_foreign` (`skill_id`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `wallets_holder_type_holder_id_slug_unique` (`holder_type`,`holder_id`,`slug`),
  ADD UNIQUE KEY `wallets_uuid_unique` (`uuid`),
  ADD KEY `wallets_holder_type_holder_id_index` (`holder_type`,`holder_id`),
  ADD KEY `wallets_slug_index` (`slug`);

--
-- Indexes for table `works`
--
ALTER TABLE `works`
  ADD PRIMARY KEY (`id`),
  ADD KEY `works_user_id_foreign` (`user_id`);

--
-- Indexes for table `work_skills`
--
ALTER TABLE `work_skills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `work_skills_work_id_foreign` (`work_id`),
  ADD KEY `work_skills_skill_id_foreign` (`skill_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evaluations`
--
ALTER TABLE `evaluations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `post_skills`
--
ALTER TABLE `post_skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `specializations`
--
ALTER TABLE `specializations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `transfers`
--
ALTER TABLE `transfers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_skills`
--
ALTER TABLE `user_skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `works`
--
ALTER TABLE `works`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `work_skills`
--
ALTER TABLE `work_skills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `evaluations`
--
ALTER TABLE `evaluations`
  ADD CONSTRAINT `evaluations_evaluater_id_foreign` FOREIGN KEY (`evaluater_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `evaluations_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `evaluations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_receiver_foreign` FOREIGN KEY (`receiver`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `messages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_seeker_id_foreign` FOREIGN KEY (`seeker_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_user`
--
ALTER TABLE `permission_user`
  ADD CONSTRAINT `permission_user_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_skills`
--
ALTER TABLE `post_skills`
  ADD CONSTRAINT `post_skills_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_skills_skill_id_foreign` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_offer_id_foreign` FOREIGN KEY (`offer_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `projects_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `projects_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `projects_seeker_id_foreign` FOREIGN KEY (`seeker_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reports_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reports_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `specializations`
--
ALTER TABLE `specializations`
  ADD CONSTRAINT `specializations_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_wallet_id_foreign` FOREIGN KEY (`wallet_id`) REFERENCES `wallets` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transfers`
--
ALTER TABLE `transfers`
  ADD CONSTRAINT `transfers_deposit_id_foreign` FOREIGN KEY (`deposit_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transfers_withdraw_id_foreign` FOREIGN KEY (`withdraw_id`) REFERENCES `transactions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_skills`
--
ALTER TABLE `user_skills`
  ADD CONSTRAINT `user_skills_skill_id_foreign` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_skills_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `works`
--
ALTER TABLE `works`
  ADD CONSTRAINT `works_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `work_skills`
--
ALTER TABLE `work_skills`
  ADD CONSTRAINT `work_skills_skill_id_foreign` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `work_skills_work_id_foreign` FOREIGN KEY (`work_id`) REFERENCES `works` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
