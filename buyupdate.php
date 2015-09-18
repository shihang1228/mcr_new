<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type"content="text/html; charset=utf-8">   
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<title>求购信息发布</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" type="text/css" href="/statics/css/yumleeM.css" />
<link rel="stylesheet" type="text/css" href="/com/icomoon/style.css" />
<link rel="stylesheet" type="text/css" href="css/valid.css" />
<style type="text/css">
	textarea{outline:0;}
	.list2 li{height:37px;line-height:37px;margin:6px 0;}
	.list2 li .selection{height:37px;outline:0;}		
</style>
</head>
<?php
	session_start();
    include_once('mcr_sc_fns.php');
	$buyid=$_GET['buyid'];
	$buy_array = get_buydetail($buyid);
	//
	$stuffnum = 0;
	$stuff_array = get_stuff($stuffnum);
	//
	$kindarray = array('原木','条子','口料','大方','大板','防腐材');
	$productlen= array('3','4','6','12','1','2','5','7','8','9','10','11');
	$timber=array('选材','一级材','二级材','加工材');
?>

<header class="header">
	<div><a href="javascript:history.back();"><i class="icon-arrow-back"></i></a></div>
	<h1>求购信息修改</h1>
	<div><a href="index.php"><i class="icon-home"></i></a></div>
</header>
<?php
   if (!is_array($buy_array)) {
      $noconnect ="<p>对不起，没有查找到您要查找的内容！</p>";
      echo  $noconnect;
                           
    }
	else {
	$row =$buy_array[0];
?>
<form class="releaseForm" method ="post" action ="buyupdate_bgo.php">
	<ul class="list list2">
	 	<input type="hidden" name="buyid" value=<?php echo $buyid;?> >
		<li class="flex col1-3">
			<div>材种:</div>
			<div>
				<select name="stuffid" id="stuffid" class="selection">
					<?php
						for($i=0;$i<$stuffnum;$i++) {
							$row1 =$stuff_array->fetch_assoc();
							 $stuffid = $row1['stuffid'];
							 $stuffname = $row1['stuffname'];
							 if ($row['stuffname']==$stuffname) {
								 echo "<option  selected = 'selected' value =".$stuffid.">".$stuffname."</option>"; 
							 }
							else {
								 echo "<option  value =".$stuffid.">".$stuffname."</option>"; 
							}
						}
	                ?>
				</select>
			</div>
		</li>
		<li class="flex col1-3">
			<div>货种:</div>
			<div>
				<select name="kindid" id="kindid" class="selection">
                    <?php 
					
				      for($j=0;$j<count($kindarray);$j++) {
						 if ($row['kindname'] == $kindarray[$j])  {
								  echo "<option  selected = 'selected' value =".($j+1).">".$kindarray[$j]."</option>"; 
							  }
							 else {
								 echo "<option value =".($j+1).">".$kindarray[$j]."</option>"; 
							}
					}
				   ?>
				</select>
			</div>
		</li>
		<li class="flex col1-3">
			<div>长度(m):</div>
			<div>
				<select name="productlen" id="productlen" class="selection">
					 <?php 
					
				      for($j=0;$j<count($productlen);$j++) {
						 if ($row['kindname'] == $productlen[$j])  {
								  echo "<option  selected = 'selected'"." value =".($productlen[$j]).">".$productlen[$j]."米</option>"; 
							  }
							 else {
								 echo "<option value =".($productlen[$j]).">".$productlen[$j]."米</option>"; 
							}
					}
				   ?>
				</select>
			</div>
		</li>
		<li class="flex col1-3">
			<div>总货量(m³):</div>
			<div><input class="selection" type="tel" name="refcapacity" placeholder="50~120m" id="refcapacity" datatype="va_5" ignore="ignore" errormsg="参考载量范围必须在50～120m之间" value="<?php echo $row['refcapacity']==0?'':$row['refcapacity']; ?>" /></div>

		</li>
		<li class="flex col1-3 beym hide">
			<div>径级(cm):</div>
			<div><input class="selection" type="text" placeholder="10~80" datatype="va_1" ignore="ignore" errormsg="径级范围必须在10~80之间" name="diameterlen" id="diameterlen" value="<?php echo $row['diameterlen']==0?'':$row['diameterlen'];?> "/></div>
		</li>
		<li class="flex col1-3 beym hide">
			<div>材质:</div>
			<div>
				<select name="timber" id="timber" class="selection">
					 <?php 
					
				      for($j=0;$j<count($timber);$j++) {
						echo "<option ".($row['timber'] == $timber[$j]?"selected = 'selected'":"")." value =".$timber[$j].">".$timber[$j]."</option>"; 
					}
				   ?>
				</select>
			</div>
		</li>
		<li class="flex col1-3 beother hide">
		    <div>厚度(cm):</div>
			<div><input class="selection" type="tel" placeholder="10~500" datatype="va_2" ignore="ignore" errormsg="厚度范围必须在10~500之间" name="thinckness" id="thinckness" value="<?php echo $row['thinckness']==0?'':$row['thinckness']; ?>"/></div>
		</li>
		<li class="flex col1-3 beother hide">
			<div>宽度(cm):</div>
			<div><input class="selection" type="tel" placeholder="10~500" datatype="va_2" ignore="ignore" errormsg="宽度范围必须在10~500之间" name="wide" id="wide" value="<?php echo $row['wide']==0?'':$row['wide'];?>" /></div>
		</li>
		<li class="flex col1-3">
			<div>价格:</div>
			<div><input class="selection" type="tel" name="price" value="<?php echo $row['price']==0?'':$row['price']?>"/></div>
		</li>
	</ul>
	<ul class="list">
		<li style="font-weight:bold;">求购内容</li>
		<li><textarea class="fullCol" cols="40" rows="5" id="content" name="content"><?php echo $row['content']==0?'':$row['content'];?></textarea></li>
	</ul>

	<input class="btnFixed" type="submit" id="sendmessage" value="修改" />
</form>
<?php
	}
  ?>
</body>

<script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
<script src="js/Validform_v5.3.2_min.js"></script>
<script>
$(function(){
	valid_kind();

	$(".releaseForm").Validform({
		tiptype:1, 
		ignoreHidden:true,
		datatype:{
			"va_1" : function(gets,obj,curform,regxp){
					var va_1 = /^(?:[1-7]\d|80)$/;
					if(va_1.test(gets)){return true;}
					return "径级范围必须在10~80之间";
			},
			"va_2" : function(gets,obj,curform,regxp){
					var va_2 = /^(?:[1-9]\d|[1-4][0-9]{2}|500)$/;
					if(va_2.test(gets)){return true;}
					return "宽度和厚度范围必须在10~500之间";
			},
			"va_5" : function(gets,obj,curform,regxp){
					  var va_5 =  /^(?:[5-9]\d|1[0-1]\d|120)$/;
					  if(va_5.test(gets)){return true;}
					  return "总货量范围必须在50～120m之间";
			}
		}
		
	});

	$("#kindid").change(function(){
		valid_kind();
	})

	
})

function valid_kind(){
	var value = $("#kindid").val();
	switch(value){
		case '0' :
			$(".beym").addClass("hide");
			$(".beother").addClass("hide");
			break;
		case '1' :
			$(".beym").removeClass("hide");
			$(".beother").addClass("hide");
			break;
		default :
			$(".beym").addClass("hide");
			$(".beother").removeClass("hide");
			break;
	}
}

</script>
</html>