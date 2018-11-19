-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 19 Lis 2018, 15:46
-- Wersja serwera: 10.1.31-MariaDB
-- Wersja PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `a`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `eq`
--

CREATE TABLE `eq` (
  `id` int(11) NOT NULL,
  `username` text COLLATE utf8_bin NOT NULL,
  `name` text COLLATE utf8_bin NOT NULL,
  `isEquiped` int(11) NOT NULL,
  `type` text COLLATE utf8_bin NOT NULL,
  `avatar` text COLLATE utf8_bin NOT NULL,
  `weaponDmg` int(11) NOT NULL,
  `armor` int(11) NOT NULL,
  `magicResist` int(11) NOT NULL,
  `block` int(11) NOT NULL,
  `critMultipler` int(11) NOT NULL,
  `intelligence` int(11) NOT NULL,
  `strength` int(11) NOT NULL,
  `dexterity` int(11) NOT NULL,
  `stamina` int(11) NOT NULL,
  `luck` int(11) NOT NULL,
  `Archer` int(11) NOT NULL,
  `Assasin` int(11) NOT NULL,
  `DarkMage` int(11) NOT NULL,
  `Mage` int(11) NOT NULL,
  `Palladin` int(11) NOT NULL,
  `Warrior` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `eq`
--

INSERT INTO `eq` (`id`, `username`, `name`, `isEquiped`, `type`, `avatar`, `weaponDmg`, `armor`, `magicResist`, `block`, `critMultipler`, `intelligence`, `strength`, `dexterity`, `stamina`, `luck`, `Archer`, `Assasin`, `DarkMage`, `Mage`, `Palladin`, `Warrior`) VALUES
(1, 'LewyMistrz', 'Dildo pała', 1, 'weapon', 'graphics/avatar/dildoPala.png', 69, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_bin NOT NULL,
  `text` text COLLATE utf8_bin NOT NULL,
  `author` text COLLATE utf8_bin NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `news`
--

INSERT INTO `news` (`id`, `title`, `text`, `author`, `data`) VALUES
(1, 'a', 'c', 'b', '2018-10-30'),
(2, 'chce', 'newsa', 'napisac', '2018-10-30');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `nickname` varchar(20) COLLATE utf8_bin NOT NULL,
  `email` text COLLATE utf8_bin NOT NULL,
  `password` text COLLATE utf8_bin NOT NULL,
  `server` text COLLATE utf8_bin NOT NULL,
  `gold` int(11) NOT NULL,
  `realCash` int(11) NOT NULL,
  `ChampionClass` text COLLATE utf8_bin NOT NULL,
  `expa` int(11) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `verifyText` text COLLATE utf8_bin NOT NULL,
  `isVerified` tinyint(1) NOT NULL,
  `registerTime` datetime NOT NULL,
  `loginTime` datetime NOT NULL,
  `ip` varchar(15) COLLATE utf8_bin NOT NULL,
  `avatar` text COLLATE utf8_bin NOT NULL,
  `lvl` int(11) NOT NULL,
  `dmgStat` int(11) NOT NULL,
  `stamina` int(11) NOT NULL,
  `speed` int(11) NOT NULL,
  `dexterity` int(11) NOT NULL,
  `luck` int(11) NOT NULL,
  `fights` int(11) NOT NULL,
  `troph` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`nickname`, `email`, `password`, `server`, `gold`, `realCash`, `ChampionClass`, `expa`, `gender`, `verifyText`, `isVerified`, `registerTime`, `loginTime`, `ip`, `avatar`, `lvl`, `dmgStat`, `stamina`, `speed`, `dexterity`, `luck`, `fights`, `troph`) VALUES
('LewyMistrz', 'lewandowskimaciek82@gmail.com', '1306ddb0dbdb2cb13d5f06b39db13f3083372afc81e234f71710dd8df7065d70', 'W1', 5, 10, 'Assasin', 0, 0, '4fdc8d7d404bc07349ffce4cd89e1086a602d2d0333732a7b0c917314035492d', 0, '2018-11-06 15:50:45', '2018-11-19 08:47:57', '::1', 'graphics/avatar/null.png', 1, 16, 12, 12, 12, 12, 0, 0),
('admin', 'admin@admin.pl', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'W1', 0, 123456779, 'Assasin', 0, 0, '59279341ea59fbf34025024596b670b6df2c9f80e71b9ad19aea71ba43b083fc', 0, '2018-11-06 16:19:17', '2018-11-06 16:19:17', '::1', 'graphics/avatar/null.png', 1, 10, 10, 10, 10, 10, 0, 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `eq`
--
ALTER TABLE `eq`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`nickname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `eq`
--
ALTER TABLE `eq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
