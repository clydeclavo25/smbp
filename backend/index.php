<?php
// LOAD CLASSES
ob_start();
session_start();
require_once ('com/config.php');
require_once ('com/class_profile.php');
require_once ('com/class_login.php');

$login = new Login;
if (isset($_SESSION['admin']['login_id'])) {
$loggedin = $login->is_logged_in($_SESSION['admin']['login_id']);

	if (!$loggedin) {
		header('location:login.php');
	} else {
		// LOAD TEMPLATE
		header('location:registration.php');
		require_once 'templates/base/header.php';
		require_once 'templates/base/sidebar.php';
		require_once 'templates/base/page_index.php';
		require_once 'templates/base/footer.php';

	}
} else {
	header('location:login.php');
}
?>