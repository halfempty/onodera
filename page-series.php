<?php 

/*
Template Name: Film and Video
*/

get_header(); ?>

<div class="pagetop">

<h1>Film and Video</h1>

</div>

<nav>
	<?php wp_nav_menu( array( 'theme_location' => 'films' ) ); ?>
</nav>

<?php 

	if ( is_page('film-and-video') ) :

		$args = array( 
			'post_type' => 'midi_films',
			'nopaging' => true,
			'tax_query' => array(
				array(
					'taxonomy' => 'midi_film_categories',
					'field'    => 'slug',
					'terms'    => 'film-and-video-series',
				),
			)
		);

	else :

		if ( is_page('film') ) :
			$type = 'film';
		elseif ( is_page('online-video-series') ) :
			$type = 'online';
		elseif ( is_page('interactive-video') ) :
			$type = 'interactive';
		else : 
			$type = 'video';
		endif;

		$args = array( 
			'meta_key' => 'video_type',
			'meta_value' => $type,
			'post_type' => 'midi_films',
			'nopaging' => true,
			'tax_query' => array(
				array(
					'taxonomy' => 'midi_film_categories',
					'field'    => 'slug',
					'terms'    => 'film-and-video-series',
				),
			),
		);

	endif;

	$myposts = get_posts( $args );

?>

<div class="grid">
	<?php foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
		<?php echo get_template_part('parts/item-grid'); ?>
	<?php endforeach; ?>
</div>

<?php wp_reset_postdata();?>

<?php get_footer(); ?>