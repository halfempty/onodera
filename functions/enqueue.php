<?php

function enqueue_theme_scripts() {

    $themeStyle = get_bloginfo('stylesheet_directory') . '/style.css';
    wp_register_style('themeStyle',$themeStyle);
    wp_enqueue_style( 'themeStyle');

	wp_enqueue_script( 'jquery');

	if ( is_single('12-x-12-x-12') ) :

	    $babbqjs = get_bloginfo('stylesheet_directory') . '/js/jquery.ba-bbq.js';
		wp_register_script('babbqjs',$babbqjs);
		wp_enqueue_script( 'babbqjs',array('jquery'));

	endif;

	// Media Element
    $mediaelementjs = get_bloginfo('stylesheet_directory') . '/mediaelement/mediaelement-and-player.min.js';
	wp_register_script('mediaelementjs',$mediaelementjs);
	wp_enqueue_script( 'mediaelementjs',array('jquery'));

    $mediaStyle = get_bloginfo('stylesheet_directory') . '/mediaelement/mediaelementplayer.css';
    wp_register_style('mediaStyle',$mediaStyle);
    wp_enqueue_style( 'mediaStyle');

	// Colorbox
    $colorbox = get_bloginfo('stylesheet_directory') . '/colorbox/jquery.colorbox-min.js';
	wp_register_script('colorbox',$colorbox);
	wp_enqueue_script( 'colorbox',array('jquery'));

    $colorboxStyle = get_bloginfo('stylesheet_directory') . '/colorbox/colorbox.css';
    wp_register_style('colorboxStyle',$colorboxStyle);
    wp_enqueue_style( 'colorboxStyle');

	// Theme JS
    $onoderajs = get_bloginfo('stylesheet_directory') . '/js/onodera.js';
	wp_register_script('onoderajs',$onoderajs);
	wp_enqueue_script( 'onoderajs',array('jquery','colorbox','mediaelementjs'));


	// Quicktime JS
    $quicktimejs = get_bloginfo('stylesheet_directory') . '/js/AC_QuickTime.js';
	wp_register_script('quicktimejs',$quicktimejs);
	wp_enqueue_script( 'quicktimejs');


}

add_action('wp_enqueue_scripts', 'enqueue_theme_scripts');

?>
