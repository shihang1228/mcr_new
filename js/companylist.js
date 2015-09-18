/*
 *  Javascript文件：waterfall.js
 */
$(function(){
	//用js设置cookie
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
		$(".company").empty();
	}

	if(getCookie("localFlag") == 0){
		
	}//session = 0;未点链接
	else if(getCookie("localFlag") == 1){ //localFlag == 1 时，说明进过详细页
		//alert("进入过链接");
		var localMes = localStorage.getItem("localMes");
		if(localMes){
			$(".company").html(localMes);
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


	var keyword=0;
    if(document.getElementById("numberInput").length == 0){
    	keyword = 0;
    }else{
		keyword = document.getElementById("numberInput").value;
    }

    if($num == $pagecount){
		$(".loading").hide();
		$(".load_success").show();
	}

	if($pagecount > $num){
		$(".load_success").hide();
		$(".loading").show();
		 $.ajax({
			 url:'companylist_bgo.php',
			 type:'POST',
			 data:"num="+$num+"&companyword="+keyword,

			 dataType:'json',
			 success:function(json){
				 if(typeof json == 'object'){

					 var neirou,$row,iheight,$item;
					 $row =$(".company");
					 //设置默认隐藏
					 $(".load_success").hide();
					 $(".company").siblings("#no-result").hide();

					 if(json.length == 0){
						$(".loading").hide();
						$(".load_success").hide();
						$(".company").empty().siblings("#no-result").show();
					 }else{
						 
						$pagecount = json[0].pagecount;
						SetCookie("pagecount",$pagecount);   //将总页数保存到kookie里

						for(var i=1;i<json.length;i++){
							neirou = json[i];    //当前层数据
							if(neirou.pic == 0){
						 		$pic = "images/none.jpg";
						 	}else{
						 		$pic = neirou.pic.replace(".","s.");
							}

							  $item = $(
								"<a href='companyDetail.php?companyid="+neirou.companyid+"' class='company_a'>"+
									"<div class='wrap effect flex col1-3 padding14'>"+
										"<div class='img'>"+
											"<img src='"+$pic+"' width='70' height='70'>"+
										"</div>"+
										"<div class='right'>"+
											"<h2>"+neirou.companyname+"</h2>"+
											"<div class='keywords'>"+neirou.keyword+"</div>"+
										"</div>"+
									"</div>"+
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
						localStorage.setItem("localMes",$(".company").html());
						//alert(localStorage.getItem("localMes"));
						if($pagecount == 1){
							$(".loading").hide();
							$(".load_success").show();
						}
					 }
				}
			 }
		 });
		$num = $num+1;
	}
}
