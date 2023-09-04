<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'sendmail/phpmailer/src/Exception.php';
require 'sendmail/phpmailer/src/PHPMailer.php';
require 'sendmail/phpmailer/src/SMTP.php';

if(isset($_POST["envoyer"])){
    $mail=new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'pavlysha7771@gmail.com';
    $mail->Password = 'khqvkbhdwcrdnffi';
    $mail-> SMTPSecure = 'ssl';
    $mail->Port = 456;
    $mail->setFrom('pavlysha7771@gmail.com');
    $mail->addAddress($_POST["mail"]);
    $mail->isHTML(true);
    // $mail->Subject =  $_POST["message"];
    $mail->Body =   $_POST["message"];
    $mail->send();
   
    echo
    "
    <script>
    alert('Merci pour le mail');
    document.location.href = 'index.php';
    </script>
    ";
}
