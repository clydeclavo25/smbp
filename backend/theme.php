<?php
// LOAD CLASSES
session_start();
require_once ('com/config.php');
require_once ('com/class_login.php');
require_once ('com/class_profile.php');
require_once ('com/class_theme.php');

$login = new Login;
$theme = new Theme;
$loggedin = $login->is_logged_in($_SESSION['admin']['login_id']);
$get_all = $theme->get_all_themes();

$alert_type = "";
$alert_message = "";
$alert_info = "";

if (isset($_GET['saved'])) {
	  $alert_type = "success";
    $alert_message = "Theme successfully saved. <a href='theme.php'>Refresh page</a>";
    $alert_info = "Success!";
}

if (isset($_GET['updated'])) {
	  $alert_type = "success";
    $alert_message = "Theme successfully updated. <a href='theme.php'>Refresh page</a>";
    $alert_info = "Success!";
}

if (isset($_GET['delete'])) {
		$theme->delete_theme($_GET['delete']);
		header("location:?action=delete");
}

if (isset($_GET['action']) && $_GET['action'] == 'delete') {
	 $alert_type = "success";
   $alert_message = "Theme successfully deleted.";
   $alert_info = "Success!";
}


if (!$loggedin) {
	header('location:login.php');
} else {
	// LOAD TEMPLATE
	require_once 'templates/base/header.php';
	require_once 'templates/base/sidebar.php';
	require_once 'templates/base/page_theme.php';
	require_once 'templates/base/footer.php';

}





?>