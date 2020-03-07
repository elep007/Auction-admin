<?php
	include("dbcon.inc");
	
	$returnValue=array();
	$categories=array();

		$sql = "SELECT * FROM category";
		$result = mysql_query($sql,$conn);
		if($result){
			$returnValue["status"]="ok";
			if (mysql_num_rows($result)>0) {
				// output data of each row
				while($row = mysql_fetch_array($result)){
					$temp=array();
					$temp['id']=$row['id'];
					$temp['name']=$row['name'];
					$temp['image']=$row['image'];
					$catid=$row['id'];
					$sql1 = "SELECT * FROM product WHERE catid=$catid";
					$result1 = mysql_query($sql1,$conn);
					$temp["count"]=mysql_num_rows($result1);
					array_push($categories,$temp);
				}
				$returnValue["categories"]=$categories;
			}
		}
		else{
			$returnValue["status"]="nocategory";
		}		

	echo json_encode($returnValue);
?>