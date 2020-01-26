-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2020 at 03:26 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `institutions`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `name` text DEFAULT NULL,
  `explanation` text DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `date_of_register` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `school_id`, `name`, `explanation`, `student_id`, `date_of_register`) VALUES
(7, 16, 'Football Two', 'Playing Football Well', 39, '2019-12-07 10:57:31'),
(8, 16, 'Football', 'he Plays Football', 44, '2020-01-05 20:56:43'),
(9, 16, 'Basketball', 'He Loves to play basket ball', 44, '2020-01-05 20:57:12');

-- --------------------------------------------------------

--
-- Table structure for table `children_feedback`
--

CREATE TABLE `children_feedback` (
  `id` int(11) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `subject` text DEFAULT NULL,
  `feedback` text DEFAULT NULL,
  `teacher_name` text DEFAULT NULL,
  `date_of_feedback` timestamp NOT NULL DEFAULT current_timestamp(),
  `student_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `children_feedback`
--

INSERT INTO `children_feedback` (`id`, `school_id`, `subject`, `feedback`, `teacher_name`, `date_of_feedback`, `student_id`) VALUES
(6, 16, 'math', 'Very bad at this subject', 'Hoda', '2019-12-07 17:16:07', 39),
(7, 16, 'asdasf', 'asfdsafsasasasafds', 'asddsasafsfdsf', '2019-12-07 17:19:55', 39),
(8, 16, 'bad at math', 'He can not solve problems', 'Mahmoud', '2020-01-19 18:19:18', 44),
(9, 16, 'Arabic', 'He did not answer my questions', 'Khalid Mahmoud', '2020-01-19 18:59:04', 44);

-- --------------------------------------------------------

--
-- Table structure for table `complants`
--

CREATE TABLE `complants` (
  `id` int(11) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `type` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `number` text DEFAULT NULL,
  `title` text DEFAULT NULL,
  `feedback` text DEFAULT NULL,
  `date_of_complant` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complants`
--

INSERT INTO `complants` (`id`, `school_id`, `type`, `name`, `number`, `title`, `feedback`, `date_of_complant`) VALUES
(1, 2, 'Parent', 'Mohamed Mahmoud', '01021987978', 'Bad Treatment', 'teacher cursed my son', '2019-10-29 21:32:42'),
(2, 3, 'Teacher', 'Teacher Ahmed El Shobokshey', '0124678879', 'Bad Treatment ', 'Bad Treatment from Staff', '2019-10-29 21:33:50'),
(9, 3, 'type', 'name', 'number', 'title', 'feedback', '2020-01-08 18:36:36'),
(21, NULL, 'type', 'Name', 'PhoneNumber', 'TITLE', 'Feedback', '2020-01-08 18:53:40'),
(22, NULL, 'asdsad', 'asd', 'asdsad', 'asasd', 'asdsadasdsadsadsdaasdsaddsa', '2020-01-08 19:47:03'),
(23, 3, 'type', 'asd', 'asdsad', 'asasd', 'asdsadasdsadsadsdaasdsaddsa', '2020-01-08 19:54:39'),
(24, 3, 'Be Beb', 'asd', 'asdsad', 'asasd', 'asdsadasdsadsadsdaasdsaddsa', '2020-01-08 19:55:07'),
(29, 3, 'Be Beb', 'asd', 'asdsad', 'asasd', 'asdsadasdsadsadsdaasdsaddsaHow	', '2020-01-08 19:58:27'),
(30, 16, 'asdsda', 'sadsaddsdsdsdssad', 'sadsasdsdadssadsa', 'asdasd', 'sdsadsadasdsasadsadsad', '2020-01-08 19:59:45'),
(31, 16, 'asdsda', 'sadsaddsdsdsdssad', 'sadsasdsdadssadsa', 'asdasd', 'sdsadsadasdsasadsadsad', '2020-01-08 20:02:54'),
(32, 16, 'asdsda', 'sadsaddsdsdsdssad', 'sadsasdsdadssadsa', 'asdasd', 'sdsadsadasdsasadsadsad', '2020-01-08 20:03:25'),
(47, NULL, '', '', '', '', '', '2020-01-12 21:16:02'),
(48, 16, 'Father', 'Mohamed Mohamed Yassein', '123456', 'Bad Treatment', 'teacher is ignoring my son and not dealing with him in a good way', '2020-01-12 21:18:44'),
(50, 16, 'Mother', 'Noha Mahmoiud', '012456546456', 'Bad Treatment', 'Teacher asgj are treating my son on a bad way my son name is Khaled mahmoud', '2020-01-19 11:49:54'),
(51, 16, 'Mother', 'Naira Khlaed Ahmed Mohamed	', '012456756786	', 'Ignoring	', 'The teacher of math ignore my son and not let him participate', '2020-01-19 12:03:22'),
(52, 16, 'Aunt	', 'Nahia mahmou	', '132465465', 'Dealing', 'He Punsihed the student in a bad way teacher of the math', '2020-01-19 12:12:34'),
(53, 16, 'father	', 'Mohamed khaled', '01246456', 'Bad treatment	', 'the teacher of math are treating my son on a bad way', '2020-01-19 18:16:17');

-- --------------------------------------------------------

--
-- Table structure for table `control_groups`
--

CREATE TABLE `control_groups` (
  `id` int(11) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `date_of_register` timestamp NOT NULL DEFAULT current_timestamp(),
  `student_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `control_groups`
--

INSERT INTO `control_groups` (`id`, `school_id`, `date_of_register`, `student_id`, `group_id`) VALUES
(18, 16, '2020-01-05 20:56:15', 44, 5),
(19, 16, '2020-01-06 23:31:50', 44, 6),
(20, 16, '2020-01-19 19:08:23', 39, 5);

-- --------------------------------------------------------

--
-- Table structure for table `fees`
--

CREATE TABLE `fees` (
  `id` int(11) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `fees_amount` float DEFAULT NULL,
  `date_of_pay` timestamp NULL DEFAULT current_timestamp(),
  `student_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fees`
--

INSERT INTO `fees` (`id`, `school_id`, `fees_amount`, `date_of_pay`, `student_id`) VALUES
(8, 16, 2500, '2019-12-08 15:43:56', 39),
(9, 16, 150, '2019-12-08 15:44:05', 39),
(10, 16, 100, '2019-12-08 15:44:10', 39),
(11, 16, 200, '2019-12-08 15:44:28', 38),
(12, 16, 300, '2019-12-10 17:23:40', 39),
(13, 16, 150, '2020-01-05 20:59:45', 44),
(14, 16, 700, '2020-01-05 20:59:49', 44),
(15, 16, 600, '2020-01-05 20:59:57', 44);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `name` text DEFAULT NULL,
  `subject` text DEFAULT NULL,
  `time_of_room` text DEFAULT NULL,
  `date_of_register` timestamp NOT NULL DEFAULT current_timestamp(),
  `teacher_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `school_id`, `name`, `subject`, `time_of_room`, `date_of_register`, `teacher_id`) VALUES
(5, 16, 'G52', 'Science', '1 AM', '2020-01-05 20:55:38', 3),
(6, 16, 'G55', 'Math', '6 AM', '2020-01-06 23:31:19', 3);

-- --------------------------------------------------------

--
-- Table structure for table `medication`
--

CREATE TABLE `medication` (
  `id` int(11) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `time_of_treatment` text DEFAULT NULL,
  `date_of_register` timestamp NOT NULL DEFAULT current_timestamp(),
  `student_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medication`
--

INSERT INTO `medication` (`id`, `school_id`, `name`, `description`, `time_of_treatment`, `date_of_register`, `student_id`) VALUES
(7, 16, 'Bones Harmful', 'You must not touch him', 'at 9 am', '2019-12-07 21:12:42', 39),
(8, 16, 'Cold', 'He has a strong cold', 'at 9 am', '2020-01-05 20:58:45', 44);

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `address` text NOT NULL,
  `number` text NOT NULL,
  `date_of_register` timestamp NOT NULL DEFAULT current_timestamp(),
  `school_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parents`
--

INSERT INTO `parents` (`id`, `username`, `password`, `name`, `email`, `address`, `number`, `date_of_register`, `school_id`, `student_id`) VALUES
(164, 'asd', '$2y$10$Ddm/MAP37Hi3tnUJTGDPquCBXOTZWJb6W3LPRr/Lh/l7lAWZe8r2y', 'ASD', 'asdsadsadsad8@gmail.com', 'Egypt, Dakahlia', '123456', '2019-12-07 11:46:27', 16, 39),
(165, 'oo', '$2y$10$xtVwYWUqZC5wZ8aQPkoWR.k8J606WvJnCOXcjI.f94fKUFwlrYhbi', 'Abdallah  Yassein', 'aasdsaddsa@yahoo.com', 'Egypt, Dakahlia', '0102456789', '2019-12-07 18:49:26', 16, 40),
(166, 'Mohamed', '$2y$10$zKp4tT9Zkji8LzQhVvnByucZC0ZswO5EnKo7HAmAf/8WpKkekb63u', 'Mohamed Mohamed', 'abdaasdsadsadsaein@yahoo.com', 'Egypt, Dakahlia', '0121323123', '2019-12-10 17:23:20', 16, 40),
(167, 'ahmed', '$2y$10$l6ZP1WW77yKc6cHXFVqDdOFHwttATtcyzG2woV09Cqw1MvEI6DqyK', 'Mohamed Mohamed ', 'nooasdr@gmail.com', 'Egypt, Dakahlia', '0101232131', '2019-12-20 16:27:36', 16, 39),
(168, 'asdf', '123456', 'test', 'tasdasddsat@yahoo.com', 'Ashmon', '0102121', '2019-12-20 19:17:53', 16, 22),
(169, 'abdallahyassein', '$2y$10$gLXmN2s0sa9qMEvBFA7LsO8i9ChBs2hXCMQ/qdykimIxjo2/Kjea2', 'aKoKo', 'gasdsadsadsad8@gmail.com', 'Egypt, Dakahlia', '01021232136', '2019-12-26 18:04:57', 16, 39),
(170, 'asdfg', '$2y$10$K9fqB7tA8iCUiSu23ZeFo.4u1.nUEu/kXLfENpfYkHm1l0Rvc4ZPq', 'Asad', 'asdasdasdsad8@gmail.com', 'Egypt, Dakahlia', '010123213', '2019-12-26 18:05:23', 16, 39),
(171, 'mahmoudmohamed', '$2y$10$T7E0wek8E/DaEmK.iAqTjOP2VoiHEV.RE2UcysCouIJmtBfIXZaOe', 'Hoda', 'gasdasdsad8@gmail.com', 'Egypt, Dakahlia', '010212323', '2020-01-05 20:54:49', 16, 44);

-- --------------------------------------------------------

--
-- Table structure for table `people_emergency`
--

CREATE TABLE `people_emergency` (
  `id` int(11) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `name` text DEFAULT NULL,
  `number` text DEFAULT NULL,
  `relation` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `date_of_register` timestamp NOT NULL DEFAULT current_timestamp(),
  `student_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `people_emergency`
--

INSERT INTO `people_emergency` (`id`, `school_id`, `name`, `number`, `relation`, `email`, `address`, `date_of_register`, `student_id`) VALUES
(6, 16, 'Aha', '123213213', 'Cousin', 'aaaaaaa@yahoo.com', 'Egypt, Dakahlia', '2019-12-11 18:23:28', 39),
(8, 16, 'asdas', '1232123', 'Cousin', 'gaaaaa@gmail.com', 'Egypt, Dakahlia', '2019-12-11 18:23:59', 40),
(10, 16, 'Noor', '114546', 'Cousin', 'glosdsdsd8@gmail.com', 'Egypt, Dakahlia', '2019-12-11 18:24:18', 40),
(11, 16, 'abdallah yassein', '789789789564', 'Cousin', 'asdsafd2@yahoo.com', 'Egypt, Dakahlia', '2019-12-11 18:24:27', 40),
(12, 16, 'Hoda Mahmoud Khaled', '123456', 'Cousin', 'nooasdasdsadr@gmail.com', 'Egypt, Dakahlia', '2020-01-05 20:57:59', 44),
(13, 16, 'Soad', '123456', 'Aunt', 'asdasdasdasda', 'Egypt, Dakahlia', '2020-01-05 20:58:15', 44);

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `appointment1` text DEFAULT NULL,
  `appointment2` text DEFAULT NULL,
  `appointment3` text DEFAULT NULL,
  `appointment4` text DEFAULT NULL,
  `appointment5` text DEFAULT NULL,
  `appointment6` text DEFAULT NULL,
  `appointment7` text DEFAULT NULL,
  `appointment8` text DEFAULT NULL,
  `date_of_register` timestamp NOT NULL DEFAULT current_timestamp(),
  `grade` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `school_id`, `appointment1`, `appointment2`, `appointment3`, `appointment4`, `appointment5`, `appointment6`, `appointment7`, `appointment8`, `date_of_register`, `grade`) VALUES
(8, 16, 'Arabic', 'English', 'Math', 'Science', 'Rest', 'Rest', 'Rest', 'Rest', '2019-12-11 21:13:22', '5'),
(11, 16, 'Math', 'Math', 'Math', 'Math', '', '', '', '', '2019-12-11 21:33:09', '6');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `address` text NOT NULL,
  `number` text NOT NULL,
  `date_of_register` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `username`, `password`, `name`, `email`, `address`, `number`, `date_of_register`) VALUES
(2, 'test_school', 'test_school', 'Test School', 'test_school@yahoo.com', 'test place', '1098752369', '2019-10-27 19:46:18'),
(3, 'test_school_2', 'test_school_2', 'Second School', 'test_school_2@yahoo.com', 'Giza', '01021548987', '2019-10-29 21:11:52'),
(15, 'abdallahyassein', '$2y$10$b4QGHFPVy7LxLu4tEq1RLOzE4cgpgkUMSCh3Lt0JZ4Nq37BOfWg8W', 'abdallah yassein', 'abdallasdsadsadain@yahoo.com', 'Egypt, Dakahlia', '0101212448789', '2019-10-30 22:19:47'),
(16, 'noor', '$2y$10$v5wDwu5NVyPnEk64OMkftOiCDiasJwaQheU06L4Kco/4.WYJLx7.G', 'Noor', 'noor@gmail.com', 'Egypt, Dakahlia', '0101212448789', '2019-11-05 11:56:39'),
(17, 'malak', '$2y$10$UoeQY4exzj7evWcXRW2mWuEFIsvakmQ9Y42JPinx8LzrmUyt2Nf.W', 'Malak', 'abdallasdn@yahoo.com', 'Egypt, Dakahlia', '0101212448789', '2019-11-13 23:54:02'),
(18, 'hager', '$2y$10$sCkZLThhoNV2G7hjcFsJceD/.E3mYxYYzvQ.v6w5Dpo6JRFAmANny', 'Hager', 'gasdasdsad8@gmail.com', 'Egypt, Dakahlia', '010214645', '2019-11-14 21:38:22'),
(19, 'reem', '$2y$10$k0op27xwnGJMyn2ZS6ql7.rxsyQm5X6OPpbKeYTW8SH.AHtAIhse2', 'REEM', 'asadsadsadsda@yahoo.com', 'Egypt, Dakahlia', '123456', '2019-11-15 12:41:28'),
(20, 'school_name', '$2y$10$4M9C4ZS2UejmnCV5VuFm0.IOCsu10piQ1.MmVffqRII/xbBVRuUYi', 'AlMahmohjg School', 'school_email@yahoo.com', 'Dakqahlia', '0123756456', '2020-01-19 19:06:18');

-- --------------------------------------------------------

--
-- Table structure for table `sibiling`
--

CREATE TABLE `sibiling` (
  `id` int(11) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `name` text DEFAULT NULL,
  `date_of_birth` text DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sibiling`
--

INSERT INTO `sibiling` (`id`, `school_id`, `name`, `date_of_birth`, `student_id`) VALUES
(9, 16, 'Yassein', '3/5/1997', 39),
(10, 16, 'Abdallah Yassein', '3/4/2001', 40),
(12, 16, 'Akho', '3/3/1998', 44),
(13, 16, 'Saberina', '3/5/2005', 44);

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `id` int(11) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `username` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `job` text DEFAULT NULL,
  `number` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `date_of_register` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`id`, `school_id`, `username`, `password`, `name`, `job`, `number`, `address`, `email`, `date_of_register`) VALUES
(4, 16, 'malak', '$2y$10$uHYW3rb8bIaHSPJCpnVcTOapPj1mz6dgyPqt/ygbPRnmrWPNAsj.S', 'Mohamed Mohamed Yassein', 'Manager', '123456', 'Egypt, Dakahlia', 'asdasdasdasda', '2019-12-10 20:15:37');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `username` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `grade` text DEFAULT NULL,
  `date_of_birth` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `date_of_register` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `school_id`, `username`, `password`, `name`, `grade`, `date_of_birth`, `address`, `date_of_register`) VALUES
(21, 17, 'asd', '$2y$10$hkodsia5kJp4ApVGWjIYv.QBLQwUJLY3pJrXaAEuuwmPuggota7Im', 'Ahmed Sad Mahmoud Khalid', '6', '3/5/1997', 'Egypt, Dakahlia', '2019-11-14 21:34:41'),
(22, 18, 'mahmouda', '$2y$10$q617GbHrjxFD9.8hanDQxegtTsNUizfmRkFpzcaAe8KzQRj1dsJPC', 'Mahmoud Mohamed Mahmoud', '7', '3/5/1998', 'Egypt, Dakahlia', '2019-11-14 22:59:27'),
(24, 19, 'hodaa', '$2y$10$k6R/5Yc34KydmvoO1/EcOef3x4HjBlAET18MyzgY3PfjV9PQukj4O', 'abdallah yassein', '6', '3/5/1998', 'Egypt, Dakahlia', '2019-11-15 12:42:10'),
(37, 16, 'noor', '$2y$10$H7g.GzY6/DurQZULmLznXeYXYDpFS2puf6UIDnSMMrY3SmMuKDvLq', 'Noor Khaled Mohamed Mahmoud', '5', '3/5/1997', 'Egypt, Dakahlia', '2019-12-07 10:40:39'),
(38, 16, 'noor1', '$2y$10$BhOWaqnbZbaLFEDBzgjOUu/xhvsFod/QD4DpgmJcK1jcAYTLsqNzW', 'Mohamed Mohamed Yassein', '6', '3/5/1997', 'Egypt, Dakahlia', '2019-12-07 10:40:57'),
(39, 16, 'noor2', '$2y$10$6K5mR7dc10FbJBwAj5T1s.ja4Y.ycNOHokvAJ/49gM.hcoZYwWoTK', 'Ahmed Mohamed Elbadry', '9', '3/4/2001', 'Egypt, Dakahlia', '2019-12-07 10:41:15'),
(40, 16, 'hager', '$2y$10$6mRTEMordEDBRgk/k.EPnu6VyCQOhNMoF7S3zvpswOun4JHW1S6yW', 'Ahmed Mohamed Mohamed Yassein', '6', '3/5/1997', 'Egypt, Dakahlia', '2019-12-07 10:41:39'),
(43, 16, 'asdsad', '$2y$10$cKgDi7fVBivDfYlP7A1DhOQBYB5iexeR1mD5k7U4zSAJhApp4klAq', 'Mohamed Mohamed Yassein', '3', '3/5/1997', '1232', '2019-12-10 17:28:29'),
(44, 16, 'mahmoudmohamed', '$2y$10$6JOP49JWzRXMY8tAKlgDK.Bx0ulh1ptcTH2tyWfVPViYxG4ilw5au', 'Mahmoud Mohamd Ahmed', '5', '3/5/1998', 'Egypt, Dakahlia', '2020-01-05 20:53:56');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `subject` text DEFAULT NULL,
  `task` text DEFAULT NULL,
  `date_of_task` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `school_id`, `group_id`, `subject`, `task`, `date_of_task`) VALUES
