<?php
session_start();
if (isset($_SESSION['login'])){
	$login = $_SESSION['login'];
	require "connectToDatabase.php";
	require "calculateStats.php";

}
else header("Location: login.php");
?>

<font color="black"></b>item <?php echo $weapon[0]?></br>
