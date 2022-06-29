<?php
//Registered acf blocks
//Icons - https://www.kevinleary.net/wordpress-list-custom-post-type-icons/
function register_acf_blocks_types(){

	//Editor
	acf_register_block_type(array(
		'name' => 'editor',
		'title' => __('Editor'),
		'render_template' => "/template-parts/builder/components/editor.php",
		'category' => 'common',
		'icon' => 'editor-paste-word',
		'post_type' => array('jobs'),
		'keywords' => array('job', 'jobs', 'offers', 'job-opening', 'opening', 'vacancies', 'vacancy'),
	));
	//Benefits
	acf_register_block_type(array(
		'name' => 'benefits',
		'title' => __('Benefits'),
		'render_template' => "/template-parts/builder/components/benefits.php",
		'category' => 'common',
		'icon' => 'star-empty',
		'post_type' => array('jobs'),
		'keywords' => array('job', 'jobs', 'offers', 'job-opening', 'opening', 'vacancies', 'vacancy'),
	));
}
if (function_exists('acf_register_block_type')) {
    add_action('after_setup_theme', 'register_acf_blocks_types');
}