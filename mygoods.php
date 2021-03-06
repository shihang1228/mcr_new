<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<title>我的货物</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" type="text/css" href="css/sg.css">
<link rel="stylesheet" type="text/css" href="css/common.css">
<link rel="stylesheet" type="text/css" href="css/tz-dialog.css">

<link rel="stylesheet" type="text/css" href="statics/css/yumleeM.css" />
<link rel="stylesheet" type="text/css" href="statics/css/mcr.css" />
<link rel="stylesheet" type="text/css" href="com/icomoon/style.css" />
<link rel="stylesheet" type="text/css" href="css/manage.css" />
</head>
<body>
<header class="header fixed">
	<div><a href="./index.php"><i class="icon-arrow-back"></i></a></div>
	<h1>我的货物</h1>
	<div><a href="./index.php"><i class="icon-home"></i></a></div>
</header>
<?php
	session_start();
    include_once('mcr_sc_fns.php');
	if(isset($_SESSION['user']) ){
		$userid=$_SESSION['userid'];
		$good_array = get_mydata("call p_mygoods(".$userid.")");
	?>

<ul class="ul_list" id="ul_list">
    <?php
		if (!is_array($good_array)) {
			echo "<p>对不起，没有查找到您要查找的内容！</p>";
		   return;
		}

		foreach ($good_array as $row)
		{
	?>		
	<li>
	<?php
		if($row['salestatusid'] != '下架'){ ?>
			<b class="select_btn"><img src="images/img_2.png" alt="" width="40" height="40" /></b>
		<?php } ?>
		<?php
		  if ($row['goodtype']==1) {
			  $showstr=$row['carnum'];
		 ?>
		<a href="detail.php?cdkey=<?php echo $row['cdkey'];?>" class="li_link">
		<?php
		  }
		  else {
			   $showstr=$row['refcapacity'];
		 ?>
			<a href="dumpdetail.php?cdkey=<?php echo $row['cdkey'];?>" class="li_link">
		 <?php
		  }
		  ?>
			<h3><?php
				 $outstr="";
				 if ($row['kindname'] =='原木'){
					 if (($row['diameterlen']!='') and ($row['timber']!=''))
					 {
						 $outstr=$row['diameterlen']." ".$row['timber']; 
					 }
					 else {
						 $outstr=$row['kindname'];
					 }
				 }
				 else {
					 if(($row['wide']!='') and ($row['thinckness']!='') ){
						 $outstr=$row['thinckness']."*".$row['wide'];
					 }
					  else {
						 $outstr=$row['kindname'];
					 }
				 }
				 echo $showstr." ". $row['stuffname']." ".$row['productlen']." " .$outstr;?>
			</h3>
			<p>
				<span><?php echo $row['salestatusid'];?></span>
				<span class="span_mid">浏览<?php echo $row['viewnum'];?>次</span>
				<span><?php echo $row['updatetime1'];?></span>
			</p>
		</a>
		<div class="tip">
			<div class="triangle"></div>
			<?php
			  if ($row['goodtype']==1) {
			?>
			<div class="t_con">
				<input type="hidden" name="mes_id" id="mes_id1" value=<?php echo $row['cdkey'];?> />
				<a href="#" class="buy_out" id='down1'><i class="icon-download"></i><br /><span>下架</span></a>
				<a href="wxrelease.php?cdkey=<?php echo $row["cdkey"];?>"><i class="icon-pencil"></i><br /><span>修改</span></a>
			</div>
			<?php
			  }
			  else {
			?>
			 <div class="t_con">
				<input type="hidden" name="mes_id" id="mes_id2" value=<?php echo $row['cdkey'];?> />
				<a href="#" class="buy_out" id='down2'><i class="icon-download"></i><br /><span>下架</span></a>
				<a href="wxdumprelease.php?cdkey=<?php echo $row["cdkey"];?>"><i class="icon-pencil"></i><br /><span>修改</span></a>
			</div>
			<?php
			  }
			 ?>
		</div>
	</li>

	<?php
		}
	?>
</ul>
<?php
	}
    else{
     $_SESSION['usertype']=4;//判断转到mygoods.php页面
     echo "<script>window.location.href='signIn.php?type=1';</script>";
  }
 ?>
</body>
<script src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
<script src="statics/js/config.js"></script>
<script>
	$(function(){
		//查询
		kindselect();

		$('body').on('click','.ul_list li .select_btn',function(){
			$(this).siblings(".tip").slideToggle(300);
		});
		/*现货下架*/
	   $('body').on('click','#down1',function(){
			var companyid = $(this).siblings("#mes_id1").val();//公司id

			if(window.confirm("确定要下架吗？")){
				 window.location = "myspotout_bgo.php?cdkey="+companyid; //提交的url
			 }else{
				return;
			 }
	   });
		/*散货下架*/
	   $('body').on('click','#down2',function(){
			var companyid = $(this).siblings("#mes_id2").val();//公司id

			if(window.confirm("确定要下架吗？")){
				 window.location = "mydumpout_bgo.php?cdkey="+companyid; //提交的url
			 }else{
				return;
			 }
	   });

	});
</script>

</html>