<?php
ob_start();
include '../com/config.php';
include '../com/class_profile.php';
$profile = new Profile;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

if (isset($_GET['id'])) {
	echo "You are about to change access";
	$id = $_POST['txtID'];
	$access = $_POST['slcAccess'];
	$profile->change_access($id,$access);
	$profile->edit_username($id,$_POST['txtUserName']);
	header("location:../user.php?update=1");

} else {

$error = 0;
$lastname = ucwords($_POST['txtLastName']);
$firstname = ucwords($_POST['txtFirstName']);
$middlename = ucwords($_POST['txtMiddleName']);
$username = $_POST['txtUserName'];
$password = md5($_POST['txtConfirmPassword']);
$address = $_POST['txtAddress'];
$email = $_POST['txtEmail'];
$contact_no = $_POST['txtMobileNo'];
$access = $_POST['slcAccess'];

if ($lastname == "" or $firstname == "" or $username == "" or $password == "" or $address == "" or $email == "" or $contact_no == "") {
	header("location:../user.php?register=fail");
} else {
	echo "You are in the right page. <br>";
		// EXECUTE REGISTER METHOD
		$success = $profile->save_user(
				$username,
				$password,
				$email,
				$lastname,
				$firstname,
				$middlename,
				$address,
				$contact_no,
				$access
			);
		var_dump($success);
			if ($success == 'fail') {
				header('location:../user.php?register=fail');
			} else if ($success == 'dup_email') {
				header('location:../user.php?register=dup1');
			} else if ($success == 'dup_user') {
				header('location:../user.php?register=dup2');
			} else {
				header('location:../user.php?register=1');
			}

}


}


} else {
	echo "<h1>You are in the wrong page, page contact your system administrator.</h1>";
}



?>
