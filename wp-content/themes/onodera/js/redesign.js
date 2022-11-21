(function($) {

	function setupNavPadding() {

		if ($('#wpadminbar').length != 0) {
			var adminbarheight = $('#wpadminbar').outerHeight();
			$('.adminspacer').css('height', adminbarheight + 'px');
		}

		if ($('.title').length != 0) {
			var titleheight = $('.title').outerHeight();
			$('.headerspacer').css('height', titleheight + 'px');
		}

	}

	$(document).ready( function() {

		setupNavPadding();

		$('.acordion h2 a').on( "click", function(event) {
			event.preventDefault();
			var item = $(this).parents('.item');
			if ( item.hasClass('open') ) {
				item.removeClass('open');
				item.find('.inner').slideUp('fast');
			} else {
				item.addClass('open');
				item.find('.inner').slideDown('fast');
			}

		});

		$('.menuicon').on( "click", function(event) {
			$('header').toggleClass('visible');
		});

	});

	$( window ).resize(function() {
		setupNavPadding();
	});

	// $(window).load( function() {
	// 	setupGrid();
	// });

})(jQuery);