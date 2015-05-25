/**
 * 
 * @authors Yumlee (543265835@qq.com)
 * @date    2015-04-24 14:17:59
 * @version $Id$
 */
$(function(){
	var selectItem = $('.selectItem');
	selectItem.on('click',function () {
		this.children('.selectOption').toggle();
		alert(selectOption);
	})
})