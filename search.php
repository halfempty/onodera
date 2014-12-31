<?php get_header(); ?>

		<div class="category">

		<?php if (have_posts()) : ?>



			<?php if ( is_category( 'bakers-dozen-2010' ) || is_category( 'movie-of-the-week' ) || is_category( 'a-movie-a-day' ) ) { ?>
				<h2><?php echo single_cat_title(); ?></h2>
			<?php } ?>
						
						
						
						
						
			<?php if ( category_description() !== '') { ?>
				<div class="description">
				<?php echo category_description(); ?>
				</div>
			<?php } ?>

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


			<div class="pagenav">
				<?php next_posts_link('&laquo; Older Entries') ?>
				<?php previous_posts_link('<span class="next">Newer Entries &raquo;</span>') ?>
			</div>

	<?php else : ?>

		<p>Sorry, Not Found</p>

	<?php endif; ?>

	</div>

<?php get_footer(); ?>