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
	

	$categoryname=$_POST['categoryname'];
	$name=$_POST['name'];
	$isvideo=$_POST['isvideo'];
	$description=$_POST['description'];
	$price=$_POST['price'];
	$lastbid=$_POST['lastbid'];
	$uploadfileString="";
	$video="";
	$isphoto=$_POST['isphoto'];
	if($isphoto == 'photo'){
		$uploadfileArray=(array) $_POST['uploadfile'];
		for($i=0;$i<count($uploadfileArray);$i++){	
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

			$sql = "INSERT INTO product (catid, name ,image,isvideo,description,price,lastbid,countdown,endtime,seller,paystatus)
				VALUES ($catid,'$name','$uploadfileString','$isvideo','$description',$price,'no bid',$countdown,'$endtime','$lastbid','no')";
			$result = mysql_query($sql,$conn);
			if($result){
	 			$returnValue["status"]="ok";
	 			$returnValue["lastinsert"]=mysql_insert_id();
	 			
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
				$returnValue["lastbid"]=$endtime;
			}			
		}
		catch(Exception $e){
			$returnValue["status"]= $e->getMessage();
		}
	echo json_encode($returnValue);
?>