<?php
// LOAD CLASSES
session_start();
require_once ('com/config.php');
require_once ('com/class_login.php');
require_once ('com/class_profile.php');
require_once ('com/class_message.php');

$login = new Login;
$message = new Message;
$loggedin = $login->is_logged_in($_SESSION['admin']['login_id']);
$get_all = $message->get_all_messages();

$alert_type = "";
$alert_message = "";
$alert_info = "";


if (!$loggedin) {
	header('location:login.php');
} else {
	// LOAD TEMPLATE
	require_once 'templates/base/header.php';
	require_once 'templates/base/sidebar.php';
	require_once 'templates/base/page_inbox.php';
	require_once 'templates/base/footer.php';

}





?>