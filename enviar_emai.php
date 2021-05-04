<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';
$mysqli = new mysqli("localhost","id16738941_root","j]mQL]+#gW8Ds\<q","id16738941_registro");
if (isset($_POST)) {
    
  
//Create a new PHPMailer instance
$mail = new PHPMailer();

//Tell PHPMailer to use SMTP
$mail->isSMTP();

//Enable SMTP debugging
//SMTP::DEBUG_OFF = off (for production use)
//SMTP::DEBUG_CLIENT = client messages
//SMTP::DEBUG_SERVER = client and server messages
$mail->SMTPDebug = 2;

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
//Use `$mail->Host = gethostbyname('smtp.gmail.com');`
//if your network does not support SMTP over IPv6,
//though this may cause issues with TLS

//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;

//Set the encryption mechanism to use - STARTTLS or SMTPS
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

//Whether to use SMTP authentication
$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = 'karenrivera389@gmail.com';

//Password to use for SMTP authentication
$mail->Password = 'tecssfsepgdqlmbk';

//Set who the message is to be sent from
$mail->setFrom('karenrivera389@gmail.com');

//Set an alternative reply-to address
$mail->addReplyTo('karenrivera389@gmail.com');

//Set who the message is to be sent to
$mail->addAddress($_POST['email']);

//Set the subject line
$mail->Subject = 'Registro de formulario';

//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
$mail->msgHTML('<html>
<head>
  <title>Registro en la Plataforma</title>
</head>
<body>
  <h2>Hola, ' . $_POST["name"] . ' ' . $_POST["surname"] . '</h2>
  
  <hr>
  <hr>
  <hr>

  <p>Te has registrado en la plataforma de Karen</p>
</body>
</html>');

//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';

//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');

//send the message, check for errors
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message sent!';
    //Section 2: IMAP
    //Uncomment these to save your message in the 'Sent Mail' folder.
    #if (save_mail($mail)) {
    #    echo "Message saved!";
    #}
}
  
   
    
    
    $mysqli->query("INSERT INTO `persona`(`name`, `surname`,  `birthdate`, `email`, `id`) VALUES ('".$_POST['name']."','".$_POST['surname']."','".$_POST['birthdate']."','".$_POST['email']."','".$_POST['id']."')") ;
    
    //echo $result;
}

