<?php
	include("dbcon.inc");

	function getUserName($firstusername,$con){
		$returnValue["adfadadf"]=$firstusername;
		$sql = "SELECT * FROM user WHERE username='$firstusername'";
		$result = mysql_query($sql,$con);
		if($result){
			$row = mysql_fetch_array($result);
			return $row['name'];
		}
		else{
			
		}		
	}
	function getUserEmail($firstusername,$con){
		$returnValue["adfadadf"]=$firstusername;
		$sql = "SELECT * FROM user WHERE username='$firstusername'";
		$result = mysql_query($sql,$con);
		if($result){
			$row = mysql_fetch_array($result);
			return $row['email'];
		}
		else{
			
		}		
	}
	function getUserMobile($firstusername,$con){
		$sql = "SELECT * FROM user WHERE username='$firstusername'";
		$result = mysql_query($sql,$con);
		if($result){
			$row = mysql_fetch_array($result);
			return $row['mobile'];
		}
		else{
			
		}		
	}
	
	$content=trim(file_get_contents("php://input"));
	$decoded=json_decode($content,true);
	
	$id=$_POST['id'];
    
	$returnValue=array("status"=>"product");
	$returnValue["id"]=$id;
		$sql = "SELECT * FROM product WHERE id=".$id;
		$result = mysql_query($sql,$conn);
		if($result){
			if (mysql_num_rows($result)>0) {
				// output data of each row
				$row = mysql_fetch_array($result);
                $temp=array();             
                $firstusername = $row['seller'];		
                $returnValue['firstusername'] = getUserName($firstusername, $conn);
				$returnValue['firstuseremail'] = getUserEmail($firstusername, $conn);
				$returnValue['firstusermobile'] = getUserMobile($firstusername, $conn);
				$sql = "UPDATE product SET paystatus= 'yes' WHERE id=$id";
				$result = mysql_query($sql,$conn);
				$returnValue["status"]="ok";
				
				$sql = "SELECT * FROM product WHERE id=$id";
				$result = mysql_query($sql,$conn);
				$row = mysql_fetch_array($result);

				$temp=new dateTime();
				$curtime=$temp->format('Y/m/d H:i:s');
				$username=$row['lastbid'];

				$transaction="Contact fee for auction ".$row['name'];

				$sql = "INSERT INTO auction_transaction (date, username, transaction, amount, productid)
						VALUES ('$curtime','$username','$transaction',0.99,$id)";
				$result = mysql_query($sql,$conn);
			}
			else{
				$returnValue["status"]="noproduct";
			}
		}
		else{
			$returnValue["status"]="noptoduct";
		}	

	echo json_encode($returnValue);
?>