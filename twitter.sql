-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 06 2019 г., 13:19
-- Версия сервера: 5.5.61-MariaDB
-- Версия PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `twitter`
--

-- --------------------------------------------------------

--
-- Структура таблицы `names`
--

CREATE TABLE `names` (
  `id` int(24) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `names`
--

INSERT INTO `names` (`id`, `name`, `date`) VALUES
(1, 'test', '2019-08-06 08:44:45'),
(2, '@taylorswift13', '2019-08-06 08:47:07'),
(3, '@taylorswift13', '2019-08-06 08:47:57'),
(4, '@tjournal', '2019-08-06 08:49:57'),
(5, '@taylorswift13', '2019-08-06 08:50:28'),
(6, 'Test', '2019-08-06 08:53:28'),
(7, 'NewCall', '2019-08-06 08:54:11'),
(8, 'Test_1', '2019-08-06 08:56:37'),
(9, 'New', '2019-08-06 08:57:25'),
(10, 'Asset', '2019-08-06 08:58:58'),
(11, 'Asset', '2019-08-06 09:30:18'),
(12, 'Asset_test', '2019-08-06 09:30:24'),
(13, '@5channel', '2019-08-06 09:34:57'),
(14, '', '2019-08-06 09:35:43'),
(15, '@taylorswift13', '2019-08-06 09:37:33'),
(16, '@History_Ukraine', '2019-08-06 09:39:16'),
(17, 'New', '2019-08-06 10:05:11'),
(18, 'Test', '2019-08-06 10:09:42'),
(19, 'TEST NEW', '2019-08-06 10:09:48'),
(20, 'TEST NEW', '2019-08-06 10:09:48'),
(21, 'TEST NEW', '2019-08-06 10:09:48'),
(22, 'TEST NEW', '2019-08-06 10:09:50'),
(23, '@taylorswift13', '2019-08-06 10:09:54'),
(24, '@taylorswift13', '2019-08-06 10:11:21'),
(25, 'Asset', '2019-08-06 10:17:52'),
(26, '@taylorswift13', '2019-08-06 10:17:57');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `names`
--
ALTER TABLE `names`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `names`
--
ALTER TABLE `names`
  MODIFY `id` int(24) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
