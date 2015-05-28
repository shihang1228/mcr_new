<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>板材待售</title>
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
	<h1>板材待售</h1>
	<div><a href="index.php"><i class="icon-home"></i></a></div>
</header>
<section>
	<form action="" method="get">
		<ul class="flex selectWrapper col4">
			<li>
				<select name = "stuffselect" id="stuffselect">
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
			<li><input type="tel" placeholder="宽度" id="productwide" /></li>
			<li><input type="tel" placeholder="厚度" id="thinckness" /></li>
			<li><button type="button" onclick="start(1,1);">查询</button></li>
		</ul>
	</form>
</section>
<dl class="panel">
	<dt>待售</dt>
	<dd id="goodslist">
	</dd>
</dl>
</body>
<script type="text/javascript" src="http://libs.useso.com/js/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript" src="./boardlist.js"></script>
</html>