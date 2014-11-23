-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 11 月 23 日 00:50
-- 服务器版本: 5.5.20
-- PHP 版本: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `department_mana`
--
CREATE DATABASE `department_mana` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `department_mana`;

-- --------------------------------------------------------

--
-- 表的结构 `editors`
--

CREATE TABLE IF NOT EXISTS `editors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `un` varchar(255) NOT NULL,
  `pw` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `editors`
--

INSERT INTO `editors` (`id`, `un`, `pw`) VALUES
(1, '黄道森', '4f749fd412c89c02e7f12c36c29bca6b'),
(2, '李慧丽', '4f749fd412c89c02e7f12c36c29bca6b'),
(3, '王书婷', '4f749fd412c89c02e7f12c36c29bca6b'),
(4, '刘芳', '4f749fd412c89c02e7f12c36c29bca6b'),
(5, '金其海', '4f749fd412c89c02e7f12c36c29bca6b'),
(6, '黄玮', '4f749fd412c89c02e7f12c36c29bca6b'),
(7, '刘思佳', '4f749fd412c89c02e7f12c36c29bca6b'),
(8, '旷春燕', '4f749fd412c89c02e7f12c36c29bca6b');

-- --------------------------------------------------------

--
-- 表的结构 `history`
--

CREATE TABLE IF NOT EXISTS `history` (
  `name` text CHARACTER SET utf8 NOT NULL,
  `history` text CHARACTER SET utf8 NOT NULL,
  `time` int(255) NOT NULL,
  `value` int(4) NOT NULL,
  `editor` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_bin;

--
-- 转存表中的数据 `history`
--

INSERT INTO `history` (`name`, `history`, `time`, `value`, `editor`) VALUES
('小黑', '新闻速递', 2014, 3, '黄道森'),
('小叶', '新闻速递', 1416652073, 3, '黄道森'),
('小叶', '交大新闻', 1416663340, 3, '黄道森');

-- --------------------------------------------------------

--
-- 表的结构 `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) NOT NULL COMMENT '��Ա',
  `uarrive` int(11) NOT NULL,
  `vacate` int(11) NOT NULL,
  `late` int(11) NOT NULL,
  `accident` int(11) NOT NULL,
  `total` float NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user` (`user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `message`
--

INSERT INTO `message` (`id`, `user`, `uarrive`, `vacate`, `late`, `accident`, `total`) VALUES
(12, '小黑', 0, 0, 0, 0, 3.4),
(13, '小叶', 0, 0, 0, 0, 6.7);

-- --------------------------------------------------------

--
-- 表的结构 `statistic`
--

CREATE TABLE IF NOT EXISTS `statistic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `operation` int(11) NOT NULL COMMENT '01旷到23请假45迟到67新闻事故89微调',
  `time` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- 转存表中的数据 `statistic`
--

INSERT INTO `statistic` (`id`, `name`, `operation`, `time`) VALUES
(8, '小黑', 5, 2014),
(10, '小叶', 5, 1416650986),
(15, '小叶', 5, 1416652130),
(26, '', 1, 1416661204),
(27, '', 1, 1416661850),
(28, '', 1, 1416662077),
(29, '', 1, 1416662474),
(30, '小叶', 5, 1416663279),
(31, '', 1, 1416663530),
(32, '', 1, 1416663538),
(33, '小叶', 5, 1416663549),
(34, '小叶', 5, 1416663557),
(35, '小叶', 5, 1416663559),
(36, '小叶', 5, 1416663560),
(37, '小黑', 5, 1416663566),
(38, '小黑', 5, 1416663567),
(39, '小黑', 5, 1416663568);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
