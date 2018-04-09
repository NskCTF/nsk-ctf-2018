-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Апр 01 2018 г., 10:06
-- Версия сервера: 5.7.21
-- Версия PHP: 7.0.27-0+deb9u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `ctf`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `title`) VALUES
(1, 'PIZZA'),
(2, 'PIZZA SLICE'),
(3, 'PIZZA ROLLS'),
(4, 'BOX'),
(5, 'TOPINGS');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `title` varchar(64) NOT NULL,
  `description` varchar(512) NOT NULL,
  `category_id` int(11) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `title`, `description`, `category_id`, `price`) VALUES
(1, 'Cheesy Pies', 'Pizza dough slathered with garlic butter, topped with 3 cheeses, baked & served with a side of marinara. Oh so ooey gooie!', 1, 6.2),
(2, 'Gourmet Specialty Pizza', 'Our dough & sauce made fresh daily, on premises, using only the highest quality ingredients to give you the best pizza ever!', 1, 17),
(3, 'Neapolitan Pizza', 'Neapolitan - the original pizza. This delicious pie has a history that dates all the way back to 18th century Naples, Italy. During this time, the poorer citizens of this seaside city frequently purchased food that was cheap and could be eaten quickly. Luckily for them, Neapolitan pizza – a flatbread with tomatoes, cheese, oil, and garlic – was affordable and readily available through numerous street vendors.', 2, 15),
(4, 'Chicago Pizza', 'Chicago pizza, also commonly referred to as deep-dish pizza, gets its name from the city it was invented in.', 2, 12.5),
(5, 'New York Style Pizza', 'While New York-style pizza isn’t exactly the original, it’s become the most popular and widespread choice in the United States.', 2, 13),
(6, 'Sicilian Pizza', 'Sicilian pizza, also known as sfincione, may seem like a distant cousin of a Chicago-style pie, but the two have their differences. It\'s not even the same pizza that you\'d get in Sicily. So what’s the deal with this complicated pizza? Well, no matter what country you get this square cut, thick crust pizza from, it should always have a spongier consistency than other pizzas. However, sfincione is typically topped with a tomato sauce, onions, herbs, anchovies, and then covered with bread crumbs.', 3, 11.2),
(7, 'Greek Pizza', 'Despite its name, Greek pizza has nothing to do with Greek toppings, nor was it invented in Greece. In fact, pizza isn’t even a common dish in the Mediterranean country, despite its close location to pizza’s birth place, Italy.', 4, 6.1),
(8, 'California Pizza', 'California pizza, or gourmet pizza, is known for its unusual ingredients. This pizza got its start back in the late 1970’s when Chef Ed LaDou began experimenting with pizza recipes in the classic Italian restaurant, Prego.', 3, 7),
(9, 'California Style', 'California Style Pizza uses a dough base similar to the Neapolitan or New York style pizza and jazzes up the base with unusual and uncommon ingredients.  This style of pizza is generally credited to Chef Ed LaDou who developed a pizza with ricotta, red peppers, mustard, and pate, that Chef Wolfgang Puck tried and loved in the early 1980s', 1, 7.1),
(10, 'Tomato Pie', 'Derived from Sicilian pizza, Italian tomato pie is a thick crust, square cut pizza that features focaccia-like dough and plenty of sweet and tangy tomato sauce. If you travel to Philadelphia to try a square of this delicious treat, it’ll most likely feature “gravy” - another name for tomato sauce - poured over a crispy and doughy crust. However, in other areas, tomato pie can feature cheese and other toppings with the sauce poured over top.', 5, 8.5),
(11, 'Chicago Deep Dish', 'In the 1940s, Pizzeria Uno in Chicago developed the deep-dish pizza, which has a deep crust that lines a deep dish, similar to a large metal cake or pie pan.  Though the entire pizza is quite thick, the crust itself is only of thin to medium thickness, and the pizza has a very thick large layer of toppings.  Because the pizza is so thick, it requires a long baking time and, if cheese was added on top, as is usual with most pizzas, the cheese would burn.', 1, 10),
(12, 'Chicago Thin Crust', 'The Chicago thin crust is crispier and crunchier than the New York style and normally cut into squares (or tavern cut) rather than diagonal slices.', 3, 12.3),
(13, 'Detroit Style', 'The Detroit style pizza is a square pizza, similar to Sicilian-style pizza, with a deep-dish crust and marinara sauce sometimes served on top.  The crust is usually baked in a well-oiled pan to develop caramelized crunchy edges.  Detroit style pizza has developed a larger fan base as Detroit-based Little Caesars launched a Detroit-style deep dish pizza available at its nationwide chains.', 2, 9.4),
(14, 'New England Greek', 'Greek style pizza generally refers to the pizza served at Houses of Pizza, run by Greek immigrants in New England.  The pizza crust lies in between the crunchy New York style pizza and its thicker Sicilian cousin and it is baked in a heavily greased cake or cast iron pan, which results in a thick golden, crunchy crust.', 1, 8.1),
(15, 'Margherita', 'The pizza Margherita is just over a century old and is named after HM Queen Margherita of Italy, wife of King Umberto I and first Queen of Italy. It\'s made using toppings of tomato, mozzarella cheese, and fresh basil, which represent the red, white, and green of the Italian flag.', 5, 14.4),
(16, 'Calzone', 'Calzone means \'stocking\' in Italian and is a turnover that originates from Italy. Shaped like a semicircle, the calzone is made of dough folded over and filled with the usual pizza ingredients.', 3, 16.5);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` varchar(255) NOT NULL,
  `timestamp` varchar(15) NOT NULL,
  `name` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `goods` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
