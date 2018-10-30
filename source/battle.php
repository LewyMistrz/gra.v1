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
	
	require "connectToDatabase.php";
	require "filtruj.php";
	require "calculateStats.php";

	$enemy = filtruj($_GET['enemy']);
	
	$quer = "select dmgStat from player where nickname='$enemy'";
	$enemydmgMYSQL = mysqli_query($i, $quer);
	$enemydmg = mysqli_fetch_array($enemydmgMYSQL);
	$enemydmg[0] = $enemydmg[0] * rand(75, 125) /100;
	
	$quer = "select lvl from player where nickname='$enemy'";
	$enemylvlMYSQL = mysqli_query($i, $quer);
	$enemylvl = mysqli_fetch_array($enemylvlMYSQL);
	
	$quer = "select stamina from player where nickname='$enemy'";
	$enemystaminaMYSQL = mysqli_query($i, $quer);
	$enemystamina = mysqli_fetch_array($enemystaminaMYSQL);
	$enemystamina[0]  = $enemystamina[0]  * $enemylvl[0] *5 ;
	
	$i = rand(0, 1);
	
	$win = 2; 
	
	while ($win > 1) {
		echo "</br>";
		
		$critDmg = $dmg[0] * 2;
		$enemyCritDmg = $enemydmg[0] * 2;
		
		$dmg[0] = $dmg[0] * rand(75, 125) /100;
		$dmg[0] = round( $dmg[0], 2);
		$enemydmg[0] = $enemydmg[0] * rand(75, 125) /100;	
		$enemydmg[0] = round( $enemydmg[0], 2);
		if( $i == 0)
		{
			//if ((rand(-100, 0)+$critChance) > 0) {
			//	$enemystamina[0]  -= $critDmg;
			//	echo( "Zadałeś " .$critDmg. " dmg</br>");
			//     }
			//else {
				$enemystamina[0]  -= $dmg[0] ;
				echo( "Zadałeś " .$dmg[0]. " dmg</br>");
			//     }
			$i = 1;
		}	
		else if ( $i == 1)
		{
			//if((rand(-100, 0)+$enemycritChance) > 0) {
			//	$stamina[0]  -= $enemyCritDmg;
			//	echo( "Przeciwnik zadał " .$enemyCritDmg. " dmg</br>");
			//     }
			//else {
				$stamina[0]  -= $dmg[0] ;
				echo( "Przeciwnik zadał " .$enemydmg[0]. " dmg</br>");
			//     }
			$i = 0;
		}	
		
		if ($stamina[0] <= 0) {
			echo "</br>Przegrałeś</br>";
			$win = 1;
		}
		if ($enemystamina[0] <= 0) {
			echo "</br>Wygrałeś</br>";
			$win = 0;
		}
	};
}
else header("Location: login.php");
?>
