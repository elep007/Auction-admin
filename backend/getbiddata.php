<?php
	include("dbcon.inc");
	
	$content=trim(file_get_contents("php://input"));
	$decoded=json_decode($content,true);
	
	$username=trim($decoded['username']);

	$returnValue=array("status"=>"noproduct");
	$products=array();
	$total=0;
	$active=0;
	$won=0;

		$sql = "SELECT * FROM product";
		$result = mysql_query($sql,$conn);
		if($result){
			if (mysql_num_rows($result)>0) {
				// output data of each row
				while($row = mysql_fetch_array($result)){
					
					$lastbid=$row['lastbid'];
					$endtime = new DateTime($row['endtime']);
					$nowtime=new DateTime();
					if($nowtime>$endtime ){
						if($lastbid==$username){
							$won++;
						}
					}
					else{
						if($lastbid==$username){
							$active++;
						}
						$total++;
					}
				}

			}
		}
		$sql = "SELECT name,avatar FROM user WHERE username='$username'";
		$result = mysql_query($sql,$conn);
		if($result){
			$row=mysql_fetch_array($result);
			$returnValue["name"]=$row["name"];
			$returnValue["avatar"]=$row["avatar"];
		}				
	$returnValue["status"]="ok";
	$returnValue["total"]=$total;
	$returnValue["active"]=$active;
	$returnValue["won"]=$won;
	echo json_encode($returnValue);
?>