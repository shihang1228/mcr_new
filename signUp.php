<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<title>免费注册</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" type="text/css" href="/statics/css/yumReset.css" />
<link rel="stylesheet" type="text/css" href="/statics/css/yumPage.css" />
<link rel="stylesheet" type="text/css" href="/com/icomoon/style.css" />
<?php
   include_once('mcr_sc_fns.php');
   $port_array = get_portarray();
 ?>
<body>
<header class="header">
	<h1><a href="index.php">木材人</a></h1>
	<ul class="nav">
		<li><a href="">现货</a></li>
		<li><a href="">2</a></li>
		<li><a href="">3</a></li>
	</ul>
</header>
<div>
	<form class="sign" name ="form1" method="post" action="savereg.php" onSubmit="return chkinput(this)">
		<div class="item">
			<label class="icon-head"></label><input type="text" name="userName" placeholder="请输用户名" id="userName" />
			<i class="icon-checkbox-checked" id="userName_icon"></i>
		</div>
		<div class="item">
			<label class="icon-mobile"></label><input type="tel" placeholder="请输入您的手机号码" name="phoneNumber" id="phoneNum" />
			<i class="icon-checkbox-checked" id="phoneNum_icon"></i>
		</div>
		<div class="item">
			<label class="icon-lock"></label><input type="password" name="userpwd" placeholder="请输入密码" id="pwd" />
			<i class="icon-checkbox-checked" id="pwd_icon"></i>
		</div>
		<div class="item">
			<label class="icon-checkbox-checked"></label><input type="password" name="userpwd1" placeholder="请再次输入密码" id="pwd2" />
			<i class="icon-checkbox-checked" id="pwd2_icon"></i>
		</div>
		<div class="item">
			<label class="icon-spell-check"></label><input type="text" placeholder="请输入短信验证码" /><button class="getCode">获取</button>
		</div>
		<div class="item labelText"><label>关注口岸:</label><select name="portselect">
				<option value =0>请选择关注口岸</option>
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
		</div>
		<div class="item labelText"><label>所在城市:</label><input type="text" name ="city" placeholder="" /></div>
		<div class="item labelText"><label>备用手机:</label><input type="text" name ="phone1" placeholder="" /></div>
		<div class="item labelText"><label>备用手机2:</label><input type="text" name ="phone2" placeholder="" /></div>
		<div class="item labelText"><input type="submit" value="注册" /></div>
	</form>
</div>
</body>
 <script language="javascript">
		function chkinput(form){				//定义一个函数
			if(form.userName.value==""){				//判断usernc文本框中的值是否为空
				alert("请输入用户昵称！");   		//如果为空则输出“请输入用户昵称”
				form.userName.focus();					//返回到tel文本框
				return(false);
		   }
		  if(form.userpwd.value==""){
			    alert("请输入注册密码！");   
				form.userpwd.focus();
				return(false);
			}
		  if(form.userpwd1.value==""){
			  alert("请输入重复密码！");   
			  form.userpwd1.focus();
			  return(false);
			  }
		  if(form.userpwd.value!=form.userpwd1.value){
			  alert("密码与确认密码不同！");   
			  form.userpwd.focus();
			  return(false); 
			 }
		   return(true);							//提交表单
		}
	</script>
<script type="text/javascript" src="/statics/js/rightForm.js"></script>
</html>