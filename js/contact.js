$(function(){
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

	// submit按钮

	var $submit = $('#submit');

	$submit.on("mouseover",function(){
		$submit.css({"background": "#02D7FD","opacity":"0.3"})
				.animate({opacity:1});
	});
	$submit.on("mouseout",function(){
		$submit.css({"background": "#ccc"},600);
	});


});