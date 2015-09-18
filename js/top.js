// 点击回到顶部
$("#s_btn").click(function(){
	$("html,body").animate({
		scrollTop:0
	},1000);
});

// 滑动滚动条
$(window).scroll(function(){
	// 滚动条距离顶部的距离 大于 200px时
	if($(window).scrollTop() >= 60){
		$(".scroll_top").fadeIn(500); // 开始淡入
	} else{
		$(".scroll_top").stop(true,true).fadeOut(500); // 如果小于等于 200 淡出
	}
});