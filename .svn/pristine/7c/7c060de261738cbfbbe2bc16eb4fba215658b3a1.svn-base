<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type"content="text/html; charset=utf-8">   
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<title>举报</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" type="text/css" href="statics/css/yumleeM.css" />
<link rel="stylesheet" type="text/css" href="statics/css/mcr.css" />
<link rel="stylesheet" type="text/css" href="com/icomoon/style.css" />
<link rel="stylesheet" type="text/css" href="css/reminder.css" />
<link rel="stylesheet" href="css/report.css" />
</head>
<body>

<header class="header">
	<div><a href="javascript:history.back();"><i class="icon-arrow-back"></i></a></div>
	<h1>举报</h1>
	<div><a href="index.php"><i class="icon-home"></i></a></div>
</header>
<?php
    session_start();
	$userid=$_GET['userid'];
	$cdkey = $_GET['cdkey'];
	if(isset($_SESSION['user']) ){	//用户或管理员登录后才可以发表信息	
	
?>
<form class="onoff labelPadding" id="submitform" method ="POST" action="report_bgo.php">
	<ul class="list">
		<li style="font-weight:bold;">举报内容</li>
		<li class="flex">
			<div class="op-2">
			    <input type="hidden" name="userid" value="<?php echo $userid;?>" />
				<input type="hidden" name="cdkey" value="<?php echo $cdkey;?>" />
				<input type="radio" name="report" value="车号有误" id="carnum"><label for="carnum">车号有误</label>
				<input type="radio" name="report" value="电话有误" id="standard"><label for="standard">电话有误</label>
				<input type="radio" name="report" value="其他有误" id="phone"><label for="phone">其他有误</label>
				<input type="radio" name="report" value="全部错误" id="all"><label for="all">全部错误</label>
				
			</div>
			<div class="op-2">
				<input type="radio" name="report" value="规格错误" id="others"><label for="others">规格错误</label>
				<input type="radio" name="report" value="位置不符" id="position"><label for="position">位置不符</label>
				<input type="radio" name="report" value="照片不符" id="picture"><label for="picture">照片不符</label>
			</div>
		</li>
	</ul>	
		
	<ul class="list">
		<li style="font-weight:bold;">具体描述</li>
		<li><textarea class="fullCol" rows="6" id="content" name="content"></textarea></li>
	</ul>
	<input class="btnFixed" type="submit" value="提交" id="sendmessage" />
</form>
<?php
}else{
  echo "<script>window.location.href='signIn.php?type=2';</script>";
  }
 ?>
</body>
<script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>

</html>