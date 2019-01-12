-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2018 at 12:28 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `meilesl_utf`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `answer_id` int(7) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `q_id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`answer_id`, `answer`, `q_id`) VALUES
(1, 'Žiema', 1),
(2, 'Vasara', 1),
(3, 'Poilsis kurorte', 2),
(4, 'Pažintinė kelionė', 2),
(5, 'Jūra', 3),
(6, 'Kalnai', 3),
(7, 'Rytas', 4),
(8, 'Vakaras', 4),
(9, 'Teatras', 5),
(10, 'Koncertas', 5),
(11, 'Menas', 6),
(12, 'Sportas', 6),
(13, 'Stalo žaidimai', 7),
(14, 'Kompiuteriniai žaidimai', 7),
(15, 'Kava', 8),
(16, 'Arbata', 8),
(17, 'Knyga', 9),
(18, 'Filmas', 9),
(19, 'Šunys', 10),
(20, 'Katės', 10);

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `match_id` int(2) NOT NULL,
  `user_id` int(10) NOT NULL,
  `pora1` int(10) NOT NULL,
  `pora2` int(10) NOT NULL,
  `pora3` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `q_id` int(2) NOT NULL,
  `question` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`q_id`, `question`) VALUES
(1, 'Žiema ar vasara?'),
(2, 'Poilsis kurorte ar pažintinė kelionė? '),
(3, 'Jūra ar kalnai?'),
(4, 'Rytas ar vakaras?'),
(5, 'Teatras ar koncertas?'),
(6, 'Menas ar sportas?'),
(7, 'Stalo žaidimai ar kompiuteriniai žaidimai?'),
(8, 'Kava ar arbata?'),
(9, 'Knyga ar filmas?'),
(10, 'Šunys ar katės?');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `vardas` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `slaptazodis` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `gim_data` date NOT NULL,
  `nuo` int(2) NOT NULL,
  `iki` int(2) NOT NULL,
  `lytis` varchar(7) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tel` varchar(20) NOT NULL,
  `elpastas` varchar(50) NOT NULL,
  `fblink` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `vardas`, `slaptazodis`, `gim_data`, `nuo`, `iki`, `lytis`, `tel`, `elpastas`, `fblink`) VALUES
(1, 'Justas', 'pass', '1970-01-01', 18, 28, 'vaikina', '+37061095620', 'rutar4t@gmial.com', 'https://www.facebook.com/ruta.ratkute.1'),
(2, 'Marius', 'pass', '1970-01-01', 17, 25, 'vaikina', '', '', 'https://www.facebook.com/agne.liubomirskaite'),
(3, 'Lina', 'pass', '1970-01-01', 17, 26, 'mergina', '+370195620', 'lina@gmail.com', 'https://www.facebook.com/agne.liubomirskaite'),
(4, 'Augustas', 'pass', '1970-01-01', 18, 26, 'vaikina', '+370195620', 'pastas@gmail.com', 'https://www.facebook.com/agne.liubomirskaite'),
(5, 'Edvinas', 'pass', '1970-01-01', 18, 25, 'vaikina', '+370195620', 'pastas@gmail.com', 'https://www.facebook.com/agne.liubomirskaite'),
(6, 'Gabriele', 'pass', '1970-01-01', 20, 27, 'mergina', '+370195620', 'pastas@gmail.com', 'https://www.facebook.com/agne.liubomirskaite'),
(7, 'Eglė', 'pass', '2018-12-02', 20, 29, 'mergina', '+370195620', 'pastas@gmail.com', 'https://www.facebook.com/agne.liubomirskaite'),
(8, 'Kamilė', 'pass', '1970-01-01', 18, 24, 'mergina', '+370195620', 'pastas@gmail.com', 'https://www.facebook.com/agne.liubomirskaite'),
(9, 'Gytis', 'pass', '1970-01-01', 20, 25, 'vaikina', '+370195620', 'pastas@gmail.com', 'https://www.facebook.com/agne.liubomirskaite');

-- --------------------------------------------------------

