﻿<?php
 session_start();		//启用session支持
 header("Content-Type: text/html; charset=utf-8");
 include_once('../system/model/db_fns.php');		//包含系统功能文件
 
  $conn = db_connect();

  $publishtime=date("Y-m-d H:i:s");//发布时间
	//$cdkey = $_GET["cdkey"];  //用户id
	$areavalue =$_SESSION['portid'];

	$str = 'traindate!=\'0\' and ';
	//列号
	$train = $_GET['train'];
	if(strlen($train)==0){
		echo '<script>alert("请选择列!");history.back();</script>';
		return;
	}
	if($train!=0) $str .= "train='".$train."' and ";
	//列日期
	$trainDate = $_GET['trainDate'];
	if($trainDate==0){
		echo '<script>alert("请选择日期!");history.back();</script>';
		return;
	}
	if($trainDate!=0) $str .= "TIMESTAMPDIFF(day,'".$trainDate."',traindate)=0 and ";
	//状态	
	$status=$_GET['status'];
	if($status==0){
		echo '<script>alert("请选择状态!");history.back();</script>';
		return;
	}
	if($status!=0){
		switch($status){
			case 1:break;
			case 2:
					$str .= "(kindid!=0 or stuffid!=0 or productlen!=0)";
					break;
			case 3:
					$str .= "(kindid=0 and stuffid=0 and productlen=0)";
					break;
			default:break;
		}
		$str .= " and ";
	}
	$updatetime =$publishtime;
	//if(strlen($str)>0) //$str=substr($str,0,strlen($str)-4);
	$query ="update t_product set salestatusid=4,completetime='".$updatetime."' where ".$str.' goodtype=1 and salestatusid<>4';  //TIMESTAMPDIFF(day,traindate,now())>=3 and 
	//echo $query;
	$result =$conn->query($query);
	if($result)
	{
		echo "<script>alert('下架成功！');history.back();</script>";  //history.back();
	}else{
		echo "<script>alert('下架失败！');history.back();</script>";
	}
?>