<?php

function register_custom_menus() {
	register_nav_menu('primary', __('Primary Menu'));
	register_nav_menu('films', __('Films Menu'));
}

add_action('init', 'register_custom_menus');
