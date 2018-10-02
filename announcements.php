<?php
require_once('com/config.php');
require_once('com/class_main.php');
$announcement = new Announcement;

$max_year = $announcement->get_max_year('DESC');
$min_year = $announcement->get_min_year('ASC');

$max_year = $max_year['year_posted'];
$min_year = $min_year['year_posted'];
$selectedyear = "";

if (isset($_GET['year']) and $_GET['year'] != "") {
	$selectedyear = $_GET['year'];
	$get_announcements = $announcement->get_announcements_by_year($selectedyear);
}

if (isset($_GET['id']) and $_GET['id'] != "") {
	$single_announcement = $announcement->get_announcement_by_id($_GET['id']);
}



// LOAD HEADER
include 'settings/header.php';
// LOAD PAGE TEMPLATE
include 'templates/main/page_announcements.php';
// LOAD FOOTER
include 'settings/footer.php';


?>