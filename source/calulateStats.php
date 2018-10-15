<?php 
require "connectToDatabase.php";

	$DMGquer="select dmgStat from player where nickname='$login'";
	$dmgMYSQL= mysqli_query($i, $DMGquer);
	$dmg = mysqli_fetch_array($dmgMYSQL);
	$dmg[0] = $dmg[0] * rand(75, 125) /100; // mnożone razy critchance 


?> 
