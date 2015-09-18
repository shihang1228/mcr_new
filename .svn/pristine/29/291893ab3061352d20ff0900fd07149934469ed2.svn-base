<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<title>现货</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" type="text/css" href="css/sg.css">
<link rel="stylesheet" type="text/css" href="css/common.css">
<link rel="stylesheet" type="text/css" href="css/tz-dialog.css">

<link rel="stylesheet" type="text/css" href="statics/css/yumleeM.css" />
<link rel="stylesheet" type="text/css" href="statics/css/mcr.css" />
<link rel="stylesheet" type="text/css" href="com/icomoon/style.css" />
<link rel="stylesheet" href="css/manage.css" />
</head>
<body>
<header class="header fixed">
	<div><a href="javascript:history.back();"><i class="icon-arrow-back"></i></a></div>
	<h1>我的企业</h1>
	<div><a href="index.php"><i class="icon-home"></i></a></div>
</header>
<?php
   include_once('mcr_sc_fns.php');
   session_start();
   $userid=$_SESSION['userid'];
   $buy_array = get_mycompany($userid);  //数据库中查询企业信息
   ?>
<ul class="ul_list">
     <?php
		if (!is_array($buy_array)) {
			echo "<p>对不起，没有查找到您的企业！</p>";
		   return;
		}

		foreach ($buy_array as $row)
		{
	?>		
	<li>
	
		<b class="select_btn"><img src="images/img_2.png" alt="" width="40" height="40"/></b>
		<a href="companyDetail.php?companyid=<?php echo $row['companyid'];?>" class="li_link">
			<h3><?php
				 echo $row['companyname'];?>
			</h3>
			<p>
				<span><?php echo $row['publishtime'];?></span>
			</p>
		</a>
		<div class="tip">
			<div class="triangle"></div>
			<div class="t_con">
				<input type="hidden" name="mes_id" id="mes_id" value=<?php echo $row['companyid'];?> />
				<a href="#" class="del" class="del"><i class="icon-bin"></i><br /><span>删除</span></a>
				<a href="mycompanyupdate.php?companyid=<?php echo $row['companyid'];?>"><i class="icon-pencil"></i><br /><span>修改</span></a>
			</div>
		</div>
	</li>

	<?php
		}
	?>
</ul>
</body>
<script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
<script src="statics/js/config.js"></script>
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