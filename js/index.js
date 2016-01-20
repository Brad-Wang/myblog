$(function(){
	// goTop 代码
	var $goTop = $("#go-top"),
	$html = $('html,body'),
	$header = $("#header");

	$(window).scroll(function(){
		// console.log($html.scrollTop());
		// console.log($header.height());
		if($(window).scrollTop() >= $header.height()){
			$goTop.css("display","block");
		};
		if($(window).scrollTop() <= $header.height()){
			$goTop.css("display","none");
		};
	});

	$goTop.click(function(event){		
		event.preventDefault();
		// 阻止默认行为
		$html.animate({scrollTop: 0},1000);
	});
	// nav代码（下拉导航栏）
	var $nav = $('#nav'),
	$navIconlist=$('.nav-icon-list',$nav),
	$navMenuBox=$('.nav-menu-box',$nav),
	$navIconClose=$('.nav-icon-close',$nav),
	$navMenu=$('.nav-menu',$navMenuBox),
	$scroll=$('.scroll',$navMenu);

	$navIconlist.on('click',function(){
		$navMenuBox.animate({top: 0});
	});
	
	$navIconClose.on('click',function(){
		$navMenuBox.animate({top: -192});
	});

	$scroll.click(function(event){		
		event.preventDefault();
		// 阻止默认行为
		$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
	});


	// portfolio代码（划过图片渐变以及背景图片变大）
	var $portfolio = $('#portfolio'),
	$show = $('.show',$portfolio),
	$mask = $('.mask',$show)
	imgWidth = $('.img',$show).width();
	imgHeight = $('.img',$show).height();

	$mask.on('mouseover',function(){
		$(this).stop().animate({opacity: 0.8},250)
				.siblings().stop().animate({
					width: imgWidth*1.1,
					height: imgHeight*1.1,
					left: -imgWidth*0.05,
					top: -imgHeight*0.05
				},250);
	});
	$mask.on('mouseout',function(){
		$(this).stop().animate({opacity: 0},250)
				.siblings().stop().animate({
					width: imgWidth,
					height: imgHeight,
					left: 0,
					top: 0
				},250);
	});


	$('a',$mask).Chocolat({linkImages:false});
	// projects代码（鼠标滑过背景变蓝色）

	var $projects = $('#projects'),
	$icons = $('.icons',$projects);

	$icons.on('mouseover',function(){
		$(this).css("background","#5DBED2");
	});
	$icons.on('mouseout',function(){
		$(this).css("background","#FFFFFF");
	});


	//??
	$blogHeadSection = $('#blog .head-section');
	var iHeadSectionTop = $blogHeadSection.offset().top,
			iHeadSectionHeight = $blogHeadSection.height();
	var bLoad = true;//判断是否该加载新数据
	var bLoaded = false;//判断本次请求的数据是不是加载完毕
	var isEnd = false;//判断是不是加载完数据库中的所有数据
	var page = 0;//控制分页

	function getMinUl(){
		$blogList = $('.blog-list');
		var $minUl =  $blogList.eq(0);
		for(var i=1; i<$blogList.length; i++){
			if($blogList.eq(i).height() < $minUl.height()){
				$minUl = $blogList.eq(i);
			}
		}
		return $minUl;
	}



	$(window).on('scroll', function(){

		if($(window).height()+$(window).scrollTop() >= iHeadSectionTop+iHeadSectionHeight && !isEnd){
			if(bLoad){
				bLoad = false;
				$.get('welcome/get_articles?page='+page, function(res){
					if(!res.isEnd){
						for(var i=0; i<res.data.length; i++){
							var blog = res.data[i];
							var html = '<li class="blog-artical">'
									+ '<div class="blog-artical-pic">'
									+ '<a href="blog/blog_login?blog_id='+blog.blog_id+'"><img src="'+blog.blog_photo+'" title="name" /></a>'
									+ '</div>'
									+ '<div class="blog-artical-info">'
									+ '<h3><a href="blog/blog_login?blog_id='+blog.blog_id+'">'+blog.title+'</a></h3>'
									+ '<span>'+blog.admin_name+' | <a href="#">13 comments</a></span>'
									+ '<p>'+blog.content+'</p>'
									+ '<a class="more-btn" href="#">See More</a>'
									+ '<div class="clearfix"> </div>'
									+ '</div>'
									+ '</li>';
							var $minUl = getMinUl();
							$minUl.append(html);
						}
						bLoaded = true;
						page += 6;
					}else{
						isEnd = true;
					}
				}, 'json');

			}


			var $minUl = getMinUl();
			if($(window).height()+$(window).scrollTop() >= $minUl.offset().top+$minUl.height() && bLoaded){
				bLoad = true;
				bLoaded = false;
			}
		}


	});
});

