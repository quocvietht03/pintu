!(function($){
	"use strict";
	jQuery(document).ready(function($) {
		function ld_SiteLoading() {
			if ($('#site_loading').length) {
				$('#site_loading').hide();
			}
		}
		ld_SiteLoading();
	});
})(jQuery);