<?php
session_start();
include_once('db_fns.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<title>个人中心</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link href="" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/statics/css/yumReset.css" />
<link rel="stylesheet" type="text/css" href="/statics/css/yumPage.css" />
<link rel="stylesheet" type="text/css" href="/com/icomoon/style.css" />
<style type="text/css">
	.username{width:100%;height:40px;border:0;border-bottom:1px solid green;outline:none;font-size:15px;font-family:"微软雅黑";}
</style>
<body>
<?php
session_start();
	if(isset($_SESSION['user']) ){			//用户或管理员登录后才可以发表留言
?>
<header class="header">
	<form method="post" action="xgxx.php" name="myform" onsubmit="return check_info()" enctype="multipart/form-data"> 

	<a href="javascript:history.back();"><i class="icon-arrow-back"></i></a>
	<h2>个人中心</h2>
	<a href="index.php"><a href="#" class="save">保存</a></span></a>
</header>
<ul class="list">
	<li class="list-item"><input type="text" name="username" value="木材人" class="username"/></li>
	
</ul>
</form>
<?php
}else{
 // echo "<script>alert('登录后发表留言！');history.back();</script>";
  echo "<script>window.location.href='signIn.php?type=1';</script>";
  }
 ?>
<script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
	$(function(){
		$(".username").focus();
	});
</script>
</body>
</html>