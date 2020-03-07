<?php
	include("dbcon.inc");
	
	$username=$_POST['username'];

	$response=array("status"=>"noproduct");
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
	$response["status"]="ok";
	$response["total"]=$total;
	$response["active"]=$active;
	$response["won"]=$won;
	echo json_encode($response);
?>