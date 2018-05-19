(function($) {
	
	function setupGrid() {
		$('.seriesindex').packery({
			itemSelector: '.project',
			transitionDuration: "0"
		});	
	}

	$(document).ready( function() {
		setupGrid();
	});

	$(window).load( function() {
		setupGrid();
	});

})(jQuery);