<?php
	include("dbcon.inc");
	function base64_to_jpeg($base64_string,$last) {
		$target_path = "image/product/";
		$sufix=time();
		$output_file=$target_path."IMG".$sufix.$last;

		file_put_contents($output_file, base64_decode($base64_string));

		return $output_file; 
	}   
    $id=(int)$_POST['id'];
	$videofile=$_POST['videofile'];	
	$returnValue=array("status"=>"fail");

	file_put_contents("a.txt", $videofile);
	$filename= "";
	if($videofile != "")
	{
		$filename=base64_to_jpeg($videofile, ".mov");
	}	
	
	$sql = "UPDATE product SET video='$filename' WHERE id='$id'";

	$result = mysql_query($sql,$conn);
	if($result){
		$returnValue['status']="ok";
	}
	else{
	 	$returnValue['status']="fail";
	}
	echo json_encode($returnValue);
?>