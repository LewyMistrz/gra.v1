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
require "connectToDatabase.php";
require "filtruj.php";

session_start();
if (isset($_SESSION['login'])){
	
	$login = filtruj($_SESSION['login']);
	$enemy = filtruj($_GET['enemy']);
	
	$quer="select dmgStat from player where nickname='$login'";
	$dmgMYSQL= mysqli_query($i, $quer);
	$dmg = mysqli_fetch_array($dmgMYSQL);
	$dmg[0] = $dmg[0] * rand(75, 125) /100;
	
	$quer="select lvl from player where nickname='$login'";
	$lvlMYSQL= mysqli_query($i, $quer);
	$lvl = mysqli_fetch_array($lvlMYSQL);
	
	$quer="select 	playerStamina from player where nickname='$login'";
	$staminaMYSQL= mysqli_query($i, $quer);
	$stamina = mysqli_fetch_array($staminaMYSQL);
	
	$stamina[0] = $stamina[0] * $lvl[0] *5 ;
	
	
	$quer="select dmgStat from player where nickname='$enemy'";
	$enemydmgMYSQL= mysqli_query($i, $quer);
	$enemydmg = mysqli_fetch_array($enemydmgMYSQL);
	$enemydmg[0] = $enemydmg[0] * rand(75, 125) /100;
	
	$quer="select lvl from player where nickname='$enemy'";
	$enemylvlMYSQL= mysqli_query($i, $quer);
	$enemylvl = mysqli_fetch_array($enemylvlMYSQL);
	
	$quer="select playerStamina from player where nickname='$enemy'";
	$enemystaminaMYSQL= mysqli_query($i, $quer);
	$enemystamina = mysqli_fetch_array($enemystaminaMYSQL);
	$enemystamina[0]  = $enemystamina[0]  * $enemylvl[0] *5 ;
	
	
	//do debugowania bo nie mam jak 
	
	$quer="select critChance from player where nickname='$enemy'";
	$enemycritChanceMYSQL= mysqli_query($i, $quer);
	$enemycritChance = mysqli_fetch_array($enemycritChanceMYSQL);
	
	$quer="select critChance from player where nickname='$login'";
	$critChanceMYSQL= mysqli_query($i, $quer);
	$critChance = mysqli_fetch_array($critChanceMYSQL);
	
	//tutaj pozniej pobieranie crit dmg z bazy
	/*
	$quer="select playerStamina from player where nickname='$enemy'";
	$enemystaminaMYSQL= mysqli_query($i, $quer);
	$enemystamina = mysqli_fetch_array($enemystaminaMYSQL);
	
	
	$quer="select critDmg from player where nickname='$enemy'";
	$enemystaminaMYSQL= mysqli_query($i, $quer);
	$enemystamina = mysqli_fetch_array($enemystaminaMYSQL);
	*/
	
	//tutaj juz nie
	
	
	$i = rand(0, 1);
	
	$win = 2; 
	
	while ($win > 1) {
		echo "</br>";
		
		//tutaj wartosc critDmg 
		$critDmg = $dmg[0] * 2;
		$enemyCritDmg = $enemydmg[0] * 2;
		
		
		$dmg[0] = ($dmg[0] * rand(75, 125)) /100;
		$enemydmg[0] = $enemydmg[0] * rand(75, 125) /100;	
		
		if ( $i == 0)
		{
			//tutaj obliczanie czy crit
			if ((rand(-100, 0)+$critChance) > 0) {
				$enemystamina[0]  -= $critDmg;
				echo "Zadałeś ";
				echo $critDmg;
				echo " dmg</br>";
			     }
			else {
				$enemystamina[0]  -= $dmg[0] ;
				echo "Zadałeś ";
				echo $dmg[0] ;
				echo " dmg</br>";
			     }
			$i = 1;
		}	
		else if ( $i == 1)
		{
			if ((rand(-100, 0)+$enemycritChance) > 0) {
				$stamina[0]  -= $enemyCritDmg;
				echo "Przeciwnik zadał ";
				echo $enemyCritDmg;
				echo " dmg</br>";
			     }
			else {
				$stamina[0]  -= $dmg[0] ;
				echo "Przeciwnik zadał ";
				echo $enemydmg[0];
				echo " dmg</br>";
			     }
			$i = 0;
		}	
		
		
		
		if ($stamina[0]  <= 0) {
			echo "</br>Przegrałeś</br>";
			$win = 1;
		}
		if ($enemystamina[0]  <= 0) {
			echo "</br></br></br>Wygrałeś</br>";
			$win = 0;
		}
	};
		 
	
	
}
else header("Location: login.php");
	


?>
