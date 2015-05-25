<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type"content="text/html; charset=utf-8">   
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<title>发布信息</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" type="text/css" href="/statics/css/yumReset.css" />
<link rel="stylesheet" type="text/css" href="/statics/css/yumPage.css?v=1" />
<link rel="stylesheet" type="text/css" href="/com/icomoon/style.css" />

</head>
<?php
    session_start();
    include_once('mcr_sc_fns.php');
	
    $port_array = get_portarray();
	$stuff_array=get_stuffarray();	
	$from_array=get_from();//获取产地信息
	$dump_array =get_dump(1);//获取货场
	$pack_array=get_pack(1);//获取装卸线
?>
<body>
<?php
	if(isset($_SESSION['user']) ){			//用户或管理员登录后才可以发表信息
?>
<header class="header">
	<a href="javascript:history.back();"><i class="icon-arrow-back"></i></a>
	<h2>求购</h2>
	<a href="index.php"><i class="icon-home"></i></a>
</header>
<div class="panel">
	<!-- <div class="panel-header"><h2 class="panel-header-title">小店【新昌公寓】复试 大三居 超低价位居家首选</h2></div> -->
	<form class="releaseForm">
		
		<div class="upImg"><span class="icon-image" ></span>上传照片
			<input type="file" id="sendfile" name="upimg" accept="image/*" value="上传照片" capture="camera" />
		</div>
		<div class="upImg-display">
			<img src=""  alt="" id="img1" />
	        <img src=""  alt="" id="img2" />
	        <img src=""  alt="" id="img3" />
	        <img src=""  alt="" id="img4" />
		</div>
		<dl class="panel-body">
			<dt></dt>
			<dd class="panel-col-2">
				<ul class="clearfix">
					<li>车皮号:<input type="tel" name ="carnum" id="carnum" /></li>
					<li class="select">目标口岸:
						<select name="portid" id ="portid">
					    <?php
                          if (!is_array($port_array)) {
                            echo "<p>No categories currently available</p>";
                           return;
                          }

                        foreach ($port_array as $row)
                        {
                           $portid = $row['portid'];
                           $portname = $row['portName'];
                          echo "<option value =".$portid.">".$portname."</option>";
						}
					    ?>
							
						</select>
						<i class="icon-caret-down"></i>
					</li>
					<li class="select">材种:
						<select name="stuffid" id="stuffid">
						<?php
                          if (!is_array($stuff_array)) {
                            echo "<p>No categories currently available</p>";
                           return;
                          }

                        foreach ($stuff_array as $row)
                        {
                           $stuffid = $row['stuffid'];
                           $stuffname = $row['stuffname'];
                          echo "<option value =".$stuffid.">".$stuffname."</option>";
						}
					    ?>
						</select>
						<i class="icon-caret-down"></i>
					</li>
					<li class="select">货种:
						<select name="typeOfGoods" id="kindid">
			                <option value="1">原木</option>
							<option value="4">条子</option>
							<option value="4">口料</option>
							<option value="2">大方</option>
							<option value="3">大板</option>
							<option value="4">防腐材</option>
						</select>
						<i class="icon-caret-down"></i>
					</li>
					<li>长度(m):<input type="tel" name="productlen" id="productlen"/></li>
					<li>参考根数:<input type="tel" name="refnum" id="refnum" /></li>
					<li>参考载量(t):<input type="tel" name="refcapacity" id="refcapacity"/></li>
					<li>参考重量(t):<input type="tel" name="refwight" id="refwight"/></li>
					<li class="panel-row-1 select">当前位置:
						<select>
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
						</select>
						<i class="icon-caret-down"></i>
					</li>
				</ul>
			</dd>
			<dt></dt>
			<dd class="panel-col-2" id="release_op1">
				<ul class="clearfix">
					<li>径级(cm):<input type="tel" placeholder="10~80" name="diameterlen" id="diameterlen"/></li>
					<li class="select">材质:
						<select name="timberid" id ="timberid">
							<option value="">材质</option>
							<option value="红皮细纹">红皮细纹</option>
							<option value="黑皮材">黑皮材</option>
							<option value="加工材">加工材</option>
							<option value="其它">其它</option>
						
						</select>
						<i class="icon-caret-down"></i>
					</li>
					<li class="select">材类:
						<select name="timbertypeid" id="timbertypeid">
							<option value="">材类</option>
							<option value="选材">选材</option>
						    <option value="根节">根节</option>
							<option value="中节">中节</option>
							<option value="稍节">稍节</option>
							<option value="其它">其它</option>
						
						</select>
						<i class="icon-caret-down"></i>
					</li>
				</ul>
			</dd>
			<dt></dt>
			<dd class="panel-col-2" id="release_op2">
				<ul class="clearfix">
					<li>宽度(cm):<input type="tel" placeholder="10~500" name="wide" id="wide" /></li>
					<li>厚度(cm):<input type="tel" placeholder="10~500" name="thinckness" id="thinckness"/></li>
					<li>公差(cm):<input type="number" placeholder="-2~3" name="tolerance" id="tolerance"/></li>
					<li class="select">节巴:
						<select name="knobid" id="knobid">
							<option value="">节巴 </option>
						    <option value="大节">大节</option>
							<option value="正常">正常</option>
							<option value="小节">小节</option>
						    <option value="无节">无节</option>
							<option value="其它">其它</option>
						</select>
						<i class="icon-caret-down"></i>
					</li>
					<li class="select">爬皮:
						<select name="climbid" id="climbid">
							<option value="">爬皮</option>
							<option value="部分">部分</option>
							<option value="个别">个别</option>
							<option value="四面见线">四面见线</option>
							<option value="其它">其它</option>
						</select>
						<i class="icon-caret-down"></i>
					</li>
					<li class="select">取材位置:
						<select name="positionid" id="positionid">
							<option value="">取材位置</option>
							<option value="边材">边材</option>
							<option value="芯材">芯材</option>
						</select>
						<i class="icon-caret-down"></i>
					</li>
					<li class="select">加工设备:
						<select name="deviceid" id="deviceid">
							<option value="">加工设备</option>
							<option value="普通带锯">普通带锯</option>
							<option value="俄罗斯锯">俄罗斯锯</option>
							<option value="多片锯">多片锯</option>
							<option value="其它">其它</option>
						</select>
						<i class="icon-caret-down"></i>
					</li>
					<li class="clearfix onoff" id="release_op4">
						<div class="radio2-hd">烘干:</div>
						<div class="radio2-bd">
							<label>是<input type="radio" name="honggan" value="是"></label>
							<label>否<input type="radio" name="honggan" value="否"></label>
						</div>
					</li>
				</ul>
			</dd>
			<dt></dt>
			<dd class="panel-col-2" id="release_op3">
				<ul class="clearfix">
					<li>宽度范围:<input type="tel" placeholder="10~500" name="widerange" id="widerange" /></li>
					<li>厚度范围:<input type="tel" placeholder="10~500" name="thincknessrange" id="thincknessrange"/></li>
				</ul>
			</dd>
			<dt id="collapse-hd">材质信息<span class="icon-caret-down"></span></dt>
			<dd class="panel-col-2 collapse-bd" id="collapse-bd">
				<ul class="clearfix">
					<li class="select">新旧:
						<select name="newoldid" id="newoldid">
							<option value="">新旧</option>
							<option value="旧材">旧材</option>
							<option value="部分发黑">部分发黑</option>
							<option value="新材">新材</option>
						</select>
						<i class="icon-caret-down"></i>
					</li>
					<li class="select">蓝变:
						<select name="blueid" id="blueid">
							<option value="">蓝变</option>
							<option value="全蓝">全蓝</option>
							<option value="部分">部分</option>
							<option value="个别">个别</option>
							<option value="无蓝变">无蓝变</option>
							<option value="其它">其它</option>
						</select>
						<i class="icon-caret-down"></i>
					</li>
					<li class="select">虫眼:
						<select name="wormid" id="wormid">
							<option value="">虫眼</option>
							<option value="部分">部分</option>
							<option value="个别">个别</option>
							<option value="无虫眼">无虫眼</option>
							<option value="其它">其它</option>
						</select>
						<i class="icon-caret-down"></i>
					</li>
					<li class="select">腐朽:
						<select name="decayid" id="decayid">
							<option value="">腐朽</option>
							<option value="部分">部分</option>
							<option value="个别">个别</option>
							<option value="无腐朽">无腐朽</option>
							<option value="其它">其它</option>
						</select>
						<i class="icon-caret-down"></i>
					</li>
					<li class="clearfix onoff">
						<div class="radio2-hd">斜裂:</div>
						<div class="radio2-bd">
							<label>有<input type="radio" name="xielie" value="有"></label>
							<label>无<input type="radio" name="xielie" value="无"></label>
						</div>
					</li>
					<li class="clearfix onoff">
						<div class="radio2-hd">环裂:</div>
						<div class="radio2-bd">
							<label>有<input type="radio" name="huanlie" value="有"></label>
							<label>无<input type="radio" name="huanlie" value="无"></label>
						</div>
					</li>
					<li class="clearfix onoff">
						<div class="radio2-hd">抽油:</div>
						<div class="radio2-bd">
							<label>有<input type="radio" name="chouyou" value="有"></label>
							<label>无<input type="radio" name="chouyou" value="无"></label>
						</div>
					</li>
					<li class="clearfix onoff">
						<div class="radio2-hd">黑心:</div>
						<div class="radio2-bd">
							<label>有<input type="radio" name="heixin" value="有"></label>
							<label>无<input type="radio" name="heixin" value="无"></label>
						</div>
					</li>
					<li>产地:
						<select name="fromid" id="fromid">
							<option value="0">产地</option>
						<?php
                          if (!is_array($from_array)) {
                            echo "<p>No categories currently available</p>";
                           return;
                          }

                        foreach ($from_array as $row)
                        {
                           $fromid = $row['fromid'];
                           $fromname = $row['fromname'];
                          echo "<option value =".$fromid.">".$fromname."</option>";
						}
					    ?>	
						</select>
					</li>
				</ul>
			</dd>
			<!-- <dt id="collapse-hd1">物流信息<span class="icon-caret-down"></span></dt>
			<dd id="collapse-bd1" class="collapse-bd">
				<ul class="clearfix">
					<li>装车时间:<input type="datetime-local" placeholder="请选择时间" id="assembletime" /></li>
					<li>入关时间:<input type="datetime-local" id="entertime"></li>
					<li>暂停线时间:<input type="datetime-local" id="pausetime"></li>
					<li>轨道:<input type="tel" id="trackid"></li>
					<li>到达货场时间:<input type="datetime-local" id="dumptime"></li>
					<li class="select" >货场:
						<select id="dumpid">
						  
						</select>
						<i class="icon-caret-down"></i>
					</li>
					<li class="select">所在装卸线:
						<select id="packid">
						
						</select>
						<i class="icon-caret-down"></i>
					</li>
					<li>货位编号:<input type="tel" id="goodpositionid"></li>
				</ul>
			</dd> -->
		</dl>
		<input type="button" id="sendmessage" value="发布" />
	</form>
</div>
<?php
}else{
  echo "<script>window.location.href='signIn.php?type=2';</script>";
  }
 ?>
