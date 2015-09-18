<?php
    include_once('../system/model/db_fns.php');
	header("Content-Type: text/html; charset=utf-8");
	$conn = db_connect();
	
    $fieldid=$_POST['fieldid'];
	$introduce=$_POST['introduce'];
	$score=$_POST['score'];

	
	
	 $query1 = "update t_field set introduce='".$introduce."',score=".$score
         ." where fieldid= ".$fieldid ;
	$result = @$conn->query($query1);
	if($result){//操作成功
	 echo "<script>alert('操作成功！');window.location.href='scoremanage.php'</script>";
   }else{
      echo "<script>alert('操作失败！');history.back();</script>";
	}
?>