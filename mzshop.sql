-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2017-07-02 08:36:09
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
-- 表的结构 `mz_user`
--

CREATE TABLE `mz_user` (
  `id` int(11) NOT NULL COMMENT '自增字段',
  `username` varchar(50) NOT NULL COMMENT '用户名',
  `password` char(32) NOT NULL COMMENT '密码',
  `email` varchar(60) DEFAULT NULL COMMENT AS `邮箱`,
  `type` int(11) DEFAULT '0'COMMENT
) ;

--
-- 转存表中的数据 `mz_user`
--

INSERT INTO `mz_user` (`id`, `username`, `password`, `email`, `type`) VALUES
(1, 'xiaoming', 'e10adc3949ba59abbe56e057f20f883e', 'qq@qq.com', 0);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `mz_user`
--
ALTER TABLE `mz_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增字段';
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
