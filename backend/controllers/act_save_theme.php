<?php 
include('../com/config.php');
include('../com/class_theme.php');
$title = $_POST['txtTitle'];
$description = $_POST['txtDescription'];
$theme = new Theme;
$id = $_GET['id'];
if ($id == "") {
$theme->save_theme($title,$description);
header("location:../theme.php?saved=1");
} else {
	$theme->update_theme($title,$description,$id);
	header("location:../theme.php?updated=1");
}
 ?>