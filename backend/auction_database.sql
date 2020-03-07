-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2019 at 12:40 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `auction`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `image`) VALUES
(100, 'Bag', 'image/category/cat100.png'),
(101, 'Dress', 'image/category/cat101.png'),
(102, 'Watch', 'image/category/cat102.png'),
(103, 'T-shirt', 'image/category/cat103.png'),
(104, 'Shoes', 'image/category/cat104.png'),
(105, 'Glass', 'image/category/cat105.png'),
(106, 'Blouse', 'image/category/cat106.png'),
(107, 'Bicycle', 'image/category/cat107.png'),
(109, 'womenBag', 'image/category/cat108.png'),
(110, 'Floor', 'image/category/1558546519IMG_20190520_1316281686748890.jpg'),
(111, 'TV', 'image/category/1558550355IMG_20190513_093120-1238972725.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `catid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `isvideo` varchar(5) NOT NULL,
  `video` varchar(200) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `price` int(11) NOT NULL,
  `lastbid` varchar(50) NOT NULL,
  `countdown` int(11) NOT NULL,
  `endtime` varchar(50) NOT NULL,
  `admincheck` varchar(10) NOT NULL,
  `usercheck` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `catid`, `name`, `image`, `isvideo`, `video`, `description`, `price`, `lastbid`, `countdown`, `endtime`, `admincheck`, `usercheck`) VALUES
