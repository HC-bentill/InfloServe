<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>

<?php
if(isset($_POST['submit'])) 
{
 
   echo "error you need to submit the form";
}
 
$name = $_POST{'name'};
$email = $_POST{'email'};
$subject = $_POST{'subject'};
$message = $_POST{'message'};

if(empty($name)|| empty($email))
{
	echo "Name and email are mandatory";
	exit;
}

$email_from = 'vermontgroupltd@gmail.com';
$email_subject = "New Form Submission";
$email_body = "You have received a new message from $name.\n".
"subject:$subject". 
"email address: $email\n". "Here is the message: $message.\n";

$to = "vermontgroupltd@gmail.com";
$headers = "From: $email_from \r\n";

mail($to,$email_subject,$email_body,$headers);
    
echo "Mail Sent.";

header('location:contact.html');
?>





</body>
</html>
