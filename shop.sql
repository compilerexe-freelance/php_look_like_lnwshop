-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 15, 2016 at 03:22 PM
-- Server version: 5.7.15-log
-- PHP Version: 5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_formpayment`
--

CREATE TABLE `tb_formpayment` (
  `id` int(11) NOT NULL,
  `number_order` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `hour` varchar(255) DEFAULT NULL,
  `minute` varchar(255) DEFAULT NULL,
  `payment_date` varchar(255) DEFAULT NULL,
  `bank` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_formpayment`
--

INSERT INTO `tb_formpayment` (`id`, `number_order`, `price`, `picture`, `hour`, `minute`, `payment_date`, `bank`) VALUES
(1, '7876617', '1000', '6238830.jpg', '00', '01', '2016-10-14', 'ธ.ไทยพาณิชย์'),
(2, '8550903', '2000', '5111083.jpg', '02', '03', '2016-10-14', 'ธ.ไทยพาณิชย์');

-- --------------------------------------------------------

--
-- Table structure for table `tb_infobank`
--

CREATE TABLE `tb_infobank` (
  `id` int(11) NOT NULL,
  `title_bank` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `number_bank` varchar(255) DEFAULT NULL,
  `brach_bank` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_infobank`
--

INSERT INTO `tb_infobank` (`id`, `title_bank`, `name`, `number_bank`, `brach_bank`, `tel`) VALUES
(1, 'ธ.ไทยพาณิชย์', 'ร้านสะอาดเซอร์วิส นางกนิษฐา วัฒนสมบูรณ์ชัย', '982-0-91974-6', 'เทสโก้โลตัส พิษณุโลก ท่าทอง', '081-5966852');

-- --------------------------------------------------------

--
-- Table structure for table `tb_item`
--

CREATE TABLE `tb_item` (
  `id` int(11) NOT NULL,
  `code_item` varchar(255) DEFAULT NULL,
  `title_item` varchar(255) DEFAULT NULL,
  `detail_item` varchar(255) DEFAULT NULL,
  `price_item` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_item`
--

INSERT INTO `tb_item` (`id`, `code_item`, `title_item`, `detail_item`, `price_item`, `picture`, `created_at`) VALUES
(1, '0001', 'เเบริ้งชาล์ฟ', '<p>001 ...</p>', '1180', '6806274.jpg', '2016-10-06 04:57:14'),
(2, '0002', 'เซพตี้วาวล์', '<p>002 ...</p>', '800', '1859954.jpg', '2016-10-06 04:59:51'),
(3, '0003', 'เฟืองเกียร์3', '...', '3960', '3965209.jpg', '2016-10-06 05:00:23'),
(4, '0004', 'เฟืองดอกจอกเล็ก', '...', '3050', '1911041.jpg', '2016-10-06 05:00:45'),
(5, '0005', 'เม็ดลูกปืนเฟืองทด', '...', '280', '9474304.jpg', '2016-10-08 04:38:32'),
(6, '0006', 'แกนต่อพวงมาลัย', '...', '405', '5461273.jpg', '2016-10-08 04:42:52');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `id` int(11) NOT NULL,
  `number_order` varchar(255) DEFAULT NULL,
  `code_item` varchar(255) DEFAULT NULL,
  `title_item` varchar(255) DEFAULT NULL,
  `count_order` varchar(255) DEFAULT NULL,
  `price_order` varchar(255) DEFAULT NULL,
  `option_send` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`id`, `number_order`, `code_item`, `title_item`, `count_order`, `price_order`, `option_send`, `created_at`) VALUES
(1, '8550903', '0001', 'เเบริ้งชาล์ฟ', '1', '1180', 0, '2016-10-14 04:22:29'),
(2, '7876617', '0001', 'เเบริ้งชาล์ฟ', '1', '1180', 0, '2016-10-14 04:23:03'),
(3, '7876617', '0002', 'เซพตี้วาวล์', '1', '800', 0, '2016-10-14 04:23:03');

-- --------------------------------------------------------

--
-- Table structure for table `tb_payment`
--

