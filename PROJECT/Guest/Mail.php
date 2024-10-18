<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../Assets/phpMail/src/Exception.php';
require '../Assets/phpMail/src/PHPMailer.php';
require '../Assets/phpMail/src/SMTP.php';

function VerifyEmail($email,$name)
{
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'virtuallibrary530@gmail.com'; // Your gmail
    // Name:Project
    $mail->Password = 'whix rtxu nmse tiup'; // Your gmail app password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
  
    $mail->setFrom('virtuallibrary530@gmail.com'); // Your gmail
  
    $mail->addAddress($email);
  
    $mail->isHTML(true);
    // $message ="";
    $mail->Subject = "Hello ".$name."Welcome to VL - Registration Confirmation";  //Your Subject goes here
    $mail->Body ="Welcome to VL! We're thrilled to have you with us. Your account has been successfully registered"; //Mail Body goes here
    $mail->send();
}
//Newsletter
function newsLetter($email,$name)
{
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'virtuallibrary530@gmail.com'; // Your gmail
    // Name:Project
    $mail->Password = 'whix rtxu nmse tiup'; // Your gmail app password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
  
    $mail->setFrom('virtuallibrary530@gmail.com'); // Your gmail
  
    $mail->addAddress($email);
  
    $mail->isHTML(true);
    // $message ="";
    $mail->Subject = "Thank you!Subscribed to newsletter.";  //Your Subject goes here
    $mail->Body ="Successfuly subscribed to newsletter."; //Mail Body goes here
    $mail->send();
}

?>