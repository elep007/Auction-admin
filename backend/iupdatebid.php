<?php
	include("dbcon.inc");
	
	$lastbid=$_POST['lastbid'];
	$countdown=$_POST['countdown'];
	$price=trim($_POST['price']);
	$id=$_POST['id'];
	
	$returnValue=array("status"=>"fail");
			$sql = "UPDATE product SET lastbid='$lastbid',countdown=$countdown,price=$price WHERE id=$id";

			$result = mysql_query($sql,$conn);
			if($result){
				$returnValue['status']="ok";
				$temp=new dateTime();
                $curtime=$temp->format('Y/m/d H:i:s');

                $sql = "INSERT INTO auction_bid_history (date, username, price, productid)
				VALUES ('$curtime','$lastbid',$price,$id)";
				$result = mysql_query($sql,$conn);
			}
			else{
				$returnValue['status']="fail";
			}

	echo json_encode($returnValue);
?>