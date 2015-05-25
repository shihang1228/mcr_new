<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>销售信息</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" type="text/css" href="/statics/css/yumReset.css" />
<link rel="stylesheet" type="text/css" href="/statics/css/yumPage.css" />
<link rel="stylesheet" type="text/css" href="/com/icomoon/style.css" />
</head>
<?php
    session_start();
    include_once('mcr_sc_fns.php');
	$portnum=0;
    $port_array = get_port($portnum);
	$stuffnum=0;
	$stuff_array=get_stuff($stuffnum);
?>
<body onload ="start(1,1)">
<header class="header">
	<a href="javascript:history.back();"><i class="icon-arrow-back"></i></a>
	<h2>销售信息</h2>
	<a href="index.php"><i class="icon-home"></i></a>
</header>
<section>
	<form class="searchBox">
		<div class="searchBox-wrap"><input type="tel" placeholder="车皮号/手机号" id="carnum" name="carnum"/></div>
		<div class="searchBox-label" id="carnumselect" name="carnumselect"  onclick ="start(2,1)">搜索</div>
		<a href="salePush.php" class="icon-bullhorn"> 发布</a>
	</form>
	<ul class="selectBanner clearfix w-1-3">
		<li>
			<select name ="areaselect" id="areaselect" onchange="start(1,1)" >
				<option value = 0>区域</option>
				<?php
						for($i=0;$i<$portnum;$i++) {
							$row =$port_array->fetch_assoc();
							 $portid = $row['portid'];
	                        $portname = $row['portName'];
	                         // echo "<li><a href=''>".$portname."</a></li>";
	                          echo "<option value =".$portid.">".$portname."</option>";
						}

	                    ?>
			</select>
			<i class="icon-caret-down"></i>
		</li>
		<li>
			<select name ="kindselect" id="kindselect"  onchange="start(1,1)">
				<option value = 0>货种</option>
				<option value = 1>原木</option>
				<option value = 2>条子</option>
				<option value = 3>口料</option>
				<option value = 4>大方</option>
				<option value = 5>大板</option>
				<option value = 6>防腐材</option>
			</select>
			<i class="icon-caret-down"></i>
		</li>
		<li>
			<select name ="stuffselect" id="stuffselect"  onchange="start(1,1)">
				<option value = 0>材种</option>
				 <?php
	                   for($i=0;$i<$stuffnum;$i++) {
							$row =$stuff_array->fetch_assoc();
							 $stuffid = $row['stuffid'];
	                        $stuffname = $row['stuffname'];
	                         // echo "<li><a href=''>".$portname."</a></li>";
	                          echo "<option value =".$stuffid.">".$stuffname."</option>";
						}
	                    ?>
			</select>
			<i class="icon-caret-down"></i>
		</li>
	</ul>
</section>
<dl class="panel-body">
<div name="showdata" id ="showdata" >

</div>
<!--
	<dt>标题:<span class="noticeBuy">购</span></dt>
	<dd><a href="saleInfo.html">
		<ul class="panel-col-3 clearfix">
			<li>货种:</li>
			<li>材种:</li>
			<li>价格:</li>
			<li class="panel-row-2">车皮号:</li>
			<li class="panel-row-2">目标口岸:</li>
			<li class="panel-row-2">手机号:</li>
			<li class="panel-row-2">时间:</li>
		</ul>
	</a></dd>
	-->
</dl>

</body>
<script type="text/javascript">
//调用ajax实现局部刷新
var xmlHttp;
function createXMLHttpRequest(){
 if(window.XMLHttpRequest){
  xmlHttp = new XMLHttpRequest();
 }
 else if(window.ActiveXObject){//IE 浏览器
 try{
  xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
 }catch(e) {
	 try {
		 xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
	 }catch (e) {}
 }
 
 }
}
function start(type,page){
 createXMLHttpRequest();
 var url=""
 //type = 1;
   if (type ==1){
	jareaselect =document.getElementById("areaselect").value;
    jkindselect =document.getElementById("kindselect").value;
    jstuffselect = document.getElementById("stuffselect").value;
	 url="getsalelist.php?"+"type=1&areaselect="+jareaselect+"&kindselect="+jkindselect+"&stuffselect="+jstuffselect+"&page="+page;
	}
   else {
	    jcarnumvalue =document.getElementById("carnum").value;
	  url="getsalelist.php?"+"type=2&carnum="+jcarnumvalue+"&page="+page;   
   }
	

 xmlHttp.open("GET",url,true);
 xmlHttp.onreadystatechange = callback;
 xmlHttp.send(null);
}
function callback(){
 if(xmlHttp.readyState == 4){
  if(xmlHttp.status == 200){
   document.getElementById("showdata").innerHTML = xmlHttp.responseText;
 //  setTimeout("start()",1000);
  }
 }
}
</script>
</html>