<?php
 session_start();		//启用session支持
 header("Content-Type: text/html; charset=utf-8");
 include_once('../system/model/db_fns.php');		//包含系统功能文件
 
  $conn = db_connect();

  $publishtime=date("Y-m-d H:i:s");//发布时间
  $buyid = $_GET["buyid"];  //用户id
  //下架(2交易成功3交易未成)
  $buyid = $_GET["buyid"];  
  $updatetime =$publishtime;
 
	//$buystatus =1; //求购状态
    $query ="update t_buy set buystatus=2,finishtime='".$updatetime."' where buyid=".$buyid;  //更新求购状态及下架时间
	$result =$conn->query($query);
   if($result)
   {
     echo "<script>alert('下架成功！');history.back();</script>";
   }else{
      echo "<script>alert('下架失败！');history.back();</script>";
	  }
?>