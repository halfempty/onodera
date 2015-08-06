<?php

// Includes

require_once( 'functions/enqueue.php' );
require_once( 'functions/usages.php' );
require_once( 'functions/video.php' );

//http://speakinginbytes.com/2012/11/responsive-images-in-wordpress/
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
add_filter( 'the_content', 'remove_thumbnail_dimensions', 10 );

function remove_thumbnail_dimensions( $html ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}



// Pagination
// http://sltaylor.co.uk/blog/better-wordpress-pagination/

function pagination( $query, $baseURL = '' ) {
	if ( ! $baseURL ) $baseURL = get_bloginfo( 'url' );
	$page = $query->query_vars["paged"];
	if ( !$page ) $page = 1;
	$qs = $_SERVER["QUERY_STRING"] ? "?".$_SERVER["QUERY_STRING"] : "";
	// Only necessary if there's more posts than posts-per-page
	if ( $query->found_posts > $query->query_vars["posts_per_page"] ) {
		echo '<ul class="paging">';
		// Previous link?
		if ( $page > 1 ) {
			echo '<li class="previous"><a href="'.$baseURL.'page/'.($page-1).'/'.$qs.'">« Previous</a></li>';
		}
		// Loop through pages
		for ( $i=1; $i <= $query->max_num_pages; $i++ ) {
			// Current page or linked page?
			if ( $i == $page ) {
				echo '<li class="active">'.$i.'</li>';
			} else {
				echo '<li><a href="'.$baseURL.'page/'.$i.'/'.$qs.'">'.$i.'</a></li>';
			}
		}
		// Next link?
		if ( $page < $query->max_num_pages ) {
			echo '<li><a href="'.$baseURL.'page/'.($page+1).'/'.$qs.'">Next »</a></li>';
		}
		echo '</ul>';
	}
}


// Category description
function marty_wrapped_category_description( $before = '<div class="description">', $after = '</div>'){
	if ( category_description() !== '' ) {
		echo $before . category_description() . $after;
	}
}


// Display a link to youtube
function midiYoutube() {
	global $id, $post_meta_cache;

	if ( $keys = get_post_custom_keys() ) {
		foreach ( $keys as $key ) {
			$values = array_map('trim', get_post_custom_values($key));
			$value = implode($values,', ');
			if ( $key == "youtube") { echo "<p><a href='$value'>View this video on YouTube.</a></p>"; }
		}
	}
} // end




// In category or Subcategory
// http://lists.automattic.com/pipermail/wp-hackers/2006-June/006693.html
function in_category_or_subcategory_of($slug) {

	$cat_id = get_category_by_slug($slug)->term_id;

 	$cats = get_the_category();
 	if ( !count($cats) ) // error: no cats defined!
 		return false;
 	foreach ( (array) $cats as $cat ) {
 		if ( $cat->cat_ID == $cat_id ) // is specifically in $cat_id
 			return true;
 		if ( in_category_dig_parents($cat->category_parent, $cat_id) ) //  is in a child of $cat_id
 			return true;
 	}
 	return false;
 }

 function in_category_dig_parents($cat_id, $look_for) {
 	if ( !$cat_id ) // we got to the top category, and there was no match
 		return false;
 	if ( $cat_id == $look_for ) // found $cat_id
 		return true;
 	$cat = get_category($cat_id);
 	return in_category_dig_parents($cat->category_parent,  
 $look_for); // go up a level, and keep trying
 }
//end


// Featured Images / Post Thumbnails
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
	    set_post_thumbnail_size( 125 ); // Normal post thumbnails
	  //  add_image_size( 'single-post-thumbnail', 400, 9999 ); // Permalink thumbnail size
} 
// end

// Create an image tag using a custom field
function marty_metaimage($theKey) {
	global $id, $post_meta_cache;

	if ( $keys = get_post_custom_keys() ) {
		foreach ( $keys as $key ) {
			
			$values = array_map('trim', get_post_custom_values($key));
			$value = implode($values,', ');

				if ( $key == $theKey) { 
					echo "<img src=\"$value\" alt=\"Movie Thumbnail\" />";
					}
		}
	}
} 
// end


