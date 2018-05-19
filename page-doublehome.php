<?php 

/*
Template Name: Double Home
*/

get_header(); ?>

<?php get_header(); ?>

<h2 class="homepageheader">Current Projects</h2>

<?php if (have_posts()) : ?>
	<?php while (have_posts()) : the_post(); ?>
		<div class="homefeature">
			<h2><?php the_field('feature_title'); ?></h2>
			<div class="excerpt">

				<a  class="thumbnail" href="<?php the_field('feature_link'); ?>" targe="_blank"><img src="<?php the_field('feature_image'); ?>" alt="" /></a>

			<?php the_field('feature_description'); ?>

			</div>
		</div>
	<?php endwhile; ?>
<?php endif; ?>


<?php $mycategorynumber = get_category_by_slug('soliloquy'); ?>

<div class="homeseries">

	<h2><?php echo get_cat_name( $mycategorynumber->term_id ) ?></h2>

	<div class="description">
		<?php echo category_description($mycategorynumber->term_id); ?>
	</div>

	<div class="items">

	<?php

	$homeposts = get_posts(array( 
		'category_name' => 'soliloquy', 
		'post_type' => 'post',
		'numberposts'     => -1,
		'post_status' => 'publish'
	));

	foreach( $homeposts as $post ) : 
		setup_postdata( $post );
		$post_thumbnail_id = get_post_thumbnail_id( $post->ID );
		$src = wp_get_attachment_image_src( $post_thumbnail_id, 'large' );
	?>

			<div class="item">
				<a class="thumbnail" href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><img src="<?php echo $src[0]; ?>" alt='' /></a> 

				<div class="excerpt">
					<h3 class="bigger"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h3>

					<p>Posted <?php the_time('F j, Y') ?></p>

					<?php
					$description = get_sub_field('description');

					if ( $description && $description != '' ) :
						echo $description;
					endif;
					
					?>

				</div>

			</div> <!-- / item -->

	<?php endforeach; ?>

	</div> <!-- / items -->

</div>


<div class="homenews">

	<h2 class="homepageheader">Recent News</h2>

	 <ul>
	 <?php
	 global $post;
	 $myposts = get_posts('numberposts=5&category_name=news');
	 foreach($myposts as $post) :
	   setup_postdata($post);
	 ?>
	    <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <span><?php the_date('Y-m-d'); ?></span></li>
	 <?php endforeach; ?>
	 </ul>

	<p><a href="/category/news/">More news &rarr;</a></p>

</div>


<?php get_footer(); ?>