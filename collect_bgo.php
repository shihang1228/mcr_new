<?php
    include_once('system/model/db_fns.php');
	header("Content-Type: text/html; charset=utf-8");
	$conn = db_connect();
	$cdkey=$_POST['cdkey'];
	$userid=$_POST['userid'];
	
	$sql="select count(*)  from t_collect where cdkey='".$cdkey."' and userid=".$userid;
    $result =$conn->query($sql);
	$row=$result->fetch_row();
    if ($row[0]>0) {
		echo "success";
		return;
	}
    else {
		$sql="insert into t_collect(cdkey,userid,updatetime) value ('".$cdkey."',".$userid.",null)";
	    $inresult=$conn->query($sql);
		if ($inresult) {
		  echo "success";
		  return;
		}
		else {
			echo "error";
		return;
		}
	}	
	?>