(1, 100, 'My bag', 'image/product/cat_bag.jpg', 'no', '', 'this is a test', 103, 'admin', 3, '2019-05-08 01:02:02', 'check', 'check'),
(2, 101, 'Dress', 'image/product/cat_dress.jpg', 'no', '', 'this is a dress.', 500, 'admin', 2, '2019-05-07 00:00:00', 'check', ''),
(3, 101, 'My new dress', 'image/product/dress.jpg', 'no', '', 'this is a test', 122, 'anton', 11, '2019/05/08 13:12:32', 'check', ''),
(4, 100, 'bag 123', 'image/product/bag2.jpg', 'no', '', 'test', 80, 'admin', 1, '2019/05/10 18:15:37', 'check', ''),
(5, 100, 'bag 456', 'image/product/bag3.jpg', 'no', '', 'test', 170, 'anton', 0, '2019/05/15 18:17:07', 'check', ''),
(6, 100, 'bag 234', 'image/product/bag4.jpg', 'no', '', 'test', 285, 'admin', 1, '2019/05/12 18:18:04', 'check', ''),
(7, 100, 'bag 567', 'image/product/bag5.jpg', 'no', '', 'test', 570, 'anton', 0, '2019/05/09 18:18:29', 'check', ''),
(8, 100, 'bag rtb bag', 'image/product/bag7.jpg', 'no', '', 'test', 1234568, '', 9, '2019/05/18 18:19:05', 'check', 'check'),
(9, 100, 'tttt bag', 'image/product/bag8.jpg', 'no', '', 'test', 345, 'anton', 0, '2019/05/10 18:19:38', 'check', 'check'),
(10, 104, 'my shoes', 'image/product/cat_shoes.jpg', 'no', '', 'test', 345, 'anton', 0, '2019/05/15 18:24:06', 'check', ''),
(11, 104, 'my shoes1', 'image/product/shoes1.jpg', 'no', '', 'test', 50, 'wangming', 0, '2019/05/09 18:24:57', 'check', ''),
(12, 104, 'new shoes', 'image/product/shoes2.jpg', 'no', '', 'test', 150, 'wangming', 0, '2019/05/08 18:25:44', 'check', ''),
(13, 104, '121shoes', 'image/product/shoes3.jpg', 'no', '', 'test', 30, 'anton', 0, '2019/05/18 18:26:12', 'check', ''),
(14, 104, 'shoes buy', 'image/product/shoes4.jpg', 'no', '', 'test', 230, 'anton', 0, '2019/05/13 18:27:05', 'check', ''),
(15, 104, 'shoes 5', 'image/product/shoes5.jpg', 'no', '', 'test', 90, 'anton', 0, '2019/05/12 18:27:30', 'check', ''),
(16, 104, 'shoes fsd6', 'image/product/shoes6.jpg', 'no', '', 'test', 110, 'wangming', 0, '2019/05/16 18:28:03', 'check', ''),
(18, 104, 'shoes dfssdss', 'image/product/shoes8.jpg', 'no', '', 'test', 160, 'anton', 0, '2019/05/06 18:30:35', 'check', 'check'),
(20, 103, 'tshirt', 'image/product/cat_tshirt.jpg', 'no', '', 'test\r\nthis is multiline test\r\nif desription is too large\r\nit will appear scrollbar\r\nso you can test it', 150, 'wangming', 0, '2019/05/12 18:34:18', 'check', ''),
(21, 105, 'glass678', 'image/product/cat_glasses.jpg', 'no', '', 'test', 40, 'anton', 0, '2019/05/08 18:35:49', 'check', 'check'),
(22, 106, 'blouse', 'image/product/cat_blouse.jpg', 'no', '', 'test', 540, 'anton', 0, '2019/05/08 18:36:36', 'check', 'check'),
(23, 107, 'bicycle', 'image/product/cat_bicycle.jpg', 'no', '', 'test', 240, 'anton', 0, '2019/05/07 18:37:24', 'check', 'check'),
(24, 109, 'new bag', 'image/product/cat_bag.jpg', 'no', '', 'test', 230, 'anton', 0, '2019/05/07 18:38:30', 'check', 'check'),
(25, 109, 'www bag', 'image/product/bag5.jpg', 'no', '', 'test', 150, 'anton', 0, '2019/05/06 18:40:21', 'check', 'check'),
(70, 100, '', 'image/product/IMG15595023044.jpg', 'no', '', 'fdasfdasdf', 3422, 'admin', 0, '2019/06/03 21:05:04', 'check', ''),
(71, 100, '', 'image/product/IMG15595024740.jpg_split_image/product/IMG15595024741.jpg_split_image/product/IMG15595024742.jpg_split_image/product/IMG15595024743.jpg_split_image/product/IMG15595024744.jpg', 'no', '', 'ewre', 67, 'admin', 0, '2019/06/03 21:07:54', 'check', ''),
(72, 100, '', 'image/product/IMG15595025830.jpg_split_image/product/IMG15595025831.jpg_split_image/product/IMG15595025832.jpg_split_image/product/IMG15595025833.jpg_split_image/product/IMG15595025834.jpg', 'no', '', 'dasf', 675, 'admin', 0, '2019/06/03 21:09:43', 'check', ''),
(73, 100, '', 'image/product/IMG15595033360.jpg_split_image/product/IMG15595033361.jpg_split_image/product/IMG15595033362.jpg_split_image/product/IMG15595033363.jpg_split_image/product/IMG15595033364.jpg', 'no', '', 'dasfd', 567, 'admin', 0, '2019/06/03 21:22:16', 'check', ''),
(74, 100, 'fdsafdf', 'image/product/IMG15595036390.jpg_split_image/product/IMG15595036391.jpg_split_image/product/IMG15595036392.jpg_split_image/product/IMG15595036393.jpg', 'no', '', 'dsafdaasfd', 56, 'admin', 0, '2019/06/03 21:27:19', 'check', ''),
(75, 100, 'fdasfdas', 'image/product/IMG15595058740.jpg_split_image/product/IMG15595058741.jpg_split_image/product/IMG15595058742.jpg_split_image/product/IMG15595058743.jpg_split_image/product/IMG15595058744.jpg_split_image/product/IMG15595058745.jpg', 'video', '', 'dfasfd', 56, 'admin', 0, '2019/06/03 22:04:34', 'check', ''),
(76, 100, 'fdsafdaf', 'image/product/IMG15595062790.jpg_split_image/product/IMG15595062791.jpg_split_image/product/IMG15595062792.jpg_split_image/product/IMG15595062793.jpg_split_image/product/IMG15595062794.jpg_split_image/product/IMG15595062795.jpg', 'video', '', 'dasdfax', 567, 'admin', 0, '2019/06/03 22:11:19', 'check', ''),
(77, 100, 'fds', 'image/product/IMG15595069970jpg_split_image/product/IMG15595069971jpg', 'video', 'image/product/IMG15595069972mp4', 'fdsfd', 45, 'admin', 0, '2019/06/03 22:23:17', 'check', ''),
(78, 100, 'fsdsdf', 'image/product/IMG15595070440jpg_split_image/product/IMG15595070441jpg_split_image/product/IMG15595070442jpg_split_image/product/IMG15595070443jpg', 'no', '', 'fdsfdss', 123, 'admin', 0, '2019/06/03 22:24:04', 'check', ''),
(79, 100, 'dsf', 'image/product/IMG15595071960jpg_split_image/product/IMG15595071961jpg_split_image/product/IMG15595071962jpg', 'no', '', 'fdsfds', 234, 'admin', 0, '2019/06/03 22:26:36', 'check', ''),
(80, 100, 'dfssdff', 'image/product/IMG15595072810jpg', 'video', 'image/product/IMG15595072811mp4', 'dsfsds', 123, 'admin', 0, '2019/06/03 22:28:01', 'check', ''),
(81, 100, 'fdsafdf', 'image/product/IMG15595075450jpg', 'video', 'image/product/IMG15595075451mp4', 'dasdfas', 567, 'admin', 0, '2019/06/03 22:32:25', 'check', ''),
(82, 100, 'fdsa', 'image/product/IMG15595097720jpg_split_image/product/IMG15595097721jpg_split_image/product/IMG15595097722jpg_split_image/product/IMG15595097723jpg', 'video', 'image/product/IMG15595097724mp4', 'fdsafd', 56, 'admin', 0, '2019/06/03 23:09:32', 'check', ''),
(83, 100, 'fdsfsd', 'image/product/IMG15595097980jpg_split_image/product/IMG15595097981jpg', 'no', '', 'fsdfs', 67, 'admin', 0, '2019/06/03 23:09:58', 'check', ''),
(84, 100, 'df', 'image/product/IMG15595513160jpg_split_image/product/IMG15595513161jpg_split_image/product/IMG15595513162jpg', 'video', 'image/product/IMG15595513163mp4', 'fsdfs', 57, 'admin', 1, '2019/06/04 10:41:56', 'check', ''),
(85, 100, 'fdsafdsf', 'image/product/IMG15596323870jpg_split_image/product/IMG15596323871jpg', 'video', 'image/product/IMG15596323872mp4', 'dsafasfdasfdsa', 667, 'admin', 2, '2019/06/05 09:13:07', '', ''),
(86, 100, 'dsa', 'image/product/IMG15596403790jpg_split_image/product/IMG15596403791jpg_split_image/product/IMG15596403792jpg', 'video', 'image/product/IMG15596403793mp4', 'dsad', 45, 'admin', 0, '2019/06/05 11:26:19', '', ''),
(87, 100, 'fdsfd', 'image/product/IMG15596404170jpg', 'video', 'image/product/IMG15596404171mp4', 'fdsds', 67, 'admin', 0, '2019/06/05 11:26:57', '', ''),
(88, 100, 'fsfd', 'image/product/IMG15596404350jpg', 'video', 'image/product/IMG15596404351mp4', 'fdafdas', 90, 'admin', 0, '2019/06/05 11:27:15', '', ''),
(89, 100, 'fdsdfadff', 'image/product/IMG15596404680jpg', 'video', 'image/product/IMG15596404681mp4', 'dsadf', 67, 'jinzin', 0, '2019/06/05 11:27:48', '', ''),
(90, 100, 'fdsfdsaf', 'image/product/IMG15596404880jpg_split_image/product/IMG15596404881jpg', 'no', '', 'ffsfdsfdsf', 65, 'jinzin', 0, '2019/06/05 11:28:08', '', ''),
(91, 100, 'fdsffdsfd', 'image/product/IMG15596405080jpg', 'video', 'image/product/IMG15596405081mp4', 'te53treert', 89, 'jinzin', 0, '2019/06/05 11:28:28', '', ''),
(92, 100, 'gfdfgdgfdfg', 'image/product/IMG15596405280jpg', 'video', 'image/product/IMG15596405281mp4', '43243', 432, 'jinzin', 0, '2019/06/05 11:28:48', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `role` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `avatar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `name`, `mobile`, `role`, `status`, `email`, `avatar`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '(+964)1234567890', 'admin', 'use', 'admin@12err.com', 'image/profile/adminIMG_20190528_162339442939773.jpg'),
('jinzin', 'ad52f9d191db5a87b0b31121c6443d37', 'jinzin', '(+965)1234567890', 'user', 'use', 'jinzin@123.com', 'image/profile/jinzinIMG_20190513_0953211991475919.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
