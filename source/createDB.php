<?php

require 'connectToDatabase.php';
mysqli_query($i, "CREATE TABLE `users` (
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
)");



?>