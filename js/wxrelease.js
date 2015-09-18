﻿
(function () {

	var xhr;
	var index =0;
	var $loading;
	var mypics=new Array();
	var sendpics = new Array();
	var mysendpics =new Array();
	var $li = $(".list li .upImg-display li");
	var iomode = $("#iomode").val();
	
	  var btn = document.getElementById('choose');
	//  var download = document.getElementById('download');
	  //定义images用来保存选择的本地图片ID，和上传后的服务器图片ID
	   var images = {
		  localId: [],
		  serverId: []
	  };
   // wx.ready(function () {
    // 在这里调用 API
	    btn.onclick = function(){
	        wx.chooseImage ({
	            success : function(res){
	                images.localId = res.localIds;  //保存到images
					//img1.src =res.localIds;
	                // 返回选定照片的本地ID列表，localId可以作为img标签的src属性显示图片
					for(var i=0;i<images.localId.length;i++){
						if (i >= 4 ){
							break;
						}
						for(var j=1;j<=4;j++)
						{
							if($li.eq(j).has("img").length ==0){
								$li.eq(j).prepend("<img src='"+images.localId[i]+"' id='img"+j+"' class='images' />");
								//$li.eq(j).prepend("<img src='../images/selected.jpg' id='img"+j+"' class='images' />");
								$(".list li .upImg-display li").eq(j).find(".upload_delete").show();
								var picobj = new Object();
								picobj.pic = images.localId[i];
								picobj.bj=true;
								mypics[j-1]=picobj;
								break;
							}
						}
						
					}
			     //选择成功开始传图片
				     var k = 0, len = mypics.length;
						function wxUpload(){
							if (mypics[k].bj)
							{
								wx.uploadImage({
									localId: mypics[k].pic, // 需要上传的图片的本地ID，由chooseImage接口获得
									isShowProgressTips:1, // 默认为1，显示进度提示
									success: function (res) {
										//将上传成功后的serverId保存到serverid
										//images.serverId.push(sendpics);
										sendpics[k]=res.serverId;
										mypics[k].bj=false;
										k++;
										if(k < len){
											wxUpload();
										}
										
									}
								});
						   }
						   else {
							   k++;
							   if(k < len){
									wxUpload();
								}
						   }
						}
						wxUpload();
				}
	        });//choose message
	  	};
	//});//ready
	
	
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
	var reDigist = /^(?:\d{8})$/;
	var carnum =document.getElementById("carnum");//车皮号
	var diameterlen =document.getElementById("diameterlen");//径级 
	var wide =document.getElementById("wide");//宽度
	var thinckness=document.getElementById("thinckness");//厚度
	var refnum=document.getElementById("refnum");//参考根数
	var refwight=document.getElementById("refwight");//参考重量
	var refcapacity=document.getElementById("refcapacity");//总货量
	var contactphone=document.getElementById("contactphone");//手机号
	var phone_back=document.getElementById("phone_back");//手机号
	var spotpositionid=document.getElementById("spotpositionid");//当前位置
	var price=document.getElementById("price");//价格
	
	carnum.onchange = function v_carnum(){
		if(!reDigist.test(carnum.value)){
			alert("请输入正确的车皮号");
			carnum.focus();
			return false;
		}
	}

	price.onchange = function v_price(){
		var re = /^(?:[1-9]{1}[0-9]{1,3}|10000)$/;
		if(!re.test(price.value)){
			alert("价格不能超过10000");
			price.focus();
			return false;
		}
	}

	diameterlen.onchange = function v_diameterlen(){
		var re = /^(?:[1-7]\d|80)$/;
		if(!re.test(diameterlen.value)){
			alert("径级范围必须在10~80之间");
			diameterlen.focus();
			return false;
		}
	}
	
	wide.onchange = function v_wide(){
		var re = /^(?:[1-9]\d|[1-4][0-9]{2}|500)$/;
		if(!re.test(wide.value)){
			alert("宽度范围必须在10~500之间");
			wide.focus();
			return false;
		}
	}

	thinckness.onchange = function v_thinckness(){
		var re = /^(?:[1-9]\d|[1-4][0-9]{2}|500)$/;
		if(!re.test(thinckness.value)){
			alert("厚度范围必须在10~500之间");
			thinckness.focus();
			return false;
		}
	}
	
	refnum.onchange = function v_refnum(){
		var re = /^(?:[1-9]\d{2,3}|1[0-9]{4}|20000)$/;
		if(!re.test(refnum.value)){
			alert("参考根数范围必须在100～20000之间");
			refnum.focus();
			return false;
		}
	}

	refwight.onchange = function v_refwight(){
		var re =  /^(?:[4-8]\d|90)$/;
		if(!re.test(refwight.value)){
			alert("参考重量范围必须在40～90t之间");
			refwight.focus();
			return false;
		}
	}
	refcapacity.onchange = function v_refcapacity(){
		var re = /^(?:[5-9]\d|1[0,1]\d|120)$/;
		if(!re.test(refcapacity.value)){
			alert("总货量输入有误");
			refcapacity.focus();
			return false;
		}
	}

	// contactphone.onchange = function v_contactphone(){
	// 	var re = /^[1][34578][0-9]{9}$/;
	// 	if(!re.test(contactphone.value)){
	// 		alert("请输入正确的手机号");
	// 		contactphone.focus();
	// 		return false;
	// 	}
	// }

	spotpositionid.onchange = function v_content(){
		if(spotpositionid.value == 0){
			alert("请选择当前位置");
			spotpositionid.focus();
			return false;
		}
	}
	/* end 校验部分*/
   
	function start(){
             createXMLHttpRequest();
             xhr.open('POST', 'system/control/wxreceive.php',true);
             xhr.setRequestHeader('Content-Type', 'application/json; charset=utf-8');
		     xhr.onreadystatechange = callback;
//			 sendmessage.disabled=true;
	
			 var obj = new Object(); 
			 //上传数据打包
			   obj.carnum =document.getElementById("carnum").value;
			   if(!reDigist.test(obj.carnum)){
					alert("请输入车皮号");
					carnum.focus();
					return false;
			   }else{
			   		if(obj.carnum.length != 8){
						alert("请输入正确的车皮号");
						carnum.focus();
						return false;
					}
			   }
			 //  obj.portid =document.getElementById("portid").value;
			   obj.kindid =document.getElementById("kindid").value;
			   obj.phone_back =document.getElementById("phone_back").value;//第二个手机号
			   obj.stuffid=document.getElementById("stuffid").value;
			   obj.productlen=document.getElementById("productlen").value;
			   obj.refcapacity=document.getElementById("refcapacity").value;
			   obj.diameterlen=document.getElementById("diameterlen").value;//径级
			   obj.tolerance=document.getElementById("tolerance").value;//公差
			   obj.knobid=document.getElementById("knobid").value;//节巴
			   obj.climbid=document.getElementById("climbid").value;//爬皮
			   obj.part=document.getElementById("part").value;//取材位置
			   obj.deviceid=document.getElementById("deviceid").value;//加工设备
			   obj.widerange=document.getElementById("widerange").value;//宽度范围
			   obj.thincknessrange=document.getElementById("thincknessrange").value;//厚度范围
			   obj.timberid=document.getElementById("timberid").value;//材质
			   obj.timbertypeid=document.getElementById("timbertypeid").value;//材类
			   obj.wide=document.getElementById("wide").value;//宽度
			   obj.thinckness=document.getElementById("thinckness").value;//厚度
			   obj.newoldid=document.getElementById("newoldid").value;//新旧
			   obj.blueid=document.getElementById("blueid").value;//蓝变
			   obj.wormid=document.getElementById("wormid").value;//虫眼
			   obj.decayid=document.getElementById("decayid").value;//腐朽
			   obj.fromid=document.getElementById("fromid").value;//产地
			   obj.contact=document.getElementById("contact").value;//货主
			   obj.refnum=document.getElementById("refnum").value;//参考根数
			   obj.refwight=document.getElementById("refwight").value;//参考重量
			   obj.refcapacity=document.getElementById("refcapacity").value;//总货量
			   obj.contactphone=document.getElementById("contactphone").value;//货主手机
			   obj.spotpositionid=document.getElementById("spotpositionid").value;//货物当前位置
				obj.price=document.getElementById("price").value;//价格

				if(obj.kindid == 1){
					var re_diameterlen = /^(?:[1-7]\d|80)$/;
					if(obj.diameterlen.length == 0){}
					else if(!re_diameterlen.test(obj.diameterlen)){
						alert("径级范围必须在10~80之间");
						diameterlen.value = "";
						diameterlen.focus();
						return false;
					}
				}else if(obj.kindid !=0 || obj.kindid != 1){
					var re_wide = /^(?:[1-9]\d|[1-4][0-9]{2}|500)$/;
					var re_thinckness= /^(?:[1-9]\d|[1-4][0-9]{2}|500)$/;

					if(obj.wide.length == 0){}
					else if(!re_wide.test(obj.wide)){
						alert("宽度范围必须在10~500之间");
						wide.value = "";
						wide.focus();
						return false;
					}

					if(obj.thinckness.length == 0){}
					else if(!re_thinckness.test(obj.thinckness)){
						alert("厚度范围必须在10~500之间");
						thinckness.value = "";
						thinckness.focus();
						return false;
					}
				}
					var re_refnum= /^(?:[1-9]\d{2,3}|1[0-9]{4}|20000)$/;
					if(obj.refnum.length == 0){}
					else if(!re_refnum.test(obj.refnum)){
						alert("参考根数范围必须在100～20000之间");
						refnum.value = "";
						refnum.focus();
						return false;
					}
				
					var re_refwight =  /^(?:[4-8]\d|90)$/;
					if(obj.refwight.length == 0){}
					else if(!re_refwight.test(obj.refwight)){
						alert("参考重量范围必须在40～90t之间");
						refwight.value = "";
						refwight.focus();
						return false;
					}
					var re_refcapacity = /^(?:[5-9]\d|1[0,1]\d|120)$/;
					if(obj.refcapacity.length == 0){}
					else if(!re_refcapacity.test(obj.refcapacity)){
							alert("总货量输入有误");
							refcapacity.value = "";
							refcapacity.focus();
							return false;
					}
					var re_contactphone = /^[1][3458][0-9]{9}$/;
					if(obj.contactphone.length == 0){}
					else if(!re_contactphone.test(obj.contactphone)){
						alert("请输入正确的手机号");
						contactphone.value = "";
						contactphone.focus();
						return false;
					}

					if(obj.phone_back.length == 0){}
					else if(!re_contactphone.test(obj.phone_back)){
						alert("请输入正确的手机号");
						phone_back.value = "";
						phone_back.focus();
						return false;
					}
				
			     if(obj.spotpositionid == 0){
						alert("请选择当前位置");
						return false;
				}
			   var re_price = /^(?:[1-9]{1}[0-9]{1,3}|10000)$/;
					if(obj.price.length == 0){}
					else if(!re_price.test(obj.price)){
						alert("价格不能超过10000");
						price.value="";
						return false;
					}
			   
			   //烘干 取值
				var dry = document.getElementsByName("honggan");
				var dryid="0";
				  for(var i=0;i<dry.length;i++)
				  {
					 if(dry[i].checked)
						 dryid = dry[i].value;
				  }
				obj.dryid=dryid;  
			  
			   //斜裂取值
			   var slash = document.getElementsByName("xielie");
				var slashid="0";
				  for(var i=0;i<slash.length;i++)
				  {
					 if(slash[i].checked)
						 slashid = slash[i].value;
				  }
				obj.slashid=slashid;
			  	//环裂取值
			   var ring = document.getElementsByName("huanlie");
				var ringid="0";
				  for(var i=0;i<ring.length;i++)
				  {
					 if(ring[i].checked)
						 ringid = ring[i].value;
				  }
				obj.ringid=ringid;
				//抽油取值
			   var oil = document.getElementsByName("chouyou");
				var oilid="0";
				  for(var i=0;i<oil.length;i++)
				  {
					 if(oil[i].checked)
						 oilid = oil[i].value;
				  }
				obj.oilid=oilid;
				//黑心取值
				var black = document.getElementsByName("heixin");
				var blackid="0";
				  for(var i=0;i<black.length;i++)
				  {
					 if(black[i].checked)
						 blackid = black[i].value;
				  }
				obj.blackid=blackid;
				//显示状态
				obj.display = document.getElementById("showstatus").value;
				
				//物流数据上传
			   
			   //obj.showtime=document.getElementById("showtime").value;//显示时间
			   
			   obj.content =document.getElementById("content").value;//详细介绍
			   obj.salestatusid=document.getElementById("salestatusid").value;//销售状态
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
         var rec;
		function callback(){
		
		   if ((xhr.readyState == 4) && (xhr.status == 200)){
			  
				$loading.hide();
				$(".tz_loading").hide();

				 rec = eval("("+xhr.responseText+")");
				 if(rec.result =="success"){
					 if(rec.isnew == true){
						//alert("您新增数据成功! 获得积分：" + rec.perfect);
						if(window.confirm("您新增数据成功! 获得积分：" + rec.perfect + "。继续发布吗？")){
							 window.location.href = "wxrelease.php?cdkey=&iomode=0"; //提交的url
						 }else{
							history.back();
						 }
						//window.location.href='index.php';
					 }else{
						//alert("您更新数据成功! 获得积分：" + rec.perfect);
						if(window.confirm("您更新数据成功! 获得积分：" + rec.perfect + "。")){
							if(iomode == 1){
							 	window.location.href = "./wxrelease.php?cdkey=" + rec.cdkey; //提交的url
							}else{
								window.location.href = "./wxrelease.php?cdkey=&iomode=0"; //提交的url
							 //history.back();
							}
						 }else{
							history.back();
						 }
					   // window.location.href='index.php';
					 }
				 }
				 else {
					 alert('发布失败，请稍后重新发布！');
					 sendmessage.disabled=false;
				 }

			 }
		
		}
   
})();