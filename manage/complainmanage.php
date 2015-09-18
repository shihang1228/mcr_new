<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<title>投诉管理</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" type="text/css" href="../css/sg.css">
<link rel="stylesheet" type="text/css" href="../css/common.css">
<link rel="stylesheet" type="text/css" href="../css/tz-dialog.css">

<link rel="stylesheet" type="text/css" href="../statics/css/yumleeM.css" />
<link rel="stylesheet" type="text/css" href="../statics/css/mcr.css" />
<link rel="stylesheet" type="text/css" href="../com/icomoon/style.css" />
<link rel="stylesheet" type="text/css" href="../css/manage.css" />
</head>
<body>
<header class="header fixed">
	<div><a href="../administration.php"><i class="icon-arrow-back"></i></a></div>
	<h1>投诉管理</h1>
	<div><a href="../index.php"><i class="icon-home"></i></a></div>
</header>
<section>
	<form >
		<div class="searchGroup">
			<input type="text" id="numberInput" placeholder="" />
			<input type="button" value="搜索" onclick="start(1);" class="bgWhite" />
		</div>
	</form>
</section>
<ul class="ul_list" id="ul_list">  	
	<div class="loading hide"><i id='icon_loading'><img src='images/loading.gif'></i>正在加载，请稍等......</div>
</ul>
<p class='no_result' id="no-result">没有查询到您所要的内容</p>
</body>
<script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
<script src="../statics/js/config.js"></script>
<script type="text/javascript" src="../js/sgutil.js"></script>
<script type="text/javascript" src="../js/tz_dialog.js"></script>
<script type="text/javascript" src="../js/complainmanage.js"></script>
<script>
	$(function(){
		kindselect();
		$('body').on('click','.ul_list li .select_btn',function(){
			$(this).siblings(".tip").slideToggle(300);
		});

		

	})
</script>

</html>