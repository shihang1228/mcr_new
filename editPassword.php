<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<title>修改密码</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" type="text/css" href="statics/css/yumleeM.css" />
<link rel="stylesheet" type="text/css" href="statics/css/mcr.css" />
<link rel="stylesheet" type="text/css" href="com/icomoon/style.css" />
<header class="header">
	<div><a href="javascript:history.back();"><i class="icon-arrow-back"></i></a></div>
	<h1>修改密码</h1>
	<div><a href="index.php"><i class="icon-home"></i></a></div>
</header>
<form action="user_editpassword.php" method="post" onsubmit="return check_info()" name="form_password">
	<ul class="list editPassword">
		<li class="flex col1-3"><div>原密码</div><div><input type="password" id="pwd" name ="oldpassword"/></div></li>
		<li class="flex col1-3"><div>新密码</div><div><input type="password" id="pwd1" name="newpassword"/></div></li>
		<li class="flex col1-3"><div>确认新密码</div><div><input type="password" id="pwd2" name="newspassword" /></div></li>
	</ul>
	<input class="btnFixed" type="submit" value="确认修改" id="confirmEdit" />
</form>
</body>
<script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
<script src="statics/js/config.js"></script>
<script>
$(function(){
	checkPwd();
})

</script>
</html>