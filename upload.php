<?php
$fileRandString = randString(12);

$name=$_POST["content"];
foreach( $name AS $key => $value ){
	save_text( "content.".$key++.".".$fileRandString, $value);
}
save_image("fileToUpload0","uploads/image0.".$fileRandString.".jpg");
save_image("fileToUpload1","uploads/image1.".$fileRandString.".jpg");

function randString($length, $charset='ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789')
{
    $str = '';
    $count = strlen($charset);
    while ($length--) {
        $str .= $charset[mt_rand(0, $count-1)];
    }
    return $str;
}
function save_text( $filename, $str ){
	$file = "uploads/".$filename.".txt";
	$fp = fopen($file, 'w');
	fwrite($fp, $str);
	fclose($fp);
}

function save_image($filename, $target_file){
	//$target_dir = "uploads/";
//$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES[$filename]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES[$filename]["size"] > 500000000000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES[$filename]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES[$filename]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
}
