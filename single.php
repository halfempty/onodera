<?php get_header(); ?>

<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>

		<div class="pagetop">

			<h1><?php the_title(); ?></h1>

		</div>

		<div class="textbox">
			<?php the_content(); ?>
		</div>

		<p>Posted <?php the_time('F j, Y') ?></p>


	<?php endwhile; ?>


<?php endif; ?>

<?php get_footer(); ?>