<?php
if (isset($_POST['nick'])){
	require "connectToDatabase.php";
	require "filtruj.php";
	$login = filtruj($_POST['nick']);
	$STATquer="select dmgStat, stamina, lvl, server, realCash, gold, luck, speed, ChampionClass, fights from users where nickname='".$login."'";
	$statMYSQL= mysqli_query($i, $STATquer);
	$state = mysqli_fetch_array($statMYSQL);
	echo json_encode($state);
} else {
	if ($_POST["stat"] == "nick") {
		session_start();
		if (isset($_SESSION['login'])){
			echo $_SESSION['login'];
		}
	}
}

