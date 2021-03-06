﻿<!DOCTYPE html>
<?php
   include_once('mcr_sc_fns.php');
   require_once('system/model/weixin.class.php');
    $weixin = new class_weixin();
	$signPackage = $weixin->GetSignPackage();

    session_start();
	$companyid = $_GET["companyid"];
	$company = get_companydetail($companyid);  //数据库中查询企业信息
	if (!is_array($company)) {
	  $noconnect ="<p>对不起，没有查找到您要查找的内容！</p>";
	  echo  $noconnect; 
	}
	else {
		$row =$company[0];
	}
	if(isset($_SESSION['user']) )
	{			//用户或管理员登录后才可以发表信息
?>
<html>
<head>
<meta http-equiv="Content-Type"content="text/html; charset=utf-8">   
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>企业修改</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" type="text/css" href="statics/css/yumleeM.css" />
<link rel="stylesheet" type="text/css" href="statics/css/mcr.css" />
<link rel="stylesheet" type="text/css" href="com/icomoon/style.css" />
<link rel="stylesheet" type="text/css" href="css/reminder.css" />
<link rel="stylesheet" href="css/upload.css" />
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>

<script type="text/javascript">
  wx.config({
        debug: false,
		appId: '<?php echo $signPackage["appId"];?>',
		timestamp: <?php echo $signPackage["timestamp"];?>,
		nonceStr: '<?php echo $signPackage["nonceStr"];?>',
		signature: '<?php echo $signPackage["signature"];?>',
        jsApiList: [
           /*
            * 所有要调用的 API 都要加到这个列表中
            * 这里以图像接口为例
            */
          'chooseImage',
          'uploadImage'
    ]
  });
  	
</script>
</head>
<body>

<header class="header">
	<div><a href="javascript:history.back();"><i class="icon-arrow-back"></i></a></div>
	<h1>企业修改</h1>
	<div><a href="index.php"><i class="icon-home"></i></a></div>
</header>
<form  class="checkbox addForm labelPadding">
	<ul class="list">
		<li>
			<ul class="upImg-display">
				<li>
					<input type="button" id="choose">
				</li>
				<li><a href="javascript:void(0);return false;" class="upload_delete" id="upload_delete"></a></li>
				<li><a href="javascript:void(0);return false;" class="upload_delete" id="upload_delete"></a></li>
				<li><a href="javascript:void(0);return false;" class="upload_delete" id="upload_delete"></a></li>
				<li><a href="javascript:void(0);return false;" class="upload_delete" id="upload_delete"></a></li>
				
			</ul>
		</li>
		<li class="flex comInput"><div><input type="hidden" name="companyid" id="companyid" <?php echo "value = \"".$companyid."\"" ?>/></div></li>  <!--传输companyid-->
		<li class="flex comInput"><div>企业名称:</div><div><input type="text" name="companyname" id="companyname" <?php echo "value = \"".$row['companyname']."\"" ?>/></div></li>
		<li class="flex comInput"><div>联系人:</div><div><input type="text" name="contact" id="contact" <?php echo "value = \"".$row['contact']."\"" ?>/></div></li>
		<li class="flex comInput"><div>联系电话:</div><div><input type="text" name="contactphone" id="contactphone" <?php echo "value = \"".$row['contactphone']."\"" ?>/></div></li>
		<li class="flex comInput"><div>手机:</div><div><input type="tel" name="phone" id="phone" <?php echo "value = \"".$row['phone']."\"" ?>/></div></li>
		<li class="flex comInput"><div>邮箱:</div><div><input type="text" name="email" id="email" <?php echo "value = \"".$row['email']."\"" ?>/></div></li>
		<li class="flex comInput"><div>地址:</div><div><input type="text" name="address" id="address" <?php echo "value = \"".($row['address']===0?"":$row['address'])."\"" ?>/></div></li>
		<li class="flex comInput"><div>网址:</div><div><input type="text" name="website" id="website" <?php echo "value = \"".($row['website']===0?"":$row['website'])."\"" ?>/></div></li>
		<li class="flex comInput"><div>主要产品:</div><div><input type="text" name="product" id="product" <?php echo "value = \"".$row['product']."\"" ?>/></div></li>
		<?php
			$key = ",".trim($row["keyword"]).",";
		?>
		<li class="flex col1-3"><div class="">关键字:</div>
			<ul class="border2">
				<li class="keywordSuggest">最多选择2个关键词</li>
				<li class="flex checkbox">
					<input type="checkbox" name="keyword" id="ch1" <?php echo strstr($key,"原木板材进口")?"checked=\"checked\"":"" ?>/><label for="ch1">原木板材进口</label>
					<input type="checkbox" name="keyword" id="ch2" <?php echo strstr($key,"防腐木扣板加工")?"checked=\"checked\"":"" ?>/><label for="ch2">防腐木扣板加工</label>
				</li>
				<li class="flex checkbox">
					<input type="checkbox" name="keyword" id="ch3" <?php echo strstr($key,"拼板指接板")?"checked=\"checked\"":"" ?>/><label for="ch3">拼板指接板</label>
					<input type="checkbox" name="keyword" id="ch4" <?php echo strstr($key,"龙骨小料加工")?"checked=\"checked\"":"" ?>/><label for="ch4">龙骨小料加工</label>
				</li>
				<li class="flex checkbox">
					<input type="checkbox" name="keyword" id="ch5" <?php echo strstr($key,"干燥旋切")?"checked=\"checked\"":"" ?>/><label for="ch5">干燥旋切</label>
					<input type="checkbox" name="keyword" id="ch6" <?php echo strstr($key,"相关机械与化工")?"checked=\"checked\"":"" ?>/><label for="ch6">相关机械与化工</label>
				</li>
				<li class="flex checkbox">
					<input type="checkbox" name="keyword" id="ch7" <?php echo strstr($key,"代理中介机构")?"checked=\"checked\"":"" ?>/><label for="ch7">代理中介机构</label>
					<input type="checkbox" name="keyword" id="ch8" <?php echo strstr($key,"其它")?"checked=\"checked\"":"" ?>/><label for="ch8">其它</label>
				</li>
			</ul>
		</li>
		<li class="flex comInput">
			<div>公司简介:</div>
			<div><textarea class="fullCol" rows="5" name="content" id="content"><?php echo $row['content']=="0"?"":$row['content'] ?></textarea></div>
		</li>
	</ul>
	<input class="btnFixed" type="button" value="修改" id="sendmessage"  />
</form>
<?php
}else{
   echo "<script>window.location.href='signIn.php?type=2';</script>";
  }
 ?>
</body>
<script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="js/reminder.js"></script>
<script src="/statics/js/config.js"></script>
<script type="text/javascript" src="mycompanyupdate.js?v=41c28fd"></script>

<script type="text/javascript">
	$(function(){
		uploadImg();
		deleteImg();
	})
	/*动态给上传的四张图片赋宽和高*/
	function uploadImg(){
		var $img_width = $(".list li .upImg-display li").width();
		$(".list li .upImg-display li").css({"width":$img_width,"height":$img_width});
		$(".list li .upImg-display li .upImg").css({"width":$img_width,"height":$img_width});
		$("#upload_img").css({"width":$img_width,"height":$img_width});
		$(".list li .upImg-display li .images").css({"width":$img_width,"height":$img_width});
	}
	/*删除上传的图片*/
	function deleteImg(){
		$(".list li .upImg-display li").find(".upload_delete").click(function(){
			$(this).siblings(".images").remove();
			$(this).hide();
		});
	}
</script>
</html>