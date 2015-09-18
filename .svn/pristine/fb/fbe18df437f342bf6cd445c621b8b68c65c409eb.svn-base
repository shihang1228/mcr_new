<?php
	session_start(); // 启用session支持
	if (isset($_SESSION['userid'])) {
		$userid = $_SESSION['userid'];
		$userphone = $_SESSION['user'];
		$portid = $_SESSION["portid"]; // 目标口岸
	} else {
		echo "error:login";
		return;
	}
	// include_once('../model/db_fns.php'); //包含系统功能文件
	include_once ('system/model/db_fns.php'); // 包含系统功能文件
	header("Content-Type: text/html; charset=utf-8");

	if (!isset($_POST["content"])){
		return;
	}
	$content = $_POST["content"]; // 手机
	if(strlen($content)>0){
		$str = 'insert into t_messageboard(mb_text,mb_date,userid) values(\''.$content.'\',\''.date('Y-m-d H:i:s').'\','.$userid.')';
		if (!execute_sql($str)) error_log(date('Y-m-d H:i:s') .'聊天:'.$str."\n",3,$_SERVER['DOCUMENT_ROOT']."/log/sqlrun.log");
	}
	// error_log(date('Y-m-d H:i:s') .'spotpositionid='.$spotpositionid."\n",3,$_SERVER['DOCUMENT_ROOT']."/log/run.log");

	// error_log(date('Y-m-d H:i:s') .'求购:'.$buyid."\n",3,$_SERVER['DOCUMENT_ROOT']."/log/run.log");
?>