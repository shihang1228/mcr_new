<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>位置增加</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" type="text/css" href="../statics/css/yumleeM.css" />
<link rel="stylesheet" type="text/css" href="../statics/css/mcr.css" />
<link rel="stylesheet" type="text/css" href="../com/icomoon/style.css" />
</head>
<body class="bgWhite">
<header class="header">
	<div><a href="javascript:history.back();"><i class="icon-arrow-back"></i></a></div>
	<h1>位置增加</h1>
	<div><a href="../index.php"><i class="icon-home"></i></a></div>
</header>
<?php
    include_once('../mcr_sc_fns.php');
	$sql="select salestatusid,salestatusname from t_salestatus  order by salestatusid ";
	$salearray=get_mydata($sql);	
?>
<form  method="post" class="addForm" action="positionadd_bgo.php">
	<dl class="panel boxShadowNone" >
		<dt></dt>
		<dd>
			<ul class="list">
			    <input type="hidden" name="positionid" />
				<li class="flex op-2 col1-3">
					<div>位置:</div>
					<div><input type="text" name="position" id="position" class="position"/></div>
				</li>
				<li class="flex op-2 col1-3">
					<div>顺序值:</div>
					<div><input type="tel" name="order" id="order" class="order"/></div>
				</li>
				<li class="flex op-1 col1-3">
					<div>销售状态:</div><div>
					<select class="sale" id="sale" name="sale">
				<?php
	          
	            foreach ($salearray as $row)
	            {
	               $saleid = $row['salestatusid'];
	               $salename = $row['salestatusname'];
				   echo "<option value =".$saleid." >".$salename."</option>";
				}
			    ?>
					</select></div>
				</li>
				<li class="flex col1-3">
					<div>代码:</div>
					<div><input type="text" name="code" id="code" class="code"/></div>
				</li>
			</ul>
		</dd>
	</dl>
	<input class="btnFixed" type="submit" name ="submit" value="增加" />
</form>

</body>
<script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
<script src="../statics/js/config.js"></script>
</html>