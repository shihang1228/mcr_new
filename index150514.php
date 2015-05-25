<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<title>木材人</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" type="text/css" href="/statics/css/yumReset.css" />
<link rel="stylesheet" type="text/css" href="/com/select/css/style.css" />
<link rel="stylesheet" type="text/css" href="/statics/css/yumPage.css" />
<link rel="stylesheet" type="text/css" href="/com/icomoon/style.css" />
<script type="text/javascript" src="/com/select/js/modernizr.custom.79639.js"></script>
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
	<h1><a href="index.php">木材人</a></h1>
	<ul class="nav">
		<li><a href="">现货</a></li>
		<li><a href="announce.html">公告</a></li>
		<li><a href="user.html">我</a></li>
	</ul>
</header> 
<section>
	<form class="searchBox" name ="select" id="select1" method ="post" >
		<div class="searchBox-wrap"><input type="text" name="carnum" id="carnum" placeholder="车皮号/手机号" /></div>
		<div class="searchBox-label" id="carnumselect" name="carnumselect" onclick ="start(2,1)">搜索</div>
		<a href="release.html" class="icon-bullhorn"> 发布</a>
	</form>
	<form  name="filter" method="post"  class="selectBanner clearfix">
		<select name ="areaselect" id="areaselect" class="selectItem" onchange="start(1,1)">
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
		<select name ="kindselect" id="kindselect" class="selectItem" onchange="start(1,1)">
			<option value = 0>货种</option>
			<option value = 1>原木</option>
			<option value = 2>条子</option>
			<option value = 3>口料</option>
			<option value = 4>大方</option>
			<option value = 5>大板</option>
			<option value = 6>防腐材</option>
			
		</select>
		<select name ="stuffselect" id="stuffselect" class="selectItem" onchange="start(1,1)">
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
		<input type="button" value="筛选" name="submit" id="button" onclick="start(1,1)"/>
	</form>
	
	
</section>
<div name="showdata" id ="showdata" >

</div>
</body>
<!-- -->
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
	 url="getdatalist.php?"+"type=1&areaselect="+jareaselect+"&kindselect="+jkindselect+"&stuffselect="+jstuffselect+"&page="+page;
	}
   else {
	    jcarnumvalue =document.getElementById("carnum").value;
	  url="getdatalist.php?"+"type=2&carnum="+jcarnumvalue+"&page="+page;   
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

<script type="text/javascript" src="http://libs.useso.com/js/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript">
	
	function DropDown(el) {
		this.dd = el;
		this.placeholder = this.dd.children('span');
		this.opts = this.dd.find('ul.dropdown > li');
		this.val = '';
		this.index = -1;
		this.initEvents();
	}
	DropDown.prototype = {
		initEvents : function() {
			var obj = this;

			obj.dd.on('click', function(event){
				$(this).toggleClass('active');
				return false;
			});

			obj.opts.on('click',function(){
				var opt = $(this);
				obj.val = opt.text();
				obj.index = opt.index();
				obj.placeholder.text(obj.val);
			});
		},
		getValue : function() {
			return this.val;
		},
		getIndex : function() {
			return this.index;
		}
	}

	$(function() {

		var aa = new DropDown( $('#aa') );
		var bb = new DropDown( $('#bb') );
		var cc = new DropDown( $('#cc') );

		$(document).click(function() {
			// all dropdowns
			$('.wrapper-dropdown-3').removeClass('active');
		});

	});

</script>
</html>