(1, 16, 5, 'page 55', 'solve all problems have a good day guys', '2020-01-13 20:44:21'),
(2, 16, 6, 'asdsadsa', 'Page 25 at working book is important', '2020-01-13 20:45:22'),
(3, 16, 5, 'tomorrow', 'asdsadsadasdsadasddsasadsdadsasdasadsddhgjhjkhuyuytyutytytyttruyrtuyrtuyruyrtuytruyyururuuryrtuytrtyuru', '2020-01-14 14:01:57'),
(4, 16, 5, 'how are you', 'aserthjkl,mgderhjkoiyumbn', '2020-01-14 14:13:28'),
(5, 16, 5, 'Hope nice Day', 'Work Hard on Simple Exams', '2020-01-14 23:26:34'),
(6, 16, 5, 'Page 54 (Science)', 'Solve Page 54 at work book', '2020-01-19 12:15:40'),
(7, 16, 6, 'Page 13 (SCiecne)', 'Solve Page 13 at work book we well check it tomorrow', '2020-01-19 12:16:37');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(11) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `username` text DEFAULT NULL,
  `password` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `subject` text DEFAULT NULL,
  `number` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `date_of_register` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `school_id`, `username`, `password`, `name`, `subject`, `number`, `email`, `address`, `date_of_register`) VALUES
