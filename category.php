<?php get_header(); ?>

		<?php if (have_posts()) : ?>

			<?php if ( in_category_or_subcategory_of( 'series' ) ) { ?>
				<h2><?php echo single_cat_title(); ?></h2>
			<?php } ?>

			<?php if ( !is_paged() ) { ?>
				<?php marty_wrapped_category_description(); ?>
			<?php } ?>

		<div class="category">

		<?php while (have_posts()) : the_post(); ?>

			<div class="item">
				<?php if ( has_post_thumbnail() ) { ?>
					<a class="thumbnail" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_post_thumbnail(); ?></a> 
				<?php } else { ?>
					<a class="thumbnail" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php marty_metaimage("thumbnail"); ?></a> 				
				<?php } ?>
				
				<div class="excerpt">
					<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3>


				<?php if ( in_category_or_subcategory_of('films') || in_category_or_subcategory_of('purchase') ) { ?>
					<!-- Don't show date-->
				<?php } else { ?>
					<p>Posted <?php the_time('F j, Y') ?></p>
				<?php } ?>
				
				<?php the_excerpt() ?>
				</div>

			</div>
	
		<?php endwhile; ?>

		</div>

		<?php pagination( $wp_query, get_category_link( get_query_var('cat') ) ); ?>

	<?php else : ?>

		<p>Sorry, Not Found</p>

	<?php endif; ?>

<?php get_footer(); ?>