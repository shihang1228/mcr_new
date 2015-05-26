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
<link href="photoswipe.css" type="text/css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="/statics/css/yumReset.css" />
<link rel="stylesheet" type="text/css" href="/statics/css/yumPage.css" />
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
	<a href="javascript:history.back();"><i class="icon-arrow-back"></i></a>
	<h2>详细信息</a></h2>
	<!-- <ul class="nav">
		<li><a href="">现货</a></li>
		<li><a href="">2</a></li>
		<li><a href="logisticsInfo.html">3</a></li>
	</ul> -->
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
		  echo " <li data-src='".$rowpic['productpic']."' class='swiper-slide'><a href='".$rowpic['productpic']."'><img src='".$rowpic['productpic']."'/></a></li>";
		}
   ?>
   <!-- <li data-src="/statics/images/swiper0.jpg" class="swiper-slide"><img src="/statics/images/swiper0.jpg" /></li> -->
  </ul>
  <div class="swiper-pagination"></div>
</div>
<?php
  }
?>
<div class="panel">
	<div class="panel-header"><h2 class="panel-header-title"><?php echo $row['carnum']." &nbsp&nbsp&nbsp&nbsp".$row['portname']."&nbsp&nbsp&nbsp&nbsp".$row['kindname']."&nbsp&nbsp&nbsp&nbsp".$row['stuffname'];?> </h2></div>
	<div class="detail-tool">
		<div>发布时间:2015-5-14 14:37:18</div>
		<div>浏览次数:</div>
		<button><i class="icon-heart"></i> 收藏</button>
		<button class="shareWechat"><i class="icon-share-alt-square"></i> 分享到微信</button>
	</div>
	<dl class="panel-body">
		<dd class="panel-col-2">
			<ul class="clearfix">
				<li>车皮号：  <?php echo $row['carnum'];?> </li>
				<li>目标口岸：<?php echo $row['portname'];?></li>
				<li>材种：<?php echo $row['stuffname']; ?></li>
				<li>货种：<?php echo $row['kindname']; ?></li>
				<li>长度(m)：<?php echo $row['productlen']; ?></li>
				<li>宽度(m):<?php echo $row['wide']; ?></li>
				<li>厚度(mm):<?php echo $row['thinckness']; ?></li>
				<li>公差(mm):<?php echo $row['tolerance']; ?></li>
				<li>参考根数(根):<?php echo $row['refnum']; ?></li>
				<li>参考重量(kg):<?php echo $row['refwight']; ?></li>
				<li>销售状态:待售</li>
				<li>当前位置:</li>
			</ul>
		</dd>
		<!-- <dt></dt>
		<dd class="panel-col-2">
			<ul class="clearfix">
				<li>货主:</li>
				<li>手机号:</li>
				<li>级别:<span class="icon-heart level-star">&#xf004;&#xf004;</span></li>
			</ul>
		</dd> -->
		<dt id="collapse-hd">详细信息<span class="icon-caret-down"></span></dt>
		<dd class="panel-col-3" id="collapse-bd">
			<ul class="clearfix">
				<li>烘干:<?php echo $row['dry']; ?></li>
				<li>新旧:<?php echo $row['newold']; ?></li>
				<li>节巴:<?php echo $row['knob']; ?></li>
				<li>蓝变:<?php echo $row['blue']; ?></li>
				<li>虫眼:<?php echo $row['worm']; ?></li>
				<li>腐朽:<?php echo $row['decay']; ?></li>
				<li>爬皮:<?php echo $row['climb']; ?></li>
				<li>环裂:<?php echo $row['ring']; ?></li>
				<li>斜裂:<?php echo $row['slash']; ?></li>
				<li>柚油:<?php echo $row['oil']; ?></li>
				<li>黑心:<?php echo $row['black']; ?></li>
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
</div>
<div class="fixed">
	<ul>
		<li class="borker">
			<span class="borkerName"><?php echo $row['username']; ?></span>
			<p><?php echo $row['phone']; ?></p>
		</li>
		<li><a href="tel:<?php echo $row['phone']; ?>">
			<span class="icon-phone borkerTel"></span>
		</a></li>
		<!-- <li><a href="sms:">
			<span class="icon-comments borkerSms"></span>
		</a></li> -->
	</ul>
</div>
<?php
   }
  ?>
</body>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
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
	autoplay : 5000,//可选选项，自动滑动
	pagination : '.swiper-pagination',//分页
})
$('#collapse-hd').on('click',function () {
	$('#collapse-bd').slideToggle(1000);
})
/*$(document).ready(function() {
	$("#auto-loop").lightGallery({
		loop:true,
		auto:true,
		pause:4000
	});
});*/

</script>


</html>