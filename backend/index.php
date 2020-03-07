<?php
		$startTime = new DateTime("2019/5/17 20:30:12");
		$nowTime=new DateTime();
		echo $nowTime->format("Y/m/d H:i:s  ");
		$diff=$nowTime->diff($startTime);
		echo $diff->format("%Y/%m/%d %H:%i:%s");
?>