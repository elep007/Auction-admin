<?php
  echo $_FILES['uploadfile']['name'] . '<br/>';
  ini_set('upload_max_filesize', '10M');
  $test=$_POST["test"];
  $test1=$_POST["test1"];
  $target_path = "image/product/";
  $sufix=time();
  $target_path = $target_path . $test1.$sufix.basename($_FILES['uploadfile']['name']);

	try {
		if (!move_uploaded_file($_FILES['uploadfile']['tmp_name'], $target_path)) {
			throw new Exception('Could not move file');
		}
		echo "Image uploaded";
	}
	catch (Exception $e) {
		die('Image did not upload: ' . $e->getMessage());
	}
  ?>