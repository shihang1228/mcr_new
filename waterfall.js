/*
 *  Javascript文件：waterfall.js
 */
$(function(){
	
	/*alert("jareaselect:" + jareaselect);
	alert("jstuffselect:" + jstuffselect);
	alert("productlen:" + productlen);
	alert("productwide:" + productwide);
	alert("thinckness:" + thinckness);
	alert("timber:" + timber);*/
     jsonajax();
 });
 
 //这里就要进行计算滚动条当前所在的位置了。如果滚动条离最底部还有100px的时候就要进行调用ajax加载数据
 $(window).scroll(function(){    
     //此方法是在滚动条滚动时发生的函数
     // 当滚动到最底部以上100像素时，加载新内容
     var $doc_height,$s_top,$now_height;
     $doc_height = $(document).height();        //这里是document的整个高度
     $s_top = $(this).scrollTop();            //当前滚动条离最顶上多少高度
     $now_height = $(this).height();            //这里的this 也是就是window对象
     if(($doc_height - $s_top - $now_height) < 100) jsonajax();    
 });
 
 
 //做一个ajax方法来请求data.php不断的获取数据
 var $num = 0;
 function jsonajax(){
    var jareaselect =document.getElementById("areaselect").value;
    var jstuffselect = document.getElementById("stuffselect").value;
	var productlen=document.getElementById("productlen").value;
	var productwide=document.getElementById("productwide").value;
	var thinckness=document.getElementById("thinckness").value;
	var diameterlen=document.getElementById("diameterlen").value;
	var timber=document.getElementById("timber").value;
	var jkindselect =document.getElementById("kindselect").value;

     $.ajax({
         url:'getdatalist.php',
         type:'POST',
         data:"num="+($num++)+"&areaselect="+jareaselect+"&kindselect="+jkindselect+"&stuffselect="+jstuffselect
	  +"&productlen="+productlen+"&productwide="+productwide+"&thinckness="+thinckness+"&diameterlen="+diameterlen
	  +"&timber="+timber,
		/*"num="+$num+"&type=1&areaselect="+jareaselect+"&kindselect="+jkindselect+"&stuffselect="+jstuffselect
	  +"&productlen="+productlen+"&productwide="+productwide+"&thinckness="+thinckness+"&diameterlen="+diameterlen
	  +"&timber="+timber*/

         dataType:'json',
         success:function(json){
             if(typeof json == 'object'){
                 var neirou,$row,iheight,$item;
                 for(var i=0;i<json.length;i++){
                     neirou = json[i];    //当前层数据
					  $row =$("#showdata1 ul");
					// alert(neirou[0]);
					 //alert(neirou[1]);
					// alert(neirou[2]);

                     /*$("#stage li").each(function(){
                         //得到当前li的高度
                         temp_h = Number($(this).height());
                         if(iheight == -1 || iheight >temp_h){
                             iheight = temp_h;
                             $row = $(this); //此时$row是li对象了
                         }
                     });*/
					//alert(json[0]);
                     $item = $(
						"<li class='list-item'>"+
							"<a href='detail.php?productid="+neirou.productid+"' class='clearfix'>"+
								"<div class='list-left'><span>"+neirou.carnum+"  "+neirou.productlen+"米"+neirou.stuffname+"   "+neirou.wide+"*"+neirou.thinckness+"   "+neirou.portname+"   "+neirou.updatetime+"</span></div>"+
								"<div class='list-right'><i class='icon-chevron-right'></i></div>"+
							"</a>"+
						"</li>"
					 
					 );	
                     $row.append($item);
                     $item.fadeIn();
                 }

            }
         }
     });
 }