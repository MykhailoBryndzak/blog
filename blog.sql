
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- База данных: `blog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `antimat`
--

CREATE TABLE IF NOT EXISTS `antimat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slovo` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Дамп данных таблицы `antimat`
--

INSERT INTO `antimat` (`id`, `slovo`) VALUES
(7, 'дура'),
(9, 'осел');

-- --------------------------------------------------------

--
-- Структура таблицы `msgs`
--

CREATE TABLE IF NOT EXISTS `msgs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL DEFAULT '',
  `shorttext` varchar(32) NOT NULL DEFAULT '',
  `text` text,
  `timeupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `timecreate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=98 ;

--
-- Дамп данных таблицы `msgs`
--

INSERT INTO `msgs` (`id`, `name`, `shorttext`, `text`, `timeupdate`, `timecreate`) VALUES
(97, 'тест', 'тест', 'тест', '2013-05-11 14:06:18', '2013-05-11 14:06:18');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=60 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`) VALUES
(11, 'user', '3675ac5c859c806b26e02e6f9fd62192');

