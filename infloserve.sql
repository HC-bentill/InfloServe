-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2020 at 05:21 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `infloserve`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `app_date` date NOT NULL,
  `app_time` time NOT NULL,
  `message` text NOT NULL,
  `input_date` date NOT NULL,
  `input_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `name`, `phone`, `app_date`, `app_time`, `message`, `input_date`, `input_time`) VALUES
(12, 'maytabel shiamateyy', '0270985963', '2019-11-02', '14:01:00', 'noe noe noe oneoneoenoenoenonoenoenoenoneo ', '2019-11-02', '00:00:00'),
(13, 'Frederick De-Bonso', '0268307688', '2020-02-02', '16:01:00', 'none none', '2019-11-02', '00:00:00'),
(14, 'frederick frederick', '0244677174', '2019-11-02', '02:01:00', 'none ooo none', '2019-11-02', '00:00:00'),
(15, 'ojojojoj', 'jojooj', '2019-11-02', '14:01:00', 'ojojo', '2019-11-02', '00:00:00'),
(16, 'ojojojoj', 'jojooj', '2019-11-02', '14:01:00', 'ojojo', '2019-11-02', '00:00:00'),
(17, 'ojojojoj', 'jojooj', '2019-11-02', '14:01:00', 'ojojo', '2019-11-02', '13:17:23');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `category`) VALUES
(20, 'Canopies'),
(22, 'Chairs'),
(23, 'Tables'),
(24, 'gallery'),
(25, 'Table Cloths'),
(26, 'Table Napkins'),
(27, 'Table runner'),
(28, 'Napkin holders'),
(29, 'Champagne wall'),
(30, 'Wine wall'),
(31, 'Backdrops'),
(32, 'Plates'),
(33, 'Under plates'),
(34, 'Cutlery set '),
(35, 'Flower vase '),
(36, 'Lighting '),
(37, 'Fireworks '),
(38, 'Green grass carpet'),
(39, 'Red carpet '),
(40, 'Aisle runners');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `com_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `comment_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `title` int(11) NOT NULL,
  `media` varchar(255) NOT NULL,
  `date_posted` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `media`, `date_posted`) VALUES
(4, 7, 'borehole-project.jpg', '2020-09-18 18:37:21');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_category`
--

CREATE TABLE `gallery_category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `title_image` varchar(255) NOT NULL,
  `date_posted` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery_category`
--

INSERT INTO `gallery_category` (`id`, `cat_name`, `title_image`, `date_posted`) VALUES
(7, 'borehole at asamankese', 'borehole-project.jpg', '2020-09-18 18:37:10');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `number` varchar(255) NOT NULL,
  `delivery_address` varchar(255) NOT NULL,
  `notes` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `order_date` date NOT NULL,
  `order_time` time NOT NULL,
  `invoice_number` varchar(255) NOT NULL,
  `status` varchar(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `post_id`, `name`, `quantity`, `number`, `delivery_address`, `notes`, `email`, `order_date`, `order_time`, `invoice_number`, `status`) VALUES
