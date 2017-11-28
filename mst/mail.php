<?php
ini_set("SMTP","ssl://smtp.gmail.com");

$to = "prakhar.19967@gmail.com";
$subject = "welcome";
$txt = "Hello world!";
$headers = "From: prakhar.19967@gmail.com" . "\r\n" .
"CC: prakhar.19967@gmail.com";

mail($to,$subject,$txt,$headers);

?>

