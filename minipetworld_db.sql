-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2021 at 11:52 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `minipetworld_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `caption` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sequence` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `caption`, `image`, `sequence`, `created_at`, `updated_at`) VALUES
(1, 'Food And Vetamins For All Pets', 'slider-single-img.png', 1, '2021-08-04 07:47:09', '2021-08-04 07:47:09'),
(2, 'Buy , Sell And Breed For All Pets', 'slider-single-img-2.png', 2, '2021-08-04 07:48:29', '2021-08-04 07:48:29');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sequence` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `slug`, `content`, `image`, `sequence`, `created_at`, `updated_at`) VALUES
(4, 'Animal Care', 'animal-care', '1. ASPCA Pet Care Blog – In their advocacy for animal health, the American Society for the Prevention of Cruelty to Animals (ASPCA) posts blog entries on a number of different topics. In their pet care blog, they write about anything from pet toxins and heartworms to the importance of regular grooming. While the blog is largely directed to pet owners, aspiring vet techs or other animal care professionals can also learn from it.\r\n\r\n2. All Natural Pet Care Blog – For regular information and ideas on natural pet care, particularly nutrition, be sure to check out the All Natural Pet Care Blog. The blog also includes information about exotic pets including reptiles and fish.\r\n\r\n3. National Animal Interest Alliance – The blog for the National Animal Interest Alliance is not without controversy as the group often criticizes more militant animal welfare organizations. However, they do post regularly about issues of pet responsibility and health.\r\n\r\n4. Pet Connection – PetConnection is definitely a top animal care blog. Written by a team of experienced veterinarians, trainers, and journalists this blog covers topics such as pet food recalls, behavior, and breeding.\r\n\r\n5. The Daily Vet – As part of the PetMD website, The Daily Vet blog contains loads of useful information on basic pet care as well as current events such as dog flu outbreaks, veterinary teaching practices, and pet nutrition insights.\r\n\r\n6. DogStar Daily – For dog specific posts, DogStar Daily is a great choice. The blog includes posts about everything from dog aggression and socialization to housetraining.\r\n\r\n7. Riley and James Fan Club – This blog is written by a veterinarian but has a much more personal bent than some other animal care blogs. Dr. Shawna Finch writes not only about her own pets, and preventive pet care, but also includes posts about her family and experiences working as a vet. Definitely an interesting read.\r\n\r\n8. Pawcurious – Pawcurious is a veterinary blog written by Dr. Jessica Vogelsang, a graduate of the UC Davis School of Veterinary Medicine. “Dr. V” as she is known on the blog writes conversational and informative posts about all aspects of veterinary care, with a particular affinity for dogs. Dr. V is also a Certified Veterinary Journalist.\r\n\r\n9. Brenda Tassava Blog – Interested in the administrative side of animal care? Then look no further than Brenda Tassava’s veterinary management blog. Ms. Tassava has more than 17 years of experience in the veterinary industry and brings that unique perspective to her blog, along with other writers of equal caliber.\r\n\r\n10. Dr. Patrick Mahaney – Dr. Patrick Mahaney is a Los Angeles-based holistic housecall veterinarian and certified veterinary journalist who blogs about pet care with compassion and knowledge. He freely shares stories of the pets in his own life alongside useful tips about maintaining healthy family animals.', 'blog-21628147736.jpg', 1, '2021-08-05 02:15:36', '2021-08-05 02:15:36'),
(5, 'Katina – a real life orca story', 'katina-----a-real-life-orca-story', 'Since learning her story, I’ve always felt a connection with Katina. Why? Because Katina was captured the exact month and year that I was born which means she has spent my entire life in captivity.\r\n\r\nBefore my first birthday, Katina had been bought by SeaWorld and moved from Canada to their (now closed) park in Ohio.\r\n\r\nFor the next few years she moved back and forth between SeaWorld Ohio and SeaWorld San Diego and then finally when I was about 6 years old, Katina was moved to SeaWorld Orlando where she remains to this day.\r\n\r\nOddly, and unknowingly at the time, I may well have seen Katina perform when I went to SeaWorld Orlando with my family, aged 7. Along with hundreds of others, I watched the Shamu show, unaware that ‘Shamu’ had died years before and the name was used for whichever orca was doing that day’s show. It is quite possible that it was Katina who performed the role of Shamu that day, soaking the crowd with a flick of her tail.\r\n\r\nThen I left, probably went to another theme park, flew home and Katina stayed there, swimming around her tank, thousands of miles from her pod, being fed frozen fish and performing tricks for the crowds. And every day since has been the same for her.', 'blog-11628147981.jpg', 2, '2021-08-05 02:19:41', '2021-08-05 02:19:41');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `qnty` bigint(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `product_id`, `user_id`, `deleted_at`, `created_at`, `updated_at`, `qnty`) VALUES
(15, 4, 4, '2021-08-08 01:55:20', '2021-08-07 06:00:24', '2021-08-08 01:55:20', 3),
(20, 5, 4, '2021-08-08 01:55:29', '2021-08-07 07:04:33', '2021-08-08 01:55:29', 2),
(21, 4, 4, '2021-08-08 01:55:15', '2021-08-07 08:43:37', '2021-08-08 01:55:15', 1),
(22, 4, 4, '2021-08-08 01:55:34', '2021-08-08 01:55:03', '2021-08-08 01:55:34', 1),
(23, 4, 4, '2021-08-08 13:54:12', '2021-08-08 01:56:03', '2021-08-08 13:54:12', 4),
(24, 4, 4, '2021-08-08 13:54:12', '2021-08-08 05:51:23', '2021-08-08 13:54:12', 1),
(25, 4, 4, '2021-08-08 14:25:48', '2021-08-08 14:24:36', '2021-08-08 14:25:48', 6),
(26, 4, 4, NULL, '2021-08-09 14:04:54', '2021-08-09 14:04:54', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sequence` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image`, `sequence`, `deleted_at`, `created_at`, `updated_at`) VALUES
(10, 'Dog\'s Food', 'For dogs food', 'product-1.jpg', 1, NULL, '2021-08-04 07:51:50', '2021-08-04 07:51:50'),
(11, 'Cat\'s Food', 'For cat food', 'product-2.jpg', 2, NULL, '2021-08-04 07:53:23', '2021-08-04 07:53:23'),
(12, 'Fish Food', 'For fish Food', 'product-3.jpg', 3, NULL, '2021-08-04 07:54:08', '2021-08-04 07:54:08');

-- --------------------------------------------------------

--
-- Table structure for table `centers`
--

CREATE TABLE `centers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sequence` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` bigint(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `centers`
--

INSERT INTO `centers` (`id`, `name`, `description`, `image`, `location`, `sequence`, `created_at`, `updated_at`, `phone`) VALUES
(3, 'faheem Vet Care', 'For animal checkup and care.', 'product-1.jpg', 'https://goo.gl/maps/T7EXyfdeN5A1Xx466', 1, '2021-08-04 08:06:10', '2021-08-08 03:46:09', 923009445646),
(4, 'Saleem Veterinary Clinic & Pet Shop', 'Saleem Veterinary Clinic & Pet Shop for pet care', 'product-1.jpg', 'https://g.page/SaleemVets?share', 2, '2021-08-04 08:07:03', '2021-08-08 03:42:17', 433214324),
(5, 'usman younas', 'for pet care', 'product-1.jpg', 'https://goo.gl/maps/cg2w1nMEXXm7P4Jx8', 0, '2021-08-08 03:36:01', '2021-08-08 03:46:01', 3009445646);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sequence` int(11) NOT NULL,
  `date_time` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `image`, `location`, `sequence`, `date_time`, `created_at`, `updated_at`) VALUES
(6, 'For pet competition', 'For pet organisations and home trained to participate and win price.', 'slider-single-img.png', 'THE PET CENTRE SHOP # 14 DHRAMPURA PET MARKET', 1, '2021-08-18 04:00:00', '2021-08-04 08:11:23', '2021-08-04 08:11:23');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `name`, `product_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '202107301443081801753348.png', 1, NULL, '2021-07-30 09:43:09', '2021-07-30 09:43:09'),
(2, '20210730145507555778967.png', 2, NULL, '2021-07-30 09:55:08', '2021-07-30 09:55:08'),
(3, '202108021813001735212263.jpg', 3, NULL, '2021-08-02 13:13:00', '2021-08-02 13:13:00'),
(4, '202108041258502042146703.jpg', 4, NULL, '2021-08-04 07:58:50', '2021-08-04 07:58:50'),
(5, '202108050915221872317058.jpg', 5, NULL, '2021-08-05 04:15:22', '2021-08-05 04:15:22'),
(6, '2021080819292837598805.jpg', 6, NULL, '2021-08-08 14:29:29', '2021-08-08 14:29:29'),
(7, '202108091852501046017685.jpg', 8, NULL, '2021-08-09 13:52:50', '2021-08-09 13:52:50'),
(8, '20210809185458730968316.jpg', 10, NULL, '2021-08-09 13:54:58', '2021-08-09 13:54:58'),
(9, '202108091855381857243998.jpg', 10, NULL, '2021-08-09 13:55:38', '2021-08-09 13:55:38'),
(10, '20210809185625570848634.jpg', 10, NULL, '2021-08-09 13:56:25', '2021-08-09 13:56:25');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sequence` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(12, '2014_07_07_062736_create_roles_table', 1),
(13, '2014_10_12_000000_create_users_table', 1),
(14, '2014_10_12_100000_create_password_resets_table', 1),
(15, '2019_02_20_144133_create_categories_table', 1),
(16, '2019_02_20_144133_create_pages_table', 1),
(17, '2019_02_20_144155_create_subcategories_table', 1),
(19, '2019_02_20_145119_create_images_table', 1),
(20, '2019_04_04_064055_create_banners-table', 1),
(22, '2020_02_21_143954_create_products_table', 1),
(23, '2019_08_26_101218_create_media_table', 2),
(24, '2019_02_20_144357_create_events_table', 3),
(26, '2021_07_30_180058_create_centers_table', 4),
(27, '2021_07_30_201033_create_blogs_table', 5),
(28, '2019_03_20_144134_create_petcategories_table', 6),
(29, '2019_04_20_144155_create_petsubcategories_table', 6),
(31, '2021_08_02_084209_create_postimages_table', 7),
(34, '2021_08_02_070504_create_posts_table', 8),
(35, '2020_07_08_071819_create_orders_table', 9),
(36, '2021_07_10_080932_create_order_items_table', 9),
(38, '2021_08_06_212410_create_relocations_table', 10),
(39, '2021_07_16_103714_create_cart_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_no` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_on` date NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_items` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'new',
  `shipped_on` date NOT NULL,
  `customer_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_no`, `name`, `company`, `email`, `country`, `state`, `postal_code`, `address`, `phone`, `message`, `order_on`, `payment_method`, `total_items`, `status`, `shipped_on`, `customer_id`, `created_at`, `updated_at`, `city`) VALUES
