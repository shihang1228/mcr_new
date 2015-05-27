<?php
 session_start();		//启用session支持
 header("Content-Type: text/html; charset=utf-8");
 include_once('db_fns.php');		//包含系统功能文件
 
  $conn = db_connect();
 
  $publishtime=date("Y-m-d H:i:s");//发布时间
  $userid=$_SESSION['userid'];			//调用注册时提交的用户名称
  //$phone=$_POST["phoneNumber"];
  $portid=$_POST["portid"];
 // $title =$_POST["title"];
  $content =$_POST["content"];
  $updatetime =$publishtime;
  $kindid =$_POST["kindid"];
  $stuffid =$_POST["stuffid"];
  $price =$_POST["price"];
  $productlen =$_POST["productlen"];
  if ($kindid ==1) {
	
	$timber =$_POST["timber"];
	if ($_POST["diameterlen"]!=="" ) {
		 $diameterlen =$_POST["diameterlen"];
	}else {
		$diameterlen =0;
	}   
	$wide =0;
    $thinckness =0;
  }else {
	$timber =0;
    $diameterlen =0; 
	
	if ($_POST["wide"]!=="" ) {
		 $wide =$_POST["wide"];
	}else {
		$wide =0;
	}   
   
   if ($_POST["thinckness"]!=="" ) {
		 $thinckness =$_POST["thinckness"];
	}else {
		$thinckness =0;
	}   
  }
  
 
 
  
  $refnum =$_POST["refnum"];
  $refwight =$_POST["refwight"];
  $refcapacity =$_POST["refcapacity"];
  $buystatus =1; //求购状态
  
   $query ="insert into t_buy (userid,portid,content,updatetime,kindid,stuffid,price,"
	     ."wide,thinckness,refnum,refwight,refcapacity,publishtime,productlen,diameterlen,timber,buystatus) values ("
         .$userid.",".$portid.",'".trim($content)."','".$updatetime."',".$kindid.",".$stuffid.",".$price.","
		 .$wide.",".$thinckness.",".$refnum.",".$refwight.",".$refcapacity.",'".$publishtime."',".$productlen.",".$diameterlen.",'"
         .$timber."',".$buystatus.")";
  //echo $query;
 // return;  
	$result =$conn->query($query);
   if($result)
   {
     echo "<script>alert('求购发布成功！');window.location.href='buyList.php'</script>";
   }else{
      echo "<script>alert('发布失败！');history.back();</script>";
	  }

?>