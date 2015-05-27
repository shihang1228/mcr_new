<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>求购信息列表</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" type="text/css" href="/statics/css/yumReset.css" />
<link rel="stylesheet" type="text/css" href="/statics/css/yumPage.css" />
<link rel="stylesheet" type="text/css" href="/com/icomoon/style.css" />
</head>
<?php
    include_once('mcr_sc_fns.php');
	$buyid=$_GET['buyid'];
	$buy_array = get_buydetail($buyid);
?>
<body>
<header class="header">
	<a href="javascript:history.back();"><i class="icon-arrow-back"></i></a>
	<h2>求购详细信息</h2>
	<a href="index.php"><i class="icon-home"></i></a>
</header>
<?php
   if (!is_array($buy_array)) {
      $noconnect ="<p>对不起，没有查找到您要查找的内容！</p>";
      echo  $noconnect;
                           
    }
	else {
	$row =$buy_array[0];
?>	
<dl class="panel-body">
	<dt><h2>求购 <?php echo $row['portname']." ".$row['stuffname']." ".$row['productlen']."米 ".$row['kindname'] ;?></h2>
		<p class="info-time-view">发布时间:<?php echo $row['publishtime'];?> 浏览次数:<?php echo $row['viewnum'];?><button class="button button-success fr">分享到微信</button></p>
	</dt>
	<dd>
		<ul class="panel-col-2 clearfix">
		<?php
		  if ($row['kindname']=="原木") {
		?>
			<li>径级: <?php echo $row['diameterlen'];?></li>
			<li>选材: <?php echo $row['timber'];?></li>
		<?php
		  } else {
        ?>		
			<li>宽度: <?php echo $row['wide'];?></li>
			<li>厚度: <?php echo $row['thinckness'];?></li>
		<?php
		  }
        ?>		  
			<li>价格: <?php  if (($row['price']=="") ||($row['price']=="")) {echo "面议";} else { echo $row['price']; }  ;?></li>
			<li>参考根数: <?php echo $row['refnum'];?>根</li>
			<li>参考重量:<?php echo $row['refwight'];?>t</li>
			<li>参考载量:<?php echo $row['refcapacity'];?>m</li>
			<li class="panel-row-1 detailInfo">详细信息:<p><?php echo $row['content'];?></p></li>
		</ul>
	</dd>
</dl>
<div class="fixed">
	<ul>
		<li class="borker">
			<span class="borkerName"><?php echo $row['username']; ?></span>
			<p><?php echo $row['phone']; ?></p>
		</li>
		<li><a href="tel:<?php echo $row['phone']; ?>">
			<span class="icon-phone borkerTel"></span>
		</a></li>
	</ul>
</div>
<?php
	}
 ?>
</body>
</html>