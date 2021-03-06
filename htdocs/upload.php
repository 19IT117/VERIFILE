<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 5000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "pdf" ) {
  echo "Sorry, only PDF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    echo "<br>";
  } else {
    echo "Sorry, there was an error uploading your file."."<br>";
  }
}

$hash1 =  hash_file('sha256', $target_file);
$dummyhash = hash_file('sha256', 'uploads/NPTEL.pdf');
$hash2 = $hash1.$dummyhash;
$finalhash = hash ('sha256', $hash2);
echo "$hash1"."<br>";
echo "<br>";
echo "$dummyhash"."<br>";
echo "<br>";
echo "$hash2"."<br>";
echo "<br>";
echo "$finalhash"."<br>";
echo "<br>";
?>