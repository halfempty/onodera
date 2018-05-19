<?php 

/*
Template Name: Series
*/

get_header(); ?>

<?php if( have_rows('series') ): ?>

	<div class="seriesindex">

	<?php while ( have_rows('series') ) : the_row(); ?>

		<?php

			$term = get_sub_field('project_object');
			$project_url = get_term_link( $term );
			$project_title = get_sub_field('project_title');
			$project_image = get_sub_field('thumbnail');

		?>

		<div class="project">
			<div class="ratio"></div>
			<div class="inner">
				<div class="padding">

					<?php if ( $project_image ) : ?>
						<a href="<?php echo $project_url; ?>"><img src="<?php echo $project_image; ?>" alt="<?php echo $project_title; ?>" /></a>
					<?php endif; ?>

					<h2><a href="<?php echo $project_url; ?>"><?php echo $project_title; ?></a></h2>

				</div>

			</div>

		</div>

	<?php endwhile; ?>

	</div>

<?php endif; ?>

<?php get_footer(); ?>