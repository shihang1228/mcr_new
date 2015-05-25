(function () {
	var xhr;
	var index =0;
	var mypics=new Array()
	
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
   var input = document.getElementById("sendfile");
   var data1;
   var img1=document.getElementById("img1");
   var img2=document.getElementById("img2");
   var img3=document.getElementById("img3");
   var img4=document.getElementById("img4");

    input.onchange = function () {
        // 也可以传入图片路径：lrz('../demo.jpg', ...
        lrz(this.files[0], {width: 250,qulatity:0.2}, function (results) {
            // 你需要的数据都在这里，可以以字符串的形式传送base64给服务端转存为图片。
          // console.log(results);
           index = index +1;
		  if (index > 4 ) {index = 1;}

          var data = {
					size: results.base64.length, // 校验用，防止未完整接收
                    base64: results.base64
				};
				
				
			  if (index ==1)  {
					img1.src =results.base64;
				}
				else if(index ==2){
				img2.src=results.base64;}
				else if(index ==3) {
					img3.src =results.base64;
					
				}
				else {
					img4.src=results.base64;
					
				}
				mypics[index-1]=data;
          
        });
    };
    //
	function start(){
             createXMLHttpRequest();
             xhr.open('POST', 'receive.php',true);
             xhr.setRequestHeader('Content-Type', 'application/json; charset=utf-8');
		     xhr.onreadystatechange = callback;
			 sendmessage.disabled=true;
			 var obj = new Object(); 
			 //上传数据打包
			   obj.carnum =document.getElementById("carnum").value;
			   obj.portid =document.getElementById("portid").value;
			   obj.kindid =document.getElementById("kindid").value;
			   obj.stuffid=document.getElementById("stuffid").value;
			   obj.productlen=document.getElementById("productlen").value;
			   obj.refnum=document.getElementById("refnum").value;
			   obj.refcapacity=document.getElementById("refcapacity").value;
			   obj.refwight=document.getElementById("refwight").value;
			   obj.diameterlen=document.getElementById("diameterlen").value;//径级
			   obj.timberid=document.getElementById("timberid").value;//材质
			   obj.timbertypeid=document.getElementById("timbertypeid").value;//材类
			   obj.wide=document.getElementById("wide").value;//宽度
			   obj.thinckness=document.getElementById("thinckness").value;//厚度
			   obj.tolerance=document.getElementById("tolerance").value;//公差
			   obj.knobid=document.getElementById("knobid").value;//节巴
			   obj.climbid=document.getElementById("climbid").value;//爬皮
			   obj.positionid=document.getElementById("positionid").value;//取材位置
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
			   obj.assembletime=document.getElementById("assembletime").value;//装车时间
			   obj.entertime=document.getElementById("entertime").value;//入关时间
			   obj.pausetime=document.getElementById("pausetime").value;//暂停线时间
			   obj.trackid=document.getElementById("trackid").value;//轨道
			   obj.dumptime=document.getElementById("dumptime").value;//到达货场时间
			   obj.dumpid=document.getElementById("dumpid").value;//货场
			   obj.packid=document.getElementById("packid").value;//装卸线
			   obj.goodpositionid=document.getElementById("goodpositionid").value;//货位编号
			   obj.showtime=document.getElementById("showtime").value;//显示时间
			   
			   
               //图片数组的上传				
			   obj.pics=mypics;
			  //上传数据转换成json    
			  var sendvalue =JSON.stringify(obj);
			   xhr.send(sendvalue);
        }
		 var sendmessage = document.getElementById("sendmessage");
		 sendmessage.onclick=start;

		function callback(){
		 if ((xhr.readyState === 4) && (xhr.status === 200)){
		
		  //  var result = JSON.parse(xhr.response);
		 if(xhr.response ==="success"){
			 alert('发布成功！');
			 window.location.href='goodlist.php';
		 }
		 else {
			 alert('发布失败，请稍后重新发布！');
			 sendmessage.disabled=false;
		 }

			// tip.innerHTML = '<p>生成和上传完毕</p> <small class="text-muted">演示使用了大量内存，可能会造成几秒内卡顿，不代表真实表现，请亲测。</small>';

		  
		 }
		
		}
    /**
     * 演示报告
     * @param title
     * @param src
     * @param size
     */
    function demo_report(title, src, size) {
        var img = new Image(),
            li = document.createElement('li'),
            size = (size / 1024).toFixed(2) + 'KB';

        if(size === 'NaNKB') size = '';

        img.onload = function () {
            var content = '<ul>' +
                '<li>' + title + '（' + img.width + ' X ' + img.height + '）</li>' +
                '<li class="text-cyan">' + size + '</li>' +
                '</ul>';

            li.className = 'item';
            li.innerHTML = content;
            li.appendChild(img);
            document.querySelector('#report').appendChild(li);
        };

        img.src = typeof src === 'string' ? src : URL.createObjectURL(src);
    }

    // 演示用服务器太慢，做个延缓加载
    window.onload = function () {
        input.style.display = 'block';
    }
})();