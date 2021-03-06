<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<title>投诉信息</title>
<link rel="stylesheet" type="text/css" href="../statics/css/yumleeM.css" />
<link rel="stylesheet" type="text/css" href="../statics/css/mcr.css" />
<link rel="stylesheet" type="text/css" href="../com/icomoon/style.css" />
</head>
<?php
	include_once('../mcr_sc_fns.php');
	$cdkey=$_GET['cdkey'];
	$sql="select c.cdkey,right(rtrim(carnum),4) as carnum,(select stuffname from t_stuff where stuffid=p.stuffid) as stuffname,"
     ." case productlen when 0 then '' else concat(CONVERT(productlen,char(4)),'米') end as productlen,c.content,"
     ."(select kindname from t_kind where kindid=p.kindid) as kindname,c.updatetime,keyword, "
     ." u.username,contact "
    ." from t_complain c,t_product p,t_user u "
	 ." where u.userid =c.userid and c.cdkey=p.cdkey and c.cdkey='".$cdkey."'";

	
	$complain_array=get_mydata($sql);
	$complain=$complain_array[0];
	?>
<body>
<header class="header">
	<div><a href="javascript:history.back();"><i class="icon-arrow-back"></i></a></div>
	<h1>投诉信息</h1>
	<div><a href="index.php"><i class="icon-home"></i></a></div>
</header>


<ul class="list borBottom">
	<li class="flex">
		<div><span>车皮号:</span><var><?php echo $complain['carnum']; ?></var></div>
		<div><span>树种:</span><var><?php echo $complain['stuffname']; ?></var></div>
	</li>
	<li class="flex">
		<div><span>长度(m):</span><var><?php echo $complain['productlen']; ?></var></div>
		<div><span>货种:</span><var><?php echo $complain['kindname']; ?></var></div>
		
	</li>
	<li>
	    <div><span>时间:</span><var><?php echo $complain['updatetime']; ?></var></div>
	</li>
	<li>
	    <div><span>货主:</span><var><?php echo $complain['contact']; ?></var></div>
	</li>
	<li>
	    <div><span>投诉人:</span><var><?php echo $complain['username']; ?></var></div>
	</li>
	<li>
		<div><span>关键字:</span><var><?php echo $complain['keyword']; ?></var></div>
	</li>
	<li class="indent"><span>详细介绍:</span><p><?php echo $complain['content']; ?></p></li>
</ul>
</body>
</html>