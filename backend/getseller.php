<?php
	include("dbcon.inc");
	
	$content=trim(file_get_contents("php://input"));
	$decoded=json_decode($content,true);
	
	$pid=intval($decoded['id']);

	$returnValue=array("status"=>"fail");

        $sql = "UPDATE `product` SET `paystatus`='yes' WHERE id=$pid";
		$result = mysql_query($sql,$conn);

		$sql = "SELECT name, mobile, email FROM user WHERE username in (SELECT seller FROM product WHERE id=$pid)";
		$result = mysql_query($sql,$conn);
		if($result){
			if (mysql_num_rows($result)>0) {
				// output data of each row
				$row = mysql_fetch_array($result);
                
                $temp=array();
                $temp['mobile']=$row['mobile'];
                $temp['email']=$row['email'];
                $temp['name']=$row['name'];
				
				$returnValue["status"]="ok";
				$returnValue["seller"]=$temp;

				//--------add transaction---------	
				$sql = "SELECT * FROM product WHERE id=$pid";
				$result = mysql_query($sql,$conn);
				$row = mysql_fetch_array($result);

				$temp=new dateTime();
				$curtime=$temp->format('Y/m/d H:i:s');
				$username=$row['lastbid'];

				$transaction="Contact fee for auction ".$row['name'];

				$sql = "INSERT INTO auction_transaction (date, username, transaction, amount, productid)
						VALUES ('$curtime','$username','$transaction',0.99,$pid)";
				$result = mysql_query($sql,$conn);
				//-----------------				
			}
			else{
				$returnValue["status"]="noseller";
			}
		}
		else{
			$returnValue["status"]="noseller";
		}		

	echo json_encode($returnValue);
?>