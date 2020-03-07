<?php
	include("dbcon.inc");
	function base64_to_jpeg($base64_string,$last) {
		$target_path = "image/category/";
		$sufix=time();
		$output_file=$target_path."IMG".$last;

		file_put_contents($output_file, base64_decode($base64_string));

		return $output_file; 
	}
    $returnValue=array();
    
    $categoryname=$_POST["categoryname"];
    $uploadfiles=$_POST["uploadfile"];
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
	$filename=base64_to_jpeg($uploadfiles, $categoryname.".jpg");
	$sql = "INSERT INTO category (name ,image)	VALUES ('$categoryname','$filename')";
		$result = mysql_query($sql,$conn);
		if($result){
			$returnValue["status"]="ok";
		}
		else
		{
			$returnValue["status"]="fail";
		}
	
	echo json_encode($returnValue);
?>