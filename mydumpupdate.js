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

    input.onchange = function () {
        // 也可以传入图片路径：lrz('../demo.jpg', ...
        lrz(this.files[0], {width: 250,qulatity:0.2}, function (results) {
            // 你需要的数据都在这里，可以以字符串的形式传送base64给服务端转存为图片。
          // console.log(results);
          
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

	function start(){
             createXMLHttpRequest();
             xhr.open('POST', 'mydumpupdate_bgo.php',true);
             xhr.setRequestHeader('Content-Type', 'application/json; charset=utf-8');
		     xhr.onreadystatechange = callback;
			// sendmessage.disabled=true;
			 var obj = new Object(); 
			 //上传数据打包
			   //obj.portid =document.getElementById("portid").value; lj-
			   try
			   {
				   obj.stuffid=document.getElementById("stuffid").value;
				   if(obj.stuffid == 0){
						alert("请选择材种");
						return false;
				   }
				   obj.kindid =document.getElementById("kindid").value;
				   if(obj.kindid == 0){
						alert("请选择货种");
						return false;
				   }
				   obj.productlen=document.getElementById("productlen").value;
				   obj.refcapacity=document.getElementById("refcapacity").value;
				   obj.cdkey = document.getElementById("cdkey").value;
				   obj.diameterlen=document.getElementById("diameterlen").value;//径级
				   obj.timberid=document.getElementById("timberid").value;//材质
				   obj.timbertypeid=document.getElementById("timbertypeid").value;//材类
				   obj.wide=document.getElementById("wide").value;//宽度
				   obj.thinckness=document.getElementById("thinckness").value;//厚度
				   obj.tolerance=document.getElementById("tolerance").value;//公差
				   obj.knobid=document.getElementById("knobid").value;//节巴
				   obj.climbid=document.getElementById("climbid").value;//爬皮
				   obj.part=document.getElementById("part").value;//取材位置
				   obj.deviceid=document.getElementById("deviceid").value;//加工设备
				   obj.widerange=document.getElementById("widerange").value;//宽度范围
				   obj.thincknessrange=document.getElementById("thincknessrange").value;//厚度范围
				   obj.newoldid=document.getElementById("newoldid").value;//新旧
				   obj.blueid=document.getElementById("blueid").value;//蓝变
				   obj.wormid=document.getElementById("wormid").value;//虫眼
				   obj.decayid=document.getElementById("decayid").value;//腐朽
				   obj.fromid=document.getElementById("fromid").value;//产地
				   //烘干 取值
					var dry = document.getElementsByName("honggan");
					var dryid="";
					  for(var i=0;i<dry.length;i++)
					  {
						 if(dry[i].checked)
							 dryid = dry[i].value;
					  }
					obj.dryid=dryid;  
				  
				   //斜裂取值
				   var slash = document.getElementsByName("xielie");
					var slashid="";
					  for(var i=0;i<slash.length;i++)
					  {
						 if(slash[i].checked)
							 slashid = slash[i].value;
					  }
					obj.slashid=slashid;
					//环裂取值
				   var ring = document.getElementsByName("huanlie");
					var ringid="";
					  for(var i=0;i<ring.length;i++)
					  {
						 if(ring[i].checked)
							 ringid = ring[i].value;
					  }
					obj.ringid=ringid;
					//抽油取值
				   var oil = document.getElementsByName("chouyou");
					var oilid="";
					  for(var i=0;i<oil.length;i++)
					  {
						 if(oil[i].checked)
							 oilid = oil[i].value;
					  }
					obj.oilid=oilid;
					//黑心取值
					var black = document.getElementsByName("heixin");
					var blackid="";
					  for(var i=0;i<black.length;i++)
					  {
						 if(black[i].checked)
							 blackid = black[i].value;
					  }
					obj.blackid=blackid;
					//物流数据上传
				 
				   obj.dumpposition=document.getElementById("dumpposition").value;//装卸线
				   obj.content =document.getElementById("content").value;//详细介绍
				   
				   //图片数组的上传
				   checkpic();				
				   obj.pics=sendpics;
			   }
			   catch(e)
			   {
				   alert(e);
			   }
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
			
		 if ((xhr.readyState == 4) && (xhr.status == 200)){
		
		  //  var result = JSON.parse(xhr.response);
		 $loading.hide();
		 $(".tz_loading").hide();

		 if(xhr.responseText =="success"){
			 alert('修改成功！');
			 window.location.href='mydump.php';
		 }
		 else {
			 alert('修改失败，请稍后重新修改！');
			 sendmessage.disabled=false;
		 }

			// tip.innerHTML = '<p>生成和上传完毕</p> <small class="text-muted">演示使用了大量内存，可能会造成几秒内卡顿，不代表真实表现，请亲测。</small>';

		  
		 }
		
		}
    
})();