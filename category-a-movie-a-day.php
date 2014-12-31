<?php get_header(); ?>

		<div class="grid">

		<?php 
		
		global $query_string;
		query_posts( $query_string . '&posts_per_page=60' );

		if (have_posts()) : 
		
		?>

				<h2><?php echo single_cat_title(); ?></h2>

				<?php get_template_part('addthis'); ?>

			<?php if ( !is_paged() ) { ?>
				<?php marty_wrapped_category_description(); ?>
			<?php } ?>
			
		<?php while (have_posts()) : the_post(); ?>

			<div class="item">
				<?php if ( has_post_thumbnail() ) { ?>
					<a class="thumbnail" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_post_thumbnail(); ?></a> 
				<?php } else { ?>
					<a class="thumbnail" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php marty_metaimage("thumbnail"); ?></a> 				
				<?php } ?>
				<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_time('F j, Y') ?></a></h3>

			</div>
	
		<?php endwhile; ?>

		<?php pagination( $wp_query, get_category_link( get_query_var('cat') ) ); ?>

	<?php else : ?>

		<p>Sorry, Not Found</p>

	<?php endif; ?>

	</div>

<?php get_footer(); ?>