(3, 16, 'abdallahyassein', '$2y$10$xJr5DjvQDtJ5kRdjA6jMouvc9qYTWdfR.ycOnJe56iWX3iOw3lmjO', 'Abdallah Yassein', 'Science', '0101212448789', 'abdallaasdsad@yahoo.com', 'Egypt, Dakahlia', '2019-11-13 18:24:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_id` (`school_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `children_feedback`
--
ALTER TABLE `children_feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_id` (`school_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `complants`
--
ALTER TABLE `complants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `control_groups`
--
ALTER TABLE `control_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_id` (`school_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `fees`
--
ALTER TABLE `fees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_id` (`school_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_id` (`school_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `medication`
--
ALTER TABLE `medication`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_id` (`school_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`) USING HASH,
  ADD KEY `school_id` (`school_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `people_emergency`
--
ALTER TABLE `people_emergency`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_id` (`school_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`) USING HASH;

--
-- Indexes for table `sibiling`
--
ALTER TABLE `sibiling`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_id` (`school_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`) USING HASH,
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_id` (`school_id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`) USING HASH,
  ADD KEY `school_id` (`school_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `children_feedback`
--
ALTER TABLE `children_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `complants`
--
ALTER TABLE `complants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `control_groups`
--
ALTER TABLE `control_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `fees`
--
ALTER TABLE `fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `medication`
--
ALTER TABLE `medication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;

--
-- AUTO_INCREMENT for table `people_emergency`
--
ALTER TABLE `people_emergency`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sibiling`
--
ALTER TABLE `sibiling`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activities`
--
ALTER TABLE `activities`
  ADD CONSTRAINT `activities_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`),
  ADD CONSTRAINT `activities_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `children_feedback`
--
ALTER TABLE `children_feedback`
  ADD CONSTRAINT `children_feedback_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`),
  ADD CONSTRAINT `children_feedback_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `complants`
--
ALTER TABLE `complants`
  ADD CONSTRAINT `complants_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`);

--
-- Constraints for table `control_groups`
--
ALTER TABLE `control_groups`
  ADD CONSTRAINT `control_groups_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`),
  ADD CONSTRAINT `control_groups_ibfk_3` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `control_groups_ibfk_4` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fees`
--
ALTER TABLE `fees`
  ADD CONSTRAINT `fees_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`),
  ADD CONSTRAINT `fees_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`),
  ADD CONSTRAINT `groups_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`);

--
-- Constraints for table `medication`
--
ALTER TABLE `medication`
  ADD CONSTRAINT `medication_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`),
  ADD CONSTRAINT `medication_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `parents`
--
ALTER TABLE `parents`
  ADD CONSTRAINT `parents_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`),
  ADD CONSTRAINT `parents_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `people_emergency`
--
ALTER TABLE `people_emergency`
  ADD CONSTRAINT `people_emergency_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`),
  ADD CONSTRAINT `people_emergency_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `schedules_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`);

--
-- Constraints for table `sibiling`
--
ALTER TABLE `sibiling`
  ADD CONSTRAINT `sibiling_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`),
  ADD CONSTRAINT `sibiling_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `staffs`
--
ALTER TABLE `staffs`
  ADD CONSTRAINT `staffs_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`);

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`),
  ADD CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`);

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
