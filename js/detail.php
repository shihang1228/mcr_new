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
<link rel="stylesheet" type="text/css" href="/com/icomoon/style.css" />
<link rel="stylesheet"  href="css/zoom.css" media="all" />
<style type="text/css">
	.swiper-container.company {width: 320px;height: 100px;margin: 0 auto;overflow:hidden;}
	.swiper-container.company img{width:60px;height:60px;}
	.swiper-container.company ul li{text-align: center;margin-top: 20px;}
</style>
</head>
<?php
    session_start();
    include_once('mcr_sc_fns.php');
	require_once('system/model/weixin.class.php');
	$userid=0;
	if(isset($_SESSION['userid']) ){
		$userid=$_SESSION['userid'];
	}
	//echo $userid;
		$cdkey=$_GET['cdkey'];
	$product_array = get_detail($cdkey,$userid);
	//echo $product_array;
	$productpic_array =get_productpic($cdkey);
	$weixin = new class_weixin();
	$signPackage = $weixin->GetSignPackage();
	$title="木材人信息交流平台";
	$description="木材人信息平台木材人自己的家";
	$picurl ='http://www.sxuav.com/images/mcrwx.jpg';
	
   $url ='http://www.sxuav.com/detail.php?cdkey='.$cdkey; 
?>
<body>

<header class="header">
	<div><a href="javascript:history.back();"><i class="icon-arrow-back"></i></a></div>
	<h1>详细信息</h1>
	<div><a href="index.php"><i class="icon-home"></i></a></div>
