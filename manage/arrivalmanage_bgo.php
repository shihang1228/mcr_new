﻿<?php
    session_start();
    include_once('../system/model/db_fns.php');
	header("Content-Type: text/html; charset=utf-8");
	$conn = db_connect();
	$filtervalue="";
    $noconnect ="<p>对不起，没有查找到您要查找的内容！</p>";
	$pagesize=15;
	//读取参数
    $num=$_POST['num'];
	$areavalue =$_SESSION['portid'];
	//$areavalue =$_POST['areaselect'];
	$train =$_POST['train'];
	if(strlen($train)==0){
		echo '<script>alert("请选择列!");history.back();</script>';
		return;
	}
	$trainDate =$_POST['trainDate'];
	if($trainDate==0){
		echo '<script>alert("请选择日期!");history.back();</script>';
		return;
	}
	$status=$_POST['status'];
	if($status==0){
		echo '<script>alert("请选择状态!");history.back();</script>';
		return;
	}
	
	//判断条件	
	 if($train !=0){
		 $filtervalue =$filtervalue ." and p.train ='".$train."'";
	 }
	 
	 if($status !=0){
		switch($status){
			case 0:break;
			case 1:break;
			case 2:
					$filtervalue =$filtervalue ." and (kindid!=0 or stuffid!=0 or productlen!=0)";
					break;
			case 3:
					$filtervalue =$filtervalue ." and (kindid=0 and stuffid=0 and productlen=0)";
					break;
			default:break;
		}
		//$filtervalue =$filtervalue ." and p.status =".$status;
	 }
	 if(strlen($trainDate)!=0){
	     $filtervalue =$filtervalue ." and timestampdiff(day,p.traindate,'".$trainDate."')=0";
	 }
	//error_log(date('Y-m-d H:i:s').$filtervalue."\n",3,$_SERVER['DOCUMENT_ROOT']."/log/run.log");
	 $query1 = "select cdkey,right(rtrim(carnum),4) as carnum, "
     ."  (ifnull((select lenname from t_length where lenid=p.productlen),'')) as productlen,"
	 ."wide,thinckness,diameterlen,u.username,viewnum,"
	 ." s.salestatusname as completestatus, "
     ."v.position as dumpposition,widerange,thincknessrange,"
     ."ifnull((select kindname from t_kind where kindid = p.kindid),'') as kindname, "
     ."ifnull((select kind_bj from t_kind where kindid = p.kindid),'') as kind_bj, "
	  ."ifnull((select timbername from t_timber where timberid = p.timber),'') as timber, "
     ." ifnull( (select stuffname from t_stuff where stuffid = p.stuffid),'') as stuffname ";
		 
	 $query2= " from t_product p,t_port r,t_user u,v_statuspos v ,t_salestatus s"
		." where p.userid = u.userid and p.portid =r.portid  and goodtype=1"
		." and p.spotpositionid = v.positionid and p.salestatusid=s.salestatusid  and p.salestatusid!=4 ";
   //error_log(date('Y-m-d H:i:s').$query1.$query2."\n",3,$_SERVER['DOCUMENT_ROOT']."/log/run.log");
	if (strlen(trim($filtervalue))>0){
		$query2 =$query2 . $filtervalue;
	}
	 $query =$query1.$query2;
	//error_log(date('Y-m-d H:i:s').$query."\n",3,$_SERVER['DOCUMENT_ROOT']."/log/run.log");
    //查询页码
	 $pagecount=0;
	// if ($num ==0) {
	  $querypagenum="select count(*) as c ".$query2;
	 // echo $querypagenum;
	// return;
	  $result = @$conn->query($querypagenum);
	  $datanum =$result->fetch_row();
      $total=$datanum[0];
	  if($total % $pagesize ==0) { //获取总页数
			$pagecount = intval($total/$pagesize);
		} else {
          $pagecount=ceil($total / $pagesize);
		 
	  } 
	// }
	 
	//
	
	 $pageid =($num*$pagesize);
	 $query = $query ." order by updatetime desc limit "  .$pageid.",". $pagesize;;
	
	//echo $query;
	//return;
	$json_arr = array();
    $result = @$conn->query($query);
	
    if ((!$result) ||($result->num_rows ==0))
	{
		//echo "<meta http-equiv='Content-Type'' content='text/html; charset=utf-8'>";
      //  echo  $noconnect;
	    echo json_encode( $json_arr );
		return;
    }
    //$result = db_result_to_array($result);
	//echo json_encode($result);
	  $temp_arr = array();
	 while($row = $result->fetch_assoc()){
		 $temp_arr[] = $row;
	 }
     $page_arr =array(array('pagecount'=>$pagecount,'pagenum'=>$num));
	 
	  foreach($page_arr as $k=>$v){
		 $json_arr[]  = $v;

	 }
	 foreach($temp_arr as $k=>$v){
		 $json_arr[]  = $v;

	 }
	
	 echo json_encode( $json_arr );


?>