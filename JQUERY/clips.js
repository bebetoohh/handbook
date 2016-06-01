//  检测Internet Explorer版本
$(document).ready(function(){
	if(navigator.userAgent.match(/msie/i)){
		alert('I am an old fashioned Ineternet Explorer');
	}
});


// 平稳滑动到页面顶部
$("a[href='#top'").click(function(){
	$("html,body").animate({scrollTop:0},"slow");
	return false;
});

// 固定在顶部
$(function(){
	var $win = $(window)
	var $nav = $('.mytoolbar');
	var navTop = $('.mytoolbar').length && $('.mytoolbar').offset().top;
	var isFixed = 0;

	processScroll()
	$win.on('scroll',processScroll)

	function processScroll(){
		var i, scrollTop = $win.scrollTop()

		if(scrollTop >= navTop && !isFixed){
			isFixed = 1
			$nav.addClass('subnav-fixed')
		}else if(scrollTop <= navTop && isFixed){
			isFixed = 0
			$nav.removeClass('subnav-fixed')
		}
	}
})

// 用其他内容取代html标志
$('li').replaceWith(function(){
	return $("<div />").append($(this).contents());
})

// 检测视窗宽度
var responsive_viewport = $(window).width();
// if is below 481px
if (responsive_viewport < 481){
	alert('Viewport is smaller than 481px');
}

// 自动定位并修复损坏图片
$('img').error(function(){
	$(this).attr('src','img/borken.png');
});

// 检测复制、粘贴和剪切的操作
$("#textA").bind('copy',function(){
	$('span').text('copy behaviour detected!')
});
$("#textA").bind('paste',function(){
	$('span').text('paste behaviour detected!')
});
$("textA").bind('cut',function(){
	$('span').text('cut behaviour detectd!')
});

// 遇到外部链接自动添加target="blank"属性
var root = location.protocol + '//' + location.host;
$('a').not(':contains(root)').click(function(){
	this.target = "_blank";
});

// 在图片上停留时逐渐增强或减弱的透明效果
$(document).ready(function(){
	$(".thumbs img").fadeTo("slow",0.6); //载入时自动变成60%透明效果
	$(".thumbs img").hover(function(){
		$(this).fadeTo("slow",1.0); // on hover时
	},function(){
		$(this).fadeTo("slow",0.6); // on mouseout时
	});
});

// 在文本或密码输入时禁止空格键
$('input.nospace').keydown(function(e){
	if(e.keyCode == 32){
		return false;
	}
})


// 返回顶部
// Back to top
$('a.top').click(function(e){
	e.preventDefault();
	$(document.body).animate({scrollTop:0},800);
});
//Useage:
//HTML中得有一个按钮
//<!-- Creat an anchor tag -->
//<a class="tag" href="#">Back to top</a>
//可以改变scrollTop的值来定位滚动条的位置




//图片预加载
//如果页面使用了很多不是最初加载便可见的图片，有必要进行预加载
$.preloadImages = function(){
	for(var i=0 ; i<arguments.length; i++){
		$('img').attr('src',arguments[i]);
	}
};
$.preloadImages('img/hover-on.png','img/hover-off.png');



//让两个div等高
//有时，需要让两个DIV保持等高，而不管两个DIV的内容如何
$('.div') .css('min-height',$(.main-div).height);
var $columns = $('.column');
var height = 0;
$columns.each(function(){
	if($(this).height()>height){
		height = $(this).height();
	}
});
$columns.height(height);




