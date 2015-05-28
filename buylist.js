/*
 *  Javascript文件：waterfall.js
 */
$(function(){
	 $("#areaselect").val("0");
	 $("#stuffselect").val("0");
	 $("#kindselect").val("0");
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
	var url=""
	var jkindselect =document.getElementById("kindselect").value;
	var productlen=0 ,productwide=0,thinckness=0,diameterlen=0;
	var timber="";
	var kindselect_1 = $("#kindselect_1"),
		kindselect_2 = $("#kindselect_2"),
		kindselect_3 = $("#kindselect_3"),
		kindselect_4 = $("#kindselect_4");
	if (jkindselect == 1){
		kindselect_1.hide();
		kindselect_2.hide();
		kindselect_3.show();
		kindselect_4.show();
	} else{
		kindselect_1.show();
		kindselect_2.show();
		kindselect_3.hide();
		kindselect_4.hide();
	}

	$num = 0;
	$pagecount = 0;

	var areaselect=0,stuffselect=0,kindselect=0;

    areaselect =document.getElementById("areaselect").value;
    stuffselect = document.getElementById("stuffselect").value;
	kindselect =document.getElementById("kindselect").value;

	if($pagecount >= $num){

		 $.ajax({
			 url:'buylist_bgo.php',
			 type:'POST',
			 data:"num="+($num++)+"&areaselect="+areaselect+"&kindselect="+kindselect+"&stuffselect="+stuffselect,

			 dataType:'json',
			 success:function(json){
				 if(typeof json == 'object'){

					 var neirou,$row,iheight,$item;
					 $row =$("#qiugou").empty();
					 if(json.length == 0){
						 
						$("#qiugou").empty().append("<p class='no_result'>没有查询到您所要的内容</p>");
					 }else{
						 
						$pagecount = json[0].pagecount;
						for(var i=1;i<json.length;i++){
							neirou = json[i];    //当前层数据

							  $item = $(
								"<a href='buyDetail.php?"+neirou.buyid+"'>"+
									"<ul class='flex table'>"+
										"<li>"+neirou.portname+"</li><li>"+neirou.stuffname+"</li><li>"+neirou.productlen+"米</li><li>"+neirou.kindname+"</li><li>"+neirou.price+"</li><li>"+neirou.updatetime+"</li><li><i class='icon-chevron-right'></i></li>"+
									"</ul>"+
								"</a>"
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

	var areaselect=0,stuffselect=0,kindselect=0;

    areaselect =document.getElementById("areaselect").value;
    stuffselect = document.getElementById("stuffselect").value;
	kindselect =document.getElementById("kindselect").value;

	if($pagecount > $num){
		 $.ajax({
			 url:'buylist_bgo.php',
			 type:'POST',
			 data:"num="+($num=($num+1))+"&areaselect="+areaselect+"&kindselect="+kindselect+"&stuffselect="+stuffselect,

			 dataType:'json',
			 success:function(json){
				 if(typeof json == 'object'){
					 var neirou,$row,iheight,$item,$bianhua;
					 
					 $pagecount = json[0].pagecount;
					 for(var i=1;i<json.length;i++){
						 neirou = json[i];    //当前层数据
						
						 $row =$("#qiugou");
						 $item = $(

							"<a href='buyDetail.php?buyid="+neirou.buyid+"'>"+
								"<ul class='flex table'>"+
									"<li>"+neirou.portname+"</li><li>"+neirou.stuffname+"</li><li>"+neirou.productlen+"米</li><li>"+neirou.kindname+"</li><li>"+neirou.price+"</li><li>"+neirou.updatetime+"</li><li><i class='icon-chevron-right'></i></li>"+
								"</ul>"+
							"</a>"
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