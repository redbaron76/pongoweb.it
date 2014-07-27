$(function(){
	
	//Scroll menu
	$('#menu-nav a').click(function(){
		target = $(this).attr("href");
		destination = $(target).offset().top - 60;
		$('#menu-nav li').removeClass('active');
		$(this).parent().addClass('active');
		$("html,body").animate({ scrollTop: destination }),3000;
		return false;
	});
	
	$('.brand').click(function(){
		$('#menu-nav li').removeClass('active');
		$("html,body").animate({ scrollTop: 0 }),3000;
		return false;
	});
	
	$().UItoTop({ easingType: 'easeOutQuart' });
	$.trackPage('UA-27176205-1');
	$('#pongoweb').html('<a href="http://www.pongoweb.it"><img src="http://www.pongoweb.it/img/footer_icon.gif" width="100" height="25" /></a>');
	
});