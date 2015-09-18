<?php
    include_once('db_fns.php');
	header("Content-Type: text/html; charset=utf-8");
	$conn = db_connect();
	$filtervalue="";
    $noconnect ="<p>对不起，没有查找到您要查找的内容！</p>";
	$pagesize=15;
	//读取参数
    $num=$_POST['num'];
	$keyword =$_POST['companyword'];

  //  echo $keyword;
	//判断条件
	if(($keyword !== 0)&&(trim($keyword)!=='0')){
		$filtervalue =$filtervalue . " and ((b.companyname like  '%".$keyword
		 ."%') or (b.product like '%".$keyword."%') or (b.keyword like '%".$keyword."%'))";
	}
	
	 $query1 = "select  companyid,companyname,product,keyword,"
	  ."IFNUll((select companypic from t_companypic  where companyid = b.companyid order by picid asc  limit 1 ),0) as pic  ";
	 $query2= " from t_company b,t_user u where  u.userid = b.userid ";
    if (strlen(trim($filtervalue))>0){
		$query2 =$query2 . $filtervalue;
	}
	 $query =$query1.$query2;
	// echo $query;
	// return;
    //查询页码
	 $pagecount=0;
	 $querypagenum="select count(*) as c ".$query2;
	  
	  $result = @$conn->query($querypagenum);
	  $datanum =$result->fetch_row();
      $total=$datanum[0];
	  if($total % $pagesize ==0) { //获取总页数
			$pagecount = intval($total/$pagesize);
		} else {
          $pagecount=ceil($total / $pagesize);
		 
	  }
	//
	 $pageid =($num*$pagesize);
	 $query = $query ." order by ordervalue  limit "  .$pageid.",". $pagesize;;
	
	//echo $query;
	//return;
	$json_arr = array();
    $result = @$conn->query($query);
    if ((!$result) ||($result->num_rows ==0))
	{
	    echo json_encode( $json_arr );
		return;
    }
    //$result = db_result_to_array($result);
	//echo json_encode($result);
	//追加页码数据到返回值
	 $page_arr =array(array('pagecount'=>$pagecount,'pagenum'=>$num));
	 foreach($page_arr as $k=>$v){
		 $json_arr[]  = $v;
		 }
	//
	 $temp_arr = array();
	 while($row = $result->fetch_assoc()){
		 $temp_arr[] = $row;
	 }
     foreach($temp_arr as $k=>$v){
		 $json_arr[]  = $v;
     }
	
	 echo json_encode( $json_arr );
?>