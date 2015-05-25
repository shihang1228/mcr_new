<?php
    include_once('db_fns.php');
	header("Content-Type: text/html; charset=utf-8");
	$conn = db_connect();
	$filtervalue="";
    $noconnect ="<p>对不起，没有查找到您要查找的内容！</p>";
	$pagesize=30;
	//读取参数
    $num=$_POST['num'];
	$areavalue =$_POST['areaselect'];
	$kindvalue =$_POST['kindselect'];
	$stuffvalue =$_POST['stuffselect'];
	$productlen=$_POST['productlen'];
	
	$productwide=$_POST['productwide'];
	$thinckness=$_POST['thinckness'];
	
	$diameterlen=$_POST['diameterlen'];
	$timber=$_POST['timber'];
	//判断条件
	if($areavalue != 0){
		$filtervalue =$filtervalue . " and p.portid =".$areavalue;
	}
	if($kindvalue !=0){
		$filtervalue =$filtervalue ." and p.kindid =".$kindvalue;
	}
	if($stuffvalue !=0){
	    $filtervalue =$filtervalue ." and p.stuffid =".$stuffvalue;
	}
	if($productlen !=0){
	    $filtervalue =$filtervalue ." and p.productlen =".$productlen;
	}
	//依据是否是原木来增加条件
	if($kindvalue ==1){//原木
		if($diameterlen !=0) {
		    $filtervalue =$filtervalue ." and p.diameterlen =".$diameterlen;
		}
		if($timber !=0) {
		    $filtervalue =$filtervalue ." and p.timber =".$timber;
		}
	} else if( $kindvalue >1) {//其他类
		if (($productwide !=0) &&($thinckness !=0)) {
		    $filtervalue =$filtervalue ." and p.productwide =".$productwide  
			." and p.thinckness = " .$thinckness ;
		}
	}
	
	
	
	 $query = "select productid,carnum,kindname,stuffname,phone,portname,updatetime,productlen,diameterlen,wide,thinckness   "
           ." from t_product p,t_kind k,t_stuff s,t_port r,t_user u "
          ." where p.userid = u.userid and p.kindid = k.kindid and "
		  ." p.stuffid = s.stuffid and p.portid =r.portid ";	  
		
	if (strlen(trim($filtervalue))>0){
		$query =$query . $filtervalue;
	}
   
	$query =$query ." order by updatetime desc limit ".($num)*$pagesize.",$pagesize";
	
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

	
	 foreach($temp_arr as $k=>$v){
		 $json_arr[]  = $v;

	 }
	 echo json_encode( $json_arr );


?>