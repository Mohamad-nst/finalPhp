-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2022 at 04:03 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth`
--

CREATE TABLE `auth` (
  `id` int(11) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auth`
--

INSERT INTO `auth` (`id`, `fullName`, `email`, `password`, `createdAt`) VALUES
(3, 'mohamad nosrati', 'mn123hector@gmail.com', '$2y$10$ELHnFMtCe5s1C/gdtb4toeDQaxx0OvcVcKO1YhrQyqAXbVAk6UvxK', '2022-10-29 01:06:50'),
(4, 'kosar', 'kosar@gmail.com', '$2y$10$rehCiFjcB6ujcwbP0Sc5/uXsz5mgvSX4DtuIJL7nbJ5Z/4M1kB3FO', '2022-10-29 01:13:13'),
(5, 'ali', 'alibarati@gmail.com', '$2y$10$4YqtQtuoKKSNzH6C04HQZOF8aQXp0QQYcaARECg/B6IGXHuZ48hgW', '2022-10-29 01:52:59'),
(6, 'mahya', 'mahya@gmail.com', '$2y$10$vZI4YCQPea8.taWopOBYDuBHb6uvs8HRRLyk3fozGJx/qke4J9Udu', '2022-10-29 15:08:10'),
(7, 'esi', 'esi@gmail.com', '$2y$10$PR.ikt.GWLT3cPOL5il1UOGKWxBrckfBH7Jj7ncm4Clf6DpMOCHaS', '2022-10-30 00:55:45'),
(8, 'mmdnst', 'mmdnst@gmail.com', '$2y$10$v3Zb8rwxrqiSeGsgC.UvAugE2ZAX6oPASi5RK/hRhY/l87tF.f2Zy', '2022-10-30 18:51:09'),
(9, 'fateme gh', 'fatemhgh@gmail.com', '$2y$10$VZx2vl7GROmC8yau7J22DuEEi0XibSSR968UAfxjtCsIdO30446L.', '2022-11-02 00:23:55'),
(10, 'shokri', 'shokri@gamil.com', '$2y$10$tlXP/WAo/37f.ZCTsQmkUu6AouenlmAns7ebxbpVYTcKMBjkBMtva', '2022-11-10 09:47:18');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `alt` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `image`, `title`, `alt`, `description`, `createdAt`) VALUES
(6, 'c0aa9e9344a8387b76e803028713c021console-cat.jpg', 'console', 'console', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam dolorem dolores error eveniet facilis fuga fugiat itaque labore necessitatibus nulla', '2022-10-30 22:02:51'),
(7, '21d8e9c62ee75b7e232d9018bea3481bpc.catt.jpg', 'computer', 'computer', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam dolorem dolores error eveniet facilis fuga fugiat itaque labore necessitatibus nulla', '2022-10-30 22:04:06'),
(8, '81aeffc35996136d24046a05b6cc466bmobile-cat.jpg', 'mobile', 'mobile', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam aperiam dolorem dolores error eveniet facilis fuga fugiat itaque labore necessitatibus nulla', '2022-10-30 22:04:31');

-- --------------------------------------------------------

--
-- Table structure for table `panel`
--

CREATE TABLE `panel` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `panel`
--

INSERT INTO `panel` (`id`, `image`, `title`, `link`, `createdAt`) VALUES
(9, '7b8945b1242e041857038b83ef6ec14dcategory.jpg', 'category', 'http://localhost/final/Categories/create', '2022-10-29 21:02:51'),
(10, '5af5bafb3d7fa7470d621ba146a3769aslider2.jpg', 'slider', 'http://localhost/final/Sliders/create', '2022-10-29 21:03:04'),
(11, '90440b4592c8a6562e03e276b08fc123seo1.jpg', 'seo', 'http://localhost/final/Seos/create', '2022-10-29 21:03:14'),
(12, '96a04ae7b7669f815c0caa4fbb199539category.jpg', 'products', 'http://localhost/final/Products/create', '2022-10-30 21:42:36'),
(13, '5be77f1de1b4e3f6f0998cbd2bc053ffteam.jpg', 'team', 'http://localhost/final/Teams/create', '2022-11-01 06:29:25'),
(14, '462bb2d90a276b0e46940c9bb96db8487.jpg', 'service', 'http://localhost/final/Services/create', '2022-11-16 12:51:24'),
(15, '387ea6d93453a3d5a153da14ec291637question.jpg', 'Question', 'http://localhost/final/Questions/create', '2022-11-17 15:40:29'),
(16, 'f55b5208d2845a27e9819b75e7ba941etitle.jpg', 'title', 'http://localhost/final/Titles/create', '2022-11-18 17:39:44');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `alt` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `categoryId` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `image`, `title`, `alt`, `description`, `categoryId`, `createdAt`) VALUES
(4, '2504e98f92fe3956c6d2264478dd61911.jpg', 'god of war', 'god of war', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi aut autem commodi, corporis, cum cumque deserunt dicta dolore eaque eum excepturi ipsam modi nam necessitatibus quam quia sit tenetur vitae.', 6, '2022-10-31 00:18:15'),
(5, 'd1b1a152f1a15493a7b50853d49728d72.jpg', 'call of duty', 'call of duty', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus animi, cupiditate debitis distinctio dolore dolores nihil nulla quibusdam quis recusandae, repellat repellendus rerum, saepe sapiente suscipit. Ex facilis ipsum iure.', 6, '2022-10-31 00:18:57'),
(6, '356e1b8609d72e714cd35fc7a651dc8b3.jpg', 'need for speed', 'need for speed', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus animi, cupiditate debitis distinctio dolore dolores nihil nulla quibusdam quis recusandae, repellat repellendus rerum, saepe sapiente suscipit. Ex facilis ipsum iure.', 7, '2022-10-31 00:19:33'),
(7, 'de8ef7bb41a936d4496b6f3e30c5b89c10.jpg', 'creed', 'creed', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus animi, cupiditate debitis distinctio dolore dolores nihil nulla quibusdam quis recusandae, repellat repellendus rerum, saepe sapiente suscipit. Ex facilis ipsum iure.', 7, '2022-10-31 00:20:09'),
(8, 'c29828c50c96d2d430dd723e3712781amobile-cat.jpg', 'clash', 'clash', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus animi, cupiditate debitis distinctio dolore dolores nihil nulla quibusdam quis recusandae, repellat repellendus rerum, saepe sapiente suscipit. Ex facilis ipsum iure.', 8, '2022-10-31 00:20:54'),
(10, 'b80ef18731b7c89a9cfce8b20926568a6.jpg', 'fight', 'fight', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda, autem dicta eos fugit ipsam laborum optio provident quaerat quam quis rem, temporibus ut vero. Ab aliquid consectetur excepturi facere ut.', 8, '2022-10-31 01:44:45');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `part` varchar(255) NOT NULL,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `part`, `question`, `answer`, `createdAt`) VALUES
(6, 'Two', 'This is the third item&#39;s accordion body. It is hidden by default?', 'These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It&#39;s also worth noting that just about any HTML can go within the .accordion-body, though the transition does limit overflow.', '2022-11-17 15:25:03'),
(7, 'Three', 'This is the third item&#39;s accordion body.', 'It&#39;s also worth noting that just about any HTML can go within the .accordion-body, though the transition does limit overflow.', '2022-11-17 15:25:55'),
(8, 'Four', 'It is hidden by default, until the collapse plugin?', 'These classes control the overall', '2022-11-18 22:35:37');

-- --------------------------------------------------------

--
-- Table structure for table `seo`
--

CREATE TABLE `seo` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seo`
--

INSERT INTO `seo` (`id`, `title`, `keywords`, `description`, `author`, `createdAt`) VALUES
(5, 'Game world', 'online Game', 'the best website for gamers', 'mohamad nosrati', '2022-11-07 10:15:43'),
(6, 'Game world', 'Online Game', 'The Best Website For  Gamers', 'Mohmad Nosrati', '2022-11-07 10:16:44');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `class` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `class`, `color`, `title`, `description`, `createdAt`) VALUES
(12, 'fa fa-home', 'text-warning', 'Lorem Ipsum', 'Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi', '2022-11-17 13:15:52'),
(13, 'fa fa-address-card', 'text-primary', 'Sed ut perspiciatis', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur', '2022-11-17 13:16:32'),
(14, 'fa fa-gear', 'text-success', 'Nemo Enim', 'Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', '2022-11-17 13:17:18'),
(15, 'fa fa-fire', 'text-info', 'Eiusmod Tempor', 'Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi', '2022-11-17 13:17:49'),
(17, 'fa fa-search', 'text-dark', 'Magni Dolore', 'Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi', '2022-11-17 13:19:00'),
(18, 'fa fa-tv', 'text-danger', 'Dolor Sitema', 'Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata', '2022-11-17 13:20:26');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `alt` varchar(255) NOT NULL,
  `publish` tinyint(1) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `image`, `alt`, `publish`, `createdAt`) VALUES
(25, '893ebe8042ea2b7e3d8f4a543e6f6ccb10.jpg', 'creed', 0, '2022-10-31 23:14:50'),
(27, 'dbf79cf83bcff170e21b261ce26a20d11.jpg', 'god of war', 1, '2022-11-02 00:25:37'),
(28, '17f765c0965bcc1a66aac7057fd2ad1a3.jpg', 'need for speed', 1, '2022-11-02 00:26:43');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `alt` varchar(255) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `job` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `class` varchar(255) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `image`, `alt`, `fullName`, `job`, `description`, `class`, `createdAt`) VALUES
(8, 'a1533c6e685cff37daee3ddf6236c44eteam-2.jpg', 'sara black', 'sara black', 'Chief Executive Officer', 'This is the third item&#39;s accordion body. It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each.', 'fa fa-telegram', '2022-11-17 16:25:02'),
(9, '016a12dccca3704eece787ad9a5a19afteam-3.jpg', 'john white', 'john white', 'Chief Executive Officer', 'This is the third item&#39;s accordion body. It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element.', 'fa fa-whatsapp', '2022-11-17 16:25:52'),
(10, 'dfa4135dd4e52827d523f72682ca4e8bteam-4.jpg', 'katerin', 'katerin lopez', 'ceo & founder', 'This is the third item&#39;s accordion body. It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each.', 'fa fa-instagram', '2022-11-17 16:27:41');

-- --------------------------------------------------------

--
-- Table structure for table `title`
--

CREATE TABLE `title` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `title`
--

INSERT INTO `title` (`id`, `title`, `description`, `createdAt`) VALUES
(3, 'services', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '2022-11-18 15:34:35'),
(5, 'contact', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '2022-11-18 16:16:56'),
(6, 'categories', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '2022-11-18 16:17:04'),
(7, 'f.a.q', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '2022-11-18 16:17:08'),
(8, 'products', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '2022-11-18 16:17:14'),
(9, 'Category Products', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '2022-11-18 16:38:24'),
(16, 'team', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit', '2022-11-18 21:30:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panel`
--
ALTER TABLE `panel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `part` (`part`),
  ADD UNIQUE KEY `question` (`question`) USING HASH;

--
-- Indexes for table `seo`
--
ALTER TABLE `seo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `class` (`class`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `title`
--
ALTER TABLE `title`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth`
--
ALTER TABLE `auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `panel`
--
ALTER TABLE `panel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `seo`
--
ALTER TABLE `seo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `title`
--
ALTER TABLE `title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
