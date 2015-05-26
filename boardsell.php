<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>板材待售</title>
<meta name="description" content="">
<meta name="keywords" content="">

<link rel="stylesheet" type="text/css" href="/statics/css/yumReset.css" />
<link rel="stylesheet" type="text/css" href="/statics/css/yumPage.css" />
<link rel="stylesheet" type="text/css" href="/com/icomoon/style.css" />

<script type="text/javascript" src="http://libs.useso.com/js/jquery/1.8.2/jquery.min.js"></script>
<script type="text/javascript" src="./boardlist.js"></script>

</head>
<?php
    include_once('mcr_sc_fns.php');
	$stuff_array=get_stuffarray();	
	?>
<body>
<nav class="navFix">
	<ul>
		<li><a href="index.php"><i class="icon-home"></i>首页</a></li>
		<li><a href="goodlist.php"><i class="icon-now-widgets"></i>现货</a></li>
		<li><a href="release.php"><i class="icon-bullhorn"></i>发布</a></li>
		<li><a href="user.php"><i class="icon-head"></i>我</a></li>
	</ul>
</nav>
<header class="header">
	<a href="javascript:history.back();"><i class="icon-arrow-back"></i></a>
	<h2>板材待售</h2>
	<a href="index.php"><i class="icon-home"></i></a>
</header>
<section>
	<form action="" method="get">
		<ul class="selectBanner col4 clearfix">
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
				<i class="icon-caret-down"></i>
			</li>
			<li><input type="tel" placeholder="宽度" id="productwide"></li>
			<li><input type="tel" placeholder="厚度" id="thinckness"></li>
			<li><button class="button" type="button" onclick="start(1,1);">查询</button></li>
		</ul>
	</form>
</section>
<table class="goodslist" id="goodslist">
</table>

</body>
</html>