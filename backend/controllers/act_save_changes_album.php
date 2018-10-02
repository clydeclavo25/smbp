<?php 
  require_once('../com/config.php');
  require_once('../com/class_gallery.php');
  $gallery = new Gallery;
  $gallery->update_album($_GET['id'], $_POST['txtName'], $_POST['txtDesc']);


 ?>