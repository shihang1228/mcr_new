String.prototype.isEmpty = function(){
	var val = this;
	val = $.trim(val);
	if (val== null)
		return true;
	if (val == undefined || val == 'undefined')
		return true;
	if (val == "")
		return true;
	if (val.length == 0)
		return true;
	if (!/[^(^\s*)|(\s*$)]/.test(val))
		return true;
	return false;
};

String.prototype.isNotEmpty = function(){
	return !this.isEmpty();
}

String.prototype.replaceAll = function(str,target){
	return this.replace(new RegExp(str,"ig"),target);
}

var tzUtil = {

	_position : function($dom){//居中定位
		var windowWidth = $(window).width();
		var windowHeight= $(window).height();
		var width = $dom.width();
		var height = $dom.height();
		var left = (windowWidth - width)/2;
		var top = (windowHeight - height)/2;
		$dom.css({left:left,top:top});
		return this;
	},

	_positionParent : function($dom,$parent){//居中定位
		var parentWidth = $parent.width();
		var parentHeight= $parent.height();
		var width = $dom.width();
		var height = $dom.height();
		var left = (parentWidth - width)/2;
		var top = (parentHeight - height)/2;
		$dom.css({left:left,top:top});
		return this;
	},

	resize : function($dom){
		var $this = this;
		$(window).resize(function(){
			$this._position($dom);	
		});
	},
	animates:function($dom,mark){
		switch(mark){
			case "fadeOut":$dom.fadeOut("slow",function(){$(this).remove();});break;
			case "slideUp":$dom.slideUp("slow",function(){$(this).remove();});break;
			case "fadeIn":$dom.fadeIn("slow");break;
			case "slideDown":$dom.slideDown("slow");break;
			case "left":$dom.animate({left:0},300,function(){$(this).remove();});break;
			case "top":$dom.animate({top:0},300,function(){$(this).remove();});break;
		}
	},

	isEmpty:function(str){
		val = $.trim(val);
		if (val == null)
			return true;
		if (val == undefined || val == 'undefined')
			return true;
		if (val == "")
			return true;
		if (val.length == 0)
			return true;
		if (!/[^(^\s*)|(\s*$)]/.test(val))
			return true;
		return false;
	},

	isNotEmpty:function(str){
		return !this.isEmpty(str);
	},
	getRandomColor : function(){
	  return '#'+Math.floor(Math.random()*16777215).toString(16);
	},	

	forbiddenSelect : function(){
		$(document).bind("selectstart", function() {
			return false;
		});
		document.onselectstart = new Function("event.returnValue=false;");
		$("*").css({
			"-moz-user-select" : "none"
		});
	},

	autoSelect : function() {
		$(document).bind("selectstart", function() {
			return true;
		});
		document.onselectstart = new Function("event.returnValue=true;");
		$("*").css({
			"-moz-user-select" : ""
		});
	}
};