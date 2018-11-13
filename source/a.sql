-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 30 Paź 2018, 19:08
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
  `slot` int(11) NOT NULL,
  `username` text COLLATE utf8_bin NOT NULL,
  `name` text COLLATE utf8_bin NOT NULL,
  `isEquiped` int(11) NOT NULL,
  `type` text COLLATE utf8_bin NOT NULL,
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

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `news`
--

CREATE TABLE `news` (
  `title` text COLLATE utf8_bin NOT NULL,
  `text` text COLLATE utf8_bin NOT NULL,
  `author` text COLLATE utf8_bin NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `player`
--

CREATE TABLE `player` (
  `nickname` varchar(15) COLLATE utf8_bin NOT NULL,
  `avatar` text COLLATE utf8_bin NOT NULL,
  `lvl` int(11) NOT NULL,
  `dmgStat` int(11) NOT NULL,
  `stamina` int(11) NOT NULL,
  `speed` int(11) NOT NULL,
  `dexterity` int(11) NOT NULL,
  `luck` int(11) NOT NULL,
  `fights` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `player`
--

INSERT INTO `player` (`nickname`, `avatar`, `lvl`, `dmgStat`, `stamina`, `speed`, `dexterity`, `luck`, `fights`) VALUES
('LewyMistrz', 'graphics/avatar/null.png', 1, 10, 10, 10, 10, 10, 0),
('Mac', 'graphics/avatar/null.png', 1, 10, 10, 10, 10, 10, 0);

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
  `avatar` text COLLATE utf8_bin NOT NULL,
  `lvl` int(11) NOT NULL,
  `dmgStat` int(11) NOT NULL,
  `stamina` int(11) NOT NULL,
  `speed` int(11) NOT NULL,
  `dexterity` int(11) NOT NULL,
  `luck` int(11) NOT NULL,
  `fights` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`nickname`, `email`, `password`, `server`, `gold`, `realCash`, `ChampionClass`, `expa`, `gender`, `verifyText`, `isVerified`, `registerTime`) VALUES
('LewyMistrz', 'lewandowskimaciek82@gmail.com', '1306ddb0dbdb2cb13d5f06b39db13f3083372afc81e234f71710dd8df7065d70', 'W1', 0, 10, 'Assasin', 0, 0, 'b44772b12eec5b5e73b363df835f2f14c12f1c740e99145429f12765e7cee0c8', 0, '2018-10-29 08:18:40'),
('Mac', 'admin@gmail.com', 'ca978112ca1bbdcafac231b39a23dc4da786eff8147c4e72b9807785afee48bb', 'W1', 0, 10, 'Assasin', 0, 0, '2858dcd1057d3eae7f7d5f782167e24b61153c01551450a628cee722509f6529', 0, '2018-10-30 16:32:26');

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
  ADD PRIMARY KEY (`data`);

--
-- Indeksy dla tabeli `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`nickname`),
  ADD KEY `nickname` (`nickname`),
  ADD KEY `nickname_2` (`nickname`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`nickname`),
  ADD KEY `nickname` (`nickname`),
  ADD KEY `nickname_2` (`nickname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `eq`
--
ALTER TABLE `eq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
