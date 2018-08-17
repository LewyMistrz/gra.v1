<?php

$link = mysqli_connect("127.0.0.1", "root", "", "gra.v1");
$link->query(" CREATE TABLE `users` (
  `nickname` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `server` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `gold` int(11) NOT NULL,
  `realCash` int(11) NOT NULL,
  `ChampionClass` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `exp` int(11) NOT NULL,
  `gender` tinyint(1) NOT NULL
)");



?>