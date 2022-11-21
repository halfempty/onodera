<?php

// Post Type

function create_midi_film() {
	register_post_type( 'midi_films',
		array(
			'labels' => array(
				'name' => 'Films',
				'singular_name' => 'Film',
				'add_new' => 'Add New',
				'add_new_item' => 'Add New Film',
				'edit' => 'Edit',
				'edit_item' => 'Edit Film',
				'new_item' => 'New Film',
				'view' => 'View',
				'view_item' => 'View Film',
				'search_items' => 'Search Films',
				'not_found' => 'No Films found',
				'not_found_in_trash' => 'No Films found in Trash',
				'parent' => 'Parent Film'
			),
			'public' => true,
			'supports' => array( 'title','editor','author','thumbnail','custom-fields','revisions' ),
			'taxonomies' => array( 'midi_film_categories' ),
			'rewrite' => array('slug' => 'film'),
			'has_archive' => true,
			'menu_icon' => 'dashicons-video-alt2',
			'menu_position' => 2
		)
	);
}

add_action( 'init', 'create_midi_film' );


// Taxonomy

add_action( 'init', 'create_midi_film_categories', 0 );

function create_midi_film_categories() {

	$labels = array(
		'name'              => _x( 'Film Series', 'taxonomy general name' ),
		'singular_name'     => _x( 'Film Series', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Film Series' ),
		'all_items'         => __( 'All Series' ),
		'parent_item'       => __( 'Parent Series' ),
		'parent_item_colon' => __( 'Parent Series:' ),
		'edit_item'         => __( 'Edit Film Series' ),
		'update_item'       => __( 'Update Film Series' ),
		'add_new_item'      => __( 'Add New Film Series' ),
		'new_item_name'     => __( 'New Series Name' ),
		'menu_name'         => __( 'Series' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'films' ),
	);

	register_taxonomy( 'midi_film_categories', array( 'midi_films' ), $args );

}


/**
 * Display a custom taxonomy dropdown in admin
 * @author Mike Hemberger
 * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
 */

add_action('restrict_manage_posts', 'tsm_filter_post_type_by_taxonomy');
function tsm_filter_post_type_by_taxonomy() {
	global $typenow;
	$post_type = 'midi_films'; // change to your post type
	$taxonomy  = 'midi_film_categories'; // change to your taxonomy
	if ($typenow == $post_type) {
		$selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
		$info_taxonomy = get_taxonomy($taxonomy);
		wp_dropdown_categories(array(
			'show_option_all' => __("Show All {$info_taxonomy->label}"),
			'taxonomy'        => $taxonomy,
			'name'            => $taxonomy,
			'orderby'         => 'name',
			'selected'        => $selected,
			'show_count'      => true,
			'hide_empty'      => true,
		));
	};
}
/**
 * Filter posts by taxonomy in admin
 * @author  Mike Hemberger
 * @link http://thestizmedia.com/custom-post-type-filter-admin-custom-taxonomy/
 */
add_filter('parse_query', 'tsm_convert_id_to_term_in_query');
function tsm_convert_id_to_term_in_query($query) {
	global $pagenow;
	$post_type = 'midi_films'; // change to your post type
	$taxonomy  = 'midi_film_categories'; // change to your taxonomy
	$q_vars    = &$query->query_vars;
	if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
		$term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
		$q_vars[$taxonomy] = $term->slug;
	}
}
