<?php
session_start();
include_once('db_fns.php');

/* if($_GET['username']!=$_SESSION['userid']) 
{ echo "<script>alert('请您重新登陆！');location.href='signIn.php?type=1';</script>"; }
*/
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
		$con_mkn = db_connect();
		$sql_mkn="SELECT * FROM t_user where userid=".$_SESSION['userid'];
		$rs = mysqli_query($con_mkn,$sql_mkn);
		$rows=mysqli_fetch_assoc($rs);
		
?>

<form method="post" action="xgxx.php" name="myform" onsubmit="return check_info()" enctype="multipart/form-data"> 
<header class="header">
	<a href="javascript:history.back();"><i class="icon-arrow-back"></i></a>
	<h2>个人中心</h2>
	<a href="index.php"><input name="保存" type="submit" class="save" value="保存" style="background:none; border:none;color:#ffffff;"/></span></a>
</header>
<ul class="list">
	<?php 
		error_reporting(0);
	
			if($_GET['username']==$_SESSION['userid'])
			{
				echo "<li class=\"list-item\"><input type=\"text\" name=\"username\" value=\"".$rows['username']."\" /></li>";
			}
			if ($_GET['city']==$_SESSION['userid'])
			{
				echo "<li class=\"list-item\"><input type=\"text\" name=\"city\" value=\"".$rows['city']."\" /></li>";
				}
			if($_GET['phone']==$_SESSION['userid'])
			{
				echo "<li class=\"list-item\"><input type=\"text\" name=\"phone\" value=\"".$rows['phone']."\" /></li>";
				}
		
	?>
    
</ul>
</form>

</body>
</html>