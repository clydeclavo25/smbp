<?php
// LOAD CLASSES
session_start();
require_once ('com/config.php');
require_once ('com/class_profile.php');
require_once ('com/class_login.php');

$login = new Login;
$loggedin = $login->is_logged_in($_SESSION['admin']['login_id']);

if (!$loggedin) {
	header('location:login.php');
} else {
	// LOAD TEMPLATE
	require_once 'templates/base/header.php';
	require_once 'templates/base/sidebar.php';
	require_once 'templates/base/page_masterlist.php';
	require_once 'templates/base/footer.php';

}





?>