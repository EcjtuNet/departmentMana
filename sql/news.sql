-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 11 月 08 日 06:14
-- 服务器版本: 5.5.20
-- PHP 版本: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `news`
--
DROP DATABASE `news`;
CREATE DATABASE `news` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `news`;

-- --------------------------------------------------------

--
-- 表的结构 `history`
--

CREATE TABLE IF NOT EXISTS `history` (
  `name` text CHARACTER SET utf8 NOT NULL,
  `history` text CHARACTER SET utf8 NOT NULL,
  `time` date NOT NULL,
  `value` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_bin;

-- --------------------------------------------------------

--
-- 表的结构 `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL COMMENT '成员',
  `uarrive` varchar(255) NOT NULL COMMENT '缺勤',
  `vacate` varchar(255) NOT NULL COMMENT '请假',
  `late` varchar(255) NOT NULL COMMENT '迟到',
  `arrive` varchar(255) NOT NULL COMMENT '到场',
  `total` int NOT NULL COMMENT '积分',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user` (`user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- 转存表中的数据 `message`
--

INSERT INTO `message` (`id`, `user`, `uarrive`, `vacate`, `late`, `arrive`, `total`) VALUES
(3, '王五', '6', '2', '3', '4', '15'),
(9, '张三', '2', '2', '4', '5', '5'),
(10, '李四', '1', '1', '1', '2', '5'),
(17, '小明', '0', '0', '0', '0', '0');

INSERT INTO `history` (`name`, `history`, `time`, `value`) VALUES
('王五', '孔目湖', NOW(), 4),
('王五', '孔目湖', NOW(), 4),
('王五', '孔目湖', NOW(), 4),
('张三', '孔目湖', NOW(), 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
