<?php
	include("dbcon.inc");
	$productdata=json_decode($_POST["productdata"]);
	$username=$productdata->username;
	$productids=$productdata->productids;
	
	$returnValue="success";
	foreach( $productids as $id){
		if($username=="admin"){
			$sql = "UPDATE product SET admincheck='check' WHERE id=$id";			
		}
		else{
			$sql = "UPDATE product SET usercheck='check' WHERE lastbid='$username' AND id=$id";
			echo $username.' '.$id;
		}
		$result = mysql_query($sql,$conn);
		if(!$result){
			$result="fail";
		}
	}
	echo json_encode($returnValue);
?>