-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 13 2023 г., 19:00
-- Версия сервера: 8.0.30
-- Версия PHP: 8.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `training_journal`
--

-- --------------------------------------------------------

--
-- Структура таблицы `training_day`
--

CREATE TABLE `training_day` (
  `id` int UNSIGNED NOT NULL,
  `weekday` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `training_title` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_of_training` date DEFAULT NULL,
  `user_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `training_day`
--

INSERT INTO `training_day` (`id`, `weekday`, `training_title`, `date_of_training`, `user_id`) VALUES
(145, '321', '321', '2023-12-23', 27),
(146, 'asd', 'asd', '2023-12-02', 27),
(159, '', '', '2023-11-30', 28),
(160, '213', '123', '2023-12-09', 28),
(161, 'архив.png', '123', '2023-12-06', 28),
(165, '1', '1', '2023-12-14', 26),
(166, '2', '2', '2023-12-03', 26),
(167, '3', '3', '2023-12-08', 26),
(168, '4', '1', '2023-12-23', 26),
(169, '5', '2', '2023-12-22', 26),
(171, '7', '1', '2023-12-15', 26),
(172, '8', '2', '2023-12-23', 26),
(177, '13', '1', '2023-12-17', 26);

-- --------------------------------------------------------

--
-- Структура таблицы `training_ec`
--

CREATE TABLE `training_ec` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `sets` int DEFAULT NULL,
  `reps` int DEFAULT NULL,
  `weight` int DEFAULT NULL,
  `training_day_id` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `training_ec`
--

INSERT INTO `training_ec` (`id`, `title`, `sets`, `reps`, `weight`, `training_day_id`) VALUES
(52, '1', 3, 213432312, 123, 145),
(53, '4', 4, 4, 1, 146),
(59, '312', 213, 213, 342, 160),
(62, '12', 123, 123, 432, 165);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `token`) VALUES
(26, 'Андрей', 'guts@mail.ru', '$2y$10$yY7xu5uWfk3IyBZ6aeB.BejSq7oA4.7TFTf0SssgFbnneja8nuc8q', 'perRk8x7aiXOszWtmJ5iTD3ZVdc2HBSa7YLuIMfwf06t7BqTg4'),
(27, '123', 'guts2@mail.ru', '$2y$10$.Y12orzG0I7fCbeCuVw5ve1jQthnai0wcWL0ktCVyx6Z3kBlvQHJ2', 'wdnfZd0BfmezzIFuXokVQj9JH7fPC7H8H8kmUukhdllfLSFdKr'),
(28, 'qwe', 'zx312c@mail.ru', '$2y$10$FfoBtW04kLcLW.MhBxKfHeBRuVsqJGjy.PD6Bxt3a0PAU/t792nQq', 'g2kFu48ajCYDA0cVIUUJ2uWJc0ODmDVp659j84dg4UZ2m0qWCp'),
(29, '321', 'asdsaw@mail.ru', '$2y$10$mKrOKc8uLLU4XuG2N2o4NeNoVhVfrVRVmJbi92Cobwo52BluI2BYm', 'Z45iWI9khG9dm9Bmg6qb4X7o74V3NNZDk0rX4FxHzZbPufXObu');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `training_day`
--
ALTER TABLE `training_day`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `training_ec`
--
ALTER TABLE `training_ec`
  ADD PRIMARY KEY (`id`),
  ADD KEY `training_day_id` (`training_day_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `training_day`
--
ALTER TABLE `training_day`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT для таблицы `training_ec`
--
ALTER TABLE `training_ec`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `training_day`
--
ALTER TABLE `training_day`
  ADD CONSTRAINT `training_day_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `training_ec`
--
ALTER TABLE `training_ec`
  ADD CONSTRAINT `training_ec_ibfk_1` FOREIGN KEY (`training_day_id`) REFERENCES `training_day` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
