<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<title>木材人</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" type="text/css" href="/statics/css/yumReset.css" />
<link rel="stylesheet" type="text/css" href="/statics/css/yumPage.css" />
<link rel="stylesheet" type="text/css" href="/com/icomoon/style.css" />
<link rel="stylesheet" type="text/css" href="/com/swiper/swiper.min.css" />
</head>
<body class="home">
<nav class="navFix">
	<ul>
		<li><a href="index.php"><i class="icon-home"></i>首页</a></li>
		<li><a href="goodlist.php"><i class="icon-now-widgets"></i>现货</a></li>
		<li><a href="release.php"><i class="icon-bullhorn"></i>发布</a></li>
		<li><a href="user.php"><i class="icon-head"></i>我</a></li>
	</ul>
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
<div class="scroll clearfix">
	<div class="scroll-tit">现货信息</div>
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
<ul class="home-div clearfix high">
	<li><a class="home1" href="goodlist.php"></a></li>
	<li><a class="home2" href="search2.php"></a></li>
	<li><a class="home3" href="search.php"></a></li>
</ul>
<ul class="home-div clearfix high">
	<li><a class="home4" href="logsell.php"></a></div></li>
	<li><a class="home5" href="boardsell.php"></a></li>
	<li><a class="home9" href="##"></a></li>
</ul>
<ul class="home-div clearfix high">
	<li><a class="home6" href="##"></a></li>
	<li><a class="home7" href="##"></a></li>
	<li><a class="home8" href="##"></a></li>
</ul>
</body>
<script type="text/javascript" src="/com/swiper/swiper.min.js"></script>
<script type="text/javascript">
var mySwiper = new Swiper ('.swiper-container', {
	direction: 'vertical',
	loop: true,
	autoplay: 2000,
	speed: 300
})
</script>
</html>