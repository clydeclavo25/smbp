<?php 
ob_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include '../com/config.php';
include '../com/class_profile.php';
$profile = new Profile;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$error = 0;
	$lastname = ucwords($_POST['txtLastName']);
	$firstname = ucwords($_POST['txtFirstName']);
	$middlename = ucwords($_POST['txtMiddleName']);
	$address = $_POST['txtAddress'];
	$email = $_POST['txtEmail'];
	$contact_no = $_POST['txtMobileNo'];
	$id = $_POST['txtID'];
	$success = $profile->edit_profile($lastname,$firstname,$middlename,$email,$contact_no,$address,$id);
	if ($success) {
		echo "true";
	} else {
		echo "false";
	}
 } else {

 }


