/*
 *  Javascript文件：waterfall.js
 */
$(function(){
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
 var $num = -1;
 var $pagecount = 0;

function start(type,page){	

	$num = 0;
	$pagecount = 0;

	var jstuffselect=0,productwide=0,thinckness=0;

	stuffselect = document.getElementById("stuffselect").value;
		
	if(document.getElementById("productwide").value.length == 0){
		productwide=0;
	}else{
		productwide=document.getElementById("productwide").value;
	}
		
	if(document.getElementById("thinckness").value.length == 0){
		thinckness=0;
	}else{
		thinckness=document.getElementById("thinckness").value;
	}	

	if($pagecount >= $num){

		 $.ajax({
			 url:'getboardlist.php',
			 type:'POST',
			 data:"num="+($num++)+"&stuffselect="+stuffselect+"&productwide="+productwide+"&thinckness="+thinckness,

			 dataType:'json',
			 success:function(json){
				 if(typeof json == 'object'){

					 var neirou,$row,iheight,$item;
					 $row =$("#goodslist").empty();
					 if(json.length == 0){

						$("#goodslist").empty().append("<p class='no_result'>没有查询到您所要的内容</p>");
					 }else{
						 
						$pagecount = json[0].pagecount;
						for(var i=1;i<json.length;i++){
							neirou = json[i];    //当前层数据

							if(neirou.wide == 0 || neirou.thinckness == 0 ){
								
								$bianhua = neirou.kindname;
							}else{	
								$bianhua = neirou.wide + "*" + neirou.thinckness;
							}
							
							
						 "<tr><th>"+neirou.carnum+"</th><th>"+neirou.stuffname+"</th><th>"+neirou.productlen+"米</th><th>"+$bianhua+"</th><th>"+neirou.portname+"</th><th>"+neirou.updatetime+"</th></tr>";

							 $item = $(
								"<tr><th>"+neirou.carnum+"</th><th>"+neirou.stuffname+"</th><th>"+neirou.productlen+"米</th><th>"+$bianhua+"</th><th>"+neirou.portname+"</th><th>"+neirou.updatetime+"</th></tr>";				 
							 );	
							 $(".no_result").empty();
							 $row.append($item);
							 $item.fadeIn();
						}
					 }
				}
			 }
		 });
	}
}


 function jsonajax(){
	var jareaselect=0,jstuffselect=0,productlen=0,productwide=0,thinckness=0,diameterlen=0,timber=0,jkindselect=0;

    jareaselect =document.getElementById("areaselect").value;
    jstuffselect = document.getElementById("stuffselect").value;
	jkindselect =document.getElementById("kindselect").value;
	timber=document.getElementById("timber").value;
	
	if(document.getElementById("productlen").value.length == 0){
		productlen=0;
	}else{
		productlen=document.getElementById("productlen").value;
	}
		
	if(document.getElementById("productwide").value.length == 0){
		productwide=0;
	}else{
		productwide=document.getElementById("productwide").value;
	}
		
	if(document.getElementById("thinckness").value.length == 0){
		thinckness=0;
	}else{
		thinckness=document.getElementById("thinckness").value;
	}	

	if(document.getElementById("diameterlen").value.length == 0){
		diameterlen=0;
	}else{
		diameterlen=document.getElementById("diameterlen").value;
	}

	if($pagecount > $num){
		 $.ajax({
			 url:'getboardlist.php',
			 type:'POST',
			 data:"num="+($num++)+"&stuffselect="+stuffselect+"&productwide="+productwide+"&thinckness="+thinckness,

			 dataType:'json',
			 success:function(json){
				 if(typeof json == 'object'){
					 var neirou,$row,iheight,$item,$bianhua;
					 $pagecount = json[0].pagecount;
					 for(var i=1;i<json.length;i++){
						 neirou = json[i];    //当前层数据
						
						 if(neirou.kindname == "原木"){
							if(neirou.diameterlen == 0) {
								$bianhua = neirou.kindname;
							}else{
								$bianhua = neirou.diameterlen + "φ " + neirou.timber;
							}
						}else{
							if(neirou.wide == 0 || neirou.thinckness == 0){
								$bianhua = neirou.kindname;
							}else{	
								$bianhua = neirou.wide + "*" + neirou.thinckness;
							}
						}

						 $row =$("#showdata1 ul");
						 $item = $(
							"<li class='list-item'>"+
								"<a href='detail.php?productid="+neirou.productid+"' class='clearfix'>"+
									"<div class='list-left'><span>"+neirou.carnum+"  "+neirou.productlen+"米"+neirou.stuffname+"   " + $bianhua +"   "+neirou.portname+"   "+neirou.updatetime+"</span></div>"+
									"<div class='list-right'><i class='icon-chevron-right'></i></div>"+
								"</a>"+
							"</li>"
						 
						 );	
						 $(".no_result").empty();
						 $row.append($item);
						 $item.fadeIn();
					 }

				}
			 }
		 });
	}
 }