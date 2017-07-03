DROP TABLE IF EXISTS `cot_spisok_transport`;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `cot_spisok_transport` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `hot` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `cot_spisok_transport` (`id`, `name`, `hot`) VALUES
  (1, 'Тент', 1),
  (2, 'Рефрижератор', 1),
  (3, 'Изотерм', 1),
  (4, 'Jumbo', 1),
  (5, 'Контейнеровоз', 0),
  (6, 'Открытая платформа', 0),
  (7, 'Открытая бортовая платформа', 0),
  (8, 'Платформа для негабаритных грузов', 0),
  (9, 'Автоцистерна', 0),
  (10, 'Автобус', 0),
  (11, 'Микроавтобус', 0),
  (12, 'Автовоз', 0),
  (13, 'Зерновоз', 0),
  (14, 'Самосвал', 0),
  (15, 'Лесовоз', 0);


ALTER TABLE `cot_spisok_transport`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `cot_spisok_transport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
