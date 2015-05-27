<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>求购信息列表</title>
<meta name="description" content="">
<meta name="keywords" content="">
<!-- <link rel="stylesheet" type="text/css" href="/statics/css/yumReset.css" /> -->
<!-- <link rel="stylesheet" type="text/css" href="/statics/css/yumPage.css" /> -->
<link rel="stylesheet" type="text/css" href="/statics/css/yumleeM.css" />
<link rel="stylesheet" type="text/css" href="/com/icomoon/style.css" />
</head>
<?php
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
	<h1>求购信息</h1>
	<div><a href="index.php"><i class="icon-home"></i></a></div>
</header>
<section>
	<form action="" method="get">
		<ul class="flex selectWrapper">
			<li>
				<select name = "areaselect" id = "areaselect" onchange="start(1,1)">
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
				<select class="selectItem"  name ="kindselect" id="kindselect" onchange="start(1,1)">
					<option value = 0>货种</option>
					<option value = 1>原木</option>
					<option value = 2>条子</option>
					<option value = 3>口料</option>
					<option value = 4>大方</option>
					<option value = 5>大板</option>
					<option value = 6>防腐材</option>
				</select>
			</li>
			<li>
				<select class="selectItem" name ="stuffselect" id="stuffselect" onchange="start(1,1)">
					<option value = 0>材种</option>
					 <?php
		                   for($i=0;$i<$stuffnum;$i++) {
								$row =$stuff_array->fetch_assoc();
								$stuffid = $row['stuffid'];
		                        $stuffname = $row['stuffname'];
		                        echo "<option value =".$stuffid.">".$stuffname."</option>";
							}
		                    ?>
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
				<li>满洲里</li><li>樟子松</li><li>4米</li><li>条子</li><li>面议</li><li>15-5-25 9:30</li><li><i class="icon-chevron-right"></i></li>
			</ul>
		</a>
		<a href="##">
			<ul class="flex table">
				<li>满洲里</li><li>樟子松</li><li>4米</li><li>条子</li><li>1000元</li><li>15-5-25 9:30</li><li><i class="icon-chevron-right"></i></li>
			</ul>
		</a>
		<a href="##">
			<ul class="flex table">
				<li>满洲里</li><li>樟子松</li><li>4米</li><li>条子</li><li>50000元</li><li>15-5-25 9:30</li><li><i class="icon-chevron-right"></i></li>
			</ul>
		</a>
		<a href="##">
			<ul class="flex table">
				<li>满洲里</li><li>樟子松</li><li>4米</li><li>条子</li><li>面议</li><li>15-5-25 9:30</li><li><i class="icon-chevron-right"></i></li>
			</ul>
		</a>
	</dd>
</dl>
</body>
</html>