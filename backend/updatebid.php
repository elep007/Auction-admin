<?php
	include("dbcon.inc");

	$content=trim(file_get_contents("php://input"));
	$decoded=json_decode($content,true);
	
	$lastbid=trim($decoded['lastbid']);
	$countdown=intval($decoded['countdown']);
	$price=intval($decoded['price']);
	$id=intval($decoded['id']);
	
	$returnValue=array("status"=>"fail");
			$sql = "UPDATE product SET lastbid='$lastbid',countdown=$countdown,price=$price WHERE id=$id";

			$result = mysql_query($sql,$conn);
			if($result){
				$returnValue['status']="ok";
//-------history
				$temp=new dateTime();
                $curtime=$temp->format('Y/m/d H:i:s');

                $sql = "INSERT INTO auction_bid_history (date, username, price, productid)
				VALUES ('$curtime','$lastbid',$price,$id)";
				$result = mysql_query($sql,$conn);
//---------history				
			}
			else{
				$returnValue['status']="fail";
			}

	echo json_encode($returnValue);
?>