<?php

// Includes

require_once( 'functions/enqueue.php' );
require_once( 'functions/films-cpt.php' );
require_once( 'functions/menus.php' );
require_once( 'functions/usages.php' );
require_once( 'functions/video.php' );



function theme_slug_setup() {
   add_theme_support( 'title-tag' );
}
add_action( 'after_setup_theme', 'theme_slug_setup' );



//http://speakinginbytes.com/2012/11/responsive-images-in-wordpress/
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
add_filter( 'the_content', 'remove_thumbnail_dimensions', 10 );

function remove_thumbnail_dimensions( $html ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}



// Featured Images / Post Thumbnails
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support( 'post-thumbnails' );
	    set_post_thumbnail_size( 125 ); // Normal post thumbnails
	  //  add_image_size( 'single-post-thumbnail', 400, 9999 ); // Permalink thumbnail size
} 
// end


// Remove Links from admin

add_action( 'admin_menu', 'remove_links_menu' );
function remove_links_menu() {
     remove_menu_page('link-manager.php');
}