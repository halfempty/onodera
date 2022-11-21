<?php get_header(); ?>

	<div class="pagetop">
		<h1>Search results for <em>&ldquo;<?php echo get_search_query(); ?>&rdquo;</em></h1>
	</div>

	<?php if (have_posts()) : ?>

		<div class="blog">
	
		<?php while (have_posts()) : the_post(); ?>

			<div class="item">

				<h2>
					<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>">

					<?php $type = get_post_type(); ?>
					<?php if ( $type == 'post' ) : ?>
						News &mdash;
					<?php elseif ( $type == 'midi_films' ) : ?>
						Film &mdash;
					<?php endif; ?>

					<?php the_title(); ?>
					</a>
				</h2>

				<div class="excerpttext">
				<?php the_excerpt() ?>
				</div>

			</div>

			<?php if ( has_post_thumbnail() ) : ?>
				<div class="thumbnail">
					<div class="ratio"></div>
					<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_post_thumbnail('large'); ?></a>
				</div>
			<?php endif; ?>

		<?php endwhile; ?>

		</div>

		<div class="pagination">
			<?php echo paginate_links(); ?>
		</div>

	<?php endif; ?>

<?php get_footer(); ?>