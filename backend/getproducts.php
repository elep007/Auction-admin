<?php
	include("dbcon.inc");
	
	function remainTime($start){
		$startTime = new DateTime($start);
		$nowTime=new DateTime();

		file_put_contents("log.txt",$startTime->format("Y/m/d H:i:s ").$nowTime->format("Y/m/d H:i:s"));

		$diff=$nowTime->diff($startTime);
		
		$returnValue="in ";
		if($nowTime>$startTime){
			if($diff->days>=2){
				return "Past";
			}
			else{
				return "Ended";
			}
		}
		else{
			return $diff->format("%H:%I:%S");
		}
		return $returnValue;
	}	
	
	$content=trim(file_get_contents("php://input"));
	$decoded=json_decode($content,true);
	
	$catid=intval($decoded['catid']);

	$returnValue=array("status"=>"noproduct");
	$products=array();

		$sql = "SELECT * FROM product WHERE catid=".$catid;
		$result = mysql_query($sql,$conn);
		if($result){
			if (mysql_num_rows($result)>0) {
				// output data of each row
				while($row = mysql_fetch_array($result)){
					$temp=array();
					$temp['id']=$row['id'];
					$temp['catid']=$row['catid'];
					$temp['name']=$row['name'];
					$temp['image']=$row['image'];
					$temp['isvideo']=$row['isvideo'];
					$temp['video']=$row['video'];
					$temp['description']=$row['description'];
					$temp['price']=$row['price'];
					$temp['lastbid']=$row['lastbid'];
					$temp['countdown']=$row['countdown'];
					$temp['seller']=$row['seller'];
					$temp['paystatus']=$row['paystatus'];
					$temp['endtime']=remainTime($row['endtime']);
					if($temp['endtime']!="Past"){
						array_push($products,$temp);
					}
				}
				if(count($products)>0){
					$returnValue["status"]="ok";
					$returnValue["products"]=$products;
				}
				else{
					$returnValue["status"]="noproduct";
				}
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