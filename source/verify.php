<?php
require 'connectToDatabase.php';
require 'filtruj.php';

$name = filtruj($_GET['name']);
$verifyText = filtruj($_GET['verifyText']);

$quer = "SELECT nickname from users where nickname='$name' and isVerified=0";
$search = mysqli_query($i, $quer); 

if(mysqli_num_rows($search)!=0)
{
        // We have a match, activate the account
	$query=  "UPDATE users SET isVerified=1, realCash= realCash +10 WHERE nickname='$name'";
    mysqli_query($i, $query);
	echo 'our account has been activated, you can now login';
}
	else
        echo 'The url is either invalid or you already have activated your account.';
    
?>