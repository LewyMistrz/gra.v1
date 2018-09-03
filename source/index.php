<?php
session_start();
if (!isset($_SESSION['login'])){
	
//tutaj cała strona główna bez zalogowania
?>
<head><script type="text/javascript">
setInterval(rotate, 50);
	var deg = 0;
function rotate(){
	deg+=18;
	var img=document.getElementById('1').style = 'transform: rotate(' + deg + 'deg)';
}

</script></head>
<body bgcolor="red" style="background-image:url(logo2.png)">
<center><font size="7" color="yellow"><b>HITLER MEIN FURHER</font>
</br>
<font size="7" color="RED"><b>KILL ALL THE JEWS KILL ALL THE JEWS  KILL ALL THE JEWS KILL ALL THE JEWS KILL ALL THE JEWS KILL ALL THE JEWS KILL ALL THE JEWS KILL ALL THE JEWS KILL ALL THE JEWS KILL ALL THE JEWS KILL ALL THE JEWS KILL ALL THE JEWS KILL ALL THE JEWS KILL ALL THE JEWS KILL ALL THE JEWS KILL ALL THE JEWS KILL ALL THE JEWS KILL ALL THE JEWS KILL ALL THE JEWS KILL ALL THE JEWS KILL ALL THE JEWS KILL ALL THE JEWS KILL ALL THE JEWS KILL ALL THE JEWS KILL ALL THE JEWS KILL ALL THE JEWS KILL ALL THE JEWS  </font>
</br></br>
<center><img src="logo.png" height="400" width="400" onclick="rotate();" id="1" style="transform: rotate(180deg)">
</br></br></br>
<center><a href="register.php">Rejestracja</a> zarejestruj zjebie
<a href="login.php">Logowanie</a> zaloguj się może?
<a href="logout.php">Lodziaut</a> wyloguj bez zalogowania
</center>






}





<?php
}
else {
//tutaj cała strona główna po zalogowaniu
?>
<center><font color="red" size="7"><b>Pomyślnie zalogowano. A teraz się pierdol</b></center></font>
</br>
<a href="register.php">Rejestracja</a> mulciak
<a href="login.php">Logowanie</a> Alzheimer?
<a href="logout.php">Lodziaut</a> wkurwia mnie już ta gra/kolega wyjebał z domu













<?php
}

?>