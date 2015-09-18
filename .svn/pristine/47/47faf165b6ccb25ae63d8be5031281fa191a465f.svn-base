<?php
    include_once('system/model/db_fns.php');
	session_start();
	header("Content-Type: text/html; charset=utf-8");
	$conn = db_connect();

	$userid=$_SESSION['userid'];
	$type = $_POST['type'];

	if($type == 1){
		$query = "update t_user set username='".$_POST['param']."' where userid=".$userid;
	}else if($type == 2){
		$query = "update t_user set phone1='".$_POST['param']."' where userid=".$userid;
	}else if($type == 3){
		$query = "update t_user set phone2='".$_POST['param']."' where userid=".$userid;
	}else if($type == 0){
		$query = "update t_user set portid='".$_POST['portid']."' where userid=".$userid;
	}
	
	  $result = @$conn->query($query);
	  if($result)
	  {
		 echo "<script>alert('修改成功');</script>";
		 echo "<script>window.location.href='user_tx.php'</script>";  
	  }
	  else {
		 echo "<script>alert('修改失败！');history.back();</script>";
	  }
	 

?>