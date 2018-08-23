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

if (isset($_POST['register']))
{
   $login = filtruj($_POST['nickName']);
   $haslo1 = filtruj($_POST['password']);
   $haslo2 = filtruj($_POST['marek']);
   $email = filtruj($_POST['email']);
   // sprawdzamy czy login nie jest już w bazie
	if (mysqli_num_rows(mysqli_query($i, "SELECT nickname FROM users WHERE nickname = '".$login."';")) == 0)
	{
		if (mysqli_num_rows(mysqli_query($i, "SELECT email FROM users WHERE email = '".$email."';")) == 0)
		{
			if ($haslo1 == $haslo2) // sprawdzamy czy hasła takie same
			{
				mysqli_query($i, "INSERT INTO users (nickname, email, password, server, gold, realCash, ChampionClass, expa, gender, registerTime)
				VALUE( '".$login."', '".$email."', '".hash('sha256', $haslo1)."', 'W1', 0, 0, 'wojownik', 0, 0, '".date('Y-m-d H:i:s')."' )");
				echo "Konto zostało utworzone!";
			}
			else echo "Hasła nie są takie same";
		}
		else echo "Podany email jest już zajęty.";
	}
	else echo "Podany login jest już zajęty.";
}
?>
<head>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<Script>

setInterval(lookForNickChange, 200);

function lookForNickChange()
{
		newNick = document.getElementById("nickName").value
		var nick;
    if (newNick != nick) {
        nick = newNick;
        isLoginAvaible(newNick);
    }
}

function isLoginAvaible(login){
	link = 'isLoginUsed.php?name=' + login; 
	var data;
	jQuery.ajax({
        url: link,
        type: 'GET',
        dataType: 'text',
        success:function(data)
        {
			if(data == 1) {
				document.getElementById("nickName").setAttribute("style", "background-color: red;");
			} else { 
				document.getElementById("nickName").setAttribute("style", "background-color: green;");
			}	
        } 
     });
	 
	
}

</script>

</head>


<body>

<form method="POST" action="register.php">

Login: <input type="text" id="nickName" name="nickName">		</br> 
Email: <input type="text" id="email"	name="email"   >		</br> 
Password: 		 <input type="Password" id="password" name="password">		</br> 
Retype Password: <input type="Password" id="marek" name="marek">		</br> 
Choose player class <input type="" id="playerClass" name="class">   {potem poprawic na liste rozwijana}	</br>
<input type="submit" value="Zarejestruj" name="register"/>
</form>
</body>

