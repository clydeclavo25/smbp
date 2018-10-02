<?php 
  require_once('../com/config.php');
  require_once('../com/class_gallery.php');
  $gallery = new Gallery;
  $gallery->delete_album($_GET['id']);


 ?>