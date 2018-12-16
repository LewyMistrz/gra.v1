<?php
if (isset(/*$_GET*/$_POST['nick'])){
	require "connectToDatabase.php";
	
	require "filtruj.php";
	$login = filtruj(/*$_GET*/$_POST['nick']);
	
	
	$STATquer="select server, gold, realCash, ChampionClass, expa, lvl, dmgStat, stamina, speed, dexterity, luck, fights, troph from users where nickname='$login'";
	$statMYSQL= mysqli_query($i, $STATquer);
	$state = mysqli_fetch_array($statMYSQL, MYSQLI_ASSOC);
	
	$WEAPONquer="select id from eq where username='$login' AND isEquiped='1' AND type='weapon'";
	$weaponMYSQL= mysqli_query($i, $WEAPONquer);
	$weapon = mysqli_fetch_array($weaponMYSQL);
	
	$WEAPONSTATquer="select * from eq where username='$login' AND id='$weapon[0]'";
	$weaponstatMYSQL= mysqli_query($i, $WEAPONSTATquer);
	$ws = mysqli_fetch_array($weaponstatMYSQL, MYSQLI_ASSOC);
	
	$critChance = $state['luck'] / $state['lvl'];
	if ($critChance >= 50)
		$critChance = 50;
	
	$dodge = $state['speed'] / $state['lvl'];
	$hp = $state['stamina'] * $state['lvl'];
	$return = array_merge($state, $ws);
	
	$return["critChance"] = $critChance;
	$return["dodge"] = $dodge;
	$return["hp"] = $hp;
	
	
	echo json_encode($return);
} else {
	if (isset($_POST['stat'])) {
		if ($_POST["stat"] == "nick") {
			session_start();
			if (isset($_SESSION['login'])){
				echo $_SESSION['login'];
			}
		}	
	}
}

function getStat($login){
	require "connectToDatabase.php";
	$STATquer="select server, gold, realCash, ChampionClass, expa, lvl, dmgStat, stamina, speed, dexterity, luck, fights, troph from users where nickname='$login'";
	$statMYSQL= mysqli_query($i, $STATquer);
	$state = mysqli_fetch_array($statMYSQL, MYSQLI_ASSOC);
	
	$WEAPONquer="select id from eq where username='$login' AND isEquiped='1' AND type='weapon'";
	$weaponMYSQL= mysqli_query($i, $WEAPONquer);
	$weapon = mysqli_fetch_array($weaponMYSQL);
	
	$WEAPONSTATquer="select * from eq where username='$login' AND id='$weapon[0]'";
	$weaponstatMYSQL= mysqli_query($i, $WEAPONSTATquer);
	$ws = mysqli_fetch_array($weaponstatMYSQL, MYSQLI_ASSOC);
	
	$critChance = $state['luck'] / $state['lvl'];
	if ($critChance >= 50)
		$critChance = 50;
	
	$dodge = $state['speed'] / $state['lvl'];
	$hp = $state['stamina'] * $state['lvl'];
	$return = array_merge($state, $ws);
	
	$return["critChance"] = $critChance;
	$return["dodge"] = $dodge;
	$return["hp"] = $hp;
	return $return;
}