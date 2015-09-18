<?php
    include_once('../system/model/db_fns.php');
	header("Content-Type: text/html; charset=utf-8");
	$conn = db_connect();
	
    $companyid=$_GET['companyid'];
	
	$query1 = " delete from t_company where companyid=".$companyid;
	//echo $query1;
	//return;
	$result = @$conn->query($query1);
	if($result){//操作成功
	 echo "<script>alert('操作成功！');history.back(-1);</script>";
   }else{
      echo "<script>alert('操作失败！');history.back();</script>";
	}
?>