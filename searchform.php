<form role="search" method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">

	<div class="inputmargin">
		<input type="text" placeholder="Search here" value="<?php echo get_search_query(); ?>" name="s" id="s" />
	</div>

	<button type="submit" id="submitbutton">
		<span class="icon"></span>
		<span class="buttonlabel">Go</span>
	</button>

</form>
