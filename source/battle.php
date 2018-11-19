<style>
h1 {
    text-shadow: 0px 0px 15px black;
}

body{
background-attachment: fixed;
background-image: url("graphics/bg.jpg");
background-size: 100%;
background-repeat: no-repeat;
background-attachment: fixed;
}

@font-face {
font-family: Font;
src: url(/font.ttf);
}
	
p.date {
    text-align: right;
}

p.main {
    text-align: justify;
}
</style>

<p><h1>
<font size ="5">

<font style="font-family: Font" color="white">

<?php
session_start();
if (isset($_SESSION['login'])){
	
	$login = $_SESSION['login'];
	
	require "connectToDatabase.php";
	require "filtruj.php";
	include "getStat.php";
	
	$stat = json_decode(getStat($login), true);
	$enemyStat = json_decode(getStat("admin"), true);
	
	$enemy = filtruj($_GET['enemy']);
	
	$loguj="select nickname from users where nickname='$enemy'"; 
	$rekordy = mysqli_query($i, $loguj);
	if(mysqli_num_rows($rekordy)==0)
		$isLoginUsed = 0;
	else $isLoginUsed = 1;
	if ($isLoginUsed == 0)
		echo "przeciwnik o takim nicku nie istnieje";
	else {
		$i = rand(0, 1);
	
		$win = 2; 
	
		while ($win > 1) {
			echo "</br>";
		
			$critDmg = $stat["weaponDmg"] * 2;
			$enemyCritDmg = $enemyStat["weaponDmg"] * 2;
		
			$dmg = $stat["weaponDmg"] * rand(75, 125) /100;
			$dmg = round( $dmg, 2);
			
			$enemydmg = $enemyStat["weaponDmg"] * rand(75, 125) /100;	
			$enemydmg = round( $enemydmg, 2);
			if( $i == 0)
				{
				if ((rand(-100, 0)+$stat['critChance']) > 0) {
					$enemyStat["hp"]  -= $stat['weaponDmg'] * 2;
					echo( "Zadałeś " .($stat['weaponDmg'] * 2). " dmg</br>");
				     }
				else {
					$enemyStat["hp"]  -= $stat["weaponDmg"];
					echo( "Zadałeś " .$stat["weaponDmg"]. " dmg</br>");
				    }
				$i = 1;
			}	
			else if ( $i == 1)
			{
				if((rand(-100, 0)+$enemyStat['critChance']) > 0) {
					$stat['hp'] -= $enemyStat['weaponDmg'] * 2;
					echo( "Przeciwnik zadał " .($enemyStat['weaponDmg'] * 2). " dmg</br>");
				     }
				else {
				$stat["hp"] -= $enemyStat["weaponDmg"];
					echo( "Przeciwnik zadał " .$enemyStat["weaponDmg"]. " dmg</br>");
				     }
				$i = 0;
			}	
	
			if ($stat["hp"] <= 0) {
				echo "</br>Przegrałeś</br>";
				$win = 1;
			}		
			if ($enemyStat["hp"] <= 0) {
				echo "</br>Wygrałeś</br>";
				$win = 0;
			}
		};
	}
} else header("Location: login.php");
?>
