/*
 *  Javascript文件：waterfall.js
 */
$(function(){
	$(".load_success").hide();
	//SetCookie("localFlag","0");
    if(getCookie("localFlag") == null){
    	SetCookie("localFlag","0");
    }
    start();
	 
 });
 
 //这里就要进行计算滚动条当前所在的位置了。如果滚动条离最底部还有100px的时候就要进行调用ajax加载数据
 $(window).scroll(function(){    
     //此方法是在滚动条滚动时发生的函数
     // 当滚动到最底部以上100像素时，加载新内容
     var $doc_height,$s_top,$now_height;
     $doc_height = $(document).height();        //这里是document的整个高度
     $s_top = $(this).scrollTop();            //当前滚动条离最顶上多少高度
     $now_height = $(this).height();            //这里的this 也是就是window对象
     if(($doc_height - $s_top - $now_height) < 100) start();    
 });
 
 
 //做一个ajax方法来请求data.php不断的获取数据
 var $num = 0;
 var $page = 0;
 var $pagecount = 1;

function start(flag){	
	if(flag == 1){
		$num = 0;
		$("#goodslist").empty();
	}

	if(getCookie("localFlag") == 0){
		
	}//session = 0;未点链接
	else if(getCookie("localFlag") == 1){ //localFlag == 1 时，说明进过详细页
		//alert("进入过链接");
		var localMes = localStorage.getItem("localMes");
		if(localMes){
			$("#goodslist").html(localMes);
		}
		SetCookie("localFlag","0");
		$num = parseInt(getCookie("localPage"));
		$page = parseInt(getCookie("localPage"));
		//$pagecount = $num + 1;
		 //alert("$localPage:" + getCookie("localPage"));
		// alert("$localFlag:" + getCookie("localFlag"));
		// alert("$num:" + $num);
		// alert("$pagecount:" + getCookie("pagecount"));
		$pagecount = getCookie("pagecount");
		return;
	}//localFlag == 1的结束

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
	var productlen=0,stuffselect=0,kindselect=0;

    productlen =document.getElementById("productlen").value;
    stuffselect = document.getElementById("stuffselect").value;
	kindselect =document.getElementById("kindselect").value;

	if($num == $pagecount){
		$(".loading").hide();
		$(".load_success").show();
	}
	
	if($pagecount > $num){
		$(".load_success").hide();
		$(".loading").show();

		 $.ajax({
			 url:'buylist_bgo.php',
			 type:'POST',
			 data:"num="+$num+"&productlen="+productlen+"&kindselect="+kindselect+"&stuffselect="+stuffselect,
			 dataType:'json',
			 success:function(json){
			 	$(".tz_loading").hide();
				 if(typeof json == 'object'){

					 var neirou,$row,iheight,$item,$bianhua;
					 $row =$("#goodslist");
					//设置默认隐藏
					 $(".load_success").hide();
					 $("#goodslist").siblings("#no-result").hide();

					 if(json.length == 0){
						 
						$(".loading").hide();
						$(".load_success").hide();
						$("#goodslist").empty().siblings("#no-result").show();
					 }else{
						 
						$pagecount = json[0].pagecount;
						SetCookie("pagecount",$pagecount);   //将总页数保存到kookie里
						for(var i=1;i<json.length;i++){
							neirou = json[i];    //当前层数据
							
							 /*判断原木*/
							if(neirou.kindname == "原木"){
								if ((neirou.diameterlen == 0) ||(neirou.timber ==0)) {
									$bianhua = "<li>"+neirou.kindname + "</li>";
								}else if(neirou.diameterlenMax == 0){
									$bianhua = "<li>" + neirou.diameterlen + "φ &nbsp;&nbsp;" + neirou.timber + "</li>";
								}else{
									$bianhua = "<li>" + neirou.diameterlen + "~"+neirou.diameterlenMax + "φ &nbsp;&nbsp;" + neirou.timber + "</li>";
								}
							}else{
								
								if(neirou.wide == 0 || neirou.thinckness == 0 ){
									
									$bianhua = "<li>"+neirou.kindname + "</li>";
								}else{	
									$bianhua = "<li>" + neirou.thinckness + "*" + neirou.wide + "</li>";
									if (neirou.kind_bj == 1){
										  if(neirou.widerange == 2 || neirou.thincknessrange == 2){
											   $bianhua = "<li>" + neirou.thinckness + "*" + neirou.wide + "起</li>";
										  }
									}
								}
							}
							/*判断长度不为0时*/
							if(neirou.productlen == 0){
								$productlen = "";
							}else{
								$productlen = neirou.productlen ;
							}
							
							if(neirou.refcapacity ==0) {
								$refcapacity="";
							}else{
								$refcapacity= neirou.refcapacity +"m³";
							}

							  $item = $(
								"<a href='buyDetail.php?buyid="+neirou.buyid+"'>"+
									 "<ul class='list table tableq5 flex borBottom'>"+
										"<li>"+neirou.stuffname+"</li><li>"+$productlen+"</li>"+$bianhua+"<li>"+$refcapacity+"</li><li>"+neirou.updatetime1+"</li>"+
									"</ul>"+
							    "</a>"
							 );	
							  $row.append($item);
							 $item.fadeIn();
						}
						if(json.length >= 2){
							$page++;
						}
						SetCookie("localPage",$page);  //将当前页保存到cookie里
						//alert("$page=" + $page);
						localStorage.setItem("localMes",$("#goodslist").html());
						//alert(localStorage.getItem("localMes"));
						if($pagecount == 1){
							$(".loading").hide();
							$(".load_success").show();
						}
					 }
				}
			 }
		 });
		$num = $num + 1;
	}
}
