jQuery(function ($) {

	// Selectively hide menu items on small screens
	if($(window).width() >= 600) {

		var full_featured_image = $('#featured').attr('full');
		$('#featured img').attr('src', full_featured_image);
	} else {
		$('.mildendo-desktop-buttons').hide();
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
