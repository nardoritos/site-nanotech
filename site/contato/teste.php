<?php
$to = "portinexd@gmail.com";
$subject = "My subject";
$txt = "Hello world!";
$headers = "From: webmaster@example.com" . "\r\n" .
"CC: somebodyelse@example.com";

$enviar = mail($to,$subject,$txt,$headers);
echo (string)$enviar;
?>
