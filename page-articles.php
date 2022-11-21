<?php get_header(); ?>

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

			<div class="pagetop">
				<h1>News</h1>
			</div>

			<nav>
				<ul>
					<li><a href="/category/news/">Updates</a></li>
					<li class="current-menu-item"><a href="/articles/">Press</a></li>
				</ul>
			</nav>


			<div class="textbox">
				<?php the_content() ?>
			</div>
	
			<?php get_template_part('parts/subpages'); ?>
			<?php echo get_template_part('parts/cvtable'); ?>

		<?php endwhile; ?>

	<?php endif; ?>

<?php get_footer(); ?>