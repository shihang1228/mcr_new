﻿<?php
    include_once('../system/model/db_fns.php');
	header("Content-Type: text/html; charset=utf-8");
	$conn = db_connect();
	
    $positionid=$_GET['positionid'];
	$query1 = "update t_spotposition set deltag=1,code=0 where spotpositionid= ".$positionid ;
		 
	$result = @$conn->query($query1);
	if($result){//操作成功
	 echo "<script>alert('操作成功！');window.location.href='positionmanage.php'</script>";
   }else{
      echo "<script>alert('操作失败！');history.back();</script>";
	}
?>