<?php
	include("dbcon.inc");

	function base64_to_jpeg($base64_string,$last) {
		$target_path = "image/product/";
		$sufix=time();
		$output_file=$target_path."IMG".$sufix.$last;

		file_put_contents($output_file, base64_decode($base64_string));

		return $output_file; 
	}

	function getCategoryID($categoryname,$con){
		$sql = "SELECT id FROM category WHERE name='$categoryname'";
		$result = mysql_query($sql,$con);
		if($result){
			$row = mysql_fetch_array($result);
			return $row["id"];
		}
		else{
			
		}
		
	}
	$content=trim(file_get_contents("php://input"));
	$decoded=json_decode($content,true);

	$categoryname=trim($decoded['categoryname']);
	$name=trim($decoded['name']);
	$isvideo=trim($decoded['isvideo']);
	$description=trim($decoded['description']);
	$price=intval($decoded['price']);
	$lastbid=trim($decoded['lastbid']);
	$seller=$decoded['seller'];
	$uploadfiles=$decoded['uploadfile'];

	$uploadfileArray=(array) json_decode($uploadfiles);
	
	$uploadfileString="";
	$video="";
	for($i=0;$i<count($uploadfileArray);$i++){
		if($isvideo=="video" && $i==count($uploadfileArray)-1){
			$filename=base64_to_jpeg($uploadfileArray[$i],$i.".mp4");
			$video=$filename;
		}
		else{	
			$filename=base64_to_jpeg($uploadfileArray[$i],$i.".jpg");
			if($i==0){
				$uploadfileString=$filename;
			}
			else{
				$uploadfileString=$uploadfileString."_split_".$filename;
			}
		}
	}
	$returnValue=array();
	
	try{
			//$video=$target_file5;
			$countdown=0;
			$temp=new dateTime();
			$temp=$temp->modify('+1 days');
			$endtime=$temp->format('Y/m/d H:i:s');
			$catid=getCategoryID($categoryname,$conn);

            $sql = "INSERT INTO product (catid, name ,image,isvideo,video,description,price,lastbid,countdown,endtime,seller)
				VALUES ($catid,'$name','$uploadfileString','$isvideo','$video','$description',$price,'$lastbid',$countdown,'$endtime','$seller')";
    		$result = mysql_query($sql,$conn);

			if($result){
				$returnValue["status"]="ok";
				//add history
                $temp=new dateTime();
                $curtime=$temp->format('Y/m/d H:i:s');

                $sql = "SELECT * FROM `product` WHERE name='$name' and endtime='$endtime' limit 1";
                $result = mysql_query($sql,$conn);
                $row=mysql_fetch_array($result);

                $productid=$row["id"];

                $sql = "INSERT INTO auction_bid_history (date, username, price, productid)
				VALUES ('$curtime','no bid',$price,$productid)";
                $result = mysql_query($sql,$conn);

			}
			else{
				$returnValue["status"]="fail";
				$returnValue["catid"]=$catid;
				$returnValue["catname"]=$categoryname;
				$returnValue["name"]=$name;
				$returnValue["image"]=$uploadfileString;
				$returnValue["isvieo"]=$isvideo;
				$returnValue["description"]=$description;
				$returnValue["price"]=$price;
				$returnValue["lastbid"]=$lastbid;
				$returnValue["countdown"]=$countdown;
				$returnValue["endtime"]=$endtime;

			}			
		}
		catch(Exception $e){
			$returnValue["status"]= $e->getMessage();
		}
	echo json_encode($returnValue);
?>