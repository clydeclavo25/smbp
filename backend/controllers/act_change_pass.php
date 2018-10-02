<?php
ob_start();
include '../com/config.php';
include '../com/class_register.php';
$currpass = $_POST['txtCurrent'];
$password = md5($_POST['txtPassword']);
$current_entry = md5($_POST['txtCurrentEntry']);
if ($currpass == $current_entry) {
	echo "1";
} else {
	echo "0";
}
