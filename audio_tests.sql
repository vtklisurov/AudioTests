-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jun 04, 2021 at 11:45 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `audio_tests`
--

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

DROP TABLE IF EXISTS `tests`;
CREATE TABLE IF NOT EXISTS `tests` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `questions` text NOT NULL,
  `added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `name`, `questions`, `added`) VALUES
(1, 'asdasd', '{\"Questions\": [\"\\\"question_type\\\": \\\"MultiChoiceText\\\", \\\"question_text\\\": \\\"asdas\\\", \\\"question_audio\\\": \\\"\\\", \\\"available_answers\\\": [\\\"123\\\", \\\"123\\\", \\\"43\\\"], \\\"answer\\\"; 123\\\"\", \"\\\"question_type\\\": \\\"MultiChoiceAudio\\\", \\\"question_text\\\": \\\"12312\\\", \\\"question_audio\\\": \\\"\\\", \\\"available_answers\\\": [\\\"L7_Requirements Validation_BG_moodle (1).pdf\\\", \\\"L7_Requirements Validation_BG_moodle (1).pdf\\\", \\\"L7_Requirements Validation_BG_moodle (1).pdf\\\"], \\\"answer\\\"; L7_Requirements Validation_BG_moodle (1).pdf\\\"\", \"\\\"question_type\\\": \\\"MultiChoicePicture\\\", \\\"question_text\\\": \\\"123\\\", \\\"question_audio\\\": \\\"L8_RequirementsManagement_BG_moodle (1).pdf\\\", \\\"available_answers\\\": [\\\"L6_Requirements_Specification_BG_moodle (1).pdf\\\", \\\"L8_RequirementsManagement_BG_moodle (1).pdf\\\", \\\"L7_Requirements Validation_BG_moodle (1).pdf\\\"], \\\"answer\\\"; L7_Requirements Validation_BG_moodle (1).pdf\\\"\", \"\\\"question_type\\\": \\\"TextInput\\\", \\\"question_text\\\": \\\"123\\\", \\\"question_audio\\\": \\\"\\\", \\\"answer\\\"; 3\\\"\"]}', '2020-07-06 19:25:57'),
(2, 'asdasd', '{\"Questions\": [\"\\\"question_type\\\": \\\"MultiChoiceText\\\", \\\"question_text\\\": \\\"asdas\\\", \\\"question_audio\\\": \\\"\\\", \\\"available_answers\\\": [\\\"123\\\", \\\"123\\\", \\\"43\\\"], \\\"answer\\\"; 123\\\"\", \"\\\"question_type\\\": \\\"MultiChoiceAudio\\\", \\\"question_text\\\": \\\"12312\\\", \\\"question_audio\\\": \\\"\\\", \\\"available_answers\\\": [\\\"L7_Requirements Validation_BG_moodle (1).pdf\\\", \\\"L7_Requirements Validation_BG_moodle (1).pdf\\\", \\\"L7_Requirements Validation_BG_moodle (1).pdf\\\"], \\\"answer\\\"; L7_Requirements Validation_BG_moodle (1).pdf\\\"\", \"\\\"question_type\\\": \\\"MultiChoicePicture\\\", \\\"question_text\\\": \\\"123\\\", \\\"question_audio\\\": \\\"L8_RequirementsManagement_BG_moodle (1).pdf\\\", \\\"available_answers\\\": [\\\"L6_Requirements_Specification_BG_moodle (1).pdf\\\", \\\"L8_RequirementsManagement_BG_moodle (1).pdf\\\", \\\"L7_Requirements Validation_BG_moodle (1).pdf\\\"], \\\"answer\\\"; L7_Requirements Validation_BG_moodle (1).pdf\\\"\", \"\\\"question_type\\\": \\\"TextInput\\\", \\\"question_text\\\": \\\"123\\\", \\\"question_audio\\\": \\\"\\\", \\\"answer\\\"; 3\\\"\"]}', '2020-07-06 19:30:21'),
(3, 'asdasd', '{\"Questions\": [\"\\\"question_type\\\": \\\"MultiChoiceText\\\", \\\"question_text\\\": \\\"asdas\\\", \\\"question_audio\\\": \\\"\\\", \\\"available_answers\\\": [\\\"123\\\", \\\"123\\\", \\\"43\\\"], \\\"answer\\\"; \\\"123\\\"\", \"\\\"question_type\\\": \\\"MultiChoiceAudio\\\", \\\"question_text\\\": \\\"12312\\\", \\\"question_audio\\\": \\\"\\\", \\\"available_answers\\\": [\\\"L7_Requirements Validation_BG_moodle (1).pdf\\\", \\\"L7_Requirements Validation_BG_moodle (1).pdf\\\", \\\"L7_Requirements Validation_BG_moodle (1).pdf\\\"], \\\"answer\\\"; \\\"L7_Requirements Validation_BG_moodle (1).pdf\\\"\", \"\\\"question_type\\\": \\\"MultiChoicePicture\\\", \\\"question_text\\\": \\\"123\\\", \\\"question_audio\\\": \\\"L8_RequirementsManagement_BG_moodle (1).pdf\\\", \\\"available_answers\\\": [\\\"L6_Requirements_Specification_BG_moodle (1).pdf\\\", \\\"L8_RequirementsManagement_BG_moodle (1).pdf\\\", \\\"L7_Requirements Validation_BG_moodle (1).pdf\\\"], \\\"answer\\\"; \\\"L7_Requirements Validation_BG_moodle (1).pdf\\\"\", \"\\\"question_type\\\": \\\"TextInput\\\", \\\"question_text\\\": \\\"123\\\", \\\"question_audio\\\": \\\"\\\", \\\"answer\\\"; \\\"3\\\"\"]}', '2020-07-06 19:31:17'),
(4, 'asdasd', '{\"Questions\": [\"\\\"question_type\\\": \\\"MultiChoiceText\\\", \\\"question_text\\\": \\\"asdas\\\", \\\"question_audio\\\": \\\"\\\", \\\"available_answers\\\": [\\\"123\\\", \\\"123\\\", \\\"43\\\"], \\\"answer\\\", \\\"123\\\"\", \"\\\"question_type\\\": \\\"MultiChoiceAudio\\\", \\\"question_text\\\": \\\"12312\\\", \\\"question_audio\\\": \\\"\\\", \\\"available_answers\\\": [\\\"L7_Requirements Validation_BG_moodle (1).pdf\\\", \\\"L7_Requirements Validation_BG_moodle (1).pdf\\\", \\\"L7_Requirements Validation_BG_moodle (1).pdf\\\"], \\\"answer\\\", \\\"L7_Requirements Validation_BG_moodle (1).pdf\\\"\", \"\\\"question_type\\\": \\\"MultiChoicePicture\\\", \\\"question_text\\\": \\\"123\\\", \\\"question_audio\\\": \\\"L8_RequirementsManagement_BG_moodle (1).pdf\\\", \\\"available_answers\\\": [\\\"L6_Requirements_Specification_BG_moodle (1).pdf\\\", \\\"L8_RequirementsManagement_BG_moodle (1).pdf\\\", \\\"L7_Requirements Validation_BG_moodle (1).pdf\\\"], \\\"answer\\\", \\\"L7_Requirements Validation_BG_moodle (1).pdf\\\"\", \"\\\"question_type\\\": \\\"TextInput\\\", \\\"question_text\\\": \\\"123\\\", \\\"question_audio\\\": \\\"\\\", \\\"answer\\\", \\\"3\\\"\"]}', '2020-07-06 19:32:18'),
(5, 'asdasd', '5.json', '2020-07-06 20:02:55'),
(6, 'сада', '6.json', '2020-07-06 20:12:07'),
(7, 'сада', '7.json', '2020-07-06 20:15:09'),
(8, 'сада', '8.json', '2020-07-06 20:15:47'),
(9, 'сада', '9.json', '2020-07-06 20:21:03'),
(10, 'сада', '10.json', '2020-07-06 20:21:42'),
(11, 'сада', '11.json', '2020-07-06 20:22:28'),
(12, 'сада', '12.json', '2020-07-06 20:27:52'),
(13, 'сада', '13.json', '2020-07-06 20:29:35'),
(14, 'сада', '14.json', '2020-07-06 20:30:20'),
(15, 'сада', '15.json', '2020-07-06 20:31:02'),
(16, 'сада', '16.json', '2020-07-06 20:32:19'),
(17, 'сада', '17.json', '2020-07-06 20:33:58'),
(18, 'сада', './Tests/18.json', '2020-07-06 20:52:40'),
(19, 'сада', './Tests/19.json', '2020-07-06 20:55:43'),
(20, 'сада', './Tests/20.json', '2020-07-06 20:56:25'),
(21, 'сада', './Tests/21.json', '2020-07-06 20:58:24'),
(22, 'сада', './Tests/22.json', '2020-07-06 20:58:29'),
(23, 'сада', './Tests/23.json', '2020-07-06 20:58:58'),
(24, 'сада', './Tests/24.json', '2020-07-06 21:02:06'),
(25, 'сада', './Tests/25.json', '2020-07-06 21:04:30'),
(26, 'сада', './Tests/26.json', '2020-07-06 21:07:37'),
(27, 'асд', './Tests/27.json', '2020-07-06 21:10:08'),
(28, 'сдф', './Tests/28.json', '2020-07-06 21:12:27'),
(29, 'сдф', './Tests/29.json', '2020-07-06 21:13:36'),
(30, '123123', './Tests/30.json', '2020-07-06 21:16:33'),
(31, '123123', './Tests/31.json', '2020-07-06 21:16:51'),
(32, '123123', './Tests/32.json', '2020-07-06 21:17:15'),
(33, '123123', './Tests/33.json', '2020-07-06 21:17:31'),
(34, '123123', './Tests/34.json', '2020-07-06 21:18:35'),
(35, '123123', './Tests/35.json', '2020-07-06 21:19:12'),
(36, '123123', './Tests/36.json', '2020-07-06 21:20:23'),
(37, '', './Tests/37.json', '2020-07-06 21:25:59'),
(38, '', './Tests/38.json', '2020-07-06 21:27:24'),
(39, 'dsf', './Tests/39.json', '2020-07-06 21:27:39'),
(40, 'dsf', './Tests/40.json', '2020-07-06 21:30:32'),
(41, 'dsf', './Tests/41.json', '2020-07-06 21:30:51'),
(42, 'dsf', './Tests/42.json', '2020-07-06 21:30:55'),
(43, 'adas', './Tests/43.json', '2020-07-18 17:46:23'),
(44, 'adas', '../Tests/44.json', '2020-07-18 17:48:31'),
(45, 'adas', '../Tests/45.json', '2020-07-18 17:49:06'),
(46, '213', '../Tests/46.json', '2020-07-18 17:56:18'),
(47, 'sdsd', '../Tests/47.json', '2020-07-18 18:33:56'),
(48, 'sdad', '../Tests/48.json', '2020-07-18 18:34:05'),
(49, 'xc', '../Tests/49.json', '2020-07-18 18:34:22'),
(50, 'sadas', '../Tests/50.json', '2020-07-18 18:36:33'),
(51, 'sadas', '../Tests/50.json', '2020-07-18 18:36:33'),
(52, 'sadas', '../Tests/50.json', '2020-07-18 18:36:33'),
(53, 'sadas', '../Tests/50.json', '2020-07-18 18:36:33'),
(54, 'sadas', '../Tests/50.json', '2020-07-18 18:36:33'),
(55, 'sadas', '../Tests/50.json', '2020-07-18 18:36:33'),
(56, 'sadas', '../Tests/50.json', '2020-07-18 18:36:33'),
(57, 'sadas', '../Tests/50.json', '2020-07-18 18:36:33'),
(58, 'sadas', '../Tests/50.json', '2020-07-18 18:36:33'),
(59, 'sadas', '../Tests/50.json', '2020-07-18 18:36:33'),
(60, 'dfs', '../Tests/60.json', '2020-07-18 18:36:53'),
(61, 'sad', '../Tests/61.json', '2020-07-18 18:41:58'),
(62, 'sdsd', '../Tests/62.json', '2020-07-18 18:42:50'),
(63, 'sad', '../Tests/63.json', '2020-07-18 18:43:07'),
(64, 'sad', '../Tests/64.json', '2020-07-18 18:43:19'),
(93, 'асдсад', '../Tests/93.json', '2020-07-21 20:48:58'),
(66, '', '../Tests/66.json', '2020-07-18 19:59:10'),
(67, '', '../Tests/67.json', '2020-07-18 20:03:01'),
(68, '', '../Tests/68.json', '2020-07-18 20:03:35'),
(69, '', '../Tests/69.json', '2020-07-18 20:04:04'),
(70, '', '../Tests/70.json', '2020-07-18 20:05:35'),
(71, 'asdas', '../Tests/71.json', '2020-07-18 20:13:17'),
(72, '', '../Tests/72.json', '2020-07-18 20:18:07'),
(73, 'асд', '../Tests/73.json', '2020-07-18 20:18:52'),
(74, 'асд', '../Tests/74.json', '2020-07-18 20:19:18'),
(75, 'адс', '../Tests/75.json', '2020-07-18 20:19:43'),
(76, 'адса', '../Tests/76.json', '2020-07-18 20:19:56'),
(77, 'Проба', '../Tests/77.json', '2020-07-18 20:28:44'),
(78, 'asd', '../Tests/78.json', '2020-07-18 20:36:26'),
(79, 'тестинг', '../Tests/79.json', '2020-07-18 20:37:26'),
(80, '', '../Tests/80.json', '2020-07-18 20:39:00'),
(81, 'sadas', '../Tests/81.json', '2020-07-19 17:45:44'),
(82, 'sadas', '../Tests/82.json', '2020-07-19 17:46:58'),
(83, 'asdasd', '../Tests/83.json', '2020-07-19 18:02:37'),
(84, 'asdasd', '../Tests/84.json', '2020-07-19 18:09:32'),
(85, 'asdasd', '../Tests/85.json', '2020-07-19 18:16:15'),
(86, 'asdasd', '../Tests/86.json', '2020-07-19 18:22:26'),
(91, 'Смислен тест', '../Tests/91.json', '2020-07-19 18:55:55'),
(92, 'adfafdadf', '../Tests/92.json', '2020-07-21 20:46:52'),
(94, 'сдфсадф', '../Tests/94.json', '2020-07-21 20:56:02'),
(96, 'тест', '../Tests/95.json', '2020-07-21 22:00:59'),
(97, 'кавички', '../Tests/97.json', '2020-07-21 22:03:45'),
(98, 'Аудио тест', '../Tests/98.json', '2020-07-21 22:07:34'),
(99, 'Test1', '../Tests/99.json', '2020-07-22 16:12:30'),
(100, 'sadsaf', '../Tests/100.json', '2020-07-22 16:15:20'),
(101, 'Мойто коте', '../Tests/101.json', '2020-07-23 15:20:41');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
