<?php
ob_start();
include('../com/config.php');
include('../com/class_form.php');

$form = new Form;

$target_dir = "../../uploads/";
$target_file = $target_dir . basename($_FILES["fileForm"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$type = $_POST['slcType'];
$thedate =  date("Y").date("m").date("d");
$prefix = "";


if ($type == "Individual") {
    $prefix = "INDIVIDUAL_REGISTRATION_FORM";
} else {
    $prefix = "GROUP_REGISTRATION_FORM";
}


$temp = explode(".", $_FILES["fileForm"]["name"]);
$newfilename = $prefix. "_" . $thedate . '.' . end($temp);



if ($_FILES["fileForm"]["name"] != "" ) {

// Check if file already exists
if (file_exists("../../uploads/".$newfilename)) {
 $actual_name = pathinfo($newfilename,PATHINFO_FILENAME);
 $original_name = $actual_name;
 $extension = pathinfo($newfilename, PATHINFO_EXTENSION);

   $i = 1;
    while(file_exists("../../uploads/".$newfilename))
    {          
        $i++; 
        $actual_name = (string)$original_name."_V".$i;
        $newfilename = $actual_name.".".$extension;
        
    }
    echo $newfilename;
}
// Check file size
echo $_FILES["fileForm"]["size"];
if ($_FILES["fileForm"]["size"] > 1000000) {
    echo "Sorry, your file is too large.<br>";
    $uploadOk = 0;
}
// Allow certain file formats
// if($imageFileType != "pdf") {
//     echo "Sorry, only PDF allowed.<br>";
//     $uploadOk = 0;
// }
// Check if $uploadOk is set to 0 by an error
echo $uploadOk."<br>";

if ($uploadOk == 0) {
    header("location:../forms.php?err=1");
// if everything is ok, try to upload file
} else {
   
    if ( move_uploaded_file($_FILES["fileForm"]["tmp_name"], "../../uploads/" . $newfilename)) {
        echo "The file ". $newfilename. " has been uploaded.<br>";
        $form->save_form($newfilename,$type);
        header("location:../forms.php?uploaded=1");
    } else {
        header("location:../forms.php?err=1");
    }
}

} else {
    echo "No file was selected";
    header("location:../forms.php?err=1");
}


?>
