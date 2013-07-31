<?php
    require("class.phpmailer.php");

    $data=$_POST["data"];
    $data_arr=explode("@@@", $data);
    $name=$data_arr[0];
    $sender=$data_arr[1];
    $mobile=$data_arr[2];
    $message=$data_arr[3];
    $suburb=$data_arr[4];
    $date=$data_arr[5];
    $type=$data_arr[6];
   // echo $data;



    $mail = new PHPMailer();

    $mail->IsSMTP();  // telling the class to use SMTP
    $mail->SMTPAuth   = true; // SMTP authentication
    $mail->Host       = "mail.webchild.com.au"; // SMTP server
    $mail->Port       = 465; // SMTP Port
    $mail->SMTPSecure = 'ssl';
    $mail->Username   = "luyi@webchild.com.au"; // SMTP account username
    $mail->Password   = "hzhchllzhbjy";        // SMTP account password

    $mail->SetFrom($message, $name); // FROM
    $mail->AddReplyTo("luyi985@gmail.com", $name); // Reply TO

    $mail->AddAddress("luyi985@gmail.com", $name); // recipient email

    $mail->Subject    = "From ".$name; // email subject
    $mail->Body       = $message."\r\n\r\nEmail:".$sender."\r\nPhone Number:".$mobile."\r\nSuburb:".$suburb."\r\nEvent Date:". $date."\r\nEvent Type:".$type ;

    if(!$mail->Send()) {
      echo 'Message was not sent.';
      echo 'Mailer error: ' . $mail->ErrorInfo;
    } else {
      echo 'Message has been sent.';
    }
?>