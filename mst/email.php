<?php
include 'connect.php';
include 'login.php';
/*
    Download PhpMailer from the following link:
    https://github.com/Synchro/PHPMailer (CLick on Download zip on the right side)
    Extract the PHPMailer-master folder into your xampp->htdocs folder
    Make changes in the following code and its done :-)

    You will receive the mail with the name Root User.
    To change the name, go to class.phpmailer.php file in your PHPMailer-master folder,
    And change the name here: 
    public $FromName = 'Root User';
*/
require("PHPMailer-master/PHPMailerAutoload.php"); //or select the proper destination for this file if your page is in some   //other folder
ini_set("SMTP","ssl://smtp.gmail.com"); 
ini_set("smtp_port","465"); //No further need to edit your configuration files.
$mail = new PHPMailer();
$mail->SMTPAuth = true;
$mail->Host = "smtp.gmail.com"; // SMTP server
$mail->SMTPSecure = "ssl";
$mail->Username = "prakhar.19967@gmail.com"; //account with which you want to send mail. Or use this account. i dont care :-P
$mail->Password = "prakhar123"; //this account's password.
$mail->Port = "465";
$mail->isSMTP();  // telling the class to use SMTP
$rec1="$c"; //receiver. email addresses to which u want to send the mail.
$mail->AddAddress($rec1);
$mail->Subject  = "Eventbook";
$mail->Body     = "Date of issue $dat validate till 1 month<br/>from station $ss to $ds station<br/>cost is $cst<br/>train type is $x";
$mail->WordWrap = 200;
if(!$mail->Send()) {
echo 'Message was not sent!.';
echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
echo  //Fill in the document.location thing
'<script type="text/javascript">
                        if(confirm("Your mail has been sent"))
                        document.location = "/";
        </script>';
}
?>