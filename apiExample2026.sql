-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 09, 2026 at 11:10 AM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apiExample2026`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `userId` int(11) NOT NULL,
  `postId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `comment`, `userId`, `postId`) VALUES
(1, 'My first comment', 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `content` text NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `userId`) VALUES
(1, 'This is the first post', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pellentesque neque tincidunt, sagittis magna at, laoreet metus. Praesent pretium facilisis ultrices. Sed volutpat quis dui sit amet scelerisque. Etiam ut sem mi. Sed non quam et ante iaculis aliquam. Donec feugiat mattis lacus, quis pretium tortor tincidunt sit amet. Etiam dignissim velit porta mauris luctus auctor. Aliquam mollis ex nec ex mattis, eget tempor purus ultricies. Etiam molestie nisi eu felis placerat, id iaculis urna gravida. Sed eu elit ex. Etiam at nisi magna. Morbi ut elementum nulla. Praesent pretium blandit urna sed malesuada.\r\n\r\nVivamus consequat ex eget quam varius, vitae pellentesque diam tincidunt. Pellentesque enim tortor, tristique varius lectus et, commodo convallis lorem. Nulla aliquet rhoncus ex, at vestibulum massa volutpat vel. Nulla id nibh maximus, porttitor massa vitae, lacinia mi. Morbi tincidunt, dolor sed hendrerit molestie, tellus libero facilisis ex, ac vehicula justo lectus in lectus. Sed eros neque, vehicula ac odio eu, congue condimentum nisl. Proin faucibus ante at tellus aliquet mollis vel eu lectus. Donec sit amet consequat metus, ut sagittis metus. Morbi mattis mi nec tempor interdum. Donec vulputate est elit, vitae molestie dolor tincidunt ac. Maecenas at imperdiet ipsum. Nulla quis augue augue. Donec non laoreet nulla, quis pharetra tellus. Maecenas dictum turpis at nulla aliquet ullamcorper.\r\n\r\nSuspendisse congue elit est, ut tempor sem lacinia non. Pellentesque imperdiet blandit nisl eu pellentesque. Vestibulum condimentum posuere elit quis mollis. Donec nec hendrerit sem, in lobortis magna. Duis id eros eu ipsum tincidunt volutpat non non diam. Nam ut aliquam leo. Aenean suscipit tristique viverra. Praesent vel dapibus massa, porta gravida arcu. In tempus aliquam tortor et lobortis. Fusce consectetur velit eu erat viverra, a vestibulum sem feugiat.\r\n\r\nVivamus pulvinar eget orci nec hendrerit. Mauris eu urna malesuada, facilisis libero sit amet, interdum enim. Donec risus augue, egestas scelerisque tortor sit amet, efficitur posuere lacus. Nunc gravida facilisis mi. Fusce semper risus leo, vel porta ante rutrum consequat. Praesent consequat magna nec mattis molestie. Pellentesque varius ultrices nunc vestibulum mollis. Nullam diam arcu, euismod id ante ut, ultricies pharetra orci.\r\n\r\nSed a erat nec leo lobortis mollis sed non elit. Aenean scelerisque dignissim nunc ac iaculis. Integer eu condimentum lacus. Aenean at est purus. Nullam risus nisl, porta vel felis eu, fringilla posuere quam. Maecenas rutrum libero sed diam fringilla, id interdum quam eleifend. Aliquam eu ante consequat nunc efficitur pellentesque lacinia vel velit.', 1),
(2, 'Test Post', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pellentesque neque tincidunt, sagittis magna at, laoreet metus. Praesent pretium facilisis ultrices. Sed volutpat quis dui sit amet scelerisque. Etiam ut sem mi. Sed non quam et ante iaculis aliquam. Donec feugiat mattis lacus, quis pretium tortor tincidunt sit amet. Etiam dignissim velit porta mauris luctus auctor. Aliquam mollis ex nec ex mattis, eget tempor purus ultricies. Etiam molestie nisi eu felis placerat, id iaculis urna gravida. Sed eu elit ex. Etiam at nisi magna. Morbi ut elementum nulla. Praesent pretium blandit urna sed malesuada.\r\n\r\nVivamus consequat ex eget quam varius, vitae pellentesque diam tincidunt. Pellentesque enim tortor, tristique varius lectus et, commodo convallis lorem. Nulla aliquet rhoncus ex, at vestibulum massa volutpat vel. Nulla id nibh maximus, porttitor massa vitae, lacinia mi. Morbi tincidunt, dolor sed hendrerit molestie, tellus libero facilisis ex, ac vehicula justo lectus in lectus. Sed eros neque, vehicula ac odio eu, congue condimentum nisl. Proin faucibus ante at tellus aliquet mollis vel eu lectus. Donec sit amet consequat metus, ut sagittis metus. Morbi mattis mi nec tempor interdum. Donec vulputate est elit, vitae molestie dolor tincidunt ac. Maecenas at imperdiet ipsum. Nulla quis augue augue. Donec non laoreet nulla, quis pharetra tellus. Maecenas dictum turpis at nulla aliquet ullamcorper.\r\n\r\nSuspendisse congue elit est, ut tempor sem lacinia non. Pellentesque imperdiet blandit nisl eu pellentesque. Vestibulum condimentum posuere elit quis mollis. Donec nec hendrerit sem, in lobortis magna. Duis id eros eu ipsum tincidunt volutpat non non diam. Nam ut aliquam leo. Aenean suscipit tristique viverra. Praesent vel dapibus massa, porta gravida arcu. In tempus aliquam tortor et lobortis. Fusce consectetur velit eu erat viverra, a vestibulum sem feugiat.\r\n\r\nVivamus pulvinar eget orci nec hendrerit. Mauris eu urna malesuada, facilisis libero sit amet, interdum enim. Donec risus augue, egestas scelerisque tortor sit amet, efficitur posuere lacus. Nunc gravida facilisis mi. Fusce semper risus leo, vel porta ante rutrum consequat. Praesent consequat magna nec mattis molestie. Pellentesque varius ultrices nunc vestibulum mollis. Nullam diam arcu, euismod id ante ut, ultricies pharetra orci.\r\n\r\nSed a erat nec leo lobortis mollis sed non elit. Aenean scelerisque dignissim nunc ac iaculis. Integer eu condimentum lacus. Aenean at est purus. Nullam risus nisl, porta vel felis eu, fringilla posuere quam. Maecenas rutrum libero sed diam fringilla, id interdum quam eleifend. Aliquam eu ante consequat nunc efficitur pellentesque lacinia vel velit.', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `firstName` varchar(15) NOT NULL,
  `lastName` varchar(15) NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `firstName`, `lastName`, `age`) VALUES
(1, 'Matt', 'Matthew', 'Cumbo', 34),
(2, 'joeborg', 'Joe', 'Borg', 99);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `postId` (`postId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`postId`) REFERENCES `post` (`id`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `user` (`id`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
