-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-07-11 13:41:36
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
  `first` int(11) NOT NULL DEFAULT '0',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `delete_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mz_address`
--

INSERT INTO `mz_address` (`id`, `person`, `phone`, `location`, `first`, `create_time`, `update_time`, `delete_time`) VALUES
(1, '小明', '13788888881', '福建省泉州市惠安县', 1, NULL, 1499433545, NULL),
(2, '小李', '1378880188', '深圳珠海魅族', 0, NULL, NULL, NULL),
(3, '小李', '1378880188', '深圳珠海魅族', 1, NULL, 1499664657, NULL),
(4, '小李', '1378880188', '深圳珠海魅族', 0, NULL, NULL, NULL),
(5, '小明', '1378888888', '福建省泉州市惠安县', 1, NULL, NULL, NULL),
(6, '小明', '1378888888', '福建省泉州市惠安县', 0, NULL, 1499664558, NULL),
(7, '1234567', '21345678', '2134567', 0, 1499664558, 1499664650, 1499664650),
(8, '就萨丹哈客户', '尽快耗时间阿卡', '交换空间撒谎', 0, 1499664584, 1499664642, 1499664642),
(9, '1233', '4321', '324', 1, 1499664608, 1499664637, 1499664637);

-- --------------------------------------------------------

--
-- 表的结构 `mz_attr`
--

