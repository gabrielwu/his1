$(function(){
	$("#left h3").each(function() {
		$(this).click(function() {
			$(this).next("p").slideToggle();
		})
	});
});