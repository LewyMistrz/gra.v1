<?php 
require "connectToDatabase.php";

$quer="select dmgStat from player where nickname='$login'";
	$dmgMYSQL= mysqli_query($i, $quer);
	$dmg = mysqli_fetch_array($dmgMYSQL);
	$dmg[0] = $dmg[0] * rand(75, 125) /100;


?> 
