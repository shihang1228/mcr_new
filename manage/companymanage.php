<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<title>企业管理</title>
<meta name="description" content="">
<meta name="keywords" content="">

<link rel="stylesheet" type="text/css" href="../statics/css/yumleeM.css" />
<link rel="stylesheet" type="text/css" href="../statics/css/mcr.css" />
<link rel="stylesheet" type="text/css" href="../com/icomoon/style.css" />
<link rel="stylesheet" type="text/css" href="../css/manage.css" />
</head>
<body>
<!--scroll_top start-->
<div class="scroll_top">
	<span id="s_btn"></span>
</div>
<!--end scroll_top-->
<header class="header fixed">
	<div><a href="javascript:history.back();"><i class="icon-arrow-back"></i></a></div>
	<h1>企业管理</h1>
	<div><a href="../index.php"><i class="icon-home"></i></a></div>
</header>
<section>
	<form method ="post">
		<div class="searchGroup">
			<input type="text" id="numberInput" placeholder="" />
			<input type="button" class="ser_btn" value="搜索" onclick="start(1);" />
		</div>
	</form>
</section>

<ul class="ul_list" id="ul_list">
	
</ul>
<div class="loading hide"><i id='icon_loading'><img src='../images/loading.gif'></i>正在加载，请稍等......</div>
<p class='no_result' id="no-result">没有查询到您所要的内容</p>
<p class="load_success hide">加载完毕</p>
</body>
<script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
<script src="../statics/js/config.js"></script>
<!--设置和获取cookie-->
<script type="text/javascript" src="../js/getSetCookie.js"></script>
<script src="../js/top.js"></script>
<script type="text/javascript" src="../js/companymanage.js"></script>
<script>
	$(function(){

		$('body').on('click','.ul_list li .select_btn',function(){
			$(this).siblings(".tip").slideToggle(300);
		});

		 $('body').on('click','#del',function(){
			var companyid = $(this).siblings("#mes_id").val();//公司id

			if(window.confirm("确定要删除吗？")){
				 window.location = "companydel_bgo.php?companyid="+companyid; //提交的url
			 }else{
				return;
			 }
	   });

	})
</script>

</html>