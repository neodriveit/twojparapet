-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 04 Lip 2022, 07:12
-- Wersja serwera: 10.4.19-MariaDB
-- Wersja PHP: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `twojparapet`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `id_sender` int(11) NOT NULL,
  `id_receiver` int(11) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `messages`
--

INSERT INTO `messages` (`id`, `id_sender`, `id_receiver`, `message`) VALUES
(3, 5, 1, 'hej, masz na sprzedaz aglaoneme flame, moze chcesz sie zamienic na snow?'),
(4, 1, 3, 'Kocham Ciebie kwiatuszku :*'),
(5, 3, 1, 'ja ciebie tez bardzooo :*'),
(6, 1, 4, 'siema student, czemu brak roslin?'),
(11, 1, 3, 'hejka'),
(12, 1, 3, 'love :*'),
(13, 1, 20, 'kudlaty wez sie za siebie'),
(14, 20, 1, 'no siema mordo'),
(15, 5, 1, 'z kad masz tyle roslin?'),
(16, 19, 1, 'siema tu seba, daj jakiegos kwiatka, bo nic nie mam');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `plants`
--

CREATE TABLE `plants` (
  `id` int(11) NOT NULL,
  `name` varchar(33) NOT NULL,
  `description` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `plants`
--

INSERT INTO `plants` (`id`, `name`, `description`, `status`, `user_id`) VALUES
(3, 'difffenbachia', 'blablabla', 1, 0),
(7, 'trzykrotka', 'tricolor', 3, 1),
(8, 'epi', 'gold', 1, 1),
(12, 'aglaonema', 'flame', 2, 1),
(13, 'begonia', '', 1, 1),
(14, 'alokazja', 'amazonica', 1, 1),
(15, 'szczawik', 'trojkatny', 1, 1),
(16, 'grubosz', '', 1, 1),
(17, 'skrzydlokwiat', '', 1, 20),
(18, 'chamedora', '', 2, 5),
(19, 'dracena', '', 2, 5),
(20, 'aglaonema', 'zamienie na inny kolor', 3, 5),
(21, '', '', 0, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `status` varchar(33) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
(1, 'w posiadaniu'),
(2, 'na sprzedaz'),
(3, 'na wymiane'),
(4, 'archiwalne');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(33) NOT NULL,
  `password` varchar(100) NOT NULL,
  `city` varchar(33) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `city`, `email`) VALUES
(1, 'Kamil', '11d462a4a1b14b00580d8020d6f64998', 'Wroclaw', 'kamil.kalwelis@gmail.com'),
(3, 'Klaudia', '18f184ae25ed0f357ed7f9f014707e3b', 'Wroclaw', 'klaudia@email.com'),
(4, 'student', '9f5a1cb2c4286aa612759ad4fe1863fa', 'Wroclaw', 'student@handlowa.eu'),
(5, 'krzys', 'd3fee53504354ade85c76f5d32a63ce9', 'Sopot', 'krzys@sopot.pl'),
(6, 'nowy', 'ca3d8a2b54354264bcecb78742d52916', 'Sopot', 'nowy@sopot.pl'),
(19, 'sebastian', 'c2d628ba98ed491776c9335e988e2e3b', 'Ciechocinek', 'seba@wp.pl'),
(20, 'kudlaty', '4bbb69ca9a03bbee80e38c77f412d445', 'Wroclaw', 'kudlaty@wroclaw.pl'),
(21, 'zbigniew', '96cf42564b492c81b2c294c79fbe6d2b', 'Wrocław', 'zbysiu@love.com');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `plants`
--
ALTER TABLE `plants`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT dla tabeli `plants`
--
ALTER TABLE `plants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
