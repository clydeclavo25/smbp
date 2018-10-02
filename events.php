<?php
require_once 'com/config.php';
require_once 'com/class_main.php';

$theme = new Theme;
$get_theme = $theme->get_theme();

// LOAD HEADER
include 'settings/header.php';
// LOAD SLIDER
// include 'templates/slider.php';
// LOAD PAGE TEMPLATE
include 'templates/main/page_events.php';
// LOAD FOOTER
include 'settings/footer.php';
?>