(6, 95, 'Jason ', '1', '0545816016', '', '', 'jasinto.aidoo@gmail.com', '2020-05-01', '10:10:43', 'Jas1588327843', '0');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `pages_id` int(11) NOT NULL,
  `page_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`pages_id`, `page_name`) VALUES
(20, 'sponsorships/workshops'),
(21, 'vocational training'),
(22, 'counselling'),
(23, 'career guidance'),
(24, 'replacement & recruitment initiative');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `title` varchar(200) NOT NULL,
  `post_cat` int(100) NOT NULL,
  `ref` varchar(255) NOT NULL,
  `page` int(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `description_image` varchar(255) NOT NULL,
  `event_date` varchar(255) NOT NULL,
  `time_from` varchar(255) NOT NULL,
  `time_to` varchar(255) NOT NULL,
  `main_content` text NOT NULL,
  `date_posted` datetime NOT NULL,
  `deleted` varchar(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `username`, `title`, `post_cat`, `ref`, `page`, `description`, `description_image`, `event_date`, `time_from`, `time_to`, `main_content`, `date_posted`, `deleted`) VALUES
(147, '', '', 24, '', 0, '', 'img6.JPG', '', '', '', '', '2020-09-21 09:57:23', '1'),
(148, '', '', 24, '', 0, '', 'img6.JPG', '', '', '', '', '2020-09-21 09:58:27', '0'),
(149, '', '', 24, '', 0, '', 'img32.JPG', '', '', '', '', '2020-09-21 10:11:22', '0'),
(150, '', '', 24, '', 0, '', 'img26.JPG', '', '', '', '', '2020-09-21 10:11:37', '0'),
(151, '', '', 24, '', 0, '', 'img21.JPG', '', '', '', '', '2020-09-21 10:11:59', '0'),
(152, '', 'some kinda chair', 22, '', 0, '', 'img10.JPG', '', '', '', '<div class=\"col-lg-4\">\r\n<p class=\"text-left w3-animate-right\">hihiudvbuibhubhifnbhh8ubjhu hvuubihdibh bh8bhopfbofbhfdb klhiogiojpbjophobi lkhbiogu</p>\r\n</div>', '2020-09-21 10:25:01', '1'),
(153, '', '', 22, '', 0, '', 'img23.JPG', '', '', '', '', '2020-09-21 12:15:53', '1'),
(154, '', 'another chair', 22, '', 0, '', 'img24.JPG', '', '', '', '', '2020-09-21 13:16:50', '1'),
(155, '', 'Plastic Chairs', 22, '', 0, '', 'img10.JPG', '', '', '', '', '2020-09-21 13:18:25', '0'),
(156, '', 'Banquet Chairs', 22, '', 0, '', 'img26.JPG', '', '', '', '', '2020-09-21 13:18:44', '0'),
(157, '', 'Poly Chairs', 22, '', 0, '', 'img20.JPG', '', '', '', '', '2020-09-21 13:19:09', '0'),
(158, '', 'Swivel Chairs', 22, '', 0, '', 'swivel.jpg', '', '', '', '', '2020-09-21 13:19:32', '0'),
(159, '', 'Aisel Runner', 40, '', 0, '', 'aisle_runner1.jpg', '', '', '', '', '2020-09-21 14:46:56', '0'),
(160, '', 'Backdrop', 31, '', 0, '', 'img3.JPG', '', '', '', '', '2020-09-21 14:48:08', '0'),
(161, '', 'Party Canopy', 20, '', 0, '', 'party_canopy.jpg', '', '', '', '', '2020-09-21 14:50:27', '0'),
(162, '', 'Commercial Canopy', 20, '', 0, '', 'party_canopy.jpg', '', '', '', '', '2020-09-21 14:51:40', '1'),
(163, '', 'champagne wall', 29, '', 0, '', 'champagne+wall.jpg', '', '', '', '', '2020-09-21 14:53:18', '0'),
(164, '', 'fireworks', 37, '', 0, '', 'fireworks.jpg', '', '', '', '', '2020-09-21 14:54:29', '0'),
(165, '', 'Flower Vase', 35, '', 0, '', 'img37.jpg', '', '', '', '', '2020-09-21 14:55:33', '0'),
(166, '', 'Silver Cutlery Set', 34, '', 0, '', 'cutlery.jpeg', '', '', '', '', '2020-09-21 14:58:30', '0'),
(167, '', 'Plastic Green Carpet', 38, '', 0, '', 'green-carpet.jpg', '', '', '', '', '2020-09-21 15:00:23', '0'),
(168, '', 'wedding party lights', 36, '', 0, '', 'wedding-color-lights.jpg', '', '', '', '', '2020-09-21 15:05:47', '0'),
(169, '', 'Napkin Holder', 28, '', 0, '', 'img31.JPG', '', '', '', '', '2020-09-21 15:09:03', '0'),
(170, '', 'Napkin Holder', 28, '', 0, '', 'img31.JPG', '', '', '', '', '2020-09-21 15:09:54', '1'),
(171, '', 'Plates', 32, '', 0, '', 'img13.JPG', '', '', '', '', '2020-09-21 15:11:38', '0'),
(172, '', 'Red Carpet', 39, '', 0, '', 'red-carpet.webp', '', '', '', '', '2020-09-21 15:14:55', '0'),
(173, '', 'Table Cloth', 25, '', 0, '', 'img29.JPG', '', '', '', '', '2020-09-21 15:16:09', '0'),
(174, '', 'Table Napkins', 26, '', 0, '', 'img16.JPG', '', '', '', '', '2020-09-21 15:17:16', '0'),
(175, '', 'Table Runner', 27, '', 0, '', 'table runner.jpg', '', '', '', '', '2020-09-21 15:18:45', '0'),
(176, '', 'Wedding Tables', 23, '', 0, '', 'img1.JPG', '', '', '', '', '2020-09-21 15:19:31', '0'),
(177, '', 'Under Plate', 33, '', 0, '', 'underplate.jfif', '', '', '', '', '2020-09-21 15:21:44', '0'),
(178, '', 'Wine Wall', 30, '', 0, '', 'wine wall.jpg', '', '', '', '', '2020-09-21 15:22:50', '0'),
(179, '', '', 24, '', 0, '', 'img29.JPG', '', '', '', '', '2020-09-21 16:47:05', '1'),
(180, '', '', 24, '', 0, '', 'img3.JPG', '', '', '', '', '2020-09-21 16:47:45', '0'),
(181, '', '', 24, '', 0, '', 'img5.JPG', '', '', '', '', '2020-09-21 16:49:05', '1'),
(182, '', '', 24, '', 0, '', 'img13.JPG', '', '', '', '', '2020-09-21 16:49:57', '1'),
(183, '', '', 24, '', 0, '', 'img14.JPG', '', '', '', '', '2020-09-21 16:50:12', '1'),
(184, '', '', 24, '', 0, '', 'img10.JPG', '', '', '', '', '2020-09-21 16:53:20', '1'),
(185, '', '', 24, '', 0, '', 'img17.JPG', '', '', '', '', '2020-09-21 16:54:00', '0'),
(186, '', '', 24, '', 0, '', 'img32.JPG', '', '', '', '', '2020-09-21 16:54:22', '1'),
(187, '', '', 24, '', 0, '', 'napkin holder.jpg', '', '', '', '', '2020-09-21 16:54:52', '1'),
(188, '', '', 24, '', 0, '', 'img22.JPG', '', '', '', '', '2020-09-21 16:55:15', '0'),
(189, '', '', 24, '', 0, '', 'img1.JPG', '', '', '', '', '2020-09-21 16:56:57', '1'),
(190, '', '', 24, '', 0, '', '20200227142023_IMG_5841.jpg', '', '', '', '', '2020-09-21 17:47:55', '0'),
(191, '', '', 24, '', 0, '', '20200227141442_IMG_5830.jpg', '', '', '', '', '2020-09-21 17:48:14', '1'),
(192, '', '', 24, '', 0, '', 'IMG_5635.jpg', '', '', '', '', '2020-09-21 17:49:01', '0'),
(193, '', '', 24, '', 0, '', 'IMG_5650.jpg', '', '', '', '', '2020-09-21 17:49:24', '0'),
(194, '', '', 24, '', 0, '', 'IMG_5651.jpg', '', '', '', '', '2020-09-21 17:49:47', '0'),
(195, '', '', 24, '', 0, '', 'IMG_5652.jpg', '', '', '', '', '2020-09-21 17:50:02', '0'),
(196, '', '', 24, '', 0, '', 'IMG_5653.jpg', '', '', '', '', '2020-09-21 17:50:18', '0'),
(197, '', '', 24, '', 0, '', 'IMG_5654.jpg', '', '', '', '', '2020-09-21 17:50:28', '1'),
(198, '', '', 24, '', 0, '', 'IMG_5658.jpg', '', '', '', '', '2020-09-21 17:50:38', '0'),
(199, '', '', 24, '', 0, '', 'IMG_5668.JPG', '', '', '', '', '2020-09-21 17:51:37', '0'),
(200, '', '', 24, '', 0, '', 'IMG_5669.JPG', '', '', '', '', '2020-09-22 09:15:07', '0'),
(201, '', '', 24, '', 0, '', 'IMG_5683.jpg', '', '', '', '', '2020-09-22 09:15:26', '0'),
(202, '', '', 24, '', 0, '', 'IMG_5737 (1).jpg', '', '', '', '', '2020-09-22 09:15:48', '0'),
(203, '', '', 24, '', 0, '', 'IMG_5737 (1).jpg', '', '', '', '', '2020-09-22 09:16:06', '1'),
(204, '', '', 24, '', 0, '', 'IMG_5737 (1).jpg', '', '', '', '', '2020-09-22 09:16:20', '1'),
(205, '', '', 24, '', 0, '', 'IMG_5913.JPG', '', '', '', '', '2020-09-22 09:17:19', '0'),
(206, '', '', 24, '', 0, '', 'IMG_5927.JPG', '', '', '', '', '2020-09-22 09:17:35', '0'),
(207, '', '', 24, '', 0, '', 'IMG_5936.JPG', '', '', '', '', '2020-09-22 09:17:57', '0'),
(208, '', '', 24, '', 0, '', 'IMG_7295.JPG', '', '', '', '', '2020-09-22 09:18:10', '0'),
(209, '', '', 24, '', 0, '', 'IMG-20200320-WA0015.jpg', '', '', '', '', '2020-09-22 09:18:28', '1'),
(210, '', '', 24, '', 0, '', 'Infloservevents.jpg', '', '', '', '', '2020-09-22 09:18:38', '1'),
(211, '', 'Long Tables', 23, '', 0, '', 'IMG_5659.jpg', '', '', '', '', '2020-09-22 12:33:45', '0');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `user_name`, `user_pass`, `user_date`, `role`) VALUES
(8, 'admin', 'admin', 'admin', 'a3175a452c7a8fea80c62a198a40f6c9', '2020-08-06 10:25:34', 'Admin'),
(9, '', '', 'useruser', 'a1e017fca1e78b81ea0c4f56d3614e5c', '2020-08-26 13:12:04', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_category`
--
ALTER TABLE `gallery_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`pages_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gallery_category`
--
ALTER TABLE `gallery_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `pages_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
