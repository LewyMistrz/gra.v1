<?php
session_start();
require 'connectToDatabase.php';
require 'filtruj.php';
$login = $_SESSION['login'];

if(isset($_POST['plus'])) {
	$GOLDquer="select gold from users where nickname='$login'";
	$goldMYSQL= mysqli_query($i, $GOLDquer);
	$gold = mysqli_fetch_array($goldMYSQL);
	$stat = filtruj($_POST['plus']);
	$s = 0;
	if ($stat == "inteligence") {
		if ($gold[0] >= "10"){
			mysqli_query($i, "UPDATE users SET dmgStat= dmgStat +1 WHERE nickname='$login'");
			mysqli_query($i, "UPDATE users SET gold= gold -10 WHERE nickname='$login'");
			$s = 1;
		} else echo "nie stać Cię pało";
	}
	if ($stat == "stamina") {
		if ($gold[0] >= "10"){
			mysqli_query($i, "UPDATE users SET stamina= stamina +1 WHERE nickname='$login'");
			mysqli_query($i, "UPDATE users SET gold= gold -10 WHERE nickname='$login'");
			$s = 1;
		} else echo "nie stać Cię pało";
	} 
	if ($stat == "luck") {
		if ($gold[0] >= "10"){
			mysqli_query($i, "UPDATE users SET luck= luck +1 WHERE nickname='$login'");
			mysqli_query($i, "UPDATE users SET gold= gold -10 WHERE nickname='$login'");
			$s = 1;
		} else echo "nie stać Cię pało";
	}
	if ($stat == "speed") {
		if ($gold[0] >= "10"){
			mysqli_query($i, "UPDATE users SET speed= speed +1 WHERE nickname='$login'");
			mysqli_query($i, "UPDATE users SET gold= gold -10 WHERE nickname='$login'");
			$s = 1;
		} else echo "nie stać Cię pało";
	}
	if ($stat == "dexterity") {
		if ($gold[0] >= "10"){
			mysqli_query($i, "UPDATE users SET dexterity= dexterity +1 WHERE nickname='$login'");
			mysqli_query($i, "UPDATE users SET gold= gold -10 WHERE nickname='$login'");
			$s = 1;
		} else echo "nie stać Cię pało";
	}
	if($s == 0)
		echo "nieprawdidłowa statystyka cepie";
	else echo "dodano punkty";
}
?>