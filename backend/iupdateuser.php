<?php
	include("dbcon.inc");

	$content=trim(file_get_contents("php://input"));
	$decoded=json_decode($content,true);
    
    $username=trim($_POST['username']);
	$name=trim($_POST['name']);
	$email=trim($_POST['email']);
	$mobile=trim($_POST['mobile']);
	
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