function onoderaAfterVideoLinks() {
	global $id, $post_meta_cache;

	if ( $keys = get_post_custom_keys() ) :
		foreach ( $keys as $key ) :
			
			$values = array_map('trim', get_post_custom_values($key));
			$value = implode($values,', ');

			if ( $key == "guide") { $midiGuide = $value; }
			if ( $key == "image") { $midiImage = $value; }
			if ( $key == "ios") { $midiIpod = $value; }
			if ( $key == "mov") { $midiMov = $value; }
			if ( $key == "pdf") { $midiPdf = $value; }
			if ( $key == "thumbnail") { $midiThumbnail = $value; }
			if ( $key == "youtube") { $midiYoutube = $value; }

		endforeach;
	endif;

	$output = '';
	if ($midiMov != null){ $output .= "<li class='showmov'><a href='$midiMov'>Quicktime</a> </li>"; }
	if ($midiYoutube != null){ $output .= "<li><a href='$midiYoutube'>YouTube</a> </li>"; }
	if ($midiIpod != null){ $output .= "<li class='showm4v'><a href='$midiIpod'>iPod</a> </li>"; }
	if ($midiPdf != null){ $output .= "<li><a href='$midiPdf'>Transcript&nbsp;(PDF)</a> </li>"; }
	if ($midiGuide != null){ $output .= "<li><a href='$midiGuide'>Study&nbsp;Guide&nbsp;(PDF)</a> </li>"; }

	$output .= "<li><a href='http://www.addthis.com/bookmark.php' onclick='return addthis_sendto()'>Bookmark&nbsp;and&nbsp;Share</a></li>";

	echo '<div class="media"><ul>' . $output . '</ul></div>';

}


function midiMetas() {
	global $id, $post_meta_cache;
	$midiTitle = "";

	$output = '';

	if ( $keys = get_post_custom_keys() ) {
		foreach ( $keys as $key ) {
			
			$values = array_map('trim', get_post_custom_values($key));
			$value = implode($values,', ');

				if ( $key == "guide") { $midiGuide = $value; }
				if ( $key == "image") { $midiImage = $value; }
				if ( $key == "ios") { $midiIpod = $value; }
				if ( $key == "mov") { $midiMov = $value; }
				if ( $key == "pdf") { $midiPdf = $value; }
				if ( $key == "thumbnail") { $midiThumbnail = $value; }
				if ( $key == "youtube") { $midiYoutube = $value; }
		}

	}

	if ($midiImage != null || $midiGuide != null || $midiIpod != null || $midiMov != null || $midiPdf != null ){

		if ($midiMov != null && $midiImage != null){

				$output .= "<a href='$midiMov' title='View QuickTime' class='movlink'><img src='$midiImage' alt='$midiTitle' /></a>
				
					<div class='movdiv'><script type=\"text/javascript\">
					  QT_WriteOBJECT_XHTML(
						'$midiMov', '700', '450', '',
					    'controller', 'true'); 
					</script></div>				
				
				";

		} else if ($midiImage != null){
		
				$output .= "<img src='$midiImage' alt='$midiTitle' />";
		
		}


		if ($midiGuide != null || $midiIpod != null || $midiMov != null || $midiPdf != null || $midiYoutube != null ){

			$output .= "<ul>";

			if ($midiMov != null){ $output .= "<li class='showmov'><a href='$midiMov'>Quicktime</a> </li>"; }
			if ($midiYoutube != null){ $output .= "<li><a href='$midiYoutube'>YouTube</a> </li>"; }
			if ($midiIpod != null){ $output .= "<li class='showm4v'><a href='$midiIpod'>iPod</a> </li>"; }
			if ($midiPdf != null){ $output .= "<li><a href='$midiPdf'>Transcript&nbsp;(PDF)</a> </li>"; }
			if ($midiGuide != null){ $output .= "<li><a href='$midiGuide'>Study&nbsp;Guide&nbsp;(PDF)</a> </li>"; }
		
			$output .= "			
				<li><a href='http://www.addthis.com/bookmark.php' onclick='return addthis_sendto()'>Bookmark&nbsp;and&nbsp;Share</a></li>
			</ul>";		
		}
	}

	if  ( $output !== '' ) {
		echo '<div class="media">' . $output . '</div>';
	}

} // end


function marty_metacontrol($theKey) {
	global $id, $post_meta_cache;

	if ( $keys = get_post_custom_keys() ) {
		foreach ( $keys as $key ) {
			
			$values = array_map('trim', get_post_custom_values($key));
			$value = implode($values,', ');

				if ( $key == $theKey) { 
					echo "$value";
					}
		}
	}
}





?>