-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-07-04 13:50:17
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
-- 表的结构 `mz_banner`
--

CREATE TABLE `mz_banner` (
  `id` int(11) UNSIGNED NOT NULL,
  `image` char(32) NOT NULL,
  `src` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(8, 2, '1234567', 21345, 0, '', '', 0, '0', 1499173798, 1499173798, NULL);

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
  `phone` int(11) DEFAULT NULL,
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
(1, 'xiaoming', NULL, 'e10adc3949ba59abbe56e057f20f883e', 'qq@qq.com', NULL, 0, 0, NULL, 0, '0', 0, NULL, NULL, NULL),
(4, 'qwer12', NULL, 'cc5d89e35ce391f5265d26a247544c09', 'q@qq.com', NULL, 0, 0, NULL, 0, '0', 0, 1499133294, 1499133294, NULL);

--
-- Indexes for dumped tables
--

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
-- 使用表AUTO_INCREMENT `mz_banner`
--
ALTER TABLE `mz_banner`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- 使用表AUTO_INCREMENT `mz_goods`
--
ALTER TABLE `mz_goods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- 使用表AUTO_INCREMENT `mz_type`
--
ALTER TABLE `mz_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- 使用表AUTO_INCREMENT `mz_user`
--
ALTER TABLE `mz_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
