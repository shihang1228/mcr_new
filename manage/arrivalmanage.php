<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<title>到货信息</title>
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
	<h1>到货信息</h1>
	<div><a href="../index.php"><i class="icon-home"></i></a></div>
</header>
<section>
	<form>
		<ul class="selectWrapper">
			<li class="flex col1-3">
				<div class="lineHeight28">到货日期：</div>
				<div>
					<input type="date" id="selectDate" name="selectDate" placeholder="选择日期"/>
				</div>
			</li>
		</ul>
		<ul class="selectWrapper flex">
			<li>
				<select name="train" id="train" class="selection">
					<option value="0">请选择列</option>
					<option value="01">第一列</option>
					<option value="02">第二列</option>
					<option value="03">第三列</option>
					<option value="04">第四列</option>
					<option value="05">第五列</option>
					<option value="06">第六列</option>
					<option value="07">第七列</option>
					<option value="08">第八列</option>
				</select>
			</li>
			<li>
				<select id="status" name="status">
					<option value="0">选状态</option>
					<option value="1">所有数据</option>
					<option value="2">正常数据</option>
					<option value="3">异常数据</option>
				</select>
			</li>
		</ul>
		<ul class="flex selectWrapper1">
			<li><input type="button" class="width98 button" value="批下架" id="batch"></li>
			<li><input type="button"  class="width98 button sousuo" onclick="start(1)" value="查询"></li>
		</ul>
	</form>
</section>

<ul class="ul_list" id="ul_list">
	
</ul>
<div class="loading hide"><i id='icon_loading'><img src='../images/loading.gif'></i>正在加载，请稍等......</div>
<p class='no_result' id="no-result">没有查询到您所要的内容</p>
<p class="load_success hide">加载完毕</p>
</body>
<script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
<script src="../js/top.js"></script>
<!--设置和获取cookie-->
<script type="text/javascript" src="../js/getSetCookie.js"></script>
<script type="text/javascript" src="../js/arrivalmanage.js"></script>
<script>
	$(function(){
			$("#batch").on('click',function(){
			var train=0,status=0,trainDate;
			trainDate = document.getElementById("selectDate").value;  //到货日期
			train = document.getElementById("train").value;
			status =document.getElementById("status").value;
			
			if(trainDate.length == 0){
				alert("请选择到货日期！");
				$("#selectDate").focus();
				return false;
			}

			if(train == 0){
				alert("请选择列！");
				$("#train").focus();
				return false;
			}

			if(status == 0){
				alert("请选择状态！");
				$("#status").focus();
				return false;
			}


			if(window.confirm("确定要批下架吗？")){
				 window.location = "arrivalmanageout_bgo.php?" + "&trainDate="+trainDate+"&train="+train+"&status="+status; //提交的url
			 }else{
				return;
			 }
		})
	    $('body').on('click','#down',function(){
	    	
	    	var companyid = $(this).siblings("#mes_id").val();//

			if(window.confirm("确定要下架吗？")){
				 window.location = "dumpmanageout_bgo.php?cdkey="+companyid; //提交的url
			 }else{
				return;
			 }
	    });

	})
</script>

</html>