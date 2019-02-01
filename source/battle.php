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
	if (isset($_GET['enemy'])) {
	$login = $_SESSION['login'];
	
	require "connectToDatabase.php";
	require "filtruj.php";
	include "getStat.php";
	require "lang.php";
	
	$enemy = filtruj($_GET['enemy']);
	$stat = getStat($login);
	$enemyStat = getStat($enemy);
	
	$loguj="select nickname from users where nickname='$enemy'"; 
	$rekordy = mysqli_query($i, $loguj);
	if(mysqli_num_rows($rekordy)==0)
		$isLoginUsed = 0;
	else $isLoginUsed = 1;
	if ($isLoginUsed == 0)
		echo printText(5);
	else {
		mysqli_query($i, "UPDATE users SET fights= fights +1 WHERE nickname='$login'");
	
		$c = rand(0, 1);
	
		$win = 2; 
	
		while ($win > 1) {
			echo "</br>";
		
			$critDmg = $stat["itemDmg"] * 2;
			$enemyCritDmg = $enemyStat["itemDmg"] * 2;
		
			$dmg = $stat["itemDmg"] * rand(75, 125) /100;
			$dmg = round( $dmg, 2);
			
			$enemydmg = $enemyStat["itemDmg"] * rand(75, 125) /100;	
			$enemydmg = round( $enemydmg, 2);
			if( $c == 0)
				{
				if ((rand(-100, 0)+$stat['critChance']) > 0) {
					$enemyStat["hp"]  -= $stat['itemDmg'] * 2;
					echo( "Zadałeś " .($stat['itemDmg'] * 2). " dmg</br>");
					// tutaj animacja jak jebniesz krytem
				}
				else {
					$enemyStat["hp"]  -= $stat["itemDmg"];
					echo( "Zadałeś " .$stat["itemDmg"]. " dmg</br>");
					// tutaj animacja jak jebniesz 
				}
				$c = 1;
			}	
			else if ( $c == 1) {
				if((rand(-100, 0)+$enemyStat['critChance']) > 0) {
					$stat['hp'] -= $enemyStat['itemDmg'] * 2;
					echo( "Przeciwnik zadał " .($enemyStat['itemDmg'] * 2). " dmg</br>");
					// tutaj animacja jak przeciwnik cie jebnie krytem
				}
				else {
					$stat["hp"] -= $enemyStat["itemDmg"];
					echo( "Przeciwnik zadał " .$enemyStat["itemDmg"]. " dmg</br>");
					// tutaj jak cie jebnie bez kryta
				}
				$c = 0;
			}	
			if ($stat["hp"] <= 0) {
				printText(1);
				
				$gold = $stat["gold"] * 0.05;
				mysqli_query($i, "UPDATE users SET gold=gold + '$gold' WHERE nickname='$enemy'");
				mysqli_query($i, "UPDATE users SET gold=gold - '$gold' WHERE nickname='$login'");
				
				$win = 1;
			}		
			if ($enemyStat["hp"] <= 0) {
				printText(6);
				
				$gold = $enemyStat["gold"] * 0.05;
				mysqli_query($i, "UPDATE users SET gold=gold - '$gold' WHERE nickname='$enemy'");
				mysqli_query($i, "UPDATE users SET gold=gold + '$gold' WHERE nickname='$login'");
				
				$win = 0;	
			}
		};
	}
	} else header("Location: arena.php");
} else header("Location: login.php");
?>
