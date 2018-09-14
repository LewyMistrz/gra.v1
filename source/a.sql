-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 14 Wrz 2018, 20:16
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
  `lucky` int(11) NOT NULL,
  `weaponDmg` int(11) NOT NULL,
  `armor` int(11) NOT NULL,
  `magicResist` int(11) NOT NULL,
  `block` int(11) NOT NULL,
  `critMultipler` int(11) NOT NULL,
  `intelligence` int(11) NOT NULL,
  `strength` int(11) NOT NULL,
  `speed` int(11) NOT NULL,
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
  `playerStamina` int(11) NOT NULL,
  `playerSpeed` int(11) NOT NULL,
  `playerDexterity` int(11) NOT NULL,
  `playerLuck` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
  `registerTime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
