<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h2><?php the_title(); ?></h2>

			<?php if ( in_category_or_subcategory_of('films') || in_category_or_subcategory_of('purchase') ) { ?>
				<!-- Don't show date-->
			<?php } else { ?>
				<p>Posted <?php the_time('F j, Y') ?></p>
			<?php } ?>

			<?php 
				if ( have_rows('videos') ):
					while ( have_rows('videos') ) : the_row();

						$template = get_sub_field('template');

						if ( $template == 'html' ) :

							$movie_type = get_sub_field('movie_type');
							if ( $movie_type == 'trailer' ) :
								?><h3 class="trailerflag">Watch the preview:</h3><?php
							endif;

							// Output video

							$image = get_sub_field('image');
							$videoimage = $image['url'];
							$videowidth = $image['width'];
							$videoheight = $image['height'];

							$html_video_file = get_sub_field('html_video_file');

							if ( is_array($html_video_file) && array_key_exists('url', $html_video_file) ) :

								$videosrc = $html_video_file['url'];

								$filesrc = marty_get_file_url($videosrc);

								$output = '<video ';
								$output .= ' poster="' . $videoimage . '"';
								$output .= ' src="' . $filesrc . '" type="video/mp4"';	
								$output .= ' preload="auto" controls="controls" style="max-width: 100%; max-height: 100%;"></video>';

							else:

								$output = '<img src="' . $videoimage . '" alt="" />';

							endif;

							echo $output;

							// Meta 

							if ( have_rows('formats') ) : 
								?><div class="media"><h3>Alternative Formats:</h3><ul><?php

								while( have_rows('formats') ): the_row(); 
									if( get_row_layout() == 'youtube' ):
										?><li><a href="<?php echo get_sub_field('url'); ?>">YouTube</a></li><?php
									elseif ( get_row_layout() == 'vimeo' ) :
										?><li><a href="<?php echo get_sub_field('url'); ?>">Vimeo</a></li><?php
									elseif ( get_row_layout() == 'quicktime' ) :

										if ( get_sub_field('method') == 'library' ) :
											$url = get_sub_field('file');
										elseif(get_sub_field('method') == 'path') :
											$url = get_sub_field('path');
										endif;

										if ( $url ) :
											?><li><a href="<?php echo $url; ?>">Quicktime (MOV)</a></li><?php
										endif;

									endif;
								endwhile;
								?></ul></div><?php
							endif; 

							if ( have_rows('resources') ) : 
								?><div class="media"><h3>Resources:</h3><ul><?php

								while( have_rows('resources') ): the_row(); 

									if( get_row_layout() == 'transcript' ):

										if ( get_sub_field('method') == 'library' ) :
											$url = get_sub_field('file');
										elseif(get_sub_field('method') == 'path') :
											$url = get_sub_field('path');
										endif;

										if ( $url ) :
											?><li><a href="<?php echo $url; ?>">Transcript (PDF)</a></li><?php
										endif;

									elseif ( get_row_layout() == 'study_guide' ) :

										if ( get_sub_field('method') == 'library' ) :
											$url = get_sub_field('file');
										elseif(get_sub_field('method') == 'path') :
											$url = get_sub_field('path');
										endif;

										if ( $url ) :
											?><li><a href="<?php echo $url; ?>">Study Guide (PDF)</a></li><?php
										endif;

									endif;

								endwhile;
								?></ul></div><?php
							endif;

							$description = get_sub_field('description');

							if ( $description && $description != '' ) :
								echo $description;
							endif;

						endif;

					endwhile;
			else : // No ACF ?>

				<?php get_template_part('parts/trailerflag'); ?>

				<?php midiMetas(); ?>

				<?php the_content(); ?>

			<?php endif; ?>

		</div>

	<?php endwhile; ?>

	<div class="seriesnav">
		<?php previous_post_link('<span class="prev">%link</span>', '&laquo; Older', TRUE) ?>
		<?php next_post_link('<span class="next">%link</span>', 'Newer &raquo;', TRUE) ?>
		<p>In the series <?php the_category(", "); ?></p>
	</div>

<?php endif; ?>

<?php get_footer(); ?>