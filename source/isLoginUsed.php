<?php
require 'connectToDatabase.php';
$login = $_GET["name"];

$loguj="select nickname from users where nickname='$login'"; 
$rekordy = mysqli_query($i, $loguj);
if(mysqli_num_rows($rekordy)==0)
{

echo 0;
}
else
{	
echo 1;
}
?>