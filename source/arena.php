<?php
session_start();
if (isset($_SESSION['login'])){
	$login = $_SESSION['login'];
require 'connectToDatabase.php';
require 'filtruj.php';
require "calculateStats.php";
?>

<style>
input[name="atak"] {
    font-size: 20px;
    width: 10%;
	font-weight: bold;
	font-type: Font;
    background-color: red;
    color: white;
    padding: 12px 12px;
    margin: 20px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[name="newEnemy"] {
    font-size: 20px;
    width: 15%;
	font-weight: bold;
	font-type: Font;
    background-color: blue;
    color: white;
    padding: 12px 12px;
    margin: 20px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

h1 {
    text-shadow: 0px 0px 15px black;
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

div{
  position: relative;
}
img{
    position: absolute;
    margin: auto;
    top: 30%;
    bottom: 0;
    left: 35%;
}

div.a {
    position: absolute;
    margin: auto;
    top: 40%;
    bottom: 0;
    left: 70%;
}

div.b {
    position: absolute;
    margin: auto;
    top: 40%;
    bottom: 0;
    left: 5%;
}

div.c {
    position: absolute;
    margin: auto;
    top: 90%;
    bottom: 0;
    left: 0.1%;
    width: 99%;
}


</style>

<head>

</head>

<body>
<h1>
<a href="profile.php">spierdalam elo</a>
<font size=5 style="font-family: Font" color="white">
<center><font color="red"><b>Odbyt</b><font color="white">e walki: <font color="yellow"> <span id='fights'> </span> <font color="white">/<font color="yellow">15</br><font color="white">
Walcząc na arenie zdobywasz doświadczenie!</br>
Czy chesz się zmierzyć z przeciwnikiem <font color="yellow">&enemyUsername<font color="white">?</br>
<input type="submit" value="Zmień przeciwnika" name="newEnemy" onclick="changeEnemy();"></br></br>

<div class="b">
<b><font color="orange" size="6	">Twoje statystyki</b></font></br></br>
<font color="white">Klasa <font color="yellow"> <span id='class'> </span> </br>
<font color="white">Poziom <font color="yellow"> <span id='lvl'> </span> </br>
<font color="white"> <span id='dmgStatName'> </span> <font color="yellow"><span id='dmgStat'> </span></br>
<font color="white">HP <font color="yellow"> <span id='stamina'> </span> </br>
<font color="white">Cios krytyczny <font color="yellow">szansa na</br>
<font color="white">Mnożnik kryt. <font color="yellow">mnoznikCrit</br>
<font color="white">Blok <font color="yellow">szansa na</br>
</div>

<div class="a">
<b><font color="orange" size="6	">Statystyki przeciwnika</b></font></br></br>
<font color="white">Klasa <font color="yellow">class</br>
<font color="white">Poziom <font color="yellow">lvl</br>
<font color="white">$dmgStatName <font color="yellow">dmgStatAmount</br>
<font color="white">HP <font color="yellow">HP</br>
<font color="white">Cios krytyczny <font color="yellow">szansa na</br>
<font color="white">Mnożnik kryt. <font color="yellow">mnoznikCrit</br>
<font color="white">Blok <font color="yellow">szansa na</br>
</div>

<img src="graphics/postac.jpg">

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="script.js"></script>
<Script>
nick = getNick();
var stat = JSON.parse(getStat(nick));

document.getElementById("class").innerHTML = stat.ChampionClass;
document.getElementById("fights").innerHTML = stat.fights;
document.getElementById("dmgStat").innerHTML = stat.dmgStat;
document.getElementById("stamina").innerHTML = stat.stamina;
document.getElementById("lvl").innerHTML = stat.lvl;
document.getElementById("dmgStatName").innerHTML = whichClass(stat);
</script>

</body>
<?php
if ($fights[0] < 15)
echo "<div class='c'></br><input type='submit' value='Atak!' name='atak' onclick='atakuj();'></div></br>";
else echo "<div class='c'>nie masz już energii</div></br>";
}
else header("Location: login.php");
?>