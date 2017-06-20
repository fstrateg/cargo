DROP TABLE IF EXISTS `cg_grab_kurs`;
CREATE TABLE `cg_grab_kurs` (
  `Kod` char(3) NOT NULL,
  `valName` varchar(100) DEFAULT NULL,
  `Kurs` double DEFAULT NULL,
  `Chan` double DEFAULT NULL,
  `Font` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cot_grab_kurs`
--

INSERT INTO `cg_grab_kurs` (`Kod`, `valName`, `Kurs`, `Chan`, `Font`) VALUES

('CNY', 'Китайский юань', 46.49, -0.05, 'red'),
('EUR', 'ЕВРО', 354.03, -0.86, 'red'),
('RUB', 'Российский рубль', 5.55, 0.01, 'green'),
('USD', 'Доллар США', 315.96, -0.43, 'red');
-- Индексы таблицы `grab_kurs`
--
ALTER TABLE `cg_grab_kurs`
  ADD PRIMARY KEY (`Kod`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
