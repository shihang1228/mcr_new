<?php
 session_start();		//启用session支持
 header("Content-Type: text/html; charset=utf-8");
 include_once('../system/model/db_fns.php');		//包含系统功能文件
 
  $conn = db_connect();

  $publishtime=date("Y-m-d H:i:s");//发布时间
	//$cdkey = $_GET["cdkey"];  //用户id
	$areavalue =$_SESSION['portid'];
	$carnum = $_GET["carnum"];
	$str = 'traindate!=\'0\' and ';
	if($carnum!=0) $str .= "carnum='".$carnum."' and ";
	$kindselect = $_GET['kindselect'];
	if($kindselect!=0) $str .= "kindid=".$kindselect." and ";
	$stuffselect = $_GET['stuffselect'];
	if($stuffselect!=0) $str .= "stuffid=".$stuffselect." and ";
	
	$startTime = $_GET['startTime'];
	if($startTime!=0) $str .= "TIMESTAMPDIFF(day,'".$startTime."',traindate)>=0 and ";
	
	$endTime = $_GET['endTime'];
	if($endTime!=0) $str .= "TIMESTAMPDIFF(day,traindate,'".$endTime."')>=0 and ";
		
	$productlen=$_GET['productlen'];
	if($productlen!=0) $str .= "productlen=".$productlen." and ";
	$productwide=$_GET['productwide'];
	if($productwide!=0) $str .= "wide=".$productwide." and ";
    $thinckness=$_GET['thinckness'];
	if($thinckness!=0) $str .= "thinckness=".$thinckness." and ";
	$diameterlen=$_GET['diameterlen'];
	if($diameterlen!=0) $str .= "diameterlen=".$diameterlen." and ";
	$timber=$_GET['timber'];
	if($timber!=0) $str .= "timber=".$timber." and ";
	$updatetime =$publishtime;
	//if(strlen($str)>0) //$str=substr($str,0,strlen($str)-4);
	$query ="update t_product set salestatusid=4,completetime='".$updatetime."' where ".$str.' goodtype=1 and TIMESTAMPDIFF(day,traindate,now())>=3 and salestatusid<>4 and spotpositionid=3';
	//echo $query;
	$result =$conn->query($query);
	if($result)
	{
		echo "<script>alert('下架成功！');history.back();</script>";  //history.back();
	}else{
		echo "<script>alert('下架失败！');history.back();</script>";
	}
?>