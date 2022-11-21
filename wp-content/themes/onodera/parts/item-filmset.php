<div class="item">

	<h2><?php the_title(); ?></h2>

	<?php echo get_template_part('parts/thevideo'); ?>

	<p>Posted <?php the_time('F j, Y') ?> <a class="permalink" href="<?php the_permalink(); ?>"><?php echo get_template_part('images/link.svg'); ?></a></p>

</div>