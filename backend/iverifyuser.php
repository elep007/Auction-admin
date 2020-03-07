<?php
	include("dbcon.inc");

	$user = strtolower(trim($_POST['username']));
	$password = trim($_POST['password']);
	$pass=md5($password);
	
	$response=array("status"=>"error");
		
	if(empty($user) ||empty($pass)){
		
	}
	else{
		$sql = "SELECT username, mobile, email, avatar, password,role,name FROM user WHERE username='".$user."'";
		$result = mysql_query($sql,$conn);
		if($result){

			if (mysql_num_rows($result)>0) {
				// output data of each row
				$row = mysql_fetch_array($result);
				if($row["password"]==$pass){
					$response["status"]= "ok";
					$response["role"]=$row["role"];
					$response["username"]=$row["username"];
					$response["mobile"]=$row["mobile"];
					$response["email"]=$row["email"];
					$response["avatar"]=$row["avatar"];
					$response["name"]=$row["name"];
				}
				else{
					$response["status"]="wrongpassword";
				}
			} else {
				$sql = "SELECT username, mobile, email, avatar, password,role,name FROM user WHERE mobile='".$user."'";
				$result = mysql_query($sql,$conn);
				if($result){
					if (mysql_num_rows($result)>0) {
						// output data of each row
						$row = mysql_fetch_array($result);
						if($row["password"]==$pass){
							$response["status"]= "mobile";
							$response["role"]=$row["role"];
							$response["username"]=$row["username"];
							$response["mobile"]=$row["mobile"];
							$response["email"]=$row["email"];
							$response["avatar"]=$row["avatar"];
							$response["name"]=$row["name"];
						}
						else{
							$response["status"]="wrongpassword";
						}
					} else {
						$response["status"]="nouser";
					}				
				}				
			}
		}
	}
	echo json_encode($response);
?>