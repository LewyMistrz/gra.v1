<?php
if (isset($_POST['nick'])){
	require "connectToDatabase.php";
	require "filtruj.php";
	$login = filtruj($_POST['nick']);
	$STATquer="select server, gold, realCash, ChampionClass, expa, lvl, dmgStat, stamina, speed, dexterity, luck, fights, troph from users where nickname='".$login."'";
	$statMYSQL= mysqli_query($i, $STATquer);
	$state = mysqli_fetch_array($statMYSQL);
	
	$WEAPONquer="select id from eq where username='$login' AND isEquiped='1' AND type='weapon'";
	$weaponMYSQL= mysqli_query($i, $WEAPONquer);
	$weapon = mysqli_fetch_array($weaponMYSQL);
	
	$state['weaponid'] = $weapon[0]; 
	
	echo json_encode($state);
} else {
	if ($_POST["stat"] == "nick") {
		session_start();
		if (isset($_SESSION['login'])){
			echo $_SESSION['login'];
		}
	}
}

