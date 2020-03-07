<?php
	include("dbcon.inc");

	$content=trim(file_get_contents("php://input"));
	$decoded=json_decode($content,true);
    
    $username=trim($decoded['username']);
	$name=trim($decoded['name']);
	$email=trim($decoded['email']);
	$mobile=trim($decoded['mobile']);
	
	$returnValue=array("status"=>"fail");
			$sql = "UPDATE user SET name='$name',email='$email',mobile='$mobile' WHERE username='$username'";

			$result = mysql_query($sql,$conn);
			if($result){
				$returnValue['status']="ok";
			}
			else{
				$returnValue['status']="fail";
			}
	echo json_encode($returnValue);
?>