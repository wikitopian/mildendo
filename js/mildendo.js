jQuery(function ($) {

	$("a").each(function(){
		$(this).attr("rel","external");
	});

	// Selectively hide menu items on small screens
	if($(window).width() < 750) {

		$('.mildendo-desktop-buttons').hide();
		$(".mildendo-widget > h3").click();

	}

	// Search box default text
	$('#search-mini').focus(function() { 
		if($(this).val() == $(this).attr('defaultValue')) {
			$(this).val('');
		}
	});
	$('#search-mini').blur(function() {
		if($(this).val() == '') {
			$(this).val($(this).attr('defaultValue'));
		} 
	});

});
