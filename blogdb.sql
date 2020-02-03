-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2020 at 11:09 AM
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
-- Database: `blogdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `tags_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `visitors_count` int(11) NOT NULL,
  `isActive` varchar(6) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `title`, `description`, `image`, `tags_id`, `user_id`, `visitors_count`, `isActive`, `date_added`) VALUES
(30, 'title 2 ', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.\r\n                     The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here,\r\n                      content here\', making it look like readable English. ', '2020426256.jpg', 3, 40, 36, 'active', '2020-02-03 09:21:36'),
(31, 'title 3 ', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.\r\n                     The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here,\r\n                      content here\', making it look like readable English. ', '1654658245.jpg', 3, 40, 14, '', '2020-02-03 09:56:25'),
(32, 'title 4 ', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.\r\n                     The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here,\r\n                      content here\', making it look like readable English. \r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.\r\n                     The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here,\r\n                      content here\', making it look like readable English. \r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.\r\n                     The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here,\r\n                      content here\', making it look like readable English. \r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.\r\n                     The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here,\r\n                      content here\', making it look like readable English. \r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.\r\n                     The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here,\r\n                      content here\', making it look like readable English. \r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.\r\n                     The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here,\r\n                      content here\', making it look like readable English. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.\r\n                     The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here,\r\n                      content here\', making it look like readable English. ', '141942367.jpg', 7, 40, 3, '', '2020-02-02 15:01:36'),
(33, 'lorem ipsum ', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. \r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. \r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. \r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. \r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. \r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. ', '2001453644.jpg', 6, 40, 3, '', '2020-02-02 09:15:25'),
(34, 'title5', 'I have a form on my web-site where one can attach his (her) photo by the end of it and then click SEND button below. If one uses a regular PC (say, notebook) then everything if fine. But, unfortunately, nowadays most people use smartphones and then there’s a problem. Housewives have no idea what is a file size and they have no clue how to lessen it in a Photo Editor app. Not like they even care… They just buy new phones with 12-15 megapixel built-in cameras and shoot. If one uses his (her) Android smartphone to send that online form and attaches a photo of, say, 3,5 MB in size, then everything is okay. But if a photo, say, 5,2 MB then there’s an Android error message (with an Android “robot” in it) ERR_FAIL or something like that. I contacted my mobile career and they said that they don’t have any particular limitation on file size to be sent. Also the phone (it’s Philips) reps told me that the phone itself doesn’t have such limits. Then it must be an Android issue or… of mobile Android browsers. As per iOS (Apple)… I frankly don’t know… I personally don’t have such a phone and not many people in our country use them (probably too expensive???)…', '1480729307.png', 5, 40, 3, '', '2020-02-02 08:11:25'),
(35, 'lorem ipsum ', 'Where does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '127837547.jpg', 2, 40, 12, '', '2020-02-03 09:24:39'),
(36, 'tuitle', 'bvnm', '283748094.png', 6, 44, 1, '', '2020-02-02 15:00:22');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `user_id`, `article_id`, `date_added`) VALUES
(9, '12344', 43, 30, '2020-01-30 10:19:14'),
(11, 'qwert', 43, 32, '2020-01-30 10:19:55'),
(12, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-', 43, 30, '2020-01-30 10:34:43'),
(13, 'hi', 44, 32, '2020-02-02 15:01:31'),
(14, 'hi', 44, 32, '2020-02-02 15:01:36');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `label` varchar(128) NOT NULL,
  `link` varchar(256) NOT NULL,
  `views` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `label`, `link`, `views`) VALUES
(2, 'ARCHITECTURE', 'architecture', 0),
(3, 'ART &ILLUSTRATION', 'art&illustration', 0),
(4, 'BUSINESS & CORPORATE', 'business&corporate', 0),
(5, 'CULTURE & EDUCATION', 'culture&educarion', 0),
(6, 'E-COMMERCE', 'ecommerce', 0),
(7, 'DESIGN AGENCIES', 'design_agencies', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(128) NOT NULL,
  `isCheck` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `isCheck`) VALUES
(40, 'abeer', 'jaafreh', 'abeer@gmail.com', '$2y$12$mwfegztbkLr8NWpnCGdSSeVklzxeb3EkfPn1g0DTaPlk8TMUU6eHG', ''),
(42, 'qwe', 'qwe', 'ali@gmail.com', '$2y$12$Dn1Ee5C5Z1v28bCFJBkLQeMxY4w/fJS40BivKao/NQPPbPMjf53GK', ''),
(43, 'ahmad', '123', 'ahmad@gmail.com', '$2y$12$8olTpIviswmV9PKLu7gwT.PLb7oIpJ3TdSB8FNJ7f28.GWK0T25sK', ''),
(44, 'sprintive', '2020', 'sprintive@gmail.com', '$2y$12$nG12OR91pcVKYE2CAIlpq.C.izH8230mvSDIX3ZUE9JEep5q0ULhW', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `tags_id` (`tags_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_id` (`article_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `tags_id` FOREIGN KEY (`tags_id`) REFERENCES `tags` (`id`),
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
