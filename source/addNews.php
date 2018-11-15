<form action="" method="post">
tytuł: <input type="text" name="tytul">
<br/>autor <input type="text" name="autor">
<br/>treść <textarea name="tresc" rows="10" cols="50"></textarea>
<br/><input type="submit" value="Dodaj"></form>
<?php
session_start();

require("connectToDatabase.php");
require("filtruj.php");
 
if(isset($_SESSION['zalogowany']))
{
	if($_SESSION['zalogowany'] == true) 
	{
		if($_SESSION['login'] == "admin")
		{
			if (isset($_POST['autor']) AND $_POST['autor'] != null ) 
			{
				if (isset($_POST['tytul']) AND $_POST['tytul'] != null ) 
				{
					if (isset($_POST['tytul']) AND $_POST['tytul'] != null ) 
					{		
						$query = mysqli_query($i, "insert into news values('','".filtruj($_POST['tytul'])."', '".filtruj($_POST['tresc'])."','".filtruj($_POST['autor'])."',now())");

					} else echo "pole treść nie może być puste";
				} else echo "pole tytuł nie może być puste";	
			} else echo "pole autor nie moze być puste";	
		} else echo "nie masz uprawnień";
	}else header("Location: login.php"); 
} else header("Location: login.php"); 
?>