<?php
    session_start();
	include_once('db_fns.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<title>个人中心</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link href="" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/statics/css/yumReset.css" />
<link rel="stylesheet" type="text/css" href="/statics/css/yumPage.css" />
<link rel="stylesheet" type="text/css" href="/com/icomoon/style.css" />
<style type="text/css">
	.list-item{height:51px;line-height:40px;}
	.user-head{height:105px;}
	.dj{line-height:3;}
	.img{position:relative;}
	.black_overlay{display:none;position:absolute;top:0%;left:0%;width:100%;height:100%;background-color:black;z-index:1001;-moz-opacity:0.8;opacity:.80;filter:alpha(opacity=80);}
	.white_content{display:none;position:absolute;top:25%;left:10%;width:80%;height:40%;border:1px solid lightblue;background-color:white;z-index:1002;overflow:auto;}
	.white_content_small{display:none;position:absolute;top:20%;left:30%;width:40%;height:50%;border:16px solid lightblue;background-color:white;z-index:1002;overflow:auto;}
	#port{width:100%;height:40px;background:#fff;text-align:center;border:1px solid #009933;border-radius:6px;}
	#port option{height:40px;line-height:40px;}
	.uploadfile{position:absolute;top:0px;left:20px;width:80px;height:80px;opacity:0;filter:alpha(opacity=0);}
	
</style>
<body>

<header class="header">
	<a href="javascript:history.back();"><i class="icon-arrow-back"></i></a>
	<h2>个人中心</h2>
	<a href="index.php"><i class="icon-home"></i></a>
</header>
<?php
	$con_mkn = db_connect();
	$sql_mkn="SELECT * FROM t_user where userid=".$_SESSION['userid'];
	$rs = mysqli_query($con_mkn,$sql_mkn);
	$rows=mysqli_fetch_assoc($rs);
?>
<ul class="list">
	<li class="list-item" onclick="ShowDiv('MyDiv','fade')">
    	<a href="javascript:void(0);">关联口岸<i><span class="user-item-info">满洲里</span><b class="icon-chevron-right"></b></i></a>
        <select name="port" id="port">
		<option value="">关联口岸</option>
		<option value="">1</option>
		<option value="">2</option>
		<option value="">3</option>
		<option value="">4</option>
	</select>
    </li>
</ul>

<!--弹出层时背景层DIV-->
<div class="layer">
	<div id="fade" class="black_overlay"></div>

	<div id="MyDiv" class="white_content">
		<div style="text-align: right; cursor: default; height: 40px;">
		<span style="font-size: 16px;" onclick="CloseDiv('MyDiv','fade')" class="close">关闭</span>
	</div>

	
</div>

 <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
 <script type="text/javascript">
	//弹出隐藏层
	function ShowDiv(show_div,bg_div){
		document.getElementById(show_div).style.display='block';
		document.getElementById(bg_div).style.display='block' ;
		var bgdiv = document.getElementById(bg_div);
		bgdiv.style.width = document.body.scrollWidth;
		// bgdiv.style.height = $(document).height();
		$("#"+bg_div).height($(document).height());
	};
		//关闭弹出层
	function CloseDiv(show_div,bg_div)
	{
		document.getElementById(show_div).style.display='none';
		document.getElementById(bg_div).style.display='none';
	};
$(function(){
	$("#fade").bind("click",function(evt){
		if($(evt.target).siblings("#port").length==0) 
		{ 
			$("#fade").hide(); 
			$("#MyDiv").hide();
		}
	});
})
	 

	
</script>
</body>
</html>