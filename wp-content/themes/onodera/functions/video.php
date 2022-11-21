<?php

function makeVideo($post_id,$responsive = false) {
	
	$attatchments =& get_children( array('post_parent' => $post_id, 'post_status' => 'inherit', 'post_type' => 'attachment' ) );

	$types = array(
		'm4v' => 'video/m4v', 
		'mp4' =>'video/mp4', 
	);

	$params = array();

	foreach ( (array) $attatchments as $attachment_id => $attachment ) {
		$theurl = wp_get_attachment_url( $attachment_id );
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
		}

	}	

	renderVideo($params);

}


// Depricated
function renderResponsiveVideo($params) {	

	renderVideo($params);

}	

function renderVideo($params) {	

	if ( $params['m4v'] ) { 
		$params['mp4'] = $params['m4v']; 
	}


	if ( $params['mp4'] ) {

		$output = '<video ';
		$output .= ' poster="' . $params['image'] . '"';
		$output .= ' src="' . $params['mp4'] . '" type="video/mp4"';	
		$output .= ' preload="auto" controls="controls" controlsList="nodownload" style="max-width: 100%; max-height: 100%;"></video>';
		echo $output;

	} else {

		echo "<p>Error: No MP4 video source.</p>";

	}

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