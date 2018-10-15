<?php 
require "connectToDatabase.php";

	$DMGquer="select dmgStat from player where nickname='$login'";
	$dmgMYSQL= mysqli_query($i, $DMGquer);
	$dmg = mysqli_fetch_array($dmgMYSQL);
	$dmg[0] = $dmg[0] * rand(75, 125) /100; // mnożone razy critchance 

	$LVLquer="select lvl from player where nickname='$login'";
	$lvlMYSQL= mysqli_query($i, $LVLquer);
	$lvl = mysqli_fetch_array($lvlMYSQL);
	
	$STAMINAquer="select playerStamina from player where nickname='$login'";
	$staminaMYSQL= mysqli_query($i, $STAMINAquer);
	$stamina = mysqli_fetch_array($staminaMYSQL);
	$stamina[0] = $stamina[0] * $lvl[0] *5; // stamina mnożona przez level a nastepnie mnożona na pięć



?> 
