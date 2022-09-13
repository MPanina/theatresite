-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 14 2022 г., 02:38
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `theatresite`
--

-- --------------------------------------------------------

--
-- Структура таблицы `poster`
--

CREATE TABLE `poster` (
  `id` int NOT NULL,
  `img` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `place` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `poster`
--

INSERT INTO `poster` (`id`, `img`, `name`, `date`, `place`, `price`) VALUES
(1, 'gdedima.jpg', 'Спектакль &quot;Поиски Иванова&quot;', '28 Сент. СР 19:00', 'Центральный Концертный Зал', '1 000 — 2 500₽'),
(2, 'durka.jpg', 'Спектакль &quot;Палата Бизнес-Класса&quot;', '10 Окт. ПН 19:00', 'ДК Октябрь', '1 000 — 2 800₽'),
(3, 'dom.jpg', 'Спектакль &quot;Возвращение Домой&quot;', '1 Сент. СР 20:00', 'ДК Октябрь', '250 — 1 500₽'),
(4, 'lebedi2.jpg', 'Балет &quot;Лебединое Озеро&quot;', '03 Нояб. ЧТ 19:00', '&quot;Царицынская опера&quot;', '800 — 2 200₽');

-- --------------------------------------------------------

--
-- Структура таблицы `theatrezal`
--

CREATE TABLE `theatrezal` (
  `id` int NOT NULL,
  `idposter` int NOT NULL,
  `numbersit` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `statusit` varchar(255) NOT NULL,
  `sitplace` varchar(255) NOT NULL,
  `idreserved` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `password`) VALUES
(11, 'фыв', '$2y$10$WBrzM9gpepsf7HW5YUwhL.3WY5r/0RzPEr3d2SqTob9MkNvQZw66O'),
(12, 'фыв', '$2y$10$7eJ5PKr9c3lYXz/2xUt7Je6NZAYkWiVdbYERIYatzemI8uY/wf3zi'),
(13, 'Dima', '$2y$10$lkp1I5fUcoywRwprfwLc6.97Lyr5wXWW30RNDoKln.SXurjxyGqNK');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `poster`
--
ALTER TABLE `poster`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `theatrezal`
--
ALTER TABLE `theatrezal`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `poster`
--
ALTER TABLE `poster`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `theatrezal`
--
ALTER TABLE `theatrezal`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
