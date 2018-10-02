<?php 
ob_start();
include('../com/config.php');
include('../com/class_main.php');
$form = new Form;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	echo "You are in the right page!<Br>";
	$firstname = ucwords($_POST['txtFirstName']);
	$lastname = ucwords($_POST['txtLastName']);
	$middlename = ucwords($_POST['txtMiddleName']);
	$email = $_POST['txtEmail'];
	$contact = $_POST['txtContact'];
	$initials = strtoupper(str_replace(" ", "", $firstname)).strtoupper(str_replace(" ", "", $lastname));
	echo $initials;
$target_dir = "../registration/";
$target_file = $target_dir . basename($_FILES["fileForm"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$thedate =  date("Y").date("m").date("d");
$prefix = $initials;
$temp = explode(".", $_FILES["fileForm"]["name"]);
$control_number = $form->generate_ctr_no(date('y'));
$newfilename = $control_number. "_" . $thedate . '.' . end($temp);
if ($_FILES["fileForm"]["name"] != "" ) {

// Check if file already exists
if (file_exists("../registration/".$newfilename)) {
 $actual_name = pathinfo($newfilename,PATHINFO_FILENAME);
 $original_name = $actual_name;
 $extension = pathinfo($newfilename, PATHINFO_EXTENSION);

   $i = 1;
    while(file_exists("../registration/".$newfilename))
    {         
        $i++; 
        $actual_name = (string)$original_name."_".$i;
        $newfilename = $actual_name.".".$extension;
        
    }
    echo $newfilename;
}
// Check file size
if ($_FILES["fileForm"]["size"] > 500000) {
    echo "Sorry, your file is too large.<br>";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "pdf") {
    echo "Sorry, only PDF allowed.<br>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
echo $uploadOk."<br>";

if ($uploadOk == 0) {
    header("location:../send_form.php?err=1");
// if everything is ok, try to upload file
} else {
   
    if ( move_uploaded_file($_FILES["fileForm"]["tmp_name"], "../registration/" . $newfilename)) {
        echo "The file ". $newfilename. " has been uploaded.<br>";
        $saved = $form->submit_form($lastname, $firstname, $middlename, $email, $contact, $newfilename, $control_number);
					if ($saved) {
						header("location:../success.php?success=".$control_number);
					} else {
						header("location:../send_form.php?err=1");
					}
    } else {
        header("location:../send_form.php?err=1");
    }
}

} else {
    echo "No file was selected";
    header("location:../send_form.php?err=1");
}
} else {
	echo "You are in the wrong page!";
}
?>