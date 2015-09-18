/*
 *  Javascript文件：waterfall.js
 */
$(function(){
	$(".load_success").hide();
    //SetCookie("localFlagSearch","0");
    if(getCookie("localFlagSearch") == null){
    	SetCookie("localFlagSearch","0");
    }
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
 var $pagecount = 1;

function start(flag){	
	if(flag == 1){
		$num = 0;
		$("#ul_list").empty();
	}

	if(getCookie("localFlagSearch") == 0){
		
	}//session = 0;未点链接
	else if(getCookie("localFlagSearch") == 1){ //localFlagSearch == 1 时，说明进过详细页
		//alert("进入过链接");
		var localMes = localStorage.getItem("localMes");
		if(localMes){
			$("#ul_list").html(localMes);
		}
		SetCookie("localFlagSearch","0");
		$num = parseInt(getCookie("localPage"));
		$page = parseInt(getCookie("localPage"));
		//$pagecount = $num + 1;
		 //alert("$localPage:" + getCookie("localPage"));
		// alert("$localFlagSearch:" + getCookie("localFlagSearch"));
		// alert("$num:" + $num);
		// alert("$pagecount:" + getCookie("pagecount"));
		$pagecount = getCookie("pagecount");
		return;
	}//localFlagSearch == 1的结束

	var train=0,status=0,trainDate;
	trainDate = document.getElementById("selectDate").value;  //到货日期
	train = document.getElementById("train").value;
	status = document.getElementById("status").value;

	if(trainDate.length == 0){
		alert("请选择到货日期！");
		$("#selectDate").focus();
		return false;
	}

	if(train == 0){
		alert("请选择列！");
		$("#train").focus();
		return false;
	}

	if(status == 0){
		alert("请选择状态！");
		$("#status").focus();
		return false;
	}

	if($num == $pagecount){
		$(".loading").hide();
		$(".load_success").show();
	}

	if($pagecount > $num){
		$(".load_success").hide();
		$(".loading").show();
		 $.ajax({
			 url:'arrivalmanage_bgo.php',
			 type:'POST',
			data:"num="+$num+"&trainDate="+trainDate+"&train="+train+"&status="+status,

			 dataType:'json',
			 success:function(json){
				 if(typeof json == 'object'){

					 var neirou,$row,$item;
					 $row =$("#ul_list");
					 //设置默认隐藏
					 $(".load_success").hide();
					 $("#ul_list").siblings("#no-result").hide();

					 if(json.length == 0){
						$(".loading").hide();
						$(".load_success").hide();
						$("#ul_list").empty().siblings("#no-result").show();
					 }else{
						 
						$pagecount = json[0].pagecount;
						SetCookie("pagecount",$pagecount);   //将总页数保存到kookie里
						for(var i=1;i<json.length;i++){
							neirou = json[i];    //当前层数据
							/*判断原木*/
							if(neirou.kindname == "原木"){
								if ((neirou.diameterlen == 0) ||(neirou.timber ==0)) {
									$bianhua = "<span>"+neirou.kindname + "</span>";
								}else{
									$bianhua = "<span>" + neirou.diameterlen + "φ</span><span>" + neirou.timber + "</span>";
								}
							}else{
								
								if(neirou.wide == 0 || neirou.thinckness == 0 ){
									
									$bianhua = "<span>"+neirou.kindname + "</span>";
								}else{	
									$bianhua = "<span" + neirou.thinckness + "*" + neirou.wide + "</span>";
									if (neirou.kind_bj == 1){
										  if(neirou.widerange !=0 || neirou.thincknessrange !=0){
											   $bianhua = "<span>" + neirou.thinckness + "*" + neirou.wide + "起</span>";
										  }
									}
								}
							}
							/*判断长度不为0时*/
							if(neirou.productlen == 0){
								$productlen = "";
							}else{
								$productlen = neirou.productlen;
							}

							$item = $(
							"<li>"+
								"<b class='select_btn'><img src='../images/img_2.png' alt='' width='40' height='40'/></b>"+
								"<a href='../detail.php?cdkey="+neirou.cdkey+"' class='li_link'>"+
									"<h3>"+
										"<span>"+neirou.carnum+"</span>"+
										"<span>"+neirou.stuffname+"</span>"+
										"<span>"+$productlen+"</span>"+$bianhua+
									"</h3>"+
									"<p>"+
										"<span>"+neirou.completestatus+"</span><span>"+neirou.username+"</span><span>浏览次数："+neirou.viewnum+"</span>"+"<span>"+neirou.dumpposition+"</span>"+
									"</p>"+
								"</a>"+
								"<div class='tip'>"+
									"<div class='triangle'></div>"+
									"<div class='t_con'>"+
										"<input type='hidden' name='mes_id' id='mes_id' value='"+neirou.cdkey+"' />"+
										"<a href='#' class='down' id='down'><i class='icon-download'></i><br /><span>下架</span></a>"+
										"<a href='../wxrelease.php?cdkey="+neirou.cdkey+"'><i class='icon-pencil'></i><br /><span>修改</span></a>"+
									"</div>"+
								"</div>"+
							"</li>"
							);
							$row.append($item);
							 $item.fadeIn();
						}
						
						if(json.length >= 2){
							$page++;
						}

						SetCookie("localPage",$page);  //将当前页保存到cookie里
						//alert("$page=" + $page);
						localStorage.setItem("localMes",$("#ul_list").html());
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
