<?php
	include("dbcon.inc");
	
	$content=trim(file_get_contents("php://input"));
	$decoded=json_decode($content,true);

	$user=trim($decoded['username']);
	$pass=md5(trim($decoded['password']));
	
	$returnValue=array("status"=>"error");

	if(empty($user) ||empty($pass)){
		
	}
	else{
		$sql = "SELECT password,role FROM user WHERE username='".$user."'";
		$result = mysql_query($sql,$conn);
		if($result){

			if (mysql_num_rows($result)>0) {
				// output data of each row
				$row = mysql_fetch_array($result);
				if($row["password"]==$pass){
					$returnValue["status"]= "ok";
					$returnValue["role"]=$row["role"];
				}
				else{
					$returnValue["status"]="wrongpassword";
				}
			} else {
				$sql = "SELECT username,password,role FROM user WHERE mobile='".$user."'";
				$result = mysql_query($sql,$conn);
				if($result){
					if (mysql_num_rows($result)>0) {
						// output data of each row
						$row = mysql_fetch_array($result);
						if($row["password"]==$pass){
							$returnValue["status"]= "mobile";
							$returnValue["username"]=$row["username"];
							$returnValue["role"]=$row["role"];
						}
						else{
							$returnValue["status"]="wrongpassword";
						}
					} else {
						$returnValue["status"]="nouser";
					}				
				}				
			}
		}
	}
	echo json_encode($returnValue);
?>