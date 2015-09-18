/* tanzhouedu v1.0 Arry .@CopyRight2015 http://www.tanzhouedu.com/*/
$.tzLoading = function(opts){
	// 如果插件存在就删除
	$("#tz_loading").remove();
	// 创建一个插件的模板
	var $loading = $("<div id='tz_loading' class='tz_loading'><i id='icon_loading'><img src='images/loading.gif'></i>"+opts.content+"</div>");
	// 追加模板
	$("body").append($loading);
	// 动态设置宽度和高度
	if(opts.width){$loading.width(opts.width);}
	if(opts.height){$loading.height(opts.height).css("lineHeight",opts.height+"px");}
	// 居中定位插件
	tz_center_loading($loading);
	// 浏览器窗口改变的时候居中定位
	initEvent($loading,opts);
};
// 设置动态居中的算法
function tz_center_loading($loading){
	var width = $loading.width(); //计算loading的宽度
	var height = $loading.height(); // loading的高度
	
	var ww = $(window).width(); // 浏览器的可见的宽度
	var wh = $(window).height(); // 浏览器的可见的高度
	var left = (ww - width) / 2;
	var top = (wh - height) / 2;
	$loading.css({top:top,left:left}); // 设置坐标位置
}

var timer = null;
// 浏览器窗口改变的时候居中定位
function initEvent($loading,opts){
	$(window).resize(function(){
		tz_center_loading($loading);
	});

	// 点击弹出层，消失掉
	$loading.click("click",function(){
		$(this).removeClass().addClass("tz_loading");
	});

	// 定时关闭
	if(opts.timeout){
		timer = setTimeout(function(){
			$loading.trigger("click");
		},opts.timeout*1000);
	}

}
