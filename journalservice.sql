-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: jan 14 2023 г., 13:10
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `journalservice`
--

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `groupId` int(11) NOT NULL AUTO_INCREMENT,
  `groupName` varchar(100) NOT NULL,
  `numberPerson` int(11) NOT NULL,
  PRIMARY KEY (`groupId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `groups`
--

INSERT INTO `groups` (`groupId`, `groupName`, `numberPerson`) VALUES
(1, 'Группа№1', 4),
(2, 'Группа№2', 4),
(3, 'Группа№3', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `journal`
--

CREATE TABLE IF NOT EXISTS `journal` (
  `teacherName` varchar(100) NOT NULL,
  `groupName` varchar(100) NOT NULL,
  `studentName` varchar(100) NOT NULL,
  `studentSurname` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `assessment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `studentId` int(11) NOT NULL AUTO_INCREMENT,
  `studentName` varchar(100) NOT NULL,
  `studentSurname` varchar(100) NOT NULL,
  `groupName` varchar(100) NOT NULL,
  PRIMARY KEY (`studentId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `students`
--

INSERT INTO `students` (`studentId`, `studentName`, `studentSurname`, `groupName`) VALUES
(1, 'Влад', 'Алиев', 'Группа№1'),
(2, 'Иван', 'Иванов', 'Группа№1'),
(3, 'Александр', 'Розенбаум', 'Группа№1'),
(4, 'Сергей', 'Токарь', 'Группа№2'),
(5, 'Евгений', 'Павелос', 'Группа№2'),
(6, 'Андрей', 'Романов', 'Группа№2'),
(7, 'Михаил', 'Задорнов', 'Группа№3'),
(8, 'Илья', 'Пророк', 'Группа№3'),
(9, 'Федор', 'Емельяненко', 'Группа№3'),
(10, 'Виктор', 'Гринев', 'Группа№3');

-- --------------------------------------------------------

--
-- Структура таблицы `teachers`
--

CREATE TABLE IF NOT EXISTS `teachers` (
  `teacherID` int(11) NOT NULL AUTO_INCREMENT,
  `teacherName` varchar(200) NOT NULL,
  `teacherSurname` varchar(200) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`teacherID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `teachers`
--

INSERT INTO `teachers` (`teacherID`, `teacherName`, `teacherSurname`, `login`, `password`) VALUES
(1, 'Иван', 'Иванов', '1', '1'),
(2, 'Петр', 'Петров', '2', '2'),
(3, 'Сидр', 'Сидоров', '3', '3');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;