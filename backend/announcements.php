<?php
// LOAD CLASSES
session_start();
require_once ('com/config.php');
require_once ('com/class_profile.php');
require_once ('com/class_login.php');
require_once ('com/class_announcement.php');

$login = new Login;
$loggedin = $login->is_logged_in($_SESSION['admin']['login_id']);
$announcement = new Announcement;
$get_all = $announcement->get_all_announcements();

$alert_type = "";
$alert_message = "";
$alert_info = "";

if (isset($_GET['saved'])) {
	  $alert_type = "success";
    $alert_message = "Announcement successfully saved. <a href='announcements.php'>Refresh page</a>";
    $alert_info = "Success!";
}

if (isset($_GET['updated'])) {
	  $alert_type = "success";
    $alert_message = "Announcement successfully updated. <a href='announcements.php'>Refresh page</a>";
    $alert_info = "Success!";
}

if (isset($_GET['del'])) {
	  $alert_type = "warning";
    $alert_message = "Announcement successfully deleted. <a href='announcements.php'>Refresh page</a>";
    $alert_info = "Deleted!";
}


if (isset($_GET['delete'])) {
		$announcement->delete_announcement($_GET['delete']);
		header("location:?del=1");
}


if (!$loggedin) {
	header('location:login.php');
} else {
	// LOAD TEMPLATE
	require_once 'templates/base/header.php';
	require_once 'templates/base/sidebar.php';
	require_once 'templates/base/page_announcements.php';
	require_once 'templates/base/footer.php';

}
?>