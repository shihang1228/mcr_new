/**
 * @authors Yumlee (543265835@qq.com)
 * @date    2015-05-03 11:29:09
 * @version $ rightForm 1.0 $
 */
var	rePhoneNum = /^1[3|4|5|8]\d{9}/i;//手机号的正则表达式
	reUserName = /[^\w\u4e00-\u9fa5]/g;//用户名的正则表达式

// **********
	phoneInput = document.getElementById('phoneNum');//获取输入手机号的表单
	pwd = document.getElementById('pwd');//获取输入密码的表单
	signIn_submit = document.getElementById('signIn_submit');//获取登录页面提交按钮
	phoneNum_icon = document.getElementById('phoneNum_icon');//获取手机号码后面图标
	pwd_icon = document.getElementById('pwd_icon');//获取密码后面图标
	userName = document.getElementById('userName');
	userName_icon = document.getElementById('userName_icon');
	pwd2 = document.getElementById('pwd2');
	pwd2_icon = document.getElementById('pwd2_icon');
//验证函数
phoneInput.onblur=function() {
	if (rePhoneNum.test(this.value)) {
		// pwd.focus();
		phoneNum_icon.style.color = "#60af00";
	} else{
		alert("请输入正确的手机号码！");
		this.focus();
	};
}
pwd.onblur=function() {
	if (this.value.length >= 6) {
		pwd_icon.style.color = "#60af00";
		signIn_submit.disabled = false;
	} else{
		alert("请输入6位以上的密码！");
		this.focus();
	};
}
userName.onblur=function () {
	if (reUserName.test(this.value)) {
		alert("请输入合法用户名");
	} else if(this.value == ""){
		alert("请输入用户名");
	} else{
		userName_icon.style.color = "#60af00";
	};
}
pwd2.onblur=function(){
	if (this.value == pwd.value) {
		pwd2_icon.style.color = "#60af00";
	} else{
		alert("请输入相同的密码！");
	};
}