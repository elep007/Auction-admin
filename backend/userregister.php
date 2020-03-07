<?php
	include("dbcon.inc");
	
	$content=trim(file_get_contents("php://input"));
	$decoded=json_decode($content,true);

	$username=trim($decoded['username']);
	$password=md5(trim($decoded['password']));
	$name=trim($decoded['name']);
	$mobile=trim($decoded['mobile']);
	$email=trim($decoded['email']);
	$role="user";
	$status="use";

	$sql = "SELECT * FROM user WHERE username='".$username."'";
	$result = mysql_query($sql,$conn);
	$returnValue=array("status"=>"fail");
	
	if($result){
		if( mysql_num_rows($result)>0){
			$returnValue['status']="existuser";
		}
		else{
			$sql = "SELECT * FROM user WHERE mobile='".$mobile."'";
			$result = mysql_query($sql,$conn);
			if($result){
				if(mysql_num_rows($result)>0){
					$returnValue['status']="existmobile";
				}
				else{
					$sql = "INSERT INTO user (username,password,name ,mobile,role,status,email) 
					VALUES ('$username','$password','$name','$mobile','$role','$status','$email')";
					$result = mysql_query($sql,$conn);
					if($result){
						$returnValue['status']="ok";
					}
					else{
						$returnValue['status']="fail";
					}
				}
			}

		}
	}		

	echo json_encode($returnValue);
?>