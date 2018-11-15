<head>
</head>

<body>
<?php
session_start();
if (!isset($_SESSION['login'])){
?>
<div element="right">

<style>

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

</style>

<h1 style="Margin-top: 20%">

<font size="7"><b>
<center><a href="login.php"><font style="font-family: Font">Logowanie</a></font></b>
<center><a href="register.php"><font style="font-family: Font">Rejestracja</a></br>

<?php
}
else {
?>

<style>

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

p.date {
    text-align: right;
}

p.main {
    text-align: justify;
}
</style>
<h1><p>
<font style="font-family: Font" color="white"><a href="logout.php"><p class="date">Wyloguj</a></br>
</p>
<font size="5" color="white">Świat <font color="yellow"><span id='server'></span></br>
<font size="5" color="white">Hajs <font color="yellow"><span id='realCash'></span></br>
<font size="5" color="white">Złoto <font color="yellow"><span id='gold'></span></br></br>

<font style="font-family: Font" color="white"><a href="profile.php">Profil</a></br>
<font style="font-family: Font" color="white"><a href="arena.php">Arena</a></br>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="script.js"></script>
<Script>
	nick = getNick();
	var stat = JSON.parse(getStat(nick));
	document.getElementById("server").innerHTML = stat.server;
	document.getElementById("realCash").innerHTML = stat.realCash;
	document.getElementById("gold").innerHTML = stat.gold;

</script>

</body>
<?php
}
?>