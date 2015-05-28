<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>智能找货</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" type="text/css" href="/statics/css/yumleeM.css" />
<link rel="stylesheet" type="text/css" href="/statics/css/mcr.css" />
<link rel="stylesheet" type="text/css" href="/com/icomoon/style.css" />
<style type="text/css">
</style>
</head>
<body>
<header class="header">
	<div><a href="javascript:history.back();"><i class="icon-arrow-back"></i></a></div>
	<h1>智能找货</h1>
	<div><a href="index.php"><i class="icon-home"></i></a></div>
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
      //$inputnumber=$_POST["numberInput"];
	  $portid=$_POST["areaselect"];
	  $kindid=$_POST["kindselect"];
	  $stuffid=$_POST["stuffselect"];
	  $productlen=$_POST["productlen"];
	  $wide=$_POST["wide"];
	  $thinckness=$_POST["thinckness"];
	  $diameterlen=$_POST["diameterlen"];
	  $timber=$_POST["timber"];
	  $publishtime=$_POST["publishtime"];
	  $data_array=get_datafromadvance($portid,$kindid,$stuffid,$productlen,
       $wide,$thinckness,$diameterlen,$timber,$publishtime);
	  
?>
   <dl class="panel">
	<dt>智能找货</dt>
    <dd>
	 <?php
	     $outstr=" ";
	    if (!is_array($data_array)) {
          // echo "<p>对不起，没有查找到您要查找的内容！e</p>";
           return;
        }
		else {
		    foreach ($data_array as $row)
            {
			   $carnum = $row['carnum'];
			   $productlen = $row['productlen'];
			   $kindname=$row['kindname'];
			   $wide=$row['wide'];
			   $thinckness=$row['thinckness'];
			   $portname=$row['portname'];
		       $timber=$row['timber'];
			   $diameterlen=$row['diameterlen'];
			   $productid=$row['productid'];
			   $updatetime=$row['updatetime'];
			   $stuffname=$row['stuffname'];
			   
			   $outstr="";
			   if($kindname =="原木"){
			     if ($diameterlen ==0){
				   $outstr=" ".$kindname;
				 }
				 else {
				    $outstr=" ".$diameterlen."φ ".$timber;
				 }
			   }
			   else {
			       if($wide ==0 or $thinckness ==0) {
				     $outstr=" ".$kindname;
				   }
				   else {
				      $outstr=" ".$wide."*".$thinckness;
				   }
			   }
			 

	 ?>

		<a href="detail.php?productid=<?php echo  $productid;?>">
			<ul class="flex table">
				<li><?php echo  $carnum;?></li><li><?php echo $productlen;?>米</li><li><?php echo $stuffname;?></li><li><?php echo $outstr;?></li><li><?php echo $portname; ?></li><li><?php echo $updatetime;?></li><li><i class="icon-chevron-right"></i></li>
			</ul>
		</a>
    <?php
	     }
      }
    ?>
	 </dd>
    </dl>
 <?php
	} 
	else {
?>
<form action="" method="post">
	<dl class="panel">
		<dt>查找</dt>
		<dd>
			<ul class="form-vertical">
				<li class="flex">
					<div>区域:</div><div>
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
					</select></div><div></div>
				</li>
				<li class="flex">
					<div>货种:</div><div>
					<select id="kindselect" name ="kindselect">
						<option value = 0>货种</option>
						<option value = 1>原木</option>
						<option value = 2>条子</option>
						<option value = 3>口料</option>
						<option value = 4>大方</option>
						<option value = 5>大板</option>
						<option value = 6>防腐材</option>
					</select></div><div></div>
				</li>
				<li class="flex">
					<div>材种:</div><div>
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
					</select></div><div></div>
				</li>
				<li class="flex">
					<div>长度:</div>
					<div><input type="text" name="productlen" id="productlen" /></div><div></div>
				</li>
				<li class="flex" id="kindselect_1">
					<div>宽度:</div>
					<div><input type="text" name="wide" id="wide" /></div><div></div>
				</li>
				<li class="flex" id="kindselect_2">
					<div>厚度:</div>
					<div><input type="text" name="thinckness" id="thinckness" /></div><div></div>
				</li>
				<li class="flex" id="kindselect_3">
					<div>径级:</div>
					<div><input type="text" name="diameterlen" id="diameterlen"/></div><div></div>
				</li>
				<li class="flex" id="kindselect_4">
					<div>材质:</div><div>
					<select class="selectItem" id="timber" name="timber">
						<option value=0>材质</option>
						<option value="选材">选材</option>
						<option value="一级材">一级材</option>
						<option value="二级材">二级材</option>
						<option value="加工材">加工材</option>
					</select></div><div></div>
				</li>
				<li class="flex">
					<div>发布时间:</div><div>
					<select class="selectItem" name="publishtime" id="publishtime">
						<option value="0">选择时间</option>
						<option value="1">1天以内</option>
						<option value="3">3天以内</option>
						<option value="5">5天以内</option>
						<option value="7">7天以内</option>
						<option value="30">30天以内</option>
					</select></div><div></div>
				</li>
			</ul>
		</dd>
	</dl>
	<input class="btnFixed" type="submit" name ="submit" value="查找" />
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