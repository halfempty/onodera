<?php 

/*
Template Name Posts: HTML5 Video Player
*/

get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h2><?php the_title(); ?></h2>

			<?php if ( in_category_or_subcategory_of('films') || in_category_or_subcategory_of('purchase') ) { ?>
				<!-- Don't show date-->
			<?php } else { ?>
				<p>Posted <?php the_time('F j, Y') ?></p>
			<?php } ?>

			<?php get_template_part('parts/trailerflag'); ?>

 			<?php makeVideo($post->ID); ?>

 			<?php midiYoutube(); ?>

			<?php onoderaAfterVideoLinks(); ?>

			<?php the_content(); ?>

		</div>
			
	<?php endwhile; ?>

	<div class="seriesnav">
		<?php previous_post_link('<span class="prev">%link</span>', '&laquo; Older', TRUE) ?>
		<?php next_post_link('<span class="next">%link</span>', 'Newer &raquo;', TRUE) ?>
		<p>In the series <?php the_category(", "); ?></p>
	</div>

<?php else : ?>		
	<p>Sorry, Not Found</p>
<?php endif; ?>

<?php get_footer(); ?>