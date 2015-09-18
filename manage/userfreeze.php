<?php
    include_once('../system/model/db_fns.php');
	header("Content-Type: text/html; charset=utf-8");
	$conn = db_connect();
	$filtervalue="";
    $noconnect ="<p>对不起，没有查找到您要查找的内容！</p>";

     $type=$_GET['type'];
	 $userid=$_GET['userid'];
	//判断条件
	
    if($type==1){ //冻结
		$query="update t_user set freeze=1 where userid=".$userid;
	}
	else if($type ==2){//解冻
		$query="update t_user set freeze=0 where userid=".$userid;
	}
	else {//删除
		
	  $query="delete from t_user where userid=".$userid;	
	}
	
	$result = @$conn->query($query);
	if($result){//操作成功
	  //echo "<script>alert('操作成功！');window.location.href='usermanage.php'</script>";
	  echo "<script>alert('操作成功！');history.go(-1);  </script>";
	// header("Location:usermanage.php"); 
   }else{
      echo "<script>alert('操作失败！');history.back();</script>";
	}
	 
?>