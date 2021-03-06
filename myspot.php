<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<title>现货</title>
<meta name="description" content="">
<meta name="keywords" content="">

<link rel="stylesheet" type="text/css" href="statics/css/yumleeM.css" />
<link rel="stylesheet" type="text/css" href="statics/css/mcr.css" />
<link rel="stylesheet" type="text/css" href="com/icomoon/style.css" />
<link rel="stylesheet" href="css/manage.css" />
<style>
	#ul_list li.totalNum{
		height: 36px;
	    text-align: right;
	  line-height: 36px;
	  padding-right: 20px;
	  font-weight: bold;
	}
</style>
</head>
<body>
<header class="header fixed">
	<div><a href="user.php"><i class="icon-arrow-back"></i></a></div>
	<h1>我的现货</h1>
	<div><a href="index.php"><i class="icon-home"></i></a></div>
</header>
<?php
   include_once('mcr_sc_fns.php');
   include_once('system/model/wood.php');
	session_start();
   $portid=$_SESSION['portid'];
	$wood= new wood($portid);
	$wood->realrelease();
	$userid = $_SESSION['userid'];
   $dump_array = get_mydata("call p_myspot(".$userid.")");
   ?>

<section>
	<form>
		<ul class="flex selectWrapper">
			<li>
				<select name ="kindselect" id="kindselect">
					<option value = 0>选货种</option>
					<?php
			         $kind_array = $wood->kind; //货种 lja
				     foreach($kind_array as $row) {
						echo "<option value =".$row["kindid"].">".$row["kindname"]."</option>";					
					}
				   ?>
				</select>
			</li>
			<li>
				<select name ="stuffselect" id="stuffselect" >
					<option value = 0>选树种</option>
					<?php
						$stuff_array =$wood->stuff ;  //树种
		                  foreach ($stuff_array as $row){
							 $stuffid = $row['stuffid'];
		                     $stuffname = $row['stuffname'];
		                     echo "<option value =".$stuffid.">".$stuffname."</option>";
							}
		                    ?>
				</select>
			</li>
			<li>
				<select id="productlen" name="producelen">
					<option value="0">选长度</option>
						<?php
					$len_array = $wood->length;
					foreach($len_array as $row)
					{
						echo "<option value = ".$row["lenid"].">".$row["lenname"]."</option>";
					}
					?>
				</select>
			</li>
		</ul>
                         <ul class="flex selectWrapper1">
                            <li>
                                <input class="op-2 hide" type="tel" placeholder="宽度" id="productwide" name="productwide"/>
                                <input class="op-1 hide" type="tel" placeholder="径级" id="diameterlen" name="diameterlen"/>
                            </li>
                            <li>
                                <input class="op-2 hide" type="tel" placeholder="厚度" id="thinckness" name="thinckness"/>
                                <select class="op-1 hide" id="timber" name="timber">
                                    <option value='0'>选材质</option>
                                    <?php
                                    $timber_array = $wood->timber;
                                    foreach($timber_array as $row)
                                    {
                                        echo "<option value = ".$row["timberid"].">".$row["timbername"]."</option>";
                                    }
                                    ?>
                                </select>
                            </li>
                         </ul>
		<ul class="flex selectWrapper">
			<li>
				<select name="status" id="status">
					<option value="0">选状态</option>
					<option value="1">预售</option>
					<option value="2">待售</option>
					<option value="3">已售</option>
					<option value="4">下架</option>
				</select>
			</li>
			<li>
				<input type="tel" placeholder="车皮号" id="carnum" name="carnum"/>
			</li>
		</ul>
		
		<ul class="flex selectWrapper1">
			<li class="lineHeight28 flex col1-3">
				<div>起始：</div>
				<div><input type="date" name="startTime" id="startTime"></div>
			</li>
			<li class="lineHeight28 flex col1-3">
				<div>截止：</div>
				<div><input type="date" name="endTime" id="endTime"></div>
			</li>
			
		</ul>
		<ul class="flex selectWrapper1">
			<li><input type="button"  class="button sousuo width98" onclick="start(1)" value="搜索"></li>
		</ul>
	</form>
</section>



<ul class="ul_list" id="ul_list">

</ul>
<div class="loading hide"><i id='icon_loading'><img src='images/loading.gif'></i>正在加载，请稍等......</div>
<p class='no_result' id="no-result">没有查询到您所要的内容</p>
</body>
<script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
<script src="statics/js/config.js"></script>
<script type="text/javascript" src="js/sgutil.js"></script>
<script type="text/javascript" src="js/tz_dialog.js"></script>
<script type="text/javascript" src="js/myspot.js"></script>
<script>
	$(function(){
		kindselect();
		tipToggle();

		$("body").on("click",".down",function(){
			var $mes_id = $(this).siblings("#mes_id").val();
			if(window.confirm("确定要下架吗？")){
				 window.location = "myspotout_bgo.php?cdkey=" + $mes_id; //提交的url
			 }else{
				return;
			 }
		});

	})
</script>

</html>