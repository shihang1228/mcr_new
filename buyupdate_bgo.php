<?php
 session_start();		//启用session支持
 header("Content-Type: text/html; charset=utf-8");
 include_once('system/model/db_fns.php');		//包含系统功能文件
 
  $conn = db_connect();

  $publishtime=date("Y-m-d H:i:s");//发布时间
  $buyid = $_POST["buyid"];  //用户id
  $content =$_POST["content"];  //求购内容
  $updatetime =$publishtime;
  $kindid =$_POST["kindid"]; //货种
  $stuffid =$_POST["stuffid"];  //材种
  //价格
  $price =$_POST["price"];
  if($price==="") $price=0;
  $productlen =$_POST["productlen"];  //长度(m)
  //总货量
  $refcapacity =$_POST["refcapacity"];
  if($refcapacity==="") $refcapacity=0;
  
  if ($kindid ==1) {  //原木
	$timber =$_POST["timber"];  //材质
	if ($_POST["diameterlen"]!=="" ) {
		 $diameterlen =$_POST["diameterlen"];  //径级
	}else {
		$diameterlen =0;
	}   
	$wide =0;  //宽度
    $thinckness =0;  //厚度
  }else {  //非原木
	$timber =0;  //材质
    $diameterlen =0;   //径级
	
	if ($_POST["wide"]!=="" ) {  //宽度
		 $wide =$_POST["wide"];
	}else {
		$wide =0;
	}   
   
   if ($_POST["thinckness"]!=="" ) {  //厚度
		 $thinckness =$_POST["thinckness"];
	}else {
		$thinckness =0;
	}   
  }
  
	//$buystatus =1; //求购状态
    $query ="update t_buy set kindid=".$kindid.",stuffid=".$stuffid.",price=".$price.",productlen=".$productlen.",refcapacity=".$refcapacity.",timber='".$timber."',diameterlen=".$diameterlen.",wide=".$wide.",thinckness=".$thinckness.",content='".trim($content)."',updatetime='".$updatetime."' where buyid=".$buyid;
//  echo $query;
//  return;  
	$result =$conn->query($query);
   if($result)
   {
     echo "<script>alert('求购更新成功！');window.location.href='sh_fbMessage.php'</script>";
   }else{
      echo "<script>alert('更新失败！');history.back();</script>";
	  }
?>