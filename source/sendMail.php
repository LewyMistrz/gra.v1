<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';




function sendVerifyMail($email, $verifyText, $name) {

$mail = new PHPMailer(true);
try {
$mail->SMTPDebug = 0;                          
    $mail->isSMTP();                                      
    $mail->Host = 'smtp.gmail.com';  
    $mail->SMTPAuth = true;                  
    $mail->Username = 'LOGIN_TO_GAME_MAIL' ;          
    $mail->Password = 'PASSWORD_TO_GAME_MAIL' ;                      
    $mail->SMTPSecure = 'tls';                   
    $mail->Port = 587; 

    //Recipients
	$mail->setLanguage('pl', 'PHPMailer\language');
    $mail->setFrom(/*'LOGIN_TO_GAME_MAIL'*/ , 'Mailer');
    $mail->addAddress($email, $email);
    //Content
    $mail->isHTML(false);  
    $mail->Subject = 'Weryfikacja maila';
    $mail->Body    = "
 
Potwierdź swój email '".$name."'
Nagroda 10 waluty premium
Kliknij poniższy link:
http://www.localhost/verify.php?name=".$name."&verifyText=".$verifyText."   ";

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

}


function sendLostPasswordMail($email, $verifyText) {
	
$mail = new PHPMailer(true);
try {
$mail->SMTPDebug = 0;                          
    $mail->isSMTP();                                      
    $mail->Host = 'smtp.gmail.com';  
    $mail->SMTPAuth = true;                  
    $mail->Username = /*'LOGIN_TO_GAME_MAIL'*/ ;          
    $mail->Password = /*'PASSWORD_TO_GAME_MAIL'*/;                      
    $mail->SMTPSecure = 'tls';                   
    $mail->Port = 587; 

    //Recipients
	$mail->setLanguage('pl', 'PHPMailer\language');
    $mail->setFrom('LOGIN_TO_GAME_MAIL', 'Mailer');
    $mail->addAddress($email, $email);
    //Content
    $mail->isHTML(false);  
    $mail->Subject = 'Resetuj haslo';
    $mail->Body    = "
 
Żeby zresetować hasło kliknij poniższy link
http://www.localhost/lostPassword.php?email=".$email."&verifyText=".$verifyText."   ";

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}	

}

?>