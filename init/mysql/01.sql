-- your init database sql

-- CREATE DATABASE IF NOT EXISTS `db_name`;
-- GRANT ALL ON `db_name`.* TO 'user'@'%';

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `demo_article` (
  `id` int UNSIGNED NOT NULL,
  `user_id` int UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `demo_article` (`id`, `user_id`, `title`) VALUES
(1, 1, 'HELLO PHALCON');

ALTER TABLE `demo_article`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `demo_article`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;
