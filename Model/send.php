<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

//use PHPMailer\PHPMailer\Exception;
//require 'PHPMailer-master/PHPMailerAutoload.php';
require('../PHPMailer-master/src/Exception.php');
require('../PHPMailer-master/src/PHPMailer.php');
require('../PHPMailer-master/src/SMTP.php');
include('../Core/User.php');
if(isset($_POST['submit']))
{   $email=$_POST['email'];
    //echo $email;
    $password="";
    $liste="";
    $sql = "SELECT * FROM user where email='$email'";
    $db = config::getConnexion();
    try{
        $liste = $db->query($sql);
        foreach($liste as $list)
        {
           $password=$list['password'];
           $username=$list['username'];
            
         }
    }
    catch (Exception $e){
        die('Erreur: '.$e->getMessage());
    }
  
    $mail=new PHPMailer;
    //$mail->SMTPDebug =SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host='smtp.gmail.com';
    $mail->SMTPAuth= true;
    $mail->SMTPSecure=PHPMailer::ENCRYPTION_STARTTLS;
    
    $mail->Username='abidmahmoud13.18@gmail.com';
    $mail->Password='klrqaukmxndsynnq';
    //$mail->SMTPSecure='ssl';
    $mail->Port=587;
    $mail->setFrom("exmple@gmail.com");
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject="Requperation password ";
    $mail->Body="Dear ".$username.",

    We have received a request to reset the password for your account. Your new password is a combination of numbers, and special characters to ensure maximum security. We have included a temporary password below:
    
    Your new Password is : 123 <br>
    
    We recommend that you change this temporary password as soon as possible to ensure the security of your account. Please note that this password is only valid for a limited time and will expire after 3 days.
    
    If you did not request a password reset, please contact our support team immediately.
    
    Thank you for using our service.
    
    Best regards,
    
    BookFlix";
    $mail->send();
     if(!$mail->send())
     {
         echo "mail error is : ". $mail->ErrorInfo;
     }
     else
     {
        CrudUser::Update_Password($email);
        header('Location: ../View/LoginPage.php');
     }

}
?>