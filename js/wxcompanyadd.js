﻿(function () {
	var xhr;
	var index =0;
	var $loading;
	var mypics=new Array()
	var sendpics = new Array();
	var mysendpics =new Array();
	
	var $li = $(".list li .upImg-display li");

	var btn = document.getElementById("choose");

	var images = {
		localId: [],
		serverId: []
	};

	btn.onclick = function(){
		wx.chooseImage({
			success: function(res){
				images.localId = res.localIds; // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片

				for(var i = 0;i < images.localId.length;i++){
					if(i >= 4){
						break;
					}
					for(var j = 1; j <= 4; j++){
						if($li.eq(j).has("img").length == 0){
							$li.eq(j).prepend("<img src='"+images.localId[i]+"' id='img"+j+"' class='images' />");
							$(".list li .upImg-display li").eq(j).find(".upload_delete").show();
							var picobj = new Object();
							picobj.pic = images.localId[i];
							picobj.bj = true;
							mypics[j-1]=picobj;
							break;
						}
					}
				}
				//选择成功开始传图片
				var k = 0, len = mypics.length;
					function wxUpload(){
						if(mypics[k].bj){
							wx.uploadImage({
								localId: mypics[k].pic, // 需要上传的图片的本地ID，由chooseImage接口获得
								isShowProgressTips:1, // 默认为1，显示进度提示
								success: function(res){
									//将上传成功后的serverId保存到serverid
									//images.serverId.push(sendpics);
									sendpics[k] = res.serverId;
									mypics[k].bj = false;
									k++;
									if(k < len){
										wxUpload();
									}
								}

							});
						}
						else{
							k++;
							if(k < len){
								wxUpload();
							}
						}
					}
					wxUpload();
			}
		});
	}

    function createXMLHttpRequest(){
     if(window.XMLHttpRequest){
       xhr = new XMLHttpRequest();
    }
    else if(window.ActiveXObject){//IE 浏览器
      try{
       xhr = new ActiveXObject("Msxml2.XMLHTTP");
      }catch(e) {
	      try {
		    xhr = new ActiveXObject("Microsoft.XMLHTTP");
	     }catch (e) {}
      }
 
     }
   }
   
    function checkpic(){
	     var index = 0;
		 mysendpics.length =0;
	   	if($li.eq(1).has("img").length != 0){
		 index =index +1;
		 mysendpics[index -1] =sendpics[0];	
		}
		if($li.eq(2).has("img").length != 0){
		 index =index +1;
		 mysendpics[index -1] =sendpics[1];	
		}
		 if($li.eq(3).has("img").length != 0){
		  index =index +1;
		  mysendpics[index -1] =sendpics[2];	
		}
		 if($li.eq(4).has("img").length != 0){
		  index =index +1;
		  mysendpics[index -1] =sendpics[3];		
		}
   }
   
	/*校验部分*/
	var companyname =document.getElementById("companyname");
	var product =document.getElementById("product");
	var contact =document.getElementById("contact");
	var phone=document.getElementById("phone");
	var contactphone=document.getElementById("contactphone");
	var email=document.getElementById("email");
	var website=document.getElementById("website");
	var content=document.getElementById("content");
	var address =document.getElementById("address");  
	
	contact.onchange = function(){
		if(contact.value.length > 10){
			alert("联系人的长度不能超过10");
			contact.value = "";
			contact.focus();
			return false;
		}
	}

	product.onchange = function(){
		if(product.value.length > 50){
			alert("产品的长度不能超过50");
			product.value = "";
			product.focus();
			return false;
		}
	}
	
	phone.onchange = function(){
		var re = /^1[3|4|5|7|8]\d{9}$/;
		if(!re.test(phone.value)){
			alert("请输入合法的手机号");
			phone.value = "";
			phone.focus();
			return false;
		}
	}

	contactphone.onchange = function(){
		if(contactphone.value.length > 16){
			alert("联系电话不能超过16位");
			contactphone.value = "";
			contactphone.focus();
			return false;
		}
	}

	email.onchange = function(){
		var re = /^(\w)+(\.\w+)*@(\w)+((\.\w+)+)$/;
		if(!re.test(email.value)){
			alert("请输入合法的邮箱");
			email.value = "";
			email.focus();
			return false;
		}
	}

	website.onchange = function(){
		if(website.value.length > 20){
			alert("网址的长度不能超过20");
			website.value = "";
			website.focus();
			return false;
		}
	}

	content.onchange = function(){
		if(content.value.length > 200){
			alert("内容长度不能超过200");
			content.value = "";
			content.focus();
			return false;
		}
	}

	address.onchange = function(){
		if(address.value.length >36){
			alert("地址长度不能超过36");
			address.value = "";
			address.focus();
			return false;
		}
	}
	
	
	function start(){
		createXMLHttpRequest();
		xhr.open('POST', 'wxcompanyadd_bgo.php',true);
		xhr.setRequestHeader('Content-Type', 'application/json; charset=utf-8');
		xhr.onreadystatechange = callback;
		//sendmessage.disabled=true;
		var obj = new Object(); 
		//上传数据打包
		//
		obj.companyname =document.getElementById("companyname").value;
		if(obj.companyname.length == 0){
			alert("请输入企业名称");
			companyname.focus();
			return false;
		}
		var inputLength = $("input[name='keyword']:checked").length;
		if(inputLength > 2){
			alert("关键词选太多");
			return false;
		}
		obj.product =document.getElementById("product").value;
		obj.contact =document.getElementById("contact").value;
		obj.phone=document.getElementById("phone").value;
		obj.contactphone=document.getElementById("contactphone").value;
		obj.email=document.getElementById("email").value;
		obj.website=document.getElementById("website").value;
		obj.content=document.getElementById("content").value;
		obj.address =document.getElementById("address").value; 
		//关键字
		var ch1 = document.getElementById("ch1");
		var ch2 = document.getElementById("ch2");
		var ch3 = document.getElementById("ch3");
		var ch4 = document.getElementById("ch4");
		var ch5 = document.getElementById("ch5");
		var ch6 = document.getElementById("ch6");
		var ch7 = document.getElementById("ch7");
		var ch8 = document.getElementById("ch8");
				
		var keyword="";
		var flag = false;
		if(ch1.checked){
		 keyword=keyword +"原木板材进口,";
		 flag = true;
		}
		if(ch2.checked){
		 keyword=keyword +"防腐木扣板加工,";
		 flag = true;
		}
		if(ch3.checked){
		 keyword=keyword +"拼板指接板,";
		 flag = true;
		}
		if(ch4.checked){
		 keyword=keyword +"龙骨小料加工,";
		 flag = true;
		}
		if(ch5.checked){
		 keyword=keyword +"干燥旋切,";
		 flag = true;
		}
		if(ch6.checked){
		 keyword=keyword +"相关机械与化工,";
		 flag = true;
		}
		if(ch7.checked){
		 keyword=keyword +"代理中介机构,";
		 flag = true;
		}
		if(ch8.checked){
		 keyword=keyword +"其它,";
		 flag = true;
		}
		
		if(flag == false){
			alert("请选择至少一个关键词！");
			return false;
		}
		
		obj.keyword=keyword;
			   
		//图片数组的上传				
		checkpic();			   
		obj.pics=mysendpics;
		//上传数据转换成json    
		var sendvalue =JSON.stringify(obj);
		xhr.send(sendvalue);
		/*动态获取遮罩层的宽和高 start*/
			 var $body_width = $(document).width();
			 var $body_height = $(document).height();
			 $loading = $('<div id="fade" class="black_overlay"></div>').css({"width":$body_width,"height":$body_height}).insertBefore('.header');
			/*end 动态获取遮罩层的宽和高*/
			  $loading.show();
			  $.tzLoading({content:"正在发布，请稍等....",width:143,height:45,timeout:2});
    }
	var sendmessage = document.getElementById("sendmessage");
	sendmessage.onclick=start;

	function callback(){
		if ((xhr.readyState === 4) && (xhr.status === 200)){
			//  var result = JSON.parse(xhr.response);
			if(xhr.response ==="success"){
				alert('发布成功！');
				window.location.href='companylist.php';
			}
			else {
				alert('发布失败，请稍后重新发布！');
				//sendmessage.disabled=false;
			}

		}
	}


})();