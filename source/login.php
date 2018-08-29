<head>

</head>

<body>

<form method="POST" action="login.php">
<b>Login:</b> <input type="text" name="login"><br>
<b>Hasło:</b> <input type="password" name="haslo"><br>
<input type="submit" value="Zaloguj" name="loguj">


</form>

</body>

<?php
require 'connectToDatabase.php';

function filtruj($zmienna)
{
	require 'connectToDatabase.php';

    if(get_magic_quotes_gpc())
        $zmienna = stripslashes($zmienna); 
		$zmienna = htmlspecialchars(trim($zmienna));
        $zmienna = mysqli_real_escape_string($i, $zmienna);
		 return $zmienna;
}
 
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
   else echo "Wpisano złe dane.";
}

?>