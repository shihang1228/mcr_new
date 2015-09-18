<?php
    session_start();
	include_once('db_fns.php');
	include_once('upload_mkn.php');
	$date=date("Y-m-d H:i:s");
	error_reporting(0);
	$username = $_POST['username'];
	$usercity=$_POST['city'];
	$phone=$_POST['phone'];
	

	
   
    
	
	if($username){
	$con_mkn = db_connect();
	$sql = " update t_user set ";
	$sql = $sql."username='{$username}',";
	$sql = $sql."logintime='{$date}'";
	$sql = $sql." where userid='{$_SESSION['userid']}'";
	$rs = mysqli_query($con_mkn,$sql);
	if($rs){
		header("Content-Type:text/html;charset=utf-8");
		echo "<script>alert('修改成功！');history.back();</script>";
		exit;
		}
		else
		{
			echo "<script>alert('修改失败！');history.back();</script>";
			exit;
		}
	}
	
		
	
	if($usercity){
	$con_mkn = db_connect();
	$sql = " update t_user set ";
	$sql = $sql."city='{$usercity}',";
	$sql = $sql."logintime='{$date}'";
	$sql = $sql." where userid='{$_SESSION['userid']}'";
	
	$rs = mysqli_query($con_mkn,$sql);
	if($rs){
		header("Content-Type:text/html;charset=utf-8");
		echo "<script>alert('修改成功！');history.back();</script>";
		exit;
		}
		else
		{
			echo "<script>alert('修改失败！');history.back();</script>";
			exit;
		}
	}
	
	
	if($phone){
	$con_mkn = db_connect();
	$sql = " update t_user set ";
	$sql = $sql."logintime='{$date}',";
	$sql = $sql."phone='{$phone}'";
	$sql = $sql." where userid='{$_SESSION['userid']}'";
	
	$rs = mysqli_query($con_mkn,$sql);
	if($rs){
		header("Content-Type:text/html;charset=utf-8");
		echo "<script>alert('修改成功！');history.back();</script>";
		exit;
		}
		else
		{
			echo "<script>alert('修改失败！');history.back();</script>";
			exit;
		}
		
	}
	
	
	$con_mkn = db_connect();
	$sql = " update t_user set ";
	$sql = $sql."logintime='{$date}',";	
	if($_FILES['lc_pic']['name']<>"")
	{
		$up=new upphoto;
		$up->get_ph_tmpname($_FILES['lc_pic']['tmp_name']);
		$up->get_ph_type($_FILES['lc_pic']['type']);
		$up->get_ph_size($_FILES['lc_pic']['size']);
		$up->get_ph_name($_FILES['lc_pic']['name']);
		$up->save();
		$lc_pic = $up->ph_name;
		$sql = $sql."userpic='{$lc_pic}'";
	}
	$sql = $sql." where userid='{$_SESSION['userid']}'";
	
	$rs = mysqli_query($con_mkn,$sql);
	if($rs){
		header("Content-Type:text/html;charset=utf-8");
		echo "<script>alert('修改成功！');history.back();</script>";
		
		}
		else
		{
		header("Content-Type:text/html;charset=utf-8");	
			echo "<script>alert('修改失败！');history.back();</script>";
		}
	
?>
