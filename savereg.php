<?php
 session_start();		//启用session支持
 header("Content-Type: text/html; charset=utf-8");
 include_once('db_fns.php');		//包含系统功能文件
 
 $conn = db_connect();
 
 $user=$_POST["userName"];			//调用注册时提交的用户名称
 $phone=$_POST["phoneNumber"];
 $query="select phone from t_user where phone='".$phone."'";
 $result = @$conn->query($query);
 $num =$result->fetch_row();
 //$sql=mysqli_query($conn,"select usernc from tb_user where usernc='".$usernc."'");		//查询用户表中已注册用户的名称是否与当前提交的用户名相同
 //$info=mysqli_fetch_array($sql);		//输出查询的数据
 		if($num){
   echo "<script>alert('对不起，您的手机号已经被占用！');history.back();</script>";		//相同的给出提示
   exit;
 				 }
 //$ip=$_SERVER["REMOTE_ADDR"];
    $query ="insert into t_user(phone,username,portid,city,password,loginnum,regtime,logintime) values ('"
        .$phone."','".$user."','".$_POST['portselect']."','".trim($_POST["city"])."','"
		.md5(trim($_POST["userpwd"]))."','"."1','".date("Y-m-d H:i:s")."','".date("Y-m-d H:i:s")."')";
	$result =$conn->query($query);
	
	$query ="select userid from t_user where phone='".$phone."'";
	$result =$conn->query($query);
	$num=$result->fetch_row();
   if($num)
   {
     $_SESSION["user"]=$phone;
     $_SESSION["userid"]=$num[0];
     echo "<script>alert('注册成功！');window.location.href='user.html'</script>";
   }else{
      echo "<script>alert('注册失败！');history.back();</script>";
	  }

?>