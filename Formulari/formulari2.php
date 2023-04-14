<?php

$to ="";


$nom=$_POST['nom'];
$cognom=$_POST['cognom'];
$email=$_POST['email'];
$subject =$_POST['assumpte'];
$message=$_POST['missatge'];


$ip = $_SERVER['REMOTE_ADDR'];

// the message
$msg = <<<MAIL
Nom: $nom
Cognom: $cognom
Telefon: $telefon
email: $email
--------------
$subject
$message
--------------
IP: $ip
MAIL;

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

$headers = "From: admin@espaidejocs.cat" . "\r\n";
$headers .= "CC: $email" . "\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8" . "\r\n";

// send email
mail($to,$subject,$msg,$headers);

header('Location: /index.html');
echo <<<HTML
<html>
<body>
El usuari $nom: amb telefon: $telefon i email: $email ha enviat el següent missatge:
--------------
$message
------------- 
IP: $ip
</body>
</html>
HTML;

?>

