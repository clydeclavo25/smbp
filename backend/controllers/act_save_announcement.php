<?php 
ob_start();
require_once('../com/config.php');
require_once('../com/class_announcement.php');

$announcement = new Announcement;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
echo "You are in the right page <br>";

$title = $_POST['txtTitle'];
$content = $_POST['txtContent'];
$content2 = str_replace("<br />", " ", $content);
$content2 = str_replace("&nbsp;", " ", $content2);
$content2 = str_replace(" ", "", $content2);
$content2 = str_replace("  ", "", $content2);
$content2 = strlen($content2);
echo $content2."<br>";


if ($content2 < 5) {
	header("location:../announcements.php?err=1");
} else {
	if ($_GET['id'] == "") {
		$saved = $announcement->save_announcement($title,$content);
				if ($saved) {
					echo "Success";
					header("location:../announcements.php?saved=1");
				} else {
					echo "error";
					header("location:../announcements.php?err=1");
				}
	} else {
		echo "updating";

		$saved = $announcement->update_announcement($title,$content,$_GET['id']);
				if ($saved) {
					echo "Success";
					header("location:../announcements.php?updated=1");
				} else {
					echo "error";
					header("location:../announcements.php?err=1");
				}
	}

}


} 




else {
echo "<br>You are in the wrong page";
}
