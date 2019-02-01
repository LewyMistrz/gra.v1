<?php
session_start();
require "connectToDatabase.php";
require "lang.php";
if (isset($_SESSION['login'])){
	if ($_SESSION['login']=="admin") {





	} else printText(4);
}else header("Location: login.php");	
?> 