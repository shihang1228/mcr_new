<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>查找</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" type="text/css" href="/statics/css/yumReset.css" />
<link rel="stylesheet" type="text/css" href="/statics/css/yumPage.css" />
<link rel="stylesheet" type="text/css" href="/com/icomoon/style.css" />
</head>
<body>
<header class="header">
	<a href="javascript:history.back();"><i class="icon-arrow-back"></i></a>
	<h2>查找</h2>
	<a href="index.php"><i class="icon-home"></i></a>
</header>
<?php
   
   include_once('mcr_sc_fns.php');
    if  (isset($_POST['submit']))
   {
      $inputnumber=$_POST["numberInput"];
	  $data_array=get_datafromnum($inputnumber);
	  
 ?>

   	<dl class="panel">
	<dt></dt>
    <dd>
     <?php
	     $outstr=" ";
	    if (!is_array($data_array)) {
           echo "<p>No categories currently available</p>";
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
				   $outstr=$kindname;
				 }
				 else {
				    $outstr=$diameterlen."φ ".$timber;
				 }
			   }
			   else {
			       if($wide ==0 or $thinckness ==0) {
				     $outstr=$kindname;
				   }
				   else {
				      $outstr=$wide."*".$thinckness;
				   }
			   }
			   

	 ?>
   <!--
		<li class="list-item">
			<a href="detail.php?productid=<?php echo  $productid;?>" class="clearfix">
			<div class="list-left"><span><?php echo $outstr;?></span></div>
			<div class="list-right"><i class="icon-chevron-right"></i></div>
			</a>
		</li>
		-->
	
	
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
<section>
	<form class="lookup" method ="post">
		<div class="lookup-wrap"><input type="tel" placeholder="车皮号/手机号" id="numberInput" name="numberInput"/></div>
		<div class="lookup-label"><input type="submit" value="搜索" name ="submit" /></div>
		<!-- <a href="salePush.html" class="icon-bullhorn"> 发布</a> -->
	</form>
</section>
<?php
  };
 ?>
</body>
<script src="http://lib.sinaapp.com/js/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
$('#numberInput').blur(function (){
	var numberVal = $('#numberInput').val();
	if (numberVal.length < 4 || numberVal.length > 11){
		alert('请输入正确的车皮号或手机号！');
	}
})
</script>
</html>