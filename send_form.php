<?php
require_once ('com/config.php');
require_once ('com/class_main.php');
$form = new Form;
$alert_type = "";
$alert_message = "";
$alert_info = "";


if (isset($_GET['err']) && $_GET['err'] == 1) {
		$alert_type = "danger";
    $alert_message = "Upload failed, please check all fields.";
    $alert_info = "Error!";
}



// LOAD HEADER
include 'settings/header.php';
// LOAD PAGE TEMPLATE
include 'templates/forms/frm_send_form.php';
// LOAD FOOTER
include 'settings/footer.php';
?>