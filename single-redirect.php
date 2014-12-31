<?php
/*
Template Name Posts: Redirect
Source: http://www.nathanrice.net/blog/how-to-redirect-a-page-using-custom-fields-in-wordpress/

*/

global $post; // < -- globalize, just in case
$field = get_post_meta($post->ID, 'redirect', true);
if($field) wp_redirect(clean_url($field), 301);
get_header();

?>