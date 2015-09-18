<?php
    include_once('system/model/db_fns.php');
	include_once('system/model/constant.php');
	header("Content-Type: text/html; charset=utf-8");
	$conn = db_connect();
	$filtervalue="";
    $noconnect ="<p>对不起，没有查找到您要查找的内容！</p>";

    $num=$_POST['num'];
	$search =$_POST['search'];
	
	//判断条件
	
	if($search !='0'){
		$filtervalue =$filtervalue ." and  (keyword like '%".$search."%' or c.content like '%".$search."%')";
    }
	
	
	 $query1 = "select keyword,c.cdkey as cdkey,right(rtrim(carnum),4) as carnum,(select stuffname from t_stuff where stuffid=p.stuffid) as stuffname,"
         ."case productlen when 0 then '' else concat(CONVERT(productlen,char(4)),'米') end as productlen,"
        ."(select kindname from t_kind where kindid=p.kindid) as kindname,c.updatetime " ;
		 
	  $query2= " from t_complain c,t_product p where c.cdkey=p.cdkey ";
	
	if (strlen(trim($filtervalue))>0){
		$query2 =$query2 . $filtervalue;
	}
	 $query =$query1.$query2;
    //查询页码
	 $pagecount=0;
	 
	  $querypagenum="select count(*) as c ".$query2;
	  //echo $querypagenum;
	 // return;
	  $result = @$conn->query($querypagenum);
	  $datanum =$result->fetch_row();
      $total=$datanum[0];
	  if($total % PAGESIZE ==0) { //获取总页数
			$pagecount = intval($total/PAGESIZE);
		} else {
          $pagecount=ceil($total / PAGESIZE);
		 
	  }
	//
	 $pageid =($num*PAGESIZE);
	 $query = $query ." order by c.updatetime desc limit "  .$pageid.",". PAGESIZE;

	$json_arr = array();
    $result = @$conn->query($query);
    if ((!$result) ||($result->num_rows ==0))
	{
	    echo json_encode( $json_arr );
		return;
    }
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