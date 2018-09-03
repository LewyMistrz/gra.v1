<?php
require 'connectToDatabase.php';
require 'sendMail.php';
require 'filtruj.php';

if (isset($_POST['register']))
{
   $login = filtruj($_POST['nickName']);
   $haslo1 = filtruj($_POST['password']);
   $haslo2 = filtruj($_POST['marek']);
   $email = filtruj($_POST['email']);
   $championClass = filtruj($_POST['championClass']);
   $verifyText = hash('sha256', rand(0, 5000));
   // sprawdzamy czy login nie jest już w bazie
   
   if ($championClass == "Archer" || $championClass == "Assasin" || $championClass == "Dark mage" || $championClass == "Mage" || 
   $championClass == "Palladin" || $championClass == "Shaman" || $championClass == "Warrior")
   {
	    if (strlen($login) <= 15  )
		{	
			if (mysqli_num_rows(mysqli_query($i, "SELECT nickname FROM users WHERE nickname = '".$login."';")) == 0)
			{
				if (mysqli_num_rows(mysqli_query($i, "SELECT email FROM users WHERE email = '".$email."';")) == 0)
				{
					if ($haslo1 == $haslo2) // sprawdzamy czy hasła takie same
					{
						if ( !empty($login) )
						{   
							if (!empty($haslo1) )
							{
								if ( !empty($email) ) 
								{
									if(filter_var($email, FILTER_VALIDATE_EMAIL))
									{
									mysqli_query($i, "INSERT INTO users (nickname, email, password, server, gold, realCash, championClass, expa, gender, verifyText, isVerified, registerTime)
									VALUE( '".$login."', '".$email."', '".hash('sha256', $haslo1)."', 'W1', 0, 10, '".$championClass."', 0, 0,'".$verifyText."', 0, '".date('Y-m-d H:i:s')."' )");
									echo "Konto zostało utworzone!";
									sendVerifyMail($email, $verifyText, $login);
									header("Location: login.php"); 
									}
									else echo "Email nieprawidłowy";
								}	
								else echo "Pole email nie może być puste";
							}	
							else echo "Pole hasło nie może być puste";
						}		
						else echo "Pole login nie może być pusty";	
					}
					else echo "Hasła nie są takie same";
				}
				else echo "Podany email jest już zajęty.";
			}
			else echo "Podany login jest już zajęty.";
		}
		else echo "Podany login jest za długi";
	}
	else echo "error nieprawidłowa klasa";
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

Login: <input type="text" id="nickName" name="nickName" maxlength=15>		</br> 
Email: <input type="text" id="email"	name="email"   >		</br> 
Password: 		 <input type="Password" id="password" name="password">		</br> 
Retype Password: <input type="Password" id="marek" name="marek">		</br> 
Choose player class 
		<select name="championClass">
		<option>Archer</option>
		<option>Assasin</option>
		<option>Dark mage</option>
		<option>Mage</option>
		<option>Palladin</option>
		<option>Shaman</option>
		<option>Warrior</option>
		</select> </br>
<input type="submit" value="Zarejestruj" name="register"/>
</form>
</body>