(2, 3116, 'usman younas', 'jinitech', 'usmanyounas258@gamil.com', 'Pakistan', 'punjab', '51310', 'Muhalla Amanat pura sialkot', '3009445646', 'asd', '2021-08-08', 'on cash', 300, 'new', '2021-08-08', 4, '2021-08-08 14:25:48', '2021-08-08 14:25:48', 'sialkot');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `description`, `image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(4, 'FAQs', 'For General Informatioin page.......................................................', '20210804121942504097774.jpg', NULL, '2021-08-04 08:12:59', '2021-08-04 08:12:59'),
(5, 'Information Page', 'abc...............................', '20210804122350120784379.jpg', NULL, '2021-08-04 08:13:52', '2021-08-04 08:13:52');

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
-- Table structure for table `petcategories`
--

CREATE TABLE `petcategories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sequence` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `petcategories`
--

INSERT INTO `petcategories` (`id`, `name`, `description`, `image`, `sequence`, `deleted_at`, `created_at`, `updated_at`) VALUES
(5, 'cat', 'abc', 'umer.jpeg', 2, '2021-08-04 07:43:58', '2021-08-02 09:16:43', '2021-08-04 07:43:58'),
(6, 'usman younas', 'abc', 'umer.jpeg', 3, '2021-08-02 11:25:18', '2021-08-02 11:25:11', '2021-08-02 11:25:18'),
(7, 'dog', 'dogs', 'umer.jpeg', 3, '2021-08-04 07:44:01', '2021-08-03 01:44:28', '2021-08-04 07:44:01'),
(8, 'Dog', 'For dog sell and breed', 'food-catigory-1.png', 1, NULL, '2021-08-04 08:01:45', '2021-08-04 08:01:45'),
(9, 'Cat', 'For cat sell and breed', 'food-catigory-2.png', 2, NULL, '2021-08-04 08:02:21', '2021-08-04 08:02:21');

-- --------------------------------------------------------

--
-- Table structure for table `petsubcategories`
--

CREATE TABLE `petsubcategories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `sequence` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `petsubcategories`
--

