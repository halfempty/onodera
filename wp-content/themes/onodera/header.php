<!DOCTYPE HTML>
<html>
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<link rel="stylesheet" href="https://use.typekit.net/pyr4wce.css">

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

<?php $colors = randomColor(); ?>

<body class="<?php echo $colors[0]; ?>">

<header>

	<div class="adminspacer"></div>

	<div class="title"><a href="<?php echo get_site_url(); ?>">Midi Onodera</a></div>

	<button class="menuicon"><?php echo get_template_part('images/menu.svg'); ?></button>

	<nav>
		<div class="navwrap">

			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>

			<form role="search" method="get" id="searchform" class="searchform" action="<?php echo site_url(); ?>">
				<div class="inner">
					<input class="searchbox" type="text" placeholder="Search" value="" name="s" id="s">
				</div>
			</form>

		</div>
	</nav>

</header>

<div class="page">
	<div class="headerspacer"></div>
