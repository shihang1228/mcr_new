<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<title>求购管理</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" type="text/css" href="css/sg.css">
<link rel="stylesheet" type="text/css" href="css/common.css">
<link rel="stylesheet" type="text/css" href="css/tz-dialog.css">

<link rel="stylesheet" type="text/css" href="/statics/css/yumleeM.css" />
<link rel="stylesheet" type="text/css" href="/statics/css/mcr.css" />
<link rel="stylesheet" type="text/css" href="/com/icomoon/style.css" />
<link rel="stylesheet" href="css/manage.css" />
</head>
<body>
<header class="header fixed">
	<div><a href="javascript:history.back();"><i class="icon-arrow-back"></i></a></div>
	<h1>求购管理</h1>
	<div><a href="index.php"><i class="icon-home"></i></a></div>
</header>
<section>
	<form action="" method="get">
		<ul class="flex selectWrapper">
		    <li>
				<select class="selectItem"  name ="kindselect" id="kindselect" onchange="start(1,1)">
					<option value = 0>选择货种</option>
					<option value = 1>原木</option>
					<option value = 2>条子</option>
					<option value = 3>口料</option>
					<option value = 4>大方</option>
					<option value = 5>大板</option>
					<option value = 6>防腐材</option>
				</select>
			</li>
			<li>
				<select class="selectItem" name ="stuffselect" id="stuffselect" onchange="start(1,1)">
					<option value = 0>选择树种</option>
					 <?php
		                   for($i=0;$i<$stuffnum;$i++) {
								$row =$stuff_array->fetch_assoc();
								$stuffid = $row['stuffid'];
		                        $stuffname = $row['stuffname'];
		                        echo "<option value =".$stuffid.">".$stuffname."</option>";
							}
		                    ?>
				</select>
			</li>
			<li>
				<select name = "productlen" id = "productlen" onchange="start(1,1)">
					<option value="0">选择长度</option>
					<option value="2">2米</option>
					<option value="2.5">2.5米</option>
					<option value="3">3米</option>
					<option value="4">4米</option>
					<option value="6">6米</option>
					<option value="12">12米</option>
					<option value="8">8米</option>
				</select>
			</li>
			<li><input type="button"  class="button sousuo" onclick="start(1,1)" value="搜索"></li>
		</ul>
	</form>
</section>
<ul class="ul_list">
     	
	<li>
		<b class="select_btn"><img src="images/img_2.png" alt="" width="40" height="40"/></b>
		<a href="companyDetail.php?companyid=<?php echo $row['companyid'];?>" class="li_link">
			<h3>
				<span>樟子松</span>
				<span>12米</span>
				<span>30φ</span>
				<span>一级材</span>
			</h3>
			<p>
				<span>求购</span><span>满洲里一号位置</span><span>2015-06-17 10:11</span>
			</p>
		</a>
		<div class="tip">
			<div class="triangle"></div>
			<div class="t_con">
				<input type="hidden" name="mes_id" id="mes_id" value="" />
				<a href="#" class="del" class="del"><i class="icon-download"></i><br /><span>下架</span></a>
				<a href=""><i class="icon-bin"></i><br /><span>删除</span></a>
			</div>
		</div>
	</li>
	<li>
		<b class="select_btn"><img src="images/img_2.png" alt="" width="40" height="40"/></b>
		<a href="companyDetail.php?companyid=<?php echo $row['companyid'];?>" class="li_link">
			<h3>
				<span>樟子松</span>
				<span>12米</span>
				<span>30φ</span>
				<span>一级材</span>
			</h3>
			<p>
				<span>求购</span><span>满洲里一号位置</span><span>2015-06-17 10:11</span>
			</p>
		</a>
		<div class="tip">
			<div class="triangle"></div>
			<div class="t_con">
				<input type="hidden" name="mes_id" id="mes_id" value="" />
				<a href="#" class="del" class="del"><i class="icon-download"></i><br /><span>下架</span></a>
				<a href=""><i class="icon-bin"></i><br /><span>删除</span></a>
			</div>
		</div>
	</li>
	<li>
		<b class="select_btn"><img src="images/img_2.png" alt="" width="40" height="40"/></b>
		<a href="companyDetail.php?companyid=<?php echo $row['companyid'];?>" class="li_link">
			<h3>
				<span>樟子松</span>
				<span>12米</span>
				<span>30φ</span>
				<span>一级材</span>
			</h3>
			<p>
				<span>求购</span><span>满洲里一号位置</span><span>2015-06-17 10:11</span>
			</p>
		</a>
		<div class="tip">
			<div class="triangle"></div>
			<div class="t_con">
				<input type="hidden" name="mes_id" id="mes_id" value="" />
				<a href="#" class="del" class="del"><i class="icon-download"></i><br /><span>下架</span></a>
				<a href=""><i class="icon-bin"></i><br /><span>删除</span></a>
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