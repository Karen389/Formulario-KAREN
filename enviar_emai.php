<?php
if (isset($_POST)) {
    // Multiple recipients
    $to = $_POST["email"]; // note the comma

    // Subject
    $subject = 'Registro en la Plataforma';

    // Message
    $message = '
<html>
<head>
  <title>Registro en la Plataforma</title>
</head>
<body>
  <h2>Hola, ' . $_POST["firstName"] . ' ' . $_POST["lastName"] . '</h2>
  
  <hr>
  <hr>
  <hr>

  <p>Te has registrado en la plataforma de Karen</p>
</body>
</html>
';

    // To send HTML mail, the Content-type header must be set
    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=iso-8859-1';

    // Additional headers
    //$headers[] = '';
    //$headers[] = 'From: Birthday Reminder <birthday@example.com>';
    //$headers[] = 'Cc: birthdayarchive@example.com';
    //$headers[] = 'Bcc: birthdaycheck@example.com';

    // Mail it
    mail($to, $subject, $message,implode("\r\n", $headers));
}

