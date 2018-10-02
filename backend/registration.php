<?php
// LOAD CLASSES
session_start();
require_once ('com/config.php');
require_once ('com/class_profile.php');
require_once ('com/class_login.php');
require_once ('com/class_registration.php');

$login = new Login;
$loggedin = $login->is_logged_in($_SESSION['admin']['login_id']);
$registration = new Registration;
$get_unconfirmed = $registration->get_all_registration(0,0);
$get_confirmed = $registration->get_all_registration(1,0);

if (isset($_GET['delete']) and $_GET['delete'] != "") {
	$deleted = $registration->delete_registration($_GET['delete']);
		if($deleted) {
			header('location:registration.php?action=delete');
		} else {
			header('location:registration.php?err=x');
		}
}

if (isset($_GET['confirm']) and $_GET['confirm'] != "") {
	$confirmed = $registration->confirm_registration($_GET['confirm']);
		if($confirmed) {
			header('location:registration.php?action=confirm');
		} else {
			header('location:registration.php?err=c');
		}
}



$alert_type = "";
$alert_message = "";
$alert_info = "";

if (isset($_GET['action'])) {
	if ($_GET['action'] == 'delete')
	  {
	  	$alert_type = "success";
	    $alert_message = "Record successfully deleted. <a href='registration.php'>Refresh page</a>";
	    $alert_info = "Deleted!";
	  }
	else if ($_GET['action'] == 'confirm') {
			$alert_type = "success";
	    $alert_message = "Registration successfully confirmed. <a href='registration.php'>Refresh page</a>";
	    $alert_info = "Confirmed!";
	}
}

if (isset($_GET['err'])) {
		if ($_GET['err'] == 'x') {
			$alert_type = "danger";
	    $alert_message = "There was an error trying to delete the record, please contact your web administrator. <a href='registration.php'>Refresh page</a>";
	    $alert_info = "Error!";
		} else if ($_GET['err'] == 'c') {
			$alert_type = "danger";
	    $alert_message = "There was an error trying to save your confirmation, please contact your web administrator. <a href='registration.php'>Refresh page</a>";
	    $alert_info = "Error!";
		}
}




if (!$loggedin) {
	header('location:login.php');
} else {
	// LOAD TEMPLATE
	require_once 'templates/base/header.php';
	require_once 'templates/base/sidebar.php';
	require_once 'templates/base/page_registration.php';
	require_once 'templates/base/footer.php';

}





?>