<?php

	$childrenargs = array(
		'parent' => $post->ID,
		'sort_column' => 'menu_order',
		'sort_order' => 'ASC', 
	);

	$mypages = get_pages( $childrenargs );

?>

	<?php if ( $mypages ) : ?>
	<div class="acordion">
		<?php foreach ( $mypages as $post ) : setup_postdata( $post ); ?>
			<div class="item closed">
				<?php 
					$title = get_field('navigation_title'); 
					if ( !$title || $title == '' ) $title = get_the_title();
				?>
				<h2><a href="<?php the_permalink(); ?>">
					<?php echo $title; ?>
					<span class="expand">+</span><span class="collapse">&ndash;</span>
				</a></h2>
				<div class="inner">
					<div class="textbox"><?php the_content(); ?></div>
					<?php echo get_template_part('parts/cvtable'); ?>
					<p><a class="permalink" href="<?php the_permalink(); ?>"><?php echo get_template_part('images/link.svg'); ?></a></p>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
	<?php endif; ?>

<?php wp_reset_postdata(); ?>