--
-- Table structure for table `user_answers`
--

CREATE TABLE `user_answers` (
  `user_id` int(7) NOT NULL,
  `question_id` int(7) NOT NULL,
  `answer_id` int(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_answers`
--

INSERT INTO `user_answers` (`user_id`, `question_id`, `answer_id`) VALUES
(1, 1, 2),
(1, 2, 3),
(1, 3, 6),
(1, 4, 7),
(1, 5, 10),
(1, 6, 12),
(1, 7, 14),
(1, 8, 16),
(1, 9, 17),
(1, 10, 20),
(2, 1, 1),
(2, 2, 4),
(2, 2, 4),
(2, 3, 6),
(2, 4, 8),
(2, 5, 10),
(2, 6, 12),
(2, 7, 14),
(2, 8, 16),
(2, 9, 18),
(2, 10, 20),
(2, 10, 20),
(3, 1, 1),
(3, 2, 4),
(3, 3, 6),
(3, 4, 7),
(3, 5, 10),
(3, 6, 11),
(3, 7, 14),
(3, 8, 15),
(3, 9, 18),
(3, 10, 19),
(4, 1, 2),
(4, 2, 3),
(4, 3, 6),
(4, 4, 7),
(4, 5, 9),
(4, 6, 12),
(4, 7, 14),
(4, 8, 15),
(4, 8, 15),
(4, 9, 17),
(4, 10, 20),
(4, 10, 20),
(5, 1, 1),
(5, 2, 4),
(5, 3, 6),
(5, 4, 8),
(5, 5, 9),
(5, 6, 12),
(5, 7, 13),
(5, 8, 16),
(5, 8, 16),
(5, 9, 17),
(5, 10, 19),
(6, 1, 1),
(6, 2, 4),
(6, 3, 5),
(6, 3, 5),
(6, 3, 5),
(6, 3, 5),
(6, 4, 7),
(6, 5, 9),
(6, 6, 11),
(6, 7, 13),
(6, 8, 15),
(6, 9, 17),
(6, 10, 19),
(6, 10, 19),
(7, 1, 1),
(7, 2, 3),
(7, 3, 6),
(7, 4, 7),
(7, 5, 9),
(7, 6, 11),
(7, 7, 13),
(7, 8, 15),
(7, 9, 17),
(7, 9, 18),
(8, 1, 1),
(8, 2, 3),
(8, 3, 6),
(8, 4, 7),
(8, 4, 7),
(8, 5, 10),
(8, 6, 12),
(8, 7, 14),
(8, 7, 14),
(8, 8, 16),
(8, 9, 18),
(8, 9, 18),
(8, 10, 19),
(9, 1, 1),
(9, 2, 4),
(9, 3, 5),
(9, 3, 5),
(9, 3, 5),
(9, 4, 8),
(9, 4, 8),
(9, 4, 8),
(9, 5, 10),
(9, 6, 12),
(9, 7, 14),
(9, 7, 14),
(9, 8, 16),
(9, 9, 17),
(9, 10, 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`answer_id`),
  ADD KEY `answers_fk` (`q_id`);

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`match_id`),
  ADD KEY `user_id_fk` (`user_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_answers`
--
ALTER TABLE `user_answers`
  ADD KEY `user_answers _user_id_fk` (`user_id`),
  ADD KEY `user_answers_answer_id_fk` (`answer_id`),
  ADD KEY `user_answers_question_fk` (`question_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `match_id` int(2) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_fk` FOREIGN KEY (`q_id`) REFERENCES `questions` (`q_id`);

--
-- Constraints for table `matches`
--
ALTER TABLE `matches`
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `user_answers`
--
ALTER TABLE `user_answers`
  ADD CONSTRAINT `user_answers _user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `user_answers_answer_id_fk` FOREIGN KEY (`answer_id`) REFERENCES `answers` (`answer_id`),
  ADD CONSTRAINT `user_answers_question_fk` FOREIGN KEY (`question_id`) REFERENCES `questions` (`q_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
