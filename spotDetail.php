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
	$cdkey=$_GET['cdkey'];
	$product_array = get_dumpdetail($cdkey);
	$productpic_array =get_productpic($cdkey);
?>
<body>

<header class="header">
	<div><a href="javascript:history.back();"><i class="icon-arrow-back"></i></a></div>
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
<dl class="panel panel-theme">
	<dt>
		<h3><?php echo $row['stuffname']." &nbsp&nbsp&nbsp&nbsp".$row['productlen']."&nbsp&nbsp&nbsp&nbsp".$row['kindname']."&nbsp&nbsp&nbsp&nbsp".$row['portname'];?></h3>
	</dt>
	<dd class="actionBtn">
		<div class="flex"><div><?php echo $row['updatetime'];?></div><div>浏览次数:<?php echo " ".$row['viewnum'];?></div><div></div></div>
		<button>分享</button>
	</dd>
</dl>
<ul class="list borBottom">
	<li class="flex">
		<div><span>树种:</span><var><?php echo $row['stuffname']; ?></var></div>
		<div><span>货种:</span><var><?php echo $row['kindname']; ?></var></div>
	</li>
	<li class="flex">
		<div><span>长度(m):</span><var><?php echo $row['productlen']; ?></var></div>
		<div><span>总货量(m³):</span><var><?php echo $row['refcapacity']; ?></var></div>
		
	</li>
	<?php  
	  if ($row['kindname'] =='原木')
	  {
	?>
	<li class="flex">
		<div><span>径级:</span><var><?php echo $row['diameterlen']; ?></var></div>
		<div><span>材质:</span><var><?php echo $row['timber']; ?></var></div>
	</li>
	<?php };?>
	<?php
       if($row['kindname'] !='原木')
		  {	
	?>
	<li class="flex">
		<div><span>厚度(mm):</span><var><?php 
		if(($row['kindname']=='大板') or($row['kindname']=='大方'))
		{
			if (($row['thincknessrange']!=0) && ($row['thinckness']!=='')){
				echo $row['thinckness']."起";
			}
			else {
				echo $row['thinckness'];
			}
		}
		else {
			echo $row['thinckness'];
		}
		 ?></var></div>
		 <div><span>宽度(mm):</span><var><?php 
		if(($row['kindname']=='大板') or($row['kindname']=='大方'))
		{
			if(($row['widerange']!=0)&&($row['wide']!=='')){
				echo $row['wide']."起";
			}
			else {
				echo $row['wide'];
			}
		}
		else {
			echo $row['wide'];
		}
		 ?></var></div>
	</li>
	<?php
		  };
	?>
	<li>
	    <div><span>目标口岸:</span><var><?php echo $row['portname'];?></var></div>
	</li>
	<li>
		<div><span>当前位置:</span><var><?php echo $row['dumpposition']; ?></var></div>
	</li>
</ul>
<dl class="panel collapse">
	<dt>详细信息<i class="icon-caret-down"></i></dt>
	<dd>
		<ul class="list borBottom">
	
		<?php
          if($row['kindname'] !='原木')
		  {	
	    ?>
			<li class="flex">
			    <div><span>公差(mm):</span><?php echo $row['tolerance']; ?></div>
				<div><span>爬皮:</span><?php echo $row['climb']; ?></div>
				<?php
                 if($row['kindname'] !='大方')
		         {	
	             ?>
				<div><span>烘干:</span><?php echo $row['dry']; ?></div>
				<?php
		          };
	             ?>
				
			</li>
		<?php
		  };
	     ?>
			<li class="flex">
			    <div><span>虫眼:</span><?php echo $row['worm']; ?></div>
				<div><span>腐朽:</span><?php echo $row['decay']; ?></div>
				<div><span>蓝变:</span><?php echo $row['blue']; ?></div>
				
				
			</li>
			<li class="flex">
				<div><span>新旧:</span><?php echo $row['newold']; ?></div>
				<div><span>环裂:</span><?php echo $row['ring']; ?></div>
				<div><span>斜裂:</span><?php echo $row['slash']; ?></div>
			</li>
			<li class="flex">
			    <div><span>节巴:</span><?php echo $row['knob']; ?></div>
				<div><span>柚油:</span><?php echo $row['oil']; ?></div>
				<div><span>黑心:</span><?php echo $row['black']; ?></div>
			</li>
			<?php
            if($row['kindname'] !='原木')
		     {	
	        ?>
			<li class="panel-row-2"><span>取材位置:</span><?php echo $row['position']; ?></li>
			<li class="panel-row-2"><span>加工设备:</span><?php echo $row['device']; ?></li>
			 <?php
			    }
		    	else {
				?>
				 <li class="panel-row-2"><span>纹理:</span><?php echo $row['timbertype']; ?></li>
				<?php
				};
				?>
			<li class="panel-row-1"><span>产地:</span><?php echo $row['fromname']; ?></li>
			<!-- <li class="panel-row-1">到达暂停线时间:</li>
			<li class="panel-row-2">暂停线车道:</li>
			<li class="panel-row-1">到达货场时间:</li>
			<li class="panel-row-2">到达货场:</li>
			<li class="panel-row-2">所在装卸线:</li>
			<li class="panel-row-2">货位编号:</li> -->
			<li class="indent"><span>详细介绍:</span><p><?php echo $row['content']; ?></p></li>
		</ul>
	</dd>
</dl>
<?php
  if($row['contactphone'] !=""){
?>
<ul class="flex contact">
	<li class="flex">
		<div><?php  echo $row['contact'];?>:<?php  echo $row['contactphone'];?></div>
	</li>
	<li class="flex">
		<a href="sms:<?php  echo $row['contactphone'];?>?body=我对你的<?php echo $row['stuffname']; ?>，<?php echo $row['kindname']; ?>，<?php echo $row['productlen']; ?>米，感兴趣"><i class="icon-bubbles4"></i>短信</a>
		<a href="tel:<?php  echo $row['contactphone'];?>"><i class="icon-phone borkerTel"></i>电话</a>
	</li>
</ul>
<?php
    }
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