<?php
ob_start();
include('../com/config.php');
include('../com/class_gallery.php');

$gallery = new Gallery;
$target_dir = "../gallery/";
$target_file = $target_dir . basename($_FILES["input44"]["name"][0]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
$thedate =  date("Y").date("m").date("d");
$micro = explode(" ", microtime());
$newmicro = $micro['0'].$micro['1'];
$prefix = "album_".$_POST['album_id']."_";
$temp = explode(".", $_FILES["input44"]["name"][0]);
$newfilename = $prefix.$newmicro . '.' . end($temp);
if ($_FILES["input44"]["name"][0] != "" ) {

// Check if file already exists
if (file_exists("../gallery/".$newfilename)) {
 $actual_name = pathinfo($newfilename,PATHINFO_FILENAME);
 $original_name = $actual_name;
 $extension = pathinfo($newfilename, PATHINFO_EXTENSION);

   $i = 1;
    while(file_exists("../gallery/".$newfilename))
    {          
        $i++; 
        $actual_name = (string)$original_name."_".$i;
        $newfilename = $actual_name.".".$extension;
        
    }
    // echo $newfilename;
}
// Check file size
// echo $_FILES["input44"]["size"][0];
// if ($_FILES["input44"]["size"][0] > 1000000) {
//     echo "Sorry, your file is too large.<br>";
//     $uploadOk = 0;
// }
// Allow certain file formats
// if($imageFileType != "pdf") {
//     echo "Sorry, only PDF allowed.<br>";
//     $uploadOk = 0;
// }
// Check if $uploadOk is set to 0 by an error
// echo $uploadOk."<br>";

if ($uploadOk == 0) {
	echo "with error";
	$output = ['error'=>'There is an error'];
// if everything is ok, try to upload file
} else {
   
    if ( move_uploaded_file($_FILES["input44"]["tmp_name"][0], "../gallery/" . $newfilename)) {
        // echo "The file ". $newfilename. " has been uploaded.<br>";
    	 	$gallery -> save_image($newfilename,$_POST['album_id']);
    		$output = [];
    } else {
        echo "With error";
        $output = ['error'=>'There is an error'];
    }
}

} else {
    echo "No file was selected";
    $output = ['error'=>'There is an error'];
   
}

echo json_encode($output);
?>
