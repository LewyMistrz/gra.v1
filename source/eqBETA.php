 <?php 
 
 session_start();
$login = $_SESSION["login"];
require("connectToDatabase.php");

$butyquer="select avatar from eq where username='$login' and type='buty' and isEquiped=1";
	$butyMYSQL= mysqli_query($i, $butyquer);
	$buty = mysqli_fetch_array($butyMYSQL);
	
$weaponquer="select avatar from eq where username='$login' and type='weapon' and isEquiped=1";
	$weaponMYSQL= mysqli_query($i, $weaponquer);
	$weapon = mysqli_fetch_array($weaponMYSQL);
	
$bpierscienquer="select avatar from eq where username='$login' and type='pierscien' and isEquiped=1";
	$pierscienMYSQL= mysqli_query($i, $bpierscienquer);
	$pierscien = mysqli_fetch_array($pierscienMYSQL);
		
		
		//test powiodl sie, jesli nie ma żadnego przedmiotu nie ma errora tylko puste pole
if ($weapon[0] == "graphics/avatar/dildoPala.png")
	echo "pierdolnij sie w łeb";

 echo"
<table border='5'>
<tr>
	<td>buty</td>	<td><img src='$buty[0]'></td>
</tr>
<tr>
	<td>broń</td>	<td><img src='$weapon[0]'></td>
</tr>
<tr>
	<td>pierscien</td>	<td><img src='$pierscien[0]'></td>
</tr>
</table>
 ";
 
 
 function isEquippingAvaible($login, $item) {
	 
	 if (item[$login['ChampionClass']] == 1)
		return 1;
	 else return 0;
 }
 
  ?>