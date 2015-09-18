<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>企业介绍</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" type="text/css" href="statics/css/yumleeM.css" />
<link rel="stylesheet" type="text/css" href="statics/css/mcr.css" />
<link rel="stylesheet" type="text/css" href="com/icomoon/style.css" />
<link rel="stylesheet" type="text/css" href="com/swiper/swiper.min.css" />
<link rel="stylesheet" type="text/css" href="iconfont/iconfont.css" />
<style>
	p{margin:10px auto;  padding: 0 10px 0 10px;}
	.swiper-container.company{height: 200px;}
	.swiper-container.company img{height: 200px;}
	body{background:#fff;padding-bottom: 64px;}
	.pic1{box-sizing: border-box; width: 95%; border: 0.3em solid white; -webkit-box-shadow: rgb(102, 102, 102) 0.2em 0.2em 0.5em; box-shadow: rgb(102, 102, 102) 0.2em 0.2em 0.5em; height: auto !important; float: none;margin: 0px auto 10px auto;}
	
	.tips{background-color:#ececec;height:35px;width:100%;display:block;}
    .tips span{font-size: 16px;color: #000; display: inline-block; vertical-align: middle; line-height:35px;padding-left:10px;font-weight: bold;}
    .tip_detail{text-indent: 2em; text-align: left; line-height: 2em;}
    .detail_con{line-height: 2em; text-indent: 1em;}
    .detail_con i{margin-right: 8px;font-size:24px;}

	.btnCall{width: 98%;height: 50px;background-color: #1588d9;color: #fff;position:fixed;font-size: 19px;border: 0;border-radius: 5px;bottom: 0; left: 3px;text-align: center;line-height: 50px;margin:0 auto;display:block;}
	.colorBlue{color:#12A6E9;border-bottom: 1px solid #12A6E9;}
</style>
</head>
<?php
    session_start();
    include_once('mcr_sc_fns.php');
	$companyid=$_GET['companyid'];
	$company_array = get_mydata("call p_mycompany(".$companyid.")");
	$companypic_array =get_companypic($companyid);
	//微信分享
	require_once('system/model/weixin.class.php');
	$weixin = new class_weixin();
	$signPackage = $weixin->GetSignPackage();
	$title="木材人信息交流平台";
	$description="木材人信息平台木材人自己的家";
	$picurl ='http://www.sxuav.com/mcr/images/wxmcr.png';
	//$url ='';
	$url ='http://www.sxuav.com/mcr/companyDetail.php?companyid='.$companyid;
	//
?>
<body>


<?php
if (!is_array($company_array)) {
  $noconnect ="<p>对不起，没有查找到您要查找的内容！</p>";
  echo  $noconnect;
					   
}
else {
  $row =$company_array[0];
  $title=$row['companyname'];
  $description='主要产品：'.$row['product'];
?>

<header class="header">
	<div><a href="javascript:history.back();"><i class="icon-arrow-back"></i></a></div>
	<h1><?php echo $row['companyname'] ?></h1>
	<div><a href="index.php"><i class="icon-home"></i></a></div>
</header>
<?php
	 if (is_array($companypic_array)) {
?>
<div class="company-bg pic1">
	<div class="swiper-container company">
		<ul class="swiper-wrapper" id="auto-loop">
			<?php
				foreach($companypic_array as $rowpic){
					echo "<li class='swiper-slide'><img src='".$rowpic['companypic']."'></li>";
				}
			?>
		</ul>
	</div>
</div>
<?php
	}
?>
	<section>
        <p style="" class="tips">
            <span>公司介绍</span>
        </p>
        <p class="tip_detail"><?php echo $row['content'];?></p>
    </section>
    <section>
        <p class="tips">
            <span>主要产品</span>
        </p>
        <p class="tip_detail"><?php echo $row['product'];?></p>
    </section>
    <section>
        <p class="tips">
            <span>联系信息</span>
        </p>
        <p class="detail_con">
            <span><i class="iconfont">&#x3605;</i>联系人：<?php echo $row['contact'];?></span>
        </p>
         <p class="detail_con">
            <span><i class="iconfont">&#x3601;</i>手机：<?php echo $row['phone'];?></span>
        </p>
         <p class="detail_con">
            <span><i class="iconfont">&#x3600;</i>联系电话：<?php echo $row['contactphone'];?></span>
        </p>
        <p class="detail_con">
            <span><i class="iconfont">&#x3606;</i>网址：<a href="http://<?php echo $row['website'];?>" class="colorBlue"><?php echo $row['website'];?></a></span>
        </p>
         <p class="detail_con">
            <span><i class="iconfont">&#x3603;</i>地址：<?php echo $row['address'];?></span>
        </p>
    	 <p class="detail_con">
            <span><i class="iconfont">&#x3602;</i>邮箱：<?php echo $row['email'];?></span>
        </p>
    </section>
    <section>
        <img src="statics/images/qrcode2.png" height="100%" width="100%" alt="......">   
    </section>
    <a href="tel:<?php echo $row['phone'];?>" class="btnCall">一键呼叫</a>
<?php
   }
  ?>
</body>
<script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
<!--设置和获取cookie-->
<script type="text/javascript" src="js/getSetCookie.js"></script>
<script>
    $(function(){
        SetCookie("localFlag","1");
    })
    
</script>
<script type="text/javascript" src="com/swiper/swiper.min.js"></script>
<script> 
var mySwiper = new Swiper('.swiper-container',{
autoplay : 3000,//可选选项，自动滑动
})
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
		 // link: '<?php echo $url;?>',
		   link:window.location.href.split('#')[0],
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
			// title: '<?php echo $description;?>',
		  //link: '<?php echo  $url;?>',
		  link:window.location.href.split('#')[0],
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
		//alert(res.errMsg);
	});
 </script>

</html>