<?php
session_start();
if (isset($_SESSION['login'])){
	require "connectToDatabase.php";
	$query = mysqli_query($i, "select nickname, troph from users order by troph");
	while($rekord = mysqli_fetch_array($query))
	{
		$naz = "Nick: <a href='profile.php?nick=$rekord[0]'>$rekord[0]</a> | Troph: $rekord[1]";
		echo '<ul>'.$naz.'</ul>';
	}
}
else header("Location: login.php");
?>