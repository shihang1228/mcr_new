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
 //createXMLHttpRequest();
  // var input = document.querySelector('input');
 //var input = document.getElementsByTagName('input');
   var tip = document.querySelector('#tip');
 var input = document.getElementById("sendfile");
	//
	var data1;
	//
	
   var img1=document.getElementById("img1");
   var img2=document.getElementById("img2");
   var img3=document.getElementById("img3");
   var img4=document.getElementById("img4");
   var cph =document.getElementById("cph");
    input.onchange = function () {
        // 也可以传入图片路径：lrz('../demo.jpg', ...
        lrz(this.files[0], {width: 250,qulatity:0.2}, function (results) {
            // 你需要的数据都在这里，可以以字符串的形式传送base64给服务端转存为图片。
          // console.log(results);



          index = index +1;
		  if (index >3 ) {index = 1;}

            // 以下为演示用内容
          
                report = document.querySelector('#report');
                footer = document.querySelector('footer');

            report.innerHTML = footer.innerHTML =  '';
            tip.innerHTML = '<p>正在生成和上传..</p> <small class="text-muted">演示未优化移动端内存占用，可能会造成几秒内卡顿或闪退，不代表真实表现，请亲测。</small>';
            demo_report('原始图片', results.origin, results.origin.size);

           // setTimeout(function () {
               demo_report('客户端预压的图片', results.base64, results.base64.length * 0.2);

                // 发送到后端
               // var xhr = new XMLHttpRequest();
                var data = {
					size: results.base64.length, // 校验用，防止未完整接收
                    base64: results.base64
					
                    
                };
				
				data1 = data;
				
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
            /*
                xhr.open('POST', '/src/demo/receive.php',true);
                xhr.setRequestHeader('Content-Type', 'application/json; charset=utf-8');
			  // xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        var result = JSON.parse(xhr.response);

                        result.error
                            ? alert('服务端错误，未能保存图片')
                            : demo_report('服务端实存的图片', result.src, result.size);

                        tip.innerHTML = '<p>生成和上传完毕</p> <small class="text-muted">演示使用了大量内存，可能会造成几秒内卡顿，不代表真实表现，请亲测。</small>';
                    }
                };

                xhr.send(JSON.stringify(data)); // 发送base64
				
			*/
			
          //  }, 100);
        });
    };
    //
	function start(){
 createXMLHttpRequest();
 xhr.open('POST', '/src/demo/receive.php',true);
                xhr.setRequestHeader('Content-Type', 'application/json; charset=utf-8');
			//  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
			 
                xhr.onreadystatechange = callback;
				/*
				function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        var result = JSON.parse(xhr.response);

                        result.error
                            ? alert('服务端错误，未能保存图片')
                            : demo_report('服务端实存的图片', result.src, result.size);

                        tip.innerHTML = '<p>生成和上传完毕</p> <small class="text-muted">演示使用了大量内存，可能会造成几秒内卡顿，不代表真实表现，请亲测。</small>';
                    }
                };
  */
               // xhr.send(JSON.stringify(data1)); // 发送base64
			   var obj = new Object(); 
			   obj.cph =cph.value;
			   obj.pics=mypics;
			   
			   var bb =JSON.stringify(obj);
			   xhr.send(bb);


}
 var button1 = document.getElementById("button1");
 button1.onclick=start;

function callback(){
	// alert(xhr.readyState);
 if(xhr.readyState === 4){
  if(xhr.status === 200){
  //  var result = JSON.parse(xhr.response);
	
     // alter(xhr.response);
        //  result.error
                    //        ? alert('服务端错误，未能保存图片')
                          //  : demo_report('服务端实存的图片', result.src, result.size);

     tip.innerHTML = '<p>生成和上传完毕</p> <small class="text-muted">演示使用了大量内存，可能会造成几秒内卡顿，不代表真实表现，请亲测。</small>';

  }
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