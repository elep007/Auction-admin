<?php
    include("dbcon.inc");
    
	function remainTime($start){
		$startTime = new DateTime($start);
		$nowTime=new DateTime();

		$diff=$nowTime->diff($startTime);

		if($nowTime>$startTime){
			return "Ended";
		}
		else{
			return $diff->format("%H:%I:%S");
		}
    }	
    
	$content=trim(file_get_contents("php://input"));
	$decoded=json_decode($content,true);
	
    $user=trim($decoded["username"]);
	$returnValue=array();

	$sql = "SELECT * FROM product WHERE lastbid='$user'";

try{	
	$result = mysql_query($sql,$conn);
	if($result){

		if (mysql_num_rows($result)>0) {
			// output data of each row
			$products=array();
			while($row = mysql_fetch_array($result)){
				//echo $row['endtime'];
				$endtime=new Datetime($row['endtime']);
				$nowTime=new DateTime();

				if($nowTime>$endtime){
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
                    if($temp["endtime"]=="Ended"){
                        array_push($products,$temp);
                    }
				}
            }
            if($products){
                $returnValue["status"]="ok";
                $returnValue["products"]=$products;
            }
            else{
                $returnValue["status"]="nowin";
            }
		}
		else{
			$returnValue["status"]="nowin";
		}
	}
	else{
		$returnValue["status"]="nowin";
	}		
	echo json_encode($returnValue);
}
catch (Exception $e) {
	$returnValue["status"]= $e->getMessage();
}
?>