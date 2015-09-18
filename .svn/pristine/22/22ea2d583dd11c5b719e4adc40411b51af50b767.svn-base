/*
 *  Javascript文件：waterfall.js
 */
$(function(){
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
 var $pagecount = 1;

function start(flag){	
	if(flag == 1){
		$num = 0;
		$("#ul_list").empty();
	}
	var search =$("#numberInput").val();
	 if(search.length == 0){
		search = 0;
	 }
	if($pagecount > $num){

		 $.ajax({
			 url:'complainmanage_bgo.php',
			 type:'POST',
			 data:"num="+$num+"&search="+search,

			 dataType:'json',
			 success:function(json){
				 if(typeof json == 'object'){

					 var neirou,$row,$item;
					 $row =$("#ul_list");
					 $("#ul_list").siblings("#no-result").hide();
					 if(json.length == 0){
						 
						$("#ul_list").empty().siblings("#no-result").show();
					 }else{
						 
						$pagecount = json[0].pagecount;
						for(var i=1;i<json.length;i++){
							neirou = json[i];    //当前层数据
							$item = $(
							"<li>"+
								"<b class='select_btn'><img src='../images/img_2.png' alt='' width='40' height='40'/></b>"+
								"<a href='complaindetail.php?cdkey="+neirou.cdkey+"' class='li_link'>"+
									"<h3>"+
										"<span>"+neirou.keyword+"</span>"+
										"<span>"+neirou.carnum+"</span>"+
										"<span>"+neirou.stuffname+"</span>"+
										"<span>"+neirou.productlen+"</span>"+
										"<span>"+neirou.kindname+"</span>"+
									"</h3>"+
									"<p>"+
										"<span>"+neirou.updatetime+"</span>"+
									"</p>"+
								"</a>"+
								"<div class='tip'>"+
									"<div class='triangle'></div>"+
									"<div class='t_con'>"+
										"<input type='hidden' name='mes_id' id='mes_id' value='"+neirou.cdkey+"' />"+
										"<a href='complaindetail.php?cdkey="+neirou.cdkey+"' class='complain' class='complain'><i class='icon-reload'></i><br /><span>投诉信息</span></a>"+
										"<a href='../detail.php?cdkey="+neirou.cdkey+"' class='dump' class='dump'><i class='icon-road'></i><br /><span>现货信息</span></a>"+
									"</div>"+
								"</div>"+
							"</li>"
							);
							 $row.append($item);
							 $item.fadeIn();
						}
					 }
				}
			 }
		 });
		$num = $num + 1;
	}
}
