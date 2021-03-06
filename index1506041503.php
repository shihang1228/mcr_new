﻿<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<title>木材人</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" type="text/css" href="/statics/css/yumleeM.css" />
<link rel="stylesheet" type="text/css" href="/statics/css/mcr.css" />
<link rel="stylesheet" type="text/css" href="/com/icomoon/style.css" />
<link rel="stylesheet" type="text/css" href="/com/swiper/swiper.min.css" />
</head>
<body class="home">
<nav class="navFixed flex">
	<a href="index.php"><i class="icon-home"></i><div>首页</div></a>
	<a href="goodlist.php"><i class="icon-now-widgets"></i><div>现货</div></a>
	<a href="release.php"><i class="icon-bullhorn"></i><div>发布</div></a>
	<a href="user.php"><i class="icon-head"></i><div>我</div></a>
</nav>
<header class="header">
	<h1><a href="index.php">木材人</a></h1>
</header>
<?php
   include_once('mcr_sc_fns.php');
   $new_array = get_newarray();
?>
<div class="swiper-holder">
	<img src="/statics/images/swiper0.jpg" />
</div>
<div class="flex subfield golder">
	<div>现货信息</div>
	<div class="swiper-container">
		<ul class="swiper-wrapper">
		  <?php
			    if (!is_array($new_array)) {
					echo "<p>No categories currently available</p>";
				   return;
				}

				foreach ($new_array as $row)
				{
				  echo "<li class='swiper-slide'><p>现货：".$row['carnum']." ".$row['kindname']." ".$row['updatetime'] . " </p></li>";
				}
				?>
		</ul>
	</div>
</div>
<ul class="flex menuIcon">
	<li><a class="home1" href="goodlist.php"></a></li>
	<li><a class="home2" href="search2.php"></a></li>
	<li><a class="home3" href="search.php"></a></li>
</ul>
<ul class="flex menuIcon">
	<li><a class="home4" href="logsell.php"></a></div></li>
	<li><a class="home5" href="boardsell.php"></a></li>
	<li><a class="home9" href="##"></a></li>
</ul>
<ul class="flex menuIcon">
	<li><a class="home6" href="dumplist.php"></a></li>
	<li><a class="home7" href="buylist.php"></a></li>
	<li><a class="home8" href="companylist.php"></a></li>
</ul>
</body>
<script src="/com/swiper/swiper.min.js"></script>
<script>
var mySwiper = new Swiper('.swiper-container',{
	autoplay : 2000,
	direction : 'vertical',
})
</script>
</html>