<?php
require 'connectToDatabase.php';
require 'filtruj.php';
$login = filtruj($_GET["name"]);

$loguj="select nickname from users where nickname='$login'"; 
$rekordy = mysqli_query($i, $loguj);
if(mysqli_num_rows($rekordy)==0)
{
$isLoginUsed = 0;
echo 0;
}
else
{	
$isLoginUsed = 1;
echo 1;
}
?>