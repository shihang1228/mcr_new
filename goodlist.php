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
<link rel="stylesheet" type="text/css" href="/statics/css/yumleeM.css" />
<link rel="stylesheet" type="text/css" href="/statics/css/mcr.css" />
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
<body>
<nav class="navFixed flex">
	<a href="index.php"><i class="icon-home"></i><div>首页</div></a>
	<a href="goodlist.php"><i class="icon-now-widgets"></i><div>现货</div></a>
	<a href="release.php"><i class="icon-bullhorn"></i><div>发布</div></a>
	<a href="user.php"><i class="icon-head"></i><div>我</div></a>
</nav>
<header class="header">
	<div><a href="javascript:history.back();"><i class="icon-arrow-back"></i></a></div>
	<h1>现货</h1>
	<div><a href="index.php"><i class="icon-home"></i></a></div>
</header>
<section>
	<form>
		<ul class="flex selectWrapper">
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
			</li>
			<li>
				<select class="selectItem"  name ="kindselect" id="kindselect">
					<option value = '0'>货种</option>
					<option value = '1'>原木</option>
					<option value = '2'>条子</option>
					<option value = '3'>口料</option>
					<option value = '4'>大方</option>
					<option value = '5'>大板</option>
					<option value = '6'>防腐材</option>
				</select>
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
			</li>
			<li><input type="button"  class="button sousuo" onclick="start(1,1)" value="搜索"></li>
		</ul>
		<ul class="flex selectWrapper col3">
			<li>
				<input type="tel" placeholder="长度" id="productlen" name="producelen"/>
			</li>
			<li id="kindselect_1">
				<input type="tel" placeholder="宽度" id="productwide" name="productwide"/>
			</li>
			<li id="kindselect_2">
				<input type="tel" placeholder="厚度" id="thinckness" name="thinckness"/>
			</li>
			<li id="kindselect_3">
				<input type="tel" placeholder="径级" id="diameterlen" name="diameterlen"/>
			</li>
			<li id="kindselect_4">
				<select id="timber" name="timber">
					<option value='0'>材质</option>
					<option value="选材">选材</option>
					<option value="一级材">一级材</option>
					<option value="二级材">二级材</option>
					<option value="加工材">加工材</option>
				</select>
			</li>
		</ul>
	</form>
</section>
<dl class="panel">
	<dt>现货</dt>
	<dd>
		<a href="##">
			<ul class="flex table">
				<li>3213</li><li>0米</li><li>樟子松</li><li>原木</li><li>满洲里</li><li><i class="icon-chevron-right"></i></li>
			</ul>
		</a>
		<a href="##">
			<ul class="flex table">
				<li>3213</li><li>0米</li><li>樟子松</li><li>原木</li><li>满洲里</li><li><i class="icon-chevron-right"></i></li>
			</ul>
		</a>
		<a href="##">
			<ul class="flex table">
				<li>3213</li><li>0米</li><li>樟子松</li><li>原木</li><li>满洲里</li><li><i class="icon-chevron-right"></i></li>
			</ul>
		</a>
		<a href="##">
			<ul class="flex table">
				<li>3213</li><li>0米</li><li>樟子松</li><li>原木</li><li>满洲里</li><li><i class="icon-chevron-right"></i></li>
			</ul>
		</a>
	</dd>
</dl>
<!-- <div class="panel-body">
	<div name="showdata" id ="showdata1" style="margin:134px 0 0 14px;">
		<ul>
		</ul>
	</div>
</div> -->
</body>
<script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
<script src="/goodlist.js"></script>
</html>