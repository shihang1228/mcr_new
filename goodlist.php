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
<link rel="stylesheet" type="text/css" href="./statics/css/yumReset.css" />
<link rel="stylesheet" type="text/css" href="./com/select/css/style.css" />
<link rel="stylesheet" type="text/css" href="./statics/css/yumPage.css" />
<link rel="stylesheet" type="text/css" href="./com/icomoon/style.css" />
<script type="text/javascript" src="http://libs.useso.com/js/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript" src="./waterfall.js"></script>
<script type="text/javascript" src="./com/select/js/modernizr.custom.79639.js"></script>
</head>
<?php
    session_start();
    include_once('mcr_sc_fns.php');
	$portnum=0;
    $port_array = get_port($portnum);
	$stuffnum=0;
	$stuff_array=get_stuff($stuffnum);
?>
<body>
<nav class="navFix">
	<ul>
		<li><a href="index.html"><i class="icon-home"></i>首页</a></li>
		<li><a href="index.html"><i class="icon-home"></i>现货</a></li>
		<li><a href="index.html"><i class="icon-home"></i>发布</a></li>
		<li><a href="index.html"><i class="icon-home"></i>我</a></li>
	</ul>
</nav>
<div class="fixedTop">
<header class="header">
	<a href="javascript:history.back();"><i class="icon-arrow-back"></i></a>
	<h2>现货</h2>
	<a href="index.php"><i class="icon-home"></i></a>
</header>
<section>
	<!-- <form class="searchBox" name ="select" id="select1" method ="post" >
		<div class="searchBox-wrap"><input type="tel" placeholder="车皮号/手机号" id="carnum" name="carnum" /></div>
		<div class="searchBox-label" id="carnumselect" name="carnumselect"  onclick ="start(2,1)">搜索</div>
		<a href="release.php" class="icon-bullhorn"> 发布</a>
	</form> -->
	<form class="flex">
		<ul class="selectBanner clearfix w80">
			<li>
				<select name = "areaselect" id = "areaselect">
					<option value=0>区域</option>
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
				<select class="selectItem"  name ="kindselect" id="kindselect">
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
				<select class="selectItem" name ="stuffselect" id="stuffselect" >
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
			<li>
				<input class="selectItem" type="tel" placeholder="长度" id="productlen" name="producelen"/>
			</li>
			<li id="kindselect_1">
				<input class="selectItem" type="tel" placeholder="宽度" id="productwide" name="productwide"/>
			</li>
			<li id="kindselect_2">
				<input class="selectItem" type="tel" placeholder="厚度" id="thinckness" name="thinckness"/>
			</li>
			<li id="kindselect_3">
				<input class="selectItem" type="tel" placeholder="径级" id="diameterlen" name="diameterlen"/>
			</li>
			<li id="kindselect_4">
				<select class="selectItem" id="timber" name="timber">
					<option value=0>材质</option>
					<option value="选材">选材</option>
					<option value="一级材">一级材</option>
					<option value="二级材">二级材</option>
					<option value="加工材">加工材</option>
				</select>
				<i class="icon-caret-down"></i>
			</li>
		</ul>
		<input type="button"  class="button sousuo" onclick="start(1,1)" value="搜索">
	</form>
</section>
</div>
<div class="panel-body">
	<div name="showdata" id ="showdata1" style="margin:134px 0 0 14px;">
		<ul>
		</ul>
	</div>
</div>




<script type="text/javascript">
//调用ajax实现局部刷新
/* var xmlHttp;
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
} */
	
function start(type,page){	
	var url=""
	var jkindselect =document.getElementById("kindselect").value;
	var productlen=0 ,productwide=0,thinckness=0,diameterlen=0;
	var timber="";
	var kindselect_1 = $("#kindselect_1"),
		kindselect_2 = $("#kindselect_2"),
		kindselect_3 = $("#kindselect_3"),
		kindselect_4 = $("#kindselect_4");
	if (jkindselect == 1){
		kindselect_1.hide();
		kindselect_2.hide();
		kindselect_3.show();
		kindselect_4.show();
	} else{
		kindselect_1.show();
		kindselect_2.show();
		kindselect_3.hide();
		kindselect_4.hide();
	}

	var $num = 0;
	var $pagecount=0;
	var jareaselect=0,jstuffselect=0,productlen=0,productwide=0,thinckness=0,diameterlen=0,timber=0,jkindselect=0;

	jareaselect =document.getElementById("areaselect").value;
	jstuffselect = document.getElementById("stuffselect").value;
	jkindselect =document.getElementById("kindselect").value;
	timber=document.getElementById("timber").value;

	if(document.getElementById("productlen").value.length == 0){
		productlen=0;
	}else{
		productlen=document.getElementById("productlen").value;
	}
		
	if(document.getElementById("productwide").value.length == 0){
		productwide=0;
	}else{
		productwide=document.getElementById("productwide").value;
	}
		
	if(document.getElementById("thinckness").value.length == 0){
		thinckness=0;
	}else{
		thinckness=document.getElementById("thinckness").value;
	}	

	if(document.getElementById("diameterlen").value.length == 0){
		diameterlen=0;
	}else{
		diameterlen=document.getElementById("diameterlen").value;
	}

	if($pagecount >= $num){

		 $.ajax({
			 url:'getdatalist.php',
			 type:'POST',
			 data:"num="+($num++)+"&areaselect="+jareaselect+"&kindselect="+jkindselect+"&stuffselect="+jstuffselect
		  +"&productlen="+productlen+"&productwide="+productwide+"&thinckness="+thinckness+"&diameterlen="+diameterlen
		  +"&timber="+timber,
			/*"num="+$num+"&type=1&areaselect="+jareaselect+"&kindselect="+jkindselect+"&stuffselect="+jstuffselect
		  +"&productlen="+productlen+"&productwide="+productwide+"&thinckness="+thinckness+"&diameterlen="+diameterlen
		  +"&timber="+timber*/

			 dataType:'json',
			 success:function(json){
				 if(typeof json == 'object'){

					 var neirou,$row,iheight,$item;
					 $row =$("#showdata1 ul").empty();
					 if(json.length == 0){
						 
						$("#showdata1 ul").empty().append("<p class='no_result'>没有查询到您所要的内容</p>");
					 }else{
						 
						$pagecount = json[0].pagecount;
						for(var i=1;i<json.length;i++){
							neirou = json[i];    //当前层数据

							 if(neirou.kindname == "原木"){
								if(neirou.diameterlen == 0) {
									$bianhua = neirou.kindname;
								}else{
									$bianhua = neirou.diameterlen + "φ " + neirou.timber;
								}
							}else{
								
								if(neirou.wide == 0 || neirou.thinckness == 0 ){
									
									$bianhua = neirou.kindname;
								}else{	
									$bianhua = neirou.wide + "*" + neirou.thinckness;
								}
							}
							 $item = $(
								"<li class='list-item'>"+
									"<a href='detail.php?productid="+neirou.productid+"' class='clearfix'>"+
										"<div class='list-left'><span>"+neirou.carnum+"  "+neirou.productlen+"米"+neirou.stuffname+"   "+$bianhua+"   "+neirou.portname+"   "+neirou.updatetime+"</span></div>"+
										"<div class='list-right'><i class='icon-chevron-right'></i></div>"+
									"</a>"+
								"</li>"						 
							 );	
							 $(".no_result").empty();
							 $row.append($item);
							 $item.fadeIn();
						}
					 }
				}
			 }
		 });
	}
}

</script>



</body>

</html>