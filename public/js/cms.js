function parHeight() {
	var h = $(".side-body").height();
	var hH3 = $(".side-bar > h3").height();
	//$("fieldset").last().css('margin-bottom',0);
	//$("div.actions").last().css('margin-bottom',0);
	$("div.side-wrap").css('height',(h-hH3));
}

$(function() {
	
	//Pareggia altezze
	parHeight();
	
	//$("#text-area").wymeditor({skin:'compact', lang:'it'});
	
});