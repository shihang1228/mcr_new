<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>原木待售</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" type="text/css" href="/statics/css/yumleeM.css" />
<link rel="stylesheet" type="text/css" href="/statics/css/mcr.css" />
<link rel="stylesheet" type="text/css" href="/com/icomoon/style.css" />
</head>
<?php
    include_once('mcr_sc_fns.php');
	$stuff_array=get_stuffarray();	
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
	<h1>原木待售</h1>
	<div><a href="index.php"><i class="icon-home"></i></a></div>
</header>
<section>
	<form action="" method="get">
		<ul class="flex selectWrapper col4">
			<li>
				<select name = "areaselect" id="stuffselect">
				<option value="0">材种</option>
						<?php
                        foreach ($stuff_array as $row)
                        {
                           $stuffid = $row['stuffid'];
                           $stuffname = $row['stuffname'];
                          echo "<option value =".$stuffid.">".$stuffname."</option>";
						}
					    ?>
				</select>
			</li>
			<li>
				<select name = "areaselect" id="productlen">
					<option value="0">长度</option>
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
				</select>
			</li>
			<li>
				<select name = "areaselect" id="timber">
					<option value="0">材质</option>
					<option value="选材">选材</option>
					<option value="一级材">一级材</option>
					<option value="二级材">二级材</option>
					<option value="加工材">加工材</option>
				</select>
			</li>
			<li><input type="button" class="button" value="查询" onclick="start(1,1);"></li>
		</ul>
	</form>
</section>
<dl class="panel">
	<dt>待售</dt>
	<dd id="goodslist">
		
	</dd>
</dl>
<!-- <table class="goodslist" id="goodslist">
	<tr><th>5678</th><th>樟子松</th><th>4米</th><th>厚度*宽度</th><th>港口</th><th>2015-5-25 15:55</th></tr>
	<tr><th>5678</th><th>樟子松</th><th>4米</th><th>板材</th><th>满洲里</th><th>2015-5-25 15:55</th></tr>
	<tr><th>5678</th><th>樟子松</th><th>4米</th><th>厚度*宽度</th><th>港口</th><th>2015-5-25 15:55</th></tr>
</table> -->
</body>
<script type="text/javascript" src="http://libs.useso.com/js/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript" src="./logsell.js"></script>
</html>