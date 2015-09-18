<?php
    include_once('system/model/db_fns.php');
	header("Content-Type: text/html; charset=utf-8");
	$conn = db_connect();
	$cdkey=$_POST['cdkey'];
	$userid=$_POST['userid'];
	$content=$_POST['content'];
	$keyword=$_POST['report'];
	
	
		$sql="insert into t_complain(cdkey,userid,content,keyword,updatetime) value ('".$cdkey."',".$userid.",'".$content."','".$keyword."',null)";
	    $inresult=$conn->query($sql);
		if ($inresult) {
			echo "<script>alert('举报成功，谢谢参与');window.location.href='detail.php?cdkey=".$cdkey."';</script>";
          // echo "<script>alert('举报成功，谢谢参与');history.back();</script>";
		  
		}
		else {
		  echo "<script>alert('举报失败，请稍后再试');history.back();</script>";
		 // return;
		}	
		
	?>