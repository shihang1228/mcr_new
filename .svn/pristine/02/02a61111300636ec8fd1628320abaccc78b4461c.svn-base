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
	.list-item{height:51px;line-height:40px;}
	.user-head{height:105px;}
	.dj{line-height:3;}
	.img{position:relative;}
	.black_overlay{display:none;position:absolute;top:0%;left:0%;width:100%;height:100%;background-color:black;z-index:1001;-moz-opacity:0.8;opacity:.80;filter:alpha(opacity=80);}
	.white_content{display:none;position:absolute;top:25%;left:10%;width:80%;height:40%;border:1px solid lightblue;background-color:white;z-index:1002;overflow:auto;}
	.white_content_small{display:none;position:absolute;top:20%;left:30%;width:40%;height:50%;border:16px solid lightblue;background-color:white;z-index:1002;overflow:auto;}
	#port{width:100%;height:40px;background:#fff;text-align:center;border:1px solid #009933;border-radius:6px;}
	#port option{height:40px;line-height:40px;}
	.uploadfile{position:absolute;top:0px;left:20px;width:80px;height:80px;opacity:0;filter:alpha(opacity=0);}
	
</style>
<body>
<form method="post" action="xgxx.php" name="myform" onsubmit="return check_info()" enctype="multipart/form-data"> 

<header class="header">
	<a href="javascript:history.back();"><i class="icon-arrow-back"></i></a>
	<h2>个人中心</h2>
	<a href=""><input name="保存" type="submit"  value="保存" style="background:none; border:none;color:#ffffff;"/></span></a>
</header>

<?php
	$con_mkn = db_connect();
	$sql_mkn="SELECT * FROM t_user where userid=".$_SESSION['userid'];
	$rs = mysqli_query($con_mkn,$sql_mkn);
	$rows=mysqli_fetch_assoc($rs);
?>

<ul class="list">
	<li class="list-item user-head clearfix">
		<span class="user-head-tit">头像</span>
		<i class="img">
			<span class="user-item-info"><img src="<?php echo str_replace("../","",$rows['userpic'])?>" /></span>
			<input type="file" name="lc_pic" class="uploadfile" />
		</i>
	</li>
</ul>
</form>	
</body>
</html>