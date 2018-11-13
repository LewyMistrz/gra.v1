<?php
session_start();
require 'connectToDatabase.php';
require 'filtruj.php';
if (isset($_SESSION['login'])){
	
	$login = $_SESSION['login'];
	
	if(isset($_GET['nick']))
	{
		$login = filtruj($_GET['nick']);
		$loguj="select nickname from users where nickname='$login'"; 
			$rekordy = mysqli_query($i, $loguj);
			if(mysqli_num_rows($rekordy)==0)
				$isLoginUsed = 0;
			else $isLoginUsed = 1;
		if ($isLoginUsed == 0)
			header("Location: profile.php");
	} 
	
require "calculateStats.php";

if($login == $_SESSION['login'])
	if(isset($_POST['plus'])) {
		$stat = filtruj($_POST['plus']);
		if ($stat == "inteligence") {
			if ($gold[0] >= "10"){
				mysqli_query($i, "UPDATE users SET dmgStat= dmgStat +1 WHERE nickname='$login'");
				mysqli_query($i, "UPDATE users SET gold= gold -10 WHERE nickname='$login'");
			}
		}
		if ($stat == "stamina") {
			if ($gold[0] >= "10"){
				mysqli_query($i, "UPDATE users SET stamina= stamina +1 WHERE nickname='$login'");
				mysqli_query($i, "UPDATE users SET gold= gold -10 WHERE nickname='$login'");
			}
		} 
		if ($stat == "luck") {
			if ($gold[0] >= "10"){
				mysqli_query($i, "UPDATE users SET luck= luck +1 WHERE nickname='$login'");
				mysqli_query($i, "UPDATE users SET gold= gold -10 WHERE nickname='$login'");
			}
		}
		if ($stat == "speed") {
			if ($gold[0] >= "10"){
				mysqli_query($i, "UPDATE users SET speed= speed +1 WHERE nickname='$login'");
				mysqli_query($i, "UPDATE users SET gold= gold -10 WHERE nickname='$login'");
			}
		}
		if ($stat == "dexterity") {
			if ($gold[0] >= "10"){
				mysqli_query($i, "UPDATE users SET dexterity= dexterity +1 WHERE nickname='$login'");
				mysqli_query($i, "UPDATE users SET gold= gold -10 WHERE nickname='$login'");
			}
		}
		header("Location: profile.php"); 
	}
}
else header("Location: login.php");
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

.button {
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
<head>

</head>
<body>
<font style="font-family: Font" color="white">
<h1><p>
<font style="font-family: Font" color="white"><a href="logout.php"><p class="date">Wyloguj</a></br>
</p>
<?php
if($login != $_SESSION['login'])
echo " <center>Nick: <span id='nick'>$login</span> </center> </br>";	
?>
<font size="5" color="white">Świat <font color="yellow"> <span id='server'></span> </br>
<font size="5" color="white">Hajs <font color="yellow"> <span id='realCash'></span> </br>
<font size="5" color="white">Złoto <font color="yellow"> <span id='gold'></span> </br></br></br>

<font style="font-family: Font" color="white"><a href="profile.php">Profil</a></br>
<font style="font-family: Font" color="white"><a href="arena.php">Arena</a></br>

<h2>
<?php
if($login == $_SESSION['login'])
	echo "
<form method='POST' action='profile.php'>
<button class='button' type='submit' value='inteligence' name='plus'>+</button>

<form method='POST' action='profile.php'>
<button class='button' type='submit' value='stamina' name='plus'>+</button>

<form method='POST' action='profile.php'>
<button class='button' type='submit' value='luck' name='plus'>+</button>

<form method='POST' action='profile.php'>
<button class='button' type='submit' value='speed' name='plus'>+</button>

<form method='POST' action='profile.php'>
<button class='button' type='submit' value='dexterity' name='plus'>+</button>
";
?>

<center><font size="7" color="white">Poziom <span id='lvl'></span> <font size="5"></br></br></br></h1>

<center><font color="silver"> <span id='dmgStatName'> </span> <font color="white"> <span id='dmgStat'></span>
<font color="silver"></b> Obrażenia <font color="white"><?php echo $dmg[0] * 0.75?> - <?php echo $dmg[0] * 1.25 ?></br>

<font color="silver">Wytrzymałość <font color="white"> <span id='stamina'> </span>
<font color="silver"></b>Punkty życia <font color="white"><?php echo $hp ?></br>

<font color="silver">Szczęście <font color="white"><span id='luck'></span>
<font color="silver"></b>Trafienie krytyczne <font color="white"><?php echo $stamina[0]*2 / $lvl[0] ?>%</br>

<font color="silver">Szybkość <font color="white"><span id='speed'></span>
<font color="silver"></b>Szansa na unik <font color="white"><?php echo $speed[0]*5 / $lvl[0]/3 ?>%</br>

<font color="silver">Multiplikator <font color="white"><?php echo $dmg[0]?> 
<font color="silver"></b>Mnożnik traf. kryt. <font color="white"><?php echo 1.5 + $dmg[0]/100 / $lvl[0] ?>x</br>
<notice - użyłem $playerSpeed dla sprawdzenia wyniku, zmienić na $critMultipler>

<font color="silver">Punkty bloku <font color="white"><?php echo $stamina[0] ?> 
<font color="silver"></b>Szansa na blok <font color="white"><?php echo $stamina[0] / ($lvl[0]*2) ?>%</br>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="script.js"></script>
<Script>
	nick = getNick();
	if(document.getElementById("nick"))
		nick = document.getElementById("nick").innerHTML;
	var stat = JSON.parse(getStat(nick));

	document.getElementById("dmgStat").innerHTML = stat.dmgStat;
	document.getElementById("stamina").innerHTML = stat.stamina;
	document.getElementById("lvl").innerHTML = stat.lvl;
	document.getElementById("server").innerHTML = stat.server;
	document.getElementById("realCash").innerHTML =stat.realCash;
	document.getElementById("gold").innerHTML = stat.gold;
	document.getElementById("luck").innerHTML = stat.luck;
	document.getElementById("speed").innerHTML = stat.speed;
	document.getElementById("dmgStatName").innerHTML = whichClass(stat);
</script>
</body>