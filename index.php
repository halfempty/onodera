<?php get_header(); ?>

<div class="category">

	<div class="description">
	<?php 
		$mycategorynumber = get_category_by_slug('annual-report'); 
		echo category_description("$mycategorynumber->term_id");
	?>
	</div>


	<?php

	$first = true; 

	$homeposts = get_posts(array( 
		'category_name' => 'annual-report', 
		'post_type' => 'post',
		'numberposts'     => -1,
		'post_status' => 'publish'
	));

	foreach( $homeposts as $post ) : 
		setup_postdata( $post );
		if ($first == true ) : ?>

			<div class="item latest">	

				<h2><?php the_title(); ?></h2>
				<p>Published <?php the_time('F j, Y') ?></p>


				<?php 

				$post_template = get_post_meta( $post->ID, 'custom_post_template', true );

				if ( $post_template === 'single-video.php' ) : // HTML5 Player
					makeVideo($post->ID);
				else : // Probably default template or kfilm ?>
					<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_post_thumbnail('medium'); ?></a> 
				<?php
				endif;

				the_content();

				?>
			</div>
		
			<div class="archive">
			
			<?php $first = false; ?>
		
		<?php else: ?>	

			<div class="item">
				<?php if ( has_post_thumbnail() ) { ?>
					<a class="thumbnail" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_post_thumbnail(); ?></a> 
				<?php } else { ?>
					<a class="thumbnail" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php marty_metaimage("thumbnail"); ?></a> 				
				<?php } ?>

				<div class="excerpt">
					<h3><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3>


				<p>Posted <?php the_time('F j, Y') ?></p>

				<?php the_excerpt() ?>
				</div>

			</div>

		<?php endif; ?>

	<?php endforeach; ?>

	</div> <!-- / Archive -->
</div>

<?php get_footer(); ?>