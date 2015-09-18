function message() {
	var a = $.blinkTitle.show();
	setTimeout(function() {
		$.blinkTitle.clear(a)
	}, 8e3)
}

/*====js判断某个值是否在某个数组中=========*/
function in_array(stringToSearch, arrayToSearch) {
 for (s = 0; s < arrayToSearch.length; s++) {
  thisEntry = arrayToSearch[s].toString();
  if (thisEntry == stringToSearch) {
   return true;
  }
 }
 return false;
}

/*显示发送日期 start*/
function currentTime(){	
	var e = new Date,
		f = "";
	f += e.getFullYear() + "-", f += e.getMonth() + 1 + "-", f += e.getDate() + "  ", f += e.getHours() + ":", f += e.getMinutes() + ":", f += e.getSeconds();	
	return f;
}
/*end 显示发送日期*/

/*=============*/
$(document).ready(function() {
	var storage = [];
	var a = 1,
		b = $("#userpic").val(),//本人的头像
		d = $("#username").val();   //王旭 -> 人名
		if(b.length == 0){
			b = "images/chat_img/2022.jpg";
		}

/*如果是医生登录的话，要先加载右侧患者列表，列表为患者联系过医生并发送过消息才会加载*/

	//var target_id = $("#target_id").val();
	/*点击发送按钮执行的事件 start*/
		function e() {
			var g = $("#textarea").val();   //获取输入框里面的内容
			var i = 
				/*本人发送的内容 start*/
				"<div class='message clearfix'>"+
					"<div class='user-logo'>"+
						"<img src='" + b + "' width='50' height='50'/>" + //图片logo
					"</div>" + 
					"<div class='wrap-text'>" + 
						"<h5 class='clearfix'>"+d+"</h5>" + //本人姓名
						"<div>" + g + "</div>" + //文本框内容
					"</div>" + 
					"<div class='wrap-ri'>" + 
						"<div clsss='clearfix'>" +
							"<span>" + currentTime() + "</span>"+  //发送日期
						"</div>" + 
					"</div>" + 
					"<div style='clear:both;'></div>" + 
				"</div>";
				/*end 本人发送的内容*/ 
				if(null == g || "" == g || g.lengh == 0){
					alert("请输入聊天内容");
					return false;
				}else{
					$.ajax({
						url:"chat_bgo.php",
						type:"POST",
						data:"content=" + g,
						success:function(){
							$(".mes" + a).append(i);
							$(".chat01_content").scrollTop($(".mes" + a).height());
							$("#textarea").val("");
						}
					})
				}
			/*============判断输入框是否有内容，如果有，则把消息append到聊天框里，并控制滚动的距离为显示最新的记录，否则提示请输入聊天内容==============*/
			// null != g && "" != g ? ($(".mes" + a).prepend(i), $(".chat01_content").scrollTop(0), $("#textarea").val("")) : alert("\u8bf7\u8f93\u5165\u804a\u5929\u5185\u5bb9!") //请输入聊天内容
		}
		/*end 点击发送按钮执行的事件*/

		$("body").on("click",".chat02_bar img",function(){  //点击发送按钮
			e();
		}), 


		document.onkeydown = function(a) {
			var b = document.all ? window.event : a;
			return 13 == b.keyCode ? (e(), !1) : void 0
		}, $.fn.setCursorPosition = function(a) {
			return 0 == this.lengh ? this : $(this).setSelection(a, a)
		}, $.fn.setSelection = function(a, b) {
			if (0 == this.lengh) return this;
			if (input = this[0], input.createTextRange) {
				var c = input.createTextRange();
				c.collapse(!0), c.moveEnd("character", b), c.moveStart("character", a), c.select()
			} else input.setSelectionRange && (input.focus(), input.setSelectionRange(a, b));
			return this
		}, $.fn.focusEnd = function() {
			this.setCursorPosition(this.val().length)
		}


	}),   //ready

	/*显示新消息*/
	function(a) {
		a.extend({
			blinkTitle: {
				show: function() {
					var a = 0,
						b = document.title;
					if (-1 == document.title.indexOf("\u3010")) var c = setInterval(function() {
						a++, 3 == a && (a = 1), 1 == a && (document.title = "\u3010\u3000\u3000\u3000\u3011" + b), 2 == a && (document.title = "\u3010\u65b0\u6d88\u606f\u3011" + b)
					}, 500);
					return [c, b]
				},
				clear: function(a) {
					a && (clearInterval(a[0]), document.title = a[1])
				}
			}
		})
	}(jQuery); 