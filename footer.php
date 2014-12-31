</div></div></div>

<div class="footer">

<?php if ( is_home() ) { ?>

	<ul class="copyright">
		<li>Website by <a href="http://www.martyspellerberg.com">Marty Spellerberg</a></li>
		<li>From a design by <a href="http://www.rubypajares.com">Ruby Pajares</a></li>
		<li>Hosted by <a href="http://www.mediatemple.net">MediaTemple</a></li>
		<li>&copy; Copyright <?php echo date('Y')?> <a href="/contact/">Midi Onodera/Daruma Pictures Inc.</a></li>
	</ul>

	<?php } else { ?>

	<div class="footercredits">
	
		<p>Website by<br /><a href="http://www.martyspellerberg.com">Marty Spellerberg</a></p>
		<p>From a design by <br /><a href="http://www.rubypajares.com">Ruby Pajares</a></p>
		<p>Hosted by <br /><a href="http://www.mediatemple.net">MediaTemple</a></p>
		<p>&copy; <?php echo date('Y')?></p>

	</div>


	<div class="footernews">

		<h3><a href="/category/news/">Recent News</a></h3>
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

	</div>

	<div class="footertweets">

		<h3>Links</h3>

		<ul>
			<?php wp_list_bookmarks('title_li=&categorize=0'); ?>
		</ul>

	
	</div>



<?php } ?>

	
</div>
<?php wp_footer(); ?>

</body>
</html>