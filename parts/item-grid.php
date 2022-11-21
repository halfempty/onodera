<div class="item">
	<div class="thumbnail">
		<div class="ratio"></div>
		<?php if ( has_post_thumbnail() ) : ?>
			<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_post_thumbnail('large'); ?></a>
		<?php endif; ?>
	</div>

	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

</div>

