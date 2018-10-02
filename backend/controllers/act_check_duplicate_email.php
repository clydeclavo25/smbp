<?php
// LOAD CLASSES
include '../com/config.php';
include '../com/class_register.php';

$checkemail = new Register;
$email = $_POST['txtEmail'];
$checkexists = $checkemail->dup_email($email);

if($checkexists) {
	echo 1;
} else {
	echo 0;
}


?>