INSERT INTO `petsubcategories` (`id`, `name`, `image`, `description`, `category_id`, `sequence`, `deleted_at`, `created_at`, `updated_at`) VALUES
(29, 'cat', 'umer.jpeg', 'new cat', 5, 1, '2021-08-04 07:43:58', '2021-08-02 09:16:43', '2021-08-04 07:43:58'),
(30, 'cat black', 'umer.jpeg', 'black cats for africa', 5, 2, '2021-08-04 07:43:58', '2021-08-02 11:24:32', '2021-08-04 07:43:58'),
(32, 'puppi', 'umer.jpeg', 'dogs child', 7, 3, '2021-08-04 07:44:01', '2021-08-03 01:44:29', '2021-08-04 07:44:01'),
(33, 'Dog', 'food-catigory-1.png', 'For dog sell and breed', 8, 1, NULL, '2021-08-04 08:01:45', '2021-08-04 08:01:45'),
(34, 'Cat', 'food-catigory-2.png', 'For cat sell and breed', 9, 2, NULL, '2021-08-04 08:02:21', '2021-08-04 08:02:21');

-- --------------------------------------------------------

--
-- Table structure for table `postimages`
--

CREATE TABLE `postimages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `postimages`
--

INSERT INTO `postimages` (`id`, `name`, `post_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '2021080307313675748073.jpg', 1, NULL, '2021-08-03 02:31:36', '2021-08-03 02:31:36'),
(2, '20210803205756842660549.jpg', 2, NULL, '2021-08-03 15:57:56', '2021-08-03 15:57:56'),
(3, '20210804122031792304864.jpg', 4, NULL, '2021-08-04 07:20:31', '2021-08-04 07:20:31'),
(4, '20210804122350862232796.jpg', 5, NULL, '2021-08-04 07:23:50', '2021-08-04 07:23:50'),
(5, '20210804122648862138375.jpg', 6, NULL, '2021-08-04 07:26:48', '2021-08-04 07:26:48'),
(6, '20210804203852809785824.jpg', 7, NULL, '2021-08-04 15:38:52', '2021-08-04 15:38:52'),
(7, '20210804214027259355525.jpg', 8, NULL, '2021-08-04 16:40:27', '2021-08-04 16:40:27'),
(8, '202108050626032024293625.jpg', 9, NULL, '2021-08-05 01:26:03', '2021-08-05 01:26:03'),
(9, '202108050650591080692460.jpg', 10, NULL, '2021-08-05 01:50:59', '2021-08-05 01:50:59'),
(10, '202108051724052115377209.jpg', 11, NULL, '2021-08-05 12:24:05', '2021-08-05 12:24:05'),
(11, '202108070722451961776741.jpg', 12, NULL, '2021-08-07 02:22:45', '2021-08-07 02:22:45'),
(12, '20210808080053262877957.jpg', 13, NULL, '2021-08-08 03:00:53', '2021-08-08 03:00:53');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(191) NOT NULL,
  `breed` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `petfor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `new_product` tinyint(1) NOT NULL,
  `feature` tinyint(1) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hypoallergenic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `housetrain` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `declawed` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialdiet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `like_to_lap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialneed` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medical` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `neutered` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vaccinated` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `highrisk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `petcategory_id` int(10) UNSIGNED NOT NULL,
  `sub_petcategory_id` int(10) UNSIGNED NOT NULL,
  `sequence` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `name`, `slug`, `phone`, `breed`, `group`, `location`, `description`, `image`, `gender`, `color`, `age`, `petfor`, `price`, `new_product`, `feature`, `status`, `hypoallergenic`, `housetrain`, `declawed`, `specialdiet`, `like_to_lap`, `specialneed`, `medical`, `neutered`, `vaccinated`, `highrisk`, `petcategory_id`, `sub_petcategory_id`, `sequence`, `deleted_at`, `created_at`, `updated_at`, `user_id`) VALUES
