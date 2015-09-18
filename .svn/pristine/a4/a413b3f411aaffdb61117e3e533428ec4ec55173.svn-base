<?php
    include_once('db_fns.php');
	include_once('system/model/constant.php');
	header("Content-Type: text/html; charset=utf-8");
	$conn = db_connect();
	$filtervalue="";
    $noconnect ="<p>对不起，没有查找到您要查找的内容！</p>";

	//读取参数
    $num=$_POST['num'];
	$portid=$_POST['portid'];
	$kindid=$_POST['kindselect'];
	$stuffid=$_POST['stuffselect'];
	$productlen=$_POST['productlen'];
	$diameterlen=$_POST['diameterlen'];
	$timber=$_POST['timber'];
	$wide=$_POST['wide'];
	$thinckness=$_POST['thinckness'];
	$publishtime=$_POST['publishtime'];
	$spotpositionid=$_POST['spotpositionid'];
	
	$filtervalue="";
	$query="";
    //判断条件	
    if($portid != 0){
		$filtervalue =$filtervalue . " and p.portid =".$portid;
	}
	if(($kindid ==1) || (($kindid >1) &&(($wide ==0) ||($thinckness ==0))))
	{//板材时当有宽和厚时忽略货种
	    
		  $filtervalue =$filtervalue ." and p.kindid =".$kindid;
	}
	if($stuffid !=0){
	   $filtervalue =$filtervalue ." and p.stuffid =".$stuffid;
	  
	}
	if($productlen !=0){
	    $filtervalue =$filtervalue ." and p.productlen =".$productlen;
	}
	//依据是否是原木来增加条件
	if($kindid ==1){//原木
		if($diameterlen !=0) {
		    $filtervalue =$filtervalue ." and p.diameterlen =".$diameterlen;
		}
		if($timber !=="0") {
		    $filtervalue =$filtervalue ." and p.timber ='".$timber."'";
		}
	} else if( $kindid >1) {//其他类
		if (($wide !=0)) {
		    $filtervalue =$filtervalue ." and (( p.wide =".$wide." ) or ( p.thinckness = " .$wide. "))";
		}
		if(($thinckness !=0)){
			 $filtervalue =$filtervalue ." and (( p.wide =".$thinckness.") or ( p.thinckness =" .$thinckness."))";
		}
	}	
	if($publishtime !=0) {//更新时间
		$filtervalue =$filtervalue ." and updatetime >= date_sub(now(), interval '".$publishtime."' day)";
	}
	if($spotpositionid != 0){
		$filtervalue =$filtervalue ." and spotpositionid=".$spotpositionid;
	}
	$conn =db_connect();

	$query1="select cdkey,right(rtrim(carnum),4) as carnum, "
     ." ifnull((select timbername from t_timber where timberid =timber),'') as timber,wide,thinckness,diameterlen,goodtype,"
	 ."ifnull(l.lenname,'') as productlen,"
     ." substr(trim(dumpposition),1,7) as dumpposition,widerange,thincknessrange,"
    ."ifnull((select kindname from t_kind where kindid = p.kindid),'') as kindname, "
    ."ifnull((select kind_bj from t_kind where kindid = p.kindid),'') as kind_bj, "
    ."ifnull((select stuffname from t_stuff where stuffid = p.stuffid),'') as stuffname, "
	."(select position from v_statuspos where positionid=p.spotpositionid) as spotposition,"
	."case refcapacity when '0' then '' else concat(refcapacity,'m³') end as refcapacity ";
	
     $query2=" from t_product p left outer join t_user u on p.userid=u.userid left outer join t_length l on p.productlen=l.lenid where  ((p.display=1 and p.salestatusid<>4) or p.salestatusid in(2,3))";
	if (strlen(trim($filtervalue))>0){
		$query2 =$query2. $filtervalue;
	}	
	 $query =$query1.$query2;
	
	 //查询页码
	 $pagecount=0;
	// if ($num ==0) {
	  $querypagenum="select count(*) as c ".$query2;
	  $result = @$conn->query($querypagenum);
	  $datanum =$result->fetch_row();
      $total=$datanum[0];
	  if($total % PAGESIZE ==0) { //获取总页数
			$pagecount = intval($total/PAGESIZE);
		} else {
          $pagecount=ceil($total / PAGESIZE);
		 
	  } 
	 //}
	 //
	  $pageid =($num*PAGESIZE);
	 $query = $query ." order by perfect desc,updatetime desc limit "  .$pageid.",". PAGESIZE;
	 //
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
	 
	//

?>