CREATE TABLE `tb_payment` (
  `id` int(11) NOT NULL,
  `number_order` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_payment`
--

INSERT INTO `tb_payment` (`id`, `number_order`, `status`) VALUES
(1, '8550903', 1),
(2, '7876617', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_person`
--

CREATE TABLE `tb_person` (
  `id` int(11) NOT NULL,
  `number_order` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `sub_district` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `postal_code` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_person`
--

INSERT INTO `tb_person` (`id`, `number_order`, `name`, `address`, `sub_district`, `district`, `province`, `postal_code`, `tel`, `email`, `created_at`) VALUES
(1, '8550903', 'a', 'a', 'a', 'a', 'a', 'a', 'a', 'a@a.com', '2016-10-14 04:22:29'),
(2, '7876617', 'b', 'b', 'b', 'b', 'b', 'b', 'b', 'b', '2016-10-14 04:23:03');

-- --------------------------------------------------------

--
-- Table structure for table `tb_reply`
--

CREATE TABLE `tb_reply` (
  `id` int(11) NOT NULL,
  `topic_id` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `detail` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_reply`
--

INSERT INTO `tb_reply` (`id`, `topic_id`, `name`, `email`, `detail`, `created_at`) VALUES
(1, '1', 'abc', 'abc@gmail.com', '<p>reply 1</p>', '2016-10-15'),
(2, '2', 'abcd', 'abcd@gmail.com', '<p>reply test 2 ...</p>', '2016-10-15'),
(3, '1', 'admin', '', '<p>admin</p>', '2016-10-15'),
(4, '2', 'admin', '', '<p>hello test 2</p>', '2016-10-15'),
(5, '3', 'user', 'user@gmail.com', '<p>What your name ?</p>', '2016-10-15'),
(7, '3', 'admin', '', '<p>i\'m admin</p>', '2016-10-15'),
(8, '4', 'user', 'user@gmail.com', '<p>Hello World</p>', '2016-10-15'),
(9, '4', 'admin', '', '<p>Hi</p>', '2016-10-15'),
(10, '7', 'a', 'a', '<p>66</p>', '2016-10-15'),
(11, '7', 'admin', '', '<p>666</p>', '2016-10-15');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`) VALUES
(2, 'admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `tb_webboard`
--

CREATE TABLE `tb_webboard` (
  `id` int(11) NOT NULL,
  `topic` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `detail` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_webboard`
--

INSERT INTO `tb_webboard` (`id`, `topic`, `name`, `email`, `detail`, `picture`, `created_at`) VALUES
(1, 'test1', 'admin', '', '<p>test 1 ...</p>', NULL, '2016-10-09'),
(2, 'test 2', 'admin', 'admin@gmail.com', '<p>...</p>', NULL, '2016-10-15'),
(3, 'test 3', 'admin', 'admin@gmail.com', '<p>...</p>', '6469268.jpg', '2016-10-15'),
(4, 'test 4', 'admin', 'admin@gmail.com', '<p>...</p>', '', '2016-10-15'),
(5, 'test 5', 'admin', 'admin@gmail.com', '<p>...</p>', '', '2016-10-15'),
(7, 'test 6', 'admin', '', '<p>test 6 ...</p>', '8993652.jpg', '2016-10-15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_formpayment`
--
ALTER TABLE `tb_formpayment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_infobank`
--
ALTER TABLE `tb_infobank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_item`
--
ALTER TABLE `tb_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_payment`
--
ALTER TABLE `tb_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_person`
--
ALTER TABLE `tb_person`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_reply`
--
ALTER TABLE `tb_reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_webboard`
--
ALTER TABLE `tb_webboard`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_formpayment`
--
ALTER TABLE `tb_formpayment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_infobank`
--
ALTER TABLE `tb_infobank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_item`
--
ALTER TABLE `tb_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_payment`
--
ALTER TABLE `tb_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_person`
--
ALTER TABLE `tb_person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_reply`
--
ALTER TABLE `tb_reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_webboard`
--
ALTER TABLE `tb_webboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
