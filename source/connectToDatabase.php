<?php
$i = mysqli_connect('localhost','root', '');
mysqli_select_db($i, "a");
mysqli_query($i, "SET CHARSET utf8");
mysqli_query($i, "SET NAMES `utf8` COLLATE `utf8_polish_ci`"); 
?>