(9, 'cat', 'cat', 3009445646, 'cat', 'Male', 'https://goo.gl/maps/98QEKBoihLsT1rdj7', 'for cat in home', '20210805064050742640600.jpg', 'Male', 'brown', 4, 'Breed', 105000, 1, 1, 'Request', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 8, 33, 3, NULL, '2021-08-05 01:26:03', '2021-08-09 15:43:38', 4),
(11, 'russion dog', 'russion dog', 300000123456, 'russian', 'Middle', 'abcdadfadsf', 'for pet', '202108051724051984989570.jpg', 'Female', 'brown', 2, 'Breed', 7500, 1, 1, 'Rejected', 'No', 'yes', 'No', 'No', 'yes', 'No', 'yes', 'yes', 'yes', 'No', 8, 33, 1, NULL, '2021-08-05 12:24:05', '2021-08-08 05:20:53', 4),
(12, 'asdf', 'asdf', 3009445646, 'Russian/germeny', 'Middle', 'www.link.com', 'dasf', '20210807072244216014549.jpg', 'Male', 'brown', 3, 'Breed', 3223, 1, 1, 'Rejected', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 'No', 8, 33, 2, NULL, '2021-08-07 02:22:44', '2021-08-08 05:22:46', 4),
(13, 'fod', 'fod', 34345, 'asdf', 'Male', 'asdfddddd', 'asdf', '20210808080053910552547.jpg', 'Male', 'asf', 34, 'Sell', 43, 1, 0, 'Rejected', 'No', 'No', 'No', 'No', 'No', 'No', 'yes', 'No', 'No', 'No', 8, 33, 1, '2021-08-08 05:20:39', '2021-08-08 03:00:53', '2021-08-08 05:20:39', 4);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `features` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `terms_conditions` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `new_product` tinyint(1) NOT NULL,
  `feature` tinyint(1) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `sub_category_id` int(10) UNSIGNED NOT NULL,
  `sequence` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `code`, `name`, `slug`, `description`, `features`, `terms_conditions`, `image`, `price`, `qty`, `new_product`, `feature`, `status`, `category_id`, `sub_category_id`, `sequence`, `deleted_at`, `created_at`, `updated_at`) VALUES
