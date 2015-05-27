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
<link rel="stylesheet" type="text/css" href="/statics/css/yumReset.css" />
<link rel="stylesheet" type="text/css" href="/statics/css/yumPage.css?v=1" />
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
	<a href="javascript:history.back();"><i class="icon-arrow-back"></i></a>
	<h2>求购信息发布</h2>
	<a href="index.php"><i class="icon-home"></i></a>
</header>
<div class="panel">

	<form class="releaseForm" method ="post" action ="buyrelease_bgo.php">
		<dl class="panel-body">
			<dt></dt>
			<dd class="panel-col-2">
				<ul class="clearfix">
					<li class="select">材种:
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
						<i class="icon-caret-down"></i>
					</li>
					<li class="select">货种:
						<select name="kindid" id="kindid">
							<option value = 1>原木</option>
							<option value = 2>条子</option>
							<option value = 3>口料</option>
							<option value = 4>大方</option>
							<option value = 5>大板</option>
							<option value = 6>防腐材</option>
						</select>
						<i class="icon-caret-down"></i>
					</li>
					<li class="select">目标口岸:
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
						<i class="icon-caret-down"></i>
					</li>
					<li>长度(m):
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
						<i class="icon-caret-down"></i>
					</li>
					<li class="beym">径级(cm):<input type="text" placeholder="10~80" datatype="va_1" errormsg="径级范围必须在10~80之间" name="diameterlen" id="diameterlen"/></li>
					<li class="select beym">材质:
						<select name="timber" id="timber">
							<option value="0">材质</option>
							<option value="选材">选材</option>
						    <option value="一级材">一级材</option>
							<option value="二级材">二级材</option>
							<option value="加工材">加工材</option>
						</select>
						<i class="icon-caret-down"></i>
					</li>
					<li class="beother">宽度(cm):<input type="text" placeholder="10~500" datatype="va_2" errormsg="宽度范围必须在10~500之间" name="wide" id="wide" /></li>
					<li class="beother">厚度(cm):<input type="text" placeholder="10~500" datatype="va_2" errormsg="厚度范围必须在10~500之间" name="thinckness" id="thinckness"/></li>
					<li>价格:<input type="text" name="price"/></li>
					<li>参考根数:<input type="text" name="refnum" placeholder="100~20000" id="refnum" datatype="va_3" errormsg="参考根数范围必须在100～20000之间" /></li>
					<li>参考重量(t):<input type="text" name="refwight"placeholder="40~90t" id="refwight" datatype="va_4" errormsg="参考重量范围必须在40～90t之间" /></li>
					<li>参考载量(m):<input type="text" name="refcapacity" placeholder="50~120m" id="refcapacity" datatype="va_5" errormsg="参考载量范围必须在50～120m之间" /></li>
					<li class="detailInfo panel-row-1"><div>求购内容:</div><textarea style="width:100%;" cols="40" rows="5" id="content" name="content"></textarea></li>
				</ul>
			</dd>
		</dl>
		<input type="submit" id="sendmessage" value="发布" />
	</form>
</div>
<?php
   }else{
     echo "<script>window.location.href='signIn.php?type=3';</script>";
  }
  ?>
</body>

<script type="text/javascript" src="http://lib.sinaapp.com/js/jquery/2.0.3/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/Validform_v5.3.2_min.js"></script>
<script type="text/javascript">
$(function(){

	$(".releaseForm").Validform({
		datatype:{
			"va_1" : /^(?:[1-7]\d|80)$/,   //10-80
			"va_2" : /^(?:[1-9]\d|[1-4][0-9]{2}|500)$/,  //10-500
			"va_3" : /^(?:[1-9]\d{2,3}|1[0-9]{4}|20000)$/,  //100-20000
			"va_4" : /^(?:[4-8]\d|90)$/,  //40-90
			"va_5" : /^(?:[5-9]\d|1[0-1]\d|120)$/  //50-120
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