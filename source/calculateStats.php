<?php 
require "connectToDatabase.php";
	
	$DMGquer="select dmgStat from users where nickname='$login'";
	$dmgMYSQL= mysqli_query($i, $DMGquer);
	$dmg = mysqli_fetch_array($dmgMYSQL);
	//$dmg[0] = $dmg[0] * rand(75, 125) /100; // mnożone razy critchance 

	$LVLquer="select lvl from users where nickname='$login'";
	$lvlMYSQL= mysqli_query($i, $LVLquer);
	$lvl = mysqli_fetch_array($lvlMYSQL);
	
	$STAMINAquer="select stamina from users where nickname='$login'";
	$staminaMYSQL= mysqli_query($i, $STAMINAquer);
	$stamina = mysqli_fetch_array($staminaMYSQL);

	$LUCKquer="select luck from users where nickname='$login'";
	$luckMYSQL= mysqli_query($i, $LUCKquer);
	$luck = mysqli_fetch_array($luckMYSQL);
	$luck[0] = $luck[0] *2 / $lvl[0]; // luck nie chce mi sie robic opisow lol chyba ogarniesz

	$GOLDquer="select gold from users where nickname='$login'";
	$goldMYSQL= mysqli_query($i, $GOLDquer);
	$gold = mysqli_fetch_array($goldMYSQL);

	$REALCASHquer="select realCash from users where nickname='$login'";
	$realCashMYSQL= mysqli_query($i, $REALCASHquer);
	$realCash = mysqli_fetch_array($realCashMYSQL);

	$SERVERquer="select server from users where nickname='$login'";
	$serverMYSQL= mysqli_query($i, $SERVERquer);
	$server = mysqli_fetch_array($serverMYSQL);

	$CLASSquer="select ChampionClass from users where nickname='$login'";
	$classMYSQL= mysqli_query($i, $CLASSquer);
	$class = mysqli_fetch_array($classMYSQL);
	
	
	$SPEEDquer="select speed from users where nickname='$login'";
	$speedMYSQL= mysqli_query($i, $SPEEDquer);
	$speed = mysqli_fetch_array($speedMYSQL);
	
	$FIGHTSquer="select fights from users where nickname='$login'";
	$fightsMYSQL= mysqli_query($i, $FIGHTSquer);
	$fights = mysqli_fetch_array($fightsMYSQL);
	
	
	$TROPHquer="select fights from users where nickname='$login'";
	$trophMYSQL= mysqli_query($i, $TROPHquer);
	$troph = mysqli_fetch_array($trophMYSQL);
	

	$WEAPONquer="select id from eq where username='$login' AND isEquiped=1 AND type='weapon'";
	$weaponMYSQL= mysqli_query($i, $WEAPONquer);
	$weapon = mysqli_fetch_array($weaponMYSQL);
	

//$quer="select critMultipler from eq where nickname='$login'";
//$critMultiplerMYSQL= mysqli_query($i, $quer);
//$critMultipler = mysqli_fetch_array($critMultiplerMYSQL);


	//$critMultiplier = //tutaj dodac wszystkie statystyki z przedmiotow zalozonych
	//if ($critMultipler > 3.5)
	//	$critMultipler = 3.5;

	//if ($class[0] == "Palladin" || $class[0] == "Warrior")
	//$block = ;
	//if ($class[0] == "Palladin" || $block > 35)
	//	$block = 35;
	//if ($class[0] == "Warrior" || $block > 25)
	//	$block = 25;
	
	//$critChance = $luck[0] / enemyLvl;
	
	$dodge = $speed[0] / $lvl[0];

	$hp = $stamina[0] * $lvl[0];

	if($class[0] == "Archer" || $class[0] == "Assasin")
		$dmgStatName = "Zręczność";
	else if($class[0] == "Palladin" || $class[0] == "Warrior")
		$dmgStatName = "Siła";
	else if($class[0] == "Mage" || $class[0] == "Dark mage")
		$dmgStatName = "Inteligencja";
	
?> 
