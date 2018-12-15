<?php
session_start();
if (isset($_SESSION['login'])){
	$login = $_SESSION['login'];
	require "connectToDatabase.php";
}else header("Location: login.php");
?>
