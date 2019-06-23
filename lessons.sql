-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 23 2019 г., 15:22
-- Версия сервера: 5.6.43
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `lessons`
--

-- --------------------------------------------------------

--
-- Структура таблицы `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `filename` text NOT NULL,
  `is_local` tinyint(1) NOT NULL DEFAULT '1',
  `shown_count` int(11) NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `photos`
--

INSERT INTO `photos` (`id`, `filename`, `is_local`, `shown_count`, `size`) VALUES
(1, '83168e4b.jpg', 1, 1, 43161),
(2, '100_0906.JPG', 1, 5, 145621),
(3, 'x_d01d1a0c.jpg', 1, 10, 96670),
(4, '2011-corvette-z06-carbon-limited-edition.jpg', 1, 3, 1145594),
(5, 'JmV6FNE1XuE.jpg', 1, 1, 432981),
(6, 'c922193fd38c8ca86d2fa2e0d846af81.jpg', 1, 1, 74102),
(7, 'mickey-and-minnie_77899-1920x1200.jpg', 1, 2, 386416),
(8, 'abstract-colorfull-022.jpg', 1, 3, 387439),
(9, 'mountain_182486-1920x1200.jpg', 1, 1, 454760),
(10, 'https://bipbap.ru/wp-content/uploads/2017/12/65620375-6b2b57fa5c7189ba4e3841d592bd5fc1-800-640x426.jpg', 0, 1, 0),
(11, 'https://bipbap.ru/wp-content/uploads/2017/12/3bcf49273613bc88bc79040f08fd422008c52624.jpg', 0, 0, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
