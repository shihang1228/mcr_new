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
</head>
<?php
	session_start();
   include_once('mcr_sc_fns.php');
	//include_once('mcr_sc_fnc.php');
	$portnum = 0;
	$port_array = get_port($portnum);
	$stuffnum = 0;
	$stuff_array = get_stuff($stuffnum);
?>
<?php
	if(isset($_SESSION['user']) ){			//用户或管理员登录后才可以发表信息
?>
<header class="header">
	<div><a href="javascript:history.back();"><i class="icon-arrow-back"></i></a></div>
	<h1>求购信息发布</h1>
	<div><a href="index.php"><i class="icon-home"></i></a></div>
</header>
<form class="releaseForm" method ="post" action ="buyrelease_bgo.php">
	<ul class="list">
		<li class="flex col4">
			<div>材种:</div>
			<div>
				<select name="stuffid" id="stuffid">
					<?php
						for($i=0;$i<$stuffnum;$i++) {
							$row =$stuff_array->fetch_assoc();
							 $stuffid = $row['stuffid'];
							$stuffname = $row['stuffname'];
							 // echo "<li><a href=''>".$portname."</a></li>";
							  echo "<option value =".$stuffid.">".$stuffname."</option>";
						}
	                ?>
				</select>
			</div>
			<div>货种:</div>
			<div>
				<select name="kindid" id="kindid">
					<option value = '1'>原木</option>
					<option value = '2'>条子</option>
					<option value = '3'>口料</option>
					<option value = '4'>大方</option>
					<option value = '5'>大板</option>
					<option value = '6'>防腐材</option>
				</select>
			</div>
		</li>
		<li class="flex col4">
			<div>目标口岸:</div>
			<div>
				<select name = "portid" id = "portid">
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
			</div>
			<div>长度(m):</div>
			<div>
				<select name="productlen" id="productlen">
	                <option value = "1">1</option>
					<option value = "2">2</option>
					<option value = "2">3</option>
					<option value = "4">4</option>
					<option value = "5">5</option>
					<option value = "6">6</option>
					<option value = "7">7</option>
					<option value = "8">8</option>
					<option value = "9">9</option>
					<option value = "10">10</option>
					<option value = "11">11</option>
					<option value = "12">12</option>
				</select>
			</div>
		</li>
		<li class="flex col4 beym">
			<div>径级(cm):</div>
			<div><input type="text" placeholder="10~80" datatype="va_1" errormsg="径级范围必须在10~80之间" name="diameterlen" id="diameterlen"/></div>
			<div>材质:</div>
			<div>
				<select name="timber" id="timber">
					<option value="0">材质</option>
					<option value="选材">选材</option>
				    <option value="一级材">一级材</option>
					<option value="二级材">二级材</option>
					<option value="加工材">加工材</option>
				</select>
			</div>
		</li>
		<li class="flex col4 beother">
			<div>宽度(cm):</div>
			<div><input type="text" placeholder="10~500" datatype="va_2" errormsg="宽度范围必须在10~500之间" name="wide" id="wide" /></div>
			<div>厚度(cm):</div>
			<div><input type="text" placeholder="10~500" datatype="va_2" errormsg="厚度范围必须在10~500之间" name="thinckness" id="thinckness"/></div>
		</li>
		<li class="flex col4">
			<div>价格:</div>
			<div><input type="text" name="price"/></div>
			<div>参考根数:</div>
			<div><input type="text" name="refnum" placeholder="100~20000" id="refnum" datatype="va_3" errormsg="参考根数范围必须在100～20000之间" /></div>
		</li>
		<li class="flex col4">
			<div>参考重量(t):</div>
			<div><input type="text" name="refwight"placeholder="40~90t" id="refwight" datatype="va_4" errormsg="参考重量范围必须在40～90t之间" /></div>
			<div>参考载量(m):</div>
			<div><input type="text" name="refcapacity" placeholder="50~120m" id="refcapacity" datatype="va_5" errormsg="参考载量范围必须在50～120m之间" /></div>
		</li>
		<li><div>求购内容:</div><textarea class="fullCol" cols="40" rows="5" id="content" name="content"></textarea></li>
	</ul>

	<input class="btnFixed" type="submit" id="sendmessage" value="发布" />
</form>
<?php
   }else{
     echo "<script>window.location.href='signIn.php?type=3';</script>";
  }
  ?>
</body>

<script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
<script src="js/Validform_v5.3.2_min.js"></script>
<script>
$(function(){

	$(".releaseForm").Validform({
		tiptype:1, 
		ignoreHidden:true,
		datatype:{
			/*"va_1" : /^(?:[1-7]\d|80)$/,   //10-80
			"va_2" : /^(?:[1-9]\d|[1-4][0-9]{2}|500)$/,  //10-500
			"va_3" : /^(?:[1-9]\d{2,3}|1[0-9]{4}|20000)$/,  //100-20000
			"va_4" : /^(?:[4-8]\d|90)$/,  //40-90
			"va_5" : /^(?:[5-9]\d|1[0-1]\d|120)$/  //50-120*/
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
			"va_3" :  function(gets,obj,curform,regxp){
					var va_3 =  /^(?:[1-9]\d{2,3}|1[0-9]{4}|20000)$/;
					if(va_3.test(gets)){return true;}
					return "参考根数范围必须在100～20000之间";
			},
			"va_4" :  function(gets,obj,curform,regxp){
					  var va_4 =  /^(?:[4-8]\d|90)$/;
					  if(va_4.test(gets)){return true;}
					  return "参考重量范围必须在40～90t之间";
			},
			"va_5" : function(gets,obj,curform,regxp){
					  var va_5 =  /^(?:[5-9]\d|1[0-1]\d|120)$/;
					  if(va_5.test(gets)){return true;}
					  return "参考载量范围必须在50～120m之间";
			}
		}
		
	});

	$("#kindid").change(function(){
		if ($("#kindid").val()==1){
			$(".beym").show();
			$(".beother").hide();
		} else{
			$(".beym").hide();
			$(".beother").show();
		};
	})

	
})
</script>
</html>