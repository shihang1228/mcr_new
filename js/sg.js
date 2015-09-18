
/*******************dialog**********************************/
//dialog的弹出层
$.tzConfirm = function(options){
	var opts = $.extend({},$.tzDialog.methods,$.tzDialog.defaults,options);
	opts.init(opts);
};

$.tzAlert = function(options){
	var opts = $.extend({},$.tzDialog.methods,$.tzDialog.defaults,options);
	var $dialog = opts.init(opts);
	$dialog.find(".tzdialog_cancel").remove();

};

$.tzDialog = {};

$.tzDialog.methods = {
	//初始化
	init:function(opts){
		var $dialog = this.template(opts);
		//弹出层事件初始化
		this.events($dialog,opts);
		this.params($dialog,opts);
		var btns = opts.buttons;
		for(var key in btns){
			$dialog.append("<a class='btns' href='javascript:void(0);'>"+key+"</a>&nbsp;&nbsp;")
		}
		$dialog.find("a.btns").click(function(){
			var text = $(this).text();
			btns[text].call($dialog);
		});	
		
		return $dialog;
	},
	params:function($dialog,opts){
		if(opts.width)$dialog.width(opts.width);
		if(opts.height){
			if(opts.height<=180)opts.height=180;
			$dialog.height(opts.height);
		}
		$dialog.find(".tzdialog_message").height(opts.height-130);
		//弹出层居中
		tzUtil._position($dialog);	
	},
	
	//弹出层的模板
	template : function(opts){
		var $dialog = $("<div class='tzui-diaolog'>"+
		"		<h1 class='tzdialog_title'>"+opts.title+"</h1>"+
		"		<div class='tzdialog_content tzui-empty'>"+
		"			<div class='tzdialog_message'>"+opts.content+"</div>"+
		"			<div class='tzdialog_panel'>"+
		"				<input type='button' value='&nbsp;"+opts.sureText+"&nbsp;' class='tzdialog_ok'> "+
		"				<input type='button' value='&nbsp;"+opts.cancelText+"&nbsp;' class='tzdialog_cancel'>"+
		"			</div>"+
		"		</div>"+
		"	</div>");
		$("body").append($dialog).append("<div class='tmui-overlay'></div>");
		return $dialog;
	},
	events:function($dialog,opts){
		//这个确定按钮事件
		$dialog.find(".tzdialog_ok").on("click",function(){
			if(opts.callback)opts.callback(true);//回调方法
			tzUtil.animates($dialog.next(),opts.animate);
			tzUtil.animates($dialog,opts.animate);
		});

		//关闭按钮事件
		$dialog.find(".tzdialog_cancel").on("click",function(){
			if(opts.callback)opts.callback(false);//回调方法
			tzUtil.animates($dialog.next(),opts.animate);
			tzUtil.animates($dialog,opts.animate);
		});

		//响应事件
		var timer = null;
		$(window).resize(function(){
			clearTimeout(timer);
			timer = setTimeout(function(){tzUtil._position($dialog);},30);
		})
	}
};

//弹出层的默认参数
$.tzDialog.defaults = {
	width:900,
	handle:".tzdiaog_title",
	height:300,
	title:"标题",
	drag:true,
	animate:"top",
	cancelText:"取消",
	sureText:"确定",
	callback:function(ok){
	},
	content:"请输入内容.请输入内容请输入内容请输入内容请输入内容请输入内容请输入内容请输入内容请输入内容请输入内容请输入内容请输入内容请输入内容请输入内容请输入内容请输入内容请输入内容请输入内容请输入内容请输入内容请输入内容请输入内容请输入内容请输入内容请输入内容请输入内容请输入内容请输入内容请输入内容请输入内容请输入内容请输入内容请输入内容请输入内容请输入内容请输入内容请输入内容请输入内容请输入内容请输入内容请输入内容请输入内容请输入内容请输入内容请输入内容请输入内容请输入内容请输入内容请输入内容请输入内容请输入内容请输入内容请输入内容请输入内容请输入内容请输入内容请输入内容请输入内容请输入内容请输入内容请输入内容请输入内容.."
};










