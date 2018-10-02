<?php 
ob_start();
include('../com/config.php');
include('../com/class_gallery.php');

$gallery = new Gallery;
$id = $_POST['album_id'];
$name = $_POST['album_name'];
$description = $_POST['description'];

echo $name;
echo "<br>";
echo $description;
$gallery -> save_album($id,$name,$description);

 ?>