<?php
    session_start();		//启用session支持
    header("Content-Type: text/html; charset=utf-8");
    include_once('system/model/db_fns.php');		//包含系统功能文件
 
	  $conn = db_connect();
	  $collectid = $_GET["collectid"];  //cdkey
	  $query="delete from t_collect where collectid  = ".$collectid;
	  $delresult =$conn->query($query);

   
   	 if( $delresult){
		 echo "<script>alert('删除成功！');window.location.href='mycollect.php'</script>";
         return; 
	 }
	 else {
		 echo "<script>alert('删除失败！');history.back();</script>";
         return; 
	 }
?>