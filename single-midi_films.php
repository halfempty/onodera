<?php get_header(); ?>

<?php if ( have_posts() ) : ?>
	<?php while (have_posts()) : the_post(); ?>

		<div class="pagetop">

			<h1><?php the_title(); ?></h1>

		</div>

		<?php $page_format = get_field('page_format'); ?>
		<?php if ( $page_format == 'series' ) : ?>

			<div class="textbox">
				<?php the_content(); ?>
			</div>

			<?php echo get_template_part('parts/distributionlink'); ?>

			<?php 

				$cat_id = get_field('series');
				$cat_object = get_term($cat_id,'midi_film_categories');
				$cat_slug = $cat_object->slug;

				$orderfield = get_field('order');
				if ( $orderfield == 'descending' ) :
					$order = 'DESC';
				else :
					$order = 'ASC';
				endif; 

				$args = array( 
					'post_type' => 'midi_films',
					'nopaging' => true,
					'order' => $order,
					'tax_query' => array(
						array(
							'taxonomy' => 'midi_film_categories',
							'field'    => 'term_id',
							'terms'    => $cat_id,
						),
					)
				);

				$myposts = get_posts( $args );

			?>

			<?php if ( $cat_slug == 'a-movie-a-day-series' || $cat_slug == 'movie-of-the-week-series' ) : ?>

				<div class="grid">
					<?php foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
						<?php echo get_template_part('parts/item-grid'); ?>
					<?php endforeach; ?>
				</div>

			<?php else: ?>

				<div class="filmset">
					<?php foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
						<?php echo get_template_part('parts/item-filmset'); ?>
					<?php endforeach; ?>
				</div>

			<?php endif; ?>

			<?php wp_reset_postdata(); ?>

		<?php elseif ( $page_format == 'other' ) : ?>

			<div class="textbox">
				<?php the_content(); ?>
			</div>

			<?php echo get_template_part('parts/distributionlink'); ?>

		<?php else: ?>

			<?php echo get_template_part('parts/thevideo'); ?>

			<p>Posted <?php the_time('F j, Y') ?></p>

		<?php endif; ?>

	<?php endwhile; ?>

<?php endif; ?>

<?php get_footer(); ?>