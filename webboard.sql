-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2020 at 03:27 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comm_id` int(11) NOT NULL,
  `comm_detail` text NOT NULL,
  `comm_date` datetime NOT NULL,
  `topic_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `commup_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comm_id`, `comm_detail`, `comm_date`, `topic_id`, `user_id`, `commup_date`) VALUES
(1, '<p>Generated 10 paragraphs, 918 words, 6126 bytes of&nbsp;<a title=\"Lorem Ipsum\" href=\"https://www.lipsum.com/\">Lorem Ipsum</a></p>', '2020-09-13 02:15:42', 1, 12, NULL),
(2, '<h4>\"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...\"</h4>\r\n<h5>\"There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain...\"</h5>', '2020-09-13 02:17:48', 1, 12, '2020-09-13 13:19:30'),
(4, '<p>test update topic table</p>', '2020-09-13 10:33:32', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `topic_id` int(11) NOT NULL,
  `topic_name` varchar(255) NOT NULL,
  `topic_detail` text NOT NULL,
  `topic_date` datetime NOT NULL,
  `update_date` datetime DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `reply_id` int(11) DEFAULT NULL,
  `reply_date` datetime DEFAULT NULL,
  `topic_view` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`topic_id`, `topic_name`, `topic_detail`, `topic_date`, `update_date`, `user_id`, `reply_id`, `reply_date`, `topic_view`) VALUES
