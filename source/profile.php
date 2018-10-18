<?php
session_start();
if (isset($_SESSION['login'])){
	
require 'connectToDatabase.php';
require 'filtruj.php';

$username = $_SESSION['login'];
$quer="select gold from users where nickname='$username'";
$goldMYSQL= mysqli_query($i, $quer);
$gold = mysqli_fetch_array($goldMYSQL);

$quer="select realCash from users where nickname='$username'";
$realCashMYSQL= mysqli_query($i, $quer);
$realCash = mysqli_fetch_array($realCashMYSQL);

$quer="select server from users where nickname='$username'";
$serverMYSQL= mysqli_query($i, $quer);
$server = mysqli_fetch_array($serverMYSQL);

$quer="select playerStamina from player where nickname='$username'";
$playerStaminaMYSQL= mysqli_query($i, $quer);
$playerStamina = mysqli_fetch_array($playerStaminaMYSQL);

$quer="select playerLuck from player where nickname='$username'";
$playerLuckMYSQL= mysqli_query($i, $quer);
$playerLuck = mysqli_fetch_array($playerLuckMYSQL);

$quer="select dmgStat from player where nickname='$username'";
$dmgStat= mysqli_query($i, $quer);
$dmgStat = mysqli_fetch_array($dmgStat);

$quer="select lvl from player where nickname='$username'";
$lvl= mysqli_query($i, $quer);
$lvl = mysqli_fetch_array($lvl);

$quer="select playerSpeed from player where nickname='$username'";
$playerSpeedMYSQL= mysqli_query($i, $quer);
$playerSpeed = mysqli_fetch_array($playerSpeedMYSQL);

$quer="select critMultipler from eq where nickname='$username'";
$critMultiplerMYSQL= mysqli_query($i, $quer);
$critMultipler = mysqli_fetch_array($critMultiplerMYSQL);

if(isset($_POST['plus'])) {
	$stat = filtruj($_POST['plus']);
	if ($stat == "inteligence") {
		if ($gold[0] >= "9"){
			mysqli_query($i, "UPDATE player SET dmgStat= dmgStat +1 WHERE nickname='$username'");
			mysqli_query($i, "UPDATE users SET gold= gold -10 WHERE nickname='$username'");
		}
	}
	if ($stat == "stamina") {
		if ($gold[0] >= "9"){
			mysqli_query($i, "UPDATE player SET playerStamina= playerStamina +1 WHERE nickname='$username'");
			mysqli_query($i, "UPDATE users SET gold= gold -10 WHERE nickname='$username'");
		}
	} 
	if ($stat == "luck") {
		if ($gold[0] >= "9"){
			mysqli_query($i, "UPDATE player SET playerLuck= playerLuck +1 WHERE nickname='$username'");
			mysqli_query($i, "UPDATE users SET gold= gold -10 WHERE nickname='$username'");
		}
	}
	if ($stat == "speed") {
		if ($gold[0] >= "9"){
			mysqli_query($i, "UPDATE player SET playerSpeed= playerSpeed +1 WHERE nickname='$username'");
			mysqli_query($i, "UPDATE users SET gold= gold -10 WHERE nickname='$username'");
		}
	}

	header("Location: profile.php"); 
}

?>
<style>
h1 {
    text-shadow: 0px 0px 2px black;
}

@font-face {
font-family: Font;
src: url(/font.ttf);
}

body{
background-attachment: fixed;
background-image: url("graphics/bg.jpg");
background-size: 100%;
background-repeat: no-repeat;
background-attachment: fixed;
}

$username = $_SESSION['login'];
$quer="select gold from users where nickname='$username'";
$goldMYSQL= mysqli_query($i, $quer);
$gold = mysql_fetch_array($goldMYSQL);


a:link {
    color: white; 	
    background-color: transparent; 
    text-decoration: none;
}

a:visited {
    color: white;
    background-color: transparent;
    text-decoration: none;
}

a:hover {
    color: yellow;
    background-color: transparent;
    text-decoration: none;
}

a:active {
    color: yellow;
    background-color: transparent;
    text-decoration: none;
}

p.date {
    text-align: right;
}

p.main {
    text-align: justify;
}

input[type=submit] {
    font-size: 23px;
    width: 30px;
	height: 30px;
	font-weight: bold;
	font-type: Font;
    background-color: #ca8600;
    color: white;
    padding: 0px 0px;
    margin: 0px 0;
    border: none;
    border-radius: 100px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #cac200;
</style>
<font style="font-family: Font" color="white">
<h1><p>
<font style="font-family: Font" color="white"><a href="logout.php"><p class="date">Wyloguj</a></br>
</p>
<font size="5" color="white">Świat <font color="yellow"><?php echo $server[0] ?></br>
<font size="5" color="white">Hajs <font color="yellow"><?php echo $realCash[0] ?></br>
<font size="5" color="white">Złoto <font color="yellow"><?php echo $gold[0] ?></br></br></br>

<font style="font-family: Font" color="white"><a href="profile.php">Profil</a></br>
<font style="font-family: Font" color="white"><a href="arena.php">Arena</a></br>

<h2>
	
<form method="POST" action="profile.php">
<input type="submit" value="inteligence" name="plus">

<form method="POST" action="profile.php">
<input type="submit" value="stamina" name="plus">

<center><font size="7" color="white">Poziom <?php echo $lvl[0] ?><font size="5"></br></br></br></h1>

<center><font color="silver">Inteligencja <font color="white"><?php echo $dmgStat[0] ?> 
<font color="silver"></b> Obrażenia <font color="white"><?php echo $dmgStat[0] * 0.75?> - <?php echo $dmgStat[0] * 1.25?></br>

<font color="silver">Wytrzymałość <font color="white"><?php echo $playerStamina[0]?> 
<font color="silver"></b>Punkty życia <font color="white"><?php echo $playerStamina[0] * $lvl[0]?></br>

<font color="silver">Szczęście <font color="white"><?php echo $playerLuck[0]?> 
<font color="silver"></b>Trafienie krytyczne <font color="white"><?php echo $playerStamina[0]*2 / $lvl[0]?>%</br>

<font color="silver">Szybkość <font color="white"><?php echo $playerSpeed[0]?> 
<font color="silver"></b>Szansa na unik <font color="white"><?php echo $playerSpeed[0]*5 / $lvl[0]/3?>%</br>

<font color="silver">Multiplikator <font color="white"><?php echo $dmgStat[0]?> 
<font color="silver"></b>Mnożnik traf. kryt. <font color="white"><?php echo 1.5 + $dmgStat[0]/100 / $lvl[0]?>x</br>
<notice - użyłem $playerSpeed dla sprawdzenia wyniku, zmienić na $critMultipler>

<font color="silver">Punkty bloku <font color="white"><?php echo $playerStamina[0]?> 
<font color="silver"></b>Szansa na blok <font color="white"><?php echo $playerStamina[0] / ($lvl[0]*2)?>%</br>

	
<?php	
}
else header("Location: login.php");

?>