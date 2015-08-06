<?php

// Rewrite media link
function marty_get_attachment_url( $post_id = 0 ) {

	global $blog_id;

	$post_id = (int) $post_id;
	if ( !$post =& get_post( $post_id ) )
		return false;

	$url = '';
	if ( $file = get_post_meta( $post->ID, '_wp_attached_file', true) ) { //Get attached file
		if ( ($uploads = wp_upload_dir()) && false === $uploads['error'] ) { //Get upload directory
			if ( 0 === strpos($file, $uploads['basedir']) ) //Check that the upload base exists in the file location
				$url = str_replace($uploads['basedir'], 'http://0003.org/wp-content/blogs.dir/' . $blog_id . '/files', $file); //replace file location with url location
			elseif ( false !== strpos($file, 'wp-content/uploads') )
				$url = 'http://0003.org/wp-content/blogs.dir/' . $blog_id . '/files' . substr( $file, strpos($file, 'wp-content/uploads') + 18 );
			else
				$url = 'http://0003.org/wp-content/blogs.dir/' . $blog_id . '/files' . "/$file"; //Its a newly uploaded file, therefor $file is relative to the basedir.
		}
	}

	if ( empty($url) ) //If any of the above options failed, Fallback on the GUID as used pre-2.7, not recomended to rely upon this.
		$url = get_the_guid( $post->ID );

	$url = apply_filters( 'wp_get_attachment_url', $url, $post->ID );

	if ( 'attachment' != $post->post_type || empty( $url ) )
		return false;

	return $url;
}


function makeVideo($post_id,$responsive = false) {
	
	$attatchments =& get_children( array('post_parent' => $post_id, 'post_status' => 'inherit', 'post_type' => 'attachment' ) );

	$types = array(
		'm4v' => 'video/m4v', 
		'mp4' =>'video/mp4', 
//		'ogg' =>'video/ogg',
//		'webm' => 'video/webm'
	);

	$params = array();

	foreach ( (array) $attatchments as $attachment_id => $attachment ) {
		$theurl = marty_get_attachment_url( $attachment_id );
		$themime = get_post_mime_type( $attachment_id );

		// Assign URLs 
		foreach ( $types as $key => $value ) {
			if ($themime == $value) {
				$params["$key"] = $theurl;
			}			
		}

		// Assign Image & Metas
		if ( $themime == 'image/jpeg' ) {
			$image_attributes = wp_get_attachment_image_src( $attachment_id, 'full' );
			$params['image'] = $image_attributes[0]; // URL
			$params['width'] = $image_attributes[1];
			$params['height'] = $image_attributes[2];
		}

	}	

	if ($responsive) {
		renderResponsiveVideo($params);		
	} else {
		renderVideo($params);
	}


}


function renderResponsiveVideo($params) {	
	if ( $params['mp4'] ) {

//		echo $params['mp4'];


		$output = '<video ';
		$output .= ' width="' . $params['width'] . '" height="' . $params['height'] . '"';		
//		$output .= ' width="100%" height="100%"';		

		$output .= ' poster="' . $params['image'] . '"';
		$output .= ' src="' . $params['mp4'] . '" type="video/mp4"';	
		$output .= ' preload="auto" controls="controls" style="max-width: 100%; max-height: 100%;"></video>';
		echo $output;	
	} else {
		echo "<p>Error: No MP4 video source.</p>";
	}
}	

function renderVideo($params) {	

	// M4V overrides MP4 (Do we even need this?)
	if ( $params['m4v'] ) { 
		$params['mp4'] = $params['m4v']; 
	} 


	// Render the player
	$output = '<!-- HTML5 player -->';
	$output .= '<div class="html5player">';

	
		$output .= '<div class="poster"><img alt="" src="' . $params['image'] . '"';
		$output .= ' width="' . $params['width'] . '" height="' . $params['height'] . '"';		
		$output .= ' title="Click to play video" /><ul><li>Click for video</li></ul></div>';
 
	$output .= '<div class="player">';
	$output .= '<video controls="controls"';
	$output .= ' width="' . $params['width'] . '" height="' . $params['height'] . '"';			
		$output .= ' poster="' . $params['image'];
	
	 $output .= '">';

	if ($params['mp4']) $output .= '<source src="' . $params['mp4'] . '" type="video/mp4" />';
	if ($params['webm']) $output .= '<source src="' . $params['webm'] . '" type="video/webm" />';
	if ($params['oog']) $output .= '<source src="' . $params['oog'] . '" type="video/ogg" />';

	$output .= '<object type="application/x-shockwave-flash" data="/wp-content/js/player.swf" ';
	$output .= ' width="' . $params['width'] . '" height="' . $params['height'] . '"';			
		
	$output .= '>';
	$output .= '<param name="movie" value="/wp-content/js/player.swf" />';
	$output .= '<param name="allowFullScreen" value="true" />';
	$output .= '<param name="wmode" value="transparent" />';
	$output .= '<param name="flashvars" value="autostart=false&amp;controlbar=over&amp;image=' . $params['image'] . '&amp;file=' . $params['mp4'] . '" />'; 

	$output .= '<img alt="" src="' . $params['image'] . '" width="' . $params['width'] . '" height="' . $params['height'] . '" title="No video playback capabilities, please download the video below" />';

	$output .= '</object></video>';
	
	$output .= '</div></div> <!-- End HTML5 player-->';

	echo $output;

}


