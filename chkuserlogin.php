﻿<?php
	session_start();
	if(isset($_SESSION['user'])){
		echo "<script>alert('您已经登录系统！'); window.location.href='user.php';</script>";		
	}else{
	  include_once('db_fns.php');
	  header("Content-Type: text/html; charset=utf-8");
	  $conn = db_connect();
	  $type=$_POST["type"];
			if(isset($_POST["phoneNumber"]) && isset($_POST["userpwd"])){
			$query="select phone,userid,freeze,rightid,username from t_user where phone='".$_POST["phoneNumber"]."' and password='".md5(trim($_POST["userpwd"]))."'";
			$result=$conn->query($query);
			$num =$result->num_rows;
			if($num==1){
				$row=$result->fetch_row();
				$_SESSION['user']=$_POST["phoneNumber"];
				$_SESSION['phone']=$_POST["phoneNumber"];
				$_SESSION['userid']=$row[1];
				$_SESSION['freeze']=$row[2];
				$_SESSION['ismgr']=$row[3];
				$_SESSION['username']=$row[4];
				//登录成功更改
				$sql="update t_user set loginnum=loginnum+1,logintime='".date("Y-m-d H:i:s")."' where userid =".$row[1];
                $result=$conn->query($sql);
				//
				if($type ==1){
					echo "<script>window.location.href='user.php';</script>"; 
				}
				else if($type ==2) {
					echo "<script>window.location.href='sh_release.php';</script>"; 
				}
			}else{
			  echo "<script>alert('登录失败！手机号或者用户名输入错误');history.back();</script>";
			}
		}
	}
?>