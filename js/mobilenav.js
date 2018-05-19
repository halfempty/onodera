(function($) {

	var mobileNav = false;
	var lightboxopen = false;
	var myScrollTop = 0;

	jQuery.fn.openSubs = function() {
		var target = $(this).parent();
		target.addClass('active').children('ul').stop().slideDown("fast", function(){
			// Animation complete
		});
	}

	jQuery.fn.closeSubs = function() {
		var target = $(this).parent();
		target.children('ul').stop().slideUp("fast", function(){
			// Animation complete
			target.removeClass('active');
		});
	}

	jQuery.fn.openLightbox = function() {

		lightboxopen = true;

		if (/iPhone|iPad|iPod/i.test(navigator.userAgent)) {

			myScrollTop = $('body').scrollTop();

			var wpadminbar = 0; 
			if ($('#wpadminbar').length != 0) {
				wpadminbar = $('#wpadminbar').outerHeight();
			}

			thisOffset = myScrollTop - wpadminbar;
			offsetString = "-" + thisOffset + "px";

			$('.scrollingcontent').css({
			    'top': offsetString,
			    'position':'fixed'
			});

		}

		$('body').addClass('haslightbox');

		var navtoggle = 0;
		navtoggle += $('.navtoggle').outerHeight();

		$(this).css({'top': navtoggle + 'px'});
		$(this).stop().slideDown("fast");

	}

	jQuery.fn.closeLightbox = function() {

		lightboxopen = false;

		if (/iPhone|iPad|iPod/i.test(navigator.userAgent)) {

			$('.scrollingcontent').css({
			    'top': "auto",
			    'position':'static'
			});

			$( "body" ).scrollTop( myScrollTop );
			myScrollTop = 0;

		}

		$('body').removeClass('haslightbox');
		$(this).stop().slideUp("fast");
	}

	jQuery.fn.resetLightbox = function() {

		menuopen = false;

		if (/iPhone|iPad|iPod/i.test(navigator.userAgent)) {

			$('.scrollingcontent').css({
			    'top': "auto",
			    'position':'static'
			});

			$( "body" ).scrollTop( myScrollTop );
			myScrollTop = 0;

		}

		$('body').removeClass('haslightbox');
		$(this).stop().hide();

	}

	function isMobile() {
		if ( $(".responsivecue").css("float") == "right" ) { 
			return false;
		} else {
			return true;
		}
	}

	function openNav() {

		$('.opennav').hide();
		$('.closenav').show();
		$("#mobilenav").openLightbox();

	}

	function closeNav() {

		$('.closenav').hide();
		$('.opennav').show();
		$("#mobilenav").closeLightbox();

	}

	function resetNav() {
		$('.closenav').hide();
		$('.opennav').show();
		$("#mobilenav").resetLightbox();
	}

	function setupLayout() {

		$('body').addClass('js');

		$('#mobilenav li ul').hide().parent().prepend('<span class="navarrow opensubs"></span>');

		handleResize();

	}

	function handleResize() {
		if ( isMobile() ) {
			if ( mobileNav == false ) {
				// Transition to mobile

				resetNav();

				mobileNav = true;

			}

		} else {
			if ( mobileNav == true ) {
				mobileNav = false;
			}
			if ( lightboxopen == true ) {
				$("#mobilenav").resetLightbox();
			}
		}
		
		setupPadding();
	}

	function setupPadding() {

		var adminbarheight = 0;

		if ($('#wpadminbar').length != 0) {
			var adminbarheight = $('#wpadminbar').outerHeight();
		}

		$('.wpadminbarspacer').css({'height': adminbarheight + 'px'});

		var topTitle = 0;

		if ( isMobile() ) { 

			topTitle += $('.mobiletoggle').outerHeight();
			$('.layoutspacer').css({'height': topTitle + 'px'});

		}



	}

	$(document).ready( function() {

		setupLayout();
		handleResize();

		$('.opennav').on('click', function( event ) {
			openNav();
		});

		$('.closenav').on('click', function( event ) {
			closeNav();
		});

		$('.navarrow').on("click", function(event) {
			event.preventDefault();

			if ( $(this).parent().hasClass('active') ) {
				$(this).closeSubs();
			} else {
				$(this).openSubs();
			}
		});

	});

	$(window).resize(function(){
		handleResize();
	});

})(jQuery);
