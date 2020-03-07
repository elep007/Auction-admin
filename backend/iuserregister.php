<?php
	include("dbcon.inc");

	$username=trim(strtolower($_POST['username']));
	$password=md5($_POST['password']);
	$name=trim($_POST['name']);
	$mobile=trim($_POST['mobile']);
	$email=trim($_POST['email']);
	$role="user";
	$status="use";

	$sql = "SELECT * FROM user WHERE username='".$username."'";
	$result = mysql_query($sql,$conn);
	$response=array("status"=>"fail");
	
	if($result){
		if( mysql_num_rows($result)>0){
			$response['status']="existuser";
		}
		else{
			$sql = "SELECT * FROM user WHERE mobile='".$mobile."'";
			$result = mysql_query($sql,$conn);
			if($result){
				if(mysql_num_rows($result)>0){
					$response['status']="existmobile";
				}
				else{
					$sql = "INSERT INTO user (username,password,name ,mobile,role,status,email) 
					VALUES ('$username','$password','$name','$mobile','$role','$status','$email')";
					$result = mysql_query($sql,$conn);
					if($result){
						$response['status']="ok";
					}
					else{
						$response['status']="fail";
					}
				}
			}

		}
	}		

	echo json_encode($response);
?>