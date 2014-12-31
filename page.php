<?php get_header(); ?>

		<div class="page">

		<?php get_template_part('addthis'); ?>

		<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
				
				<?php the_content() ?>
	
		<?php endwhile; ?>

	<?php else : ?>

		<p>Sorry, Not Found</p>

	<?php endif; ?>

	</div>

<?php get_footer(); ?>