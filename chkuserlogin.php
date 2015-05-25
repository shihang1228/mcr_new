<?php
session_start();
if(isset($_SESSION['user'])){
	echo "<script>alert('您已经登录系统！'); window.location.href='user.php';</script>";		
}else{
  include_once('db_fns.php');
  header("Content-Type: text/html; charset=utf-8");
  $conn = db_connect();
  $type=$_POST["type"];
if(isset($_POST["phoneNumber"]) && isset($_POST["userpwd"])){
$query="select phone,userid from t_user where phone='".$_POST["phoneNumber"]."' and password='".md5(trim($_POST["userpwd"]))."'";
$result=$conn->query($query);
$num =$result->num_rows;
if($num==1){
	$row=$result->fetch_row();
    $_SESSION['user']=$_POST["phoneNumber"];
	$_SESSION['userid']=$row[1];
	if($type ==1){
		echo "<script>alert('登录成功！');window.location.href='user.php';</script>"; 
	}
	else if($type ==2) {
		echo "<script>alert('登录成功！');window.location.href='release.php';</script>"; 
	}
	else if($type==3) {
		echo "<script>alert('登录成功！');window.location.href='buypush.php';</script>";
	}
	else if($type==4) {
		echo "<script>alert('登录成功！');window.location.href='salepush.php';</script>";
	}
}else{
  echo "<script>alert('登录失败！手机号或者用户名输入错误');history.back();</script>";
}
}
}
?>