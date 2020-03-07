<?php
	include("dbcon.inc");
	
	function remainTime($start){
		$startTime = new DateTime($start);
		$nowTime=new DateTime();

		$diff=$nowTime->diff($startTime);
		
		$returnValue="in ";
		if($nowTime>$startTime){
			return "Ended";
		}
		else{
			return $diff->format("%H:%I:%S");
		}
		return $returnValue;
	}	
	
	$content=trim(file_get_contents("php://input"));
	$decoded=json_decode($content,true);
	
	$catid=$_POST['catid'];
	$countpro=0;
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
					$temp['endtime']=remainTime($row['endtime']);
					$countpro++;
					array_push($products,$temp);
				}
				$returnValue["status"]="ok";
				$returnValue["products"]=$products;
			}
			else{
				$returnValue["status"]="noproduct";
			}
		}
		else{
			$returnValue["status"]="noptoduct";
		}		
	$returnValue["countpro"]=$countpro;
	echo json_encode($returnValue);
?>