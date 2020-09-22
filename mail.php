<?php

// Multiple recipients
//$to = 'johny@example.com, sally@example.com'; // note the comma
$to = 'infloserevents@gmail.com'; 

$name = $_POST{'name'};
$email = $_POST{'email'};
$message = $_POST{'message'};

// Subject
$subject = "New Form Submission from $name";

// To send HTML mail, the Content-type header must be set
$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';
$headers[] = 'X-Priority: 1 (Highest)';
$headers[] = 'X-MSMail-Priority: High';
$headers[] = 'Importance: High';

// Additional headers
//$headers[] = 'To: Mary <mary@example.com>, Kelly <kelly@example.com>';
//$headers[] = 'To: nFoniAfrica <nfoniafrica@mail.com>';
$headers[] = "From: $email";
//$headers[] = 'Cc: carboncopy@example.com';
//$headers[] = 'Bcc: bcarboncopy@example.com';

// Mail it
$status = mail($to, $subject, $message, implode("\r\n", $headers));

if( $status == true ) {
   echo "<script>alert('Email Successfully sent!')</script>";
	echo "<script type='text/javascript'>window.top.location='contact.php';</script>"; exit;
}else {
   echo "<script>alert('Sorry email not sent!')</script>";
	  echo "<script type='text/javascript'>window.top.location='contact.php';</script>"; exit;
}
?>