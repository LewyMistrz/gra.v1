<?php
session_start();
if (!isset($_SESSION['login'])){
	
//tutaj cała strona główna bez zalogowania
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
require 'connectToDatabase.php';

$username = $_SESSION['login'];
$quer="select gold from users where nickname='$username'";
$goldMYSQL= mysqli_query($i, $quer);
$gold = mysqli_fetch_array($goldMYSQL);

$username = $_SESSION['login'];
$quer="select realCash from users where nickname='$username'";
$realCashMYSQL= mysqli_query($i, $quer);
$realCash = mysqli_fetch_array($realCashMYSQL);

$username = $_SESSION['login'];
$quer="select server from users where nickname='$username'";
$serverMYSQL= mysqli_query($i, $quer);
$server = mysqli_fetch_array($serverMYSQL);
//tutaj cała strona główna po zalogowaniu 
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
</style>
<h1><p>
<font style="font-family: Font" color="white"><a href="logout.php"><p class="date">Wyloguj</a></br>
</p>
<font size="5" color="white">Świat <font color="yellow"><?php echo $server[0] ?></br>
<font size="5" color="white">Hajs <font color="yellow"><?php echo $realCash[0] ?></br>
<font size="5" color="white">Złoto <font color="yellow"><?php echo $gold[0] ?></br></br>

<font style="font-family: Font" color="white"><a href="profile.php">Profil</a></br>
<font style="font-family: Font" color="white"><a href="arena.php">Arena</a></br>

<?php
}

?>