function videogallery($post_id = '$post->ID') {

//	echo "<p><strong>" . $post_id . "</strong></p>";

	// M4V
	$attatchments_m4v =& get_children( array('post_parent' => $post_id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'video/m4v' ) );
	foreach ( (array) $attatchments_m4v as $attachment_id => $attachment ) {
		$url_m4v = marty_get_attachment_url( $attachment_id );
	}

	// MP4
	$attatchments_mp4 =& get_children( array('post_parent' => $post_id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'video/mp4' ) );

	foreach ( (array) $attatchments_mp4 as $attachment_id => $attachment ) {
		$url_mp4 = marty_get_attachment_url( $attachment_id );
	}

	// OGG
	$attatchments_ogg =& get_children( array('post_parent' => $post_id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'video/ogg' ) );

	foreach ( (array) $attatchments_ogg as $attachment_id => $attachment ) {
		$url_ogg = marty_get_attachment_url( $attachment_id );
	}

	// WEBM
	$attatchments_webm =& get_children( array('post_parent' => $post_id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'video/webm' ) );

	foreach ( (array) $attatchments_webm as $attachment_id => $attachment ) {
		$url_webm = marty_get_attachment_url( $attachment_id );
	}

	// IMAGE
	$attatchments_image =& get_children( array('post_parent' => $post_id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image' ) );

	foreach ( (array) $attatchments_image as $attachment_id => $attachment ) {
		$image_attributes = wp_get_attachment_image_src( $attachment_id, 'full' ); // returns an array
		$image_url = $image_attributes[0];
		$image_width = $image_attributes[1];
		$image_height = $image_attributes[2];
	}

	if ( $url_m4v != '' ) { $url_mp4 = $url_m4v; } // Override MP4 with M4V
	
	echo '<div class="html5player">';
	echo '<div class="poster"><img alt="" src="' . $image_url . '" width="' . $image_width . '" height="' . $image_height . '" title="Click to play video" /><ul><li>Click for video</li></ul></div>';

	//<!-- "Video For Everybody" v0.4.2 by Kroc Camen of Camen Design -->
	echo '<div class="player">';
	echo '<video controls="controls" width="' . $image_width . '" height="' . $image_height . '">';

	echo '<source src="' . $url_mp4 . '" type="video/mp4" />';
	echo '<source src="' . $url_webm . '" type="video/webm" />';
	echo '<source src="' . $url_ogg . '" type="video/ogg" />';

	echo '<object type="application/x-shockwave-flash" data="/wp-content/js/player.swf" width="' . $image_width . '" height="' . $image_height . '">';
	echo '<param name="movie" value="/wp-content/js/player.swf" />';
	echo '<param name="allowFullScreen" value="true" />';
	echo '<param name="wmode" value="transparent" />';
	echo '<param name="flashvars" value="autostart=false&amp;controlbar=over&amp;image=' . $image_url . '&amp;file=' . $url_mp4 . '" />'; 

	echo '<img alt="" src="' . $image_url . '" width="' . $image_width . '" height="' . $image_height . '" title="No video playback capabilities, please download the video below" />';

	echo '</object></video>';

	echo '<div class="downloadlinks">';
	echo '<p><span>Having trouble playing the video?</span> <strong>Try these direct links:</strong></p>';

	echo '<ul>';
	echo '<li>Most common format:</li>';
	echo '<li><a href="' . $url_mp4 . '">MP4</a></li>';
	echo '</ul>';

	echo '<ul>';
	echo '<li>Alternative formats:</li>';
	echo '<li><a href="' . $url_ogg . '">OGG</a></li>';
	echo '<li><a href="' . $url_webm . '">WEBM</a></li>';
	echo '</ul>';

	echo '</div>';

	
	echo '</div></div> <!-- End HTML5player-->';

}



// Custom Upload Mimes
// http://codex.wordpress.org/Plugin_API/Filter_Reference/upload_mimes

add_filter('upload_mimes', 'custom_upload_mimes');
function custom_upload_mimes ( $existing_mimes=array() ) {
	// Add file extension 'extension' with mime type 'mime/type'
	$existing_mimes['extension'] = 'mime/type';
	$existing_mimes['webm'] = 'video/webm'; 
	$existing_mimes['m4v'] = 'video/m4v'; 
	$existing_mimes['mp4'] = 'video/mp4'; 
	return $existing_mimes; 
}
//end

?>