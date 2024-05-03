-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Мар 18 2020 г., 15:54
-- Версия сервера: 5.6.39-83.1
-- Версия PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ce78960_admin`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cfg`
--

CREATE TABLE IF NOT EXISTS `cfg` (
  `id` int(18) NOT NULL AUTO_INCREMENT,
  `TITLE` varchar(100) NOT NULL,
  `CARD` varchar(100) NOT NULL,
  `YANDEX` varchar(100) NOT NULL,
  `NUMBER` varchar(50) NOT NULL,
  `BTC_ADRESS` varchar(100) NOT NULL,
  `MIN_BTC_YANDEX` double NOT NULL,
  `MAX_BTC_YANDEX` double NOT NULL,
  `MIN_YANDEX_BTC` double NOT NULL,
  `MAX_YANDEX_BTC` double NOT NULL,
  `MIN_CARD_BTC` double NOT NULL,
  `MAX_CARD_BTC` double NOT NULL,
  `MIN_QIWI_BTC` double NOT NULL,
  `MAX_QIWI_BTC` double NOT NULL,
  `MIN_BTC_QIWI` double NOT NULL,
  `MAX_BTC_QIWI` double NOT NULL,
  `MIN_BTC_CARD` double NOT NULL,
  `MAX_BTC_CARD` double NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `BTC_YANDEX_P` int(8) NOT NULL,
  `YANDEX_BTC_P` int(8) NOT NULL,
  `CARD_BTC_P` int(8) NOT NULL,
  `QIWI_BTC_P` int(8) NOT NULL,
  `BTC_QIWI_P` int(8) NOT NULL,
  `BTC_CARD_P` int(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `cfg`
--

INSERT INTO `cfg` (`id`, `TITLE`, `CARD`, `YANDEX`, `NUMBER`, `BTC_ADRESS`, `MIN_BTC_YANDEX`, `MAX_BTC_YANDEX`, `MIN_YANDEX_BTC`, `MAX_YANDEX_BTC`, `MIN_CARD_BTC`, `MAX_CARD_BTC`, `MIN_QIWI_BTC`, `MAX_QIWI_BTC`, `MIN_BTC_QIWI`, `MAX_BTC_QIWI`, `MIN_BTC_CARD`, `MAX_BTC_CARD`, `created`, `BTC_YANDEX_P`, `YANDEX_BTC_P`, `CARD_BTC_P`, `QIWI_BTC_P`, `BTC_QIWI_P`, `BTC_CARD_P`) VALUES
(1, 'BTCFREE', 'YOURCARD', 'YOURYANDEX', 'YOURQIWI', 'YOURBTCADDRESS', 2221, 100000, 1111, 100000, 3331, 100000, 4441, 100000, 5551, 100000, 6661, 100000, '2020-03-18 12:20:15', 5, 55, 5, 10, 20, 30);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(20) CHARACTER SET utf8 NOT NULL,
  `password` varchar(999) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`) VALUES
(1, '123', '123');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
