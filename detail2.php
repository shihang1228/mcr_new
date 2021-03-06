<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<title>详细信息</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" type="text/css" href="/statics/css/yumleeM.css" />
<link rel="stylesheet" type="text/css" href="/statics/css/mcr.css" />
<link rel="stylesheet" type="text/css" href="/statics/css/photoswipe.css" />
<link rel="stylesheet" type="text/css" href="/com/icomoon/style.css" />
<link rel="stylesheet" type="text/css" href="/com/swiper/swiper.min.css" />
<link rel="stylesheet" type="text/css" href="/com/lightGallery/lightGallery.css" />
</head>
<?php
    session_start();
    include_once('mcr_sc_fns.php');
	$productid=$_GET['productid'];
	$product_array = get_detail($productid);
	$productpic_array =get_productpic($productid);
?>
<body>

<header class="header">
	<div><a href="javascript:history.back();"><i class="icon-angle-left"></i></a></div>
	<h1>详细信息</h1>
	<div><a href="index.php"><i class="icon-home"></i></a></div>
</header>
<?php
   if (!is_array($product_array)) {
      $noconnect ="<p>对不起，没有查找到您要查找的内容！</p>";
      echo  $noconnect;
                           
    }
	else {
	$row =$product_array[0];
  ?>
  <?php
     if (is_array($productpic_array)) {
  ?>
<div class="swiper-container">
  <ul class="swiper-wrapper" id="auto-loop">
   <?php
        foreach ($productpic_array as $rowpic)
		{
		  echo "<li data-src='".$rowpic['productpic']."' class='swiper-slide'><a href='".$rowpic['productpic']."'><img src='".$rowpic['productpic']."'/></a></li>";
		}
   ?>
   <!-- <li data-src="/statics/images/swiper0.jpg" class="swiper-slide"><img src="/statics/images/swiper0.jpg" /></li> -->
  </ul>
  <div class="swiper-pagination"></div>
</div>
<?php
  }
?>
<dl class="panel title">
	<dt>
		<h2><?php echo $row['carnum']." &nbsp&nbsp&nbsp&nbsp".$row['portname']."&nbsp&nbsp&nbsp&nbsp".$row['kindname']."&nbsp&nbsp&nbsp&nbsp".$row['stuffname'];?></h2>
	</dt>
	<dd class="clearfix shareWechat">
		<div><span>发布时间:2015-5-28 18:24</span> <span class="fr">浏览次数:55</span></div>
		<button>分享到微信</button>
	</dd>
</dl>
<ul class="list">
	<li class="flex">
		<div>车皮号：  <?php echo $row['carnum'];?></div>
		<div>目标口岸：<?php echo $row['portname'];?></div>
	</li>
	<li class="flex">
		<div>材种：<?php echo $row['stuffname']; ?></div>
		<div>货种：<?php echo $row['kindname']; ?></div>
	</li>
	<li class="flex">
		<div>长度(m)：<?php echo $row['productlen']; ?></div>
		<div>宽度(m):<?php echo $row['wide']; ?></div>
	</li>
	<li class="flex">
		<div>厚度(mm):<?php echo $row['thinckness']; ?></div>
		<div>公差(mm):<?php echo $row['tolerance']; ?></div>
	</li>
	<li class="flex">
		<div>参考根数(根):<?php echo $row['refnum']; ?></div>
		<div>参考重量(kg):<?php echo $row['refwight']; ?></div>
	</li>
	<li class="flex">
		<div>销售状态:待售</div>
		<div>当前位置:</div>
	</li>
</ul>
<dl class="panel collapse">
	<dt>详细信息<i class="icon-caret-down"></i></dt>
	<dd>
		<ul class="list">
			<li class="flex">
				<div>烘干:<?php echo $row['dry']; ?></div>
				<div>新旧:<?php echo $row['newold']; ?></div>
				<div>节巴:<?php echo $row['knob']; ?></div>
			<li class="flex">
				<div>蓝变:<?php echo $row['blue']; ?></div>
				<div>虫眼:<?php echo $row['worm']; ?></div>
				<div>腐朽:<?php echo $row['decay']; ?></div>
			</li>
			<li class="flex">
				<div>爬皮:<?php echo $row['climb']; ?></div>
				<div>环裂:<?php echo $row['ring']; ?></div>
				<div>斜裂:<?php echo $row['slash']; ?></div>
			</li>
			<li class="flex">
				<div>柚油:<?php echo $row['oil']; ?></div>
				<div>黑心:<?php echo $row['black']; ?></div>
				<div></div>
			</li>
			<li class="panel-row-2">取材位置:<?php echo $row['position']; ?></li>
			<li class="panel-row-2">加工设备:<?php echo $row['device']; ?></li>
			<li class="panel-row-1">产地:<?php echo $row['fromname']; ?></li>
			<!-- <li class="panel-row-1">到达暂停线时间:</li>
			<li class="panel-row-2">暂停线车道:</li>
			<li class="panel-row-1">到达货场时间:</li>
			<li class="panel-row-2">到达货场:</li>
			<li class="panel-row-2">所在装卸线:</li>
			<li class="panel-row-2">货位编号:</li> -->
		</ul>
	</dd>
</dl>
<ul class="flex contact">
	<li>
		<div><?php  echo $row['username'];?></div>
		<div><?php  echo $row['phone'];?></div>
	</li>
	<li>
		<a href="tel:<?php  echo $row['phone'];?>"><i class="icon-phone borkerTel"></i></a>
	</li>
</ul>
<?php
   }
  ?>
</body>
<script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
<script src="/statics/js/config.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/Swiper/3.0.7/js/swiper.min.js"></script>
<script type="text/javascript" src="/com/lightGallery/lightGallery.min.js"></script>

<script type="text/javascript" src="klass.min.js"></script>
<script type="text/javascript" charset="utf-8" src="code.photoswipe-3.0.5.js"></script>
<script type="text/javascript" charset="utf-8" src="jquery.transit.js"></script>
<script type="text/javascript" charset="utf-8" src="hammer.js"></script>
<script type="text/javascript" charset="utf-8" src="jquery.hammer.js"></script>

<script type="text/javascript">

		(function(window, PhotoSwipe){
		
			document.addEventListener('DOMContentLoaded', function(){
			
				var
					options = {},
					instance = PhotoSwipe.attach( window.document.querySelectorAll('#auto-loop a'), options );
			
			}, false);
			
			
		}(window, window.Code.PhotoSwipe));
		
	</script>

<script> 
var mySwiper = new Swiper('.swiper-container',{
	autoplay : 3000,//可选选项，自动滑动
	pagination : '.swiper-pagination',//分页
})
collapse();
</script>
</html>