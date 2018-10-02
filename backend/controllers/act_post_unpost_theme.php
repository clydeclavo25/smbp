<?php 
require_once('../com/config.php');
require_once('../com/class_theme.php');

$theme = new Theme;
$id = $_POST['txtID'];
$theme->post_unpost($id);

 ?>