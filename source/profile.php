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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="script.js"></script>


<font style="font-family: Font" color="white">
<h1><p>
<font style="font-family: Font" color="white"><a href="logout.php"><p class="date">Wyloguj</a></br>
</p>

<img src="\graphics\to do.png" alt="Smiley face" align="right">

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
if($login == $_SESSION['login']) {
?>

<button class='button' type='submit' value='inteligence' onclick="setStat('inteligence');">+</button>

<button class='button' type='submit' value='stamina' onclick="setStat('stamina');">+</button>

<button class='button' type='submit' value='luck' onclick="setStat('luck');">+</button>

<button class='button' type='submit' value='speed' onclick="setStat('speed');">+</button>

<button class='button' type='submit' value='dexterity' onclick="setStat('dexterity');">+</button>

<?php 
} 
?>

<center><font size="7" color="white">Poziom <span id='lvl'></span> <font size="5"></br></br></br></h1>

<center><font color="silver"> <span id='dmgStatName'> </span> <font color="white"> <span id='dmgStat'></span>
<font color="silver"></b> Obrażenia <font color="white"><span id='dmg'> </span></br>

<font color="silver">Wytrzymałość <font color="white"> <span id='stamina'></span>
<font color="silver"></b>Punkty życia <font color="white"><span id='hp'></span></br>

<font color="silver">Szczęście <font color="white"><span id='luck'></span>
<font color="silver"></b>Trafienie krytyczne <font color="white"><span id='critChance'></span>%</br>

<font color="silver">Szybkość <font color="white"><span id='speed'></span>
<font color="silver"></b>Szansa na unik <font color="white"><span id='dodgeChance'></span>%</br>

<font color="silver">Multiplikator <font color="white">NIE ZROBIONO
<font color="silver"></b>Mnożnik traf. kryt. <font color="white">NIE ZROBIONO x</br>
<notice - użyłem $playerSpeed dla sprawdzenia wyniku, zmienić na $critMultipler>

<font color="silver">Punkty bloku <font color="white"><span id='block'></span>
<font color="silver"></b>Szansa na blok <font color="white"><span id='blockChance'></span>%</br>

<Script>
	nick = getNick();
	if(document.getElementById("nick"))
		nick = document.getElementById("nick").innerHTML;
	showStat();
	
	function showStat() {
		var stat = JSON.parse(getStat(nick));
		
		document.getElementById("dmgStatName").innerHTML = whichClass(stat);	
		document.getElementById("dmgStat").innerHTML = stat.dmgStat;
		document.getElementById("dmg").innerHTML = stat.dmg;
		document.getElementById("stamina").innerHTML = stat.stamina;
		document.getElementById("luck").innerHTML = stat.luck;
		document.getElementById("speed").innerHTML = stat.speed;
		document.getElementById("lvl").innerHTML = stat.lvl;
		document.getElementById("server").innerHTML = stat.server;
		document.getElementById("realCash").innerHTML =stat.realCash;
		document.getElementById("gold").innerHTML = stat.gold;
		document.getElementById("hp").innerHTML = stat.stamina * stat.lvl;
		document.getElementById("critChance").innerHTML = stat.luck * stat.lvl;
		document.getElementById("dodgeChance").innerHTML = stat.speed * stat.lvl;
	}	
</script>
</body>