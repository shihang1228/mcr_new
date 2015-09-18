<?php
 session_start();		//启用session支持
 header("Content-Type: text/html; charset=utf-8");
 include_once('system/model/db_fns.php');		//包含系统功能文件
 include_once('mcr_sc_fns.php');
 
  $conn = db_connect();
  $conn ->query("start transaction");//开始事务

  $companyid = $_GET["companyid"];  //企业id
  
	//删除图片
	$delfile = true;
	$compic = get_mycompanypicpath($companyid);
	if (is_array($compic)) {
		foreach ($compic as $row)
		{
			if(!unlink($row["companypic"])) $delfile = false;
		}
	}
	
	$query="delete from t_companypic where companyid = ".$companyid;
	$delpic =$conn->query($query);
	

  $query ="delete from t_company where companyid=".$companyid;  //删除指定的企业
  //echo $query;
   $result =$conn->query($query);
   
   	  if($delfile && $delpic  && $result){
		 $conn->query("commit");//提交事务
		 echo "<script>alert('删除成功！');window.location.href='mycompany.php'</script>";
         return; 
	 }
	 else {
		 $conn->query("rollback");//提交事务
		 echo "<script>alert('删除失败！');history.back();</script>";
         return; 
	 }
?>