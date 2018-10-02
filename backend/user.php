<?php
// LOAD CLASSES
session_start();
require_once ('com/config.php');
require_once ('com/class_profile.php');
require_once ('com/class_login.php');

$login = new Login;
$loggedin = $login->is_logged_in($_SESSION['admin']['login_id']);
$profile = new Profile;
$get_all_active = $profile->get_all_profiles(1);
$get_all_inactive = $profile->get_all_profiles(0);

$alert_type = "";
$alert_message = "";
$alert_info = "";
$type = 0;
if (isset($_GET['register'])) {
  $type = $_GET['register'];
  switch ($type) {
    case 'dup1':
      $alert_type = "danger";
      $alert_message = "The email you have entered is no longer available. <a href='user.php'>Refresh page</a>";
      $alert_info = "Alert!";
      break;
    case 'dup2':
      $alert_type = "danger";
      $alert_message = "The username you have entered is no longer available. <a href='user.php'>Refresh page</a>";
      $alert_info = "Alert!";
      break;
    case 'fail':
      $alert_type = "danger";
      $alert_message = "There is an error trying to save the user, registration was unsuccessful. <a href='user.php'>Refresh page</a>";
      $alert_info = "Alert!";
      break;
    case '1':
      $alert_type = "success";
      $alert_message = "User added successfully! <a href='user.php'>Refresh page</a>";
      $alert_info = "Success!";
      break;
    
    default:
      $alert_type = "";
      $alert_message = "";
      $alert_info = "";
      break;
  }
}

if (isset($_GET['update'])) {
  $alert_type = "success";
  $alert_message = "User Access successfully updated. <a href='user.php'>Refresh page</a>";
  $alert_info = "Success!";
}

if (isset($_GET['change_status'])) {
  $profile->change_status($_GET['change_status']);
  header("location:user.php");
}

if (isset($_GET['delete'])) {
  $profile->delete_user($_GET['delete']);
  header("location:user.php?deleted=".$_GET['delete']);
}


if (!$loggedin) {
	header('location:login.php');
} else {
	// LOAD TEMPLATE
	require_once 'templates/base/header.php';
	require_once 'templates/base/sidebar.php';
	require_once 'templates/base/page_user.php';
	require_once 'templates/base/footer.php';
}



?>