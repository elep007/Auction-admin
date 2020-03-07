<?php
	include("dbcon.inc");

	function updateCheck($winners,$con,$role,$username){
		foreach( $winners as $theWinner){
			$id=$theWinner['id'];
			
			if($role=="admin"){
				$sql = "UPDATE product SET admincheck='check' WHERE id=$id";			
			}
			else{
				$sql = "UPDATE product SET usercheck='check' WHERE lastbid='$username' AND id=$id";
			}
			$result = mysql_query($sql,$con);
		}
	}

	$content=trim(file_get_contents("php://input"));
	$decoded=json_decode($content,true);
	
	$returnValue=array();
	$role=trim($decoded["role"]);
	$username=trim($decoded["username"]);
	if(empty($role)||empty($username)){
		$returnValue["status"]="fail";
		exit();
	}
	
	if($role=='admin'){
		$sql = "SELECT id, name,price,countdown,endtime,lastbid FROM product WHERE admincheck!='check'";
	}
	else{
		$sql = "SELECT id, name,price,countdown,endtime,lastbid FROM product WHERE lastbid='$username' AND usercheck!='check'";
	}
try{	
	$result = mysql_query($sql,$conn);
	if($result){

		if (mysql_num_rows($result)>0) {
			// output data of each row
			$winners=array();
			while($row = mysql_fetch_array($result)){
				//echo $row['endtime'];
				$endtime=new Datetime($row['endtime']);
				$nowTime=new DateTime();

				if($nowTime>$endtime){
					$temp=array();
					$temp['id']=$row['id'];
					$temp['username']=$row['lastbid'];
					$temp['price']=$row['price'];
					$temp['productname']=$row['name'];
					$username1=$row["lastbid"];			//for admin
					$temp["id"]=$row["id"];

					$sql1 = "SELECT name,mobile FROM user WHERE username='$username1'";
					$result1 = mysql_query($sql1,$conn);
					
					if($result1){
						$row1=mysql_fetch_array($result1);
						$temp['name']=$row1['name'];
						$temp['mobile']=$row1['mobile'];
						array_push($winners,$temp);
					}
				}
			}
			if($winners){
				$returnValue["status"]="ok";
				$returnValue["winners"]=$winners;
				updateCheck($winners,$conn,$role,$username);
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