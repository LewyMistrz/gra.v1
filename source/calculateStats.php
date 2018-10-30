<?php 
require "connectToDatabase.php";
	
	if (isset($_SESSION['login']))
		$login = $_SESSION['login'];
		
	if (isset($_POST['login']))
		$login = $_POST['login'];
	
	
	$DMGquer="select dmgStat from player where nickname='$login'";
	$dmgMYSQL= mysqli_query($i, $DMGquer);
	$dmg = mysqli_fetch_array($dmgMYSQL);
	$dmg[0] = $dmg[0] * rand(75, 125) /100; // mnożone razy critchance 

	$LVLquer="select lvl from player where nickname='$login'";
	$lvlMYSQL= mysqli_query($i, $LVLquer);
	$lvl = mysqli_fetch_array($lvlMYSQL);
	
	$STAMINAquer="select stamina from player where nickname='$login'";
	$staminaMYSQL= mysqli_query($i, $STAMINAquer);
	$stamina = mysqli_fetch_array($staminaMYSQL);
	$stamina[0] = $stamina[0] * $lvl[0] *5; // stamina mnożona przez level a nastepnie mnożona na pięć

	$LUCKquer="select luck from player where nickname='$login'";
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
	
	
	$SPEEDquer="select speed from player where nickname='$login'";
	$speedMYSQL= mysqli_query($i, $SPEEDquer);
	$speed = mysqli_fetch_array($speedMYSQL);
	
	$FIGHTSquer="select fights from player where nickname='$login'";
	$fightsMYSQL= mysqli_query($i, $FIGHTSquer);
	$fights = mysqli_fetch_array($fightsMYSQL);
	

//$quer="select critMultipler from eq where nickname='$login'";
//$critMultiplerMYSQL= mysqli_query($i, $quer);
//$critMultipler = mysqli_fetch_array($critMultiplerMYSQL);


	if($class[0] == "Archer" || $class[0] == "Assasin")
		$dmgStatName = "Zręczność";
	else if($class[0] == "Palladin" || $class[0] == "Warrior")
		$dmgStatName = "Siła";
	else if($class[0] == "Mage" || $class[0] == "Dark mage")
		$dmgStatName = "Inteligencja";
	
?> 
