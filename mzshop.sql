-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-07-05 13:39:54
-- 服务器版本： 5.7.11
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mzshop`
--

-- --------------------------------------------------------

--
-- 表的结构 `mz_address`
--

CREATE TABLE `mz_address` (
  `id` int(11) NOT NULL,
  `person` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `location` varchar(500) NOT NULL,
  `first` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mz_address`
--

INSERT INTO `mz_address` (`id`, `person`, `phone`, `location`, `first`) VALUES
(1, '小明', '1378888888', '福建省泉州市惠安县', 1),
(2, '小李', '1378880188', '深圳珠海魅族', 0),
(3, '小李', '1378880188', '深圳珠海魅族', 0),
(4, '小李', '1378880188', '深圳珠海魅族', 0),
(5, '小明', '1378888888', '福建省泉州市惠安县', 1),
(6, '小明', '1378888888', '福建省泉州市惠安县', 1);

-- --------------------------------------------------------

--
-- 表的结构 `mz_banner`
--

CREATE TABLE `mz_banner` (
  `id` int(11) UNSIGNED NOT NULL,
  `image` char(32) NOT NULL,
  `src` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mz_banner`
--

INSERT INTO `mz_banner` (`id`, `image`, `src`, `status`) VALUES
(1, 'banner1', '/static/shop/resource/images/entry/l1.jpg', 0),
(2, 'banner2', '/static/shop/resource/images/entry/l2.jpg', 0),
(3, 'banner3', '/static/shop/resource/images/entry/l3.png', 0),
(4, 'banner4', '/static/shop/resource/images/entry/l4.jpg', 0);

-- --------------------------------------------------------

--
-- 表的结构 `mz_goods`
--

CREATE TABLE `mz_goods` (
  `id` int(10) UNSIGNED NOT NULL,
  `pid` int(11) NOT NULL,
  `gname` varchar(32) NOT NULL,
  `price` double(32,0) NOT NULL,
  `num` int(11) NOT NULL,
  `describe` text,
  `pic` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `hot` enum('0','1','2','3','4','5') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `delete_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mz_goods`
--

INSERT INTO `mz_goods` (`id`, `pid`, `gname`, `price`, `num`, `describe`, `pic`, `status`, `hot`, `create_time`, `update_time`, `delete_time`) VALUES
(1, 1, '魅蓝note5', 999, 10, '魅蓝note5', '/logo.png', 1, '2', NULL, NULL, NULL),
(2, 1, '魅蓝note6', 999, 10, '魅蓝note5', '/logo.png', 0, '2', NULL, NULL, NULL),
(3, 1, '魅蓝note6', 999, 10, '魅蓝note5', '/logo.png', 0, '2', NULL, NULL, NULL),
(9, 1, '234567', 888, 88, 'tyuighj', '', 1, '0', 1499175625, 1499175625, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `mz_type`
--

CREATE TABLE `mz_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `pid` int(11) NOT NULL DEFAULT '0',
  `tname` varchar(32) NOT NULL,
  `isdel` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mz_type`
--

INSERT INTO `mz_type` (`id`, `pid`, `tname`, `isdel`) VALUES
(1, 0, '手机', 0),
(2, 0, '智能硬件', 0),
(3, 0, '精美配件', 0),
(4, 0, '手机周边', 0),
(5, 0, '周边配件', 0),
(6, 1, '魅蓝note5', 0),
(10, 2, '乐范魔力贴 运动版', 0);

-- --------------------------------------------------------

--
-- 表的结构 `mz_user`
--

CREATE TABLE `mz_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `sex` int(11) DEFAULT NULL,
  `password` char(32) NOT NULL,
  `email` varchar(60) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `type` int(11) DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `photo` varchar(255) DEFAULT NULL,
  `score` int(11) NOT NULL DEFAULT '0',
  `grade` varchar(50) DEFAULT '0',
  `isdel` int(11) NOT NULL DEFAULT '0',
  `create_time` int(20) DEFAULT NULL,
  `update_time` int(20) DEFAULT NULL,
  `delete_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mz_user`
--

INSERT INTO `mz_user` (`id`, `username`, `sex`, `password`, `email`, `phone`, `type`, `status`, `photo`, `score`, `grade`, `isdel`, `create_time`, `update_time`, `delete_time`) VALUES
(1, 'xiaoming', NULL, 'e10adc3949ba59abbe56e057f20f883e', 'qq@qq.com', NULL, 1, 0, NULL, 0, '0', 0, NULL, NULL, NULL),
(2, 'qwer12', NULL, 'cc5d89e35ce391f5265d26a247544c09', 'q@qq.com', NULL, 0, 0, NULL, 0, '0', 0, 1499133294, 1499133294, NULL),
(3, 'xiaohong', NULL, 'e99a18c428cb38d5f260853678922e03', 'qq@qq.com', NULL, 0, 0, NULL, 0, '0', 0, 1499217022, 1499217022, NULL),
(6, 'xiaohong', NULL, 'e99a18c428cb38d5f260853678922e03', 'qq@qq.com', NULL, 0, 0, NULL, 0, '0', 0, 1499217022, 1499217022, NULL),
(7, 'xiaohong', NULL, 'e99a18c428cb38d5f260853678922e03', 'qq@qq.com', NULL, 0, 0, NULL, 0, '0', 0, 1499217022, 1499217022, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `mz_usertoadd`
--

CREATE TABLE `mz_usertoadd` (
  `user_id` int(11) DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mz_address`
--
ALTER TABLE `mz_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mz_banner`
--
ALTER TABLE `mz_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mz_goods`
--
ALTER TABLE `mz_goods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mz_type`
--
ALTER TABLE `mz_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mz_user`
--
ALTER TABLE `mz_user`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `mz_address`
--
ALTER TABLE `mz_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `mz_banner`
--
ALTER TABLE `mz_banner`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `mz_goods`
--
ALTER TABLE `mz_goods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- 使用表AUTO_INCREMENT `mz_type`
--
ALTER TABLE `mz_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- 使用表AUTO_INCREMENT `mz_user`
--
ALTER TABLE `mz_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
