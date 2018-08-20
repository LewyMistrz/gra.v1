<head>
<script type="text/javascript">

function isLoginAvaible(){
	alert("Login zajęty");
	
}

function isEmailAvaible() {
	alert("email zajęty");
	
}

function isRetypedPasswordSame(){
	alert("wprowadzone hasła nie są takie same");
	
}

function register(){
	alert("cwel");
	
	
}

</script>

</head>



<body>
Login: <input type="text" name="nickName">		</br> 
Email: <input type="text" name="email">		</br> 
Password: <input type="password" name="password">		</br> 
Retype Password: <input type="password" name="retypePassword">		</br> 
Choose player class <input type="" name="playerClass">{potem poprawic na liste rozwijana}		</br>
Choose server <input type="" name="server">{potem poprawic na liste rozwijana}		</br>
<input type="button" value="Zarejestruj" onclick="register();"/>
</body>


<?php

$i = mysqli_connect('localhost','admin', 'admin');
mysql_select_db($i, "gra.v1");

$email;

$nickName;

$password;

$playerClass;

$server;


?>

