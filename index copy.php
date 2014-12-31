<?php get_header(); ?>

		<div class="category">

			<?php get_template_part('addthis'); ?>

			<div class="description">
			<?php 
				$mycategorynumber = get_category_by_slug('the-classifieds'); 
				echo category_description("$mycategorynumber->term_id");
			?>
			</div>


			<?php

			$query = array ('category_name' => 'the-classifieds','posts_per_page' => '100');
			$queryObject = new WP_Query($query); 
			$i = 0;
			
			 // The Loop...
			if ($queryObject->have_posts()) {
				while ($queryObject->have_posts()) {
					$queryObject->the_post(); ?>
					

				<?php if ( $i < 1 ) { ?> 

					<div class="item latest">	

					<h2><?php the_title(); ?></h2>
					<p>Published <?php the_date(); ?></p>


					<?php 

					$post_template = get_post_meta( $post->ID, 'custom_post_template', true );

					if ( $post_template === 'single-video.php' ) :
						// HTML5 Player
						makeVideo($post->ID);
					elseif ( $post_template === 'single-redirect.php' ) :
						// This really shouldn't happen
						
					else :
						// Probably default template or kfilm ?>
						<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_post_thumbnail('medium'); ?></a> 
<?php
					endif;

					the_content();

					?>

					
					</div>
					
					<div class="archive">
					
					<?php $i++; ?>

				<?php } else { ?> 


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
	
			<?php } ?>

		<?php } ?>

		
		</div><!-- // Archive -->

	<?php } else { ?>

		<p>Sorry, Not Found</p>

	<?php } ?>

	</div>

<?php get_footer(); ?>