<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>求购发布</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" type="text/css" href="/statics/css/yumReset.css" />
<link rel="stylesheet" type="text/css" href="/statics/css/yumPage.css" />
<link rel="stylesheet" type="text/css" href="/com/icomoon/style.css" />
</head>
<?php
    session_start();
    include_once('mcr_sc_fns.php');
	$buyid=$_GET['buyid'];
	$buy_array = get_buydetail($buyid);
?>
<body>
<header class="header">
	<a href="javascript:history.back();"><i class="icon-arrow-back"></i></a>
	<h2>详细信息</h2>
	<a href="index.php"><i class="icon-home"></i></a>
</header>
<?php
   if (!is_array($buy_array)) {
      $noconnect ="<p>对不起，没有查找到您要查找的内容！</p>";
      echo  $noconnect;
                           
    }
	else {
	$row =$buy_array[0];
  ?>
<dl class="panel-body">
	<dt><?php echo $row['title'];?></dt>
	<dd>
		<ul class="panel-col-2 clearfix">
			<li class="panel-row-1">标题:<?php echo $row['title'];?><button class="button button-success fr">分享到微信</button></li>
			<li>用户名:<?php echo $row['username'];?></li>
			<li>手机:<?php echo $row['phone'];?></li>
			<li>目标口岸:<?php echo $row['portname'];?></li>
			<li>货种:<?php echo $row['kindname'];?></li>
			<li>材种:<?php echo $row['stuffname'];?></li>
			<li>价格:<?php echo $row['price'];?></li>
			<li>更新时间:<?php echo $row['updatetime'];?></li>
			<li class="panel-row-1 detailInfo">详细信息:<p><?php echo $row['content'];?></p></li>
		</ul>
	</dd>
</dl>
<div class="fixed">
	<ul>
		<li class="borker">
			<span class="borkerName"><?php echo $row['username'];?></span>
			<p><?php echo $row['phone'];?></p>
		</li>
		<li><a href="tel:<?php echo $row['phone'];?>">
			<span class="icon-phone borkerTel"></span>
		</a></li>
		<li><a href="sms:<?php echo $row['phone'];?>">
			<span class="icon-comments borkerSms"></span>
		</a></li>
	</ul>
</div>
<?php
	}
?>
</body>
</html>