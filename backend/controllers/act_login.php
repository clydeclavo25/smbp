<?php
ob_start();
include '../com/class_login.php';
include '../com/config.php';
session_start();
$login = new Login;
$username = $_POST['txtUserName'];
$password = $_POST['txtPassword'];
$success = $login->login($username,$password);

switch ($success) {
	case 'none':
		header('location:../login.php?err=1');
		break;

	case 'incorrect':
		header('location:../login.php?err=2');
		break;

	case 'success':
		header('location:../index.php?welcome=1');
		break;
	
	default:
	
		break;
}

?>