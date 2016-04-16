-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2016-04-17 18:12:31
-- 服务器版本： 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `youthol_wechat`
--

-- --------------------------------------------------------

--
-- 表的结构 `library_email`
--

CREATE TABLE IF NOT EXISTS `library_email` (
  `sdutnum` varchar(20) NOT NULL COMMENT '学号',
  `email` varchar(50) NOT NULL COMMENT '邮箱',
  UNIQUE KEY `sdutnum` (`sdutnum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='图书馆邮箱订阅';

-- --------------------------------------------------------

--
-- 表的结构 `library_user`
--

CREATE TABLE IF NOT EXISTS `library_user` (
  `sdutnum` varchar(20) NOT NULL COMMENT '学号',
  `lib_pwd` varchar(50) NOT NULL COMMENT '密码',
  `username` varchar(50) CHARACTER SET utf32 NOT NULL COMMENT '姓名',
  UNIQUE KEY `sdutnum` (`sdutnum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='图书馆用户';

-- --------------------------------------------------------

--
-- 表的结构 `session`
--

CREATE TABLE IF NOT EXISTS `session` (
  `sid` int(10) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `lib_sdutnum` varchar(20) NOT NULL COMMENT '学号',
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
