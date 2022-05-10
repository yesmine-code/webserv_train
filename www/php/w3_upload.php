<?php
$stderr = fopen('php://stderr', 'w');
fwrite($stderr, PHP_EOL . "RUNNING upload.php" . PHP_EOL);
mkdir("./uploads", 0777);
$target_dir = "./uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;

if (file_exists($target_file)) {
  echo "Sorry, file already exists. ";
  $uploadOk = 0;
}

if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
	http_response_code(201);
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>
