<?php
//Registered acf blocks
//Icons - https://www.kevinleary.net/wordpress-list-custom-post-type-icons/
function register_acf_blocks_types(){

	//Hero section
	acf_register_block_type(array(
		'name' => 'Hero',
		'title' => __('Hero'),
		'render_template' => "/template-parts/builder/components/hero.php",
		'category' => 'common',
		'icon' => 'star-empty',
		'post_type' => array('courses', 'page'),
		'keywords' => array('course', 'courses', 'hero', 'hero-section'),
	));
}
if (function_exists('acf_register_block_type')) {
    add_action('after_setup_theme', 'register_acf_blocks_types');
}