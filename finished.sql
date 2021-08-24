-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Авг 24 2021 г., 19:12
-- Версия сервера: 10.4.20-MariaDB
-- Версия PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `finished`
--

-- --------------------------------------------------------

--
-- Структура таблицы `clicks`
--

CREATE TABLE `clicks` (
  `Id` int(11) NOT NULL,
  `orderId` int(11) DEFAULT NULL,
  `times` date DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `status_click` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `clicks`
--

INSERT INTO `clicks` (`Id`, `orderId`, `times`, `user_id`, `status_click`) VALUES
(19, 4, '2021-08-15', 3, 1),
(20, 4, '2021-08-15', 3, 1),
(21, 4, '2021-08-24', 3, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `Id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `prize` int(11) NOT NULL,
  `url` varchar(300) NOT NULL,
  `theame` text DEFAULT NULL,
  `creater_id` int(11) DEFAULT NULL,
  `times_create` date DEFAULT NULL,
  `active_orders` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`Id`, `name`, `prize`, `url`, `theame`, `creater_id`, `times_create`, `active_orders`) VALUES
(4, 'Первый заказ ', 200, 'https://localhost/clientTest', 'Успешный заказ?!', 4, '2021-08-14', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `status_id`
--

CREATE TABLE `status_id` (
  `Id` int(11) NOT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `status_id`
--

INSERT INTO `status_id` (`Id`, `status`) VALUES
(1, 'web-dev'),
(2, 'client'),
(3, 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `password` varchar(300) NOT NULL,
  `Id_status` int(11) DEFAULT NULL,
  `active` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`Id`, `login`, `password`, `Id_status`, `active`) VALUES
(1, 'admin', 'c3284d0f94606de1fd2af172aba15bf3', 3, 1),
(3, 'user1', 'b1734c3c466b3ddcdd3b841d02a24b56', 1, 1),
(4, 'client1', 'f65e5640d9c584b35d0ae76b459898e7', 2, 1),
(5, 'user2', 'd079f41b77a39477b1547e6259d70ebd', 1, 1),
(6, 'user3', '9c47a0019e1a7db25de579f2f3b62964', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `user_order`
--

CREATE TABLE `user_order` (
  `Id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `orderId` int(11) DEFAULT NULL,
  `times_order` date DEFAULT NULL,
  `active_user_order` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `user_order`
--

INSERT INTO `user_order` (`Id`, `userId`, `orderId`, `times_order`, `active_user_order`) VALUES
(1, 3, 4, '2021-08-14', 0),
(2, 3, 4, '2021-08-14', 0),
(3, 3, 4, '2021-08-14', 0),
(4, 3, 4, '2021-08-15', 0),
(5, 3, 4, '2021-08-15', 0),
(6, 3, 4, '2021-08-23', 0),
(7, 3, 4, '2021-08-23', 0),
(8, 3, 4, '2021-08-23', 0),
(9, 3, 4, '2021-08-23', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `clicks`
--
ALTER TABLE `clicks`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `orderId` (`orderId`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `status_click` (`status_click`),
  ADD KEY `times_click` (`times`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `creater_id` (`creater_id`),
  ADD KEY `active_orders` (`active_orders`),
  ADD KEY `name_order` (`name`),
  ADD KEY `times_order` (`times_create`);

--
-- Индексы таблицы `status_id`
--
ALTER TABLE `status_id`
  ADD PRIMARY KEY (`Id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_status` (`Id_status`),
  ADD KEY `active` (`active`),
  ADD KEY `login` (`login`);

--
-- Индексы таблицы `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `orderId` (`orderId`),
  ADD KEY `active_user_order` (`active_user_order`),
  ADD KEY `times_user_order` (`times_order`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `clicks`
--
ALTER TABLE `clicks`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `status_id`
--
ALTER TABLE `status_id`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `user_order`
--
ALTER TABLE `user_order`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `clicks`
--
ALTER TABLE `clicks`
  ADD CONSTRAINT `clicks_ibfk_1` FOREIGN KEY (`orderId`) REFERENCES `orders` (`Id`),
  ADD CONSTRAINT `clicks_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`Id`);

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`creater_id`) REFERENCES `users` (`Id`);

--
-- Ограничения внешнего ключа таблицы `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`Id_status`) REFERENCES `status_id` (`Id`);

--
-- Ограничения внешнего ключа таблицы `user_order`
--
ALTER TABLE `user_order`
  ADD CONSTRAINT `user_order_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`Id`),
  ADD CONSTRAINT `user_order_ibfk_2` FOREIGN KEY (`orderId`) REFERENCES `orders` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
