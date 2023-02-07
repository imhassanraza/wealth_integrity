<?php

$data = $_POST;
$name = $data['name'];
$email = $data['email'];
$message = $data['message'];
$email_body = "<p> Hi,</p>";
$email_body .= "<p> You have a new contact email. </p><br>";
$email_body .= "<p> <b>Email Details:</b></p>";
$email_body .= "<p><b>Name:</b> ". $name ."</p>";
$email_body .= "<p><b>Email:</b> ".$email;
$email_body .= "<p><b>Message:</b> ".$message."</p>";
$email_body .= "<p><b>Thanks</b></p>";

$to = "win@wealth-integrity.com";
$subject = 'Contact Email';
$body = $email_body;
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: '.$name.' <no-reply@wealth-integrity.com>' . "\r\n";
$headers .= "X-Priority: 3\r\n";
$headers .= "X-Mailer: PHP". phpversion() ."\r\n" ;

if(mail($to,$subject,$body,$headers)) {
    $finalResult = array('msg' => 'success', 'response' => "Email successfully sent. We will contact you asap. Thanks");
    echo json_encode($finalResult);
    exit;
} else {
    $finalResult = array('msg' => 'error', 'response' => "Something went wrong. Please try again. Thanks");
    echo json_encode($finalResult);
    exit;
}