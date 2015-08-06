<?php

add_action( 'admin_menu', 'mca_usages' );

function mca_usages() {
	add_submenu_page( 'tools.php', 'Usages', 'Usages', 'manage_options', 'mca_usages', 'mca_usages_options' );
}

function mca_usages_options() {

    if (!current_user_can('manage_options')) {
      wp_die( __('You do not have sufficient permissions to access this page.') );
    } ?>

	<div class="wrap">
		<h2>Usages</h2>

	<?php 
	
	global $post;

	$attachments = array(
		'guide',
//		'image',
		'ipod',
		'mov',
		'pdf',
//		'thumbnail',
		'youtube'
	);

	foreach( $attachments as $type ) :

		echo '<h3>' . $type . '</h3>';

		$posts = get_posts(array(
			'post_type' => 'post',
			'posts_per_page' => -1,
			'meta_key' => $type
		));

		echo "<ol>";

		foreach( $posts as $post ) :	
			echo "<li><strong>" . $post->post_title . '</strong><br /><a href="' . $post->guid . '">View</a> | <a href="/wp-admin/post.php?post=' . $post->ID . '&action=edit">Edit</a></li>';
		endforeach;

		echo '</ol>';

	endforeach;
	
	// Post templates

	$types = array(
		'single-korsakow.php',
		'single-redirect.php',
		'single-video.php'
	);

	foreach( $types as $type ) :

		echo '<h3>' . $type . '</h3>';

		$posts = get_posts(array(
			'post_type' => 'post',
			'meta_key' => 'custom_post_template',
			'meta_value' => $type,
			'posts_per_page' => -1
		));

		echo "<ol>";

		foreach( $posts as $post ) :	
			echo "<li><strong>" . $post->post_title . '</strong><br /><a href="' . $post->guid . '">View</a> | <a href="/wp-admin/post.php?post=' . $post->ID . '&action=edit">Edit</a></li>';
		endforeach;
	
		echo '</ol>';

	endforeach;

	// single.php

	echo '<h3>single.php</h3>';

	$posts = get_posts(array(
		'post_type' => 'post',
		'posts_per_page' => -1,
		'meta_key' => 'custom_post_template',
		'meta_value' => 0,
	));

	echo "<ol>";

	foreach( $posts as $post ) :	
		echo "<li><strong>" . $post->post_title . '</strong><br /><a href="' . $post->guid . '">View</a> | <a href="/wp-admin/post.php?post=' . $post->ID . '&action=edit">Edit</a></li>';
	endforeach;

	echo '</ol>';

	
	
	?>

	</div> 
<?php 

}


?>