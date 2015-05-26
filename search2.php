<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>智能找货</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" type="text/css" href="/statics/css/yumReset.css" />
<link rel="stylesheet" type="text/css" href="/statics/css/yumPage.css" />
<link rel="stylesheet" type="text/css" href="/com/icomoon/style.css" />
</head>
<body>
<header class="header">
	<a href="javascript:history.back();"><i class="icon-arrow-back"></i></a>
	<h2>智能找货</h2>
	<a href="index.php"><i class="icon-home"></i></a>
</header>
<?php
    include_once('mcr_sc_fns.php');
	$portnum=0;
    $port_array = get_port($portnum);
	$stuffnum=0;
	$stuff_array=get_stuff($stuffnum);
	//
	if  (isset($_POST['submit']))
    {
      $inputnumber=$_POST["numberInput"];
	  $portid=$_POST["areaselect"];
	  $kindid=$_POST["kindselect"];
	  $stuffid=$_POST["stuffselect"];
	  $productlen=$_POST["productlen"];
	  $wide=$_POST["wide"];
	  $thinckness=$_POST["thinckness"];
	  $diameterlen=$_POST["diameterlen"];
	  $timber=$_POST["timber"];
	  $data_array=get_datafromnum($inputnumber);
	  
?>
<div>
</div>    
 <?php
	} 
	else {
?>
<form class="push pushInput" action="" method="post">
	<dl class="panel-body">
		<dt>查找</dt>
		<dd>
			<ul class="">
				<li>区域:
					<select id = "areaselect" name="areaselect">
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
					<i class="icon-caret-down"></i>
				</li>
				<li class="select">货种:
					<select id="kindselect" name ="kindselect">
						<option value = 0>货种</option>
						<option value = 1>原木</option>
						<option value = 2>条子</option>
						<option value = 3>口料</option>
						<option value = 4>大方</option>
						<option value = 5>大板</option>
						<option value = 6>防腐材</option>
					</select>
					<i class="icon-caret-down"></i>
				</li>
				<li>材种:
					<select name ="stuffselect" id="stuffselect">
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
					<i class="icon-caret-down"></i>
				</li>
				<li>长度:<input type="text" name="productlen" id="productlen" /></li>
				<li id="kindselect_1">宽度:<input type="text" name="wide" id="wide" /></li>
				<li id="kindselect_2">厚度:<input type="text" name="thinckness" id="thinckness" /></li>
				<li id="kindselect_3">径级:<input type="text" name="diameterlen" id="diameterlen"/></li>
				<li id="kindselect_4">材质:
					<select class="selectItem" id="timber" name="timber">
						<option value="0">材质</option>
						<option value="选材">选材</option>
						<option value="一级材">一级材</option>
						<option value="二级材">二级材</option>
						<option value="加工材">加工材</option>
					</select>
					<i class="icon-caret-down"></i>
				</li>
				<li>发布时间:
					<select class="selectItem" name="publishtime" id="publishtime">
						<option value="0">选择时间</option>
						<option value="1">1天以内</option>
						<option value="3">3天以内</option>
						<option value="5">5天以内</option>
						<option value="7">7天以内</option>
						<option value="30">30天以内</option>
					</select>
					<i class="icon-caret-down"></i>
				</li>
			</ul>
		</dd>
	</dl>
	<input type="submit" name ="submit" value="查找" />
</form>
<?php
	}
?>

</body>
<script src="http://lib.sinaapp.com/js/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
var jkindselect = $("#kindselect");
	kindselect_1 = $("#kindselect_1");
	kindselect_2 = $("#kindselect_2");
	kindselect_3 = $("#kindselect_3");
	kindselect_4 = $("#kindselect_4");
jkindselect.change(function (){
	if (jkindselect.val() == 1){
		kindselect_1.hide();
		kindselect_2.hide();
		kindselect_3.show();
		kindselect_4.show();
	} else{
		kindselect_1.show();
		kindselect_2.show();
		kindselect_3.hide();
		kindselect_4.hide();
	}
})
</script>
</html>