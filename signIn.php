<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<title>登录</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link href="" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/statics/css/yumReset.css" />
<link rel="stylesheet" type="text/css" href="/statics/css/yumPage.css" />
<link rel="stylesheet" type="text/css" href="/com/icomoon/style.css" />
<body>
<header class="header">
	<a href="javascript:history.back();"><i class="icon-arrow-back"></i></a>
	<h2><a href="index.php">登录</a></h2>
</header>
<?php
 if ($_GET['type']==1){
 ?>
<div id="showmessage">
  <h3 align ='center'>您尚未登录，马上登录轻松管理信息</h3>
  <br>
</div>
<?php
  }
  ?>
<div class="text-center">
	<form class="sign"  name="form_login" method="post" action="chkuserlogin.php" onsubmit="return chkinputlogin(this)">
		<div class="item"><label class="icon-head"></label><input type="tel" placeholder="请输入手机号码" name="phoneNumber" id="phoneNum" /><i class="icon-checkbox-checked" id="phoneNum_icon"></i>
		</div>
		<div class="item"><label class="icon-lock"></label><input type="password" placeholder="请输入密码" name="userpwd" /><i class="icon-checkbox-checked" id="pwd_icon"></i>
		</div>
		<input type="hidden" name="type" value=<?php echo $_GET['type'];?> > 
		<div class="item"><input type="submit" value="登录" /></div>
	</form>
	<div id="item"><a href="signUp.php"><input type="button" value="还没木材人账号？免费注册>" class="toSignUp"></a></div>
</div>
</body>
<script language="javascript">
			   function chkinputlogin(form){
			     if(form.phoneNumber.value==""){
				   alert("请输入手机号");
				   form.phoneNumber.focus();
				   return(false);
				 }
				 
				  if(form.userpwd.value==""){
				   alert("请输入登录密码！");
				   form.userpwd.focus();
				   return(false);
				 }
				 return(true);
			    
			   }
			 </script>
<script type="text/javascript" src="/statics/js/rightForm.js"></script>
</html>