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
<script type="text/javascript" src="./goodlist.js"></script>
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

</body>

</html>