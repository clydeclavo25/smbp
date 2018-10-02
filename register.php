<?php
include 'com/config.php';
include 'com/class_main.php';

$forms = new Form;
$individual = $forms->get_latest_form('Individual');
$group = $forms->get_latest_form('Group');
$individual = $individual['filename'];
$group = $group['filename'];


// LOAD HEADER
include 'settings/header.php';
// LOAD PAGE TEMPLATE
include 'templates/main/page_register.php';
// LOAD FOOTER
include 'settings/footer.php';
?>