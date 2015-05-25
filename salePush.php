<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>销售</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" type="text/css" href="/statics/css/yumReset.css" />
<link rel="stylesheet" type="text/css" href="/statics/css/yumPage.css" />
<link rel="stylesheet" type="text/css" href="/com/icomoon/style.css" />
</head>
<?php
    session_start();
    include_once('mcr_sc_fns.php');
	$portnum=0;
    $port_array = get_port($portnum);
	$stuffnum=0;
	$stuff_array=get_stuff($stuffnum);
?>
<body>
<?php
	if(isset($_SESSION['user']) ){			//用户或管理员登录后才可以发表信息
?>
<header class="header">
	<a href="javascript:history.back();"><i class="icon-arrow-back"></i></a>
	<h2>销售</h2>
	<a href="index.php"><i class="icon-home"></i></a>
</header>
<form class="push" action="savesale.php" method ="post"  onSubmit="return chkinput(this)">
	<dl class="panel-body">
		<dt>发布</dt>
		<dd>
			<ul class="">
				<li class="">标题:<input type="text" name="title" id="title" /></li>
				<li class="">货种:
					<select name="kindselect" id="kindselect">
						<option value = 1>原木</option>
						<option value = 2>条子</option>
						<option value = 3>口料</option>
						<option value = 4>大方</option>
						<option value = 5>大板</option>
						<option value = 6>防腐材</option>
					</select>
					<i class="icon-caret-down"></i>
				</li>
				<li class="">材种:
					<select name ="stuffselect" id="stuffselect">
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
				<li class="">车皮号:<input type="text"  name="carnum" id="carnum"/></li>
				<li class="">价格:<input type="text" name="price" id="price"/></li>
				<li>目标口岸:
					<select name ="areaselect" id="areaselect" >
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
				<li class="detailInfo"><div>详细内容:</div><textarea cols="40" rows="5" name="content" id="content"></textarea></li>
			</ul>
		</dd>
	</dl>
	<input type="submit" value="发布" />
</form>
<?php
    }
	else {
         echo "<script>window.location.href='signIn.php?type=4';</script>";
    }
	
  ?>
</body>
<script language="javascript">
		function chkinput(form){				//定义一个函数
			if(form.title.value==""){				//判断usernc文本框中的值是否为空
				alert("请输入标题！");   		//如果为空则输出“请输入用户昵称”
				form.title.focus();					//返回到tel文本框
				return(false);
		   }
			 }
		   return(true);							//提交表单
		}
	</script>
</html>