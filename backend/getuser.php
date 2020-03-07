<?php
	include("dbcon.inc");
	
	$content=trim(file_get_contents("php://input"));
	$decoded=json_decode($content,true);
	
	$username=trim($decoded['username']);

	$returnValue=array("status"=>"nouser");

		$sql = "SELECT * FROM user WHERE username='$username'";
		$result = mysql_query($sql,$conn);
		if($result){
			if (mysql_num_rows($result)>0) {
				// output data of each row
				$row = mysql_fetch_array($result);

                $temp=array();
                $temp['mobile']=$row['mobile'];
                $temp['email']=$row['email'];
                $temp['name']=$row['name'];
				$temp['password']=$row['password'];
				$temp['avatar']=$row['avatar'];
				
				$returnValue["status"]="ok";
				$returnValue["user"]=$temp;
			}
			else{
				$returnValue["status"]="nouser";
			}
		}
		else{
			$returnValue["status"]="nouser";
		}		

	echo json_encode($returnValue);
?>