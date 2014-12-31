<?php 

/*
Template Name Posts: Korsakow Player
*/

get_header(); ?>



<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h2><?php the_title(); ?></h2>

			<?php get_template_part('addthis'); ?>

			<?php //korsakowPlayer($post->ID) ?>

			<?php korsakowPlayer(); ?>

			<?php the_content(); ?>

		</div>
			
	<?php endwhile; ?>

	<div class="seriesnav">
		<?php previous_post_link('<span class="prev">%link</span>', '&laquo; Older', TRUE) ?>
		<?php next_post_link('<span class="next">%link</span>', 'Newer &raquo;', TRUE) ?>
		<p>In the series <?php the_category(", "); ?></p>
	</div>

	<?php comments_template(); ?>

<?php else : ?>		
	<p>Sorry, Not Found</p>
<?php endif; ?>


<?php get_footer(); ?>