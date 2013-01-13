jQuery(function ($) {
	if($(window).width() >= 600) {
		$('.mildendo-widget div').trigger('expand');
	} else {
		$('.mildendo-desktop-buttons').hide();
	}
});