(1, 'Lorem Ipsum', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce accumsan dui non mi scelerisque imperdiet. Vestibulum augue ex, sollicitudin vitae consectetur eget, semper nec lacus. Curabitur laoreet consequat purus. Duis efficitur nec nulla ac venenatis. Nullam a aliquet odio. Proin et est in est cursus pretium non et ex. Morbi rhoncus lectus dolor, dignissim laoreet nibh auctor quis. Nulla pulvinar id mi a sollicitudin. In a lorem ut turpis venenatis pulvinar at vel nulla. Nunc finibus sollicitudin fermentum.</p>\r\n<p>Vivamus vitae turpis at tellus tempus feugiat sit amet in metus. Vestibulum dapibus dignissim odio, at accumsan est pretium ac. Nunc ut turpis dictum, imperdiet libero ac, venenatis enim. Integer congue nunc nec lorem feugiat rhoncus. Quisque eget turpis a dolor vulputate gravida quis eget dolor. Fusce vel leo ac mi mollis rutrum non sed lorem. Fusce ac luctus eros. Sed pharetra risus vel elit aliquam, sed ultrices elit lacinia. Maecenas in magna tincidunt, ornare massa at, fermentum diam. Proin sodales fringilla sem non lobortis. Mauris auctor hendrerit fermentum. Fusce non imperdiet turpis, id tincidunt eros. Maecenas luctus sapien in orci mollis faucibus.</p>\r\n<p>Ut id orci velit. Phasellus sagittis consectetur posuere. Duis tempus, urna id vehicula feugiat, sem diam placerat ante, vitae scelerisque leo arcu vel dui. Quisque euismod fringilla sapien sit amet congue. Donec nulla est, egestas at orci et, commodo imperdiet ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Sed congue tempus massa, eget hendrerit tortor mattis nec.</p>\r\n<p>Vivamus euismod ac lacus pulvinar pharetra. Morbi a viverra ipsum. Nullam ornare dui ac odio euismod iaculis. Aliquam a tellus eu lorem sagittis mollis. Ut tristique rutrum tellus, at efficitur augue maximus a. Nunc vehicula mauris ipsum, sodales porta massa ultrices eu. Phasellus blandit mauris sed vehicula efficitur. Nunc urna velit, sollicitudin consectetur lacus ac, ullamcorper commodo nisi. Ut auctor sodales sapien maximus vulputate.</p>\r\n<p>Fusce eu purus lacus. Aliquam ac auctor odio. In auctor metus non turpis efficitur, in dapibus nisl faucibus. Etiam sed fermentum dolor, porttitor sollicitudin enim. Sed eget magna eros. Nullam luctus lacinia ipsum, nec sodales enim elementum et. Sed luctus finibus ex vitae hendrerit. Proin placerat enim turpis, quis rutrum quam sodales nec. Nam aliquam aliquam ex eu sodales. Morbi porta, ex ac pharetra lacinia, mi ante efficitur ante, vitae lacinia dui odio quis erat. Curabitur nec gravida ipsum, eu feugiat est.</p>\r\n<p>Mauris sagittis viverra lorem, malesuada tincidunt nibh consequat in. Pellentesque in blandit massa. Nunc eu porttitor felis. Nulla a libero neque. Phasellus malesuada semper sem at viverra. Praesent venenatis congue justo, at sollicitudin turpis vehicula vel. Maecenas vitae ornare sapien. Proin orci quam, imperdiet at molestie a, scelerisque sed orci. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec sodales felis ut eros rhoncus, in rhoncus erat hendrerit. Praesent vestibulum ex ornare velit feugiat aliquam. Donec tortor lacus, sagittis non nulla eget, pulvinar auctor sapien.</p>\r\n<p>Praesent aliquam egestas nisi, eget cursus velit ornare quis. Donec quis aliquam mauris. Duis sodales interdum massa ac porta. Mauris blandit nunc vitae est sagittis rutrum. Vivamus venenatis nec sapien quis imperdiet. Nulla cursus eros vel ligula venenatis gravida. Maecenas vehicula sem elit, tempus congue libero vestibulum at. Vestibulum nec accumsan felis. Nunc nec pretium lacus, sed facilisis justo. Nullam quis pellentesque lacus, at volutpat ex. Aliquam eget elit eget ex tincidunt varius. Sed ultricies, nunc sit amet maximus imperdiet, nulla sapien malesuada arcu, ut condimentum enim justo eget metus. Integer non feugiat tortor, sit amet rutrum turpis. Cras eros ipsum, interdum id odio eu, sodales hendrerit enim.</p>\r\n<p>Proin commodo dui et condimentum ullamcorper. Curabitur ac feugiat lacus. Nam at convallis turpis. Nunc scelerisque tempor tempor. Integer eu magna ullamcorper, vehicula lorem at, vulputate urna. Cras dignissim dui a lorem finibus vulputate. Aenean condimentum leo ut nisl vulputate, vel accumsan felis luctus. Maecenas lobortis aliquam velit, a lobortis augue. Praesent mauris ligula, sagittis non orci vitae, maximus auctor nulla. Quisque sodales, felis id eleifend tempus, lorem nibh blandit velit, sit amet accumsan leo odio a tortor. Sed eros lectus, fermentum ut tincidunt et, vulputate sit amet ex. Quisque quis accumsan metus, a fringilla nunc. Proin ullamcorper dapibus ligula eu sodales. Interdum et malesuada fames ac ante ipsum primis in faucibus. Fusce sed dignissim lorem, id varius massa. Etiam quis sem eget tellus blandit interdum.</p>\r\n<p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Aliquam id ipsum quis tellus facilisis aliquam. Curabitur est sem, vulputate ut leo at, viverra pulvinar sapien. Donec id interdum quam. Aliquam vulputate vel quam eget vulputate. Phasellus ante sem, semper ut dapibus in, tristique at urna. Aenean eu risus sit amet lorem efficitur imperdiet. Proin non finibus elit, sed finibus magna. Pellentesque luctus scelerisque nulla, ut consequat arcu vehicula ac. Sed accumsan leo nec velit lacinia, sed rhoncus nisl ullamcorper.</p>', '2020-09-12 23:19:00', '2020-09-13 12:22:17', 1, 1, '2020-09-13 10:33:32', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `userpass` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `cre_date` datetime NOT NULL,
  `log_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `userpass`, `firstname`, `lastname`, `cre_date`, `log_date`) VALUES
(1, 'Reprise', '123456', 'nakarin', 'kaeklang', '2020-09-12 13:13:58', '2020-09-13 14:22:23'),
(12, 'test', '123456', 'test', 'tester', '2020-09-12 13:43:11', '2020-09-13 15:59:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comm_id`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`topic_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
