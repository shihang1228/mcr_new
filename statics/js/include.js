/**
 * @authors Yumlee (543265835@qq.com)
 * @date    2015-05-27 14:47:10
 */
var navFixed ='';
 	navFixed+='<nav class="navFixed flex">',
	navFixed+='<a href="index.php"><i class="icon-home"></i><div>首页</div></a>',
	navFixed+='<a href="goodlist.php"><i class="icon-now-widgets"></i><div>现货</div></a>',
	navFixed+='<a href="release.php"><i class="icon-bullhorn"></i><div>发布</div></a>',
	navFixed+='<a href="user.php"><i class="icon-head"></i><div>我</div></a>',
	navFixed+='</nav>';
$("body").html(navFixed);