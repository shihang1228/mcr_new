<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>Examples</title>
<meta name="description" content="">
<meta name="keywords" content="">
<link rel="stylesheet" type="text/css" href="/statics/css/yumReset.css" />
<link rel="stylesheet" type="text/css" href="/statics/css/yumPage.css" />
<link rel="stylesheet" type="text/css" href="/statics/css/buttons-min.css" />
<link rel="stylesheet" type="text/css" href="/com/tabs/css/tab.css" />
</head>
<body>
<header class="header">
	<h1>赶集网</h1>
	<ul>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</header>
<div id="demo" class="tabs_wrap">
	<ul class="tabs_list">
		<li class="curr">tabs1</li>
		<li>tabs2</li>
		<li>tabs3</li>
	</ul>
	<div class="tabs_con">
		<div class="tabs_con_wrap">
			<div id="tabsMove" class="tabs_move">
				<div>
					<ul class="list">
						<li class="list-item">
							<a href="#" class="clearfix">
								<div class="list-img"><img src="/statics/images/list0.jpg" /></div>
								<div class="list-text">
									<h2>新世纪花园 大红本</h2>
									<p>小店二手房出售-太原市小店区汾东北路</p>
									<div><button class="pure-button pure-button-primary">收藏</button></div>
								</div>
							</a>
						</li>
						<li class="list-item"></li>
						<li class="list-item"></li>
						<li class="list-item"></li>
					</ul>
					<ul class="list">
						<li class="list-item">
							<a href="#" class="clearfix">
								<div class="list-img"><img src="/statics/images/list0.jpg" /></div>
								<div class="list-text">
									<h2>新世纪花园 大红本</h2>
									<p>小店二手房出售-太原市小店区汾东北路</p>
									<div><button class="pure-button pure-button-primary">收藏</button></div>
								</div>
							</a>
						</li>
						<li class="list-item"></li>
						<li class="list-item"></li>
						<li class="list-item"></li>
					</ul>
				</div>
				<div>
					<ul class="list">
						<li class="list-item">
							<a href="#" class="clearfix">
								<div class="list-img"><img src="/statics/images/list0.jpg" /></div>
								<div class="list-text">
									<h2>新世纪花园 大红本</h2>
									<p>小店二手房出售-太原市小店区汾东北路</p>
									<div><button class="pure-button pure-button-primary">收藏</button></div>
								</div>
							</a>
						</li>
						<li class="list-item"></li>
						<li class="list-item"></li>
						<li class="list-item"></li>
					</ul>
					<ul class="list">
						<li class="list-item">
							<a href="#" class="clearfix">
								<div class="list-img"><img src="/statics/images/list0.jpg" /></div>
								<div class="list-text">
									<h2>新世纪花园 大红本</h2>
									<p>小店二手房出售-太原市小店区汾东北路</p>
									<div><button class="pure-button pure-button-primary">收藏</button></div>
								</div>
							</a>
						</li>
						<li class="list-item"></li>
						<li class="list-item"></li>
						<li class="list-item"></li>
					</ul>
				</div>
				<div>
					<ul class="list">
						<li class="list-item">
							<a href="#" class="clearfix">
								<div class="list-img"><img src="/statics/images/list0.jpg" /></div>
								<div class="list-text">
									<h2>新世纪花园 大红本</h2>
									<p>小店二手房出售-太原市小店区汾东北路</p>
									<div><button class="pure-button pure-button-primary">收藏</button></div>
								</div>
							</a>
						</li>
						<li class="list-item"></li>
						<li class="list-item"></li>
						<li class="list-item"></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
<script type="text/javascript" src="/com/tabs/js/Aui-core-1.42-min.js"></script>
<script>
Aui.ready(function() {
    var oWrap = Aui("#demo"),
    oTabs = oWrap.find("li"),
    oTabsLen = oTabs.length,
    oMove = Aui("#tabsMove"),
    nWidth = oMove.children().eq(0).width(),
    iTimer = null,
    oPrev = Aui("#tabsPrev"),
    oNext = Aui("#tabsNext"),
    IDX = 0;

    oTabs.bind("click",
    function() {
        var _this = Aui(this);

        IDX = _this.index();

        _this.addClass("curr").siblings().removeClass("curr");

        oMove.stop().fx({
            left: -nWidth * IDX
        },
        200);
    });
    oPrev.bind("click",
    function() {
        if (IDX > 0) {
            IDX -= 1;
        } else {
            IDX = oTabsLen - 1;
        };

        oMove.stop().fx({
            left: -nWidth * IDX
        },
        200);

        oTabs.eq(IDX).addClass("curr").siblings().removeClass("curr");

        return false;
    });
    oNext.bind("click",
    function() {

        if (IDX < oTabsLen - 1) {
            IDX += 1;
        } else {
            IDX = 0;
        };

        oMove.stop().fx({
            left: -nWidth * IDX
        },
        200);

        oTabs.eq(IDX).addClass("curr").siblings().removeClass("curr");
        return false;
    });
});
</script>
</html>