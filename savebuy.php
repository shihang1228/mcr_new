<?php
	 session_start();		//启用session支持
	 header("Content-Type: text/html; charset=utf-8");
	 include_once('db_fns.php');		//包含系统功能文件
	 
	 $conn = db_connect();
	 
	 $userid=$_SESSION['userid']; //用户ID
	 $title=$_POST["title"];			//调用注册时提交的用户名称
	 $price=$_POST["price"];
 
    $query ="insert into t_buy(userid,title,content,portid,kindid,stuffid,price,updatetime) values ("
        .$userid.",'".$title."','".$_POST['content']."',".$_POST["areaselect"].","
		.$_POST["kindselect"].",".$_POST['stuffselect'].",".$price.",'".date("Y-m-d H:i:s")."')";
	$result =$conn->query($query);
   if($result)
   {
     echo "<script>alert('信息发布成功！');window.location.href='announce.php'</script>";
   }else{
      echo "<script>alert('发布失败！');history.back();</script>";
	  }

?>