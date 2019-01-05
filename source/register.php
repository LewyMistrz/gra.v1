<?php
require 'connectToDatabase.php';
require 'sendMail.php';
require 'filtruj.php';

session_start(); 
if (isset($_SESSION['login'])){
	header("Location: profile.php");
	exit();
}

if (isset($_POST['register']))
{
   $login = filtruj($_POST['nickName']);
   $haslo1 = filtruj($_POST['password']);
   $haslo2 = filtruj($_POST['marek']);
   $email = filtruj($_POST['email']);
   $championClass = filtruj($_POST['championClass']);
   $verifyText = hash('sha256', rand(0, 500000));
   
   if ($championClass == "Archer" || $championClass == "Assasin" || $championClass == "Dark mage" || $championClass == "Mage" || 
		$championClass == "Palladin" || $championClass == "Warrior") {
	    if (strlen($login) <= 15  ) {	
			if (mysqli_num_rows(mysqli_query($i, "SELECT nickname FROM users WHERE nickname = '".$login."';")) == 0) {
				if (mysqli_num_rows(mysqli_query($i, "SELECT email FROM users WHERE email = '".$email."';")) == 0) {
					if ($haslo1 == $haslo2) {
						if ( !empty($login) ) {   
							if (!empty($haslo1) ) {
								if ( !empty($email) ) {
									if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
										
										mysqli_query($i, "INSERT INTO users (nickname, email, password, server, gold, realCash, championClass, expa, gender, verifyText, isVerified, registerTime, loginTime, ip, avatar, lvl, dmgStat, stamina, speed, dexterity, luck, fights, troph)     
														VALUE( '".$login."', '".$email."', '".hash('sha256', $haslo1)."', 'W1', 0, 10, '".$championClass."', 0, 0,'".$verifyText."', 0, '".date('Y-m-d H:i:s')."', '".date('Y-m-d H:i:s')."', '".$_SERVER['REMOTE_ADDR']."', 'graphics/\avatar\/null.png', 1, 10, 10, 10, 10, 10, 0, 0 )");
									
										$_SESSION['zalogowany'] = true;
										$_SESSION['login'] = $login;
										echo "Konto zostało utworzone!";
									
										sendVerifyMail($email, $verifyText, $login);
										header("Location: profile.php"); 
										
									} else echo "Email nieprawidłowy";
								} else echo "Pole E-Mail nie może być puste";
							} else echo "Pole hasło nie może być puste";
						} else echo "Pole login nie może być pusty";	
					} else echo "Hasła nie są takie same";
				} else echo "Podany email jest już zajęty.";
			} else echo "Podany login jest już zajęty.";
		} else echo "Podany login jest za długi";
	} else echo "Nieprawidłowa klasa";
}	
?>
<head>

</head>
<body>
<style>
h1 {
    text-shadow: 0px 0px 20px black;
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
	font-size: 40%;
    width: 20%;
    padding: 12px 20px;
    margin: 4px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=password], select {
	text-align: center;
	font-size: 40%;
    width: 20%;
    padding: 14px 20px;
    margin: 4px 0;
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

.button {
    background-color: #1967e5;
	border-style: solid;
	border-width: 8px;
	border-color: #1967e5;
    padding: 15px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
}

</style>

<h1 style="Margin-top: 3%">
<center><form method="POST" action="register.php">
<font style="font-family: Font" color="white" size="5">
<h1>Login</br><input type="text" id="nickName" name="nickName" maxlength=15></br> 
E-Mail</br><input type="text" id="email"name="email"></br> 
Hasło</br><input type="Password" id="password" name="password"></br> 
Powtórz hasło</br><input type="Password" id="marek" name="marek"></br> 
Klasa postaci</br>

<button type="button" onClick="chooseClass('Assasin');" class="button" id='1'>Zabójca</button>
<button type="button" onClick="chooseClass('Dark mage');" class="button" id='2'>Ciemny mag</button>
<button type="button" onClick="chooseClass('Mage');" class="button" id='3'>Mag</button>
<button type="button" onClick="chooseClass('Palladin');" class="button" id='4'>Palladyn</button>
<button type="button" onClick="chooseClass('Archer');" class="button" id='5'>Strzelec</button>
<button type="button" onClick="chooseClass('Warrior'); " class="button"id='6'>Wojownik</button>

</br>
<input type="hidden" name="championClass" id="championClass" value="Assasin">
<input type="submit" value="Zarejestruj" name="register"/>
</h1>
</font><font color="white" size="5">Masz już konto? <a href="login.php">Zaloguj</a>
</form>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="script.js"></script>
<Script>
	setInterval(lookForNickChange, 200);

</script>

</body>

