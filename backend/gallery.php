<?php
// LOAD CLASSES
session_start();
require_once ('com/config.php');
require_once ('com/class_login.php');
require_once ('com/class_profile.php');
require_once ('com/class_gallery.php');

$login = new Login;
$gallery = new Gallery;
$loggedin = $login->is_logged_in($_SESSION['admin']['login_id']);


$alert_type = "";
$alert_message = "";
$alert_info = "";


if (!$loggedin) {
	header('location:login.php');
} else {
	// LOAD TEMPLATE
	require_once 'templates/base/header.php';
	require_once 'templates/base/sidebar.php';
	require_once 'templates/base/page_gallery.php';
	require_once 'templates/base/footer.php';

}

?>