</body>

<!-- <script type="text/javascript" src="/statics/js/zepto.min.js"></script> -->
<script type="text/javascript" src="/lib/mobileFix.mini.js?v=ad62f13"></script>
<script type="text/javascript" src="/lib/exif.js?v=0da8553"></script>
<script type="text/javascript" src="/lrz.js?v=0589040"></script>
<script type="text/javascript" src="http://lib.sinaapp.com/js/jquery/2.0.3/jquery-2.0.3.min.js"></script>
<script type="text/javascript" src="release.js?v=41c28fd"></script>
<script type="text/javascript">
$(function () {
	$('#collapse-hd').on('click',function () {
		$('#collapse-bd').toggle();
	})
	$('#collapse-hd1').on('click',function () {
		$('#collapse-bd1').toggle();
	})

	//验证货种
	var typeOfGoods = $('#kindid');
		release_op1 = $('#release_op1');
		release_op2 = $('#release_op2');
		release_op3 = $('#release_op3');
		release_op4 = $('#release_op4');

	typeOfGoods.change(function () {
		var typeOfGoodsVal = $('#kindid').val();
		switch(typeOfGoodsVal) {
			case '1':
			release_op1.show();
			release_op2.hide();
			release_op3.hide();
			break;
			case '2':
			release_op1.hide();
			release_op2.show();
			release_op3.show();
			release_op4.hide();
			break;
			case '3':
			release_op1.hide();
			release_op2.show();
			release_op3.show();
			release_op4.show();
			break;
			case '4':
			release_op1.hide();
			release_op2.show();
			release_op3.hide();
			release_op4.show();
			break;
			default:

		}
	})
	//radio action
	var onoff = $('.onoff');
	// var radio = $('input[name="stoving"]');

	onoff.change(function () {

		// var checked = $('input:checked');
		$('input[type="radio"]').parent().removeClass();
		$('input:checked').parent().addClass('radioY');
		// if (checked.val() == 'yes') {
		// 	checked.parent().siblings().removeClass();
		// 	checked.parent().addClass('radioY');
		// } else{
		// 	checked.parent().siblings().removeClass();
		// 	checked.parent().addClass('radioN');
		// };
	});
	// var radio = $('input[name="stoving"]:checked');
	// alert(radio.val());


})
</script>

</html>