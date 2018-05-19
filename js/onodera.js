jQuery(document).ready(function($) {

	// Search
	$('a.searchtoggle').on( "click", function( event ) {
		event.preventDefault();
		$('.searchbox').slideToggle('fast');
	});


	$("div.downloadlinks span").append(' <a class="clickforlinks">Click Here.</a>');
	$("div.downloadlinks strong").hide();
	$("div.downloadlinks ul").hide();

	$("div.html5player .downloadlinks a.clickforlinks").click(function(event){
	  event.preventDefault();
		$(this).hide();
		$(this).parents('.downloadlinks').find('strong').show();
		$(this).parents('.downloadlinks').find('ul').show();
	});

	$("div.movdiv").hide();
	$("a.movlink").click(function(event){
	  event.preventDefault();
		$(this).hide();
		$("div.m4vdiv").hide();		
		$(this).parent().find('li.showmov').hide();
		$(this).parent().find('div.movdiv').show();
	});
	
	$(".showmov").click(function(event){
	  event.preventDefault();
		$("div.m4vdiv").hide();		
		$(this).parents('.media').find('a.movlink').hide();
		$(this).parents('.media').find('div.movdiv').show();
	});
	
	// Home Archives

	$('.archive').append('<div class="pagenav"><a href="#latest" id="latest">« Newest video in this series</a></div>');
	$('.latest').append('<div class="pagenav"><a href="#archive" id="archive">« Previous videos in this series</a></div>');
	$('.archive').hide();

	$('#archive').click(function(event) {
		event.preventDefault();	
	  $('.latest').animate({height: 'toggle'}, {duration: "fast", complete: function() {
	      $('.archive').animate({ height: 'toggle'}, { duration: "fast" } );
	    }
	  });
	});


	$('#latest').click(function(event) {
		event.preventDefault();	
	  $('.archive').animate({height: 'toggle'}, {duration: "fast", complete: function() {
	      $('.latest').animate({ height: 'toggle'}, { duration: "fast" } );
	    }
	  });
	});

});