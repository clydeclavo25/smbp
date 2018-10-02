<?php
ob_start();
include '../com/config.php';
include '../com/class_register.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
echo "You are in the right page. <br>";
$lastname = ucwords($_POST['txtLastName']);
$firstname = ucwords($_POST['txtFirstName']);
$middlename = ucwords($_POST['txtMiddleName']);
$username = $_POST['txtUserName'];
$password = md5($_POST['txtConfirmPassword']);
$access = 1;
$address = $_POST['txtAddress'];
$email = $_POST['txtEmail'];
$contact_no = $_POST['txtMobileNo'];
$register = new Register;

// EXECUTE REGISTER METHOD
$success = $register->register_admin(
		$username,
		$password,
		$email,
		$access,
		$lastname,
		$firstname,
		$middlename,
		$address,
		$contact_no
	);

if ($success == 'fail') {
	header('location:../login.php?register=fail');
} else if ($success == 'dup_email') {
	header('location:../login.php?register=dup1');
} else if ($success == 'dup_user') {
	header('location:../login.php?register=dup2');
} else {
	header('location:../login.php?register=1');
}


} else {
	echo "<h1>You are in the wrong page, page contact your system administrator.</h1>";
}
?>