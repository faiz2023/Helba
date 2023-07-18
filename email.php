<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

if(isset($_POST['send'])){
    $name = htmlentities($_POST['name']);
    $email = htmlentities((!empty($_POST['email'])?$_POST['email']:'NA'));
    $phone = htmlentities($_POST['phone']);
    $message = htmlentities($_POST['message']);
    $subject = "you have received new mail" ;

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'enquiryinfofsd@gmail.com';
    $mail->Password = 'ttxtthqplznwoljt';
    $mail->Port = 465;
    $mail->SMTPSecure = 'ssl';
    $mail->isHTML(true);
    $mail->setFrom('faizmppkl@gmail.com');
    $mail->addAddress('faizmppkl@gmail.com');
    $mail->Subject = ("$subject from $name");

    $mail->Body =
    "name:" .$name . "<br>".
    "phone:" .$phone ."<br>".
    "email:" .$email . "<br>".
    "message:" .$message; 

    if($mail->send()){
        $status = "success";
        $response = "Email is sent!";
        
    }
    else
    {
        $status = "failed";
        $response = "Something is wrong: <br>" . $mail->ErrorInfo;
        
    }

    header('Location: index.html');
}


?>
