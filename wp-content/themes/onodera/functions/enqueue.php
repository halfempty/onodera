<?php

function enqueue_theme_scripts() {

	$version = "d";

	// CSS

    $themeStyle = get_bloginfo('stylesheet_directory') . '/style.css';
    wp_register_style('themeStyle',$themeStyle);

	// JS

    $redesignjs = get_bloginfo('stylesheet_directory') . '/js/redesign.js';
	wp_register_script('redesignjs',$redesignjs, false, $version);


	// Enqueue
    wp_enqueue_style( 'themeStyle');

	wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'redesignjs',array('jquery'));


}

add_action('wp_enqueue_scripts', 'enqueue_theme_scripts');


function randomColor() {

	$colors = array("pink", "blue", "green", "orange", "purple");
	shuffle($colors);

	return $colors;

}

?>
