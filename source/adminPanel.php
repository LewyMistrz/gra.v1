<?php
if (isset($_SESSION['login'])){
	if ($_SESSION['login']=="admin") {





	} else echo "Nie masz uprawnień";
}else header("Location: login.php");	
?> 