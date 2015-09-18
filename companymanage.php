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
	<h1>企业管理</h1>
	<div><a href="index.php"><i class="icon-home"></i></a></div>
</header>
<section>
	<form method ="post">
		<div class="searchGroup">
			<input type="text" id="numberInput" placeholder="" />
			<input type="submit" value="搜索" />
		</div>
	</form>
</section>

<ul class="ul_list">
     	
	<li>
		<b class="select_btn"><img src="images/img_2.png" alt="" width="40" height="40"/></b>
		<a href="companyDetail.php?companyid=<?php echo $row['companyid'];?>" class="li_link">
			<h3>山西军缘伟业贸易有限公司</h3>
			<p>
				<span>张小五</span><span>15235432994</span><span>2015-06-17 10:11</span>
			</p>
		</a>
		<div class="tip">
			<div class="triangle"></div>
			<div class="t_con">
				<input type="hidden" name="mes_id" id="mes_id" value="" />
				<a href="#" class="del" class="del"><i class="icon-bin"></i><br /><span>删除</span></a>
			</div>
		</div>
	</li>
	<li>
		<b class="select_btn"><img src="images/img_2.png" alt="" width="40" height="40"/></b>
		<a href="companyDetail.php?companyid=<?php echo $row['companyid'];?>" class="li_link">
			<h3>山西军缘伟业贸易有限公司</h3>
			<p>
				<span>张小五</span><span>15235432994</span><span>2015-06-17 10:11</span>
			</p>
		</a>
		<div class="tip">
			<div class="triangle"></div>
			<div class="t_con">
				<input type="hidden" name="mes_id" id="mes_id" value="" />
				<a href="#" class="del" class="del"><i class="icon-bin"></i><br /><span>删除</span></a>
			</div>
		</div>
	</li>
	<li>
		<b class="select_btn"><img src="images/img_2.png" alt="" width="40" height="40"/></b>
		<a href="companyDetail.php?companyid=<?php echo $row['companyid'];?>" class="li_link">
			<h3>山西军缘伟业贸易有限公司</h3>
			<p>
				<span>张小五</span><span>15235432994</span><span>2015-06-17 10:11</span>
			</p>
		</a>
		<div class="tip">
			<div class="triangle"></div>
			<div class="t_con">
				<input type="hidden" name="mes_id" id="mes_id" value="" />
				<a href="#" class="del" class="del"><i class="icon-bin"></i><br /><span>删除</span></a>
			</div>
		</div>
	</li>
</ul>
</body>
<script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
<script src="/statics/js/config.js"></script>
<script type="text/javascript" src="js/sgutil.js"></script>
<script type="text/javascript" src="js/tz_dialog.js"></script>
<script>
	$(function(){

		tipToggle();

		$(".del").click(function(){
			var companyid = $(this).siblings("#mes_id").val();//公司id

			if(window.confirm("确定要删除吗？")){
				 window.location = "mycompanydel_bgo.php?companyid="+companyid; //提交的url
			 }else{
				return;
			 }
	   });

	})
</script>

</html>