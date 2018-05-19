<?php get_header(); ?>

		<div class="category">

			<h2 class="searchtitle">
				Search Results for: <span><?php echo get_search_query(); ?></span>
			</h2>


		<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>

			<div class="item">
				<?php if ( has_post_thumbnail() ) { ?>
					<a class="thumbnail" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_post_thumbnail(); ?></a> 
				<?php } else { ?>
					<a class="thumbnail" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php marty_metaimage("thumbnail"); ?></a> 				
				<?php } ?>
				
				<div class="excerpt">
					<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3>

					<?php if ( in_category('news') ) { ?>
						<p>Posted <?php the_time('F j, Y') ?></p>
					<?php } ?>

					<?php the_excerpt() ?>

				</div>

			</div>
	
		<?php endwhile; ?>

	<?php endif; ?>

	</div>

<?php get_footer(); ?>