<?php 
require_once('../com/config.php');
require_once('../com/class_announcement.php');

$announcement = new Announcement;
$id = $_POST['txtID'];
$announcement->change_posting($id);

 ?>