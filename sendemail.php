<?php
    ob_start();
    require_once('com/config.php');
    require_once('com/class_main.php');
	header('Content-type: application/json');
    $objmessage = new Message;
	$status = array(
		'type'=>'success',
		'message'=>'Thank you for contact us. As early as possible  we will contact you '
	);

    $name = stripslashes($_POST['name']); 
    $email = stripslashes($_POST['email']); 
    $subject = stripslashes($_POST['subject']); 
    $message = stripslashes($_POST['message']); 
    $number = $_POST['contact_no'];

    $save = $objmessage->save_message($name,$email,$number,$subject,$message);

    $email_from = 'forms@sci-mathbrainpower.com';
    $email_to = 'admin@sci-mathbrainpower.com';//replace with your email

    $body = 'Name: ' . $name . "\n\n" . 'Email: ' . $email . "\n\n" . 'Subject: ' . $subject . "\n\n" . 'Message: ' . $message;
    $success = @mail($email_to, $subject, $body, 'From: <'.$email_from.'>');

    echo json_encode($status);
    die;