</header>
<div class="detail_bg"><img src="images/share_bg.jpg" alt="" width="100%" height="100%"/></div>
<?php
   if (!is_array($product_array)) {
      $noconnect ="<p>对不起，没有查找到您要查找的内容！</p>";
      echo  $noconnect;
                           
    }
	else {
	$row =$product_array[0];
	$description=$row['carnum']." ".$row['portname']."  ".$row['kindname']." ".$row['stuffname'];
	
  ?>
  <?php
     if (is_array($productpic_array)) {
  ?>
<div class="swiper-container company">
  <ul class="flex gallery swipe-wrap" id="auto-loop">
   <?php
        $index=0;        //count($productpic_array)
		
        foreach ($productpic_array as $rowpic)
		{
		  echo "<li><a href='".$rowpic['productpic']."'><img src='".$rowpic['productpic']."'/></a></li>";
		  if ($index ==0) {
			$picurl="http://www.sxuav.com/".$rowpic['productpic'];
			
		  }
		  $index =$index+1;
		}
   ?>
  </ul>
  <div class="swiper-pagination"></div>
</div>
<?php
  }
?>
<dl class="panel panel-theme">
	<dt>
		<input type="hidden" id="collectid" value="<?php echo $row['collectid']?>" />
		<h3><?php echo $row['carnum']." &nbsp&nbsp&nbsp&nbsp".$row['portname']."&nbsp&nbsp&nbsp&nbsp".$row['kindname']."&nbsp&nbsp&nbsp&nbsp".$row['stuffname'];?></h3>
	</dt>
	<dd class="actionBtn">
		<div class="flex"><div><?php echo $row['updatetime'];?></div><div>浏览次数:<?php echo " ".$row['viewnum'];?></div><div></div></div>
		<button id="share">分享</button>
		<!--判断是否收藏-->
		<?php
			if($row['collectid'] == "0"){
		?>

				
			<button id="collect">收藏</button>
		<?php
			}else{
		?>
			<button id="collect" class="collection">已收藏</button>
		<?php
			}
		?>
	</dd>
</dl>
<ul class="list borBottom">
	<li class="flex">
		<div><span>车皮号:</span><var><?php echo $row['carnum'];?></var></div>
		<div><span>目标口岸:</span><var><?php echo $row['portname'];?></var></div>
	</li>
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
			if($row['thincknessrange']!=0){
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
			if($row['widerange']!=0){
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
	<li class="flex">
	    <div><span>参考根数(根):</span><var><?php echo $row['refnum']; ?></var></div>
		<div><span>参考重量(T):</span><var><?php echo $row['refwight']; ?></var></div>
	</li>
	<li>
		<div><span>销售状态:</span><var><?php echo $row['salestatusName']; ?></var></div>
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
			<li class="indent"><span>详细介绍:</span><p><?php echo $row['content']; ?></p></li>
		</ul>
	</dd>
</dl>
<div class="flex detailBottom"><section><button id="report">举报</button></section><section><button id="perfectit">完善信息</button></section></div>
<?php
  if($row['contactphone'] !=""){
?>
<ul class="flex contact">
	<li class="flex">
		<div><?php  echo $row['contact'];?>:<?php  echo $row['contactphone'];?></div>
	</li>
	<li class="flex">
		<a href="sms:<?php  echo $row['contactphone'];?>?body=我对你的<?php echo $row['carnum'];?>，<?php echo $row['stuffname']; ?>，<?php echo $row['kindname']; ?>感兴趣"><i class="icon-bubbles4"></i><span>短信</span></a>
		<a href="tel:<?php  echo $row['contactphone'];?>"><i class="icon-phone borkerTel"></i><span>电话</span></a>
		
	</li>
</ul>
<?php
    }
   }
  ?>
</body>
<script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
<script src="https://hammerjs.github.io/dist/hammer.js"></script>
<script src="js/zoom.min1.js"></script>
<script src="/statics/js/config.js"></script>
<script>
	$(function(){
		
		//登录id
		var $userid = "<?php echo $userid ?>";
		var $cdkey = "<?php echo $cdkey ?>";
		//收藏功能
		$("#collect").click(function(){
			var collect_text = $(this).text();
			//判断是否已经收藏，若未收藏才进行ajax提交
			if(collect_text == "已收藏"){
				return false;
			}else{
				assert_login($userid);
				$.ajax({
					url : 'collect_bgo.php',
					type : 'POST',
					data : "cdkey=" + $cdkey + "&userid=" + $userid,
					success : function(json){
						$("#collect").text("已收藏").addClass("collection");
					}

				})

			}
		})

		//举报功能
		$("#report").click(function(){
			assert_login($userid);
			if($userid != 0){
				window.location = "report.php?userid="+ $userid + "&cdkey=" + $cdkey;
			}
		})


		//完善功能
		$("#perfectit").click(function(){
			assert_login($userid);
			if($userid != 0){
				window.location = "spotperfect.php?userid="+ $userid + "&cdkey=" + $cdkey;
			}
		})

		//分享功能
		$("#share").click(function(){
			var width = $(document).width();
			var height = $(document).height();
			$(".detail_bg img").attr({"width":width,"height":height});
			$(".detail_bg").css("top","-36px").show();
			$(".detail_bg").click(function(){
				$(".detail_bg").hide();
			});
		})

	})
	//判断用户是否登录
	function assert_login(userid){
		if(userid == 0){
			window.location = "signin.php?type=1";
		}
	}
</script>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
	wx.config({
		debug: false,
		appId: '<?php echo $signPackage["appId"];?>',
		timestamp: <?php echo $signPackage["timestamp"];?>,
		nonceStr: '<?php echo $signPackage["nonceStr"];?>',
		signature: '<?php echo $signPackage["signature"];?>',
		jsApiList: [
			// 所有要调用的 API 都要加到这个列表中
			'checkJsApi',
			'onMenuShareTimeline',
			'onMenuShareAppMessage'
		  ]
	});
</script>

<script>
	wx.ready(function () {
		//自动执行的
		wx.checkJsApi({
			jsApiList: [
				'onMenuShareTimeline',
				'onMenuShareAppMessage'
			],
			success: function (res) {
				//alert(JSON.stringify(res));
				// alert(JSON.stringify(res.checkResult.getLocation));
				// if (res.checkResult.getLocation == false) {
					// alert('你的微信版本太低，不支持微信JS接口，请升级到最新的微信版本！');
					// return;
				// }
			}
		});
		
		
		wx.onMenuShareAppMessage({
		  title: '<?php echo $title;?>',
		  desc: '<?php echo $description;?>',
		  link: '<?php echo $url;?>',
		  imgUrl: '<?php echo $picurl;?>',
		  trigger: function (res) {
			// 不要尝试在trigger中使用ajax异步请求修改本次分享的内容，因为客户端分享操作是一个同步操作，这时候使用ajax的回包会还没有返回
			// alert('用户点击发送给朋友');
		  },
		  success: function (res) {
			// alert('已分享');
		  },
		  cancel: function (res) {
			// alert('已取消');
		  },
		  fail: function (res) {
			// alert(JSON.stringify(res));
		  }
		});

		wx.onMenuShareTimeline({
		  title: '<?php echo $title;?>',
		  link: '<?php echo  $url;?>',
		  imgUrl: '<?php echo $picurl;?>',
		  trigger: function (res) {
			// 不要尝试在trigger中使用ajax异步请求修改本次分享的内容，因为客户端分享操作是一个同步操作，这时候使用ajax的回包会还没有返回
			// alert('用户点击分享到朋友圈');
		  },
		  success: function (res) {
			// alert('已分享');
		  },
		  cancel: function (res) {
			// alert('已取消');
		  },
		  fail: function (res) {
			// alert(JSON.stringify(res));
		  }
		});
	});

	wx.error(function (res) {
		alert(res.errMsg);
	});
 </script>

</html>