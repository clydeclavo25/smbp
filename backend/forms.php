<?php
// LOAD CLASSES
session_start();
require_once ('com/config.php');
require_once ('com/class_profile.php');
require_once ('com/class_login.php');
require_once ('com/class_form.php');
$login = new Login;
$loggedin = $login->is_logged_in($_SESSION['admin']['login_id']);
$forms = new Form;
$get_all = $forms->get_all(1);
$get_latest_individual = $forms->get_latest_form('Individual');
$get_latest_group = $forms->get_latest_form('Group');

if (isset($_GET['change_status'])) {
	$forms->change_form_status($_GET['change_status']);
	header("location:forms.php");
}

if (isset($_GET['delete'])) {
	$forms->delete_form($_GET['delete']);
	header("location:forms.php");
}


if (!$loggedin) {
	header('location:login.php');
} else {
	// LOAD TEMPLATE
	require_once 'templates/base/header.php';
	require_once 'templates/base/sidebar.php';
	require_once 'templates/base/page_forms.php';
	require_once 'templates/base/footer.php';
}


?>