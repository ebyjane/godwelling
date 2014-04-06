-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2013 at 09:22 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dwel1`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=20 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `slug`, `created`, `updated`) VALUES
(1, 1, 'Dweling', 'dweling', '2013-11-19 11:54:03', '2013-12-01 21:42:41'),
(2, 2, 'Education & Development', 'education---development', '2013-12-01 21:43:11', '2013-12-01 21:51:38'),
(3, 3, 'Product & Services', 'product---services', '2013-12-01 21:43:27', '2013-12-01 21:51:27'),
(4, 4, 'Sports', 'sports', '2013-12-01 21:43:40', '2013-12-01 21:51:14'),
(5, 5, 'Health & Beauty', 'health---beauty', '2013-12-01 21:43:52', '2013-12-01 21:51:02'),
(6, 6, 'Travel & Tourism', 'travel---tourism', '2013-12-01 21:44:02', '2013-12-01 21:50:39'),
(7, 7, 'Fitness & Style', 'fitness---style', '2013-12-01 21:44:14', '2013-12-01 21:50:47'),
(8, 8, 'Society & Culture', 'society---culture', '2013-12-01 21:44:26', '2013-12-01 21:49:05'),
(9, 9, 'Pets', 'pets', '2013-12-01 21:44:40', '2013-12-01 21:48:53'),
(10, 10, 'News & Events', 'news---events', '2013-12-01 21:44:51', '2013-12-01 21:48:40'),
(11, 11, 'Finance & Economy', 'finance---economy', '2013-12-01 21:45:08', '2013-12-01 21:48:31'),
(12, 12, 'Food & Beverage', 'food---beverage', '2013-12-01 21:45:21', '2013-12-01 21:48:22'),
(13, 13, 'Technology & Gadgets', 'technology---gadgets', '2013-12-01 21:45:32', '2013-12-01 21:48:08'),
(14, 14, 'Entertainment', 'entertainment', '2013-12-01 21:45:44', '2013-12-01 21:48:01'),
(15, 15, 'Law & Rules', 'law---rules', '2013-12-01 21:45:54', '2013-12-01 21:47:53'),
(16, 16, 'Politics & Government', 'politics---government', '2013-12-01 21:46:03', '2013-12-01 21:47:42'),
(17, 17, 'Relationship and Psychology', 'relationship-and-psychology', '2013-12-01 21:46:13', '2013-12-01 21:47:34'),
(18, 18, 'Discovery & Entrepreneurship', 'discovery---entrepreneurship', '2013-12-01 21:46:25', '2013-12-01 21:47:27'),
(19, 19, 'Others', 'others', '2013-12-01 21:46:37', '2013-12-01 21:47:18');

-- --------------------------------------------------------

--
-- Table structure for table `categories_metadata`
--

CREATE TABLE IF NOT EXISTS `categories_metadata` (
  `category_id` int(11) NOT NULL,
  `key` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  UNIQUE KEY `category_id_2` (`category_id`,`key`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `content_id` int(15) NOT NULL,
  `user_id` int(15) NOT NULL,
  `parent_id` int(15) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `approved` int(15) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `content_id` (`content_id`),
  KEY `user_id` (`user_id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=48 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `content_id`, `user_id`, `parent_id`, `comment`, `approved`, `created`, `updated`) VALUES
(41, 52, 1, 0, 'Forum food coat will be good in bangalore', 1, '2013-12-13 21:26:21', '2013-12-13 21:26:21'),
(42, 53, 1, 0, 'The best way is you can rent a car and visit the place', 1, '2013-12-13 21:31:15', '2013-12-13 21:31:15'),
(43, 53, 1, 0, 'Better way is you can travel in train', 1, '2013-12-13 21:31:43', '2013-12-13 21:31:43'),
(44, 55, 1, 0, 'opp to velankanni tech part :)', 1, '2013-12-13 21:33:49', '2013-12-13 21:33:49'),
(45, 55, 1, 0, 'Near by Electronic city bus stop.', 1, '2013-12-13 21:34:47', '2013-12-13 21:34:47'),
(46, 55, 7, 0, 'Most of the places near by velankanni tech park has gym.', -1, '2013-12-15 00:45:07', '2013-12-15 00:45:59'),
(47, 55, 7, 45, 'Thanks for the info.', 1, '2013-12-15 00:45:43', '2013-12-15 00:45:43');

