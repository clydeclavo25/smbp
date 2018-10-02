<?php
require_once('com/config.php');
require_once('com/class_main.php');
$announcement = new Announcement;
$get_announcements = $announcement->get_all_announcements();
// LOAD HEADER
include 'settings/header.php';
// LOAD SLIDER
include 'templates/main_slider.php';
// LOAD PAGE TEMPLATE
include 'templates/main/page_index.php';
// LOAD FOOTER
include 'settings/footer.php';
?>