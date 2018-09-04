<head>

</head>

<body>

<style>

require 'connectToDatabase.php';

h1 {
    text-shadow: 0px 0px 15px black;
}

$username = $_SESSION['login'];
$quer="select gold from users where nickname='$username'"; 
$goldMYSQL= mysqli_query($i, $quer);
$gold = mysql_fetch_array($goldMYSQL);

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
    color: cyan; 
    background-color: transparent; 
    text-decoration: none;
}

a:visited {
    color: cyan;
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

input[type=text], select {
	font-weight: bold;
	text-align: center;
	font-size: 60%;
    width: 20%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=password], select {
	text-align: center;
	font-size: 60%;
    width: 20%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    font-size: 20px;
    width: 20%;
	font-weight: bold;
	font-type: Font;
    background-color: #1aa009;
    color: white;
    padding: 20px 20px;
    margin: 50px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}


</style>
<h1 style="Margin-top: 14%">
<center><font size="7" color="white" style="font-family: Font">
<form method="POST" action="login.php">

	
<b>Login</b></br><input type="text" name="login"><br>
<b>Hasło</b></br><input type="password" name="haslo"><br>
<input type="submit" value="Zaloguj" name="loguj">
<center></font><font size="4" color="white">Nie masz konta? <a href="register.php">Zarejestruj się</a>


</form>

</body>

<?php
require 'connectToDatabase.php';
require 'filtruj.php';
if (isset($_POST['loguj']))
{
   $login = filtruj($_POST['login']);
   $haslo = filtruj($_POST['haslo']);
   $ip = $_SERVER['REMOTE_ADDR'];
   $data = date('Y-m-d H:i:s');
   // sprawdzamy czy login i hasło są dobre
   $rekordy = mysqli_query($i, "SELECT nickname, password FROM users WHERE nickname = '".$login."' AND password = '".hash('sha256', $haslo)."'");
   if (mysqli_num_rows($rekordy) != 0){
      mysqli_query($i, "UPDATE users SET loginTime='".$data."', ip='".$ip."' WHERE nickname='".$login."'");
	  session_start(); 
      $_SESSION['zalogowany'] = true;
      $_SESSION['login'] = $login;
	  //zalogowany
	  header("Location: index.php"); 
 
   }
   else echo "</br>Wpisano złe dane";
}

?>