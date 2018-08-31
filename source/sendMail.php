<?php

function sendVerifyMail($mail, $verifyText, $name) {

$to      = $mail; // Send email to our user
$subject = 'Weryfikacja maila'; // Give the email a subject 
$message = "
 
Potwierdź swój email '".$name."'
Nagroda 10 waluty premium
Kliknij poniższy link:
http://www.localhost/verify.php?name='".$name."''&verifyText='".$verifyText."'   "; // Our message above including the link
                     
$headers = 'From:noreply@game.com' . "\r\n"; // Set from headers
mail($to, $subject, $message, $headers); // Send our email
}
function sendLostPasswordMail($mail, $verifyText) {
	
$to      = $mail; // Send email to our user
$subject = 'Weryfikacja maila'; // Give the email a subject 
$message = "
 
Żeby zresetować hasło kliknij poniższy link
http://www.localhost/lostPassword.php?email='".$mail."''&verifyText='".$verifyText."'   "; // Our message above including the link
                     
$headers = 'From:noreply@game.com' . "\r\n"; // Set from headers
mail($to, $subject, $message, $headers); // Send our email
}

?>