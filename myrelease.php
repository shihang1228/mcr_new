<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<title>我的发布</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" type="text/css" href="css/sg.css">
<link rel="stylesheet" type="text/css" href="css/common.css">
<link rel="stylesheet" type="text/css" href="css/tz-dialog.css">

<link rel="stylesheet" type="text/css" href="statics/css/yumleeM.css" />
<link rel="stylesheet" type="text/css" href="statics/css/mcr.css" />
<link rel="stylesheet" type="text/css" href="com/icomoon/style.css" />
<link rel="stylesheet" href="css/manage.css" />
</head>
<body>
<header class="header fixed">
	<div><a href="javascript:history.back();"><i class="icon-arrow-back"></i></a></div>
	<h1>我的发布</h1>
	<div><a href="index.php"><i class="icon-home"></i></a></div>
</header>
<?php
   include_once('mcr_sc_fns.php');
   session_start();
   $userid=$_SESSION['userid'];
   $query="call mcr.p_myrelease(".$userid.");";  //2015.06.27 blb+
   $dump_array = get_mydata($query);  //2015.06.27 blb+
   ?>
<ul class="ul_list">
     <?php
		if (!is_array($dump_array)) {
			echo "<p>对不起，没有查找到您要查找的内容！</p>";
		   return;
		}

		foreach ($dump_array as $row)
		{
	?>		
	<li>

		<a href="detail.php?cdkey=<?php echo $row['cdkey'];?>" class="li_link">
			<h3><?php
				 $outstr="";
				 if ($row['kindname'] =='原木'){
					 
					 $outstr=$row['diameterlen']." ".$row['timber'];
				 }
				 else {
					 if(($row['wide']!=0) and ($row['thinckness']!=0) ){
						 $outstr=$row['thinckness']."*".$row['wide'];
					 }
				 }
				 echo $row['carnum']."  ".$row['stuffname']."  ".$row['productlen']."  ".$row['kindname']."  ".$outstr;?>
			</h3>
			<p>
				<span><?php echo $row['salestatusname'];?></span>
				<span class="span_mid">浏览<?php echo $row['viewnum'];?>次</span>
				<span><?php echo $row['updatetime1'];?></span>
			</p>
		</a>
	</li>

	<?php
		}
	?>
</ul>
</body>
<script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
<script src="statics/js/config.js"></script>
<script type="text/javascript" src="js/sgutil.js"></script>
<script type="text/javascript" src="js/tz_dialog.js"></script>


</html>