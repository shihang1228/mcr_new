<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<title>用户</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link href="" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/statics/css/yumReset.css" />
<link rel="stylesheet" type="text/css" href="/statics/css/yumPage.css" />
<link rel="stylesheet" type="text/css" href="/com/icomoon/style.css" />
<body>
<?php
session_start();
	if(isset($_SESSION['user']) ){			//用户或管理员登录后才可以发表留言
?>
<header class="header">
	<a href="javascript:history.back();"><i class="icon-arrow-back"></i></a>
	<h2>求购</h2>
	<a href="index.php"><i class="icon-home"></i></a>
</header>
<ul class="list">
	<li class="list-item user-head clearfix">
		<span class="user-head-tit">头像</span>
		<i>
			<span class="user-item-info"><img src="/statics/images/swiper2.jpg" /></span>
			<b class="icon-chevron-right"></b>
		</i>
	</li>
	<li class="list-item">用户名<i><span class="user-item-info">木材人</span><b class="icon-chevron-right"></b></i></li>
	<li class="list-item">手机号<i><span class="user-item-info">13584265845</span><b class="icon-chevron-right"></b></i></li>
	<li class="list-item">积分<i><span class="user-item-info">3000</span><b class="icon-chevron-right"></b></i></li>
	<li class="list-item">级别<i><span class="user-item-info"></span><b class="icon-heart level-star">&#xf004;</b></i></li>
</ul>
<ul class="list">
	<li class="list-item"><a href="myGood.html">我的现货<i><span></span><b class="icon-chevron-right"></b></i></a></li>
	<li class="list-item"><a href="mySale.html">我的销售<i><span></span><b class="icon-chevron-right"></b></i></a></li>
	<li class="list-item"><a href="myBuy.html">我的求购<i><span></span><b class="icon-chevron-right"></b></i></a></li></li>
	<li class="list-item"><a href="mySale.html">我的收藏<i><span></span><b class="icon-chevron-right"></b></i></a></li>
	<li class="list-item"><a href="mySale.html">我的仓库<i><span></span><b class="icon-chevron-right"></b></i></a></li>
</ul>
<ul class="list">
	<li class="list-item text-center">修改密码</li>
	<li class="list-item text-center" onclick="javascript:document.getElementById('loginout').click();"><a id="loginout" href="loginout.php">退出账号</li>
</ul>
<?php
}else{
 // echo "<script>alert('登录后发表留言！');history.back();</script>";
  echo "<script>window.location.href='signIn.php?type=1';</script>";
  }
 ?>
</body>
</html>