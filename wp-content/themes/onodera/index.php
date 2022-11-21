<?php get_header(); ?>

	<div class="pagetop">
		<h1><?php echo single_cat_title(); ?></h1>
	</div>

	<?php if (have_posts()) : ?>

		<nav>
			<ul>
				<li class="current-menu-item"><a href="/category/news/">Updates</a></li>
				<li><a href="/articles/">Press</a></li>
			</ul>
		</nav>


		<div class="blog">
	
		<?php while (have_posts()) : the_post(); ?>

			<div class="item">

				<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title(); ?>"><?php the_title(); ?></a></h2>

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