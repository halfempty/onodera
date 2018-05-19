<header class="navtoggle"> 

	<div class="wpadminbarspacer"></div>

	<div class="mobiletoggle">
		<a class="homelink" href="<?php echo get_site_url(); ?>">Midi Onodera</a>
		<div class="opennav toggle"><span class="icon icon-menu"></span>Menu</div>	
		<div class="closenav toggle"><span class="icon icon-close"></span>Close</div>
	</div>

</header>

<div id="mobilenav" class="lightbox">
	<div class="box"><div class="margin">
	<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>		
	</div></div>
</div>
