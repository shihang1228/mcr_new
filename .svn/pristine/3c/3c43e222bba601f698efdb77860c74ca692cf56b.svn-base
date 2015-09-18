<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>到货列表</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" type="text/css" href="../statics/css/yumleeM.css" />
<link rel="stylesheet" type="text/css" href="../statics/css/mcr.css" />
<link rel="stylesheet" type="text/css" href="../com/icomoon/style.css" />
</head>
<?php
    session_start();
    include_once('../mcr_sc_fns.php');



    if(isset($_SESSION['portid'])){
			$portid=$_SESSION['portid'];
	}
	else {
	   $portid=1;	
	}
	
	$new_array = getdata("call p_imphistory()");
	?>
<body>
<header class="header">
	<div class="header_home"><a href="javascript:history.back();"><i class="icon-arrow-back"></i></a></div>
	<h1>导入记录</h1>
	<div class="header_home"><a href="../index.php"><i class="icon-home"></i></a></div>
</header>


<!--  -->
  <div class="goods">
	<dl class="panel">
	      <?php
			    if (!is_array($new_array)) {
					echo "<p>对不起，没有查找到您要查找的内容！</p>";
				   return;
				}

				foreach ($new_array as $row)
				{
					$impdate = $row['imp_date'];
			        $carnums = $row['carnums'];
			        $carnum_err = $row['carnum_err'];
			        $username = $row['username'];
				
				?>
				
		<dd id="goodslist1">
		  <?php
			{
				
		  ?>
			<ul class='flex table train_table6'>
				<li><?php echo $impdate  ?></li><li><?php echo $username  ?></li><li><?php echo $carnums  ?></li>
				<li><?php echo $carnum_err  ?>&nbsp;&nbsp;</li>
			</ul>
		   <?php
			}
            ?>
		</dd>
		<?php
		  }
		?>
	</dl>
</div>
<!--  -->
</body>
<script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
</html>