<!DOCTYPE HTML>
<html>
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	
	<script type="text/javascript" src="http://use.typekit.com/pyr4wce.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

	<!-- Fav Icons: Browser, iOS, Windows 8 -->
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon.ico">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon-114.png" />
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon-72.png" />
	<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon-57.png" />
	<meta name="application-name" content="<?php bloginfo( 'name' ); ?>"/> 
	<meta name="msapplication-TileColor" content="#000000"/> 
	<meta name="msapplication-TileImage" content="<?php echo get_stylesheet_directory_uri() ?>/images/favicons/favicon-144.png"/>

	<?php wp_head(); ?>

</head>

<body>

<div class="header">

	<div class="searchbox"><div class="searchboxpadding">
		<?php echo get_search_form(); ?>
	</div></div>

	<div class="margin">

	<h1><a href="/"><span><?php bloginfo('name'); ?></span><br /><?php bloginfo('description'); ?></a></h1>

	<div id="navigation">
		<ul>

			<li <?php if ( is_home() ) { ?>class="selected"<?php } ?>
			><a href="/">Latest</a></li>

			<li <?php if ( is_page('series') ) { ?>class="selected"<?php } ?>
			><a href="/series/">Series</a></li>

			<li <?php if ( in_category_or_subcategory_of('films') ) { ?>class="selected"<?php } ?>
			><a href="/category/films/2015-2018/">Portfolio</a></li>

			<li <?php if ( !is_front_page() && in_category( 'news' ) || is_page('distributors') || is_page('collections') || in_category('purchase') || is_page('articles') || is_page('about') ) { ?> class="selected" <?php } ?> 
			><a href="/about/">Info</a></li>

			<li><a href="#" class="searchtoggle"><span class="label">Search</span></a></li>

		</ul> 
		</div>

	</div>

</div>

<div class="scrollingcontent">

<div class="layoutspacer"></div>

<div id="pagewrapper">

	<?php if ( is_page_template( 'page-doublehome.php' ) ) : ?>
	<div class="homemargin">
	<?php else : ?>
	<div class="margin">
	<?php endif; ?>

		<div id="page">

	<?php if ( !is_front_page() && !is_single() && !is_search() ) { ?>
		<?php if ( in_category_or_subcategory_of('films') ) { ?>
		<ul class="subnav">
			<li <?php if ( in_category('2015-2018') ) { ?>class="selected"<?php } ?>
			><a href="/category/films/2015-2018/">2015-2018</a></li>
			<li <?php if ( in_category('2012') ) { ?>class="selected"<?php } ?>
			><a href="/category/films/2012/">2012-2014</a></li>
			<li <?php if ( in_category('2006-2010') ) { ?>class="selected"<?php } ?>
			><a href="/category/films/2006-2010/">2006-2011</a></li>
			<li <?php if ( in_category('1995-2005') ) { ?>class="selected"<?php } ?>
			><a href="/category/films/1995-2005/">1995-2005</a></li>
			<li <?php if ( in_category('1988-1992') ) { ?>class="selected"<?php } ?>
			><a href="/category/films/1988-1992/">1988-1992</a></li>
			<li <?php if ( in_category('1979-1985') ) { ?>class="selected"<?php } ?>
			><a href="/category/films/1979-1985/">1979-1985</a></li>
		</ul>

		<?php } else if ( in_category( 'news' ) || is_page('distributors') || is_page('collections') || in_category('purchase') || is_page('articles') || is_page('about') ) { ?>
		<ul class="subnav">
			<li <?php if ( is_page('about') ) { ?>class="selected"<?php } ?>	
					><span><a href="/about/">About</a></span></li>
			<li <?php if ( !is_home() && !is_page() && in_category( 'news' ) ) { ?>class="selected"<?php } ?>
				><span><a href="/?category_name=news">News</a></span></li>
			<li <?php if ( is_page('collections') ) { ?>class="selected"<?php } ?>
				><a href="/?page_id=66">Collections</a></li>
			<li <?php if ( in_category('purchase') ) { ?>class="selected"<?php } ?>
				><a href="/?category_name=purchase">Purchase</a></li>
			<li <?php if ( is_page('distributors') ) { ?>class="selected"<?php } ?>
				><a href="/?page_id=67">Rentals</a></li>
			<li <?php if ( is_page('articles') ) { ?>class="selected"<?php } ?>	
				><span><a href="/?page_id=517">Articles</a></span></li>
		</ul>
		<?php } ?>
	<?php } ?>