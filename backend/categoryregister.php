<?php
	include("dbcon.inc");

	$returnValue=array();
    if(empty(trim($_POST["categoryname"]))||empty($_FILES['uploadfile']['name'])){
		$returnValue["status"]="fail";
		exit();
	}
    $target_path = "image/category/";
	$sufix=time();
	$target_file = $target_path . $sufix.basename($_FILES['uploadfile']['name']);

	try {
		$categoryname=trim($_POST["categoryname"]);
		$sql1 = "SELECT * FROM category WHERE name='$categoryname'";
		$result1 = mysql_query($sql1,$conn);
		if($result1){
			if(mysql_num_rows($result1)>0){
				$returnValue["status"]="existcategory";
				echo json_encode($returnValue);
				exit();
			}
		}

		if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $target_file)) {
			$categoryname=trim($_POST["categoryname"]);
			$image=$target_file;


				$sql = "INSERT INTO category (name ,image)	VALUES ('$categoryname','$image')";
				$result = mysql_query($sql,$conn);
				if($result){
					$returnValue["status"]="ok";
				}
				else{
					$returnValue["status"]="fail";
				}			
		}
		else{
			$returnValue["status"]="Could not move file";
		}
		
	}
	catch (Exception $e) {
		$returnValue["status"]='Image did not upload: ' . $e->getMessage();
	}
	echo json_encode($returnValue);
?>