CREATE TABLE `mz_attr` (
  `id` int(11) NOT NULL,
  `attrs` varchar(50) DEFAULT NULL,
  `mid` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mz_attr`
--

INSERT INTO `mz_attr` (`id`, `attrs`, `mid`) VALUES
(1, '全网通4G', 1),
(2, '移动4G', 1),
(3, '联通4G', 1),
(4, '香槟金', 2),
(5, '玫瑰金', 2),
(6, '月光银', 2),
(7, '星空灰', 2),
(8, '冰川蓝', 2),
(9, '16G', 3),
(10, '32G', 3),
(11, '64G', 3),
(12, '128G', 3);

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
-- 表的结构 `mz_cart`
--

CREATE TABLE `mz_cart` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  `img` varchar(255) COLLATE utf8_croatian_ci DEFAULT NULL,
  `gname` varchar(32) COLLATE utf8_croatian_ci NOT NULL,
  `price` int(11) NOT NULL,
  `num` int(11) NOT NULL DEFAULT '1',
  `net` varchar(255) COLLATE utf8_croatian_ci NOT NULL,
  `color` varchar(255) COLLATE utf8_croatian_ci NOT NULL,
  `memoey` varchar(255) COLLATE utf8_croatian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_croatian_ci;

--
-- 转存表中的数据 `mz_cart`
--

INSERT INTO `mz_cart` (`id`, `uid`, `gid`, `img`, `gname`, `price`, `num`, `net`, `color`, `memoey`) VALUES
(17, 1, 1, '/static/shop/resource/images/entry/logo-header.png', '魅族note5', 888, 1, '全网通4G', '香槟金', '16G'),
(19, 1, 1, '/static/shop/resource/images/entry/logo-header.png', '魅族note5', 888, 0, '全网通4G', '香槟金', '16G');

-- --------------------------------------------------------

--
-- 表的结构 `mz_detail`
--

CREATE TABLE `mz_detail` (
  `id` int(11) NOT NULL,
  `goods_id` int(11) DEFAULT NULL,
  `img1` varchar(255) DEFAULT NULL,
  `img2` varchar(255) DEFAULT NULL,
  `img3` varchar(255) DEFAULT NULL,
  `img4` varchar(255) DEFAULT NULL,
  `intro` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mz_detail`
--

INSERT INTO `mz_detail` (`id`, `goods_id`, `img1`, `img2`, `img3`, `img4`, `intro`) VALUES
(1, 1, '/uploads/goods/20170710/5c32439290201150955121ceb37371b6.jpg', '/uploads/goods/20170710/109d7ddd2600bf902d0992446138fda9.jpg', '/uploads/goods/20170710/3d9d9b1bd5f4d6fa09c04646e990e68d.jpg', '/uploads/goods/20170710/dfcec8c828096793eac5cf9a87d80ef6.jpg', '魅族note5'),
(2, 2, '/uploads/goods/20170710/981ac8b15cbd2f043cd4e9a50c8f21f1.jpg', '/uploads/goods/20170710/8acba19be99fc7f4e1339fa2fb393c29.jpg', NULL, NULL, '魅族 MX6，介绍');

-- --------------------------------------------------------

--
-- 表的结构 `mz_goods`
--

CREATE TABLE `mz_goods` (
  `id` int(10) UNSIGNED NOT NULL,
  `pid` int(11) NOT NULL,
  `gname` varchar(32) NOT NULL,
  `price` double(32,0) NOT NULL,
  `num` int(11) NOT NULL DEFAULT '0',
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
(1, 1, '魅族note5', 888, 6, '魅族note5', '/uploads/goods/20170708/55e5c45fe61933a2fe471f4e1862c817.jpg', 1, '0', 1499497293, 1499760612, NULL),
(2, 1, '魅族 MX6', 1288, 1, '魅族MX6', '/uploads/goods/20170708/e0d56d0d92851bc1777d32f810513873.jpg', 1, '0', 1499497880, 1499750617, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `mz_goodtoattr`
--

CREATE TABLE `mz_goodtoattr` (
  `id` int(11) NOT NULL,
  `goods_id` int(11) DEFAULT NULL,
  `attr_id` int(11) DEFAULT NULL,
  `mid` int(11) DEFAULT NULL,
  `money` int(11) NOT NULL DEFAULT '0',
  `imie` varchar(50) DEFAULT NULL,
  `is_store` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mz_goodtoattr`
--

INSERT INTO `mz_goodtoattr` (`id`, `goods_id`, `attr_id`, `mid`, `money`, `imie`, `is_store`) VALUES
(1, 1, 1, 1, 0, NULL, 0),
(2, 1, 4, 2, 0, NULL, 0),
(3, 1, 9, 3, 0, '300010001000400090003', 0),
(4, 1, 1, 1, 0, NULL, 0),
(5, 1, 4, 2, 0, NULL, 0),
(6, 1, 9, 3, 0, '100010001000400090006', 0),
(10, 2, 1, 1, 0, NULL, 0),
(11, 2, 7, 2, 0, NULL, 0),
(12, 2, 9, 3, 0, '600020001000700090012', 0),
(13, 1, 1, 1, 0, NULL, 0),
(14, 1, 4, 2, 0, NULL, 0),
(15, 1, 10, 3, 300, '200010001000400100015', 0),
(16, 1, 2, 1, 0, NULL, 0),
(17, 1, 4, 2, 0, NULL, 0),
(18, 1, 9, 3, 0, '500010002000400090018', 0),
(19, 1, 3, 1, 0, NULL, 0),
(20, 1, 4, 2, 0, NULL, 0),
(21, 1, 12, 3, 500, '400010003000400120021', 0),
(22, 1, 1, 1, 0, NULL, 0),
(23, 1, 5, 2, 50, NULL, 0),
(24, 1, 9, 3, 0, '400010001000500090024', 0);

-- --------------------------------------------------------

--
-- 表的结构 `mz_order`
--

CREATE TABLE `mz_order` (
  `id` int(11) NOT NULL,
  `orderid` varchar(32) NOT NULL,
  `uid` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  `gname` varchar(32) NOT NULL,
  `num` int(11) NOT NULL DEFAULT '1',
  `price` int(11) NOT NULL,
  `net` varchar(32) NOT NULL,
  `color` varchar(32) NOT NULL,
  `memoey` varchar(32) NOT NULL,
  `img` varchar(255) NOT NULL,
  `addid` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mz_order`
--

INSERT INTO `mz_order` (`id`, `orderid`, `uid`, `gid`, `gname`, `num`, `price`, `net`, `color`, `memoey`, `img`, `addid`, `status`) VALUES
(3, '300010001000400090003', 1, 1, '魅族note5', 1, 888, '全网通4G', '香槟金', '16G', '/uploads/goods/20170708/55e5c45fe61933a2fe471f4e1862c817.jpg', NULL, 0),
(5, '300010001000400090003', 1, 1, '魅族note5', 1, 888, '全网通4G', '香槟金', '16G', '/static/shop/resource/images/entry/logo-header.png', 1, 1),
(6, '300010001000400090003', 2, 1, '魅族note5', 1, 888, '全网通4G', '香槟金', '16G', '/static/shop/resource/images/entry/logo-header.png', 1, 2),
(7, '300010001000400090003', 1, 1, '魅族note5', 1, 888, '全网通4G', '香槟金', '16G', '/static/shop/resource/images/entry/logo-header.png', 1, 3);

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
(5, 0, '周边配件', 0);

-- --------------------------------------------------------

--
-- 表的结构 `mz_user`
--

CREATE TABLE `mz_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` char(32) NOT NULL,
  `email` varchar(60) DEFAULT NULL,
  `sex` int(11) NOT NULL DEFAULT '0',
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

INSERT INTO `mz_user` (`id`, `username`, `password`, `email`, `sex`, `phone`, `type`, `status`, `photo`, `score`, `grade`, `isdel`, `create_time`, `update_time`, `delete_time`) VALUES
(1, 'xiaoming', 'e10adc3949ba59abbe56e057f20f883e', 'qq@qq.com', 0, '123456789', 1, 0, '/uploads/icons/20170708/d1bb326a2efdae20679056c258902a37.gif', 0, '0', 0, NULL, 1499518885, NULL),
(2, 'qwer12', 'cc5d89e35ce391f5265d26a247544c09', 'q@qq.com', 0, NULL, 0, 0, NULL, 0, '0', 0, 1499133294, 1499133294, NULL),
(3, 'xiaohong', 'e99a18c428cb38d5f260853678922e03', 'qq@qq.com', 0, NULL, 0, 0, NULL, 0, '0', 0, 1499217022, 1499217022, NULL),
(6, 'xiaohong', 'e99a18c428cb38d5f260853678922e03', 'qq@qq.com', 0, NULL, 0, 0, NULL, 0, '0', 0, 1499217022, 1499217022, NULL),
(7, 'xiaohong', 'e99a18c428cb38d5f260853678922e03', 'qq@qq.com', 0, NULL, 0, 0, NULL, 0, '0', 0, 1499217022, 1499217022, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `mz_usertoadd`
--

CREATE TABLE `mz_usertoadd` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mz_usertoadd`
--

INSERT INTO `mz_usertoadd` (`id`, `user_id`, `address_id`) VALUES
(2, 1, 7),
(3, 6, 2),
(4, 1, 3),
(5, 1, 6),
(6, 7, 5),
(7, 7, 4),
(8, 2, 6),
(9, 2, 8),
(10, 1, 7),
(11, 1, 8),
(12, 1, 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mz_address`
--
ALTER TABLE `mz_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mz_attr`
--
ALTER TABLE `mz_attr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mz_banner`
--
ALTER TABLE `mz_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mz_cart`
--
ALTER TABLE `mz_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mz_detail`
--
ALTER TABLE `mz_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mz_goods`
--
ALTER TABLE `mz_goods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mz_goodtoattr`
--
ALTER TABLE `mz_goodtoattr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mz_order`
--
ALTER TABLE `mz_order`
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
-- Indexes for table `mz_usertoadd`
--
ALTER TABLE `mz_usertoadd`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `mz_address`
--
ALTER TABLE `mz_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- 使用表AUTO_INCREMENT `mz_attr`
--
ALTER TABLE `mz_attr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- 使用表AUTO_INCREMENT `mz_banner`
--
ALTER TABLE `mz_banner`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- 使用表AUTO_INCREMENT `mz_cart`
--
ALTER TABLE `mz_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- 使用表AUTO_INCREMENT `mz_detail`
--
ALTER TABLE `mz_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `mz_goods`
--
ALTER TABLE `mz_goods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `mz_goodtoattr`
--
ALTER TABLE `mz_goodtoattr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- 使用表AUTO_INCREMENT `mz_order`
--
ALTER TABLE `mz_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- 使用表AUTO_INCREMENT `mz_type`
--
ALTER TABLE `mz_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- 使用表AUTO_INCREMENT `mz_user`
--
ALTER TABLE `mz_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- 使用表AUTO_INCREMENT `mz_usertoadd`
--
ALTER TABLE `mz_usertoadd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
