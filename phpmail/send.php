<?php
    require("class.phpmailer.php");

    $data=$_POST["data"];
    echo $data;



    /*$mail = new PHPMailer();

    $mail->IsSMTP();  // telling the class to use SMTP
    $mail->SMTPAuth   = true; // SMTP authentication
    $mail->Host       = "mail.webchild.com.au"; // SMTP server
    $mail->Port       = 465; // SMTP Port
    $mail->SMTPSecure = 'ssl';
    $mail->Username   = "luyi@webchild.com.au"; // SMTP account username
    $mail->Password   = "hzhchllzhbjy";        // SMTP account password

    $mail->SetFrom($mail_msg, $name); // FROM
    $mail->AddReplyTo("luyi985@gmail.com", $name); // Reply TO

    $mail->AddAddress("luyi985@gmail.com", $name); // recipient email

    $mail->Subject    = "From ".$name; // email subject
    $mail->Body       = $mail_msg."\r\n".$mail_add;

    if(!$mail->Send()) {
      echo 'Message was not sent.';
      echo 'Mailer error: ' . $mail->ErrorInfo;
    } else {
      echo 'Message has been sent.';
    }*/
?>