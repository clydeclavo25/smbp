<?php
// LOAD CLASSES
include '../com/config.php';
include '../com/class_register.php';

$checkuser = new Register;
$username = $_POST['txtUserName'];
$checkexists = $checkuser->if_exists($username);

if($checkexists) {
	echo 1;
} else {
	echo 0;
}


?>
