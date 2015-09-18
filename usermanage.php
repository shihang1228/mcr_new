<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<title>用户管理</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" type="text/css" href="css/sg.css">
<link rel="stylesheet" type="text/css" href="css/common.css">
<link rel="stylesheet" type="text/css" href="css/tz-dialog.css">

<link rel="stylesheet" type="text/css" href="/statics/css/yumleeM.css" />
<link rel="stylesheet" type="text/css" href="/statics/css/mcr.css" />
<link rel="stylesheet" type="text/css" href="/com/icomoon/style.css" />
<link rel="stylesheet" type="text/css" href="css/manage.css" />
</head>
<body>
<header class="header fixed">
	<div><a href="javascript:history.back();"><i class="icon-arrow-back"></i></a></div>
	<h1>用户管理</h1>
	<div><a href="index.php"><i class="icon-home"></i></a></div>
</header>
<section>
	<form>
		<div class="searchGroup">
			<input type="text" id="numberInput" name= "search" placeholder="" />
			<input type="button" value="搜索" onclick="start(1,1)" class="bgWhite" />
		</div>
	</form>
</section>

<ul class="ul_list" id="ul_list">

</ul>
</body>
<script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="js/usermanage.js"></script>
<script>
	$(function(){
		$('body').on('click','.ul_list li .select_btn',function(){
			$(this).siblings(".tip").slideToggle(300);
		});

		$('body').on('click','#lock',function(){
			var userid = $(this).siblings("#mes_id").val();//userid    
			if(window.confirm("确定要冻结吗？")){
				 window.location = "userfreeze.php?userid="+userid + "&type=1"; //提交的url
			 }else{
				return;
			 }
	   });

	   $('body').on('click','#open',function(){
		   var userid = $(this).siblings("#mes_id").val();//userid    
			if(window.confirm("确定要解冻吗？")){
				 window.location = "userfreeze.php?userid="+userid + "&type=2"; //提交的url
			 }else{
				return;
			 }
	   });

	   $('body').on('click','#del',function(){
		   var userid = $(this).siblings("#mes_id").val();//userid    
			if(window.confirm("确定要删除吗？")){
				 window.location = "userfreeze.php?userid="+userid + "&type=3"; //提交的url
			 }else{
				return;
			 }
	   });

	})
</script>

</html>