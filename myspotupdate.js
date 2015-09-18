(function () {
	var xhr;
	var index =0;
	var $loading;
	var mypics=new Array();
	var sendpics = new Array();
	var $li = $(".list li .upImg-display li");
	
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
	   	if($li.eq(1).has("img").length != 0){
		 index =index +1;
		 sendpics[index -1] =mypics[0];	
		}
		if($li.eq(2).has("img").length != 0){
		 index =index +1;
		 sendpics[index -1] =mypics[1];	
		}
		 if($li.eq(3).has("img").length != 0){
		  index =index +1;
		  sendpics[index -1] =mypics[2];	
		}
		 if($li.eq(4).has("img").length != 0){
		  index =index +1;
		  sendpics[index -1] =mypics[3];		
		}
   }
   
   var input = document.getElementById("sendfile");
   var data1;
    input.onchange = function () {
        // 也可以传入图片路径：lrz('../demo.jpg', ...
        lrz(this.files[0], {width: 320,height:40,qulatity:0.6}, function (results) {
            // 你需要的数据都在这里，可以以字符串的形式传送base64给服务端转存为图片。

          var data = {
					size: results.base64.length, // 校验用，防止未完整接收
                    base64: results.base64
				};

				if($li.eq(1).has("img").length ==0){
					$li.eq(1).prepend("<img src='"+results.base64+"' id='img1' class='images' />");
					$(".list li .upImg-display li").eq(1).find(".upload_delete").show();
					mypics[0]=data;
                    results.base64 = null;
				}
				else if($li.eq(2).has("img").length ==0){
					$li.eq(2).prepend("<img src='"+results.base64+"' id='img2' class='images' />");
					$(".list li .upImg-display li").eq(2).find(".upload_delete").show();
					mypics[1]=data;
                    results.base64 = null;
				}
				else if($li.eq(3).has("img").length ==0){
					$li.eq(3).prepend("<img src='"+results.base64+"' id='img3' class='images' />");
					$(".list li .upImg-display li").eq(3).find(".upload_delete").show();
					mypics[2]=data;
                    results.base64 = null;
				}
				else if($li.eq(4).has("img").length ==0){
					$li.eq(4).prepend("<img src='"+results.base64+"' id='img4' class='images' />");
					$(".list li .upImg-display li").eq(4).find(".upload_delete").show();
					mypics[3]=data;
                    results.base64 = null;
				}

				
        });
    };
	/*校验部分*/
	var carnum =document.getElementById("carnum");//车皮号
	var diameterlen =document.getElementById("diameterlen");//径级 
	var wide =document.getElementById("wide");//宽度
	var thinckness=document.getElementById("thinckness");//厚度
	var refnum=document.getElementById("refnum");//参考根数
	var refwight=document.getElementById("refwight");//参考重量
	var contactphone=document.getElementById("contactphone");//手机号
	var goodpositionid=document.getElementById("goodpositionid");//当前位置
	
	carnum.onchange = function v_carnum(){
		if(carnum.value.length != 8){
			alert("请输入正确的车皮号");
			carnum.value = "";
			carnum.focus();
			return false;
		}
	}

	diameterlen.onchange = function v_diameterlen(){
		var re = /^(?:[1-7]\d|80)$/;
		if(!re.test(diameterlen.value)){
			alert("径级范围必须在10~80之间");
			diameterlen.value = "";
			diameterlen.focus();
			return false;
		}
	}
	
	wide.onchange = function v_wide(){
		var re = /^(?:[1-9]\d|[1-4][0-9]{2}|500)$/;
		if(!re.test(wide.value)){
			alert("宽度范围必须在10~500之间");
			wide.value = "";
			wide.focus();
			return false;
		}
	}

	thinckness.onchange = function v_thinckness(){
		var re = /^(?:[1-9]\d|[1-4][0-9]{2}|500)$/;
		if(!re.test(thinckness.value)){
			alert("厚度范围必须在10~500之间");
			thinckness.value = "";
			thinckness.focus();
			return false;
		}
	}
	
	refnum.onchange = function v_refnum(){
		var re = /^(?:[1-9]\d{2,3}|1[0-9]{4}|20000)$/;
		if(!re.test(refnum.value)){
			alert("参考根数范围必须在100～20000之间");
			refnum.value = "";
			refnum.focus();
			return false;
		}
	}

	refwight.onchange = function v_refwight(){
		var re =  /^(?:[4-8]\d|90)$/;
		if(!re.test(refwight.value)){
			alert("参考重量范围必须在40～90t之间");
			refwight.value = "";
			refwight.focus();
			return false;
		}
	}

	contactphone.onchange = function v_contactphone(){
		var re = /^[1][358][0-9]{9}$/;
		if(!re.test(contactphone.value)){
			alert("请输入正确的手机号");
			contactphone.value = "";
			contactphone.focus();
			return false;
		}
	}

	goodpositionid.onchange = function v_content(){
		if(goodpositionid.value == 0){
			alert("请选择当前位置");
			goodpositionid.focus();
			return false;
		}
	}
	/* end 校验部分*/

	function start(){
             createXMLHttpRequest();
             xhr.open('POST', 'myspotupdate_bgo.php',true);
             xhr.setRequestHeader('Content-Type', 'application/json; charset=utf-8');
		     xhr.onreadystatechange = callback;
//			 sendmessage.disabled=true;
	
			 var obj = new Object(); 
			 //上传数据打包
			   obj.carnum =document.getElementById("carnum").value;
			   if(obj.carnum.length == 0){
					alert("请输入车皮号");
					carnum.focus();
					return false;
			   }
			 //  obj.portid =document.getElementById("portid").value;
			   obj.kindid =document.getElementById("kindid").value;
			   obj.stuffid=document.getElementById("stuffid").value;
			   obj.productlen=document.getElementById("productlen").value;
			   obj.refcapacity=document.getElementById("refcapacity").value;
			   obj.diameterlen=document.getElementById("diameterlen").value;//径级
					var re_diameterlen = /^(?:[1-7]\d|80)$/;
					if(obj.diameterlen == 0){}
					else if(!re_diameterlen.test(obj.diameterlen)){
						
						alert("径级范围必须在10~80之间");
						diameterlen.value = "";
						diameterlen.focus();
						return false;
					}

			   obj.timberid=document.getElementById("timberid").value;//材质
			   obj.timbertypeid=document.getElementById("timbertypeid").value;//材类
			   obj.wide=document.getElementById("wide").value;//宽度
					var re_wide = /^(?:[1-9]\d|[1-4][0-9]{2}|500)$/;
					if(obj.wide == 0){}
					else if(!re_wide.test(obj.wide)){
						alert("宽度范围必须在10~500之间");
						wide.value = "";
						wide.focus();
						return false;
					}

			   obj.thinckness=document.getElementById("thinckness").value;//厚度
					var re_thinckness= /^(?:[1-9]\d|[1-4][0-9]{2}|500)$/;
					if(obj.thinckness == 0){}
					else if(!re_thinckness.test(obj.thinckness)){
						alert("厚度范围必须在10~500之间");
						thinckness.value = "";
						thinckness.focus();
						return false;
					}
			   
			   obj.refnum=document.getElementById("refnum").value;//参考根数
					var re_refnum= /^(?:[1-9]\d{2,3}|1[0-9]{4}|20000)$/;
					if(obj.refnum.length == 0){}
					else if(!re_refnum.test(obj.refnum)){
						alert("参考根数范围必须在100～20000之间");
						refnum.value = "";
						refnum.focus();
						return false;
					}
				
			   obj.refwight=document.getElementById("refwight").value;//参考重量
					var re_refwight =  /^(?:[4-8]\d|90)$/;
					if(obj.refwight.length == 0){}
					else if(!re_refwight.test(obj.refwight)){
						alert("参考重量范围必须在40～90t之间");
						refwight.value = "";
						refwight.focus();
						return false;
					}
			   obj.tolerance=document.getElementById("tolerance").value;//公差
			   obj.knobid=document.getElementById("knobid").value;//节巴
			   obj.climbid=document.getElementById("climbid").value;//爬皮
			   obj.positionid=document.getElementById("positionid").value;//取材位置
			   obj.contactphone=document.getElementById("contactphone").value;//货主手机
					var re_contactphone = /^[1][358][0-9]{9}$/;
					if(obj.contactphone.length == 0){}
					else if(!re_contactphone.test(obj.contactphone)){
						alert("请输入正确的手机号");
						contactphone.value = "";
						contactphone.focus();
						return false;
					}
			   obj.deviceid=document.getElementById("deviceid").value;//加工设备
			   obj.widerange=document.getElementById("widerange").value;//宽度范围
			   obj.thincknessrange=document.getElementById("thincknessrange").value;//厚度范围
			   obj.newoldid=document.getElementById("newoldid").value;//新旧
			   obj.blueid=document.getElementById("blueid").value;//蓝变
			   obj.wormid=document.getElementById("wormid").value;//虫眼
			   obj.decayid=document.getElementById("decayid").value;//腐朽
			   obj.fromid=document.getElementById("fromid").value;//产地
			   obj.contact=document.getElementById("contact").value;//货主
			   obj.cdkey=document.getElementById("cdkey").value;//cdkey
	
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
				//物流数据上传
			   obj.goodpositionid=document.getElementById("goodpositionid").value;//货物当前位置
			     if(obj.goodpositionid == 0){
						alert("请选择当前位置");
						return false;
				   }
			   //obj.showtime=document.getElementById("showtime").value;//显示时间
			   
			   obj.content =document.getElementById("content").value;//详细介绍
               //图片数组的上传	
                checkpic();			   
			   obj.pics=sendpics;
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

			if(xhr.responseText =="success"){
			 alert('修改成功！');
			 window.location.href='myspot.php';
			}
			else {
			 alert('修改失败，请稍后重新修改！');
			 sendmessage.disabled=false;
			}

			 }
		
		}
   
})();