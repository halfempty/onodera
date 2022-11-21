<?php get_header(); ?>

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<div class="pagetop">
				<h1><?php the_title(); ?></h1>
			</div>

			<div class="textbox">
				<?php the_content() ?>
			</div>
	
			<?php get_template_part('parts/subpages'); ?>
			<?php echo get_template_part('parts/cvtable'); ?>

		<?php endwhile; ?>

	<?php endif; ?>

<?php get_footer(); ?>