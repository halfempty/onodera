<?php if ( have_rows('videos') ): ?>
	<?php while ( have_rows('videos') ) : the_row(); ?>

		<div class="textbox">

			<?php $description_placement =  get_sub_field('description_placement'); ?>
			<?php $description = get_sub_field('description'); ?>

			<?php if ( $description_placement != 'after') : ?>
				<?php if ( $description && $description != '' ) : ?>
					<?php echo $description; ?>
				<?php endif; ?>
			<?php endif; ?>

			<?php if ( have_rows('formats') ) : ?>

				<h3>Alternative Formats:</h3>

				<ul>

				<?php while( have_rows('formats') ): the_row(); ?>
					<?php if( get_row_layout() == 'youtube' ): ?>
						<li><a href="<?php echo get_sub_field('url'); ?>">YouTube</a></li>
					<?php elseif ( get_row_layout() == 'vimeo' ) : ?>
						<li><a href="<?php echo get_sub_field('url'); ?>">Vimeo</a></li>
					<?php elseif ( get_row_layout() == 'quicktime' ) : ?>
						<?php 
							if ( get_sub_field('method') == 'library' ) :
								$url = get_sub_field('file');
							elseif(get_sub_field('method') == 'path') :
								$url = get_sub_field('path');
							endif;
						?>

						<?php if ( $url ) : ?>
							<li><a href="<?php echo $url; ?>">Quicktime (MOV)</a></li>
						<?php endif; ?>

					<?php endif; ?>
				<?php endwhile; ?>

				</ul>

			<?php endif; ?>

			<?php if ( have_rows('resources') ) : ?>

				<h3>Resources:</h3>

				<ul>

				<?php while( have_rows('resources') ) : the_row(); ?>

					<?php if( get_row_layout() == 'transcript' ): ?>

						<?php 
							if ( get_sub_field('method') == 'library' ) :
								$url = get_sub_field('file');
							elseif(get_sub_field('method') == 'path') :
								$url = get_sub_field('path');
							endif;
						?>

						<?php if ( $url ) : ?>
							<li><a href="<?php echo $url; ?>">Transcript (PDF)</a></li>
						<?php endif; ?>

					<?php elseif ( get_row_layout() == 'study_guide' ) : ?>

						<?php 
							if ( get_sub_field('method') == 'library' ) :
								$url = get_sub_field('file');
							elseif(get_sub_field('method') == 'path') :
								$url = get_sub_field('path');
							endif;
						?>

						<?php if ( $url ) : ?>
							<li><a href="<?php echo $url; ?>">Study Guide (PDF)</a></li>
						<?php endif; ?>

					<?php endif; ?>

				<?php endwhile; ?>

				</ul>

			<?php endif; ?>

		</div>

		<?php echo get_template_part('parts/distributionlink'); ?>

		<?php $movie_type = get_sub_field('movie_type'); ?>
		<?php if ( $movie_type == 'trailer' ) : ?>
			<p class="trailerflag"><span>Watch a preview:</span></p>
		<?php endif; ?>

		<?php
			$image = get_sub_field('image');
			$videoimage = $image['url'];
			$html_video_file = get_sub_field('html_video_file');
		?>

		<?php if ( is_array($html_video_file) && array_key_exists('url', $html_video_file) ) : ?>

			<?php $videosrc = $html_video_file['url']; ?>

			<?php if ( $videoimage ) : ?>
				<video poster="<?php echo $videoimage; ?>" src="<?php echo $videosrc; ?>" type="video/mp4" preload="none" controls="controls" controlsList="nodownload"></video>
			<?php else : ?>
				<video src="<?php echo $videosrc; ?>" type="video/mp4" preload="none" controls="controls" controlsList="nodownload"></video>
			<?php endif; ?>

		<?php else: ?>
			<?php if ( $videoimage ) : ?>
				<img src="<?php echo $videoimage; ?>" alt="" />
			<?php endif; ?>
		<?php endif; ?>

		<?php if ( $description_placement == 'after') : ?>
			<?php if ( $description && $description != '' ) : ?>
				<div class="textbox">
					<?php echo $description; ?>
				</div>
			<?php endif; ?>
		<?php endif; ?>

	<?php endwhile; ?>

<?php endif; ?>
