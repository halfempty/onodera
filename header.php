<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />
<title><?php wp_title('|', true, 'right'); ?> <?php bloginfo('name'); if ( is_home() ) { ?>, <?php bloginfo('description'); }?></title>

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<script type="text/javascript" src="http://s7.addthis.com/js/200/addthis_widget.js"></script>
	
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

	<div class="margin">

	<h1><a href="/"><span><?php bloginfo('name'); ?></span> <?php bloginfo('description'); ?></a></h1>

		<div class="subscribe">
			<ul>
			<li class="heading">Follow:</li> 
			<li><a href="http://twitter.com/midiono">Twitter</a></li> 
			<li><a href="<?php bloginfo('rss2_url'); ?>">RSS</a></li> 
			<li class="heading">Podcast:</li> 
			<li><a href="itpc://feeds.feedburner.com/midionodera">iTunes</a></li> 
			<li><a href="http://feeds.feedburner.com/midionodera">XML</a></li>  
			</ul>
		</div>

		<div class="search">
		<form method="get" id="searchForm" action="<?php echo home_url( '/' ); ?>">
			<input type="text" class="field" name="s" id="s" placeholder="Search" />
			<input type="image" src="<?php bloginfo('template_directory'); ?>/images/search.png" class="submit" name="submit" id="searchsubmit" value="Search" alt="Click to Search">
		</form>
		</div>

	</div>

</div>

<div id="pagewrapper">

	<div class="margin">

		<div id="navigation">
			<ul>
				<li <?php if ( is_home() || in_category_or_subcategory_of('series') || in_category('fps') && !in_category( 'news' ) ) { ?>class="selected"<?php } ?>	
					><a href="/">Series</a></li>
				<li <?php if ( !is_home() && in_category_or_subcategory_of('films') && !in_category( 'news' ) ) { ?>class="selected"<?php } ?>	
					><a href="/category/films/2012/">Portfolio</a></li>
				<li <?php if ( !is_home() && !is_page() && in_category( 'news' ) ) { ?>class="selected"<?php } ?>	
					><a href="/?category_name=news">News</a></li>
				<li <?php if ( is_page('distributors') || is_page('collections') || in_category('purchase') && !is_search() ) { ?>class="selected"<?php } ?>	
					><a href="/?page_id=67">Distribution</a></li>
				<li <?php if ( is_page('articles') ) { ?>class="selected"<?php } ?>	
					><a href="/?page_id=517">Articles</a></li>
				<li <?php if ( is_page('biography') ) { ?>class="selected"<?php } ?>	
					><a href="/?page_id=65">Biography</a></li>
				<li <?php if ( is_page('contact') ) { ?>class="selected"<?php } ?>
					><a href="/?page_id=133">Contact</a></li>
			</ul> 
			</div>

	
		<div id="page">

	<?php if ( !is_single() ) { ?>
		<?php if ( is_home() || in_category_or_subcategory_of('series') || in_category('fps') ) { ?>
		<ul class="subnav">
			<li <?php if ( is_home() || in_category('kicking-around') ) { ?>class="selected"<?php } ?>
			><a href="/">Kicking Around</a></li>
			<li <?php if ( in_category('the-classifieds') ) { ?>class="selected"<?php } ?>
			><a href="/category/the-classifieds/">The Classifieds</a></li>
			<li <?php if ( in_category('odd-socks') ) { ?>class="selected"<?php } ?>
			><a href="/category/odd-socks/">Odd Socks</a></li>
			<li <?php if ( in_category('fps') ) { ?>class="selected"<?php } ?>
			><a href="/category/fps/">24fps</a></li>
			<li <?php if ( in_category('bakers-dozen-2010') ) { ?>class="selected"<?php } ?>
			><a href="/category/series/bakers-dozen-2010/">Baker’s Dozen</a></li>
			<li <?php if ( in_category('movie-of-the-week') ) { ?>class="selected"<?php } ?>
			><a href="/category/series/movie-of-the-week/">Movie of the Week</a></li>
			<li <?php if ( in_category('a-movie-a-day') ) { ?>class="selected"<?php } ?>
			><a href="/category/series/a-movie-a-day/">A Movie A Day</a></li>
		</ul>
		<?php } else if ( in_category_or_subcategory_of('films') ) { ?>
		<ul class="subnav">
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
		<?php } else if ( is_page('distributors') || is_page('collections') || in_category('purchase') ) { ?>
		<ul class="subnav">
			<li <?php if ( is_page('distributors') ) { ?>class="selected"<?php } ?>
				><a href="/?page_id=67">Rentals</a></li>
			<li <?php if ( is_page('collections') ) { ?>class="selected"<?php } ?>
				><a href="/?page_id=66">Collections</a></li>
			<li <?php if ( in_category('purchase') ) { ?>class="selected"<?php } ?>
				><a href="/?category_name=purchase">Purchase</a></li>
		</ul>
		<?php } ?>
	<?php } ?>