<?php
	include("dbcon.inc");
	function base64_to_jpeg($base64_string,$last) {
		$target_path = "image/profile/";
		$sufix=time();
		$output_file=$target_path."IMG".$last;

		file_put_contents($output_file, base64_decode($base64_string));

		return $output_file; 
	}
    $returnValue=array();
    
    $username=$_POST["username"];
    $uploadfiles=$_POST["uploadfile"];
	$filename=base64_to_jpeg($uploadfiles, $username.".jpg");
	 $sql = "UPDATE user SET avatar='$filename' WHERE username='$username'";
	 $result = mysql_query($sql,$conn);
	if($result){
	 		$returnValue['status']="ok";
	}
	else{
		$returnValue['status']="fail";
	}
	echo json_encode($returnValue);
?>