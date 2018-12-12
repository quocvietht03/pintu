!(function($){
	"use strict";
	jQuery(document).ready(function($) {
		function bt_BackTop() {
			$('#site_backtop').on('click', function() {
				$('html,body').animate({
					scrollTop: 0
				}, 400);
				return false;
			});

			if ($(window).scrollTop() > 300) {
				$('#site_backtop').addClass('active');
			} else {
				$('#site_backtop').removeClass('active');
			}
			
			$(window).on('scroll', function() {

				if ($(window).scrollTop() > 300) {
					$('#site_backtop').addClass('active');
				} else {
					$('#site_backtop').removeClass('active');
				}
			});
		}
		bt_BackTop();
	});
})(jQuery);