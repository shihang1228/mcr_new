<?php
	session_start();
	$portid=$_SESSION['portid'];
	include_once("../system/model/db_fns.php");
//	error_log(date('Y-m-d H:i:s') .'收到数据'."\n",3,$_SERVER['DOCUMENT_ROOT']."/log/run.log");
	//header("Content-Type: text/html; charset=utf-8");
	
	$kind_id = $_POST['kindid'];  //
	$stuff_id = $_POST['stuffid'];  //
	$productlen = $_POST['productlen'];  //
	$date_s = $_POST['date_s'];  //
	$date_e = $_POST['date_e'];  //*/
	//error_log(date('Y-m-d H:i:s') .'收到数据:'.$kind_id.' 目标:'.$stuff_id.'  '.$productlen.'  '.$date_s.'  '.$date_e."\n",3,$_SERVER['DOCUMENT_ROOT']."/log/run.log");
	$condition = "";
	if($kind_id!=0) $condition = "kindid=".$kind_id.' and ';
	if($stuff_id!=0) $condition = $condition."stuffid=".$stuff_id.' and ';
	if($productlen!=0) $condition = $condition."productlen=".$productlen.' and ';
	//error_log(date('Y-m-d H:i:s') .'收到数据'.$condition."\n",3,$_SERVER['DOCUMENT_ROOT']."/log/run.log");
	$data_arr = getdata("call p_graph_line('".$condition."','".$date_s."','".$date_e."')");
	/*
	categories: ['8.10', '8.11', '8.12', '8.13', '8.14','8.15','8.16','8.17','8.18','8.19','8.20','8.21']
	data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
	*/
	$categories = '';
	$data = '';
	$rtn_arr = array();
	$i = 0;
	if(is_array($data_arr)){
		foreach($data_arr as $row){

			//$categories = $categories.'\''.$row['pubdate'].'\',';
			$rtn_arr[$i] = array("categories"=>$row["pubdate"],"datavalue"=>$row["numpoint"]);
			$i++;
			//$categories = $categories.'\''.$row['pubdate'].'\',';
			//$data = $data.$row['numpoint'].',';
		}
		/*
		if($data!=''){
			$categories = '['.substr($categories,0,strlen($categories)-1).']';
			$data = '['.substr($data,0,strlen($data)-1).']';
		}*/
	}
	//$reparr = array("categories"=>$categories,"datavalue"=>$data);
	echo json_encode($rtn_arr);
	return;
?>