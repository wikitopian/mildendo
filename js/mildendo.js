jQuery(function ($) {
	if($(window).width() >= 600) {
		$('.mildendo-widget div').trigger('expand');

		var full_featured_image = $('#featured').attr('full');
		$('#featured img').attr('src', full_featured_image);
	} else {
		$('.mildendo-desktop-buttons').hide();
	}
});
