<!DOCTYPE html>
<?php
   // error_reporting(E_ALL || ~E_NOTICE);
    header("Content-type:text/html; charset=utf-8");
	include_once("db_fns.php");
	require_once('system/model/weixin.class.php');
    $weixin = new class_weixin();
	$signPackage = $weixin->GetSignPackage();
	
  ?>
<html>
<head>
<meta http-equiv="Content-Type"content="text/html; charset=utf-8">   
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<title>现货发布
	
</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" type="text/css" href="/statics/css/yumleeM.css" />
<link rel="stylesheet" type="text/css" href="/statics/css/mcr.css" />
<link rel="stylesheet" type="text/css" href="/com/icomoon/style.css" />
<link rel="stylesheet" type="text/css" href="css/reminder.css" />
<link rel="stylesheet" type="text/css" href="css/upload.css" />
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>

<script type="text/javascript">
  wx.config({
        debug: true,
		appId: '<?php echo $signPackage["appId"];?>',
		timestamp: <?php echo $signPackage["timestamp"];?>,
		nonceStr: '<?php echo $signPackage["nonceStr"];?>',
		signature: '<?php echo $signPackage["signature"];?>',
        jsApiList: [
           /*
            * 所有要调用的 API 都要加到这个列表中
            * 这里以图像接口为例
            */
          'startRecord',
          'stopRecord',
		  'playVoice',
		  'pauseVoice',
		  'stopVoice',
		  'uploadVoice',
		  'downloadVoice',
		  'onVoiceRecordEnd'
    ]
  });
  

	
</script>

</head>
<body>
<header class="header">
	<div><a href="javascript:history.back();"><i class="icon-arrow-back"></i></a></div>
	<div><a href="index.php"><i class="icon-home"></i></a></div>
</header>

<form class="onoff labelPadding" id="submitform">

		<li>
			<ul class="upImg-display">
				<li>
					<input type="button" id="record" value="录音">
					<input type="button" id="stopRecord" value="停止录音">
					<input type="button" id="pauseRecord" value="暂停录音">
					
					<input type="button" id="play" value="播放">
					
				</li>
				
			</ul>
		</li>
		
	<input class="btnFixed" type="button" value="发布" id="sendmessage" />
</form>

</body>

<script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="js/reminder.js"></script>
<script src="/statics/js/config.js"></script>
<script type="text/javascript" src="js/wxaudio.js"></script>



</html>