-- --------------------------------------------------------

--
-- Table structure for table `comment_metadata`
--

CREATE TABLE IF NOT EXISTS `comment_metadata` (
  `comment_id` int(15) NOT NULL,
  `key` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  UNIQUE KEY `comment_id_2` (`comment_id`,`key`),
  KEY `comment_id` (`comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `configuration`
--

CREATE TABLE IF NOT EXISTS `configuration` (
  `key` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `configuration`
--

INSERT INTO `configuration` (`key`, `value`, `created`, `updated`) VALUES
('preferMarkdown', '1', '2013-11-19 11:54:03', '2013-11-19 11:54:03');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `vid` int(15) NOT NULL,
  `author_id` int(15) NOT NULL,
  `title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `extract` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `commentable` int(15) NOT NULL,
  `parent_id` int(15) NOT NULL,
  `category_id` int(15) NOT NULL,
  `type_id` int(15) NOT NULL,
  `password` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `comment_count` int(15) NOT NULL DEFAULT '0',
  `like_count` int(11) NOT NULL DEFAULT '0',
  `dislike_count` int(11) NOT NULL DEFAULT '0',
  `slug` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`,`vid`),
  KEY `author_id` (`author_id`),
  KEY `parent_id` (`parent_id`),
  KEY `category_id` (`category_id`),
  KEY `slug` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=64 ;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `vid`, `author_id`, `title`, `content`, `extract`, `status`, `commentable`, `parent_id`, `category_id`, `type_id`, `password`, `comment_count`, `like_count`, `dislike_count`, `slug`, `created`, `updated`) VALUES
(52, 1, 1, 'Food & Beverage', 'Can someone tell me where i can get good food in bangalore?', 'Can someone tell me where i can get good food in bangalore?', 1, 1, 1, 12, 2, '', 2, 0, 0, 'food---beverage1', '2013-12-13 21:24:49', '2013-12-13 21:26:21'),
(53, 1, 1, 'Travel & Tourism', 'Iam planning to go to hubli. Can anyone suggest the better way of travelling?', 'Iam planning to go to hubli. Can anyone suggest the better way of travelling?', 1, 1, 1, 6, 2, '', 4, 0, 0, 'travel---tourism1', '2013-12-13 21:29:38', '2013-12-13 21:31:43'),
(54, 1, 1, 'Education & Development', 'Which is the best school in bangalore?', 'Which is the best school in bangalore?', 1, 1, 1, 2, 2, '', 0, 0, 0, 'education---development1', '2013-12-13 21:32:54', '2013-12-17 00:59:21'),
(55, 1, 1, 'Fitness & Style', 'Can anyone tell me where is the gym in electronic city?', 'Can anyone tell me where is the gym in electronic city?', 1, 1, 1, 7, 2, '', 9, 0, 0, 'fitness---style1', '2013-12-13 21:33:28', '2013-12-15 00:45:59'),
(56, 1, 1, 'News & Events', 'Can someone tell me the events happening this weekend?', 'Can someone tell me the events happening this weekend?', 1, 1, 1, 10, 2, '', 0, 0, 0, 'news---events1', '2013-12-13 21:35:45', '2013-12-13 21:35:45'),
(57, 1, 1, 'Health & Beauty', 'Can someone tell me where is beauty parlour in electronic city?', 'Can someone tell me where is beauty parlour in electronic city?', 1, 1, 1, 5, 2, '', 0, 0, 0, 'health---beauty1', '2013-12-13 21:36:25', '2013-12-13 21:36:25'),
(58, 1, 1, 'Pets', 'where can i buy a Pomeranian pet in bangalore?', 'where can i buy a Pomeranian pet in bangalore?', 1, 1, 1, 9, 2, '', 0, 0, 0, 'pets1', '2013-12-13 21:37:46', '2013-12-17 00:51:51'),
(59, 1, 1, 'Law & Rules', 'where is the court in bangalore?', 'where is the court in bangalore?', 1, 1, 1, 15, 2, '', 0, 1, 0, 'law---rules1', '2013-12-13 21:38:09', '2013-12-17 01:08:16'),
(60, 1, 1, 'Politics & Government', 'I think BJP will be making the next government? What you guys think?', 'I think BJP will be making the next government? What you guys think?', 1, 1, 1, 16, 2, '', 0, 0, 0, 'politics---government1', '2013-12-13 21:39:05', '2013-12-13 21:39:31'),
(61, 1, 1, 'Technology & Gadgets', 'Iam planing to buy a tablet from samsung brand. Can anyone suggest, is this good one or can i go for some other brand?', 'Iam planing to buy a tablet from samsung brand. Can anyone suggest, is this good one or can i go for some other brand?', 1, 1, 1, 13, 2, '', 0, 0, 0, 'technology---gadgets1', '2013-12-13 21:42:20', '2013-12-13 21:42:20'),
(61, 2, 1, 'Technology & Gadgets', 'Iam planing to buy a tablet from samsung brand. Can anyone suggest, is this good one or can i go for some other brand?', 'Iam planing to buy a tablet from samsung brand. Can anyone suggest, is this good one or can i go for some other brand?', 1, 1, 1, 13, 2, '', 0, 0, 0, 'technology---gadgets1', '2013-12-13 21:42:20', '2013-12-14 01:45:52'),
(61, 3, 1, 'Technology & Gadgets', 'Iam planing to buy a tablet from samsung brand. Can anyone suggest, is this good one or can i go for some other brand?', 'Iam planing to buy a tablet from samsung brand. Can anyone suggest, is this good one or can i go for some other brand?', 1, 1, 1, 13, 2, '', 0, 0, 0, 'technology---gadgets1', '2013-12-13 21:42:20', '2013-12-14 02:02:05'),
(61, 4, 1, 'Technology & Gadgets', 'Iam planing to buy a tablet from samsung brand. Can anyone suggest, is this good one or can i go for some other brand?', 'Iam planing to buy a tablet from samsung brand. Can anyone suggest, is this good one or can i go for some other brand?', 1, 1, 1, 13, 2, '', 0, 0, 0, 'technology---gadgets1', '2013-12-13 21:42:20', '2013-12-14 02:02:46'),
(61, 5, 1, 'Technology & Gadgets', 'Iam planing to buy a tablet from samsung brand. Can anyone suggest, is this good one or can i go for some other brand?', 'Iam planing to buy a tablet from samsung brand. Can anyone suggest, is this good one or can i go for some other brand?', 1, 1, 1, 13, 2, '', 0, 0, 0, 'technology---gadgets1', '2013-12-13 21:42:20', '2013-12-14 02:06:05'),
(61, 6, 1, 'Technology & Gadgets', 'Iam planing to buy a tablet from samsung brand. Can anyone suggest, is this good one or can i go for some other brand?', 'Iam planing to buy a tablet from samsung brand. Can anyone suggest, is this good one or can i go for some other brand?', 1, 1, 1, 13, 2, '', 0, 0, 0, 'technology---gadgets1', '2013-12-13 21:42:20', '2013-12-14 02:11:16'),
(61, 7, 1, 'Technology & Gadgets', 'Iam planing to buy a tablet from samsung brand. Can anyone suggest, is this good one or can i go for some other brand?', 'Iam planing to buy a tablet from samsung brand. Can anyone suggest, is this good one or can i go for some other brand?', 1, 1, 1, 13, 2, '', 0, 0, 0, 'technology---gadgets1', '2013-12-13 21:42:20', '2013-12-14 02:59:05'),
(61, 8, 1, 'Technology & Gadgets', 'Iam planing to buy a tablet from samsung brand. Can anyone suggest, is this good one or can i go for some other brand?', 'Iam planing to buy a tablet from samsung brand. Can anyone suggest, is this good one or can i go for some other brand?', 1, 1, 1, 13, 2, '', 0, 0, 0, 'technology---gadgets1', '2013-12-13 21:42:20', '2013-12-14 03:29:29'),
(61, 9, 1, 'Technology & Gadgets', 'Iam planing to buy a tablet from samsung brand. Can anyone suggest, is this good one or can i go for some other brand?', 'Iam planing to buy a tablet from samsung brand. Can anyone suggest, is this good one or can i go for some other brand?', 1, 1, 1, 13, 2, '', 0, 0, 0, 'technology---gadgets1', '2013-12-13 21:42:20', '2013-12-14 20:42:07'),
(61, 10, 1, 'Technology & Gadgets', 'Iam planing to buy a tablet from samsung brand. Can anyone suggest, is this good one or can i go for some other brand?', 'Iam planing to buy a tablet from samsung brand. Can anyone suggest, is this good one or can i go for some other brand?', 1, 1, 1, 13, 2, '', 0, 0, 0, 'technology---gadgets1', '2013-12-13 21:42:20', '2013-12-17 01:44:52'),
(62, 1, 1, 'Sports', 'Can anyone let me know where the bangalore marathon is going to be this year?', 'Can anyone let me know where the bangalore marathon is going to be this year?', 1, 1, 1, 4, 2, '', 0, 0, 1, 'sports1', '2013-12-13 21:43:16', '2013-12-17 01:49:19'),
(63, 7, 7, 'Politics & Government', 'Who will win in coming election? BJP or Congress?', 'Who will win in coming election? BJP or Congress?', 1, 1, 1, 16, 2, '', 0, 0, 0, 'politics---government2', '2013-12-14 22:42:26', '2013-12-17 01:25:33');

-- --------------------------------------------------------

--
-- Table structure for table `content_metadata`
--

CREATE TABLE IF NOT EXISTS `content_metadata` (
  `content_id` int(15) NOT NULL,
  `key` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  UNIQUE KEY `content_id_2` (`content_id`,`key`),
  KEY `content_id` (`content_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `content_metadata`
--

INSERT INTO `content_metadata` (`content_id`, `key`, `value`, `created`, `updated`) VALUES
(61, 'blog-image', '/dwel1/uploads/upload-5aeb1f62f6cd496dc81c07d58b82f143.jpg', '2013-12-14 20:42:22', '2013-12-14 20:42:22'),
(61, 'upload-5aeb1f62f6cd496dc81c07d58b82f143.jpg', '/dwel1/uploads/upload-5aeb1f62f6cd496dc81c07d58b82f143.jpg', '2013-12-14 03:29:10', '2013-12-14 03:29:10'),
(61, 'upload-79958cabcbd8ab4afe3279374677ede2.jpg', '/dwel1/uploads/upload-79958cabcbd8ab4afe3279374677ede2.jpg', '2013-12-14 03:30:06', '2013-12-14 03:30:06');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `user_id` int(15) NOT NULL,
  `tag` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `approved` int(15) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_migration`
--

CREATE TABLE IF NOT EXISTS `tbl_migration` (
  `version` varchar(255) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_migration`
--

INSERT INTO `tbl_migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1384842242),
('m120101_000000_base', 1384842243),
('m121017_233353_cascade_user', 1384842243),
('m130207_175450_keywords', 1384842243),
('m130207_232511_prefermarkdown', 1384842243),
('m130219_183531_content_like', 1384842243),
('m130421_192044_add_about_user', 1384842243),
('m130516_183717_migrate_uploads', 1384842243),
('m130701_225047_userdetails', 1384842243);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `firstName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `displayName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `about` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_role` int(15) NOT NULL,
  `status` int(15) NOT NULL,
  `activation_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `user_role` (`user_role`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `firstName`, `lastName`, `displayName`, `about`, `user_role`, `status`, `activation_key`, `created`, `updated`) VALUES
(1, 'eby.jane@gmail.com', '$2y$13$3G33P5zhNMrgHrn5I4ZHduWXFo.Bxrghiz.SDlBtwbEjO/nImJOWG', 'eby', 'jane', 'Dweling', 'Details about myself', 5, 1, NULL, '2013-11-19 11:54:29', '2013-12-17 00:13:47'),
(7, 'eby.jane@yahoo.co.in', '$2y$13$S2O2h0yMPT12jkCHiFvfJOfrg78iLZuUaKs034YadpZKwqa6d3APa', '', '', 'ebyjane', '', 1, 1, NULL, '2013-12-10 00:58:27', '2013-12-16 23:08:39');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE IF NOT EXISTS `user_groups` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `group_id` int(15) NOT NULL,
  `user_id` int(15) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user_metadata`
--

CREATE TABLE IF NOT EXISTS `user_metadata` (
  `user_id` int(15) NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  UNIQUE KEY `user_id_2` (`user_id`,`key`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_metadata`
--

INSERT INTO `user_metadata` (`user_id`, `key`, `value`, `created`, `updated`) VALUES
(1, 'blog-image', 'upload-6a992d5529f459a44fee58c733255e86.jpg', '2013-12-14 21:30:31', '2013-12-14 21:30:31'),
(1, 'Dislike', '["62"]', '2013-12-17 01:49:19', '2013-12-17 01:49:19'),
(1, 'likes', '{"1":"59"}', '2013-12-17 01:07:43', '2013-12-17 01:44:52'),
(1, 'upload-6a992d5529f459a44fee58c733255e86.jpg', 'upload-6a992d5529f459a44fee58c733255e86.jpg', '2013-12-14 20:50:02', '2013-12-14 20:50:02'),
(1, 'upload-6a992d5529f459a44fee58c733255e8647.jpg', 'upload-6a992d5529f459a44fee58c733255e8647.jpg', '2013-12-14 21:27:41', '2013-12-14 21:27:41'),
(1, 'upload-8df17c77af23061ef4322d47d6c431fa.jpg', 'upload-8df17c77af23061ef4322d47d6c431fa.jpg', '2013-12-14 20:50:17', '2013-12-14 20:50:17'),
(1, 'upload-8df17c77af23061ef4322d47d6c431fa94.jpg', 'upload-8df17c77af23061ef4322d47d6c431fa94.jpg', '2013-12-14 21:28:02', '2013-12-14 21:28:02'),
(7, 'upload-dc0945a57cb219c782069b9f0095acf0.jpg', 'upload-dc0945a57cb219c782069b9f0095acf0.jpg', '2013-12-14 22:43:50', '2013-12-14 22:43:50');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE IF NOT EXISTS `user_roles` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`id`, `name`, `created`, `updated`) VALUES
(1, 'User', '2013-11-19 11:54:03', '2013-11-19 11:54:03'),
(2, 'Pending', '2013-11-19 11:54:03', '2013-11-19 11:54:03'),
(3, 'Suspended', '2013-11-19 11:54:03', '2013-11-19 11:54:03'),
(4, 'Moderator', '2013-11-19 11:54:03', '2013-11-19 11:54:03'),
(5, 'Administrator', '2013-11-19 11:54:03', '2013-11-19 11:54:03');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `categories_metadata`
--
ALTER TABLE `categories_metadata`
  ADD CONSTRAINT `categories_metadata_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`content_id`) REFERENCES `content` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `comment_metadata`
--
ALTER TABLE `comment_metadata`
  ADD CONSTRAINT `comment_metadata_ibfk_1` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `content_ibfk_1` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `content_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `content_metadata`
--
ALTER TABLE `content_metadata`
  ADD CONSTRAINT `content_metadata_ibfk_1` FOREIGN KEY (`content_id`) REFERENCES `content` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `tags`
--
ALTER TABLE `tags`
  ADD CONSTRAINT `tags_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_role`) REFERENCES `user_roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `user_metadata`
--
ALTER TABLE `user_metadata`
  ADD CONSTRAINT `user_metadata_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_metadata_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
