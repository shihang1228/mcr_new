<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<title>积分设置</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" type="text/css" href="../css/sg.css">
<link rel="stylesheet" type="text/css" href="../css/common.css">
<link rel="stylesheet" type="text/css" href="../css/tz-dialog.css">

<link rel="stylesheet" type="text/css" href="../statics/css/yumleeM.css" />
<link rel="stylesheet" type="text/css" href="../statics/css/mcr.css" />
<link rel="stylesheet" type="text/css" href="../com/icomoon/style.css" />
<link rel="stylesheet" type="text/css" href="../css/manage.css" />
</head>
<body>
<header class="header fixed">
	<div><a href="../administration.php"><i class="icon-arrow-back"></i></a></div>
	<h1>积分设置</h1>
	<div><a href="../index.php"><i class="icon-home"></i></a></div>
</header>
<?php
    include_once('../mcr_sc_fns.php');
    session_start();
	$sqlstr = "select fieldid,introduce,score from t_field order by fieldid ";
	$scorearray = get_mydata($sqlstr);
	
?>
<ul class="ul_list">
    <?php
	    if(!is_array($scorearray))
	{
		echo "<p>对不起，没有查找到您要查找的内容！</p>";
		return;
	}
	else
	{
			foreach ($scorearray as $row)
		   {
			   ?>
			    	
	<li>
		<b class="select_btn"><img src="../images/img_2.png" alt="" width="40" height="40"/></b>
			<h3 class="position">
				<span class="score"><?php echo $row['introduce'];?></span>
				<span class="score"><?php echo $row['score'];?></span>
			</h3>
		</a>
		<div class="tip">
			<div class="triangle"></div>
			<div class="t_con">
				<a href="scoreupdate.php?fieldid=<?php echo $row['fieldid'];?>" class="update" class="update"><i class="icon-pencil"></i><br /><span>修改</span></a>
			</div>
		</div>
	</li>
	<?php
		   }
	}
	?>
</ul>
</body>
<script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
<script src="../statics/js/config.js"></script>
<script type="text/javascript" src="../js/sgutil.js"></script>
<script type="text/javascript" src="../js/tz_dialog.js"></script>
<script>
	$(function(){
		kindselect();
		tipToggle();
	})
</script>

</html>