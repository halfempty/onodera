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
		if ( $first == true ) : ?>

			<div class="item latest">	

				<h2><?php the_title(); ?></h2>
				<p>Published <?php the_time('F j, Y') ?></p>


				<?php 

				if ( have_rows('videos') ):
					while ( have_rows('videos') ) : the_row();

						$image = get_sub_field('image');
						$videoimage = $image['url'];
						$videowidth = $image['width'];
						$videoheight = $image['height'];

						$html_video_file = get_sub_field('html_video_file');
						$videosrc = $html_video_file['url'];


						$output = '<video ';
						$output .= ' poster="' . $videoimage . '"';
						$output .= ' src="' . $videosrc . '" type="video/mp4"';	
						$output .= ' preload="auto" controls="controls" style="max-width: 100%; max-height: 100%;"></video>';
						echo $output;

						$description = get_sub_field('description');

						if ( $description && $description != '' ) :
							echo $description;
						endif;

					endwhile;
				endif;

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