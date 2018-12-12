/* -----------------------------------------------
/* How to use? : Check the GitHub README
/* ----------------------------------------------- */

/* To load a config file (particles.json) you need to host this demo (MAMP/WAMP/local)... */
/*
particlesJS.load('particles-js', 'particles.json', function() {
  console.log('particles.js loaded - callback');
});
*/

/* Otherwise just put the config content (json): */

jQuery(document).ready(function($) {

	var particlesJS_custom = function(id, config) {

		particlesJS(id, config);

	}

	var particlesJS_default = function(id, config) {
		particlesJS.load(id, config, function() {});
	}

	if ($('.vc_particles-effect').length) {
		$( '.vc_particles-effect' ).each( function() {
			var $thisEl = $(this),
				_id = $thisEl.attr('id');

			if(typeof _id == 'undefined'){
				_id = 'pta_particles_' + Math.random().toString(36).slice(2);
				$thisEl.attr('id', _id);

			}

			var config = $thisEl.data('partcles-effect');

			if(typeof config == 'undefined'){
				var config = $thisEl.data('partcles-json');
				particlesJS_custom( _id, config );
			}else{
				particlesJS_default( _id, config );
			}

		} );
	}

});
