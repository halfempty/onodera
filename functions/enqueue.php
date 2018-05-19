<?php

function enqueue_theme_scripts() {

	$version = "b";

	// CSS

    $themeStyle = get_bloginfo('stylesheet_directory') . '/style.css';
    wp_register_style('themeStyle',$themeStyle);

    // $mediaStyle = get_bloginfo('stylesheet_directory') . '/mediaelement/mediaelementplayer.css';
    // wp_register_style('mediaStyle',$mediaStyle);

    $colorboxStyle = get_bloginfo('stylesheet_directory') . '/colorbox/colorbox.css';
    wp_register_style('colorboxStyle',$colorboxStyle, false, $version);


	// JS

    $onoderajs = get_bloginfo('stylesheet_directory') . '/js/onodera.js';
	wp_register_script('onoderajs',$onoderajs, false, $version);

    $mobilenavjs = get_bloginfo('stylesheet_directory') . '/js/mobilenav.js';
	wp_register_script('mobilenavjs',$mobilenavjs, false, $version);

    $babbqjs = get_bloginfo('stylesheet_directory') . '/js/jquery.ba-bbq.js';
	wp_register_script('babbqjs',$babbqjs, false, $version);

    $packeryjs = get_bloginfo('stylesheet_directory') . '/js/packery.pkgd.min.js';
	wp_register_script('packeryjs',$packeryjs, false, $version);

    $seriesjs = get_bloginfo('stylesheet_directory') . '/js/series.js';
	wp_register_script('seriesjs',$seriesjs, false, $version);

	//     $mediaelementjs = get_bloginfo('stylesheet_directory') . '/mediaelement/mediaelement-and-player.min.js';
	// wp_register_script('mediaelementjs',$mediaelementjs);

    $colorbox = get_bloginfo('stylesheet_directory') . '/colorbox/jquery.colorbox-min.js';
	wp_register_script('colorbox',$colorbox, false, $version);

    $quicktimejs = get_bloginfo('stylesheet_directory') . '/js/AC_QuickTime.js';
	wp_register_script('quicktimejs',$quicktimejs, false, $version);


	// Enqueue
    wp_enqueue_style( 'themeStyle');

//    wp_enqueue_style( 'mediaStyle');
    wp_enqueue_style( 'colorboxStyle');

	wp_enqueue_script( 'jquery');
	wp_enqueue_script( 'colorbox',array('jquery'));
//	wp_enqueue_script( 'mediaelementjs',array('jquery'));
    wp_enqueue_script( 'mobilenavjs',array('jquery'));

	wp_enqueue_script( 'onoderajs',array('jquery','colorbox','mediaelementjs'));
	wp_enqueue_script( 'quicktimejs');

	if ( is_single('12-x-12-x-12') ) :
		wp_enqueue_script( 'babbqjs',array('jquery'));
	endif;

	if ( is_page('series') ) :
		wp_enqueue_script( 'packeryjs',array('jquery'));
		wp_enqueue_script( 'seriesjs',array('jquery','packeryjs'));
	endif;

}

add_action('wp_enqueue_scripts', 'enqueue_theme_scripts');

?>
