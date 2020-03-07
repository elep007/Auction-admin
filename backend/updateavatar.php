<?php
	include("dbcon.inc");
		
    $returnValue=array();
    
    $username=$_POST["username"];
	$target_file ="image/profile/". $username.basename($_FILES['uploadfile']['name']);

	
	try {
		if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $target_file)) {
			$sql = "UPDATE user SET avatar='$target_file' WHERE username='$username'";

			$result = mysql_query($sql,$conn);
			if($result){
				$returnValue['status']="ok";
			}
			else{
				$returnValue['status']="fail";
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