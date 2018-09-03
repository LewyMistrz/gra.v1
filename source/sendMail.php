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
    $mail->Username = 'eveningstudios@gmail.com';          
    $mail->Password = 'bandit14';                      
    $mail->SMTPSecure = 'tls';                   
    $mail->Port = 587; 

    //Recipients
	$mail->setLanguage('pl', 'PHPMailer\language');
    $mail->setFrom('lewandowskimaciek82@gmail.com', 'Mailer');
    $mail->addAddress($email, $email);
    //Content
    $mail->isHTML(false);  
    $mail->Subject = 'Weryfikacja maila';
    $mail->Body    = "
 
Potwierdź swój email, aby otrzymać 10 chujonsów, ".$name.".
Aby potwierdzić, kliknij w poniższy link.
http://www.localhost/verify.php?name=".$name."&verifyText=".$verifyText."   ";

    $mail->send();
    echo 'Wiadomość została wysłana';
} catch (Exception $e) {
    echo 'Wiadomość nie mogła zostać wysłana: ', $mail->ErrorInfo;
}

}


function sendLostPasswordMail($email, $verifyText) {
	
$mail = new PHPMailer(true);
try {
$mail->SMTPDebug = 0;                          
    $mail->isSMTP();                                      
    $mail->Host = 'smtp.gmail.com';  
    $mail->SMTPAuth = true;                  
    $mail->Username = 'eveningstudios@gmail.com';          
    $mail->Password = 'bandit14';                      
    $mail->SMTPSecure = 'tls';                   
    $mail->Port = 587; 

    //Recipients
	$mail->setLanguage('pl', 'PHPMailer\language');
    $mail->setFrom('eveningstudios@gmail.com', 'Mailer');
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