(4, 'D0-001', 'Dog calcium food', 'Dog calcium food', 'For dog food best calcium dos.', 'Best for dogs to eat.', 'Change if expired.', '202108041258501360230056.jpg', 50.00, 20, 1, 1, 1, 10, 8, 1, NULL, '2021-08-04 07:58:50', '2021-08-04 07:58:50'),
(8, 'asdf', 'usman younas', 'usman younas', 'asdf', 'dfaf', 'dfsadf', '202108091852501016364317.jpg', 105000.00, 13241, 1, 1, 1, 10, 8, 3, '2021-08-09 13:53:47', '2021-08-09 13:52:50', '2021-08-09 13:53:47'),
(10, 'asdfw', 'usman younas', 'usman younas', 'asdfe', 'asdfdaf', 'asdfdsaf', '20210809185458858833309.jpg', 233.00, 23, 0, 1, 1, 10, 8, 4, NULL, '2021-08-09 13:54:58', '2021-08-09 13:56:25');

-- --------------------------------------------------------

--
-- Table structure for table `relocations`
--

CREATE TABLE `relocations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `petname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `petage` int(11) NOT NULL,
  `phone` bigint(191) NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relocation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `relocations`
--

INSERT INTO `relocations` (`id`, `name`, `petname`, `petage`, `phone`, `city`, `location`, `relocation`, `deleted_at`, `created_at`, `updated_at`, `user_id`) VALUES
(3, 'usman younas', 'sadf', 3, 3009445646, 'sialkot', 'asdf', 'asdf', NULL, '2021-08-06 17:18:34', '2021-08-06 17:18:34', 4);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nickname` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `nickname`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', '2021-07-30 13:41:42', '2021-07-30 13:41:42'),
(2, 'user', 'user', '2021-07-30 13:41:42', '2021-07-30 13:41:42');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `sequence` int(11) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `image`, `description`, `category_id`, `sequence`, `deleted_at`, `created_at`, `updated_at`) VALUES
(8, 'Dog Food', 'product-1.jpg', 'Food for dogs to eat.', 10, 1, NULL, '2021-08-04 07:51:50', '2021-08-04 07:51:50'),
(9, 'Cat food', 'product-2.jpg', 'For cat food', 11, 2, NULL, '2021-08-04 07:53:23', '2021-08-04 07:53:23'),
(10, 'Fish Food', 'product-3.jpg', 'For fish to eat food', 12, 3, NULL, '2021-08-04 07:54:08', '2021-08-04 07:54:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` tinyint(3) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role_id`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin', 1, 'admin@gmail.com', NULL, '$2y$10$36KeyPviiJ9IzhKETwHO/u8b5t700TOMo5dcsuuqWTfNZQ/8EmB6y', NULL, '2021-07-30 08:42:31', '2021-07-30 08:42:31'),
(4, 'user', 2, 'user@gmail.com', NULL, '$2y$10$E0KhsjBx.Uz7BMypzZ7ZIuAG8a9bpoKK2Pii9nQYenr686gZnLAzG', NULL, '2021-07-30 15:24:39', '2021-07-30 15:24:39'),
(5, 'hammid', 2, 'hammid@gmail.com', NULL, '$2y$10$bsQSiAFl/NvKiTLeQCY3U.oDxkyW5ZAFYu4s4vNsAsOmUMDZHob0C', NULL, '2021-08-04 07:03:31', '2021-08-04 07:03:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `centers`
--
ALTER TABLE `centers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `petcategories`
--
ALTER TABLE `petcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `petsubcategories`
--
ALTER TABLE `petsubcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postimages`
--
ALTER TABLE `postimages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_code_unique` (`code`);

--
-- Indexes for table `relocations`
--
ALTER TABLE `relocations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `centers`
--
ALTER TABLE `centers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `petcategories`
--
ALTER TABLE `petcategories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `petsubcategories`
--
ALTER TABLE `petsubcategories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `postimages`
--
ALTER TABLE `postimages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `relocations`
--
ALTER TABLE `relocations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
