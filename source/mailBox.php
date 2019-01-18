<?php
session_start();

require("connectToDatabase.php");
require("filtruj.php");

if (isset($_SESSION['login'])){
	
		$login = $_SESSION['login'];
	
	//zrobic odebrane
	
	
	
	//tutaj wstepna wersja formularza wysylania
	?>
	<form action="" method="post">
	tytuł: <input type="text" name="tytul">
	<br/>odbiorca <input type="text" name="odbiorca">
	<br/>treść <textarea name="tresc" rows="10" cols="50"></textarea>
	<br/><input type="submit" value="Dodaj"></form>
	<?php
	
	
	//wstepna wersja wysylania
	if (isset($_POST['odbiorca']) AND $_POST['odbiorca'] != null ) {
		if (isset($_POST['tytul']) AND $_POST['tytul'] != null ) {
			if (isset($_POST['tresc']) AND $_POST['tresc'] != null ) {		
						$query = mysqli_query($i, "insert into message 
						values('".filtruj($_POST['tytul'])."', '".filtruj($_POST['tresc'])."','".$login."', '".filtruj($_POST['odbiorca'])."', 0 )");
						echo "wyslano";
			} else echo "pole treść nie może być puste";
		} else echo "pole tytuł nie może być puste";	
	} else echo "pole odbiorca nie moze być puste";	
	
	
	//tutaj wstepna wersja skrzynki odbiorczej
	$query = mysqli_query($i, "select * from message where recipient='".$login."'");
while($rekord = mysqli_fetch_array($query))
{
$naz = "<div id='element'>
			<div id='name'>
				<h1>Tytuł: $rekord[1] | Autor: $rekord[3]</h1>
			</div>
			<div id='inne'>
				<p>$rekord[2]</p>
			</div>
		</div> </br>

		";
		echo '<ul>'.$naz.'</ul>';
}
	
	
}else header("Location: login.php");	
?> 